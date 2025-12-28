<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }
    public function show($item_id)
    {
        $product = Product::findOrFail($item_id);

        return view('item', compact('product'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('sell', compact('categories'));
    }
    public function store(Request $request)
    {
        //
    }
}