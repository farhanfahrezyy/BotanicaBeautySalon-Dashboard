@extends('layouts.app')

@section('title', 'Edit Service')

@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <style>
        /* Centering the file upload wrapper */
        .file-upload-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        /* File upload container */
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

        .file-upload-container .upload-icon {
            font-size: 48px;
            color: #f5919d;
            margin-bottom: 10px;
        }

        .file-upload-container .upload-placeholder {
            font-size: 1rem;
            color: #f5919d;
        }

        #image {
            display: none;
        }

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

        #upload-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            color: #fff;
            background-color: #f5919d;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
            margin-top: 10px;
        }

        #upload-button:hover {
            background-color: #e45a63;
            transform: translateY(-2px);
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

        .choices__list--dropdown .choices__item--selectable {
            color: #333;
            background-color: #ffffff;
            padding: 8px 12px;
            transition: background-color 0.3s ease;
        }

        .choices__list--dropdown .choices__item--selectable:hover {
            background-color: #f5919d;
            color: #ffffff;
        }

        .choices__inner::after {
            color: #f5919d;
            font-size: 0.8em;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .choices__list--dropdown {
            box-shadow: none;
            border: 1px solid #f5919d;
            border-radius: 8px;
            overflow: hidden;
        }

        #description {
            min-height: 150px;
            resize: vertical;
            padding: 10px;
            border: 1px solid #f5919d;
            border-radius: 8px;
        }

        #name,
        #price {
            padding: 15px;
            border: 1px solid #f5919d;
            border-radius: 8px;
        }

        /* Style for file size warning */
        .file-size-warning {
            color: red;
            display: none;
            margin-top: 10px;
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
                <h1>Edit Layanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Service</a></div>
                    <div class="breadcrumb-item">Edit Service</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Service</h2>
                <p class="section-lead">You can view, edit, or delete the service details as needed.</p>

                <div class="card">
                    <div class="card-header">
                        <h4>Edit Service Form</h4>
                    </div>
                    <div class="card-body">
                        <form id="serviceForm" action="{{ route('admin.service.update', $service->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Service Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $service->title) }}" required>
                                <span class="error-message" id="name-error">Service name is required.</span>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    value="{{ old('price', $service->price) }}" required>
                                <span class="error-message" id="price-error">Harga service harus diisi.</span>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $service->description) }}</textarea>
                                <span class="error-message" id="description-error">Descripsi service harus diisi.</span>
                            </div>

                            <div class="form-group">
                                <label for="service_link">Service Link</label>
                                <input type="url" class="form-control" id="service_link" name="service_link"
                                    placeholder="https://example.com/service"
                                    value="{{ old('service_link', $service->service_link) }}" required>
                                <span class="error-message" id="service_link-error">Masukan link service yang valid, http
                                    atau https</span>
                            </div>

                            <div class="file-upload-wrapper">
                                <div class="file-upload-container" onclick="document.getElementById('image').click()">
                                    <div class="upload-icon" id="upload-icon">
                                        <!-- SVG Upload Icon similar to the original -->
                                    </div>
                                    <div class="upload-placeholder" id="file-name">No file selected</div>
                                    @if ($service->image)
                                        <div class="image-preview-container" id="image-preview-container"
                                            style="display: flex;">
                                            <img id="image-preview" src="{{ asset('images/' . $service->image) }}"
                                                alt="{{ $service->name }}">
                                        </div>
                                    @endif
                                </div>
                                <input type="file" id="image" name="image" accept="image/*"
                                    onchange="displayFileName(event)">
                                <button type="button" id="upload-button"
                                    onclick="document.getElementById('image').click()">Choose File</button>
                                <div id="file-size-warning" class="file-size-warning">File size/type is not valid! Maximum
                                    20MB image.</div>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="submit-button">Update Service</button>
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
            const ERROR_MESSAGES = {
                file: 'Silakan pilih file',
                text: 'Field ini tidak boleh kosong',
                url: 'Silakan isi link layanan, dan pastikan link tersebut diawali dengan http:// atau https://',
                number: 'Hanya boleh diisi angka'
            };

            const REQUIRED_FIELDS = [
                'name',
                'price',
                'description',
                'image',
                'service_link'
            ];

            const form = document.getElementById('serviceForm');
            if (!form) {
                console.error("Form 'productForm' tidak ditemukan.");
                return;
            }

            form.addEventListener('submit', function(event) {
                let isValid = true;

                REQUIRED_FIELDS.forEach(fieldId => {
                    const input = document.getElementById(fieldId);
                    if (!validateField(input)) {
                        isValid = true;
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
                } else {
                    const submitButton = form.querySelector('button[type="submit"]');
                    if (submitButton) {
                        submitButton.disabled = true;
                        submitButton.innerHTML =
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...';
                    }
                }
            });

            REQUIRED_FIELDS.forEach(fieldId => {
                const input = document.getElementById(fieldId);
                if (input) {
                    input.addEventListener('blur', () => validateField(input));
                    if (input.tagName === 'SELECT') {
                        input.addEventListener('change', () => validateField(input));
                    }
                } else {
                    console.error(`Input dengan ID'${fieldId}' tidak ditemukan.`);
                }
            });

            function displayFileName(event) {
                const fileInput = event.target;
                const fileSizeWarning = document.getElementById('file-size-warning');
                const imagePreviewContainer = document.getElementById('image-preview-container');
                const uploadIcon = document.getElementById('upload-icon');
                const imagePreview = document.getElementById('image-preview');
                const file = fileInput.files[0];

                fileSizeWarning.style.display = 'none';
                imagePreviewContainer.style.display = 'none';
                uploadIcon.style.display = 'block';

                if (file) {
                    const validTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'];
                    const MAX_FILE_SIZE = 20 * 1024 * 1024;

                    if (validTypes.includes(file.type) && file.size <= MAX_FILE_SIZE) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            imagePreviewContainer.style.display = 'flex';
                            imagePreview.src = e.target.result;
                            uploadIcon.style.display = 'none';
                        };
                        reader.readAsDataURL(file);
                    } else {
                        fileSizeWarning.style.display = 'block';
                        fileInput.value = '';
                    }
                } else {
                    fileInput.value = '';
                }
            }

            function validateField(input) {
                if (!input) return false;

                const errorSpan = document.getElementById(`${input.id}-error`);
                if (!errorSpan) return false;

                errorSpan.style.display = 'none';
                input.classList.remove('is-invalid');
                let isValid = true;

                if (input.id === 'category_id' && input.value === '') {
                    isValid = false;
                    errorSpan.textContent = ERROR_MESSAGES.category;
                } else if (input.id === 'service_link' && (input.value.trim() === '' || !/^https?:\/\//.test(input
                        .value))) {
                    isValid = false;
                    errorSpan.textContent = ERROR_MESSAGES.url;
                } else if (input.type === 'file' && (!input.files || input.files.length === 0)) {
                    isValid = false;
                    errorSpan.textContent = ERROR_MESSAGES.file;
                } else if (input.id === 'price' && (input.value === '' || isNaN(input.value))) {
                    isValid = false;
                    errorSpan.textContent = ERROR_MESSAGES.number;
                } else if ((input.type === 'text' || input.tagName === 'TEXTAREA') && input.value.trim() === '') {
                    isValid = false;
                    errorSpan.textContent = ERROR_MESSAGES.text;
                }

                if (!isValid) {
                    errorSpan.style.display = 'block';
                    input.classList.add('is-invalid');
                }

                return isValid;
            }


            document.getElementById('image').addEventListener('change', displayFileName);
        });
    </script>
@endpush
