<?php
    require_once("controller/DatabaseController.php");

    $databaseController = DatabaseController::getInstance();
    $email = $_GET['email'];
    $senha = MD5($_GET['senha']);

    $conexao = $databaseController->open_database();

    $query = "UPDATE usuarios SET senha = '{$senha}' WHERE email = '{$email}'";

    $resultado = $conexao->query($query);

    if($resultado == false)
    {
        $erro = 'Falha ao realizar a Query: ' . $query;
        throw new Exception($erro);
    }
    
    echo "1";

?>