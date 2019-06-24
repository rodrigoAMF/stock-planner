<?php
require_once("model/Pagina.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="img/favicon.png">
    <title>Stock Planner - Emprestimo</title>
    <meta charset="utf-8">

     <!-- Bootstrap -->
     <link rel="stylesheet" href="css/bootstrap.min.css" >
    <!-- Ícones do material design -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Alertify -->
    <link rel="stylesheet" href="css/alertify.min.css" >
    <!-- Default theme for alertify -->
    <link rel="stylesheet" href="css/default-theme-alertify.min.css" >
    <!-- CSS da página -->
    <link rel="stylesheet" href="css/login.css" >

</head>
<body>
    <div class="modal-login" id="div1" style="visibility:visible">
        <form class="recupera-senha" method="post" action="processa-emailRecuperacao.php">
            <!--<form class="form-signin">-->
                <div class="row">
                    <div class="col-12">
                        <h3>Dados para empréstimo</h3>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-label-group">
                            <label for="inputNome" class="">Nome: </label>
                            <input name="email" id="email" class="form-control " placeholder="" autofocus>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-label-group">
                            <label for="inputDataEmprestimo" class="">Data do empréstimo: </label>
                            <input type="date" name="dataEmprestimo" id="dataEmprestimo" class="form-control " placeholder="Data do empréstimo" autofocus>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-label-group">
                            <label for="inputEmail" class="">Email: </label>
                            <input type="email" name="email" id="email" class="form-control " placeholder="" autofocus>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-label-group">
                            <label for="inputDocumento" class="">CPF/RG: </label>
                            <input name="documento" id="documento" class="form-control" placeholder="" autofocus>
                        </div>
                    </div>
                </div>

                <div class="row botoes-login">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <button id="trocaTela" class="btn botoes-login btn-primary btn-block mb-2" type="submit"  >Enviar</button>
                    </div>
                </div>
        </form>
        <!--</form>-->
    </div>
    <div class="modal-login" id = "div2" style="margin-top:-270px;  visibility:hidden">
        <!--<form class="form-signin">-->
            <div class="row">
                <div class="col-12">
                    <h3>Insira o código de recuperação</h3>
                </div>
            </div>
           
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-label-group">
                        <label for="input" class="label-invisivel">Códido</label>
                        <input type="text" id="codigo" class="form-control" placeholder="Código" autofocus>
                    </div>
                </div>
            </div>

            <div class="row botoes-login">
                <div class="col-6"></div>
                <div class="col-6">
                    <button id="btnConfere" class="btn botoes-login btn-primary btn-block mb-2" type="submit">Enviar</button>
                </div>
            </div>

        <!--</form>-->
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/recupera-senha.js"></script>
    <!-- Bootstrap -->
    <script src="js/alertify.min.js"></script>
</body>
</html>