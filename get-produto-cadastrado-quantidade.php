<?php
    require_once("controller/ProdutoController.php");

    $busca = $_GET['busca'];
    $filtro = $_GET['filtro'];
    $parametroOrdenacao = $_GET['parametroOrdenacao'];

    $busca = ($busca == "") ? null: $busca;
    $filtro = ($filtro == "") ? null: $filtro;
    $parametroOrdenacao = ($parametroOrdenacao == "") ? null: $parametroOrdenacao;

    $produtoController = ProdutoController::getInstance();

    $produtos = $produtoController->getProdutosCadastradosQuantidade($busca, $filtro, $parametroOrdenacao);

    echo $produtos;
?>
