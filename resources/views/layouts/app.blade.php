<!doctype html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('backend.partials.meta')

    @include('backend.partials.favicon')

    <!-- Aditional CSS -->
    @yield('extra-css')

    <!-- Custom CSS -->
    <link href="{{ asset('css/backend/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>@yield('title')</title>

</head>

<body>
    @include('backend.partials.preloader')

    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        @include('backend.partials.header')

        @include('backend.partials.aside')
        <div class="page-wrapper">

            @yield('breadcrumb')

            <div class="container-fluid">
                @include('partials.alerts')

                @yield('content')
            </div>

            @include('backend.partials.footer')

        </div>

    </div>

    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ asset('js/backend/app.min.js') }}"></script>
    <script src="{{ asset('js/backend/app.init-menusidebar.js') }}"></script>
    <script src="{{ asset('js/backend/app-style-switcher.js') }}"></script>
    <script src="{{ asset('js/backend/feather.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!-- theme js -->
    <!--Menu sidebar -->
    <script src="{{ asset('js/backend/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('js/backend/custom.min.js') }}"></script>

    <!-- Aditional CSS -->
    @yield('extra-js')

</body>

</html>
