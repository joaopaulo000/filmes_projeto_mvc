<?php
    class Categoria{
        public function __construct(private int $id_categoria = 0, private string $descricao = '', private string $condicao ='Ativo'){

        }

        public function get_id(){
            return $this->id_categoria;
        }

        public function get_descricao(){
            return $this->descricao;
        }

        public function get_condicao(){
            return $this->condicao;
        }
    }
?>