<?php  print_r($_SESSION);?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
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
<!--             <div id="log_opts">
                <div id="login_btn" class="opcao">
                    <i class="fa-regular fa-user"></i>
                    <i class="fa-solid fa-user"></i>
                    <p>Criar/Login</p>
                </div>
            </div> -->
            <div id="acc_opts">
                <a href="/filmes_projeto_mvc/sign_in">Sign In</a>
                <a href="/filmes_projeto_mvc/sign_up">Sign Up</a>
            </div>
        <?php else: ?>
            <div id="userOptions" class="dropdown">
                <img src="../imgs/default_profile.png" alt="User Profile" class="dropdown-toggle">
                <ul class="dropdown-menu">
                    <p><?= $_SESSION['nome']; ?> <span>(<?= $_SESSION['username']?>)</span></p>
                    <li><a href=""><i class="fa-solid fa-user-edit"></i> Editar perfil</a></li>
                    <li><a href=""><i class="fa-solid fa-heart"></i> Favoritos</a></li>
                    <li><a href="/filmes_projeto_mvc/logout"><i class="fa-solid fa-right-to-bracket"></i> Sair</a></li>
                </ul>
            </div>
        <?php endif; ?>
    </nav>
</body>
</html>