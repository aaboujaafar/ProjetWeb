-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 18 Avril 2017 à 15:45
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
  MODIFY `IDJOUEUR` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT pour la table `main`
--
ALTER TABLE `main`
  MODIFY `IDMAIN` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `partie`
--
ALTER TABLE `partie`
  MODIFY `IDPARTIE` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
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
