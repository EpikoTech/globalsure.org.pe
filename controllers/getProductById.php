<?php
include_once('../models/Product.php');

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $product = Product::getProductById($productId);

    if ($product) {
        echo json_encode(['success' => true, 'product' => $product]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Producto no encontrado']);
    }
}
?>
<?php
include_once('../models/Product.php');

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $product = Product::getProductById($productId);

    if ($product) {
        echo json_encode(['success' => true, 'product' => $product]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Producto no encontrado']);
    }
}
?>
