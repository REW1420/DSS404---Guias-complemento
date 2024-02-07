<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de días vividos</title>
</head>
<body>
    <h1>Calculadora de días vividos</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fecha_nacimiento = $_POST["fecha_nacimiento"];


        if (!empty($fecha_nacimiento)) {

            $fecha_actual = date("Y-m-d");


            $diferencia = floor((strtotime($fecha_actual) - strtotime($fecha_nacimiento)) / (60 * 60 * 24));

            echo "<p>Has vivido $diferencia días.</p>";
        } else {
            echo "<p>Por favor, ingresa tu fecha de nacimiento.</p>";
        }
    }
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
        <br>
        <input type="submit" value="Calcular">
    </form>
</body>
</html>
