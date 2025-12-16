@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">
@endsection

@section('content')
<div class="product-detail">
    <div class="detail-wrapper">
        <div class="detail-image">
            <img src="{{ asset('storage/product/'.$product->image) }}" alt="{{ $product->name }}">
        </div>
        <div class="detail-info">
            <h2 class="product-title">{{ $product->name }}</h2>
            <p class="product-brand">{{ $product->brand }}</p>
            <p class="product-price">¥{{ number_format($product->price) }}（税込）</p>
            <div class="detail-icons">
                <span class="product-likes">♡ {{ $product->likes ?? 0 }}</span>
                <span class="product-comment">💬 {{ $product->comments->count() ?? 0 }}</span>
            </div>
                <form class="product-purchase" action="{{ url('/purchase/' . $product->id) }}" method="get">
                    @csrf
                    <button class="product-purchase_button">購入手続きへ</button>
                </form>
            <h3 class="product-detail">商品説明</h3>
                <div class="seller-comment">??</div>
            <h3 class="product-detail">商品の情報</h3>
            <p class="product-category">カテゴリー{{ $product->category }}</p>
            <p class="product-condition">商品の状態{{ $product->condition }}</p>
        </div>
    </div>
    <div class="comment-area">
        <h3 class="product-comment">コメント( {{ optional($product->comments)->count() ?? 0 }} )</h3>
        @foreach($product->comments as $comment)
            <div class="comment-item">
                <span class="comment-user">{{ $comment->user->name }}</span>
                <p class="comment-detail">{{ $comment->comment }}</p>
            </div>
        @endforeach
        @auth
            <form class="comment-send" action="{{ route('comment.store', $product->id) }}" method="post">
                @csrf
                <textarea name="comment" cols="30" rows="5"></textarea>
                <button class="comment-send_button">コメントを送信する</button>
            </form>
        @endauth
    </div>
</div>
@endsection