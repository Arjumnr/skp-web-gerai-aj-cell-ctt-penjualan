<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>AJ Cell</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('themes/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('themes/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('themes/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('themes/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('themes/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<!-- body -->
<style>
   
</style>
<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('themes/images/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="head_top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="top-box">
                                <ul class="sociel_link">
                                    <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="top-box">
                                <p>Selamat datang di AJ Cell...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo"> <a href="{{ route('home') }}"><img
                                            src="{{ asset('themes/images/AJ.png') }}" alt="logo" /></a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li><a href="{{ route('home') }}">Beranda</a></li>
                                        <li><a href="{{ route('keranjang') }}"><i class="fa fa-shopping-cart"></i></a>
                                        </li>
                                        {{-- Uncomment and customize the following lines for additional menu items --}}
                                        {{-- <li><a href="{{ route('about') }}">About</a></li> --}}
                                        {{-- <li><a href="{{ route('blog') }}">Blog</a></li> --}}
                                        {{-- <li><a href="{{ route('contact') }}">Contact</a></li> --}}
                                        {{-- <li class="mean-last"><a href="#contact">Signup</a></li> --}}
                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                        {{-- cek $cek  --}}
                        @if ($cek == false)
                            <li><a class="buy" href="{{ route('login') }}">Login</a></li>
                        @else
                            <li><a class="buy" href="{{ route('logout') }}">Logout</a></li>
                        @endif
                    </div>
                </div>
            </div>
            <!-- end header inner -->
    </header>
    <!-- end header -->


    @yield('content')


    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <ul class="sociel">
                            <li> <a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li> <a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="copyright">
                <p>Copyright 2019 All Right Reserved By <a href="https://html.design/">Free html Templates</a>
                    Distributed By <a href="https://themewagon.com">ThemeWagon </a></p>
            </div>

        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="{{ asset('themes/js/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/js/popper.min.js') }}"></script>
    <script src="{{ asset('themes/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('themes/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('themes/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('themes/js/custom.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> --}}
    {{-- jqueri 3.0.1 --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>
@stack('scripts')

</html>
