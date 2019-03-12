<?php
    require_once("funcoes.php");

    incluiCabecalho("Stock Planner - Cadastro de produtos", "cadastro-produto");
?>
<div class="container">
    <!-- Criar as linhas e colunas de acordo com necessidade -->
    <div id="cabecalho">
    	<div id="logo">
    		<img src="img/logo1.png" width="300px" height="130px">
    	</div>
    </div>
    <div id="principal">

    	<div class="row">
	    	<div class="col-xl-8">
	    		<label for="formGroupExampleInput">Nome:</label>
	    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nome">
	    	</div>
	    	<div class="col-xl-4">
	    		
	    	</div>
    	</div>

    	<div class="row">
    		<br>
    	</div>

    	<div class="row">
	    	<div class="col-xl-8">
	    		<label for="formGroupExampleInput">Palavra-chave:</label>
	    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Palavra-chave">
	    	</div>
	    	<div class="col-xl-4">
	    		
	    	</div>
    	</div>

    	<div class="row">
    		<br>
    	</div>

    	<div class="row">
	    	<div class="col-xl-8">
	    		<label for="formGroupExampleInput">Código:</label>
	    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Código">
	    	</div>
	    	<div class="col-xl-4">
	    		
	    	</div>
    	</div>

    	<div class="row">
    		<br>
    	</div>

    	<div class="row">
	    	<div class="col-xl-8">
	    		<label for="formGroupExampleInput">CATMAT:</label>
	    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="CATMAT">
	    	</div>
	    	<div class="col-xl-4">
	    		
	    	</div>
    	</div>

    	<div class="row">
    		<br>
    	</div>

    	<div class="row">
	    	<div class="col-xl-8">
	    		<label for="formGroupExampleInput">Quantidade:</label>
	    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Quantidade">
	    	</div>
	    	<div class="col-xl-4">
	    		
	    	</div>
    	</div>

    	<div class="row">
    		<br>
    	</div>

    	<div class="row">
	    	<div class="col-xl-8">
	    		<label for="formGroupExampleInput">Estoque ideal:</label>
	    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Estoque ideal">
	    	</div>
	    	<div class="col-xl-4">
	    		
	    	</div>
    	</div>

    	<div class="row">
    		<br>
    	</div>

    	<div class="row">
	    	<div class="col-xl-8">
	    		<label for="formGroupExampleInput">Localização:</label>
	    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Localização">
	    	</div>
	    	<div class="col-xl-4">
	    		
	    	</div>
    	</div>

    	<div class="row">
    		<br>
    	</div>

    	<div class="row">
	    	<div class="col-xl-8">
	    		<label for="formGroupExampleInput">Categoria:</label>
	    		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="Categoria">
	    	</div>
	    	<div class="col-xl-4">
	    		
	    	</div>
    	</div>

    	<div class="row">
    		<br>
    	</div>

    	<div class="row">
	    	<div class="col-xl-8">
	    		<label for="validationTextarea">Descrição:</label>
    			<textarea class="form-control" id="validationTextarea" placeholder="Descrição" required></textarea>

	    	</div>
	    	<div class="col-xl-4">
	    		
	    	</div>
    	</div>
    </div>

    <div id="rodape">
    	<br>
    </div>
    
</div>

<?php
    require_once(FOOTER_TEMPLATE);
?>
