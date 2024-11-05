<?php
session_start();
include_once('utils/Database.php');
include_once('models/User.php');
include_once('routes/Router.php');

$router = new Router();

// Verifica si hay una sesión activa
if (isset($_SESSION['user_id'])) {
    // Redirige a la tienda si ya hay sesión iniciada
    header("Location: views/sureglobal.php");
    exit();
}

// Definir las rutas
$router->addRoute('login', 'views/login.php');
$router->addRoute('register', 'views/registro.php');

$page = isset($_GET['page']) ? $_GET['page'] : 'login';
$router->route($page);

?>
