<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TestContact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />

  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="/admin">
        Fashionably Late
      </a>

      <!-- ログアウト -->
      <form method="POST" action="/logout">
        @csrf
        <button class="header__logout" type="submit">logout</button>
      </form>
    </div>
  </header>

  <main>
    @yield('content')
  </main>
</body>

</html>