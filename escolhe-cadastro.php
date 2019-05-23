<?php
session_start();
require_once("model/Config.php");
require_once("model/Pagina.php");
$pagina = new Pagina();

$pagina->incluiCabecalho("Stock Planner - Cadastro de produtos", "escolhe-cadastro");
?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="btn-grande">
                    <a href="cadastro-produto.php">Cadastrar Novo Produto</a>
                </div>

            </div>
            <div class="col-md-6">
                <div class="btn-grande">
                    <a href="cadastro-quantidade-catmat.php">Cadastrar CATMAT e Quantidade de Produto já cadastrado</a>    
                </div>
            </div>
        </div>
    </div>

<?php
require_once(Config::FOOTER_TEMPLATE);
?>
