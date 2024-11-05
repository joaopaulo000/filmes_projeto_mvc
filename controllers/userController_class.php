<?php

    class UserController{

        public function create_user(){
            $warning_create = ['','','','',''];
            if($_POST){
                $error = false;
                if(empty($_POST['nome_create'])){
                    $error = true;
                    $warning_create[0]= 'O nome deve ser preenchido!';
                }
        
                if(empty($_POST['username_create'])){
                    $error = true;
                    $warning_create[1]= 'O nome de usuario deve ser preenchido!';
        
                }
        
                if(empty($_POST['email_create'])){
                    $error = true;
                    $warning_create[2]= 'O email deve ser preenchido!';
                    
                }
        
                if(empty($_POST['senha_create'])){
                    $error = true;
                    $warning_create[3]= 'A senha deve ser preenchida!';
                }

                if($error === false){
        
        
                    $userCreate = new User(0, nome: $_POST['nome_create'], username: $_POST['username_create'], email: $_POST['email_create'], senha: md5($_POST['senha_create']));
                    $userCreateDAO = new UserDAO();
        
                    $signup = $userCreateDAO->insert_user($userCreate);
        
                    if($signup){
                        $userCreate_login = login($userCreate->get_username(),$userCreate->get_senha());
        
                        if($userCreate_login){
                            header('Location:/filmes_projeto');
                            exit;
                        }


        
                    }
                }else{
                    require_once 'views/pages/main_page.php';
                }
            }
        }


        
    }
?>