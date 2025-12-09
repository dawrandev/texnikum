<script>
    let deleteUrl = '';
    let deleteMessage = '';

    function deleteItem(id, resource, customMessage = null) {
        deleteUrl = `/admin/${resource}/${id}`;
        deleteMessage = customMessage || `Вы уверены, что хотите удалить этот элемент?`;

        document.getElementById('deleteModalMessage').textContent = deleteMessage;
        $('#deleteModal').modal('show');
    }

    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        const form = document.getElementById('deleteForm');
        form.action = deleteUrl;
        form.submit();
    });
</script>