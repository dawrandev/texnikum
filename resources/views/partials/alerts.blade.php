@if(session('alert'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        swal({
            title: '{{ session("alert.type") === "success" ? "Успешно!" : (session("alert.type") === "error" ? "Ошибка!" : (session("alert.type") === "warning" ? "Предупреждение!" : "Информация")) }}',
            text: '{{ session("alert.message") }}',
            icon: '{{ session("alert.type") }}',
            button: 'ОК',
        });
    });
</script>
@endif