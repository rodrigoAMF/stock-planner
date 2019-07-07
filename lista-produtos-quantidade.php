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
      <label for="parametroSemestre">Semestre</label>
      <select class="form-control" id="parametroSemestre" name="semestre">
        <?php
            $semestres = $semestreController->getSemestres();
            $semestres= $semestres['dados'];
            $semestres = array_reverse($semestres);

            foreach ($semestres as $semestre) {
                echo "<option value = '" . $semestre->getId()."'>" . $semestre->getId(). "</option>";
            }
        ?>
      </select>
  </div>

    <div class="form-group"> 
        <label for="busca">Busca por Nome</label>
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
                    <th class="ordenavel sticky">Nome<img src="img/setaBaixo.png" id="setaNome" ></th>
                    <?php
                      $semestres = $semestreController->getSemestres();
                      $semestres= $semestres['dados'];
                      $semestres = array_reverse($semestres);
                      for($i = sizeof($semestres)-1; $i >= 0; $i--)
                      {
                        echo '<th class="sticky semestres" id="borda">';
                        echo $semestres[$i]->getId();  
                        echo '</th>';
                      }
                    ?>
                  </tr>
              </thead>
              <tbody>

                <?php
                    $filtroSemestre = Array();
                    $produtoController = ProdutoController::getInstance();
                    $semestres = $semestreController->getSemestres();
                    $semestres= $semestres['dados'];
                    
                    for ($i=0; $i < sizeof($semestres); $i++)
                    { 
                        if($semestres[$i]->getId() != $semestres[sizeof($semestres)-1]->getId())
                        {
                            array_push($filtroSemestre, $semestres[$i]->getId());
                        }
                        else
                        {
                            array_push($filtroSemestre, $semestres[$i]->getId());
                            break;
                        }
                    }
                    $quantidadeSemestre = (sizeof($filtroSemestre) - 1);
                    if($quantidadeSemestre >= 4)
                    {
                        $quantidadeSemestre = 3;
                    }
                    $semestres = array_reverse($semestres);
                    
                    $produtos = $produtoController->getProdutosCadastradosQuantidade(null,null,8, $semestres[0]->getId(),$quantidadeSemestre,$filtroSemestre);
                    //print_r($produtos);
                     echo $produtos;
                ?>

              </tbody>
            </table>
        </div>
</div>

<?php
    require_once(Config::FOOTER_TEMPLATE);
?>
