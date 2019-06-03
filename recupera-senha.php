<?php
require_once("verificaLogoff.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="img/favicon.png">
    <title>Stock Planner - Recupera senha</title>
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
        <form class="recupera-senha" method="post" action="processa-emailRecuperacao.php">
            <!--<form class="form-signin">-->
                <div class="row">
                    <div class="col-12">
                        <h3>Insira seu email que foi cadastrado</h3>
                    </div>
                </div>
            
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-label-group">
                            <label for="inputEmail" class="label-invisivel">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" autofocus>
                        </div>
                    </div>
                </div>

                <div class="row botoes-login">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <a href="confere-codigo.php"><button class="btn botoes-login btn-primary btn-block mb-2" type="submit">Enviar</button></a>
                    </div>
                </div>
        </form>
        <!--</form>-->
    </div>
</body>
</html>