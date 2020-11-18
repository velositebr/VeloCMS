@include('frontend.head')

<body>
    <!-- Preloader -->
    @include('frontend.preloader')

    @include('frontend.header')

    <!-- CONTENT -->
    @yield('content')

    <!-- Contato -->
    @include('frontend.contact')

    <!-- Footer -->
    @include('frontend.footer')

    <!-- MISC -->
    @include('frontend.misc')
</body>

</html>
