<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <title> @yield('title') </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ url('/favicon.ico') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('/styles/app.css') }}">
    </head>

<body>

    @include('layouts.nav')

    <main>
        <div class="app">

            @yield('content')

        </div>
    </main>

    
    @include('layouts.footer')

</body>

</html>