<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("../models/User.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Crear una instancia de User
    $user = new User();

    // Verificar si el usuario existe
    $usuario = $user->getUserByUsername($username);

    if ($usuario) {
        // Verificar la contraseña
        if (password_verify($password, $usuario['password'])) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "message" => "Contraseña incorrecta."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Usuario no encontrado."]);
    }
}
?>
