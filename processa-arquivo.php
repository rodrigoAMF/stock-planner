<?php
session_start();
  require_once("model/Produto.php");
  require_once("controller/ProdutoController.php");
  require_once("controller/CategoriaController.php");


  $arquivo_temp = $_FILES['arquivo']['tmp_name'];
  $dadosLidos = file($arquivo_temp);
  $cont = 0;
  $erro = false;

  foreach ($dadosLidos as $linha) {
    $produtos[$cont] = new Produto();
    $existeCategoria = false;
    $linha = trim($linha);
    $camposProduto = explode("\t", $linha);

    if (sizeof($camposProduto)<8) {
      $mensagemErro = "Algum campo não preenchido na linha " . strval($cont+1);
      $erro = true;
      break;
    }

    $categoriaController = CategoriaController::getInstance();
    $categorias = $categoriaController->getCategorias();

    for ($i=0; $i < sizeof($categorias); $i++) {

      if ($categorias[$i]['nome'] == $camposProduto[6]) {
          $produtos[$cont]->getCategoria()->setNome($camposProduto[6]);
          $existeCategoria = true;
          break;
      }
    }
    if (!$existeCategoria) {
      $categoria = new Categoria();
      $categoria->setNomeNovo($camposProduto[6]);
      $categoriaController->cadastraCategoria($categoria);
      $produtos[$cont]->getCategoria()->setNome($camposProduto[6]);
    }

    $produtos[$cont]->setDescricao($camposProduto[7]);

    if (!ehNumerico($camposProduto[2])) {
      echo $camposProduto[3];
      $mensagemErro = "O campo catmat no produto " . strval($cont+1) . " deve ser numérico";
      $erro = true;
      continue;
    }

    if (!ehNumerico($camposProduto[4])) {
      $mensagemErro = "O campo estoque ideal no produto " . strval($cont+1) . " deve ser numérico";
      $erro = true;
      continue;
    }
    if (!ehNumerico($camposProduto[3])) {

      $mensagemErro = "O campo quantidade no produto " . strval($cont+1) . " deve ser numérico";
      $erro = true;
      continue;
    }

    if (strlen($camposProduto[5]) > 3) {
      $mensagemErro = "O campo posição no produto " . strval($cont+1) . " suporta apenas 3 caracteres";
      $erro = true;
      continue;
    }

    if(!$erro){
      $produtos[$cont]->setNome($camposProduto[0]);
      $produtos[$cont]->setIdentificacao($camposProduto[1]);
      $produtos[$cont]->setCatmat($camposProduto[2]);
      $produtos[$cont]->setQuantidade($camposProduto[3]);
      $produtos[$cont]->setEstoqueIdeal($camposProduto[4]);
      $produtos[$cont]->setPosicao($camposProduto[5]);
    }

    $cont++;
  }



  if (!$erro) {
    foreach ($produtos as $produto) {
        $produtoController = ProdutoController::getInstance();
        $resultadoCadastro = $produtoController->cadastraProduto($produto);
        //echo $resultadoCadastro;
    }
  }

  if ($erro) {
    // significa que tem erro
    $_SESSION['msg'] = "<p>" .$mensagemErro . "</p>";
  } else{
    $_SESSION['msg'] = "<p> Todos os produtos foram cadastrados com sucesso</p>";
  }
  header("Location: importar-produtos.php");

  function ehNumerico($campo): bool{
    for ($i=0; $i < strlen($campo); $i++) {
      if (!(toNumber($campo[$i]) >= 0 && toNumber($campo[$i]) <= 9)) {
        return false;
      }
    }
    return true;
  }

  function toNumber($dest)
    {
        if ($dest)
            return ord(strtolower($dest)) - 96;
        else
            return 0;
    }



?>
