<?php


class StartController{
    public function index(){
            require_once 'php/functions.php';

            $filmes = AllFilmes();
            $series = AllSeries();
            $animes = AllAnimes();

            require_once 'views/pages/main_page.php';
        }
    }

?>