<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\AddressRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function index($item_id)
    {
        $product = Product::findOrFail($item_id);
        return view('purchase', compact('product'));
    }
    public function store(PurchaseRequest $request,$item_id)
    {
        $user = Auth::user();
        $product = Product::findOrFail($item_id);
        if ($product->seller_id === $user->id) {
            return redirect()
                ->back();
        }
        DB::transaction(function () use ($product, $user, $request) {
            $product->refresh();
            Order::create([
                'product_id'  => $product->id,
                'user_id' => $user->id,
                'payment_method' => $request->payment_method
            ]);
            $product->update([
                'is_sold' => true,
            ]);
        });
        return redirect('/');
    }
    public function edit($item_id)
    {
        $user = Auth::user();
        $product = Product::findOrFail($item_id);
        return view('changed_address', compact('user','product'));
    }
    public function update(AddressRequest $request, $item_id)
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
