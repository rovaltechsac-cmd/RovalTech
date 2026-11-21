<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', 'Soluciones de ingeniería mecatrónica, electrónica, automatización industrial, robótica y desarrollo de software a medida.')">
    <meta name="theme-color" content="#08080a">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}?v=2">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500&display=swap" rel="stylesheet">
    <title>@yield('title', 'Roval Tech | Ingeniería, Automatización y Tecnología')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=2">
</head>
<body class="slash-theme">
    <div class="scroll-progress" id="scrollProgress" aria-hidden="true"></div>

    <header class="site-header" id="siteHeader">
        <div class="container navbar">
            <a href="{{ route('home') }}" class="brand brand-logo" aria-label="Roval Tech - Inicio">
                <img src="{{ asset('images/logo.png') }}?v=2" alt="Roval Tech">
            </a>

            <nav class="nav-links" id="navLinks" aria-label="Navegación principal">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Inicio</a>
                <a href="{{ route('nosotros') }}" class="{{ request()->routeIs('nosotros') ? 'active' : '' }}">Quiénes somos</a>
                <a href="{{ route('servicios') }}" class="{{ request()->routeIs('servicios') ? 'active' : '' }}">Servicios</a>
                <a href="{{ route('proyectos.index') }}" class="{{ request()->routeIs('proyectos.*', 'admin.*') ? 'active' : '' }}">Proyectos</a>
                <a href="{{ route('productos') }}" class="{{ request()->routeIs('productos') ? 'active' : '' }}">Productos</a>
                <a href="{{ route('contacto') }}" class="{{ request()->routeIs('contacto') ? 'active' : '' }}">Contacto</a>

                @guest
                    <a href="{{ route('login') }}" class="btn btn-ghost btn-small nav-login">Ingresar</a>
                    <a href="{{ route('contacto') }}" class="btn btn-primary btn-small nav-cta">Solicitar cotización</a>
                @else
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary btn-small nav-cta">Panel</a>
                    <form method="POST" action="{{ route('logout') }}" class="nav-logout">
                        @csrf
                        <button type="submit" class="btn btn-ghost btn-small">Salir</button>
                    </form>
                @endguest
            </nav>

            <button class="menu-toggle" id="menuToggle" type="button" aria-label="Abrir menú" aria-expanded="false" aria-controls="navLinks">
                <span></span><span></span><span></span>
            </button>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container footer-grid">
            <div class="footer-brand">
                <a href="{{ route('home') }}" class="brand brand-logo brand-logo-footer" aria-label="Roval Tech - Inicio">
                    <img src="{{ asset('images/logo.png') }}?v=2" alt="Roval Tech">
                </a>
                <p>Ingeniería mecatrónica y electrónica para convertir ideas en soluciones tecnológicas reales.</p>
                <div class="footer-social" aria-label="Redes sociales">
                    <a href="#" aria-label="Facebook">f</a>
                    <a href="#" aria-label="LinkedIn">in</a>
                    <a href="#" aria-label="Instagram">ig</a>
                </div>
            </div>

            <div class="footer-col">
                <h3>Navegación</h3>
                <a href="{{ route('home') }}">Inicio</a>
                <a href="{{ route('nosotros') }}">Quiénes somos</a>
                <a href="{{ route('servicios') }}">Servicios</a>
                <a href="{{ route('productos') }}">Productos</a>
                <a href="{{ route('contacto') }}">Contacto</a>
            </div>

            <div class="footer-col">
                <h3>Especialidades</h3>
                <a href="{{ route('servicios') }}">Automatización industrial</a>
                <a href="{{ route('servicios') }}">Robótica y control</a>
                <a href="{{ route('servicios') }}">Software a medida</a>
                <a href="{{ route('servicios') }}">Impresión 3D</a>
                <a href="{{ route('servicios') }}">Capacitación técnica</a>
            </div>

            <div class="footer-col">
                <h3>Proyectos</h3>
                <a href="{{ route('proyectos.index') }}">Todos los proyectos</a>
                <a href="{{ route('proyectos.show', 'robot-soccer') }}">Robot Soccer</a>
                <a href="{{ route('proyectos.show', 'robot-sumo') }}">Robot Sumo</a>
                <a href="{{ route('proyectos.show', 'linea-de-produccion-automatizada') }}">Automatización industrial</a>
                @auth
                    <a href="{{ route('admin.projects.index') }}">Administrar</a>
                @else
                    <a href="{{ route('login') }}">Ingresar</a>
                @endauth
            </div>

            <div class="footer-col">
                <h3>Contacto</h3>
                <a href="mailto:contacto@rovaltech.com">contacto@rovaltech.com</a>
                <a href="tel:+525500000000">+52 55 0000 0000</a>
                <span>Lunes a viernes · 9:00 a 18:00</span>
                <span>México</span>
            </div>
        </div>
        <div class="container footer-bottom">
            <p>&copy; {{ date('Y') }} Roval Tech. Todos los derechos reservados.</p>
            <p>Midnight vault · Gilded ledger lines.</p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}?v=2"></script>
</body>
</html>
