<?php

require_once("model/Produto.php");
require_once("controller/ProdutoController.php");
require_once("controller/DatabaseController.php");
use PHPUnit\Framework\TestCase;

class ProductIntegrationTest extends TestCase{

    public static function setUpBeforeClass(): void{
        $databaseController = new DatabaseController();

        $query = "INSERT INTO categoria(nome) values('cartazquadro')";
        $resultado = $databaseController->insert($query);

        $query = "INSERT INTO semestre(id,ano,numero) values('2050S2',2050,2)";
        $resultado = $databaseController->insert($query);

        if($resultado['status'] == 204){
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

    }

    public function testCadastraProduto(){
        $produto = new Produto();
        $produtoController = ProdutoController::getInstance();

        $produto->setNome("mouse");
        $produto->setIdentificacao("1695859");
        $produto->setCatmat("125");
        $produto->setQuantidade("122");
        $produto->setEstoqueIdeal("122");
        $produto->setPosicao("1a2");
        $produto->setDescricao("teste");
        $produto->getCategoria()->setNome("cartazquadro");

        //Verifica se esta cadastrando corretamente um produto
        $this->assertEquals(1, $produtoController->cadastraNovoProduto($produto)['dados']);

        //verifica se cadastra nome duplicado
        $this->assertEquals(-2, $produtoController->cadastraNovoProduto($produto)['dados']);

        //verifica se esta cadastrando produto com id duplicado 
        $produto->setNome("garrafinha");
        $this->assertEquals(-3, $produtoController->cadastraNovoProduto($produto)['dados']);

    }

    public function testEditarProduto(){
        $produtoController = ProdutoController::getInstance();

        $id = $produtoController->getIDUltimoProdutoCadastrado()['dados'];

        $produto = new Produto();

        $produto->setId($id);
        $produto->setNome("celular");
        $produto->setIdentificacao("321");
        $produto->setCatmat("125");
        $produto->setQuantidade("122");
        $produto->setEstoqueIdeal("122");
        $produto->setPosicao("1a2");
        $produto->setDescricao("teste");
        $produto->getCategoria()->setNome("cartazquadro");

        //Verifica se o produto esta sendo editado corretamente
        $this->assertEquals(1, $produtoController->editarProduto($produto, "2050S2")['dados']);

        //Verifica se os campos do produto foram editados
        $this->assertEquals($produto, $produtoController->getProdutoPorId($id));

    }

    public function testExcluirProduto(){
        $produtoController = ProdutoController::getInstance();


        $id = $produtoController->getIDUltimoProdutoCadastrado();
        $this->assertEquals(1, $produtoController->excluirProduto($id)['dados']);

    }

    public static function tearDownAfterClass(): void{
        $databaseController = new DatabaseController();

        $query = "DELETE from categoria ORDER BY id DESC LIMIT 1";
        $resultado = $databaseController->delete($query);

        $query = "DELETE from semestre ORDER BY id DESC LIMIT 1";
        $resultado = $databaseController->delete($query);

    	if($resultado['status'] == 204){
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
    	}

    }

}
