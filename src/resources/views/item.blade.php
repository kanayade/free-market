@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection

@section('content')
<div class="product-detail">
    <div class="detail-wrapper">
        <div class="detail-image">
            <img src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}">
        </div>
        <div class="detail-info">
            <h1 class="product-title">{{ $product->name }}</h1>
            <p class="product-brand">{{ $product->brand }}</p>
            <p class="product-price">¥{{ number_format($product->price) }}（税込）</p>
            <div class="detail-icons">
                <span class="product-likes">
                    <img src="{{ asset('storage/products/ハートロゴ_デフォルト.png') }}">  {{ $product->likes ?? 0 }}</span>
                <span class="product-comment">
                    <img src="{{ asset('storage/products/ふきだしロゴ.png') }}"> {{ $product->comments->count() ?? 0 }}</span>
            </div>
                <form class="product-purchase" action="{{ url('/purchase/' . $product->id) }}" method="get">
                    @csrf
                    <button class="product-purchase_button">購入手続きへ</button>
                </form>
            <div class="product-section">
                <h2 class="product-section__title">商品説明</h2>
                <p class="product-description">{{ $product->description }}</p>
                <h2 class="product-section__title">商品の情報</h2>
                <div class="product-meta">
                    <div class="product-meta__row">
                        <span class="product-meta__label">カテゴリー</span>
                        <div class="product-meta__value">
                            @foreach($product->categories as $category)
                            <span class="category-tag">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="product-meta__row">
                        <span class="product-meta__label">商品の状態</span>
                        <span class="product-meta__value">
                        {{ $product->condition_label }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="comment-area">
        <h3 class="product-comment">コメント( {{ $product->comments->count() }} )</h3>
        @foreach($product->comments as $comment)
        <div class="comment-item">
            <span class="comment-user">{{ $comment->user->name }}</span>
            <p class="comment-detail">{{ $comment->comment }}</p>
        </div>
        @endforeach
        <form class="comment-send" action="{{ url('/item/' . $product->id) }}" method="post">
            @csrf
            <textarea name="comment" cols="30" rows="5"></textarea>
            <button class="comment-send_button">コメントを送信する</button>
        </form>
    </div>
</div>
@endsection