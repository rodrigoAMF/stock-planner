<?php

class Categoria{
    private $id;
    private $nome;

    public function getIDPeloNome(string $nome){
    	$conexao = open_database();

        $query = "SELECT id FROM categoria WHERE nome = '" . $nome . "'";

        $resultado = $conexao->query($query);

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        close_database($conexao);

        return $dados[0]['id'];
    }

    public function getNomePeloId(int $id): int{
        $conexao = open_database();

        $query = "SELECT id FROM categoria WHERE id = '" . $id . "'";

        $resultado = $conexao->query($query);

        $dados = $resultado->fetch_all(MYSQLI_ASSOC);

        close_database($conexao);

        return $dados[0]['nome'];
    }

    public function getId():int{
        return $this->id;
    }

    public function getNome():string{
        return $this->nome;
    }

    public function setAtributos(int $id, string $nome) {
        $this->id = $idCategoria;
        $this->nome = $nome;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setNome(string $nome){
        $this->nome = $nome;
    }
}
