<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/forms_sign.css">
    <title>MidiasDB - Sign In</title>
</head>
<body>
<?php require_once 'nav.php';?>

    <div id="sign_in">
<!--         <div id="message">
            <p>Olá! Bem-vindo de volta ao nosso site!</p>
            <span>Não tem uma conta? Clique no botão abaixo para criar uma!</span>
            <button id="GoToRegister">Criar uma conta</button>
        </div> -->
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
</body>
</html>