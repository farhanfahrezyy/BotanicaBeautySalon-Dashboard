@extends('layouts.app')

@section('title', 'Daftar Layanan')

@push('style')
    <style>
        .table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        #serviceTable thead th {
            background-color: #f0f0f0;
            color: #333;
            font-weight: 600;
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        #serviceTable tbody td {
            padding: 12px 15px;
            border-bottom: 1px solid #f2f2f2;
        }

        #serviceTable tbody tr:hover {
            background-color: #fafafa;
            cursor: pointer;
        }

        #serviceTable tbody td img {
            width: 80px;
            height: 80px;
            border-radius: 6px;
            object-fit: cover;
            transition: transform 0.2s;
        }

        #serviceTable tbody td img:hover {
            transform: scale(1.05);
        }

        .section-header-title {
            display: flex;
            align-items: center;
            gap: 10px;
        }

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
        .filter-container {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: flex-start;
            width: 100%;
        }

        .filter-container .form-group {
            margin-bottom: 0;
        }


        @media screen and (max-width: 768px) {

            /* Header Section */
            .section-header {
                flex-wrap: wrap;
                margin-bottom: 20px !important;
            }

            .section-header-title {
                flex-direction: ;
                align-items: flex-start;
                gap: 15px;
                width: 100%;
            }

            .section-header-title h1 {
                font-size: 20px;
                margin-bottom: 0;
            }

            .btn-primary-enhanced {
                margin-top: 10px;
                justify-content: center;
                font-size: 14px;
            }

            .section-header-breadcrumb {
                display: none;
                /* Hide breadcrumb on mobile */
            }

            /* Filter Container */
            .filter-container {
                flex-direction: row;
                flex-wrap: wrap;
                gap: 8px;
                justify-content: flex-start;
            }

            .filter-container .form-group {
                width: auto;
                /* Dropdown menyesuaikan konten */
                margin-right: 5px;
            }

            .filter-container .btn-primary {
                width: auto;
                padding: 6px 12px;
                font-size: 13px;
                height: 35px;
                margin-top: 2px
                    /* Sesuaikan dengan tinggi form lainnya */
            }

            .filter-container .ml-auto {
                width: 100%;
                margin-left: 0 !important;
                max-width: 100% !important;
                order: 1;
                /* Memindahkan search box ke atas */
            }

            .filter-container .input-group {
                width: 100%;
            }



            /* Table Styling */
            .table-responsive {
                margin: 0 -15px;
            }

            #serviceTable {
                font-size: 14px;
            }

            #serviceTable thead th {
                padding: 10px 8px;
            }

            #serviceTable tbody td {
                padding: 8px;
            }

            #serviceTable tbody td img {
                width: 60px;
                height: 60px;
            }

            /* Action Buttons */
            .action-buttons {
                display: flex;
                gap: 5px;
                justify-content: center;
            }

            .action-buttons .btn {
                padding: 4px 8px;
                font-size: 12px;
            }

            .action-buttons .btn i {
                font-size: 12px;
                margin-right: 3px;
            }
        }

        /* Extra Small Devices */
        @media screen and (max-width: 480px) {

            /* Further reduce table elements */
            #serviceTable tbody td img {
                width: 50px;
                height: 50px;
            }

            #serviceTable {
                font-size: 13px;
            }

            /* Stack action buttons vertically on very small screens */
            .action-buttons {
                flex-direction: row;
                gap: 3px;
            }

            .action-buttons .btn {
                padding: 3px 6px;
                font-size: 11px;
            }

            /* Adjust section titles */
            .section-title {
                font-size: 18px;
            }

            .section-lead {
                font-size: 14px;
            }

            /* Hide less important columns */
            #serviceTable th:nth-child(1),
            #serviceTable td:nth-child(1) {
                display: none;
                /* Hide No column */
            }
        }

        /* Tablet Devices */
        @media screen and (min-width: 769px) and (max-width: 1024px) {
            .filter-container {
                flex-wrap: wrap;
            }

            .filter-container .form-group {
                width: auto;
            }

            .filter-container .ml-auto {
                margin-top: 10px;
                width: 100%;
                max-width: 100%;
            }

            .action-buttons {
                flex-direction: row;
                gap: 5px;
            }
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-title">
                    <h1>Daftar Layanan</h1>
                    <a href="{{ route('admin.service.create') }}" class="btn-primary-enhanced">
                        <i class="fas fa-plus"></i> Tambah Layanan
                    </a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Layanan</a></div>
                    <div class="breadcrumb-item">Daftar Layanan</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Layanan</h2>
                <p class="section-lead">Anda bisa melihat, mengedit, menghapus, dan lainnya.</p>

                <div class="card">
                    <div class="card-body">
                        <!-- Filter Form -->
                        <form method="GET" action="{{ route('admin.service.index') }}" class="filter-container mb-3">
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
                                    <input type="text" class="form-control" placeholder="Cari layanan..." name="title"
                                        value="{{ request('title') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table id="serviceTable" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama Layanan</th>
                                        <th>Harga</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($services as $service)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ $service->image ? asset('images/' . $service->image) : asset('images/default.png') }}"
                                                    alt="{{ $service->title }}">
                                            </td>
                                            <td>{{ $service->title }}</td>
                                            <td>Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                                            <td class="text-center">
                                                <div class="action-buttons">
                                                    <a href="{{ route('admin.service.edit', $service->id) }}"
                                                        class="btn btn-info">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form id="deleteForm{{ $service->id }}"
                                                        action="{{ route('admin.service.destroy', $service->id) }}"
                                                        method="POST" style="display:inline;"
                                                        onsubmit="confirmDelete(event, '{{ $service->id }}')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            <i class="fas fa-trash-alt"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Data Layanan tidak tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $services->withQueryString()->links('pagination::bootstrap-4') }}
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
