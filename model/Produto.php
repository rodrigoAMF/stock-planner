<?php
require_once("controller/CategoriaController.php");
require_once("Categoria.php");

class Produto{
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
        $this->nome = $nome;
    }

    public function setIdentificacao(string $identificacao){
        $this->identificacao = $identificacao;
    }

    public function setPosicao(string $posicao){
         $this->posicao = $posicao;
    }

    public function setDescricao(string $descricao){
        $this->descricao = $descricao;
    }

    public function setCatmat(int $catmat){
        $this->catmat = $catmat;
    }

    public function setQuantidade(int $quantidade){
        $this->quantidade = $quantidade;
    }

    public function setEstoqueIdeal(int $estoqueIdeal){
        $this->estoqueIdeal = $estoqueIdeal;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
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
