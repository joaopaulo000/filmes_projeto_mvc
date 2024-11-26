<?php
    class TemporadaDAO extends Connect{
        public function __construct(){
            parent::__construct();
        }

        public function insert_temporada($temporada){
            $query = 'insert into temporadas (descricao,condicao) values (?,?)';

            try{
                $stm = $this->db->prepare($query);
    
                $stm->bindValue(1,$temporada->get_descricao());
                $stm->bindValue(2,$temporada->get_condicao());
    
                $stm->execute();
            }catch(PDOException $e){
                return 'Erro ao inserir temporada';
                $this->db = null;
            }

            $this->db = null;

        }
        
        public function getAllTemporadas(){
            $query = 'select * from temporadas';
    
            try{
                $stm = $this->db->prepare($query);
        
                $stm->execute();
            }catch(PDOException $e){
                return 'Erros ao buscar temporadas';
                $this->db = null;
            }
    
            $this->db = null;
    
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
    }

?>