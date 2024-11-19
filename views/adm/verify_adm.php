<?php
    session_start();
    
    if(isset($_SESSION['perfil']) && $_SESSION['perfil']!= 'administrador'){
        header('Location: filmes_projeto_mvc/');
    }

?>