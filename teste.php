<?php
/*require_once("controller/CategoriaController.php");
require_once("controller/ProdutoController.php");
*/
require_once("model/Usuario.php");
require_once("controller/UsuarioController.php");

$usuario = new Usuario();

$email = "rodrigoamf@outlook.com";
$senha = MD5("123");

$usuarioController = UsuarioController::getInstance();

$loginSucesso = $usuarioController->verificarLogin($email, $senha);

echo "{$email} {$senha}<br>";
echo $loginSucesso;


// $erros[0]['nome_do_campo'] = 'nome';
// $erros[0]['mensagem'] = 'Nome muito grande';
// $erros[5]['nome_do_campo'] = 'quantidade';
// $erros[5]['mensagem'] = 'Quantidade nao pode ser negativa';

// $arr = array('status' => 'Ok', 'erros' => $erros);

// echo json_encode($arr);

    //echo (trim(' ') == null) ? 'sim': 'nao';
    /*$categoriaController = CategoriaController::getInstance();

    echo $categoriaController->verificaSeCategoriaExistePorNome("abelha");*/

    

    /*require_once("model/Produto.php");
    require_once("model/Categoria.php");
    require_once("controller/ProdutoController.php");

    $produto = new Produto();
    $categoria = new Categoria();

    $categoria->setNome("resistor");

    $produto->setNome("hhgfgha");
    $produto->setCategoria($categoria);
    $produto->setCatmat("23");
    $produto->setDescricao("gaga");
    $produto->setEstoqueIdeal("45");
    $produto->setIdentificacao("11");
    $produto->setPosicao("55");
    $produto->setQuantidade("55");

    $produtoController = ProdutoController::getInstance();

    $produtoController->cadastraProduto($produto, "2S2019");

    $produtoController->verificaSeProdutoExiste($produto->getNome());*/
?>