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
        <!--<form class="form-signin">-->
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
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email" autofocus>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-label-group">
                        <label for="inputPassword" class="label-invisivel">Senha</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Senha">
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
                        <label class="custom-control-label" for="customControlAutosizing">Mantenha-me conectado</label>
                    </div>
                </div>
            </div>

            <div class="row botoes-login">
                <div class="col-6">
                    <button class="btn botoes-login btn-primary btn-block mb-2" type="submit">Entrar</button>
                </div>
                <div class="col-6">
                    <a href="cadastrar-login.php"><button class="btn botoes-login btn-primary btn-block mb-2">Cadastrar</button></a>
                </div>
            </div>
        <!--</form>-->
    </div>
</body>
</html>