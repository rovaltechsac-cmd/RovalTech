@extends('layouts.app')

@section('title', 'Servicios | Roval Tech')
@section('description', 'Servicios de Roval Tech: automatización industrial, robótica, consultoría, mantenimiento, desarrollo de software, impresión 3D y capacitación.')

@section('content')

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Ruta de navegación">
            <a href="{{ route('home') }}">Inicio</a><span>/</span><span>Servicios</span>
        </nav>
        <span class="eyebrow"><span class="dot"></span> Lo que hacemos</span>
        <h1>Servicios diseñados para <span class="grad-text">hacer tu operación avanzar</span></h1>
        <p>
            Ofrecemos soluciones de ingeniería, automatización, robótica, software y soporte técnico,
            integradas para responder a necesidades reales de producción, control, conectividad y formación.
        </p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="service-group-title reveal"><span class="group-icon">⚙</span><h2>Ingeniería y automatización</h2></div>

        <div class="grid-3">
            <article class="service-card reveal">
                <div class="icon-box icon-blue">⌁</div>
                <h3>Ingeniería mecatrónica y electrónica</h3>
                <p>Prestación de servicios especializados que integran mecánica, electrónica y control para resolver necesidades industriales y tecnológicas.</p>
            </article>
            <article class="service-card reveal">
                <div class="icon-box icon-cyan">◉</div>
                <h3>Automatización industrial</h3>
                <p>Diseño, desarrollo, implementación y supervisión de sistemas de automatización industrial y control de procesos.</p>
            </article>
            <article class="service-card reveal">
                <div class="icon-box icon-violet">⌂</div>
                <h3>Domótica</h3>
                <p>Implementación de sistemas inteligentes para el control y la automatización de espacios y edificios.</p>
            </article>
            <article class="service-card reveal">
                <div class="icon-box icon-green">⬡</div>
                <h3>Proyectos de robótica</h3>
                <p>Elaboración, gestión y ejecución de proyectos tecnológicos y de robótica adaptados a cada aplicación.</p>
            </article>
        </div>

        <div class="service-group-title reveal"><span class="group-icon">▤</span><h2>Ingeniería aplicada y consultoría</h2></div>

        <div class="grid-3">
            <article class="service-card reveal">
                <div class="icon-box icon-blue">◇</div>
                <h3>Consultoría y asesoría</h3>
                <p>Acompañamiento técnico en ingeniería, automatización, electrónica, robótica y desarrollo de soluciones tecnológicas.</p>
            </article>
            <article class="service-card reveal">
                <div class="icon-box icon-amber">▧</div>
                <h3>Estudios de factibilidad</h3>
                <p>Elaboración de estudios de factibilidad, expedientes técnicos y cotizaciones para proyectos de ingeniería.</p>
            </article>
            <article class="service-card reveal">
                <div class="icon-box icon-rose">✎</div>
                <h3>Supervisión de proyectos</h3>
                <p>Seguimiento técnico durante la ejecución para asegurar que cada etapa cumpla con los requerimientos definidos.</p>
            </article>
        </div>

        <div class="service-group-title reveal"><span class="group-icon">▣</span><h2>Software y conectividad</h2></div>

        <div class="grid-3">
            <article class="service-card reveal">
                <div class="icon-box icon-blue">▣</div>
                <h3>Desarrollo web y móvil</h3>
                <p>Diseño, desarrollo, programación, implementación y mantenimiento de páginas web, aplicaciones móviles y sistemas de información a medida.</p>
            </article>
            <article class="service-card reveal">
                <div class="icon-box icon-cyan">⇄</div>
                <h3>Integración software – hardware</h3>
                <p>Integración de soluciones de software con hardware para el monitoreo y control de dispositivos en tiempo real.</p>
            </article>
            <article class="service-card reveal">
                <div class="icon-box icon-violet">☁</div>
                <h3>Licencias, hosting y dominios</h3>
                <p>Comercialización de licencias de software y prestación de servicios de alojamiento web y gestión de dominios.</p>
            </article>
        </div>

        <div class="service-group-title reveal"><span class="group-icon">✚</span><h2>Soporte, fabricación y formación</h2></div>

        <div class="grid-3">
            <article class="service-card reveal">
                <div class="icon-box icon-amber">✚</div>
                <h3>Mantenimiento preventivo y correctivo</h3>
                <p>Atención planificada y correctiva para mantener el rendimiento y la disponibilidad de tus equipos y sistemas.</p>
            </article>
            <article class="service-card reveal">
                <div class="icon-box icon-rose">⚒</div>
                <h3>Reparación y configuración</h3>
                <p>Reparación y configuración de equipos electrónicos y sistemas automatizados.</p>
            </article>
            <article class="service-card reveal">
                <div class="icon-box icon-green">◧</div>
                <h3>Impresión 3D</h3>
                <p>Diseño y fabricación de chasis y piezas mediante impresión 3D para prototipos, reposiciones y desarrollos a medida.</p>
            </article>
            <article class="service-card reveal">
                <div class="icon-box icon-blue">◈</div>
                <h3>Capacitación técnica</h3>
                <p>Cursos, talleres, seminarios y conferencias en mecatrónica, electrónica, robótica, programación, automatización e impresión 3D.</p>
            </article>
            <article class="service-card reveal">
                <div class="icon-box icon-cyan">⬗</div>
                <h3>Componentes y suministros</h3>
                <p>Distribución y comercialización de componentes electrónicos, microcontroladores, sensores, actuadores y material eléctrico.</p>
            </article>
            <article class="service-card reveal">
                <div class="icon-box icon-violet">⊞</div>
                <h3>Equipos y herramientas</h3>
                <p>Ensamblaje y comercialización de placas de desarrollo, equipos de cómputo, herramientas de precisión y maquinaria industrial.</p>
            </article>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container split">
        <div class="split-content reveal">
            <span class="kicker">Trabajemos juntos</span>
            <h2>¿Necesitas una solución específica?</h2>
            <p class="lead">Cuéntanos tu caso. Analizamos cada solicitud y te proponemos una alternativa técnica clara, con alcance y presupuesto definidos.</p>
            <ul class="check-list">
                <li>Evaluación inicial sin compromiso de tu necesidad.</li>
                <li>Propuesta técnica y cotización detallada.</li>
                <li>Ejecución, seguimiento y soporte posterior.</li>
            </ul>
            <div style="margin-top:30px;"><a href="{{ route('contacto') }}" class="btn btn-ghost btn-arrow">Solicitar una cotización</a></div>
        </div>
        <div class="visual-panel reveal" aria-hidden="true">
            <svg viewBox="0 0 500 360" preserveAspectRatio="xMidYMid slice" fill="none">
                <rect x="70" y="80" width="360" height="200" rx="18" fill="#121317" stroke="#ae9357" stroke-opacity=".35"/>
                <rect x="96" y="108" width="308" height="26" rx="7" fill="#1c1d22"/>
                <text x="112" y="126" fill="#fff0cc" font-size="12" font-family="monospace">PROYECTO / RT-2026</text>
                <g fill="#1c1d22" stroke="#ae9357" stroke-opacity=".28">
                    <rect x="96" y="152" width="92" height="52" rx="8"/>
                    <rect x="204" y="152" width="92" height="52" rx="8"/>
                    <rect x="312" y="152" width="92" height="52" rx="8"/>
                </g>
                <g fill="#fff0cc" font-size="11" font-family="monospace" text-anchor="middle">
                    <text x="142" y="184">DISEÑO</text><text x="250" y="184">BUILD</text><text x="358" y="184">TEST</text>
                </g>
                <path d="M188 178h16m92 0h16" stroke="#ae9357" stroke-width="2"/>
                <rect x="96" y="222" width="308" height="10" rx="5" fill="#121317"/>
                <rect x="96" y="222" width="230" height="10" rx="5" fill="#ae9357" opacity=".75"/>
            </svg>
            <div class="panel-caption">
                <div><strong>Proceso transparente</strong><small>Planeación, ejecución y entrega</small></div>
                <span class="badge">A MEDIDA</span>
            </div>
        </div>
    </div>
</section>

@endsection
