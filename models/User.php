<?php

include_once(__DIR__ . '/../utils/Database.php');
 // Asegúrate de usar include_once

// Esto es solo para depuración

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

    public function getUserByUsername($username) {
        $sql = "SELECT id, username, password, nombres FROM usuarios WHERE username = ?";
        $stmt = $this->database->prepare($sql); // Prepara la consulta
        $stmt->bind_param("s", $username); // Vincula el parámetro
        $stmt->execute(); // Ejecuta la consulta
        $result = $stmt->get_result(); // Obtiene los resultados
        return $result->fetch_assoc(); // Devuelve los datos del usuario
    }
}
?>
