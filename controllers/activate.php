<?php
include_once("../models/User.php");

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $user = new User();

    if ($user->activateAccount($token)) {
        // Redirigir a inicio de sesión con mensaje
        header("Location: ../index.php?page=login&message=Cuenta activada. Inicie sesión.");
        exit;
    } else {
        // Redirigir a inicio de sesión con mensaje de error
        header("Location: ../index.php?page=login&message=Token no válido o cuenta ya activada.");
        exit;
    }
} else {
    // Redirigir a inicio de sesión si no hay token
    header("Location: ../index.php?page=login&message=Token no proporcionado.");
    exit;
}
?>
