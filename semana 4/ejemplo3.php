<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Validación y filtrado de datos</title>
</head>
<body>
    <h2>Validación y filtrado de datos</h2>
    <form method="post" action="">
        <label for="email">Correo Electrónico:</label>
        <input type="text" id="email" name="email">
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p>El correo electrónico ingresado es válido: $email</p>";
        } else {
            echo "<p>El correo electrónico ingresado no es válido.</p>";
        }
    }
    ?>
</body>
</html>
