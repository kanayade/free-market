<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index($item_id)
    {
        $product = Product::findOrFail($item_id);
        return view('purchase', compact('product'));
    }
    public function store(Request $request,$item_id)
    {
        //
    }
}
