<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Dashboard')</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/homepage/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/homepage/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Poppins" rel="stylesheet">

    <!-- Fonts & Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Raleway:300,400,500,600,700|Poppins:300,400,500,600,700"
    rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/homepage/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/homepage/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/homepage/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/homepage/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/homepage/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/homepage/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/homepage/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/homepage/css/style.css') }}" rel="stylesheet">

    <style>
        #header {
            background-color: #FEFDED;
        }
        #footer {
            background-color: #5E96AE;
        }
        .swiper-container {
            width: 100%;
            height: 650px;
        }
        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .map-container {
            display: flex;
            justify-content: center;
        }
        .map-container iframe {
            margin-top: auto;
            margin-bottom: auto;
        }
        .my-3 {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .justify-content-between>.col-lg-2 {
            margin-bottom: 20px;
            border: 1px solid transparent;
            transition: border-color 0.01s;
        }
        .justify-content-between>.col-lg-2:hover {
            border-color: blue;
        }
        #penilaian, #paket-unggulan, #rekomendasi-kesehatan {
            background-color: #FFBFA3;
        }
        .logo {
            display: flex;
            align-items: center;
            padding-right: 30px;
        }
        .logo img {
            width: auto;
            margin-left: 30px;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 14px;
            display: block;
            margin: auto;
            text-align: center;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-daftar {
            display: inline-flex;
            padding: 10px 20px;
            border: 2px solid #99a3e3;
            border-radius: 50px;
            color: #99a3e3;
            text-decoration: none;
            font-size: 16px;
            transition: all 0.3s ease;
            align-items: center;
            width: 100px;
            margin-left: 10px;
        }
        .btn-daftar:hover {
            background-color: #99a3e3;
            color: white;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            list-style-type: none;
            padding: 10px 0;
            margin: 0;
            border-radius: 8px;
        }
        .dropdown-menu li {
            padding: 8px 16px;
        }
        .dropdown-menu li a,
        .dropdown-menu li button {
            color: #333;
            text-decoration: none;
            display: block;
            width: 100%;
            text-align: left;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 10px;
            border-radius: 20px;
        }
        body {
            padding-top: 160px;
        }
        
        .logo img {
            width: auto;
            margin-left: 10px;
            margin-right: 15px; /* tambahkan ini */
        }

        .logo h1 {
            margin: 0;
            font-size: 28px;
            line-height: 1.2;
        }
    </style>
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="logo d-flex align-items-center">
            <img src="{{ asset('assets/homepage/img/logo.png') }}" alt="Rich Wellness Logo">
            <h1><a href="/">Rich Wellness</a></h1>
        </div>
        <nav id="navbar" class="navbar">
            <ul class="d-flex align-items-center">
                <li><a class="nav-link scrollto" href="/">Beranda</a></li>
                <li><a class="nav-link scrollto" href="/#paket-unggulan">Paket Unggulan</a></li>
                <li><a class="nav-link scrollto" href="/#kamar">Kamar</a></li>
                <li><a class="nav-link scrollto" href="/#fasilitas">Fasilitas</a></li>
                <li><a class="nav-link scrollto" href="/#rekomendasi-kesehatan">Kesehatan</a></li>
                <li><a class="nav-link scrollto" href="/#rekomendasi-destinasi">Wisata</a></li>
                <li><a class="nav-link scrollto" href="/#penilaian">Penilaian</a></li>
                <li><a class="nav-link scrollto" href="/#contact">Kontak</a></li>
                
                   <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ config("app.available_locales")[App::getLocale()]["native"] }} {{ config("app.available_locales")[App::getLocale()]["flag"] }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach (config("app.available_locales") as $locale => $data)
                            <li>
                                <a class="dropdown-item" href="{{ route("language.switch", $locale) }}">
                                    {{ $data["native"] }} {{ $data["flag"] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>

                @auth
                    @if(auth()->user()->role === 'admin')
                        <li><a class="getstarted scrollto" href="{{ route('admin.home') }}">Dashboard</a></li>
                    @else
                        <li class="dropdown">
                            <a class="getstarted scrollto" href="#">{{ auth()->user()->name }}</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('user.profile') }}"><i class="fas fa-id-badge me-2"></i> Profile</a></li>
                                <li><a href="{{ route('dashboard') }}"><i class="fas fa-receipt me-2"></i> Transaksi</a></li>
                                <li><a href="{{ route('keranjang') }}"><i class="fas fa-bucket me-2"></i> Keranjang</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" style="background: none; border: none; color: #333; cursor: pointer;">
                                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                @else
                    <li><a class="getstarted scrollto" href="{{ route('login') }}">Log In</a></li>
                    <li><a class="btn-daftar scrollto" href="{{ route('register') }}">Daftar</a></li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>

<!-- ======= Main Content ======= -->
<div class="container">
    @yield('content')
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap 4.6.2 Bundle (dengan Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


<!-- Optional: Debug tombol modal -->
<script>
    $(document).ready(function () {
        $('[data-toggle="modal"]').on('click', function () {
            console.log('Tombol modal diklik:', $(this).data('target'));
        });
    });
</script>

@stack('scripts')
</body>
</html>
