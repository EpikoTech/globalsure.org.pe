<?php
session_start();        // Inicia la sesión para acceder a la información de la sesión
session_unset();       // Elimina todas las variables de sesión
session_destroy();     // Destruye la sesión

// Responde con un mensaje en formato JSON indicando que la sesión fue cerrada exitosamente
echo json_encode(["success" => true, "message" => "Sesión cerrada exitosamente."]);
?>
