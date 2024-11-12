@extends('layouts.layoutpages')

@section('title', 'Blog || Botanica')

@push('css')
    <style>
        .blog-one__date .date-box {
            background-color: #D98D7F;
            /* Set this to your desired color */
            color: white;
            width: 60px;
            height: 75px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
        }

        .blog-one__date .date-box p {
            font-size: 24px;
            /* Font size for day */
            margin: 0;
            line-height: 1;
        }

        .blog-one__date .date-box span {
            font-size: 12px;
            /* Font size for month */
            text-transform: uppercase;
            margin: 0;
            line-height: 1;
        }
    </style>
@endpush

@section('content')

    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->

    <div class="page-wrapper">

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
            <!-- /.sticky-header__content -->
        </div>
        <!-- /.stricky-header -->

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header__bg"
                style="background-image: url('{{ asset('images/backgrounds/page-header-bg-4.jpg') }}');"></div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span>/</span></li>
                        <li>Blog</li>
                    </ul>
                    <h2>Latest News & Articles</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Blog Section Start-->
        <section class="blog-two">
            <div class="container">
                <div class="row">
                    <!--Blog Item Template Start-->
                    @foreach ($blog as $blog)
                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="{{ 100 * $loop->index }}ms">
                            <div class="blog-one__single">
                                <div class="blog-one__img">
                                    <img src="{{ asset('images/' . $blog->image) }}" alt="{{ $blog->title }}" />
                                </div>

                                <div class="blog-one__content">
                                    <div class="blog-one__date">
                                        <div class="date-box">
                                            <p>{{ \Carbon\Carbon::parse($blog->news_date)->format('d') }}</p>
                                            <span>{{ \Carbon\Carbon::parse($blog->news_date)->translatedFormat('M') }}</span>
                                        </div>
                                    </div>

                                    <h3 class="blog-one__title">
                                        <a href="{{ route('blog.detail', $blog->id) }}">{{ $blog->title }}</a>
                                    </h3>
                                    <p class="blog-one__text">{{ Str::limit($blog->content, 100) }}</p>
                                    <div class="blog-one__read-more">
                                        <a href="#">Read more <span class="icon-right-arrow"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!--Blog Item Template End-->
                </div>
            </div>
        </section>
        <!--Blog Section End-->

    </div>
@endsection
