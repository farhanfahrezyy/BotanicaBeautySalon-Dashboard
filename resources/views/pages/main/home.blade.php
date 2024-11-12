@extends('layouts.layout-home')

@section('title', 'Home || Botanica')

@section('content')

    <div class="page-wrapper">


        <div class="stricky-header stricked-menu main-menu main-menu-two">
            <div class="sticky-header__content"></div>
            <!-- /.sticky-header__content -->
        </div>
        <!-- /.stricky-header -->

        <!--Main Slider Start-->
        <section class="main-slider-two">
            <div class="swiper-container thm-swiper__slider"
                data-swiper-options='{"slidesPerView": 1, "loop": true,
        "effect": "fade",
        "pagination": {
        "el": "#main-slider-pagination",
        "type": "bullets",
        "clickable": true
        },
        "navigation": {
        "nextEl": "#main-slider__swiper-button-next",
        "prevEl": "#main-slider__swiper-button-prev"
        },
        "autoplay": {
        "delay": 5000
        }}'>
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="image-layer-two"
                            style="
                  background-image: url('{{ asset('images/backgrounds/main-slider-2-1.jpg') }}');
                ">
                        </div>
                        <!-- /.image-layer -->

                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="main-slider-two__content">
                                        <p class="main-slider-two__sub-title">
                                            Selamat Datang di Botanica Beauty Salon
                                        </p>
                                        <h2 class="main-slider-two__title">
                                            Buat Dirimu Segar & Cantik, <br />
                                            Siap Hadapi Kuliah
                                        </h2>
                                        <div class="main-slider-two__btn-box">
                                            <a href="{{ route('service') }}"
                                                class="thm-btn main-slider-two__btn">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="image-layer-two"
                            style="
                  background-image: url('{{ asset('images/backgrounds/main-slider-2-2.jpg') }}');
                ">
                        </div>
                        <!-- /.image-layer -->

                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="main-slider-two__content">
                                        <p class="main-slider-two__sub-title">
                                            Selamat Datang di Botanica Beauty Salon
                                        </p>
                                        <h2 class="main-slider-two__title">
                                            Berikan Ruang untuk <br />
                                            Kecantikan di Hidupmu
                                        </h2>
                                        <div class="main-slider-two__btn-box">
                                            <a href="{{ route('service') }}"
                                                class="thm-btn main-slider-two__btn">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="image-layer-two"
                            style="
                  background-image: url('{{ asset('images/backgrounds/main-slider-2-3.jpg') }}');
                ">
                        </div>
                        <!-- /.image-layer -->

                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="main-slider-two__content">
                                        <p class="main-slider-two__sub-title">
                                            Selamat Datang di Botanica Beauty Salon
                                        </p>
                                        <h2 class="main-slider-two__title">
                                            Salon & Spa Terjangkau, <br />
                                            Ramah Untuk Mahasiswa
                                        </h2>
                                        <div class="main-slider-two__btn-box">
                                            <a href="{{ route('service') }}"
                                                class="thm-btn main-slider-two__btn">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-pagination" id="main-slider-pagination"></div>
                <!-- If we need navigation buttons -->
            </div>
        </section>
        <!--Main Slider End-->

        <!--About One Start-->
        <section class="about-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-one__left">
                            <div class="about-one__img-box wow slideInLeft" data-wow-delay="100ms"
                                data-wow-duration="2500ms">
                                <div class="about-one__img">
                                    <img src="{{ asset('images/resources/about-one-img-1.jpg') }}" alt="" />
                                </div>
                                <div class="about-one__img-2">
                                    <img src="{{ asset('images/resources/about-one-img-2.jpg') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-one__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Tentang Kami</span>
                                <h2 class="section-title__title">
                                    No. 1 Spa & Salon Mahasiswa
                                </h2>
                            </div>
                            <p class="about-one__text">
                                Kami berkomitmen menjadi Spa & Salon khusus wanita yang
                                menawarkan berbagai treatment istimewa untuk merawat
                                kecantikan alami Anda, dengan harga terjangkau. Jadikan
                                perawatan ini sebagai "Self Reward" untuk diri Anda, apapun
                                peran Anda.
                            </p>
                            <ul class="list-unstyled about-one__points">
                                <li>
                                    <h4>
                                        <span class="fa fa-check"></span> Harga Ramah di kantong
                                        Mahasiswa
                                    </h4>
                                    <p>
                                        Nikmati layanan dengan harga terjangkau untuk para
                                        mahasiswa
                                    </p>
                                </li>
                                <li>
                                    <h4>
                                        <span class="fa fa-check"></span> Dilayani Oleh Para
                                        Profesional
                                    </h4>
                                    <p>
                                        Anti abal-abal, kamu bakal diberikan layanan langsung sama
                                        ahli dibidangnya
                                    </p>
                                </li>
                            </ul>
                            <div class="about-one__btn-call-box">
                                <a href="{{ route('service') }}" class="about-one__btn thm-btn">Selengkapnya</a>
                                <div class="about-one__call-box">
                                    <div class="about-one__call-icon">
                                        <span class="icon-telephone"></span>
                                    </div>
                                    <div class="about-one__call-content">
                                        <p class="about-one__call-sub-title">Hubungi Kami</p>
                                        <h4 class="about-one__call-number">
                                            <a href="https://api.whatsapp.com/message/C7EDNCUPKBBMP1?autoload=1&app_absent=0"
                                                target="_blank">+62 889-7536-5090</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About One End-->

        <!--Feature One Start-->
        <section class="feature-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <div class="feature-one__single-one">
                            <div class="feature-one__single-one-img">
                                <img src="{{ asset('images/resources/feature-one-single-one-img-1.jpg') }}"
                                    alt="" />
                                <div class="feature-one__single-one-content">
                                    <span>Dapatkan Diskon</span>
                                    <h2>-10%</h2>
                                    <p>spesial kemerdekaan</p>
                                    <a href="{{ route('service') }}" class="thm-btn feature-one__btn">selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                        <div class="feature-one__single-two">
                            <h3 class="feature-one__single-two-title">
                                Opening <br />
                                Hours
                            </h3>
                            <ul class="feature-one__single-two-points list-unstyled">
                                <li>
                                    <div class="day">
                                        <p>Monday</p>
                                    </div>
                                    <div class="time">
                                        <span>Libur</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="day">
                                        <p>Tuesday</p>
                                    </div>
                                    <div class="time">
                                        <span>11:00 – 20:00</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="day">
                                        <p>Wednesday</p>
                                    </div>
                                    <div class="time">
                                        <span>11:00 – 20:00</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="day">
                                        <p>Thursday</p>
                                    </div>
                                    <div class="time">
                                        <span>11:00 – 20:00</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="day">
                                        <p>Friday</p>
                                    </div>
                                    <div class="time">
                                        <span>11:00 – 20:00</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="day">
                                        <p>Saturday</p>
                                    </div>
                                    <div class="time">
                                        <span>11:00 – 20:00</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="day">
                                        <p>Sunday</p>
                                    </div>
                                    <div class="time">
                                        <span>11:00 – 20:00</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                        <div class="feature-one__single-three">
                            <div class="feature-one__single-three-img">
                                <img src="{{ asset('images/resources/feature-one-single-three-img-1.jpg') }}"
                                    alt="" />
                                <div class="feature-one__single-three-content">
                                    <h3>
                                        Temukan <br />
                                        Treatment Terbaik <br />
                                        Untukmu
                                    </h3>
                                    <a href="{{ route('service') }}" class="thm-btn feature-one__btn">Jelajahi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Feature One End-->

        <!--Spa Center Start-->
        <section class="spa-center">
            <div class="spa-center__bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url({{ asset('images/backgrounds/spa-center-bg.jpg') }});">
                ></div>
            <div class="spa-center__inner">
                <div class="container">
                    <div class="spa-center__content text-center">
                        <div class="spa-center__img">
                            <img src="{{ asset('images/resources/spa-center-img-1.png') }}" alt="" />
                        </div>
                        <h3 class="spa-center__title">
                            Temukan Layanan Terbaik <br />
                            Hanya Disini
                        </h3>
                        <div class="spa-center__btn-box">
                            <a href="{{ route('service') }}" class="thm-btn spa-center__btn">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Spa Center End-->

        <!--Why Choose One Start-->
        <section class="why-choose-one">
            <div class="why-choose-one__shape-1 float-bob-x">
                <img src="{{ asset('images/shapes/why-choose-one-shape-1.png') }}" alt="" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="why-choose-one__left">
                            <div class="why-choose-one__img">
                                <img src="{{ asset('images/resources/why-choose-one-img-1.jpg') }}" alt="" />
                                <div class="why-choose-one__video-link">
                                    <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">
                                        <div class="why-choose-one__video-icon">
                                            <span class="fa fa-play"></span>
                                            <i class="ripple"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="why-choose-one__left-title">
                                    <h2>
                                        Place of <br />
                                        beauty
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="why-choose-one__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Keunggulan Kami</span>
                                <h2 class="section-title__title">
                                    Kenapa Harus Memilih <br />
                                    Botanica Beuty Salon
                                </h2>
                            </div>
                            <div class="why-choose-one__faq">
                                <div class="accrodion-grp" data-grp-name="faq-one-accrodion">
                                    <div class="accrodion active">
                                        <div class="accrodion-title">
                                            <h4>Harga ramah untuk mahasiswa</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>
                                                    Jangan khawatir nyalon bikin kantong kamu kering. Nyalon di Botanica
                                                    Beauty Salon, semua layanan dijamin ramah dikantong mahasiswa.
                                                </p>
                                            </div>
                                            <!-- /.inner -->
                                        </div>
                                    </div>
                                    <div class="accrodion">
                                        <div class="accrodion-title">
                                            <h4>Pelayanan oleh profesional</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>
                                                    Semua layanan yang disediakan oleh Botanica Beauty Salon dijamin
                                                    ditangani oleh para profesional dibidangnya.
                                                </p>
                                            </div>
                                            <!-- /.inner -->
                                        </div>
                                    </div>
                                    <div class="accrodion last-child">
                                        <div class="accrodion-title">
                                            <h4>Tempat dan ruangan yang nyaman</h4>
                                        </div>
                                        <div class="accrodion-content">
                                            <div class="inner">
                                                <p>
                                                    Botanica Beauty Salon menawarkan suasana yang nyaman dan menenangkan
                                                    untuk Anda bersantai dan memanjakan diri.
                                                </p>
                                            </div>
                                            <!-- /.inner -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Why Choose One End-->


        <!--Team One Start-->
        <section class="team-one">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Beautician Botanica Beauty</span>
                    <h2 class="section-title__title">Temui Profesional Kami</h2>
                </div>
                <div class="row">
                    <!--Team One Single Start-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp text center" data-wow-delay="100ms">
                        <div class="team-one__single">
                            <div class="team-one__img">
                                <img src="{{ asset('images/team/team-1-1.jpg') }}" alt="" />
                                <ul class="list-unstyled team-one__social">
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="team-one__content">
                                <h3 class="team-one__name">
                                    <a href="#">Aleesha Brown</a>
                                </h3>
                                <p class="team-one__sub-title">Therapist</p>
                            </div>
                        </div>
                    </div>
                    <!--Team One Single End-->
                    <!--Team One Single Start-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp text center" data-wow-delay="200ms">
                        <div class="team-one__single">
                            <div class="team-one__img">
                                <img src="{{ asset('images/team/team-1-2.jpg') }}" alt="" />

                                <ul class="list-unstyled team-one__social">
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="team-one__content">
                                <h3 class="team-one__name">
                                    <a href="#">David Cooper</a>
                                </h3>
                                <p class="team-one__sub-title">Therapist</p>
                            </div>
                        </div>
                    </div>
                    <!--Team One Single End-->
                    <!--Team One Single Start-->
                    <!-- <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                                  <div class="team-one__single">
                                    <div class="team-one__img">
                                      <img src="assets/images/team/team-1-3.jpg" alt="" />
                                      <ul class="list-unstyled team-one__social">
                                        <li>
                                          <a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>
                                          <a href="#"><i class="fab fa-facebook"></i></a>
                                        </li>
                                        <li>
                                          <a href="#"><i class="fab fa-instagram"></i></a>
                                        </li>
                                      </ul>
                                    </div>
                                    <div class="team-one__content">
                                      <h3 class="team-one__name">
                                        <a href="team.html">Jessica Rose</a>
                                      </h3>
                                      <p class="team-one__sub-title">Therapist</p>
                                    </div>
                                  </div>
                                </div> -->
                    <!--Team One Single End-->
                </div>
            </div>
        </section>
        <!--Team One End-->

        <!-- Brand One Start-->
        <!-- <section class="brand-two">
                                      <div class="container">
                                        <div
                                          class="thm-swiper__slider swiper-container"
                                          data-swiper-options='{"spaceBetween": 100,
              "slidesPerView": 5,
              "loop": true,
              "navigation": {
                  "nextEl": "#brand-one__swiper-button-next",
                  "prevEl": "#brand-one__swiper-button-prev"
              },
              "autoplay": { "delay": 5000 },
              "breakpoints": {
                  "0": {
                      "spaceBetween": 30,
                      "slidesPerView": 2
                  },
                  "375": {
                      "spaceBetween": 30,
                      "slidesPerView": 2
                  },
                  "575": {
                      "spaceBetween": 30,
                      "slidesPerView": 3
                  },
                  "767": {
                      "spaceBetween": 50,
                      "slidesPerView": 4
                  },
                  "991": {
                      "spaceBetween": 50,
                      "slidesPerView": 5
                  },
                  "1199": {
                      "spaceBetween": 100,
                      "slidesPerView": 5
                  }
              }}'>
                                          <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                              <img src="assets/images/brand/brand-2-1.png" alt="" />
                                            </div> -->
        <!-- /.swiper-slide -->
        <!-- <div class="swiper-slide">
                                              <img src="assets/images/brand/brand-2-2.png" alt="" />
                                            </div> -->
        <!-- /.swiper-slide -->
        <!-- <div class="swiper-slide">
                                              <img src="assets/images/brand/brand-2-3.png" alt="" />
                                            </div> -->
        <!-- /.swiper-slide -->
        <!-- <div class="swiper-slide">
                                              <img src="assets/images/brand/brand-2-4.png" alt="" />
                                            </div> -->
        <!-- /.swiper-slide -->
        <!-- <div class="swiper-slide">
                                              <img src="assets/images/brand/brand-2-5.png" alt="" />
                                            </div> -->
        <!-- /.swiper-slide -->
        <!-- <div class="swiper-slide">
                                              <img src="assets/images/brand/brand-2-1.png" alt="" />
                                            </div> -->
        <!-- /.swiper-slide -->
        <!-- <div class="swiper-slide">
                                              <img src="assets/images/brand/brand-2-2.png" alt="" />
                                            </div> -->
        <!-- /.swiper-slide -->
        <!-- <div class="swiper-slide">
                                              <img src="assets/images/brand/brand-2-3.png" alt="" />
                                            </div> -->
        <!-- /.swiper-slide -->
        <!-- <div class="swiper-slide">
                                              <img src="assets/images/brand/brand-2-4.png" alt="" />
                                            </div> -->
        <!-- /.swiper-slide -->
        <!-- <div class="swiper-slide">
                                              <img src="assets/images/brand/brand-2-5.png" alt="" />
                                            </div> -->
        <!-- /.swiper-slide -->
        <!-- </div>
                                        </div>
                                      </div>
                                    </section> -->
        <!--Brand One End -->

        <!--Testimonial-->
        <!--Testimonial Two Start-->
        <section class="testimonial-two">
            <div class="testimonial-two__shape-1 float-bob-x">
                <img src="{{ asset('images/shapes/testimonial-two-shape-1.png') }}" alt="" />
            </div>
            <div class="testimonial-two__shape-2 float-bob-y">
                <img src="assets/images/shapes/testimonial-two-shape-2.png" alt="" />
            </div>
            <div class="container">
                <div class="testimonial-two__slider">
                    <div class="swiper-container" id="testimonial-two__thumb">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-two__img-holder">
                                    <img src="{{ asset('images/testimonial/testimonial-2-1.jpg') }}" alt="" />
                                </div>
                            </div>
                            <!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <div class="testimonial-two__img-holder">
                                    <img src="{{ asset('images/testimonial/testimonial-2-2.jpg') }}" alt="" />
                                </div>
                            </div>
                            <!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <div class="testimonial-two__img-holder">
                                    <img src="{{ asset('images/testimonial/testimonial-2-3.jpg') }}" alt="" />
                                </div>
                            </div>
                            <!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <div class="testimonial-two__img-holder">
                                    <img src="{{ asset('images/testimonial/testimonial-2-4.jpg') }}" alt="" />
                                </div>
                            </div>
                            <!-- /.swiper-slide -->
                            <div class="swiper-slide">
                                <div class="testimonial-two__img-holder">
                                    <img src="{{ asset('images/testimonial/testimonial-2-5.jpg') }}" alt="" />
                                </div>
                            </div>
                            <!-- /.swiper-slide -->
                        </div>
                        <!-- /.swiper-wrapper -->
                    </div>
                    <!-- /#testimonials-one__thumb.swiper-container -->

                    <div class="testimonial-two__main-content">
                        <div class="swiper-container" id="testimonial-two__carousel">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-two__content-box">
                                        <div class="testimonial-two__client-review">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p class="testimonial-two__text">
                                            Layanan ini sangat ramah, Anda tidak akan kecewa jika menghabiskan waktu di
                                            sini, karena tempatnya sangat nyaman, dan harganya ramah untuk pelajar.
                                        </p>
                                        <div class="testimonial-two__client-info-box">
                                            <h4 class="testimonial-two__client-name">
                                                Yustia Andriyani
                                            </h4>
                                            <p class="testimonial-two__client-sub-title">
                                                Customer
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.swiper-slide -->
                                <div class="swiper-slide">
                                    <div class="testimonial-two__content-box">
                                        <div class="testimonial-two__client-review">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p class="testimonial-two__text">
                                            Anda tidak akan menyesal jika melakukan perawatan di sini... harganya sangat
                                            terjangkau, sistemnya privat, dan sangat cocok untuk pelajar.
                                        </p>
                                        <div class="testimonial-two__client-info-box">
                                            <h4 class="testimonial-two__client-name">Resti Kharisma</h4>
                                            <p class="testimonial-two__client-sub-title">
                                                Customer
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.swiper-slide -->
                                <div class="swiper-slide">
                                    <div class="testimonial-two__content-box">
                                        <div class="testimonial-two__client-review">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p class="testimonial-two__text">
                                            Luar biasa, para wanita di sini sangat ramah, cocok untuk pelajar atau kelompok
                                            lainnya, khusus wanita, yang paling penting, alur dari reservasi hingga selesai
                                            sangat memuaskan.
                                        </p>
                                        <div class="testimonial-two__client-info-box">
                                            <h4 class="testimonial-two__client-name">
                                                Agatha Petrichia
                                            </h4>
                                            <p class="testimonial-two__client-sub-title">
                                                Customer
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.swiper-slide -->
                                <div class="swiper-slide">
                                    <div class="testimonial-two__content-box">
                                        <div class="testimonial-two__client-review">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p class="testimonial-two__text">
                                            Layanan dan harga terbaik, tempatnya juga bersih, super nyaman, Anda harus
                                            mencoba pijatnya! Terima kasih Botanica Beauty.
                                        </p>
                                        <div class="testimonial-two__client-info-box">
                                            <h4 class="testimonial-two__client-name">
                                                Adelia Angelina Hafidzah
                                            </h4>
                                            <p class="testimonial-two__client-sub-title">
                                                Customer
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.swiper-slide -->
                                <div class="swiper-slide">
                                    <div class="testimonial-two__content-box">
                                        <div class="testimonial-two__client-review">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p class="testimonial-two__text">
                                            Sangat nyaman dan homey! Cocok untuk orang yang ingin perawatan rutin tanpa
                                            menguras dompet. Terjangkau, tempatnya juga bersih.
                                        </p>
                                        <div class="testimonial-two__client-info-box">
                                            <h4 class="testimonial-two__client-name">
                                                Koki Nara
                                            </h4>
                                            <p class="testimonial-two__client-sub-title">
                                                Customer
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.swiper-slide -->
                            </div>
                            <!-- /.swiper-wrapper -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonial Two End-->


        <!--Blog Two Start-->
        <!-- Blog Two Start -->
        <section class="blog-two">
            <div class="blog-two__bg"
                style="background-image: url('{{ asset('images/backgrounds/blog-two-bg.jpg') }}');">
            </div>
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Blog Botanica Beauty</span>
                    <h2 class="section-title__title">Artikel Seputar Kecantikan</h2>
                </div>
                <div class="row">
                    <!-- Blog Loop Start -->
                    @foreach ($blogs->take(3) as $blog)
                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="{{ 100 * $loop->index }}ms">
                            <div class="blog-one__single">
                                <div class="blog-one__img">
                                    <img src="{{ asset('images/' . $blog->image) }}" alt="{{ $blog->title }}" />
                                </div>
                                <div class="blog-one__content">
                                    <div class="blog-one__date">
                                        <p>{{ \Carbon\Carbon::parse($blog->news_date)->format('d') }}</p>
                                        <span>{{ \Carbon\Carbon::parse($blog->news_date)->translatedFormat('M') }}</span>
                                    </div>
                                    <h3 class="blog-one__title">
                                        <a href="#">{{ $blog->title }}</a>
                                    </h3>
                                    <p class="blog-one__text">{{ Str::limit($blog->content, 100) }}</p>
                                    <div class="blog-one__read-more">
                                        <a href="#">Read more <span class="icon-right-arrow"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Blog Loop End -->
                </div>
            </div>
        </section>
        <!-- Blog Two End -->


        <!--Blog Two End-->

        <!--Produk-->
        <section class="products-one">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Produk Kami</span>
                    <h2 class="section-title__title">Beli Produk kecantikan Terbaik</h2>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        <!--Products One Single Start-->
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="products-one__single">
                                <div class="products-one__img-box">
                                    <div class="products-one__img">
                                        <img src="{{ asset('images/' . $product->image) }}"
                                            alt="{{ $product->name }}" />
                                    </div>
                                    <div class="products-one__btn-box">
                                        <a href="{{ route('product.details', ['id' => $product->id]) }}"
                                            class="thm-btn products-one__btn">See Details</a>
                                    </div>
                                </div>
                                <div class="products-one__content">
                                    <h3 class="products-one__name">
                                        <a
                                            href="{{ route('product.details', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                    </h3>
                                    <p class="products-one__price">Rp{{ number_format($product->price, 2) }}</p>
                                    <div class="product__all-review">
                                        @php
                                            $averageRating = $product->reviews->avg('rating') ?? 0;
                                        @endphp
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="fa fa-star{{ $i < $averageRating ? '' : '-o' }}"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Products One Single End-->
                    @endforeach
                </div>
            </div>
        </section>
        <!--Produk End-->


        <section class="cta-one">
            <div class="cta-one__img">
                <img src="{{ asset('images/resources/cta-one-img.jpg') }}" alt="" />

            </div>
            <div class="cta-one__shape-1 float-bob-y">
                <img src="{{ asset('images/shapes/cta-one-shape-1.png') }}" alt="" />

            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="cta-one__left">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Mulai Tertarik?</span>
                                <h2 class="section-title__title">
                                    Coba Layanan Kami Sekarang Juga!
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="cta-one__right">
                            <div class="cta-one__btn-box">
                                <a href="{{ route('service') }}" class="cta-one__btn thm-btn">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
