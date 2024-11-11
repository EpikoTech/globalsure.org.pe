<?php

include_once(__DIR__ . '/../utils/Database.php'); // Asegúrate de incluir la clase Database

class Product {

    // Obtener todos los productos (ACTIVOS)
    public static function getAllProducts() {
        $db = new Database(); // Creamos la instancia de la clase Database
        $sql = "SELECT * FROM productos WHERE activo = 1"; // Solo productos activos
        return $db->query($sql); // Ejecuta la consulta y devuelve los resultados
    }

    // Obtener un producto por su ID
    public static function getProductById($id) {
        $db = new Database(); // Creamos la instancia de la clase Database
        $sql = "SELECT * FROM productos WHERE id = ? AND activo = 1"; // Producto activo
        $stmt = $db->prepare($sql); // Preparamos la consulta
        $stmt->bind_param("i", $id); // Vinculamos el parámetro (i = entero)
        $stmt->execute(); // Ejecutamos la consulta
        return $stmt->get_result()->fetch_assoc(); // Devuelve el producto si existe
    }

    // Agregar un nuevo producto
    public static function addProduct($data) {
        $db = new Database(); // Creamos la conexión a la base de datos

        // Definir los datos que se van a insertar en la tabla productos
        $productoData = [
            'nombre'      => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'precio'      => $data['precio'],
            'imagen'      => $data['imagen'],
            'stock'       => $data['stock'],
            'activo'      => isset($data['activo']) ? $data['activo'] : 1 // Activo por defecto si no se pasa
        ];

        // Llamamos al método insert de la clase Database
        $insertId = $db->insert('productos', $productoData); 

        // Si la inserción fue exitosa, devuelve el ID del producto insertado
        return $insertId; // Este ID puede ser usado después para redirigir o mostrar un mensaje
    }

    // Actualizar un producto existente
    public static function updateProduct($id, $data) {
        $db = new Database(); // Creamos la conexión a la base de datos

        // Definir los datos que se van a actualizar en la tabla productos
        $productoData = [
            'nombre'      => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'precio'      => $data['precio'],
            'imagen'      => $data['imagen'],
            'stock'       => $data['stock'],
            'activo'      => $data['activo'] // El campo activo se pasa tal cual
        ];

        // Realizamos la actualización usando una consulta preparada
        $sql = "UPDATE productos 
                SET nombre = ?, descripcion = ?, precio = ?, imagen = ?, stock = ?, activo = ? 
                WHERE id = ?";
        $stmt = $db->prepare($sql); 
        $stmt->bind_param("ssdsiii", 
            $productoData['nombre'], 
            $productoData['descripcion'], 
            $productoData['precio'], 
            $productoData['imagen'], 
            $productoData['stock'], 
            $productoData['activo'], 
            $id
        );

        // Ejecutamos la consulta y devolvemos si fue exitosa
        return $stmt->execute();
    }

    // Eliminar un producto (poniéndolo inactivo)
    public static function deleteProduct($id) {
        $db = new Database(); // Creamos la conexión a la base de datos

        // Definir la consulta para marcar el producto como inactivo
        $sql = "UPDATE productos SET activo = 0 WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id); // Vinculamos el parámetro id (entero)
        return $stmt->execute(); // Ejecuta la consulta de eliminación
    }
}
?>
