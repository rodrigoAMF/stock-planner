<?php
    require_once("funcoes.php");

    incluiCabecalho("Stock Planner - Home", "pagina-inicial");
?>
<div class="container conteudo-principal">
	<div>
		<nav class="navbar navbar-expand-lg">
			<div class="fonte-barra">
				Produtos
			</div>
		</nav>
		<div  class="container-produto">
			<div class="row">
				<div class="col-xl-3 col-md-3 col-sm-3 col-3 col-lg-3 posicao-elemento">
            <button>
              <a href="cadastro-produto.php">
    					<img src="img/cadastrar1.png">
    					<br>
              <div class="textosBotao">
                Cadastrar
              </div>
              </a>
            </button>

				</div>
        <div class="col-xl-3 col-md-3 col-sm-3 col-3 col-lg-3 posicao-elemento">
          <a href="lista-produtos.php">
            <button>
    					<img src="img/listar.png">
    					<br>
              <div class="textosBotao">
                Listar
              </div>
            </button>
          </a>
				</div>
			</div>
		</div>
		<br>
</div>
</div>

<?php
    require_once(FOOTER_TEMPLATE);
?>
