<?php
    include("config.php");
    include(DBAPI);
    print_r($_POST);


    $nome = $_POST['nome'];
    $identificacao = $_POST['identificacao'];
    $catmat = $_POST['catmat'];
    $quantidade = $_POST['quantidade'];
    $estoqueIdeal = $_POST['estoqueIdeal'];
    $localizacao = $_POST['localizacao'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $id = $_GET['id'];


    $resultadoQuery = editarProduto($nome, $identificacao, $catmat, $quantidade, $estoqueIdeal, $localizacao, $categoria, $descricao, $id);

    if($resultadoQuery){
        http_response_code(200);
        echo '200 (Okay)';
    }else{
        http_response_code(500);
        echo '500 (Internal Server Error)';
    }
?>
