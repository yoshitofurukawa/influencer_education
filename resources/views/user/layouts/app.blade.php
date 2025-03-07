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
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-coral shadow-sm" style="background-color: coral !important;">
            <div class="container">
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item mx-1">
                                <a class="nav-link btn btn-teal text-white" href="{{ url('/user/curriculum_list') }}" style="background-color: teal; color: white;">時間割</a>
                            </li>
                            <li class="nav-item mx-1">
                                <a class="nav-link btn btn-teal text-white" href="{{ url('/user/progress') }}" style="background-color: teal; color: white;">授業進捗</a>
                            </li>
                            <li class="nav-item mx-1">
                                <a class="nav-link btn btn-teal text-white" href="{{ url('/user/profile') }}" style="background-color: teal; color: white;">プロフィール設定</a>
                            </li>
                        </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-teal text-white" href="{{ route('user.show.login') }}" style="background-color: teal; color: white;">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-teal text-white" href="{{ route('user.show.register') }}" style="background-color: teal; color: white;">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-teal text-black" href="#"
                                onclick="event.preventDefault();
                                document.getElementById('user-logout-form').submit();" style="text-decoration: none; color: black;">
                                {{ __('ログアウト') }}
                            </a>
                            <form id="user-logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
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
