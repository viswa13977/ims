<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventTenantIdentificationOnAdminRoutes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (str_starts_with($request->path(), 'api/admin')) {
            // Prevent tenant identification for admin routes
            app()->forgetInstance(\Spatie\Multitenancy\Models\Tenant::class);
            return $next($request);
        }

        return $next($request);
    }
}
