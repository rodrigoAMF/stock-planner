<?php
  //session_start();
  require_once("model/Produto.php");
  require_once("controller/ProdutoController.php");

  $arquivo_temp = $_FILES['arquivo']['tmp_name'];
  $dadosLidos = file($arquivo_temp);
  $cont = 0;
  $erro = false;

  foreach ($dadosLidos as $linha) {
    $linha = trim($linha);
    $camposProduto = explode("\t", $linha);

    if (sizeof($camposProduto)<8) {
      echo "entrou aqui";
      $mensagemErro = "Algum campo não preenchido na linha " . $cont+1;
      $erro = true;
      break;
    }

    $produtos[$cont] = new Produto();
    $produtos[$cont]->setNome($camposProduto[0]);
    $produtos[$cont]->setIdentificacao($camposProduto[1]);
    $produtos[$cont]->setCatmat($camposProduto[2]);
    $produtos[$cont]->setQuantidade($camposProduto[3]);
    $produtos[$cont]->setEstoqueIdeal($camposProduto[4]);
    $produtos[$cont]->setPosicao($camposProduto[5]);
    // Verificar se existe categoria com esse nome antes de setar nome
    // Se não exister criar nova categoria.
    $produtos[$cont]->getCategoria()->setNome($camposProduto[6]);
    $produtos[$cont]->setDescricao($camposProduto[7]);

    if (!ehNumerico($produtos[$cont]->getCatmat())) {
      $mensagemErro = "O campo catmat no produto " . $cont+1 . " deve ser numérico";
      $erro = true;
      break;
    }

    if (!ehNumerico($produtos[$cont]->getEstoqueIdeal())) {
      $mensagemErro = "O campo estoque ideal no produto " . $cont+1 . " deve ser numérico";
      $erro = true;
      break;
    }

    if (!ehNumerico($produtos[$cont]->getQuantidade())) {
      $mensagemErro = "O campo quantidade no produto " . $cont+1 . " deve ser numérico";
      $erro = true;
      break;
    }

    if (strlen($produtos[$cont]->getPosicao()) > 3) {
      $mensagemErro = "O campo posição no produto " . $cont+1 . " suporta apenas 3 caracteres";
      $erro = true;
      break;
    }
    $cont++;

  }

  if (!$erro) {
    foreach ($produtos as $produto) {

        $produtoController = ProdutoController::getInstance();
        $resultadoCadastro = $produtoController->cadastraProduto($produto);

        echo $resultadoCadastro;
    }
  }

  // if ($erro) {
  //   // significa que tem erro
  //   $_SESSION['msg'] = "<p>" .$mensagemErro. "</p>";
  // } else{
  //   $_SESSION['msg'] = "<p> Todos os produtos foram cadastrados com suceeso</p>";
  // }
  // header("Location: importar-produtos.php");

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
