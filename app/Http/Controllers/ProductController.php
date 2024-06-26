<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return Response::json($products->load('category'))->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|between:4,200|unique:products',
            'price' => 'required|int',
            'category_id' => 'required|int',
            'description' => 'required|string|between:10,255',
            'image_url' => 'required|string|between:4,255',
            'likes' => 'sometimes|int',
            'count' => 'required|int',
        ]);
        if($request->count == 0){
            $status = 'UNAVAILABLE';
        } else {
            $status = 'AVAILABLE';
        }
        $attribute = Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image_url' => $request->image_url,
            'likes' => $request->likes,
            'count' => $request->count,
            'status' => $status,
        ]);

        return Response::json($attribute)->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return Response::json($product->load('category'))->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $attribute = $request->validate([
            'title' => 'required|string|between:4,200|unique:products',
            'price' => 'required|int',
            'category_id' => 'required|int',
            'description' => 'required|string|between:10,255',
            'image_url' => 'required|string|between:4,255',
            'likes' => 'sometimes|int',
            'count' => 'required|int',
        ]);
        $product->update($attribute);

        return Response::json($product)->setStatusCode(201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return Response::json($product)->setStatusCode(204);
    }
}
