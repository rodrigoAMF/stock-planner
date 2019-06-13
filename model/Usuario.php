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

    public function getEmail():string{
        return $this->email;
    }

    public function getDataUltimoAcesso():string{
        return $this->dataUltimoAcesso;
    }

    public function getDataCadastro():string{
        return $this->dataCadastro;
    }

    public function setId($id) {
    	$this->setId($id);
	}

    public function setNome($nome){
        if($nome != null){
            if(strlen ($nome) <= 80){
                $feedback['status'] = 1;
                $this->nome = $nome;
            }else{
                $feedback['nome_do_campo'] = "nome";       
                $feedback['mensagem'] = "O nome excedeu o tamanho máximo";
                $feedback['status'] = -1;
            }
        }else{
            $feedback['nome_do_campo'] = "nome";       
            $feedback['mensagem'] = "O campo nome está vazio";
            $feedback['status'] = -1;
        }
        return $feedback;
    }

    public function setUsername($username){
        if($username != null){
            if(strlen ($username) <= 30){
                $feedback['status'] = 1;
                $this->username = $username;
            }else{
                $feedback['nome_do_campo'] = "username";       
                $feedback['mensagem'] = "O username excedeu o tamanho máximo";
                $feedback['status'] = -1;
            }
        }else{
            $feedback['nome_do_campo'] = "username";       
            $feedback['mensagem'] = "O campo username está vazio";
            $feedback['status'] = -1;
        }
        return $feedback;
        
    }

    public function setEmail($email){
        if($email != null){
            if(strlen ($email) <= 60){
                $feedback['status'] = 1;
                $this->email = $email;
            }else{
                $feedback['nome_do_campo'] = "email";       
                $feedback['mensagem'] = "O email excedeu o tamanho máximo";
                $feedback['status'] = -1;
            }
        }else{
            $feedback['nome_do_campo'] = "email";       
            $feedback['mensagem'] = "O campo email está vazio";
            $feedback['status'] = -1;
        }
        return $feedback;
    }

    public function setSenha($senha){
        if($senha != null ){
            if(strlen ($senha) <= 60) {
            	$feedback['status'] = 1;
            	$this->senha = MD5($senha);
            }else{
                $feedback['nome_do_campo'] = "senha";       
                $feedback['mensagem'] = "O senha excedeu o tamanho máximo";
                $feedback['status'] = -1;
            }
        }else{
            $feedback['nome_do_campo'] = "senha";       
            $feedback['mensagem'] = "O campo senha está vazio";
            $feedback['status'] = -1;
        }
        return $feedback;
    }

    public function setAtributos(string $login, string  $senha, string $nome, string $email) {
        // $this->id = $id;
        $this->username = $login;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->email = $email;
        // $this->dataCadastro = $dataCadastro;
        // $this->dataUltimoAcesso = $dataUltimoAcesso;
    }

    public function setDataUltimoAcesso($dataUltimoAcesso){
    	$this->dataUltimoAcesso = $dataUltimoAcesso;
	}

	public function setDataCadastro($dataCadastro){
    	$this->dataCadastro = $dataCadastro;
	}

	public function preencheDadosTeste(){
		$this->setId(1);
		$this->setUsername("rodrigo");
		$this->setSenha("123");
		$this->setNome("Rodrigo Franco");
		$this->setEmail("rodrigoamf@gmail.com");
		$this->setDataUltimoAcesso("2019-05-30 13:15:39");
		$this->setDataCadastro("2019-04-29 19:15:39");
	}
}