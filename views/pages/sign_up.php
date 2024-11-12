<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/forms_sign.css">
    <title>MidiasDB - Sign Up</title>
</head>
<body>
<?php require_once 'nav.php';?>

    <div id="sign_up">
<!--         <div id="message">
            <p>Seja bem-vindo ao nosso site!</p>
            <span>Já tem uma conta? Clique no botão abaixo para efetuar o login</span>
            <button id="GoToLogin">Ir para login</button>
        </div> -->

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
        </div>
</body>
</html>