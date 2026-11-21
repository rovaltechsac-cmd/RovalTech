@extends('layouts.app')

@section('title', ($project->exists ? 'Editar' : 'Nuevo').' proyecto | Roval Tech')
@section('description', 'Formulario de proyectos del panel de administración.')

@section('content')

<section class="admin-shell">
    <div class="container">
        <div class="admin-head">
            <div>
                <span class="eyebrow"><span class="dot"></span> Panel de administración</span>
                <h1>{{ $project->exists ? 'Editar proyecto' : 'Nuevo proyecto' }}</h1>
                <p>Completa la información que se mostrará en el sitio público.</p>
            </div>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-ghost btn-arrow">Volver al listado</a>
        </div>

        @if ($errors->any())
            <div class="alert-success" role="alert" style="border-color:#603838;color:#d98a8a;background:rgba(217,138,138,.06);max-width:760px;">
                <span aria-hidden="true">!</span>
                <div>
                    <strong>Revisa los campos</strong>
                    <ul style="margin:8px 0 0;padding-left:18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form class="admin-form reveal"
              action="{{ $project->exists ? route('admin.projects.update', $project) : route('admin.projects.store') }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @if ($project->exists)
                @method('PUT')
            @endif

            <h2>Información general</h2>

            <div class="form-group">
                <label for="title">Título del proyecto <span>*</span></label>
                <input id="title" name="title" type="text" class="form-control"
                       value="{{ old('title', $project->title) }}" placeholder="Ej. Robot Sumo" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="category">Categoría <span>*</span></label>
                    <input id="category" name="category" type="text" class="form-control"
                           value="{{ old('category', $project->category) }}" placeholder="Ej. Robótica competitiva" required>
                </div>
                <div class="form-group">
                    <label for="year">Año</label>
                    <input id="year" name="year" type="text" class="form-control"
                           value="{{ old('year', $project->year) }}" placeholder="Ej. 2026">
                </div>
            </div>

            <div class="form-group">
                <label for="client">Cliente</label>
                <input id="client" name="client" type="text" class="form-control"
                       value="{{ old('client', $project->client) }}" placeholder="Ej. Proyecto interno Roval Tech">
            </div>

            <div class="form-group">
                <label for="summary">Resumen <span>*</span></label>
                <textarea id="summary" name="summary" class="form-control" rows="3"
                          placeholder="Una descripción breve del proyecto (máx. 300 caracteres)" required>{{ old('summary', $project->summary) }}</textarea>
            </div>

            <div class="form-group">
                <label for="description">Descripción completa</label>
                <textarea id="description" name="description" class="form-control" rows="6"
                          placeholder="Detalles técnicos, retos y resultados del proyecto.">{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Imagen del proyecto</label>
                <input id="image" name="image" type="file" class="form-control" accept="image/jpeg,image/png,image/webp">
                <small style="display:block;margin-top:6px;color:var(--color-steel);font-size:12px;">JPG, PNG o WEBP · máximo 2 MB. Si no subes imagen se usa un gráfico automático.</small>
                @if ($project->image)
                    <img src="{{ $project->imageUrl() }}" alt="Imagen actual" style="margin-top:12px;max-height:120px;border:1px solid var(--color-graphite);border-radius:var(--radius-cards);">
                @endif
            </div>

            <div class="form-group">
                <label>Estado de publicación</label>
                <div class="publication-toggle" style="margin-top:8px;">
                    @php $isPublished = old('published', $project->exists ? $project->published : true); @endphp
                    <label class="radio-option {{ $isPublished ? 'is-active' : '' }}">
                        <input type="radio" name="published" value="1" {{ $isPublished ? 'checked' : '' }}>
                        <span>Activo · visible en el sitio</span>
                    </label>
                    <label class="radio-option {{ ! $isPublished ? 'is-active' : '' }}">
                        <input type="radio" name="published" value="0" {{ ! $isPublished ? 'checked' : '' }}>
                        <span>Inactivo · oculto</span>
                    </label>
                </div>
            </div>

            <label class="checkbox-row" style="cursor:pointer;">
                <input type="checkbox" name="featured" value="1" {{ old('featured', $project->featured) ? 'checked' : '' }}>
                Mostrar como proyecto destacado en el inicio
            </label>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary btn-arrow">{{ $project->exists ? 'Guardar cambios' : 'Publicar proyecto' }}</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-ghost">Cancelar</a>
            </div>
        </form>
    </div>
</section>

@endsection
