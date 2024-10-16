<?php
header('Content-Type: application/json'); // Indica que la respuesta es JSON

// Conectamos a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "globalsure"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificamos la conexión
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Error de conexión."]));
}

// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verificar la contraseña
        if ($password === $user['password']) { // Cambia a password_verify si usas hash
            session_start();
            $_SESSION["username"] = $username;
            echo json_encode(["success" => true]); // Respuesta exitosa
            exit;
        }
    }
    
    // Mensaje de error si el usuario no existe o la contraseña es incorrecta
    echo json_encode(["success" => false, "message" => "Usuario o contraseña incorrectos"]);
}

$conn->close();
?>
