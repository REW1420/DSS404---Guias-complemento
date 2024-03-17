<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autos disponibles</title>
    <link rel="stylesheet" href="/css/autospoo.css">
</head>
<body>
    <header>
        <h1>Autos disponibles</h1>
    </header>

    <section>
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="marca">Selecciona una marca de auto:</label>
            <select name="marca" id="marca">
                <option value="Peugeot">Peugeot</option>
                <option value="Renault">Renault</option>
                <option value="BMW">BMW</option>
            </select>
            <button type="submit">Mostrar información</button>
        </form>

        <div id="resultadoAutos">
            <?php
            if (!function_exists('classAutoLoader')) {
                function classAutoLoader($classname)
                {
                    $classname = strtolower($classname);
                    $classfile = 'class/' . $classname . '.class.php';
                    if (is_file($classfile) && !class_exists($classname))
                        include $classfile;


                }

            }
            spl_autoload_register('classAutoLoader');

            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if (isset($_GET['marca'])) {
                    $marcaSeleccionada = $_GET['marca'];
                    $movil = [];
                    switch ($marcaSeleccionada) {
                        case 'Peugeot':
                            $movil[] = new auto("Peugeot", "307", "Gris", "/img/peugeot.jpg");
                            break;
                        case 'Renault':
                            $movil[] = new auto("Renault", "Clio", "Marron", "/img/renaultclio.jpg");
                            break;
                        case 'BMW':
                            $movil[] = new auto("BMW", "Serie6", "Azul", "/img/bmwserie6.jpg");
                            break;
                        default:
                            // Si no se selecciona ninguna marca, no mostrar ningún auto
                            break;
                    }

                    foreach ($movil as $auto) {
                        $auto->mostrar();
                    }
                }
            }
            ?>
        </div>
    </section>
</body>
</html>
