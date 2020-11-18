<!doctype html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('backend.partials.meta')

    @include('backend.partials.favicon')

    <!-- Custom CSS -->
    <link href="{{ asset('css/backend/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="main-wrapper">
        @include('backend.partials.preloader')

        @yield('content')
    </div>

    <script src="{{ asset('js/backend/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/backend/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('js/backend/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script>
        $(".preloader ").fadeOut();
    </script>

</body>

</html>
