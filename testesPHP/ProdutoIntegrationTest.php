<?php

require_once("model/Produto.php");
require_once("controller/ProdutoController.php");
require_once("controller/DatabaseController.php");
use PHPUnit\Framework\TestCase;

class ProductIntegrationTest extends TestCase{

    public function testCadastraProduto(){
        $produto = new Produto();
        $produtoController = ProdutoController::getInstance();

        $produto->setNome("mouse");
        $produto->setIdentificacao("159");
        $produto->setCatmat("125");
        $produto->setQuantidade("122");
        $produto->setEstoqueIdeal("122");
        $produto->setPosicao("1a2");
        $produto->setDescricao("teste");
        $produto->getCategoria()->setNome("teste");


        $this->assertEquals(1, $produtoController->cadastraProduto($produto, "2020S1"));
        $this->assertEquals(-2, $produtoController->cadastraProduto($produto, "2020S1"));

        $produto->setNome("garrafinha");
        $this->assertEquals(-3, $produtoController->cadastraProduto($produto, "2020S1"));

    }

    public function testExcluirProduto(){
        $produtoController = ProdutoController::getInstance();
        $databaseController = new DatabaseController();

        $conexao = $databaseController->open_database();

        $id = $produtoController->getIDUltimoProdutoCadastrado($conexao);
        $this->assertEquals(true, $produtoController->excluirProduto($id));

    }

}
