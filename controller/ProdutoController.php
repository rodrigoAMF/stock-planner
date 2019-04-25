<?php
require_once("DatabaseController.php");

class ProdutoController{

    private $databaseController;
    private static $produtoController;

    public function __construct(){
        $this->databaseController = new DatabaseController();
    }

    public static function getInstance(){
        if(!isset(self::$produtoController)){
            self::$produtoController = new ProdutoController();
        }
        return self::$produtoController;
    }

    function sortLista($produtos, $parametro){

    	if($parametro == null) $parametro = 8;
    	/*
    	1- nome
    	2- ident
    	3- catmat
    	4- categoria
    	5- posicao
    	6- estoque ideal
    	7- quantidade
    	8, default- crit
    	*/
    	if(abs($parametro) == 1){
    		for($i=1;$i < sizeof($produtos);$i++) for($j=0;$j < sizeof($produtos) -$i;$j++){
    			if($parametro > 0){
    				if(strtoupper($produtos[$j]['nome']) > strtoupper($produtos[$j+1]['nome'])){
    					$aux = $produtos[$j];
    	                $produtos[$j] = $produtos[$j+1];
    	                $produtos[$j+1] = $aux;
    				}
    			}else{
    				if(strtoupper($produtos[$j]['nome']) < strtoupper($produtos[$j+1]['nome'])){
    					$aux =  $produtos[$j];
    	                $produtos[$j] = $produtos[$j+1];
    	                $produtos[$j+1] = $aux;
    				}
    			}
    		}
    	}
    	if(abs($parametro) == 2){
    		for($i=1;$i < sizeof($produtos);$i++) for($j=0;$j < sizeof($produtos) -$i;$j++){
    			if($parametro > 0){
    				if(strtoupper($produtos[$j]['identificacao']) > strtoupper($produtos[$j+1]['identificacao'])){
    					$aux =  $produtos[$j];
    	                $produtos[$j] = $produtos[$j+1];
    	                $produtos[$j+1] = $aux;
    				}
    			}else{
    				if(strtoupper($produtos[$j]['identificacao']) < strtoupper($produtos[$j+1]['identificacao'])){
    					$aux =  $produtos[$j];
    	                $produtos[$j] = $produtos[$j+1];
    	                $produtos[$j+1] = $aux;
    				}
    			}
    		}
    	}
    	if(abs($parametro) == 3){
    		$parametro /= 3;
    		for($i=1;$i < sizeof($produtos);$i++) for($j=0;$j < sizeof($produtos) -$i;$j++){
    			if($produtos[$j]['catmat']*$parametro > $produtos[$j+1]['catmat']*$parametro){
    				$aux =  $produtos[$j];
                    $produtos[$j] = $produtos[$j+1];
                    $produtos[$j+1] = $aux;
    			}
    		}
    	}
    	if(abs($parametro) == 4){
    		for($i=1;$i < sizeof($produtos);$i++) for($j=0;$j < sizeof($produtos) -$i;$j++){
    			if($parametro > 0){
    				if(strtoupper($produtos[$j]['categoria']) > strtoupper($produtos[$j+1]['categoria'])){
    					$aux =  $produtos[$j];
    	                $produtos[$j] = $produtos[$j+1];
    	                $produtos[$j+1] = $aux;
    				}
    			}else{
    				if(strtoupper($produtos[$j]['categoria']) < strtoupper($produtos[$j+1]['categoria'])){
    					$aux =  $produtos[$j];
    	                $produtos[$j] = $produtos[$j+1];
    	                $produtos[$j+1] = $aux;
    				}
    			}
    		}
    	}
    	if(abs($parametro) == 5){
    		for($i=1;$i < sizeof($produtos);$i++) for($j=0;$j < sizeof($produtos) -$i;$j++){
    			if($parametro > 0){
    				if(strtoupper($produtos[$j]['posicao']) > strtoupper($produtos[$j+1]['posicao'])){
    					$aux =  $produtos[$j];
    	                $produtos[$j] = $produtos[$j+1];
    	                $produtos[$j+1] = $aux;
    				}
    			}else{
    				if(strtoupper($produtos[$j]['posicao']) < strtoupper($produtos[$j+1]['posicao'])){
    					$aux =  $produtos[$j];
    	                $produtos[$j] = $produtos[$j+1];
    	                $produtos[$j+1] = $aux;
    				}
    			}
    		}
    	}
    	if(abs($parametro) == 6){
    		$parametro /= 6;
    		for($i=1;$i < sizeof($produtos);$i++) for($j=0;$j < sizeof($produtos) -$i;$j++){
    			if($produtos[$j]['estoque_ideal']*$parametro > $produtos[$j+1]['estoque_ideal']*$parametro){
    				$aux =  $produtos[$j];
                    $produtos[$j] = $produtos[$j+1];
                    $produtos[$j+1] = $aux;
    			}
    		}
    	}
    	if(abs($parametro) == 7){
    		$parametro /= 7;
    		for($i=1;$i < sizeof($produtos);$i++) for($j=0;$j < sizeof($produtos) -$i;$j++){
    			if($produtos[$j]['quantidade']*$parametro > $produtos[$j+1]['quantidade']*$parametro){
    				$aux =  $produtos[$j];
                    $produtos[$j] = $produtos[$j+1];
                    $produtos[$j+1] = $aux;
    			}
    		}
    	}
    	if(abs($parametro) == 8){
    		$parametro /= 8;
    		for($i=1;$i < sizeof($produtos);$i++) for($j=0;$j < sizeof($produtos) -$i;$j++){
    			if($produtos[$j]['porcentagem']*$parametro < $produtos[$j+1]['porcentagem']*$parametro){
    				$aux =  $produtos[$j];
    	            $produtos[$j] = $produtos[$j+1];
    	            $produtos[$j+1] = $aux;
    			}
    		}
    	}
    	return $produtos;
    }

    function verificaSeProdutoExiste($nome){
        $conexao = $this->databaseController->open_database();

        $query = "SELECT * FROM produtos WHERE nome = '" . $nome . "'";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        if($resultado->fetch_row() > 0){
            return true;
        }else{
            return false;
        }

    }

    function getProdutoPorId($id){
        $conexao = $this->databaseController->open_database();

        $query = "SELECT p.nome, p.catmat, p.id, p.descricao,p.identificacao, p.posicao,p.estoque_ideal,p.quantidade, c.nome as categoria FROM produtos p, categoria c WHERE p.categoria = c.id AND p.id = " . $id;

        $resultado = $conexao->query($query);

    	if($resultado == false)
    	{
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
    	}

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $this->databaseController->close_database();

    	if(isset($dados[0]['id'])){
    		return $dados[0];
    	}else{
    		return "Não existe um produto com esse id!";
    	}
    }

    function cadastraProduto($produto){
    	$conexao = $this->databaseController->open_database();

    	$duplicado = $this->verificaSeProdutoExiste($produto->getNome());

    	if(!$duplicado)
        {
            $query = "INSERT INTO produtos(nome, descricao, identificacao, catmat, categoria, posicao, estoque_ideal, quantidade) values('"
                . $produto->getNome() . "', '" . $produto->getDescricao() . "', '" . $produto->getIdentificacao() . "', " . $produto->getCatmat() . ", " . $produto->getCategoria()->getId() . ", '" . $produto->getPosicao() . "', " . $produto->getEstoqueIdeal() . ",
    			" . $produto->getQuantidade() . ")";

            $resultado = $conexao->query($query);

            if($resultado == false)
            {
                $erro = 'Falha ao realizar a Query: ' . $query;
                throw new Exception($erro);
            }

            $this->databaseController->close_database();

            return 1;
        }else{
    	    return -1;
        }


    }

    function getProdutos($busca, $filtro, $parametroOrdenacao){
    	$conexao = $this->databaseController->open_database();

    	if ($busca == null) {
    		$query = "SELECT p.nome, p.catmat, p.id, p.descricao,p.identificacao, p.posicao,p.estoque_ideal,p.quantidade, c.nome as categoria FROM produtos p, categoria c WHERE p.categoria = c.id";
    	}
    	else
    	{
    		switch($filtro){
    			case 1:
    				$query = "SELECT p.nome, p.catmat, p.id, p.descricao,p.identificacao, p.posicao,p.estoque_ideal,p.quantidade, c.nome as categoria FROM produtos p, categoria c WHERE p.categoria = c.id AND p.nome LIKE '%" . $busca . "%'";
    			break;
    			case 2:
    				$query = "SELECT p.nome, p.catmat, p.id, p.descricao,p.identificacao, p.posicao,p.estoque_ideal,p.quantidade, c.nome as categoria FROM produtos p, categoria c WHERE p.categoria = c.id AND p.identificacao LIKE '%" . $busca . "%'";
    			break;
    			case 3:
    				$query = "SELECT p.nome, p.catmat, p.id, p.descricao,p.identificacao, p.posicao,p.estoque_ideal,p.quantidade, c.nome as categoria FROM produtos p, categoria c WHERE p.categoria = c.id AND p.catmat LIKE '%" . $busca . "%'";
    			break;
    			case 4:
    				$query = "SELECT p.nome, p.catmat, p.id, p.descricao,p.identificacao, p.posicao,p.estoque_ideal,p.quantidade, c.nome as categoria FROM produtos p, categoria c WHERE p.categoria = c.id AND c.nome LIKE '%" . $busca . "%'";
    			break;
    			case 5:
    				$query = "SELECT p.nome, p.catmat, p.id, p.descricao,p.identificacao, p.posicao,p.estoque_ideal,p.quantidade, c.nome as categoria FROM produtos p, categoria c WHERE p.categoria = c.id AND p.posicao LIKE '%" . $busca . "%'";
    			break;
    			case 6:
    				$query = "SELECT p.nome, p.catmat, p.id, p.descricao,p.identificacao, p.posicao,p.estoque_ideal,p.quantidade, c.nome as categoria FROM produtos p, categoria c WHERE p.categoria = c.id AND p.estoque_ideal LIKE '%" . $busca . "%'";
    			break;
    			case 7:
    				$query = "SELECT p.nome, p.catmat, p.id, p.descricao,p.identificacao, p.posicao,p.estoque_ideal,p.quantidade, c.nome as categoria FROM produtos p, categoria c WHERE p.categoria = c.id AND p.quantidade LIKE '%" . $busca . "%'";
    			break;
    		}
    	}

        $resultado = $conexao->query($query);

    	if($resultado == false)
    	{
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
    	}

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $this->databaseController->close_database();

    	for ($i=0; $i < sizeof($dados); $i++) {
    		$dados[$i]['porcentagem'] = floatval($dados[$i]['quantidade']/$dados[$i]['estoque_ideal']);
    	}
    	if($busca == null && $filtro == null){
    		$dados = $this->sortLista($dados, $parametroOrdenacao);
    	}


    	$produtos = "";

    	foreach ($dados as $dados) {
    		$rgb = $this->pickColor($dados['porcentagem']);
    		$produtos .= "<tr>";
    		$produtos .= "<td style = 'background:rgb(" . $rgb[0] . ", " . $rgb[1] . ", ".$rgb[2].");'></td>";
    		$produtos .= "<td>" . $dados['nome'] . "</td>";
    		$produtos .= "<td>" . $dados['identificacao'] . "</td>";
    		$produtos .= "<td>" . $dados['catmat'] . "</td>";
    		$produtos .= "<td>" . $dados['categoria'] . "</td>";
    		$produtos .= "<td>" . $dados['posicao'] . "</td>";
    		$produtos .= "<td>" . $dados['estoque_ideal'] . "</td>";
    		$produtos .= "<td>" . $dados['quantidade'] . "</td>";
    		$produtos .= "<td><a class='delete-icon' href='excluir-produto.php?id=" . $dados['id'] . "'><i class='material-icons' id='delete-" . $dados['id'] . "'>delete_outline</i></a></td>";
    		$produtos .= "<td><a href='editar-produto.php?id=" . $dados['id'] . "'>
    		<i class='material-icons'>edit</i></a></td>";
    		$produtos .= "</tr>";
    	}

    	if($produtos != ""){
    		return $produtos;
    	}else{
    		return "Não existem produtos!";
    	}

    }

    function editarProduto($produto, $id){
    	$conexao = $this->databaseController->open_database();

    	$query = "UPDATE produtos SET nome = '" . $produto->getNome() . "', identificacao  = '" . $produto->getIdentificacao() . "', catmat= '" . $produto->getCatmat() . "', quantidade= '" . $produto->getQuantidade() . "',
    				estoque_ideal= '" . $produto->getEstoqueIdeal() . "', posicao= '" . $produto->getPosicao() . "', categoria= '" . $produto->getCategoria()->getId() . "', descricao= '" . $produto->getDescricao() . "' WHERE
    					id= " . $id . "";

    	$resultado = $conexao->query($query);

    	if($resultado == false)
    	{
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
    	}

        $this->databaseController->close_database();

    	// query retorna false caso query falhe
    	if(!$resultado){
    		return false;
    	}else{
    		return true;
    	}
    }

    function excluirProduto($id){
    	$conexao = $this->databaseController->open_database();

        $query = "DELETE FROM produtos WHERE id = " . $id;

        $resultado = $conexao->query($query);

    	if($resultado == false)
    	{
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
    	}

        $this->databaseController->close_database();

        return $resultado;
    }

    function pickColor($percent){
        if ($percent > 1.27) {
            $rgb[0] = 0;
            $rgb[1] = 200;
            $rgb[2] = 0;
        }elseif ($percent >1) {
            $rgb[0] = (-875*$percent)+1129;
            $rgb[1] = 200;
            $rgb[2] = 0;
        }elseif ($percent >0.77) {
            $rgb[0] = 255;
            $rgb[1] = (850*$percent)-649;
            $rgb[2] = 0;
        }else {
            $rgb[0] = 255;
            $rgb[1] = 0;
            $rgb[2] = 0;
        }
        return $rgb;
    }
}
