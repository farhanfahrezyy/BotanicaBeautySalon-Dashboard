@extends('layouts.layoutpages') <!-- Meng-extend file layout utama -->

@section('title', 'Products || Botanica') <!-- Mengisi title untuk halaman -->

@push('css')
    <link rel="stylesheet" href="{{ asset('vendors/swiper/swiper.min.css') }}">
@endpush

@section('content')

    <style>
       .fa-star {
            font-size: 24px;
            color: #e4e5e9;
            cursor: pointer;
        }

        .fa-star.active {
            color: #FFD700;
        }


        .product-details__top {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        .product-details__price {
            font-size: 1.2em;
            color: #333;
            margin-top: 5px;
        }

        .product-details__review {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .stars {
            margin-right: 10px;
        }

        .product-details__review-count {
            margin-left: 10px;
            font-size: 0.9em;
            color: #666;
        }
        /* Add padding and separator line between comments */
    </style>

    <div class="page-wrapper">
        <!-- Page Header Start -->
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url('{{ asset('images/backgrounds/page-header-bg-3.jpg') }}');"></div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="">Home</a></li>
                        <li><span>/</span></li>
                        <li>Shop</li>
                    </ul>
                    <h2>Product Details</h2>
                </div>
            </div>
        </section>
        <!-- Page Header End -->

        <!-- Product Details Start -->
        <section class="product-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-xl-6">
                        <div class="product-details__img">
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6">
                        <div class="product-details__top">
                            <h3 class="product-details__title">
                                {{ $product->name }} 
                                <span>Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </h3>
                        </div>

                        <div class="product-details__review">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="fa fa-star{{ $i < round($product->reviews->avg('rating')) ? '' : '-o' }}"></i>
                            @endfor
                            <span>{{ $product->reviews->count() }} Customer Reviews</span>
                        </div>

                        <div class="product-details__content">
                            <p style="text-align: justify;">{{ $product->description }}</p>
                        </div>

                        <div class="product-details__buttons">
                            <button class="thm-btn" id="SeeDetailBtn" onclick="window.location.href='{{ $product->product_link }}'">Lihat Detail</button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- Product Details End -->

        <!-- Review Form Start (Moved to the top before the review list) -->
        <section class="review-form-one">
            <div class="container">
                <div class="review-form-one__inner">
                    <h3 class="review-form-one__title">Add a review</h3>

                    <!-- Alert untuk pesan sukses dan error -->
                    <div id="reviewSuccess" class="alert alert-success" style="display: none;">Review berhasil
                        ditambahkan!
                    </div>
                    <div id="reviewError" class="alert alert-danger" style="display: none;"></div>

                    <!-- Form Review -->
                    <form id="reviewForm">
                        @csrf
                        <div class="review-form-one__rate-box">
                            <p class="review-form-one__rate-text">Rate this Product?</p>
                            <div class="review-form-one__rate" id="starRating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fa fa-star" data-rating="{{ $i }}"></i>
                                @endfor
                            </div>
                            <input type="hidden" name="rating" id="ratingInput" value="0">
                        </div>

                        <div class="review-form-one__input-box text-message-box">
                            <textarea name="review" placeholder="Write a Message" required></textarea>
                        </div>
                        <div class="review-form-one__input-box">
                            <input type="text" placeholder="Your Name" name="name" required />
                        </div>

                        <button type="button" class="thm-btn2 review-form-one__btn" onclick="submitReview()">Submit
                            review</button>
                    </form>

                    <!-- Daftar Review -->
                    <div id="reviewList">
                        <!-- Daftar review terbaru akan ditambahkan di sini -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Review Form End -->

        <!-- Reviews Display Start -->
        @php
            use Carbon\Carbon;
            Carbon::setLocale('id');
        @endphp

        <section class="review-one">
            <div class="container">
                <div class="comments-area">
                    <div class="review-one__title">
                        <h3>{{ $product->reviews->count() }} Reviews</h3>
                    </div>

                    @foreach ($product->reviews as $review)
                        <div class="comment-box">
                            <div class="comment">
                                <div class="review-one__content">
                                    <div class="review-one__content-top">
                                        <div class="info">
                                            <h2>{{ $review->name }}
                                                <span>
                                                    <!-- Format tanggal bahasa Indonesia dengan timezone Asia/Jakarta -->
                                                    @if ($review->created_at->isToday())
                                                        Hari ini,
                                                        {{ $review->created_at->timezone('Asia/Jakarta')->format('H:i') }}
                                                        WIB
                                                    @elseif ($review->created_at->isYesterday())
                                                        Kemarin,
                                                        {{ $review->created_at->timezone('Asia/Jakarta')->format('H:i') }}
                                                        WIB
                                                    @else
                                                        {{ $review->created_at->timezone('Asia/Jakarta')->translatedFormat('d F Y, H:i') }}
                                                        WIB
                                                    @endif
                                                </span>
                                            </h2>
                                        </div>
                                        <div class="reply-btn">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fa fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                                            @endfor
                                        </div>

                                    </div>
                                    <div class="review-one__content-bottom">
                                        <p>{{ $review->review }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div id="review-container"></div>
                </div>
            </div>
        </section>
        <!-- Reviews Display End -->

        <script>
            function validateReview(formData) {
    const errors = [];

    // Get form values
    const rating = formData.get('rating');
    const review = formData.get('review');
    const name = formData.get('name');

    // Validate rating
    if (!rating || rating < 1 || rating > 5) {
        errors.push('Rating harus diisi antara 1-5');
    }

    // Validate review text
    if (!review) {
        errors.push('Review tidak boleh kosong');
    } else if (review.length < 10) {
        errors.push('Review minimal 10 karakter');
    } else if (review.length > 500) {
        errors.push('Review maksimal 500 karakter');
    }

    // Validate name
    if (!name) {
        errors.push('Nama tidak boleh kosong');
    } else if (name.length < 3) {
        errors.push('Nama minimal 3 karakter');
    }

    return errors;
}

// Interaksi klik pada bintang untuk memilih rating
document.querySelectorAll('.review-form-one__rate i').forEach(star => {
    star.addEventListener('click', function() {
        const rating = this.getAttribute('data-rating');
        document.getElementById('ratingInput').value = rating;
        document.querySelectorAll('.review-form-one__rate i').forEach((s, i) => {
            s.classList.toggle('active', i < rating);
        });
    });
});

// Fungsi untuk submit review melalui AJAX
function submitReview() {
    // Ambil data dari form review
    const formData = new FormData(document.querySelector('#reviewForm'));

    // Lakukan validasi
    const validationErrors = validateReview(formData);
    if (validationErrors.length > 0) {
        // Jika ada error, tampilkan pesan error dan hentikan submit
        document.getElementById('reviewError').innerText = validationErrors.join(', ');
        document.getElementById('reviewError').style.display = 'block';
        document.getElementById('reviewSuccess').style.display = 'none';
        return;
    }

    // Kirim permintaan menggunakan fetch jika validasi berhasil
    fetch("{{ route('product.review.store', $product->id) }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            "Content-Type": "application/json"
        },
        body: JSON.stringify(Object.fromEntries(formData.entries()))
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.error) {
            // Tampilkan pesan error
            document.getElementById('reviewError').innerText = Array.isArray(data.error) ? data.error.join(", ") : data.error;
            document.getElementById('reviewError').style.display = 'block';
            document.getElementById('reviewSuccess').style.display = 'none';
        } else {
            document.getElementById('reviewSuccess').style.display = 'block';
            document.getElementById('reviewError').style.display = 'none';

            // Refresh halaman untuk memperbarui daftar review
            window.location.reload();
        }
    })
    .catch(error => {
        // Tangani error jaringan atau parsing JSON
        document.getElementById('reviewError').innerText = 'Terjadi kesalahan. Silakan coba lagi.';
        document.getElementById('reviewError').style.display = 'block';
        document.getElementById('reviewSuccess').style.display = 'none';
    });
}

        </script>

    @endsection

    @push('scripts')
        <script src="{{ asset('vendors/swiper/swiper.min.js') }}"></script>
    @endpush
