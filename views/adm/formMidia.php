<?php
    require_once '../../php/functions.php';

    $categorias = AllCategorias();
    $generos = AllGeneros();
    $temporadas = AllTemporadas();

    $warnings = ['','','','','',''];
    $erro = false;



    if($_POST){
        $titulo = $_POST['titulo'];
        $sinopse = $_POST['sinopse'];
        $genero = $_POST['select_generos'];
        $categoria = $_POST['select_categorias'];
        $temporada =  isset($_POST['select_temporadas']) ? $_POST['select_temporadas'] : '3';



        if (empty($titulo)) {
            $warnings[0] = 'O título da mídia deve ser preenchido!';
            $erro = true;
        }

        if (empty($sinopse)) {
            $warnings[1] = 'A sinopse da mídia deve ser preenchida!';
            $erro = true;
        }

        if ($genero == '0') {
            $warnings[2] = 'O gênero da mídia deve ser preenchido!';
            $erro = true;
        }

        if ($categoria == '0') {
            $warnings[3] = 'A categoria da mídia deve ser preenchida!';
            $erro = true;
        }

        if ($temporada == '0' && $categoria != '1') {
            $warnings[4] = 'A temporada da mídia deve ser preenchida!';
            $erro = true;
        }

        if (isset($_FILES["imagem_midia"])) {
            if (isset($_FILES["imagem_midia"]["name"]) && $_FILES["imagem_midia"]["name"] == "") {
                $warnings[5] = "A imagem da mídia deve ser preenchida!";
                $erro = true;
            } elseif (isset($_FILES["imagem_midia"]["type"]) && ($_FILES["imagem_midia"]["type"] != "image/png" && $_FILES["imagem_midia"]["type"] != "image/jpeg")) {
                $warnings[5] = "Tipo de imagem inválido. Por favor, envie apenas arquivos PNG ou JPEG.";
                $erro = true;
            }
        }

        if ($erro === false) {
            $midiaGenero = new Genero($genero);
            $midiaCategoria = new Categoria($categoria);
            $midiaTemporada = new Temporada($temporada);

            $midia = new Midia(0, $titulo, $sinopse, $midiaGenero, $midiaCategoria, $midiaTemporada, $_FILES['imagem_midia']['name']);

            $midiaDAO = new MidiaDAO();

            $midiaDAO->insert_midia($midia);

            header("Location: " . $_SERVER['REQUEST_URI']); // redireciona para a mesma página em que está
            exit();
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/forms.css">
    <title>Cadastro de Midias</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Cadastro de Midias</h1>
        <a href="admin.php">Voltar</a>
        
        <div class="row">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?php echo isset($_POST['titulo']) ? htmlspecialchars($_POST['titulo']) : ''; ?>">
            <small><?php echo isset($warnings[0]) ? $warnings[0] : ''; ?></small>
        </div>

        <div class="row">
            <label for="sinopse">Sinopse:</label>
            <textarea name="sinopse" id="sinopse"><?php echo isset($_POST['sinopse']) ? htmlspecialchars($_POST['sinopse']) : ''; ?></textarea>
            <small><?php echo isset($warnings[1]) ? $warnings[1] : ''; ?></small>
        </div>

        <div class="row_selects">
            <div class="column">
                <label for="select_generos">Gênero:</label>
                <div class="custom-select-wrapper">
                    <select name="select_generos" id="select_generos">
                        <option value="0">Escolha um gênero</option>
                        <?php foreach ($generos as $gen): ?>
                            <option value="<?= $gen->id_genero; ?>" <?php echo isset($_POST['select_generos']) && $_POST['select_generos'] == $gen->id_genero ? 'selected' : ''; ?>>
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
            <small><?php echo isset($warnings[5]) ? $warnings[5] : ''; ?></small>
        </div>

        <div class="row_btn">
            <input type="submit" value="Salvar">
            <?php if (!isset($_POST['id_midia'])): ?>
                <input type="reset" value="Resetar">
            <?php endif; ?>    
        </div>
    </form>

    <script src="../../javascript/script.js"></script>

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