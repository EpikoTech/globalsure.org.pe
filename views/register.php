<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
    <link rel="stylesheet" href="../views/css/register.css">
</head>
<body>
    <div class="container">
        <h2>REGISTRO DE NUEVO USUARIO</h2>
        <form id="registroForm" method="POST" >
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="username" required placeholder="Elige un nombre de usuario">

            <div class="form-group">
                <div class="form-control">
                    <label for="clave">Clave:</label>
                    <input type="password" id="clave" name="password" required placeholder="Crea una contraseña">
                </div>
                <div class="form-control">
                    <label for="repetir-clave">Repetir Clave:</label>
                    <input type="password" id="repetir-clave" name="confirm_password" required placeholder="Confirma tu contraseña">
                </div>
            </div>

            <label for="dni">DNI:</label>
            <input type="number" id="dni" name="dni" required placeholder="8 dígitos">

            <label for="nombres">Nombres:</label>
            <input type="text" id="nombres" name="nombres" required>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="email" required>

            <div class="form-group">
                <div class="form-control">
                    <label for="celular">Celular:</label>
                    <input type="number" id="celular" name="celular" required placeholder="9 dígitos">
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

            <button type="submit" id="btnGuardar">Guardar</button>
        </form>
        <div class="mt-3 text-center">
            <a href="../index.php" class="btn btn-link">Ya tengo una cuenta. Iniciar sesión</a>
        </div>
    </div>

    <!-- Modal -->
<div id="activationModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="modalMessage"></p>
    </div>
</div>

<style>
    .modal {
        display: none; 
        position: fixed; 
        z-index: 1; 
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgb(0,0,0); 
        background-color: rgba(0,0,0,0.4); 
    }
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; 
        padding: 20px;
        border: 1px solid #888;
        width: 80%; 
    }
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>


    <script src="/globalsure.org.pe/views/js/regis.js"></script>
</body>
</html>
