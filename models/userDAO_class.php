<?php

class UserDAO extends Connect{
    public function __construct(){
        parent::__construct();
    }

    public function insert_user($user){
        $query = 'insert into usuarios (nome,username,email,senha) values (?,?,?,?)';
        
        try{
            $stm = $this->db->prepare($query);
            
            $stm->bindValue(1,$user->get_nome());
            $stm->bindValue(2,$user->get_username());
            $stm->bindValue(3,$user->get_email());
            $stm->bindValue(4,$user->get_senha());
    
            $stm->execute();
        }catch(PDOException $e){
            return 'Erro ao cadastrar usuário.';
            $this->db = null;
        }

        $this->db = null;

        return true;
    }

    public function verify_userLogin($user){
        $query = 'select * from usuarios where username = ? and senha = ?';

        try{
            $stm = $this->db->prepare($query);
            
            $stm->bindValue(1,$user->get_username());
            $stm->bindValue(2,$user->get_senha());
    
            $stm->execute();
        }catch(PDOException $e){
            return 'Erro ao verificar usuário';
            $this->db = null;
        }

        $this->db = null;

        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function update_user(){
        $query = 'update usuarios set (nome = ?,username = ?,email = ?,senha = ?,imagem = ?) where id_usuario = ?';

        try{
            $stm = $this->db->prepare($query);
            
            $stm->bindValue(1,$user->get_nome());
            $stm->bindValue(2,$user->get_username());
            $stm->bindValue(3,$user->get_email());
            $stm->bindValue(4,$user->get_senha());
            $stm->bindValue(5,$user->get_imagem());
            $stm->bindValue(6,$user->get_id_user());
    
            $stm->execute();
        }catch(PDOException $e){
            return 'Erro ao atualizar usuário';
            $this->db = null;
        }

        $this->db = null;
    }

    public function update_condicao(){
        $query = 'update usuarios set (condicao = ?) where id_usuario = ?';

        try{
            $stm = $this->db->prepare($query);
            
            $stm->bindValue(1,$user->get_condicao());
            $stm->bindValue(2,$user->get_id_user());
    
            $stm->execute();
        }catch(PDOException $e){
            return 'Erro ao atualizar condição do usuário.';
            $this->db = null;
        }

        $this->db = null;
    }

    public function getAllUsers(){
        $query = 'select * from usuarios';

        try{
            $stm = $this->db->prepare($query);
    
            $stm->execute();
        }catch(PDOException $e){
            return 'Erro ao buscar usuários.';
            $this->db = null;
        }

        $this->db = null;

        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_user_id($id){
        $query = 'select * from usuarios where id_usuario = ?';

        try{
            $stm = $this->db->prepare($query);
    
            $stm->bindValue(1,$id);
    
            $stm->execute();
        }catch(PDOException $e){
            return 'Erro ao buscar usuário.';
            $this->db = null;
        }

        $this->db = null;

        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
}