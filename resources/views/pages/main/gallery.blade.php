@extends('layouts.layoutpages')

@section('title', 'Gallery || Botanica')

@section('content')
<div class="page-wrapper">
    <div class="stricky-header stricked-menu main-menu">
      <div class="sticky-header__content"></div>
      <!-- /.sticky-header__content -->
    </div>
    <!-- /.stricky-header -->

    <!--Page Header Start-->
    <section class="page-header">
        <div
          class="page-header__bg"
          style="
            background-image: url('{{ asset('images/backgrounds/page-header-bg-2.jpg') }}');
          "></div>
        <div class="container">
          <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
              <li><a href="index.html">Home</a></li>
              <li><span>/</span></li>
              <li>Gallery</li>
            </ul>
            <h2>Gallery</h2>
          </div>
        </div>
      </section>
      <!--Page Header End-->

    <!--Gallery Page Start-->
    <section class="gallery-page">
      <div class="container">
        <div class="row masonary-layout">
          <!--Gallery Page Single Start-->
          <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="gallery-page__single">
              <div class="gallery-page__img">
                <img
                  src="{{ asset('images/gallery/gallery-page-1-1.jpg') }}"
                  alt="" />
                <div class="gallery-page__icon">
                  <a
                    class="img-popup"
                    href="{{ asset('images/gallery/gallery-page-1-1.jpg') }}"
                    ><span class="fa fa-plus"></span
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <!--Gallery Page Single End-->
          <!--Gallery Page Single Start-->
          <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="gallery-page__single">
              <div class="gallery-page__img">
                <img
                  src="{{ asset('images/gallery/gallery-page-1-2.jpg') }}"
                  alt="" />
                <div class="gallery-page__icon">
                  <a
                    class="img-popup"
                    href="{{ asset('images/gallery/gallery-page-1-2.jpg') }}"
                    ><span class="fa fa-plus"></span
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <!--Gallery Page Single End-->
          <!--Gallery Page Single Start-->
          <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="gallery-page__single">
              <div class="gallery-page__img">
                <img
                  src="{{ asset('images/gallery/gallery-page-1-3.jpg') }}"
                  alt="" />
                <div class="gallery-page__icon">
                  <a
                    class="img-popup"
                    href="{{ asset('images/gallery/gallery-page-1-3.jpg') }}"
                    ><span class="fa fa-plus"></span
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <!--Gallery Page Single End-->
          <!--Gallery Page Single Start-->
          <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="gallery-page__single">
              <div class="gallery-page__img">
                <img
                  src="{{ asset('images/gallery/gallery-page-1-4.jpg') }}"
                  alt="" />
                <div class="gallery-page__icon">
                  <a
                    class="img-popup"
                    href="{{ asset('images/gallery/gallery-page-1-4.jpg') }}"
                    ><span class="fa fa-plus"></span
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <!--Gallery Page Single End-->
          <!--Gallery Page Single Start-->
          <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="gallery-page__single">
              <div class="gallery-page__img">
                <img
                  src="{{ asset('images/gallery/gallery-page-1-5.jpg') }}"
                  alt="" />
                <div class="gallery-page__icon">
                  <a
                    class="img-popup"
                    href="{{ asset('images/gallery/gallery-page-1-5.jpg') }}"
                    ><span class="fa fa-plus"></span
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <!--Gallery Page Single End-->
          <!--Gallery Page Single Start-->
          <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="gallery-page__single">
              <div class="gallery-page__img">
                <img
                  src="{{ asset('images/gallery/gallery-page-1-6.jpg') }}"
                  alt="" />
                <div class="gallery-page__icon">
                  <a
                    class="img-popup"
                    href="{{ asset('images/gallery/gallery-page-1-6.jpg') }}"
                    ><span class="fa fa-plus"></span
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <!--Gallery Page Single End-->
          <!--Gallery Page Single Start-->
          <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="gallery-page__single">
              <div class="gallery-page__img">
                <img
                  src="{{ asset('images/gallery/gallery-page-1-7.jpg') }}"
                  alt="" />
                <div class="gallery-page__icon">
                  <a
                    class="img-popup"
                    href="{{ asset('images/gallery/gallery-page-1-7.jpg') }}"
                    ><span class="fa fa-plus"></span
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <!--Gallery Page Single End-->
          <!--Gallery Page Single Start-->
          <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="gallery-page__single">
              <div class="gallery-page__img">
                <img
                  src="{{ asset('images/gallery/gallery-page-1-10.jpg') }}"
                  alt="" />
                <div class="gallery-page__icon">
                  <a
                    class="img-popup"
                    href="{{ asset('images/gallery/gallery-page-1-10.jpg') }}"
                    ><span class="fa fa-plus"></span
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <!--Gallery Page Single End-->
          <!--Gallery Page Single Start-->
          <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="gallery-page__single">
              <div class="gallery-page__img">
                <img
                  src="{{ asset('images/gallery/gallery-page-1-8.jpg') }}"
                  alt="" />
                <div class="gallery-page__icon">
                  <a
                    class="img-popup"
                    href="{{ asset('images/gallery/gallery-page-1-8.jpg') }}"
                    ><span class="fa fa-plus"></span
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <!--Gallery Page Single End-->
          <!--Gallery Page Single Start-->
          <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="gallery-page__single">
              <div class="gallery-page__img">
                <img
                  src="{{ asset('images/gallery/gallery-page-1-9.jpg') }}"
                  alt="" />
                <div class="gallery-page__icon">
                  <a
                    class="img-popup"
                    href="{{ asset('images/gallery/gallery-page-1-9.jpg') }}"
                    ><span class="fa fa-plus"></span
                  ></a>
                </div>
              </div>
            </div>
          </div>
          <!--Gallery Page Single End-->
        </div>
      </div>
    </section>
    <!--Gallery Page End-->

    <div class="section-title text-center">
        <span class="section-title__tagline">Testimonial</span>
        <h2 class="section-title__title">Kata Mereka</h2>
      </div>

      <!--Client Stories Start-->
      <section class="client-stories">
        <div class="container">
          <div class="row">
            <!--Client Stories Single Start-->
            <div class="col-xl-6 col-lg-6 col-md-6">
              <div class="client-stories__single">
                <div class="client-stories__img-box">
                  <div class="client-stories__img">
                    <img
                      src="{{ asset('images/resources/client-stories-img-1.jpg') }}"
                      alt="" />
                  </div>
                  <div class="client-stories__quote">
                    <span class="fa fa-quote-left"></span>
                  </div>
                </div>
                <div class="client-stories__inner">
                  <div class="client-stories__shape-1">
                    <img
                      src="{{ asset('images/shapes/client-stories-shape-1.png') }}"
                      alt="" />
                  </div>
                  <div class="client-stories__name-and-date">
                    <h3 class="client-stories__name">Yustia Andriyani</h3>
                    <p class="client-stories__date">20 / 10 / 2024</p>
                  </div>
                  <p class="client-stories__text">
                    Layanan ini sangat ramah, Anda tidak akan kecewa jika menghabiskan waktu di sini, karena tempatnya sangat nyaman, dan harganya ramah untuk pelajar.
                  </p>
                </div>
              </div>
            </div>
            <!--Client Stories Single End-->
            <!--Client Stories Single Start-->
            <div class="col-xl-6 col-lg-6 col-md-6">
              <div class="client-stories__single">
                <div class="client-stories__img-box">
                  <div class="client-stories__img">
                    <img
                      src="{{ asset('images/resources/client-stories-img-2.jpg') }}"
                      alt="" />
                  </div>
                  <div class="client-stories__quote">
                    <span class="fa fa-quote-left"></span>
                  </div>
                </div>
                <div class="client-stories__inner">
                  <div class="client-stories__shape-1">
                    <img
                      src="{{ asset('images/shapes/client-stories-shape-1.png') }}"
                      alt="" />
                  </div>
                  <div class="client-stories__name-and-date">
                    <h3 class="client-stories__name">Resti Kharisma</h3>
                    <p class="client-stories__date">15 / 1 / 2024</p>
                  </div>
                  <p class="client-stories__text">
                    Anda tidak akan menyesal jika melakukan perawatan di sini... harganya sangat terjangkau, sistemnya privat, dan sangat cocok untuk pelajar.
                  </p>
                </div>
              </div>
            </div>
            <!--Client Stories Single End-->
            <!--Client Stories Single Start-->
            <div class="col-xl-6 col-lg-6 col-md-6">
              <div class="client-stories__single">
                <div class="client-stories__img-box">
                  <div class="client-stories__img">
                    <img
                      src="{{ asset('images/resources/client-stories-img-3.jpg') }}"
                      alt="" />
                  </div>
                  <div class="client-stories__quote">
                    <span class="fa fa-quote-left"></span>
                  </div>
                </div>
                <div class="client-stories__inner">
                  <div class="client-stories__shape-1">
                    <img
                      src="{{ asset('images/shapes/client-stories-shape-1.png') }}"
                      alt="" />
                  </div>
                  <div class="client-stories__name-and-date">
                    <h3 class="client-stories__name">Agatha Petrichia</h3>
                    <p class="client-stories__date">24 / 11 / 2023</p>
                  </div>
                  <p class="client-stories__text">
                    Luar biasa, para wanita di sini sangat ramah, cocok untuk pelajar atau kelompok lainnya, khusus wanita, yang paling penting, alur dari reservasi hingga selesai sangat memuaskan.
                  </p>
                </div>
              </div>
            </div>
            <!--Client Stories Single End-->
            <!--Client Stories Single Start-->
            <div class="col-xl-6 col-lg-6 col-md-6">
              <div class="client-stories__single">
                <div class="client-stories__img-box">
                  <div class="client-stories__img">
                    <img
                      src="{{ asset('images/resources/client-stories-img-4.jpg') }}"
                      alt="" />
                  </div>
                  <div class="client-stories__quote">
                    <span class="fa fa-quote-left"></span>
                  </div>
                </div>
                <div class="client-stories__inner">
                  <div class="client-stories__shape-1">
                    <img
                      src="{{ asset('images/shapes/client-stories-shape-1.png') }}"
                      alt="" />
                  </div>
                  <div class="client-stories__name-and-date">
                    <h3 class="client-stories__name">Adelia Angelina Hafidzah</h3>
                    <p class="client-stories__date">6 / 9 / 2023</p>
                  </div>
                  <p class="client-stories__text">
                    Layanan dan harga terbaik, tempatnya juga bersih, super nyaman, Anda harus mencoba pijatnya! Terima kasih Botanica Beauty.
                  </p>
                </div>
              </div>
            </div>
            <!--Client Stories Single End-->
            <!--Client Stories Single Start-->
            <div class="col-xl-6 col-lg-6 col-md-6">
              <div class="client-stories__single">
                <div class="client-stories__img-box">
                  <div class="client-stories__img">
                    <img
                      src="{{ asset('images/resources/client-stories-img-5.jpg') }}"
                      alt="" />
                  </div>
                  <div class="client-stories__quote">
                    <span class="fa fa-quote-left"></span>
                  </div>
                </div>
                <div class="client-stories__inner">
                  <div class="client-stories__shape-1">
                    <img
                      src="{{ asset('images/shapes/client-stories-shape-1.png') }}"
                      alt="" />
                  </div>
                  <div class="client-stories__name-and-date">
                    <h3 class="client-stories__name">Koki Nara </h3>
                    <p class="client-stories__date">26 / 10 / 2023</p>
                  </div>
                  <p class="client-stories__text">
                    Sangat nyaman dan homey! Cocok untuk orang yang ingin perawatan rutin tanpa menguras dompet. Terjangkau, tempatnya juga bersih.
                  </p>
                </div>
              </div>
            </div>
            <!--Client Stories Single End-->
            <!--Client Stories Single Start-->
            <div class="col-xl-6 col-lg-6 col-md-6">
              <div class="client-stories__single">
                <div class="client-stories__img-box">
                  <div class="client-stories__img">
                    <img
                      src="{{ asset('images/resources/client-stories-img-6.jpg') }}"
                      alt="" />
                  </div>
                  <div class="client-stories__quote">
                    <span class="fa fa-quote-left"></span>
                  </div>
                </div>
                <div class="client-stories__inner">
                  <div class="client-stories__shape-1">
                    <img
                      src="{{ asset('images/shapes/client-stories-shape-1.png') }}"
                      alt="" />
                  </div>
                  <div class="client-stories__name-and-date">
                    <h3 class="client-stories__name">Ade Savitri</h3>
                    <p class="client-stories__date">10 / 5 / 2024</p>
                  </div>
                  <p class="client-stories__text">
                    Tempatnya sangat nyaman ,kaka2 nya sangat ramah ,strategis ,Treatmentnya pun sangat memuaskan ...💕
                  </p>
                </div>
              </div>
            </div>
            <!--Client Stories Single End-->
          </div>
        </div>
      </section>
      <!--Client Stories End-->
  </div>
@endsection
