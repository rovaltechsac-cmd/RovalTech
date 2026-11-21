# Roval Tech

Sitio web corporativo de Roval Tech desarrollado en **Laravel 8** (compatible con PHP 8.0).
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
