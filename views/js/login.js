$(document).ready(function() {
    $('#loginForm').on('submit', function(event) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario

        $.ajax({
            url: '/globalsure.org.pe/controllers/login.php', 
            method: 'POST',
            data: $(this).serialize(), // Serializa los datos del formulario
            success: function(response) {
                const result = JSON.parse(response); // Analiza la respuesta JSON
                if (result.success) {
                    window.location.href = 'views/sureglobal.php';// Redirige a la página
                } else {
                    alert(result.message || "Error en el inicio de sesión."); // Muestra el mensaje de error
                }
            },
            error: function() {
                alert("Ocurrió un error al procesar la solicitud.");
            }
        });
    });
});
