<?php

require_once("model/Database.php");

class DatabaseController{
	private $databaseModel;
    private $conexao;

    public function __construct(){
        $this->databaseModel = new Database();
	}

    function open_database() {
    	try {
    		$this->conexao = new mysqli($this->databaseModel::DB_HOST, $this->databaseModel::DB_USER, $this->databaseModel::DB_PASSWORD, $this->databaseModel::DB_NAME);
    		mysqli_set_charset($this->conexao,"utf8");
    		return $this->conexao;
    	} catch (Exception $e) {
    		echo $e->getMessage();
    		return null;
    	}
    }

    function close_database() {
    	try {
    		mysqli_close($this->conexao);
    	} catch (Exception $e) {
    		echo $e->getMessage();
    	}
    }
}
