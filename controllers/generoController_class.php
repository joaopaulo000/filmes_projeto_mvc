<?php
    class GeneroController{
        public function form(){
            require_once 'views/adm/formGenero.php';
            
        }

        public function insert(){
            $warning = '';

            if($_POST){
        
                if(empty($_POST['descricao_genero'])){
                    $warning = 'Esse campo deve ser preenchido!';
                }else{
                    $genero = new Genero(id_genero:0,descricao:trim($_POST['descricao_genero']));
                    $generoDAO = new GeneroDAO();
        
                    $generoDAO->insert_genero($genero);
                }
            }

            require_once 'views/adm/formGenero.php';
        }
    }
?>