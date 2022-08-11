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

            @include('tema.error')

            @yield('content')

        </div>

        @include('tema.footer')

    </div>

    @include('tema.js')

    @stack('js')

</body>
</html>