<?php

require_once("model/Semestre.php");
use PHPUnit\Framework\TestCase;

class SemestreTest extends TestCase{

    public function testsSetAtributos(){
        $semestre = new Semestre();
        $semestre->setAtributos("2019S1", 2019, 1);

        $this->assertEquals("2019S1", $semestre->getId());
        $this->assertEquals(2019, $semestre->getAno());
        $this->assertEquals(1, $semestre->getNumero());
    }

}
