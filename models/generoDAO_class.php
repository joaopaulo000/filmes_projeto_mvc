<?php
    class GeneroDAO extends Connect{
        public function __construct(){
            parent::__construct();
        }

        public function insert_genero($genero){
            $query = 'insert into generos (descricao,condicao) values (?,?)';

            try{
                $stm = $this->db->prepare($query);
    
                $stm->bindValue(1,$genero->get_descricao());
                $stm->bindValue(2,$genero->get_condicao());
    
                $stm->execute();
            }catch(PDOException $e){
                return 'Erro ao cadastrar gênero';
                $this->db = null;
            }

            $this->db = null;

        }

        public function getAllGeneros(){
            $query = 'select * from generos';

            try{
                $stm = $this->db->prepare($query);
    
                $stm->execute();
            }catch(PDOException $e){
                return 'Erro ao buscar gêneros.';
                $this->db = null;
            }

            $this->db = null;

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>