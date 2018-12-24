<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ url('css/app.css') }}">
    </head>
    <body>
        <div class="container-fluid pb-2 pt-2 mt-3 border-bottom mb-4 border-dark ">
            <h1 class="display-5 text-center">@yield('page-heading')</h1>
        </div>
            @yield('content')
    <script src="{{ url('js/app.js') }}"></script>
    </body>
</html>
