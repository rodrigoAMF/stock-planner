<?php
    require_once("model/Produto.php");
    require_once("model/Semestre.php");
    require_once("controller/ProdutoController.php");

    $produto = new Produto();
    $semestre = new Semestre();

    $produtoController = ProdutoController::getInstance();


    $produto->setNome("mouse");
    $produto->setIdentificacao("159");
    $produto->setCatmat("125");
    $produto->setQuantidade("122");
    $produto->setEstoqueIdeal("122");
    $produto->setPosicao("1a2");
    $produto->setDescricao("teste");
    $produto->getCategoria()->setNome("Consumo");
    $produto->getCategoria()->setId(2);

    echo ($produtoController->cadastraProduto($produto))['dados'] . "<br>";
    $produto->setIdentificacao("524");
    echo ($produtoController->cadastraProduto($produto))['dados']. "<br>";
    $produto->setNome("mouse2");
    $produto->setIdentificacao("159");
    echo ($produtoController->cadastraProduto($produto))['dados']. "<br>";

    $produtoController->excluirProduto($produtoController->getIDUltimoProdutoCadastrado()['dados']);

?>