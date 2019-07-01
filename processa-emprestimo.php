<?php
    require_once("model/Emprestimo.php");
    require_once("controller/EmprestimoController.php");

    $emprestimo = new Emprestimo();
    $feedbacks = Array();

    $nome = $_POST['nome'];
    $dataEmprestimo = $_POST['dataEmprestimo'];
    $email = $_POST['email'];
    $documento = $_POST['documento'];

    $feedback = $emprestimo->setNome($nome);
    array_push($feedbacks, $feedback);
    $feedback = $emprestimo->setDataEmprestimo($dataEmprestimo);
    array_push($feedbacks, $feedback);
    $feedback = $emprestimo->setEmail($email);
    array_push($feedbacks, $feedback);
    $feedback = $emprestimo->setDocumento($documento);
    array_push($feedbacks, $feedback);

    $json['status'] = 1;

    $cont = 0;
    for ($i=0; $i < sizeof($feedbacks); $i++) {
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

    // let listaDeProdutos = sessionStorage.getItem("listaDeProdutos");
    // let lista =JSON.parse(listaDeProdutos);
    
    for(var i in lista){
        var produto = JSON.parse(lista[i]);
        var idProduto = parseInt(produto.Id);
        var quantidade = parseInt(produto.Quantidade);

        $emprestimoController = EmprestimoController::getInstance();

        if($json['status'] !== -1 ){
            $resultadoCadastro = $emprestimoController->cadastraEmprestimo($emprestimo, $idProduto,)['dados'];
        }

    }

    echo json_encode($json, JSON_UNESCAPED_UNICODE);
?>