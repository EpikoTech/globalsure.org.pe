<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOLA MUNDO </title>
</head>
<body>
    <h1>ESTE ES EL PORTAL GLOBAL SURE</h1>
    <P>CARRITO DE COMPRAS</P>
</body>
</html>