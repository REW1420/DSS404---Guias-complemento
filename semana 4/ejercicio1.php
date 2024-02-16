<!DOCTYPE html>
<html>
<head>
    <title>Encontrar el número mayor y menor</title>
    <script>
        function validarSeleccion() {
            var seleccionados = document.querySelectorAll('#numeros option:checked');
            if (seleccionados.length < 2) {
                alert("Debe seleccionar al menos dos números.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <h2>Encontrar el número mayor y menor</h2>
    <form method="post" action="" onsubmit="return validarSeleccion()">
        <label for="numero">Ingrese un número:</label>
        <input type="number" id="numero" name="numero">
        <button type="button" onclick="agregarNumero()">Agregar</button>
        <br>
        <select id="numeros" name="numeros[]" multiple>
        </select>
        <br>
        <input type="submit" value="Encontrar mayor y menor">
    </form>
    <br>
    <?php
    function encontrarMayor()
    {
        $numeros = func_get_args();
        return max($numeros);
    }

    function encontrarMenor()
    {
        $numeros = func_get_args();
        return min($numeros);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['numeros'])) {
            $numeros = $_POST['numeros'];
            echo "Números ingresados: ";
            foreach ($numeros as $numero) {
                echo $numero . ", ";
            }
            echo "<br>";
            echo "Número mayor: " . encontrarMayor(...$numeros) . "<br>";
            echo "Número menor: " . encontrarMenor(...$numeros) . "<br>";
        }
    }
    ?>

    <script>
        function agregarNumero() {
            var inputNumero = document.getElementById('numero');
            var selectNumeros = document.getElementById('numeros');
            var numero = inputNumero.value;
            if (numero !== "") {
                var option = document.createElement('option');
                option.value = numero;
                option.text = numero;
                selectNumeros.appendChild(option);
                inputNumero.value = "";
            } else {
                alert("Ingrese un número válido.");
            }
        }
    </script>
</body>
</html>
