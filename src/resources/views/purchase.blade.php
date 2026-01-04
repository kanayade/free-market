@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="purchase_content">

    <form class="product_purchase" action="/" method="post">
        @csrf

        <div class="purchase_left">
            <div class="purchase_item">
                <div class="product_image">
                    <img src="{{ asset('storage/products/' . $product->image_path) }}"
                        alt="{{ $product->name }}">
                </div>
                <div class="purchase_item-info">
                    <h2 class="purchase_item-name">{{ $product->name }}</h2>
                    <p class="product_price">¥ {{ number_format($product->price) }}</p>
                </div>
            </div>
            <hr>
            <div class="purchase_payment_method">
                <h3 class="payment_which">支払い方法</h3>
                <select name="payment_method" id="paymentSelect">
                    <option value="">選択してください</option>
                    <option value="1">コンビニ払い</option>
                    <option value="2">カード払い</option>
                </select>
            </div>
            <hr>
            <div class="purchase_address">
                <div class="purchase_address-head">
                    <h3 class="shipping_address">配送先</h3>
                    <a href="/changed_address">変更する</a>
                </div>
                <p class="address_postal-code">〒 {{ Auth::user()->postal_code }}</p>
                <p class="address">{{ Auth::user()->address }}</p>
                <p class="address_building">{{ Auth::user()->building }}</p>
            </div>
            <hr>
        </div>
        <div class="purchase_right">
            <div class="purchase_summary">
                <p>
                    <span>商品代金</span>
                    <span>¥{{ number_format($product->price) }}</span>
                </p>
                <p>
                    <span>支払い方法</span>
                    <span id="paymentDisplay">---</span>
                </p>
            </div>
            <button class="purchase_button" type="submit">購入する</button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
const select = document.getElementById('paymentSelect');
const display = document.getElementById('paymentDisplay');

const map = {
    "1": "コンビニ払い",
    "2": "カード払い",
    "": "---"
};

const update = () => display.textContent = map[select.value] ?? "---";
update();
select.addEventListener('change', update);
});
</script>
@endsection