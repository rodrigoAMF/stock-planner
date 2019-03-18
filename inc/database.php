<?php

mysqli_report(MYSQLI_REPORT_STRICT);

function open_database() {
	try {
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		mysqli_set_charset($conn,"utf8");
		return $conn;
	} catch (Exception $e) {
		echo $e->getMessage();
		return null;
	}
}

function close_database($conn) {
	try {
		mysqli_close($conn);
	} catch (Exception $e) {
		echo $e->getMessage();
	}
}

// Retorna 1 produto do banco de dados a partir do seu ID
function getProdutoPorId($id){
    $conexao = open_database();

    $query = "SELECT * FROM produtos where id = " . $id;

    $resultado = $conexao->query($query);

    $dados = $resultado->fetch_all(MYSQLI_ASSOC);

    close_database($conexao);

    return $dados[0];
}

function cadastraProduto($nome, $identificacao, $catmat, $quantidade, $estoqueIdeal, $localizacao, $categoria, $descricao){
	$conexao = open_database();

	$query = "INSERT INTO produtos(nome, descricao, identificacao, catmat, categoria, posicao, estoque_ideal, quantidade) values('"
	. $nome . "', '" . $descricao . "', '" . $identificacao . "', " . $catmat . ", " . $categoria . ", '" . $localizacao . "', " . $estoqueIdeal . ",
			" . $quantidade . ")";


	$resultado = $conexao->query($query);

    close_database($conexao);

	// query retorna false caso query falhe
	if(!resultado){
		return false;
	}else{
		return true;
	}

}

function getTodosProdutos(){
	$conexao = open_database();

    $query = "SELECT p.nome, p.catmat, p.id, p.descricao,p.identificacao, p.posicao,p.estoque_ideal,p.quantidade, c.nome as categoria FROM produtos p, categoria c WHERE p.categoria = c.id";

    $resultado = $conexao->query($query);

    $dados = $resultado->fetch_all(MYSQLI_ASSOC);

    close_database($conexao);

    return $dados;
}
