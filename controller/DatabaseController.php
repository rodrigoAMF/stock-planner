<?php

class DatabaseController{
    private $databaseModel;
    private $conexao;

    public function __construct(){
        $databaseModel = new Database();
    }

    function open_database() {
    	try {
    		$conexao = new mysqli($databaseModel::DB_HOST, $databaseModel::DB_USER, $databaseModel::DB_PASSWORD, $databaseModel::DB_NAME);
    		mysqli_set_charset($conexao,"utf8");
    		return $conexao;
    	} catch (Exception $e) {
    		echo $e->getMessage();
    		return null;
    	}
    }

    function close_database() {
    	try {
    		mysqli_close($conexao);
    	} catch (Exception $e) {
    		echo $e->getMessage();
    	}
    }
}
