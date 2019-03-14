<?php
    include("config.php");
    include(DBAPI);

    $dados = getProdutoPorId(1);
    print_r($dados);

    echo $dados['nome'];

?>
