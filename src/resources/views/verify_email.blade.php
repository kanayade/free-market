@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/verify.css') }}">
@endsection

@section('content')
<div class="verify-container">
    <p class="verify-message">
        登録していただいたメールアドレスに認証メールを送付しました。<br>
        メール認証を完了してください。
    </p>
    <form class="verify-form" method="post" action="{{ route('verification.verify', ['id' => auth()->id(), 'hash' => sha1(auth()->user()->email)]) }}">
        @csrf
        <button class="verify-button" type="submit">認証はこちらから</button>
    </form>
    <form class="verify-resend-form" method="post" action="{{ route('verification.send') }}">
        @csrf
        <button class="verify-resend-button" type="submit">認証メールを再送する</button>
    </form>
</div>
@endsection