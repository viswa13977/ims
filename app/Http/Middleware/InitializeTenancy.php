<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\TenantFinder\TenantFinder;

class InitializeTenancy
{
    public function handle(Request $request, Closure $next)
    {
        // Skip Super Admin API
        if (str_starts_with($request->path(), 'api/admin')) {
            return $next($request);
        }

        $tenantFinder = app(TenantFinder::class);
        $tenant = $tenantFinder->findForRequest($request);

        if ($tenant) {
            $tenant->makeCurrent();
        }

        return $next($request);
    }
}
