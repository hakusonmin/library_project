<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>図書館登録サイト</title>
  <link rel="stylesheet" href="{{ asset('./css/layouts/layouts.css') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @stack('styles')
</head>

<body>
  <header>
    <h2 class="site-title">
      <a href="{{ route('admin.index') }}">大学図書館座席管理システム</a>
    </h2>
    <nav>
      <ul>
        <li><a href="{{ route('admin.register') }}">新規登録</a></li>
        <li><a href="{{ route('admin.profile.edit') }}">プロフィール</a></li>
        <li><a href="{{ route('admin.index') }}">管理者ダッシュボード</a></li>
      </ul>
    </nav>
  </header>

  <div class="line"></div>

  @yield('content')

  @if ($errors->any())

    <div class="error">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @if (session('message'))
    <div class="message">
      {{ session('message') }}
    </div>
  @endif

  <div class="line"></div>

  <footer>

  </footer>
</body>
