<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <!-- Styles -->
    <link href="{{ asset('css/mainPage/main.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <header>
        <div class="container ">
            <div class="row">
                @guest
                    <div class="col-3 top-button d-flex justify-content-center">
                        <a href="{{ route('register') }}" class="a-top"><img class="top-left"
                                                                             src="{{ asset('images/mainPage/button_left.png') }}"
                                                                             alt=""><span
                                class="text-top-left">{{ trans('mainPage/register.Register') }}</span></a>
                    </div>
                    <div class="col-6 d-flex justify-content-center">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images/mainPage/logo.png') }}" alt="">
                        </a>
                    </div>
                    <div class="col-3 top-button d-flex justify-content-center">
                        <a href="{{ route('login') }}" class="a-top"><img class="top-left"
                                                                          src="{{ asset('images/mainPage/button_right.png') }}"
                                                                          alt=""><span
                                class="text-top-right">{{ trans('mainPage/register.login') }}</span></a>
                    </div>
                @else
                    <div class="col-3 top-button d-flex justify-content-center">
                        <a href="#" class="a-top"><img class="top-left"
                                                       src="{{ asset('images/mainPage/button_left.png') }}"
                                                       alt=""><span
                                class="text-top-left">{{ $nick }}</span></a>
                    </div>
                    <div class="col-6 d-flex justify-content-center">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('images/mainPage/logo.png') }}" alt="">
                        </a>
                    </div>
                    <div class="col-3 top-button d-flex justify-content-center">
                        <a href="#" class="a-top" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><img class="top-left"
                                                                                   src="{{ asset('images/mainPage/button_right.png') }}"
                                                                                   alt=""><span
                                class="text-top-right">{{ trans('mainPage/register.logout') }}</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                            @csrf
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </header>
    <section>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="main-text">
                    <h1>Браузерная онлай-стратегия
                        во вселенских масштабах</h1>
                </div>
            </div>
        </div>
    </section>
    <main class="py-4 d-flex">
        <div class="col-3 left-main">
            <img src="{{ asset('images/mainPage/left_panel2.png') }}" alt="">
        </div>
        <div class="col-6 d-flex justify-content-center">
            @yield('content')
        </div>
        <div class="col-3 right-main">
            <img src="{{ asset('images/mainPage/right_panel2.png') }}" alt="">
        </div>
    </main>
</div>
@yield('footer')
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
