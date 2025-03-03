<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
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
    }
}
