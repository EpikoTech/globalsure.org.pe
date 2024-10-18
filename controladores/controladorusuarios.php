<?php
require_once './modelos/usuarios.php';

class AuthController {
    public function login() {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = User::validarUsuario($username,$password);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                header('Location: ./vistas/portalglobalsure.php');
                exit;
            } else {
                $error = "Usuario no encontrado.";
            }
        }

        require './vistas/inicio-seccion.php';
    }
}

?>
