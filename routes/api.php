<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
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

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{product}', [ProductController::class, 'show']);

Route::post('/products', [ProductController::class, 'store'])->middleware('auth:sanctum', 'role:admin');

Route::patch('/products/{product}', [ProductController::class, 'update'])->middleware('auth:sanctum', 'role:admin');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])->middleware('auth:sanctum', 'role:admin');

// apiResource of categories //

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/categories/{category}', [CategoryController::class, 'show']);

Route::post('/categories', [CategoryController::class, 'store'])->middleware('auth:sanctum', 'role:admin');

Route::patch('/categories/{category}', [CategoryController::class, 'update'])->middleware('auth:sanctum', 'role:admin');

Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->middleware('auth:sanctum', 'role:admin');

// apiResource of comments //

Route::post('/comments', function (Request $request){
    $attribute = $request->validate([
       //
    ]);
});
