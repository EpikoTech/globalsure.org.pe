<?php

require_once(__DIR__ . '/../PHPMailer/src/PHPMailer.php');
require_once(__DIR__ . '/../PHPMailer/src/SMTP.php'); // Si necesitas SMTP
require_once(__DIR__ . '/../PHPMailer/src/Exception.php'); // Si necesitas Exception

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once(__DIR__ . '/../utils/Database.php');

class User {  
    public $database;

    function __construct() {    
        $this->database = new Database(); // Instanciando la clase Database
    }

    public function getInfo() {
        $sql = "SELECT * FROM usuarios"; // Consulta para obtener todos los usuarios
        $resultado = $this->database->query($sql);    
        return $resultado; // Retorna los resultados
    }

    public function register($datos) {
        return $this->database->insert('usuarios', $datos); // Inserta un nuevo usuario
    }
    //metodo para login
    public function getUserByUsername($username) {
        $sql = "SELECT id, username, password, nombres, apellidos, is_admin, activo FROM usuarios WHERE username = ?";
        $stmt = $this->database->prepare($sql); // Prepara la consulta
        $stmt->bind_param("s", $username); // Vincula el parámetro
        $stmt->execute(); // Ejecuta la consulta
        $result = $stmt->get_result(); // Obtiene los resultados
        return $result->fetch_assoc(); // Devuelve los datos del usuario
    }
    

    //Token de Activación:
    public function setToken($userId, $token) {
        $sql = "UPDATE usuarios SET token = ? WHERE id = ?";
        $stmt = $this->database->prepare($sql);
        $stmt->bind_param("si", $token, $userId);
        return $stmt->execute();
    }

    public function activateAccount($token) {
        // Preparar la consulta para verificar el token
        $sql = "SELECT * FROM usuarios WHERE token = ? AND activo = 0";
        $stmt = $this->database->prepare($sql);
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        // Comprobar si existe un usuario con ese token
        if ($result->num_rows > 0) {
            // Actualizar el estado de la cuenta
            $updateSql = "UPDATE usuarios SET activo = 1, token = NULL WHERE token = ?";
            $updateStmt = $this->database->prepare($updateSql);
            $updateStmt->bind_param("s", $token);
            $updateStmt->execute();
            return true; // Activación exitosa
        }

        return false; // Token no válido o cuenta ya activada
    }

    public function sendActivationEmail($email, $token) {
        // Configuración de PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'juandavion445@gmail.com';
            $mail->Password = 'ptambwgfdgpinbvf';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
    
            $mail->setFrom('juandavion445@gmail.com', 'GLOBALSURE');
            $mail->addAddress($email);
    
            $mail->isHTML(true);
            $mail->Subject = 'Activación de cuenta';
            $mail->Body = 'Haz clic en el siguiente enlace para activar tu cuenta: http://localhost/globalsure.org.pe/controllers/activate.php?token=' . $token;
    
            return $mail->send(); // Devuelve true si se envía correctamente
        } catch (Exception $e) {
            error_log("Error al enviar el correo: " . $mail->ErrorInfo); // Registra el error
            return false; // Devuelve false en caso de error
        }
    }
}
