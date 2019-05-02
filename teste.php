<?php
// $erros[0]['nome_do_campo'] = 'nome';
// $erros[0]['mensagem'] = 'Nome muito grande';
// $erros[5]['nome_do_campo'] = 'quantidade';
// $erros[5]['mensagem'] = 'Quantidade nao pode ser negativa';

// $arr = array('status' => 'Ok', 'erros' => $erros);

// echo json_encode($arr);

    require_once("model/Produto.php");
    require_once("controller/ProdutoController.php");

    $produto = new Produto();

    $feedbacks = Array();

    $feedback = $produto->setNome('nomeTESTE');
    //array_push($feedbacks, $feedback);
    // $produto->setIdentificacao(15);
    // $produto->setCatmat(58);
    $feedback = $produto->setQuantidade(8688888);
    //array_push($feedbacks, $feedback);
    // $produto->setEstoqueIdeal(86);
    $feedback = $produto->setPosicao(999999999999999);
    //array_push($feedbacks, $feedback);

    // $json['status'] = 1;

    // for ($i=0, $cont = 0; $i < sizeof($feedbacks); $i++) {
    //     if($i == 0){
    //         $json['status'] = $feedbacks[$i]['status'];
    //     }else if($feedbacks[$i]['status'] == -1){
    //         $json['status'] = $feedbacks[$i]['status'];
    //     }
    //     if($feedbacks[$i]['status'] == -1){
    //         $json['erros'][$cont]['nome_do_campo'] = $feedbacks[$i]['nome_do_campo'];
    //         $json['erros'][$cont]['mensagem'] = $feedbacks[$i]['mensagem'];
    //         $cont++;
    //     }
    // }

    //print_r($json);
    //echo "<br>";
    //$verificaErro = array('status' => $status, 'erros' => $erro);
    //echo json_encode($json, JSON_UNESCAPED_UNICODE);
    // if($retorno != 1) 
    //     $erro = true;
    // $produto->getCategoria()->setNome('Resistor');
    // $produto->setDescricao('oi');

    // $produtoController = ProdutoController::getInstance();
    
    // if(!$erro){
    //     $resultadoQuery = $produtoController->cadastraProduto($produto,"1S2019");
    // }else{
    //     $resultadoQuery = "Ocorreu um erro";
    // }

    // echo $resultadoQuery;
?>