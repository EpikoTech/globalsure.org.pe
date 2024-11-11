<?php
include_once('../models/Product.php');

// Obtener el ID de la categoría desde la solicitud GET
$categoria_id = isset($_GET['categoria_id']) ? $_GET['categoria_id'] : 0;

// Verificar si se ha proporcionado un ID válido
if ($categoria_id > 0) {
    // Obtener productos de la categoría seleccionada
    $productos = Product::getProductsByCategory($categoria_id);
    
    // Responder con los productos en formato JSON
    echo json_encode([
        'success' => true,
        'products' => $productos
    ]);
} else {
    // Si no se proporciona un ID válido, responder con un error
    echo json_encode(['success' => false, 'message' => 'Categoría no válida']);
}
?>
