<?php
    include("config.php");
    include(DBAPI);
    //print_r($_POST);

    $nome = $_POST['nome'];
    $identificacao = $_POST['identificacao'];
    $catmat = $_POST['catmat'];
    $quantidade = $_POST['quantidade'];
    $estoqueIdeal = $_POST['estoqueIdeal'];
    $localizacao = $_POST['localizacao'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    cadastraProduto($nome, $identificacao, $catmat, $quantidade, $estoqueIdeal, $localizacao, $categoria, $descricao);
?>
