@extends('layouts.app')

@section('title', 'Proyectos | Roval Tech')
@section('description', 'Proyectos de robótica, automatización, domótica e ingeniería desarrollados por Roval Tech.')

@section('content')

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Ruta de navegación">
            <a href="{{ route('home') }}">Inicio</a><span>/</span><span>Proyectos</span>
        </nav>
        <span class="eyebrow"><span class="dot"></span> Trabajos realizados</span>
        <h1>Ingeniería que se ve <span class="grad-text">en resultados</span></h1>
        <p>Una selección de sistemas, robots y soluciones tecnológicas desarrolladas por Roval Tech. Cada proyecto nace de un reto concreto y termina en una solución aplicada.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        @if ($projects->count())
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

            <div class="pagination">{{ $projects->links('pagination.slash') }}</div>
        @else
            <div class="admin-panel" style="padding:64px 24px;text-align:center;color:var(--color-steel);">
                Todavía no hay proyectos publicados.
            </div>
        @endif
    </div>
</section>

<section class="section section-cta">
    <div class="container">
        <div class="cta-band reveal">
            <div>
                <h2>¿Quieres que hagamos tu próximo proyecto?</h2>
                <p>Desde un robot competitivo hasta una línea de producción completa: cuéntanos tu idea y la hacemos realidad.</p>
            </div>
            <a href="{{ route('contacto') }}" class="btn btn-arrow">Solicitar cotización</a>
        </div>
    </div>
</section>

@endsection
