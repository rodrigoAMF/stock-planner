<?php
    require_once("controller/ProdutoController.php");
    require_once("model/Produto.php");

    $id = $_GET['id'];
    $catmat = $_GET['catmat'];
    $quantidade = $_GET['quantidade'];

    // id=3&catmat=554&quantidade=45

    $produtoController = ProdutoController::getInstance();

 	$dados = $produtoController->getProdutoPorId($id);
 	$produto = new Produto();

 	$produto->setNome($dados['nome']);
 	$produto->setCatmat($catmat);
 	$produto->setQuantidade($quantidade);

   $resultadoQuery = $produtoController->cadastroProdutoCondicional($produto);

   echo $resultadoQuery;
?>
