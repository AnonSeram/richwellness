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
            z-index: 9999; /* Increased z-index */
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
            z-index: 10000; /* Increased z-index */
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

<!-- Enhanced Header Styles -->
<style>

.enhanced-header.scrolled {
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.98) 0%, rgba(248, 249, 250, 0.98) 100%);
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.12);
}

.header-decoration {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 1;
}

.decoration-circle {
  position: absolute;
  border-radius: 50%;
  opacity: 0.1;
}

.circle-1 {
  width: 100px;
  height: 100px;
  background: linear-gradient(135deg, #99a3e3, #74e9d5);
  top: -50px;
  right: 10%;
  animation: float 6s ease-in-out infinite;
}

.circle-2 {
  width: 60px;
  height: 60px;
  background: linear-gradient(135deg, #FFBFA3, #99a3e3);
  bottom: -30px;
  left: 15%;
  animation: float 8s ease-in-out infinite reverse;
}

@keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-10px); }
}

.enhanced-logo {
  position: relative;
  z-index: 2;
}

.logo-container {
  position: relative;
  margin-right: 15px;
}

.logo-img {
  width: auto;
  height: 45px;
  transition: all 0.3s ease;
  position: relative;
  z-index: 2;
}

.logo-glow {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 60px;
  height: 60px;
  background: radial-gradient(circle, rgba(153, 163, 227, 0.2) 0%, transparent 70%);
  border-radius: 50%;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.enhanced-logo:hover .logo-glow {
  opacity: 1;
}

.enhanced-logo:hover .logo-img {
  transform: scale(1.05);
}

.brand-text h1 {
  margin: 0;
  font-size: 1.8rem;
  font-weight: 700;
  background: linear-gradient(135deg, #99a3e3, #74e9d5);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  transition: all 0.3s ease;
}

.brand-text h1 a {
  text-decoration: none;
  color: inherit;
}

.tagline {
  display: block;
  font-size: 0.75rem;
  color: #6c757d;
  font-weight: 500;
  margin-top: -2px;
  opacity: 0.8;
}

.enhanced-navbar {
  position: relative;
  z-index: 2;
}

.enhanced-navbar .nav-link {
  color: #2c3e50;
  font-weight: 500;
  font-size: 0.95rem;
  padding: 8px 16px;
  margin: 0 2px;
  border-radius: 25px;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.enhanced-navbar .nav-link::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, rgba(153, 163, 227, 0.1), rgba(116, 233, 213, 0.1));
  transition: left 0.3s ease;
  z-index: -1;
}

.enhanced-navbar .nav-link:hover::before,
.enhanced-navbar .nav-link.active::before {
  left: 0;
}

.enhanced-navbar .nav-link:hover,
.enhanced-navbar .nav-link.active {
  color: #99a3e3;
  transform: translateY(-1px);
}

.enhanced-dropdown {
  position: relative;
}

.language-switcher {
  background: rgba(153, 163, 227, 0.1);
  border-radius: 20px;
  padding: 8px 12px;
  display: flex;
  align-items: center;
  gap: 8px;
}

.language-icon {
  width: 20px;
  height: 20px;
  background: linear-gradient(135deg, #99a3e3, #74e9d5);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 0.8rem;
}

.language-text {
  font-weight: 600;
  font-size: 0.9rem;
}

.dropdown-arrow {
  font-size: 0.7rem;
  transition: transform 0.3s ease;
}

.enhanced-dropdown:hover .dropdown-arrow {
  transform: rotate(180deg);
}

.enhanced-dropdown-menu {
  background: white;
  border: none;
  border-radius: 15px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
  padding: 10px 0;
  margin-top: 10px;
  min-width: 200px;
  opacity: 0;
  visibility: hidden;
  transform: translateY(-10px);
  transition: all 0.3s ease;
}

.enhanced-dropdown:hover .enhanced-dropdown-menu {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

.dropdown-item {
  padding: 10px 20px;
  display: flex;
  align-items: center;
  gap: 10px;
  color: #2c3e50;
  text-decoration: none;
  transition: all 0.3s ease;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
}

.dropdown-item:hover {
  background: linear-gradient(135deg, rgba(153, 163, 227, 0.1), rgba(116, 233, 213, 0.1));
  color: #99a3e3;
  transform: translateX(5px);
}

.flag-icon {
  width: 20px;
  height: auto;
  border-radius: 3px;
}

.enhanced-btn {
  background: linear-gradient(135deg, #99a3e3, #74e9d5);
  color: white;
  padding: 10px 20px;
  border-radius: 25px;
  text-decoration: none;
  font-weight: 600;
  font-size: 0.9rem;
  display: flex;
  align-items: center;
  gap: 8px;
  transition: all 0.3s ease;
  border: none;
  cursor: pointer;
  box-shadow: 0 4px 15px rgba(153, 163, 227, 0.3);
}

.enhanced-btn:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(153, 163, 227, 0.4);
  color: white;
}

.user-btn {
  background: rgba(153, 163, 227, 0.1);
  color: #2c3e50;
  border: 2px solid rgba(153, 163, 227, 0.2);
}

.user-avatar {
  width: 30px;
  height: 30px;
  background: linear-gradient(135deg, #99a3e3, #74e9d5);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-weight: 600;
  font-size: 0.8rem;
}

.user-name {
  max-width: 100px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.enhanced-register-btn {
  background: transparent;
  color: #99a3e3;
  border: 2px solid #99a3e3;
  padding: 8px 16px;
  border-radius: 25px;
  text-decoration: none;
  font-weight: 600;
  font-size: 0.9rem;
  display: flex;
  align-items: center;
  gap: 8px;
  transition: all 0.3s ease;
  margin-left: 10px;
}

.enhanced-register-btn:hover {
  background: #99a3e3;
  color: white;
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(153, 163, 227, 0.3);
}

.dropdown-divider {
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(153, 163, 227, 0.2), transparent);
  margin: 8px 0;
}

.logout-btn {
  color: #dc3545;
}

.logout-btn:hover {
  background: rgba(220, 53, 69, 0.1);
  color: #dc3545;
}

.enhanced-mobile-toggle {
  font-size: 1.5rem;
  color: #99a3e3;
  cursor: pointer;
  transition: all 0.3s ease;
}

.enhanced-mobile-toggle:hover {
  color: #74e9d5;
  transform: scale(1.1);
}

/* Mobile Responsive */
@media (max-width: 768px) {
  .brand-text h1 {
    font-size: 1.4rem;
  }
  
  .tagline {
    font-size: 0.7rem;
  }
  
  .logo-img {
    height: 35px;
  }
  
  .enhanced-navbar ul {
    flex-direction: column;
    gap: 10px;
  }
  
  .enhanced-btn {
    padding: 8px 16px;
    font-size: 0.8rem;
  }
  
  .user-name {
    display: none;
  }
}

@media (max-width: 480px) {
  .enhanced-header {
    padding: 10px 0;
  }
  
  .brand-text h1 {
    font-size: 1.2rem;
  }
  
  .tagline {
    display: none;
  }
  
  .logo-img {
    height: 30px;
  }
}
</style>


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
