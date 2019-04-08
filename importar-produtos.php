<?php
    require_once("funcoes.php");
    require_once(DBAPI);

    incluiCabecalho("Stock Planner - Cadastro de produtos", "importar-produtos");
?>

<div class="container">
  <div id="principal">
    <form method="post" action="processa-arquivo.php" enctype="multipart/form-data">
      <div class="caminho">
       <p>Nenhum arquivo selecionado</p>
     </div>
      <div>
        <label for='selecao-arquivo'>Selecionar arquivo</label>
        <input type='file' id='selecao-arquivo' name="arquivo" accept=".txt">
      </div>

      <div>
        <input type="submit" value="Importar">
        <!-- <button>Upload</button> -->
      </div>
    </form>
  </div>
</div>

<?php
    require_once(FOOTER_TEMPLATE);
?>
