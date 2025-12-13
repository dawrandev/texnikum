@extends('layouts.main')

@section('title', 'Просмотр поста')

@push('styles')
<style>
    .post-image-gallery img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 15px;
        cursor: pointer;
        transition: transform 0.2s;
    }

    .post-image-gallery img:hover {
        transform: scale(1.05);
    }

    .content-preview {
        line-height: 1.8;
        font-size: 15px;
    }
</style>
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Просмотр поста</h1>
        <div class="section-header-button">
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Редактировать
            </a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Панель управления</a></div>
            <div class="breadcrumb-item"><a href="{{ route('posts.index') }}">Посты</a></div>
            <div class="breadcrumb-item">Просмотр</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Информация о посте</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="text-muted">Категория</label>
                            <div>
                                <span class="badge badge-primary badge-lg">
                                    {{ $post->category->translations->first()->name ?? $post->category->slug }}
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="text-muted">Slug</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $post->slug }}" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-muted">Дата публикации</label>
                                    <div>
                                        <i class="far fa-calendar"></i> {{ $post->published_at->format('d.m.Y') }}
                                        <span class="ml-2">
                                            <i class="far fa-clock"></i> {{ $post->published_at->format('H:i') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-muted">Просмотры</label>
                                    <div>
                                        <i class="fas fa-eye"></i> {{ number_format($post->views_count) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                        $images = is_array($post->images) ? $post->images : (json_decode($post->images, true) ?? []);
                        @endphp

                        @if(!empty($images))
                        <div class="form-group">
                            <label class="text-muted">Изображения ({{ count($images) }})</label>
                            <div class="row post-image-gallery">
                                @foreach($images as $image)
                                <div class="col-md-4">
                                    <img src="{{ Storage::url($image) }}"
                                        alt="Post image"
                                        onclick="showImageModal('{{ Storage::url($image) }}')">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Translations -->
                <div class="card">
                    <div class="card-header">
                        <h4>Переводы</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" id="languageTabs" role="tablist">
                            @foreach($post->translations as $index => $translation)
                            <li class="nav-item">
                                <a class="nav-link {{ $index === 0 ? 'active' : '' }}"
                                    id="lang-{{ $translation->lang_code }}-tab"
                                    data-toggle="pill"
                                    href="#lang-{{ $translation->lang_code }}"
                                    role="tab">
                                    {{ strtoupper($translation->lang_code) }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="tab-content" id="languageTabsContent">
                            @foreach($post->translations as $index => $translation)
                            <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                id="lang-{{ $translation->lang_code }}"
                                role="tabpanel">
                                <h5 class="mb-3">{{ $translation->title }}</h5>
                                <div class="content-preview">
                                    {!! $translation->content !!}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Действия</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block mb-2">
                            <i class="fas fa-edit"></i> Редактировать
                        </a>
                        <button type="button" class="btn btn-danger btn-block" onclick="confirmDelete()">
                            <i class="fas fa-trash"></i> Удалить
                        </button>
                        <form id="delete-form" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        <hr>
                        <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-block">
                            <i class="fas fa-arrow-left"></i> Назад к списку
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>Метаданные</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <small class="text-muted">Создан</small>
                            <div>{{ $post->created_at->format('d.m.Y H:i') }}</div>
                        </div>
                        <div class="form-group mb-2">
                            <small class="text-muted">Обновлен</small>
                            <div>{{ $post->updated_at->format('d.m.Y H:i') }}</div>
                        </div>
                        <div class="form-group mb-0">
                            <small class="text-muted">ID</small>
                            <div>#{{ $post->id }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <img id="modalImage" src="" class="img-fluid w-100" alt="Image">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            iziToast.success({
                title: 'Скопировано!',
                message: 'Slug скопирован в буфер обмена',
                position: 'topRight'
            });
        });
    }

    function showImageModal(imageUrl) {
        $('#modalImage').attr('src', imageUrl);
        $('#imageModal').modal('show');
    }

    function confirmDelete() {
        swal({
            title: 'Вы уверены?',
            text: 'Это действие нельзя отменить!',
            icon: 'warning',
            buttons: {
                cancel: {
                    text: 'Отмена',
                    value: null,
                    visible: true,
                    className: "btn btn-secondary",
                    closeModal: true,
                },
                confirm: {
                    text: 'Да, удалить!',
                    value: true,
                    visible: true,
                    className: "btn btn-danger",
                    closeModal: true
                }
            },
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                document.getElementById('delete-form').submit();
            }
        });
    }
</script>
@endpush