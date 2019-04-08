<?php
  include("config.php");
  include(DBAPI);

  $arquivo_temp = $_FILES['arquivo']['tmp_name'];

  $dadosLidos = file($arquivo_temp);

  foreach ($dadosLidos as $linha) {
    $linha = trim($linha);
    $produtos= explode("\t", $linha);

    $nome = $produtos[0];
    $identificacao = $produtos[1];
    $catmat = $produtos[2];
    $quantidade = $produtos[3];
    $estoqueIdeal = $produtos[4];
    $posicao = $produtos[5];
    $categoria = $produtos[6];
    $descricao = $produtos[7];

    $resultadoQuery = cadastraProduto($nome, $identificacao, $catmat, $quantidade, $estoqueIdeal, $posicao, $categoria, $descricao);


    if(!$resultadoQuery){
        throw new Exception("500 (Internal Server Error)");
    }
  }
