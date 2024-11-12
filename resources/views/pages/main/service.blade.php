@extends('layouts.layoutpages')

@section('title', 'Services || Botanica')

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
            background-image: url('{{ asset('images/backgrounds/page-header-bg.jpg') }}');
          "></div>
        <div class="container">
          <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
              <li><a href="index.html">Home</a></li>
              <li><span>/</span></li>
              <li>Our Services</li>
            </ul>
            <h2>Our Services</h2>
          </div>
        </div>
      </section>
    <!--Page Header End-->

    <!--Services Page Start-->
    <section class="services-page">
        <div class="container">
            <div class="row">
                @foreach ($services as $index => $service)
                <!-- Services One Single Start -->
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ ($index + 1) * 100 }}ms">
                    <div class="services-one__single">
                        <div class="services-one__single-inner">
                            <div class="services-one__shape-1">
                                <img src="{{ asset('images/shapes/services-one-shape-1.png') }}" alt="">
                            </div>
                            <div class="services-one__shape-2">
                                <img src="{{ asset('images/shapes/services-one-shape-2.png') }}" alt="">
                            </div>
                            <div class="services-one__img-box">
                                <div class="services-one__img">
                                    <img src="{{ asset('images/' . $service->image) }}" alt="{{ $service->title }}">
                                </div>
                                <div class="services-one__icon">
                                    <span class="icon-massage"></span> <!-- Static icon class -->
                                </div>
                            </div>
                            <h3 class="services-one__title">
                                <a href="{{ $service->service_link }}">{{ $service->title }}</a>
                            </h3>
                            <p class="services-one__text">
                                {{ $service->description }}
                            </p>
                            <p class="services-one__price">Harga : Rp{{ $service->price }}</p>
                            <div class="services-one__btn-box">
                                <a href="{{ $service->service_link }}" class="services-one__btn">
                                    Lihat Detail<i class="main-menu__cart icon-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Services One Single End -->
                @endforeach
            </div>
        </div>
    </section>

    <!--Services Page End-->

  </div>

@endsection
