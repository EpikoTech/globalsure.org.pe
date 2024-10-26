<?php

include("../models/User.php"); 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $dni = $_POST['dni'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $username = $_POST['username'];
    $password = $_POST['password'];

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
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ];

    // Llamar al método register
    $resultado = $user->register($datos);

    // Verificar el resultado
    if (is_numeric($resultado)) {
        echo "Registro exitoso. ID de usuario: " . $resultado;
    } else {
        echo "Error en el registro: " . $resultado;
    }
}
?>
