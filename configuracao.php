<?php
    require_once("model/Config.php");
    require_once("model/Pagina.php");
    require_once("controller/SemestreController.php");

    $pagina = new Pagina();
    $semestreController = new SemestreController();

    $pagina->incluiCabecalho("Stock Planner - Configuracao", "configuracao");
?>
<div class="container">
  <div id="principal">
    <div class="row">
        <div class="col-md-5 col-xl-5 col-sm-10 col-10 col-lg-5">
            <label for="semestre">Semestre atual:</label>
            <span id="id-semestre">
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
    <div class="row">
    	<div class="col-xl-12" id="cor-botao">
    		<button type="button" class="btn btn-primary" id="finalizar-semestre">Finalizar semestre atual</button>
    	</div>    	
    </div>

    </div>
</div>

<?php
    require_once(Config::FOOTER_TEMPLATE);
?>
