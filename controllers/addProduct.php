<?php
include_once('../models/Product.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nombre' => $_POST['nombre'],
        'descripcion' => $_POST['descripcion'],
        'precio' => $_POST['precio'],
        'stock' => $_POST['stock'],
        'imagen' => $_POST['imagen'],
        'activo' => 1
    ];

    $productId = Product::addProduct($data);

    if ($productId) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al agregar el producto']);
    }
}
?>
