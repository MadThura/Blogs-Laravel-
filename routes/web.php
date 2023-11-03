<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BlogController::class, 'index'])->middleware('auth');
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']); //->middleware('role')
Route::post('/blogs/{blog:slug}/comments', [CommentController::class, 'store']);
Route::post('/blogs/{blog:slug}/handle-subscription', [SubscribeController::class, 'handleSubscription']);
Route::get('/blogs/{blog:slug}/comments/{comment}/edit', [CommentController::class, 'edit']);
Route::patch('/blogs/{blog:slug}/comments/{comment}/update', [CommentController::class, 'update']);
Route::delete('/blogs/{blog:slug}/comments/{comment}', [CommentController::class, 'destroy']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerStore']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginStore']);
Route::post('/logout', [AuthController::class, 'logout']);
