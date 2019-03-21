<?php
    include("config.php");
    include(DBAPI);
    print_r($_POST);

    $resultadoQuery = getProdutosFiltrados($busca, $_POST["filtro"]);

?>
