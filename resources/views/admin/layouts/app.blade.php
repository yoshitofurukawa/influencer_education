<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom Styles -->
    <style>
        .bg-cyan {
            background-color: cyan;
        }
        .text-white {
            color: white;
        }
        .btn-dimgray {
            background-color: dimgray;
            color: white;
            border: none;
            margin-right: 10px; /* ボタン間の間隔を設定 */
        }
        .btn-dimgray:hover {
            background-color: gray;
            color: white;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-cyan shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link btn btn-dimgray text-white" href="{{ url('/admin/curriculum_list') }}">授業管理</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-dimgray text-white" href="{{ url('/admin/article_list') }}">お知らせ管理</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-dimgray text-white" href="{{ url('/admin/banner_edit') }}">バナー管理</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest('admin') <!-- 'admin'ガードのゲストユーザーを確認 -->
                            @if (Route::has('admin.show.login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('admin.show.login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('admin.show.register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('admin.show.register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('ログアウト') }}
                                </a>

                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
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
</body>
</html>
