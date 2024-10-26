$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault(); // Prevenir el envío del formulario

        $.ajax({
            type: 'POST',
            url: 'login.php', // Ruta al archivo PHP
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    window.location.href = 'portalglobalsure.html'; // Redirigir al dashboard
                } else {
                    $('#errorMessage').text(response.message); // Mostrar mensaje de error en el modal
                    $('#errorModal').modal('show'); // Mostrar el modal
                }
            },
            error: function() {
                $('#errorMessage').text("Ocurrió un error. Inténtalo de nuevo."); // Mensaje de error genérico
                $('#errorModal').modal('show'); // Mostrar el modal
            }
        });
    });
});
