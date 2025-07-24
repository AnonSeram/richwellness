<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>About Us - Rich Wellness</title>

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

  <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            padding-top: 100px; /* Add padding to prevent navbar from covering content */
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .enhanced-header.scrolled {
          background: #FEFDED;
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
          color: #ffffffff;
          font-weight: 700;
          margin-right: 20px;
        }

        .enhanced-register-btn:hover {
          color: white;
          transform: translateY(-2px);
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
        .section-title {
            text-align: center;
            margin-bottom: 60px;
            position: relative;
        }
        .section-title h2 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        .section-title h2::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #99a3e3, #74e9d5);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }
        .section-title p {
            font-size: 1.1rem;
            color: #6c757d;
            max-width: 800px;
            margin: 0 auto;
        }
        .about-content {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 80px;
        }
        .about-content .image-col {
            flex: 1;
            min-width: 300px;
            padding: 20px;
            text-align: center;
        }
        .about-content .image-col img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        .about-content .text-col {
            flex: 2;
            min-width: 300px;
            padding: 20px;
        }
        .about-content .text-col h3 {
            font-size: 2rem;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .about-content .text-col p {
            margin-bottom: 15px;
            color: #555;
        }
        .team-section {
            background-color: #FEFDED;
            padding: 80px 0;
        }
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            justify-content: center;
        }
        .team-member-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .team-member-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        }
        .team-member-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 4px solid #99a3e3;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .team-member-card h4 {
            font-size: 1.4rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .team-member-card p {
            font-size: 0.95rem;
            color: #74e9d5;
            font-weight: 500;
            margin-bottom: 15px;
        }
        .team-member-card .description {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 20px;
            flex-grow: 1;
        }
        .social-links a {
            color: #99a3e3;
            margin: 0 8px;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        .social-links a:hover {
            color: #74e9d5;
        }

        .features-section {
            margin: 80px 0;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        }
        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #99a3e3, #74e9d5);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        .feature-icon i {
            font-size: 2rem;
            color: white;
        }
        .feature-card h4 {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
        }
        .feature-card p {
            color: #6c757d;
            line-height: 1.6;
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
          
          body {
            padding-top: 80px;
          }
          
          .about-content {
            flex-direction: column;
          }
          .about-content .text-col, .about-content .image-col {
            padding: 10px;
          }
          .section-title h2 {
            font-size: 2rem;
          }
          .section-title p {
            font-size: 1rem;
          }
          .team-grid {
            grid-template-columns: 1fr;
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
          
          body {
            padding-top: 70px;
          }
        }
    </style>
</head>
<body>

  <!-- ======= Enhanced Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center" style="z-index: 1050;">
    <div class="container d-flex align-items-center justify-content-between" style="padding-right: 30px;">
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
          <li><a class="nav-link scrollto" href="#hero">{{ __("messages.home") }}</a></li>
          <li><a class="nav-link scrollto active" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="#paket-unggulan">{{ __("messages.featured_packages") }}</a></li>
          <li><a class="nav-link scrollto" href="#kamar">{{ __("messages.rooms") }}</a></li>
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
            <li class="enhanced-register-btn" style="font-weight: 600;"><a href="{{ route('register') }}">
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
    <div class="container">
        <section class="about-section">
            <div class="section-title">
                <h2>About Rich Wellness</h2>
                <p>Rich Wellness adalah destinasi terkemuka untuk kesehatan dan kesejahteraan holistik. Kami berkomitmen untuk menyediakan pengalaman yang transformatif bagi setiap individu yang mencari keseimbangan dan revitalisasi dalam hidup mereka.</p>
            </div>
            <div class="about-content">
                <div class="image-col">
                    <img src="assets/homepage/img/hero-img1.png" alt="About Us Image">
                </div>
                <div class="text-col">
                    <h3>Transform Your Health Journey</h3>
                    <p>Rich Wellness hadir sebagai solusi komprehensif untuk kesehatan dan kesejahteraan Anda. Dengan fasilitas kelas dunia dan program-program inovatif, kami menawarkan pengalaman yang tak terlupakan dalam perjalanan menuju hidup yang lebih sehat dan bahagia.</p>
                    
                    <h3>Our Mission</h3>
                    <p>Misi kami adalah memberdayakan individu untuk mencapai potensi kesehatan dan kesejahteraan tertinggi mereka melalui program-program inovatif, fasilitas kelas dunia, dan tim ahli yang berdedikasi. Kami percaya bahwa setiap perjalanan menuju kesehatan adalah unik, dan kami hadir untuk mendukung Anda di setiap langkah.</p>
                    
                    <h3>Our Vision</h3>
                    <p>Visi kami adalah menjadi pemimpin global dalam industri kesehatan dan kebugaran, dikenal karena pendekatan holistik kami yang mengintegrasikan kesehatan fisik, mental, dan spiritual. Kami bercita-cita untuk menciptakan komunitas yang terinspirasi untuk hidup lebih sehat dan bahagia.</p>
                </div>
            </div>

            <!-- Features Section -->
            <div class="features-section">
                <div class="section-title">
                    <h2>What We Offer</h2>
                    <p>Discover our comprehensive range of wellness services and facilities designed to enhance your health journey.</p>
                </div>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-spa"></i>
                        </div>
                        <h4>Serenity Retreat</h4>
                        <p>Rasakan kedamaian sejati dengan sesi yoga dan terapi spa menenangkan yang dirancang untuk meremajakan tubuh dan pikiran Anda.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4>Renewal Journey</h4>
                        <p>Perjalanan peremajaan tubuh lewat yoga, terapi pijat, dan makanan sehat yang akan membuat Anda merasa seperti terlahir kembali.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <h4>Harmony Experience</h4>
                        <p>Temukan keseimbangan hidup lewat aktivitas kesehatan dan spa relaksasi yang menyelaraskan tubuh, pikiran, dan jiwa.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <h4>Ultimate Wellness</h4>
                        <p>Kesejahteraan maksimal lewat program lengkap 10 hari di Rich Wellness dengan layanan premium dan fasilitas eksklusif.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="team-section">
            <div class="section-title">
                <h2>Our Expert Team</h2>
                <p>Meet the talented professionals who contributed to building this innovative healthcare platform.</p>
            </div>
            <div class="team-grid">
                <!-- Sarah Jasmine - Project Manager -->
                <div class="team-member-card">
                    <img src="sarah_jasmine.png" alt="Sarah Jasmine">
                    <h4>Sarah Jasmine</h4>
                    <p>Project Manager</p>
                    <div class="description">
                        Leads project planning and execution, coordinates team activities, manages timelines and resources, and ensures successful delivery of the healthcare platform within scope and budget.
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Zahra Aulia - System Analyst -->
                <div class="team-member-card">
                    <img src="zahra_aulia.png" alt="Zahra Aulia">
                    <h4>Zahra Aulia</h4>
                    <p>System Analyst</p>
                    <div class="description">
                        Analyzes business requirements, designs system architecture, creates technical specifications, and bridges the gap between business needs and technical implementation.
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Launia Izzati - System Analyst -->
                <div class="team-member-card">
                    <img src="launia_izzati.png" alt="Launia Izzati">
                    <h4>Launia Izzati</h4>
                    <p>System Analyst</p>
                    <div class="description">
                        Conducts thorough testing of applications, identifies bugs and issues, ensures software quality standards, and validates that all features work correctly before deployment.
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Muhammad Rafa - Front-end Developer -->
                <div class="team-member-card">
                    <img src="muhammad_rafa.png" alt="Muhammad Rafa">
                    <h4>Muhammad Rafa</h4>
                    <p>Front-end Developer</p>
                    <div class="description">
                        Develops user-facing features, creates responsive and interactive interfaces, implements design mockups, and ensures optimal user experience across different devices and browsers.
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Syaiful Kusing - Back-end Developer -->
                <div class="team-member-card">
                    <img src="syaiful_kusing.png" alt="Syaiful Kusing">
                    <h4>Syaiful Kusing</h4>
                    <p>Back-end Developer</p>
                    <div class="description">
                        Builds server-side logic, manages databases, develops APIs, handles data processing, and ensures secure and efficient backend operations for the healthcare platform.
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Muhammad Syamsudhuha A - Fullstack Developer -->
                <div class="team-member-card">
                    <img src="muhammad_syamsudhuha_a.png" alt="Muhammad Syamsudhuha A">
                    <h4>Muhammad Syamsudhuha A</h4>
                    <p>Fullstack Developer</p>
                    <div class="description">
                        Works on both frontend and backend development, integrates different system components, ensures seamless communication between client and server, and provides versatile technical solutions.
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>

                <!-- Annisa Ashadia - Quality Assurance -->
                <div class="team-member-card">
                    <img src="annisa_ashadia.png" alt="Annisa Ashadia">
                    <h4>Annisa Ashadia</h4>
                    <p>Quality Assurance</p>
                    <div class="description">
                        Conducts thorough testing of applications, identifies bugs and issues, ensures software quality standards, and validates that all features work correctly before deployment.
                    </div>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>



  <!-- ======= Footer ======= -->
  <footer id="footer" style="background-color: #5E96AE; color: white; padding: 40px 0; margin-top: 50px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 footer-contact">
          <h3>Rich Wellness</h3>
          <p>
            Transform Your Health Journey <br>
            Jl. Wellness No. 123<br>
            Jakarta, Indonesia <br><br>
            <strong>Phone:</strong> +62 21 1234 5678<br>
            <strong>Email:</strong> info@richwellness.com<br>
          </p>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#contact">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Serenity Retreat</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Renewal Journey</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Harmony Experience</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="#">Ultimate Wellness</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-newsletter">
          <h4>Join Our Newsletter</h4>
          <p>Stay updated with our latest wellness programs and health tips</p>
          <form action="" method="post">
            <input type="email" name="email" placeholder="Your email">
            <input type="submit" value="Subscribe">
          </form>
        </div>

      </div>
    </div>
  </footer><!-- End Footer -->

  <div class="container d-md-flex py-4" style="background-color: #4a7c95; color: white;">
    <div class="me-md-auto text-center text-md-start">
      <div class="copyright">
        &copy; Copyright <strong><span>Rich Wellness</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="#" style="color: #74e9d5;">Rich Wellness Team</a>
      </div>
    </div>
    <div class="social-links text-center text-md-right pt-3 pt-md-0">
      <a href="#" class="twitter" style="color: white; margin: 0 10px;"><i class="bx bxl-twitter"></i></a>
      <a href="#" class="facebook" style="color: white; margin: 0 10px;"><i class="bx bxl-facebook"></i></a>
      <a href="#" class="instagram" style="color: white; margin: 0 10px;"><i class="bx bxl-instagram"></i></a>
      <a href="#" class="linkedin" style="color: white; margin: 0 10px;"><i class="bx bxl-linkedin"></i></a>
    </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/homepage/vendor/aos/aos.js"></script>
  <script src="assets/homepage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/homepage/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/homepage/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/homepage/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/homepage/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/homepage/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/homepage/js/main.js"></script>

</body>
</html>

