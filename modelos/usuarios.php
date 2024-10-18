<?php
require_once 'Database.php'; // Asegúrate de que este archivo también exista

class User {
    public static function validarUsuario($username, $password) {
        $pdo = Database::getInstance();
        // Prepara la consulta para buscar solo por nombre de usuario
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Verifica si el usuario existe y si la contraseña es correcta
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Retorna el usuario si la validación es exitosa
        }
        return false; // Retorna false si no se encuentra el usuario o la contraseña es incorrecta
    }
    

    public static function registrarUsuario($username, $hashedPassword, $nombres, $apellidos, $dni, $email, $celular, $fechaNacimiento) {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("INSERT INTO usuarios (username, password, nombres, apellidos, dni, email, celular, fecha_nacimiento) VALUES (:username, :password, :nombres, :apellidos, :dni, :email, :celular, :fecha_nacimiento)");
        
        return $stmt->execute([
            'username' => $username,
            'password' => $hashedPassword,
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'dni' => $dni,
            'email' => $email,
            'celular' => $celular,
            'fecha_nacimiento' => $fechaNacimiento
        ]);
    }


}
?>
