@extends('layouts.app')

@section('title', 'Edit Blog')

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
            object-fit: contain;
            border-radius: 8px;
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

        /* Adding pink border to form fields */
        .form-control {
            border: 1px solid #f5919d;
            /* Pink border */
            border-radius: 8px;
        }

        .form-control:focus {
            border-color: #f5919d;
            /* Focused pink border */
            box-shadow: 0 0 5px rgba(245, 145, 157, 0.5);
        }

        /* Enlarged textarea */
        #detail {
            min-height: 250px;
            /* Increased height */
            resize: vertical;
            /* Allow vertical resize */
            padding: 10px;
            border: 1px solid #f5919d;
            /* Pink border */
            border-radius: 8px;
        }

        .file-size-warning {
            color: red;
            display: none;
            /* Hidden by default */
            margin-top: 10px;
        }

        .error-message {
            color: #e45a63;
            font-size: 0.9rem;
            display: none;
            /* Hidden by default */
            margin-top: 5px;
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
                <h1>Edit Blog</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Blogs</a></div>
                    <div class="breadcrumb-item">Edit Blog</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Blog</h2>
                <p class="section-lead">Ubah data blog yang telah ada dan perbarui informasi yang diperlukan.</p>

                <div class="card">
                    <div class="card-header">
                        <h4>Form Ubah Blog</h4>
                    </div>
                    <div class="card-body">
                        <form id="editBlogForm" action="{{ route('admin.blogs.update', $blog->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title', $blog->title) }}" required>
                                <span class="error-message" id="title-error">Judul tidak boleh kosong.</span>
                            </div>

                            <div class="form-group">
                                <label for="news_date">Tanggal</label>
                                <input type="text" name="news_date" class="form-control datepicker"
                                    value="{{ old('news_date', $blog->news_date) }}" required>
                                <span class="error-message" id="news_date-error">Tanggal tidak boleh kosong.</span>
                            </div>

                            <div class="form-group">
                                <label for="detail">Detail</label>
                                <textarea class="form-control" id="detail" name="detail" rows="6" required>{{ old('detail', $blog->detail) }}</textarea>
                                <span class="error-message" id="detail-error">Detail tidak boleh kosong.</span>
                            </div>

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
                                    <div class="upload-placeholder" id="file-name">Belum ada berkas dipilih</div>
                                    @if ($blog->image)
                                        <div class="image-preview-container" id="image-preview-container"
                                            style="display: flex;">
                                            <img id="image-preview" src="{{ asset('images/' . $blog->image) }}"
                                                alt="{{ $blog->title }}">
                                        </div>
                                    @endif
                                </div>
                                <input type="file" id="image" name="image" accept="image/*"
                                    onchange="displayFileName(event)">
                                <button type="button" class="submit-button"
                                    onclick="document.getElementById('image').click()">Pilih Berkas</button>
                                <div id="file-size-warning" class="file-size-warning">Tipe atau ukuran berkas tidak valid!
                                    Harap unggah gambar dengan ukuran kurang dari 20MB.</div>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="submit-button">Update Blog</button>
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
                title: 'Judul blog harus diisi',
                detail: 'Detail blog harus diisi',
                file: 'Silakan unggah gambar untuk blog'
            };

            const REQUIRED_FIELDS = [
                'title',
                'detail',
                'image'
            ];

            const form = document.getElementById('editBlogForm');
            if (!form) {
                console.error("Form 'editBlogForm' tidak ditemukan.");
                return;
            }

            // Validate form on submit
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
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...';
                    }
                }
            });

            // Validate fields on blur or change for instant feedback
            REQUIRED_FIELDS.forEach(fieldId => {
                const input = document.getElementById(fieldId);
                if (input) {
                    input.addEventListener('blur', () => validateField(input));
                    if (input.tagName === 'SELECT' || input.type === 'file') {
                        input.addEventListener('change', () => validateField(input));
                    }
                } else {
                    console.error(`Input dengan ID '${fieldId}' tidak ditemukan.`);
                }
            });

            // Display file name and validate file
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

            document.getElementById('image').addEventListener('change', displayFileName);

            // Validation function
            function validateField(input) {
                if (!input) return false;

                const errorSpan = document.getElementById(`${input.id}-error`);
                if (!errorSpan) return false;

                errorSpan.style.display = 'none';
                input.classList.remove('is-invalid');
                let isValid = true;

                if (input.id === 'title' && input.value.trim() === '') {
                    isValid = false;
                    errorSpan.textContent = ERROR_MESSAGES.title;
                } else if (input.id === 'detail' && input.value.trim() === '') {
                    isValid = false;
                    errorSpan.textContent = ERROR_MESSAGES.detail;
                } else if (input.type === 'file' && (!input.files || input.files.length === 0)) {
                    isValid = false;
                    errorSpan.textContent = ERROR_MESSAGES.file;
                }

                if (!isValid) {
                    errorSpan.style.display = 'block';
                    input.classList.add('is-invalid');
                }

                return isValid;
            }
        });
    </script>
@endpush
