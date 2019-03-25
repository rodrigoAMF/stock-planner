<?php
    require_once("funcoes.php");
    require_once(DBAPI);

    incluiCabecalho("Stock Planner - Cadastro de produtos", "cadastro-produto");
?>

<div class="container">
    <!-- Criar as linhas e colunas de acordo com necessidade -->

    <div id="principal">
        <form class="formulario-produto" method="post" action="processa-produto.php">
        	<div class="form-row">
        		<div class="form-group col-md-5">
          			<label for="nome">Nome:</label>
            		<input type="text" class="form-control" name="nome" id="nome" placeholder="">
                    <div class="feedback" id="feedback-nome">

                    </div>
        		</div>

        		<div class="form-group col-md-1"></div>

                <div class="form-group col-md-5">
                    <label for="catmat">CATMAT:</label>
                    <input type="text" class="form-control" name="catmat" id="catmat" placeholder="">
                    <div class="feedback" id="feedback-catmat">

                    </div>
                </div>
        	</div>

        	<div class="form-row">
        		<div class="form-group col-md-5">
          			<label for="identificacao">Identificação:</label>
            		<input type="text" class="form-control" name="identificacao" id="identificacao" placeholder="">
                    <div class="feedback" id="feedback-identificacao">

                    </div>
        		</div>

        		<div class="form-group col-md-1"></div>

                <div class="form-group col-md-5">
                    <label for="localizacao">Localização:</label>
                    <input type="text" class="form-control" name="localizacao" id="localizacao" placeholder="">
                    <div class="feedback" id="feedback-localizacao">

                    </div>
                </div>

        	</div>

        	<div class="form-row">
        		<div class="form-group col-md-5">
                    <label for="descricao">Descrição:</label>
                    <textarea class="form-control" name="descricao" id="descricao" placeholder="" ></textarea>
                    <div class="feedback" id="feedback-descricao">
                        okay!
                    </div>

        		</div>

        		<div class="form-group col-md-1"></div>

        		<div class="form-group col-md-5">
                    <label for="estoque_ideal">Estoque ideal:</label>
                    <input type="text" class="form-control" name="estoqueIdeal" id="estoque_ideal" placeholder="">
                    <div class="feedback" id="feedback-estoque_ideal">

                    </div>
                </div>
        	</div>




        	<div class="form-row">
        		<div class="form-group col-md-4">
                   <label for="categoria">Categoria:</label>
                   <select name="categoria" class="custom-select custom-select-sm" id="categoria">
                    <?php
                        $categorias = getCategorias();
                        foreach ($categorias as $categoria) {
                            echo "<option value = '" . $categoria['id']."'>" . $categoria['nome']. "</option>";
                        }
                    ?>
                    </select>
                    <div class="feedback">
                        okay!
                    </div>
        		</div>


            <button id="formato-botao-mais" type="button" data-toggle="modal" data-target="#exampleModal">
              <i class="material-icons">add</i>
            </button>

        		<!-- <div class="form-group col-md-1">

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Cadastrar nova categoria</h5>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <label for="recipient-name" class="col-form-label">Nome:</label>
                          <input type="text" class="form-control" id="recipient-name">
                        </div>

                      </form>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Salvar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>-->

                <div class="form-group col-md-1">

                </div>

                <div class="form-group col-md-5">
                <label for="quantidade">Quantidade:</label>
                    <input type="text" class="form-control" name="quantidade" id="quantidade" placeholder="">
                    <div class="feedback" id="feedback-quantidade">

                    </div>
                </div>
        		</div>

        	<div class="row">
            	<div class="col-xl-11">
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
            	<div class="col-xl-1" id="cor-botao">
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
