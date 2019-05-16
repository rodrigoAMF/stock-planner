<?php

require_once("model/Categoria.php");
use PHPUnit\Framework\TestCase;

class CategoriaTest extends TestCase{

    public function testGetNomeNovo(){
        $categoria = new Categoria();
        $categoria->setNomeNovo("Nova Categoria");

        $this->assertEquals("Nova Categoria", $categoria->getNome());
    }

    public function testSetNomeNovo(){
        $categoria = new Categoria();
        
        $this->assertEquals(1, $categoria->setNomeNovo("Nova Categoria"));
        $this->assertEquals(-1, $categoria->setNomeNovo(""));
        $this->assertEquals(-1, $categoria->setNomeNovo(" "));
    }

}
