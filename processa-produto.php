<?php
    require_once("model/Produto.php");
    require_once("controller/ProdutoController.php");

    $cont = 0;
    $erro[$cont]['mensagem'] = "";
    $status = 1; //okay = 1; nookay = -1;
    $produto = new Produto();

    $existemErros = false;

    $nome = $produto->setNome($_POST['nome']);
    if($nome == -2){
        $erro[$cont]['nome_do_campo'] = "nome";       
        $erro[$cont]['mensagem'] = "O nome excedeu o tamanho máximo";
        $cont++;
        $status = -1;
    }else if($nome == -3){
        $erro[$cont]['nome_do_campo'] = "nome";       
        $erro[$cont]['mensagem'] = "O campo nome está vazio";
        $cont++;
        $status = -1;
    }

    $identificacao = $produto->setIdentificacao($_POST['identificacao']);
    if($identificacao == -2){
        $erro[$cont]['nome_do_campo'] = "identificacao";       
        $erro[$cont]['mensagem'] = "O campo identificação excedeu o tamanho máximo";
        $cont++;
        $status = -1;
    }else if($identificacao == -3){
        $erro[$cont]['nome_do_campo'] = "identificacao";       
        $erro[$cont]['mensagem'] = "O campo identificação está vazio";
        $cont++;
        $status = -1;
    }

    $catmat = $produto->setCatmat($_POST['catmat']);
    if($catmat == -2){
        $erro[$cont]['nome_do_campo'] = "catmat";       
        $erro[$cont]['mensagem'] = "O catmat excedeu o tamanho máximo";
        $cont++;
        $status = -1;
    }else if($catmat == -3){
        $erro[$cont]['nome_do_campo'] = "catmat";       
        $erro[$cont]['mensagem'] = "O campo catmat está vazio";
        $cont++;
        $status = -1;
    }else if($catmat == -4){
        $erro[$cont]['nome_do_campo'] = "catmat";       
        $erro[$cont]['mensagem'] = "O campo catmat deve ser numerico";
        $cont++;
        $status = -1;
    }

    $quantidade = $produto->setQuantidade($_POST['quantidade']);
    if($quantidade == -2){
        $erro[$cont]['nome_do_campo'] = "quantidade";       
        $erro[$cont]['mensagem'] = "A quantidade excedeu o tamanho máximo";
        $cont++;
        $status = -1;
    }else if($quantidade == -3){
        $erro[$cont]['nome_do_campo'] = "catmat";       
        $erro[$cont]['mensagem'] = "O campo quantidade está vazio";
        $cont++;
        $status = -1;
    }else if($quantidade == -4){
        $erro[$cont]['nome_do_campo'] = "catmat";       
        $erro[$cont]['mensagem'] = "O campo quantidade deve ser numerico";
        $cont++;
        $status = -1;
    }

    $estoqueIdeal = $produto->setEstoqueIdeal($_POST['estoqueIdeal']);
    if($estoqueIdeal == -2){
        $erro[$cont]['nome_do_campo'] = "estoqueIdeal";       
        $erro[$cont]['mensagem'] = "O estoque ideal excedeu o tamanho máximo";
        $cont++;
        $status = -1;
    }else if($estoqueIdeal == -3){
        $erro[$cont]['nome_do_campo'] = "estoqueIdeal";       
        $erro[$cont]['mensagem'] = "O campo estoque ideal está vazio";
        $cont++;
        $status = -1;
    }else if($estoqueIdeal == -4){
        $erro[$cont]['nome_do_campo'] = "estoqueIdeal";       
        $erro[$cont]['mensagem'] = "O campo estoque ideal deve ser numerico";
        $cont++;
        $status = -1;
    }

    $posicao = $produto->setPosicao($_POST['posicao']);
    if($posicao == -2){
        $erro[$cont]['nome_do_campo'] = "posicao";       
        $erro[$cont]['mensagem'] = "A posição excedeu o tamanho máximo";
        $cont++;
        $status = -1;
        $existemErros = true;
    }else if($posicao == -3){
        $erro[$cont]['nome_do_campo'] = "posicao";       
        $erro[$cont]['mensagem'] = "O campo posição está vazio";
        $cont++;
        $status = -1;
        $existemErros = true;
    }

    $categoria = $produto->getCategoria()->setNome($_POST['categoria']);

    $descricao = $produto->setDescricao($_POST['descricao']);
    if($descricao == -3){
        $erro[$cont]['nome_do_campo'] = "descricao";       
        $erro[$cont]['mensagem'] = "O campo descrição está vazio";
        $cont++;
        $status = -1;
    }

    $produtoController = ProdutoController::getInstance();

    $resultadoCadastro = 1;

    if(!$existemErros){
        $resultadoCadastro = $produtoController->cadastraProduto($produto, "1S2019");
    }

    // Produto duplicado
    if($resultadoCadastro == -1){
        $status = -2;
    }

    $verificaErro = array('status' => $status, 'erros' => $erro);

    echo json_encode($verificaErro, JSON_UNESCAPED_UNICODE);

    //echo $resultadoCadastro;
?>
