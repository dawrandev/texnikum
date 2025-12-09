@if(session('alert'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        swal({
            title: '{{ session("alert.type") === "success" ? "Muvaffaqiyatli!" : (session("alert.type") === "error" ? "Xatolik!" : (session("alert.type") === "warning" ? "Ogohlantirish!" : "Ma\'lumot")) }}',
            text: '{{ session("alert.message") }}',
            icon: '{{ session("alert.type") }}',
            button: 'OK',
        });
    });
</script>
@endif