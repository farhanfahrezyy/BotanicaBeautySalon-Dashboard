@extends('layouts.layoutpages')

@section('title', 'Products || Botanica')

@push('css')
    <style>

        .pagination .page-link {
            color: #de968d;
            /* Warna teks */
            border-color: #de968d;
            /* Warna border */
        }

        .pagination .page-item.active .page-link {
            background-color: #de968d;
            /* Warna background tombol aktif */
            color: white;
            /* Warna teks untuk tombol aktif */
            border-color: #de968d;
        }

        .pagination .page-link:hover {
            background-color: #f3d3c2;
            /* Warna saat di-hover */
            color: #de968d;
            border-color: #de968d;
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
        </div>

         <!--Page Header Start-->
      <section class="page-header">
        <div
          class="page-header__bg"
          style="
            background-image: url('{{ asset('images/backgrounds/page-header-bg-3.jpg') }}');
          "></div>
        <div class="container">
          <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li><span>/</span></li>
              <li>Shop</li>
            </ul>
            <h2>All Products</h2>
          </div>
        </div>
      </section>
      <!--Page Header End-->

        <!-- Product Section Start -->
        <section class="product">
            <div class="container">
                <div class="row">
                    <!-- Sidebar Start -->
                    <div class="col-xl-3 col-lg-3">
                        <div class="product__sidebar">
                            <div class="shop-search product__sidebar-single">
                                <form action="{{ route('product.search') }}" method="GET">
                                    <input type="text" placeholder="Search" name="query" value="{{ request('query') }}" />
                                </form>
                            </div>
                            <div class="shop-category product__sidebar-single">
                                <h3 class="product__sidebar-title">Categories</h3>
                                <ul class="list-unstyled">
                                    {{-- All Products Link --}}
                                    <li class="{{ request()->routeIs('product.cactalog') ? 'active' : '' }}">
                                        <a href="{{ route('product.catalog') }}" class="nav-link">
                                            All Products
                                        </a>
                                    </li>

                                    {{-- Category Links --}}
                                    @foreach($categories as $category)
                                        <li class="{{ request()->route('category') === $category->category ? 'active' : '' }}">
                                            <a href="{{ route('product.category', ['category' => $category->category]) }}" class="nav-link">
                                                {{ ucfirst($category->category) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar End -->

                    <!-- Product List Start -->
                    <div class="col-xl-9 col-lg-9">
                        <div class="product__items">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="product__showing-result">
                                        <div class="product__showing-text-box">
                                            <p class="product__showing-text">
                                                Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} Results
                                            </p>
                                        </div>

                                        <div class="product__showing-sort">
                                            <label for="sort-select">Sort by:</label>
                                            <select class="selectpicker" id="sort-select" aria-label="Default select example"
                                                    onchange="window.location.href='?sort='+this.value;">
                                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>
                                                    Sort by popular
                                                </option>
                                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                                                    Sort by price: low to high
                                                </option>
                                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                                                    Sort by price: high to low
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Cards Start -->
                            <div class="product__all">
                                <div class="row">
                                    @forelse ($products as $product)
                                        <div class="col-xl-4 col-lg-4 col-md-6">
                                            <div class="product__all-single">
                                                <div class="product__all-img">
                                                    <img src="{{ asset('images/' . $product->image) }}"
                                                        alt="{{ $product->name }}"
                                                         />
                                                    <div class="product__all-btn-box">
                                                        <a href="{{ route('product.details', ['id' => $product->id]) }}"
                                                            class="thm-btn product__all-btn">See Details</a>
                                                    </div>
                                                </div>
                                                <div class="product__all-content">
                                                    <h4 class="product__all-title">
                                                        <a
                                                            href="{{ url('product.details/' . $product->id) }}">{{ $product->name }}</a>
                                                    </h4>
                                                    <p class="product__all-price">Rp
                                                        {{ number_format($product->price, 2) }}</p>
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
                                    @empty
                                        <div class="col-12">
                                            <p>No products found.</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <!-- Product Cards End -->

                            <!-- Pagination Start -->
                            <!-- Pagination Dinamis dengan Laravel -->
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    {{ $products->links('vendor.pagination.bootstrap-5') }}
                                </ul>
                            </nav>

                            <!-- Pagination End -->
                        </div>
                    </div>
                    <!-- Product List End -->
                </div>
            </div>
        </section>
        <!-- Product Section End -->
    </div>


   ->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>
@endsection

@push('scripts')
<script src="{{ asset('vendors/swiper/swiper.min.js') }}"></script>

    <!-- Jika ada JS spesifik untuk halaman ini -->

    </script>



@endpush
