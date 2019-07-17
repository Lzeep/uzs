<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>УЗС</title>
{{--{{ config('app.name', 'УЗС') }}--}}
    <!-- Scripts -->
    <script src="https://api-maps.yandex.ru/2.1/?apikey={{ env('YANDEX_MAPS_API_KEY') }}&lang=ru_RU" type="text/javascript"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href ="https://bootswatch.com/4/cerulean/bootstrap.css" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/datatables.css') }}">
    @stack('styles')
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial;
        }

        /* The grid: Three equal columns that floats next to each other */
        .column {
            float: left;
            width: 33.33%;
            padding: 50px;
            text-align: center;
            font-size: 25px;
            cursor: pointer;
            color: red;
        }

        .containerTab {
            padding: 20px;
            color: red;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Closable button inside the container tab */
        .closebtn {
            float: right;
            color: red;
            font-size: 35px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="color: #333;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/zus.png') }}" alt="" style="width:130px; height: auto;">
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

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('subject.index')}}">Объекты</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('violation.index')}}">Нарушения</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('mtu.index')}}">МТУ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('result.index') }}">Решения</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('type.index') }}">Типы объекта</a>
                        </li>
                        @if(Auth::user())
                            <li class="nav-item">
                                <a class="nav-link" href="/yandex">Карта города</a>
                            </li>
                        @endif

                        @if(Auth::user())
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('employee.index')}}">Сотрудники</a>
                            </li>
                        @endif
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                    </a>

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

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
@stack('scripts')
</body>
</html>
