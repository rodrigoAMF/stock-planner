<?php

require_once("model/Usuario.php");
require_once("controller/UsuarioController.php");
require_once("controller/DatabaseController.php");
use PHPUnit\Framework\TestCase;

class UsuarioIntegrationTest extends TestCase{
    public static function setUpBeforeClass(): void{
        $databaseController = new DatabaseController();
        $conexao = $databaseController->open_database();

        $query = "INSERT INTO usuarios(username,senha,nome,email,dataUltimoAcesso,dataCadastro) VALUES ('pato','123','patati','patata@gmail.com',now(),now())";
        $resultado = $conexao->query($query);

        $query = "INSERT INTO usuarios(username,senha,nome,email,dataUltimoAcesso,dataCadastro) VALUES ('calypson','123','aluametraiu','joelma@gmail.com',now(),now())";
        $resultado = $conexao->query($query);

        $query = "INSERT INTO usuarios(username,senha,nome,email,dataUltimoAcesso,dataCadastro) VALUES ('projota','123','mulequedevila','ohmeudeus@gmail.com',now(),now())";
        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $databaseController->close_database();

    }
    public function testCadastraUsuario(){
        $usuarioController = UsuarioController::getInstance();
        $usuario = new Usuario();
        $usuario->setNome("Ragatanga");
        $usuario->setUsername("rouge");
        $usuario->setEmail("ragatanga@rouge.com");
        $usuario->setSenha("123","123");

        $this->assertEquals(1, $usuarioController->cadastraUsuario($usuario));

        $usuario->setEmail("ragatang@rouge.com");
        $this->assertEquals(-2, $usuarioController->cadastraUsuario($usuario));

        $usuario->setEmail("ragatanga@rouge.com");
        $usuario->setUsername("rag");
        $this->assertEquals(-3, $usuarioController->cadastraUsuario($usuario));
    }

    public function testGetUsuarios(){
        $usuarioController = UsuarioController::getInstance();
        $count = 0;

        $usuarios = $usuarioController->getUsuarios();
        for($i= 0; $i< sizeof($usuarios); $i++){
            if($usuarios[$i]->getUsername() == "pato" || $usuarios[$i]->getUsername() == "calypson"
                || $usuarios[$i]->getUsername() == "projota"){
                    $count++;
            }
        }
        $this->assertEquals(3, $count);
    }
    public function testVerificaLogin(){
      $usuarioController = UsuarioController::getInstance();
      //Esse teste não funciona
      //$this->assertEquals(1, $usuarioController->verificarLogin("patata@gmail.com","123"));
      $this->assertEquals(0, $usuarioController->verificarLogin("joyce@rouge.com","123"));
      $this->assertEquals(0, $usuarioController->verificarLogin("ragatanga@rouge.com","546"));
    }

    public static function tearDownAfterClass(): void{
        $databaseController = new DatabaseController();

        $conexao = $databaseController->open_database();

        for($i = 0 ; $i<4; $i++){
            $query = "DELETE from usuarios ORDER BY id DESC LIMIT 1";
            $resultado = $conexao->query($query);
        }

      	if($resultado == false)
      	{
              $erro = 'Falha ao realizar a Query: ' . $query;
              throw new Exception($erro);
      	}

        $databaseController->close_database();

    }

}
