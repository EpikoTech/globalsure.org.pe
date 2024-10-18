<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
    <link rel="stylesheet" href="./vistas/css/registro2.css">
</head>
<body>
    <div class="container">
        <h2>REGISTRO DE NUEVO USUARIO</h2>
        <form method="POST" action="index.php?action=register">
            <label for="usuario">Usuario:</label>
            <input type="text"  id="usuario" name="username" required>

            <div class="form-group">
                <div class="form-control">
                    <label for="clave">Clave:</label>
                    <input type="password" id="clave" name="password" required>
                </div>
                <div class="form-control">
                    <label for="repetir-clave">Repetir Clave:</label>
                    <input type="password" id="repetir-clave" name="confirm_password" required>
                </div>
            </div>

            <label for="dni">DNI:</label>
            <input type="number" id="dni" name="dni" required>

            <label for="nombres">Nombres:</label>
            <input type="text" id="nombres" name="nombres" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="email" required>

            <div class="form-group">
                <div class="form-control">
                    <label for="celular">Celular:</label>
                    <input type="number" id="celular" name="celular" required>
                </div>
                <div class="form-control">
                    <label for="fecha-nacimiento">Fecha Nacimiento:</label>
                    <input type="date" id="fecha-nacimiento" name="fecha_nacimiento" required>
                </div>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="acepto" name="acepto" required>
                <label for="acepto">Acepto los términos y solicito enviar activación a:</label>
            </div>

            <div class="options">
                <div>
                    <input type="radio" id="celular-op" name="envio" value="celular" required>
                    <label for="celular-op">Celular</label>
                </div>
                <div>
                    <input type="radio" id="correo-op" name="envio" value="correo" required>
                    <label for="correo-op">Correo</label>
                </div>
            </div>

            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>
