<?php
require_once("controller/CategoriaController.php");

class Categoria{
    private $id;
    private $nome;

    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setNome(string $nome) {
        if(!($nome[0] >= '0' && $nome[0] <= '9') && trim($nome) != null) {
            $this->nome = trim($nome);
        }
    }
}
