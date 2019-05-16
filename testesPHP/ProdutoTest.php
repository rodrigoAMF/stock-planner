<?php

require_once("model/Produto.php");
require_once("model/Categoria.php");
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase{

    public function testGetNome(){
        $produto = new Produto();

        $produto->setNome("Teste");

        $this->assertEquals("Teste", $produto->getNome());
    }

    public function testSetNome(){
        $produto = new Produto();

        $this->assertEquals(1,  $produto->setNome("Teste")['status']);
        $this->assertEquals(-1,  $produto->setNome("")['status']);
        $this->assertEquals(-1,  $produto->setNome("ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo")['status']);
    }

    public function testGetIdentificacao(){
        $produto = new Produto();

        $produto->setIdentificacao("1A");

        $this->assertEquals("1A", $produto->getIdentificacao());
    }

    public function testSetIdentificacao(){
        $produto = new Produto();

        $this->assertEquals(-1, $produto->setIdentificacao("11111111111111111111111111111111111111111111111111111111111111111111111111111111")['status']);
        $this->assertEquals(-1,$produto->setIdentificacao("")['status']);
        $this->assertEquals(1,$produto->setIdentificacao("152")['status']);
    }

    public function testGetPosicao(){
        $produto = new Produto();

        $produto->setIdentificacao("1a3");

        $this->assertEquals("1a3", $produto->getIdentificacao());
    }

    public function testSetPosicao(){
        $produto = new Produto();

        $this->assertEquals(-1, $produto->setPosicao("1478a")['status']);
        $this->assertEquals(-1,$produto->setPosicao("")['status']);
        $this->assertEquals(1,$produto->setPosicao("1p2")['status']);
    }

    public function testGetDescricao(){
        $produto = new Produto();

        $produto->setDescricao("descricao1234");

        $this->assertEquals("descricao1234", $produto->getDescricao());
    }
    
    public function testSetDescricao(){
        $produto = new Produto();

        $this->assertEquals(1, $produto->setDescricao("Gabriela")['status']);
        $this->assertEquals(-1,$produto->setDescricao("")['status']);
    }

    public function testGetCatmat(){
        $produto = new Produto();

        $produto->setCatmat(123456);

        $this->assertEquals(123456, $produto->getCatmat());
    }

    public function testSetCatmat(){
        $produto = new Produto();

        $this->assertEquals(-1, $produto->setCatmat("9688852")['status']);
        $this->assertEquals(-1,$produto->setCatmat("re")['status']);
        $this->assertEquals(-1,$produto->setCatmat("")['status']);
        $this->assertEquals(1,$produto->setCatmat("123")['status']);
    }

    public function testGetQuantidade(){
        $produto = new Produto();

        $produto->setQuantidade(852);

        $this->assertEquals(852, $produto->getQuantidade());
    }

    public function testSetQuantidade(){
        $produto = new Produto();

        $this->assertEquals(-1, $produto->setQuantidade("9688852")['status']);
        $this->assertEquals(-1,$produto->setQuantidade("re")['status']);
        $this->assertEquals(-1,$produto->setQuantidade("")['status']);
        $this->assertEquals(1,$produto->setQuantidade("123")['status']);
    }

    public function testGetEstoqueIdeal(){
        $produto = new Produto();

        $produto->setEstoqueIdeal(111);

        $this->assertEquals(111, $produto->getEstoqueIdeal());
    }

    public function testSetEstoqueIdeal(){
        $produto = new Produto();

        $this->assertEquals(-1, $produto->setEstoqueIdeal("9688852")['status']);
        $this->assertEquals(-1,$produto->setEstoqueIdeal("re")['status']);
        $this->assertEquals(-1,$produto->setEstoqueIdeal("")['status']);
        $this->assertEquals(1,$produto->setEstoqueIdeal("123")['status']);
    }

    public function testSetCategoria(){
        $produto = new Produto();
        $categoria = new Categoria();

        $produto->setCategoria($categoria);

        $this->assertEquals($categoria, $produto->getCategoria());
    }

}
