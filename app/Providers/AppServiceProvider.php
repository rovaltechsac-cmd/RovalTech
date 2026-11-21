<?php

namespace App\Providers;

use App\Models\Project;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Laravel 8 emite deprecaciones de PHP 8.x que no afectan el funcionamiento.
        // En produccion las ocultamos para no llenar storage/logs/laravel.log.
        if (! config('app.debug')) {
            error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
        }

        // El footer solo debe mostrar proyectos publicados: nunca enlaces fijos
        // que puedan quedar apuntando a un proyecto desactivado.
        View::composer('layouts.app', function ($view): void {
            $view->with('footerProjects', Project::published()->latest()->take(3)->get());
        });
    }
}
