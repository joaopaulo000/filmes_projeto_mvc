<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forms.css">
    <title>Cadastro de Midias</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Editar Midia</h1>
        <a href="/filmes_projeto_mvc/adm">Voltar</a>
        
        <input type="hidden" name="id_midia" value="<?php echo $midia[0]->id_midia;?>">
        <div class="row">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?php echo isset($_POST['titulo']) ? htmlspecialchars($_POST['titulo']) : $midia[0]->titulo; ?>">
            <small><?php echo isset($warnings[0]) ? $warnings[0] : ''; ?></small>
        </div>

        <div class="row">
            <label for="sinopse">Sinopse:</label>
            <textarea name="sinopse" id="sinopse"><?php echo isset($_POST['sinopse']) ? htmlspecialchars($_POST['sinopse']) : $midia[0]->sinopse; ?></textarea>
            <small><?php echo isset($warnings[1]) ? $warnings[1] : ''; ?></small>
        </div>

        <div class="row_selects">
            <div class="column">
                <label for="select_generos">Gênero:</label>
                <div class="custom-select-wrapper">
                    <select name="select_generos" id="select_generos">
                        <option value="0">Escolha um gênero</option>
                        <?php foreach ($generos as $gen): ?>
                            <option value="<?= $gen->id_genero; ?>" 
                                <?= isset($midia->id_genero) && $midia->id_genero == $gen->id_genero ? 'selected' : '' ?>>
                                <?= htmlspecialchars($gen->descricao); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <small><?php echo isset($warnings[2]) ? $warnings[2] : ''; ?></small>
            </div>

            <div class="column">
                <label for="select_categorias">Categoria:</label>
                <div class="custom-select-wrapper">
                    <select name="select_categorias" id="select_categorias">
                        <option value="0">Escolha uma categoria</option>
                        <?php foreach ($categorias as $cat): ?>
                            <option value="<?= $cat->id_categoria; ?>" <?php echo isset($_POST['select_categorias']) && $_POST['select_categorias'] == $cat->id_categoria ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($cat->descricao); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <small><?php echo isset($warnings[3]) ? $warnings[3] : ''; ?></small>
            </div>

            <div class="column">
                <label for="select_temporadas">Temporada:</label>
                <div class="custom-select-wrapper">
                    <select name="select_temporadas" id="select_temporadas">
                        <option value="0">Escolha uma temporada</option>
                        <?php foreach ($temporadas as $temp): ?>
                            <option value="<?= $temp->id_temporada; ?>" <?php echo isset($_POST['select_temporadas']) && $_POST['select_temporadas'] == $temp->id_temporada ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($temp->descricao); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <small><?php echo isset($warnings[4]) ? $warnings[4] : ''; ?></small>
            </div>
        </div>

        <div class="row">
            <label for="imagem_midia">Imagem:</label>
            <input type="file" name="imagem_midia" id="imagem_midia" accept="image/png, image/jpeg">
            <input type="hidden" name="img_db" value="<? echo $midia[0]->imagem?>">
            <small><?php echo isset($warnings[5]) ? $warnings[5] : ''; ?></small>
        </div>

        <div class="row_btn">
            <input type="submit" value="Salvar">
            <?php if (!isset($_POST['id_midia'])): ?>
                <input type="reset" value="Resetar">
            <?php endif; ?>    
        </div>
    </form>

    <script src="javascript/script.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categoriaSelect = document.getElementById('select_categorias');
            const temporadaSelect = document.getElementById('select_temporadas');

            categoriaSelect.addEventListener('change', function () {
                if (categoriaSelect.options[categoriaSelect.selectedIndex].text === 'Filme') {
                    temporadaSelect.value = '3';
                    temporadaSelect.disabled = true;
                } else {
                    temporadaSelect.disabled = false;
                }
            });

            if (categoriaSelect.options[categoriaSelect.selectedIndex].text === 'Filme') {
                temporadaSelect.disabled = true;
            }
        });
    </script>
</body>
</html>