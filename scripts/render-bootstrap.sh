#!/bin/sh
set -e

# Render bootstrap helper
# Usage: run this from the project root or execute from Render shell

PROJECT_ROOT="$(cd "$(dirname "$0")/.." && pwd)"
cd "$PROJECT_ROOT"

echo "[render-bootstrap] working directory: $PROJECT_ROOT"

if [ ! -f artisan ]; then
  echo "[render-bootstrap] artisan not found — are you in the project root? Exiting."
  exit 0
fi

# Ensure database for sqlite
DB_CONN=${DB_CONNECTION:-sqlite}
if [ "$DB_CONN" = "sqlite" ] || [ -z "$DB_CONN" ]; then
  DB_FILE=${DB_DATABASE:-database/database.sqlite}
  DB_DIR=$(dirname "$DB_FILE")
  echo "[render-bootstrap] ensuring sqlite file: $DB_FILE"
  mkdir -p "$DB_DIR"
  if [ ! -f "$DB_FILE" ]; then
    touch "$DB_FILE"
    echo "[render-bootstrap] created $DB_FILE"
  else
    echo "[render-bootstrap] $DB_FILE already exists"
  fi
  chmod 664 "$DB_FILE" || true
  chown -R www-data:www-data "$DB_DIR" || true
fi

# Generate APP_KEY if requested or missing
if [ -z "$APP_KEY" ] && [ "${GENERATE_APP_KEY}" = "true" ]; then
  echo "[render-bootstrap] generating APP_KEY"
  php artisan key:generate --force || true
fi

# Create storage symlink if requested
if [ "${RUN_STORAGE_LINK}" = "true" ]; then
  echo "[render-bootstrap] running storage:link"
  php artisan storage:link || true
fi

# Run migrations if requested
if [ "${RUN_MIGRATIONS}" = "true" ]; then
  echo "[render-bootstrap] running migrations"
  php artisan migrate --force || true
else
  echo "[render-bootstrap] RUN_MIGRATIONS not true; skipping migrations"
fi

echo "[render-bootstrap] done"
