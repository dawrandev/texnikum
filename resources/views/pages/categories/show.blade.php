<div class="modal fade" id="showCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Просмотр категории</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="font-weight-bold">Slug:</label>
                    <p><code>{{ $category->slug }}</code></p>
                </div>

                <hr>

                <h6 class="mb-3 font-weight-bold">Переводы:</h6>

                <div class="row">
                    @foreach($category->translations as $translation)
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <i class="fas fa-language text-primary"></i>
                                    {{ strtoupper($translation->lang_code) }}
                                </h6>
                                <p class="card-text mb-0">
                                    <strong>Название:</strong> {{ $translation->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @if($category->posts_count > 0)
                <div class="alert alert-info mt-3">
                    <i class="fas fa-info-circle"></i>
                    В этой категории <strong>{{ $category->posts_count }}</strong> постов
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" onclick="$('#showCategoryModal').modal('hide'); editCategory({{ $category->id }});">
                    <i class="fas fa-edit"></i> Редактировать
                </button>
            </div>
        </div>
    </div>
</div>