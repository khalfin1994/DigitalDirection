<?php

use App\Http\Controllers\v1\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->name('v1.')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

