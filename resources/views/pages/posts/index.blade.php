@extends('layouts.main')

@section('title', 'Посты')

@push('styles')
<link rel="stylesheet" href="{{ URL::asset('assets/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Посты</h1>
        <div class="section-header-button">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Создать пост
            </a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Панель управления</a></div>
            <div class="breadcrumb-item">Посты</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Все посты</h4>
                        <div class="card-header-form">
                            <form method="GET" id="filterForm">
                                <div class="input-group">
                                    <select name="lang" id="langFilter" class="form-control" style="width: 150px;">
                                        <option value="">Все языки</option>
                                        @foreach(\App\Models\Language::all() as $language)
                                        <option value="{{ $language->code }}" {{ request('lang') == $language->code ? 'selected' : '' }}>
                                            {{ $language->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <select name="category" id="categoryFilter" class="form-control ml-2" style="width: 180px;">
                                        <option value="">Все категории</option>
                                        @foreach(\App\Models\Category::all() as $category)
                                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->translations->first()->name ?? $category->slug }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-btn ml-2">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-filter"></i> Фильтр
                                        </button>
                                        @if(request('lang') || request('category'))
                                        <a href="{{ route('posts.index') }}" class="btn btn-secondary ml-1">
                                            <i class="fas fa-times"></i> Сбросить
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($posts->isEmpty())
                        <div class="empty-state" data-height="400">
                            <div class="empty-state-icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <h2>Нет постов</h2>
                            <p class="lead">
                                @if(request('lang') || request('category'))
                                По выбранным фильтрам посты не найдены.
                                @else
                                У вас еще нет ни одного поста. Создайте свой первый пост!
                                @endif
                            </p>
                            <a href="{{ route('posts.create') }}" class="btn btn-primary mt-4">
                                <i class="fas fa-plus"></i> Создать пост
                            </a>
                        </div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="postsTable">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">#</th>
                                        <th style="width: 100px;">Изображение</th>
                                        <th>Заголовок</th>
                                        <th style="width: 150px;">Категория</th>
                                        <th style="width: 100px;">Языки</th>
                                        <th style="width: 100px;">Просмотры</th>
                                        <th style="width: 150px;">Дата публикации</th>
                                        <th style="width: 150px;" class="text-center">Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $index => $post)
                                    @php
                                    $selectedLang = request('lang') ?: 'en';
                                    $translation = $post->translations->firstWhere('lang_code', $selectedLang)
                                    ?? $post->translations->first();
                                    $images = is_array($post->images) ? $post->images : (json_decode($post->images, true) ?? []);
                                    $firstImage = !empty($images) ? $images[0] : null;
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @if($firstImage)
                                            <img src="{{ Storage::url($firstImage) }}"
                                                alt="{{ $translation->title ?? 'Post image' }}"
                                                class="rounded"
                                                style="width: 80px; height: 60px; object-fit: cover;">
                                            @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                                style="width: 80px; height: 60px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ Str::limit($translation->title ?? 'No title', 50) }}</strong>
                                        </td>
                                        <td>
                                            @if($post->category)
                                            <span class="badge badge-primary">
                                                {{ $post->category->translations->first()->name ?? $post->category->slug }}
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            @foreach($post->translations as $trans)
                                            <span class="badge badge-info mb-1">{{ strtoupper($trans->lang_code) }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <i class="fas fa-eye text-muted"></i> {{ number_format($post->views_count) }}
                                        </td>
                                        <td>
                                            <i class="far fa-calendar"></i> {{ $post->published_at->format('d.m.Y') }}
                                            <br>
                                            <small class="text-muted">
                                                <i class="far fa-clock"></i> {{ $post->published_at->format('H:i') }}
                                            </small>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('posts.show', $post->id) }}"
                                                    class="btn btn-sm btn-info"
                                                    data-toggle="tooltip"
                                                    title="Просмотр">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('posts.edit', $post->id) }}"
                                                    class="btn btn-sm btn-primary"
                                                    data-toggle="tooltip"
                                                    title="Редактировать">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button"
                                                    class="btn btn-sm btn-danger"
                                                    data-toggle="tooltip"
                                                    title="Удалить"
                                                    onclick="confirmDelete({{ $post->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            <form id="delete-form-{{ $post->id }}"
                                                action="{{ route('posts.destroy', $post->id) }}"
                                                method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script src="{{ URL::asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/page/datatables.js') }}"></script>


@php
$hasPosts = !$posts -> isEmpty();
@endphp
<script>
    $(document).ready(function() {
        // Initialize DataTable

        @if($hasPosts)
        $('#postsTable').DataTable({
            "language": {
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Показано с _START_ по _END_ из _TOTAL_ записей",
                "infoEmpty": "Нет записей для отображения",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "paginate": {
                    "first": "Первая",
                    "last": "Последняя",
                    "next": "Следующая",
                    "previous": "Предыдущая"
                },
                "zeroRecords": "Ничего не найдено"
            },
            "order": [
                [6, "desc"]
            ],
            "pageLength": 10
        });
        @endif

        // Initialize tooltips
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

@endpush