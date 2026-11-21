#!/usr/bin/env bash
# Roval Tech — despliegue para Git Version Control (cPanel / hosting Linux)
# Ejecutar desde la raíz del repositorio: bash deploy.sh
set -euo pipefail

cd "$(dirname "$0")"

# ---------------------------------------------------------------------------
# 1) Buscar un PHP CLI de verdad. El PHP web (LSAPI) NO puede ejecutar Composer:
#    "cannot be run safely on non-CLI SAPIs with register_argc_argv=On".
# ---------------------------------------------------------------------------
PHP_BIN=""
for candidate in \
    /opt/alt/php83/usr/bin/php \
    /opt/alt/php84/usr/bin/php \
    /opt/cpanel/ea-php83/root/usr/bin/php \
    /usr/local/bin/php83 \
    /usr/bin/php83 \
    php
do
    if command -v "$candidate" >/dev/null 2>&1 || [ -x "$candidate" ]; then
        sapi="$("$candidate" -r 'echo PHP_SAPI;' 2>/dev/null || true)"
        if [ "$sapi" = "cli" ]; then
            PHP_BIN="$candidate"
            break
        fi
    fi
done

if [ -z "$PHP_BIN" ]; then
    echo "ERROR: no se encontró un PHP con SAPI 'cli'. Probó: /opt/alt/php83/usr/bin/php, /opt/alt/php84/usr/bin/php, /usr/bin/php83, php" >&2
    exit 1
fi

echo "PHP CLI: $PHP_BIN"

# ---------------------------------------------------------------------------
# 2) Composer exige HOME y COMPOSER_HOME. En hosting sin SSH usamos carpetas
#    escribibles DENTRO del repo (ignoradas por Git).
# ---------------------------------------------------------------------------
mkdir -p .home .composer
export HOME="$PWD/.home"
export COMPOSER_HOME="$PWD/.composer"

if [ ! -f composer.phar ]; then
    if command -v curl >/dev/null 2>&1; then
        curl -sSL https://getcomposer.org/composer-stable.phar -o composer.phar
    else
        "$PHP_BIN" -r "copy('https://getcomposer.org/composer-stable.phar', 'composer.phar');"
    fi
fi
COMPOSER=("$PHP_BIN" composer.phar)

# ---------------------------------------------------------------------------
# 3) Dependencias. La extensión fileinfo suele faltar en el hosting: se ignora
#    solo ese requisito (recomendamos activarla en cPanel para subir imágenes).
# ---------------------------------------------------------------------------
"${COMPOSER[@]}" install --no-dev --prefer-dist --optimize-autoloader \
    --no-interaction --ignore-platform-req=ext-fileinfo

# ---------------------------------------------------------------------------
# 4) .env: se crea una sola vez. Nunca se sobrescribe en un redeploy.
# ---------------------------------------------------------------------------
CREATED_ENV=0
if [ ! -f .env ]; then
    cp .env.example .env
    CREATED_ENV=1
    echo "ATENCIÓN: se creó .env desde .env.example."
fi

if [ "$CREATED_ENV" -eq 1 ]; then
    APP_URL_DEPLOY="${APP_URL_DEPLOY:-https://kipucloud.com/rovalTech}"
    sed -i "s#^APP_ENV=.*#APP_ENV=production#" .env
    sed -i "s#^APP_DEBUG=.*#APP_DEBUG=false#" .env
    sed -i "s#^APP_URL=.*#APP_URL=${APP_URL_DEPLOY}#" .env
fi

if ! grep -q '^APP_KEY=base64:' .env; then
    "$PHP_BIN" artisan key:generate --force
fi

# ---------------------------------------------------------------------------
# 5) Base de datos SQLite (MySQL no hace falta en este hosting).
# ---------------------------------------------------------------------------
mkdir -p database
[ -f database/database.sqlite ] || : > database/database.sqlite
"$PHP_BIN" artisan migrate --force
"$PHP_BIN" artisan db:seed --force

# ---------------------------------------------------------------------------
# 6) Permisos y cachés.
# ---------------------------------------------------------------------------
mkdir -p bootstrap/cache \
         storage/framework/cache/data \
         storage/framework/sessions \
         storage/framework/views \
         storage/logs \
         public/uploads/projects
chmod -R 775 storage bootstrap/cache public/uploads/projects

"$PHP_BIN" artisan optimize:clear

echo "Despliegue terminado con $PHP_BIN."
echo "Si el sitio se sirve en /rovalTech, verifica APP_URL en .env."
