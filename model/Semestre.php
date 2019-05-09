<?php
require_once("controller/SemestreController.php");

class Semestre{

    private $id;
    private $ano;
    private $numero;

    public function getId():string{
        return $this->id;
    }

    public function getAno():int{
        return $this->ano;
    }

    public function getNumero():int{
        return $this->numero;
    }

    public function setAtributos(string $id, int $ano, int  $numero) {
        $this->id = $id;
        $this->ano = $ano;
        $this->numero = $numero;
    }
}
