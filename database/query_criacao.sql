CREATE DATABASE midiasdb;

USE midiasdb;

CREATE OR REPLACE TABLE usuarios(
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    username VARCHAR(20) UNIQUE NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(100) NOT NULL,
    imagem VARCHAR(250),
    perfil ENUM('usuario_comum','critico','administrador'),
    condicao ENUM('Ativo','Inativo')
);

CREATE TABLE generos(
    id_genero INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(50),
    condicao ENUM('Ativo','Inativo')
);

CREATE TABLE categorias(
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(50),
    condicao ENUM('Ativo','Inativo')
);

CREATE TABLE temporadas(
    id_temporada INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(20),
    condicao ENUM('Ativo','Inativo')
);

CREATE OR REPLACE TABLE  midias(
    id_midia INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
    sinopse VARCHAR(700),
    imagem VARCHAR(250),
    id_categoria INT,
    id_genero INT,
    id_temporada INT,
    condicao ENUM('Ativo','Inativo'),
    FOREIGN KEY (id_categoria) REFERENCES categorias (id_categoria),
    FOREIGN KEY (id_genero) REFERENCES generos (id_genero),
    FOREIGN KEY (id_temporada) REFERENCES temporadas (id_temporada)
);

CREATE OR REPLACE TABLE generos_favoritos(
    id_genero_fav INT AUTO_INCREMENT PRIMARY KEY,
    id_genero INT,
    id_usuario INT,
    FOREIGN KEY (id_genero) REFERENCES generos(id_genero),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);

CREATE OR REPLACE TABLE midias_favoritas(
    id_midia_fav INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_midia INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_midia) REFERENCES midias(id_midia)
);

CREATE OR REPLACE TABLE avaliacoes(
    id_avaliacao INT AUTO_INCREMENT PRIMARY KEY,
    avaliacao INT,
    id_usuario INT,
    id_midia INT, 
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_midia) REFERENCES midias(id_midia)
);

CREATE OR REPLACE TABLE comentarios(
    id_comentario INT AUTO_INCREMENT PRIMARY KEY,
    comentario VARCHAR(500),
    data_avaliacao DATE NOT NULL,
    hora_avaliacao TIME NOT NULL,
    id_usuario INT,
    id_midia INT, 
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
    FOREIGN KEY (id_midia) REFERENCES midias(id_midia)
);

CREATE OR REPLACE VIEW vw_midias AS 
SELECT m.id_midia 'id_midia',m.titulo 'titulo', m.sinopse 'sinopse', m.imagem 'imagem', c.descricao 'categoria', g.descricao 'genero', t.descricao 'temporada', m.condicao 'condicao'
FROM midias m INNER JOIN categorias c ON c.id_categoria = m.id_categoria INNER JOIN generos g ON g.id_genero = m.id_genero INNER JOIN temporadas t ON t.id_temporada = m.id_temporada

CREATE OR REPLACE VIEW vw_midias_filmes AS
SELECT m.id_midia 'id_midia',m.titulo 'titulo', m.sinopse 'sinopse', m.imagem 'imagem', c.descricao 'categoria', g.descricao 'genero', t.descricao 'temporada', m.condicao 'condicao'
FROM midias m INNER JOIN categorias c ON c.id_categoria = m.id_categoria INNER JOIN generos g ON g.id_genero = m.id_genero INNER JOIN temporadas t ON t.id_temporada = m.id_temporada
WHERE c.id_categoria = 1

CREATE OR REPLACE VIEW vw_midias_series AS
SELECT m.id_midia 'id_midia',m.titulo 'titulo', m.sinopse 'sinopse', m.imagem 'imagem', c.descricao 'categoria', g.descricao 'genero', t.descricao 'temporada', m.condicao 'condicao'
FROM midias m INNER JOIN categorias c ON c.id_categoria = m.id_categoria INNER JOIN generos g ON g.id_genero = m.id_genero INNER JOIN temporadas t ON t.id_temporada = m.id_temporada
WHERE c.id_categoria = 2

CREATE OR REPLACE VIEW vw_midias_animes AS
SELECT m.id_midia 'id_midia',m.titulo 'titulo', m.sinopse 'sinopse', m.imagem 'imagem', c.descricao 'categoria', g.descricao 'genero', t.descricao 'temporada', m.condicao 'condicao'
FROM midias m INNER JOIN categorias c ON c.id_categoria = m.id_categoria INNER JOIN generos g ON g.id_genero = m.id_genero INNER JOIN temporadas t ON t.id_temporada = m.id_temporada
WHERE c.id_categoria = 3

DROP DATABASE midiasdb;