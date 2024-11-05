<?php
    require_once '../../models/connect.php';
    require_once '../../models/categoria_class.php';
    require_once '../../models/categoriaDAO.php';

    $warning = '';

    if($_POST){

        if(empty($_POST['descricao_categoria'])){
            $warning = 'Esse campo deve ser preenchido!';
        }else{
            $categoria = new Categoria(id_categoria:0,descricao:trim($_POST['descricao_categoria']));
            $categoriaDAO = new CategoriaDAO();

            $categoriaDAO->insert_categoria($categoria);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/forms.css">
    <title>Cadastro de Categorias</title>
</head>
<body>
    <form action="" method="post">
        <h1>Cadastro de Categorias</h1>
        <a href="admin.php">Voltar</a>
        <input type="hidden" name="input_id_categoria" value="">

        <div class="row">
            <label for="descricao_categoria">Descrição:</label>
            <input type="text" name="descricao_categoria" id="descricao_categoria">
            <small><?php echo $warning;?></small>
        </div>

        <div class="row_btn">
            <input type="submit" value="Salvar">

            <?php if(!isset($_POST['id_categoria'])):?>
                <input type="reset" value="Resetar">
            <?php endif;?>    
        </div>
    </form>

</body>
</html>