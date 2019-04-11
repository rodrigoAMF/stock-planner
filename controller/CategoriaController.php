<?php
//mysqli_report(MYSQLI_REPORT_STRICT);
require_once("DatabaseController.php");

// Singleton
class CategoriaController{
    private $databaseController;
    private static $categoriaController;

    public function __construct(){
        $this->databaseController = new DatabaseController();
    }

    public static function getInstance(){
        if(!isset(self::$categoriaController)){
            self::$categoriaController = new CategoriaController();
        }
        return self::$categoriaController;
    }

    public function getIDPeloNome(string $nomecategoria): int {

        $conexao = $this->databaseController->open_database();

        $query = "SELECT id FROM categoria WHERE nome = '" . $nomecategoria . "'";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $this->databaseController->close_database();

        if(isset($dados[0]['id'])){
            return $dados[0]['id'];
        }else{
            return -1;
        }

    }
    public function getNomePeloId(Categoria $categoria){
        $conexao = $this->databaseController->open_database();

        $query = "SELECT id FROM categoria WHERE id = '" . $categoria->getId() . "'";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $this->databaseController->close_database();

        if(isset($dados[0]['nome'])){
            return $dados[0]['nome'];
        }else{
            return "Não existe registro com esse nome!";
        }
    }

    function cadastraCategoria(Categoria $categoria){
    	$conexao = $this->databaseController->open_database();

    	$query = "INSERT INTO categoria(nome) values('". $categoria->getNome() . "')";

    	$resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $this->databaseController->close_database();

        return true;

    }

    function getCategorias(){
    	$conexao = $this->databaseController->open_database();

        $query = "SELECT * FROM categoria ORDER BY nome";

        $resultado = $conexao->query($query);

        if($resultado == false)
        {
            $erro = 'Falha ao realizar a Query: ' . $query;
            throw new Exception($erro);
        }

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        $this->databaseController->close_database();

        if(isset($dados[0]['nome'])){
            return $dados;
        }else{
            return "Não existem registros!";
        }
    }


}

 ?>
