% Generated deploy guide
# Déploiement sur Render — Guide complet (PostgreSQL recommandé)

Ce document explique, étape par étape, la meilleure façon de déployer cette application Laravel sur Render en utilisant une base de données PostgreSQL managée (option recommandée).

IMPORTANT : ne commitez jamais de secrets (mot de passe, APP_KEY) dans le dépôt. Configurez-les uniquement dans le panneau Environment de Render.

## 1) Provisionner la base de données sur Render

1. Ouvrez le Dashboard Render.
2. `Databases` → `New Database` → choisissez `PostgreSQL`.
3. Choisissez un plan (Starter suffit pour test). Créez la DB.
4. Notez les informations retournées : HOST, PORT, DATABASE, USER, PASSWORD, ou la `DATABASE_URL`.

## 2) Variables d'environnement à ajouter dans votre Service Web (Render)

Sur votre Service qui déploie le conteneur (Web Service), dans `Environment` ajoutez :

```
DB_CONNECTION=pgsql
DB_HOST=<host_from_render>
DB_PORT=5432
DB_DATABASE=<db_name>
DB_USERNAME=<db_user>
DB_PASSWORD=<db_password>
# Optionnel (pratique) :
DATABASE_URL=postgres://<user>:<pass>@<host>:5432/<db>

APP_ENV=production
APP_DEBUG=false
# Laissez APP_KEY vide si vous voulez que le bootstrap la génère
APP_KEY=

# Flags d'initialisation (optionnel, utiles la première fois)
RUN_MIGRATIONS=true
CREATE_ADMIN=true
GENERATE_APP_KEY=true
RUN_STORAGE_LINK=true
```

Remarque : Remplacez `<...>` par les valeurs fournies par Render.

## 3) Bloc Shell prêt à coller (Render Shell)

Collez ce bloc dans le Shell du Service (Render → votre service → Shell) **après** avoir ajouté les variables d'environnement :

```bash
# Utilise le script d'amorçage fourni (recommandé)
export RUN_MIGRATIONS=true
export CREATE_ADMIN=true
export GENERATE_APP_KEY=true
export RUN_STORAGE_LINK=true
bash scripts/render-bootstrap.sh

# Si vous préférez la route manuelle, exécutez :
php artisan key:generate --force
php artisan storage:link || true
php artisan migrate --force
php artisan db:seed --class=AdminSeeder --force
```

Le script `scripts/render-bootstrap.sh` réalise :
- génération de `APP_KEY` si demandé
- création du fichier SQLite si DB sqlite (non utilisé ici)
- exécution des migrations
- exécution de `AdminSeeder` (si demandé)
- création du lien `storage` (si demandé)

## 4) Vérifications après bootstrap

Dans le Shell Render, vérifiez :

```bash
php artisan migrate:status
php artisan tinker --execute="App\\Models\\Admin::count()"
tail -n 200 storage/logs/laravel.log
```

L'admin par défaut (si `AdminSeeder` a été exécuté) :
- Email : admin@portfolio.com
- Mot de passe : Ab5900@/

Changez le mot de passe immédiatement après connexion.

## 5) Migration des données SQLite locales (optionnel)

Si vous avez des données locales dans `database/database.sqlite` et que vous souhaitez les conserver, deux approches :

- Utiliser `pgloader` (recommandé pour volumétrie) :

```
# exemple local
pgloader sqlite:///chemin/vers/database.sqlite postgresql://<user>:<pass>@<host>:5432/<db>
```

- Export CSV / import via `psql` + `COPY` table par table si vous préférez.

## 6) Notes Docker / PHP

Votre `Dockerfile` installe déjà `libpq-dev` et `pdo_pgsql` — l'image est donc prête pour Postgres. Aucune modification nécessaire côté Dockerfile.

## 7) Sécurité post-déploiement

- Après validation : mettez `CREATE_ADMIN=false` et `GENERATE_APP_KEY=false` dans les env.
- Assurez-vous `APP_DEBUG=false`.
- Supprimez les seeds/par défauts si vous souhaitez durcir l'accès.

## 8) Dépannage courant

- Si `php artisan migrate` échoue → vérifier la connectivité (DB_HOST, DB_PORT, USER, PASSWORD) dans Render env.
- Si erreur `no such table` → migrations non exécutées.
- Si driver pdo_pgsql manquant → vérifier Dockerfile build logs ; pourtant ici le Dockerfile contient `pdo_pgsql`.

## 9) Je peux prendre en charge (optionnel)

Si vous le souhaitez, je peux :
- Commiter ce fichier `DEPLOY_RENDER.md` (fait).
- Vous guider pour la création DB sur Render et vous fournir les valeurs exactes à coller.
- Après que vous ayez provisionné la DB et ajouté les variables d'environnement, vous collez la sortie du Shell ici et je vous aide à corriger si nécessaire.

---

Bonne partie ! Quand vous avez provisionné la DB sur Render et placé les variables d'environnement, collez ici la sortie du Shell (ou dites "J'ai collé les env, lance le bootstrap") et je vous aiderai à continuer. 
