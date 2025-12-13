<div class="modal fade" id="editStatModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактировать статистику</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('stats.update', $stat->id) }}" method="POST" id="editStatForm">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_count">Число <span class="text-danger">*</span></label>
                        <input type="number"
                            name="count"
                            id="edit_count"
                            class="form-control"
                            value="{{ old('count', $stat->count) }}"
                            min="0"
                            step="1"
                            required>
                        <small class="form-text text-muted">
                            Введите числовое значение статистики
                        </small>
                    </div>

                    <hr>

                    <label class="mb-3">Переводы <small class="text-muted">(заполните минимум один язык)</small></label>

                    <ul class="nav nav-tabs" id="editLanguageTabs" role="tablist">
                        @foreach($languages as $index => $language)
                        @php
                        $translation = $stat->translations->firstWhere('lang_code', $language->code);
                        $hasTranslation = $translation !== null;
                        @endphp
                        <li class="nav-item">
                            <a class="nav-link {{ $index === 0 ? 'active' : '' }}"
                                id="edit-lang-{{ $language->code }}-tab"
                                data-toggle="tab"
                                href="#edit-lang-{{ $language->code }}"
                                role="tab">
                                {{ $language->name }}
                                <span class="badge badge-primary edit-translation-indicator-{{ $language->code }}"
                                    style="{{ $hasTranslation ? '' : 'display:none;' }}">
                                    <i class="fas fa-check"></i>
                                </span>
                            </a>
                        </li>
                        @endforeach
                    </ul>

                    <div class="tab-content mt-3" id="editLanguageTabsContent">
                        @foreach($languages as $index => $language)
                        @php
                        $translation = $stat->translations->firstWhere('lang_code', $language->code);
                        @endphp
                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                            id="edit-lang-{{ $language->code }}"
                            role="tabpanel">
                            <div class="form-group">
                                <label for="edit_title_{{ $language->code }}">Название</label>
                                <input type="text"
                                    name="translations[{{ $language->code }}][title]"
                                    id="edit_title_{{ $language->code }}"
                                    class="form-control edit-translation-field"
                                    value="{{ old('translations.'.$language->code.'.title', $translation->title ?? '') }}"
                                    placeholder="Например: Активных пользователей"
                                    data-lang="{{ $language->code }}">
                            </div>

                            <input type="hidden"
                                name="translations[{{ $language->code }}][lang_code]"
                                value="{{ $language->code }}"
                                class="edit-lang-code-field"
                                data-lang="{{ $language->code }}"
                                {{ ($translation && $translation->title) ? '' : 'disabled' }}>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary" id="editStatSubmitBtn">
                        <i class="fas fa-save"></i> Сохранить изменения
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Track translation completion
        $('.edit-translation-field').on('input change', function() {
            const langCode = $(this).data('lang');
            checkEditTranslationComplete(langCode);
        });

        function checkEditTranslationComplete(langCode) {
            const title = $(`input[name="translations[${langCode}][title]"]`).val();

            if (title && title.trim()) {
                $(`.edit-lang-code-field[data-lang="${langCode}"]`).prop('disabled', false);
                $(`.edit-translation-indicator-${langCode}`).show();
            } else {
                $(`.edit-lang-code-field[data-lang="${langCode}"]`).prop('disabled', true);
                $(`.edit-translation-indicator-${langCode}`).hide();
            }
        }

        // Form submission
        $('#editStatForm').on('submit', function(e) {
            $('[data-lang]').each(function() {
                const langCode = $(this).data('lang');
                checkEditTranslationComplete(langCode);
            });

            let isValid = true;
            let errorMessage = '';

            if (!$('#edit_count').val()) {
                isValid = false;
                errorMessage += 'Пожалуйста, введите число.\n';
            }

            let hasTranslation = false;
            $('input[name*="[title]"]').each(function() {
                if ($(this).val().trim()) {
                    hasTranslation = true;
                }
            });

            if (!hasTranslation) {
                isValid = false;
                errorMessage += 'Пожалуйста, заполните хотя бы один заголовок.\n';
            }

            if (!isValid) {
                e.preventDefault();
                alert(errorMessage);
                return false;
            }

            $('#editStatSubmitBtn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Сохранение...');
        });
    });
</script>