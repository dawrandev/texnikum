@extends('layouts.main')

@section('title', 'Создать партнера')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Создать партнера</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Главная</a></div>
            <div class="breadcrumb-item"><a href="{{ route('partners.index') }}">Партнеры</a></div>
            <div class="breadcrumb-item">Создание</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Информация о партнере</h4>
                    </div>

                    <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Название <span class="text-danger">*</span></label>
                                <input type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}"
                                    required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="logo">Логотип <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file"
                                        name="logo"
                                        id="logo"
                                        class="custom-file-input @error('logo') is-invalid @enderror"
                                        accept="image/*"
                                        required
                                        onchange="previewImage(event)">
                                    <label class="custom-file-label" for="logo">Выберите файл</label>
                                    @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">
                                    Форматы: JPEG, PNG, JPG, GIF, SVG, WEBP. Макс. размер: 2MB
                                </small>

                                <!-- Image Preview -->
                                <div class="mt-3" id="imagePreviewContainer" style="display: none;">
                                    <img id="imagePreview" src="" alt="Preview" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="url">URL (необязательно)</label>
                                <input type="url"
                                    name="url"
                                    id="url"
                                    class="form-control @error('url') is-invalid @enderror"
                                    value="{{ old('url') }}"
                                    placeholder="https://example.com">
                                @error('url')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Ссылка на сайт партнера
                                </small>
                            </div>

                        </div>

                        <div class="card-footer text-right">
                            <a href="{{ route('partners.index') }}" class="btn btn-secondary">Отмена</a>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Custom file input label
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name || 'Выберите файл';
        const label = e.target.nextElementSibling;
        label.textContent = fileName;
    });

    // Image preview function
    function previewImage(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('imagePreviewContainer');
        const preview = document.getElementById('imagePreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            previewContainer.style.display = 'none';
        }
    }
</script>
@endpush