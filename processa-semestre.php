<?php
    require_once("controller/SemestreController.php");
    require_once("model/Semestre.php");

    $semestre = new Semestre();

    $ano = $semestre->getUltimoAno();

    function atualizaSemestre($ano, $numero)
    {

    	if($semestre->getNumero() == 1)
    	{
    		$numero++;
    		$semestre->setAtributos($numero.'S'.$ano, $ano, $numero);
    	}else if($semestre->getNumero() == 2){
    		$numero--;
    		$ano++;
    		$semestre->setAtributos($numero.'S'.$ano, $ano, $numero);
    	}

    	$semestreController = SemestreController::getInstance();

    	$resultadoQuery = $semestreController->cadastraSemestre($semestre);
    }

    echo $resultadoQuery;
