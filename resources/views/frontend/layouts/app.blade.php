<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1.0, user-scalable=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    <!-- FAVICON -->
    <link rel="apple-touch-icon" href="{{ asset('frontend/assets/img/oases/favicon.png') }}">
    <link rel="icon" type="icon/image" href="{{ asset('frontend/assets/img/oases/favicon.png') }}">
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/preloader.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/elements.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/oases.css?v=1.0') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/css/responsive.css?v=1.0') }}" rel="stylesheet">
    <script>
        window.Language = '{{ config('app.locale') }}';
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @yield('styles')
</head>
<body>
    <div id="app">
        @include('frontend.layouts.navbar')
        <div class="main">
            @yield('content')
        </div>
        @include('frontend.layouts.footer')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/preloader.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/theme.plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/TweenLite.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/EasePack.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/three.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>
