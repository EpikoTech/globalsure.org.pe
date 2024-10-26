<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <!-- Incluir Bootstrap CSS desde un CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Iniciar Sesión</h1> <!-- Título centrado -->
        
        <!-- Formulario de inicio de sesión -->
        <form id="loginForm" method="POST">
            <div class="form-group">
                <label for="username">Usuario</label> <!-- Etiqueta para el campo de usuario -->
                <input type="text" name="username" class="form-control" id="username" placeholder="Usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label> <!-- Etiqueta para el campo de contraseña -->
                <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button> <!-- Botón para enviar el formulario -->
        </form>
        <div id="message" class="mt-3"></div> <!-- Contenedor para mensajes -->

        
        <!-- Mostrar mensaje de error si existe -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger mt-3"><?php echo $error; ?></div> <!-- Mensaje de error -->
        <?php endif; ?>
        
        <!-- Enlaces para registrarse o recuperar contraseña -->
        <div class="mt-3">
            <a href="views/registro.php" class="btn btn-link">Registrarse</a><!-- Enlace a la página de registro -->
            <a href="recuperar-clave.php" class="btn btn-link">Olvidaste Clave?</a> <!-- Enlace para recuperar la contraseña -->
        </div>
    </div>

    <!-- Incluir jQuery y Bootstrap JS desde un CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- Versión completa -->
    <script src="/chat3/views/js/login.js"></script>


</body>
</html>
