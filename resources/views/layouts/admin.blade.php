<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Área Administrativa - @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}" charset="utf-8">
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>
        @yield('custom-js')
    </body>
</html>
