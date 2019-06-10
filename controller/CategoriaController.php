<?php
//mysqli_report(MYSQLI_REPORT_STRICT);
require_once("DatabaseController.php");
require_once("model/Categoria.php");

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

    public function mapearCategoriaEmArray($categoriasNaoMapeadas){
        $categoriasMapeadas = array_map(function($dado){
            $categoria = new Categoria();

            if(isset($dado['nome']))
                $categoria->setNome($dado['nome']);
            if(isset($dado['id']))
                $categoria->setId($dado['id']);

            return $categoria;
        }, $categoriasNaoMapeadas);

        return $categoriasMapeadas;
    }

    function verificaSeNomeExiste(string $nome){
        $query = "SELECT * FROM categoria WHERE nome = '{$nome}'";

        $resultado = $this->databaseController->select($query);

        if($resultado['status'] == 200) {
            $resultado['dados'] = 1;
        }else if($resultado['status'] == 204){
            $resultado['dados'] = 0;
        }

        return $resultado;
    }

    function verificaSeIdExiste(int $id){
        $query = "SELECT * FROM categoria WHERE id = '{$id}'";

        $resultado = $this->databaseController->select($query);

        if($resultado['status'] == 200) {
            $resultado['dados'] = 1;
        }else if($resultado['status'] == 204){
            $resultado['dados'] = 0;
        }

        return $resultado;
    }

    public function getIDPeloNome(string $nomeCategoria) {
        $query = "SELECT id FROM categoria WHERE nome = '{$nomeCategoria}'";

        $resultado = $this->databaseController->select($query);

        if($resultado['status'] == 200) {
            $resultado['dados'] = $resultado['dados'][0]['id'];
        }else if($resultado['status'] == 204){
            $resultado['dados'] = -1;
        }

        return $resultado;
    }

    public function getNomePeloId(int $id) {
        $query = "SELECT nome FROM categoria WHERE id = '{$id}'";

        $resultado = $this->databaseController->select($query);

        if($resultado['status'] == 200) {
            $resultado['dados'] = $resultado['dados'][0]['nome'];
        }else if($resultado['status'] == 204){
            $resultado['dados'] = -1;
        }

        return $resultado;
    }

    function cadastraCategoria(Categoria $categoria){
        $resultado = $this->verificaSeNomeExiste($categoria->getNome());
        
        if($resultado['dados'] == 0) {
            $query = "INSERT INTO categoria(nome) values('{$categoria->getNome()}')";

            $resultado = $this->databaseController->insert($query);

            $resultado['dados'] = 1;
        }else{
            $resultado['dados'] = -1;
        }

        return $resultado;
    }

    function getCategorias(){
        $query = "SELECT * FROM categoria ORDER BY nome";

        $resultado = $this->databaseController->select($query);

        if($resultado['status'] == 200) {
            $resultado['dados'] = $this->mapearCategoriaEmArray($resultado['dados']);
        }

        return $resultado;

    }


}

 ?>
