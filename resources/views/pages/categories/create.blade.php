@extends('layouts.main')

@section('title', __('Создать категорию'))

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ __('Создать категорию') }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">{{ __('Главная') }}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('categories.index') }}">{{ __('Категории') }}</a></div>
            <div class="breadcrumb-item">{{ __('Создание') }}</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Информация о категории') }}</h4>
                    </div>

                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
                                <input type="text"
                                    name="slug"
                                    id="slug"
                                    class="form-control @error('slug') is-invalid @enderror"
                                    value="{{ old('slug') }}"
                                    required>
                                @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    {{ __('URL-идентификатор (например: yangiliklar)') }}
                                </small>
                            </div>

                            <hr>

                            <h6 class="mb-3">{{ __('Переводы') }}</h6>

                            @php
                            $languages = \App\Models\Language::all();
                            @endphp

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

                                    <div class="form-group">
                                        <label for="name_{{ $language->id }}">
                                            {{ __('Название') }} <span class="text-danger">*</span>
                                        </label>

                                        <input type="text"
                                            name="translations[{{ $language->id }}][name]"
                                            id="name_{{ $language->id }}"
                                            class="form-control @error('translations.'.$language->id.'.name') is-invalid @enderror"
                                            value="{{ old('translations.'.$language->id.'.name') }}"
                                            required>

                                        @error('translations.'.$language->id.'.name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <input type="hidden"
                                        name="translations[{{ $language->id }}][lang_code]"
                                        value="{{ $language->code }}">
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">{{ __('Отмена') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Сохранить') }}</button>
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
    document.getElementById('slug').addEventListener('input', function(e) {
        this.value = this.value.toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
    });
</script>
@endpush