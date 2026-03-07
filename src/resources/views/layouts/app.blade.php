<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo</title>
  <link rel="stylesheet" href="{{ 'css/sanitize.css' }}">
  <link rel="stylesheet" href="{{ 'css/common.css' }}">
  @yield('css')
</head>
<body>

<header class="header"> <!-- ヘッダー背景色指定 -->
  <div class="header__inner"> <!-- ヘッダー枠指定 -->
    <div class="header-utilities"> <!-- ヘッダー内　ロゴとNavの配置指定 -->
      <a class="header__logo" href="/">Todo</a> <!-- ヘッダーロゴ -->
      <nav>
        <ul class="header-nav"> <!-- ヘッダーナビ -->
          @if (Auth::check()) <!-- ログインしてたらナビ表示 -->
          <li class="header-nav__item">
            <a class="header-nav__link" href="/mypage">マイページ</a>
          </li>
          <li class="header-nav__item">
            <form class="form" action="/logout" method="post">
              @csrf
              <button class="header-nav__button">ログアウト</button>
            </form>
          </li>
          @endif
        </ul>
      </nav>
    </div>
  </div>
</header>

<main>
@yield('content')
</main>
</body>
</html>