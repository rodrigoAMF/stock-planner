<?php
require_once("DatabaseController.php");
require_once("model/Login.php");

class LoginController{

    private $databaseController;
    private static $loginController;

    public function __construct(){
        $this->databaseController = new DatabaseController();
    }

    public static function getInstance(){
        if(!isset(self::$loginController)){
            self::$loginController = new LoginController();
        }
        return self::$loginController;
    }

    function getLogins(){
        $conexao = $this->databaseController->open_database();

        $query = "SELECT * FROM usuarios";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
              $erro = 'Falha ao realizar a Query: ' . $query;
              throw new Exception($erro);
        }

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $this->databaseController->close_database();

        return $dados;
    }

    function cadastraLogin(Login $login){
        $conexao = $this->databaseController->open_database();

        $query = "INSERT INTO usuarios(login,senha,nome,dataUltimoAcesso,dataCadastro) VALUES (".$login->getLogin()."', '".$login->getSenha()."', '".$login->getNome()."', now(), now()");

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $this->databaseController->close_database();

        return true;

    }

    function getUsuarioPorId($id){
        $conexao = $this->databaseController->open_database();

        $query = "SELECT u.id, u.login, u.senha FROM usuarios u WHERE u.id = " . $id;

        $resultado = $conexao->query($query);

    	if($resultado == false)
    	{
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
    	}

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $this->databaseController->close_database();

    	if(isset($dados[0]['id'])){
    		return $dados[0];
    	}else{
    		return "Não existe um produto com esse id!";
    	}
    }

    function getUsuarioPorLogin($login){
        $conexao = $this->databaseController->open_database();

        $query = "SELECT u.id, u.login, u.senha FROM usuarios u WHERE u.login = " . $login;

        $resultado = $conexao->query($query);

    	if($resultado == false)
    	{
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
    	}

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $this->databaseController->close_database();

    	if(isset($dados[0]['login'])){
    		return $dados[0];
    	}else{
    		return "Não existe um produto com esse id!";
    	}
    }

}
?>