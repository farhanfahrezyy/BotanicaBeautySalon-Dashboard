@extends('layouts.app')

@section('title', 'Data Ulasan Produk')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <style>
        /* Custom button style */
        .button-custom {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            color: #fff;
            background-color: #f5919d;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
            text-decoration: none;
        }

        .button-custom:hover {
            background-color: #c8646f;
            transform: translateY(-2px);
            color: #fff;
        }

        /* Table styling */
        .table-borderless {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .table-borderless th,
        .table-borderless td {
            padding: 15px;
            background-color: white;
        }

        .table-borderless th {
            font-weight: bold;
            color: #007bff;
            text-align: left;
            font-size: 16px;
        }

        .table-borderless tbody tr:hover {
            background-color: #f5f5f5;
        }

        /* Badge styles */
        .badge {
            padding: 6px 12px;
            font-size: 0.9em;
            font-weight: bold;
            border-radius: 5px;
        }

        .badge-success {
            background-color: #28a745;
            color: white;
        }

        .badge-warning {
            background-color: #ffc107;
            color: #212529;
        }

        .badge-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.85rem;
        }

        /* Search box styling */
        .search-box {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 15px;
        }

        .search-box input[type="text"] {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            padding: 8px 12px;
            width: 250px;
        }

        .search-box button {
            background-color: #f5919d;
            border: none;
            padding: 8px 12px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .search-box button:hover {
            background-color: #c8646f;
        }

        /* Pagination styling */
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        /* Flex container for filters and search */
        .filter-container {
            display: flex;
            gap: 15px;
            justify-content: flex-start;
            width: 100%;
        }

        .filter-container button {
            margin-top: 0;
        }

        .filter-container select {
            margin-top: 0;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-title">
                    <h1>Daftar Produk Ulasan</h1>

                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Ulasan</a></div>
                    <div class="breadcrumb-item">Daftar Produk Ulasan</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Ulasan Produk</h2>
                <p class="section-lead">Anda bisa melihat dan menghapus</p>



                <!-- Data Table -->
                <div class="card">
                    <div class="card-header">
                        <h4>Semua Ulasan</h4>
                    </div>
                    <!-- Search Box and Filter Form -->


                    <div class="card-body">

                        <div class="float-right">
                            <form method="GET" action="{{ route('admin.products.reviews') }}">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="name"
                                        alue="{{ request('name') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-borderless" id="table-reviews">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Rating</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($productsWithReviews as $index => $product)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>
                                                <span
                                                    class="badge
                                                    @if ($product->reviews_avg_rating >= 4) badge-success
                                                    @elseif($product->reviews_avg_rating >= 3) badge-warning
                                                    @else badge-danger @endif">
                                                    {{ number_format($product->reviews_avg_rating, 1) }}/5
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.reviews.show', $product->id) }}"
                                                    class="button-custom btn-sm">
                                                    Lihat Ulasan
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Belum ada ulasan yang tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mt-3">
                    {{ $productsWithReviews->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
@endpush
