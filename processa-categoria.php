<?php
    include("config.php");
    include(DBAPI);
    print_r($_GET);

    $nome = $_GET['nome'];


    $resultadoQuery = cadastraCategoria($nome);


?>
