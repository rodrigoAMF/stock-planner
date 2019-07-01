<?php
    require_once("controller/ProdutoController.php");
    require_once("model/Produto.php");

    $id = $_GET['id'];
    $catmat = $_GET['catmat'];
    $quantidade = $_GET['quantidade'];

    // id=3&catmat=554&quantidade=45

    $produtoController = ProdutoController::getInstance();

 	$produto = $produtoController->getProdutoPorId($id);

 	$produto['dados']->setCatmat($catmat);
 	$produto['dados']->setQuantidade($quantidade);

    if($produto['status'] == 200){
      $resultadoQuery = $produtoController->cadastraProduto($produto['dados']);
      $resultadoQuery = $resultadoQuery["dados"];
    } else{
      $resultadoQuery = -1;
    }
    

   echo $resultadoQuery;
?>
