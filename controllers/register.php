<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

include_once("../models/User.php");

header('Content-Type: application/json'); // Configurar la cabecera para JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nombres = trim($_POST['nombres']);
    $apellidos = trim($_POST['apellidos']);
    $dni = trim($_POST['dni']);
    $email = trim($_POST['email']);
    $celular = trim($_POST['celular']);
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = [];

    // Validaciones
    if (empty($nombres)) {
        $errors['nombres'] = "El campo Nombres es obligatorio.";
    }

    if (empty($apellidos)) {
        $errors['apellidos'] = "El campo Apellidos es obligatorio.";
    }

    if (empty($dni)) {
        $errors['dni'] = "El campo DNI es obligatorio.";
    } elseif (strlen($dni) !== 8 || !ctype_digit($dni)) {
        $errors['dni'] = "El DNI debe tener exactamente 8 dígitos y solo puede contener números.";
    }

    if (empty($email)) {
        $errors['email'] = "El campo Correo es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "El formato del correo electrónico no es válido.";
    }

    if (empty($celular)) {
        $errors['celular'] = "El campo Celular es obligatorio.";
    } elseif (strlen($celular) !== 9 || !ctype_digit($celular)) {
        $errors['celular'] = "El celular debe tener exactamente 9 dígitos y solo puede contener números.";
    }

    if (empty($fecha_nacimiento)) {
        $errors['fecha_nacimiento'] = "El campo Fecha de Nacimiento es obligatorio.";
    }

    if (empty($username)) {
        $errors['username'] = "El campo Usuario es obligatorio.";
    }

    if (empty($password)) {
        $errors['password'] = "El campo Clave es obligatorio.";
    } elseif ($password !== $confirm_password) {
        $errors['password'] = "Las contraseñas no coinciden.";
    }

    // Verifica si hay errores
    if (count($errors) > 0) {
        echo json_encode(['success' => false, 'errors' => $errors]);
        exit; // Detenemos la ejecución si hay errores
    }

    // Crear una instancia de User
    $user = new User();

    // Preparar los datos para registrar
    $datos = [
        'nombres' => $nombres,
        'apellidos' => $apellidos,
        'dni' => $dni,
        'email' => $email,
        'celular' => $celular,
        'fecha_nacimiento' => $fecha_nacimiento,
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'activo' => 0 // El usuario no está activo al registrarse
    ];

    // Llamar al método register
    $resultado = $user->register($datos);

    // Verificar el resultado
if (is_numeric($resultado)) {
    // Generar un token
    $token = bin2hex(random_bytes(16)); // Generar un token aleatorio

    // Almacenar el token en la base de datos
    $user->setToken($resultado, $token); // Guardar el token en la base de datos

    // Enviar el correo de activación
    $mailSent = $user->sendActivationEmail($email, $token); // Implementa este método en User.php

    if ($mailSent) {
        echo json_encode(['success' => true, 'message' => "Registro exitoso. ID de usuario: " . $resultado . ". Se ha enviado un correo de activación."]);
    } else {
        echo json_encode(['success' => false, 'message' => "Registro exitoso. ID de usuario: " . $resultado . ", pero no se pudo enviar el correo de activación."]);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Error en el registro: " . $resultado]);
}

}
?>
