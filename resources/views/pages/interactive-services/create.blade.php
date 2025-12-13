@extends('layouts.main')

@section('title', 'Создать интерактивную услугу')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Создать интерактивную услугу</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Главная</a></div>
            <div class="breadcrumb-item"><a href="{{ route('interactive-services.index') }}">Интерактивные услуги</a></div>
            <div class="breadcrumb-item">Создание</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Информация об услуге</h4>
                    </div>

                    <form action="{{ route('interactive-services.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="title">Название <span class="text-danger">*</span></label>
                                <input type="text"
                                    name="title"
                                    id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}"
                                    required>
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="url">URL <span class="text-danger">*</span></label>
                                <input type="url"
                                    name="url"
                                    id="url"
                                    class="form-control @error('url') is-invalid @enderror"
                                    value="{{ old('url') }}"
                                    placeholder="https://example.com/service"
                                    required>
                                @error('url')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Введите ссылку на интерактивную услугу
                                </small>
                            </div>

                        </div>

                        <div class="card-footer text-right">
                            <a href="{{ route('interactive-services.index') }}" class="btn btn-secondary">Отмена</a>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection