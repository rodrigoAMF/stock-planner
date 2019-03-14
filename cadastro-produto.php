<?php
    require_once("funcoes.php");

    incluiCabecalho("Stock Planner - Cadastro de produtos", "cadastro-produto");
?>

<div class="container">
    <!-- Criar as linhas e colunas de acordo com necessidade -->
    
    <div id="principal">

    	<div class="form-row">
    		<div class="form-group col-md-5">
      			<label for="formGroupExampleInput">Nome:</label>
	    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
    		</div>

    		<div class="form-group col-md-1">
      			
    		</div>

    		<div class="form-group col-md-5">
      			<label for="formGroupExampleInput">Palavra-chave:</label>
	    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
    		</div>
  		</div>


    	<div class="row">
    		<br>
    	</div>

    	<div class="form-row">
    		<div class="form-group col-md-5">
      			<label for="formGroupExampleInput">Código:</label>
	    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
    		</div>

    		<div class="form-group col-md-1">
      			
    		</div>

    		<div class="form-group col-md-5">
      			<label for="formGroupExampleInput">CATMAT:</label>
	    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
    		</div>
  		</div>


    	<div class="row">
    		<br>
    	</div>

    	<div class="form-row">
    		<div class="form-group col-md-5">
      			<label for="formGroupExampleInput">Quantidade:</label>
	    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
    		</div>

    		<div class="form-group col-md-1">
      			
    		</div>

    		<div class="form-group col-md-5">
      			<label for="formGroupExampleInput">Estoque ideal:</label>
	    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
    		</div>
  		</div>


    	<div class="row">
    		<br>
    	</div>

    	<div class="form-row">
    		<div class="form-group col-md-5">
      			<label for="formGroupExampleInput">Localização:</label>
	    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
    		</div>

    		<div class="form-group col-md-1">
      			
    		</div>

    		<div class="form-group col-md-5">
      			<label for="formGroupExampleInput">Categoria:</label>
	    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
    		</div>
  		</div>

    	<div class="row">
    		<br>
    	</div>

    	<div class="row">
	    	<div class="col-xl-11">
	    		<label for="validationTextarea">Descrição:</label>
    			<textarea class="form-control" id="validationTextarea" placeholder="" required></textarea>
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
	    		<button type="button" class="btn btn-secondary">Salvar</button>
	    	</div>
	    	<div class="col-xl-1">
	    		
	    	</div>
    	</div>

	</div>
</div>

<?php
    require_once(FOOTER_TEMPLATE);
?>
