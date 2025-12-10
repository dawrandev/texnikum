@extends('layouts.main')

@section('title', 'Категории')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Категории</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Панель управления</a></div>
            <div class="breadcrumb-item">Категории</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Все категории</h4>
                        <div class="card-header-action">
                            <a href="{{ route('categories.create') }}" class="btn btn-primary">
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
                                        <th>Название</th>
                                        <th>Slug</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($category->translations->isNotEmpty())
                                            {{ $category->translations->first()->name }}
                                            @else
                                            <span class="text-muted">Нет перевода</span>
                                            @endif
                                        </td>
                                        <td><code>{{ $category->slug }}</code></td>
                                        <td>
                                            <button class="btn btn-info btn-sm" onclick="showCategory({{ $category->id }})" title="Просмотр">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-primary btn-sm" onclick="editCategory({{ $category->id }})" title="Редактировать">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm" onclick="deleteItem({{ $category->id }}, 'categories')" title="Удалить">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">Категории не найдены</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if(method_exists($categories, 'hasPages') && $categories->hasPages())
                    <div class="card-footer text-right">
                        {{ $categories->links() }}
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
    function showCategory(id) {
        fetch(`/admin/categories/${id}/show-modal`)
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.text();
            })
            .then(html => {
                // Clear previous modal and insert new one
                document.getElementById('dynamicModalContainer').innerHTML = html;

                // Initialize and show the modal using jQuery (works with Bootstrap 4)
                setTimeout(function() {
                    const modal = $('#showCategoryModal');
                    if (modal.length) {
                        // Remove any existing backdrop
                        $('.modal-backdrop').remove();
                        $('body').removeClass('modal-open');

                        // Show modal
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

    function editCategory(id) {
        fetch(`/admin/categories/${id}/edit-modal`)
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.text();
            })
            .then(html => {
                document.getElementById('dynamicModalContainer').innerHTML = html;

                setTimeout(function() {
                    const modal = $('#editCategoryModal');
                    if (modal.length) {
                        $('.modal-backdrop').remove();
                        $('body').removeClass('modal-open');

                        modal.modal('show');

                        const slugInput = document.getElementById('edit_slug');
                        if (slugInput) {
                            slugInput.addEventListener('input', function(e) {
                                this.value = this.value.toLowerCase()
                                    .replace(/[^a-z0-9\s-]/g, '')
                                    .replace(/\s+/g, '-')
                                    .replace(/-+/g, '-');
                            });
                        }
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