<?php
    include("config.php");
    include(DBAPI);
    print_r($_GET);

    $id = $_GET['id'];


    $resultadoQuery = excluirProduto($id);

    //header('Location: lista-produtos.php');

    /*if($resultadoQuery){
        http_response_code(200);
        echo '200 (Okay)';
    }else{
        http_response_code(500);
        echo '500 (Internal Server Error)';
    }*/
?>
