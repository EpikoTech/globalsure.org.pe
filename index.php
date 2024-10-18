<?php
// Incluye los controladores necesarios
require_once "./controladores/controladorusuarios.php";
require_once "./controladores/registrousuarios.php"; // Asegúrate de que el nombre del archivo sea correcto

// Verificar qué acción se desea realizar
$action = $_GET['action'] ?? 'login'; // Por defecto, se inicia sesión

switch ($action) {
    case 'register':
        $registerController = new RegisterController();
        $registerController->register(); // Llama al método de registro
        break;

    case 'login':
    default:
        $authController = new AuthController();
        $authController->login(); // Llama al método de inicio de sesión
        break;
}
?>
