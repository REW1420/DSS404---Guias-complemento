<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de CUM</title>
</head>
<body>
    <h1>Calculadora de CUM</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nota1 = floatval($_POST["nota1"]);
        $nota2 = floatval($_POST["nota2"]);
        $nota3 = floatval($_POST["nota3"]);
        $nota4 = floatval($_POST["nota4"]);
        $nota5 = floatval($_POST["nota5"]);

        // Calcular el CUM
        $cum = ($nota1 + $nota2 + $nota3 + $nota4 + $nota5) / 5;


        if ($cum >= 9) {
            $unidades_valorativas = 32;
        } elseif ($cum >= 7) {
            $unidades_valorativas = 24;
        } elseif ($cum >= 5) {
            $unidades_valorativas = 20;
        } else {
            $unidades_valorativas = 16;
        }

        echo "<p>Tu CUM es: $cum</p>";
        echo "<p>En el próximo ciclo, puedes cursar $unidades_valorativas unidades valorativas.</p>";
    }
    ?>

    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nota1">Nota Materia 1:</label>
        <input type="number" id="nota1" name="nota1" min="0" max="10" step="0.1" required>
        <br>

        <label for="nota2">Nota Materia 2:</label>
        <input type="number" id="nota2" name="nota2" min="0" max="10" step="0.1" required>
        <br>

        <label for="nota3">Nota Materia 3:</label>
        <input type="number" id="nota3" name="nota3" min="0" max="10" step="0.1" required>
        <br>

        <label for="nota4">Nota Materia 4:</label>
        <input type="number" id="nota4" name="nota4" min="0" max="10" step="0.1" required>
        <br>

        <label for="nota5">Nota Materia 5:</label>
        <input type="number" id="nota5" name="nota5" min="0" max="10" step="0.1" required>
        <br>

        <input type="submit" value="Calcular">
    </form>
</body>
</html>
