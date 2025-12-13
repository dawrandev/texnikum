<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактировать интерактивную услугу</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('interactive-services.update', $service->id) }}" method="POST" id="editServiceForm">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_title">Название <span class="text-danger">*</span></label>
                        <input type="text"
                            name="title"
                            id="edit_title"
                            class="form-control"
                            value="{{ old('title', $service->title) }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="edit_url">URL <span class="text-danger">*</span></label>
                        <input type="url"
                            name="url"
                            id="edit_url"
                            class="form-control"
                            value="{{ old('url', $service->url) }}"
                            placeholder="https://example.com/service"
                            required>
                        <small class="form-text text-muted">
                            Введите ссылку на интерактивную услугу
                        </small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary" id="editServiceSubmitBtn">
                        <i class="fas fa-save"></i> Сохранить изменения
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Form submission
        $('#editServiceForm').on('submit', function(e) {
            let isValid = true;
            let errorMessage = '';

            if (!$('#edit_title').val().trim()) {
                isValid = false;
                errorMessage += 'Пожалуйста, введите название.\n';
            }

            if (!$('#edit_url').val().trim()) {
                isValid = false;
                errorMessage += 'Пожалуйста, введите URL.\n';
            }

            if (!isValid) {
                e.preventDefault();
                alert(errorMessage);
                return false;
            }

            $('#editServiceSubmitBtn').prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Сохранение...');
        });
    });
</script>