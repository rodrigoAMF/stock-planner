<?php
require_once("model/Categoria.php");
require_once("controller/CategoriaController.php");
require_once("controller/DatabaseController.php");
use PHPUnit\Framework\TestCase;

class CategoriaIntegrationTest extends TestCase{

    public static function setUpBeforeClass(): void{
        $databaseController = new DatabaseController();

        $query = "INSERT INTO categoria(nome) values('estabilizador')";
        $resultado = $databaseController->insert($query);

        $query = "INSERT INTO categoria(nome) values('mochila')";
        $resultado = $databaseController->insert($query);
        
        $query = "INSERT INTO categoria(nome) values('meia')";
        $resultado = $databaseController->insert($query);

        if($resultado['status'] == 204)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }


    }

    public function testCadastraCategoria(){
        $categoria = new Categoria();
        $categoriaController = CategoriaController::getInstance();

        $categoria->setNome("Oculos");

        $this->assertEquals(1, $categoriaController->cadastraCategoria($categoria)['dados']);
        $this->assertEquals(-1, $categoriaController->cadastraCategoria($categoria)['dados']);

    }
    

    public function testGetCategorias(){
        $categoriaController = CategoriaController::getInstance();
        $count = 0;

        $categorias = $categoriaController->getCategorias();
        for($i= 0; $i< sizeof($categorias['dados']); $i++){
            if($categorias['dados'][$i]->getNome() == "estabilizador" || $categorias['dados'][$i]->getNome() == "mochila"
                || $categorias['dados'][$i]->getNome() == "meia"){
                    $count++;
            }

        }

        $this->assertEquals(3, $count);
    }

    public static function tearDownAfterClass(): void{
        $databaseController = new DatabaseController();

        for($i = 0 ; $i<4; $i++){
            $query = "DELETE from categoria ORDER BY id DESC LIMIT 1";
            $resultado = $databaseController->delete($query);
        }

    	if($resultado['status'] == 204)
    	{
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
    	}


    }

}
