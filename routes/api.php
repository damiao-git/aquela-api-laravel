<?php

use App\Http\Controllers\SaborController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:api')->group(function () {
    Route::get('/sabores', [SaborController::class, 'index']);
    Route::get('/sabores/{id}', [SaborController::class, 'show']);
});
