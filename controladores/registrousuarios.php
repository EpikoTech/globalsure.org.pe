<?php
require_once './modelos/usuarios.php'; // Asegúrate de que esta ruta sea correcta

class RegisterController {
    public function register() {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "Formulario enviado.";
            // Recoger los datos del formulario
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $dni = $_POST['dni'];
            $email = $_POST['email'];
            $celular = $_POST['celular'];
            $fechaNacimiento = $_POST['fecha_nacimiento'];

            // Validar que las contraseñas coincidan
            if ($password !== $confirmPassword) {
                $error = "Las contraseñas no coinciden.";
            } else {
                // Hash del password para mayor seguridad
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Intentar registrar el usuario
                $result = User::registrarUsuario($username, $hashedPassword, $nombres, $apellidos, $dni, $email, $celular, $fechaNacimiento);

                if ($result) {
                    header('Location: index.php');
                    exit;
                } else {
                    $error = "Error al registrar el usuario. Intente de nuevo.";
                }                
            }
        }

        require './vistas/registro2.php'; // Cargar la vista de registro
    }
}
?>
