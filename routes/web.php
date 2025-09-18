<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard-auth', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard.auth');

// Rutas para el CRUD de miembros
Route::resource('members', MemberController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Ruta para usuarios
    Route::get('/users', [UserListController::class, 'index'])->name('users.index');
});

Route::get('/debug', function () {
    $data = [
        'timestamp' => date('Y-m-d H:i:s'),
        'random' => rand(1000, 9999),
        'app_env' => env('APP_ENV'),
        'app_debug' => env('APP_DEBUG'),
        'view_cache_path' => config('view.compiled'),
        'cache_exists' => file_exists(config('view.compiled')),
        'welcome_file_exists' => file_exists(resource_path('views/welcome.blade.php')),
        'welcome_file_modified' => file_exists(resource_path('views/welcome.blade.php')) ? 
            date('Y-m-d H:i:s', filemtime(resource_path('views/welcome.blade.php'))) : 'N/A'
    ];
    
    return response()->json($data, 200, [], JSON_PRETTY_PRINT);
});

require __DIR__.'/auth.php';