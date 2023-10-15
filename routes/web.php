<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;


Route::get('/', [BlogController::class, 'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerStore']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginStore']);
Route::post('/logout', [AuthController::class, 'logout']);

// Route::middleware('auth')->group(function () {
//     Route::get('/', [BlogController::class, 'index']);
//     Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
// });


// Route::post('/register', [AuthController::class, 'registerStore']);

// Route::get('/login', [AuthController::class, 'login']);

// Route::post('/login', [AuthController::class, 'loginStore']);

// Route::get('/logout', );
