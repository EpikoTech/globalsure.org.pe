<?php
include_once('../models/Product.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['id'];
    $data = [
        'nombre' => $_POST['nombre'],
        'descripcion' => $_POST['descripcion'],
        'precio' => $_POST['precio'],
        'stock' => $_POST['stock'],
        'imagen' => $_POST['imagen'],
        'activo' => 1
    ];

    $updated = Product::updateProduct($productId, $data);

    if ($updated) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el producto']);
    }
}
?>
