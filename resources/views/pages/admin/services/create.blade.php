@extends('layouts.app')

@section('title', 'Buat Service')

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <style>
        /* Custom styling for the form */
        .form-control.is-invalid {
            border-color: #dc3545;
            padding-right: calc(1.5em + 0.75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

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

        .upload-icon {
            font-size: 48px;
            color: #f5919d;
            margin-bottom: 10px;
        }

        .upload-placeholder {
            font-size: 1rem;
            color: #f5919d;
        }

        .file-size-info {
            font-size: 0.9rem;
            color: #f5919d;
            margin-top: 10px;
        }

        #image {
            display: none;
        }

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

        #upload-button {
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

        #upload-button:hover {
            background-color: #e45a63;
            transform: translateY(-2px);
        }

        .file-size-warning {
            display: none;
            color: #e45a63;
            margin-top: 5px;
            font-size: 0.9rem;
        }

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

        .choices__inner {
            background-color: #faf1f3;
            border: 1px solid #f5919d;
            border-radius: 8px;
            color: #333;
            padding: 10px 15px;
            position: relative;
        }

        .choices__placeholder {
            color: #f5919d;
            opacity: 0.8;
        }

        .choices__list--dropdown .choices__item--selectable:hover {
            background-color: #f5919d;
            color: #ffffff;
        }

        #description {
            min-height: 150px;
            padding: 15px;
            border: 1px solid #f5919d;
            border-radius: 8px;
            resize: both;
            overflow: auto;
        }

        #name,
        #price {
            padding: 15px;
            border: 1px solid #f5919d;
            border-radius: 8px;
        }

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
                    <a href="{{ route('admin.service.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Buat Layanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Service</a></div>
                    <div class="breadcrumb-item">Buat Service</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Buat Service Baru</h2>
                <p class="section-lead">Isi detail di bawah ini untuk menambahkan service baru.</p>

                <div class="card">
                    <div class="card-header">
                        <h4>Formulir Service</h4>
                    </div>
                    <div class="card-body">
                        <form id="serviceForm" action="{{ route('admin.service.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Nama Service -->
                            <div class="form-group">
                                <label for="name">Nama Service</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                    maxlength="255" pattern="^[A-Za-z0-9\s]+$" title="Gunakan hanya huruf dan angka.">
                                <span class="error-message" id="name-error">Nama service harus diisi.</span>
                            </div>

                            <!-- Harga -->
                            <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control" id="price" name="price" required
                                    min="0">
                                <span class="error-message" id="price-error">Harga service harus diisi.</span>
                            </div>

                            <!-- Deskripsi -->
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" rows="3" maxlength="1000" required></textarea>
                                <span class="error-message" id="description-error">Deskripsi service harus diisi.</span>
                            </div>

                            <!-- Link Service -->
                            <div class="form-group">
                                <label for="service_link">Service Link</label>
                                <input type="url" class="form-control" id="service_link" name="service_link"
                                    placeholder="https://example.com/service" required pattern="https?://.+">
                                <span class="error-message" id="service_link-error">Link harus valid, dimulai dengan http
                                    atau https.</span>
                            </div>

                            <!-- Bagian Unggah Berkas -->
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
                                    <div class="file-size-warning" id="file-size-warning">Ukuran file terlalu besar.
                                        Maksimal 20MB.</div>
                                    <div class="image-preview-container" id="image-preview-container">
                                        <img id="image-preview" src="#" alt="Pratinjau Gambar">
                                    </div>
                                </div>
                                <input type="file" id="image" name="image" accept="image/*"
                                    onchange="displayFileName(event)">
                                <span class="error-message" id="image-error">Gambar service harus diunggah.</span>
                                <button type="button" id="upload-button"
                                    onclick="document.getElementById('image').click()">Pilih Berkas</button>
                            </div>

                            <!-- Tombol Buat Service -->
                            <div class="form-group text-right">
                                <button type="submit" class="submit-button">Buat Service</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('serviceForm');
            const REQUIRED_FIELDS = ['name', 'price', 'description', 'image', 'service_link'];

            form.addEventListener('submit', function(event) {
                let isValid = true;
                REQUIRED_FIELDS.forEach(fieldId => {
                    const input = document.getElementById(fieldId);
                    if (!validateField(input)) {
                        isValid = false;
                    }
                });
                if (!isValid) {
                    event.preventDefault();
                    const firstError = document.querySelector('.is-invalid');
                    if (firstError) {
                        firstError.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                }
            });

            REQUIRED_FIELDS.forEach(fieldId => {
                const input = document.getElementById(fieldId);
                if (input) {
                    input.addEventListener('blur', () => validateField(input));
                }
            });

            const ERROR_MESSAGES = {
                file: 'Silakan pilih file',
                text: 'Field ini tidak boleh kosong',
                url: 'URL tidak valid, mulai dengan http atau https'
            };

            function validateField(input) {
                const errorSpan = document.getElementById(`${input.id}-error`);
                if (!errorSpan) return false;

                errorSpan.style.display = 'none';
                input.classList.remove('is-invalid');

                let isValid = true;
                let errorMessage = '';

                switch (true) {
                    case input.type === 'file' && (!input.files || input.files.length === 0):
                        isValid = false;
                        errorMessage = ERROR_MESSAGES.file;
                        break;

                    case input.type === 'url' && !/https?:\/\/.+/i.test(input.value):
                        isValid = false;
                        errorMessage = ERROR_MESSAGES.url;
                        break;

                    default:
                        if (!input.value.trim()) {
                            isValid = false;
                            errorMessage = ERROR_MESSAGES.text;
                        }
                        break;
                }

                if (!isValid) {
                    errorSpan.textContent = errorMessage;
                    errorSpan.style.display = 'block';
                    input.classList.add('is-invalid');
                }

                return isValid;
            }
        });

        function displayFileName(event) {
            const MAX_FILE_SIZE = 20 * 1024 * 1024; // 20MB
            const fileInput = event.target;
            const file = fileInput.files[0];
            const fileSizeWarning = document.getElementById('file-size-warning');
            const imagePreviewContainer = document.getElementById('image-preview-container');
            const imagePreview = document.getElementById('image-preview');

            if (file && file.size <= MAX_FILE_SIZE) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    imagePreviewContainer.style.display = 'flex';
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
                fileSizeWarning.style.display = 'none';
            } else {
                fileSizeWarning.style.display = 'block';
                imagePreviewContainer.style.display = 'none';
                fileInput.value = ''; // Clear the file input if the file is too large
            }
        }
    </script>
@endpush
