<?php
    require_once("controller/ProdutoController.php");

    $id = $_GET['id'];

    $produtoController = ProdutoController::getInstance();

    $resultadoQuery = $produtoController->excluirProduto($id);

    echo $resultadoQuery;
?>
