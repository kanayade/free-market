@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')
<div class="purchase_content">
    <div class="purchase_content-headding">
        <h2>{{ $item->name }}</h2>
    </div>
    <div class="product_image">
        <img src="{{ asset('storage/product/' . $item->image) }}" alt="{{ $item->item }}" width="150">
    </div>
    <p class="product_price">¥ {{ number_format($item->price) }}</p>
    <hr>
    <form class="product_purchase" action="{{ route('purchase.store', $item->id) }}" method="post">
    @csrf
    <div class="purchase_payment_method">
        <h3 class="payment_which">支払い方法</h3>
        <select name="payment_method">
            <option value="">選択してください</option>
            <option value="1">コンビニ払い</option>
            <option value="2">カード払い</option>
        </select>
    </div>
    <hr>
    <div class="purchase_address">
        <h3 class="shipping_address">配送先</h3>
        <p class="address_postal-code">〒 {{ Auth::user()->postal_code }}</p>
        <p class="address">{{ Auth::user()->address }}</p>
        <p class="address_building">{{ Auth::user()->building }}</p>
        <a href="{{ route('changed_address') }}">変更する</a>
    </div>
    <hr>
    <div class="purchase_summary">
        <p class="product_price">商品代金 ¥{{ number_format($item->price) }}</p>
        <p class="payment_which">支払い方法 <span id="paymentDisplay"></span></p>
    </div>
    <button class="purchase_button" type="submit">購入する</button>
</form>
@endsection