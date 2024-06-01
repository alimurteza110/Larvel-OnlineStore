<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Auth::user()->carts()
            ->whereNull('transaction_id')
            ->get();

        return Response::json($cart)->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'amount' => 'required|integer|max:10,'
        ]);

        $productPrice = Product::find($request->product_id)->price;
        $price = $request->amount * $productPrice;

        $cart = Auth::user()->carts()->create([
            'product_id' => $request->product_id,
            'amount' => $request->amount,
            'price' => $price,
        ]);

        return Response::json($cart)->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
