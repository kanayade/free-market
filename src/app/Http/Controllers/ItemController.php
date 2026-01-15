<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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
        $data = [
            'user_id' => Auth::id(),
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'condition' => $request->input('condition'),
            'image_path' => $request->input('image_path')
        ];
        $products = Product::create($data);
        $product->categories()->attach($request->input('category_id'));
        return redirect('/');
    }
}