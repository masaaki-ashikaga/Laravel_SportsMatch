<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

     <!-- Font Awesome -->
     <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

     <!-- Swiper -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background: #0b63a5">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}" style="font-family: 'Montserrat Subrayada', sans-serif; color: #fff; font-size: 30px;">
                    {{ config('app.name', 'Laravel') }}
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
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white h2 pt-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="font-size: 1rem;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('eventManage') }}">イベント管理</a>
                                    <a class="dropdown-item" href="{{ route('event.create') }}">イベント作成</a>
                                    <a class="dropdown-item" href="{{ route('teamManage') }}">チーム管理</a>
                                    <a class="dropdown-item" href="{{ route('team.create') }}">チーム作成</a>
                                    <a class="dropdown-item" href="{{ route('mypage', ['id' => Auth::id()]) }}">マイページ</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
    <footer style="height: 400px; background: #0b63a5;">
        <div style="color: #fff;" class="d-flex justify-content-between align-items-center">
            <div style="height: 400px; width: 500px; padding-left: 100px;">
                <h1 style="font-family: 'Montserrat Subrayada', sans-serif; color: #fff;" class="display-4 pt-5 pl-5">SPOMATCH</h1>
                <p class="pl-5 h5">スポーツで出会おう</p>
            </div>
            <div class="">
                <ul style="list-style: none; padding-right:200px; font-size: 17px;">
                    <li class="pt-2"><a href="{{ route('genre') }}" class="text-white">ジャンルから探す</a></li>
                    <li class="pt-2"><a href="{{ route('team.index') }}" class="text-white">チーム一覧</a></li>
                    <li class="pt-2"><a href="{{ route('event.index') }}" class="text-white">イベント一覧</a></li>
                    @guest
                    <li class="pt-2"><a href="{{ route('register') }}" class="text-white">会員登録</a></li>
                    <li class="pt-2"><a href="{{ route('login') }}" class="text-white">ログイン</a></li>
                    @else
                    <li class="pt-2"><a href="{{ route('mypage', ['id' => Auth::id()]) }}" class="text-white">マイページ</a></li>
                    <li class="pt-2"><a href="{{ route('event.create') }}" class="text-white">イベント作成</a></li>
                    <li class="pt-2"><a href="{{ route('eventManage') }}" class="text-white">イベント管理</a></li>
                    <li class="pt-2"><a href="{{ route('team.create') }}" class="text-white">チーム作成</a></li>
                    <li class="pt-2"><a href="{{ route('teamManage') }}" class="text-white">チーム管理</a></li>
                    <li class="pt-2"><a href="{{ route('logout') }}" class="text-white">ログアウト</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>
