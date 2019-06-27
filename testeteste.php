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
    $produto->getCategoria()->setNome("abelha");
    $produto->getCategoria()->setId(2);

    

    //print_r($produtoController->cadastraNovoProduto($produto));

    $id = $produtoController->getIDUltimoProdutoCadastrado()['dados'];

    echo $id;

?>