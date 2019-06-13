<?php
    require_once("controller/ProdutoController.php");

    $busca = $_GET['busca'];

    $busca = ($busca == "") ? null: $busca;

    $produtoController = ProdutoController::getInstance();
    // Falta o parametro de ordenação pelo nome
    $produtos = $produtoController->getProdutosNaoCadastradosNoSemestreAtual($busca);
    
    echo $produtoController->geraDadosParaTabelaProdutosNaoCadastradosNoSemestreAtual($produtos['dados']);
?>
