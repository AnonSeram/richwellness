<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Rich Wellness</title>

  <!-- Favicon -->
  <link href="assets/homepage/img/favicon.png" rel="icon" />
  <link href="assets/homepage/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Fonts & Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Raleway:300,400,500,600,700|Poppins:300,400,500,600,700"
    rel="stylesheet" />

  <!-- Vendor CSS -->
  <link href="assets/homepage/vendor/aos/aos.css" rel="stylesheet" />
  <link href="assets/homepage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/homepage/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/homepage/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="assets/homepage/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/homepage/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Main CSS -->
  <link href="assets/homepage/css/style.css" rel="stylesheet" />
  <link href="tokopedia_carousel.css" rel="stylesheet" />
  
  <!-- Mobile Responsive CSS -->
  <link href="css/mobile-responsive.css" rel="stylesheet" />

  <!-- Custom CSS -->
  <style>
    
    .image-swipper {
      border-radius: 20px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      width: 90%;
      height: auto;
      object-fit: cover;
    }

    .image-swipper:hover {
      transform: scale(1.02);
      box-shadow: 0 12px 32px rgba(0, 0, 0, 0.25);
    }

    .swiper {
      background: transparent;
      padding: 20px 0;
    }

    .swiper-slide {
      background: transparent;
      display: flex;
      justify-content: center;
    }

    .swiper-container {
      width: 100%;
      height: 600px;
      position: relative;
      overflow: hidden;
    }
    
    /* Mobile responsive adjustments */
    @media (max-width: 768px) {
      .swiper-container {
        height: 300px;
      }
    }
    
    @media (max-width: 480px) {
      .swiper-container {
        height: 250px;
      }
    }

    .swiper-slide img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .carousel-container {
      margin-top: 30px; /* FIXED: Tambahkan ini agar tidak tertutup header */
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

    #penilaian,
    #paket-unggulan,
    #rekomendasi-kesehatan {
      background-color: #FFBFA3;
    }

    #header {
      background-color: #FEFDED;
    }

    #footer {
      background-color: #5E96AE;
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
      justify-content: center;
      align-items: center;
      padding: 10px 20px;
      border: 2px solid #99a3e3;
      border-radius: 50px;
      color: #99a3e3;
      font-size: 16px;
      transition: all 0.3s ease;
      width: 100px;
      margin-left: 10px;
      text-decoration: none;
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
      border-radius: 50px;
      min-width: 160px;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
      z-index: 1;
      list-style-type: none;
      padding: 10px 0;
      margin: 0;
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

    .swiper-button-prev::after,
    .swiper-button-next::after {
      display: none;
    }

    .custom-swiper-btn {
      width: 40px;
      height: 40px;
      background-color: #ffffff;
      border-radius: 50%;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      z-index: 10;
      transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .custom-swiper-btn:hover {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
      transform: translateY(-50%) scale(1.05);
    }

    .swiper-button-prev {
      left: 10px;
    }

    .swiper-button-next {
      right: 10px;
    }

    .arrow {
      border: solid #6c757d;
      border-width: 0 2px 2px 0;
      display: inline-block;
      padding: 5px;
    }

    .arrow.right {
      transform: rotate(-45deg);
    }

    .arrow.left {
      transform: rotate(135deg);
    }

        .booking-btn {
        position: absolute;
        bottom: 120px;
        right: 80px;
        background-color: #99a3e3;
        color: white;
        padding: 12px 24px;
        border-radius: 26px;
        font-size: 20px;
        text-decoration: none;
        font-weight: bold;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        transition: all 0.3s ease;
        font-family: 'Montserrat';
    }

    .booking-btn:hover {
        background-color:rgb(242, 243, 245);
        transform: scale(1.05);
    }
    
    /* Mobile responsive booking button */
    @media (max-width: 768px) {
      .booking-btn {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        right: auto;
        padding: 8px 16px;
        font-size: 14px;
        border-radius: 20px;
        min-width: 120px;
        text-align: center;
      }
    }
    
    @media (max-width: 480px) {
      .booking-btn {
        bottom: 15px;
        padding: 6px 12px;
        font-size: 12px;
        min-width: 100px;
      }
    }

  </style>
</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo d-flex align-items-center">
        <img src="assets/homepage/img/logo.png" alt="Rich Wellness Logo" />
        <h1><a href="/">Rich Wellness</a></h1>
      </div>
      <nav id="navbar" class="navbar">
        <ul class="d-flex align-items-center">
          <li><a class="nav-link scrollto" href="#hero">{{ __('messages.home') }}</a></li>
          <li><a class="nav-link scrollto" href="#paket-unggulan">{{ __('messages.featured_packages') }}</a></li>
          <li><a class="nav-link scrollto" href="#kamar">{{ __('messages.rooms') }}</a></li>
          <li><a class="nav-link scrollto" href="#fasilitas">{{ __('messages.facilities') }}</a></li>
          <li><a class="nav-link scrollto" href="#rekomendasi-kesehatan">{{ __('messages.health') }}</a></li>
          <li><a class="nav-link scrollto" href="#rekomendasi-destinasi">{{ __('messages.tourism') }}</a></li>
          <li><a class="nav-link scrollto" href="#existing-ratings">{{ __('messages.ratings') }}</a></li>
          <li><a class="nav-link scrollto" href="#contact">{{ __('messages.contact') }}</a></li>
          
          <!-- Language Switcher -->
          <li class="dropdown">
            <a class="nav-link scrollto" href="#" style="display: flex; align-items: center;">
              <i class="fas fa-globe me-1"></i>
              {{ app()->getLocale() == 'id' ? 'ID' : 'EN' }}
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('language.switch', 'id') }}">
                <img src="https://flagcdn.com/w20/id.png" alt="ID" style="width: 20px; margin-right: 8px;">
                Bahasa Indonesia
              </a></li>
              <li><a href="{{ route('language.switch', 'en') }}">
                <img src="https://flagcdn.com/w20/us.png" alt="EN" style="width: 20px; margin-right: 8px;">
                English
              </a></li>
            </ul>
          </li>

          @auth
            @if(auth()->user()->role === 'admin')
              <li><a class="getstarted scrollto" style="padding: 10px 20px;" href="{{ route('admin.home') }}">{{ __('messages.dashboard') }}</a></li>
            @elseif(auth()->user()->role === 'resepsionis')
              <li><a class="getstarted scrollto" style="padding: 10px 20px;" href="{{ route('resepsionis') }}">{{ __('messages.dashboard') }}</a></li>
            @else
              <li class="dropdown">
                <a class="getstarted scrollto" href="#">{{ auth()->user()->name }}</a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('user.profile') }}"><i class="fas fa-id-badge me-2"></i> {{ __('messages.profile') }}</a></li>
                  <li><a href="{{ route('dashboard') }}"><i class="fas fa-receipt me-2"></i> {{ __('messages.transactions') }}</a></li>
                  <li><a href="{{ route('keranjang') }}"><i class="fas fa-bucket me-2"></i> {{ __('messages.cart') }}</a></li>
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" style="background: none; border: none; padding: 0; color: #333; cursor: pointer;">
                        <i class="fas fa-sign-out-alt me-2"></i> {{ __('messages.logout') }}
                      </button>
                    </form>
                  </li>
                </ul>
              </li>
            @endif
          @else
            <li><a class="getstarted scrollto" style="padding: 10px 20px;" href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
            <li><a class="btn-daftar scrollto" href="{{ route('register') }}">{{ __('messages.register') }}</a></li>
          @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <!-- End Header -->

  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>Rich Wellness</title>

  <!-- Favicon -->
  <link href="assets/homepage/img/favicon.png" rel="icon" />
  <link href="assets/homepage/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Fonts & Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Raleway:300,400,500,600,700|Poppins:300,400,500,600,700"
    rel="stylesheet" />

  <!-- Vendor CSS -->
  <link href="assets/homepage/vendor/aos/aos.css" rel="stylesheet" />
  <link href="assets/homepage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/homepage/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/homepage/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="assets/homepage/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
  <link href="assets/homepage/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Main CSS -->
  <link href="assets/homepage/css/style.css" rel="stylesheet" />
  <link href="tokopedia_carousel.css" rel="stylesheet" />
  
  <!-- Mobile Responsive CSS -->
  <link href="css/mobile-responsive.css" rel="stylesheet" />

  <!-- Custom CSS -->
  <style>
    
    .image-swipper {
      border-radius: 20px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      width: 90%;
      height: auto;
      object-fit: cover;
    }

    .image-swipper:hover {
      transform: scale(1.02);
      box-shadow: 0 12px 32px rgba(0, 0, 0, 0.25);
    }

    .swiper {
      background: transparent;
      padding: 20px 0;
    }

    .swiper-slide {
      background: transparent;
      display: flex;
      justify-content: center;
    }

    .swiper-container {
      width: 100%;
      height: 600px;
      position: relative;
      overflow: hidden;
    }
    
    /* Mobile responsive adjustments */
    @media (max-width: 768px) {
      .swiper-container {
        height: 300px;
      }
    }
    
    @media (max-width: 480px) {
      .swiper-container {
        height: 250px;
      }
    }

    .swiper-slide img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .carousel-container {
      margin-top: 30px; /* FIXED: Tambahkan ini agar tidak tertutup header */
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

    #penilaian,
    #paket-unggulan,
    #rekomendasi-kesehatan {
      background-color: #FFBFA3;
    }

    #header {
      background-color: #FEFDED;
    }

    #footer {
      background-color: #5E96AE;
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
      justify-content: center;
      align-items: center;
      padding: 10px 20px;
      border: 2px solid #99a3e3;
      border-radius: 50px;
      color: #99a3e3;
      font-size: 16px;
      transition: all 0.3s ease;
      width: 100px;
      margin-left: 10px;
      text-decoration: none;
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
      border-radius: 50px;
      min-width: 160px;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
      z-index: 1;
      list-style-type: none;
      padding: 10px 0;
      margin: 0;
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

    .swiper-button-prev::after,
    .swiper-button-next::after {
      display: none;
    }

    .custom-swiper-btn {
      width: 40px;
      height: 40px;
      background-color: #ffffff;
      border-radius: 50%;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      z-index: 10;
      transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .custom-swiper-btn:hover {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
      transform: translateY(-50%) scale(1.05);
    }

    .swiper-button-prev {
      left: 10px;
    }

    .swiper-button-next {
      right: 10px;
    }

    .arrow {
      border: solid #6c757d;
      border-width: 0 2px 2px 0;
      display: inline-block;
      padding: 5px;
    }

    .arrow.right {
      transform: rotate(-45deg);
    }

    .arrow.left {
      transform: rotate(135deg);
    }

        .booking-btn {
        position: absolute;
        bottom: 120px;
        right: 80px;
        background-color: #99a3e3;
        color: white;
        padding: 12px 24px;
        border-radius: 26px;
        font-size: 20px;
        text-decoration: none;
        font-weight: bold;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        transition: all 0.3s ease;
        font-family: 'Montserrat';
    }

    .booking-btn:hover {
        background-color:rgb(242, 243, 245);
        transform: scale(1.05);
    }
    
    /* Mobile responsive booking button */
    @media (max-width: 768px) {
      .booking-btn {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        right: auto;
        padding: 8px 16px;
        font-size: 14px;
        border-radius: 20px;
        min-width: 120px;
        text-align: center;
      }
    }
    
    @media (max-width: 480px) {
      .booking-btn {
        bottom: 15px;
        padding: 6px 12px;
        font-size: 12px;
        min-width: 100px;
      }
    }

  </style>
</head>