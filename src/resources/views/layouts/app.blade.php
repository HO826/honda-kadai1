<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>基礎学習ターム 確認テスト_お問い合わせフォーム</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>

<header class="header">
    <div class="header__inner">
        <h1 class="header__logo">FashionablyLate</h1>
        <nav>
            @yield('header-btn')
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>

</body>
</html>