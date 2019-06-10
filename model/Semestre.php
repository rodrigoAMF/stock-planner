<?php
require_once("controller/SemestreController.php");

class Semestre{
    private $id;
    private $ano;
    private $numero;

    public function proximoSemestre(){
    	if($this->numero == 1){
    		$this->id = $this->ano . 'S2';
			$this->numero = 2;
		}else{
    		$this->ano++;
			$this->id = $this->ano . 'S1';
			$this->numero = 1;
		}

    	return $this;
	}

    public function getId():string{
        return $this->id;
    }

    public function getAno():int{
        return $this->ano;
    }

    public function getNumero():int{
        return $this->numero;
    }

	public function setId($id)
	{
		$this->id = $id;
	}

	public function setAno($ano)
	{
		$this->ano = $ano;
	}

	public function setNumero($numero)
	{
		$this->numero = $numero;
	}

    public function setAtributos(string $id, int $ano, int  $numero) {
        $this->id = $id;
        $this->ano = $ano;
        $this->numero = $numero;
    }

	public function preencheDadosTeste(){
		$this->setAno(2019);
		$this->setNumero(2);
		$this->setId("2019S2");
	}
}
