<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Tanlalana Website">
    <meta name="keywords" content="tanlalana programming, tanlalana coding, tanlalana bot">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {!! SEO::generate(true) !!}

    @include('web.tema.css')

    @stack('css')

            <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-8B8Z8NW0ZR"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-8B8Z8NW0ZR');
        </script>

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9727445183666854"
        crossorigin="anonymous"></script>
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
