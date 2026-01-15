@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage">
    <div class="mypage__profile">
        <div class="mypage__icon">
            <img src="{{ asset('storage/' . $user->user_image) }}" alt="アイコン">
        </div>
        <h2 class="mypage__name">{{ $user->name }}</h2>
        <a class="mypage__edit" href="/mypage/edit">プロフィールを編集</a>
    </div>
    <nav class="mypage__tabs">
        <a class="mypage__tab {{ $page === 'sell' ? 'is-active' : '' }}"
        href="/mypage?page=sell">出品した商品</a>
        <a class="mypage__tab {{ $page === 'buy' ? 'is-active' : '' }}"
        href="/mypage?page=buy">購入した商品</a>
    </nav>
    <div class="mypage__grid">
        @if($page === 'buy')
        @forelse($buyItems as $item)
        <div class="mypage__card">
            <div class="mypage__thumb">
                @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="商品画像">
                @else
                <div class="mypage__thumb-placeholder">商品画像</div>
                @endif
            </div>
            <p class="mypage__item-name">{{ $item->name }}</p>
        </div>
        @empty
            <p>購入した商品はありません</p>
        @endforelse
        @else
        @forelse($sellItems as $item)
        <div class="mypage__card">
            <div class="mypage__thumb">
                @if($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="商品画像">
                @else
                <div class="mypage__thumb-placeholder">商品画像</div>
                @endif
            </div>
            <p class="mypage__item-name">{{ $item->name }}</p>
        </div>
        @empty
            <p>出品した商品はありません</p>
        @endforelse
        @endif
    </div>
</div>
@endsection