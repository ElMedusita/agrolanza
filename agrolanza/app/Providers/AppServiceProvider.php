<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
    *
    * @return void
    */
    public function register()
    {
        // Registrar servicios
    }
    /**
    * Realiza las operaciones de arranque para la aplicación.
    *
    * @return void
    */
    public function boot(Router $router)
    {
        $router->aliasMiddleware('role', \Spatie\Permission\Middleware\RoleMiddleware::class);

        Gate::define('ver-empleados', function ($user) {
            return in_array($user->role, ['admin', 'auxiliar']);
        });
    
        Gate::define('ver-clientes', function ($user) {
            return in_array($user->role, ['admin', 'auxiliar']);
        });
    }
}
