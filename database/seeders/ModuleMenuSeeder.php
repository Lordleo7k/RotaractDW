<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Menu;

class ModuleMenuSeeder extends Seeder
{
    public function run(): void
    {
        // Crear módulos
        $userModule = Module::create([
            'name' => 'Gestión de Usuarios',
            'slug' => 'users',
            'icon' => 'fas fa-users',
            'order' => 1
        ]);
        
        $catalogModule = Module::create([
            'name' => 'Catálogos',
            'slug' => 'catalogs',
            'icon' => 'fas fa-list',
            'order' => 2
        ]);
        
        // Crear menús principales
        $userMenu = Menu::create([
            'name' => 'Usuarios',
            'slug' => 'users',
            'route' => null,
            'icon' => 'fas fa-user',
            'module_id' => $userModule->id,
            'order' => 1
        ]);
        
        // Crear submenús
        Menu::create([
            'name' => 'Lista de Usuarios',
            'slug' => 'users-list',
            'route' => 'users.index',
            'module_id' => $userModule->id,
            'parent_id' => $userMenu->id,
            'order' => 1
        ]);
        
        Menu::create([
            'name' => 'Crear Usuario',
            'slug' => 'users-create',
            'route' => 'users.create',
            'module_id' => $userModule->id,
            'parent_id' => $userMenu->id,
            'order' => 2
        ]);
        
        // Menú de catálogos
        Menu::create([
            'name' => 'Productos',
            'slug' => 'products',
            'route' => 'products.index',
            'icon' => 'fas fa-box',
            'module_id' => $catalogModule->id,
            'order' => 1
        ]);
    }
}