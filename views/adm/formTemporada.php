
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forms.css">
    <title>Cadastro de Temporadas</title>
</head>
<body>
    <form action="" method="post">
        <h1>Cadastro de Temnporadas</h1>
        <a href="/filmes_projeto_mvc/adm">Voltar</a>
        
        <input type="hidden" name="input_id_temporada" value="">

        <div class="row">
            <label for="descricao_temporada">Descrição:</label>
            <input type="text" name="descricao_temporada" id="descricao_temporada">
        </div>

        <div class="row_btn">
            <input type="submit" value="Salvar">

            <?php if(!isset($_POST['id_temporada'])):?>
                <input type="reset" value="Resetar">
            <?php endif;?>    
        </div>
    </form>

    <script src="../../javascript/script.js"></script>
</body>
</html>