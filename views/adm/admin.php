<?php
    require_once 'verify_adm.php';
    require_once 'php/functions.php';

    $userDAO = new UserDAO();

    $users = $userDAO->getAllUsers();

    $midias = AllMidias();
    $categorias = AllCategorias();
    $temporadas = AllTemporadas();
    $generos = AllGeneros();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <header class="adm">
        <div class="logo">Logo</div>
        <h1>Administração do site</h1>
        <a href="/filmes_projeto_mvc/logout">Sair</a>
        
    </header>
    
    
        <nav>
            <a href="#" js="links_adm" data-table="usuarios">Usuários</a>
            <a href="#" js="links_adm" data-table="midias">Mídias</a>
            <a href="#" js="links_adm" data-table="categorias">Categorias</a>
            <a href="#" js="links_adm" data-table="generos">Gêneros</a>
            <a href="#" js="links_adm" data-table="temporadas">Temporadas</a>
        </nav>
        
        <div class="main-content">
            
            <section class="table_sql" id="usuarios">
                <h2>Usuários</h2>
                <div class="table_container">
                    <div class="scroll_table">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID Usuário</th>
                                    <th>Nome</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Senha</th>
                                    <th>Perfil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user):?>
                                    <tr>
                                        <td><?= $user->id_usuario?></td>
                                        <td><?= $user->nome?></td>
                                        <td><?= $user->username?></td>
                                        <td><?= $user->email?></td>
                                        <td><?= $user->senha?></td>
                                        <td><?= $user->perfil?></td>
                                    </tr>
                                <?php endforeach;?>    
                                <!-- Adicione mais linhas conforme necessário -->
                            </tbody>
                        </table>
                    </div>
                    <div class="fixed_column">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user):?>
                                    <tr>
                                        <td><button class="edit">Editar</button><button class="status_inative">Inativar</button></td>
                                    </tr>
                                <?php endforeach;?>  
                    
                                <!-- Adicione mais linhas conforme necessário -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section class="table_sql" id="midias">
                <h2>Mídias</h2>
                <a href="formMidia.php">Novo +</a>
                <div class="table_container">

                    <div class="scroll_table">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID Midia</th>
                                    <th>Titulo</th>
                                    <th>Genero</th>
                                    <th>Categoria</th>
                                    <th>Temporada</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($midias as $midia):?>
                                    <tr>
                                        <td><?= $midia->id_midia?></td>
                                        <td><?= $midia->titulo?></td>
                                        <td><?= $midia->genero?></td>
                                        <td><?= $midia->categoria?></td>
                                        <td><?= $midia->temporada?></td>
                                    </tr>
                                <?php endforeach;?>    
                                <!-- Adicione mais linhas conforme necessário -->
                                </tbody>
                            </table>
                        </div>
                        <div class="fixed_column">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($midias as $midia):?>
                                        <tr>
                                            <td><button class="edit">Editar</button><button class="status_inative">Inativar</button></td>
                                        </tr>
                                    <?php endforeach;?>  
                        
                                    <!-- Adicione mais linhas conforme necessário -->
                                </tbody>
                            </table>
                        </div>
                    </div>
            </section>

            <section class="table_sql" id="categorias">
                <h2>Categorias</h2>
                <a href="formCategoria.php">Novo +</a>
                <div class="table_container">
                    <div class="scroll_table">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID Categoria</th>
                                    <th>Categoria</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($categorias as $cat):?>
                                    <tr>
                                        <td><?= $cat->id_categoria?></td>
                                        <td><?= $cat->descricao?></td>

                                    </tr>
                                <?php endforeach;?>    
                                <!-- Adicione mais linhas conforme necessário -->
                            </tbody>
                        </table>
                    </div>
                    <div class="fixed_column">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($categorias as $cat):?>
                                    <tr>
                                        <td><button class="edit">Editar</button><button class="status_inative">Inativar</button></td>
                                    </tr>
                                <?php endforeach;?>  
                    
                                <!-- Adicione mais linhas conforme necessário -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section class="table_sql" id="generos">
                <h2>Gêneros</h2>
                <a href="formGenero.php">Novo +</a>
                <div class="table_container">
                    <div class="scroll_table">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID Genero</th>
                                    <th>Genero</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($generos as $gen):?>
                                    <tr>
                                        <td><?= $gen->id_genero?></td>
                                        <td><?= $gen->descricao?></td>

                                    </tr>
                                <?php endforeach;?>    
                           
                            </tbody>
                        </table>
                    </div>
                    <div class="fixed_column">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($generos as $gen):?>
                                    <tr>
                                        <td><button class="edit">Editar</button><button class="status_inative">Inativar</button></td>
                                    </tr>
                                <?php endforeach;?>  
                    
                         
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section class="table_sql" id="temporadas">
                <h2>Temporadas</h2>
                <a href="formTemporada.php">Novo +</a>
                <div class="table_container">
                    <div class="scroll_table">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID Temporada</th>
                                    <th>Temporada</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($temporadas as $temp):?>
                                    <tr>
                                        <td><?= $temp->id_temporada?></td>
                                        <td><?= $temp->descricao?></td>

                                    </tr>
                                <?php endforeach;?>    
                             
                            </tbody>
                        </table>
                    </div>
                    <div class="fixed_column">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($temporadas as $temp):?>
                                    <tr>
                                        <td><button class="edit">Editar</button><button class="status_inative">Inativar</button></td>
                                    </tr>
                                <?php endforeach;?>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </section> 
        </div>
    <footer>
        &copy; João Paulo - projeto de navegação e interação
    </footer>
    <script src="javascript/script.js"></script>
</body>
</html>