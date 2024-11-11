<?php
session_start();
include_once('../models/Product.php');

// Verificar si el usuario es administrador
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    header("Location: ../views/sureglobal.php");  // Redirige si no es admin
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin - Gestión de Productos</title>
    <link rel="stylesheet" href="../views/css/admin.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Agregar jQuery -->
</head>
<body>
    <h1>Gestión de Productos</h1>

    <!-- Formulario para agregar producto -->
    <h2>Agregar Producto</h2>
    <form id="productForm">
        <input type="hidden" id="productId" name="id"> <!-- Para actualizar, el id será necesario -->
        <input type="text" id="productName" name="nombre" placeholder="Nombre del Producto" required>
        <input type="text" id="productDescription" name="descripcion" placeholder="Descripción" required>
        <input type="number" id="productPrice" name="precio" placeholder="Precio" required>
        <input type="number" id="productStock" name="stock" placeholder="Stock" required>
        <input type="text" id="productImage" name="imagen" placeholder="Imagen URL" required>
        <button type="submit">Agregar Producto</button>
    </form>

    <!-- Lista de Productos -->
    <h2>Lista de Productos</h2>
    <table id="productList">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script src="../views/js/admin.js"></script> <!-- Incluye el archivo JS -->
</body>
</html>
