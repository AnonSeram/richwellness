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

  <!-- ======= Enhanced Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center" style="z-index: 1050;">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo d-flex align-items-center enhanced-logo">
        <div class="logo-container">
          <img src="assets/homepage/img/logo.png" alt="Rich Wellness Logo" class="logo-img" />
          <div class="logo-glow"></div>
        </div>
        <div class="brand-text">
          <h1><a href="/">Rich Wellness</a></h1>
          <span class="tagline">Transform Your Health Journey</span>
        </div>
      </div>
      
      <nav id="navbar" class="navbar enhanced-navbar">
        <ul class="d-flex align-items-center">
          <li><a class="nav-link scrollto active" href="#hero">{{ __("messages.home") }}</a></li>
          <li><a class="nav-link scrollto" href="#paket-unggulan">{{ __("messages.featured_packages") }}</a></li>
          <li><a class="nav-link scrollto" href="#kamar">{{ __("messages.rooms") }}</a></li>
          <li><a class="nav-link scrollto" href="#fasilitas">{{ __("messages.facilities") }}</a></li>
          <li><a class="nav-link scrollto" href="#rekomendasi-kesehatan">{{ __("messages.health") }}</a></li>
          <li><a class="nav-link scrollto" href="#rekomendasi-destinasi">{{ __("messages.tourism") }}</a></li>
          <li><a class="nav-link scrollto" href="#existing-ratings">{{ __("messages.ratings") }}</a></li>
          <li><a class="nav-link scrollto" href="#contact">{{ __("messages.contact") }}</a></li>
          
          <!-- Enhanced Language Switcher -->
          <li class="dropdown enhanced-dropdown" style="z-index: 1060;">
            <a class="nav-link scrollto language-switcher" href="#" style="display: flex; align-items: center;">
              <div class="language-icon">
                <i class="fas fa-globe"></i>
              </div>
              <span class="language-text">{{ app()->getLocale() == 'id' ? 'ID' : 'EN' }}</span>
              <i class="fas fa-chevron-down dropdown-arrow"></i>
            </a>
            <ul class="dropdown-menu enhanced-dropdown-menu" style="z-index: 1060;">
              <li><a href="{{ route('language.switch', 'id') }}" class="dropdown-item">
                <img src="https://flagcdn.com/w20/id.png" alt="ID" class="flag-icon">
                <span>Bahasa Indonesia</span>
              </a></li>
              <li><a href="{{ route('language.switch', 'en') }}" class="dropdown-item">
                <img src="https://flagcdn.com/w20/us.png" alt="EN" class="flag-icon">
                <span>English</span>
              </a></li>
            </ul>
          </li>

          @auth
            @if(auth()->user()->role === 'admin')
              <li><a class="getstarted enhanced-btn" href="{{ route('admin.home') }}">
                <i class="fas fa-tachometer-alt me-2"></i>
                {{ __("messages.dashboard") }}
              </a></li>
            @elseif(auth()->user()->role === 'resepsionis')
              <li><a class="getstarted enhanced-btn" href="{{ route('resepsionis') }}">
                <i class="fas fa-tachometer-alt me-2"></i>
                {{ __("messages.dashboard") }}
              </a></li>
            @else
              <li class="dropdown enhanced-dropdown user-dropdown" style="z-index: 1060;">
                <a class="getstarted enhanced-btn user-btn" href="#">
                  <div class="user-avatar">
                    <span>{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                  </div>
                  <span class="user-name">{{ auth()->user()->name }}</span>
                  <i class="fas fa-chevron-down dropdown-arrow"></i>
                </a>
                <ul class="dropdown-menu enhanced-dropdown-menu user-menu" style="z-index: 1060;">
                  <li><a href="{{ route('user.profile') }}" class="dropdown-item">
                    <i class="fas fa-id-badge"></i>
                    <span>{{ __("messages.profile") }}</span>
                  </a></li>
                  <li><a href="{{ route('dashboard') }}" class="dropdown-item">
                    <i class="fas fa-receipt"></i>
                    <span>{{ __("messages.transactions") }}</span>
                  </a></li>
                  <li><a href="{{ route('keranjang') }}" class="dropdown-item">
                    <i class="fas fa-shopping-cart"></i>
                    <span>{{ __("messages.cart") }}</span>
                  </a></li>
                  <li class="dropdown-divider"></li>
                  <li>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="dropdown-item logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>{{ __("messages.logout") }}</span>
                      </button>
                    </form>
                  </li>
                </ul>
              </li>
            @endif
          @else
            <li><a class="getstarted enhanced-btn login-btn" href="{{ route('login') }}">
              <i class="fas fa-sign-in-alt me-2"></i>
              {{ __("messages.login") }}
            </a></li>
            <li><a class="btn-daftar enhanced-register-btn" href="{{ route('register') }}">
              <i class="fas fa-user-plus me-2"></i>
              {{ __("messages.register") }}
            </a></li>
          @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle enhanced-mobile-toggle"></i>
      </nav>
    </div>
    
    <!-- Header background decoration -->
    <div class="header-decoration">
      <div class="decoration-circle circle-1"></div>
      <div class="decoration-circle circle-2"></div>
    </div>
  </header>
  <!-- End Enhanced Header -->

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
                    <h1 data-aos="fade-up">{{ __('messages.hero_title') }}</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">
                        {{ __('messages.hero_description') }}
                    </h2>
                    <div data-aos="fade-up" data-aos-delay="800">
                        <a href="/pesanReservasi" class="btn-get-started scrollto">{{ __('messages.book_now') }} <i
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

        <!-- Enhanced Paket Unggulan Section -->
        <section id="paket-unggulan" class="paket-unggulan aos enhanced-packages" data-aos="fade-up" style="padding: 80px 0;">
    <div class="container">
        <!-- Enhanced Section Header -->
        <div class="section-title text-center mb-5" data-aos="fade-up">
            <div class="section-icon mb-4">
                <div class="icon-container">
                    <i class="fas fa-spa"></i>
                    <div class="icon-glow"></div>
                </div>
            </div>
            <h2 class="enhanced-title">{{ __('messages.featured_packages') }}</h2>
            <div class="title-underline"></div>
            <p class="section-subtitle">Pilih paket wellness terbaik untuk perjalanan kesehatan Anda</p>
        </div>
        
        <div class="row justify-content-center">
            <!-- Enhanced Card 1 -->
            <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="enhanced-package-card">
                    <div class="card-decoration">
                        <div class="decoration-element element-1"></div>
                        <div class="decoration-element element-2"></div>
                    </div>
                    <div class="package-icon">
                        <div class="icon-bg">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <div class="icon-badge">Popular</div>
                    </div>
                    <div class="package-content">
                        <h4 class="package-title">Serenity Retreat</h4>
                        <p class="package-description">Rasakan kedamaian sejati dengan sesi yoga dan terapi spa menenangkan.</p>
                        <div class="package-features">
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Yoga Sessions</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Spa Therapy</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Meditation</span>
                            </div>
                        </div>
                        <a href="/pesanReservasi" class="enhanced-booking-btn">
                            <span>Booking Now</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Card 2 -->
            <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                <div class="enhanced-package-card">
                    <div class="card-decoration">
                        <div class="decoration-element element-1"></div>
                        <div class="decoration-element element-2"></div>
                    </div>
                    <div class="package-icon">
                        <div class="icon-bg renewal">
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                    <div class="package-content">
                        <h4 class="package-title">Renewal Journey</h4>
                        <p class="package-description">Perjalanan peremajaan tubuh lewat yoga, terapi pijat, dan makanan sehat.</p>
                        <div class="package-features">
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Body Renewal</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Massage Therapy</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Healthy Meals</span>
                            </div>
                        </div>
                        <a href="/pesanReservasi" class="enhanced-booking-btn">
                            <span>Booking Now</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Card 3 -->
            <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                <div class="enhanced-package-card">
                    <div class="card-decoration">
                        <div class="decoration-element element-1"></div>
                        <div class="decoration-element element-2"></div>
                    </div>
                    <div class="package-icon">
                        <div class="icon-bg harmony">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                    </div>
                    <div class="package-content">
                        <h4 class="package-title">Harmony Experience</h4>
                        <p class="package-description">Temukan keseimbangan hidup lewat aktivitas kesehatan dan spa relaksasi.</p>
                        <div class="package-features">
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Life Balance</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Health Activities</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Spa Relaxation</span>
                            </div>
                        </div>
                        <a href="/pesanReservasi" class="enhanced-booking-btn">
                            <span>Booking Now</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Card 4 -->
            <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                <div class="enhanced-package-card featured">
                    <div class="card-decoration">
                        <div class="decoration-element element-1"></div>
                        <div class="decoration-element element-2"></div>
                    </div>
                    <div class="package-icon">
                        <div class="icon-bg ultimate">
                            <i class="fas fa-crown"></i>
                        </div>
                        <div class="icon-badge premium">Premium</div>
                    </div>
                    <div class="package-content">
                        <h4 class="package-title">Ultimate Wellness</h4>
                        <p class="package-description">Kesejahteraan maksimal lewat program lengkap 10 hari di Rich Wellness.</p>
                        <div class="package-features">
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>10-Day Program</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Complete Wellness</span>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-check"></i>
                                <span>Premium Service</span>
                            </div>
                        </div>
                        <a href="/pesanReservasi" class="enhanced-booking-btn premium">
                            <span>Booking Now</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Packages Styles -->
<style>
.enhanced-packages {
    background: linear-gradient(135deg, #FFBFA3 0%, rgba(255, 191, 163, 0.8) 50%, #FFBFA3 100%);
    position: relative;
    overflow: hidden;
}

.enhanced-packages::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.05)"/><circle cx="10" cy="60" r="0.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
    pointer-events: none;
}

.section-icon {
    position: relative;
    display: inline-block;
}

.icon-container {
    position: relative;
    width: 80px;
    height: 80px;
    margin: 0 auto;
    background: linear-gradient(135deg, #99a3e3, #74e9d5);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 30px rgba(153, 163, 227, 0.3);
}

.icon-container i {
    font-size: 2.5rem;
    color: white;
    z-index: 2;
    position: relative;
}

.icon-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100px;
    height: 100px;
    background: radial-gradient(circle, rgba(153, 163, 227, 0.3) 0%, transparent 70%);
    border-radius: 50%;
    animation: pulse 3s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.7; }
    50% { transform: translate(-50%, -50%) scale(1.1); opacity: 0.3; }
}

.enhanced-title {
    font-size: 3rem;
    font-weight: 800;
    color: white;
    margin: 20px 0 10px 0;
    text-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    position: relative;
}

.title-underline {
    width: 100px;
    height: 4px;
    background: linear-gradient(90deg, #99a3e3, #74e9d5);
    margin: 0 auto 20px auto;
    border-radius: 2px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.section-subtitle {
    font-size: 1.2rem;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 500;
    max-width: 600px;
    margin: 0 auto;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.enhanced-package-card {
    background: white;
    border-radius: 25px;
    padding: 0;
    height: 100%;
    position: relative;
    overflow: hidden;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: 1px solid rgba(153, 163, 227, 0.1);
}

.enhanced-package-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, #99a3e3, #74e9d5, #FFBFA3);
    z-index: 1;
}

.enhanced-package-card.featured::before {
    background: linear-gradient(90deg, #FFD700, #FFA500, #FF6B6B);
}

.enhanced-package-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
}

.card-decoration {
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
}

.decoration-element {
    position: absolute;
    border-radius: 50%;
    opacity: 0.1;
}

.element-1 {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #99a3e3, #74e9d5);
    top: -30px;
    right: -30px;
}

.element-2 {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #FFBFA3, #99a3e3);
    bottom: 20px;
    left: -20px;
}

.package-icon {
    position: relative;
    text-align: center;
    padding: 30px 30px 20px 30px;
    z-index: 2;
}

.icon-bg {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #99a3e3, #74e9d5);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px auto;
    box-shadow: 0 8px 20px rgba(153, 163, 227, 0.3);
    transition: all 0.3s ease;
    position: relative;
}

.icon-bg.renewal {
    background: linear-gradient(135deg, #FF6B6B, #FF8E8E);
}

.icon-bg.harmony {
    background: linear-gradient(135deg, #74e9d5, #99a3e3);
}

.icon-bg.ultimate {
    background: linear-gradient(135deg, #FFD700, #FFA500);
}

.enhanced-package-card:hover .icon-bg {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 12px 30px rgba(153, 163, 227, 0.4);
}

.icon-bg i {
    font-size: 2rem;
    color: white;
    z-index: 2;
}

.icon-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: linear-gradient(135deg, #FF6B6B, #FF8E8E);
    color: white;
    padding: 4px 12px;
    border-radius: 15px;
    font-size: 0.75rem;
    font-weight: 600;
    box-shadow: 0 4px 10px rgba(255, 107, 107, 0.3);
}

.icon-badge.premium {
    background: linear-gradient(135deg, #FFD700, #FFA500);
    box-shadow: 0 4px 10px rgba(255, 215, 0, 0.3);
}

.package-content {
    padding: 0 30px 30px 30px;
    position: relative;
    z-index: 2;
}

.package-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 15px;
    text-align: center;
}

.package-description {
    color: #6c757d;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 20px;
    text-align: center;
}

.package-features {
    margin-bottom: 25px;
}

.feature-item {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
    font-size: 0.9rem;
    color: #555;
}

.feature-item i {
    color: #28a745;
    margin-right: 10px;
    font-size: 0.8rem;
    width: 16px;
}

.enhanced-booking-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: linear-gradient(135deg, #99a3e3, #74e9d5);
    color: white;
    padding: 12px 25px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    box-shadow: 0 6px 15px rgba(153, 163, 227, 0.3);
    position: relative;
    overflow: hidden;
}

.enhanced-booking-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.3s ease;
}

.enhanced-booking-btn:hover::before {
    left: 100%;
}

.enhanced-booking-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(153, 163, 227, 0.4);
    color: white;
}

.enhanced-booking-btn.premium {
    background: linear-gradient(135deg, #FFD700, #FFA500);
    box-shadow: 0 6px 15px rgba(255, 215, 0, 0.3);
}

.enhanced-booking-btn.premium:hover {
    box-shadow: 0 8px 20px rgba(255, 215, 0, 0.4);
}

.enhanced-booking-btn i {
    transition: transform 0.3s ease;
}

.enhanced-booking-btn:hover i {
    transform: translateX(5px);
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .enhanced-title {
        font-size: 2.2rem;
    }
    
    .section-subtitle {
        font-size: 1rem;
    }
    
    .icon-container {
        width: 60px;
        height: 60px;
    }
    
    .icon-container i {
        font-size: 2rem;
    }
    
    .enhanced-package-card {
        margin-bottom: 20px;
    }
    
    .package-content {
        padding: 0 20px 25px 20px;
    }
    
    .package-icon {
        padding: 25px 20px 15px 20px;
    }
}

@media (max-width: 480px) {
    .enhanced-title {
        font-size: 1.8rem;
    }
    
    .package-title {
        font-size: 1.3rem;
    }
    
    .package-description {
        font-size: 0.9rem;
    }
    
    .enhanced-booking-btn {
        padding: 10px 20px;
        font-size: 0.9rem;
    }
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
        <div class="row g-4 justify-content-center">
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
       <!-- Enhanced Rekomendasi Layanan kesehatan Section -->
       <section id="rekomendasi-kesehatan" class="enhanced-health-services" style="padding: 80px 0;">
  <div class="container">
    <!-- Enhanced Section Header -->
    <div class="section-title text-center mb-5" data-aos="fade-up">
        <div class="section-icon mb-4">
            <div class="icon-container health-icon">
                <i class="fas fa-heartbeat"></i>
                <div class="icon-glow"></div>
            </div>
        </div>
        <h2 class="enhanced-title">Rekomendasi Layanan Kesehatan Spesialis</h2>
        <div class="title-underline"></div>
        <p class="section-subtitle">Temukan layanan kesehatan terbaik untuk kebutuhan spesifik Anda</p>
    </div>

    <div class="row justify-content-center">
      <!-- CARD 1 -->
      <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="enhanced-service-card">
          <div class="service-img-container">
            <img src="/assets/homepage/img/kesehatan/4.png" class="service-img" alt="Poliklinik Mata">
            <div class="img-overlay"></div>
          </div>
          <div class="service-content">
            <h4 class="service-title">Poliklinik Mata RSUP Dr. Sardjito</h4>
            <p class="service-text">Jika Anda atau orang terdekat membutuhkan perawatan mata berkualitas, RSUP Dr. Sardjito dengan dokter berpengalaman dan fasilitas canggih adalah pilihan tepat.</p>
            <a href="https://sardjito.co.id/" class="enhanced-service-btn" target="_blank">
                <span>Kunjungi Situs</span>
                <i class="fas fa-external-link-alt"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- CARD 2 -->
      <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
        <div class="enhanced-service-card">
          <div class="service-img-container">
            <img src="/assets/homepage/img/kesehatan/2.png" class="service-img" alt="Klinik Kulit">
            <div class="img-overlay"></div>
          </div>
          <div class="service-content">
            <h4 class="service-title">Klinik Kulit RS. Panti Rapih</h4>
            <p class="service-text">Klinik kulit Panti Rapih menyediakan diagnosis, perawatan, hingga konsultasi kecantikan dengan pendekatan holistik dan berbasis bukti.</p>
            <a href="https://pantirapih.or.id/rspr/" class="enhanced-service-btn" target="_blank">
                <span>Kunjungi Situs</span>
                <i class="fas fa-external-link-alt"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- CARD 3 -->
      <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
        <div class="enhanced-service-card">
          <div class="service-img-container">
            <img src="/assets/homepage/img/kesehatan/3.png" class="service-img" alt="Klinik Ginjal">
            <div class="img-overlay"></div>
          </div>
          <div class="service-content">
            <h4 class="service-title">Klinik Ginjal RS. PKU Jogja</h4>
            <p class="service-text">RS PKU Jogja siap memberikan layanan ginjal terbaik dengan tim spesialis terpercaya dan peralatan modern untuk penanganan menyeluruh.</p>
            <a href="https://rspkujogja.com/" class="enhanced-service-btn" target="_blank">
                <span>Kunjungi Situs</span>
                <i class="fas fa-external-link-alt"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- CARD 4 -->
      <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
        <div class="enhanced-service-card">
          <div class="service-img-container">
            <img src="/assets/homepage/img/kesehatan/1.png" class="service-img" alt="Klinik Jantung">
            <div class="img-overlay"></div>
          </div>
          <div class="service-content">
            <h4 class="service-title">Klinik Jantung RSUP Dr. Sardjito</h4>
            <p class="service-text">Dapatkan perawatan jantung terbaik di RSUP Dr. Sardjito dengan tim spesialis jantung berpengalaman dan fasilitas lengkap.</p>
            <a href="https://sardjito.co.id/" class="enhanced-service-btn" target="_blank">
                <span>Kunjungi Situs</span>
                <i class="fas fa-external-link-alt"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ENHANCED HEALTH SERVICES STYLES -->
  <style>
    .enhanced-health-services {
        background: linear-gradient(135deg, #FEFDED 0%, #F8F9FA 100%);
        position: relative;
        overflow: hidden;
    }

    .enhanced-health-services::before {
        content: ";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><defs><pattern id='dots' width='10' height='10' patternUnits='userSpaceOnUse'><circle cx='2' cy='2' r='1' fill='rgba(153,163,227,0.1)'/></pattern></defs><rect width='100' height='100' fill='url(%23dots)'/></svg>");
        opacity: 0.5;
        pointer-events: none;
    }

    .health-icon .icon-container {
        background: linear-gradient(135deg, #74e9d5, #99a3e3);
        box-shadow: 0 10px 30px rgba(116, 233, 213, 0.3);
    }

    .health-icon .icon-glow {
        background: radial-gradient(circle, rgba(116, 233, 213, 0.3) 0%, transparent 70%);
    }

    .enhanced-service-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .enhanced-service-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .service-img-container {
        position: relative;
        height: 180px;
        overflow: hidden;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .service-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .enhanced-service-card:hover .service-img {
        transform: scale(1.1);
    }

    .img-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.4) 0%, transparent 50%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .enhanced-service-card:hover .img-overlay {
        opacity: 1;
    }

    .service-content {
        padding: 25px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .service-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 10px;
        text-align: center;
    }

    .service-text {
        font-size: 0.95rem;
        color: #6c757d;
        line-height: 1.6;
        margin-bottom: 20px;
        flex-grow: 1;
        text-align: center;
    }

    .enhanced-service-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: linear-gradient(135deg, #99a3e3, #74e9d5);
        color: white;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(153, 163, 227, 0.3);
    }

    .enhanced-service-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(153, 163, 227, 0.4);
        color: white;
    }

    .enhanced-service-btn i {
        transition: transform 0.3s ease;
    }

    .enhanced-service-btn:hover i {
        transform: translateX(5px);
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .service-title {
            font-size: 1.2rem;
        }
        .service-text {
            font-size: 0.85rem;
        }
        .enhanced-service-btn {
            padding: 8px 15px;
            font-size: 0.8rem;
        }
    }

    @media (max-width: 480px) {
        .service-content {
            padding: 20px;
        }
        .service-title {
            font-size: 1.1rem;
        }
        .service-text {
            font-size: 0.8rem;
        }
    }
  </style>
</section>

        <!-- End Rekomendasi Layanan kesehatan -->

        <!-- Enhanced Rekomendasi Destinasi Section -->
        <section id="rekomendasi-destinasi" class="enhanced-tourism-destinations" style="padding: 80px 0;">
  <div class="container">
    <!-- Enhanced Section Header -->
    <div class="section-title text-center mb-5" data-aos="fade-up">
        <div class="section-icon mb-4">
            <div class="icon-container tourism-icon">
                <i class="fas fa-map-marked-alt"></i>
                <div class="icon-glow"></div>
            </div>
        </div>
        <h2 class="enhanced-title">Rekomendasi Destinasi Wisata Yogyakarta</h2>
        <div class="title-underline"></div>
        <p class="section-subtitle">Jelajahi keindahan Yogyakarta dengan rekomendasi destinasi terbaik kami</p>
    </div>

    <div class="row justify-content-center">
      
      <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
        <div class="enhanced-destination-card">
          <div class="destination-img-container">
            <img src="/assets/homepage/img/destinasi/4.png" alt="Heha Sky View" class="destination-img">
            <div class="img-overlay"></div>
          </div>
          <div class="destination-content">
            <h4 class="destination-title">Heha Sky View</h4>
            <p class="destination-text">HeHa Sky View di Gunungkidul, Yogyakarta, menawarkan pemandangan indah dari ketinggian, lengkap dengan restoran dan spot foto Instagramable.</p>
            <a href="https://www.google.com/maps/search/heha+sky+view/@-7.9774678,110.3051026,11z/data=!3m1!4b1?entry=ttu" class="enhanced-destination-btn" target="_blank">
                <span>Lihat Maps</span>
                <i class="fas fa-map-marker-alt"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
        <div class="enhanced-destination-card">
          <div class="destination-img-container">
            <img src="/assets/homepage/img/destinasi/3.png" alt="Waduk Sermo" class="destination-img">
            <div class="img-overlay"></div>
          </div>
          <div class="destination-content">
            <h4 class="destination-title">Waduk Sermo</h4>
            <p class="destination-text">Waduk Sermo merupakan waduk di Kulon Progo, Yogyakarta, berfungsi sebagai sumber air dan tempat rekreasi. Pengunjung bisa menikmati pemandangan dan aktivitas seperti naik perahu serta memancing.</p>
            <a href="https://maps.app.goo.gl/ASE7cBjm6QmCmuTU7" class="enhanced-destination-btn" target="_blank">
                <span>Lihat Maps</span>
                <i class="fas fa-map-marker-alt"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
        <div class="enhanced-destination-card">
          <div class="destination-img-container">
            <img src="/assets/homepage/img/destinasi/2.png" alt="Pantai Parangritis" class="destination-img">
            <div class="img-overlay"></div>
          </div>
          <div class="destination-content">
            <h4 class="destination-title">Pantai Parangritis</h4>
            <p class="destination-text">Pantai Parangtritis di Bantul, Yogyakarta, terkenal dengan ombak besar dan panorama senja yang menakjubkan, menjadi tujuan favorit untuk menikmati laut dan sunset.</p>
            <a href="https://maps.app.goo.gl/n6XTkuQifzwpuynh7" class="enhanced-destination-btn" target="_blank">
                <span>Lihat Maps</span>
                <i class="fas fa-map-marker-alt"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
        <div class="enhanced-destination-card">
          <div class="destination-img-container">
            <img src="/assets/homepage/img/destinasi/5.png" alt="Mangunan Yogyakarta" class="destination-img">
            <div class="img-overlay"></div>
          </div>
          <div class="destination-content">
            <h4 class="destination-title">Mangunan Yogyakarta</h4>
            <p class="destination-text">Mangunan adalah daerah perbukitan yang terkenal dengan pesona sawah terasering dan spot foto yang menarik, cocok untuk menikmati keindahan alam Yogyakarta.</p>
            <a href="https://maps.app.goo.gl/VPARov2kFjncvpS5A" class="enhanced-destination-btn" target="_blank">
                <span>Lihat Maps</span>
                <i class="fas fa-map-marker-alt"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="500">
        <div class="enhanced-destination-card">
          <div class="destination-img-container">
            <img src="/assets/homepage/img/destinasi/1.png" alt="Bukit Bintang" class="destination-img">
            <div class="img-overlay"></div>
          </div>
          <div class="destination-content">
            <h4 class="destination-title">Bukit Bintang</h4>
            <p class="destination-text">Bukit Bintang menawarkan pemandangan spektakuler Kota Yogyakarta dari ketinggian, tempat favorit untuk menikmati panorama dan gemerlap malam.</p>
            <a href="https://maps.app.goo.gl/FgnNE6dUi71mULE27" class="enhanced-destination-btn" target="_blank">
                <span>Lihat Maps</span>
                <i class="fas fa-map-marker-alt"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="600">
        <div class="enhanced-destination-card">
          <div class="destination-img-container">
            <img src="/assets/homepage/img/destinasi/6.png" alt="Merapi Park" class="destination-img">
            <div class="img-overlay"></div>
          </div>
          <div class="destination-content">
            <h4 class="destination-title">Merapi Park</h4>
            <p class="destination-text">Merapi Park di Sleman menawarkan berbagai miniatur landmark dunia, tempat wisata unik yang cocok untuk keluarga dan pecinta fotografi.</p>
            <a href="https://maps.app.goo.gl/s791foTg1ttBx6um7" class="enhanced-destination-btn" target="_blank">
                <span>Lihat Maps</span>
                <i class="fas fa-map-marker-alt"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="700">
        <div class="enhanced-destination-card">
          <div class="destination-img-container">
            <img src="/assets/homepage/img/destinasi/7.png" alt="Sungai Mudal" class="destination-img">
            <div class="img-overlay"></div>
          </div>
          <div class="destination-content">
            <h4 class="destination-title">Sungai Mudal</h4>
            <p class="destination-text">Sungai Mudal di Kulon Progo adalah tempat wisata alam dengan air jernih dan suasana alami, cocok untuk relaksasi dan menikmati keindahan alam.</p>
            <a href="https://maps.app.goo.gl/onBqxuNzR4kXVqEf8" class="enhanced-destination-btn" target="_blank">
                <span>Lihat Maps</span>
                <i class="fas fa-map-marker-alt"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="800">
        <div class="enhanced-destination-card">
          <div class="destination-img-container">
            <img src="/assets/homepage/img/destinasi/9.png" class="destination-img" alt="Candi Prambanan">
            <div class="img-overlay"></div>
          </div>
          <div class="destination-content">
            <h4 class="destination-title">Candi Prambanan</h4>
            <p class="destination-text">Candi Prambanan adalah kompleks candi Hindu terbesar dan tercantik di Indonesia, serta situs warisan dunia UNESCO yang terkenal di Yogyakarta.</p>
            <a href="https://maps.app.goo.gl/BNNDnb4SqQDZ2NmSA" class="enhanced-destination-btn" target="_blank">
                <span>Lihat Maps</span>
                <i class="fas fa-map-marker-alt"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="900">
        <div class="enhanced-destination-card">
          <div class="destination-img-container">
            <img src="/assets/homepage/img/destinasi/8.png" class="destination-img" alt="Benteng Vredeburg">
            <div class="img-overlay"></div>
          </div>
          <div class="destination-content">
            <h4 class="destination-title">Benteng Vredeburg</h4>
            <p class="destination-text">Benteng Vredeburg adalah benteng bersejarah di pusat Kota Yogyakarta yang kini menjadi museum perjuangan nasional Indonesia.</p>
            <a href="https://maps.app.goo.gl/EPz2nv6MZuivYQ6G8" class="enhanced-destination-btn" target="_blank">
                <span>Lihat Maps</span>
                <i class="fas fa-map-marker-alt"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="1000">
        <div class="enhanced-destination-card">
          <div class="destination-img-container">
            <img src="/assets/homepage/img/destinasi/10.png" class="destination-img" alt="Malioboro">
            <div class="img-overlay"></div>
          </div>
          <div class="destination-content">
            <h4 class="destination-title">Malioboro</h4>
            <p class="destination-text">Jalan Malioboro adalah ikon wisata belanja dan kuliner Yogyakarta, penuh dengan pertokoan, pedagang kaki lima, dan suasana kota yang ramai.</p>
            <a href="https://maps.app.goo.gl/4mP3RCB5nQLi4NpE7" class="enhanced-destination-btn" target="_blank">
                <span>Lihat Maps</span>
                <i class="fas fa-map-marker-alt"></i>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- ENHANCED TOURISM DESTINATIONS STYLES -->
  <style>
    .enhanced-tourism-destinations {
        background: linear-gradient(135deg, #F8F9FA 0%, #FEFDED 100%);
        position: relative;
        overflow: hidden;
    }

    .enhanced-tourism-destinations::before {
        content: ";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,<svg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 100 100\'><defs><pattern id=\'dots\' width=\'10\' height=\'10\' patternUnits=\'userSpaceOnUse\'><circle cx=\'2\' cy=\'2\' r=\'1\' fill=\'rgba(116,233,213,0.1)\'/></pattern></defs><rect width=\'100\' height=\'100\' fill=\'url(%23dots)\'/></svg>");
        opacity: 0.5;
        pointer-events: none;
    }

    .tourism-icon .icon-container {
        background: linear-gradient(135deg, #FFBFA3, #99a3e3);
        box-shadow: 0 10px 30px rgba(255, 191, 163, 0.3);
    }

    .tourism-icon .icon-glow {
        background: radial-gradient(circle, rgba(255, 191, 163, 0.3) 0%, transparent 70%);
    }

    .enhanced-destination-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .enhanced-destination-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .destination-img-container {
        position: relative;
        height: 180px;
        overflow: hidden;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .destination-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .enhanced-destination-card:hover .destination-img {
        transform: scale(1.1);
    }

    .destination-content {
        padding: 25px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .destination-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 10px;
        text-align: center;
    }

    .destination-text {
        font-size: 0.95rem;
        color: #6c757d;
        line-height: 1.6;
        margin-bottom: 20px;
        flex-grow: 1;
        text-align: center;
    }

    .enhanced-destination-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        background: linear-gradient(135deg, #FFBFA3, #99a3e3);
        color: white;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(255, 191, 163, 0.3);
    }

    .enhanced-destination-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255, 191, 163, 0.4);
        color: white;
    }

    .enhanced-destination-btn i {
        transition: transform 0.3s ease;
    }

    .enhanced-destination-btn:hover i {
        transform: translateX(5px);
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .destination-title {
            font-size: 1.2rem;
        }
        .destination-text {
            font-size: 0.85rem;
        }
        .enhanced-destination-btn {
            padding: 8px 15px;
            font-size: 0.8rem;
        }
    }

    @media (max-width: 480px) {
        .destination-content {
            padding: 20px;
        }
        .destination-title {
            font-size: 1.1rem;
        }
        .destination-text {
            font-size: 0.8rem;
        }
    }
  </style>
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

/* Mobile responsive card body */
@media (max-width: 768px) {
  .card-body-custom {
    height: auto !important;
    padding: 15px !important;
  }
  
  .card-body-custom h4 {
    font-size: 18px !important;
  }
  
  .card-body-custom p {
    font-size: 14px !important;
  }
}

@media (max-width: 480px) {
  .card-body-custom h4 {
    font-size: 16px !important;
  }
  
  .card-body-custom p {
    font-size: 13px !important;
  }
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
<section id="existing-ratings" data-aos="fade-up" class="existing-ratings py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); position: relative; overflow: hidden;">
  <!-- Background decorative elements -->
  <div class="position-absolute" style="top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(153, 175, 227, 0.1); border-radius: 50%; z-index: 1;"></div>
  <div class="position-absolute" style="bottom: -30px; left: -30px; width: 150px; height: 150px; background: rgba(255, 191, 163, 0.1); border-radius: 50%; z-index: 1;"></div>
  
  <div class="container position-relative" style="z-index: 2;">
    <!-- Enhanced Section Header -->
    <div class="text-center mb-5" data-aos="fade-up">
      <div class="d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px; background: linear-gradient(135deg, #99a3e3, #74e9d5); border-radius: 50%; box-shadow: 0 10px 30px rgba(153, 163, 227, 0.3);">
        <i class="fas fa-quote-left text-white" style="font-size: 2rem;"></i>
      </div>
      <h3 class="fw-bold mb-3" style="font-size: 2.8rem; color: #2c3e50; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        Apa Kata Pengunjung?
      </h3>
      <p class="text-muted mb-0" style="font-size: 1.1rem; max-width: 600px; margin: 0 auto;">
        Dengarkan pengalaman nyata dari tamu-tamu yang telah merasakan layanan terbaik Rich Wellness
      </p>
      <div class="mt-3" style="width: 100px; height: 4px; background: linear-gradient(90deg, #99a3e3, #74e9d5); margin: 0 auto; border-radius: 2px;"></div>
    </div>

    <!-- Enhanced Reviews Grid -->
    <div class="row g-4">
      @foreach($ratings as $rating)
        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
          <div class="review-card position-relative h-100" style="background: white; border-radius: 20px; padding: 30px; box-shadow: 0 15px 35px rgba(0,0,0,0.08); border: 1px solid rgba(255,255,255,0.2); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); overflow: hidden;">
            
            <!-- Card decorative top border -->
            <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #99a3e3, #74e9d5, #FFBFA3);"></div>
            
            <!-- Quote icon background -->
            <div class="position-absolute" style="top: -10px; right: -10px; width: 60px; height: 60px; background: rgba(153, 163, 227, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
              <i class="fas fa-quote-right" style="color: rgba(153, 163, 227, 0.3); font-size: 1.5rem;"></i>
            </div>

            <!-- User Info Section -->
            <div class="d-flex align-items-center mb-4">
              <div class="position-relative">
                <div class="rounded-circle d-flex justify-content-center align-items-center shadow-lg" style="width: 60px; height: 60px; background: linear-gradient(135deg, #99a3e3, #74e9d5); border: 3px solid white;">
                  <span class="fw-bold text-white" style="font-size: 1.4rem; text-shadow: 0 1px 2px rgba(0,0,0,0.2);">
                    {{ strtoupper(substr($rating->user->name ?? 'U', 0, 1)) }}
                  </span>
                </div>
                <!-- Online indicator -->
                <div class="position-absolute bottom-0 end-0" style="width: 18px; height: 18px; background: #28a745; border: 3px solid white; border-radius: 50%;"></div>
              </div>
              <div class="ms-3 flex-grow-1">
                <div class="fw-bold text-dark mb-1" style="font-size: 1.1rem;">
                  {{ $rating->user->name ?? 'Pengguna' }}
                </div>
                <div class="d-flex align-items-center">
                  <small class="text-muted me-2">
                    <i class="fas fa-calendar-alt me-1"></i>
                    {{ $rating->created_at->format('d M Y') }}
                  </small>
                  <span class="badge" style="background: linear-gradient(135deg, #99a3e3, #74e9d5); font-size: 0.7rem; padding: 4px 8px;">
                    Verified
                  </span>
                </div>
              </div>
            </div>

            <!-- Enhanced Rating Stars -->
            <div class="mb-3 d-flex align-items-center justify-content-between">
              <div class="rating-stars" style="font-size: 1.3rem;">
                @for($i = 1; $i <= 5; $i++)
                  @if($i <= $rating->rating)
                    <i class="fas fa-star" style="color: #ffc107; text-shadow: 0 1px 3px rgba(255, 193, 7, 0.4); margin-right: 2px;"></i>
                  @else
                    <i class="far fa-star" style="color: #e9ecef; margin-right: 2px;"></i>
                  @endif
                @endfor
              </div>
              <div class="rating-badge" style="background: rgba(255, 193, 7, 0.1); color: #ffc107; padding: 4px 12px; border-radius: 20px; font-weight: 600; font-size: 0.9rem;">
                {{ $rating->rating }}.0
              </div>
            </div>

            <!-- Review Text -->
            <div class="review-text position-relative">
              <p class="mb-0 text-secondary" style="font-size: 1rem; line-height: 1.7; font-style: italic; position: relative; z-index: 2;">
                "{{ $rating->description }}"
              </p>
            </div>

            <!-- Card hover effect overlay -->
            <div class="position-absolute top-0 start-0 w-100 h-100 opacity-0 transition-opacity" style="background: linear-gradient(135deg, rgba(153, 163, 227, 0.05), rgba(116, 233, 213, 0.05)); border-radius: 20px; pointer-events: none;"></div>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Call to Action -->
    <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="600">
      <div class="d-inline-flex align-items-center justify-content-center p-4" style="background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
        <div class="me-4">
          <h5 class="mb-1 fw-bold" style="color: #2c3e50;">Bagikan Pengalaman Anda</h5>
          <p class="mb-0 text-muted" style="font-size: 0.9rem;">Ceritakan pengalaman wellness Anda bersama kami</p>
        </div>
        <a href="" class="btn btn-lg" style="background: linear-gradient(135deg, #99a3e3, #74e9d5); color: white; border: none; border-radius: 15px; padding: 12px 30px; font-weight: 600; text-decoration: none; box-shadow: 0 8px 20px rgba(153, 163, 227, 0.3); transition: all 0.3s ease;">
          <i class="fas fa-pen-alt me-2"></i>
          Tulis Review
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Enhanced CSS for Review Cards -->
<style>
.review-card:hover {
  transform: translateY(-10px) scale(1.02);
  box-shadow: 0 25px 50px rgba(0,0,0,0.15) !important;
}

.review-card:hover .position-absolute.opacity-0 {
  opacity: 1 !important;
}

.rating-stars i {
  transition: all 0.3s ease;
}

.review-card:hover .rating-stars i.fas {
  transform: scale(1.1);
}

.review-text::before {
  content: '';
  position: absolute;
  top: -10px;
  left: -10px;
  width: 30px;
  height: 30px;
  background: rgba(153, 163, 227, 0.1);
  border-radius: 50%;
  z-index: 1;
}

@media (max-width: 768px) {
  .review-card {
    padding: 20px !important;
  }
  
  .existing-ratings h3 {
    font-size: 2.2rem !important;
  }
  
  .review-card .rounded-circle {
    width: 50px !important;
    height: 50px !important;
  }
  
  .review-card .rounded-circle span {
    font-size: 1.2rem !important;
  }
}

.transition-opacity {
  transition: opacity 0.3s ease;
}
</style>

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

