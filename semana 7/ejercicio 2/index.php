<?php


$ip = $_SERVER['REMOTE_ADDR'];
$script_name = $_SERVER['PHP_SELF'];
$date_time = date("Y-m-d H:i:s");


$log_file = "visits_log.txt";
$data = "$ip,$script_name,$date_time\n";

$file_handle = fopen($log_file, 'a');
fwrite($file_handle, $data);
fclose($file_handle);


echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Registro de Visitas</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Registro de Visitas</h2>
    <table>
        <tr>
            <th>IP del Visitante</th>
            <th>Script Ejecutado</th>
            <th>Fecha y Hora</th>
        </tr>";

$file_handle = fopen($log_file, 'r');
while (!feof($file_handle)) {
    $line = fgets($file_handle);
    if ($line !== false) {
        list($ip, $script_name, $date_time) = explode(',', $line);
        echo "<tr>
                <td>$ip</td>
                <td>$script_name</td>
                <td>$date_time</td>
              </tr>";
    }
}
fclose($file_handle);

echo "</table>
</body>
</html>";

