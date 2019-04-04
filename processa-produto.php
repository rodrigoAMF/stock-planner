<?php
    include("config.php");
    include(DBAPI);

    $nome = $_POST['nome'];
    $identificacao = $_POST['identificacao'];
    $catmat = $_POST['catmat'];
    $quantidade = $_POST['quantidade'];
    $estoqueIdeal = $_POST['estoqueIdeal'];
    $posicao = $_POST['posicao'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    $resultadoQuery = cadastraProduto($nome, $identificacao, $catmat, $quantidade, $estoqueIdeal, $posicao, $categoria, $descricao);


    if(!$resultadoQuery){
        throw new Exception("500 (Internal Server Error)");
    }
?>
