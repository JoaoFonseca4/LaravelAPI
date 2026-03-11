<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('posts', [PostController::class, 'index']);
Route::post('posts', [PostController:: class, 'create']);
Route::get('posts/{post}', [PostController::class, 'read']);
Route::put('posts/{post}', [PostController:: class, 'update']);
Route::delete('posts/{post}', [PostController::class, 'delete']);