<?php

require_once("model/Semestre.php");
require_once("controller/SemestreController.php");
require_once("controller/DatabaseController.php");
use PHPUnit\Framework\TestCase;

class SemestreIntegrationTest extends TestCase{

    public static function setUpBeforeClass(): void{
        $databaseController = new DatabaseController();
        $conexao = $databaseController->open_database();

        $query = "INSERT INTO semestre(id,ano,numero) values('2050S2',2050,2)";
        $resultado = $conexao->query($query);

        $query = "INSERT INTO semestre(id,ano,numero) values('2051S1',2051,1)";
        $resultado = $conexao->query($query);

        $query = "INSERT INTO semestre(id,ano,numero) values('2051S2',2051,2)";
        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $databaseController->close_database();

    }

    public function testGetSemestres(){
        $semestreController = SemestreController::getInstance();
        $count = 0;

        $semestres = $semestreController->getSemestres();
        for($i= 0; $i< sizeof($semestres); $i++){
            if($semestres[$i]->getId() == "2050S2" || $semestres[$i]->getId() == "2051S1"
                || $semestres[$i]->getId() == "2051S2"){
                    $count++;
            }

        }

        $this->assertEquals(3, $count);
    }
    
    public static function tearDownAfterClass(): void{
        $databaseController = new DatabaseController();

        $conexao = $databaseController->open_database();

        for($i = 0 ; $i<3; $i++){
            $query = "DELETE from semestre ORDER BY id DESC LIMIT 1";
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
