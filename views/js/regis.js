document.getElementById('registroForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el comportamiento predeterminado del formulario

    const formData = new FormData(this); // Recoge los datos del formulario

    // Realizar la solicitud con Fetch
    fetch('../controllers/register.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('La respuesta de la red no fue correcta');
        }
        return response.json(); // Analizar la respuesta JSON
    })
    .then(result => {
        const modalMessage = document.getElementById('modalMessage');
        const modal = document.getElementById('activationModal'); // Definir el modal correctamente

        // Mostrar mensaje de éxito o de error
        if (result.success) {
            modalMessage.textContent = "Registro exitoso. ID de usuario: " + result.message.split(": ")[1] + "\n" +
                                       "Se ha enviado un correo de activación. Revisa tu bandeja de entrada.";
            modal.style.display = "block"; // Mostrar el modal de éxito
        } else {
            // Mostrar los errores
            let errorMessages = "Hubo un problema con el registro:\n";
            for (let field in result.errors) {
                errorMessages += `${field}: ${result.errors[field]}\n`; // Mostrar todos los errores de manera clara
            }
            modalMessage.textContent = errorMessages;
            modal.style.display = "block"; // Mostrar el modal con los errores
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("Ocurrió un error al procesar la solicitud."); // Mostrar alerta de error si falla la solicitud
    });

    // Cerrar el modal cuando se hace clic en la "X"
    const closeModal = document.getElementsByClassName("close")[0];
    closeModal.addEventListener('click', function() {
        const modal = document.getElementById('activationModal'); // Asegurarse de que modal esté definido
        modal.style.display = "none"; // Cerrar el modal
    });

    // Cerrar el modal si el usuario hace clic fuera del contenido del modal
    window.addEventListener('click', function(event) {
        const modal = document.getElementById('activationModal'); // Asegurarse de que modal esté definido
        if (event.target === modal) {  // Si se hace clic fuera del modal (en el fondo)
            modal.style.display = "none"; // Cerrar el modal
        }
    });
});
