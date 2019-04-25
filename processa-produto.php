<?php
    require_once("model/Produto.php");
    require_once("controller/ProdutoController.php");


    $produto = new Produto();

    $erro = array(
        array(
            "campo" => "nome",
            "mensagem" => "",
            ),
        
        array(
            "campo" => "identificacao",
            "mensagem" => "",
        ),
        
        array(
            "campo" => "posicao",
            "mensagem" => "",
        ),
        
        array(
            "campo" => "descricao",
            "mensagem" => "",
        )
        array(
            "campo" => "catmat",
            "mensagem" => "",
            ),
        
        array(
            "campo" => "quantidade",
            "mensagem" => "",
        ),
        
        array(
            "campo" => "estoqueIdeal",
            "mensagem" => "",
        ),
        
        array(
            "campo" => "categoria",
            "mensagem" => "",
        )
        );

        $obj = json_encode($erro);
    

    $nome = $produto->setNome($_POST['nome']);
    if($nome == -2){
        $erro[]
        echo "O nome excedeu o tamanho máximo";
    }else if($nome == -3){
        echo "O campo nome está vazio";
    }

    $identificacao = $produto->setIdentificacao($_POST['identificacao']);
    $catmat = $produto->setCatmat($_POST['catmat']);
    $quantidade = $produto->setQuantidade($_POST['quantidade']);
    $estoqueIdeal = $produto->setEstoqueIdeal($_POST['estoqueIdeal']);
    $posicao = $produto->setPosicao($_POST['posicao']);
    $categoria = $produto->getCategoria()->setNome($_POST['categoria']);
    $descricao = $produto->setDescricao($_POST['descricao']);



    $produtoController = ProdutoController::getInstance();
    $resultadoCadastro = $produtoController->cadastraProduto($produto);

    echo "{status: 0, mensagem = " . $mensagemNome . "}";

    echo $resultadoCadastro;
?>
