<?php
    require_once("model/Produto.php");
    require_once("controller/ProdutoController.php");

    $produto = new Produto();

    $produto->setNome($_POST['nome']);
    $produto->setIdentificacao($_POST['identificacao']);
    $produto->setCatmat($_POST['catmat']);
    $produto->setQuantidade($_POST['quantidade']);
    $produto->setEstoqueIdeal($_POST['estoqueIdeal']);
    $produto->setPosicao($_POST['posicao']);
    $produto->getCategoria()->setNome($_POST['categoria']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setId($_GET['id']);

    $produtoController = ProdutoController::getInstance();

    $resultadoQuery = $produtoController->editarProduto($produto);

    

    echo $resultadoQuery;
?>
