<?php

use Illuminate\Support\Facades\Route;

// Tenant API routes will go here
use App\Http\Controllers\Api\Admin\AuthController;

Route::prefix('admin')->group(function () {
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('me', [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
});
