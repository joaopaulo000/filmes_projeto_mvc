<?php
    require_once '../../models/connect.php';
    require_once '../../models/genero_class.php';
    require_once '../../models/generoDAO.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/forms.css">
    <title>Cadastro de Generos</title>
</head>
<body>
    <form action="" method="post">
        <h1>Cadastro de Gêneros</h1>
        <a href="admin.php">Voltar</a>

        <input type="hidden" name="input_id_genero" value="">

        <div class="row">
            <label for="descricao_genero">Descrição:</label>
            <input type="text" name="descricao_genero" id="descricao_genero">
        </div>

        <div class="row_btn">
            <input type="submit" value="Salvar">

            <?php if(!isset($_POST['id_genero'])):?>
                <input type="reset" value="Resetar">
            <?php endif;?>    
        </div>
    </form>

</body>
</html>