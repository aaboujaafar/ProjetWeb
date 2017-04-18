-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 18 Avril 2017 à 20:10
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sixquiprend`
--

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

CREATE TABLE `amis` (
  `IDJOUEUR` int(5) NOT NULL,
  `IDAMIS` int(5) NOT NULL,
  `DEMANDE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `amis`
--

INSERT INTO `amis` (`IDJOUEUR`, `IDAMIS`, `DEMANDE`) VALUES
(1, 2, 0),
(1, 3, 0),
(1, 4, 0),
(1, 5, 0),
(1, 6, 0),
(1, 7, 0),
(1, 8, 0),
(1, 9, 0),
(1, 146, 0),
(1, 153, 0),
(1, 160, 0),
(1, 161, 0),
(2, 146, 1),
(5, 146, 0),
(6, 146, 0),
(7, 146, 0),
(9, 146, 1),
(146, 1, 0),
(146, 5, 0),
(146, 6, 0),
(146, 7, 0),
(146, 161, 0),
(153, 1, 0),
(160, 1, 0),
(160, 146, 1),
(161, 1, 0),
(161, 24, 1),
(161, 146, 0);

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

CREATE TABLE `carte` (
  `NUMERO` int(11) NOT NULL,
  `POINT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `carte`
--

INSERT INTO `carte` (`NUMERO`, `POINT`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 3),
(11, 5),
(12, 1),
(13, 1),
(14, 1),
(15, 2),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 3),
(21, 1),
(22, 5),
(23, 1),
(24, 1),
(25, 2),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 3),
(31, 1),
(32, 1),
(33, 5),
(34, 1),
(35, 2),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 3),
(41, 1),
(42, 1),
(43, 1),
(44, 5),
(45, 2),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 3),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 7),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 3),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 2),
(66, 5),
(67, 1),
(68, 1),
(69, 1),
(70, 3),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 2),
(76, 1),
(77, 5),
(78, 1),
(79, 1),
(80, 3),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 2),
(86, 1),
(87, 1),
(88, 5),
(89, 1),
(90, 3),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 2),
(96, 1),
(97, 1),
(98, 1),
(99, 5),
(100, 3),
(101, 1),
(102, 1),
(103, 1),
(104, 1);

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

CREATE TABLE `contient` (
  `IDMAIN` int(11) NOT NULL,
  `NUMERO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contient`
--

INSERT INTO `contient` (`IDMAIN`, `NUMERO`) VALUES
(15, 2),
(15, 10),
(16, 12),
(15, 13),
(15, 16),
(17, 21),
(16, 23),
(19, 23),
(17, 24),
(17, 25),
(18, 25),
(14, 26),
(19, 30),
(14, 31),
(19, 38),
(17, 39),
(14, 41),
(19, 41),
(17, 42),
(18, 42),
(17, 43),
(15, 45),
(15, 46),
(15, 47),
(14, 48),
(18, 49),
(15, 51),
(15, 52),
(16, 53),
(18, 55),
(19, 58),
(18, 60),
(18, 61),
(14, 64),
(14, 68),
(18, 70),
(16, 71),
(19, 71),
(14, 74),
(17, 76),
(16, 77),
(14, 83),
(18, 83),
(16, 87),
(16, 88),
(16, 89),
(16, 92),
(19, 94),
(14, 96),
(16, 97),
(15, 99),
(17, 101),
(19, 101),
(17, 102),
(19, 102),
(14, 103),
(18, 103);

-- --------------------------------------------------------

--
-- Structure de la table `inviter`
--

CREATE TABLE `inviter` (
  `IDPARTIE` int(11) NOT NULL,
  `IDJOUEUR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inviter`
--

INSERT INTO `inviter` (`IDPARTIE`, `IDJOUEUR`) VALUES
(28, 3),
(28, 9),
(41, 161);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `PSEUDO` varchar(20) NOT NULL,
  `MDP` varchar(20) NOT NULL,
  `ADRESSEMAIL` varchar(50) NOT NULL,
  `NBRPARTIEJOUEE` int(6) DEFAULT '0',
  `NBRPARTIEGAGNEE` int(6) DEFAULT '0',
  `IDJOUEUR` int(9) NOT NULL,
  `NOM` varchar(25) DEFAULT NULL,
  `PRENOM` varchar(25) DEFAULT NULL,
  `PHOTOCOVER` varchar(100) NOT NULL DEFAULT 'photo/anonymous-imgCover.png',
  `PHOTOPROFIL` varchar(100) NOT NULL DEFAULT 'photo/anonymous-imgPicture.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`PSEUDO`, `MDP`, `ADRESSEMAIL`, `NBRPARTIEJOUEE`, `NBRPARTIEGAGNEE`, `IDJOUEUR`, `NOM`, `PRENOM`, `PHOTOCOVER`, `PHOTOPROFIL`) VALUES
('tanakal', 'mdptanakal', 'tanakal@minesdedouai.fr', 34, 28, 1, NULL, NULL, 'photo/tanakal-imgCover.png', 'photo/tanakal-imgPicture.png'),
('valentine', 'laTug', 'valentine@minesdedouai.fr', 0, 0, 2, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('claire', 'TheLast', 'claire@minesdedouai.fr', 0, 0, 3, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('Nicolas', 'Power', 'nicolas@minesdedouai.fr', 0, 0, 4, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('Ayoub', 'CrakerPro', 'ayoub@minesdedouai.fr', 0, 0, 5, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('Yann', '42GoalMan', 'yann@minesdedouai.fr', 0, 0, 6, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('Vincent', 'Stranger', 'vincent@minesdedouai.fr', 0, 0, 7, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('Clement', 'MonieurVenini', 'clement@minesdedouai.fr', 0, 0, 8, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('Adrien', 'loliPower', 'adrien@minesdedouai.fr', 0, 0, 9, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('Yvain', 'MagikMaster', 'Yvain@minesdedouai.fr', 0, 0, 10, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('Alphonse', 'DansLeTas', 'Alphonse@minesdedouai.fr', 0, 0, 11, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('Paul', 'Potiron', 'Paul@minesdedouai.fr', 0, 0, 12, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('evoli', 'AttraperLesTous', 'evoli@minesdedouai.fr', 0, 0, 13, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('JeSuis', 'TonPere', 'jesuis@minesdedouai.fr', 0, 0, 14, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('gollum', 'MonPrecieux', 'gollum@minesdedouai.fr', 0, 0, 15, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('Potter', 'Serpentard', 'Potter@minesdedouai.fr', 0, 0, 16, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('obama', 'MaisonBl', 'obama@minesdedouai.fr', 0, 0, 17, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('carlos', 'LeCalamar', 'carlos@minesdedouai.fr', 0, 0, 18, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('Jean', 'treprend', 'jean@minesdedouai.fr', 0, 0, 19, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('Thierry', 'azerty', 'thierry@minesdedouai.fr', 0, 0, 20, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('Thierry_junior', 'ytreza', 'thierry@minesdedouai.fr', 0, 0, 21, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('Mark', '0000', 'mark@minesdedouai.fr', 0, 0, 22, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('Bernard', 'mdr', 'bernard@minesdedouai.fr', 0, 0, 23, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('admin', 'admin', 'admin@minesdedouai.fr', 0, 0, 24, NULL, NULL, 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('a', 'a', 'a@a', 27, 2, 146, 'aaa', 'a', 'photo/a-imgCover.png', 'photo/a-imgPicture.png'),
('jim', 'mdpjim', 'j@j', 0, 0, 160, 'jim', 'ram', 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png'),
('user', 'user', 'prof@imt-lille-douai.douaiCLaMeilleur', 0, 0, 161, 'user', 'user', 'photo/anonymous-imgCover.png', 'photo/anonymous-imgPicture.png');

-- --------------------------------------------------------

--
-- Structure de la table `main`
--

CREATE TABLE `main` (
  `IDMAIN` int(8) NOT NULL,
  `IDJOUEUR` int(9) NOT NULL,
  `IDPARTIE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `main`
--

INSERT INTO `main` (`IDMAIN`, `IDJOUEUR`, `IDPARTIE`) VALUES
(14, 1, 29),
(15, 5, 29),
(16, 7, 29),
(17, 146, 29),
(18, 1, 39),
(19, 161, 39);

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE `participe` (
  `IDJOUEUR` int(11) NOT NULL,
  `IDPARTIE` int(11) NOT NULL,
  `SCORE` decimal(8,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `participe`
--

INSERT INTO `participe` (`IDJOUEUR`, `IDPARTIE`, `SCORE`) VALUES
(1, 28, '0'),
(1, 29, '0'),
(1, 31, '0'),
(1, 39, '0'),
(1, 41, '0'),
(5, 28, '0'),
(5, 29, '0'),
(6, 28, '0'),
(7, 29, '0'),
(24, 28, '0'),
(24, 35, '0'),
(24, 36, '0'),
(146, 29, '0'),
(146, 31, '0'),
(146, 32, '0'),
(146, 33, '0'),
(146, 34, '0'),
(146, 40, '0'),
(161, 37, '0'),
(161, 38, '0'),
(161, 39, '0'),
(161, 40, '0');

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE `partie` (
  `IDPARTIE` int(9) NOT NULL,
  `IDJOUEUR` int(9) NOT NULL,
  `PUBLIQUE` tinyint(1) NOT NULL,
  `ENCOURS` tinyint(1) NOT NULL,
  `NOMPARTIE` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `partie`
--

INSERT INTO `partie` (`IDPARTIE`, `IDJOUEUR`, `PUBLIQUE`, `ENCOURS`, `NOMPARTIE`) VALUES
(28, 1, 1, 0, 'gameTanakal'),
(29, 1, 0, 1, 'BoucleInfini'),
(31, 146, 0, 0, 'partieDeA'),
(32, 146, 1, 0, 'partieDeAPublique'),
(33, 146, 0, 0, '6 Qui ramasse'),
(34, 146, 0, 0, 'test'),
(35, 24, 1, 0, 'PartieAdmin'),
(36, 24, 0, 0, '2emePartieAdmin'),
(37, 161, 0, 0, 'privatePartieMienne'),
(38, 161, 0, 0, 'PartieUser'),
(39, 1, 0, 1, 'PartieContreUser'),
(40, 146, 0, 0, 'partieVsUser'),
(41, 1, 0, 0, 'lastButNotTheLeast');

-- --------------------------------------------------------

--
-- Structure de la table `poserpile`
--

CREATE TABLE `poserpile` (
  `NUMERO` int(11) NOT NULL,
  `IDPARTIE` int(11) NOT NULL,
  `COLONNE` decimal(1,0) NOT NULL,
  `PILE` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `poserpile`
--

INSERT INTO `poserpile` (`NUMERO`, `IDPARTIE`, `COLONNE`, `PILE`) VALUES
(5, 39, '2', 1),
(6, 39, '3', 1),
(9, 29, '2', 1),
(32, 29, '1', 1),
(34, 29, '5', 146),
(40, 39, '3', 2),
(54, 39, '1', 1),
(57, 39, '4', 1),
(75, 29, '4', 1),
(84, 29, '3', 1),
(99, 39, '4', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `amis`
--
ALTER TABLE `amis`
  ADD PRIMARY KEY (`IDJOUEUR`,`IDAMIS`);

--
-- Index pour la table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`NUMERO`);

--
-- Index pour la table `contient`
--
ALTER TABLE `contient`
  ADD PRIMARY KEY (`IDMAIN`,`NUMERO`),
  ADD KEY `FK_CONTIENT2` (`NUMERO`);

--
-- Index pour la table `inviter`
--
ALTER TABLE `inviter`
  ADD PRIMARY KEY (`IDPARTIE`,`IDJOUEUR`),
  ADD KEY `FK_INVITER2` (`IDJOUEUR`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`IDJOUEUR`);

--
-- Index pour la table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`IDMAIN`),
  ADD KEY `FK_APPARTIENT` (`IDPARTIE`),
  ADD KEY `FK_POSSEDE` (`IDJOUEUR`);

--
-- Index pour la table `participe`
--
ALTER TABLE `participe`
  ADD PRIMARY KEY (`IDJOUEUR`,`IDPARTIE`),
  ADD KEY `FK_PARTICIPE2` (`IDPARTIE`);

--
-- Index pour la table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`IDPARTIE`),
  ADD KEY `FK_CREER` (`IDJOUEUR`);

--
-- Index pour la table `poserpile`
--
ALTER TABLE `poserpile`
  ADD PRIMARY KEY (`NUMERO`,`IDPARTIE`),
  ADD KEY `FK_POSERPILE2` (`IDPARTIE`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `IDJOUEUR` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;
--
-- AUTO_INCREMENT pour la table `main`
--
ALTER TABLE `main`
  MODIFY `IDMAIN` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `partie`
--
ALTER TABLE `partie`
  MODIFY `IDPARTIE` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `FK_CONTIENT` FOREIGN KEY (`IDMAIN`) REFERENCES `main` (`IDMAIN`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CONTIENT2` FOREIGN KEY (`NUMERO`) REFERENCES `carte` (`NUMERO`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `inviter`
--
ALTER TABLE `inviter`
  ADD CONSTRAINT `FK_INVITER` FOREIGN KEY (`IDPARTIE`) REFERENCES `partie` (`IDPARTIE`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_INVITER2` FOREIGN KEY (`IDJOUEUR`) REFERENCES `joueur` (`IDJOUEUR`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `main`
--
ALTER TABLE `main`
  ADD CONSTRAINT `FK_APPARTIENT` FOREIGN KEY (`IDPARTIE`) REFERENCES `partie` (`IDPARTIE`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_POSSEDE` FOREIGN KEY (`IDJOUEUR`) REFERENCES `joueur` (`IDJOUEUR`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `participe`
--
ALTER TABLE `participe`
  ADD CONSTRAINT `FK_PARTICIPE` FOREIGN KEY (`IDJOUEUR`) REFERENCES `joueur` (`IDJOUEUR`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PARTICIPE2` FOREIGN KEY (`IDPARTIE`) REFERENCES `partie` (`IDPARTIE`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `FK_CREER` FOREIGN KEY (`IDJOUEUR`) REFERENCES `joueur` (`IDJOUEUR`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `poserpile`
--
ALTER TABLE `poserpile`
  ADD CONSTRAINT `FK_POSERPILE` FOREIGN KEY (`NUMERO`) REFERENCES `carte` (`NUMERO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_POSERPILE2` FOREIGN KEY (`IDPARTIE`) REFERENCES `partie` (`IDPARTIE`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
