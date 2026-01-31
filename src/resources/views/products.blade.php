@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
<div class="product-page">
    <div class="tab-menu">
        <a href="/">おすすめ</a>
        <a class="mylist" href="/?tab=mylist">マイリスト</a>
    </div>
    <div class="product-list">
        @foreach($products as $product)
            <div class="product-card">
                @if ($product->is_sold)
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                    <span class="sold-label">SOLD</span>
                    <p class="product-name">{{ $product->name }}</p>
                @else
                    <a href="{{ url('/item/' . $product->id) }}">
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                        <p class="product-name">{{ $product->name }}</p>
                    </a>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection