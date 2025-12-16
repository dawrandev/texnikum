@extends('layouts.main')

@section('title', 'Создать видео')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Создать видео</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Главная</a></div>
            <div class="breadcrumb-item"><a href="{{ route('videos.index') }}">Видео</a></div>
            <div class="breadcrumb-item">Создание</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Информация о видео</h4>
                    </div>

                    <form action="{{ route('videos.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="url">URL <span class="text-danger">*</span></label>
                                <input type="url"
                                    name="url"
                                    id="url"
                                    class="form-control @error('url') is-invalid @enderror"
                                    value="{{ old('url') }}"
                                    placeholder="https://www.youtube.com/watch?v=..."
                                    required>
                                @error('url')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Введите ссылку на видео (YouTube, Vimeo и т.д.)
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="published_at">Дата публикации</label>
                                <input type="datetime-local"
                                    name="published_at"
                                    id="published_at"
                                    class="form-control @error('published_at') is-invalid @enderror"
                                    value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}">
                                @error('published_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr>

                            <h6 class="mb-3">Переводы</h6>

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
                                        <label for="title_{{ $language->code }}">
                                            Название
                                        </label>

                                        <input type="text"
                                            name="translations[{{ $language->code }}][title]"
                                            id="title_{{ $language->code }}"
                                            class="form-control @error('translations.'.$language->code.'.title') is-invalid @enderror"
                                            value="{{ old('translations.'.$language->code.'.title') }}">

                                        @error('translations.'.$language->code.'.title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <input type="hidden"
                                        name="translations[{{ $language->code }}][lang_code]"
                                        value="{{ $language->code }}">
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <a href="{{ route('videos.index') }}" class="btn btn-secondary">Отмена</a>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection