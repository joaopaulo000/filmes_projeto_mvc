<?php 
    session_start();
    require_once '../php/functions.php';
?>

<?php
    $animes = AllAnimes();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/users.css">
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
            <img class="imagens" src="../imgs/garfield.jpg" alt="">
            <img class="imagens" src="../imgs/tintin_adventures.jpg" alt="">
            <img class="imagens" src="../imgs/homem_aranha.jpeg" alt="">
            <img class="imagens" src="../imgs/naruto.jpg" alt="">
            <img class="imagens" src="../imgs/hotd.jpg" alt="">
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

            
    <!--*********************************** PARTE PRINCIPAL!!!!!!!!!! *********************************** -->
    
    <main>
        <section>
            <h2>Animes</h2>
            <div class="container_midias">
                <?php foreach($animes as $anime):?> 
                    <div class="midia" data-id="<?=$anime->id_midia;?>" data-titulo="<?=$anime->titulo;?>" data-sinopse="<?=$anime->sinopse;?>" data-temporada="<?=$anime->temporada;?>" data-imagem="<?='../imgs/'.$anime->imagem;?>">
                        <img src="<?='../imgs/'. $anime->imagem?>" alt="<?=$anime->titulo?>">
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

    <script src="../javascript/script.js"></script>
</body>
</html>