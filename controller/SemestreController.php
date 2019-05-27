<?php
require_once("DatabaseController.php");
require_once("model/Semestre.php");

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

        for($i=0; $i< sizeof($dados); $i++){
            $semestre = new Semestre();
            $semestre->setAtributos($dados[$i]['id'],$dados[$i]['ano'],$dados[$i]['numero']);

            $arraySemestres[$i] = $semestre;
        }
        return $arraySemestres;
    }

    function getSemestreAtual() {
        $conexao = $this->databaseController->open_database();
        $query = "SELECT * FROM `semestre` ORDER BY id DESC LIMIT 1";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        return $dados[0]['id'];
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

    function atualizaSemestre()
    {
        $semestre = new Semestre();

        $stringSemestre = $this->getSemestreAtual();
        $ano = substr($stringSemestre, 0, 4);
        $numero = substr($stringSemestre, 5, 6);

        if($numero == 1)
        {
            $id = $ano . 'S2';
            $semestre->setAtributos($id, $ano, 2);
        }else{
            $ano++;
            $id = $ano . 'S1';
            $semestre->setAtributos($id, $ano, 1);
        }

        return $semestre;
    }
}

 ?>
