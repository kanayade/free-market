<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::with('categories')
        ->when($keyword, function ($query, $keyword) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        })
        ->when($user_id, function ($query, $user_id) {
            $query->where('user_id', '!=', $user_id);
        })
        ->latest()
        ->get();
        return view('products', compact('products','keyword'));
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
        $path = $request->file('image_path')->store('products', 'public');
        $product = Product::create([
            'user_id' => Auth::id(),
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'condition' => $request->input('condition'),
            'image_path' => $path
        ]);
        $product->categories()->attach($request->input('category_id'));
        return redirect('/');
    }
}