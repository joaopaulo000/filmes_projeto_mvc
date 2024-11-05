<?php
    class GeneroDAO extends Connect{
        public function __construct(){
            parent::__construct();
        }

        public function insert_genero($genero){
            $query = 'insert into generos (descricao,condicao) values (?,?)';

            $stm = $this->db->prepare($query);

            $stm->bindValue(1,$genero->get_descricao());
            $stm->bindValue(2,$genero->get_condicao());

            $stm->execute();

            $this->db = null;

        }

        public function getAllGeneros(){
            $query = 'select * from generos';

            $stm = $this->db->prepare($query);

            $stm->execute();

            $this->db = null;

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>