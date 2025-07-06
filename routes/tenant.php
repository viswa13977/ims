<?php

use Illuminate\Support\Facades\Route;
use Spatie\Multitenancy\Facades\Tenant;

Route::middleware([
    \Spatie\Multitenancy\Http\Middleware\InitializeTenancyByDomain::class,
    \Spatie\Multitenancy\Http\Middleware\PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/dashboard', function () {
        return 'Tenant ID: ' . Tenant::current()?->id . ' | DB: ' . Tenant::current()?->database;
    });
});