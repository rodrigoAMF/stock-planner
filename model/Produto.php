<?php
require_once("controller/CategoriaController.php");
require_once("Categoria.php");

class Produto
{

    private $nome, $identificacao, $posicao, $descricao; // string
    private $catmat, $quantidade, $estoqueIdeal; // int
    private $categoria; // Categoria

    public function __construct() {
        $this->categoria = new Categoria();
    }


    public function getCategoria(): Categoria{
        return $this->categoria;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function getIdentificacao(): string{
        return $this->identificacao;
    }

    public function getPosicao(): string{
        return $this->posicao;
    }

    public function getDescricao(): string{
        return $this->descricao;
    }

    public function getCatmat(): int{
        return $this->catmat;
    }

    public function getQuantidade(): int{
        return $this->quantidade;
    }

    public function getEstoqueIdeal(): int{
        return $this->estoqueIdeal;
    }

    public function setNome(string $nome){
        if($nome != null){
            if(strlen ($nome) <= 100){
                $feedback['status'] = 1;
                $this->nome = $nome;
            }else{
                $feedback['nome_do_campo'] = "nome";       
                $feedback['mensagem'] = "O nome excedeu o tamanho máximo";
                $feedback['status'] = -1;
            }
        }else{
            $feedback['nome_do_campo'] = "nome";       
            $feedback['mensagem'] = "O campo nome está vazio";
            $feedback['status'] = -1;
        }
        return $feedback;
        
    }

    public function setIdentificacao(string $identificacao){
        if($identificacao != null){
            if(strlen ($identificacao) <= 50){
                $this->identificacao = $identificacao;
            }else{
                $feedback['nome_do_campo'] = "identificacao";       
                $feedback['mensagem'] = "O campo identificação excedeu o tamanho máximo";
                
                $feedback['status'] = -1;
                return true;
            }
        }else{
            $feedback['nome_do_campo'] = "identificacao";       
            $feedback['mensagem'] = "O campo identificação está vazio";
            
            $feedback['status'] = -1;
            return true;
        }
       
    }

    public function setPosicao(string $posicao){
        if($posicao != null){
            if(strlen ($posicao) <= 3){
                $feedback['status'] = 1;
                $this->posicao = $posicao;
            }else{
                $feedback['status'] = -1;
                $feedback['nome_do_campo'] = "posicao";       
                $feedback['mensagem'] = "A posição excedeu o tamanho máximo";
            }
        }else{
            $feedback['status'] = -1;
            $feedback['nome_do_campo'] = "posicao";       
            $feedback['mensagem'] = "O campo posição está vazio";
        }
        return $feedback;
    }

    public function setDescricao(string $descricao){
        if($descricao != null){
            $this->descricao = $descricao;
        }else{
            $feedback['nome_do_campo'] = "descricao";       
            $feedback['mensagem'] = "O campo descrição está vazio";
            
            $feedback['status'] = -1;
            return true;
        }
    }

    public function setCatmat(int $catmat){
        $catmatString = (string) $catmat;
        if($catmat != null){
            if(is_numeric($catmat)){
                if(strlen ($catmatString) <= 6){
                    $this->catmat = $catmat;
                }else{
                    $feedback['nome_do_campo'] = "catmat";       
                    $feedback['mensagem'] = "O catmat excedeu o tamanho máximo";
                    
                    $feedback['status'] = -1;
                    return true;
                }
            }else{
                $feedback['nome_do_campo'] = "catmat";       
                $feedback['mensagem'] = "O campo catmat deve ser numerico";
                
                $feedback['status'] = -1;
                return true;
            }
        }else{
            $feedback['nome_do_campo'] = "catmat";       
            $feedback['mensagem'] = "O campo catmat está vazio";
            
            $feedback['status'] = -1;
            return true;
        }
        
    }

    public function setQuantidade(int $quantidade){
        $quantidadeString = (string) $quantidade;
        if($quantidade != null){
            if(is_numeric($quantidade)){
                if(strlen ($quantidadeString) <= 6){
                    $feedback['status'] = 1;
                    $this->quantidade = $quantidade;
                }else{
                    $feedback['nome_do_campo'] = "quantidade";       
                    $feedback['mensagem'] = "A quantidade excedeu o tamanho máximo";
                    
                    $feedback['status'] = -1;
                }
            }else{
                $feedback['nome_do_campo'] = "quantidade";       
                $feedback['mensagem'] = "O campo quantidade deve ser numerico";
                
                $feedback['status'] = -1;
            }
        }else{
            $feedback['nome_do_campo'] = "quantidade";       
            $feedback['mensagem'] = "O campo quantidade está vazio";
            
            $feedback['status'] = -1;
        }
        return $feedback;
    }

    public function setEstoqueIdeal(int $estoqueIdeal){
        $estoqueIdealString = (string) $estoqueIdeal;
        if($estoqueIdeal != null){
            if(is_numeric($estoqueIdeal)){
                if(strlen ($estoqueIdealString) <= 6){
                    $this->estoqueIdeal = $estoqueIdeal;
                    $mensagemEstoqueIdeal = "";
                    return 1;
                }else{
                    $feedback['nome_do_campo'] = "estoqueIdeal";       
                    $feedback['mensagem'] = "O estoque ideal excedeu o tamanho máximo";
                    
                    $feedback['status'] = -1;
                    return true;
                }
            }else{
                $feedback['nome_do_campo'] = "estoqueIdeal";       
                $feedback['mensagem'] = "O campo estoque ideal deve ser numerico";
                
                $feedback['status'] = -1;
                return true;
            }
        }else{
            $feedback['nome_do_campo'] = "estoqueIdeal";       
            $feedback['mensagem'] = "O campo estoque ideal está vazio";
            
            $feedback['status'] = -1;
            return true;
        }
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }
}
