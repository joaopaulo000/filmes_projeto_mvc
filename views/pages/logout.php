<?php
    session_start();
    $_SESSION = [];
    session_destroy();

    header('Location:/filmes_projeto_mvc/');
?>