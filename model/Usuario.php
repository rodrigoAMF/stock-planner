<?php
require_once("controller/UsuarioController.php");

class Usuario{

    private $id;
    private $username;
    private $senha;
    private $nome;
    private $email;
    private $dataUltimoAcesso;
    private $dataCadastro;

    public function getId():int{
        return $this->id;
    }

    public function getUsername():string{
        return $this->username;
    }

    public function getSenha():string{
        return $this->senha;
    }

    public function getNome():string{
        return $this->nome;
    }

    public function getDataUltimoAcesso():string{
        return $this->dataUltimoAcesso;
    }

    public function getDataCadastro():string{
        return $this->dataCadastro;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function setAtributos(string $login, string  $senha, string $nome, string $dataCadastro, string $dataUltimoAcesso ) {
        // $this->id = $id;
        $this->username = $login;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->dataCadastro = $dataCadastro;
        $this->dataUltimoAcesso = $dataUltimoAcesso;
    }
}