<?php
session_start();
session_destroy(); // Destruye todas las variables de sesión

// Redirige a la página de inicio de sesión
header("Location: index.html");
exit();
?>
