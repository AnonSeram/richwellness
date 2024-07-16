<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Rich Wellness</title>

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/homepage/img/favicon.png" rel="icon">
    <link href="assets/homepage/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/homepage/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/homepage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/homepage/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/homepage/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/homepage/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/homepage/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/homepage/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />


    <!-- Template Main CSS File -->
    <link href="assets/homepage/css/style.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Change header background color */
        #header {
            background-color: #FEFDED;
            /* Change to your desired blue color */
        }

        /* Ganti warna background footer */
        #footer {
            background-color: #5E96AE;
            /* Ubah sesuai dengan warna header */
        }

        /* Customize Swiper container size */
        .swiper-container {
            width: 100%;
            height: 650px;
            /* Set height to 590px */
        }

        /* Customize Swiper slide image size */
        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            /* Change object-fit to contain */
        }

        /* Style untuk memastikan peta berada di tengah secara horizontal */
        .map-container {
            display: flex;
            justify-content: center;
        }

        /* Style untuk memastikan peta berada di tengah secara vertikal */
        .map-container iframe {
            margin-top: auto;
            margin-bottom: auto;
        }

        .my-3 {
            margin-top: 10px;
            /* Tambahkan margin di atas */
            margin-bottom: 10px;
            /* Tambahkan margin di bawah */
        }

        .justify-content-between>.col-lg-2 {
            margin-bottom: 20px;
            border: 1px solid transparent;
            /* Tambahkan border */
            transition: border-color 0.01s;
            /* Efek transisi untuk perubahan warna border */
        }

        .justify-content-between>.col-lg-2:hover {
            border-color: blue;
            /* Ubah warna border menjadi biru saat kursor berada di atasnya */
        }

        /* Ganti warna background container penilaian */
        #penilaian {
            background-color: #FFBFA3;
        }

        /* Ganti warna background container Paket Unggulan */
        #paket-unggulan {
            background-color: #FFBFA3;
        }

        #rekomendasi-kesehatan {
            background-color: #FFBFA3;
        }


        .logo {
            display: flex;
            align-items: center;
            padding-right: 30px;
            /* Add this line */
        }

        /* Atur lebar logo */
        .logo img {
            width: 90px;
            /* Sesuaikan lebar logo */
            margin-left: 30px;
            /* Tambahkan jarak di sebelah kanan logo */
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 15px;
            /* mengurangi padding untuk mengecilkan tombol */
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
            display: block;
            margin: auto;
            text-align: center;
            font-size: 14px;
            /* mengurangi ukuran font */
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo d-flex align-items-center">
                <img src="assets/homepage/img/logo.png" alt="Rich Wellness Logo">
                <h1><a href="/">Rich Wellness</a></h1>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="#paket-unggulan">Paket Unggulan</a></li>
                    <li><a class="nav-link scrollto" href="#kamar">Kamar</a></li>
                    <li><a class="nav-link scrollto " href="#fasilitas">Fasilitas</a></li>
                    <li><a class="nav-link scrollto " href="#rekomendasi-kesehatan">Kesehatan</a></li>
                    <li><a class="nav-link scrollto " href="#rekomendasi-destinasi">Wisata</a></li>
                    <li><a class="nav-link scrollto" href="#penilaian">Penilaian</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                    <li><a class="getstarted scrollto" href="/login">Log In</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <!-- End Header -->
    <!-- Swiper -->
    <div class="container-fluid px-lg-4 pt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="/nyoba/images/carousel/1.png" class="image-swipper d-block" alt="swipper-image-1">
                </div>
                <div class="swiper-slide">
                    <img src="/nyoba/images/carousel/2.png" class="image-swipper d-block" alt="swipper-image-2">
                </div>
                <div class="swiper-slide">
                    <img src="/nyoba/images/carousel/3.png" class="image-swipper d-block" alt="swipper-image-3">
                </div>
                <div class="swiper-slide">
                    <img src="/nyoba/images/carousel/4.png" class="image-swipper d-block" alt="swipper-image-4">
                </div>
                <div class="swiper-slide">
                    <img src="/nyoba/images/carousel/5.png" class="image-swipper d-block" alt="swipper-image-5">
                </div>
                <div class="swiper-slide">
                    <img src="/nyoba/images/carousel/6.png" class="image-swipper d-block" alt="swipper-image-6">
                </div>

            </div>
            <!-- Add pagination -->
            <div class="swiper-pagination"></div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>

    </div>
    </div>
    <!-- End Swiper -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Rich Wellness</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">
                        Selamat datang di Rich Wellness, tujuan utama untuk kesehatan dan kebugaran di Hotel The Rich
                        Jogja, yang berlokasi di pusat kota Jogja. Melalui website kami, kami mengundang Anda untuk
                        menjelajahi fasilitas modern kami dan program kesehatan yang disesuaikan, yang dirancang untuk
                        meningkatkan kualitas hidup dan memberikan kesempatan untuk meremajakan tubuh, pikiran, dan
                        jiwa. Dengan informasi yang lengkap dan mudah diakses, kami berharap dapat menjadi mitra Anda
                        dalam perjalanan menuju kesejahteraan yang holistik.
                    </h2>
                    <div data-aos="fade-up" data-aos-delay="800">
                        <a href="/pesanReservasi" class="btn-get-started scrollto">Pesan <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                    <img src="assets/homepage/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Tentang Kami</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
                        <p>
                            Wellness tourism adalah bentuk perjalanan yang bertujuan untuk meningkatkan kesejahteraan
                            fisik, mental, dan emosional seseorang selama masa liburan atau perjalanan. Di Rich
                            Wellness, kami memahami bahwa kesehatan dan kesejahteraan adalah aspek penting dari gaya
                            hidup yang seimbang. Oleh karena itu, kami menawarkan pengalaman wellness tourism yang
                            holistik, menggabungkan kegiatan-kegiatan seperti yoga, meditasi, terapi spa, dan aktivitas
                            rekreasi yang mendukung kesehatan. Dengan lokasi kami yang strategis di Yogyakarta, tamu
                            kami dapat menikmati keindahan alam sambil merawat tubuh dan pikiran mereka. Kami percaya
                            bahwa liburan bukan hanya tentang bersantai, tetapi juga tentang meningkatkan kualitas hidup
                            secara keseluruhan, dan itulah yang menjadi fokus utama dari pengalaman wellness tourism di
                            Rich Wellness.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Us Section -->

        <!-- Paket Unggulan Section -->
        <section id="paket-unggulan" class="paket-unggulan aos" data-aos="fade-up">
            <div class="container">
                <div class="section-title">
                    <h2>Paket Unggulan</h2>
                </div>
                <div class="row justify-content-center">
                    <!-- Card pertama -->
                    <div class="col-lg-3 col-md-6 my-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <div class="card-body">
                                <div class="icon-box">
                                    <i class="bi bi-star-fill" style="font-size: 3rem;"></i>
                                </div>
                                <h4 class="card-title" style="color: #7AA2E3; font-weight: bold;">Serenity Retreat</h4>
                                <p class="card-text">Rasakan kedamaian sejati dalam liburan singkat ini. Sertakan akses
                                    ke pusat kebugaran, sesi yoga pagi yang menyenangkan untuk menyegarkan tubuh dan
                                    pikiran, dan meremajakan diri dengan terapi spa yang menenangkan untuk menenangkan
                                    jiwa dan memulihkan energi Anda dalam waktu singkat.</p>
                                <a href="/pesanReservasi" class="btn-primary">Booking Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card kedua -->
                    <div class="col-lg-3 col-md-6 my-3" data-aos="fade-up" data-aos-delay="500">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <div class="card-body">
                                <div class="icon-box">
                                    <i class="bi bi-heart-fill" style="font-size: 3rem;"></i>
                                </div>
                                <h4 class="card-title" style="color: #7AA2E3; font-weight: bold;">Renewal Journey</h4>
                                <p class="card-text">Mulailah perjalanan peremajaan Anda dengan paket Renewal Journey
                                    yang menawarkan pengalaman menyegarkan. Dapatkan akses ke pusat kebugaran, ikuti
                                    sesi yoga restoratif, nikmati terapi pijat menyegarkan, dan rasakan hidangan sehat
                                    lima hari untuk meremajakan diri Anda.</p>
                                <a href="/pesanReservasi" class="btn-primary">Booking Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card ketiga -->
                    <div class="col-lg-3 col-md-6 my-3" data-aos="fade-up" data-aos-delay="700">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <div class="card-body">
                                <div class="icon-box">
                                    <i class="bi bi-lightbulb-fill" style="font-size: 3rem;"></i>
                                </div>
                                <h4 class="card-title" style="color: #7AA2E3; font-weight: bold;">Harmony Experience
                                </h4>
                                <p class="card-text">Temukan harmoni sejati dalam hidup Anda dengan paket Harmony
                                    Experience yang menakjubkan. Dapatkan akses penuh ke fasilitas pusat kebugaran, sesi
                                    yoga pagi, terapi spa yang menenangkan, dan aktivitas rekreasi yang mendukung
                                    kesehatan Anda selama seminggu di Rich Wellness.</p>
                                <a href="/pesanReservasi" class="btn-primary">Booking Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card keempat -->
                    <div class="col-lg-3 col-md-6 my-3" data-aos="fade-up" data-aos-delay="900">
                        <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                            <div class="card-body">
                                <div class="icon-box">
                                    <i class="bi bi-sun-fill" style="font-size: 3rem;"></i>
                                </div>
                                <h4 class="card-title" style="color: #7AA2E3; font-weight: bold;">Ultimate Wellness</h4>
                                <p class="card-text">Rasakan kesejahteraan maksimal dengan paket Ultimate Wellness
                                    Retreat yang luar biasa. Termasuk akses eksklusif ke pusat kebugaran, berbagai sesi
                                    yoga dan meditasi, terapi spa yang menenangkan, serta paket makanan sehat yang
                                    menakjubkan untuk sepuluh hari yang akan mengubah hidup Anda.</p>
                                <a href="/pesanReservasi" class="btn-primary">Booking Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Paket Unggulan Section -->


        <!-- ======= Services Section ======= -->
        <section id="kamar" class="services">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Fasilitas Kamar</h2>
                    <p><strong>Terdiri dari beberapa jenis fasilitas kamar berdasarkan jumlah tempat tidur :</strong>
                    </p>
                </div>
                <section id="counts" class="counts">
                    <div class="container">
                        <div class="row">
                            <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-xl-start"
                                data-aos="fade-right" data-aos-delay="150">
                                <img src="assets/homepage/img/counts-img.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left"
                                data-aos-delay="300">
                                <div class="content d-flex flex-column justify-content-center">
                                    <div class="row">
                                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                                            <div class="count-box">
                                                <i class="bi bi-person-fill"></i>
                                                <span data-purecounter-start="0" data-purecounter-end="20"
                                                    data-purecounter-duration="1" class="purecounter"></span>
                                                <p>
                                                    <strong>Single Room </strong>
                                                    terdiri dari satu ruangan yang berisi satu tempat tidur, sofa, dan
                                                    kamar mandi.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                                            <div class="count-box">
                                                <i class="bi bi-people-fill"></i>
                                                <span data-purecounter-start="0" data-purecounter-end="15"
                                                    data-purecounter-duration="1" class="purecounter"></span>
                                                <p>
                                                    <strong>Twin Room </strong>
                                                    terdiri dari dua tempat tidur yang disatukan dan diletakkan
                                                    berdampingan.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                                            <div class="count-box">
                                                <i class="bi bi-person-plus-fill"></i>
                                                <span data-purecounter-start="0" data-purecounter-end="10"
                                                    data-purecounter-duration="1" class="purecounter"></span>
                                                <p>
                                                    <strong>Double Room </strong>
                                                    terdiri dari tempat tidur berukuran besar yang muat untuk dua orang.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 d-md-flex align-items-md-stretch">
                                            <div class="count-box">
                                                <i class="bi bi-person-lines-fill"></i>
                                                <span data-purecounter-start="0" data-purecounter-end="5"
                                                    data-purecounter-duration="1" class="purecounter"></span>
                                                <p>
                                                    <strong>Family Room </strong>
                                                    terdiri dari satu tempat tidur besar dan kecil, dan ruangan lebih
                                                    besar.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="section-title" data-aos="fade-up">
                    <p><strong>Terdiri dari beberapa jenis fasilitas kamar yang diberikan :</strong></p>
                </div>
                <div class="row justify-content-center">
                    @foreach($fasilitasKamar as $row)
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                <h4 class="title"><a href=""> {{ $row->tipe_kamar }} </a></h4>
                                <p class="description"> {{ $row->fasilitas }} </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Services Section -->

        <!-- ======= Features Section ======= -->
        <section id="fasilitas" class="features">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Fasilitas Hotel</h2>
                    <p><strong>Terdiri dari beberapa jenis fasilitas yang tersedia :</strong></p>
                </div>
            </div>
        </section>

        <!-- ======= More Services Section ======= -->
        <section id="more-services" class="more-services">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-2 col-md-3 text-center bg-white rounded shadow py-4 my-3" data-aos="fade-up"
                        data-aos-delay="100">
                        <img src="nyoba/images/fasilitas/1.jpg" width="180px">
                        <h5 class="mt-3">Swimming Pool</h5>
                    </div>
                    <div class="col-lg-2 col-md-3 text-center bg-white rounded shadow py-4 my-3" data-aos="fade-up"
                        data-aos-delay="100">
                        <img src="nyoba/images/fasilitas/6.jpg" width="180px">
                        <h5 class="mt-3">SPA</h5>
                    </div>
                    <div class="col-lg-2 col-md-3 text-center bg-white rounded shadow py-4 my-3" data-aos="fade-up"
                        data-aos-delay="100">
                        <img src="nyoba/images/fasilitas/7.jpg" width="180px">
                        <h5 class="mt-3">Fitness Center</h5>
                    </div>
                    <div class="col-lg-2 col-md-3 text-center bg-white rounded shadow py-4 my-3" data-aos="fade-up"
                        data-aos-delay="100">
                        <img src="nyoba/images/fasilitas/8.jpg" width="180px">
                        <h5 class="mt-3">Sauna</h5>
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-2 col-md-3 text-center bg-white rounded shadow py-4 my-3" data-aos="fade-up"
                        data-aos-delay="100">
                        <img src="nyoba/images/fasilitas/3.jpg" width="180px">
                        <h5 class="mt-3">Breakfast</h5>
                    </div>
                    <div class="col-lg-2 col-md-3 text-center bg-white rounded shadow py-4 my-3" data-aos="fade-up"
                        data-aos-delay="200">
                        <img src="nyoba/images/fasilitas/4.jpg" width="180px">
                        <h5 class="mt-3">Parking Lot</h5>
                    </div>
                    <div class="col-lg-2 col-md-3 text-center bg-white rounded shadow py-4 my-3" data-aos="fade-up"
                        data-aos-delay="300">
                        <img src="nyoba/images/fasilitas/5.jpg" width="180px">
                        <h5 class="mt-3">Lunch</h5>
                    </div>
                    <div class="col-lg-2 col-md-3 text-center bg-white rounded shadow py-4 my-3" data-aos="fade-up"
                        data-aos-delay="300">
                        <img src="nyoba/images/fasilitas/2.jpg" width="180px">
                        <h5 class="mt-3">Wifi</h5>
                    </div>
                </div>
            </div>
        </section>
        <!-- End More Services Section -->

        <!-- Rekomendasi Layanan kesehatan Section -->
        <section id="rekomendasi-kesehatan" class="rekomendasi-kesehatan" data-aos="fade-up">
            <div class="container">
                <div class="section-title">
                    <h2>Rekomendasi Layanan kesehatan spesialis organ tubuh</h2>
                </div>
                <div class="swiper-container rekomendasi-swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        <!-- Card pertama -->
                        <div class="swiper-slide">
                            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                                <div class="card-body">
                                <img src="/assets/homepage/img/kesehatan/4.png" class="card-img-top" alt="...">
                                    <div class="icon-box">
                                    </div>
                                    <h4 class="card-title" style="color: #7AA2E3; font-weight: bold; text-align: center">Poliklinik Mata RSUP Dr. Sardjito</h4>
                                    <p class="card-text" style="text-align: center;">Jika Anda atau orang terdekat Anda membutuhkan perawatan mata yang berkualitas, saya sangat merekomendasikan RSUP Dr. Sardjito. RSUP Dr. Sardjito terkenal dengan spesialis mata yang berpengalaman dan fasilitas medis yang canggih. Dengan pelayanan yang ramah, ahli, dan profesional, Anda dapat yakin bahwa kesehatan mata Anda berada di tangan yang tepat.</p>
                                    <a href="https://sardjito.co.id/" class="btn btn-primary">Kunjungi Situs</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card kedua -->
                        <div class="swiper-slide">
                            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                                <div class="card-body">
                                <img src="/assets/homepage/img/kesehatan/2.png" class="card-img-top" alt="...">
                                    <div class="icon-box">
                                    </div>
                                    <h4 class="card-title" style="color: #7AA2E3; font-weight: bold; text-align: center">Klinik Kulit RS. Panti Rapih</h4>
                                    <p class="card-text" style="text-align: center;">Klinik Kulit RS Panti Rapih di Yogyakarta menyediakan perawatan kulit komprehensif. Didukung oleh tim medis berpengalaman dan fasilitas lengkap, klinik ini menawarkan diagnosis, pengobatan, perawatan kecantikan, dan konsultasi dermatologi. Fokus utama klinik ini adalah memberikan pelayanan holistik berbasis bukti untuk memastikan kepuasan pasien.</p>
                                    <a href="https://pantirapih.or.id/rspr/" class="btn btn-primary">Kunjungi Situs</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card ketiga -->
                        <div class="swiper-slide">
                            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                                <div class="card-body">
                                <img src="/assets/homepage/img/kesehatan/3.png" class="card-img-top" alt="...">
                                    <div class="icon-box">
                                    </div>
                                    <h4 class="card-title" style="color: #7AA2E3; font-weight: bold; text-align: center">Klinik Ginjal RS. PKU Jogja</h4>
                                    <p class="card-text" style="text-align: center;">Jika Anda mencari perawatan terbaik untuk masalah ginjal, RS PKU Jogja adalah pilihan yang tepat! Dengan tim dokter spesialis ginjal yang berpengalaman dan fasilitas medis terkini, RS PKU Jogja siap memberikan perawatan yang komprehensif dan berkualitas tinggi. Dapatkan layanan profesional dan solusi terbaik untuk ginjal Anda. Percayakan kesehatan ginjal Anda pada ahli terpercaya!</p>
                                    <a href="https://rspkujogja.com/" class="btn btn-primary">Kunjungi Situs</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card keempat -->
                        <div class="swiper-slide">
                            <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                                <div class="card-body">
                                <img src="/assets/homepage/img/kesehatan/1.png" class="card-img-top" alt="...">
                                    <div class="icon-box">
                                    </div>
                                    <h4 class="card-title" style="color: #7AA2E3; font-weight: bold; text-align: center">Klinik Jantung
                                    RSUP Dr. Sardjito</h4>
                                    <p class="card-text" style="text-align: center;">Jika Anda mencari layanan kesehatan spesialis jantung yang terpercaya, kami sangat merekomendasikan RSUP Dr. Sardjito. Dengan tim dokter ahli jantung yang berpengalaman dan fasilitas medis yang lengkap, RSUP Dr. Sardjito siap memberikan perawatan terbaik untuk kesehatan jantung Anda. Jangan ragu untuk berkonsultasi dan mendapatkan penanganan profesional di sini.</p>
                                    <a href="https://sardjito.co.id/" class="btn btn-primary">Kunjungi Situs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- End Rekomendasi Layanan kesehatan -->

        <!-- Rekomendasi Destinasi Section -->
        <section id="rekomendasi-destinasi" class="rekomendasi-destinasi" data-aos="fade-up">
            <div class="container">
                <div class="section-title">
                    <h2>Rekomendasi Destinasi Wisata Yogyakarta</h2>
                </div>
                <div class="swiper-container rekomendasi-swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        <!-- Card pertama -->
                        <div class="swiper-slide">
                            <div class="card border-0 shadow"
                                style="max-width: 350px; margin: auto; text-align: center;">
                                <div class="card-body">
                                    <img src="/assets/homepage/img/destinasi/4.png" class="card-img-top" alt="...">
                                    <div class="icon-box">
                                    </div>
                                    <h4 class="card-title"
                                        style="color: #7AA2E3; font-weight: bold; display: inline-block;">Heha Sky View
                                    </h4>
                                    <p class="card-text">HeHa Sky View adalah tempat wisata di Gunungkidul, Yogyakarta,
                                        yang menawarkan pemandangan indah dari ketinggian. Tempat ini memiliki berbagai
                                        fasilitas seperti restoran dan spot foto Instagramable, ideal untuk menikmati
                                        matahari terbenam dan panorama kota Yogyakarta.</p>
                                    <a href="https://www.google.com/maps/search/heha+sky+view/@-7.9774678,110.3051026,11z/data=!3m1!4b1?entry=ttu" class="btn btn-primary">Lihat Maps</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card kedua -->
                        <div class="swiper-slide">
                            <div class="card border-0 shadow"
                                style="max-width: 350px; margin: auto; text-align: center;">
                                <div class="card-body">
                                    <div class="icon-box">
                                        <img src="/assets/homepage/img/destinasi/3.png" class="card-img-top" alt="...">
                                    </div>
                                    <h4 class="card-title"
                                        style="color: #7AA2E3; font-weight: bold; display: inline-block;">Waduk Sermo
                                    </h4>
                                    <p class="card-text">Waduk Sermo merupakan waduk yang terletak di Kulon Progo,
                                        Yogyakarta, berperan sebagai sumber air bagi daerah sekitarnya. Selain itu,
                                        waduk ini juga menjadi tempat rekreasi di mana pengunjung dapat menikmati
                                        pemandangan dan aktivitas seperti perahu dan memancing.
                                    </p>
                                    <a href="https://maps.app.goo.gl/ASE7cBjm6QmCmuTU7" class="btn btn-primary">Lihat Maps</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card ketiga -->
                        <div class="swiper-slide">
                            <div class="card border-0 shadow"
                                style="max-width: 350px; margin: auto; text-align: center;">
                                <div class="card-body">
                                    <div class="icon-box">
                                        <img src="/assets/homepage/img/destinasi/2.png" class="card-img-top" alt="...">
                                    </div>
                                    <h4 class="card-title"
                                        style="color: #7AA2E3; font-weight: bold; display: inline-block;">Pantai
                                        Parangritis</h4>
                                    <p class="card-text">Pantai Parangtritis terletak di Bantul, Yogyakarta, terkenal
                                        dengan ombaknya yang besar dan panorama alam yang memukau. Pantai ini menjadi
                                        tujuan favorit wisatawan untuk menikmati laut, bermain ombak, dan menyaksikan
                                        indahnya senja di tepi pantai yang menakjubkan.
                                    </p>
                                    <a href="https://maps.app.goo.gl/n6XTkuQifzwpuynh7" class="btn btn-primary">Lihat
                                        Maps</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card keempat -->
                        <div class="swiper-slide">
                            <div class="card border-0 shadow"
                                style="max-width: 350px; margin: auto; text-align: center;">
                                <div class="card-body">
                                    <div class="icon-box">
                                        <img src="/assets/homepage/img/destinasi/5.png" class="card-img-top" alt="...">
                                    </div>
                                    <h4 class="card-title"
                                        style="color: #7AA2E3; font-weight: bold; display: inline-block;">Mangunan
                                        Yogyakarta</h4>
                                    <p class="card-text">Mangunan Yogyakarta adalah daerah perbukitan yang terkenal
                                        dengan pesona sawah terasering dan spot-spot foto yang menarik. Lokasinya yang
                                        indah dan terbuka membuat Mangunan menjadi destinasi favorit untuk menikmati
                                        keindahan alam dan mengabadikan momen-momen indah.
                                    </p>
                                    <a href="https://maps.app.goo.gl/VPARov2kFjncvpS5A" class="btn btn-primary">Lihat
                                        Maps</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card kelima -->
                        <div class="swiper-slide">
                            <div class="card border-0 shadow"
                                style="max-width: 350px; margin: auto; text-align: center;">
                                <div class="card-body">
                                    <div class="icon-box">
                                        <img src="/assets/homepage/img/destinasi/1.png" class="card-img-top" alt="...">
                                    </div>
                                    <h4 class="card-title"
                                        style="color: #7AA2E3; font-weight: bold; display: inline-block;">Bukit Bintang
                                    </h4>
                                    <p class="card-text">Bukit Bintang adalah salah satu bukit terkenal di Yogyakarta
                                        yang menawarkan pemandangan alam yang spektakuler. Dari puncak bukit ini,
                                        pengunjung dapat menikmati panorama yang luas, termasuk pemandangan Kota
                                        Yogyakarta dan sekitarnya yang memukau serta gemerlap malam.</p>
                                    <a href="https://maps.app.goo.gl/FgnNE6dUi71mULE27" class="btn btn-primary">Lihat
                                        Maps</a>
                                    <!-- Link -->
                                </div>
                            </div>
                        </div>
                        <!-- Card keenam -->
                        <div class="swiper-slide">
                            <div class="card border-0 shadow"
                                style="max-width: 350px; margin: auto; text-align: center;">
                                <div class="card-body">
                                    <div class="icon-box">
                                        <img src="/assets/homepage/img/destinasi/6.png" class="card-img-top" alt="...">
                                    </div>
                                    <h4 class="card-title"
                                        style="color: #7AA2E3; font-weight: bold; display: inline-block;">Merapi Park
                                    </h4>
                                    <p class="card-text">Merapi Park adalah salah satu objek wisata yang terletak di
                                        Kabupaten Sleman, Daerah Istimewa Yogyakarta, Indonesia. Tempat ini menawarkan
                                        pengalaman wisata yang unik dengan berbagai miniatur landmark terkenal dunia
                                        yang dibuat dengan detail dan keindahan yang memukau.
                                    </p>
                                    <a href="https://maps.app.goo.gl/s791foTg1ttBx6um7" class="btn btn-primary">Lihat
                                        Maps</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card keempat -->
                        <div class="swiper-slide">
                            <div class="card border-0 shadow"
                                style="max-width: 350px; margin: auto; text-align: center;">
                                <div class="card-body">
                                    <div class="icon-box">
                                        <img src="/assets/homepage/img/destinasi/7.png" class="card-img-top" alt="...">
                                    </div>
                                    <h4 class="card-title"
                                        style="color: #7AA2E3; font-weight: bold; display: inline-block;">Sungai Mudal
                                    </h4>
                                    <p class="card-text">Sungai Mudal adalah salah satu destinasi wisata alam yang
                                        populer di Kabupaten Kulon Progo, Daerah Istimewa Yogyakarta, Indonesia. Sungai
                                        ini menawarkan pemandangan yang indah dengan air yang jernih, serta menjadi
                                        tempat yang ideal untuk bersantai dan menikmati keindahan alam.
                                    </p>
                                    <a href="https://maps.app.goo.gl/onBqxuNzR4kXVqEf8" class="btn btn-primary">Lihat
                                        Maps</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card keempat -->
                        <div class="swiper-slide">
                            <div class="card border-0 shadow"
                                style="max-width: 350px; margin: auto; text-align: center;">
                                <div class="card-body">
                                    <div class="icon-box">
                                        <img src="/assets/homepage/img/destinasi/9.png" class="card-img-top" alt="...">
                                    </div>
                                    <h4 class="card-title"
                                        style="color: #7AA2E3; font-weight: bold; display: inline-block;">Candi Prambanan
                                    </h4>
                                    <p class="card-text">Candi Prambanan adalah salah satu situs warisan dunia UNESCO yang terletak di Yogyakarta, Indonesia. Candi ini adalah kompleks candi Hindu terbesar di Indonesia dan merupakan salah satu yang paling indah di Asia Tenggara yang sangat terkenal bagi para pengunjung internasional.
                                    </p>
                                    <a href="https://maps.app.goo.gl/BNNDnb4SqQDZ2NmSA" class="btn btn-primary">Lihat
                                        Maps</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card keempat -->
                        <div class="swiper-slide">
                            <div class="card border-0 shadow"
                                style="max-width: 350px; margin: auto; text-align: center;">
                                <div class="card-body">
                                    <div class="icon-box">
                                        <img src="/assets/homepage/img/destinasi/8.png" class="card-img-top" alt="...">
                                    </div>
                                    <h4 class="card-title"
                                        style="color: #7AA2E3; font-weight: bold; display: inline-block;">Benteng Vredeburg
                                    </h4>
                                    <p class="card-text">Benteng Vredeburg adalah salah satu bangunan bersejarah yang terletak di pusat kota Yogyakarta, Indonesia. Benteng ini memiliki nilai sejarah yang tinggi dan kini berfungsi sebagai museum yang menampilkan sejarah perjuangan nasional bangsa Indonesia yang sangat berharga.
                                    </p>
                                    <a href="https://maps.app.goo.gl/EPz2nv6MZuivYQ6G8" class="btn btn-primary">Lihat
                                        Maps</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card keempat -->
                        <div class="swiper-slide">
                            <div class="card border-0 shadow"
                                style="max-width: 350px; margin: auto; text-align: center;">
                                <div class="card-body">
                                    <div class="icon-box">
                                        <img src="/assets/homepage/img/destinasi/10.png" class="card-img-top" alt="...">
                                    </div>
                                    <h4 class="card-title"
                                        style="color: #7AA2E3; font-weight: bold; display: inline-block;">Malioboro
                                    </h4>
                                    <p class="card-text">Jalan Malioboro adalah salah satu kawasan paling terkenal di Yogyakarta, Indonesia, yang menjadi ikon pariwisata kota ini. Jalan ini menawarkan berbagai atraksi, mulai dari belanja, kuliner, hingga pengalaman budaya yang kaya dan tradisional untuk wisatawan.
                                    </p>
                                    <a href="https://maps.app.goo.gl/9SPp3WNNBxD9mxDPA" class="btn btn-primary">Lihat
                                        Maps</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- End Rekomendasi Destinasi -->

        <!-- ======= Testimonials Section ======= -->
        <section id="penilaian" class="testimonials section-bg">
            <div class="container">
                <div class="section-title" data-aos="fade-up">
                    <h2>Penilaian</h2>
                </div>
                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="assets/homepage/img/testimonials/1.png"
                                        class="testimonial-img" alt="">
                                    <h3>Anies Baswedan</h3>
                                    <h4>Ceo &amp; Founder</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Hotel ini menawarkan fasilitas wellness yang lengkap, termasuk spa, pusat
                                        kebugaran, kolam renang, dan aktivitas luar ruangan seperti yoga dan meditasi.
                                        Fasilitas ini memberikan pengalaman menyegarkan dan memungkinkan tamu untuk
                                        meraih kesehatan dan kebugaran optimal selama menginap. <i
                                            class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="assets/homepage/img/testimonials/2.png"
                                        class="testimonial-img" alt="">
                                    <h3>Bahlawan</h3>
                                    <h4>Robotics Engineer</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Staf hotel sangat ramah, responsif, dan peduli terhadap kebutuhan tamu. Mereka
                                        memberikan perhatian khusus dalam menyediakan pengalaman pribadi dan mendukung
                                        tamu dalam merencanakan aktivitas wellness selama menginap. <i
                                            class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="assets/homepage/img/testimonials/4.png"
                                        class="testimonial-img" alt="">
                                    <h3>Xaviera Putri</h3>
                                    <h4>Lollipop Owner</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Hotel ini menawarkan beragam program wellness yang disesuaikan dengan kebutuhan
                                        tamu, termasuk retreat, workshop, dan sesi pengembangan pribadi. Program-program
                                        ini membantu tamu untuk mencapai tujuan kesehatan dan kebugaran mereka dengan
                                        dukungan dari ahli terlatih. <i
                                            class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="assets/homepage/img/testimonials/3.png"
                                        class="testimonial-img" alt="">
                                    <h3>Fahri Bahri</h3>
                                    <h4>Football Player</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Restoran hotel menawarkan beragam opsi makanan sehat dan bergizi, termasuk menu
                                        organik, vegetarian, dan bebas gluten. Bahan-bahan yang digunakan segar dan
                                        berkualitas, memastikan tamu mendapatkan nutrisi optimal selama menginap. <i
                                            class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <img src="assets/homepage/img/testimonials/5.png"
                                        class="testimonial-img" alt="">
                                    <h3>Palermo</h3>
                                    <h4>Coach Football</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Hotel ini memberikan pengalaman yang memuaskan bagi para tamu yang mencari
                                        liburan sehat dan menyegarkan. Dengan fasilitas, program, dan layanan yang
                                        berkualitas, tamu merasa terjaga dan terinspirasi selama menginap di sini. <i
                                            class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Testimonials Section -->

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
                            <p>adalah tujuan utama untuk kesehatan dan kebugaran di Hotel The Rich Jogja. Terletak di
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
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        // Inisialisasi Swiper untuk Rekomendasi Layanan Kesehatan
        var rekomendasiSwiper = new Swiper('.rekomendasi-swiper', {
            direction: 'horizontal',
            loop: true,
            slidesPerView: 4, // Menampilkan 4 card sekaligus
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            loop: false, // Nonaktifkan loop agar swiper berhenti setelah card ke-5
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
                delay: 2500,
                disableOnInteraction: false,
            },
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
    </script>


</body>

</html>