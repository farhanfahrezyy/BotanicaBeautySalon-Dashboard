@extends('layouts.app')

@section('title', 'Product List')

@push('style')
    <style>
        /* Table Styling Minimalis */
        .table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        #productTable thead th {
            background-color: #f0f0f0;
            color: #333;
            font-weight: 600;
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        #productTable tbody td {
            padding: 12px 15px;
            border-bottom: 1px solid #f2f2f2;
        }

        /* Row Hover Effect */
        #productTable tbody tr:hover {
            background-color: #fafafa;
            cursor: pointer;
        }

        /* Product Image Styling */
        #productTable tbody td img {
            width: 80px;
            height: 80px;
            border-radius: 6px;
            object-fit: cover;
            transition: transform 0.2s;
        }

        #productTable tbody td img:hover {
            transform: scale(1.05);
        }

        .section-header-title {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Enhanced Add Product Button */
        .btn-primary-enhanced {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: #f5919d;
            box-shadow: 0px 4px 15px rgba(245, 145, 157, 0.3);
            border: none;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 10px;
        }

        .btn-primary-enhanced i {
            font-size: 16px;
        }

        .btn-primary-enhanced:hover {
            background: #c8646f;
            text-decoration: none !important;
            color: white !important;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Align filter options in a row */
        /* Filter container styling */
.filter-container {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
    justify-content: flex-start;
    width: 100%;
    margin: 20px 0;
    padding: 15px 0;
}

/* Form group base styling */
.filter-container .form-group {
    margin-bottom: 0;
    min-width: 150px;
}

/* Search container styling */
.filter-container .ml-auto {
    flex: 1;
    max-width: 400px;
    margin-left: auto;
}

/* Search input group */
.filter-container .input-group {
    width: 100%;
}

/* Search input field */
.filter-container .input-group input.form-control {
    height: 42px;
    border-radius: 4px 0 0 4px;
    border: 1px solid #e4e6fc;
    padding: 0 15px;
}

/* Search button */
.filter-container .input-group .input-group-append .btn {
    height: 42px;
    padding: 0 20px;
    background: #f5919d;
    border: none;
    border-radius: 0 4px 4px 0;
}

/* Select box styling */
.filter-container select.form-control {
    height: 42px;
    min-width: 120px;
    padding: 0 15px;
    border: 1px solid #e4e6fc;
    border-radius: 4px;
}

/* Filter button */
.filter-container .btn-primary {
    height: 42px;
    padding: 0 20px;
    background: #f5919d;
    border: none;
    border-radius: 4px;
}

/* Hover states */
.filter-container .btn:hover {
    background: #c8646f;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-title">
                    <h1>Daftar Produk</h1>
                    <a href="{{ route('admin.products.create') }}" class="btn-primary-enhanced">
                        <i class="fas fa-plus"></i> Tambah Produk
                    </a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Produk</a></div>
                    <div class="breadcrumb-item">Daftar Produk</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Produk</h2>
                <p class="section-lead">Anda bisa melihat, mengedit, menghapus, dan lainnya.</p>

                <div class="card">
                    <div class="card-body">
                        <!-- Filter Form -->
                        <form method="GET" action="{{ route('admin.products.index') }}" class="filter-container mb-3">
                            <!-- Pagination Dropdown -->
                            <div class="form-group">
                                <select class="form-control selectric" name="pagination">
                                    <option value="10" {{ request('pagination') == 10 ? 'selected' : '' }}>10</option>
                                    <option value="20" {{ request('pagination') == 20 ? 'selected' : '' }}>20</option>
                                    <option value="30" {{ request('pagination') == 30 ? 'selected' : '' }}>30</option>
                                    <option value="40" {{ request('pagination') == 40 ? 'selected' : '' }}>40</option>
                                </select>
                            </div>

                            <!-- Sorting Dropdown for Price -->
                            <div class="form-group">
                                <select class="form-control selectric" name="sort">
                                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Harga Terendah
                                    </option>
                                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Harga Tertinggi
                                    </option>
                                </select>
                            </div>

                            <!-- Filter Button -->
                            <button type="submit" class="btn btn-primary">Filter</button>

                            <!-- Search Box aligned to the right -->
                            <div class="ml-auto" style="max-width: 300px;">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Cari produk..." name="name"
                                        value="{{ request('name') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table id="productTable" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ $product->image ? asset('images/' . $product->image) : asset('images/default.png') }}"
                                                    alt="{{ $product->name }}">
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category ? $product->category->category : 'none' }}</td>
                                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                            <td class="text-center">
                                                <div class="action-buttons">
                                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                                        class="btn btn-info">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form id="deleteForm{{ $product->id }}"
                                                        action="{{ route('admin.products.destroy', $product->id) }}"
                                                        method="POST" style="display:inline;"
                                                        onsubmit="confirmDelete(event, '{{ $product->id }}')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash-alt"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Data produk tidak tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination with Bootstrap 4 -->
                        <div class="d-flex justify-content-center mt-3">
                            {{ $products->withQueryString()->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


