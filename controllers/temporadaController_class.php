<?php
    class TemporadaController{
        public function form(){
            require_once 'views/adm/formTemporada.php';
        }

        public function insert(){
            $warning = '';

            if($_POST){
        
                if(empty($_POST['descricao_temporada'])){
                    $warning = 'Esse campo deve ser preenchido!';
                }else{
                    $temporada = new Temporada(id_temporada:0,descricao:trim($_POST['descricao_temporada']));
                    $temporadaDAO = new TemporadaDAO();
        
                    $temporadaDAO->insert_temporada($temporada);
                }
            }

            require_once 'views/adm/formTemporada.php';
        }
    }
?>