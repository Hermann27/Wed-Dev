-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Jeu 11 Avril 2013 à 12:56
-- Version du serveur: 5.1.41
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `pharmacie`
--

-- --------------------------------------------------------

--
-- Structure de la table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `auth`
--
INSERT INTO `auth` (`ID`, `identifiant`, `pass`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure de la table `cdes`
--

CREATE TABLE IF NOT EXISTS `cdes` (
  `IdCde` tinyint(5) unsigned NOT NULL AUTO_INCREMENT,
  `produits` varchar(200) NOT NULL DEFAULT '''''',
  `montantcde` float unsigned NOT NULL DEFAULT '0',
  `nomPrenomCli` varchar(100) NOT NULL DEFAULT '''''',
  `adressecli` varchar(30) NOT NULL DEFAULT '''''',
  `dateCde` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`IdCde`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `cdes`
--


-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PRENOM` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TEL` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADRESSE` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`ID`, `NOM`, `PRENOM`, `TEL`, `ADRESSE`) VALUES
(1, 'Moyap Tchokouassi', 'Rachel', '74 62 36 83', 'Deïdo'),
(2, 'DjoumDjeu', 'Herman', '23 34 23 22', 'Logbessou'),
(3, 'Nana', 'Sandrine', '74 45 34 33', 'Akwa'),
(4, 'Mbiabo', 'Junior', '98 78 34 55', 'Akwa'),
(5, 'Tchatchoua', 'Gaël', '74 56 56 55', 'Deïdo');

-- --------------------------------------------------------

--
-- Structure de la table `commander`
--

CREATE TABLE IF NOT EXISTS `commander` (
  `ID_PHRAMACIE` int(11) NOT NULL,
  `ID_MEDICAMENT` int(11) NOT NULL,
  `ID_CLIENT` int(11) NOT NULL,
  `QUANTITÉ` int(11) DEFAULT NULL,
  `DATECOMMANDE` date DEFAULT NULL,
  PRIMARY KEY (`ID_PHRAMACIE`,`ID_MEDICAMENT`,`ID_CLIENT`),
  KEY `I_FK_COMMANDER_MEDICAMENT` (`ID_MEDICAMENT`),
  KEY `I_FK_COMMANDER_CLIENT` (`ID_CLIENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `commander`
--


-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE IF NOT EXISTS `medicament` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forme` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PU` double DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

--
-- Contenu de la table `medicament`
--

INSERT INTO `medicament` (`ID`, `NOM`, `forme`, `PU`) VALUES
(1, 'ALFATIL LP 500MG', 'COMPRIMES', 4790),
(2, 'ALFATIL 125MG', 'SUSPENSION BUVABLE', 2880),
(3, 'ALEPSAL 5OMG', 'COMPRIMES', 1390),
(4, 'ALDOMET 250MG', 'COMPRIMES', 2265),
(5, 'ALDOMET 500MG', 'COMPRIMES', 5435),
(6, 'ALEPSAL 100MG', 'COMPRIMES', 2330),
(7, ' ALDACTONE 50MG', 'COMPRIMES', 4385),
(8, 'ALDACTONE 75MG', 'COMPRIMES', 14435),
(9, 'ALDOMET 250MG', 'COMPRIMES', 2900),
(10, 'ALBENDOL 400MG', 'COMPRIMES', 675),
(11, 'ALDACTAZINE', 'COMPRIMES', 3800),
(12, 'ALCER 40MG', 'COMPRIMES', 6960),
(13, 'ALBENDAZOLE 400MG', 'COMPRIMES', 5350),
(14, 'ALBENDOL 4%', 'SUSPENSION BUVABLE', 865),
(15, 'ALBENDAZOLE 400MG', 'COMPRIMES', 355),
(16, 'AKINETON RETARD 4MG', 'COMPRIMES', 4850),
(17, 'ALBEN 400MG', 'COMPRIMES', 1345),
(18, 'ALBEN 4% SUSPENSION 10ML', 'SUSPENSION BUVABLE', 1355),
(19, 'AIRTAL', 'COMPRIMES', 2975),
(20, 'AIRTAL 100MG', 'COMPRIMES', 2985),
(21, 'AIRTAL 100MG', 'COMPRIMES', 10475),
(22, 'AGREAL 100MG', 'GELULES', 6435),
(23, 'AGYRAX 25MG', 'COMPRIMES', 2900),
(24, 'AIRTAL', 'COMPRIMES', 10460),
(25, 'AERIUS 5MG', 'COMPRIMES', 2560),
(26, 'AGRAM 125MG', 'SUSPENSION BUVABLE', 1015),
(27, 'AGRAM 250MG', 'SUSPENSION BUVABLE', 1365),
(28, 'ADVIL', 'SUSPENSION BUVABLE', 3200),
(29, 'AERIUS', 'SUSPENSION BUVABLE', 3650),
(30, 'AERIUS 5MG', 'COMPRIMES', 5080),
(31, 'ADEPAL DRG', 'COMPRIMES', 2715),
(32, 'ADEPAL DRG', 'COMPRIMES', 970),
(33, 'ADIAZINE', 'COMPRIMES', 3950),
(34, 'ACUPAN', 'SOLUTION INJECTABLE', 2880),
(35, 'ADALATE LP 20MG', 'COMPRIMES', 6740),
(36, 'ADALATE 10MG', 'CAPSULE', 3480),
(37, 'ACUILIX 20MG/12 5MG', 'COMPRIMES', 6830),
(38, 'ACUITEL 20MG', 'COMPRIMES', 21025),
(39, ' ACUITEL 5MG', 'COMPRIMES', 7790),
(40, 'ACTRON', 'COMPRIMES EFFERVESCENT', 3637),
(42, 'ONETAZOLE', '200Kg Gellule', 2500),
(43, 'PARACETAMOL', '200Kg Coprime', 1500),
(59, 'Koterm', '1500mg', 8000),
(60, 'EFFERANGAND', '2500mg', 2000),
(61, 'dolipramme', '2500mg', 3000);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOM` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`ID`, `NOM`) VALUES
(1, 'Afghanistan'),
(2, 'Afrique du sud'),
(3, 'Abanie'),
(4, 'Algérie'),
(5, 'Allemagne'),
(6, 'Andorre'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Arabie saoudite'),
(10, 'Argentine'),
(11, 'Arménie'),
(12, 'Aruba'),
(13, 'Autralie'),
(14, 'Autriche'),
(15, 'Bahamas'),
(16, 'Belgique'),
(17, 'Bénin'),
(18, 'Bermudes'),
(19, 'Bolivie'),
(20, 'Botswana'),
(21, 'Brésil'),
(22, 'Bulgarie'),
(23, 'Burkina Faso'),
(24, 'Burundi'),
(25, 'Cambodge'),
(26, 'Cameroun'),
(27, 'Canada');

-- --------------------------------------------------------

--
-- Structure de la table `pharmacie`
--

CREATE TABLE IF NOT EXISTS `pharmacie` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_VILLE` int(11) NOT NULL,
  `NOM` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BP` int(11) DEFAULT NULL,
  `TEL` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LOCALISATION` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `I_FK_PHARMACIE_VILLE` (`ID_VILLE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=72 ;

--
-- Contenu de la table `pharmacie`
--

INSERT INTO `pharmacie` (`ID`, `ID_VILLE`, `NOM`, `BP`, `TEL`, `LOCALISATION`) VALUES
(1, 1, 'CONCORDE', 0, '33 43 49 29', 'Direction Orange Akwa'),
(2, 1, 'BON SECOURS', NULL, '33 42 08 68', 'Hopital Laquintinie'),
(3, 1, 'MERCY', NULL, '99 75 99 97', 'AXE LOURD BEPANDA CARREFOUR TENDONG'),
(4, 1, 'SANTE POUR TOUS', NULL, '33 40 19 00', 'CARREFOUR AGIP'),
(5, 1, 'UNIVERS SANTE', NULL, '33 40 39 94', 'CHÂTEAU D''EAU DEIDO'),
(6, 1, 'BONAMOUSSADI', NULL, '33 47 24 81', 'FACE TOTAL BONAMOUSSADI'),
(7, 1, 'NDOGBONG', NULL, '33 40 03 75', 'NDOGBONG'),
(8, 1, 'SHAMMAH', NULL, '33 37 60 30', 'TOTAL LOGBABA'),
(9, 1, 'BALANCE', NULL, '33 42 49 75', 'SHELL NEW BELL'),
(10, 1, 'CARREF ANATOLE', NULL, '33 12 86 97', 'TOTAL ANATOLE BALI '),
(11, 1, 'DE GAULLE', NULL, '33 43 37 29', 'AVENUE DE GAULLE'),
(12, 1, 'LA COTE', NULL, '33 42 64 57', 'ESSAO BALI'),
(13, 1, 'GENIE', NULL, '33 42 64 57', 'MARCHE MADAGASCAR'),
(14, 1, 'PORTIQUE', NULL, '33 42 14 44', 'PLACE DES PORTIQUES'),
(15, 1, 'JAMOT', NULL, '33 42 03 13', 'FACE ECOLE PUBLIQUE D''AKWA'),
(16, 1, 'GARE', NULL, '99 82 80 28', 'GARE BESSENGUE'),
(17, 1, 'ESSEC', NULL, '33 40 56 50', 'ESSEC'),
(18, 1, 'LILAS', NULL, '33 40 00 61', 'BEPANDA TONERRE'),
(19, 1, 'MAKEPE', NULL, '33 47 55 55', 'MAKEPE EGLISE EVANGELIQUE'),
(20, 1, 'MERVEILLE', NULL, '33 37 67 84', 'FACE GARE DE BASSA'),
(21, 1, 'COSMOS SANTE', NULL, NULL, 'NDOGBATI'),
(22, 1, 'BERTAUD', NULL, '33 42 44 16', 'CAMP BERTAUD'),
(23, 1, 'MOSQUE', NULL, '33 42 64 57', 'MARCHE CENTRAL'),
(24, 1, 'ART ET FLEURS', NULL, '33 42 80 41', 'MARCHE DES FLEURS'),
(25, 1, 'KOUMASSI', NULL, '33 03 37 87', 'KOUMASSI RUE DES MANGUIERS'),
(26, 1, 'OUAMBO VICTOR', NULL, '77 96 64 53', 'AXE LOURD YDE AVT 1ER TOTAL'),
(27, 1, 'TRINITE', NULL, '33 42 46 44', 'RUE JAMOT CLINIQUE DU BERCEAU'),
(28, 1, 'ARC', NULL, NULL, 'POLYCLINIQUE D''AKWA'),
(29, 1, 'HORIZON', NULL, '33 40 87 81', 'CARR BOULANGERIE DE LA PAIX'),
(30, 1, 'AXIALE', NULL, '33 02 87 34', 'AXE LOURD BEPANDA'),
(31, 1, 'SAS', NULL, '33 02 87 34', 'BEPANDA OMNISPORT'),
(32, 1, 'FLEURON', NULL, '33 47 12 22', 'FLEURON SONEL BONAMOUSSADI'),
(33, 1, 'OLYMPIQUE', NULL, '33 37 02 97', 'TUNNEL NDOKOTI'),
(34, 1, 'PEOPLE', NULL, '33 37 42 97', 'PK8 TOTAL CITE DES PALMIERS'),
(35, 1, 'RAIL', NULL, '33 42 66 18', 'MARCHE NKOLOLOUN'),
(36, 1, 'AEROPORT', NULL, '33 42 28 76', 'ST MICHEL'),
(37, 1, 'NJO NJO', NULL, '33 42 39 25', 'AVENUE NJO NJO'),
(38, 1, 'MARCHE A COTE', NULL, '33 42 64 57', 'COMMISSARIAT MADAGASCAR'),
(39, 1, 'STE MARIE', NULL, '33 42 64 57', 'AXE LOURD DLA YDE '),
(40, 1, 'LIBERTE', NULL, '33 42 20 25', 'DRUGSTORE AKWA'),
(41, 1, 'SAPEURS', NULL, '33 42 63 06', 'SAPEUR NGODI'),
(42, 1, 'COUPOLE', NULL, '33 40 25 36', 'ECOLE PUBLIQUE DEIDO'),
(43, 1, 'OLIVIER', NULL, '33 40 34 22', 'DOUBLE BALLES BEPANDA'),
(44, 1, 'VERTUS', NULL, '33 47 80 18', 'CARREFOUR IPPB BOUNAMOUSSADI'),
(45, 1, 'CARREFOUR Z', NULL, '33 02 30 83', 'CARREFOUR ZACHEMAN NDOGBONG'),
(46, 1, 'CITE DES PALMIERS', NULL, '33 37 24 84', 'CITE DES PALMIERS'),
(47, 1, 'ST LAURENT', NULL, '33 43 16 80', 'FACE WEEKEND BAR'),
(48, 1, 'BELL', NULL, '33 42 14 90', 'FACE SGBC BALI'),
(49, 1, 'HOTEL DE L ''AIR', NULL, '33 42 64 57', 'CARREFOUR HOTEL DE L''AIR '),
(50, 1, 'SALUT', NULL, '33 37 27 02', 'BARCELONE'),
(51, 1, 'MIRACLE', NULL, '33 13 74 25', 'CARREFOUR TIF'),
(52, 1, 'MONDIAL', NULL, '33 40 24 92', 'LEWATT'),
(53, 1, 'BOURSE', NULL, '33 06 00 48', 'GRAND MOULIN DEIDO'),
(54, 1, 'LA PATIENCE', NULL, '33 47 26 84', 'CARREFOUR SNEC MAKEPE'),
(55, 1, 'MERVEILLE', NULL, '33 37 67 84', 'FACE GARE DE BASSA'),
(56, 1, 'COSMOS SANTE', NULL, NULL, 'NDOGBATI'),
(57, 1, 'ESPOIR', NULL, '33 42 79 82', 'RUE MONKAM BAR'),
(58, 1, 'SANTE ET NATURE', NULL, '33 42 64 57', 'AVENUE NJO NJO'),
(59, 1, 'GABELOU', NULL, '33 42 64 57', 'MOBIL NJO NJO RUE DES MANGUIERS'),
(60, 1, 'NYLON', NULL, '33 37 22 33  ', 'CARREFOUR BRAZZAVILLE '),
(61, 1, 'SHEKINA', NULL, '99 60 88 41', 'ENTREE LYCEE NDOGPASSI'),
(62, 1, 'JOUVENCE', NULL, '33 42 47 79', 'RUE KING AKWA'),
(63, 1, 'N dame de VICTOIRE', NULL, '33 06 42 44', 'LOGBOM '),
(64, 2, 'XAVYO', 11427, '22 05 22 87', NULL),
(65, 29, 'WINNER''S', 589, '33 32 33 98', NULL),
(66, 1, 'VITALIS', NULL, '33 08 16 92', NULL),
(67, 2, 'VOLUNTAS DEI', NULL, '22 06 71 10', NULL),
(68, 1, 'Logbaba', 319, '22 28 10 52', NULL),
(69, 1, 'Makèpè', 176, '33 36 26 73', NULL),
(70, 1, 'Logpom', 7428, NULL, NULL),
(71, 1, 'Logbessou', 7110, '33 40 39 94', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pharmaciemedicament`
--

CREATE TABLE IF NOT EXISTS `pharmaciemedicament` (
  `id_medicament` int(11) NOT NULL,
  `id_pharmacie` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id_medicament`,`id_pharmacie`),
  KEY `pharmaciemedicament_ibfk_1` (`id_pharmacie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `pharmaciemedicament`
--

INSERT INTO `pharmaciemedicament` (`id_medicament`, `id_pharmacie`, `quantite`) VALUES
(1, 1, 34),
(1, 2, 14),
(2, 1, 3),
(2, 4, 12),
(3, 1, 13),
(3, 3, 10),
(4, 1, 15),
(4, 4, 23),
(5, 1, 23),
(5, 2, 34),
(6, 1, 26),
(6, 3, 78),
(6, 4, 12),
(8, 1, 14),
(9, 3, 4),
(10, 1, 10),
(10, 2, 23),
(12, 3, 19),
(12, 4, 32),
(15, 2, 20),
(15, 3, 12),
(16, 1, 13),
(17, 2, 34),
(18, 3, 90),
(20, 2, 30),
(21, 1, 90),
(21, 3, 34),
(24, 3, 23),
(24, 4, 23),
(25, 2, 10),
(28, 1, 20),
(28, 3, 32),
(28, 4, 10),
(30, 2, 2),
(30, 4, 11),
(31, 1, 12),
(31, 3, 23),
(31, 4, 19),
(35, 3, 20),
(36, 4, 20);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PAYS` int(11) NOT NULL,
  `NOM` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `I_FK_VILLE_PAYS` (`ID_PAYS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=77 ;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`ID`, `ID_PAYS`, `NOM`) VALUES
(1, 26, 'Douala'),
(2, 26, 'Yaoundé'),
(3, 26, 'Garoua'),
(4, 26, 'Bamenda'),
(5, 26, 'Maroua'),
(6, 26, 'Bafoussam'),
(7, 26, 'Ngaoundéré'),
(8, 26, 'Bertoua'),
(9, 26, 'Loum'),
(10, 26, 'Kumba'),
(11, 26, 'Edéa'),
(12, 26, 'Kumbo'),
(13, 26, 'Foumban'),
(14, 26, 'Nkongsamba'),
(15, 26, 'Mbouda'),
(16, 26, 'Dschang'),
(17, 26, 'Limbé'),
(18, 26, 'Ebolowa'),
(19, 26, 'Kousséri'),
(20, 26, 'Guider'),
(21, 26, 'Meiganga'),
(22, 26, 'Yagoua'),
(23, 26, 'Mbalmayo'),
(24, 26, 'Bafang'),
(25, 26, 'Tiko'),
(26, 26, 'Bafia'),
(27, 26, 'Wum'),
(28, 26, 'Kribi'),
(29, 26, 'Buea'),
(30, 26, 'Sangmélima'),
(31, 26, 'Foumbot'),
(32, 26, 'Bagangté'),
(33, 26, 'Batouri'),
(34, 26, 'Banyo'),
(35, 26, 'Nkambé'),
(36, 26, 'Bali'),
(37, 26, 'Mbanga'),
(38, 26, 'Mokolo'),
(39, 26, 'Mélong'),
(40, 26, 'Manjo'),
(41, 26, 'Garoua-Boulaï'),
(42, 26, 'Mora'),
(43, 26, 'Kaélé'),
(44, 26, 'Tabati'),
(45, 26, 'Ndop'),
(46, 26, 'Akonolinga'),
(47, 26, 'Eséka'),
(48, 26, 'Mamfé'),
(49, 26, 'Obala'),
(50, 26, 'Muyuka'),
(51, 26, 'Nanga-Eboko'),
(52, 26, 'Abong-Mbang'),
(53, 26, 'Fundong'),
(54, 26, 'Nkoteng'),
(55, 26, 'Fontem'),
(56, 26, 'Mbandjock'),
(57, 26, 'Touboro'),
(58, 26, 'Ngaondal'),
(59, 26, 'Yokadouma'),
(60, 26, 'Pitoa'),
(61, 26, 'Tombel'),
(62, 26, 'Kékem'),
(63, 26, 'Magba'),
(64, 26, 'Bélabo'),
(65, 26, 'Tonga'),
(66, 26, 'Maga'),
(67, 26, 'Koutaba'),
(68, 26, 'Blangoua'),
(69, 26, 'Guidiguis'),
(70, 26, 'Bogo'),
(71, 26, 'Batibo'),
(72, 26, 'Yabassi'),
(73, 26, 'Figuil'),
(74, 26, 'Makénéné'),
(75, 26, 'Gazawa'),
(76, 26, 'Tcholliré');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commander`
--
ALTER TABLE `commander`
  ADD CONSTRAINT `commander` FOREIGN KEY (`ID_PHRAMACIE`) REFERENCES `pharmacie` (`ID`),
  ADD CONSTRAINT `commander_ibfk_1` FOREIGN KEY (`ID_PHRAMACIE`) REFERENCES `pharmacie` (`ID`),
  ADD CONSTRAINT `commander_ibfk_2` FOREIGN KEY (`ID_MEDICAMENT`) REFERENCES `medicament` (`ID`),
  ADD CONSTRAINT `commander_ibfk_3` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID`);

--
-- Contraintes pour la table `pharmacie`
--
ALTER TABLE `pharmacie`
  ADD CONSTRAINT `pharmacie_ibfk_1` FOREIGN KEY (`ID_VILLE`) REFERENCES `ville` (`ID`);

--
-- Contraintes pour la table `pharmaciemedicament`
--
ALTER TABLE `pharmaciemedicament`
  ADD CONSTRAINT `pharmaciemedicament_ibfk_1` FOREIGN KEY (`id_pharmacie`) REFERENCES `pharmacie` (`ID`),
  ADD CONSTRAINT `pharmaciemedicament_ibfk_2` FOREIGN KEY (`id_medicament`) REFERENCES `medicament` (`ID`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`ID_PAYS`) REFERENCES `pays` (`ID`);
