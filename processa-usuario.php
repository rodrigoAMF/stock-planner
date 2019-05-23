<?php 
require_once("model/Login.php");
require_once("controller/LoginController.php");

$usuario = new Login();


$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$nome  = $_POST['nome'];

$usuario->setAtributos($login,$senha);

$loginController = LoginController::getInstance();
 
$array = $loginController->getLogins();
$logarray = $array['login'];


if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastro.html';</script>";
}else{
    if($logarray == $login){

        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastro.html';</script>";
        die();

    }else{

        $resultadoCadastro = $loginController->cadastraLogin($usuario);
        // $query = "INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')";
        // $insert = mysql_query($query,$connect);
            
        if($insert){
            echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
        }else{
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
        }
    }
}
?>