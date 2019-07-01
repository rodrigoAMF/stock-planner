<?php
    require_once("model/Produto.php");
    require_once("model/Semestre.php");
    require_once("controller/ProdutoController.php");
    require_once("controller/CategoriaController.php");

    $produto = new Produto();
    $semestre = new Semestre();
    $categoriaController = CategoriaController::getInstance();

    $existemErros = false;

    $feedbacks = Array();

    $feedback = $produto->setNome($_POST['nome']);
    array_push($feedbacks, $feedback);
    $feedback = $produto->setIdentificacao($_POST['identificacao']);
    array_push($feedbacks, $feedback);
    $feedback = $produto->setCatmat($_POST['catmat']);
    array_push($feedbacks, $feedback);
    $feedback = $produto->setQuantidade($_POST['quantidade']);
    array_push($feedbacks, $feedback);
    $feedback = $produto->setEstoqueIdeal($_POST['estoqueIdeal']);
    array_push($feedbacks, $feedback);
    $feedback = $produto->setPosicao($_POST['posicao']);
    array_push($feedbacks, $feedback);
    $feedback = $produto->setDescricao($_POST['descricao']);
    array_push($feedbacks, $feedback);

    $semestre = $_POST['semestre'];

    $produto->getCategoria()->setNome($_POST['categoria']);
    $produto->getCategoria()->setId($categoriaController->getIDPeloNome($_POST['categoria'])['dados']);

    $json['status'] = 1;


    for ($i=0, $cont = 0; $i < sizeof($feedbacks); $i++) {
        if($i == 0){
            $json['status'] = $feedbacks[$i]['status'];
        }else if($feedbacks[$i]['status'] == -1){
            $json['status'] = $feedbacks[$i]['status'];
        }

        if($feedbacks[$i]['status'] == -1){
            $json['erros'][$cont]['nome_do_campo'] = $feedbacks[$i]['nome_do_campo'];
            $json['erros'][$cont]['mensagem'] = $feedbacks[$i]['mensagem'];
            $cont++;
        }
    }

    $produtoController = ProdutoController::getInstance();

    
    if($json['status'] != -1 ){
        
        $resultadoCadastro = $produtoController->cadastraProduto($produto);

        //Produto com nome duplicado
        if($resultadoCadastro['dados'] == -2){
            $json['status'] = -2;
        }else if($resultadoCadastro['dados'] == -3){
            // Produto com identificação duplicada
            $json['status'] = -3;
        }
    }
    
    echo json_encode($json, JSON_UNESCAPED_UNICODE);

?>
