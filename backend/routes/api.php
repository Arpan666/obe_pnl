<?php

use App\Http\Controllers\Api\V1\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - V1
|--------------------------------------------------------------------------
*/

Route::prefix('v1')->group(function () {
    // Public Auth Routes
    Route::post('/auth/login', [AuthController::class, 'login']);

    // Protected Routes (Sanctum Auth)
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/auth/logout', [AuthController::class, 'logout']);
        Route::get('/auth/me', [AuthController::class, 'me']);
    });
});