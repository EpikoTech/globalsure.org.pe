<?php
session_start(); // Inicia la sesión al comienzo del archivo

include_once("../models/User.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Crear una instancia de User
    $user = new User();

    // Verificar si el usuario existe
    $usuario = $user->getUserByUsername($username);

    if ($usuario) {
        if ($usuario['activo'] == 0) {
            echo json_encode(["success" => false, "message" => "La cuenta no está activada."]);
            exit;
        }

        if (password_verify($password, $usuario['password'])) {
            // Inicia la sesión
            $_SESSION['user_id'] = $usuario['id']; // Almacena el ID del usuario en la sesión
            $_SESSION['username'] = $usuario['username']; // Almacena el nombre de usuario
            $_SESSION['is_admin'] = $usuario['is_admin']; // Almacena si es administrador

            // Establece la cookie para recordar al usuario durante 30 días
            setcookie('user_id', $usuario['id'], time() + (30 * 24 * 60 * 60), '/'); // 30 días
            setcookie('username', $usuario['username'], time() + (30 * 24 * 60 * 60), '/');
            setcookie('is_admin', $usuario['is_admin'], time() + (30 * 24 * 60 * 60), '/');
            // Responder con éxito
            echo json_encode(["success" => true, "nombre" => $usuario['nombres'], "is_admin" => $usuario['is_admin']]);
        } 
        else {
            echo json_encode(["success" => false, "message" => "Contraseña incorrecta."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Usuario no encontrado."]);
    }
}
?>
