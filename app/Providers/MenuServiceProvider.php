<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Module;

class MenuServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $modules = Module::with(['menus.children'])
                            ->where('is_active', true)
                            ->orderBy('order')
                            ->get();
            
            $view->with('sidebarModules', $modules);
        });
    }
}