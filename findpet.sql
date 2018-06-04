CREATE DATABASE `findpet`;
USE `findpet`;

CREATE TABLE `animal` (
  `idanimal` int(10) UNSIGNED NOT NULL,
  `especie` varchar(8) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `porte` varchar(8) NOT NULL,
  `cor` varchar(10) NOT NULL,
  `img` varchar(20) DEFAULT NULL,
  `tipo` varchar(12) NOT NULL,
  `descricao` tinytext NOT NULL,
  `nome` varchar(45) NOT NULL,
  `castrado` int(1) DEFAULT NULL,
  `idusuario` int(10) NOT NULL,
  `vacinado` int(1) DEFAULT NULL,
  `nascimento` DATE DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `depoimentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `iduser` int(10) NOT NULL,
  `texto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuario` (
  `idusuario` int(10) UNSIGNED NOT NULL,
  `nome` varchar(75) NOT NULL,
  `email` varchar(50) NOT NULL,
  `img` varchar(30) DEFAULT 'profile.jpg',
  `telefone` varchar(15) DEFAULT NULL,
  `senha` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `findpet`.`mapa` (
  `idmapa` INT(11) NOT NULL AUTO_INCREMENT,
  `idanimal` INT(11) NOT NULL,
  `latitude` FLOAT(15) NOT NULL,
  `longitude` FLOAT(15) NOT NULL,
  `idmapa` INT NOT NULL AUTO_INCREMENT,
  `idanimal` INT NOT NULL,
  `latitude` DECIMAL(20,16) NOT NULL,
  `longitude` DECIMAL(20,16) NOT NULL,
  PRIMARY KEY (`idmapa`),
  UNIQUE INDEX `idmapa_UNIQUE` (`idmapa` ASC));

CREATE TABLE `mensagem` (
  `id` int(11) NOT NULL,
  `id_de` int(11) NOT NULL,
  `id_para` int(11) NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `lido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `mensagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
ALTER TABLE `animal`
  ADD PRIMARY KEY (`idanimal`),
  ADD UNIQUE KEY `idanimal_UNIQUE` (`idanimal`);
  ALTER TABLE `animal` ADD `sexo` INT(1) NOT NULL AFTER `raca`;
ALTER TABLE `depoimentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `idusuario_UNIQUE` (`idusuario`);
ALTER TABLE `animal`
  MODIFY `idanimal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `depoimentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
ALTER TABLE `usuario`
  MODIFY `idusuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;