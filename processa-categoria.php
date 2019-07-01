<?php
    require_once("controller/CategoriaController.php");
    require_once("model/Categoria.php");

    $categoria = new Categoria();
    $categoriaController = CategoriaController::getInstance();

    if($categoria->setNome($_GET['nome']) == 1){
        $resultadoQuery = $categoriaController->cadastraCategoria($categoria);
        if($resultadoQuery['status'] == 200 && $resultadoQuery['dados'] == 1){
            echo $resultadoQuery;
        }else{
            echo -1;
        }
    } else {
        echo -1;
    }

    
