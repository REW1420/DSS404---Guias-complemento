<?php

class page
{
    // Atributos de la clase
    public $content;
    public $title = "Centro de Estudios de Postgrados Universidad Don Bosco &copy;";
    public $keywords = "Universidad Don Bosco, UDB, Educaci&oacute;n con estilo salesiano";
    public $buttons = array(
        "Inicio" => "home.php",
        "Carreras" => "carreras.php",
        "Institucional" => "institucional.php",
        "Contacto" => "contacto.php"
    );

    public function display()
    {
        echo "<!DOCTYPE html>\n";
        echo "<html lang=\"es\">\n<head>\n";
        echo "\t<meta charset=\"utf-8\" />\n";
        $this->displayTitle();
        $this->displayKeywords();
        $this->displayStyles(array("css/home.css")); // Pasar un array como argumento
        $this->displayScripts(array("js/modernizr.custom.lis.js")); // Pasar un array como argumento
        echo "</head>\n<body>\n";
        $this->displayHeader();
        $this->displayMenu($this->buttons);
        echo $this->content;
        $this->displayFooter();
        echo "</body>\n</html>";
    }

    public function displayTitle()
    {
        echo "\t<title>" . $this->title . "</title>\n";
    }

    public function displayKeywords()
    {
        echo "\t<meta name=\"keywords\" content=\"" . $this->keywords . "\" />\n";
    }


    public function displayStyles($estilos)
    {
        $styles = "";
        if (is_array($estilos)) {
            foreach ($estilos as $cssfile) {
                $styles .= "\t<link rel=\"stylesheet\" href=\"/" . $cssfile . "\" />\n";
            }
        } else {
            $styles .= "\t<link rel=\"stylesheet\" href=\"/" . $estilos . "\" />\n";
        }
        echo $styles;
    }
    public function displayScripts($scripts)
    {
        if (is_array($scripts)) {
            foreach ($scripts as $scriptfile) {
                echo "\t<script src=\"/" . $scriptfile . "\"></script>\n";
            }
        } else {
            if (!empty($scripts)) {
                echo "\t<script src=\"/" . $scripts . "\"></script>\n";
            }
        }
    }
    public function displayHeader()
    {
        $header = <<<HEADER
<!-- page header -->
<section>
<article>
<table width="100%" cellpadding="12" cellspacing="0" border="0">
<tr bgcolor="black">
<td align="left">
<img src="/img/logo.gif" alt="Logo URL" height="70" width="70" />
</td>
<td>
<h1>Universidad Don Bosco</h1>
</td>
<td align="right">
<img src="/img/logo.gif" alt="Logo URL" height="70" width="70" />
</td>
</tr>
</table>
HEADER;
        echo $header;
    }
    public function displayMenu($buttons)
    {
        $menu = "<ul id=\"mainmenu\">\n\t";

        $width = 100 / count($buttons);
        foreach ($buttons as $name => $url) {
            $menu .= "<li>\n\t\t";
            $menu .= $this->displayButton($width, $name, $url, $this->isURLCurrentPage($url)) . "\n\t\t";
            $menu .= "</li>\n";
        }
        $menu .= "</ul>\n";
        echo $menu;
    }

    function isURLCurrentPage($url)
    {
        return(strpos($_SERVER['PHP_SELF'], $url) !== false);
    }

    public function displayButton($width, $name, $url, $active = true)
    {
        $button = "";
        if ($active) {
            $button .= "<a href=\"" . $url . "\">\n\t\t";
            $button .= "<img src=\"/img/url-icon.png\" alt=\"" . $name . "\" />\n\t";
            $button .= "</a>\n\t";
            $button .= "<a href=\"" . $url . "\">\n\t\t";
            $button .= "<span class=\"menu\">" . $name . "</span>\n\t";
            $button .= "</a>\n";
        } else {
            $button .= "<img src=\"/img/url-icon.png\" alt=\"$name\">\n\t";
            $button .= "<span class=\"menu\">" . $name . "</span>\n";
        }
        return $button;
    }
    public function displayFooter()
    {
        $footer = <<<FOOT
<!-- Pie de la pagina -->
<table id="footer">
<tr>
<td>
<p class="foot">
<a href="http://www.udb.edu.sv" target="blank">Universidad Don Bosco</a>
</p>
<p class="foot">Centro de Estudios de Postgrados.</p>
</td>
</tr>
</table>
</article>
</section>
FOOT;
        echo $footer;
    }
}
?>
