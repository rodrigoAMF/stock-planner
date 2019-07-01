<?php
    require_once("model/Config.php");
    require_once("model/Pagina.php");
    $pagina = new Pagina();

    $pagina->incluiCabecalho("Stock Planner - Home", "pagina-inicial");
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
				<div class="col-xl-3 col-md-3 col-sm-6 col-6 col-lg-3 posicao-elemento">
            <button>
              <a href="escolhe-cadastro.php">
    					<img src="img/cadastrar1.png">
              <div class="textosBotao">
                Cadastrar
              </div>
              </a>
            </button>

				</div>
        <div class="col-xl-3 col-md-3 col-sm-6 col-6 col-lg-3 posicao-elemento">
          <a href="escolhe-listar.php">
            <button>
    					<img src="img/listar.png">
              <div class="textosBotao">
                Listar
              </div>
            </button>
          </a>
				</div>

         <div class="col-xl-3 col-md-3 col-sm-6 col-6 col-lg-3 posicao-elemento">
          <a href="importar-produtos.php">
            <button>
              <img src="img/importar.png">
              <div class="textosBotao">
                Importar
              </div>
            </button>
          </a>
        </div>

        <!-- <div class="col-xl-3 col-md-3 col-sm-6 col-6 col-lg-3 posicao-elemento">
              <a href="emprestimo.php">
                <button>
                  <img width="80px" height="80px" src="img/emprestimo.png">
                  <div class="textosBotao">
                    Empréstimo
                  </div>
                </button>
              </a>
         </div> -->
			</div>
		</div>
    <br>
    <nav class="navbar navbar-expand-lg">
      <div class="fonte-barra">
        Configurações
      </div>
    </nav>
    <div class="container-produto">
      <div class="row">
        <div class="col-xl-3 col-md-3 col-sm-6 col-6 col-lg-3 posicao-elemento">
            <button>
              <a href="configuracao.php">
              <img src="img/configuracao.png">
              <div class="textosBotao">
                Configurações
              </div>
              </a>
            </button>


        </div>
        <?php if(isset($_SESSION['usuario']['tipo'])) if($_SESSION['usuario']['tipo'] == 1){
          echo'
            <div class="col-xl-3 col-md-3 col-sm-6 col-6 col-lg-3 posicao-elemento">
              <a href="cadastrar-usuario.php">
                <button>
                  <img width="80px" height="80px" src="img/adicionar-usuário.png">
                  <br>
                  <div class="textosBotao">
                    Cadastrar Usuário
                  </div>
                </button>
              </a>
            </div>';
        }?>
      </div>
    </div>
</div>
</div>

<?php
    require_once(Config::FOOTER_TEMPLATE);
?>
