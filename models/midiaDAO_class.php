<?php
    class MidiaDAO extends Connect{
        public function __construct(){
            parent::__construct();
        }

        public function insert_midia($midia){
            $query = 'insert into midias (titulo, sinopse, imagem, id_categoria,id_genero,id_temporada, condicao) values (?,?,?,?,?,?,?)';

            try{
                $stm = $this->db->prepare($query);
    
                $stm->bindValue(1,$midia->get_titulo());
                $stm->bindValue(2,$midia->get_sinopse());
                $stm->bindValue(3,$midia->get_imagem());
                $stm->bindValue(4,$midia->get_categoria()->get_id());
                $stm->bindValue(5,$midia->get_genero()->get_id());
                $stm->bindValue(6,$midia->get_temporada()->get_id());
                $stm->bindValue(7,$midia->get_condicao());
    
                $stm->execute();
            }catch(PDOException $e){
                return 'Erro ao inserir mídia.';
                $this->db = null;
            }

            $this->db = null;

        }

        public function getAllMidias(){
            $query = 'select * from vw_midias';

            try{
                $stm = $this->db->prepare($query);
    
                $stm->execute();
            }catch(PDOException $e){
                return 'Erro ao buscar mídias.';
                $this->db = null;
            }

            $this->db = null;

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function getAllFilmes(){
            $query = 'select * from vw_midias_filmes';

            try{
                $stm = $this->db->prepare($query);
    
                $stm->execute();
            }catch(PDOException $e){
                return 'Erro ao buscar filmes.';
                $this->db = null;
            }

            $this->db = null;

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function getAllSeries(){
            $query = 'select * from vw_midias_series';

            try{
                $stm = $this->db->prepare($query);
    
                $stm->execute();
            }catch(PDOException $e){
                return 'Erro ao buscar séries.';
                $this->db = null;
            }

            $this->db = null;

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function getAllAnimes(){
            $query = 'select * from vw_midias_animes';

            try{
                $stm = $this->db->prepare($query);
    
                $stm->execute();
            }catch(PDOException $e){
                return 'Erro ao buscar animes.';
                $this->db = null;
            }

            $this->db = null;

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function get_midia_id($id){
            $query = 'select * from vw_midias where id_midia = ?';

            try{
                $stm = $this->db->prepare($query);
    
                $stm->bindValue(1,$id);
    
                $stm->execute();
            }catch(PDOException $e){
                return 'Erro ao buscar mídia.';
                $this->db = null;
            }

            $this->db = null;

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        
    }
?>