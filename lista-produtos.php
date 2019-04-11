<?php
    require_once("model/Config.php");
    require_once("model/Pagina.php");
    require_once("controller/ProdutoController.php");
    $pagina = new Pagina();

    $pagina->incluiCabecalho("Stock Planner - Cadastro de produtos", "lista-produtos");
?>

<div class="container">
    <!--<select class="custom-select custom-select-sm">
        <option value="20">20%</option>
        <option value="50">50%</option>
        <option value="80">80%</option>
    </select>
    <button type="button" class="btn btn-secondary" id="confirma_porcentagem">Confirmar</button>-->

    <div class="form-group">
        <label for="parametroFiltro">Filtro</label>
        <select class="form-control" id="parametroFiltro" name="filtro">
              <option value="1">Nome</option>
              <option value="2">Identificação</option>
              <option value="3">CATMAT</option>
              <option value="4">Categoria</option>
              <option value="5">Posição</option>
              <option value="6">Estoque Ideal</option>
              <option value="7">Quantidade</option>
        </select>
   </div>

    <div class="form-group">
        <label for="busca">Busca</label>
        <input name="busca" type="text" class="form-control" id="busca" aria-describedby="emailHelp" placeholder="Busca">
    </div>

    <div class="table-responsive-md">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th class="ordenavel"></th>
                    <th class="ordenavel">Nome</th>
                    <th>Identificação</th>
                    <th>CATMAT</th>
                    <th>Categoria</th>
                    <th>Posição</th>
                    <th>Estoque Ideal</th>
                    <th class="ordenavel">Quantidade</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

        <?php
            $produtoController = ProdutoController::getInstance();
            $produtos = $produtoController->getProdutos(null,null, 8);

            echo $produtos;
        ?>

            </tbody>
        </table>
    </div>
</div>

<?php
    require_once(Config::FOOTER_TEMPLATE);
?>
