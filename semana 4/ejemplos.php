<?php

// Función que aplica una operación a cada elemento de un array y devuelve el resultado
function aplicarOperacion(array $numeros, $operacion)
{
    $resultado = [];
    foreach ($numeros as $numero) {
        $resultado[] = $operacion($numero);
    }
    return $resultado;
}

$resultado = aplicarOperacion([1, 2, 3], function ($x) {
    return $x * 2;
});

print_r($resultado);

// Función que ejecuta una acción y luego llama a un callback
function ejecutarAccion($accion, $callback)
{
    // Simulación de ejecución de una acción
    echo "Ejecutando acción: $accion<br>";
    // Llamada al callback
    $callback();
}

ejecutarAccion("enviar email", function () {
    echo "Email enviado<br>";
});


// Función que devuelve una función anónima que calcula el cuadrado de un número
function obtenerCalculadoraCuadrado()
{
    return function ($x) {
        return $x * $x;
    };
}

$calculadoraCuadrado = obtenerCalculadoraCuadrado();
echo $calculadoraCuadrado(5);


// Función que devuelve una función de incremento que captura una variable del ámbito circundante
function obtenerFuncionIncremento($incremento)
{
    return function ($x) use ($incremento) {
        return $x + $incremento;
    };
}

$sumar5 = obtenerFuncionIncremento(5);
echo $sumar5(10);

?>