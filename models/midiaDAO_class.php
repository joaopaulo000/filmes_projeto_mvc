<?php
    class MidiaDAO extends Connect{
        public function __construct(){
            parent::__construct();
        }

        public function insert_midia($midia){
            $query = 'insert into midias (titulo, sinopse, imagem, id_categoria,id_genero,id_temporada, condicao) values (?,?,?,?,?,?,?)';

            $stm = $this->db->prepare($query);

            $stm->bindValue(1,$midia->get_titulo());
            $stm->bindValue(2,$midia->get_sinopse());
            $stm->bindValue(3,$midia->get_imagem());
            $stm->bindValue(4,$midia->get_categoria()->get_id());
            $stm->bindValue(5,$midia->get_genero()->get_id());
            $stm->bindValue(6,$midia->get_temporada()->get_id());
            $stm->bindValue(7,$midia->get_condicao());

            $stm->execute();

            $this->db = null;

        }

        public function getAllMidias(){
            $query = 'select * from vw_midias';

            $stm = $this->db->prepare($query);

            $stm->execute();

            $this->db = null;

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function getAllFilmes(){
            $query = 'select * from vw_midias_filmes';

            $stm = $this->db->prepare($query);

            $stm->execute();

            $this->db = null;

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function getAllSeries(){
            $query = 'select * from vw_midias_series';

            $stm = $this->db->prepare($query);

            $stm->execute();

            $this->db = null;

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function getAllAnimes(){
            $query = 'select * from vw_midias_animes';

            $stm = $this->db->prepare($query);

            $stm->execute();

            $this->db = null;

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

        public function get_midia_id($id){
            $query = 'select * from vw_midias where id_midia = ?';

            $stm = $this->db->prepare($query);

            $stm->bindValue(1,$id);

            $stm->execute();

            $this->db = null;

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        
    }
?>