<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактировать категорию</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_slug">Slug <span class="text-danger">*</span></label>
                        <input type="text" name="slug" id="edit_slug" class="form-control" value="{{ $category->slug }}" required>
                        <small class="form-text text-muted">URL-идентификатор (например: novosti)</small>
                    </div>

                    <hr>
                    <h6 class="mb-3">Переводы</h6>

                    <ul class="nav nav-tabs" id="editLanguageTabs" role="tablist">
                        @foreach($category->translations as $index => $translation)
                        <li class="nav-item">
                            <a class="nav-link {{ $index === 0 ? 'active' : '' }}"
                                id="edit-lang-{{ $translation->lang_code }}-tab"
                                data-toggle="tab"
                                href="#edit-lang-{{ $translation->lang_code }}"
                                role="tab">
                                {{ strtoupper($translation->lang_code) }}
                            </a>
                        </li>
                        @endforeach
                    </ul>

                    <div class="tab-content mt-3" id="editLanguageTabsContent">
                        @foreach($category->translations as $index => $translation)
                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                            id="edit-lang-{{ $translation->lang_code }}"
                            role="tabpanel">
                            <div class="form-group">
                                <label for="edit_name_{{ $translation->lang_code }}">
                                    Название <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                    name="translations[{{ $translation->lang_code }}][name]"
                                    id="edit_name_{{ $translation->lang_code }}"
                                    class="form-control"
                                    value="{{ $translation->name }}"
                                    required>
                                <input type="hidden"
                                    name="translations[{{ $translation->lang_code }}][lang_code]"
                                    value="{{ $translation->lang_code }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Сохранить
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>