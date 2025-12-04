@extends('layouts.main')

@section('title', __('Edit Category'))

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ __('Edit Category') }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></div>
            <div class="breadcrumb-item"><a href="{{ route('categories.index') }}">{{ __('Categories') }}</a></div>
            <div class="breadcrumb-item">{{ __('Edit') }}</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('Category Information') }}</h4>
                    </div>
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="slug">{{ __('Slug') }} <span class="text-danger">*</span></label>
                                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $category->slug) }}" required>
                                @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">{{ __('URL-friendly identifier (e.g., yangiliklar)') }}</small>
                            </div>

                            <hr>

                            <h6 class="mb-3">{{ __('Translations') }}</h6>

                            @php
                            $languages = \App\Models\Language::all();
                            @endphp

                            @foreach($languages as $language)
                            @php
                            $translation = $category->translations->where('language_id', $language->id)->first();
                            @endphp
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h6 class="mb-0">
                                        <i class="fas fa-language"></i> {{ $language->name }} ({{ $language->code }})
                                        @if($translation)
                                        <span class="badge badge-success">{{ __('Translated') }}</span>
                                        @else
                                        <span class="badge badge-warning">{{ __('Not translated') }}</span>
                                        @endif
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name_{{ $language->id }}">{{ __('Name') }} ({{ $language->name }}) <span class="text-danger">*</span></label>
                                        <input type="text"
                                            name="translations[{{ $language->id }}][name]"
                                            id="name_{{ $language->id }}"
                                            class="form-control @error('translations.'.$language->id.'.name') is-invalid @enderror"
                                            value="{{ old('translations.'.$language->id.'.name', $translation->name ?? '') }}"
                                            required>
                                        @error('translations.'.$language->id.'.name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <input type="hidden" name="translations[{{ $language->id }}][language_id]" value="{{ $language->id }}">
                                    @if($translation)
                                    <input type="hidden" name="translations[{{ $language->id }}][id]" value="{{ $translation->id }}">
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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