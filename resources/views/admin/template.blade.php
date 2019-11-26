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
    @include('admin.left')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('admin.header')
            @yield('content')
        </div>
    </div>


</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<script src="{{ asset('js/admin/admin.js') }}"></script>

@yield('scripts')

</body>
</html>
