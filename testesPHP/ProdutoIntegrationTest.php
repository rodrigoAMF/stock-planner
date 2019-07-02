<?php

require_once("model/Produto.php");
require_once("controller/ProdutoController.php");
require_once("controller/CategoriaController.php");
require_once("controller/DatabaseController.php");

use PHPUnit\Framework\TestCase;

class ProductIntegrationTest extends TestCase{

    public static function setUpBeforeClass(): void{
        $databaseController = new DatabaseController();

        $query = "INSERT INTO categoria(nome) values('cartazquadro')";
        $resultado = $databaseController->insert($query);

        $query = "INSERT INTO semestre(id,ano,numero) values('2050S2',2050,2)";
        $resultado = $databaseController->insert($query);


    }

    public function testCadastraProduto(){
        $produto = new Produto();
        $produtoController = ProdutoController::getInstance();
        $categoriaController = CategoriaController::getInstance();

        $produto->setNome("paçoca1");
        $produto->setIdentificacao("596");
        $produto->setCatmat("125");
        $produto->setQuantidade("122");
        $produto->setEstoqueIdeal("122");
        $produto->setPosicao("1a2");
        $produto->setDescricao("teste");
        $produto->getCategoria()->setNome("cartazquadro");
        $produto->getCategoria()->setId($categoriaController->getIDPeloNome("cartazquadro")['dados']);

        //Verifica se esta cadastrando corretamente um produto
        $this->assertEquals(1, ($produtoController->cadastraProduto($produto))['dados']);

        //verifica se cadastra nome duplicado
        $produto->setIdentificacao("524");
        $this->assertEquals(-2, ($produtoController->cadastraProduto($produto))['dados']);

        //verifica se cadastra identificação duplicada
        $produto->setNome("mouse2");
        $produto->setIdentificacao("596");
        $this->assertEquals(-3, ($produtoController->cadastraProduto($produto))['dados']);

    }

    // public function testEditarProduto(){
    //     $produtoController = ProdutoController::getInstance();
    //     $semestreController = SemestreController::getInstance();
    //     $semestreAtual = $semestreController->getSemestreAtual()['dados'];

    //     $id = $produtoController->getIDUltimoProdutoCadastrado()['dados'];

    //     $produto = $produtoController->getProdutoPorId($id, $semestreAtual->getId())['dados'];

    //     $produto->setNome("Boneca");

    //     //Verifica se o produto esta sendo editado corretamente
    //     $this->assertEquals(1, $produtoController->editarProduto($produto)['dados']);

    //     //Verifica se os campos do produto foram editados
    //     $this->assertEquals($produto, $produtoController->getProdutoPorId($id, $semestreAtual->getId())['dados']);

    // }

    public function testExcluirProduto(){
        $produtoController = ProdutoController::getInstance();


        $id = $produtoController->getIDUltimoProdutoCadastrado()['dados'];
        $this->assertEquals(1, $produtoController->excluirProduto($id)['dados']);

    }

    public static function tearDownAfterClass(): void{
        $databaseController = new DatabaseController();

        $query = "DELETE from categoria ORDER BY id DESC LIMIT 1";
        $resultado = $databaseController->delete($query);

        $query = "DELETE from semestre ORDER BY id DESC LIMIT 1";
        $resultado = $databaseController->delete($query);

    }

}
