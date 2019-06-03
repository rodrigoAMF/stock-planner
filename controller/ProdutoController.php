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

    function getProdutoPorId($id){
        $conexao = $this->databaseController->open_database();

        
        $resultado = $conexao->query($query);

    	if($resultado == false)
    	{
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
    	}

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $this->databaseController->close_database();

    	if(isset($dados[0]['id'])){
            $produto = new Produto();

            $produto->setNome($dados[0]['nome']);
            $produto->setIdentificacao($dados[0]['identificacao']);
            $produto->setCatmat($dados[0]['catmat']);
            $produto->setQuantidade($dados[0]['quantidade']);
            $produto->setEstoqueIdeal($dados[0]['estoque_ideal']);
            $produto->setPosicao($dados[0]['posicao']);
            $produto->setDescricao($dados[0]['descricao']);
            $produto->getCategoria()->setNome($dados[0]['categoria']);

    		return $produto;
    	}else{
    		return "Não existe um produto com esse id!";
    	}
    }

    function getIDUltimoProdutoCadastrado($conexao) {
        $query = "SELECT MAX(id) FROM produtos";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $IDProduto = $dados[0]["MAX(id)"];

        return $IDProduto;
    }

    function verificaSeProdutoExistePorNome($nome){
        $conexao = $this->databaseController->open_database();

        $query = "SELECT * FROM produtos WHERE nome = '" . $nome . "'";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $this->databaseController->close_database();

        //echo "Numero de produtos com " .  $nome . " no banco " . $resultado->num_rows . "<br>";

        if($resultado->num_rows > 0){
            return 1;
        }else{
            return 0;
        }
    }

    function verificaSeProdutoExistePorIdentificacao($identificacao){
        $conexao = $this->databaseController->open_database();

        $query = "SELECT * FROM produtos WHERE identificacao = '" . $identificacao . "'";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $this->databaseController->close_database();

        //echo "Numero de produtos com " .  $nome . " no banco " . $resultado->num_rows . "<br>";

        if($resultado->num_rows > 0){
            return 1;
        }else{
            return 0;
        }
    }
    
    function verificaSeProdutoExisteEmSemestreAnterior($produto){
        $semestreController = SemestreController::getInstance();
        $conexao = $this->databaseController->open_database();

        $semestreAtual = $semestreController->getSemestreAtual();

        $query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = s.id AND ps.id_produto = p.id AND p.nome = '" . $produto->getNome() . "'";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $this->databaseController->close_database();

        if(sizeof($dados) == 0){
            return false;
        }else{
            for($i = 0; $i < sizeof($dados); $i++){
                if($dados[$i]['id_semestre'] != $semestreAtual){
                    return true;
                }
            }
            return false;
        }
    }

    function verificaSeProdutoExisteNoSemestreAtual($produto){
        $semestreController = SemestreController::getInstance();
        $conexao = $this->databaseController->open_database();

        $semestreAtual = $semestreController->getSemestreAtual();

        $query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = s.id AND ps.id_produto = p.id AND p.nome = '" . $produto->getNome() . "' AND ps.id_semestre = '" . $semestreAtual . "'";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $this->databaseController->close_database();

        if(sizeof($dados) == 0){
            return false;
        }else{
            if($dados[0]['id_semestre'] == $semestreAtual){
                return true;
            }
            return false;
        }
    }

    function cadastroProdutoCondicional($produto){
        $semestreController = SemestreController::getInstance();

        $semestreAtual = $semestreController->getSemestreAtual();

        $produtoCadastradoEmSemestreAnterior = $this->verificaSeProdutoExisteEmSemestreAnterior($produto);
        $produtoCadastradoNoSemestreAtual = $this->verificaSeProdutoExisteNoSemestreAtual($produto);

        if($produtoCadastradoEmSemestreAnterior && !$produtoCadastradoNoSemestreAtual){
            // Produto cadastrado em semestre anterior mas,
            // sem registro no semestre atual
            $conexao = $this->databaseController->open_database();

            // Busca ID do produto no Banco de dados
            $query = "SELECT id from produtos where nome = '" . $produto->getNome() . "'";

            $resultado = $conexao->query($query);

            if($resultado == false)
            {
                $erro = 'Falha ao realizar a Query: ' . $query;
                throw new Exception($erro);
            }

            $dados = $resultado->fetch_all(MYSQLI_ASSOC);

            $idProduto = $dados[0]['id'];

            // Cadastra novo CATMAT e Quantidade do produto
            // no semestre atual

            $query = "INSERT INTO produtos_semestre (id_semestre, id_produto, quantidade, catmat) VALUES ('" . $semestreAtual . "', " . $idProduto . ", " . $produto->getQuantidade() . ", " . $produto->getCatmat() . ")";

            $resultado = $conexao->query($query);

            if($resultado == false)
            {
                $erro = 'Falha ao realizar a Query: ' . $query;
                throw new Exception($erro);
            }

            $this->databaseController->close_database();

            return 1;
        }else if($produtoCadastradoEmSemestreAnterior && $produtoCadastradoNoSemestreAtual){
            // Produto já cadastrado no semestreAtual
            return -1;
        }else if(!$produtoCadastradoEmSemestreAnterior){
            // Produto não foi cadastrado em um semestre anteiror
            // Cadastra então o produto no semestre atual
            return $this->cadastraProduto($produto, $semestreAtual);
        }
    }

    function cadastraProduto($produto, $IDSemestre){
    	$duplicadoNome = $this->verificaSeProdutoExistePorNome($produto->getNome());
        $duplicadoIdentificacao = $this->verificaSeProdutoExistePorIdentificacao($produto->getIdentificacao());

    	if($duplicadoNome == 0 && $duplicadoIdentificacao == 0)
        {
            $conexao = $this->databaseController->open_database();

            $query = "INSERT INTO produtos(nome, descricao, identificacao, categoria, posicao, estoque_ideal) values('"
                . $produto->getNome() . "', '" . $produto->getDescricao() . "', '" . $produto->getIdentificacao() . "', " . $produto->getCategoria()->getId() . ", '" . $produto->getPosicao() . "', " . $produto->getEstoqueIdeal() . ")";

            $resultado = $conexao->query($query);

            if($resultado == false)
            {
                $erro = 'Falha ao realizar a Query: ' . $query;
                throw new Exception($erro);
            }

            $IDProduto = $this->getIDUltimoProdutoCadastrado($conexao);

            $query = "INSERT INTO produtos_semestre(id_semestre, id_produto, quantidade, catmat) values('" . $IDSemestre . "', " . $IDProduto . ", " . $produto->getQuantidade() . "," . $produto->getCatmat() . ")";

            $resultado = $conexao->query($query);

            if($resultado == false)
            {
                $erro = 'Falha ao realizar a Query: ' . $query;
                throw new Exception($erro);
            }

            $this->databaseController->close_database();

            return 1;
        }else{
    	    if($duplicadoNome == 1)
    	        return -2;
    	    else
    	        return -3;
        }


    }

    function getProdutos($busca, $filtro, $parametroOrdenacao, $semestre){
    	$conexao = $this->databaseController->open_database();

      $semestreController = SemestreController::getInstance();
      $semestreAtual = $semestreController->getSemestreAtual();

      if ($semestre == null){
        $semestre = $semestreAtual;
      }


    	if ($busca == null) {
    		$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = '" . $semestre . "' AND ps.id_semestre = s.id AND ps.id_produto = p.id";
    	}
    	else
    	{
    		switch($filtro){
    			case 1:
    				$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = '" . $semestre . "' AND ps.id_semestre = s.id AND ps.id_produto = p.id AND p.nome LIKE '%" . $busca . "%'";
    			break;
    			case 2:
    				$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = '" . $semestre . "' AND ps.id_semestre = s.id AND ps.id_produto = p.id AND p.identificacao LIKE '%" . $busca . "%'";
    			break;
    			case 3:
    				$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = '" . $semestre . "' AND ps.id_semestre = s.id AND ps.id_produto = p.id AND ps.catmat LIKE '%" . $busca . "%'";
    			break;
    			case 4:
    				$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = '" . $semestre . "' AND ps.id_semestre = s.id AND ps.id_produto = p.id AND c.nome LIKE '%" . $busca . "%'";
    			break;
    			case 5:
    				$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = '" . $semestre . "' AND ps.id_semestre = s.id AND ps.id_produto = p.id AND p.posicao LIKE '%" . $busca . "%'";
    			break;
    			case 6:
    				$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = '" . $semestre . "' AND ps.id_semestre = s.id AND ps.id_produto = p.id AND p.estoque_ideal LIKE '%" . $busca . "%'";
    			break;
    			case 7:
    				$query = "SELECT p.nome, p.id, p.descricao,p.identificacao, p.posicao, p.estoque_ideal, c.nome as categoria, ps.quantidade, ps.catmat, ps.id_semestre, ps.id_produto, s.id as id_semestre, s.ano, s.numero FROM semestre s, produtos p, categoria c, produtos_semestre ps WHERE p.categoria = c.id AND ps.id_semestre = '" . $semestre . "' AND ps.id_semestre = s.id AND ps.id_produto = p.id AND ps.quantidade LIKE '%" . $busca . "%'";
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
    	    if($dados[$i]['estoque_ideal'] == 0){
                $dados[$i]['porcentagem'] = 0;
            }else{
                $dados[$i]['porcentagem'] = floatval($dados[$i]['quantidade']/$dados[$i]['estoque_ideal']);
            }
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
    		if($semestre == $semestreAtual){
            $produtos .= "<td><a class='delete-icon' href='excluir-produto.php?id=" . $dados['id'] . "'><i class='material-icons' id='delete-" . $dados['id'] . "'>delete_outline</i></a></td>";
    		    $produtos .= "<td><a href='editar-produto.php?id=" . $dados['id'] . "'>
    		    <i class='material-icons'>edit</i></a></td>";
        } else{
           $produtos .= "<td> </td>";
           $produtos .= "<td> </td>";
        }
    		$produtos .= "</tr>";
    	}

    	if($produtos != ""){
    		return $produtos;
    	}

    }

    function editarProduto($produto, $id){
    	$conexao = $this->databaseController->open_database();

    	$query = "UPDATE produtos SET nome = '" . $produto->getNome() . "', identificacao  = '" . $produto->getIdentificacao() . "',
    				estoque_ideal= '" . $produto->getEstoqueIdeal() . "', posicao= '" . $produto->getPosicao() . "', categoria= '" . $produto->getCategoria()->getId() . "', descricao= '" . $produto->getDescricao() . "' WHERE
    					id= " . $id;

    	$resultado = $conexao->query($query);

    	if($resultado == false)
    	{
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
    	}

    	$query = "UPDATE produtos_semestre SET quantidade = " . $produto->getQuantidade() . ",catmat= " . $produto->getCatmat() . " WHERE id_produto = " . $id;

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

    function sortListaProdutosCadastrados($produtos, $parametro){

        if($parametro == null) 
            $parametro = 8;
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

    function getProdutosCadastrados($busca, $filtro, $parametroOrdenacao){
        $semestreController = SemestreController::getInstance();
        $semestreAtual = $semestreController->getSemestreAtual();
        $conexao = $this->databaseController->open_database();

        if ($busca == null) {
            $query = "SELECT * FROM produtos WHERE id NOT IN (SELECT id_produto FROM produtos_semestre WHERE id_semestre = '" . $semestreAtual . "')";
        }
        else
        {
            switch($filtro){
                case 1:
                    $query = "SELECT * FROM produtos WHERE id NOT IN (SELECT id_produto FROM produtos_semestre WHERE id_semestre = '" . $semestreAtual . "') AND produtos.nome LIKE '%" . $busca . "%'";
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

        if($busca == null && $filtro == null){
            $dados = $this->sortListaProdutosCadastrados($dados, $parametroOrdenacao);
        }

        $produtos = "";
        
        foreach ($dados as $dado) {
            $produtos .= "\t\t<tr>\n";
            $produtos .= "\t\t\t<td class='nomeNaoEditavel'>{$dado['nome']}</td>\n";
            $produtos .= "\t\t\t<td id='catmat'></td>\n";
            $produtos .= "\t\t\t<td id='quantidade'></td>\n";
            $produtos .= "\t\t\t<td><a class='check_circle_outline' href='salvar-produto-modificado.php?id={$dado['id']}'><i class='material-icons' id='check-" . $dado['id'] . "'>check_circle_outline</i></a></td>\n";
            $produtos .= "\t\t</tr>\n";
        }

        if($produtos != ""){
            return $produtos;
        }
    }

    function getProdutosCadastradosQuantidade($busca, $filtro, $parametroOrdenacao){
        $semestreController = SemestreController::getInstance();
        $semestreAtual = $semestreController->getSemestreAtual();
        $conexao = $this->databaseController->open_database();

        if ($busca == null) {
            $query = "SELECT * FROM produtos, produtos_semestre WHERE id = id_produto";
        }
        else
        {
            switch($filtro){
                case 1:
                    $query = "SELECT * FROM produtos, produtos_semestre WHERE id = id_produto AND produtos.nome LIKE '%" . $busca . "%'";
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

        if($busca == null && $filtro == null){
            $dados = $this->sortListaProdutosCadastrados($dados, $parametroOrdenacao);
        }

        $produtos = "";
        
        foreach ($dados as $dado) {
            $produtos .= "\t\t<tr>\n";
            $produtos .= "\t\t\t<td>{$dado['nome']}</td>\n";
            $produtos .= "\t\t</tr>\n";
        }

        if($produtos != ""){
            return $produtos;
        }
    }
}
