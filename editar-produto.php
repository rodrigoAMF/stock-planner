<?php
    require_once("funcoes.php");
    require_once("inc/database.php");

    incluiCabecalho("Stock Planner - Editar Produtos", "editar-produto");

    $id = $_GET['id'];

    $produto = getProdutoPorId($id);
?>

<div class="container">
    <!-- Criar as linhas e colunas de acordo com necessidade -->

    <div id="principal">
        <form class="formulario-produto" method="post" action="processa-produto-editar.php?id=<?= $id; ?>">

        	<div class="form-row">
        		<div class="form-group col-md-5">
          			<label for="formGroupExampleInput">Nome:</label>
            		<input type="text" class="form-control" name="nome" value="<?= $produto['nome']; ?>" id="formGroupExampleInput" placeholder="">
        		</div>

        		<div class="form-group col-md-1">
        		</div>
        	</div>
        	<div class="row">
        		<br>
        	</div>

        	<div class="form-row">
        		<div class="form-group col-md-5">
          			<label for="formGroupExampleInput">Identificação:</label>
            		<input type="text" class="form-control" name="identificacao" value="<?= $produto['identificacao']; ?>" id="formGroupExampleInput" placeholder="">
        		</div>

        		<div class="form-group col-md-1">

        		</div>

        		<div class="form-group col-md-5">
          			<label for="formGroupExampleInput">CATMAT:</label>
            		<input type="text" class="form-control" name="catmat" value="<?= $produto['catmat']; ?>" id="formGroupExampleInput" placeholder="">
        		</div>
        		</div>


        	<div class="row">
        		<br>
        	</div>

        	<div class="form-row">
        		<div class="form-group col-md-5">
          			<label for="formGroupExampleInput">Quantidade:</label>
            		<input type="text" class="form-control" name="quantidade" value="<?= $produto['quantidade']; ?>" id="formGroupExampleInput" placeholder="">
        		</div>

        		<div class="form-group col-md-1">

        		</div>

        		<div class="form-group col-md-5">
          			<label for="formGroupExampleInput">Estoque ideal:</label>
            		<input type="text" class="form-control" name="estoqueIdeal" value="<?= $produto['estoque_ideal']; ?>" id="formGroupExampleInput" placeholder="">
        		</div>
        		</div>


        	<div class="row">
        		<br>
        	</div>

        	<div class="form-row">
        		<div class="form-group col-md-5">
          			<label for="formGroupExampleInput">Localização:</label>
            		<input type="text" class="form-control" name="localizacao" value="<?= $produto['posicao']; ?>" id="formGroupExampleInput" placeholder="">
        		</div>

        		<div class="form-group col-md-1">

        		</div>

        		<div class="form-group col-md-5">
          			<label for="formGroupExampleInput">Categoria:</label>
            		<input type="text" class="form-control" name="categoria" value="<?= $produto['categoria']; ?>" id="formGroupExampleInput" placeholder="">
        		</div>
        		</div>

        	<div class="row">
        		<br>
        	</div>

        	<div class="row">
            	<div class="col-xl-11">
            		<label for="validationTextarea">Descrição:</label>
        			<textarea class="form-control" name="descricao"  id="validationTextarea" placeholder="<?= $produto['descricao']; ?>" required></textarea>
            	</div>
            	<div class="col-xl-1">

            	</div>
        	</div>

        	<div class="row">
        		<br>
        	</div>

        	<div class="row">
        		<div class="col-xl-10">

            	</div>
            	<div class="col-xl-1">
            		<input class="btn btn-primary" type="submit" value="Editar">
            	</div>
            	<div class="col-xl-1">

            	</div>
        	</div>
        </form>
	</div>
</div>

<?php
    require_once(FOOTER_TEMPLATE);
?>
