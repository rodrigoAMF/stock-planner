<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

// Verifica se há uma variável da sessão que identifica o usuário
if (isset($_SESSION['usuario']['id'])) {
    // Redireciona o visitante de volta pra home
    header("Location: inicio.php");
    exit;
}

?>