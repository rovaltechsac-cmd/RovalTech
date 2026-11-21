@extends('layouts.app')

@section('title', $project->title.' | Proyectos Roval Tech')
@section('description', $project->summary)

@section('content')

<section class="page-hero">
    <div class="container">
        <nav class="breadcrumb" aria-label="Ruta de navegación">
            <a href="{{ route('home') }}">Inicio</a><span>/</span>
            <a href="{{ route('proyectos.index') }}">Proyectos</a><span>/</span>
            <span>{{ $project->title }}</span>
        </nav>
        <span class="pill pill-copper">{{ $project->category }}</span>
        <h1 style="margin-top:18px;">{{ $project->title }}</h1>
        <p>{{ $project->summary }}</p>
    </div>
</section>

<section class="section">
    <div class="container project-detail-grid">
        <div class="reveal">
            <div class="project-hero-media">
                @if ($project->image)
                    <img src="{{ $project->imageUrl() }}" alt="{{ $project->title }}">
                @else
                    <span class="project-glyph" aria-hidden="true">{{ mb_substr($project->title, 0, 1) }}</span>
                @endif
            </div>
            <div class="project-detail-copy" style="margin-top:32px;">
                <h2>Sobre el proyecto</h2>
                {!! nl2br(e($project->description ?: $project->summary)) !!}
                <p style="margin-top:20px;"><a href="{{ route('proyectos.index') }}" class="card-link">← Volver a todos los proyectos</a></p>
            </div>
        </div>

        <aside class="reveal">
            <div class="admin-panel" style="padding:24px;">
                <span class="eyebrow" style="margin-bottom:20px;">Ficha técnica</span>
                <div class="project-facts" style="margin-top:0;">
                    <div class="project-fact"><span>Categoría</span><strong>{{ $project->category }}</strong></div>
                    <div class="project-fact"><span>Año</span><strong>{{ $project->year ?: 'No especificado' }}</strong></div>
                    <div class="project-fact"><span>Cliente</span><strong>{{ $project->client ?: 'Roval Tech' }}</strong></div>
                </div>
                <a href="{{ route('contacto') }}" class="btn btn-ghost btn-arrow" style="margin-top:28px;width:100%;">Cotizar algo similar</a>
            </div>
        </aside>
    </div>
</section>

@if ($related->count())
    <section class="section section-soft">
        <div class="container">
            <div class="section-head reveal">
                <span class="kicker">Sigue explorando</span>
                <h2>Proyectos relacionados</h2>
            </div>
            <div class="project-grid">
                @foreach ($related as $item)
                    <article class="project-card hover-card reveal">
                        <a href="{{ route('proyectos.show', $item->slug) }}" class="project-media">
                            @if ($item->image)
                                <img src="{{ $item->imageUrl() }}" alt="{{ $item->title }}" loading="lazy">
                            @else
                                <span class="project-glyph" aria-hidden="true">{{ mb_substr($item->title, 0, 1) }}</span>
                            @endif
                        </a>
                        <div class="project-body">
                            <span class="pill pill-copper" style="align-self:flex-start;">{{ $item->category }}</span>
                            <h3 style="margin-top:14px;">{{ $item->title }}</h3>
                            <p>{{ $item->summary }}</p>
                            <div class="project-meta">
                                <span>{{ $item->year ?: 'Roval Tech' }}</span>
                                <a href="{{ route('proyectos.show', $item->slug) }}">Ver proyecto →</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif

@endsection
