<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Market</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    @yield('css')
</head>
<body>
    <header class="header_free-market">
        <div class="header__inner">COACHTECH</div>
        <div class="header__search">
            <form action="/" method="get" enctype="multipart/form-data">
                <input class="search_enter" type="text" name="keyword" placeholder="なにをお探しですか？" value="{{ request('keyword') }}">
            </form>
        </div>
        <div>
        @auth
            <a class="header__logout" href="/logout"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            ログアウト
            </a>
            <form class="logout_form" id="logout-form" action="/logout" method="post">
                @csrf
            </form>
            <a class="header__mypage" href="/mypage">マイページ</a>
            <a class="header__sell" href="/sell">出品</a>
        @else
            <a class="header__login" href="/login">ログイン</a>
        @endauth
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>