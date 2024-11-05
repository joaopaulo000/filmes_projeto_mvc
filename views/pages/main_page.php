<?php 
    session_start();
?>
<!-- criação da conta e auto login -->
<?php

   
?> 
<!-- login -->
<?php
    if($_POST){
        $warning_login = '';
        $error = false;
        if(empty($_POST['input_login']) ||  empty($_POST['senha_login'])){
            $error = true;
            $warning_login = 'Verifique as informações de login.';
        }

        if($error === false){
            $user = new User(0, nome: '', username: $_POST['input_login'], email: '', senha: md5($_POST['senha_login']));
            $userDAO = new UserDAO();


            $user_login = login($user->get_username(),$user->get_senha());

            if($user_login){
                header('Location: index.php');
                exit;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/users.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>MidiasDB</title>
</head>
<body>
    <header>
        <section id="carrossel">
            <section id="imagem">
                <div id="img">
                    <img id="atual" src="" alt="">
                </div>
                <div id="botoes">
                    <div class="btn_nav" id="esquerda">
                        <i class="fa-solid fa-chevron-left"></i>
                    </div>
                    <div class="btn_nav" id="direita">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>
    
            </section>
            
        </section>
        <section id="imgs">
            <img class="imagens" src="imgs/garfield.jpg" alt="">
            <img class="imagens" src="imgs/tintin_adventures.jpg" alt="">
            <img class="imagens" src="imgs/homem_aranha.jpeg" alt="">
            <img class="imagens" src="imgs/naruto.jpg" alt="">
            <img class="imagens" src="imgs/hotd.jpg" alt="">
        </section>
    </header>

    <nav>
        <div id="logo">
            <a href="">
                <i class="fa-solid fa-shop"></i>
            </a>
        </div>


        <div id="links">
            <a href="index.php">Home</a>
            <a href="filmes.php">Filmes</a>
            <a href="series.php">Séries</a>
            <a href="animes.php">Animes</a>
            <?php if(isset($_SESSION['perfil']) && $_SESSION['perfil']=== 'administrador'):?>
                <a href="adm/admin.php">Admin</a>
            <?php endif;?>
        </div>
        
        <?php if(empty($_SESSION['username'])): ?>
            <div id="log_opts">
                <div id="login_btn" class="opcao">
                    <i class="fa-regular fa-user"></i>
                    <!-- <i class="fa-solid fa-user"></i> -->
                    <p>Criar/Login</p>
                </div>
            </div>
        <?php else: ?>
            <div id="userOptions" class="dropdown">
                <img src="../imgs/default_profile.png" alt="User Profile" class="dropdown-toggle">
                <ul class="dropdown-menu">
                    <p><?= $_SESSION['nome']; ?> <span>(<?= $_SESSION['username']?>)</span></p>
                    <li><a href=""><i class="fa-solid fa-user-edit"></i> Editar perfil</a></li>
                    <li><a href=""><i class="fa-solid fa-heart"></i> Favoritos</a></li>
                    <li><a href="logout.php"><i class="fa-solid fa-right-to-bracket"></i> Sair</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </nav>
    <!--*********************************** FORMULÁRIOS!!!!!!!!!! *********************************** -->
            <section id="main_container">
                <div id="closeform">
                    <i id="fechar" class="fa-solid fa-xmark"></i>
                </div>

                <div id="container_forms" >
                    <div id="criar_form" class="show_criar">
                        <div id="message">
                            <p>Seja bem-vindo ao nosso site!</p>
                            <span>Já tem uma conta? Clique no botão abaixo para efetuar o login</span>
                            <button id="GoToLogin">Ir para login</button>
                        </div>

                        <form id="create" method="post" action="">
                            <div class="form_items">
                                <label for="">Nome completo:</label>
                                <input type="text" name="nome_create" id="nome_create" value="<?php echo isset($_POST['nome_create']) ? htmlspecialchars($_POST['nome_create']) : ''; ?>">
                                <small><?php echo isset($warning_create[0]) ? $warning_create[0] : ''?></small>
                            </div>

                            <div class="form_items">
                                <label for="">Username:</label>
                                <input type="text" name="username_create" id="username_create" value="<?php echo isset($_POST['username_create']) ? htmlspecialchars($_POST['username_create']) : ''; ?>">
                                <small><?php echo isset($warning_create[1]) ? $warning_create[1] : ''?></small>

                            </div>

                            <div class="form_items">
                                <label for="">Email:</label>
                                <input type="email" name="email_create" id="email1" value="<?php echo isset($_POST['email_create']) ? htmlspecialchars($_POST['email_create']) : ''; ?>">
                                <small><?php echo isset($warning_create[2]) ? $warning_create[2] : ''?></small>

                            </div>

                            <div class="form_items">
                                <label for="">Senha:</label>
                                <input type="password" name="senha_create" id="senha1" value="<?php echo isset($_POST['senha_create']) ? htmlspecialchars($_POST['senha_create']) : ''; ?>">
                                <small><?php echo isset($warning_create[3]) ? $warning_create[3] : ''?></small>

                            </div>

                            <div class="form_items">
                                <input type="submit" name="btn_create" value="Criar conta"></input>

                            </div>
            
                        </form>

                        
                    </div>
                    
                    <!-- SEGUNDO FORMULÁRIO ABAIXO -->
                    <div id="login_form" class="displaynone" >
                        <div id="message">
                            <p>Olá! Bem-vindo de volta ao nosso site!</p>
                            <span>Não tem uma conta? Clique no botão abaixo para criar uma!</span>
                            <button id="GoToRegister">Criar uma conta</button>
                        </div>
                        <form id="login" method="post" action="index.php">
                            <small></small>
                            <div class="form_items">
                                <label for="">Login:</label>
                                <input type="text" name="input_login" id="username2" value="<?php echo isset($_POST['input_login']) ? htmlspecialchars($_POST['input_login']) : ''; ?>">
                                <small><?php echo isset($warning_login) ? $warning_login : ''?></small>
                            </div>

                            <div class="form_items">
                                <label for="">Senha:</label>
                                <input type="password" name="senha_login" id="senha2" value="<?php echo isset($_POST['senha_login']) ? htmlspecialchars($_POST['senha_login']) : ''; ?>">
                                <small><?php echo isset($warning_login) ? $warning_login : ''?></small>
                            </div>

                            <div class="form_items">
                                <input type="submit" name="btn_login" value="Login"></input>
                            </div>
                        </form>

                    </div>

                </div>
            </section>
    <!--*********************************** FORMULÁRIOS!!!!!!!!!! *********************************** -->
            
    <!--*********************************** PARTE PRINCIPAL!!!!!!!!!! *********************************** -->
    
    <main>
        <section>
            <h2>Filmes</h2>
            <div class="container_midias">
                <?php foreach($filmes as $filme):?> 
                    <div class="midia" data-id="<?=$filme->id_midia;?>" data-titulo="<?=$filme->titulo;?>" data-sinopse="<?=$filme->sinopse;?>" data-imagem="<?='imgs/'.$filme->imagem;?>">
                        <img src="<?='imgs/'. $filme->imagem?>" alt="<?=$filme->titulo?>">
                        <p><?=$filme->titulo?></p>
                    </div>
                <?php endforeach;?>
            </div>
        </section>

        <section>
            <h2>Séries</h2>
            <div class="container_midias">
                <?php foreach($series as $serie):?> 
                    <div class="midia" data-id="<?=$serie->id_midia;?>" data-titulo="<?=$serie->titulo;?>" data-sinopse="<?=$serie->sinopse;?>" data-temporada="<?=$serie->temporada;?>" data-imagem="<?='imgs/'.$serie->imagem;?>">
                        <img src="<?='imgs/'. $serie->imagem?>" alt="<?=$serie->titulo?>">
                        <p><?=$serie->titulo?></p>
                        <h3><?=$serie->temporada?></h3>
                    </div>
                <?php endforeach;?>
            </div>
        </section>

        <section>
            <h2>Animes</h2>
            <div class="container_midias">
                <?php foreach($animes as $anime):?> 
                    <div class="midia" data-id="<?=$anime->id_midia;?>" data-titulo="<?=$anime->titulo;?>" data-sinopse="<?=$anime->sinopse;?>" data-temporada="<?=$anime->temporada;?>" data-imagem="<?='imgs/'.$anime->imagem;?>">
                        <img src="<?='imgs/'. $anime->imagem?>" alt="<?=$anime->titulo?>">
                        <p><?=$anime->titulo?></p>
                        <h3><?=$anime->temporada?></h3>
                    </div>
                <?php endforeach;?>
            </div>
        </section>

        <form class="showMidia" id="modal" method="post">
            <input type="hidden" name="id_midia_input" id="id_midia_input" value="">
            <div id="closeShowMidia">
                <i id="fechar_midia" class="fa-solid fa-xmark"></i>
            </div>

            <div class="informacoes">
                <div class="imagem">
                    <img src="" alt="">
                </div>

                <div class="detalhes">
                    <span class="titulo"></span>
                    <h3></h3>
                    <p class="sinopse"></p>

                    <div class="comentarios">
                    <form action="adicionar_comentario.php" method="post">
                        <textarea name="comentario" placeholder="Digite seu comentário"></textarea>
                        <button type="submit">Adicionar Comentário</button>
                    </form>
                        <?php 
                            if(isset($_POST['id_midia_input'])){
                                $comentarioDAO = new ComentarioDAO();
    
                                $comentarios = $comentarioDAO->getAllComentarios($_POST['id_midia_input']);
                            }
                        ?>


                        <?php foreach($comentarios as $comentario):?>
                            <div class="comentario_container">
                                <div class="user_comment">
                                    <img src="" alt="">
                                    <p class="user"><?=$comentario->username?></p>
                                </div>
                                <p class="comentario"><?=$comentario->comentario?></p>
                            </div>
                        <?php endforeach;?>   
                        
                        
                    </div>

                </div>

            </div>

        </form>
    </main>

    <footer>
        
    </footer>

    <div id="backtop">
        <i class="fa-solid fa-chevron-up"></i>
    </div>

    <script src="javascript/script.js"></script>
</body>
</html>