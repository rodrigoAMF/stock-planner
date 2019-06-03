<?php
    require_once("model/Config.php");
    require_once("model/Pagina.php");
    require_once("model/Semestre.php");
    require_once("controller/ProdutoController.php");
    require_once("controller/SemestreController.php");
    $pagina = new Pagina();

    $pagina->incluiCabecalho("Stock Planner - Cadastro de produtos", "lista-produtos-quantidade");
    $semestreController = SemestreController::getInstance();
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
             <option value="7">Quantidade</option>
       </select>
  </div>

    <div class="form-group"> 
        <label for="busca">Busca</label>
        <input name="busca" type="text" class="form-control" id="busca" aria-describedby="emailHelp" placeholder="Busca">
    </div>
        <!--<div class="col-md-8 col-xl-12 col-sm-2 col-2 col-lg-12">-->
        <div cla ss="col-sm-12">
          <table id="teste" class="table table-borderless table-responsive-md">
              <thead>
                  <tr>
                    <th></th>
                    <th colspan="4">Quantidade</th>
                  </tr>
                  <tr>
                    <th class="ordenavel sticky">Nome<img src="img/setaBaixo.png" id="setaNome"></th>
                    <th class="ordenavel sticky" id="borda">
                       <?php
                          $semestres = $semestreController->getSemestres();
                          $semestres = array_reverse($semestres);
                              echo $semestres[0]->getId();     
                      ?>
                      <img src="img/setaBaixo.png" id="setaQuantidade">
                    </th>
                    <th class="ordenavel sticky" id="borda">
                      <?php
                          $semestres = $semestreController->getSemestres();
                          $semestres = array_reverse($semestres);
                              echo $semestres[1]->getId();     
                      ?>
                      <img src="img/setaBaixo.png" id="setaQuantidade">
                    </th>
                    <th class="ordenavel sticky" id="borda">
                      <?php
                          $semestres = $semestreController->getSemestres();
                          $semestres = array_reverse($semestres);
                              echo $semestres[2]->getId();     
                      ?>
                      <img src="img/setaBaixo.png" id="setaQuantidade">
                    </th>
                    <th class="ordenavel sticky" id="borda">
                      <?php
                          $semestres = $semestreController->getSemestres();
                          $semestres = array_reverse($semestres);
                              echo $semestres[3]->getId();     
                      ?>
                      <img src="img/setaBaixo.png" id="setaQuantidade">
                    </th>
                  </tr>
              </thead>
              <tbody>

              <?php
                  $produtoController = ProdutoController::getInstance();

                  $produtos = $produtoController->getProdutosCadastradosQuantidade(null,null,8);

                  echo $produtos;
              ?>

                  </tbody>
              </table>
        </div>
</div>

<?php
    require_once(Config::FOOTER_TEMPLATE);
?>
