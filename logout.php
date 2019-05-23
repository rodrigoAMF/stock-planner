<?php
    // Destrói a sessão
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php"); exit;
?>