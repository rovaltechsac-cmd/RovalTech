<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Catálogo público de proyectos.
     */
    public function index()
    {
        $projects = Project::published()->latest()->paginate(9);

        return view('proyectos.index', compact('projects'));
    }

    /**
     * Detalle público de un proyecto.
     */
    public function show(Project $project)
    {
        abort_unless($project->published, 404);

        $related = Project::published()
            ->where('id', '!=', $project->id)
            ->latest()
            ->take(3)
            ->get();

        return view('proyectos.show', compact('project', 'related'));
    }
}
