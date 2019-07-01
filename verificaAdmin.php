<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['usuario']['tipo'])) {
    // Redireciona o visitante de volta pro login
    header("Location: logout.php");
    exit;
}else if($_SESSION['usuario']['tipo'] != 1){
    // Redireciona o visitante de volta pro login
    header("Location: inicio.php");
    exit;
}

?>