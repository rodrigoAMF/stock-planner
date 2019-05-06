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

        return $dados;
    }

    function getSemestreAtual() {
        $conexao = $this->databaseController->open_database();
        $query = "SELECT * FROM `semestre` ORDER BY ano DESC LIMIT 2";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        if($dados[0]['ano'] == $dados[1]['ano']){
            if($dados[0]['numero'] > $dados[1]['numero']){
                return $dados[0]['id'];
            }else{
                return $dados[1]['id'];
            }
        }else{
            return $dados[0]['id'];
        }
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
        $ano = $this->getUltimoAno();
        $numeroid = $this->getSemestreAtual();

        $numero = $numeroid[0];
        

        if($numero == 1)
        {
            $id = '2S'.$ano;
            $semestre->setAtributos($id, $ano, 2);
        }else{
            $ano++;
            $id = '1S'.$ano;
            $semestre->setAtributos($id, $ano, 1);
        }

        return $semestre;
    }

}

 ?>
