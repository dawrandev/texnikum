@extends('layouts.main')

@section('title', 'Партнеры')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Партнеры</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Панель управления</a></div>
            <div class="breadcrumb-item">Партнеры</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Все партнеры</h4>
                        <div class="card-header-action">
                            <a href="{{ route('partners.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Добавить
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Логотип</th>
                                        <th>Название</th>
                                        <th>URL</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($partners as $partner)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $partner->logo) }}"
                                                alt="{{ $partner->name }}"
                                                class="img-thumbnail"
                                                style="width: 60px; height: 60px; object-fit: cover;">
                                        </td>
                                        <td>{{ $partner->name }}</td>
                                        <td>
                                            @if($partner->url)
                                            <a href="{{ $partner->url }}" target="_blank" class="text-dark">
                                                {{ Str::limit($partner->url, 40) }} <i class="fas fa-external-link-alt"></i>
                                            </a>
                                            @else
                                            <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-info btn-sm"
                                                onclick="showPartner({{ $partner->id }})"
                                                title="Просмотр">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-primary btn-sm"
                                                onclick="editPartner({{ $partner->id }})"
                                                title="Редактировать">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm"
                                                onclick="deletePartner({{ $partner->id }})"
                                                title="Удалить">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Партнеры не найдены</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if(method_exists($partners, 'hasPages') && $partners->hasPages())
                    <div class="card-footer text-right">
                        {{ $partners->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dynamic Modal Container -->
<div id="dynamicModalContainer"></div>
@endsection

@push('script')
<script>
    function showPartner(id) {
        fetch(`/admin/partners/${id}/show-modal`)
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.text();
            })
            .then(html => {
                document.getElementById('dynamicModalContainer').innerHTML = html;

                setTimeout(function() {
                    const modal = $('#showPartnerModal');
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

    function editPartner(id) {
        fetch(`/admin/partners/${id}/edit-modal`)
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.text();
            })
            .then(html => {
                document.getElementById('dynamicModalContainer').innerHTML = html;

                setTimeout(function() {
                    const modal = $('#editPartnerModal');
                    if (modal.length) {
                        $('.modal-backdrop').remove();
                        $('body').removeClass('modal-open');
                        modal.modal('show');

                        // Initialize form submission
                        initEditForm();
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

    function initEditForm() {
        const form = document.getElementById('editPartnerForm');
        if (!form) return;

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            try {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Сохранение...';
                }

                const formData = new FormData(this);
                const partnerId = formData.get('partner_id');

                fetch(`/admin/partners/${partnerId}`, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': (document.querySelector('meta[name="csrf-token"]') ? document.querySelector('meta[name="csrf-token"]').content : '{{ csrf_token() }}')
                        }
                    })
                    .then(response => {
                        const contentType = (response.headers.get('content-type') || '').toLowerCase();
                        if (contentType.includes('application/json')) {
                            return response.json().then(data => ({
                                ok: response.ok,
                                status: response.status,
                                data
                            }));
                        }
                        return response.text().then(text => ({
                            ok: response.ok,
                            status: response.status,
                            text
                        }));
                    })
                    .then(result => {
                        if (result.data) {
                            if (result.data.success) {
                                $('#editPartnerModal').modal('hide');
                                swal('Успешно!', result.data.message, 'success').then(() => location.reload());
                            } else {
                                swal('Ошибка!', result.data.message || 'Не удалось обновить', 'error');
                            }
                        } else {
                            // Non-JSON response (HTML redirect or validation page)
                            const msg = result.text || 'Не удалось обновить партнера';
                            swal('Ошибка!', msg, 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        swal('Ошибка!', 'Произошла ошибка при обновлении', 'error');
                    })
                    .finally(() => {
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = '<i class="fas fa-save"></i> Сохранить изменения';
                        }
                    });
            } catch (err) {
                console.error('Submit error:', err);
                swal('Ошибка!', 'Не удалось отправить форму', 'error');
            }
        });

        // Image preview
        const logoInput = document.getElementById('edit_logo');
        const preview = document.getElementById('logoPreview');

        if (logoInput && preview) {
            logoInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    }

    function deletePartner(id) {
        swal({
            title: 'Вы уверены?',
            text: "Это действие нельзя будет отменить!",
            icon: 'warning',
            buttons: {
                cancel: {
                    text: 'Отмена',
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: true,
                },
                confirm: {
                    text: 'Да, удалить!',
                    value: true,
                    visible: true,
                    className: "bg-danger",
                    closeModal: true
                }
            }
        }).then((willDelete) => {
            if (willDelete) {
                fetch(`/admin/partners/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': (document.querySelector('meta[name="csrf-token"]') ? document.querySelector('meta[name="csrf-token"]').content : '{{ csrf_token() }}'),
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            swal('Удалено!', data.message, 'success').then(() => {
                                location.reload();
                            });
                        } else {
                            swal('Ошибка!', data.message, 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        swal('Ошибка!', 'Произошла ошибка при удалении', 'error');
                    });
            }
        });
    }
</script>
@endpush