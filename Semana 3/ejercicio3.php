<!DOCTYPE html>
<html>
<head>
    <title>Promedio de Notas</title>
    <style>
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
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Promedio de Notas de Estudiantes</h2>

<?php
$notas = array(
    "Estudiante 1" => array(
        "Tarea" => 9.1,
        "Investigación" => 8.5,
        "Parcial" => 4.8
    ),
    "Estudiante 2" => array(
        "Tarea" => 7.5,
        "Investigación" => 6.2,
        "Parcial" => 8.9
    ),
    "Estudiante 3" => array(
        "Tarea" => 6.3,
        "Investigación" => 7.8,
        "Parcial" => 9.5
    )
);

echo "<table>";
echo "<tr><th>Estudiante</th><th>Tarea</th><th>Investigación</th><th>Parcial</th><th>Promedio</th></tr>";

foreach ($notas as $estudiante => $actividades) {
    echo "<tr>";
    echo "<td>$estudiante</td>";
    $promedio = 0;
    foreach ($actividades as $actividad => $nota) {
        echo "<td>$nota</td>";

        if ($actividad == "Tarea") {
            $promedio += $nota * 0.5;
        } elseif ($actividad == "Investigación") {
            $promedio += $nota * 0.3;
        } elseif ($actividad == "Parcial") {
            $promedio += $nota * 0.2;
        }
    }
    echo "<td>$promedio</td>";
    echo "</tr>";
}

echo "</table>";
?>

</body>
</html>
