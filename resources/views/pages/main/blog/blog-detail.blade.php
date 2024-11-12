@extends('layouts.layoutpages')

@section('title', 'Blog Detail || Botanica')

@section('content')
    <div class="page-wrapper">

        <!-- Sticky Header -->
        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
        </div>

        <!-- Page Header Start -->
        <section class="page-header">
            <div class="page-header__bg"
                style="background-image: url({{ asset('images/backgrounds/page-header-bg-4.jpg') }});"></div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><span>/</span></li>
                        <li>Blog</li>
                    </ul>
                    <h2>{{ $blog->title }}</h2>
                </div>
            </div>
        </section>
        <!-- Page Header End -->

        <!-- Blog Detail Section Start -->
        <section class="client-issues">
            <div class="container">
                <div class="row">
                    <!-- Blog Image -->
                    <div class="col-xl-6 col-lg-6">
                        <div class="client-issues__left">
                            <div class="client-issues__img-box">
                                <div class="client-issues__img">
                                    <img src="{{ asset('images/' . $blog->image) }}" alt="{{ $blog->title }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Content -->
                    <div class="col-xl-6 col-lg-6">
                        <div class="client-issues__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Blog Details</span>
                                <h2 class="section-title__title">{{ $blog->title }}</h2>
                            </div>
                            <p class="client-issues__text" style="text-align: justify;">
                                {{ $blog->detail }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Detail Section End -->

    </div>
@endsection
