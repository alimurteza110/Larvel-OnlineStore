<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// apiResource of products //

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{product}', [ProductController::class, 'show']);

Route::post('/products', [ProductController::class, 'store']);

Route::patch('/products/{product}', [ProductController::class, 'update']);

Route::delete('/products/{product}', [ProductController::class, 'destroy']);

// apiResource of categories //

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/categories/{category}', [CategoryController::class, 'show']);

Route::post('/categories', [CategoryController::class, 'store']);

Route::patch('/categories/{category}', [CategoryController::class, 'update']);

Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

