<?php
session_start();
include_once('utils/Database.php');
include_once('models/User.php');
include_once('routes/Router.php');
  // Cambia esto a ../utils/Database.php
// Incluir la clase Router

$router = new Router();
// Definir las rutas
$router->addRoute('login', 'views/login.php');
$router->addRoute('register', 'views/registro.php');
// Puedes agregar más rutas según sea necesario

$page = isset($_GET['page']) ? $_GET['page'] : 'login';
$router->route($page);
?>
