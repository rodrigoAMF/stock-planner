<?php

require_once("model/Usuario.php");
use PHPUnit\Framework\TestCase;

class UsuarioTest extends TestCase{

    public function testGetUsername(){
        $usuario = new Usuario();

        $usuario->setUsername("nemo");

        $this->assertEquals("nemo", $usuario->getUsername());
    }

    public function testSetUsername(){
        $usuario = new Usuario();

        $this->assertEquals(1,  $usuario->setNome("nemo")['status']);
        $this->assertEquals(-1,  $usuario->setNome("")['status']);
        $this->assertEquals(-1,  $usuario->setNome("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")['status']);
    }

    public function testGetSenha(){
        $usuario = new Usuario();

        $usuario->setSenha("123","123");

        $this->assertEquals("202cb962ac59075b964b07152d234b70", $usuario->getSenha());

    }
    public function testSetSenha(){
        $usuario = new Usuario();

        $this->assertEquals(1,  $usuario->setSenha("123","123")['status']);
        $this->assertEquals(-1,  $usuario->setSenha("123","321")['status']);
        $this->assertEquals(-1,  $usuario->setSenha("222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222","222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222")['status']);
        $this->assertEquals(-1,  $usuario->setSenha("","")['status']);

    }

    public function testGetNome(){
        $usuario = new Usuario();

        $usuario->setNome("Joelma");

        $this->assertEquals("Joelma", $usuario->getNome());

    }
    public function testSetNome(){
        $usuario = new Usuario();

        $this->assertEquals(1,  $usuario->setNome("Joelma")['status']);
        $this->assertEquals(-1,  $usuario->setNome("")['status']);
        $this->assertEquals(-1,  $usuario->setNome("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")['status']);

    }
    public function testGetEmail(){
        $usuario = new Usuario();

        $usuario->setEmail("lais.magalhaes13@gmail.com");

        $this->assertEquals("lais.magalhaes13@gmail.com", $usuario->getEmail());
    }
    public function testSetEmail(){
        $usuario = new Usuario();

        $this->assertEquals(1,  $usuario->setEmail("lais.magalhaes13@gmail.com")['status']);
        $this->assertEquals(-1,  $usuario->setEmail("")['status']);
        $this->assertEquals(-1,  $usuario->setEmail("lais.magalhaes13@gmail.commmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm")['status']);
    
    }
   

}
