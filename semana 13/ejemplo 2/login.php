<?php
// Conexión a la base de datos (reemplaza los valores con los de tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtiene los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta SQL para verificar la existencia del usuario y la contraseña
$sql = "SELECT nombre_completo FROM usuarios WHERE nombre_usuario = '$username' AND contraseña = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Si el usuario y la contraseña son correctos, inicia sesión
    session_start();
    $_SESSION['username'] = $username;
    // Obtiene el nombre completo del usuario
    $row = $result->fetch_assoc();
    $_SESSION['nombre_completo'] = $row['nombre_completo'];
    echo "success";
} else {
    // Si la autenticación falla, devuelve un mensaje de error
    echo "error";
}

$conn->close();
?>
