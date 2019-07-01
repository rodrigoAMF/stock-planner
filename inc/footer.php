    <!-- A ordem de importação importa!, jQuery primeiro, depois Popper.js e por fim Bootstrap JS -->
    <!-- jQuery 3.3.1 Slim -->
    <script src="js/jquery.min.js"></script>

    <!-- Popper.js -->
    <script src="js/popper.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/alertify.min.js"></script>
    <?php
        $pagina = basename($_SERVER['PHP_SELF'], '.php');

        if($pagina == 'lista-produtos'){
            echo "<script src='js/lista-produtos.js'></script>";
        }else if($pagina == 'cadastro-produto'){
            echo "<script src='js/cadastro-produto.js'></script>";
        }else if($pagina == 'editar-produto'){
            echo "<script src='js/edita-produto.js'></script>";
        }else if($pagina == 'importar-produtos'){
            echo "<script src='js/importar-produtos.js'></script>";
        }else if($pagina == 'configuracao'){
            echo "<script src='js/finaliza-semestre.js'></script>";
        }else if($pagina == 'cadastro-quantidade-catmat'){
            echo "<script src='js/cadastro-quantidade-catmat.js'></script>";
        }
        else if($pagina == 'lista-produtos-quantidade'){
            echo "<script src='js/lista-produtos-quantidade.js'></script>";
        }
        else if($pagina == 'emprestimo'){
            echo "<script src='js/emprestimo.js'></script>";
        }
    ?>


  <div id="rodape">
    	<br>
	</div>
</body>
</html>
