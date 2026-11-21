<?php

use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — sitio publicitario Roval Tech
|--------------------------------------------------------------------------
*/

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::view('/nosotros', 'nosotros')->name('nosotros');
Route::view('/servicios', 'servicios')->name('servicios');
Route::view('/productos', 'productos')->name('productos');
Route::view('/contacto', 'contacto')->name('contacto');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');

// Proyectos (área pública)
Route::get('/proyectos', [ProjectController::class, 'index'])->name('proyectos.index');
Route::get('/proyectos/{project:slug}', [ProjectController::class, 'show'])->name('proyectos.show');

// Autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Panel de proyectos (solo usuarios autenticados)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/proyectos', [AdminProjectController::class, 'index'])->name('projects.index');
    Route::get('/proyectos/crear', [AdminProjectController::class, 'create'])->name('projects.create');
    Route::post('/proyectos', [AdminProjectController::class, 'store'])->name('projects.store');
    Route::get('/proyectos/{project}/editar', [AdminProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/proyectos/{project}', [AdminProjectController::class, 'update'])->name('projects.update');
    Route::put('/proyectos/{project}/publicacion', [AdminProjectController::class, 'updatePublished'])->name('projects.published');
    Route::delete('/proyectos/{project}', [AdminProjectController::class, 'destroy'])->name('projects.destroy');
});
