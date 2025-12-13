@extends('layouts.main')

@section('title', 'Видео')

@push('styles')
<link rel="stylesheet" href="{{ URL::asset('assets/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Видео</h1>
        <div class="section-header-button">
            <a href="{{ route('videos.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Добавить видео
            </a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Панель управления</a></div>
            <div class="breadcrumb-item">Видео</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Все видео</h4>
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
                                    <div class="input-group-btn ml-2">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-filter"></i> Фильтр
                                        </button>
                                        @if(request('lang'))
                                        <a href="{{ route('videos.index') }}" class="btn btn-secondary ml-1">
                                            <i class="fas fa-times"></i> Сбросить
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($videos->isEmpty())
                        <div class="empty-state" data-height="400">
                            <div class="empty-state-icon">
                                <i class="fas fa-video"></i>
                            </div>
                            <h2>Нет видео</h2>
                            <p class="lead">
                                @if(request('lang'))
                                По выбранному языку видео не найдены.
                                @else
                                У вас еще нет ни одного видео. Добавьте свое первое видео!
                                @endif
                            </p>
                            <a href="{{ route('videos.create') }}" class="btn btn-primary mt-4">
                                <i class="fas fa-plus"></i> Добавить видео
                            </a>
                        </div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="videosTable">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">#</th>
                                        <th style="width: 150px;">Превью</th>
                                        <th>Заголовок</th>
                                        <th style="width: 100px;">Языки</th>
                                        <th style="width: 150px;">Дата публикации</th>
                                        <th style="width: 120px;" class="text-center">Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($videos as $index => $video)
                                    @php
                                    $selectedLang = request('lang') ?: 'en';
                                    $translation = $video->translations->firstWhere('lang_code', $selectedLang)
                                    ?? $video->translations->first();

                                    // Extract YouTube video ID
                                    preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $video->url, $matches);
                                    $videoId = $matches[1] ?? null;
                                    $thumbnail = $videoId ? "https://img.youtube.com/vi/{$videoId}/mqdefault.jpg" : null;
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            @if($thumbnail)
                                            <img src="{{ $thumbnail }}"
                                                alt="Video thumbnail"
                                                class="rounded"
                                                style="width: 120px; height: 67px; object-fit: cover;">
                                            @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                                style="width: 120px; height: 67px;">
                                                <i class="fas fa-video text-muted"></i>
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ Str::limit($translation->title ?? 'No title', 60) }}</strong>
                                            <br>
                                            <small class="text-muted">
                                                <i class="fab fa-youtube"></i>
                                                <a href="{{ $video->url }}" target="_blank" class="text-muted">
                                                    {{ Str::limit($video->url, 40) }}
                                                </a>
                                            </small>
                                        </td>
                                        <td>
                                            @foreach($video->translations as $trans)
                                            <span class="badge badge-info mb-1">{{ strtoupper($trans->lang_code) }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <i class="far fa-calendar"></i> {{ $video->published_at->format('d.m.Y') }}
                                            <br>
                                            <small class="text-muted">
                                                <i class="far fa-clock"></i> {{ $video->published_at->format('H:i') }}
                                            </small>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary"
                                                onclick="editVideo({{ $video->id }})"
                                                data-toggle="tooltip"
                                                title="Редактировать">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="deleteItem({{ $video->id }}, 'videos')"
                                                data-toggle="tooltip"
                                                title="Удалить">
                                                <i class="fas fa-trash"></i>
                                            </button>
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

<!-- Dynamic Modal Container -->
<div id="dynamicModalContainer"></div>
@endsection

@push('script')
<script src="{{ URL::asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>

@php
$hasVideos = !$videos->isEmpty();
@endphp

<script>
    $(document).ready(function() {
        @if($hasVideos)
        $('#videosTable').DataTable({
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
                [4, "desc"]
            ],
            "pageLength": 10
        });
        @endif

        $('[data-toggle="tooltip"]').tooltip();
    });

    function editVideo(id) {
        fetch(`/admin/videos/${id}/edit-modal`)
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.text();
            })
            .then(html => {
                document.getElementById('dynamicModalContainer').innerHTML = html;

                setTimeout(function() {
                    const modal = $('#editVideoModal');
                    if (modal.length) {
                        $('.modal-backdrop').remove();
                        $('body').removeClass('modal-open');
                        modal.modal('show');
                    } else {
                        swal('Ошибка!', 'Модальное окно не загружено', 'error');
                    }
                }, 100);
            })
            .catch(error => {
                console.error('Error:', error);
                swal('Ошибка!', 'Не удалось загрузить данные: ' + error.message, 'error');
            });
    }
</script>
@endpush