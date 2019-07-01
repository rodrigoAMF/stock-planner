<?php
    require_once("model/Produto.php");
    require_once("controller/ProdutoController.php");
    require_once("controller/CategoriaController.php");

    $categoriaController = CategoriaController::getInstance();

    $produto = new Produto();

    $produto->setNome($_POST['nome']);
    $produto->setIdentificacao($_POST['identificacao']);
    $produto->setCatmat($_POST['catmat']);
    $produto->setQuantidade($_POST['quantidade']);
    $produto->setEstoqueIdeal($_POST['estoqueIdeal']);
    $produto->setPosicao($_POST['posicao']);
    $produto->getCategoria()->setNome($_POST['categoria']);
    $produto->getCategoria()->setId($categoriaController->getIDPeloNome($_POST['categoria'])['dados']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setId($_GET['id']);

    $produtoController = ProdutoController::getInstance();

    $resultadoQuery = $produtoController->editarProduto($produto);

    print_r($resultadoQuery);
?>
