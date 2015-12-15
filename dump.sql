# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: 127.0.0.1 (MySQL 5.5.46-0ubuntu0.14.04.2)
# Base de données: paul-portfolio
# Temps de génération: 2015-12-10 23:41:53 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table article
# ------------------------------------------------------------

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `sous_titre` varchar(255) DEFAULT NULL,
  `contenu` text,
  `date_article` date DEFAULT NULL,
  `date_modif` date DEFAULT NULL,
  `actif` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table categorie
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categorie`;

CREATE TABLE `categorie` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_parent` (`id_parent`),
  CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table commentaire
# ------------------------------------------------------------

DROP TABLE IF EXISTS `commentaire`;

CREATE TABLE `commentaire` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) DEFAULT NULL,
  `contenu` text,
  `date_commentaire` date DEFAULT NULL,
  `article_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Affichage de la table realisation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `realisation`;

CREATE TABLE `realisation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `categorie_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie_id` (`categorie_id`),
  CONSTRAINT `realisation_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
