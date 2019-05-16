<?php
    require_once("model/Config.php");
    require_once("model/Pagina.php");
    require_once("controller/ProdutoController.php");
    require_once("controller/SemestreController.php");
    $pagina = new Pagina();

    $pagina->incluiCabecalho("Stock Planner - Cadastro de produtos", "lista-produtos");
    $semestreController = SemestreController::getInstance();
?>

<div class="container">
    <!--<select class="custom-select custom-select-sm">
        <option value="20">20%</option>
        <option value="50">50%</option>
        <option value="80">80%</option>
    </select>
    <button type="button" class="btn btn-secondary" id="confirma_porcentagem">Confirmar</button>-->

  <div class="form-row">
    <div class="form-group col-md-5 col-xl-5 col-sm-10 col-10 col-lg-5">
        <label for="semestre">O produto será cadastrado no</label>
        <?php
            echo $semestreController->getSemestreAtual();
         ?>
    </div>
  </div>

   <div class="form-group">
       <label for="parametroFiltro">Filtro</label>
       <select class="form-control" id="parametroFiltro" name="filtro">
             <option value="1">Nome</option>
             <option value="3">CATMAT</option>
             <option value="7">Quantidade</option>
       </select>
  </div>

    <div class="form-group">
        <label for="busca">Busca</label>
        <input name="busca" type="text" class="form-control" id="busca" aria-describedby="emailHelp" placeholder="Busca">
    </div>
        <!--<div class="col-md-8 col-xl-12 col-sm-2 col-2 col-lg-12">-->
        <div class="col-sm-12">
          <table class="table table-borderless table-responsive-md">
              <thead>
                  <tr>
                      <th class="ordenavel sticky">Nome<img src="img/setaBaixo.png" id="setaNome" ></th>
                      <th class="sticky">CATMAT</th>
                      <th class="ordenavel sticky">Quantidade<img src="img/setaBaixo.png" id="setaQuantidade" ></th>
                      <th class="sticky"></th>
                      <th class="sticky"></th>
                  </tr>
              </thead>
              <tbody>

              <?php
                  $produtoController = ProdutoController::getInstance();
                  $produtos = $produtoController->getProdutosCadastrados(null,null, 8, null);

                  echo $produtos;
              ?>

                  </tbody>
              </table>
        </div>
</div>

<?php
    require_once(Config::FOOTER_TEMPLATE);
?>
