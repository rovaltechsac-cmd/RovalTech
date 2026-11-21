<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Panel de administración de proyectos.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.form', ['project' => new Project()]);
    }

    /**
     * Guarda un proyecto nuevo, con imagen opcional.
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['slug'] = $this->uniqueSlug($data['title']);
        $data['featured'] = $request->boolean('featured');
        $data['published'] = $request->boolean('published', true);

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request->file('image'));
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyecto publicado correctamente.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', compact('project'));
    }

    /**
     * Actualiza un proyecto existente.
     */
    public function update(Request $request, Project $project)
    {
        $data = $this->validateData($request);
        $data['featured'] = $request->boolean('featured');
        $data['published'] = $request->boolean('published', true);

        if ($request->hasFile('image')) {
            $this->deleteImage($project->image);
            $data['image'] = $this->storeImage($request->file('image'));
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyecto actualizado correctamente.');
    }

    /**
     * Activa o desactiva la publicación de un proyecto desde el listado.
     */
    public function updatePublished(Request $request, Project $project)
    {
        $data = $request->validate([
            'published' => ['required', 'boolean'],
        ]);

        $project->update(['published' => $data['published']]);

        return back()->with(
            'success',
            $project->published
                ? 'El proyecto ya es visible en el sitio público.'
                : 'El proyecto se ocultó del sitio público.'
        );
    }

    public function destroy(Project $project)
    {
        $this->deleteImage($project->image);
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyecto eliminado correctamente.');
    }

    /**
     * Validación compartida para crear y editar.
     */
    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'category' => ['required', 'string', 'max:80'],
            'summary' => ['required', 'string', 'max:300'],
            'description' => ['nullable', 'string', 'max:5000'],
            'year' => ['nullable', 'string', 'max:10'],
            'client' => ['nullable', 'string', 'max:120'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'featured' => ['nullable', 'boolean'],
            'published' => ['nullable', 'boolean'],
        ]);
    }

    /**
     * Genera un slug único a partir del título.
     */
    private function uniqueSlug(string $title): string
    {
        $base = Str::slug($title) ?: 'proyecto';
        $slug = $base;
        $i = 2;

        while (Project::where('slug', $slug)->exists()) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }

    private function storeImage($file): string
    {
        $directory = public_path('uploads/projects');
        if (! File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $name = uniqid('project_').'.'.$file->getClientOriginalExtension();
        $file->move($directory, $name);

        return $name;
    }

    private function deleteImage(?string $image): void
    {
        if (! $image) {
            return;
        }

        $path = public_path('uploads/projects/'.$image);
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
