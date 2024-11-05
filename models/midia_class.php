<?php
    class Midia{
        public function __construct(private int $id_midia = 0, private string $titulo = '', private string $sinopse ='',
          private $genero = null,private $categoria = null, private $temporada = null, private string $imagem='',private string $condicao ='Ativo'){

        }

        public function get_id(){
            return $this->id_midia;
        }

        public function get_titulo(){
            return $this->titulo;
        }

        public function get_sinopse(){
            return $this->sinopse;
        }

        public function get_genero(){
            return $this->genero;
        }

        public function get_categoria(){
            return $this->categoria;
        }

        public function get_temporada(){
            return $this->temporada;
        }

        public function get_imagem(){
            return $this->imagem;
        }

        public function get_condicao(){
            return $this->condicao;
        }
    }
?>