<?php

class Produto{
    // Strings
    private $nome, $identificacao, $posicao, $descricao;
    // Inteiros
    private $catmat, $quantidade, $estoqueIdeal;
    // Categoria
    private $categoria;

    function __construct($idCategoria) {
        $categoria = new Categoria($idCategoria);
    }
}
