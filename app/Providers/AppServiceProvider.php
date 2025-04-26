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
        Gate::define('admin', fn ($user) => $user->hasRole('admin'));
        Gate::define('auxiliar', fn ($user) => $user->hasRole('auxiliar'));
    }
}
