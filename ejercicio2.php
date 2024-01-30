<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analizador de Caracteres</title>
</head>
<body>
    <h1>Analizador de Caracteres</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $caracter = $_POST["caracter"];


        if (strlen($caracter) == 1) {

            if (preg_match('/[aeiouáéíóúAEIOUÁÉÍÓÚ]/', $caracter)) {
                echo "<p>El carácter '$caracter' es una vocal.</p>";
            } elseif (preg_match('/[bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ]/', $caracter)) {
                echo "<p>El carácter '$caracter' es una consonante.</p>";
            } elseif (is_numeric($caracter)) {
                echo "<p>El carácter '$caracter' es un número.</p>";
            } else {
                echo "<p>El carácter '$caracter' es un símbolo.</p>";
            }
        } else {
            echo "<p>Por favor, ingresa un solo carácter.</p>";
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="caracter">Ingrese un carácter:</label>
        <input type="text" id="caracter" name="caracter" maxlength="1" required>
        <br>
        <input type="submit" value="Analizar">
    </form>
</body>
</html>
