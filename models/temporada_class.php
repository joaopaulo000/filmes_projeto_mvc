<?php
    class Temporada{
        public function __construct(private int $id_temporada = 0, private string $descricao = '', private string $condicao ='Ativo'){

        }

        public function get_id(){
            return $this->id_temporada;
        }

        public function get_descricao(){
            return $this->descricao;
        }

        public function get_condicao(){
            return $this->condicao;
        }
    }
?>