<?php

require_once("model/Produto.php");
require_once("controller/ProdutoController.php");
require_once("controller/DatabaseController.php");
use PHPUnit\Framework\TestCase;

class ProductIntegrationTest extends TestCase{

    public static function setUpBeforeClass(): void{
        $databaseController = new DatabaseController();
        $conexao = $databaseController->open_database();

        $query = "INSERT INTO categoria(nome) values('cartazquadro')";
        $resultado = $conexao->query($query);

        $query = "INSERT INTO semestre(id,ano,numero) values('2050S2',2050,2)";
        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $databaseController->close_database();

    }

    public function testCadastraProduto(){
        $produto = new Produto();
        $produtoController = ProdutoController::getInstance();

        $produto->setNome("qase");
        $produto->setIdentificacao("159");
        $produto->setCatmat("125");
        $produto->setQuantidade("122");
        $produto->setEstoqueIdeal("122");
        $produto->setPosicao("1a2");
        $produto->setDescricao("teste");
        $produto->getCategoria()->setNome("cartazquadro");

        //Verifica se esta cadastrando corretamente um produto
        $this->assertEquals(1, $produtoController->cadastraProduto($produto, "2050S2"));

        //verifica se cadastra nome duplicado
        $this->assertEquals(-2, $produtoController->cadastraProduto($produto, "2050S2"));

        //verifica se esta cadastrando produto com id duplicado
        $produto->setNome("ploc");
        $this->assertEquals(-3, $produtoController->cadastraProduto($produto, "2050S2"));

    }

    public function testCadastraProdutoCondicional(){
        $produto = new Produto();
        $produtoController = ProdutoController::getInstance();

        $produto->setNome("paredebranca");
        $produto->setIdentificacao("985");
        $produto->setCatmat("630");
        $produto->setQuantidade("13");
        $produto->setEstoqueIdeal("27");
        $produto->setPosicao("1a2");
        $produto->setDescricao("teste do produto condicional");
        $produto->getCategoria()->setNome("cartazquadro");

        //Verifica se esta cadastrando corretamente um produto
        $this->assertEquals(1, $produtoController->cadastroProdutoCondicional($produto));

        //verifica se cadastra nome duplicado
        $this->assertEquals(-2, $produtoController->cadastroProdutoCondicional($produto));

        //verifica se esta cadastrando produto com id duplicado
        $produto->setNome("garrafinha136");
        $this->assertEquals(-3, $produtoController->cadastroProdutoCondicional($produto));

    }

    public function testEditarProduto(){
        $produtoController = ProdutoController::getInstance();
        $databaseController = new DatabaseController();

        $conexao = $databaseController->open_database();

        $id = $produtoController->getIDUltimoProdutoCadastrado($conexao);

        $produto = new Produto();

        $produto->setNome("celular789");
        $produto->setIdentificacao("321");
        $produto->setCatmat("125");
        $produto->setQuantidade("122");
        $produto->setEstoqueIdeal("122");
        $produto->setPosicao("1a2");
        $produto->setDescricao("teste");
        $produto->getCategoria()->setNome("cartazquadro");

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

    public static function tearDownAfterClass(): void{
        $databaseController = new DatabaseController();

        $conexao = $databaseController->open_database();

        $query = "DELETE from categoria ORDER BY id DESC LIMIT 1";
        $resultado = $conexao->query($query);

        $query = "DELETE from semestre ORDER BY id DESC LIMIT 1";
        $resultado = $conexao->query($query);

        $query = "DELETE from produtos ORDER BY id DESC LIMIT 1";
        $resultado = $conexao->query($query);

    	if($resultado == false)
    	{
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
    	}

        $databaseController->close_database();

    }

}
