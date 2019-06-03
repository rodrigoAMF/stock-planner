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

	public function mapearSemestreEmArray($semestresNaoMapeados){
		$semestresMapeados = array_map(function($dado){
			$semestre = new Semestre();

			if(isset($dado['id']))
				$semestre->setId($dado['id']);
			if(isset($dado['ano']))
				$semestre->setAno($dado['ano']);
			if(isset($dado['numero']))
				$semestre->setNumero($dado['numero']);

			return $semestre;
		}, $semestresNaoMapeados);

		return $semestresMapeados;
	}

	function getSemestres(){
		$query = "SELECT * FROM semestre";

		$resultado = $this->databaseController->select($query);

		if($resultado['status'] == 200) {
			$resultado['dados'] = $this->mapearSemestreEmArray($resultado['dados']);
		}

		return $resultado;
	}

	function getSemestreAtual() {
		$query = "SELECT * FROM `semestre` ORDER BY id DESC LIMIT 1";

		$resultado = $this->databaseController->select($query);

		if($resultado['status'] == 200) {
			$resultado['dados'] = $this->mapearSemestreEmArray($resultado['dados']);
			$resultado['dados'] = $resultado['dados'][0];
		}

		return $resultado;
	}

	function getUltimoAno() {
		$query = "SELECT MAX(ano) FROM semestre";

		$resultado = $this->databaseController->select($query);

		if($resultado['status'] == 200) {
			$resultado['dados'] = $resultado['dados'][0]["MAX(ano)"];
		}

		return $resultado;
	}

	function cadastraProximoSemestre(){
		$resultado = $this->getSemestreAtual();
		if($resultado['status'] != 200){
			return $resultado;
		}
		$semestreAtual = $resultado['dados'];
		$proximoSemestre = $semestreAtual->proximoSemestre();

		$query = "INSERT INTO semestre(id,ano,numero) values('". $proximoSemestre->getId() . "',". $proximoSemestre->getAno() . ",". $proximoSemestre->getNumero() . ")";

		$resultado = $this->databaseController->insert($query);

		return $resultado;
	}
}

?>
