@extends('layouts.app')

@section('title', 'Data Admin')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">

    <style>
        /* Style for aligning filter form in a single row */
        .filter-form {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
        }

        .filter-form .form-group {
            margin-bottom: 0;
            /* Remove bottom margin for inline display */
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Admin</h1>
                <div class="section-header-button">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Tambah Admin</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Admin</a></div>
                    <div class="breadcrumb-item">Semua Admin</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Data Admin</h2>
                <p class="section-lead">Anda bisa melihat, mengedit, menghapus, dan lainnya.</p>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Semua Admin</h4>
                            </div>
                            <div class="card-body">
                                <form method="GET" action="{{ route('admin.user.index') }}" class="filter-form">
                                    <!-- Pagination Dropdown -->
                                    <div class="form-group">
                                        <select class="form-control selectric" name="pagination">
                                            <option value="10" {{ request('pagination') == 10 ? 'selected' : '' }}>10
                                            </option>
                                            <option value="20" {{ request('pagination') == 20 ? 'selected' : '' }}>20
                                            </option>
                                            <option value="30" {{ request('pagination') == 30 ? 'selected' : '' }}>30
                                            </option>
                                            <option value="40" {{ request('pagination') == 40 ? 'selected' : '' }}>40
                                            </option>
                                        </select>
                                    </div>

                                    <!-- Role Dropdown -->
                                    <div class="form-group">
                                        <select class="form-control selectric" name="role">
                                            <option value="">- Semua Role -</option>
                                            @foreach (['admin', 'user'] as $role)
                                                <option value="{{ $role }}"
                                                    {{ request('role') == $role ? 'selected' : '' }}>{{ ucfirst($role) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Filter Button -->
                                    <button type="submit" class="btn btn-primary">Filter</button>

                                    <!-- Search Box -->
                                    <div class="input-group ml-auto" style="max-width: 300px;">
                                        <input type="text" class="form-control" placeholder="Cari admin..."
                                            name="name" value="{{ request('name') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>

                                <div class="table-responsive mt-3">
                                    <table class="table-striped table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $key => $user)
                                                <tr>
                                                    <td>{{ $users->firstItem() + $key }}</td>
                                                    <!-- Adjust numbering with pagination -->
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href='{{ route('admin.user.edit', $user->id) }}'
                                                                class="btn btn-sm btn-info btn-icon ml-2">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </a>
                                                            <form id="deleteForm{{ $user->id }}"
                                                                action="{{ route('admin.user.destroy', $user->id) }}"
                                                                method="POST" class="ml-2"
                                                                onsubmit="return confirmDelete(event, '{{ $user->id }}')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger btn-icon">
                                                                    <i class="fas fa-trash"></i> Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $users->withQueryString()->links('pagination::bootstrap-4') }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <script>
        function confirmDelete(event, id) {
            if (!confirm("Apakah Anda yakin ingin menghapus admin dengan ID " + id + "?")) {
                event.preventDefault();
            }
        }
    </script>
@endpush
