@extends('layouts.app')

@section('title', 'Quiénes somos | Roval Tech')
@section('description', 'Conoce la misión, visión, valores y objeto social de Roval Tech: ingeniería mecatrónica, electrónica, robótica y soluciones tecnológicas.')

@section('content')

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Ruta de navegación">
            <a href="{{ route('home') }}">Inicio</a><span>/</span><span>Quiénes somos</span>
        </nav>
        <span class="eyebrow"><span class="dot"></span> Sobre Roval Tech</span>
        <h1>Ingeniería con propósito,<br><span class="grad-text">tecnología con resultados</span></h1>
        <p>
            Somos una empresa dedicada a prestar servicios de ingeniería mecatrónica y electrónica,
            combinando conocimiento técnico, creatividad y compromiso para solucionar retos reales
            en la industria, los negocios y la vida cotidiana.
        </p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="mission-grid">
            <article class="mission-card reveal">
                <div class="icon-box icon-blue">◎</div>
                <h3>Nuestra misión</h3>
                <p>
                    Brindar soluciones tecnológicas integrales en automatización, robótica, electrónica
                    y desarrollo de software, acompañando a nuestros clientes desde la idea hasta la
                    operación, con calidad, precisión y atención personalizada.
                </p>
            </article>
            <article class="mission-card reveal">
                <div class="icon-box icon-cyan">✦</div>
                <h3>Nuestra visión</h3>
                <p>
                    Ser un aliado tecnológico de confianza en el ámbito de la ingeniería aplicada,
                    reconocido por nuestra capacidad de innovar, integrar disciplinas y entregar
                    proyectos que impulsen la productividad y el crecimiento de nuestros clientes.
                </p>
            </article>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="section-head reveal">
            <span class="kicker">Nuestro compromiso</span>
            <h2>Por qué elegir Roval Tech</h2>
            <p>Trabajamos con una metodología clara y un equipo enfocado en entender tu operación antes de proponer cualquier solución.</p>
        </div>
        <div class="grid-3">
            <div class="info-tile reveal"><div class="icon-box icon-violet">◈</div><h3>Enfoque integral</h3><p>Integramos mecánica, electrónica, control y software en una sola solución coherente.</p></div>
            <div class="info-tile reveal"><div class="icon-box icon-green">↗</div><h3>Innovación aplicada</h3><p>Usamos tecnología actual y práctica, seleccionada según el problema que hay que resolver.</p></div>
            <div class="info-tile reveal"><div class="icon-box icon-amber">◷</div><h3>Compromiso y seguimiento</h3><p>Acompañamos la puesta en marcha, el mantenimiento y la capacitación de tu equipo.</p></div>
            <div class="info-tile reveal"><div class="icon-box icon-blue">▤</div><h3>Documentación clara</h3><p>Entregamos expedientes técnicos, estudios y cotizaciones fáciles de evaluar.</p></div>
            <div class="info-tile reveal"><div class="icon-box icon-rose">⌁</div><h3>Flexibilidad</h3><p>Adaptamos el alcance del proyecto a tus objetivos, tiempos y recursos disponibles.</p></div>
            <div class="info-tile reveal"><div class="icon-box icon-cyan">⬡</div><h3>Conocimiento compartido</h3><p>Capacitamos y formamos equipos para que aprovechen al máximo cada sistema implementado.</p></div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head reveal">
            <span class="kicker">Objeto social</span>
            <h2>A qué nos dedicamos</h2>
            <p class="object-intro" style="margin-bottom:0;">
                Nuestra actividad empresarial comprende las siguientes áreas y servicios, conforme a nuestro objeto social:
            </p>
        </div>

        <div class="object-grid">
            <div class="object-item reveal"><span class="num">01</span><div><h3>Ingeniería mecatrónica y electrónica</h3><p>Prestación de servicios de ingeniería mecatrónica y electrónica.</p></div></div>
            <div class="object-item reveal"><span class="num">02</span><div><h3>Automatización y control</h3><p>Diseño, desarrollo, implementación y supervisión de sistemas de automatización industrial, control de procesos y domótica.</p></div></div>
            <div class="object-item reveal"><span class="num">03</span><div><h3>Proyectos tecnológicos y robótica</h3><p>Elaboración, gestión y ejecución de proyectos tecnológicos y de robótica.</p></div></div>
            <div class="object-item reveal"><span class="num">04</span><div><h3>Consultoría y asesoría</h3><p>Prestación de servicios de consultoría y asesoría en las actividades ya mencionadas.</p></div></div>
            <div class="object-item reveal"><span class="num">05</span><div><h3>Estudios y documentación técnica</h3><p>Elaboración de estudios de factibilidad, expedientes técnicos y cotizaciones para proyectos de ingeniería.</p></div></div>
            <div class="object-item reveal"><span class="num">06</span><div><h3>Mantenimiento y reparación</h3><p>Servicios de mantenimiento preventivo y correctivo; reparación y configuración de equipos electrónicos y sistemas automatizados.</p></div></div>
            <div class="object-item reveal"><span class="num">07</span><div><h3>Desarrollo de software</h3><p>Diseño, desarrollo, programación, implementación y mantenimiento de páginas web, aplicaciones móviles y sistemas de información a medida.</p></div></div>
            <div class="object-item reveal"><span class="num">08</span><div><h3>Integración hardware – software</h3><p>Integración de soluciones de software con hardware para el monitoreo y control de dispositivos.</p></div></div>
            <div class="object-item reveal"><span class="num">09</span><div><h3>Licencias y servicios web</h3><p>Comercialización de licencias de software y prestación de servicios de alojamiento web y gestión de dominios.</p></div></div>
            <div class="object-item reveal"><span class="num">10</span><div><h3>Componentes y artículos tecnológicos</h3><p>Importación, exportación, distribución, ensamblaje y comercialización al por mayor y menor de componentes electrónicos, microcontroladores, sensores, actuadores, placas de desarrollo, material eléctrico, equipos de cómputo, herramientas de precisión, maquinaria industrial y artículos tecnológicos.</p></div></div>
            <div class="object-item reveal"><span class="num">11</span><div><h3>Impresión 3D</h3><p>Diseño y fabricación de chasis y piezas mediante impresión 3D.</p></div></div>
            <div class="object-item reveal"><span class="num">12</span><div><h3>Capacitación y formación</h3><p>Prestación de servicios de capacitación en mecatrónica, electrónica, robótica, programación, automatización e impresión 3D. Organización y dictado de cursos, talleres, seminarios y conferencias relacionados con el objeto social de la empresa.</p></div></div>
        </div>
    </div>
</section>

<section class="section section-dark">
    <div class="container">
        <div class="section-head reveal">
            <span class="kicker">Nuestros valores</span>
            <h2>Lo que guía cada proyecto</h2>
        </div>
        <div class="values-grid">
            <div class="value-card reveal"><div class="icon-box icon-cyan">◇</div><h3>Innovación</h3><p>Buscamos formas mejores y más inteligentes de resolver cada reto técnico.</p></div>
            <div class="value-card reveal"><div class="icon-box icon-blue">⊕</div><h3>Precisión</h3><p>Atención al detalle en cada diseño, cálculo, programación y puesta en marcha.</p></div>
            <div class="value-card reveal"><div class="icon-box icon-green">♙</div><h3>Compromiso</h3><p>Responsabilidad con los resultados y con las personas que confían en nosotros.</p></div>
            <div class="value-card reveal"><div class="icon-box icon-amber">⌘</div><h3>Seguridad</h3><p>Procedimientos y soluciones pensados para proteger personas, equipos y procesos.</p></div>
        </div>
    </div>
</section>

<section class="section section-cta">
    <div class="container">
        <div class="cta-band reveal">
            <div>
                <h2>Conozcamos tu reto</h2>
                <p>Estamos listos para analizar tu proyecto y proponerte una solución a la medida.</p>
            </div>
            <a href="{{ route('contacto') }}" class="btn btn-arrow">Contactar ahora</a>
        </div>
    </div>
</section>

@endsection
