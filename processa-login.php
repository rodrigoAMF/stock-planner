<?php

require_once("model/Usuario.php");
require_once("controller/UsuarioController.php");

$usuario = new Usuario();

$email = $_POST['email'];
$senha = MD5($_POST['senha']);

$usuarioController = UsuarioController::getInstance();

$loginSucesso = $usuarioController->verificarLogin($email, $senha);

echo $loginSucesso;

