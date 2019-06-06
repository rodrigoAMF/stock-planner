<?php
    require_once("controller/DatabaseController.php");

    $databaseController = DatabaseController::getInstance();
    $email = $_POST['email'];

    $conexao = $databaseController->open_database();

    $query = "SELECT * FROM usuarios WHERE email = '{$email}'";

    $resultado = $conexao->query($query);

    if($resultado == false)
    {
        $erro = 'Falha ao realizar a Query: ' . $query;
        throw new Exception($erro);
    }

    $dados = $resultado->fetch_all(MYSQLI_ASSOC);

    if(isset($dados[0]['ID']))
    {
        echo "1";
    }
    else{
        $databaseController->close_database();
        echo "0";
    }

?>