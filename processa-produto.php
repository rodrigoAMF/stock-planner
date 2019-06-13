<?php
    require_once("model/Produto.php");
    require_once("model/Semestre.php");
    require_once("controller/ProdutoController.php");

    $produto = new Produto();
    $semestre = new Semestre();

    $existemErros = false;

    $feedbacks = Array();

    $feedback = $produto->setNome($_GET['nome']);
    array_push($feedbacks, $feedback);
    $feedback = $produto->setIdentificacao($_GET['identificacao']);
    array_push($feedbacks, $feedback);
    $feedback = $produto->setCatmat($_GET['catmat']);
    array_push($feedbacks, $feedback);
    $feedback = $produto->setQuantidade($_GET['quantidade']);
    array_push($feedbacks, $feedback);
    $feedback = $produto->setEstoqueIdeal($_GET['estoqueIdeal']);
    array_push($feedbacks, $feedback);
    $feedback = $produto->setPosicao($_GET['posicao']);
    array_push($feedbacks, $feedback);
    $feedback = $produto->setDescricao($_GET['descricao']);
    array_push($feedbacks, $feedback);

    $semestre = $_GET['semestre'];

    $produto->getCategoria()->setNome($_GET['categoria']);

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

    //$resultadoCadastro = 1;

    //print_r($json);
    
    if($json['status'] !== -1 ){
        
        //$resultadoCadastro = $produtoController->cadastraProduto($produto);
        print_r($produtoController->cadastraProduto($produto));

        //if($resultadoCadastro['status'] == 200){
            // Produto com nome duplicado
            // if($resultadoCadastro['dados'] == -2){
            //     $json['status'] = -2;
            // }else if($resultadoCadastro['dados'] == -3){
            //     // Produto com identificação duplicada
            //     $json['status'] = -3;
            // }
        // }else{
        //     $json['status'] = -1;
        // }
    }

    //print_r($resultadoCadastro);

    

    //echo json_encode($json, JSON_UNESCAPED_UNICODE);

?>
