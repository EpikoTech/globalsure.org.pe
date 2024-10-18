<?php
class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $host = 'localhost';
        $db = 'globalsure';
        $user = 'root';
        $pass = '';
        
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Conexión fallida: ' . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }
}
?>
