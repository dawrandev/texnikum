@extends('layouts.main')

@section('title', 'Создать пост')

@push('styles')
<link rel="stylesheet" href="{{ URL::asset('assets/bundles/summernote/summernote-bs4.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Создать пост</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Панель управления</a></div>
            <div class="breadcrumb-item"><a href="{{ route('posts.index') }}">Посты</a></div>
            <div class="breadcrumb-item">Создать</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" id="postForm" class="{{ $errors->any() ? 'was-validated' : '' }}" novalidate>
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <h4>Основная информация</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label for="category_id" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Категория <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <select name="category_id" id="category_id" class="form-control select2 @error('category_id') is-invalid @enderror" required>
                                        <option value="">-- Выберите категорию --</option>
                                        @foreach($categories as $id => $name)
                                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>
                                            {{ $name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="slug" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Slug <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required>
                                    @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">URL-идентификатор (например: mening-postim)</small>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="image" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Изображение
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Рекомендуемый размер: 1200x630px (jpeg, png, jpg, webp, max 2MB)</small>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="published_at" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Дата публикации
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="datetime-local" name="published_at" id="published_at" class="form-control @error('published_at') is-invalid @enderror" value="{{ old('published_at') }}">
                                    @error('published_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Оставьте пустым для немедленной публикации</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Переводы</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                                @foreach($languages as $index => $language)
                                <li class="nav-item">
                                    <a class="nav-link {{ $index === 0 ? 'active' : '' }}"
                                        id="lang-{{ $language->code }}-tab"
                                        data-toggle="tab"
                                        href="#lang-{{ $language->code }}"
                                        role="tab">
                                        {{ $language->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>

                            <div class="tab-content mt-3" id="languageTabsContent">
                                @foreach($languages as $index => $language)
                                <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                    id="lang-{{ $language->code }}"
                                    role="tabpanel">

                                    <div class="form-group row mb-4">
                                        <label for="title_{{ $language->code }}" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                            Заголовок <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text"
                                                name="translations[{{ $language->code }}][title]"
                                                id="title_{{ $language->code }}"
                                                class="form-control @error('translations.'.$language->code.'.title') is-invalid @enderror"
                                                value="{{ old('translations.'.$language->code.'.title') }}"
                                                required>
                                            @error('translations.'.$language->code.'.title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">
                                            Содержание <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-sm-12 col-md-10">
                                            <textarea
                                                name="translations[{{ $language->code }}][content]"
                                                id="content_{{ $language->code }}"
                                                class="summernote @error('translations.'.$language->code.'.content') is-invalid @enderror">{{ old('translations.'.$language->code.'.content') }}</textarea>
                                            @error('translations.'.$language->code.'.content')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="hidden"
                                        name="translations[{{ $language->code }}][lang_code]"
                                        value="{{ $language->code }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Отмена</a>
                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                <i class="fas fa-save"></i> Сохранить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script src="{{ URL::asset('assets/bundles/summernote/summernote-bs4.js') }}"></script>
<script>
    $(document).ready(function() {
        // Initialize Select2 for category
        $('#category_id').select2({
            placeholder: '-- Выберите категорию --',
            allowClear: true
        });

        // Initialize Summernote for all textareas
        $('.summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function(files) {
                    // Handle image upload via Summernote if needed
                    for (let i = 0; i < files.length; i++) {
                        uploadSummernoteImage(files[i], $(this));
                    }
                }
            }
        });

        // Function to upload images from Summernote
        function uploadSummernoteImage(file, editor) {
            let data = new FormData();
            data.append("file", file);
            data.append("_token", "{{ csrf_token() }}");

            // You can implement image upload endpoint here
            // For now, we'll just insert it as base64
            let reader = new FileReader();
            reader.onloadend = function() {
                editor.summernote('insertImage', reader.result);
            }
            reader.readAsDataURL(file);
        }

        // Slug auto-format
        const slugInput = $('#slug');
        const firstTitleInput = $('input[name*="[title]"]').first();

        if (firstTitleInput.length) {
            firstTitleInput.on('input', function() {
                if (!slugInput.val() || slugInput.data('manually-edited') !== true) {
                    slugInput.val(generateSlug($(this).val()));
                }
            });
        }

        slugInput.on('input', function() {
            $(this).data('manually-edited', true);
            $(this).val(generateSlug($(this).val()));
        });

        function generateSlug(text) {
            return text.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-+|-+$/g, '');
        }

        // Form submission with validation
        $('#postForm').on('submit', function(e) {
            // Sync Summernote content before submit
            $('.summernote').each(function() {
                $(this).val($(this).summernote('code'));
            });

            // Basic validation
            let isValid = true;
            let errorMessage = '';

            // Check category
            if (!$('#category_id').val()) {
                isValid = false;
                errorMessage += 'Пожалуйста, выберите категорию.\n';
            }

            // Check slug
            if (!$('#slug').val()) {
                isValid = false;
                errorMessage += 'Пожалуйста, введите slug.\n';
            }

            // Check at least one translation
            let hasTranslation = false;
            $('input[name*="[title]"]').each(function() {
                if ($(this).val().trim() !== '') {
                    hasTranslation = true;
                    return false;
                }
            });

            if (!hasTranslation) {
                isValid = false;
                errorMessage += 'Пожалуйста, заполните хотя бы один перевод.\n';
            }

            if (!isValid) {
                e.preventDefault();
                alert(errorMessage);
                return false;
            }

            // Disable submit button to prevent double submission
            $('#submitBtn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Сохранение...');
        });
    });
</script>
@endpush