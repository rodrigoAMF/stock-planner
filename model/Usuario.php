<?php
require_once("controller/UsuarioController.php");

class Usuario{

    private $id;
    private $login;
    private $senha;
    private $nome;
    private $dataUltimoAcesso;
    private $dataCadastro;

    public function getId():int{
        return $this->id;
    }

    public function getLogin():string{
        return $this->login;
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

    public function setAtributos(string $login, string  $senha, string $nome, string $dataCadastro, string $dataUltimoAcesso ) {
        // $this->id = $id;
        $this->login = $login;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->dataCadastro = $dataCadastro;
        $this->dataUltimoAcesso = $dataUltimoAcesso;
    }
}