<div class="modal fade" id="editPartnerModal" tabindex="-1" role="dialog" aria-labelledby="editPartnerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPartnerModalLabel">Редактировать партнера</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editPartnerForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="partner_id" value="{{ $partner->id }}">

                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_name">Название <span class="text-danger">*</span></label>
                        <input type="text"
                            name="name"
                            id="edit_name"
                            class="form-control"
                            value="{{ $partner->name }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="edit_logo">Логотип</label>
                        <div class="custom-file">
                            <input type="file"
                                name="logo"
                                id="edit_logo"
                                class="custom-file-input"
                                accept="image/*">
                            <label class="custom-file-label" for="edit_logo">Выберите новый файл</label>
                        </div>
                        <small class="form-text text-muted">
                            Форматы: JPEG, PNG, JPG, GIF, SVG, WEBP. Макс. размер: 2MB. Оставьте пустым, если не хотите менять логотип.
                        </small>

                        <!-- Current Logo Preview -->
                        <div class="mt-3">
                            <label class="d-block">Текущий логотип:</label>
                            <img id="logoPreview"
                                src="{{ asset('storage/' . $partner->logo) }}"
                                alt="{{ $partner->name }}"
                                class="img-thumbnail"
                                style="max-width: 200px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit_url">URL</label>
                        <input type="url"
                            name="url"
                            id="edit_url"
                            class="form-control"
                            value="{{ $partner->url }}"
                            placeholder="https://example.com">
                        <small class="form-text text-muted">
                            Ссылка на сайт партнера (необязательно)
                        </small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Custom file input label for edit modal
    (function() {
        const editLogo = document.getElementById('edit_logo');
        if (!editLogo) return;

        editLogo.addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'Выберите новый файл';
            const label = e.target.nextElementSibling;
            if (label) label.textContent = fileName;
        });
    })();
</script>