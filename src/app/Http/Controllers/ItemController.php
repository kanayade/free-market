<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ExhibitionRequest;


class ItemController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->query('tab');
        $keyword = $request->input('keyword');
        $user_id = Auth::id();
        $products = Product::with('categories')
        ->when($keyword, function ($query, $keyword) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        })
        ->when($tab === 'mylist' && $user_id, function ($query) use ($user_id) {
            $query->whereHas('favorites', function ($q) use ($user_id) {
                $q->where('user_id', $user_id);
            });
        })
        ->when($tab !== 'mylist' && $user_id, function ($query) use ($user_id) {
            $query->where('user_id', '!=', $user_id);
        })
        ->latest()
        ->get();
        return view('products', compact('products','keyword','tab'));
    }
    public function show($item_id)
    {
        $product = Product::with(['favorites','comments'])->findOrFail($item_id);
        return view('item', compact('product'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('sell', compact('categories'));
    }
    public function store(ExhibitionRequest $request)
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