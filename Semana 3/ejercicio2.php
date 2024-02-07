<!DOCTYPE html>
<html>
<head>
    <title>Tabla de Multiplicar</title>
    <style>
        body{
            background-color: #f0f8ff;
        }
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            
        }
        th {
            background-color: #7FFFD4;
        }
        
    </style>
</head>
<body>

<h2 class="center">Tabla de Multiplicar</h2>

<form method="post" action="" class="center">
    <label for="numero">Ingrese un número del 1 al 10:</label>
    <input type="number" name="numero" id="numero" min="1" max="10" required>
    <input type="submit" value="Mostrar tabla">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST['numero'];

    echo "<h3>Tabla de Multiplicar del $numero</h3>";
    echo "<table>";
    echo "<tr><th>Multiplicador</th><th>Resultado</th></tr>";

    for ($i = 1; $i <= 10; $i++) {
        $resultado = $numero * $i;
        echo "<tr><td>$numero x $i</td><td>$resultado</td></tr>";
    }

    echo "</table>";
}
?>

</body>
</html>
