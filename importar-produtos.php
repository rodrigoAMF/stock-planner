<?php
    //session_start();
    require_once("funcoes.php");
    require_once(DBAPI);

    incluiCabecalho("Stock Planner - Cadastro de produtos", "importar-produtos");
?>

<div class="container">
  <div id="principal">
    <form method="post" action="processa-arquivo.php" enctype="multipart/form-data" class="was-validated">
      <div class="row">
        <div class="col-xl-12 col-md-8 col-sm-6 col-5 col-lg-5">
            <div class="custom-file" class="caixaImportar">

              <label class="custom-file-label" for="validatedCustomFile"><span id="label-nomeArquivo">Nenhum arquivo selecionado</span></label>
              <input type='file' class="custom-file-input" id="file" name="arquivo" accept=".txt"  required>
            </div>
            <div id="botaoImportar">
              <input class="btn btn-primary" type="submit" value="Importar">
            </div>
        </div>
      </div>
    </form>
    <!-- <?php
    if (isset($_SESSION['msg'])) {
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }

    ?> -->
  </div>
</div>

<?php
    require_once(FOOTER_TEMPLATE);
?>
