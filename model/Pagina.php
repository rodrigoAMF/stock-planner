<?php

require_once("Config.php");
require_once ("verificaLogin.php");

class Pagina{

    function incluiCabecalho($titulo_pagina, $arquivo_css_pagina=NULL){
        $codigo_header = file_get_contents(Config::HEADER_TEMPLATE);

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

    function verificaAdmin(){
        require_once("verificaAdmin.php");
    }

}
