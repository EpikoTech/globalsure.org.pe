$(document).ready(function() {
    $('#loginForm').on('submit', function(event) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario

        $.ajax({
            url: '/globalsure.org.pe/controllers/login.php', // URL al que se hace la solicitud
            method: 'POST',
            data: $(this).serialize(), // Serializa los datos del formulario
            success: function(response) {
                console.log(response); // Muestra la respuesta cruda para depuración
                try {
                    const result = JSON.parse(response); // Analiza la respuesta JSON
                    if (result.success) {
                        alert("Bienvenido, " + result.nombre); // Mensaje de bienvenida

                        // Redirigir según el tipo de usuario
                        if (result.is_admin == 1) {
                            // Si es administrador, redirigir a la página de administración
                            window.location.href = '/globalsure.org.pe/views/admin.php'; 
                        } else {
                            // Si es un usuario normal, redirigir a la tienda
                            window.location.href = '/globalsure.org.pe/views/sureglobal.php'; 
                        }
                    } else {
                        // En caso de error en la respuesta, muestra un mensaje más claro
                        alert(result.message || "Error en el inicio de sesión.");
                    }
                } catch (e) {
                    // Si ocurre un error al procesar la respuesta JSON
                    alert("Error al procesar la respuesta del servidor. Intente nuevamente.");
                    console.error("Error en JSON parse:", e);  // Para más detalles en la consola
                }
            },
            error: function(xhr, status, error) {
                // Error general de AJAX, por ejemplo si no se puede conectar con el servidor
                alert("Ocurrió un error al procesar la solicitud. Intente nuevamente.");
                console.error("AJAX Error: ", error);  // Para más detalles del error AJAX
            }
        });
    });
});
