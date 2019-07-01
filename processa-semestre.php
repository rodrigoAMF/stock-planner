<?php
    require_once("controller/SemestreController.php");
    require_once("model/Semestre.php");


	$semestreController = SemestreController::getInstance();

    $resultadoQuery = $semestreController->cadastraProximoSemestre();
    
    if($semestreController->getSemestreAtual()['status'] == 200){
        echo $semestreController->getSemestreAtual()['dados']->getId();
    }else{
        echo "Erro ao buscar o semestre atual";
    }
