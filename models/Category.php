<?php
include_once(__DIR__ . '/../utils/Database.php');

class Category {
    // Obtener todas las categorías
    public static function getAllCategories() {
        $db = new Database();
        $sql = "SELECT * FROM categorias WHERE activo = 1"; // Solo categorías activas
        return $db->query($sql); // Ejecuta la consulta y devuelve los resultados
    }
}
?>
