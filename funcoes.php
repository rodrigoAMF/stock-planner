<?php

include("config.php");

function incluiCabecalho($titulo_pagina, $arquivo_css_pagina=NULL){
    $codigo_header = file_get_contents(HEADER_TEMPLATE);

    if($arquivo_css_pagina != NULL){
        $arquivo_css_pagina = 'css/' . $arquivo_css_pagina . '.css';
        $referencia_css = '<link rel="stylesheet" href="' . $arquivo_css_pagina . '">';

        $codigo_header = str_replace('ARQUIVO_CSS_PAGINA', $referencia_css , $codigo_header);
    }else{

        $codigo_header = str_replace('<!-- CSS da página -->', '' , $codigo_header);
        $codigo_header = str_replace('ARQUIVO_CSS_PAGINA', '' , $codigo_header);
    }
    $codigo_header = str_replace('TITULO_PAGINA', $titulo_pagina , $codigo_header);

    echo $codigo_header;
}

function pickColor($percent){
    if ($percent >= 1) {
        $rgb[0] = 0;
        $rgb[1] = 200;
        $rgb[2] = 0;
    }elseif ($percent >0.5) {
        $rgb[0] = (-5.1*$percent)+510;
        $rgb[1] = 200;
        $rgb[2] = 0;
    }elseif ($percent >0.2) {
        $rgb[0] = 255;
        $rgb[1] = (6.67*$percent)-133;
        $rgb[2] = 0;
    }else {
        $rgb[0] = 255;
        $rgb[1] = 0;
        $rgb[2] = 0;
    }
    return $rgb;
}

?>
