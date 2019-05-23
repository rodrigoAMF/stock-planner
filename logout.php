<?php
    // Inicia a sessão para poder destruí-la
    if (!isset($_SESSION)) session_start();
    // Destrói a sessão
    session_destroy();

    // Redireciona o visitante de volta pro login
    header("Location: index.php");
