<?php
    require_once("controller/ProdutoController.php");

    $busca = $_GET['busca'];
    $filtro = $_GET['filtro'];
    $parametroOrdenacao = $_GET['parametroOrdenacao'];
    if(isset($_GET['semestre'])){
      $semestre = $_GET['semestre'];
    }else{
      $semestre = null;
    }

    $busca = ($busca == "") ? null: $busca;
    $filtro = ($filtro == "") ? null: $filtro;
    $parametroOrdenacao = ($parametroOrdenacao == "") ? null: $parametroOrdenacao;

    $produtoController = ProdutoController::getInstance();

    $produtos = $produtoController->getProdutos($busca, $filtro, $parametroOrdenacao, $semestre);

    echo $produtos;
?>
