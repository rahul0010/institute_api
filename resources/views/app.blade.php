<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ url('css/app.css') }}">
    </head>
    <body>
        <nav class="navbar sticky-top navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/students"><img src="{{ url('img/logo.png') }}" alt="" class="ml-5 w-50"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end mr-5" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="/students">Students <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="/faculties">Faculties</a>
                    <a class="nav-item nav-link" href="/courses">Courses</a>
                    <a class="nav-item nav-link" href="/batches">Batches</a>
                </div>
            </div>
        </nav>
        <div class="container-fluid pb-2 pt-2 mt-3 border-bottom mb-4 border-dark ">
            <h1 class="display-5 text-center">@yield('page-heading')</h1>
        </div>
            @yield('content')
    <script src="{{ url('js/app.js') }}"></script>
    </body>
</html>
