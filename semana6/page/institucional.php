<?php

function institucional($classname)
{
    require("class/" . $classname . ".class.php");
}

spl_autoload_register('institucional');

$contactpage = new page();

$institucionalContent = <<<PAGE
<!-- institucional content -->
<div id="topcontent">
    <div id="textbox">
        <div id="title">
            <h2>INFORMACIÓN INSTITUCIONAL</h2>
        </div>
        <div id="paragraph">
            <h4>Misión:</h4>
            <p>
                La Universidad Don Bosco tiene como misión formar profesionales competentes y comprometidos con el desarrollo humano, social y tecnológico, fundamentados en los principios del humanismo cristiano.
            </p>
            <h4>Visión:</h4>
            <p>
                Ser una institución líder en la formación integral de profesionales, reconocida por su excelencia académica, su compromiso con la sociedad y su contribución al desarrollo sostenible.
            </p>

        </div>
    </div>
    <div id="picture">
    <img src="/img/plaza-de-las-banderas.jpg" alt="Imagen de portada" width="800" height="370" longdesc="Imagen de portada" />
    </div>
</div>
PAGE;

$contactpage->content = $institucionalContent;
echo $contactpage->display();
?>
