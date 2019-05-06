<?php
    require_once("model/Produto.php");
    require_once("model/Semestre.php");
    require_once("controller/ProdutoController.php");

    $produto = new Produto();
    $semestre = new Semestre();

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

    $resultadoCadastro = 1;

    if($json['status'] !== -1){
        $resultadoCadastro = $produtoController->cadastraProduto($produto, $semestre);

    }

    // Produto duplicado
    if($resultadoCadastro == -1){
        $json['status'] = -2;
    }

    echo json_encode($json, JSON_UNESCAPED_UNICODE);

?>
