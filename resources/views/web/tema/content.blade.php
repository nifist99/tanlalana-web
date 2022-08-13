<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{Setting::app()}}</title>

    @include('web.tema.css')

    @stack('css')
</head>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    @include('web.tema.header')

    @yield('content')

    @include('web.tema.footer')
    @include('web.tema.js')

    @stack('js')
</body>
</html>
