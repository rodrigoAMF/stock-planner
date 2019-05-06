<?php
session_start();
require_once("model/Produto.php");
require_once("controller/ProdutoController.php");
require_once("controller/CategoriaController.php");
require_once("controller/SemestreController.php");


$arquivo_temp = $_FILES['arquivo']['tmp_name'];
$dadosLidos = file($arquivo_temp);
$cont = 0;
$erro = false;

$produtos = Array();

for($i = 0; $i < sizeof($dadosLidos) && !$erro; $i++)
{
    // ignora a primeira linha (Cabeçalho)
    if($i == 0) continue;
    $mensagemErro = "";
    $produtos[$i] = new Produto();

    $existeCategoria = false;
    $dadosLidos[$i] = trim($dadosLidos[$i]);
    $camposProduto = explode("\t", $dadosLidos[$i]);

    // Verifica se usuário informou os 8 campos obrigatórios
    if (sizeof($camposProduto)<8) {
        $mensagemErro = "Existe algum campo não preenchido na linha " . strval($i);
        $erro = true;
    }

    foreach($camposProduto as $campo){
        if($campo == ""){
            $mensagemErro = "Campo com valor vazio na linha " . strval($i);
            $erro = true;
        }
    }

    $categoriaController = CategoriaController::getInstance();
    $categorias = $categoriaController->getCategorias();

    // Verifica se já existe uma categoria com o nome atual
    for ($j=0; $j < sizeof($categorias); $j++) {

        if ($categorias[$j]['nome'] == $camposProduto[6]) {
            $existeCategoria = true;
            break;
        }
    }
    // Se não existir categoria, cria uma
    if (!$existeCategoria) {
        $categoria = new Categoria();
        $categoria->setNomeNovo($camposProduto[6]);
        $categoriaController->cadastraCategoria($categoria);
    }

    if (strlen($camposProduto[0]) > 100 &&!erro) {
        $mensagemErro = "Erro na linha " . strval($i) . ". O campo 'Nome' suporta no máximo 100 caracteres";
        $erro = true;
    }

    // Verifica se os campos são numéricos
    if (!is_numeric($camposProduto[2]) &&!erro) {
        $mensagemErro = "Erro na linha " . strval($i) . ". O campo 'Catmat' deve ser numérico";
        $erro = true;
    }

    if(strlen($camposProduto[2]) > 6 &&!erro){
        $mensagemErro = "Erro na linha " . strval($i) . ". O campo 'Catmat' deve ter no máximo 6 digitos";
        $erro = true;
    }

    if (!is_numeric($camposProduto[3]) &&!erro){
        $mensagemErro = "Erro na linha " . strval($i) . ". O campo 'Quantidade' deve ser numérico";
        $erro = true;
    }

    if(strlen($camposProduto[3]) > 6 &&!erro){
        $mensagemErro = "Erro na linha " . strval($i) . ". O campo 'Quantidade' deve ter no máximo 6 digitos";
        $erro = true;
    }

    if (!is_numeric($camposProduto[4]) &&!erro){
        $mensagemErro = "Erro na linha " . strval($i) . ". O campo 'Estoque Ideal' deve ser numérico";
        $erro = true;
    }

    if (strlen($camposProduto[5]) > 3 &&!erro) {
        $mensagemErro = "Erro na linha " . strval($i) . ". O campo posição suporta apenas 3 caracteres";
        $erro = true;
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

// Se não existe nenhum erro no arquivo
if (!$erro) {
    // Cadastra todos os produtos
    $produtoDuplicado = "";
    $linhaDuplicado = 1;
    foreach ($produtos as $produto) {
        $produtoController = ProdutoController::getInstance();
        $semestreController = new SemestreController();
        $resultadoCadastro = $produtoController->cadastraProduto($produto, $semestreController->getSemestreAtual());
        if($resultadoCadastro == -1){
            $erro = true;
            $produtoDuplicado = $produto->getNome();
            break;
        }
        $linhaDuplicado++;
    }
    if(!$erro){
        $_SESSION['msg'] = "<p> Produtos foram cadastrados com sucesso</p>";
    }else{
        $_SESSION['msg'] = "<p> Produto '" . $produtoDuplicado . "' duplicado na linha " . $linhaDuplicado . "</p>";
    }

}else {
    // significa que tem erro
    $_SESSION['msg'] = "<p>" .$mensagemErro . "</p>";
}
header("Location: importar-produtos.php");

?>
