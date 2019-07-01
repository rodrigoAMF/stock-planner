<?php
    require_once("controller/SemestreController.php");
    require_once("controller/ProdutoController.php");

    $semestreController = SemestreController::getInstance();
    $semestres = $semestreController->getSemestres();
    $semestres= $semestres['dados'];
    //$semestres = array_reverse($semestres);
    $filtroSemestre = array();

    $busca = $_GET['busca'];
    $filtro = $_GET['filtro'];
    $parametroOrdenacao = $_GET['parametroOrdenacao'];
    $semestre = $_GET['semestre'];
    $cont = 0;

    for ($i=0; $i < sizeof($semestres); $i++)
    { 
        if($semestres[$i]->getId() != $semestre)
        {
            array_push($filtroSemestre, $semestres[$i]->getId());
        }
        else
        {
            array_push($filtroSemestre, $semestres[$i]->getId());
            break;
        }
    }
    $quantidadeSemestre = (sizeof($filtroSemestre) - 1);
    if($quantidadeSemestre >= 4)
    {
        $quantidadeSemestre = 3;
    }

    $tamanhoSemestre = sizeof($filtroSemestre);
    if($tamanhoSemestre > 4)
    {
        $tamanhoSemestre = $tamanhoSemestre - 4;

        for ($i=0; $i < $tamanhoSemestre; $i++) 
        { 
            array_shift($filtroSemestre);        
        }
    }

    $busca = ($busca == "") ? null: $busca;
    $filtro = ($filtro == "") ? null: $filtro;
    $parametroOrdenacao = ($parametroOrdenacao == "") ? null: $parametroOrdenacao;

    $produtoController = ProdutoController::getInstance();
    //print_r($filtroSemestre);
    
    $produtos = $produtoController->getProdutosCadastradosQuantidade($busca, $filtro, $parametroOrdenacao, $semestre, $quantidadeSemestre, $filtroSemestre);
    //print_r($produtos);
    $json['produtos'] = $produtos;
    $json['semestre']  = $filtroSemestre;
    echo json_encode($json);
?>
