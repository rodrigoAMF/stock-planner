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
        <form  method="post" action='processa-login.php'>
            <div class="row">
                <div class="col-12">
                    <div class="text-center mb-3">
                        <img class="mb-2 img-fluid" src="img/logotxt.png" alt="Logo">
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-12">
                    <div class="form-label-group">
                        <label for="inputEmail" class="label-invisivel">Nome Completo</label>
                        <input type="nome" name="nome" id="nome" class="form-control" placeholder="Nome Completo" autofocus>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-12">
                    <div class="form-label-group">
                        <label for="inputEmail" class="label-invisivel">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" autofocus>
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-12">
                    <div class="form-label-group">
                        <label for="inputPassword" class="label-invisivel">Senha</label>
                        <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha">
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <div class="form-label-group">
                        <label for="inputPassword" class="label-invisivel">Confirmar senha</label>
                        <input type="password" name="senhaConfirma" id="senhaConfirma" class="form-control" placeholder="Confirmar senha">
                    </div>
                </div>
            </div>

            <div class="row botoes-login">
                <div class="col-6">
                    <a href="inicio.php"><button class="btn botoes-login btn-primary btn-block mb-2" type="submit">Cadastrar</button></a>
                </div>
                <div class="col-6 ">
                    <button class="btn botoes-login btn-primary btn-block mb-2" type="button" onclick="window.location = 'login.php';">Cancelar</button>
                </div>
                
            </div>
        </form>
    </div>
</body>
</html>