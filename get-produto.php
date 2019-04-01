<?php
    require_once("funcoes.php");
    include(DBAPI);
    require_once("inc/database.php");

    $busca = $_GET['busca'];
    $filtro = $_GET['filtro'];
    $parametroOrdenacao = $_GET['parametroOrdenacao'];

    $busca = ($busca == "") ? null: $busca;
    $filtro = ($filtro == "") ? null: $filtro;
    $parametroOrdenacao = ($parametroOrdenacao == "") ? null: $parametroOrdenacao;

    $produtos = getProdutos($busca, $filtro, $parametroOrdenacao);

    echo $produtos;
?>
