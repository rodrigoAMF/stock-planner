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

    //essa nao está sendo usada no momento, porém pode ser usada um dia por isso deixamos ela
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

        for($i=0; $i< sizeof($dados); $i++){
            $usuario = new Usuario;
            $usuario->setNome($dados[$i]['nome']);
            $usuario->setUsername($dados[$i]['username']);
            $usuario->setEmail($dados[$i]['email']);
            $usuario->setSenha($dados[$i]['senha'],$dados[$i]['senha']);

            $arrayUsuarios[$i] = $usuario;
        }
        return $arrayUsuarios;
    }

    public function verificaSeUsuarioExistePorEmail($email, $conexao){

        $query = "SELECT * FROM usuarios WHERE email = '" . $email . "'";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        if($resultado->num_rows > 0){
            return 1;
        }else{
            return 0;
        }
    }

    public function verificaSeUsuarioExistePorUsername($username,$conexao){
        $query = "SELECT * FROM usuarios WHERE username = '" . $username . "'";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        if($resultado->num_rows > 0){
            return 1;
        }else{
            return 0;
        }
    }

    function cadastraUsuario(Usuario $usuario){
        $conexao = $this->databaseController->open_database();

        $duplicadoUsername = $this->verificaSeUsuarioExistePorUsername($usuario->getUsername(), $conexao);
        $duplicadoEmail = $this->verificaSeUsuarioExistePorEmail($usuario->getEmail(), $conexao);

        if($duplicadoUsername == 0 && $duplicadoEmail == 0)
        {

            $query = "INSERT INTO usuarios(username,senha,nome,email,dataUltimoAcesso,dataCadastro) VALUES ('{$usuario->getUsername()}','{$usuario->getSenha()}','{$usuario->getNome()}','{$usuario->getEmail()}',now(),now())";

            $resultado = $conexao->query($query);

            if($resultado == false)
            {
                $erro = 'Falha ao realizar a Query: ' . $query;
                throw new Exception($erro);
            }

            $this->databaseController->close_database();

            return 1;
        }else{
            $this->databaseController->close_database();
    	    if($duplicadoUsername == 1)
    	        return -2;
    	    else if($duplicadoEmail == 1){
                return -3;
            }
        }

    }

    public function verificarLogin($email, $senha){
        $conexao = $this->databaseController->open_database();

        $query = "SELECT * FROM usuarios WHERE email = '{$email}' AND senha = '{$senha}'";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        if(isset($dados[0]['ID'])){
            // Atualiza a data de último acesso
            $query = "UPDATE usuarios SET dataUltimoAcesso = NOW() WHERE ID = {$dados[0]['ID']}";

            $conexao->query($query);

            $this->databaseController->close_database();

            // Se a sessão não existir, inicia uma
             if (!isset($_SESSION)) session_start();

            // Salva os dados encontrados na sessão
            $_SESSION['usuario']['id'] = $dados[0]['ID'];
            $_SESSION['usuario']['nome'] = $dados[0]['nome'];
            $_SESSION['usuario']['email'] = $dados[0]['email'];
            $_SESSION['usuario']['tipo'] = $dados[0]['tipoUsuario'];

            return 1;
        }else{
            $this->databaseController->close_database();
            return 0;
        }
    }
}
?>
