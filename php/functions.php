<?php
/* define('ROOT_PATH', dirname(__DIR__));

// Inclui os arquivos necessários usando caminhos absolutos

require_once ROOT_PATH . '/models/connect.php';
require_once ROOT_PATH . '/models/user_class.php';
require_once ROOT_PATH . '/models/userDAO.php';
require_once ROOT_PATH . '/models/categoria_class.php';
require_once ROOT_PATH . '/models/categoriaDAO.php';
require_once ROOT_PATH . '/models/genero_class.php';
require_once ROOT_PATH . '/models/generoDAO.php';
require_once ROOT_PATH . '/models/temporada_class.php';
require_once ROOT_PATH . '/models/temporadaDAO.php';
require_once ROOT_PATH . '/models/midia_class.php';
require_once ROOT_PATH . '/models/midiaDAO.php';
require_once ROOT_PATH . '/models/comentario_class.php';
require_once ROOT_PATH . '/models/comentarioDAO.php'; */


function login($username, $senha){
    $user = new User(id_usuario: 0, nome: '', username: $username, senha: $senha, perfil: '');
    $userDAO = new UserDAO();

    $user_login = $userDAO->verify_userLogin($user);

    if(count($user_login) == 1){
        $_SESSION['id_user'] = $user_login[0]->id_usuario;
        $_SESSION['nome'] = $user_login[0]->nome;
        $_SESSION['username'] = $user_login[0]->username;
        $_SESSION['perfil'] = $user_login[0]->perfil;

        return true;
    }

    return false;
}

function AllGeneros(){
    $generoDAO = new GeneroDAO();

    $generos = $generoDAO->getAllGeneros();

    return $generos;
}

function AllCategorias(){
    $categoriaDAO = new CategoriaDAO();

    $categorias = $categoriaDAO->getAllCategorias();

    return $categorias;
}

function AllTemporadas(){
    $temporadaDAO = new TemporadaDAO();

    $temporadas = $temporadaDAO->getAllTemporadas();

    return $temporadas;
}

function getIdByDescricao($descricao, $array) {
    foreach ($array as $item) {
        if ($item->descricao === $descricao) {
            return $item->id;
        }
    }
    return null;
}

function AllMidias(){
    $midiaDAO = new MidiaDAO();

    $midias = $midiaDAO->getAllMidias();

    return $midias;
}

function AllFilmes(){
    $midiaDAO = new MidiaDAO();

    $filmes = $midiaDAO->getAllFilmes();

    return $filmes;
}

function AllSeries(){
    $midiaDAO = new MidiaDAO();

    $series = $midiaDAO->getAllSeries();

    return $series;
}

function AllAnimes(){
    $midiaDAO = new MidiaDAO();

    $animes = $midiaDAO->getAllAnimes();

    return $animes;
}
?>
