<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Potencia</title>
</head>
<body>

<h2>Calculadora de Potencia</h2>

<form method="post" action="">
    Primer número (puede ser entero o decimal): <input type="text" name="base" required><br>
    Segundo número (potencia, debe ser entero): <input type="number" name="exponente" required><br>
    <input type="submit" value="Calcular">
</form>

<?php
function calcularPotencia($base, $exponente)
{
    $resultado = 1;


    if ($exponente < 0) {
        $base = 1 / $base;
        $exponente = -$exponente;
    }


    for ($i = 0; $i < $exponente; $i++) {
        $resultado *= $base;
    }

    return $resultado;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $base = $_POST['base'];
    $exponente = $_POST['exponente'];


    if (!is_numeric($exponente)) {
        echo "El exponente debe ser un número entero.";
    } else {

        $base = floatval($base);


        $resultado = calcularPotencia($base, $exponente);
        echo "<p>El resultado de elevar $base a la potencia $exponente es: $resultado</p>";
    }
}
?>

</body>
</html>
