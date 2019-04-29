<?php
require_once("DatabaseController.php");

class SemestreController{

    private $databaseController;
    private static $semestreController;

    public function __construct(){
        $this->databaseController = new DatabaseController();
    }

    public static function getInstance(){
        if(!isset(self::$semestreController)){
            self::$semestreController = new SemestreController();
        }
        return self::$semestreController;
    }

    function getSemestres(){
        $conexao = $this->databaseController->open_database();

        $query = "SELECT * FROM semestre";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
              $erro = 'Falha ao realizar a Query: ' . $query;
              throw new Exception($erro);
        }

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $this->databaseController->close_database();

        return $dados;
    }

}

 ?>
