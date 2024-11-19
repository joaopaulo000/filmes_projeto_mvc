<?php

class UserController {

    public function create_user() {
        $warning_create = ['', '', '', '', ''];
        if ($_POST) {
            $error = false;
            
            if (empty($_POST['nome_create'])) {
                $error = true;
                $warning_create[0] = 'O nome deve ser preenchido!';
            }

            if (empty($_POST['username_create'])) {
                $error = true;
                $warning_create[1] = 'O nome de usuario deve ser preenchido!';
            }

            if (empty($_POST['email_create'])) {
                $error = true;
                $warning_create[2] = 'O email deve ser preenchido!';
            }

            if (empty($_POST['senha_create'])) {
                $error = true;
                $warning_create[3] = 'A senha deve ser preenchida!';
            }

            if ($error === false) {
               
                    $senhaHash = md5($_POST['senha_create']); 
                    $userCreate = new User(0, nome: $_POST['nome_create'], username: $_POST['username_create'], email: $_POST['email_create'], senha: $senhaHash);
                    $userCreateDAO = new UserDAO();

                
                    $userCreateDAO->insert_user($userCreate);
    
                    header('Location: /filmes_projeto_mvc/');
                    exit; 
                }
            } else {
                require_once 'views/pages/sign_up.php';
            }
        }

        public function sign_in(){
            if($_POST){
                $warning_login = '';
                $error = false;
                if(empty($_POST['input_login']) ||  empty($_POST['senha_login'])){
                    $error = true;
                    $warning_login = 'Verifique as informações de login.';

                    require_once 'views/pages/sign_in.php';
                }
        
                if($error === false){
                    $user = new User(0, nome: '', username: $_POST['input_login'], email: '', senha: md5($_POST['senha_login']));
                    $userDAO = new UserDAO();
        

                    $user_login = $userDAO->verify_userLogin($user);
                
                    if(count($user_login) == 1){

                        if(!isset($_SESSION)){
                            session_start();
                        }
                        
                        $_SESSION['id_user'] = $user_login[0]->id_usuario;
                        $_SESSION['nome'] = $user_login[0]->nome;
                        $_SESSION['username'] = $user_login[0]->username;
                        $_SESSION['perfil'] = $user_login[0]->perfil;
  
                    }else{
                        $warning_login = 'Verifique as informações de login.';

                        require_once 'views/pages/sign_in.php';
                    }
                    header('Location: /filmes_projeto_mvc/');
                }
            }

        }

    }

?>
