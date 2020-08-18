-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour projet4
CREATE DATABASE IF NOT EXISTS `projet4` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `projet4`;

-- Listage de la structure de la table projet4. chapitre
CREATE TABLE IF NOT EXISTS `chapitre` (
  `id_chapitre` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu_chapitre` text NOT NULL,
  `extrait` text NOT NULL,
  `date_publication` datetime NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id_chapitre`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Listage des données de la table projet4.chapitre : ~7 rows (environ)
/*!40000 ALTER TABLE `chapitre` DISABLE KEYS */;
REPLACE INTO `chapitre` (`id_chapitre`, `titre`, `contenu_chapitre`, `extrait`, `date_publication`, `image`) VALUES
	(3, 'Prologue', '', 'Wren dépose les deux valises à roulettes près de la poussette et tire une longue bouffée', '2020-01-14 11:02:45', 'prologue.jpg'),
	(4, 'Chapitre 1 Anchorage, Alaska', '', 'Je souris amèrement tandis que j’examine le contenu du carton – brosse à dents,', '2020-01-14 11:04:19', 'chapitre1.jpg'),
	(5, 'Chapitre 2 Wren & Calla', '', 'Le métro de Toronto est tellement calme et désert à cette heure de la journée que j’ai pu', '2020-01-14 11:07:00', 'chapitre2.jpg'),
	(6, 'Chapitre 3 Tulukaruq signifie "corneille"', '', 'Aujourd’hui, j’avais tout juste fini de savourer les dernières gouttes de mon latte', '2020-01-14 11:08:43', 'chapitre3.jpg'),
	(7, 'Chapitre 4', '', 'J’étais une employée modèle et cette décision n’était en rien le reflet de mes capacités', '2020-01-14 11:10:11', 'chapitre4.jpg'),
	(8, 'Chapitre 5', '', 'Je savais que cette machine finirait par être installée, que les postes d’analystes', '2020-01-14 11:11:51', 'chapitre5.jpg'),
	(9, 'titre', 'contenu_chapitre', 'extrait', '2009-09-11 00:00:00', '');
/*!40000 ALTER TABLE `chapitre` ENABLE KEYS */;

-- Listage de la structure de la table projet4. commentaire
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `id_chapitre` int(11) DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `contenu` text,
  `date_commentaire` datetime DEFAULT CURRENT_TIMESTAMP,
  `signaler` tinyint(3) unsigned DEFAULT '0',
  `garder` tinyint(4) DEFAULT '0',
  `supprimer` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id_commentaire`),
  KEY `FK_commentaire_chapitre` (`id_chapitre`),
  CONSTRAINT `FK_commentaire_chapitre` FOREIGN KEY (`id_chapitre`) REFERENCES `chapitre` (`id_chapitre`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Listage des données de la table projet4.commentaire : ~6 rows (environ)
/*!40000 ALTER TABLE `commentaire` DISABLE KEYS */;
REPLACE INTO `commentaire` (`id_commentaire`, `id_chapitre`, `pseudo`, `contenu`, `date_commentaire`, `signaler`, `garder`, `supprimer`) VALUES
	(1, 3, 'toto', 'bof', '2020-07-14 21:16:10', 0, 0, 0),
	(4, 3, 'tata', 'nul', '2020-07-20 16:56:32', 0, 0, 0),
	(5, 3, 'fruiti', 'super sympa cette histoire', '2020-07-22 11:33:21', 0, 0, 0),
	(6, 3, 'desnnidek', 'pas mal', '2020-07-22 11:52:08', 0, 0, 0),
	(8, 3, 'fruiti', 'pas mal', '2020-07-22 12:32:06', 0, 0, 0),
	(9, 3, 'fruiti', 'pas mal', '2020-07-23 18:04:52', 0, 0, 0);
/*!40000 ALTER TABLE `commentaire` ENABLE KEYS */;

-- Listage de la structure de la table projet4. images
CREATE TABLE IF NOT EXISTS `images` (
  `id_image` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `id_chapitre` int(11) NOT NULL,
  PRIMARY KEY (`id_image`),
  KEY `id_chapitre` (`id_chapitre`),
  CONSTRAINT `FK_images_chapitre` FOREIGN KEY (`id_chapitre`) REFERENCES `chapitre` (`id_chapitre`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table projet4.images : ~0 rows (environ)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Listage de la structure de la table projet4. signalement
CREATE TABLE IF NOT EXISTS `signalement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_chapitre` int(11) DEFAULT NULL,
  `id_commentaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_signalement_chapitre` (`id_chapitre`),
  KEY `FK_signalement_commentaire` (`id_commentaire`),
  CONSTRAINT `FK_signalement_chapitre` FOREIGN KEY (`id_chapitre`) REFERENCES `chapitre` (`id_chapitre`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_signalement_commentaire` FOREIGN KEY (`id_commentaire`) REFERENCES `commentaire` (`id_commentaire`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table projet4.signalement : ~0 rows (environ)
/*!40000 ALTER TABLE `signalement` DISABLE KEYS */;
/*!40000 ALTER TABLE `signalement` ENABLE KEYS */;

-- Listage de la structure de la table projet4. user
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table projet4.user : ~1 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`iduser`, `name`, `password`) VALUES
	(2, 'Forteroche', '$2y$12$2TmWZeplKZFTh9Sd4wy9SeBVHdjatXMPxyovckmDYANnka6lvx/Z2');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
