<?php

function carreras($classname)
{
    require("class/" . $classname . ".class.php");
}

spl_autoload_register('carreras');

$contactpage = new page();

$carreras = array(
    "Ingeniería en Sistemas Informáticos",
    "Ingeniería en Electrónica y Telecomunicaciones",
    "Ingeniería en Administración de Empresas",
    "Ingeniería en Industria de Alimentos"
);

$tableContent = "<h2>Carreras</h2>\n";
$tableContent .= "<table>\n";
$tableContent .= "<tr><th>Carrera</th></tr>\n";
foreach ($carreras as $carrera) {
    $tableContent .= "<tr><td>$carrera</td></tr>\n";
}
$tableContent .= "</table>\n";

$contactpage->content = $tableContent;
echo $contactpage->display();
?>
