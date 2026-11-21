# Roval Tech

Sitio web corporativo de Roval Tech desarrollado en **Laravel 8** (compatible con PHP 7.3 a 8.4; probado en PHP 8.3 y 8.4).
Incluye interfaz publicitaria, quiénes somos, servicios, productos, catálogo de proyectos y
panel de administración con inicio de sesión.

## Características

- Diseño dark editorial "midnight vault" con acento cobrizo y tipografía serif/sans.
- Páginas: Inicio, Quiénes somos, Servicios, Productos, Proyectos y Contacto.
- Proyectos de ejemplo: **Robot Soccer**, **Robot Sumo**, línea de producción automatizada y sistema domótico.
- Panel `/admin/proyectos` para crear, editar, eliminar, destacar y activar/desactivar la publicación de proyectos.
- Cada proyecto inactivo desaparece del sitio público y su detalle devuelve 404.
- Formulario de contacto con validación (no envía correos ni guarda mensajes).

## Instalación

```bash
composer install
cp .env.example .env
php artisan key:generate

# La base de datos SQLite ya está incluida en database/database.sqlite
php artisan migrate
php artisan db:seed

php artisan serve
```

Abre <http://127.0.0.1:8000>.

Si prefieres recrear la base de datos desde cero:

```bash
type nul > database/database.sqlite   # Windows
php artisan migrate --seed
```

## Acceso al panel

```
URL:         http://127.0.0.1:8000/login
Correo:      admin@rovaltech.com
Contraseña:  rovaltech2026
```

> Cambia estas credenciales antes de desplegar en producción.

## Rutas principales

| Ruta | Descripción |
|------|-------------|
| `/` | Portada |
| `/nosotros` | Misión, visión, valores y objeto social |
| `/servicios` | Catálogo de servicios |
| `/productos` | Catálogo de productos |
| `/proyectos` | Proyectos publicados |
| `/proyectos/{slug}` | Detalle de un proyecto |
| `/contacto` | Formulario de contacto |
| `/login` | Inicio de sesión |
| `/admin/proyectos` | Panel de administración |

## Datos de contacto

Los datos de contacto de la plantilla son de ejemplo (`contacto@rovaltech.com`,
`+52 55 0000 0000`). Reemplázalos en `resources/views/contacto.blade.php` y
`resources/views/layouts/app.blade.php`.

## Requisitos del servidor

- **PHP 7.3 – 8.4**. El proyecto funciona con **PHP 8.3** sin cambiar de versión en el hosting. Verificado localmente con PHP 8.4 (más estricto que 8.3): portada, todas las páginas, login y detalle de proyectos responden 200.
- Extensiones: `mbstring`, `openssl`, `pdo_sqlite` (o `pdo_mysql`), `tokenizer`, `xml`, `ctype`, `json`, `fileinfo`, `curl`.
- Si el hosting no tiene `fileinfo`, `setup.php` instala con `--ignore-platform-req=ext-fileinfo`; aun así conviene activar la extensión para poder subir imágenes.
- Laravel 8 puede emitir avisos de *deprecación* en PHP 8.x: **no afectan el funcionamiento**. En producción (`APP_DEBUG=false`) la aplicación los omite durante la ejecución para reducir el ruido en `storage/logs/laravel.log`.

## Despliegue en hosting con Git Version Control (cPanel)

El repositorio ya está listo para clonarse desde el hosting:

```
Clone URL: https://github.com/rovaltechsac-cmd/RovalTech.git
Branch:    main
```

### 1. Crear el repositorio en cPanel

1. **Git Version Control** → **Create**
2. *Clone URL*: la URL de arriba
3. *Branch*: `main`
4. *Repository Path*: por ejemplo `/home/TU_USUARIO/repos/rovaltech`
5. En **Document Root** de tu dominio (o subdominio) apunta a:

```
/home/TU_USUARIO/repos/rovaltech/public
```

> Laravel solo expone `public/`. Nunca apuntes el dominio a la raíz del repo.

### 2. Comando de despliegue

En la misma pantalla de cPanel, en *Deployment Command* pon:

```bash
bash deploy.sh
```

El script `deploy.sh` instala dependencias, crea `.env` si no existe, genera
`APP_KEY`, migra, siembra los datos de ejemplo y ajusta permisos.

### 3. Configuración manual (solo la primera vez)

Entra por SSH a tu hosting y, dentro del repo:

```bash
cp .env.example .env
nano .env
```

Ajusta al menos:

- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_URL=https://tu-dominio.com`
- Datos de base de datos (SQLite funciona; para MySQL descomenta las líneas en `.env.example`)

Luego ejecuta:

```bash
bash deploy.sh
```

### 4. Verificación

- Abre `https://tu-dominio.com` → debe cargar la portada.
- `/login` → `admin@rovaltech.com` / `rovaltech2026` (cámbialo antes de publicar).
- `/admin/proyectos` → panel con los radios **Activo / Inactivo**.

### Notas

- `.env` y `/vendor` **no** están en el repositorio (están en `.gitignore`).
- `database/database.sqlite` tampoco se versiona: se crea automáticamente en el hosting.
- Las imágenes que subas desde el panel se guardan en `public/uploads/projects/`
  y ese directorio se respeta en futuros `pull` (su `.gitignore` ignora el contenido).
- El seeder usa `firstOrCreate`: no sobrescribe proyectos ni contraseñas que ya edits en producción.

### Si tu hosting sirve la URL con `/rovalTech`

Cuando el repo se clona en `public_html/rovalTech` y no puedes cambiar el
*Document Root*, deja los archivos `index.php` y `.htaccess` que están en la
raíz del repo: redirigen las peticiones a `public/` y bloquean el acceso a
`.env`, `vendor/`, `app/`, etc.

En ese caso configura en `.env`:

```env
APP_URL=https://kipucloud.com/rovalTech
```

Y accede a `https://kipucloud.com/rovalTech/`.

> Igualmente debes completar una vez por SSH: `cp .env.example .env`,
> `php artisan key:generate`, `php artisan migrate --force` y
> `bash deploy.sh`. Si `/rovalTech/public/` daba error 500, revisa
> `storage/logs/laravel.log`: casi siempre es `APP_KEY` vacío, falta de
> `vendor/` o permisos de `storage/`.

### Volver a PHP 8.3

El proyecto ya está declarado para PHP 8.3 en `composer.json` (`config.platform.php`)
y fue verificado con PHP 8.4. Puedes volver a seleccionar **PHP 8.3** en
cPanel → *Select PHP Version* sin reinstalar nada: `vendor/`, `.env` y la base de
datos son los mismos. Después de cambiar la versión ejecuta:

```bash
php artisan optimize:clear
```

Si algo falla, revisa `storage/logs/laravel.log`.
