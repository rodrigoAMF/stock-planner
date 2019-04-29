<?php
    require_once("controller/ProdutoController.php");

    $id = $_GET['id'];

    $produtoController = ProdutoController::getInstance();

    $resultadoQuery = $produtoController->excluirProduto($id);

    echo $resultadoQuery;

    //header('Location: lista-produtos.php');

    /*if($resultadoQuery){
        http_response_code(200);
        echo '200 (Okay)';
    }else{
        http_response_code(500);
        echo '500 (Internal Server Error)';
    }*/
?>
