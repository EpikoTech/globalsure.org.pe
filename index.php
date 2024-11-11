<?php
session_start(); // Inicia la sesión al inicio del archivo

include_once('utils/Database.php');
include_once('models/User.php');
include_once('routes/Router.php');

// Crear una instancia del enrutador
$router = new Router();

// Verifica si ya hay una sesión activa
if (isset($_SESSION['user_id'])) {
    // Si ya está logueado, redirige a la tienda (o al admin dependiendo de su rol)
    if ($_SESSION['role'] === 'admin') {
        // Redirigir al administrador
        header("Location: views/admin.php");
        exit();
    } else {
        // Redirigir al usuario normal (tienda)
        header("Location: views/sureglobal.php");
        exit();
    }
}

// Definir las rutas del enrutador
$router->addRoute('login', 'views/login.php');
$router->addRoute('register', 'views/registro.php');
$router->addRoute('admin', 'views/admin.php'); // Ruta para admin
$router->addRoute('suregobal', 'views/sureglobal.php'); // Ruta para tienda de usuario

// Obtener la página que se solicita en la URL, si no está definida, redirige a 'login'
$page = isset($_GET['page']) ? $_GET['page'] : 'login';

// Llamar al enrutador para manejar la ruta
$router->route($page);
?>
