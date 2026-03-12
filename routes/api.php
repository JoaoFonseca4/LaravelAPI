<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::apiResource('posts', PostController::class);
/* Route::get('posts', [PostController::class, 'index']);
Route::post('posts', [PostController:: class, 'store']);
Route::get('posts/{post}', [PostController::class, 'show']);
Route::put('posts/{post}', [PostController:: class, 'update']);
Route::delete('posts/{post}', [PostController::class, 'destroy']); */