<?php
    require_once("controller/ProdutoController.php");
    require_once("controller/SemestreController.php");
    require_once("model/Produto.php");
    require_once("controller/SemestreController.php");

    $id = $_GET['id'];
    $catmat = $_GET['catmat'];
    $quantidade = $_GET['quantidade'];

    // id=3&catmat=554&quantidade=45

    $produtoController = ProdutoController::getInstance();
    $semestreController = SemestreController::getInstance();

    $semestreAtual = $semestreController->getSemestreAtual()['dados'];
    $produto = $produtoController->getProdutoPorId($id, $semestreAtual->getId())['dados'];
   

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
