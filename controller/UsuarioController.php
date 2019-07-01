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
	public function mapearUsuariosEmArray($usuariosNaoMapeados){
		$usuariosMapeados = array_map(function($dado){
			$usuario = new Usuario();

			if(isset($dado['ID']))
				$usuario->setId($dado['ID']);
			if(isset($dado['username']))
				$usuario->setUsername($dado['username']);
			if(isset($dado['senha']))
				$usuario->setSenha($dado['senha']);
			if(isset($dado['nome']))
				$usuario->setNome($dado['nome']);
			if(isset($dado['email']))
				$usuario->setEmail($dado['email']);
			if(isset($dado['dataUltimoAcesso']))
				$usuario->setDataUltimoAcesso($dado['dataUltimoAcesso']);
			if(isset($dado['dataCadastro']))
				$usuario->setDataCadastro($dado['dataCadastro']);

			return $usuario;
		}, $usuariosNaoMapeados);

		return $usuariosMapeados;
	}

    function getUsuarios(){
       $query = "SELECT * FROM usuarios";

		$resultado = $this->databaseController->select($query);

		if($resultado['status'] == 200) {
			$resultado['dados'] = $this->mapearUsuariosEmArray($resultado['dados']);
		}

		return $resultado;
    }

    public function verificaSeUsuarioExistePorEmail($email) {
        $query = "SELECT * FROM usuarios WHERE email = '{$email}'";

		$resultado = $this->databaseController->select($query);

        if ($resultado['status'] == 200){
        	$resultado['dados'] = 1;
		}else{
			$resultado['dados'] = 0;
		}

		return $resultado;
    }

    public function verificaSeUsuarioExistePorUsername($username){
        $query = "SELECT * FROM usuarios WHERE username = '{$username}'";

		$resultado = $this->databaseController->select($query);
		if ($resultado['status'] == 200){
			$resultado['dados'] = 1;
		}else{
			$resultado['dados'] = 0;
		}

		return $resultado;
    }

    function cadastraUsuario(Usuario $usuario){
        $resultado = $this->verificaSeUsuarioExistePorUsername($usuario->getUsername());
		$duplicadoUsername = $resultado['dados'];

		$resultado = $this->verificaSeUsuarioExistePorEmail($usuario->getEmail());
		$duplicadoEmail = $resultado['dados'];

        if($duplicadoUsername == 0 && $duplicadoEmail == 0)
        {
            $query = "INSERT INTO usuarios(username,senha,nome,email,dataUltimoAcesso,dataCadastro) VALUES ('{$usuario->getUsername()}','{$usuario->getSenha()}','{$usuario->getNome()}','{$usuario->getEmail()}',now(),now())";

			$resultado = $this->databaseController->insert($query);
			if ($resultado['status'] == 200){
				$resultado['dados'] = 1;
			}
        }else{
        	$resultado['status'] = 500;
    	    if($duplicadoUsername == 1) {
				$resultado['dados'] = -2;
				$resultado['error_msg'] = "Nome de Usuário Duplicado";
			}else {
				$resultado['dados'] = -3;
				$resultado['error_msg'] = "Email Duplicado";
            }
        }
		return $resultado;
    }

    function getUsuarioPorId($id) {
        $query = "SELECT u.id, u.username, u.senha, u.nome, u.email, u.dataUltimoAcesso, u.dataCadastro FROM usuarios u WHERE u.id = " . $id;

		$resultado = $this->databaseController->select($query);

		if ($resultado['status'] == 200){
			$resultado['dados'] = $this->mapearUsuariosEmArray($resultado['dados'])[0];
		}else{
			$resultado['dados'] = -1;
			$resultado['error_msg'] = "Não existe um usuário com esse id!";
		}

		return $resultado;
    }

    function getUsuarioPorUsername($username){
        $query = "SELECT * FROM usuarios WHERE username = '{$username}'";

		$resultado = $this->databaseController->select($query);

		if ($resultado['status'] == 200){
			$resultado['dados'] = $this->mapearUsuariosEmArray($resultado['dados'])[0];
		}else{
			$resultado['dados'] = -1;
			$resultado['error_msg'] = "Não existe um usuário com esse username!";
		}
		return $resultado;
    }

    public function verificarLogin($login, $senha){
    	$regexEmail = "";
    	$senha = MD5($senha);
    	$tipoLogin = 'username'; // username
		if (strpos($login, '@') !== false) {
			$tipoLogin = 'email';
		}

    	if($tipoLogin == "email"){
			$query = "SELECT * FROM usuarios WHERE email = '{$login}' AND senha = '{$senha}'";
		}else{
			$query = "SELECT * FROM usuarios WHERE username = '{$login}' AND senha = '{$senha}'";
		}


		$resultado = $this->databaseController->select($query);


		if ($resultado['status'] == 200) {
			$resultado['dados'] = $this->mapearUsuariosEmArray($resultado['dados'])[0];
		}else{
			$resultado['dados'] = 0;
			if($resultado['status'] == 204)
				$resultado['error_msg'] = "Usuário não existe!";

			return $resultado;
		}

		$usuario = $resultado['dados'];

		// Atualiza a data de último acesso
		$query = "UPDATE usuarios SET dataUltimoAcesso = NOW() WHERE ID = {$usuario->getId()}";

		$resultado = $this->databaseController->update($query);

		if($resultado['status'] == 200){
			// Se a sessão não existir, inicia uma
			if (!isset($_SESSION)) session_start();

			// Salva os dados encontrados na sessão
			$_SESSION['usuario']['id'] = $usuario->getId();
			$_SESSION['usuario']['nome'] = $usuario->getNome();
			$_SESSION['usuario']['email'] = $usuario->getEmail();
		}
		return $resultado;
    }
}
?>
