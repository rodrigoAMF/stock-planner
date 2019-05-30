<?php

require_once("model/Database.php");

class DatabaseController{
	private $databaseModel;
    private static $conexao;
    private static $instance;

    public function __construct() {
        $this->databaseModel = new Database();
	}

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new DatabaseController();
        }
        return self::$instance;
    }

    private function getConexao() {
        if(!isset(self::$conexao)){
            self::$conexao = new mysqli($this->databaseModel::DB_HOST, $this->databaseModel::DB_USER, $this->databaseModel::DB_PASSWORD, $this->databaseModel::DB_NAME);
            mysqli_set_charset(self::$conexao,"utf8");
        }
        return self::$conexao;
    }

    function open_database() {
    	try {
    		self::$conexao = new mysqli($this->databaseModel::DB_HOST, $this->databaseModel::DB_USER, $this->databaseModel::DB_PASSWORD, $this->databaseModel::DB_NAME);
    		mysqli_set_charset(self::$conexao,"utf8");
    		return self::$conexao;
    	} catch (Exception $e) {
    		echo $e->getMessage();
    		return null;
    	}
    }

    function close_database() {
    	try {
    		mysqli_close(self::$conexao);
    	} catch (Exception $e) {
    		echo $e->getMessage();
    	}
    }

    private function query($query) {
        $conexao = $this->getConexao();

        $resultadoQuery = $conexao->query($query);

        return $resultadoQuery;
    }

    private function erroBD($query){
        // Status 500 ocorreu um erro
        $resultado['status'] = 500;
        // Salva mensagem de erro do mysqli
        $resultado['error_msg'] = self::$conexao->error;
        $resultado['query'] = $query;

        return $resultado;
    }

    function select($query){
        $resultadoQuery = $this->query($query);

        if(!$resultadoQuery) {
            return $this->erroBD($query);
        }else{
            $resultado['status'] = 200;
            $resultado['dados'] = $resultadoQuery->fetch_all(MYSQLI_ASSOC);

            return $resultado;
        }
    }

    public function insert($query){
        return $this->createUpdateDelete($query);
    }

    public function update($query){
        return $this->createUpdateDelete($query);
    }

    public function delete($query){
        return $this->createUpdateDelete($query);
    }

    private function createUpdateDelete($query){
        $resultadoQuery = $this->query($query);

        if(!$resultadoQuery) {
            return $this->erroBD($query);
        }else{
            $resultado['status'] = 200;

            return $resultado;
        }
    }
}
