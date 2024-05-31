<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/products', function (Request $request){
    $products = Product::orderByDesc('count')
        ->with('category')
        ->get();
    return Response::json($products)->setStatusCode(200);
});

Route::get('/products/{product}', function (Product $product){
    return Response::json($product)->setStatusCode(200);
});




