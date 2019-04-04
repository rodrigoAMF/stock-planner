<?php

class Categoria{
    private $id;
    private $nome;

    public function getId():int{
        return $this->id;
    }

    public function getNome():string{
        return $this->nome;
    }

    public function setAtributos(int $id, string $nome) {
        $this->id = $idCategoria;
        $this->nome = $nome;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setNome(string $nome){
        $this->nome = $nome;
    }
}
