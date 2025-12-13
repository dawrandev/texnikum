@extends('layouts.main')

@section('title', 'Интерактивные услуги')

@push('styles')
<link rel="stylesheet" href="{{ URL::asset('assets/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Интерактивные услуги</h1>
        <div class="section-header-button">
            <a href="{{ route('interactive-services.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Добавить услугу
            </a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Панель управления</a></div>
            <div class="breadcrumb-item">Интерактивные услуги</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Все услуги</h4>
                    </div>
                    <div class="card-body">
                        @if($services->isEmpty())
                        <div class="empty-state" data-height="400">
                            <div class="empty-state-icon">
                                <i class="fas fa-hand-pointer"></i>
                            </div>
                            <h2>Нет услуг</h2>
                            <p class="lead">У вас еще нет ни одной интерактивной услуги. Добавьте первую услугу!</p>
                            <a href="{{ route('interactive-services.create') }}" class="btn btn-primary mt-4">
                                <i class="fas fa-plus"></i> Добавить услугу
                            </a>
                        </div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="servicesTable">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">#</th>
                                        <th>Название</th>
                                        <th style="width: 200px;">URL</th>
                                        <th style="width: 150px;">Дата создания</th>
                                        <th style="width: 120px;" class="text-center">Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($services as $index => $service)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <strong>{{ $service->title }}</strong>
                                        </td>
                                        <td>
                                            @if($service->url && $service->url !== '#')
                                            <a href="{{ $service->url }}" target="_blank" class="text-dark">
                                                <i class="fas fa-external-link-alt"></i>
                                                {{ Str::limit($service->url, 30) }}
                                            </a>
                                            @else
                                            <span class="text-muted">
                                                <i class="fas fa-minus"></i> Не указан
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            <i class="far fa-calendar"></i> {{ $service->created_at->format('d.m.Y') }}
                                            <br>
                                            <small class="text-muted">
                                                <i class="far fa-clock"></i> {{ $service->created_at->format('H:i') }}
                                            </small>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary"
                                                onclick="editService({{ $service->id }})"
                                                data-toggle="tooltip"
                                                title="Редактировать">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger"
                                                onclick="deleteItem({{ $service->id }}, 'interactive-services')"
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
$hasServices = !$services->isEmpty();
@endphp

<script>
    $(document).ready(function() {
        @if($hasServices)
        $('#servicesTable').DataTable({
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
                [3, "desc"]
            ],
            "pageLength": 10
        });
        @endif

        $('[data-toggle="tooltip"]').tooltip();
    });

    function editService(id) {
        fetch(`/admin/interactive-services/${id}/edit-modal`)
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.text();
            })
            .then(html => {
                document.getElementById('dynamicModalContainer').innerHTML = html;

                setTimeout(function() {
                    const modal = $('#editServiceModal');
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