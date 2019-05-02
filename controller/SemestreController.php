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

    function getSemestreAtual() {
        $conexao = $this->databaseController->open_database();
        $query = "SELECT MAX(id) FROM semestre";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $IDSemestre = $dados[0]["MAX(id)"];

        return $IDSemestre;
    }

     function getUltimoAno() {
        $conexao = $this->databaseController->open_database();
        $query = "SELECT MAX(ano) FROM semestre";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $AnoSemestre = $dados[0]["MAX(ano)"];

        return $AnoSemestre;
    }

    function cadastraSemestre(Semestre $semestre){
        $conexao = $this->databaseController->open_database();

        $query = "INSERT INTO semestre(id,ano,numero) values('". $semestre->getId() . "',". $semestre->getAno() . ",". $semestre->getNumero() . ")";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $this->databaseController->close_database();

        return true;

    }

}

 ?>
