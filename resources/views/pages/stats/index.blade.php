@extends('layouts.main')

@section('title', 'Статистика')

@push('styles')
<link rel="stylesheet" href="{{ URL::asset('assets/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Статистика</h1>
        <div class="section-header-button">
            <a href="{{ route('stats.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Добавить статистику
            </a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Панель управления</a></div>
            <div class="breadcrumb-item">Статистика</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Все данные</h4>
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
                                        <a href="{{ route('stats.index') }}" class="btn btn-secondary ml-1">
                                            <i class="fas fa-times"></i> Сбросить
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($stats->isEmpty())
                        <div class="empty-state" data-height="400">
                            <div class="empty-state-icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                            <h2>Нет статистики</h2>
                            <p class="lead">
                                @if(request('lang'))
                                По выбранному языку статистика не найдена.
                                @else
                                У вас еще нет данных статистики. Добавьте первую запись!
                                @endif
                            </p>
                            <a href="{{ route('stats.create') }}" class="btn btn-primary mt-4">
                                <i class="fas fa-plus"></i> Добавить статистику
                            </a>
                        </div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="statsTable">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">#</th>
                                        <th>Название</th>
                                        <th style="width: 120px;">Количество</th>
                                        <th style="width: 100px;">Языки</th>
                                        <th style="width: 150px;">Дата создания</th>
                                        <th style="width: 120px;" class="text-center">Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stats as $index => $stat)
                                    @php
                                    $selectedLang = request('lang') ?: 'en';
                                    $translation = $stat->translations->firstWhere('lang_code', $selectedLang)
                                    ?? $stat->translations->first();
                                    @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <strong>{{ $translation->title ?? 'No title' }}</strong>
                                        </td>
                                        <td>
                                            <span class="badge badge-primary badge-lg">
                                                <i class="fas fa-hashtag"></i> {{ number_format($stat->count) }}
                                            </span>
                                        </td>
                                        <td>
                                            @foreach($stat->translations as $trans)
                                            <span class="badge badge-info mb-1">{{ strtoupper($trans->lang_code) }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <i class="far fa-calendar"></i> {{ $stat->created_at->format('d.m.Y') }}
                                            <br>
                                            <small class="text-muted">
                                                <i class="far fa-clock"></i> {{ $stat->created_at->format('H:i') }}
                                            </small>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary"
                                                onclick="editStat({{ $stat->id }})"
                                                data-toggle="tooltip"
                                                title="Редактировать">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="deleteItem({{ $stat->id }}, 'stats')"
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
$hasStats = !$stats->isEmpty();
@endphp

<script>
    $(document).ready(function() {
        @if($hasStats)
        $('#statsTable').DataTable({
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

    function editStat(id) {
        fetch(`/admin/stats/${id}/edit-modal`)
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.text();
            })
            .then(html => {
                document.getElementById('dynamicModalContainer').innerHTML = html;

                setTimeout(function() {
                    const modal = $('#editStatModal');
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