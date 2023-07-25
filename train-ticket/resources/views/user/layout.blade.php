<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Destino project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('frontend/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/about_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/about_responsive.css') }}">
    @yield('style')
</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_container d-flex flex-row align-items-center justify-content-start">

                            <!-- Logo -->
                            <div class="logo_container">
                                <div class="logo">
                                    <div>ETrain</div>
                                    <div>Train Agency</div>
                                    <div class="logo_image"><img src="{{ asset('frontend/images/logo.png') }}"
                                            alt=""></div>
                                </div>
                            </div>

                            <!-- Main Navigation -->
                            <nav class="main_nav ml-auto">
                                <ul class="main_nav_list">
                                    <li class="main_nav_item active"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="main_nav_item "><a href="{{ route('trains') }}">Trains</a></li>
                                    <li class="main_nav_item"><a href="{{ route('loyalty') }}">Loyality</a></li>
                                    <li class="main_nav_item"><a href="{{ route('login') }}">Login</a></li>
                                    <li class="main_nav_item"><a href="{{ route('register') }}">Register</a></li>
                                </ul>
                            </nav>

                            <!-- Search -->


                            <!-- Hamburger -->
                            <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>

                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Menu -->

        <div class="menu_container menu_mm">

            <!-- Menu Close Button -->
            <div class="menu_close_container">
                <div class="menu_close"></div>
            </div>

            <!-- Menu Items -->
            <div class="menu_inner menu_mm">
                <div class="menu menu_mm">

                    <ul class="menu_list menu_mm">
                        <li class="menu_item menu_mm"><a href="{{ route('home') }}">Home</a></li>
                        <li class="menu_item menu_mm"><a href="{{ route('trains') }}">Trains</a></li>
                        <li class="menu_item menu_mm"><a href="{{ route('loyalty') }}">Loyality</a></li>
                        <li class="menu_item menu_mm"><a href="{{ route('login') }}">Login</a></li>
                        <li class="menu_item menu_mm"><a href="{{ route('register') }}">Register</a></li>
                    </ul>

                    <!-- Menu Social -->




                </div>

            </div>

        </div>


        @yield('content')


        <!-- Footer -->

        <footer class="footer">
            <div class="container">
                <div class="row">

                    <!-- Footer Column -->
                    <div class="col-lg-4 footer_col">
                        <div class="footer_about">
                            <!-- Logo -->
                            <div class="logo_container">
                                <div class="logo">
                                    <div>ETrain</div>
                                    <div>travel agency</div>
                                    <div class="logo_image"><img src="frontend/images/logo.png" alt=""></div>
                                </div>
                            </div>
                            <div class="footer_about_text">About this cpmpany</div>
                        </div>
                    </div>
                </div>
                <div class="copyright text-center">
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> <i class="fa fa-heart-o" aria-hidden="true"></i>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('frontend/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ asset('frontend/js/about_custom.js') }}"></script>

    @yield('script')
</body>

</html>
