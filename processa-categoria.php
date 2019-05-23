<?php
    require_once("controller/CategoriaController.php");
    require_once("model/Categoria.php");

    $categoria = new Categoria();
    if($categoria->setNomeNovo($_GET['nome']) == 1){
        $categoriaController = CategoriaController::getInstance();

        $resultadoQuery = $categoriaController->cadastraCategoria($categoria);

        echo $resultadoQuery;
    }
    else{
        echo -1;
    }

    
