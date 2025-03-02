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
        <nav class="navbar navbar-expand-lg" style="background-color: #57e6f6"> <!-- 水色の背景 -->
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">

                    <!-- 左側のメニュー -->
                    <ul class="navbar-nav me-auto flex-column flex-lg-row">
                        <li class="nav-item">
                            <a class="btn btn-secondary text-white d-block my-1 mx-lg-2"
                                href="{{ route('curriculum_list') }}">授業管理</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-secondary text-white d-block my-1 mx-lg-2"
                                href="{{ route('article_list') }}">お知らせ管理</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-secondary text-white d-block my-1 mx-lg-2"
                                href="{{ route('banner_edit') }}">バナー管理</a>
                        </li>
                    </ul>

                    <!-- 右側のログアウトボタン -->
                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="btn btn-link text-white text-decoration-none">ログアウト</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('register') }}">新規登録</a>
                            </li>
                        @endauth
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
