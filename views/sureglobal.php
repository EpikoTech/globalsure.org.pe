<?php
session_start();

// Verificar si el usuario está autenticado mediante la sesión
if (!isset($_SESSION['user_id'])) {
    header("Location: /globalsure.org.pe"); // Redirige a la página de inicio si no está logueado
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Globalsure - Tienda de Cámaras</title>
    <link rel="stylesheet" href="../views/css/tienda.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome -->
</head>
<body>

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Globalsure</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <button id="logoutBtn">Cerrar Sesión</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenedor principal -->
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Categorías (lado izquierdo) -->
            <div class="col-md-3">
                <h4>Categorías</h4>
                <ul class="list-group">
                    <li class="list-group-item">Cámaras digitales</li>
                    <li class="list-group-item">Cámaras deportivas</li>
                    <li class="list-group-item">Drones</li>
                    <li class="list-group-item">Accesorios</li>
                </ul>
            </div>

            <!-- Productos (lado derecho) -->
            <div class="col-md-9">
                <div class="product-container active">
                    <div class="row">
                        <!-- Productos -->
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Cámara Sony">
                                <div class="card-body">
                                    <h5 class="card-title">Cámara Sony</h5>
                                    <p class="card-text">S/ 1599</p>
                                    <a href="#" class="btn btn-primary">Ver producto</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Cámara Sony">
                                <div class="card-body">
                                    <h5 class="card-title">Cámara Sony</h5>
                                    <p class="card-text">S/ 1599</p>
                                    <a href="#" class="btn btn-primary">Ver producto</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Cámara Sony">
                                <div class="card-body">
                                    <h5 class="card-title">Cámara Sony</h5>
                                    <p class="card-text">S/ 1599</p>
                                    <a href="#" class="btn btn-primary">Ver producto</a>
                                </div>
                            </div>
                        </div>
                        <!-- Agrega más productos aquí (hasta 6) -->
                    </div>
                </div>

                <div class="product-container">
                    <div class="row">
                        <!-- Productos -->
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Cámara Olympus">
                                <div class="card-body">
                                    <h5 class="card-title">Cámara Olympus</h5>
                                    <p class="card-text">S/ 2599</p>
                                    <a href="#" class="btn btn-primary">Ver producto</a>
                                </div>
                            </div>
                        </div>
                        <!-- Agrega más productos aquí (hasta 6) -->
                    </div>
                </div>

                <!-- Paginación -->
                <nav aria-label="Page navigation">
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-secondary" id="prev-btn" href="#">Anterior</a>
                        <a class="btn btn-secondary" id="next-btn" href="#">Siguiente</a>
                    </div>
                    <ul class="pagination justify-content-center mt-2">
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Footer (pie de página) -->
    <footer class="bg-light text-center py-3">
        <p>Globalsure &copy; 2024 - Tienda de Cámaras</p>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/globalsure.org.pe/views/js/tienda.js"></script>
    <script src="/globalsure.org.pe/views/js/logout.js"></script>
</body>
</html>

