// logout.js
$(document).ready(function() {
    $('#logoutBtn').on('click', function() {
        $.ajax({
            url: '/globalsure.org.pe/controllers/logout.php',
            method: 'POST',
            success: function(response) {
                const result = JSON.parse(response);  // El parseo del JSON está bien aquí
                if (result.success) {
                    window.location.href = '/globalsure.org.pe/index.php?page=login'; // Redirige al login
                } else {
                    alert(result.message || "Error al cerrar sesión.");
                }
            },
            error: function() {
                alert("Ocurrió un error al procesar la solicitud.");
            }
        });
    });
});
