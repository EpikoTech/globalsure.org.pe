<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="./views/css/iniciar-seccion.css"> <!-- Ruta a tu CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="inicio"> <!-- Manteniendo el contenedor-->
        <div class="foto">
            <!-- Aquí puedes agregar una imagen o dejarlo vacío -->
        </div>
        <form id="loginForm" method="POST"> <!-- Sin action -->
            <p>Usuario</p>
            <div class="input-box">
                <input type="text" name="username" placeholder="Ingrese su usuario" required>
            </div>

            <p>Clave</p>
            <div class="input-box">
                <input type="password" name="password" placeholder="Ingrese su clave" required>
            </div>

            <button type="submit" class="boton">Iniciar Sesión</button>

            <div class="nuevo-olvidaste">
                <a href="views/register.php" class="btn btn-primary">Registrarse</a>
                <a href="recuperar-clave.php" class="btn btn-link">Olvidaste Clave?</a>
            </div>
        </form>

        <!-- Contenedor para mensajes -->
        <div id="message" class="mt-3"></div> 
        <?php if (isset($error)): ?>
            <div class="alert alert-danger mt-3"><?php echo $error; ?></div> <!-- Mensaje de error -->
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="/globalsure.org.pe/views/js/login.js"></script> 

</body>
</html>
