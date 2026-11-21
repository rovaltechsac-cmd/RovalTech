@extends('layouts.app')

@section('title', 'Roval Tech | Ingeniería, Automatización y Tecnología')
@section('description', 'Roval Tech: ingeniería mecatrónica, electrónica, automatización industrial, robótica, software a medida, impresión 3D y capacitación técnica.')

@section('content')

<section class="hero">
    <div class="container hero-inner">
        <div class="hero-copy">
            <span class="eyebrow"><span class="dot"></span> Ingeniería aplicada a tu industria</span>
            <h1>Transformamos ideas en <span class="grad-text">soluciones inteligentes</span></h1>
            <p class="hero-lead">
                En <strong>Roval Tech</strong> diseñamos, desarrollamos e implementamos sistemas de
                automatización, robótica, electrónica y software a medida para que tus procesos
                operen con precisión, eficiencia y confiabilidad.
            </p>
            <div class="hero-actions">
                <a href="{{ route('servicios') }}" class="btn btn-primary btn-arrow">Explorar servicios</a>
                <a href="{{ route('contacto') }}" class="btn btn-ghost">Hablemos de tu proyecto</a>
            </div>
            <div class="hero-meta">
                <span>Mecatrónica y electrónica</span>
                <span>Software a medida</span>
                <span>Soporte técnico</span>
            </div>
        </div>

        <div class="hero-visual" aria-hidden="true">
            <div class="mock-card">
                <div class="mock-top"><i></i><i></i><i></i><span>ROVAL / CONTROL CENTER</span></div>
                <div class="mock-body">
                    <div class="mock-heading">
                        <div>
                            <strong>Monitoreo de sistemas</strong>
                            <small>LÍNEA DE PRODUCCIÓN 01</small>
                        </div>
                        <span class="live-badge">EN VIVO</span>
                    </div>

                    <svg class="circuit-svg" viewBox="0 0 520 240" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="gildedGradient" x1="0" y1="0" x2="520" y2="0" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#ae9357"/>
                                <stop offset="0.4" stop-color="#fff0cc"/>
                                <stop offset="0.7" stop-color="#ae9357"/>
                                <stop offset="1" stop-color="#bd9d4f" stop-opacity="0"/>
                            </linearGradient>
                        </defs>
                        <path class="circuit-muted" d="M16 52H86L116 82H188L216 54H304" stroke-width="1.5"/>
                        <path class="gilded-line" d="M16 122H132L164 154H250L282 122H504" stroke-width="2"/>
                        <path class="circuit-muted" d="M16 190H76L108 158H166" stroke-width="1.5"/>
                        <path class="circuit-muted" d="M364 54H420L452 86H504" stroke-width="1.5" opacity=".6"/>
                        <path class="circuit-muted" d="M304 190H362L394 158H504" stroke-width="1.5" opacity=".6"/>
                        <rect class="circuit-box" x="216" y="82" width="104" height="76" rx="10" stroke-width="1.5"/>
                        <rect x="228" y="94" width="80" height="22" rx="5" fill="#1c1d22"/>
                        <text class="circuit-text" x="268" y="109" font-size="10" text-anchor="middle">PLC · RT-01</text>
                        <g class="circuit-node">
                            <circle cx="268" cy="136" r="6" opacity=".9"/>
                            <circle cx="288" cy="136" r="6" opacity=".35"/>
                            <circle cx="248" cy="136" r="6" opacity=".35"/>
                            <circle cx="116" cy="82" r="4"/><circle cx="188" cy="82" r="4"/>
                            <circle cx="132" cy="122" r="4"/><circle cx="164" cy="154" r="4"/>
                            <circle cx="250" cy="154" r="4"/><circle cx="282" cy="122" r="4"/>
                            <circle cx="420" cy="54" r="4"/><circle cx="452" cy="86" r="4"/>
                        </g>
                        <g class="circuit-text" font-size="9" font-family="monospace">
                            <text x="18" y="44">SENSOR TEMP.</text>
                            <text x="18" y="114">ACTUADOR 02</text>
                            <text x="18" y="182">MOTOR A1</text>
                            <text x="430" y="48">HMI</text>
                        </g>
                        <circle cx="164" cy="154" r="9" fill="none" stroke="#ae9357" stroke-width="1" opacity=".5">
                            <animate attributeName="r" values="7;15;7" dur="2.6s" repeatCount="indefinite"/>
                            <animate attributeName="opacity" values=".6;0;.6" dur="2.6s" repeatCount="indefinite"/>
                        </circle>
                    </svg>

                    <div class="mock-bars">
                        <div class="mock-bar"><b>98.4%</b><small>EFICIENCIA</small></div>
                        <div class="mock-bar"><b>24/7</b><small>MONITOREO</small></div>
                        <div class="mock-bar"><b>0.02s</b><small>LATENCIA</small></div>
                    </div>
                </div>
            </div>

            <div class="float-chip top">
                <span class="chip-icon">⚙</span>
                <span>Automatización<small>Control de procesos</small></span>
            </div>
            <div class="float-chip bottom">
                <span class="chip-icon">⬡</span>
                <span>Robótica<small>Proyectos a medida</small></span>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head reveal">
            <span class="kicker">Qué hacemos</span>
            <h2>Soluciones integrales para cada reto técnico</h2>
            <p>Cubrimos todo el ciclo: desde el análisis y el diseño hasta la implementación, la puesta en marcha y el soporte continuo.</p>
        </div>

        <div class="grid-3">
            <article class="service-card hover-card reveal">
                <div class="icon-box icon-blue">⚙</div>
                <h3>Automatización industrial</h3>
                <p>Diseño, desarrollo, implementación y supervisión de sistemas de automatización y control de procesos.</p>
                <a class="card-link" href="{{ route('servicios') }}">Ver detalle <span>→</span></a>
            </article>
            <article class="service-card hover-card reveal">
                <div class="icon-box icon-cyan">⬡</div>
                <h3>Robótica y proyectos tecnológicos</h3>
                <p>Elaboración, gestión y ejecución de proyectos de robótica e ingeniería adaptados a tus necesidades.</p>
                <a class="card-link" href="{{ route('servicios') }}">Ver detalle <span>→</span></a>
            </article>
            <article class="service-card hover-card reveal">
                <div class="icon-box icon-violet">◈</div>
                <h3>Ingeniería y consultoría</h3>
                <p>Estudios de factibilidad, expedientes técnicos, cotizaciones y asesoría especializada en ingeniería.</p>
                <a class="card-link" href="{{ route('servicios') }}">Ver detalle <span>→</span></a>
            </article>
        </div>

        <div style="text-align:center;margin-top:36px;" class="reveal">
            <a href="{{ route('servicios') }}" class="card-link" style="margin:0;">Ver los 12 servicios <span>→</span></a>
        </div>
    </div>
</section>

@if ($projects->count())
<section class="section section-dark">
    <div class="container">
        <div class="section-head reveal">
            <span class="kicker">Proyectos destacados</span>
            <h2>Ingeniería en acción</h2>
            <p>Robótica, automatización y sistemas a medida desarrollados por el equipo de Roval Tech.</p>
        </div>

        <div class="project-grid">
            @foreach ($projects as $project)
                <article class="project-card hover-card reveal">
                    <a href="{{ route('proyectos.show', $project->slug) }}" class="project-media" aria-label="Ver {{ $project->title }}">
                        @if ($project->image)
                            <img src="{{ $project->imageUrl() }}" alt="{{ $project->title }}" loading="lazy">
                        @else
                            <span class="project-glyph" aria-hidden="true">{{ mb_substr($project->title, 0, 1) }}</span>
                        @endif
                    </a>
                    <div class="project-body">
                        <span class="pill pill-copper" style="align-self:flex-start;">{{ $project->category }}</span>
                        <h3 style="margin-top:14px;">{{ $project->title }}</h3>
                        <p>{{ $project->summary }}</p>
                        <div class="project-meta">
                            <span>{{ $project->year ?: 'Roval Tech' }}</span>
                            <a href="{{ route('proyectos.show', $project->slug) }}">Ver proyecto →</a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div style="text-align:center;margin-top:32px;">
            <a href="{{ route('proyectos.index') }}" class="btn btn-ghost btn-arrow">Ver todos los proyectos</a>
        </div>
    </div>
</section>
@endif

<section class="section section-soft">
    <div class="container split">
        <div class="split-content reveal">
            <span class="kicker">Nuestro enfoque</span>
            <h2>Tecnología que se adapta a tu operación</h2>
            <p class="lead">
                No ofrecemos soluciones genéricas. Cada proyecto comienza con una comprensión clara de tu
                proceso, tus restricciones y tus objetivos para entregar un sistema que realmente aporte valor.
            </p>
            <ul class="check-list">
                <li>Diseñamos e implementamos sistemas de control y domótica según tus requerimientos.</li>
                <li>Integramos hardware y software para monitoreo y control en tiempo real.</li>
                <li>Elaboramos documentación técnica, estudios de factibilidad y cotizaciones claras.</li>
                <li>Acompañamos con mantenimiento, reparación y capacitación a tu equipo.</li>
            </ul>
            <div style="margin-top:30px;">
                <a href="{{ route('nosotros') }}" class="btn btn-ghost btn-arrow">Conoce Roval Tech</a>
            </div>
        </div>

        <div class="visual-panel reveal" aria-hidden="true">
            <svg viewBox="0 0 500 360" preserveAspectRatio="xMidYMid slice" fill="none">
                <circle cx="250" cy="180" r="128" stroke="#ae9357" stroke-opacity=".12"/>
                <circle cx="250" cy="180" r="92" stroke="#ae9357" stroke-opacity=".18"/>
                <rect x="150" y="270" width="200" height="18" rx="6" fill="#121317" stroke="#ae9357" stroke-opacity=".4"/>
                <rect x="202" y="248" width="96" height="22" rx="6" fill="#1c1d22" stroke="#ae9357" stroke-opacity=".5"/>
                <path d="M250 248V196L306 150" stroke="#fff0cc" stroke-width="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M306 150L360 108" stroke="#fff0cc" stroke-width="8" stroke-linecap="round"/>
                <circle cx="250" cy="196" r="16" fill="#040406" stroke="#ae9357" stroke-width="2"/>
                <circle cx="306" cy="150" r="14" fill="#040406" stroke="#ae9357" stroke-width="2"/>
                <circle cx="250" cy="248" r="12" fill="#040406" stroke="#ae9357" stroke-width="2"/>
                <path d="M360 108l-8-22m8 22l22-6m-22 6l4 24" stroke="#ae9357" stroke-width="4" stroke-linecap="round"/>
                <g fill="#ae9357" opacity=".7">
                    <circle cx="120" cy="112" r="4"/><circle cx="390" cy="220" r="4"/>
                    <circle cx="110" cy="230" r="4"/><circle cx="410" cy="92" r="4"/>
                </g>
                <g stroke="#ae9357" stroke-opacity=".28">
                    <path d="M120 112h58l24 24"/>
                    <path d="M390 220h-44l-30-30"/>
                </g>
            </svg>
            <div class="panel-caption">
                <div><strong>Diseño → Implementación</strong><small>Ingeniería aplicada de principio a fin</small></div>
                <span class="badge">INDUSTRIA 4.0</span>
            </div>
        </div>
    </div>
</section>

<section class="section stats-band">
    <div class="container stat-grid">
        <div class="stat-card reveal"><strong data-count="10" data-suffix="+">10+</strong><span>áreas de servicio especializado</span></div>
        <div class="stat-card reveal"><strong data-count="100" data-suffix="%">100%</strong><span>soluciones diseñadas a medida</span></div>
        <div class="stat-card reveal"><strong data-count="360" data-suffix="°">360°</strong><span>acompañamiento técnico integral</span></div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head reveal">
            <span class="kicker">Cómo trabajamos</span>
            <h2>Un proceso claro, del diagnóstico al soporte</h2>
            <p>Metodología simple y transparente para que siempre sepas en qué etapa está tu proyecto.</p>
        </div>
        <div class="grid-4">
            <div class="step reveal"><div class="step-number">1</div><h3>Diagnóstico</h3><p>Analizamos tu proceso, necesidad o idea y definimos el alcance real del proyecto.</p></div>
            <div class="step reveal"><div class="step-number">2</div><h3>Diseño</h3><p>Elaboramos la solución, los planos, la documentación técnica y la cotización correspondiente.</p></div>
            <div class="step reveal"><div class="step-number">3</div><h3>Implementación</h3><p>Construimos, programamos, integramos y ponemos en marcha el sistema en tu operación.</p></div>
            <div class="step reveal"><div class="step-number">4</div><h3>Seguimiento</h3><p>Brindamos mantenimiento, ajustes y capacitación para garantizar el rendimiento continuo.</p></div>
        </div>
    </div>
</section>

<section class="section section-cta">
    <div class="container">
        <div class="cta-band reveal">
            <div>
                <h2>¿Tienes un proyecto en mente?</h2>
                <p>Cuéntanos qué necesitas y juntos definimos la solución tecnológica más adecuada para tu empresa.</p>
            </div>
            <a href="{{ route('contacto') }}" class="btn btn-arrow">Solicitar cotización</a>
        </div>
    </div>
</section>

@endsection
