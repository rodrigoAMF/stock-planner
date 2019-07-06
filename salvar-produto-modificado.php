<?php
    require_once("controller/ProdutoController.php");
    require_once("controller/SemestreController.php");
    require_once("model/Produto.php");

    $id = $_GET['id'];
    $catmat = $_GET['catmat'];
    $quantidade = $_GET['quantidade'];

    $produtoController = ProdutoController::getInstance();

    $resultado = $produtoController->getProdutoPorId($id);

    if($resultado['status'] == 200){
        $produto = $resultado['dados'];
        $produto->setCatmat($catmat);
        $produto->setQuantidade($quantidade);
        $resultadoQuery = $produtoController->cadastraProduto($produto);
        $resultadoQuery = $resultadoQuery["dados"];
    } else{
        $resultadoQuery = -1;
    }

   echo $resultadoQuery;
?>
