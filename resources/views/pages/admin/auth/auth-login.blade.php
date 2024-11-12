@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Masuk</h4>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success alert-has-icon">
                    {{ session('status') }}
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger alert-has-icon">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" tabindex="1" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" tabindex="2" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-muted mt-5 text-center">
        Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault(); // Prevent form submission for validation
                        var isFormValid = true; // Track the overall form validity

                        // Validate email field
                        var emailField = form.querySelector('#email');
                        if (emailField) {
                            if (!emailField.validity.valid) {
                                setWarning(emailField, 'Silakan masukkan email yang valid.');
                                isFormValid = false;
                            } else {
                                clearWarning(emailField);
                            }
                        }

                        // Validate password field
                        var passwordField = form.querySelector('#password');
                        if (passwordField) {
                            if (passwordField.value.trim() === '') {
                                setWarning(passwordField, 'Silakan masukkan kata sandi.');
                                isFormValid = false;
                            } else if (passwordField.value.trim().length < 6) {
                                setWarning(passwordField,
                                    'Kata sandi harus terdiri dari minimal 6 karakter.');
                                isFormValid = false;
                            } else {
                                clearWarning(passwordField);
                            }
                        }

                        // Check if the user is admin
                        var roleField = form.querySelector('#role');
                        if (roleField && roleField.value !== 'admin') {
                            alert('Akses hanya diperbolehkan untuk admin!');
                            isFormValid = false;
                        }

                        // If the form is valid, allow submission
                        if (isFormValid) {
                            form.submit();
                        }
                    }, false);
                });

                function setWarning(field, message) {
                    // Clear existing warning
                    clearWarning(field);

                    // Create new warning message
                    var warning = field.parentNode.querySelector('.text-warning');
                    if (!warning) {
                        warning = document.createElement('div');
                        warning.className = 'text-warning mt-2'; // Add styling class
                        warning.innerText = message;
                        field.parentNode.appendChild(warning); // Append warning to parent
                    }

                    // Mark field as invalid
                    field.classList.add('is-invalid');
                }

                function clearWarning(field) {
                    if (field) {
                        // Remove 'is-invalid' class
                        field.classList.remove('is-invalid');

                        // Remove any existing warning messages
                        var warning = field.parentNode.querySelector('.text-warning');
                        if (warning) {
                            warning.remove();
                        }
                    }
                }
            }, false);
        })();
    </script>
@endpush
