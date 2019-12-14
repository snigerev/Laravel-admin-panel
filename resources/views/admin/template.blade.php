<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
@yield('header')
<!-- Styles -->
    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
</head>
<body id="page-top">
<div id="wrapper">
    <left-menu></left-menu>
    <div id="main-content" class="content-wrapper d-flex flex-column">
        @include('admin.header')
        <router-view></router-view>
        {{--        @yield('content')--}}
    </div>

</div>

<script src="{{ asset('js/admin/admin.js') }}"></script>

@yield('scripts')

</body>
</html>
