-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 26 Mai 2014 à 13:17
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bd_forum`
--
CREATE DATABASE IF NOT EXISTS `bd_forum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_forum`;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `id_sujet` int(11) NOT NULL,
  `date_pub` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_sujet` (`id_sujet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `pseudo`, `email`, `texte`, `id_sujet`, `date_pub`) VALUES
(1, 'Michelin', '', 'Le travail est la modification utile du milieu extérieur opérée par l''homme.\r\n', 6, '2014-05-24 21:43:12'),
(2, 'le king', '', 'Le travail humain saisit les choses, les ressuscite d''entre les morts.\r\n', 6, '2014-05-24 21:43:12'),
(3, 'le lion blanc', '', 'Ce n''est point le perfectionnement des machines qui est la vraie calamité, c''est le partage injuste que nous faisons de leur produit.\r\n', 5, '2014-05-01 00:00:00'),
(4, 'noir le pape', '', 'Le travail machinal de l''homme est l''esclavage transitoire d''un mécanisme imparfait.\r\n', 5, '2014-05-12 00:00:00'),
(5, 'jojo+', '', 'soyez plus claire svp', 4, '2014-05-24 21:46:13'),
(6, 'pat de paname', '', 'suis d''accord avec toi jojo+', 4, '2014-05-24 21:46:13'),
(7, 'le renard', '', 'L''unique garantie des citoyens contre l''arbitraire, c''est la publicité.\r\n', 3, '2014-05-15 00:00:00'),
(8, 'sapologie3', '', 'Je me trouve attaché à un coin de cette vaste étendue sans que je sache pourquoi je suis placé en ce lieu plutôt qu''en un autre, ni pourquoi ce peu de temps qui m''est donné à vivre m''est assigné à ce point plutôt qu''à un autre.\r\n', 3, '2014-05-13 00:00:00'),
(9, 'le Mozart', '', 'le web c''est l''avenir du monde informatique', 3, '2014-05-25 00:06:58'),
(10, 'Moustique', '', 'ta tout dit mais dit mois encore !', 4, '2014-05-25 00:06:58');

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

CREATE TABLE IF NOT EXISTS `sujets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) NOT NULL,
  `contenu` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_pub` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `sujets`
--

INSERT INTO `sujets` (`id`, `titre`, `contenu`, `id_utilisateur`, `date_pub`) VALUES
(3, 'Le monde celons le web', 'le monde de demain sera le monde du web.\r\net toute technologie qui ne pense pas a cet aspect ne pourra que s''ecarter', 1, '2014-05-24 21:39:25'),
(4, 'Les Systèmes embarqués', 'Un monde dominé par Androïde cote mobile', 2, '2014-05-24 21:39:25'),
(5, 'technique', 'Ainsi toute la philosophie est comme un arbre dont les racines sont la métaphysique, le tronc est la physique, et les branches qui sortent de ce tronc sont toutes les autres sciences qui se réduisent à trois principales, à savoir la médecine, la mécanique et la morale.\r\n', 3, '2014-05-24 21:41:24'),
(6, 'travail', 'Si La Fontaine nous a laissé le plus pur trésor de la poésie française c''est parce qu''il a été un homme -avec mille faiblesses -et un ouvrier -avec mille vertus.\r\n', 4, '2014-05-24 21:41:24'),
(7, 'le CSS', 'code-sample {\r\nfont-weight: bold;\r\nfont-style: italic;\r\n} ', 1, '2014-05-23 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ismod` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `password`, `ismod`) VALUES
(1, 'ntm', 'ntm', 1),
(2, 'michel le duc', 'michel', 1),
(3, 'Guyso', 'couakam', 1),
(4, 'Hermano', 'hermand', 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `FK_Com_sujet` FOREIGN KEY (`id_sujet`) REFERENCES `sujets` (`id`);

--
-- Contraintes pour la table `sujets`
--
ALTER TABLE `sujets`
  ADD CONSTRAINT `FK_Sujet_User` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
