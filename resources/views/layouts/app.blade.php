<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'おかえしくん') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="https://kit.fontawesome.com/c40dc7da13.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- トースト --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
</head>
<body>
    <div id="app">
        {{-- +TODO:classにshadow-smを入れても良いかも --}}
        <nav class="navbar navbar-expand-lg navbar-light white" style="background-color:#00508E;">
            <div class="container">
                <i class="fas fa-gifts"></i>
                <a class="navbar-brand" style="color:white;" href="{{ url('/') }}">
                    おかえしくん
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color:white" href="{{ route('login') }}">ログイン</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color:white">アカウント登録</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="btn btn-light" href="{{ route('event.list') }}">Events</a>
                            </li>
                            <li class="nav-item ml-2">
                                <a class="btn btn-light" href="{{ route('celebrater.list') }}">Celebraters</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ログアウト
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


  <script>
//   @if (session('msg_success'))
//     $(function () {
//       toastr.success('{{ session('msg_success') }}');
//     });
//   @endif

//   @if (session('msg_danger'))
//     $(function () {
//       toastr.warning('{{ session('msg_danger') }}');
//     });
//   @endif
  </script>
</body>
</html>
