-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 10 Septembre 2014 à 05:17
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `g_annuaires`
--
CREATE DATABASE IF NOT EXISTS `g_annuaires` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `g_annuaires`;

-- --------------------------------------------------------

--
-- Structure de la table `effectuer`
--

CREATE TABLE IF NOT EXISTS `effectuer` (
  `MATRICULE` bigint(4) NOT NULL,
  `IDETS` bigint(4) NOT NULL,
  `THEME` varchar(128) NOT NULL,
  `DATE_DEBUT` date NOT NULL,
  `DATE_FIN` date NOT NULL,
  PRIMARY KEY (`MATRICULE`,`IDETS`),
  KEY `I_FK_EFFECTUER_ETUDIANTS` (`MATRICULE`),
  KEY `I_FK_EFFECTUER_ENTREPRISE` (`IDETS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
  `IDETS` bigint(4) NOT NULL,
  `NOM_ETS` varchar(128) NOT NULL,
  `SECTEUR_ACTIVITÉ` varchar(128) NOT NULL,
  `ADRESSE_ETS` varchar(128) DEFAULT NULL,
  `VILLE` varchar(128) NOT NULL,
  `PAYS` varchar(128) NOT NULL,
  `SITE_WEB_ETS` varchar(128) NOT NULL,
  `E_MAIL_ETS` varchar(128) NOT NULL,
  `PWD_ETS` varchar(128) NOT NULL,
  PRIMARY KEY (`IDETS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`IDETS`, `NOM_ETS`, `SECTEUR_ACTIVITÉ`, `ADRESSE_ETS`, `VILLE`, `PAYS`, `SITE_WEB_ETS`, `E_MAIL_ETS`, `PWD_ETS`) VALUES
(1001, 'UCB CAMEROUN', 'PRESTATAIRE DE SERVICE', '495 DOUALA', 'DOUALA', 'CANADA', 'www.contact@cpl.com', 'www.wazaconsulting@cpl.com', '033bd94b1168d7e4f0d644c3c95e35bf'),
(5446, '4', '465', '464', '64', '6', '4', '6', 'd9d4f495e875a2e075a1a4a6e1b9770f'),
(9402, 'Voila', 'Je suis', 'Torunto', 'Montreal', 'CAnada', 'test@cple', 'violance', '67409d947d2b8ecbed8451f85ad4eead'),
(445445, '454544', '4', '454', '4544544', '445444', '4', '4', 'e44fea3bec53bcea3b7513ccef5857ac'),
(4678554, '847', '877487', '87', '54', '484', '65', '46', 'a684eceee76fc522773286a895bc8436');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE IF NOT EXISTS `etudiants` (
  `MATRICULE` bigint(4) NOT NULL,
  `ID_FILI` bigint(4) NOT NULL,
  `NOM_ETD` varchar(128) NOT NULL,
  `PRENOM_ETD` varchar(128) NOT NULL,
  `DATE_NAISS` date DEFAULT NULL,
  `EMAIL_ETD` varchar(128) NOT NULL,
  `TEL_ETD` varchar(128) NOT NULL,
  `ADRESSE_ETD` varchar(128) DEFAULT NULL,
  `NIVEAU_ETUDE` varchar(128) NOT NULL,
  `CV` text NOT NULL,
  `PWD_ETD` varchar(128) NOT NULL,
  `LOGIN_EDT` varchar(128) NOT NULL,
   `Photo` varchar(128)  NULL,
  PRIMARY KEY (`MATRICULE`),
  KEY `I_FK_ETUDIANTS_FILIERE` (`ID_FILI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE IF NOT EXISTS `filiere` (
  `ID_FILI` bigint(4) NOT NULL,
  `NOM_FILI` varchar(128) NOT NULL,
  PRIMARY KEY (`ID_FILI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE IF NOT EXISTS `formations` (
  `ID_FORMA` bigint(4) NOT NULL,
  `ID_FILI` bigint(4) NOT NULL,
  `INTITULE_FORMA` varchar(128) NOT NULL,
  PRIMARY KEY (`ID_FORMA`),
  KEY `I_FK_FORMATIONS_FILIERE` (`ID_FILI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE IF NOT EXISTS `offre` (
  `ID_OFFRE` bigint(4) NOT NULL,
  `IDETS` bigint(4) NOT NULL,
  `INTITULÉ` varchar(128) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `TYPE_CANDIDATURE` varchar(128) DEFAULT NULL,
  `VALIDITE` varchar(128) NOT NULL,
  `DATE_DEPOT` char(32) NOT NULL,
  PRIMARY KEY (`ID_OFFRE`),
  KEY `I_FK_OFFRE_ENTREPRISE` (`IDETS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE IF NOT EXISTS `promotion` (
  `ID_PROMOTION` bigint(4) NOT NULL,
  `ID_FILI` bigint(4) NOT NULL,
  `ANNEE_PROMO` char(32) DEFAULT NULL,
  PRIMARY KEY (`ID_PROMOTION`),
  KEY `I_FK_PROMOTION_FILIERE` (`ID_FILI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `effectuer`
--
ALTER TABLE `effectuer`
  ADD CONSTRAINT `effectuer_ibfk_2` FOREIGN KEY (`IDETS`) REFERENCES `entreprise` (`IDETS`),
  ADD CONSTRAINT `effectuer_ibfk_1` FOREIGN KEY (`MATRICULE`) REFERENCES `etudiants` (`MATRICULE`);

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_ibfk_1` FOREIGN KEY (`ID_FILI`) REFERENCES `filiere` (`ID_FILI`);

--
-- Contraintes pour la table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_ibfk_1` FOREIGN KEY (`ID_FILI`) REFERENCES `filiere` (`ID_FILI`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `offre_ibfk_1` FOREIGN KEY (`IDETS`) REFERENCES `entreprise` (`IDETS`);

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`ID_FILI`) REFERENCES `filiere` (`ID_FILI`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
