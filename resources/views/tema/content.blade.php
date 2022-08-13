<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{Setting::app()}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('tema.css')

    @stack('css')

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-8B8Z8NW0ZR"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-8B8Z8NW0ZR');
        </script>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        @include('tema.sidebar')

        <div class="content">

            @include('tema.header')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                    @include('tema.error')
                    @yield('content')

                </div>
            </div>

            @include('tema.footer')
        </div>

        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('tema.js')

    @stack('js')

</body>
</html>