<?php

use App\Http\Controllers\SaborController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/sabores', [SaborController::class, 'index']);
Route::get('/sabores/{id}', [SaborController::class, 'show']);
