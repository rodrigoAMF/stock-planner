<?php
  session_start();
  include("config.php");
  include(DBAPI);



  $arquivo_temp = $_FILES['arquivo']['tmp_name'];
  $dadosLidos = file($arquivo_temp);
  $cont = 0;
  $erro = false;

  foreach ($dadosLidos as $linha) {
    $cont++;
    $linha = trim($linha);
    $produtos= explode("\t", $linha);

    if ($produtos <8) {
      $mensagemErro = "Algum campo não preenchido na linha " . $cont;
      $erro = true;
      break;
    }

    $nome = $produtos[0];
    $identificacao = $produtos[1];
    $catmat = $produtos[2];
    $quantidade = $produtos[3];
    $estoqueIdeal = $produtos[4];
    $posicao = $produtos[5];
    $categoria = $produtos[6];
    $descricao = $produtos[7];


    if (!ehNumerico($catmat)) {
      $mensagemErro = "O campo catmat no produto " . $cont . " deve ser numérico";
      $erro = true;
      break;
    }

    if (!ehNumerico($estoqueIdeal)) {
      $mensagemErro = "O campo estoque ideal no produto " . $cont . " deve ser numérico";
      $erro = true;
      break;
    }

    if (!ehNumerico($quantidade)) {
      $mensagemErro = "O campo quantidade no produto " . $cont . " deve ser numérico";
      $erro = true;
      break;
    }

    if (strlen($posicao) > 3) {
      $mensagemErro = "O campo posição no produto " . $cont . " suporta apenas 3 caracteres";
      $erro = true;
      break;
    }

  }

  if (!$erro) {
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
  }

  if ($erro) {
    // significa que tem erro
    $_SESSION['msg'] = "<p>" .$mensagemErro. "</p>";
  } else{
    $_SESSION['msg'] = "<p> Todos os produtos foram cadastrados com suceeso</p>";
  }
  header("Location: importar-produtos.php");

  function ehNumerico($campo): bool{
    for ($i=0; $i < strlen($campo); $i++) {
      $str = $campo;
      $str = chr($i);
      if ($str >= 0 || $str <=9) {
        return true;
      } else{
        return false;
      }
    }
  }



?>
