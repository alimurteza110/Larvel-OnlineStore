<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum', 'role:admin');

Route::post('/login', [LoginController::class, 'login']);

Route::post('/register', [RegisterController::class, 'register']);

// apiResource of products //

Route::get('/products', [ProductController::class, 'index'])
    ->middleware('auth:sanctum');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->middleware('auth:sanctum');

Route::post('/products', [ProductController::class, 'store'])
    ->middleware('auth:sanctum', 'role:admin');

Route::patch('/products/{product}', [ProductController::class, 'update'])
    ->middleware('auth:sanctum', 'role:admin');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])
    ->middleware('auth:sanctum', 'role:admin');

// apiResource of categories //

Route::get('/categories', [CategoryController::class, 'index'])
    ->middleware('auth:sanctum');

Route::get('/categories/{category}', [CategoryController::class, 'show'])
    ->middleware('auth:sanctum');

Route::post('/categories', [CategoryController::class, 'store'])
    ->middleware('auth:sanctum', 'role:admin');

Route::patch('/categories/{category}', [CategoryController::class, 'update'])
    ->middleware('auth:sanctum', 'role:admin');

Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
    ->middleware('auth:sanctum', 'role:admin');

// apiResource of comments //

Route::get('/comments', [CommentController::class, 'index'])
    ->middleware('auth:sanctum', 'role:admin');

Route::get('/comments/{comment}', [CommentController::class, 'show'])
    ->middleware('auth:sanctum', 'role:admin');

Route::post('/comments', [CommentController::class, 'store'])
    ->middleware('auth:sanctum');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->middleware('auth:sanctum', 'role:admin');

