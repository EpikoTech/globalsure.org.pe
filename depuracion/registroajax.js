$(document).ready(function() {
    $('#btnRegistrar').click(function(event) {
        event.preventDefault(); // Evitar el envío del formulario tradicional

        // Obtener los valores de los campos del formulario
        const formData = {
            username: $('#username').val(),
            password: $('#password').val(),
            nombres: $('#nombres').val(),
            apellidos: $('#apellidos').val(),
            dni: $('#dni').val(),
            email: $('#email').val(),
            celular: $('#celular').val(),
            fecha_nacimiento: $('#fecha_nacimiento').val(),
        };

        // Enviar los datos al servidor mediante AJAX
        $.ajax({
            type: 'POST',
            url: 'registro.php', // Cambia esto por la ruta a tu archivo PHP
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    alert(response.message); // Mensaje de éxito
                    $('#registroModal').modal('hide'); // Cerrar el modal
                    $('#registroForm')[0].reset(); // Reiniciar el formulario
                } else {
                    alert(response.message); // Mensaje de error
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert("Ocurrió un error al registrar. Intenta nuevamente.");
            }
        });
    });
});
