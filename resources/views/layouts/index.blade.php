<!doctype html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('furni/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('furni/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('furni/css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>AJ Cell</title>
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">AJ Cell<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item {{ Request::is('produk') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('produk') }}">Produk</a>
                    </li>
                    {{-- <li><a class="nav-link" href="about.html">About us</a></li> --}}
                    {{-- <li><a class="nav-link" href="services.html">Services</a></li> --}}
                    {{-- <li><a class="nav-link" href="blog.html">Blog</a></li> --}}
                    {{-- <li><a class="nav-link" href="contact.html">Contact us</a></li> --}}
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">

                    <li>
                        @if (Auth::user())
                            <a class="nav-link" href="{{ route('logout') }}">
                                {{ Auth::user()->name }}
                                <img class="" src="{{ asset('furni/images/user.svg') }}" alt="User">
                            </a>
                        @else
                            <a class="nav-link" href="{{ route('login') }}">
                                Login
                                <img class="" src="{{ asset('furni/images/user.svg') }}" alt="User">
                            </a>
                        @endif
                    </li>
                    <li><a class="nav-link" href="{{ route('keranjang') }}"><img
                                src="{{ asset('furni/images/cart.svg') }}"></a></li>
                </ul>
            </div>
        </div>

    </nav>


    @yield('content')

    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div class="container relative">


            <div class="row">

            </div>

            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">AJ Cell<span>.</span></a>
                    </div>


                    <ul class="list-unstyled custom-social">
                        <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-8">

                </div>

            </div>

            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>. All Rights Reserved. &mdash; Designed with love by <a
                                href="https://untree.co">Untree.co</a> Distributed By <a
                                hreff="https://themewagon.com">ThemeWagon</a>
                            <!-- License information: https://untree.co/license/ -->
                        </p>
                    </div>

                    <div class="col-lg-6 text-center text-lg-end">
                        <ul class="list-unstyled d-inline-flex ms-auto">
                            <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </footer>
    <!-- End Footer Section -->


    <script src="{{ asset('furni/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('furni/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('furni/js/custom.js') }}"></script>

    @stack('script2')

</body>

</html>
