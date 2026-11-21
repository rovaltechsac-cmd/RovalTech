#!/usr/bin/env bash
# Roval Tech — despliegue para Git Version Control (cPanel / hosting Linux)
# Ejecutar desde la raiz del repositorio: bash deploy.sh
set -euo pipefail

cd "$(dirname "$0")"

# 1) Dependencias de produccion
if command -v composer >/dev/null 2>&1; then
    composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction
else
    echo "ERROR: composer no esta en el PATH. Instalalo o ajusta este script." >&2
    exit 1
fi

# 2) Archivo .env (nunca se sube al repositorio)
if [ ! -f .env ]; then
    cp .env.example .env
    echo "ATENCION: se creo .env desde .env.example. Editalo con tus datos antes de continuar." >&2
fi

if ! grep -q '^APP_KEY=base64:' .env; then
    php artisan key:generate
fi

# 3) Base de datos (SQLite por defecto; si usas MySQL configuralo en .env)
mkdir -p database
[ -f database/database.sqlite ] || touch database/database.sqlite
php artisan migrate --force
php artisan db:seed --force

# 4) Directorios escribibles
mkdir -p bootstrap/cache \
         storage/framework/cache/data \
         storage/framework/sessions \
         storage/framework/views \
         storage/logs \
         public/uploads/projects
chmod -R 775 storage bootstrap/cache public/uploads/projects

# 5) Limpiar caches de Laravel
php artisan optimize:clear

echo "Despliegue terminado. Asegurate de que el Document Root apunte a: $(pwd)/public"
