<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>おかえしくん</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/c40dc7da13.js" crossorigin="anonymous"></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light white" style="background-color:#00508E;">
      <i class="fas fa-gifts"></i><a class="navbar-brand pl-2 pr-2" style="color:white" href="{{ route('home') }}">おかえしくん</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="btn btn-light" href="{{ route('event.list') }}">Events</a>
          </li>
          <li class="nav-item ml-2">
            <a class="btn btn-light" href="{{ route('celebrater.list') }}">Celebraters</a>
          </li>
      </div>
    </nav>

    @yield('content')
  </body>
</html>



