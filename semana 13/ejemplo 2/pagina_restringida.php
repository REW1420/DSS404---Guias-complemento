<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    // Si no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: index.html");
    exit();
}

// Muestra el mensaje de bienvenida y los datos del usuario
echo "<h2>Bienvenido, " . $_SESSION['nombre_completo'] . "!</h2>";
echo "<p>Tu nombre de usuario es: " . $_SESSION['username'] . "</p>";

// Agrega aquí cualquier otra información que desees mostrar al usuario

// Agrega un botón para cerrar sesión
echo "<a href='logout.php'>Cerrar Sesión</a>";
?>
