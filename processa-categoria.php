<?php
    require_once("controller/CategoriaController.php");
    require_once("model/Categoria.php");

    $categoria = new Categoria();
    $categoria->setNomeNovo($_GET['nome']);

    $categoriaController = CategoriaController::getInstance();

    $resultadoQuery = $categoriaController->cadastraCategoria($categoria);

    echo $resultadoQuery;
