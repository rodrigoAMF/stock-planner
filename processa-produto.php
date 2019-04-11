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

    $produtoController = ProdutoController::getInstance();
    $resultadoCadastro = $produtoController->cadastraProduto($produto);

    echo $resultadoCadastro;
?>
