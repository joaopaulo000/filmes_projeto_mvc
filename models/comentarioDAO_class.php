<?php
    class ComentarioDAO extends Connect{
        public function __construct(){
            parent::__construct();
        }

        public function insert_comentario($comentario){
            $query = 'insert into comentarios (comentario,id_usuario,id_midia) values (?,?,?)';

            try{
                $stm = $this->db->prepare($query);
    
                $stm->bindValue(1,$comentario->get_comentario());
                $stm->bindValue(2,$comentario->get_user()->get_id());
                $stm->bindValue(3,$comentario->get_midia()->get_id());
    
                $stm->execute();
            }catch(PDOException $e){
                return 'Erro ao inserir comentário.';
                $this->db = null;
            }

            $this->db = null;
        }

        public function getAllComentarios($id_midia){
            $query = 'select c.id_comentario, c.comentario, u.username, c.id_midia from comentarios c inner join usuarios u on u.id_usuario = c.id_usuario';

            $stm = $this->db->prepare($query);

            $stm->execute();

            $this->db = null;

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }

    }
?>