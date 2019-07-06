<?php
require_once("DatabaseController.php");
require_once("SemestreController.php");
require_once("model/Produto.php");

class ProdutoController{
    private $databaseController;
    private static $produtoController;
	
    public function __construct(){
        $this->databaseController = DatabaseController::getInstance();
    }

    public static function getInstance(){
        if(!isset(self::$produtoController)){
            self::$produtoController = new ProdutoController();
        }
        return self::$produtoController;
    }

    public function mapearProdutosEmArray($produtosNaoMapeados){
        $produtosMapeados = array_map(function($dado){
            $produto = new Produto();

            if(isset($dado['id']))
				$produto->setId($dado['id']);
            if(isset($dado['nome']))
            	$produto->setNome($dado['nome']);
			if(isset($dado['identificacao']))
            	$produto->setIdentificacao($dado['identificacao']);
			if(isset($dado['catmat']))
            	$produto->setCatmat($dado['catmat']);
			if(isset($dado['quantidade']))
            	$produto->setQuantidade($dado['quantidade']);
			if(isset($dado['estoque_ideal']))
            	$produto->setEstoqueIdeal($dado['estoque_ideal']);
			if(isset($dado['posicao']))
            	$produto->setPosicao($dado['posicao']);
			if(isset($dado['descricao']))
            	$produto->setDescricao($dado['descricao']);
			if(isset($dado['categoria']))
            	$produto->getCategoria()->setNome($dado['categoria']);

            return $produto;
        }, $produtosNaoMapeados);

        return $produtosMapeados;
    }

    function sortLista($produtos, $parametro, $ordenaNome){
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
        if($ordenaNome == 1 || $ordenaNome == 0)
        {
            if(abs($parametro) == 1){
                for($i=1;$i < sizeof($produtos);$i++) for($j=0;$j < sizeof($produtos) -$i;$j++){
                    if($parametro > 0){
                        if(strtoupper($produtos[$j]->getNome()) > strtoupper($produtos[$j+1]->getNome())){
                            $aux = $produtos[$j];
                            $produtos[$j] = $produtos[$j+1];
                            $produtos[$j+1] = $aux;
                        }
                    }else{
                        if(strtoupper($produtos[$j]->getNome()) < strtoupper($produtos[$j+1]->getNome())){
                            $aux =  $produtos[$j];
                            $produtos[$j] = $produtos[$j+1];
                            $produtos[$j+1] = $aux;
                        }
                    }
                }
            }
        }
    	if($ordenaNome == 0)
        {
           if(abs($parametro) == 2){
            for($i=1;$i < sizeof($produtos);$i++) for($j=0;$j < sizeof($produtos) -$i;$j++){
                if($parametro > 0){
                    if(strtoupper($produtos[$j]->getIdentificacao()) > strtoupper($produtos[$j+1]->getIdentificacao())){
                        $aux =  $produtos[$j];
                        $produtos[$j] = $produtos[$j+1];
                        $produtos[$j+1] = $aux;
                    }
                }else{
                    if(strtoupper($produtos[$j]->getIdentificacao()) < strtoupper($produtos[$j+1]->getIdentificacao())){
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
                    if($produtos[$j]->getCatmat()*$parametro > $produtos[$j+1]->getCatmat()*$parametro){
                        $aux =  $produtos[$j];
                        $produtos[$j] = $produtos[$j+1];
                        $produtos[$j+1] = $aux;
                    }
                }
            }
            if(abs($parametro) == 4){
                for($i=1;$i < sizeof($produtos);$i++) for($j=0;$j < sizeof($produtos) -$i;$j++){
                    if($parametro > 0){
                        if(strtoupper($produtos[$j]->getCategoria()->getNome()) > strtoupper($produtos[$j+1]->getCategoria()->getNome())){
                            $aux =  $produtos[$j];
                            $produtos[$j] = $produtos[$j+1];
                            $produtos[$j+1] = $aux;
                        }
                    }else{
                        if(strtoupper($produtos[$j]->getCategoria()->getNome()) < strtoupper($produtos[$j+1]->getCategoria()->getNome())){
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
                        if(strtoupper($produtos[$j]->getPosicao()) > strtoupper($produtos[$j+1]->getPosicao())){
                            $aux =  $produtos[$j];
                            $produtos[$j] = $produtos[$j+1];
                            $produtos[$j+1] = $aux;
                        }
                    }else{
                        if(strtoupper($produtos[$j]->getPosicao()) < strtoupper($produtos[$j+1]->getPosicao())){
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
                    if($produtos[$j]->getEstoqueIdeal()*$parametro > $produtos[$j+1]->getEstoqueIdeal()*$parametro){
                        $aux =  $produtos[$j];
                        $produtos[$j] = $produtos[$j+1];
                        $produtos[$j+1] = $aux;
                    }
                }
            }
            if(abs($parametro) == 7){
                $parametro /= 7;
                for($i=1;$i < sizeof($produtos);$i++) for($j=0;$j < sizeof($produtos) -$i;$j++){
                    if($produtos[$j]->getQuantidade()*$parametro > $produtos[$j+1]->getQuantidade()*$parametro){
                        $aux =  $produtos[$j];
                        $produtos[$j] = $produtos[$j+1];
                        $produtos[$j+1] = $aux;
                    }
                }
            }
            if(abs($parametro) == 8){
                $parametro /= 8;
                for($i=1;$i < sizeof($produtos);$i++) for($j=0;$j < sizeof($produtos) -$i;$j++){
                    if($produtos[$j]->getPorcentagem()*$parametro < $produtos[$j+1]->getPorcentagem()*$parametro){
                        $aux =  $produtos[$j];
                        $produtos[$j] = $produtos[$j+1];
                        $produtos[$j+1] = $aux;
                    }
                }
            } 
        }
    	
    	return $produtos;
    }

    function getProdutoPorId($id, $semestre=null){
        if($semestre !== null){
            $query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as" .
                "categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano," .
                "s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ".
                "ps.id_semestre = s.id AND ps.id_produto = p.id AND p.id = {$id} AND ps.id_semestre = '{$semestre}'" .
                 "LIMIT 1";
        }else{
            $query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as" .
                "categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano," .
                "s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ".
                "ps.id_semestre = s.id AND ps.id_produto = p.id AND p.id = {$id} LIMIT 1";
        }
        $resultado = $this->databaseController->select($query);

    	if($resultado['status'] == 200) {
            $resultado['dados'] = $this->mapearProdutosEmArray($resultado['dados']);
			$resultado['dados'] = $resultado['dados'][0];
    	}

    	return $resultado;
    }

    function getIDUltimoProdutoCadastrado() {
        $query = "SELECT MAX(id) FROM produtos";

		$resultado = $this->databaseController->select($query);

		if($resultado['status'] == 200) {
			$resultado['dados'] = $resultado['dados'][0]["MAX(id)"];
		}

        return $resultado;
    }

    function verificaSeProdutoExistePorNome($nome){
        $query = "SELECT * FROM produtos WHERE nome = '" . $nome . "'";

		$resultado = $this->databaseController->select($query);

		if($resultado['status'] == 200) {
			$resultado['dados'] = 1;
		}else{
		    $resultado['dados'] = 0;
        }

        return $resultado;
    }

    function verificaSeProdutoExistePorIdentificacao($identificacao){
        $query = "SELECT * FROM produtos WHERE identificacao = '" . $identificacao . "'";

		$resultado = $this->databaseController->select($query);

		if($resultado['status'] == 200) {
			$resultado['dados'] = $resultado['dados'][0];
		}

		return $resultado;
    }
    
    function verificaSeProdutoExisteEmSemestreAnterior($produto) {
        $semestreController = SemestreController::getInstance();

        $resultado = $semestreController->getSemestreAtual();

        if($resultado['status'] != 200){
        	return $resultado;
		}

		$semestreAtual = $resultado['dados'];

        $query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = s.id AND ps.id_produto = p.id AND p.nome = '" . $produto->getNome() . "'";

		$resultado = $this->databaseController->select($query);

		if($resultado['status'] == 200) {
			for($i = 0; $i < sizeof($resultado['dados']); $i++){
				if($resultado['dados'][$i]['id_semestre'] != $semestreAtual->getId()){
					$resultado['dados'] = 1;
					return $resultado;
				}
			}
		}

		$resultado['dados'] = 0;
		return $resultado;
    }

    function verificaSeProdutoExisteNoSemestreAtual($produto){
		$semestreController = SemestreController::getInstance();

		$resultado = $semestreController->getSemestreAtual();

		if($resultado['status'] != 200){
			return $resultado;
		}

		$semestreAtual = $resultado['dados'];

		$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = s.id AND ps.id_produto = p.id AND p.nome = '" . $produto->getNome() . "'";

		$resultado = $this->databaseController->select($query);

		if($resultado['status'] == 200) {
			for($i = 0; $i < sizeof($resultado['dados']); $i++){
				if($resultado['dados'][$i]['id_semestre'] == $semestreAtual->getId()){
					$resultado['dados'] = 1;
					return $resultado;
				}
			}
		}

		$resultado['dados'] = 0;
		return $resultado;
    }

    function cadastraProduto($produto){
        $semestreController = SemestreController::getInstance();

		$resultado = $semestreController->getSemestreAtual();
		if($resultado['status'] != 200){
			return $resultado;
		}
        $semestreAtual = $resultado['dados'];

        $resultado = $this->verificaSeProdutoExisteEmSemestreAnterior($produto);
		if($resultado['status'] == 500){
			return $resultado;
		}
		$produtoCadastradoEmSemestreAnterior = $resultado['dados'];

        $resultado = $this->verificaSeProdutoExisteNoSemestreAtual($produto);
		if($resultado['status'] == 500){
			return $resultado;
		}
		$produtoCadastradoNoSemestreAtual = $resultado['dados'];

        if($produtoCadastradoEmSemestreAnterior && !$produtoCadastradoNoSemestreAtual){
            // Produto cadastrado em semestre anterior mas,
            // sem registro no semestre atual
            // Busca ID do produto no Banco de dados
            $query = "SELECT id from produtos where nome = '" . $produto->getNome() . "'";

            $resultado = $this->databaseController->select($query);

			if ($resultado['status'] != 200){
				return $resultado;
			}

			$idProduto = $resultado['dados'][0]['id'];

            // Cadastra novo CATMAT e Quantidade do produto
            // no semestre atual
            $query = "INSERT INTO produtos_semestre (id_semestre, id_produto, quantidade, catmat) VALUES ('" . $semestreAtual->getId() . "', " . $idProduto . ", " . $produto->getQuantidade() . ", " . $produto->getCatmat() . ")";

			$resultado = $this->databaseController->insert($query);
			if($resultado['status'] == 200){
				$resultado['dados'] = 1;
			}
            return $resultado;
        }else if($produtoCadastradoEmSemestreAnterior && $produtoCadastradoNoSemestreAtual){
            // Produto já cadastrado no semestreAtual
			$resultado['dados'] = -1;
            return $resultado;
        }else if(!$produtoCadastradoEmSemestreAnterior){
            // Produto não foi cadastrado em um semestre anteiror
            // Cadastra então o produto no semestre atual
			$resultado = $this->cadastraNovoProduto($produto);
			return $resultado;
        }
    }

    function cadastraNovoProduto($produto) {
		$semestreController = SemestreController::getInstance();
		$semestreAtual = $semestreController->getSemestreAtual();
		$semestreAtual = $semestreAtual['dados'];
    	$duplicadoNome = $this->verificaSeProdutoExistePorNome($produto->getNome());
        $duplicadoIdentificacao = $this->verificaSeProdutoExistePorIdentificacao($produto->getIdentificacao());

    	if($duplicadoNome['status'] == 204 && $duplicadoIdentificacao['status'] == 204)
        {
            $query = "INSERT INTO produtos(nome, descricao, identificacao, categoria, posicao, estoque_ideal) values('"
                . $produto->getNome() . "', '" . $produto->getDescricao() . "', '" . $produto->getIdentificacao() . "', " . $produto->getCategoria()->getId() . ", '" . $produto->getPosicao() . "', " . $produto->getEstoqueIdeal() . ")";

            $resultado = $this->databaseController->insert($query);

            if($resultado['status'] != 200){
            	return $resultado;
			}

			$resultado = $this->getIDUltimoProdutoCadastrado();

            $IDProduto = $resultado['dados'];

            $query = "INSERT INTO produtos_semestre(id_semestre, id_produto, quantidade, catmat) values('" . $semestreAtual->getId() . "', " . $IDProduto . ", " . $produto->getQuantidade() . "," . $produto->getCatmat() . ")";

			$resultado = $this->databaseController->insert($query);

			if($resultado['status'] == 200){
				$resultado['dados'] = 1;
			}
        }else{
    	    $resultado['status'] = 500;
    	    if($duplicadoNome['dados'] == 1)
				$resultado['dados'] = -2; // Nome duplicado
    	    else
				$resultado['dados'] = -3; // Identificação duplicada
        }

		return $resultado;
    }

    function getProdutos($busca, $filtro, $parametroOrdenacao, $semestre){
		$query = "";

		if($semestre == null){
			$semestreController = SemestreController::getInstance();
			$semestre = $semestreController->getSemestreAtual()['dados']->getId();
		}

    	if ($busca == null) {
			
			$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = '{$semestre}' AND ps.id_semestre = s.id AND ps.id_produto = p.id";
			
    	}
    	else
    	{
    		switch($filtro){
    			case 1:
    				$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = '{$semestre}' AND ps.id_semestre = s.id AND ps.id_produto = p.id AND p.nome LIKE '%" . $busca . "%'";
    			break;
    			case 2:
    				$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = '{$semestre}' AND ps.id_semestre = s.id AND ps.id_produto = p.id AND p.identificacao LIKE '%" . $busca . "%'";
    			break;
    			case 3:
    				$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = '{$semestre}' AND ps.id_semestre = s.id AND ps.id_produto = p.id AND ps.catmat LIKE '%" . $busca . "%'";
    			break;
    			case 4:
    				$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = '{$semestre}' AND ps.id_semestre = s.id AND ps.id_produto = p.id AND c.nome LIKE '%" . $busca . "%'";
    			break;
    			case 5:
    				$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = '{$semestre}' AND ps.id_semestre = s.id AND ps.id_produto = p.id AND p.posicao LIKE '%" . $busca . "%'";
    			break;
    			case 6:
    				$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = '{$semestre}' AND ps.id_semestre = s.id AND ps.id_produto = p.id AND p.estoque_ideal LIKE '%" . $busca . "%'";
    			break;
    			case 7:
    				$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = '{$semestre}' AND ps.id_semestre = s.id AND ps.id_produto = p.id AND ps.quantidade LIKE '%" . $busca . "%'";
    			break;
    		}
    	}

		$resultado = $this->databaseController->select($query);

		if($resultado['status'] == 200) {
			$resultado['dados'] = $this->mapearProdutosEmArray($resultado['dados']);
		}

		foreach($resultado['dados'] as $produto) {
			if($produto->getEstoqueIdeal() == 0){
				$produto->setPorcentagem(0);
			}else{
				$produto->setPorcentagem(floatval($produto->getQuantidade()/$produto->getEstoqueIdeal()));
			}
		}

		if($busca == null && $filtro == null){
			$resultado['dados'] = $this->sortLista($resultado['dados'], $parametroOrdenacao,0);
		}

		return $resultado;
    }

    function geraDadosParaTabelaProdutos($produtos, $semestre){
		$semestreController = SemestreController::getInstance();

		
		if($semestre == null){
			$semestreController = SemestreController::getInstance();
			$semestre = $semestreController->getSemestreAtual()['dados']->getId();
		}


		$resultado = $semestreController->getSemestreAtual();

		
		if($resultado['status'] != 200){
			return $resultado;
		}

		$semestreAtual = $resultado['dados']->getId();
		$stringProdutos = "";

		foreach ($produtos as $produto) {
			$rgb = $this->pickColor($produto->getPorcentagem());
			$stringProdutos .= "<tr>";
			$stringProdutos .= "<td style = 'background:rgb(" . $rgb[0] . ", " . $rgb[1] . ", ".$rgb[2].");'></td>";
			$stringProdutos .= "<td>" . $produto->getNome() . "</td>";
			$stringProdutos .= "<td>" . $produto->getIdentificacao() . "</td>";
			$stringProdutos .= "<td>" . $produto->getCatmat() . "</td>";
			$stringProdutos .= "<td>" . $produto->getCategoria()->getNome() . "</td>";
			$stringProdutos .= "<td>" . $produto->getPosicao() . "</td>";
			$stringProdutos .= "<td>" . $produto->getEstoqueIdeal() . "</td>";
			$stringProdutos .= "<td>" . $produto->getQuantidade() . "</td>";
			if($semestre == $semestreAtual){
				$stringProdutos .= "<td><a class='delete-icon' href='excluir-produto.php?id=" . $produto->getId() . "'><i class='material-icons' id='delete-" . $produto->getId() . "'>delete_outline</i></a></td>";
				$stringProdutos .= "<td><a href='editar-produto.php?id=" . $produto->getId() . "'><i class='material-icons'>edit</i></a></td>";
			} else{
				$stringProdutos .= "<td> </td>";
				$stringProdutos .= "<td> </td>";
			}
			$stringProdutos .= "</tr>";
		}

		return $stringProdutos;
	}

	function geraDadosParaTabelaProdutosNaoCadastradosNoSemestreAtual($produtos){
		$stringProdutos = "";

		foreach ($produtos as $produto) {
			$stringProdutos .= "\t\t<tr>\n";
			$stringProdutos .= "\t\t\t<td class='nomeNaoEditavel'>{$produto->getNome()}</td>\n";
			$stringProdutos .= "\t\t\t<td id='catmat'></td>\n";
			$stringProdutos .= "\t\t\t<td id='quantidade'></td>\n";
			$stringProdutos .= "\t\t\t<td class='nomeNaoEditavel'><a class='check_circle_outline' href='salvar-produto-modificado.php?id={$produto->getId()}'><i class='material-icons' id='check-{$produto->getId()}'>check_circle_outline</i></a></td>\n";
			$stringProdutos .= "\t\t</tr>\n";
		}

		return $stringProdutos;
	}

    function editarProduto($produto){
    	// Atualiza tabela de produtos
    	$query = "UPDATE produtos SET nome = '{$produto->getNome()}', identificacao = '{$produto->getIdentificacao()}', estoque_ideal = {$produto->getEstoqueIdeal()}, posicao = '{$produto->getPosicao()}', categoria = {$produto->getCategoria()->getId()}, descricao = '{$produto->getDescricao()}' WHERE id = {$produto->getId()}";
		$resultado = $this->databaseController->update($query);

		if(!($resultado['status'] == 200 || $resultado['status'] == 500)){
            $resultado['dados'] = -1;
			return $resultado;
		}

		$semestreController = SemestreController::getInstance();
		$semestre = $semestreController->getSemestreAtual()['dados'];

		// Atualiza a tabela produtos_semestre
    	$query = "UPDATE produtos_semestre SET quantidade = {$produto->getQuantidade()},catmat= {$produto->getCatmat()} WHERE id_produto = {$produto->getId()} AND id_semestre = '{$semestre->getId()}'";
    	$resultado = $this->databaseController->update($query);
		
		
		if(!($resultado['status'] == 200 || $resultado['status'] == 500)){
			$resultado['dados'] = -1;
			return $resultado;
		}

		$resultado['dados'] = 1;
		
		return $resultado;
    }

    function excluirProduto($id){
 		$query = "DELETE FROM produtos WHERE id = " . $id;

		$resultado = $this->databaseController->delete($query);

		if($resultado['status'] != 200){
			return $resultado;
		}

		$resultado['dados'] = 1;

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
/*
    function sortListaProdutosCadastrados($produtos, $parametro){

        if($parametro == null)
            $parametro = 8;

//        1- nome
//        2- ident
//        3- catmat
//        4- categoria
//        5- posicao
//        6- estoque ideal
//        7- quantidade
//        8, default- crit

        if(abs($parametro) == 1){
            for($i=1;$i < sizeof($produtos);$i++)
                for($j=0;$j < sizeof($produtos) -$i;$j++){
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

        if(abs($parametro) == 8){
            $parametro /= 8;
            // for($i=1;$i < sizeof($produtos);$i++) for($j=0;$j < sizeof($produtos) -$i;$j++){
            //     if($produtos[$j]['porcentagem']*$parametro < $produtos[$j+1]['porcentagem']*$parametro){
            //         $aux =  $produtos[$j];
            //         $produtos[$j] = $produtos[$j+1];
            //         $produtos[$j+1] = $aux;
            //     }
            // }
        }
        return $produtos;
    }
*/
    function getProdutosNaoCadastradosNoSemestreAtual($busca = null){
		$semestreController = SemestreController::getInstance();
		$resultado = $semestreController->getSemestreAtual();

		if($resultado['status'] != 200){
			return $resultado;
		}

		$semestreAtual = $resultado['dados'];

        if ($busca == null) {
            $query = "SELECT * FROM produtos WHERE id NOT IN (SELECT id_produto FROM produtos_semestre WHERE id_semestre = '{$semestreAtual->getId()}')";
        }
        else {
        	$query = "SELECT * FROM produtos WHERE id NOT IN (SELECT id_produto FROM produtos_semestre WHERE id_semestre = '{$semestreAtual->getId()}') AND produtos.nome LIKE '%{$busca}%'";
        }

		$resultado = $this->databaseController->select($query);

		if($resultado['status'] != 200) {
			return $resultado;
		}

		$resultado['dados'] = $this->mapearProdutosEmArray($resultado['dados']);

		if($busca == null){
			$resultado['dados'] = $this->sortLista($resultado['dados'], 1, 1);
		}

		return $resultado;
    }

     function agruparProdutosIguais($dados, $quantidadeSemestre, $filtroSemestre)
    {
        //$semestreController = SemestreController::getInstance();
        //$semestres = $semestreController->getSemestres();
        $semestres= $filtroSemestre;
        $semestres = array_reverse($semestres);

        $resultado = Array();
        $temp = Array();

        for ($i = 0; $i < sizeof($dados); $i++) {
            
            for ($j = $quantidadeSemestre; $j >= 0; $j--) 
            { 
                if($dados[$i]['id_semestre'] == $semestres[$j])
                {                 
                    $resultado[$dados[$i]['nome']][$j] = $dados[$i]['quantidade'];
                }
                else
                {
                    if(!isset($resultado[$dados[$i]['nome']][$j]))
                    {
                        $resultado[$dados[$i]['nome']][$j] = -1;
                    }
                }
            }
        }
        $usados = Array();
        for ($i = 0; $i < sizeof($dados); $i++) {
            if(!isset($usados[$dados[$i]['nome']])){
                $temp[$i] = $resultado[$dados[$i]['nome']];
                $temp[$i]['nome'] = $dados[$i]['nome'];
                $usados[$dados[$i]['nome']] = 1;
            }
        }
        return $temp;
    }  

    function getProdutosCadastradosQuantidade($busca, $filtro, $parametroOrdenacao, $semestre, $quantidadeSemestre, $filtroSemestre){
        $quantidades = Array();
        $aux = Array();
        if ($busca == null) {
            $query = "SELECT * FROM produtos, produtos_semestre WHERE id = id_produto";
        }
        else
        {
            $query = "SELECT * FROM produtos, produtos_semestre WHERE id = id_produto AND produtos.nome LIKE '%" . $busca . "%'";
        }

        $resultado = $this->databaseController->select($query);

        if($resultado['status'] == 200)
        {
            $resultado['dados'] = $resultado['dados'];
        }       

        if($busca == null && $filtro == null){
            $dados = $this->sortLista($resultado['dados'], $parametroOrdenacao, 1);
        }

        $produtos = "";
        $quantidades = $this->agruparProdutosIguais($resultado['dados'], $quantidadeSemestre, $filtroSemestre);
        $posicao = 0;
        foreach ($quantidades as $produto) {
            
            $produtos .= "\t\t<tr>\n";
            $produtos .= "\t\t\t<td>{$produto['nome']}</td>\n";
            for ($i = $quantidadeSemestre; $i >= 0; $i--) { 
                if($produto[$i] != -1)
                {
                    $produtos .= "\t\t\t<td>{$produto[$i]}</td>\n";
                }
                else
                {
                    $produtos .= "\t\t\t<td>-</td>\n";
                }
            }
            $produtos .= "\t\t</tr>\n";
            //$aux[$posicao] = $produtos;
            //$produtos ="";
            //$posicao++;
        }
        if($produtos !=""){
            return $produtos;
        }
    }

}
