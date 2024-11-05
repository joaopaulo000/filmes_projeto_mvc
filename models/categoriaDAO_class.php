<?php
    class CategoriaDAO extends Connect{
        public function __construct(){
            parent::__construct();
        }

        public function insert_categoria($categoria){
            $query = 'insert into categorias (descricao,condicao) values (?,?)';

            $stm = $this->db->prepare($query);

            $stm->bindValue(1,$categoria->get_descricao());
            $stm->bindValue(2,$categoria->get_condicao());

            $stm->execute();

            $this->db = null;

        }

        public function getAllCategorias(){
            $query = 'select * from categorias';

            $stm = $this->db->prepare($query);

            $stm->execute();

            $this->db = null;

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>