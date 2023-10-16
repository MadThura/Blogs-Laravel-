<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->middleware('auth');
    Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->middleware('role');
});
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerStore']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginStore']);
Route::post('/logout', [AuthController::class, 'logout']);
