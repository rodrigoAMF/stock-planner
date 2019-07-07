<?php
    require_once("controller/ProdutoController.php");

    $parametro = $_GET['parametro'];

    $produtoController = ProdutoController::getInstance();
    // Falta o parametro de ordenação pelo nome
    $produtos = $produtoController->getProdutosNaoCadastradosNoSemestreAtual(null, $parametro);
    
    echo $produtoController->geraDadosParaTabelaProdutosNaoCadastradosNoSemestreAtual($produtos['dados']);
?>
