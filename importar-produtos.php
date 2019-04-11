<?php
    require_once("model/Config.php");
    require_once("model/Pagina.php");
    $pagina = new Pagina();

    $pagina->incluiCabecalho("Stock Planner - Cadastro de produtos", "lista-produtos");
?>



<?php
    require_once(Config::FOOTER_TEMPLATE);
?>
