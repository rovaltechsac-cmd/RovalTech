@extends('layouts.app')

@section('title', 'Productos | Roval Tech')
@section('description', 'Componentes electrónicos, microcontroladores, sensores, actuadores, placas de desarrollo, material eléctrico, herramientas y artículos tecnológicos.')

@section('content')

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Ruta de navegación">
            <a href="{{ route('home') }}">Inicio</a><span>/</span><span>Productos</span>
        </nav>
        <span class="eyebrow"><span class="dot"></span> Catálogo tecnológico</span>
        <h1>Componentes y tecnología para <span class="grad-text">cada proyecto</span></h1>
        <p>
            Importamos, distribuimos, ensamblamos y comercializamos componentes electrónicos, equipos,
            herramientas y artículos tecnológicos para industrias, talleres, desarrolladores y centros educativos.
        </p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head reveal">
            <span class="kicker">Nuestro catálogo</span>
            <h2>Todo lo que necesitas para construir, automatizar y mantener</h2>
            <p>Trabajamos al por mayor y al por menor. Si no encuentras un producto específico, consúltanos y lo gestionamos.</p>
        </div>

        <div class="grid-3">
            <article class="product-card reveal"><div class="icon-box icon-blue">▦</div><h3>Microcontroladores</h3><p>Controladores y placas de desarrollo para proyectos de electrónica, robótica e IoT.</p><span class="product-tag">Electrónica</span></article>
            <article class="product-card reveal"><div class="icon-box icon-cyan">◉</div><h3>Sensores</h3><p>Sensores de temperatura, proximidad, posición, presión y más para monitoreo y control.</p><span class="product-tag">Instrumentación</span></article>
            <article class="product-card reveal"><div class="icon-box icon-green">↻</div><h3>Actuadores</h3><p>Motores, servos, relés y elementos de accionamiento para sistemas automatizados.</p><span class="product-tag">Control</span></article>
            <article class="product-card reveal"><div class="icon-box icon-violet">▩</div><h3>Placas de desarrollo</h3><p>Plataformas de prototipado y desarrollo rápido para pruebas, proyectos y capacitación.</p><span class="product-tag">Desarrollo</span></article>
            <article class="product-card reveal"><div class="icon-box icon-amber">⌁</div><h3>Material eléctrico</h3><p>Cableado, conectores, fuentes, interruptores y componentes para instalaciones eléctricas.</p><span class="product-tag">Instalación</span></article>
            <article class="product-card reveal"><div class="icon-box icon-rose">▣</div><h3>Equipos de cómputo</h3><p>Computadoras, periféricos y equipos para trabajo técnico, oficina y desarrollo.</p><span class="product-tag">Cómputo</span></article>
            <article class="product-card reveal"><div class="icon-box icon-blue">⚒</div><h3>Herramientas de precisión</h3><p>Herramientas para ensamble, reparación, medición y trabajo electrónico detallado.</p><span class="product-tag">Taller</span></article>
            <article class="product-card reveal"><div class="icon-box icon-cyan">⚙</div><h3>Maquinaria industrial</h3><p>Equipos y maquinaria para procesos productivos, automatización y mantenimiento industrial.</p><span class="product-tag">Industria</span></article>
            <article class="product-card reveal"><div class="icon-box icon-green">◧</div><h3>Piezas en impresión 3D</h3><p>Chasis, carcasas, soportes y piezas personalizadas diseñadas y fabricadas a medida.</p><span class="product-tag">Fabricación</span></article>
            <article class="product-card reveal"><div class="icon-box icon-violet">☁</div><h3>Licencias de software</h3><p>Comercialización de licencias, alojamiento web y gestión de dominios para tu negocio.</p><span class="product-tag">Software</span></article>
            <article class="product-card reveal"><div class="icon-box icon-amber">⊞</div><h3>Artículos tecnológicos</h3><p>Dispositivos y accesorios tecnológicos para uso industrial, educativo y cotidiano.</p><span class="product-tag">Tecnología</span></article>
            <article class="product-card reveal"><div class="icon-box icon-rose">◇</div><h3>Kits educativos</h3><p>Conjuntos y materiales para talleres, cursos y capacitación en robótica y electrónica.</p><span class="product-tag">Educación</span></article>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container split">
        <div class="visual-panel reveal" aria-hidden="true">
            <svg viewBox="0 0 500 360" preserveAspectRatio="xMidYMid slice" fill="none">
                <circle cx="250" cy="180" r="120" stroke="#ae9357" stroke-opacity=".12"/>
                <circle cx="250" cy="180" r="84" stroke="#ae9357" stroke-opacity=".16"/>
                <rect x="176" y="110" width="148" height="140" rx="14" fill="#121317" stroke="#ae9357" stroke-opacity=".45"/>
                <rect x="192" y="128" width="116" height="70" rx="6" fill="#1c1d22"/>
                <g stroke="#ae9357" stroke-opacity=".55">
                    <path d="M204 144h92M204 158h64M204 172h80"/>
                </g>
                <g fill="#ae9357">
                    <circle cx="202" cy="218" r="6"/><circle cx="226" cy="218" r="6"/>
                    <circle cx="250" cy="218" r="6"/><circle cx="274" cy="218" r="6"/>
                    <circle cx="298" cy="218" r="6"/>
                </g>
                <g stroke="#fff0cc" stroke-opacity=".6"><path d="M202 232v28h96v-28"/></g>
            </svg>
            <div class="panel-caption">
                <div><strong>Disponibilidad a consulta</strong><small>Catálogo y tiempos de entrega según producto</small></div>
                <span class="badge">MAYOREO Y MENOREO</span>
            </div>
        </div>
        <div class="split-content reveal">
            <span class="kicker">Asesoría comercial</span>
            <h2>Encuentra el componente correcto para tu aplicación</h2>
            <p class="lead">Te ayudamos a seleccionar productos compatibles con tu proyecto, considerando rendimiento, disponibilidad y presupuesto.</p>
            <ul class="check-list">
                <li>Venta al por mayor y al por menor.</li>
                <li>Importación, exportación y distribución.</li>
                <li>Ensamblaje y configuración según requerimientos.</li>
                <li>Soporte técnico posterior a la compra.</li>
            </ul>
            <div style="margin-top:30px;"><a href="{{ route('contacto') }}" class="btn btn-ghost btn-arrow">Consultar disponibilidad</a></div>
        </div>
    </div>
</section>

<section class="section section-cta">
    <div class="container">
        <div class="cta-band reveal">
            <div>
                <h2>¿Buscas un producto o proveedor específico?</h2>
                <p>Envíanos tu solicitud y te indicamos disponibilidad, alternativas y tiempos de entrega.</p>
            </div>
            <a href="{{ route('contacto') }}" class="btn btn-arrow">Consultar ahora</a>
        </div>
    </div>
</section>

@endsection
