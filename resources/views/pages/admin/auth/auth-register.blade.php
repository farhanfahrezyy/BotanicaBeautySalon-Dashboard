@extends('layouts.auth')

@section('title', 'Register')

@push('style')
    <style>
        .error-feedback {
            color: #dc3545;
            font-size: 14px;
            margin-top: 4px;
            display: block;
            position: relative;
            padding-left: 20px;
        }

        .error-feedback::before {
            content: "!";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 14px;
            height: 14px;
            background-color: #dc3545;
            border-radius: 50%;
            color: white;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        .input-group.is-invalid .input-group-text {
            border-color: #dc3545;
        }

        .login-link {
            font-size: 14px;
            color: #F5919D;
            text-decoration: none;
            font-family: "Segoe UI", Arial, sans-serif;
            font-weight: bold;
        }

        .login-link:hover {
            text-decoration: underline;
            color: #d4727c;
        }
    </style>
@endpush

@section('main')
    {{-- Rest of the form HTML remains the same --}}
    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.register') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-12">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input id="nama_lengkap" type="text"
                            class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap"
                            value="{{ old('nama_lengkap') }}" autofocus>
                        @error('nama_lengkap')
                            <div class="error-feedback">Nama lengkap wajib diisi.</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="error-feedback">Email sudah digunakan atau tidak valid.</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="d-block">Password</label>
                    <div class="input-group @error('password') is-invalid @enderror">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input id="password" type="password"
                            class="form-control pwstrength @error('password') is-invalid @enderror" name="password">
                    </div>
                    @error('password')
                        <div class="error-feedback">Password minimal 6 karakter.</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password2" class="d-block">Konfirmasi Password</label>
                    <div class="input-group @error('password_confirmation') is-invalid @enderror">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input id="password2" type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation">
                    </div>
                    @error('password_confirmation')
                        <div class="error-feedback">Konfirmasi password tidak cocok.</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Daftar</button>
                </div>

                <div class="form-group text-center">
                    <a href="{{ route('login') }}" class="login-link">Kembali ke Login</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const namaLengkap = document.querySelector('#nama_lengkap');
            const email = document.querySelector('#email');
            const password = document.querySelector('#password');
            const password2 = document.querySelector('#password2');

            form.addEventListener('submit', function(event) {
                let isValid = true;
                clearWarnings();

                if (namaLengkap.value.trim() === '') {
                    showWarning(namaLengkap, 'Nama lengkap wajib diisi.');
                    isValid = false;
                }

                if (!validateEmail(email.value)) {
                    showWarning(email, 'Email tidak valid.');
                    isValid = false;
                }

                if (password.value.trim().length < 6) {
                    showWarning(password.closest('.input-group'), 'Password minimal 6 karakter.');
                    isValid = false;
                }

                if (password.value !== password2.value) {
                    showWarning(password2.closest('.input-group'), 'Konfirmasi password tidak cocok.');
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });

            function showWarning(field, message) {
                field.classList.add('is-invalid');
                const warning = document.createElement('div');
                warning.className = 'error-feedback';
                warning.innerText = message;

                if (field.classList.contains('input-group')) {
                    field.after(warning);
                } else {
                    field.parentNode.appendChild(warning);
                }
            }

            function clearWarnings() {
                document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                document.querySelectorAll('.error-feedback').forEach(el => el.remove());
            }

            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }
        });
    </script>
@endpush
