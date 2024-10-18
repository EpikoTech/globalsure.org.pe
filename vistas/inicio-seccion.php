<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="./vistas/css/iniciar-seccion.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="ajax.js"></script> <!-- Incluyendo el archivo ajax.js -->
    <script src="registroajax.js"></script>
</head>
<body>
    <div class="inicio">
        <div class="foto">
            <!-- Aquí puedes agregar una imagen o dejarlo vacío -->
        </div>
        <form method="POST" action="index.php?action=login">
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
                <a href="index.php?action=register" class="btn btn-primary">Registrarse</a>

                <a href="#" data-toggle="modal" data-target="#contraseñamodal">Olvidaste Clave?</a>
            </div>
        </form>
    </div>

   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
