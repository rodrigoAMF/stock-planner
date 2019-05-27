<?php
    require_once("controller/SemestreController.php");
    require_once("model/Semestre.php");


	$semestreController = SemestreController::getInstance();

	$resultadoQuery = $semestreController->cadastraSemestre();

    echo $semestreController->getSemestreAtual();
