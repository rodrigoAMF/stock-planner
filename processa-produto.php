<?php
    require_once("model/Produto.php");
    require_once("controller/ProdutoController.php");

    //$cont = 0;
    $produto = new Produto();



    $nome = $produto->setNome($_POST['nome']);
    /*if($nome == -2){
        $erro[$cont]['nome_do_campo'] = nome;       
        $erro[$cont]['nome_do_campo'] = nome;
        echo "O nome excedeu o tamanho máximo";
    }else if($nome == -3){
        echo "O campo nome está vazio";
    }*/

    $identificacao = $produto->setIdentificacao($_POST['identificacao']);
    $catmat = $produto->setCatmat($_POST['catmat']);
    $quantidade = $produto->setQuantidade($_POST['quantidade']);
    $estoqueIdeal = $produto->setEstoqueIdeal($_POST['estoqueIdeal']);
    $posicao = $produto->setPosicao($_POST['posicao']);
    $categoria = $produto->getCategoria()->setNome($_POST['categoria']);
    $descricao = $produto->setDescricao($_POST['descricao']);



    $produtoController = ProdutoController::getInstance();
    $resultadoCadastro = $produtoController->cadastraProduto($produto, "1S2019");

    echo "{status: 0, mensagem = " . $mensagemNome . "}";

    echo $resultadoCadastro;
?>
