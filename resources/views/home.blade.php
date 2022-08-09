<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <p>こんにちは
    @if (Auth::check())
      {{ \Auth::user()->name }}さん
      <p><a href="{{ route('logout') }}">ログアウト</a></p>
    @else
      ゲストさん
  </p>
  <p>
    <a href="{{ route('login') }}">ログイン</a><br>
    <a href="{{ route('register.create') }}">新規登録</a>
  </p>
  @endif
  </p>
</body>

</html>
