<?php

class NavController{
    public function index(){
            require_once 'php/functions.php';

            $filmes = AllFilmes();
            $series = AllSeries();
            $animes = AllAnimes();

            require_once 'views/pages/main_page.php';
        }


        public function sign_in(){
            require_once 'views/pages/sign_in.php';
        }

        public function sign_up(){
            require_once 'views/pages/sign_up.php';
        }

        public function adm(){
            require_once 'views/adm/admin.php';
        }
    }
?>