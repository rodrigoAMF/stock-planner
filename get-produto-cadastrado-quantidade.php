<?php
    require_once("controller/SemestreController.php");
    require_once("controller/ProdutoController.php");

    $semestreController = SemestreController::getInstance();
    $semestres = $semestreController->getSemestres();
    //$semestres = array_reverse($semestres);
    $filtroSemestre = array();

    $busca = $_GET['busca'];
    $filtro = $_GET['filtro'];
    $parametroOrdenacao = $_GET['parametroOrdenacao'];
    $semestre = $_GET['semestre'];
    $cont = 0;
    // $semestreNovo = explode('"', $semestre);
    // $semestre = $semestreNovo[2];

    for ($i=0; $i < sizeof($semestres); $i++)
    { 
        if($semestres[$i]->getId() != $semestre)
        {
            echo $semestres[$i]->getId() . "<br>";
            echo $semestre . "<br>";

            array_push($filtroSemestre, $semestres[$i]->getId());
        }
        else
        {
            array_push($filtroSemestre, $semestres[$i]->getId());
            break;
        }
    }
    echo $cont;
    print_r($filtroSemestre);

    $busca = ($busca == "") ? null: $busca;
    $filtro = ($filtro == "") ? null: $filtro;
    $parametroOrdenacao = ($parametroOrdenacao == "") ? null: $parametroOrdenacao;

    $produtoController = ProdutoController::getInstance();

    $produtos = $produtoController->getProdutosCadastradosQuantidade($busca, $filtro, $parametroOrdenacao, $semestre);

    echo $produtos;
?>
