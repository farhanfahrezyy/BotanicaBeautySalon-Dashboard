@extends('layouts.app')

@section('title', 'Buat Blog')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">

    <style>
        /* Form Layout */
        .form-group {
            margin-bottom: 20px;
        }

        .form-control,
        .file-upload-wrapper {
            border-radius: 8px;
            padding: 15px;
        }

        /* File Upload Section */
        .file-upload-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .file-upload-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 2px dashed #f5919d;
            padding: 30px;
            border-radius: 12px;
            background-color: #faf1f3;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s ease;
            width: 280px;
            height: 300px;
            position: relative;
            overflow: hidden;
        }

        .file-upload-container:hover {
            background-color: #fbe5e9;
        }

        .upload-placeholder,
        .file-size-info {
            color: #f5919d;
            font-size: 1rem;
        }

        .file-size-info {
            font-size: 0.9rem;
            margin-top: 10px;
        }

        /* Image Preview */
        .image-preview-container {
            display: none;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 12px;
            overflow: hidden;
        }

        #image-preview {
            width: 100%;
            height: 100%;
            object-fit: fill;
            border-radius: 8px;
        }

        /* Button Styles */
        .submit-button {
            background-color: #f5919d;
            color: #fff;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0px 4px 15px rgba(245, 145, 157, 0.3);
            margin-top: 20px;
        }

        .submit-button:hover {
            background-color: #e45a63;
            box-shadow: 0px 6px 20px rgba(245, 145, 157, 0.5);
            transform: translateY(-2px);
        }

        /* Styling for the "Pilih Berkas" Button */
        .upload-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            color: #fff;
            background-color: #f5919d;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
            transition: background 0.3s ease, transform 0.3s ease;
            margin-top: 10px;
        }

        .upload-button:hover {
            background-color: #e45a63;
            transform: translateY(-2px);
        }

        #description {
            min-height: 150px;
            padding: 15px;
            border: 1px solid #f5919d;
            border-radius: 8px;
            resize: both;
            overflow: auto;
        }

        /* Custom validation message styling */
        .error-message {
            display: none;
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Buat Blog</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Blog</a></div>
                    <div class="breadcrumb-item">Buat Blog</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Buat Blog Baru</h2>
                <p class="section-lead">Isi detail di bawah ini untuk membuat blog baru.</p>

                <div class="card">
                    <div class="card-header">
                        <h4>Formulir Blog</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="blogForm" action="{{ route('admin.blogs.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Judul Blog -->
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" class="form-control" id="title" name="title" required
                                    maxlength="255">
                                <span class="error-message" id="title-error">Judul blog harus diisi.</span>
                            </div>

                            <!-- Tanggal -->
                            <div class="form-group">
                                <label for="news_date">Tanggal</label>
                                <input type="date" id="news_date" name="news_date" class="form-control datepicker"
                                    required>
                                <span class="error-message" id="news_date-error">Tanggal blog harus diisi.</span>
                            </div>


                            <!-- Detail -->
                            <div class="form-group">
                                <label for="detail">Detail</label>
                                <textarea class="form-control" id="detail" name="detail" rows="3" maxlength="1000" required></textarea>
                                <span class="error-message" id="detail-error">Detail blog harus diisi.</span>
                            </div>

                            <!-- Bagian Unggah Gambar -->
                            <div class="file-upload-wrapper">
                                <div class="file-upload-container" onclick="document.getElementById('image').click()">
                                    <div class="upload-icon" id="upload-icon">
                                        <svg width="50" height="50" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.6599 8.7998C16.5799 5.2598 12.8899 3.5498 9.70993 5.0698C7.80993 5.9598 6.60993 7.7698 6.60993 9.8298C3.64993 10.0598 1.37993 12.5198 1.60993 15.4898C1.82993 18.3498 4.07993 20.4998 6.94993 20.4998H18.3799C21.0799 20.4998 23.3799 18.2098 23.3799 15.5098C23.3799 12.9798 21.3699 10.8598 18.8799 10.5098"
                                                stroke="#f5919d" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M13.9999 12.5L11.3799 15.12L8.75993 12.5" stroke="#f5919d"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M11.3799 15.1198V8.4498" stroke="#f5919d" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <div class="upload-placeholder" id="file-name">Belum ada berkas dipilih!</div>
                                    <div class="file-size-info">Maksimal ukuran file: 20MB. Ukuran yang disarankan:
                                        1080x1080 px.</div>
                                    <div class="file-size-warning" id="file-size-warning"
                                        style="display: none; color: #e45a63;">
                                        Ukuran file terlalu besar. Maksimal 20MB.
                                    </div>
                                    <div class="image-preview-container" id="image-preview-container">
                                        <img id="image-preview" src="#" alt="Pratinjau Gambar">
                                    </div>
                                </div>
                                <input type="file" id="image" name="image" accept="image/*" style="display: none;"
                                    onchange="displayFileName(event)">
                                <button type="button" id="upload-button" class="upload-button"
                                    onclick="document.getElementById('image').click()">Pilih Berkas</button>
                                <span class="error-message" id="image-error">Gambar blog harus diunggah.</span>
                            </div>

                            <!-- Tombol Buat Blog -->
                            <div class="form-group text-right">
                                <button type="submit" class="submit-button">Buat Blog</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Image Preview and File Size Validation -->
    <script>
        function displayFileName(event) {
            const fileInput = event.target;
            const fileName = fileInput.files[0] ? fileInput.files[0].name : "Belum ada berkas dipilih!";
            const fileSizeWarning = document.getElementById('file-size-warning');
            const imagePreviewContainer = document.getElementById('image-preview-container');
            const uploadIcon = document.getElementById('upload-icon');

            if (fileInput.files[0]) {
                const file = fileInput.files[0];
                const fileSizeLimit = 20 * 1024 * 1024; // 20MB
                const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];

                if (validTypes.includes(file.type) && file.size <= fileSizeLimit) {
                    fileSizeWarning.style.display = 'none';
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreviewContainer.style.display = 'flex';
                        document.getElementById('image-preview').src = e.target.result;
                        uploadIcon.style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                } else {
                    fileSizeWarning.style.display = 'block';
                    imagePreviewContainer.style.display = 'none';
                    fileInput.value = ''; // Reset file input
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('blogForm');

            // Menggunakan event 'blur' untuk setiap input guna menampilkan pesan validasi langsung
            form.querySelectorAll('input, textarea').forEach(input => {
                input.addEventListener('blur', function() {
                    validateField(input);
                });
            });

            form.addEventListener('submit', function(event) {
                let isValid = true;

                // Reset semua pesan kesalahan
                document.querySelectorAll('.error-message').forEach(el => {
                    el.style.display = 'none';
                });

                // Memeriksa semua input dan menampilkan pesan kesalahan sesuai
                form.querySelectorAll('input, textarea').forEach(input => {
                    if (!validateField(input)) {
                        isValid = false;
                    }
                });

                // Cegah pengiriman form jika ada input tidak valid
                if (!isValid) {
                    event.preventDefault();
                }
            });
        });

        // Fungsi validasi khusus untuk setiap input
        function validateField(input) {
            if (input.type === "hidden") return true;
            if (!input) {
                console.error("Input element is undefined or null.");
                return false;
            }

            // Check if the input element has an id
            if (!input.id) {
                console.warn("An input element is missing an id attribute:", input);
                return false; // Skip validation for inputs without an id
            }

            const errorSpan = document.getElementById(`${input.id}-error`);
            if (!errorSpan) {
                console.warn(`Error span for input id '${input.id}' not found.`);
                return false; // Skip validation if the error span is missing
            }

            let isValid = true;
            errorSpan.style.display = 'none';
            input.classList.remove('is-invalid');

            try {
                switch (input.type) {
                    case 'text':
                    case 'textarea':
                    case 'date':
                        if (!input.value.trim()) {
                            errorSpan.textContent = "Field ini tidak boleh kosong";
                            isValid = false;
                        }
                        break;

                    case 'file':
                        const file = input.files ? input.files[0] : null;
                        const fileSizeLimit = 20 * 1024 * 1024; // 20MB
                        const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];

                        if (!file) {
                            errorSpan.textContent = "Silakan pilih file";
                            isValid = false;
                        } else if (!validTypes.includes(file.type) || file.size > fileSizeLimit) {
                            errorSpan.textContent = "Tipe file harus JPEG, PNG, GIF, atau SVG, dan ukuran maks 20MB";
                            isValid = false;
                        }
                        break;

                    default:
                        console.warn(`Unknown input type: ${input.type}`);
                        break;
                }

                if (!isValid) {
                    errorSpan.style.display = 'block';
                    input.classList.add('is-invalid');
                }

            } catch (error) {
                console.error("Error in validateField function:", error);
                isValid = false;
            }

            return isValid;
        }
    </script>
@endpush
