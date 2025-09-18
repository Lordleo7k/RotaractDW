<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas del módulo aspirante
Route::prefix('aspirante')->group(function () {
    Route::get('/dashboard', function () {
        return view('modulos.aspirante.dashboard');
    })->name('aspirante.dashboard');
    
    Route::get('/calendario', function () {
        return view('modulos.aspirante.calendario-consulta');
    })->name('aspirante.calendario-consulta');
    
    Route::get('/proyectos', function () {
        return view('modulos.aspirante.mis-proyectos');
    })->name('aspirante.mis-proyectos');
    
    Route::get('/reuniones', function () {
        return view('modulos.aspirante.mis-reuniones');
    })->name('aspirante.mis-reuniones');
    
    Route::get('/secretaria', function () {
        return view('modulos.aspirante.comunicacion-secretaria');
    })->name('aspirante.comunicacion-secretaria');
    
    Route::get('/voceria', function () {
        return view('modulos.aspirante.comunicacion-voceria');
    })->name('aspirante.comunicacion-voceria');
    
    Route::get('/notas', function () {
        return view('modulos.aspirante.blog-notas');
    })->name('aspirante.blog-notas');
    
    Route::get('/notas/crear', function () {
        return view('modulos.aspirante.crear-nota');
    })->name('aspirante.crear-nota');
    
    Route::get('/perfil', function () {
        return view('modulos.aspirante.mi-perfil');
    })->name('aspirante.mi-perfil');
});

require __DIR__.'/auth.php';