<?php 
require_once("model/Usuario.php");
require_once("controller/UsuarioController.php");

$usuario = new Usuario();
$feedbacks = Array();

$nome = $_POST['nome'];
$username = $_POST['username'];
$email = $_POST['email'];
$senha = MD5($_POST['senha']);

$feedback = $usuario->setNome($nome);
array_push($feedbacks, $feedback);
$feedback = $usuario->setUsername($username);
array_push($feedbacks, $feedback);
$feedback = $usuario->setEmail($email);
array_push($feedbacks, $feedback);
$feedback = $usuario->setSenha($senha);
array_push($feedbacks, $feedback);



$json['status'] = 1;

for ($i=0, $cont = 0; $i < sizeof($feedbacks); $i++) {
    if($i == 0){
        $json['status'] = $feedbacks[$i]['status'];
    }else if($feedbacks[$i]['status'] == -1){
        $json['status'] = $feedbacks[$i]['status'];
    }
    if($feedbacks[$i]['status'] == -1){
        $json['erros'][$cont]['nome_do_campo'] = $feedbacks[$i]['nome_do_campo'];
        $json['erros'][$cont]['mensagem'] = $feedbacks[$i]['mensagem'];
        $cont++;
    }
}


$usuarioController = UsuarioController::getInstance();

if($json['status'] !== -1 ){
    $resultadoCadastro = $usuarioController->cadastraUsuario($usuario);
}



//echo json_encode($json, JSON_UNESCAPED_UNICODE);
?>