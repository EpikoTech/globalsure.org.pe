<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Registrarse</h1>
        <form method="POST" action="../controllers/register.php">
            <div class="form-group">
                <input type="text" name="nombres" class="form-control" placeholder="Nombres" required>
            </div>
            <div class="form-group">
                <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
            </div>
            <div class="form-group">
                <input type="text" name="dni" class="form-control" placeholder="DNI" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="text" name="celular" class="form-control" placeholder="Celular" required>
            </div>
            <div class="form-group">
                <input type="date" name="fecha_nacimiento" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Usuario" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
        </form>
        <?php if (isset($error)): ?>
            <p class="text-danger"><?php echo $error; ?></p>
        <?php endif; ?>
        <div class="mt-3 text-center">
            <a href="../views/login.php" class="btn btn-link">Ya tengo una cuenta. Iniciar sesión</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
