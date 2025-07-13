<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     */
    public const HOME = '/home';

    /**
     * Define route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        parent::boot();

        $this->routes(function () {
            // Web routes
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // routes/api.php (tenant routes)
            Route::middleware(['api', 'initialize-tenancy'])
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // routes/api/admin.php (super admin)
            Route::middleware(['api']) // No tenancy middleware here
                ->prefix('api/admin')
                ->group(base_path('routes/api/admin.php'));
        });
    }
}
