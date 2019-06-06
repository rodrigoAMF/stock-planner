<?php
    require_once("controller/CategoriaController.php");
    require_once("model/Categoria.php");

    $categoria = new Categoria();
    $categoriaController = CategoriaController::getInstance();

    if($categoria->setNome($_GET['nome']) == 1){
        if($categoriaController->getSemestreAtual()['status'] == 200){

            $resultadoQuery = $categoriaController->cadastraCategoria($categoria);
            echo $resultadoQuery;

        }else{
            echo -1;
        }
    }

    
