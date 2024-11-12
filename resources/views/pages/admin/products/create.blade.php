@extends('layouts.app')

@section('title', 'Buat Produk')

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <style>
        .form-control.is-invalid {
            border-color: color: #dc3545;
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

        /* Kontainer unggah berkas */
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

        /* Ikon unggah berkas */
        .file-upload-container .upload-icon {
            font-size: 48px;
            color: #f5919d;
            margin-bottom: 10px;
        }

        /* Teks placeholder */
        .file-upload-container .upload-placeholder {
            font-size: 1rem;
            color: #f5919d;
        }

        /* Informasi ukuran file maksimum dan disarankan */
        .file-upload-container .file-size-info {
            font-size: 0.9rem;
            color: #f5919d;
            margin-top: 10px;
        }

        /* Input file tersembunyi */
        #image {
            display: none;
        }

        /* Pratinjau gambar di dalam kontainer unggah */
        .image-preview-container {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 12px;
            overflow: hidden;
            display: none;
        }

        #image-preview {
            width: 100%;
            height: 100%;
            object-fit: fill;
            border-radius: 8px;
        }

        /* Tombol "Pilih Berkas" */
        #upload-button {
            display: inline-block;
            width: auto;
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

        /* Teks peringatan jika file terlalu besar */
        .file-size-warning {
            display: none;
            color: #e45a63;
            margin-top: 5px;
            font-size: 0.9rem;
        }

        /* Tombol "Buat Produk" yang diperbarui */
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

        /* Styling untuk Choices.js */
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

        /* Styling untuk textarea deskripsi */
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
            resize: both;
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
                    <a href="{{ route('admin.products.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Buat Produk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Produk</a></div>
                    <div class="breadcrumb-item">Buat Produk</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Buat Produk Baru</h2>
                <p class="section-lead">Isi detail di bawah ini untuk menambahkan produk baru.</p>

                <div class="card">
                    <div class="card-header">
                        <h4>Formulir Produk</h4>
                    </div>
                    <div class="card-body">
                        <form id="productForm" action="{{ route('admin.products.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Nama Produk -->
                            <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                    maxlength="255" pattern="^[A-Za-z0-9\s]+$" title="Gunakan hanya huruf dan angka.">
                                <span class="error-message" id="name-error">Nama produk harus diisi.</span>
                            </div>

                            <!-- Harga -->
                            <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control" id="price" name="price" required
                                    min="0">
                                <span class="error-message" id="price-error">Harga produk harus diisi.</span>
                            </div>

                            <!-- Kategori -->
                            <div class="form-group">
                                <label for="category_id" class="form-label">Kategori</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                    name="category_id" onchange="validateField(this)">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->category }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="error-message" id="category_id-error"
                                    style="display: none; font-size: 0.875rem; margin-top: 0.25rem;">
                                    Kategori produk harus dipilih.
                                </span>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Deskripsi -->
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" rows="3" maxlength="1000" required></textarea>
                                <span class="error-message" id="description-error">Deskripsi produk harus diisi.</span>
                            </div>

                            <!-- Link Produk -->
                            <div class="form-group">
                                <label for="product_link">Product Link</label>
                                <input type="url" class="form-control" id="product_link" name="product_link"
                                    placeholder="https://example.com/product" required pattern="https?://.+">
                                <span class="error-message" id="product_link-error">Product link must be a valid URL
                                    starting with http or https.</span>
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

                                <span class="error-message" id="image-error">Gambar produk harus diunggah.</span>
                                <button type="button" id="upload-button"
                                    onclick="document.getElementById('image').click()">Pilih Berkas</button>
                            </div>

                            <!-- Tombol Buat Produk -->
                            <div class="form-group text-right">
                                <button type="submit" class="submit-button">Buat Produk</button>
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
        // Initialize Choices.js securely
        document.addEventListener('DOMContentLoaded', function() {


            form.addEventListener('submit', function(event) {
                let isValid = true;


                const categorySelect = document.getElementById('category_id');
                const categoryError = document.getElementById('category_id-error');

                // Periksa apakah kategori dipilih
                if (categorySelect.value === '') {
                    categoryError.style.display = 'block';
                    isValid = false;
                } else {
                    categoryError.style.display = 'none';
                }

                // Mencegah submit jika tidak valid
                if (!isValid) {
                    event.preventDefault();
                }
            });

        });

        // Real-time and submit validation
        const form = document.getElementById('productForm');
        const fields = ['name', 'price', 'category_id', 'description', 'image', 'product_link'];

        // Validate individual fields on blur
        fields.forEach(field => {
            const input = document.getElementById(field);
            input.addEventListener('blur', () => {
                validateField(input);
            });
        });

        const REQUIRED_FIELDS = [
            'category_id',
            'name',
            'price',
            'description',
            'image',
            'product_link'
        ];

        form.addEventListener('submit', function(event) {
            let isValid = true;

            // Validate all required fields
            REQUIRED_FIELDS.forEach(fieldId => {
                const input = document.getElementById(fieldId);
                if (!validateField(input)) {
                    isValid = false;
                }
            });

            // Prevent form submission if validation fails
            if (!isValid) {
                event.preventDefault();
                // Optional: Scroll to first error
                const firstError = document.querySelector('.is-invalid');
                if (firstError) {
                    firstError.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            } else {
                // Optional: Show loading state
                const submitButton = form.querySelector('button[type="submit"]');
                if (submitButton) {
                    submitButton.disabled = true;
                    submitButton.innerHTML =
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...';
                }
            }
        });

        // Add real-time validation
        REQUIRED_FIELDS.forEach(fieldId => {
            const input = document.getElementById(fieldId);
            if (input) {
                // Validate on blur
                input.addEventListener('blur', () => validateField(input));

                // Additional validation for select elements
                if (input.tagName === 'SELECT') {
                    input.addEventListener('change', () => validateField(input));
                }
            }
        });


        // Define error messages outside the function for better reusability and maintenance
        const ERROR_MESSAGES = {
            category: 'Silakan pilih kategori',
            file: 'Silakan pilih file',
            text: 'Field ini tidak boleh kosong',
            url: 'Silakan isi link layanan, dan pastikan link tersebut diawali dengan http:// atau https://',
            number: 'Hanya boleh diisi angka'
        };

        function validateField(input) {
            // Early return if input is null/undefined
            if (!input) {
                console.error('Input is null or undefined');
                console.log(input);
                return false;
            }

            // Get error element with proper error handling
            const errorSpan = document.getElementById(`${input.id}-error`);
            if (!errorSpan) {
                console.error(`Error element not found for input: ${input.id}`);
                return false;
            }

            // Reset states at the beginning
            errorSpan.style.display = 'none';
            input.classList.remove('is-invalid');

            let isValid = true;
            let errorMessage = '';

            try {
                // Validate based on input type and ID
                switch (true) {

                    case input.type === 'file':
                        if (!input.files || input.files.length === 0) {
                            isValid = false;
                            errorMessage = ERROR_MESSAGES.file;
                        }
                        break;

                    case input.type === 'select-one':
                        if (!input.value || input.value === '') {
                            isValid = false;
                            errorMessage = ERROR_MESSAGES.category;
                        }
                        break;

                    case input.type === 'url':
                        if (!input.value || !/^https?:\/\//.test(input.value)) {
                            isValid = false;
                            errorMessage = ERROR_MESSAGES.url;
                        }
                        break

                    case input.type === 'number':
                        if (!input.value || isNaN(input.value)) {
                            isValid = false;
                            errorMessage = ERROR_MESSAGES.number;
                        }
                        break;

                    case input.type === 'text':
                    case input.type === 'textarea':
                    default:
                        if (!input.value || input.value.trim() === '') {
                            isValid = false;
                            errorMessage = ERROR_MESSAGES.text;
                        }
                        break;
                }

                // Update UI based on validation result
                if (!isValid) {
                    errorSpan.textContent = errorMessage;
                    errorSpan.style.display = 'block';
                    input.classList.add('is-invalid');
                }

                return isValid;

            } catch (error) {
                console.error('Validation error:', error);
                errorSpan.textContent = 'Terjadi kesalahan pada validasi';
                errorSpan.style.display = 'block';
                input.classList.add('is-invalid');
                return false;
            }
        }

        //Helper function to validate all fields in a form
        // function validateForm(formId) {
        //     const form = document.getElementById(formId);
        //     if (!form) {
        //         console.error('Form not found');
        //         return false;
        //     }

        //     let isValid = true;
        //     const inputs = form.querySelectorAll('input:not([type="hidden"]), select, textarea');

        //     inputs.forEach(input => {
        //         if (!validateField(input)) {
        //             isValid = false;
        //         }
        //     });

        //     return isValid;
        // }

        // Example usage for form submission
        document.getElementById('myForm')?.addEventListener('submit', function(event) {
            if (!validateForm(this.id)) {
                event.preventDefault();
                return false;
            }
        });

        // Example usage for real-time validation
        document.querySelectorAll('input:not([type="hidden"]), select, textarea').forEach(input => {
            input.addEventListener('blur', function() {
                validateField(this);
            });

            // For select elements, also validate on change
            if (input.tagName === 'SELECT') {
                input.addEventListener('change', function() {
                    validateField(this);
                });
            }
        });

        // Helper function to validate multiple fields
        function validateForm(formId) {
            const form = document.getElementById(formId);
            if (!form) {
                console.error('Form not found');
                return false;
            }

            const inputs = form.querySelectorAll('input, select, textarea');
            let isFormValid = true;

            inputs.forEach(input => {
                if (!validateField(input)) {
                    isFormValid = false;
                }
            });

            return isFormValid;
        }

        // Display file name and preview
        function displayFileName(event) {
            // Constants
            const MAX_FILE_SIZE = 20 * 1024 * 1024; // 20MB
            const VALID_FILE_TYPES = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];
            const DEFAULT_MESSAGE = "Belum ada berkas dipilih!";

            // DOM Elements
            const fileInput = event.target;
            const fileSizeWarning = document.getElementById('file-size-warning');
            const imagePreviewContainer = document.getElementById('image-preview-container');
            const uploadIcon = document.getElementById('upload-icon');
            const imagePreview = document.getElementById('image-preview');

            // Reset display
            const resetDisplay = () => {
                fileSizeWarning.style.display = 'none';
                imagePreviewContainer.style.display = 'none';
                uploadIcon.style.display = 'block';
                fileInput.value = '';
            };

            // Validate file
            const validateFile = (file) => {
                if (!file) return false;
                return VALID_FILE_TYPES.includes(file.type) && file.size <= MAX_FILE_SIZE;
            };

            // Handle file selection
            const file = fileInput.files[0];
            if (!file) {
                resetDisplay();
                return;
            }

            // Validate and process file
            if (validateFile(file)) {
                fileSizeWarning.style.display = 'none';

                const reader = new FileReader();
                reader.onload = (e) => {
                    try {
                        imagePreviewContainer.style.display = 'flex';
                        imagePreview.src = e.target.result;
                        uploadIcon.style.display = 'none';
                    } catch (error) {
                        console.error('Error displaying image:', error);
                        resetDisplay();
                    }
                };

                reader.onerror = (error) => {
                    console.error('Error reading file:', error);
                    resetDisplay();
                };

                try {
                    reader.readAsDataURL(file);
                } catch (error) {
                    console.error('Error initiating file read:', error);
                    resetDisplay();
                }
            } else {
                fileSizeWarning.style.display = 'block';
                imagePreviewContainer.style.display = 'none';
                fileInput.value = '';
            }
        }
    </script>
@endpush
