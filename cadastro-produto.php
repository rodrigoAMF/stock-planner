<?php
    require_once("funcoes.php");

    incluiCabecalho("Stock Planner - Cadastro de produtos", "cadastro-produto");
?>

<div class="container">
    <!-- Criar as linhas e colunas de acordo com necessidade -->

    <div id="principal">
        <form class="formulario-produto" method="post" action="processa-produto.php">
        	<div class="form-row">
        		<div class="form-group col-md-5">
          			<label for="formGroupExampleInput">Nome:</label>
            		<input type="text" class="form-control" name="nome" id="formGroupExampleInput" placeholder="">
        		</div>

        		<div class="form-group col-md-1">

        		</div>

        		<!--<div class="form-group col-md-5">
          			<label for="formGroupExampleInput">Palavra-chave:</label>
            		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
        		</div>-->
        		</div>


        	<div class="row">
        		<br>
        	</div>

        	<div class="form-row">
        		<div class="form-group col-md-5">
          			<label for="formGroupExampleInput">Identificação:</label>
            		<input type="text" class="form-control" name="identificacao" id="formGroupExampleInput" placeholder="">
        		</div>

        		<div class="form-group col-md-1">

        		</div>

        		<div class="form-group col-md-5">
          			<label for="formGroupExampleInput">CATMAT:</label>
            		<input type="text" class="form-control" name="catmat" id="formGroupExampleInput" placeholder="">
        		</div>
        		</div>


        	<div class="row">
        		<br>
        	</div>

        	<div class="form-row">
        		<div class="form-group col-md-5">
          			<label for="formGroupExampleInput">Quantidade:</label>
            		<input type="text" class="form-control" name="quantidade" id="formGroupExampleInput" placeholder="">
        		</div>

        		<div class="form-group col-md-1">

        		</div>

        		<div class="form-group col-md-5">
          			<label for="formGroupExampleInput">Estoque ideal:</label>
            		<input type="text" class="form-control" name="estoqueIdeal" id="formGroupExampleInput" placeholder="">
        		</div>
        		</div>


        	<div class="row">
        		<br>
        	</div>

        	<div class="form-row">
        		<div class="form-group col-md-5">
          			<label for="formGroupExampleInput">Localização:</label>
            		<input type="text" class="form-control" name="localizacao" id="formGroupExampleInput" placeholder="">
        		</div>

        		<div class="form-group col-md-1">

        		</div>

        		<div class="form-group col-md-5">
          			<label for="formGroupExampleInput">Categoria:</label>
            		<input type="text" class="form-control" name="categoria" id="formGroupExampleInput" placeholder="">
        		</div>
        		</div>

        	<div class="row">
        		<br>
        	</div>

        	<div class="row">
            	<div class="col-xl-11">
            		<label for="validationTextarea">Descrição:</label>
        			<textarea class="form-control" name="descricao" id="validationTextarea" placeholder="" required></textarea>
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
            		<input class="btn btn-primary" type="submit" value="Salvar">
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
