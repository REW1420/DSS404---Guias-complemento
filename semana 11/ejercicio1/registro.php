<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body>
    <h2>Registrarse</h2>
    <form action="db.php" method="POST">
        <label for="registrar_username">Nombre de usuario:</label><br>
        <input type="text" id="registrar_username" name="registrar_username" required><br>
        <label for="registrar_password">Contraseña:</label><br>
        <input type="password" id="registrar_password" name="registrar_password" required><br>
        <label for="nombre_completo">Nombre completo:</label><br>
        <input type="text" id="nombre_completo" name="nombre_completo" required><br><br>
        <button type="submit">Registrarse</button>
    </form>
    <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
</body>
</html>
