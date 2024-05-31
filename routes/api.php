<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//apiResource of products //

Route::get('/products', function (Request $request){
    $products = Product::orderByDesc('count')
        ->with('category')
        ->get();
    return Response::json($products)->setStatusCode(200);
});

Route::get('/products/{product}', function (Product $product){
    return Response::json($product->load('category'))->setStatusCode(200);
});

Route::post('/products', function (Request $request){
    $attribute = $request->validate([
        'title' => 'required|string|between:4,200|unique:products',
        'price' => 'required|int',
        'description' => 'required|string|between:10,255',
        'image_url' => 'required|string|between:4,255',
        'likes' => 'sometimes|int',
        'count' => 'required|int',
        'category_id' => 'required|int'
    ]);

    $product = Product::create($attribute);

    return Response::json($product)->setStatusCode(201);
});

//apiResource of categories //

Route::get('/categories', function (Request $request){
   $categories = Category::with('products')->get();

   return Response::json($categories)->setStatusCode(200);
});

Route::get('/categories/{category}', function (Category $category){
   return Response::json($category->load('products'))->setStatusCode(200);
});

Route::post('/categories', function (Request $request){
   $attribute = $request->validate([
        'title' => 'required|unique:categories|between:5,100'
   ]);

   $category = Category::create($attribute);

   return Response::json($category)->setStatusCode(201);
});


