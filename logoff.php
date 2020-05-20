<?php    
//script para encerrar sessão
    session_start();
    session_destroy();
    header('Location: index.php');
?>