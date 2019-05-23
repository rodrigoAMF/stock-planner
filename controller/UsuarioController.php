<?php
require_once("DatabaseController.php");
require_once("model/Usuario.php");

class UsuarioController{

    private $databaseController;
    private static $usuarioController;

    public function __construct(){
        $this->databaseController = new DatabaseController();
    }

    public static function getInstance(){
        if(!isset(self::$usuarioController)){
            self::$usuarioController = new UsuarioController();
        }
        return self::$usuarioController;
    }

    function getUsuarios(){
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

    function cadastraUsuario(Usuario $usuario){
        $conexao = $this->databaseController->open_database();

        $query = "INSERT INTO usuarios(username,senha,nome,email,dataUltimoAcesso,dataCadastro) VALUES ('{$usuario->getUsername()}','{$usuario->getSenha()}','{$usuario->getNome()}','{$usuario->getEmail()}',now(),now())";
        
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

        $query = "SELECT u.id, u.username, u.senha, u.nome, u.email, u.dataUltimoAcesso, u.dataCadastro FROM usuarios u WHERE u.id = " . $id;

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
    		return "Não existe um usuario com esse id!";
    	}
    }

    function getUsuarioPorUsername($username){
        $conexao = $this->databaseController->open_database();

        $query = "SELECT u.id, u.username, u.senha, u.nome, u.email, u.dataUltimoAcesso, u.dataCadastro FROM usuarios u WHERE u.username = " . $username;

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
    		return "Não existe um usuario com esse id!";
    	}
    }

}
?>