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
        <label >O produto será cadastrado no</label>
        <span id="parametroSemestre">
            <?php
                if($semestreController->getSemestreAtual()['status'] == 200){
                    echo $semestreController->getSemestreAtual()['dados']->getId();
                }else{
                    echo "Erro ao buscar o semestre atual";
                }
            ?>
        </span>
    </div>
  </div>

   <!-- <div class="form-group">
       <label for="parametroFiltro">Filtro</label>
       <select class="form-control" id="parametroFiltro" name="filtro">
             <option value="1">Nome</option>             
       </select>
  </div> -->

    <div class="form-group">
        <label for="busca">Busca</label>
        <input name="busca" type="text" class="form-control" id="busca" aria-describedby="emailHelp" placeholder="Busca">
    </div>
        <div class="col-sm-12">
          <table class="table table-borderless table-responsive-md" id="tabelaEditavel">
              <thead>
                  <tr>
                      <th class="ordenavel sticky">Nome<img src="img/setaBaixo.png" id="setaNome" ></th>
                      <th class="sticky">CATMAT</th>
                      <th class="sticky">Quantidade</th>
                      <th class="sticky"></th>
                  </tr>
              </thead>
              <tbody>
              <?php
                  $produtoController = ProdutoController::getInstance();
                  $produtos = $produtoController->getProdutosNaoCadastradosNoSemestreAtual(null);
                  if($produtos['status'] == 200){
                    echo $produtoController->geraDadosParaTabelaProdutosNaoCadastradosNoSemestreAtual($produtos['dados']);
                  } 
              ?>
              </tbody>
              </table>
        </div>
</div>

<?php
    require_once(Config::FOOTER_TEMPLATE);
?>
