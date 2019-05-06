<?php
    require_once("controller/SemestreController.php");
    require_once("model/Semestre.php");


	$semestreController = SemestreController::getInstance();

    $semestre = $semestreController->atualizaSemestre();

	$resultadoQuery = $semestreController->cadastraSemestre($semestre);

    echo $semestreController->getSemestreAtual();
