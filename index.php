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
				<div class="col-xl-3 posicao-elemento">
					<img src="img/cadastrar1.png">
					<br>
					<a href="cadastro-produto.php">Cadastrar</a>
				</div>
				<div class="col-xl-3 posicao-elemento">
					<img src="img/editar.png">
					<br>
					<a href="">Editar</a>
				</div>
				<div class="col-xl-3 posicao-elemento">
					<img src="img/listar.png">
					<br>
					<a href="">Listar</a>
				</div>
				<div class="col-xl-3 posicao-elemento">
					<img src="img/excluir.png">
					<br>
					<a href="">Excluir</a>
				</div>
			</div>
			
		</div>

		<br>

		<div>
		<nav class="navbar navbar-expand-lg">
			<div class="fonte-barra">
				Sites
			</div>
		</nav>
		<div  class="container-produto">
			<div class="row">
				<div class="col-xl-3 posicao-elemento">
					<img src="img/cadastrar1.png">
					<br>
					<a href="">Cadastrar</a>
				</div>
				<div class="col-xl-3 posicao-elemento">
					<img src="img/editar.png">
					<br>
					<a href="">Editar</a>
				</div>
				<div class="col-xl-3 posicao-elemento">
					<img src="img/listar.png">
					<br>
					<a href="">Listar</a>
				</div>
				<div class="col-xl-3 posicao-elemento">
					<img src="img/excluir.png">
					<br>
					<a href="">Excluir</a>
				</div>
			</div>
			
		</div>
	</div>
</div>
</div> 

<?php
    require_once(FOOTER_TEMPLATE);
?>
