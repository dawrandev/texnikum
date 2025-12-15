@extends('layouts.main')

@section('title', 'Создать пост')

@push('styles')
<link rel="stylesheet" href="{{ URL::asset('assets/bundles/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/dropzone.css') }}" type="text/css" />
<style>
    .dropzone {
        border: 2px dashed #0087F7;
        border-radius: 5px;
        background: white;
        min-height: 150px;
    }

    .dropzone .dz-message {
        font-size: 1.2em;
        color: #999;
    }
</style>
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
                <form action="{{ route('posts.store') }}" method="POST" id="postForm" class="{{ $errors->any() ? 'was-validated' : '' }}" novalidate>
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
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $post->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                            {{ $category->translations->where('lang_code', 'ru')->first()?->name ?? $category->slug }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                    Изображения
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <div id="imageDropzone" class="dropzone"></div>
                                    @error('images')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    @error('images.*')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Вы можете загрузить несколько изображений (jpeg, png, jpg, webp, max 2MB каждое)</small>

                                    <!-- Hidden container for image paths -->
                                    <div id="uploadedImages"></div>
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
                            <h4>Переводы <small class="text-muted">(заполните минимум один язык)</small></h4>
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
                                        <span class="badge badge-primary translation-indicator-{{ $language->code }}" style="display:none;">
                                            <i class="fas fa-check"></i>
                                        </span>
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
                                            Заголовок
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text"
                                                name="translations[{{ $language->code }}][title]"
                                                id="title_{{ $language->code }}"
                                                class="form-control translation-field @error('translations.'.$language->code.'.title') is-invalid @enderror"
                                                value="{{ old('translations.'.$language->code.'.title') }}"
                                                data-lang="{{ $language->code }}">
                                            @error('translations.'.$language->code.'.title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">
                                            Содержание
                                        </label>
                                        <div class="col-sm-12 col-md-10">
                                            <textarea
                                                name="translations[{{ $language->code }}][content]"
                                                id="content_{{ $language->code }}"
                                                class="summernote translation-field @error('translations.'.$language->code.'.content') is-invalid @enderror"
                                                data-lang="{{ $language->code }}">{{ old('translations.'.$language->code.'.content') }}</textarea>
                                            @error('translations.'.$language->code.'.content')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- O'ZGARISH: lang_code ni faqat to'ldirilgan translationlar uchun yuborish -->
                                    <input type="hidden"
                                        name="translations[{{ $language->code }}][lang_code]"
                                        value="{{ $language->code }}"
                                        class="lang-code-field"
                                        data-lang="{{ $language->code }}"
                                        disabled>
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
<script src="{{ URL::asset('assets/js/dropzone.js') }}"></script>
<script>
    // Prevent Dropzone from auto-discovering
    Dropzone.autoDiscover = false;

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
            ]
        });

        // Initialize Dropzone
        let uploadedImages = [];
        const myDropzone = new Dropzone("#imageDropzone", {
            url: "{{ route('posts.upload-image') }}", // Upload endpoint
            paramName: "image",
            maxFilesize: 2, // MB
            acceptedFiles: "image/jpeg,image/png,image/jpg,image/webp",
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            dictDefaultMessage: "Перетащите изображения сюда или нажмите для выбора",
            dictRemoveFile: "Удалить",
            dictCancelUpload: "Отменить",
            init: function() {
                this.on("success", function(file, response) {
                    if (response.success) {
                        // Store uploaded image path
                        uploadedImages.push(response.path);
                        file.serverPath = response.path;
                        updateHiddenInputs();
                    }
                });

                this.on("removedfile", function(file) {
                    if (file.serverPath) {
                        // Remove from array
                        uploadedImages = uploadedImages.filter(path => path !== file.serverPath);
                        updateHiddenInputs();
                    }
                });

                this.on("error", function(file, errorMessage) {
                    alert("Ошибка загрузки: " + (errorMessage.message || errorMessage));
                });
            }
        });

        function updateHiddenInputs() {
            // Clear existing inputs
            $('#uploadedImages').empty();

            // Add hidden inputs for each uploaded image
            uploadedImages.forEach((path, index) => {
                $('#uploadedImages').append(
                    `<input type="hidden" name="images[]" value="${path}">`
                );
            });
        }

        // Track translation completion and enable/disable lang_code
        $('.translation-field').on('input change', function() {
            const langCode = $(this).data('lang');
            checkTranslationComplete(langCode);
        });

        function checkTranslationComplete(langCode) {
            const title = $(`input[name="translations[${langCode}][title]"]`).val();
            const content = $(`textarea[name="translations[${langCode}][content]"]`).summernote('code');
            const cleanContent = content.replace(/<[^>]*>/g, '').trim();

            // Agar title yoki content to'ldirilgan bo'lsa, lang_code ni enable qilish
            if ((title && title.trim()) || (cleanContent && cleanContent !== '')) {
                $(`.lang-code-field[data-lang="${langCode}"]`).prop('disabled', false);
                $(`.translation-indicator-${langCode}`).show();
            } else {
                $(`.lang-code-field[data-lang="${langCode}"]`).prop('disabled', true);
                $(`.translation-indicator-${langCode}`).hide();
            }
        }


        // Form submission with validation
        $('#postForm').on('submit', function(e) {
            // Sync Summernote content before submit
            $('.summernote').each(function() {
                $(this).val($(this).summernote('code'));
            });

            // Enable/disable lang_code fields based on content
            $('[data-lang]').each(function() {
                const langCode = $(this).data('lang');
                checkTranslationComplete(langCode);
            });

            // Validation
            let isValid = true;
            let errorMessage = '';

            // Check category
            if (!$('#category_id').val()) {
                isValid = false;
                errorMessage += 'Пожалуйста, выберите категорию.\n';
            }



            // Check at least one translation
            let hasTranslation = false;
            $('input[name*="[title]"]').each(function() {
                const langCode = $(this).data('lang');
                const title = $(this).val().trim();
                const content = $(`textarea[name="translations[${langCode}][content]"]`).summernote('code');
                const cleanContent = content.replace(/<[^>]*>/g, '').trim();

                if (title && cleanContent) {
                    hasTranslation = true;
                }
            });

            if (!hasTranslation) {
                isValid = false;
                errorMessage += 'Пожалуйста, заполните хотя бы один перевод (заголовок и содержание).\n';
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