<?php
    class MidiaController{
        public function form(){

            require_once 'php/functions.php';

            $categorias = AllCategorias();
            $generos = AllGeneros();
            $temporadas = AllTemporadas();
        
            require_once 'views/adm/formMidia.php';
        }

        public function insert(){
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
        
                    header("Location:/filmes_projeto_mvc/adm/formMidia");
                    exit();
                }

            }

            require_once 'views/adm/formMidia.php';
        }

        public function get_edit(){

            require_once 'php/functions.php';

            $categorias = AllCategorias();
            $generos = AllGeneros();
            $temporadas = AllTemporadas();

            if(isset($_GET['id'])){
                $midiaDAO = new MidiaDAO();

                $midia = $midiaDAO->get_midia_id($_GET['id']);
            }

            require_once 'views/adm/editMidia.php';
        }

        public function update(){
            $warnings = ['','','','','',''];
            $erro = false;
        
        
        
            if($_POST){
                $titulo = $_POST['titulo'];
                $sinopse = $_POST['sinopse'];
                $genero = $_POST['select_generos'];
                $categoria = $_POST['select_categorias'];
                $temporada =  isset($_POST['select_temporadas']) ? $_POST['select_temporadas'] : '3';
                $imagem = $_POST["img_db"];
        
        
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
                        $imagem = $_FILES['imagem_midia']['name'];
                        $warnings[5] = "A imagem da mídia deve ser preenchida!";
                        $erro = true;
                    } elseif (isset($_FILES["imagem_midia"]["type"]) && ($_FILES["imagem_midia"]["type"] != "image/png" && $_FILES["imagem_midia"]["type"] != "image/jpeg")) {
                        $warnings[5] = "Tipo de imagem inválido. Por favor, envie apenas arquivos PNG ou JPEG.";
                        $erro = true;
                    }
                }

                if($erro === false){
                    $midiaGenero = new Genero($genero);
                    $midiaCategoria = new Categoria($categoria);
                    $midiaTemporada = new Temporada($temporada);
        
                    $midia = new Midia(0, $titulo, $sinopse, $midiaGenero, $midiaCategoria, $midiaTemporada, $_FILES['imagem_midia']['name']);
        
                    $midiaDAO = new MidiaDAO();
        
                    $midiaDAO->update_midia($midia);
        
                    header("Location:/filmes_projeto_mvc/adm");
                    exit();
                }
            }
        }
    }   
?>