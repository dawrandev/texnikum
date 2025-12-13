<div class="modal fade" id="editVideoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактировать видео</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('videos.update', $video->id) }}" method="POST" id="editVideoForm">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_url">URL видео (YouTube) <span class="text-danger">*</span></label>
                        <input type="url"
                            name="url"
                            id="edit_url"
                            class="form-control"
                            value="{{ old('url', $video->url) }}"
                            placeholder="https://www.youtube.com/watch?v=..."
                            required>
                        <small class="form-text text-muted">
                            Поддерживаемые форматы: youtube.com/watch?v=... или youtu.be/...
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="edit_published_at">Дата публикации</label>
                        <input type="datetime-local"
                            name="published_at"
                            id="edit_published_at"
                            class="form-control"
                            value="{{ old('published_at', $video->published_at->format('Y-m-d\TH:i')) }}">
                    </div>

                    <!-- Video Preview -->
                    @php
                    preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $video->url, $matches);
                    $videoId = $matches[1] ?? null;
                    @endphp
                    @if($videoId)
                    <div class="form-group">
                        <label>Текущее видео</label>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                id="editPreviewFrame"
                                src="https://www.youtube.com/embed/{{ $videoId }}"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                    @endif

                    <hr>

                    <label class="mb-3">Переводы <small class="text-muted">(заполните минимум один язык)</small></label>

                    <ul class="nav nav-tabs" id="editLanguageTabs" role="tablist">
                        @foreach($languages as $index => $language)
                        @php
                        $translation = $video->translations->firstWhere('lang_code', $language->code);
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
                        $translation = $video->translations->firstWhere('lang_code', $language->code);
                        @endphp
                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                            id="edit-lang-{{ $language->code }}"
                            role="tabpanel">
                            <div class="form-group">
                                <label for="edit_title_{{ $language->code }}">Заголовок</label>
                                <input type="text"
                                    name="translations[{{ $language->code }}][title]"
                                    id="edit_title_{{ $language->code }}"
                                    class="form-control edit-translation-field"
                                    value="{{ old('translations.'.$language->code.'.title', $translation->title ?? '') }}"
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
                    <button type="submit" class="btn btn-primary" id="editSubmitBtn">
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

        // Video URL preview
        $('#edit_url').on('input', function() {
            const url = $(this).val();
            const videoId = extractVideoId(url);

            if (videoId) {
                $('#editPreviewFrame').attr('src', `https://www.youtube.com/embed/${videoId}`);
            }
        });

        function extractVideoId(url) {
            const regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            const match = url.match(regExp);
            return (match && match[2].length === 11) ? match[2] : null;
        }

        // Form submission
        $('#editVideoForm').on('submit', function(e) {
            $('[data-lang]').each(function() {
                const langCode = $(this).data('lang');
                checkEditTranslationComplete(langCode);
            });

            let isValid = true;
            let errorMessage = '';

            if (!$('#edit_url').val()) {
                isValid = false;
                errorMessage += 'Пожалуйста, введите URL видео.\n';
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

            $('#editSubmitBtn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Сохранение...');
        });
    });
</script>