<?php
    class Comentario{
        public function __construct(private int $id_comentario, private string $comentario = '', private $midia = null, private $user = null){

        }

        public function get_id(){
            return $this->id_comentario;
        }
    
        public function get_comentario(){
            return $this->comentario;
        }
    
        public function get_midia() {
            return $this->midia;
        }
    
        public function get_user() {
            return $this->user;
        }
    }
?>