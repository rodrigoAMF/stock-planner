<?php
// Retorna 1 produto do banco de dados a partir do seu ID
function getProdutoPorId($id){
    $conexao = open_database();

    $query = "SELECT * FROM produtos where id = " . $id;

    $resultado = $conexao->query($query);

    $dados = $resultado->fetch_all(MYSQLI_ASSOC);

    close_database($conexao);

    return $dados;
}

?>
