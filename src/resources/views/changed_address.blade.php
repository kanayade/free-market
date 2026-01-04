@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/changed_address.css') }}">
@endsection

@section('content')
<div class="changed_address-content">
    <div class="changed_address-heading">
        <h2>住所の変更</h2>
    </div>
    <form class="changed_address-form" action="/changed_address" method="post">
        @csrf
        @method('put')
        <div class="form__group">
            <div class="form__label--title">
                <span class="form__label--item">郵便番号</span>
                <input type="text" name="postal_code" value="{{ old('postal_code', Auth::user()->postal_code) }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__label--title">
                <span class="form__label--item">住所</span>
                <input type="text" name="address" value="{{ old('address', Auth::user()->address) }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__label--title">
                <span class="form__label--item">建物名</span>
                <input type="text" name="building" value="{{ old('building', Auth::user()->building) }}">
            </div>
        </div>
        <button class="address-update" type="submit">更新する</button>
    </form>
</div>
@endsection