<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>お返しくん</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <div style="background-color: steelblue; height:20px;">
      ここにヘッダーを表示する
    </div>

  </head>
  <body>
    @yield('content')
  </body>
</html>



