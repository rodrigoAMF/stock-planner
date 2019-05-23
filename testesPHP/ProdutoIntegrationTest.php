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

        //Verifica se esta cadastrando corretamente um produto
        $this->assertEquals(1, $produtoController->cadastraProduto($produto, "2020S1"));

        //verifica se cadastra nome duplicado
        $this->assertEquals(-2, $produtoController->cadastraProduto($produto, "2020S1"));

        //verifica se esta cadastrando produto com id duplicado 
        $produto->setNome("garrafinha");
        $this->assertEquals(-3, $produtoController->cadastraProduto($produto, "2020S1"));

    }

    public function testEditarProduto(){
        $produtoController = ProdutoController::getInstance();
        $databaseController = new DatabaseController();

        $conexao = $databaseController->open_database();

        $id = $produtoController->getIDUltimoProdutoCadastrado($conexao);

        $produto = new Produto();

        $produto->setNome("celular");
        $produto->setIdentificacao("321");
        $produto->setCatmat("125");
        $produto->setQuantidade("122");
        $produto->setEstoqueIdeal("122");
        $produto->setPosicao("1a2");
        $produto->setDescricao("teste");
        $produto->getCategoria()->setNome("teste");

        //Verifica se o produto esta sendo editado corretamente
        $this->assertEquals(true, $produtoController->editarProduto($produto, $id));

        //Verifica se os campos do produto foram editados
        $this->assertEquals($produto, $produtoController->getProdutoPorId($id));

    }



    public function testExcluirProduto(){
        $produtoController = ProdutoController::getInstance();
        $databaseController = new DatabaseController();

        $conexao = $databaseController->open_database();

        $id = $produtoController->getIDUltimoProdutoCadastrado($conexao);
        $this->assertEquals(true, $produtoController->excluirProduto($id));

    }

}
