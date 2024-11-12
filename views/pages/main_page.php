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

    <?php require_once 'nav.php';?>

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