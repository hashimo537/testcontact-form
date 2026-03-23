<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TestContact Form</title>

  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">

  @yield('css')
</head>

<body>

<header class="header">
  <div class="header__inner">

    <!-- ロゴ -->
    <a class="header__logo" href="/admin">
      Fashionably Late
    </a>

    <ul class="header-nav">

      <!-- ログインしている場合 -->
      @if (Auth::check())

      <li class="header-nav__item">
        <a class="header-nav__link" href="/mypage">マイページ</a>
      </li>

      <li class="header-nav__item">
        <form action="/logout" method="post">
          @csrf
          <button class="header-nav__button">ログアウト</button>
        </form>
      </li>

      <!-- ログインしていない場合 -->
      @else

      @if(request()->is('login'))
      <li class="header-nav__item">
        <a class="header-nav__link" href="/register">会員登録</a>
      </li>
      @endif

      @if(request()->is('register'))
      <li class="header-nav__item">
        <a class="header-nav__link" href="/login">ログイン</a>
      </li>
      @endif

      @endif

    </ul>

  </div>
</header>

<main>
  @yield('content')
</main>

</body>
</html>