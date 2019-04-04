<?php

include("../model/Categoria.php");
include("DatabaseController.php");

// Singleton
class CategoriaController{
    private $databaseController;
    private static $categoriaController;

    public function __construct(){
        $this->databaseController = new DatabaseController();
    }

    public static function getInstance(){
        if(!isset(self::$categoriaController)){
            self::$categoriaController = new CategoriaController();
        }
        return self::$categoriaController;
    }

    public function getIDPeloNome(Categoria $categoria): int{
        $conexao = $this->databaseController->open_database();

        $query = "SELECT id FROM categoria WHERE nome = '" . $categoria->getNome() . "'";

        $resultado = $conexao->query($query);

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $this->databaseController->close_database();

        if(isset($dados[0]['id'])){
            return $dados[0]['id'];
        }else{
            return -1;
        }

    }
    public function getNomePeloId(Categoria $categoria): string{
        $conexao = $this->databaseController->open_database();

        $query = "SELECT id FROM categoria WHERE id = '" . $categoria->getId() . "'";

        $resultado = $conexao->query($query);

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $this->databaseController->close_database();

        if(isset($dados[0]['nome'])){
            return $dados[0]['nome'];
        }else{
            return "Não existe registro com esse nome!";
        }
    }

}

 ?>
