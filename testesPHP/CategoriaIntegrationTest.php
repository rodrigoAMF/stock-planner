<?php

require_once("model/Categoria.php");
require_once("controller/CategoriaController.php");
require_once("controller/DatabaseController.php");
use PHPUnit\Framework\TestCase;

class CategoriaIntegrationTest extends TestCase{

    public static function setUpBeforeClass(): void{
        $databaseController = new DatabaseController();

        $conexao = $databaseController->open_database();

        $query = "INSERT INTO categoria(nome) values('estabilizador')";
        $resultado = $conexao->query($query);
        $query = "INSERT INTO categoria(nome) values('mochila')";
        $resultado = $conexao->query($query);
        $query = "INSERT INTO categoria(nome) values('meia')";
        $resultado = $conexao->query($query);
        
        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $databaseController->close_database();

    }

    public function testCadastraCategoria(){
        $categoria = new Categoria();
        $categoriaController = CategoriaController::getInstance();

        $categoria->setNomeNovo("Oculos");

        $this->assertEquals(1, $categoriaController->cadastraCategoria($categoria));
        $this->assertEquals(-1, $categoriaController->cadastraCategoria($categoria));

    }

    public function testVerificaSeCategoriaExiste(){
        $categoriaController = CategoriaController::getInstance();

        //Verifica se a categoria passada como paremetro existe no banco de dados
        $this->assertEquals(1, $categoriaController->verificaSeCategoriaExistePorNome("ocUlos"));
        //Verifica se a função falha passando um nome que não existe no banco
        $this->assertEquals(0, $categoriaController->verificaSeCategoriaExistePorNome("Urucubaca"));
    }

    public function testGetCategorias(){
        $categoriaController = CategoriaController::getInstance();
        $count = 0;

        $categorias = $categoriaController->getCategorias();
        for($i= 0; $i< sizeof($categorias); $i++){
            if($categorias[$i]->getNome() == "estabilizador" || $categorias[$i]->getNome() == "mochila"
                || $categorias[$i]->getNome() == "meia"){
                    $count++;
            }

        }

        $this->assertEquals(3, $count);
    }

    public static function tearDownAfterClass(): void{
        $databaseController = new DatabaseController();

        $conexao = $databaseController->open_database();

        for($i = 0 ; $i<4; $i++){
            $query = "DELETE from categoria ORDER BY id DESC LIMIT 1";
            $resultado = $conexao->query($query);
        }


    	if($resultado == false)
    	{
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
    	}

        $databaseController->close_database();

    }

}
