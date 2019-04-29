<?php
require_once("controller/SemestreController.php");

class Semestre{
    private $id;
    private $ano;

    public function getId():string{
        return $this->id;
    }

    public function getAno():int{
        return $this->ano;
    }

    public function setAtributos(int $id, string $ano) {
        $this->id = $id;
        $this->ano = $ano;
    }
}
