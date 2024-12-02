<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forms.css">
    <title>Cadastro de Categorias</title>
</head>
<body>
    <form action="" method="post">
        <h1>Cadastro de Categorias</h1>
        <a href="/filmes_projeto_mvc/adm">Voltar</a>
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