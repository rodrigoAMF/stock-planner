<?php

require_once("model/Categoria.php");
use PHPUnit\Framework\TestCase;

class CategoriaTest extends TestCase{

    public function testGetNome(){
        $categoria = new Categoria();
        $categoria->setNome("Nova Categoria");

        $this->assertEquals("Nova Categoria", $categoria->getNome());
    }

    public function testSetNome(){
        $categoria = new Categoria();
        
        $this->assertEquals(1, $categoria->setNome("Nova Categoria"));
        $this->assertEquals(-1, $categoria->setNome(""));
        $this->assertEquals(-1, $categoria->setNome(" "));
    }

}
