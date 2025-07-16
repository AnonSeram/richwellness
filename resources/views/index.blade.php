@extends('layouts.app')

@section('content')

  <!-- Swiper Carousel -->
  <div class="carousel-container">
    <div class="swiper-container main-carousel">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="{{ asset('nyoba/images/carousel/1.png') }}" alt="swipper-image-1" />
        <a href="/pesanReservasi" class="booking-btn">{{ __("messages.book_now") }}</a></div>
        <div class="swiper-slide"><img src="{{ asset('nyoba/images/carousel/2.png') }}" alt="swipper-image-2" /></div>
        <div class="swiper-slide"><img src="{{ asset('nyoba/images/carousel/3.png') }}" alt="swipper-image-3" /></div>
        <div class="swiper-slide"><img src="{{ asset('nyoba/images/carousel/4.png') }}" alt="swipper-image-4" /></div>
        <div class="swiper-slide"><img src="{{ asset('nyoba/images/carousel/5.png') }}" alt="swipper-image-5" /></div>
        <div class="swiper-slide"><img src="{{ asset('nyoba/images/carousel/6.png') }}" alt="swipper-image-6" /></div>
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
                        {{ __("messages.hero_description") }}
                    </h2>
                    <div data-aos="fade-up" data-aos-delay="800">
                        <a href="/pesanReservasi" class="btn-get-started scrollto">{{ __("messages.book") }} <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
                    <img src="{{ asset('assets/homepage/img/hero-img1.png') }}" class="img-fluid animated" alt="">
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
            <h2 style="font-weight: bold; color:rgb(255, 255, 255); font-size:44px; margin-bottom: 12px;">{{ __("messages.featured_packages") }}</h2>
        </div>
        <div class="row justify-content-center">
            <!-- Card 1 -->
            <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch">
                <div class="card hover-zoom border-0 shadow-sm text-center" style="max-width: 350px; width: 100%; border-radius: 20px;">
                    <div class="card-body d-flex flex-column">
                        <div class="icon-box mb-3">
                            <i class="bi bi-star-fill" style="font-size: 3rem; color: #FFC107;"></i>
                        </div>
                        <h4 class="card-title" style="color: #7AA2E3; font-weight: bold;">{{ __("messages.serenity_retreat_title") }}</h4>
                        <p class="card-text flex-grow-1 mt-3">{{ __("messages.serenity_retreat_description") }}</p>
                        <a href="/pesanReservasi" class="btn btn-primary mt-3" style="border-radius: 30px;">{{ __("messages.book_now") }}</a>
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
                        <h4 class="card-title" style="color: #7AA2E3; font-weight: bold;">{{ __("messages.renewal_journey_title") }}</h4>
                        <p class="card-text flex-grow-1 mt-3">{{ __("messages.renewal_journey_description") }}</p>
                        <a href="/pesanReservasi" class="btn btn-primary mt-3" style="border-radius: 30px;">{{ __("messages.book_now") }}</a>
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
                        <h4 class="card-title" style="color: #7AA2E3; font-weight: bold;">{{ __("messages.harmony_experience_title") }}</h4>
                        <p class="card-text flex-grow-1 mt-3">{{ __("messages.harmony_experience_description") }}</p>
                        <a href="/pesanReservasi" class="btn btn-primary mt-3" style="border-radius: 30px;">{{ __("messages.book_now") }}</a>
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
                        <h4 class="card-title" style="color: #7AA2E3; font-weight: bold;">{{ __("messages.ultimate_wellness_title") }}</h4>
                        <p class="card-text flex-grow-1 mt-3">{{ __("messages.ultimate_wellness_description") }}</p>
                        <a href="/pesanReservasi" class="btn btn-primary mt-3" style="border-radius: 30px;">{{ __("messages.book_now") }}</a>
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
            <h2 style="font-weight: 700;">{{ __("messages.room_facilities") }}</h2>
            <p style="margin-bottom: 10px;"><strong>{{ __("messages.room_facilities_description") }}</strong></p>
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
            <h2>{{ __("messages.hotel_facilities") }}</h2>
            <p>{{ __("messages.hotel_facilities_description") }}</p>
        </div>
        <div class="row g-4 justify-content-center" data-aos="fade-up">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-item text-center">
                    <div class="service-img mb-3">
                        <img src="{{ asset('nyoba/images/fasilitas/1.jpg') }}" alt="Swimming Pool">
                    </div>
                    <h5>{{ __("messages.swimming_pool") }}</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-item text-center">
                    <div class="service-img mb-3">
                        <img src="{{ asset('nyoba/images/fasilitas/6.jpg') }}" alt="SPA">
                    </div>
                    <h5>{{ __("messages.spa") }}</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-item text-center">
                    <div class="service-img mb-3">
                        <img src="{{ asset('nyoba/images/fasilitas/7.jpg') }}" alt="Fitness Center">
                    </div>
                    <h5>{{ __("messages.fitness_center") }}</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-item text-center">
                    <div class="service-img mb-3">
                        <img src="{{ asset('nyoba/images/fasilitas/8.jpg') }}" alt="Sauna">
                    </div>
                    <h5>{{ __("messages.sauna") }}</h5>
                </div>
            </div>
        </div>

        <div class="row g-4 justify-content-center mt-4">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-item text-center">
                    <div class="service-img mb-3">
                        <img src="{{ asset('nyoba/images/fasilitas/3.jpg') }}" alt="Breakfast">
                    </div>
                    <h5>{{ __("messages.breakfast") }}</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-item text-center">
                    <div class="service-img mb-3">
                        <img src="{{ asset('nyoba/images/fasilitas/4.jpg') }}" alt="Parking Lot">
                    </div>
                    <h5>{{ __("messages.parking_lot") }}</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-item text-center">
                    <div class="service-img mb-3">
                        <img src="{{ asset('nyoba/images/fasilitas/5.jpg') }}" alt="Lunch">
                    </div>
                    <h5>{{ __("messages.lunch") }}</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="service-item text-center">
                    <div class="service-img mb-3">
                        <img src="{{ asset('nyoba/images/fasilitas/2.jpg') }}" alt="Wifi">
                    </div>
                    <h5>{{ __("messages.wifi") }}</h5>
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
    <h2 style="text-align: center; margin-bottom: 40px; font-size: 32px; color: #333; font-weight: bold; color: white;">{{ __("messages.health_services_recommendation_title") }}</h2>

    <div class="grid-container">
      <!-- CARD 1 -->
      <div class="custom-card">
        <div class="img-container">
          <img src="{{ asset('assets/homepage/img/kesehatan/4.png') }}" class="custom-img" alt="Poliklinik Mata">
        </div>
        <h4 class="custom-title">{{ __("messages.eye_clinic_sardjito_title") }}</h4>
        <p class="custom-text">{{ __("messages.eye_clinic_sardjito_description") }}</p>
        <a href="https://sardjito.co.id/" class="custom-btn" target="_blank">{{ __("messages.visit_site") }}</a>
      </div>

      <!-- CARD 2 -->
      <div class="custom-card">
        <div class="img-container">
          <img src="{{ asset('assets/homepage/img/kesehatan/2.png') }}" class="custom-img" alt="Klinik Kulit">
        </div>
        <h4 class="custom-title">{{ __("messages.skin_clinic_panti_rapih_title") }}</h4>
        <p class="custom-text">{{ __("messages.skin_clinic_panti_rapih_description") }}</p>
        <a href="https://pantirapih.or.id/rspr/" class="custom-btn" target="_blank">{{ __("messages.visit_site") }}</a>
      </div>

      <!-- CARD 3 -->
      <div class="custom-card">
        <div class="img-container">
          <img src="{{ asset('assets/homepage/img/kesehatan/3.png') }}" class="custom-img" alt="Klinik Ginjal">
        </div>
        <h4 class="custom-title">{{ __("messages.kidney_clinic_pku_title") }}</h4>
        <p class="custom-text">{{ __("messages.kidney_clinic_pku_description") }}</p>
        <a href="https://rspkujogja.com/" class="custom-btn" target="_blank">{{ __("messages.visit_site") }}</a>
      </div>

      <!-- CARD 4 -->
      <div class="custom-card">
        <div class="img-container">
          <img src="{{ asset('assets/homepage/img/kesehatan/1.png') }}" class="custom-img" alt="Klinik Jantung">
        </div>
        <h4 class="custom-title">{{ __("messages.heart_clinic_sardjito_title") }}</h4>
        <p class="custom-text">{{ __("messages.heart_clinic_sardjito_description") }}</p>
        <a href="https://sardjito.co.id/" class="custom-btn" target="_blank">{{ __("messages.visit_site") }}</a>
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
      <h2>{{ __("messages.tourism_destination_recommendation_title") }}</h2>
    </div>

    <div class="card-wrapper">
      
      <div class="card-custom">
        <img src="{{ asset('assets/homepage/img/destinasi/4.png') }}" class="card-img">
        <div class="card-body-custom">
          <h4>{{ __("messages.heha_sky_view_title") }}</h4>
          <p>{{ __("messages.heha_sky_view_description") }}</p>
          <div class="btn-wrapper">
            <a href="https://www.google.com/maps/search/heha+sky+view/@-7.9774678,110.3051026,11z/data=!3m1!4b1?entry=ttu" class="btn-custom" target="_blank">{{ __("messages.view_maps") }}</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="{{ asset('assets/homepage/img/destinasi/3.png') }}" class="card-img">
        <div class="card-body-custom">
          <h4>{{ __("messages.sermo_reservoir_title") }}</h4>
          <p>{{ __("messages.sermo_reservoir_description") }}</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/ASE7cBjm6QmCmuTU7" class="btn-custom" target="_blank">{{ __("messages.view_maps") }}</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="{{ asset('assets/homepage/img/destinasi/2.png') }}" class="card-img">
        <div class="card-body-custom">
          <h4>{{ __("messages.parangtritis_beach_title") }}</h4>
          <p>{{ __("messages.parangtritis_beach_description") }}</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/n6XTkuQifzwpuynh7" class="btn-custom" target="_blank">{{ __("messages.view_maps") }}</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="{{ asset('assets/homepage/img/destinasi/5.png') }}" class="card-img">
        <div class="card-body-custom">
          <h4>{{ __("messages.mangunan_yogyakarta_title") }}</h4>
          <p>{{ __("messages.mangunan_yogyakarta_description") }}</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/VPARov2kFjncvpS5A" class="btn-custom" target="_blank">{{ __("messages.view_maps") }}</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="{{ asset('assets/homepage/img/destinasi/1.png') }}" class="card-img">
        <div class="card-body-custom">
          <h4>{{ __("messages.bukit_bintang_title") }}</h4>
          <p>{{ __("messages.bukit_bintang_description") }}</p>
          <div class="btn-wrapper">
            <a href="https://www.google.com/maps/search/heha+sky+view/@-7.9774678,110.3051026,11z/data=!3m1!4b1?entry=ttu" class="btn-custom" target="_blank">{{ __("messages.view_maps") }}</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="{{ asset('assets/homepage/img/destinasi/6.png') }}" class="card-img">
        <div class="card-body-custom">
          <h4>{{ __("messages.merapi_park_title") }}</h4>
          <p>{{ __("messages.merapi_park_description") }}</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/s791foTg1ttBx6um7" class="btn-custom" target="_blank">{{ __("messages.view_maps") }}</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="{{ asset('assets/homepage/img/destinasi/7.png') }}" class="card-img">
        <div class="card-body-custom">
          <h4>{{ __("messages.mudal_river_title") }}</h4>
          <p>{{ __("messages.mudal_river_description") }}</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/onBqxuNzR4kXVqEf8" class="btn-custom" target="_blank">{{ __("messages.view_maps") }}</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="{{ asset('assets/homepage/img/destinasi/9.png') }}" class="card-img">
        <div class="card-body-custom">
          <h4>{{ __("messages.prambanan_temple_title") }}</h4>
          <p>{{ __("messages.prambanan_temple_description") }}</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/BNNDnb4SqQDZ2NmSA" class="btn-custom" target="_blank">{{ __("messages.view_maps") }}</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="{{ asset('assets/homepage/img/destinasi/8.png') }}" class="card-img">
        <div class="card-body-custom">
          <h4>{{ __("messages.vredeburg_fortress_title") }}</h4>
          <p>{{ __("messages.vredeburg_fortress_description") }}</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/EPz2nv6MZuivYQ6G8" class="btn-custom" target="_blank">{{ __("messages.view_maps") }}</a>
          </div>
        </div>
      </div>

      <div class="card-custom">
        <img src="{{ asset('assets/homepage/img/destinasi/10.png') }}" class="card-img">
        <div class="card-body-custom">
          <h4>{{ __("messages.malioboro_title") }}</h4>
          <p>{{ __("messages.malioboro_description") }}</p>
          <div class="btn-wrapper">
            <a href="https://maps.app.goo.gl/4mP3RCB5nQLi4NpE7" class="btn-custom" target="_blank">{{ __("messages.view_maps") }}</a>
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
<section id="existing-ratings" data-aos="fade-up"  class="existing-ratings mt-5 px-3 px-md-5">
  <h3 class="text-center mb-5 fw-bold" style="font-size: 2.5rem;">{{ __("messages.what_visitors_say") }}</h3>
  <div class="row g-4">
    @foreach($ratings as $rating)
      <div class="col-md-6 col-lg-4">
        <div class="card rating-zoom border-0 shadow-sm rounded-4 p-4 h-100">
          <div class="d-flex align-items-center mb-3">
            <div class="rounded-circle bg-light d-flex justify-content-center align-items-center shadow-sm" style="width: 50px; height: 50px;">
              <span class="fw-semibold text-primary" style="font-size: 1.25rem;">
                {{ strtoupper(substr($rating->user->name ?? __("messages.user"), 0, 1)) }}
              </span>
            </div>
            <div class="ms-3">
              <div class="fw-semibold text-dark" style="font-size: 1rem;">
                {{ $rating->user->name ?? __("messages.user") }}
              </div>
              <small class="text-muted">{{ $rating->created_at->format('d M Y') }}</small>
            </div>
          </div>
          <div class="mb-2" style="color: #f5b301; font-size: 1.1rem;">
            {{ str_repeat('★', $rating->rating) }}{{ str_repeat('☆', 5 - $rating->rating) }}
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
                    <h2>{{ __("messages.contact_us") }}</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="contact-about">
                            <h3>Rich Wellness</h3>
                            <p>{{ __("messages.contact_us_description") }}</p>
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

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/homepage/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('assets/homepage/vendor/aos/aos.js') }}"></script>
    <!-- Updated to Bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/homepage/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/homepage/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/homepage/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/homepage/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/homepage/js/main.js') }}"></script>
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


@endsection


