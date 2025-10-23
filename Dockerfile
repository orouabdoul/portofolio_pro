# Stage 1 - Build frontend (Vite)
FROM node:18 AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm ci --silent
COPY . .
# Adjust the build command if your project uses a different script
RUN npm run build

# Stage 2 - Build PHP vendor with Composer
FROM composer:2 AS composer
WORKDIR /var/www
COPY composer.json composer.lock ./
# Install dependencies without running scripts (avoids calling artisan during build)
RUN composer install --no-dev --no-interaction --prefer-dist --no-progress --no-scripts --no-autoloader

# Stage 3 - Final image
FROM php:8.2-fpm

# Install system dependencies and PHP extensions commonly used by Laravel
RUN apt-get update && apt-get install -y \
    git curl unzip libpq-dev libonig-dev libzip-dev zip libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring zip gd \
    && rm -rf /var/lib/apt/lists/*

# Install Composer binary
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy application files
COPY . .

# Copy vendor from composer stage
COPY --from=composer /var/www/vendor ./vendor

# Copy built frontend assets (adjust path if your Vite outputs to public/dist)
COPY --from=frontend /app/public/build ./public/build

# Ensure correct permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Generate optimized autoload files now that app files are present
RUN composer dump-autoload --optimize

# Default PORT used by Render; php -S will bind to this port at runtime
ENV PORT=10000
EXPOSE 10000
## Install nginx
RUN apt-get update && apt-get install -y nginx gettext-base \
    && rm -rf /var/lib/apt/lists/*

# Create nginx config template that listens on the port provided by Render via $PORT
RUN mkdir -p /etc/nginx/conf.d && cat > /etc/nginx/conf.d/default.conf.template <<'NGINXCONF'
server {
    listen ${PORT} default_server;
    server_name _;
    root /var/www/public;
    index index.php index.html index.htm;

    access_log /var/log/nginx/access.log;
    error_log /var/log/nginx/error.log;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_pass 127.0.0.1:9000;
    }

    location ~ /\.(env|git) {
        deny all;
    }
}
NGINXCONF

# Entrypoint script: substitute PORT and start php-fpm + nginx
RUN cat > /usr/local/bin/docker-entrypoint.sh <<'EOF'
#!/bin/sh
set -e

: ${PORT:=10000}
echo "Starting container, substituting PORT=${PORT} into nginx config..."
envsubst '${PORT}' < /etc/nginx/conf.d/default.conf.template > /etc/nginx/conf.d/default.conf

# Clear caches safely if artisan exists (ignore errors)
if [ -f artisan ]; then
    php artisan config:clear || true
    php artisan route:clear || true
    php artisan view:clear || true
fi

# Ensure permissions (again)
chown -R www-data:www-data storage bootstrap/cache || true
chmod -R 775 storage bootstrap/cache || true

# If the app uses SQLite, ensure the database file exists and is writable
if [ "${DB_CONNECTION}" = "sqlite" ] || [ -z "${DB_CONNECTION}" ]; then
    # Default path if DB_DATABASE is empty
    DB_FILE=${DB_DATABASE:-/var/www/database/database.sqlite}
    DB_DIR=$(dirname "${DB_FILE}")
    mkdir -p "${DB_DIR}"
    if [ ! -f "${DB_FILE}" ]; then
        echo "Creating SQLite database file at ${DB_FILE}"
        touch "${DB_FILE}"
        chown www-data:www-data "${DB_FILE}"
        chmod 664 "${DB_FILE}"
    fi
fi

# Start php-fpm (daemonize) and nginx in foreground
php-fpm -D
exec nginx -g 'daemon off;'
EOF

RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
