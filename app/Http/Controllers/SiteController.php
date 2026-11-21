<?php

namespace App\Http\Controllers;

use App\Models\Project;

class SiteController extends Controller
{
    /**
     * Página de inicio con los proyectos destacados.
     */
    public function home()
    {
        $projects = Project::published()
            ->where('featured', true)
            ->latest()
            ->take(3)
            ->get();

        return view('home', compact('projects'));
    }
}
