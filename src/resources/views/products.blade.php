@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')
<div class="product-page">
    <div class="tab-menu">
        <a class="recommendation" href="#">おすすめ</a>
        <a class="mylist" href="#">マイリスト</a>
    </div>
    <div class="product-list">
        @foreach($products as $product)
            <div class="product-card">
                <a href="{{ url('/item/' . $product->id) }}">
                <img src="{{ asset('storage/product/'.$product->image) }}" alt="{{ $product->name }}">
                <p class="product-name">{{ $product->name }}</p>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection