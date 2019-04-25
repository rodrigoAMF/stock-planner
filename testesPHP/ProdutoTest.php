<?php

require_once("model/Produto.php");
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase{

    public function testSetNome(){
        $produto = new Produto();

        $produto->setNome("Teste");

        $this->assertEquals("Teste", $produto->setNome("Teste"););
    }

    public function testSetIdentificacao(){
        $produto = new Produto();

        $produto->setIdentificacao("1A");

        $this->assertEquals("1A", $produto->getIdentificacao());
    }
}
