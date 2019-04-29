<?php
    session_start();
    require_once("model/Config.php");
    require_once("model/Pagina.php");
    $pagina = new Pagina();

    $pagina->incluiCabecalho("Stock Planner - Cadastro de produtos", "importar-produtos");
?>

<div class="container">
  <div id="principal">
      <div class="row">
          <div class="col-md-12">
              <h4><strong> ATENÇÃO! </strong></h4>
              <p>
                  Os produtos do arquivo devem estar na seguinte ordem e separados por TABULAÇÃO:<br>
                  <i>Nome, identificação, catmat, quantidade, estoqueIdeal, posição, categoria e descrição.</i>
              </p>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <form method="post" action="processa-arquivo.php" enctype="multipart/form-data" class="was-validated">
                  <div class="form-group">
                      <label class="custom-file-label" for="validatedCustomFile"><span id="label-nomeArquivo">Nenhum arquivo selecionado</span></label>
                      <input type='file' class="custom-file-input form-control-file" id="file" name="arquivo" accept=".txt"  required>
                  </div>
                  <div class="form-group">
                      <div class="centraliza">
                          <input class="btn btn-primary botaoImportar" type="submit" value="Importar Produtos">
                      </div>
                  </div>
              </form>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <?php
                  if (isset($_SESSION['msg'])) {
                      echo $_SESSION['msg'];
                      unset($_SESSION['msg']);
                  }
              ?>
          </div>
      </div>
    </div>
</div>

<?php
    require_once(Config::FOOTER_TEMPLATE);
?>
