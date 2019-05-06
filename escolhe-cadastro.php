<?php
session_start();
require_once("model/Config.php");
require_once("model/Pagina.php");
$pagina = new Pagina();

$pagina->incluiCabecalho("Stock Planner - Cadastro de produtos", "importar-produtos");
?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="btn-grande">
                    Cadastrar Novo Produto
                </div>

            </div>
            <div class="col-md-6">
                <div class="btn-grande">
                    Cadastrar CATMAT e Quantidade de Produto já cadastrado
                </div>
            </div>
        </div>
    </div>

<?php
require_once(Config::FOOTER_TEMPLATE);
?>
