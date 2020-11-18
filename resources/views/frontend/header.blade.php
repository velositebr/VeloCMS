@include('frontend.alerts')
<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Navbar Area -->
    <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                    <!-- Nav brand -->
                    <a href="index.html" class="nav-brand"><img src="images/frontend/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            @include('frontend.menu')

                            <!-- Login/Register -->
                            <div class="login-register-cart-button d-flex align-items-center">
                                <!-- Login/Register -->
                                @if(!empty($authUser))
                                    <div class="login-register-btn mr-50">
                                        <a id="loginBtn">Olá, {{ $authUser->name }}</a>
                                    </div>
                                @else
                                    <div class="login-register-btn mr-50">
                                        <a href="/login" id="loginBtn">Área Restrita</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->
