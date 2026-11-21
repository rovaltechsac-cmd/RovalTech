@extends('layouts.app')

@section('title', 'Administrar proyectos | Roval Tech')
@section('description', 'Panel de administración de proyectos.')

@section('content')

<section class="admin-shell">
    <div class="container">
        <div class="admin-head">
            <div>
                <span class="eyebrow"><span class="dot"></span> Panel de administración</span>
                <h1>Proyectos</h1>
                <p>{{ $projects->total() }} proyecto(s) publicado(s) en el sitio.</p>
            </div>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-arrow">Nuevo proyecto</a>
        </div>

        @if (session('success'))
            <div class="alert-success" role="status">
                <span aria-hidden="true">✓</span>
                <div><strong>Listo</strong>{{ session('success') }}</div>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-success" role="alert" style="border-color:#603838;color:#d98a8a;background:rgba(217,138,138,.06);">
                <span aria-hidden="true">!</span>
                <div><strong>No se pudo completar la acción</strong>{{ $errors->first() }}</div>
            </div>
        @endif

        <div class="admin-panel">
            <div class="admin-toolbar">
                <span>Listado de proyectos</span>
                <a href="{{ route('proyectos.index') }}" style="color:var(--color-copper);">Ver sitio público →</a>
            </div>

            <div style="overflow-x:auto;">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Proyecto</th>
                            <th>Categoría</th>
                            <th>Año</th>
                            <th>Publicación</th>
                            <th style="text-align:right;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr>
                                <td>
                                    <strong>{{ $project->title }}</strong><br>
                                    <small>{{ $project->slug }}</small>
                                    @if ($project->featured)
                                        <br><span class="badge-soft badge-copper">Destacado</span>
                                    @endif
                                </td>
                                <td>{{ $project->category }}</td>
                                <td>{{ $project->year ?: '—' }}</td>
                                <td>
                                    <form method="POST" action="{{ route('admin.projects.published', $project) }}" class="publication-toggle">
                                        @csrf
                                        @method('PUT')
                                        <label class="radio-option {{ $project->published ? 'is-active' : '' }}">
                                            <input type="radio" name="published" value="1" {{ $project->published ? 'checked' : '' }}>
                                            <span>Activo</span>
                                        </label>
                                        <label class="radio-option {{ ! $project->published ? 'is-active' : '' }}">
                                            <input type="radio" name="published" value="0" {{ ! $project->published ? 'checked' : '' }}>
                                            <span>Inactivo</span>
                                        </label>
                                    </form>
                                </td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('proyectos.show', $project->slug) }}" class="btn btn-ghost btn-small" target="_blank">Ver</a>
                                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-copper btn-small">Editar</a>
                                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}"
                                              onsubmit="return confirm('¿Eliminar el proyecto {{ $project->title }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-small">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="empty">No hay proyectos todavía. Crea el primero.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pagination">{{ $projects->links('pagination.slash') }}</div>
    </div>
</section>

@endsection
