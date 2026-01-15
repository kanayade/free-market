@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage_edit.css') }}">
@endsection

@section('content')
<div class="profile-setting_content">
    <div class="profile-setting__heading">
        <h1>プロフィール設定</h1>
    </div>
    <form class="profile-setting_form" action="/mypage" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form__group">
            <div class="form__image--content">
                <img src="{{ asset('storage/' . $user->user_image) }}" alt="アイコン">
            </div>
            <div class="form__label--content">
                <span class="form__label--item">画像を選択する</span>
                <input type="file" name="user_image">
            </div>
            <div class="form__label--content">
                <span class="form__label--item">ユーザー名</span>
                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}">
            </div>
            <div class="form__label--content">
                <span class="form__label--item">郵便番号</span>
                <input type="text" name="postal_code" value="{{ old('postal_code', Auth::user()->postal_code) }}">
            </div>
            <div class="form__label--content">
                <span class="form__label--item">住所</span>
                <input type="text" name="address" value="{{ old('address', Auth::user()->address) }}">
            </div>
            <div class="form__label--content">
                <span class="form__label--item">建物名</span>
                <input type="text" name="building" value="{{ old('building', Auth::user()->building) }}">
            </div>
            <button class="profile_update" type="submit">更新する</button>
        </div>
    </form>
</div>
@endsection