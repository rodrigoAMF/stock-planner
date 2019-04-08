<?php
require_once("controller/CategoriaController.php");

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

    public function setNomeNovo(string $nome){
        $this->nome = $nome;
    }

    public function setNome(string $nome){
        $categoriaController = CategoriaController::getInstance();
        $this->id = $categoriaController->getIDPeloNome($nome);
        if($this->id >= 0)
        {
            $this->nome = $nome;
        }else{
            throw new Exception('Essa categoria não existe!');
        }


    }
}
