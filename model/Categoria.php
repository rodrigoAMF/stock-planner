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
        if(trim($nome) != null && !($nome[0] >= '0' && $nome[0] <= '9')) {
            $this->nome = trim($nome);
            return 1;
        }else{
            return -1;
        }
    }

    public function preencheDadosTeste(){
    	$this->setId(1);
    	$this->setNome("Consumo");
	}
}
