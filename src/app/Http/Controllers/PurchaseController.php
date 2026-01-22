<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Order;
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
        $user = Auth::user();
        $product = Product::findOrFail($item_id);
        if ($product->seller_id === $user->id) {
            return redirect()
                ->back();
        }
        DB::transaction(function () use ($product, $user) {
            // 購入履歴を作成
            Purchase::create([
                'product_id'  => $product->id,
                'user_id' => $user->id,
            ]);
            // 商品を売り切れにする
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
