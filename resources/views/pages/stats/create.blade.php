@extends('layouts.main')

@section('title', 'Создать статистику')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Создать статистику</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Главная</a></div>
            <div class="breadcrumb-item"><a href="{{ route('stats.index') }}">Статистика</a></div>
            <div class="breadcrumb-item">Создание</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Информация о статистике</h4>
                    </div>

                    <form action="{{ route('stats.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="count">Число <span class="text-danger">*</span></label>
                                <input type="number"
                                    name="count"
                                    id="count"
                                    class="form-control @error('count') is-invalid @enderror"
                                    value="{{ old('count') }}"
                                    min="0"
                                    step="1"
                                    required>
                                @error('count')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Введите числовое значение статистики
                                </small>
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
                                            Название <span class="text-danger">*</span>
                                        </label>

                                        <input type="text"
                                            name="translations[{{ $language->code }}][title]"
                                            id="title_{{ $language->code }}"
                                            class="form-control @error('translations.'.$language->code.'.title') is-invalid @enderror"
                                            value="{{ old('translations.'.$language->code.'.title') }}"
                                            placeholder="Например: Активных пользователей"
                                            required>

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
                            <a href="{{ route('stats.index') }}" class="btn btn-secondary">Отмена</a>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection