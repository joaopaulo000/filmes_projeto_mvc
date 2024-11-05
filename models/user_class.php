<?php
class User{
    
    public function __construct(private int $id_usuario = 0, private string $nome ='', private string $username ='',
    private string $email= '', private string $senha='', private string $imagem ='', private string $perfil ='', private string $condicao =''){

    } 

    public function get_id_user(){
        return $this->id_usuario;
    }

    public function get_nome(){
        return $this->nome;
    }

    public function get_username(){
        return $this->username;
    }
    
    public function get_email(){
        return $this->email;
    }

    public function get_senha(){
        return $this->senha;
    }

    public function get_imagem(){
        return $this->imagem;
    }

    public function get_perfil(){
        return $this->perfil;
    }

    public function get_condicao(){
        return $this->condicao;
    }

}