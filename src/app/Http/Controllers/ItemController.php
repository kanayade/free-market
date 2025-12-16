<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products',compact('products'));
    }
    public function show($item_id)
    {
        $product = Product::findOrFail($item_id);

        return view('item', compact('product'));
    }

}