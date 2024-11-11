<?php
include_once('../models/Product.php');

if (isset($_POST['id'])) {
    $productId = $_POST['id'];
    $deleted = Product::deleteProduct($productId);

    if ($deleted) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al eliminar el producto']);
    }
}
?>
