<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        if (request()->category) {
            if (!request()->sort) {
                $products = Product::whereHas('categories', function ($query) {
                    $query->where('slug', request()->category);
                })->get();
                $categoryName = $categories->where('slug', request()->category)->first()->name;
            } else {
                $products = Product::whereHas('categories', function ($query) {
                    $query->where('slug', request()->category);
                });
                $categoryName = $categories->where('slug', request()->category)->first()->name;
                if (request()->sort == 'low_high') {
                    $products = $products->orderBy('price', 'asc')->get();
                } else {
                    $products = $products->orderBy('price', 'desc')->get();
                }
            }
        } else {
            $products = Product::all();
            if (request()->sort == 'low_high') {
                $products = $products->sortBy('price');
            } else {
                $products = $products->sortByDesc('price');
            }
            $categoryName = 'All';
        }

        $cart = session('cart');

        return view(
            'shop', compact('products','categories','categoryName','cart')  
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $cart = session('cart');
        $category = $product->categories->first()->name;

        return view('show', [
            'product' => $product,
            'category' => $category,
            'cart' => $cart
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
