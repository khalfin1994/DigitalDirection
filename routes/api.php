<?php

use App\Http\Controllers\v1\AuthController;
use App\Http\Controllers\v1\PostController;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->name('v1.')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/post', [PostController::class, 'get']);
        Route::get('/posts', [PostController::class, 'list']);
        Route::post('/post', [PostController::class, 'create']);
        Route::put('/post', [PostController::class, 'update']);
        Route::put('/post/delete', [PostController::class, 'delete']);
    });
});
