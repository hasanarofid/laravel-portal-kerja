<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Startup - Startup Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('theme/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('theme/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('theme/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->

    <style>
        .fullscreen-image {
            object-fit: cover;
            object-position: center;
            max-width: 300px;
            max-height: 300px;
        }

        .custom-shadow {
            box-shadow: 0 10px 8px rgba(19, 18, 18, 0.1);
            /* Sesuaikan dengan efek bayangan yang diinginkan */
        }

        table,
        td,
        th {
            padding: 3px;
        }

        .container-lowongan {
            height: 90vh;
            margin: 2rem;
            display: grid;
            position: relative;
            /* grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr 1fr; */
        }

        .icon-container {
            width: 50px;
            /* Atur lebar div sesuai kebutuhan */
            height: 50px;
            /* Atur tinggi div sesuai kebutuhan */
            /* Ganti warna ikon atau latar belakang div sesuai kebutuhan */
            background-color: #f0f0f0;
        }

        .card-lowongan {
            margin: 10px;
            border-radius: 25px;
            box-shadow: 0 10px 8px rgba(19, 18, 18, 0.1);
        }
    </style>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York,
                        USA</small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>+012 345 6789</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i>info@example.com</small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                            class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                            class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                            class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i
                            class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i
                            class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            @if (empty(session('role_id')))
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/icon.png') }}" alt="DISNAKER BLOG Logo" style="max-height: 30px;">
                </a>
            @else
                @if (session('role_id') == 1)
                    <a class="navbar-brand" href="{{ route('admin.home') }}">
                        <img src="{{ asset('img/icon.png') }}" alt="DISNAKER BLOG Logo" style="max-height: 30px;">
                    </a>
                @endif
                @if (session('role_id') == 2)
                    <a class="navbar-brand" href="{{ route('perusahaan.home') }}">
                        <img src="{{ asset('img/icon.png') }}" alt="DISNAKER BLOG Logo" style="max-height: 30px;">
                    </a>
                @endif
                @if (session('role_id') == 3)
                    <a class="navbar-brand" href="{{ route('users.home') }}">
                        <img src="{{ asset('img/icon.png') }}" alt="DISNAKER BLOG Logo" style="max-height: 30px;">
                    </a>
                @endif
            @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                @if (empty(session('role_id')))
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{ url('/') }}" class="nav-item nav-link active">HOME</a>
                        <a href="{{ url('/loginpencariankerja') }}" class="nav-item nav-link">AK1</a>
                        <a class="nav-link" href="{{ url('/loginpencariankerja') }}">LOWONGAN KERJA</a>
                        {{-- <a href="{{ url('/ak1') }}" class="nav-item nav-link">AK1</a> --}}
                        {{-- <a href="{{ url('/lowongan') }}" class="nav-item nav-link">LOWONGAN KERJA</a> --}}
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">PENCARI KERJA
                                TERDAFTAR</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ url('/register') }}" class="dropdown-item">Daftar Akun</a>
                                <a href="{{ url('/loginpencariankerja') }}" class="dropdown-item">Login</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle"
                                data-bs-toggle="dropdown">PERUSAHAAN</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ url('/daftar') }}" class="dropdown-item">Daftar Akun</a>
                                <a href="{{ url('/masukPerusahaan') }}" class="dropdown-item">Login</a>
                            </div>
                        </div>
                    </div>
                @else
                    @if (session('role_id') == 1)
                        <div class="navbar-nav ms-auto py-0">
                            <a href="{{ route('admin.home') }}" class="nav-item nav-link active">HOME</a>
                            <a href="{{ route('admin.dashboard') }}" class="nav-item nav-link">Dashboard</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle"
                                    data-bs-toggle="dropdown">{{ session('name') }}</a>
                                <div class="dropdown-menu m-0">
                                    <a href="{{ route('admin.logout') }}" class="dropdown-item">Log Out</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session('role_id') == 2)
                        <div class="navbar-nav ms-auto py-0">
                            <a href="{{ route('perusahaan.home') }}" class="nav-item nav-link active">HOME</a>
                            <a href="{{ route('perusahaan.dashboard') }}" class="nav-item nav-link">Dashboard</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle"
                                    data-bs-toggle="dropdown">{{ session('nama') }}</a>
                                <div class="dropdown-menu m-0">
                                    <a href="{{ route('perusahaan.logout') }}" class="dropdown-item">Log Out</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (session('role_id') == 3)
                        <div class="navbar-nav ms-auto py-0">
                            <a href="{{ route('users.home') }}" class="nav-item nav-link active">HOME</a>
                            <a href="{{ route('users.dashboard') }}" class="nav-item nav-link">Dashboard</a>
                            <a href="{{ route('users.ak1') }}" class="nav-item nav-link">AK1</a>
                            <a href="{{ route('users.carilowongan') }}" class="nav-item nav-link">LOWONGAN KERJA</a>
                            {{-- <a href="{{ url('/ak1') }}" class="nav-item nav-link">AK1</a> --}}
                            {{-- <a href="{{ url('/lowongan') }}" class="nav-item nav-link">LOWONGAN KERJA</a> --}}
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle"
                                    data-bs-toggle="dropdown">{{ session('pencaker_name') }}</a>
                                <div class="dropdown-menu m-0">
                                    <a href="{{ route('users.logout') }}" class="dropdown-item">Log Out</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
                <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal"
                    data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>

            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('img/bg1.jpeg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <img src="{{ asset('img/disnaker.png') }}"
                                class="fullscreen-image rounded mx-auto d-block" alt="disnaker">
                            {{-- <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5> --}}
                            <h1 class="text-white mb-md-4 animated zoomIn">SISTEM TENAGA KERJA ONLINE</h1>
                            <h2 class=" text-white mb-md-4 animated zoomIn">DINAS KETENAGAKERJAAN BANDUNG BARAT</h2>
                            <a href="{{ url('/loginpencariankerja') }}"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Masuk</a>
                            {{-- <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a> --}}
                        </div>
                    </div>
                </div>
                {{-- <div class="carousel-item">
                    <img class="w-100"  src="{{  asset('theme/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Creative & Innovative Digital Solution</h1>
                            <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free Quote</a>
                            <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div> --}}
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->

    @yield('content')



    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div
                        class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('img/icon.png') }}" alt="DISNAKER BLOG Logo"
                                style="max-height: 30px;">
                        </a>
                        <p class="mt-3 mb-4">Lorem diam sit erat dolor elitr et, diam lorem justo amet clita stet eos
                            sit. Elitr dolor duo lorem, elitr clita ipsum sea. Diam amet erat lorem stet eos. Diam amet
                            et kasd eos duo.</p>
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                                <button class="btn btn-dark">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Get In Touch</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">123 Street, New York, USA</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0">info@example.com</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">+012 345 67890</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="#"><i
                                        class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i
                                        class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i
                                        class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="#"><i
                                        class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Quick Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                                <a class="text-light" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Popular Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
                                <a class="text-light mb-2" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                                <a class="text-light" href="#"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="#">Your Site
                                Name</a>. All Rights Reserved.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed by <a class="text-white border-bottom" href="https://htmlcodex.com">HTML
                                Codex</a>
                        </p>
                        <br>Distributed By: <a class="border-bottom" href="https://themewagon.com"
                            target="_blank">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('theme/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('theme/easing/easing.min.js') }}"></script>
    <script src="{{ asset('theme/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('theme/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('theme/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('theme/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
