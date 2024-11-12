@extends('layouts.app')

@section('title', 'Daftar Blog')

@push('style')
    <style>
        //* Header Styling */
        .section-header {
            background-color: #f3c0c7;
            /* Light pink background */
            padding: 20px;
            border-radius: 10px;
        }

        .section-header .section-title {
            font-size: 24px;
            color: #2f2f2f;
            /* Dark color for the title */
            font-weight: bold;
        }

        /* Button Styling */
        .btn-primary-enhanced {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: #f5919d;
            /* Soft pink color for the button */
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 8px;
            box-shadow: 0px 4px 15px rgba(245, 145, 157, 0.3);
            border: none;
            transition: background 0.3s;
            margin-left: 15px;
        }

        .btn-primary-enhanced:hover {
            background: #e77e8f;
            /* Slightly darker pink on hover */
        }

        /* Breadcrumb Styling */
        .section-header .section-header-breadcrumb {
            font-size: 14px;
            color: #f5919d;
            /* Pink color for the breadcrumb */
        }

        .section-header .section-header-breadcrumb .breadcrumb-item a {
            color: #f5919d;
            text-decoration: none;
        }

        .section-header .section-header-breadcrumb .breadcrumb-item.active {
            color: #2f2f2f;
            /* Active breadcrumb color */
        }

        .section-header .section-header-breadcrumb .breadcrumb-item+.breadcrumb-item::before {
            content: " / ";
            color: #f5919d;
            /* Pink separator */
        }


        /* Table Styling */
        .table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        #blogTable thead th {
            background-color: #f0f0f0;
            color: #333;
            font-weight: 600;
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        #blogTable tbody td {
            padding: 12px 15px;
            border-bottom: 1px solid #f2f2f2;
        }

        #blogTable tbody td img {
            width: 80px;
            height: 80px;
            border-radius: 6px;
            object-fit: cover;
            transition: transform 0.2s;
        }

        #blogTable tbody td img:hover {
            transform: scale(1.05);
        }


        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .date-filter-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Filter and Reset Buttons */
        .filter-button {
            padding: 8px 15px;
            font-weight: bold;
            border-radius: 8px;
            background-color: #f5919d;
            color: white;
            border: none;
            cursor: pointer;
        }

        .filter-button:hover {
            background-color: #c8646f;
        }

        .reset-button {
            padding: 8px 15px;
            font-weight: bold;
            border-radius: 8px;
            background-color: #c0c0c0;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
            /* Remove underline */
        }

        .reset-button:hover {
            background-color: #a0a0a0;
        }

        /* Search Box Styling */
        .search-box {
            display: flex;
            align-items: center;
        }

        .search-box input[type="text"] {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
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


        @media screen and (max-width: 768px) {

            /* Header Section */
            .section-header .d-flex {
                flex-wrap: wrap;
                margin-bottom: 20px !important;
            }

            .section-header .d-flex .d-flex {
                width: 100%;
                justify-content: flex-start !important;
            }

            .section-header-breadcrumb {
                display: none;
                /* Hide breadcrumb on mobile for cleaner look */
            }

            /* Filter Section */
            .card-body form.d-flex {
                flex-direction: column;
                gap: 15px;
            }

            .date-filter-group {
                flex-wrap: wrap;
                width: 100%;
            }

            .date-filter-group label {
                width: 100%;
                margin-bottom: 5px;
            }

            .date-filter-group input[type="date"] {
                width: 100%;
                margin-bottom: 10px;
            }

            .filter-button,
            .reset-button {

                margin: 5px 0;
            }

            .search-box {
                width: 100%;
                margin-top: 10px;
            }

            /* Table Responsiveness */
            .table-responsive {
                margin: 0 -15px;
            }

            #blogTable thead th,
            #blogTable tbody td {
                padding: 10px 8px;
                font-size: 14px;
            }

            #blogTable tbody td img {
                width: 60px;
                height: 60px;
            }

            /* Action Buttons */
            .action-buttons {
                flex-direction: column;
                gap: 5px;
            }

            .action-buttons .btn {
                width: 100%;
                margin: 2px 0;
            }

            /* Adjust column visibility for better mobile view */
            #blogTable th:nth-child(4),
            #blogTable td:nth-child(4) {
                display: none;
                /* Hide detail column on mobile */
            }

            /* Title and Add Button */
            .section-header h1 {
                font-size: 20px;
            }

            .btn-primary-enhanced {
                margin-left: 0;
                margin-top: 10px;

                justify-content: center;
            }
        }

        /* Extra Small Devices */
        @media screen and (max-width: 480px) {
            .section-title {
                font-size: 20px;
            }

            .section-lead {
                font-size: 14px;
            }

            #blogTable thead th,
            #blogTable tbody td {
                padding: 8px 5px;
                font-size: 13px;
            }

            #blogTable tbody td img {
                width: 50px;
                height: 50px;
            }

            /* Further reduce visible columns */
            #blogTable th:nth-child(5),
            #blogTable td:nth-child(5) {
                display: none;
                /* Hide date column on very small devices */
            }
        }

        /* Medium Devices */
        @media screen and (min-width: 769px) and (max-width: 1024px) {
            .date-filter-group {
                flex-wrap: nowrap;
            }

            .action-buttons {
                flex-direction: row;
            }

            .btn-primary-enhanced {
                margin-left: 10px;
            }
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header" style="background-color: #fff; padding: 20px; border-radius: 10px;">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <!-- Title and Button on the Left -->
                    <div class="d-flex align-items-center">
                        <h1>Daftar Blog</h1>
                        <a href="{{ route('admin.blogs.create') }}" class="btn-primary-enhanced ml-3">
                            <i class="fas fa-plus"></i> Tambah Blog
                        </a>
                    </div>

                    <!-- Breadcrumb on the Right -->
                    <div class="section-header-breadcrumb" style="color: #2f2f2f;">
                        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}"
                                style="color: #fa6c8d;">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}"
                                style="color: #fa6c8d;">Blog</a></div>
                        <div class="breadcrumb-item">Daftar Blog</div>
                    </div>
                </div>
            </div>


            <div class="section-body">
                <h2 class="section-title">Data Blog</h2>
                <p class="section-lead">
                    Anda bisa melihat, mengedit, menghapus, dan mengelola blog.
                </p>

                <div class="card">
                    <div class="card-header">
                        <h4>Filter Blog</h4>
                    </div>
                    <div class="card-body">
                        <!-- Filter Form -->
                        <form method="GET" action="{{ route('admin.blogs.index') }}"
                            class="d-flex align-items-center justify-content-between mb-3">
                            <!-- Date Filter and Buttons on the Left -->
                            <div class="date-filter-group">
                                <label for="news_date">Tanggal</label>
                                <input type="date" name="news_date" id="news_date" class="form-control"
                                    value="{{ request('news_date') }}">
                                <button type="submit" class="filter-button">Filter</button>
                                <a href="{{ route('admin.blogs.index') }}" class="reset-button">Reset</a>
                            </div>

                            <!-- Search Box on the Right -->
                            <div class="search-box">
                                <input type="text" name="search" class="form-control" placeholder="Cari blog..."
                                    value="{{ request('search') }}">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>Semua Blog</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="blogTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Judul</th>
                                        <th>Detail</th>
                                        <th>Tanggal</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($blogs as $blog)
                                        <tr>
                                            <td>{{ $loop->iteration + ($blogs->currentPage() - 1) * $blogs->perPage() }}
                                            </td>
                                            <td>
                                                <img src="{{ $blog->image ? asset('images/' . $blog->image) : asset('images/default.png') }}"
                                                    alt="{{ $blog->title }}">
                                            </td>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ Str::limit($blog->detail, 20, '...') }}</td>
                                            <td>{{ $blog->news_date }}</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                                        class="btn btn-sm btn-info">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form id="deleteForm{{ $blog->id }}"
                                                        action="{{ route('admin.blogs.destroy', $blog->id) }}"
                                                        method="POST" style="display:inline;"
                                                        onsubmit="confirmDelete(event, '{{ $blog->id }}')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash-alt"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Data Blog tidak tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination Links -->
                        <div class="d-flex justify-content-center mt-3">
                            {{ $blogs->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

