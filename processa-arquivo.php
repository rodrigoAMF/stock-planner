<?php
session_start();
  require_once("model/Produto.php");
  require_once("controller/ProdutoController.php");
  require_once("controller/CategoriaController.php");


  $arquivo_temp = $_FILES['arquivo']['tmp_name'];
  $dadosLidos = file($arquivo_temp);
  $cont = 0;
  $erro = false;

  for($i = 0; $i < sizeof($dadosLidos); $i++)
  {
      $mensagemErro = " ";
      $produtos[$i] = new Produto();
      $existeCategoria = false;
      $dadosLidos[$i] = trim($dadosLidos[$i]);
      $camposProduto = explode("\t", $dadosLidos[$i]);
      

  
    if (sizeof($camposProduto)<8) {
      $mensagemErro = "Algum campo não preenchido na linha " . ($i+1);
      $erro = true;
      $i=sizeof($dadosLidos);
    }

    $categoriaController = CategoriaController::getInstance();
    $categorias = $categoriaController->getCategorias();

    for ($i=0; $i < sizeof($categorias); $i++) {

      if ($categorias[$i]['nome'] == $camposProduto[6]) {
          $existeCategoria = true;
          break;
      }
    }
    if (!$existeCategoria) {
      $categoria = new Categoria();
      $categoria->setNomeNovo($camposProduto[6]);
      $categoriaController->cadastraCategoria($categoria);
      
    }

    

    if (!ehNumerico($camposProduto[2])) {
      $mensagemErro = "O campo catmat no produto " . strval($i) . " deve ser numérico A";
      $erro = true;
      $i=sizeof($dadosLidos);
    }

    if (!ehNumerico($camposProduto[4])) {
      $mensagemErro = "O campo estoque ideal no produto " . strval($i) . " deve ser numérico B";
      $erro = true;
      $i=sizeof($dadosLidos);
    }

    if (!ehNumerico($camposProduto[3])){
      $mensagemErro = "O campo quantidade no produto " . strval($i) . " deve ser numérico C";
      $erro = true;
      $i=sizeof($dadosLidos);
    }

    if (strlen($camposProduto[5]) > 3) {
      $mensagemErro = "O campo posição no produto " . strval($i) . " suporta apenas 3 caracteres";
      $erro = true;
      $i=sizeof($dadosLidos);
    }

    if(!$erro){
      $produtos[$i]->setNome($camposProduto[0]);
      $produtos[$i]->setIdentificacao($camposProduto[1]);
      $produtos[$i]->setCatmat($camposProduto[2]);
      $produtos[$i]->setQuantidade($camposProduto[3]);
      $produtos[$i]->setEstoqueIdeal($camposProduto[4]);
      $produtos[$i]->setPosicao($camposProduto[5]);
      $produtos[$i]->getCategoria()->setNome($camposProduto[6]);
      $produtos[$i]->setDescricao($camposProduto[7]);
    }
    
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
    echo "cadastrado";
    $_SESSION['msg'] = "<p> Todos os produtos foram cadastrados com sucesso</p>";
  }
  //header("Location: importar-produtos.php");

  function ehNumerico($campo): bool{

    return is_numeric($campo);
  }

?>
