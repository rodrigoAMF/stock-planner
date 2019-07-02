<?php
require_once("verificaLogoff.php");

if (!isset($_SESSION)) session_start();

// Salva os dados encontrados na sessão
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="img/favicon.png">
    <title>Stock Planner - Login</title>
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
    <div class="modal-login">
        <form class="form-signin" id="formulario-login" method="post" action="processa-login.php">
            <div class="row">
                <div class="col-12">
                    <div class="text-center mb-3">
                        <img class="mb-2 img-fluid" src="img/logotxt.png" alt="Logo">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-label-group">
                        <label for="inputEmail" class="label-invisivel">Email</label>
                        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" autofocus>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-label-group">
                        <label for="inputPassword" class="label-invisivel">Senha</label>
                        <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha">
                    </div>
                </div>
                <div class="col-12 link-senha">
                    <a href="recupera-senha.php">Esqueci minha senha</a>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-12">
                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <!--<label class="custom-control-label" for="customControlAutosizing">Mantenha-me conectado</label>-->
                    </div>
                </div>
            </div>

            <div class="row botoes-login">
                <div class="col-12">
                    <button class="btn botoes-login btn-primary btn-block" type="submit">Entrar</button>
                </div>
                <!-- <div class="col-6">
                    <a href="cadastrar-usuario.php"><button type="button" class="btn botoes-login btn-primary btn-block">Cadastrar</button></a>
                </div> -->
            </div>
        </form>
    </div>
    <!-- A ordem de importação importa!, jQuery primeiro, depois Popper.js e por fim Bootstrap JS -->
    <!-- jQuery 3.3.1 Slim -->
    <script src="js/jquery.min.js"></script>

    <!-- Popper.js -->
    <script src="js/popper.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap -->
    <script src="js/alertify.min.js"></script>
    <script src="js/login.js"></script>
</body>
</html>
