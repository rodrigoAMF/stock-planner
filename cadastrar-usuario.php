<?php
    require_once("model/Config.php");
    require_once("model/Pagina.php");
    $pagina = new Pagina();

    $pagina->verificaAdmin();

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
        <form  method="post" action='processa-usuario.php' class="formulario-login">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <img class="mb-2 img-fluid" src="img/logotxt.png" alt="Logo">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-label-group">
                        <label for="inputNomeCompleto" class="label-invisivel">Nome Completo</label>
                        <input type="nome" name="nome" id="nome" class="form-control" placeholder="Nome Completo" autofocus>
                        <div class="feedback" id="feedback-nome">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-label-group">
                        <label for="inputUsername" class="label-invisivel">Username</label>
                        <input type="username" name="username" id="username" class="form-control" placeholder="Username" autofocus>
                        <div class="feedback" id="feedback-username">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-label-group">
                        <label for="inputEmail" class="label-invisivel">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" autofocus>
                        <div class="feedback" id="feedback-email">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-12">
                    <div class="form-label-group">
                        <label for="inputPassword" class="label-invisivel">Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
                        <div class="feedback" id="feedback-senha">

                         </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-label-group">
                        <label for="inputConfirmarPassword" class="label-invisivel">Confirmar senha</label>
                        <input type="password" name="senhaConfirma" id="senhaConfirma" class="form-control" placeholder="Confirmar senha">
                        <div class="feedback" id="feedback-senhaConfirma">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row botoes-login">
                <div class="col-6">
                    <button class="btn botoes-login btn-primary btn-block" type="submit">Cadastrar</button>
                </div>
                <div class="col-6">
                    <button class="btn botoes-login btn-primary btn-block" type="button" onclick="window.location = 'inicio.php';">Cancelar</button>
                </div>
                
            </div>
        </form>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/alertify.min.js"></script>
    
    <script src="js/cadastro-usuario.js"></script>
</body>
</html>