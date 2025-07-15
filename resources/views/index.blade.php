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
          <li><a class="nav-link scrollto" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#paket-unggulan">Paket Unggulan</a></li>
          <li><a class="nav-link scrollto" href="#kamar">Kamar</a></li>
          <li><a class="nav-link scrollto" href="#fasilitas">Fasilitas</a></li>
          <li><a class="nav-link scrollto" href="#rekomendasi-kesehatan">Kesehatan</a></li>
          <li><a class="nav-link scrollto" href="#rekomendasi-destinasi">Wisata</a></li>

          @auth
            @if(auth()->user()->role === 'admin')
              <li><a class="getstarted scrollto" style="padding: 10px 20px;" href="{{ route('admin.home') }}">Dashboard</a></li>
            @elseif(auth()->user()->role === 'resepsionis')
              <li><a class="getstarted scrollto" style="padding: 10px 20px;" href="{{ route('resepsionis') }}">Dashboard</a></li>
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
                      <button type="submit" style="background: none; border: none; padding: 0; color: #333; cursor: pointer;">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                      </button>
                    </form>
                  </li>
                </ul>
              </li>
            @endif
          @else
            <li><a class="getstarted scrollto" style="padding: 10px 20px;" href="{{ route('login') }}">Log In</a></li>
            <li><a class="btn-daftar scrollto" href="{{ route('register') }}">Daftar</a></li>
          @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <!-- End Header -->

  <!-- Swiper Carousel -->
  <div class="carousel-container">
    <div class="swiper-container main-carousel">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="/nyoba/images/carousel/1.png" alt="swipper-image-1" />
        <a href="/pesanReservasi" class="booking-btn">BOOKING NOW</a></div>
        <div class="swiper-slide"><img src="/nyoba/images/carousel/2.png" alt="swipper-image-2" /></div>
        <div class="swiper-slide"><img src="/nyoba/images/carousel/3.png" alt="swipper-image-3" /></div>
        <div class="swiper-slide"><img src="/nyoba/images/carousel/4.png" alt="swipper-image-4" /></div>
        <div class="swiper-slide"><img src="/nyoba/images/carousel/5.png" alt="swipper-image-5" /></div>
        <div class="swiper-slide"><img src="/nyoba/images/carousel/6.png" alt="swipper-image-6" /></div>
      </div>

      <!-- Pagination & Arrows -->
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev custom-swiper-btn"><i class="arrow left"></i></div>
      <div class="swiper-button-next custom-swiper-btn"><i class="arrow right"></i></div>
    </div>
  </div>


   <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Rich Wellness</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">
                        Selamat datang di Rich Wellness, oase kesehatan dan kebugaran di jantung kota Jogja. 
                        Kami menghadirkan fasilitas modern dan program khusus untuk menyegarkan tubuh, menenangkan pikiran, dan menyeimbangkan jiwa. 
                        Bersama kami, wujudkan hidup sehat yang lebih holistik dan bermakna.
                    </h2>
                    <div data-aos="fade-up" data-aos-delay="800">
                        <a href="/pesanReservasi" class="btn-get-started scrollto">Pesan <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                    <img src="assets/homepage/img/hero-img1.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">

        <!-- Paket Unggulan Section -->
        <section id="paket-unggulan" class="paket-unggulan aos" data-aos="fade-up" style="padding: 60px 0;">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2 style="font-weight: bold; color:rgb(255, 255, 255); font-size:44px; margin-bottom: 12px;">Paket Unggulan</h2>
        </div>
        <div class="row justify-content-center">
            <!-- Card 1 -->
            <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch">
                <div class="card hover-zoom border-0 shadow-sm text-center" style="max-width: 350px; width: 100%; border-radius: 20px;">
                    <div class="card-body d-flex flex-column">
                        <div class="icon-box mb-3">
                            <i class="bi bi-star-fill" style="font-size: 3rem; color: #FFC107;"></i>
                        </div>
                        <h4 class="card-title" style="color: #7AA2E3; font-weight: bold;">Serenity Retreat</h4>
                        <p class="card-text flex-grow-1 mt-3">Rasakan kedamaian sejati dengan sesi yoga dan terapi spa menenangkan.</p>
                        <a href="/pesanReservasi" class="btn btn-primary mt-3" style="border-radius: 30px;">Booking Now</a>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch">
                <div class="card hover-zoom border-0 shadow-sm text-center" style="max-width: 350px; width: 100%; border-radius: 20px;">
                    <div class="card-body d-flex flex-column">
                        <div class="icon-box mb-3">
                            <i class="bi bi-heart-fill" style="font-size: 3rem; color: #FF6B6B;"></i>
                        </div>
                        <h4 class="card-title" style="color: #7AA2E3; font-weight: bold;">Renewal Journey</h4>
                        <p class="card-text flex-grow-1 mt-3">Perjalanan peremajaan tubuh lewat yoga, terapi pijat, dan makanan sehat.</p>
                        <a href="/pesanReservasi" class="btn btn-primary mt-3" style="border-radius: 30px;">Booking Now</a>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch">
                <div class="card hover-zoom border-0 shadow-sm text-center" style="max-width: 350px; width: 100%; border-radius: 20px;">
                    <div class="card-body d-flex flex-column">
                        <div class="icon-box mb-3">
                            <i class="bi bi-lightbulb-fill" style="font-size: 3rem; color: #FFD700;"></i>
                        </div>
                        <h4 class="card-title" style="color: #7AA2E3; font-weight: bold;">Harmony Experience</h4>
                        <p class="card-text flex-grow-1 mt-3">Temukan keseimbangan hidup lewat aktivitas kesehatan dan spa relaksasi.</p>
                        <a href="/pesanReservasi" class="btn btn-primary mt-3" style="border-radius: 30px;">Booking Now</a>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch">
                <div class="card hover-zoom border-0 shadow-sm text-center" style="max-width: 350px; width: 100%; border-radius: 20px;">
                    <div class="card-body d-flex flex-column">
                        <div class="icon-box mb-3">
                            <i class="bi bi-sun-fill" style="font-size: 3rem; color: #FFA500;"></i>
                        </div>
                        <h4 class="card-title" style="color: #7AA2E3; font-weight: bold;">Ultimate Wellness</h4>
                        <p class="card-text flex-grow-1 mt-3">Kesejahteraan maksimal lewat program lengkap 10 hari di Rich Wellness.</p>
                        <a href="/pesanReservasi" class="btn btn-primary mt-3" style="border-radius: 30px;">Booking Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CSS Hover Zoom -->
<style>
    .hover-zoom {
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .hover-zoom:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }
</style>
<section id="kamar" class="services" style="background: #f8f9fa; padding: 50px 0;">
    <div class="container">
        <div class="section-title text-center" data-aos="fade-up" style="margin-bottom: 30px;">
            <h2 style="font-weight: 700;">Fasilitas Kamar</h2>
            <p style="margin-bottom: 10px;"><strong>Terdiri dari beberapa jenis fasilitas kamar yang diberikan:</strong></p>
        </div>

        <div class="row justify-content-center">
            @foreach($fasilitasKamar as $row)
                <div class="col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                    <div class="icon-box w-100 shadow-sm" 
                         style="background: #ffffff; padding: 30px; text-align: center; border-top: 5px solid #00c0a6; min-height: 280px; border-radius: 20px;"
                         data-aos="fade-up" data-aos-delay="100">
                        <div class="icon mb-3">
                            <i class="bx bx-bed" style="font-size: 48px; color: #00c0a6;"></i>
                        </div>
                        <h4 class="title mb-2" style="font-size: 22px; font-weight: 700; color: #333;">
                            {{ $row->tipe_kamar }}
                        </h4>
                        <p class="description" style="font-size: 15px; color: #555; line-height: 1.6;">
                            {{ $row->fasilitas }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



        <!-- ======= More Services Section ======= -->
        <section id="more-services" class="more-services py-5" style="background-color: #f4f4f4;">
    <div class="container">
    <div class="section-title" data-aos="fade-up">
            <h2>Fasilitas Hotel</h2>
            <p>Terdiri dari beberapa jenis fasilitas yang tersedia :</p>
        </div>
        <div class="row g-4 justify-content-center" data-aos="fade-up">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-item text-center">
                    <div class="service-img mb-3">
                        <img src="nyoba/images/fasilitas/1.jpg" alt="Swimming Pool">
                    </div>
                    <h5>Swimming Pool</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-item text-center">
                    <div class="service-img mb-3">
                        <img src="nyoba/images/fasilitas/6.jpg" alt="SPA">
                    </div>
                    <h5>SPA</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-item text-center">
                    <div class="service-img mb-3">
                        <img src="nyoba/images/fasilitas/7.jpg" alt="Fitness Center">
                    </div>
                    <h5>Fitness Center</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-item text-center">
                    <div class="service-img mb-3">
                        <img src="nyoba/images/fasilitas/8.jpg" alt="Sauna">
                    </div>
                    <h5>Sauna</h5>
                </div>
            </div>
        </div>

        <div class="row g-4 justify-content-center mt-4">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-item text-center">
                    <div class="service-img mb-3">
                        <img src="nyoba/images/fasilitas/3.jpg" alt="Breakfast">
                    </div>
                    <h5>Breakfast</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-item text-center">
                    <div class="service-img mb-3">
                        <img src="nyoba/images/fasilitas/4.jpg" alt="Parking Lot">
                    </div>
                    <h5>Parking Lot</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-item text-center">
                    <div class="service-img mb-3">
                        <img src="nyoba/images/fasilitas/5.jpg" alt="Lunch">
                    </div>
                    <h5>Lunch</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-item text-center">
                    <div class="service-img mb-3">
                        <img src="nyoba/images/fasilitas/2.jpg" alt="Wifi">
                    </div>
                    <h5>Wifi</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    body {
        background-color: #f4f4f4;
        font-family: 'Poppins', sans-serif;
    }
    .more-services {
        padding: 60px 0;
    }
    .section-title h2 {
        font-weight: bold;
        font-size: 36px;
        margin-bottom: 10px;
    }
    .section-title p {
        color: #777;
        margin-bottom: 40px;
    }
    .service-item {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
        padding: 25px 15px;
        transition: all 0.4s ease;
        height: 100%;
    }
    .service-item:hover {
        transform: translateY(-8px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
    }
    .service-img img {
        height: 150px;
        width: 100%;
        object-fit: cover;
        border-radius: 10px;
    }
    .service-item h5 {
        margin-top: 15px;
        font-weight: 600;
        font-size: 18px;
    }
</style>
        <!-- End More Services Section -->

        <!-- Rekomendasi Layanan kesehatan Section -->
       <section id="rekomendasi-kesehatan" style="padding: 40px 0; background-color: #FFBFA3;">
  <div class="container" style="max-width: 1200px; margin: auto;">
    <h2 style="text-align: center; margin-bottom: 40px; font-size: 32px; color: #333; font-weight: bold; color: white;">Rekomendasi Layanan Kesehatan Spesialis Organ Tubuh</h2>

    <div class="grid-container">
      <!-- CARD 1 -->
      <div class="custom-card">
        <div class="img-container">
          <img src="/assets/homepage/img/kesehatan/4.png" class="custom-img" alt="Poliklinik Mata">
        </div>
        <h4 class="custom-title">Poliklinik Mata RSUP Dr. Sardjito</h4>
        <p class="custom-text">Jika Anda atau orang terdekat membutuhkan perawatan mata berkualitas, RSUP Dr. Sardjito dengan dokter berpengalaman dan fasilitas canggih adalah pilihan tepat.</p>
        <a href="https://sardjito.co.id/" class="custom-btn" target="_blank">Kunjungi Situs</a>
      </div>

      <!-- CARD 2 -->
      <div class="custom-card">
        <div class="img-container">
          <img src="/assets/homepage/img/kesehatan/2.png" class="custom-img" alt="Klinik Kulit">
        </div>
        <h4 class="custom-title">Klinik Kulit RS. Panti Rapih</h4>
        <p class="custom-text">Klinik kulit Panti Rapih menyediakan diagnosis, perawatan, hingga konsultasi kecantikan dengan pendekatan holistik dan berbasis bukti.</p>
        <a href="https://pantirapih.or.id/rspr/" class="custom-btn" target="_blank">Kunjungi Situs</a>
      </div>

      <!-- CARD 3 -->
      <div class="custom-card">
        <div class="img-container">
          <img src="/assets/homepage/img/kesehatan/3.png" class="custom-img" alt="Klinik Ginjal">
        </div>
        <h4 class="custom-title">Klinik Ginjal RS. PKU Jogja</h4>
        <p class="custom-text">RS PKU Jogja siap memberikan layanan ginjal terbaik dengan tim spesialis terpercaya dan peralatan modern untuk penanganan menyeluruh.</p>
        <a href="https://rspkujogja.com/" class="custom-btn" target="_blank">Kunjungi Situs</a>
      </div>

      <!-- CARD 4 -->
      <div class="custom-card">
        <div class="img-container">
          <img src="/assets/homepage/img/kesehatan/1.png" class="custom-img" alt="Klinik Jantung">
        </div>
        <h4 class="custom-title">Klinik Jantung RSUP Dr. Sardjito</h4>
        <p class="custom-text">Dapatkan perawatan jantung terbaik di RSUP Dr. Sardjito dengan tim spesialis jantung berpengalaman dan fasilitas lengkap.</p>
        <a href="https://sardjito.co.id/" class="custom-btn" target="_blank">Kunjungi Situs</a>
      </div>
    </div>
  </div>

  <!-- CUSTOM STYLE + ANIMASI -->
  <style>
    .grid-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 24px;
    }

    .custom-card {
      background-color: #ffffff;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
      padding: 20px;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .custom-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .img-container {
      overflow: hidden;
      border-radius: 10px;
      margin-bottom: 15px;
    }

    .custom-img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
      transition: transform 0.4s ease;
    }

    .custom-card:hover .custom-img {
      transform: scale(1.05);
    }

    .custom-title {
      font-size: 18px;
      font-weight: bold;
      color: #7AA2E3;
      margin-bottom: 10px;
    }

    .custom-text {
      font-size: 14px;
      color: #333;
      flex-grow: 1;
      margin-bottom: 20px;
    }

    .custom-btn {
      background-color: #7AA2E3;
      color: #fff;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: 600;
      text-decoration: none;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .custom-btn:hover {
      background-color: #5c85d6;
      transform: scale(1.05);
    }
  </style>
</section>

        <!-- End Rekomendasi Layanan kesehatan -->

        <!-- Rekomendasi Destinasi Section -->
        <!-- Rekomendasi Destinasi Section -->
        <section id="rekomendasi-destinasi" class="rekomendasi-destinasi" data-aos="fade-up">
  <div class="container">
    <div class="section-title">
      <h2>Rekomendasi Destinasi Wisata Yogyakarta</h2>
    </div>

    <div class="card-wrapper">
      
      <div class="card-custom">
        <img src="/assets/homepage/img/destinasi/4.png" alt="Heha Sky View" class="card-img">
        <div class="card-body-custom">
          <h4>Heha Sky View</h4>
          <p>HeHa Sky View di Gunungkidul, Yogyakarta, menawarkan pemandangan indah dari ketinggian, lengkap dengan restoran dan spot foto Instagramable.</p>
          <div class="btn-wrapper">
            <a href="https://www.google.com/maps/search/heha+sky+view/@-7.9774678,110.3051026,11z/data=!3m1!4b1?entry=ttu" class="btn-custom" target="_blank">Lihat Maps</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="/assets/homepage/img/destinasi/3.png" alt="Waduk Sermo" class="card-img">
        <div class="card-body-custom">
          <h4>Waduk Sermo</h4>
          <p>Waduk Sermo merupakan waduk di Kulon Progo, Yogyakarta, berfungsi sebagai sumber air dan tempat rekreasi. Pengunjung bisa menikmati pemandangan dan aktivitas seperti naik perahu serta memancing.</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/ASE7cBjm6QmCmuTU7" class="btn-custom" target="_blank">Lihat Maps</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="/assets/homepage/img/destinasi/2.png" alt="Pantai Parangritis" class="card-img">
        <div class="card-body-custom">
          <h4>Pantai Parangritis</h4>
          <p>Pantai Parangtritis di Bantul, Yogyakarta, terkenal dengan ombak besar dan panorama senja yang menakjubkan, menjadi tujuan favorit untuk menikmati laut dan sunset.</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/n6XTkuQifzwpuynh7" class="btn-custom" target="_blank">Lihat Maps</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="/assets/homepage/img/destinasi/5.png" alt="Mangunan Yogyakarta" class="card-img">
        <div class="card-body-custom">
          <h4>Mangunan Yogyakarta</h4>
          <p>Mangunan adalah daerah perbukitan yang terkenal dengan pesona sawah terasering dan spot foto yang menarik, cocok untuk menikmati keindahan alam Yogyakarta.</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/VPARov2kFjncvpS5A" class="btn-custom" target="_blank">Lihat Maps</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="/assets/homepage/img/destinasi/1.png" alt="Bukit Bintang" class="card-img">
        <div class="card-body-custom">
          <h4>Bukit Bintang</h4>
          <p>Bukit Bintang menawarkan pemandangan spektakuler Kota Yogyakarta dari ketinggian, tempat favorit untuk menikmati panorama dan gemerlap malam.</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/FgnNE6dUi71mULE27" class="btn-custom" target="_blank">Lihat Maps</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="/assets/homepage/img/destinasi/6.png" alt="Merapi Park" class="card-img">
        <div class="card-body-custom">
          <h4>Merapi Park</h4>
          <p>Merapi Park di Sleman menawarkan berbagai miniatur landmark dunia, tempat wisata unik yang cocok untuk keluarga dan pecinta fotografi.</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/s791foTg1ttBx6um7" class="btn-custom" target="_blank">Lihat Maps</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="/assets/homepage/img/destinasi/7.png" alt="Sungai Mudal" class="card-img">
        <div class="card-body-custom">
          <h4>Sungai Mudal</h4>
          <p>Sungai Mudal di Kulon Progo adalah tempat wisata alam dengan air jernih dan suasana alami, cocok untuk relaksasi dan menikmati keindahan alam.</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/onBqxuNzR4kXVqEf8" class="custom-btn" target="_blank">Lihat Maps</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="/assets/homepage/img/destinasi/9.png" alt="Candi Prambanan" class="card-img">
        <div class="card-body-custom">
          <h4>Candi Prambanan</h4>
          <p>Candi Prambanan adalah kompleks candi Hindu terbesar dan tercantik di Indonesia, serta situs warisan dunia UNESCO yang terkenal di Yogyakarta.</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/BNNDnb4SqQDZ2NmSA" class="custom-btn" target="_blank">Lihat Maps</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="/assets/homepage/img/destinasi/8.png" alt="Benteng Vredeburg" class="card-img">
        <div class="card-body-custom">
          <h4>Benteng Vredeburg</h4>
          <p>Benteng Vredeburg adalah benteng bersejarah di pusat Kota Yogyakarta yang kini menjadi museum perjuangan nasional Indonesia.</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/EPz2nv6MZuivYQ6G8" class="custom-btn" target="_blank">Lihat Maps</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="/assets/homepage/img/destinasi/10.png" alt="Malioboro" class="card-img">
        <div class="card-body-custom">
          <h4>Malioboro</h4>
          <p>Jalan Malioboro adalah ikon wisata belanja dan kuliner Yogyakarta, penuh dengan pertokoan, pedagang kaki lima, dan suasana kota yang ramai.</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/4mP3RCB5nQLi4NpE7" class="custom-btn" target="_blank">Lihat Maps</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<style>
/* Style umum */
#rekomendasi-destinasi {
  padding: 50px 0;
  background-color: #f9f9f9;
}

.section-title h2 {
  text-align: center;
  font-weight: bold;
  margin-bottom: 40px;
  color: #333;
}

/* Wrapper card */
.card-wrapper {
  display: flex;
  gap: 20px;
  overflow-x: auto;
  padding-bottom: 20px;
  scroll-behavior: smooth;
}

.card-wrapper::-webkit-scrollbar {
  height: 8px;
}

.card-wrapper::-webkit-scrollbar-thumb {
  background: #ccc;
  border-radius: 4px;
}

.card-wrapper::-webkit-scrollbar-track {
  background: transparent;
}

/* Card Style */
.card-custom {
  min-width: 300px;
  max-width: 300px;
  background: #fff;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  flex-shrink: 0;
  display: flex;
  flex-direction: column;
}

.card-img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.card-body-custom {
  padding: 20px;
  text-align: justify;
  display: flex;
  flex-direction: column;
  height: 280px;
}

.card-body-custom h4 {
  font-size: 20px;
  color: #7AA2E3;
  font-weight: bold;
  margin-bottom: 10px;
  text-align: center;
}

.card-body-custom p {
  font-size: 14px;
  color: #555;
  flex-grow: 1;
}

.btn-wrapper {
  display: flex;
  justify-content: center;
  margin-top: 20px;
}

.btn-custom {
  background-color: #7AA2E3;
  color: #fff;
  padding: 10px 20px;
  border-radius: 25px;
  text-decoration: none;
  font-size: 14px;
  transition: background 0.3s ease;
}

.btn-custom:hover {
  background-color: #557cd2;
}

.rating-zoom:hover{
    transform: scale(1.05);
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.25);
}
</style>
        <!-- End Rekomendasi Destinasi -->

        <!-- Testimoni -->
<<section id="existing-ratings" data-aos="fade-up"  class="existing-ratings mt-5 px-3 px-md-5">
  <h3 class="text-center mb-5 fw-bold" style="font-size: 2.5rem;">Apa Kata Pengunjung?</h3>
  <div class="row g-4">
    @foreach($ratings as $rating)
      <div class="col-md-6 col-lg-4">
        <div class="card rating-zoom border-0 shadow-sm rounded-4 p-4 h-100">
          <div class="d-flex align-items-center mb-3">
            <div class="rounded-circle bg-light d-flex justify-content-center align-items-center shadow-sm" style="width: 50px; height: 50px;">
              <span class="fw-semibold text-primary" style="font-size: 1.25rem;">
                {{ strtoupper(substr($rating->user->name ?? 'U', 0, 1)) }}
              </span>
            </div>
            <div class="ms-3">
              <div class="fw-semibold text-dark" style="font-size: 1rem;">
                {{ $rating->user->name ?? 'Pengguna' }}
              </div>
              <small class="text-muted">{{ $rating->created_at->format('d M Y') }}</small>
            </div>
          </div>
          <div class="mb-2" style="color: #f5b301; font-size: 1.1rem;">
            {{ str_repeat('★', $rating->rating) }}{{ str_repeat('☆', 5 - $rating->rating) }}
          </div>
          <p class="mb-0 text-secondary" style="font-size: 0.95rem; line-height: 1.6;">
            {{ $rating->description }}
          </p>
        </div>
      </div>
    @endforeach
  </div>
</section>

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Kontak Kami</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="contact-about">
                            <h3>Rich Wellness</h3>
                            <p> Adalah tujuan utama untuk kesehatan dan kebugaran di Hotel The Rich Jogja. Terletak di
                                jantung kota Jogja, kami menawarkan pengalaman unik dalam wisata kesehatan yang berfokus
                                pada kesehatan dan kebugaran. Dengan fasilitas modern dan program kesehatan yang
                                disesuaikan, kami berkomitmen untuk meningkatkan kualitas hidup dan memberikan
                                kesempatan untuk meremajakan tubuh, pikiran, dan jiwa.</p>
                            <div class="social-links">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="info">
                            <div>
                                <i class="ri-mail-send-line"></i>
                                <p>hotline@richwellness.com</p>
                            </div>
                            <div>
                                <i class="ri-phone-line"></i>
                                <p>(0274) 5305888</p>
                            </div>
                        </div>
                    </div>
                    <div class="map-container">
                        <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
                            <iframe class="w-100 rounded" height="320px"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.3518609055313!2d110.3585073750518!3d-7.752454192266415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a58f66517c121%3A0xfb7a1e4770007836!2sThe%20Rich%20Jogja%20Hotel!5e0!3m2!1sid!2sid!4v1712567527270!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            {{-- <iframe class="w-100 rounded" height="320px"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.3518609055313!2d110.3585073750518!3d-7.752454192266415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a58f66517c121%3A0xfb7a1e4770007836!2sThe%20Rich%20Jogja%20Hotel!5e0!3m2!1sid!2sid!4v1712567527270!5m2!1sid!2sid"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Section -->

        @include('components.chatbot')
        @yield('scripts')
        
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 text-lg-left text-center">
                    <div class="copyright">
                        &copy; Copyright <strong>Rich Wellness</strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        Designed by <a href="{{ route('team.index') }}">Kelompok 9</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                        <a href="/" class="scrollto">Home</a>
                        <a href="#about" class="scrollto">About</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/homepage/vendor/purecounter/purecounter.js"></script>
    <script src="assets/homepage/vendor/aos/aos.js"></script>
    <script src="assets/homepage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/homepage/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/homepage/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/homepage/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/homepage/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/homepage/js/main.js"></script>
    <script>
        // Inisialisasi Swiper untuk Rekomendasi Layanan Kesehatan
var rekomendasiSwiper = new Swiper('.rekomendasi-swiper', {
    direction: 'horizontal',
    loop: false, // Nonaktifkan loop agar swiper berhenti setelah card ke-5
    slidesPerView: 4,
    spaceBetween: 30,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

// Inisialisasi Swiper untuk Testimonials
var testimonialsSwiper = new Swiper('.testimonials-swiper', {
    direction: 'horizontal',
    loop: true,
    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 10000, // Diubah: 6 detik antar slide
        disableOnInteraction: false,
    },
    scrollbar: {
        el: '.swiper-scrollbar',
    },
});

// Inisialisasi Swiper untuk main carousel
var mainCarouselSwiper = new Swiper('.main-carousel', {
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    autoplay: {
        delay: 10000, // Diubah: 6 detik antar slide
        disableOnInteraction: false,
    },
});

    </script>


</body>

</html>

