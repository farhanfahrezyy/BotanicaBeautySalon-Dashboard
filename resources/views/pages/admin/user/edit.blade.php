@extends('layouts.app')

@section('title', 'Edit Admin')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <style>
        .button-custom {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            color: #fff;
            background-color: #f5919d;
            /* Your specified background color */
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
            margin-top: 10px;
        }

        .button-custom:hover {
            background-color: #e45a63;
            /* Change background on hover */
            transform: translateY(-2px);
            /* Elevate button on hover */
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Edit Admin</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Admin</a></div>
                    <div class="breadcrumb-item">Edit Data Admin</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Admin</h2>
                <p class="section-lead">Ubah data admin dengan mengisi form di bawah ini.</p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Data Admin</h4>
                            </div>

                            <div class="card-body">
                                <!-- Display validation errors -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- End error messages -->

                                <form method="POST" action="{{ route('admin.user.update', $user->id) }}"
                                    class="needs-validation" novalidate>
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                            Lengkap</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="nama_lengkap" class="form-control"
                                                value="{{ old('nama_lengkap', $user->name) }}" required>
                                            <div class="invalid-feedback">Nama lengkap wajib diisi.</div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input id="email" type="email" class="form-control" name="email"
                                                value="{{ old('email', $user->email) }}" required>
                                            <div class="invalid-feedback">Email wajib diisi.</div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="role" class="form-control" required>
                                                <option value="user"
                                                    {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User
                                                </option>
                                                <option value="admin"
                                                    {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin
                                                </option>
                                            </select>
                                            <div class="invalid-feedback">Pilih role pengguna.</div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <div class="col-sm-12 col-md-7 offset-md-3">
                                            <button class="button-custom" type="submit">Simpan Perubahan</button>
                                        </div>
                                    </div>
                                </form>
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
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Page Specific JS File -->
    {{-- <script src="{{ asset('js/page/features-post-create.js') }}"></script> --}}
@endpush
