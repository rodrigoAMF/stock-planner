<?php

require_once("model/Semestre.php");
require_once("controller/SemestreController.php");
require_once("controller/DatabaseController.php");
use PHPUnit\Framework\TestCase;

class SemestreIntegrationTest extends TestCase{

    public static function setUpBeforeClass(): void{
        $databaseController = new DatabaseController();
        
        $query = "INSERT INTO semestre(id,ano,numero) values('2050S2',2050,2)";
        $resultado = $databaseController->insert($query);

        $query = "INSERT INTO semestre(id,ano,numero) values('2051S1',2051,1)";
        $resultado = $databaseController->insert($query);

        $query = "INSERT INTO semestre(id,ano,numero) values('2051S2',2051,2)";
        $resultado = $databaseController->insert($query);

        if($resultado['status'] == 204)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

    }

    public function testGetSemestres(){
        $semestreController = SemestreController::getInstance();
        $count = 0;

        $semestres = $semestreController->getSemestres();
        for($i= 0; $i< sizeof($semestres['dados']); $i++){
            if($semestres['dados'][$i]->getId() == "2050S2" || $semestres['dados'][$i]->getId() == "2051S1"
                || $semestres['dados'][$i]->getId() == "2051S2"){
                    $count++;
            }

        }

        $this->assertEquals(3, $count);
    }
    
    public function testGetSemestreAtual(){
        $semestreController = SemestreController::getInstance();
        
        $this->assertEquals("2051S2", $semestreController->getSemestreAtual()['dados']->getId());
    }
    
    public function testeCadastraProximoSemestre(){
        $semestreController = SemestreController::getInstance();
        
        $this->assertEquals(200, $semestreController->cadastraProximoSemestre()['status']);
        $this->assertEquals("2052S1", $semestreController->getSemestreAtual()['dados']->getId());
    }

    public static function tearDownAfterClass(): void{
        $databaseController = new DatabaseController();

        for($i = 0 ; $i<4; $i++){
            $query = "DELETE from semestre ORDER BY id DESC LIMIT 1";
            $resultado = $databaseController->delete($query);
        }
        

    	if($resultado['status'] == 204)
    	{
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
    	}

    }

}
