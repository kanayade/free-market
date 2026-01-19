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
    public function edit($item_id)
    {
        $user = Auth::user();
        $product = Product::findOrFail($item_id);
        return view('changed_address', compact('user','product'));
    }
    public function update(Request $request, $item_id)
    {
        $user = Auth::user();
        $user->update([
            'postal_code' => $request->input('postal_code'),
            'address'     => $request->input('address'),
            'building'    => $request->input('building'),
        ]);
        return redirect("/purchase/{$item_id}");
    }
}
