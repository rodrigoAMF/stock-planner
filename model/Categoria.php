<?php
require_once("controller/CategoriaController.php");

class Categoria{
    private $id;
    private $nome;

    public function getId():int{
        if($this->id == null){
            $categoriaController = CategoriaController::getInstance();
            $this->id = $categoriaController->getIDPeloNome($nome);
            if($this->id >= 0)
            {
                $this->nome = $nome;
            }else{
                throw new Exception('Essa categoria não existe!');
            }
        }else{
            return $this->id;
        }

    }

    public function getNome():string{
        return $this->nome;
    }

    // public function setAtributos(int $id, string $nome) {
    //     $this->id = $id;
    //     $this->nome = $nome;
    // }

    public function setNomeNovo(string $nome){
        if(trim($nome) != null){
            $this->nome = trim($nome);
            return 1;
        }
        else{
            return -1;
        }
        
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
