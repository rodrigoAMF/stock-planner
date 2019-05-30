<?php
session_start();
require_once("model/Config.php");
require_once("model/Pagina.php");
$pagina = new Pagina();

$pagina->incluiCabecalho("Stock Planner - Listar Produtos", "escolhe-cadastro");
?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="lista-produtos.php" class="btn-grande">Listagem semestral</a>
            </div>
            <div class="col-md-6">
                <a href="lista-produtos-quantidade.php" class="btn-grande">Histórico de consumo</a>   
            </div>
        </div>
    </div>

<?php
require_once(Config::FOOTER_TEMPLATE);
?>
