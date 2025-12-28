@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<div class="product-sell_content">
    <div class="product-sell_heading">
        <h1>商品の出品</h1>
    </div>
    <form class="product-sell_form" action="/" method="post" enctype="multipart/form-data">
    @csrf
        <div class="product_image">
            <span class="product__detail--title">商品画像</span>
            <input type="file" name="image">
        </div>
        <hr>
        <h2 class="product_detail">商品の詳細</h2>
        <div class="product_category">
            <span class="product__detail--title">カテゴリー</span>
            @foreach($categories as $category)
                <label class="product__category--select">
                    <input type="radio" name="category_id" value="{{ $category->id }}">
                    {{ $category->name }}
                </label>
            @endforeach
        </div>
        <div class="product__condition">
            <span class="product__detail--title">商品の状態</span>
            <select name="condition">
                <option value="">選択してください</option>
                <option value="1">良好</option>
                <option value="2">目立った傷や汚れなし</option>
                <option value="3">やや傷や汚れあり</option>
                <option value="4">状態が悪い</option>
            </select>
        </div>
        <hr>
        <div class="product_content">
            <h3 class="product_detail">商品名と詳細</h3>
            <span class="product__detail--title">商品名</span>
            <input type="text" name="name" value="{{ old('name') }}">
            <span class="product__detail--title">ブランド名</span>
            <input type="text" name="brand" value="{{ old('brand') }}">
            <span class="product__detail--title">商品の説明</span>
            <textarea name="description">{{ old('description') }}</textarea>
            <span class="product__detail--title">販売価格</span>
            ¥ <input type="number" name="price" value="{{ old('price') }}">
        </div>
        <button class="product__sell--button" type="submit">出品する</button>
    </form>
</div>
@endsection