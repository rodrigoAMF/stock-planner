<?php

require_once("model/Categoria.php");
use PHPUnit\Framework\TestCase;

class CategoriaTest extends TestCase{

    public function testSetNomeNovo(){
        $categoria = new Categoria();
        $categoria->setNomeNovo("Nova Categoria");

        $this->assertEquals("Novb Categoria", $categoria->getNome());
    }

    public function testSetAtributos(){
        $categoria = new Categoria();
        $categoria->setAtributos(1, "Teste Categoria");

        $this->assertEquals("Teste Categoria", $categoria->getNome());
        $this->assertEquals(1, $categoria->getId());
    }
}
