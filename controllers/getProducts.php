<?php
include_once('../models/Product.php');

// Obtener todos los productos
$productos = Product::getAllProducts();

// Retornar los productos en formato JSON
echo json_encode(['success' => true, 'products' => $productos]);
?>
