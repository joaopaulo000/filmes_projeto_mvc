<?php
    class CategoriaController{

        public function form(){
            require_once 'views/adm/formCategoria.php';
        }
        
        public function insert(){
            $warning = '';

            if($_POST){
        
                if(empty($_POST['descricao_categoria'])){
                    $warning = 'Esse campo deve ser preenchido!';
                }else{
                    $categoria = new Categoria(id_categoria:0,descricao:trim($_POST['descricao_categoria']));
                    $categoriaDAO = new CategoriaDAO();
        
                    $categoriaDAO->insert_categoria($categoria);
                }
            }

            require_once 'views/adm/formCategoria.php';
        }
    }
?>