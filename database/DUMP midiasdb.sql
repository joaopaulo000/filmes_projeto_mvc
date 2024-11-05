/*
SQLyog Enterprise - MySQL GUI v8.12 
MySQL - 5.5.5-10.4.32-MariaDB : Database - midiasdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`midiasdb` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `midiasdb`;

/*Table structure for table `avaliacoes` */

DROP TABLE IF EXISTS `avaliacoes`;

CREATE TABLE `avaliacoes` (
  `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `avaliacao` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_midia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_avaliacao`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_midia` (`id_midia`),
  CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `avaliacoes_ibfk_2` FOREIGN KEY (`id_midia`) REFERENCES `midias` (`id_midia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `avaliacoes` */

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT NULL,
  `condicao` enum('Ativo','Inativo') DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `categorias` */

insert  into `categorias`(`id_categoria`,`descricao`,`condicao`) values (1,'Filme','Ativo'),(2,'Serie','Ativo'),(3,'Anime','Ativo');

/*Table structure for table `comentarios` */

DROP TABLE IF EXISTS `comentarios`;

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(500) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_midia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_midia` (`id_midia`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_midia`) REFERENCES `midias` (`id_midia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `comentarios` */

/*Table structure for table `generos` */

DROP TABLE IF EXISTS `generos`;

CREATE TABLE `generos` (
  `id_genero` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT NULL,
  `condicao` enum('Ativo','Inativo') DEFAULT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `generos` */

insert  into `generos`(`id_genero`,`descricao`,`condicao`) values (1,'Aventura','Ativo'),(2,'Drama','Ativo'),(3,'Animacao','Ativo');

/*Table structure for table `generos_favoritos` */

DROP TABLE IF EXISTS `generos_favoritos`;

CREATE TABLE `generos_favoritos` (
  `id_genero_fav` int(11) NOT NULL AUTO_INCREMENT,
  `id_genero` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_genero_fav`),
  KEY `id_genero` (`id_genero`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `generos_favoritos_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`),
  CONSTRAINT `generos_favoritos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `generos_favoritos` */

/*Table structure for table `midias` */

DROP TABLE IF EXISTS `midias`;

CREATE TABLE `midias` (
  `id_midia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `sinopse` varchar(700) DEFAULT NULL,
  `imagem` varchar(250) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_genero` int(11) DEFAULT NULL,
  `id_temporada` int(11) DEFAULT NULL,
  `condicao` enum('Ativo','Inativo') DEFAULT NULL,
  PRIMARY KEY (`id_midia`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_genero` (`id_genero`),
  KEY `id_temporada` (`id_temporada`),
  CONSTRAINT `midias_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
  CONSTRAINT `midias_ibfk_2` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id_genero`),
  CONSTRAINT `midias_ibfk_3` FOREIGN KEY (`id_temporada`) REFERENCES `temporadas` (`id_temporada`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `midias` */

insert  into `midias`(`id_midia`,`titulo`,`sinopse`,`imagem`,`id_categoria`,`id_genero`,`id_temporada`,`condicao`) values (7,'Divertidamente ','Com a mudanÃ§a para uma nova cidade, as emoÃ§Ãµes de Riley, que tem apenas 11 anos de idade, ficam extremamente agitadas. Uma confusÃ£o na sala de controle do seu cÃ©rebro deixa a Alegria e a Tristeza de fora, afetando a vida de Riley radicalmente.','divertidamente.jpg',1,3,3,'Ativo'),(8,'Divertidamente 2','Com um salto temporal, Riley se encontra mais velha, passando pela tÃ£o temida adolescÃªncia. Junto com o amadurecimento, a sala de controle tambÃ©m estÃ¡ passando por uma adaptaÃ§Ã£o para dar lugar a algo totalmente inesperado: novas emoÃ§Ãµes. As jÃ¡ conhecidas, Alegria, Raiva, Medo, Nojinho e Tristeza nÃ£o tÃªm certeza de como se sentir quando novos inquilinos chegam ao local.','divertidamente.jpg',1,3,3,'Ativo'),(9,'Game of Thrones','Eddard Stark, aprisionado e acusado de traiÃ§Ã£o, toma uma fatÃ­dica decisÃ£o. Sua esposa Catelyn negocia com o traiÃ§oeiro Lorde Walder Frey, e seu filho Robb luta sua primeira batalha contra os Lannister. Enquanto isso, Jon descobre um segredo sobre Meistre Aemon, e Daenerys se posiciona contra Qotho.','Game_of_Thrones_Temporada_1_Poster.jpg',2,2,4,'Ativo'),(10,'Game of Thrones','Na Fortaleza Vermelha, Tyrion planeja trÃªs alianÃ§as atravÃ©s da promessa de casamento. Catelyn chega Ã s Terras da Tempestade para forjar sua prÃ³pria alianÃ§a. Mas o Rei Renly, sua nova esposa Margaery e seu irmÃ£o Loras Tyrell tem outros planos. Em Winterfell, Luwin tenta decifrar os sonhos de Bran.','game_of_thrones_temp2.jpg',2,2,5,'Ativo'),(11,'Demon Slayer','Em um JapÃ£o do perÃ­odo Taisho, Tanjiro Kamado, um bondoso e inteligente garoto que vende carvÃ£o para sustentar sua famÃ­lia, vÃª sua vida mudar abruptamente quando sua famÃ­lia Ã© massacrada por demÃ´nios e sua Ãºnica irmÃ£ sobrevivente, Nezuko, Ã© transformada em um demÃ´nio. Determinado a salvar sua irmÃ£ e vingar sua famÃ­lia, Tanjiro se torna um CaÃ§ador de DemÃ´nios e embarca em uma jornada para erradicar os demÃ´nios e encontrar uma cura para Nezuko.\r\n\r\nAo longo de sua jornada, Tanjiro se junta aos CaÃ§adores de DemÃ´nios e se torna amigo de guerreiros poderosos como Zenitsu Agatsuma e Inosuke Hashibira. Enfrentando adversidades terrÃ­veis e poderosos demÃ´nios, Tanjiro descobre mai','demon_slayer_s1.jpg',3,3,4,'Ativo'),(12,'Demon Slayer','Tanjiro, Zenitsu e Inosuke acompanham o Pilar do Som, Uzui, em uma missÃ£o em Yoshiwara, para ajudar na busca de suas esposas desaparecidas que estavam investigando rumores sobre Onis no distrito do entretenimento.','demon_slayer_s2.jpg',3,3,5,'Ativo');

/*Table structure for table `midias_favoritas` */

DROP TABLE IF EXISTS `midias_favoritas`;

CREATE TABLE `midias_favoritas` (
  `id_midia_fav` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_midia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_midia_fav`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_midia` (`id_midia`),
  CONSTRAINT `midias_favoritas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `midias_favoritas_ibfk_2` FOREIGN KEY (`id_midia`) REFERENCES `midias` (`id_midia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `midias_favoritas` */

/*Table structure for table `temporadas` */

DROP TABLE IF EXISTS `temporadas`;

CREATE TABLE `temporadas` (
  `id_temporada` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) DEFAULT NULL,
  `condicao` enum('Ativo','Inativo') DEFAULT NULL,
  PRIMARY KEY (`id_temporada`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `temporadas` */

insert  into `temporadas`(`id_temporada`,`descricao`,`condicao`) values (3,'Nao possui','Ativo'),(4,'1Âª Temporada','Ativo'),(5,'2Âª Temporada','Ativo');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `imagem` varchar(250) DEFAULT NULL,
  `perfil` enum('usuario_comum','critico','administrador') DEFAULT NULL,
  `condicao` enum('Ativo','Inativo') DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_usuario`,`nome`,`username`,`email`,`senha`,`imagem`,`perfil`,`condicao`) values (1,'joaopaulo','joaopaulo','jao@gmail.com','202cb962ac59075b964b07152d234b70',NULL,'usuario_comum','Ativo'),(2,'joaoadm','joaoadmin','jao@gmail.com','202cb962ac59075b964b07152d234b70',NULL,'administrador','Ativo');

/*Table structure for table `vw_midias` */

DROP TABLE IF EXISTS `vw_midias`;

/*!50001 DROP VIEW IF EXISTS `vw_midias` */;
/*!50001 DROP TABLE IF EXISTS `vw_midias` */;

/*!50001 CREATE TABLE `vw_midias` (
  `id_midia` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `sinopse` varchar(700) DEFAULT NULL,
  `imagem` varchar(250) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `temporada` varchar(20) DEFAULT NULL,
  `condicao` enum('Ativo','Inativo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci */;

/*Table structure for table `vw_midias_animes` */

DROP TABLE IF EXISTS `vw_midias_animes`;

/*!50001 DROP VIEW IF EXISTS `vw_midias_animes` */;
/*!50001 DROP TABLE IF EXISTS `vw_midias_animes` */;

/*!50001 CREATE TABLE `vw_midias_animes` (
  `id_midia` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `sinopse` varchar(700) DEFAULT NULL,
  `imagem` varchar(250) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `temporada` varchar(20) DEFAULT NULL,
  `condicao` enum('Ativo','Inativo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci */;

/*Table structure for table `vw_midias_filmes` */

DROP TABLE IF EXISTS `vw_midias_filmes`;

/*!50001 DROP VIEW IF EXISTS `vw_midias_filmes` */;
/*!50001 DROP TABLE IF EXISTS `vw_midias_filmes` */;

/*!50001 CREATE TABLE `vw_midias_filmes` (
  `id_midia` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `sinopse` varchar(700) DEFAULT NULL,
  `imagem` varchar(250) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `temporada` varchar(20) DEFAULT NULL,
  `condicao` enum('Ativo','Inativo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci */;

/*Table structure for table `vw_midias_series` */

DROP TABLE IF EXISTS `vw_midias_series`;

/*!50001 DROP VIEW IF EXISTS `vw_midias_series` */;
/*!50001 DROP TABLE IF EXISTS `vw_midias_series` */;

/*!50001 CREATE TABLE `vw_midias_series` (
  `id_midia` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `sinopse` varchar(700) DEFAULT NULL,
  `imagem` varchar(250) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `temporada` varchar(20) DEFAULT NULL,
  `condicao` enum('Ativo','Inativo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci */;

/*View structure for view vw_midias */

/*!50001 DROP TABLE IF EXISTS `vw_midias` */;
/*!50001 DROP VIEW IF EXISTS `vw_midias` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_midias` AS select `m`.`id_midia` AS `id_midia`,`m`.`titulo` AS `titulo`,`m`.`sinopse` AS `sinopse`,`m`.`imagem` AS `imagem`,`c`.`descricao` AS `categoria`,`g`.`descricao` AS `genero`,`t`.`descricao` AS `temporada`,`m`.`condicao` AS `condicao` from (((`midias` `m` join `categorias` `c` on(`c`.`id_categoria` = `m`.`id_categoria`)) join `generos` `g` on(`g`.`id_genero` = `m`.`id_genero`)) join `temporadas` `t` on(`t`.`id_temporada` = `m`.`id_temporada`)) */;

/*View structure for view vw_midias_animes */

/*!50001 DROP TABLE IF EXISTS `vw_midias_animes` */;
/*!50001 DROP VIEW IF EXISTS `vw_midias_animes` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_midias_animes` AS select `m`.`id_midia` AS `id_midia`,`m`.`titulo` AS `titulo`,`m`.`sinopse` AS `sinopse`,`m`.`imagem` AS `imagem`,`c`.`descricao` AS `categoria`,`g`.`descricao` AS `genero`,`t`.`descricao` AS `temporada`,`m`.`condicao` AS `condicao` from (((`midias` `m` join `categorias` `c` on(`c`.`id_categoria` = `m`.`id_categoria`)) join `generos` `g` on(`g`.`id_genero` = `m`.`id_genero`)) join `temporadas` `t` on(`t`.`id_temporada` = `m`.`id_temporada`)) where `c`.`id_categoria` = 3 */;

/*View structure for view vw_midias_filmes */

/*!50001 DROP TABLE IF EXISTS `vw_midias_filmes` */;
/*!50001 DROP VIEW IF EXISTS `vw_midias_filmes` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_midias_filmes` AS select `m`.`id_midia` AS `id_midia`,`m`.`titulo` AS `titulo`,`m`.`sinopse` AS `sinopse`,`m`.`imagem` AS `imagem`,`c`.`descricao` AS `categoria`,`g`.`descricao` AS `genero`,`t`.`descricao` AS `temporada`,`m`.`condicao` AS `condicao` from (((`midias` `m` join `categorias` `c` on(`c`.`id_categoria` = `m`.`id_categoria`)) join `generos` `g` on(`g`.`id_genero` = `m`.`id_genero`)) join `temporadas` `t` on(`t`.`id_temporada` = `m`.`id_temporada`)) where `c`.`id_categoria` = 1 */;

/*View structure for view vw_midias_series */

/*!50001 DROP TABLE IF EXISTS `vw_midias_series` */;
/*!50001 DROP VIEW IF EXISTS `vw_midias_series` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_midias_series` AS select `m`.`id_midia` AS `id_midia`,`m`.`titulo` AS `titulo`,`m`.`sinopse` AS `sinopse`,`m`.`imagem` AS `imagem`,`c`.`descricao` AS `categoria`,`g`.`descricao` AS `genero`,`t`.`descricao` AS `temporada`,`m`.`condicao` AS `condicao` from (((`midias` `m` join `categorias` `c` on(`c`.`id_categoria` = `m`.`id_categoria`)) join `generos` `g` on(`g`.`id_genero` = `m`.`id_genero`)) join `temporadas` `t` on(`t`.`id_temporada` = `m`.`id_temporada`)) where `c`.`id_categoria` = 2 */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
