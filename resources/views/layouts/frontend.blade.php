<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('custom.meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('fonts/Roboto/Roboto.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/style.css') }}">
    @yield('custom.css')

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('fonts/themify/themify.min.css') }}">

    <title>@yield('title') | Travel planning evolved</title>
</head>
<body>

    <div id="app">
        @include('frontend.partials.navbar')

        @yield('content')
    </div>

    <script src="{{ asset('js/frontend/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/frontend/popper.min.js') }}"></script>
    <script src="{{ asset('js/frontend/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/frontend/app.js') }}"></script>
    @yield('footer.scripts')
</body>
</html>