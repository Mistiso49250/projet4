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
  `numchapitre` int(11) NOT NULL,
  `contenu_chapitre` text NOT NULL,
  `extrait` text NOT NULL,
  `date_publication` datetime NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `publier` int(3) NOT NULL,
  PRIMARY KEY (`id_chapitre`),
  UNIQUE KEY `numchapitre` (`numchapitre`),
  KEY `titre` (`titre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table projet4.chapitre : ~8 rows (environ)
/*!40000 ALTER TABLE `chapitre` DISABLE KEYS */;
REPLACE INTO `chapitre` (`id_chapitre`, `titre`, `numchapitre`, `contenu_chapitre`, `extrait`, `date_publication`, `image`, `publier`) VALUES
	(3, 'Prologue', 0, '<p>Wren dépose les deux valises à roulettes près de la poussette et tire une longue bouffée de cigarette.</p>', '<p>Wrend dépose les deux valises à roulettes près de la poussette et tire une longue bouffée de la cigarette négligemment fichée au coin de ses lèvres.</p>\r\n<p>Il souffle la fummée dans l\'air glacé.</p>\r\n<p>     - C\'est tout ? demande-t-il.</p>\r\n<p>     - Il manque le sac de couche.</p>\r\n<p>Je hume l\'odeur musquée de sa cigarette. J\'ai toujours eu l\'odeur du tabac en horreur. C\'est toujours le cas, sauf quand c\'est Wren qui fume.</p>\r\n<p>     - D\'accord, je vais te les chercher, dit-il, lâchant sa cigarette dans la neige avant de l\'écraser avec sa botte.</p>\r\n<p>Il joint ses mains calleuses, souffle dedans et file, épaules rentrées, vers le tarmac où le Cessna qui nous a déposés attend son heure de retour vers Bangor.</p>\r\n<p>Je le rgarde d\'éloigner, impassible, blottie dans la longue doudoune polaire qui me protège du vent glacial, m\'accrochant farouchement à la rancoeur qui me ronge depuis des mois. Si je lâche maintenant, je vais être submergée par la douleur, la déception et l\'inévitable sentiment de perte qui m\'habite et auquel je ne pourrais pas faire face.</p>', '2020-08-27 11:10:23', 'prologue.jpg', 1),
	(4, 'Chapitre 1 Anchorage, Alaska', 1, '', 'Je souris amèrement tandis que j’examine le contenu du carton – brosse à dents,', '2020-01-14 11:04:19', 'chapitre1.jpg', 1),
	(5, 'Chapitre 2 Wren & Calla', 2, '', 'Le métro de Toronto est tellement calme et désert à cette heure de la journée que j’ai pu', '2020-01-14 11:07:00', 'chapitre2.jpg', 1),
	(6, 'Chapitre 3 Tulukaruq signifie "corneille"', 3, '', 'Aujourd’hui, j’avais tout juste fini de savourer les dernières gouttes de mon latte', '2020-01-14 11:08:43', 'chapitre3.jpg', 1),
	(7, 'Chapitre 4', 4, '', 'J’étais une employée modèle et cette décision n’était en rien le reflet de mes capacités', '2020-01-14 11:10:11', 'chapitre4.jpg', 1),
	(8, 'Chapitre 5', 5, '', 'Je savais que cette machine finirait par être installée, que les postes d’analystes', '2020-01-14 11:11:51', 'chapitre5.jpg', 1);
/*!40000 ALTER TABLE `chapitre` ENABLE KEYS */;

-- Listage de la structure de la table projet4. commentaire
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `id_chapitre` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `titre_chapitre` varchar(255),
  `date_commentaire` datetime DEFAULT CURRENT_TIMESTAMP,
  `signaler` tinyint(3) unsigned DEFAULT '0',
  `garder` tinyint(4) DEFAULT '0',
  `supprimer` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id_commentaire`),
  KEY `FK_commentaire_chapitre` (`id_chapitre`),
  KEY `titre_chapitre` (`titre_chapitre`),
  CONSTRAINT `FK_commentaire_chapitre` FOREIGN KEY (`id_chapitre`) REFERENCES `chapitre` (`id_chapitre`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_commentaire_chapitre_2` FOREIGN KEY (`titre_chapitre`) REFERENCES `chapitre` (`titre`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Listage des données de la table projet4.commentaire : ~29 rows (environ)
/*!40000 ALTER TABLE `commentaire` DISABLE KEYS */;
REPLACE INTO `commentaire` (`id_commentaire`, `id_chapitre`, `pseudo`, `contenu`, `titre_chapitre`, `date_commentaire`, `signaler`, `garder`, `supprimer`) VALUES
	(1, 3, 'toto', 'bof', NULL, '2020-07-14 21:16:10', 0, 0, 0),
	(4, 3, 'tata', 'nul', NULL, '2020-07-20 16:56:32', 0, 0, 0),
	(6, 3, 'desnnidek', 'pas mal', NULL, '2020-07-22 11:52:08', 0, 0, 0),
	(8, 3, 'fruiti', 'pas mal', NULL, '2020-07-22 12:32:06', 0, 0, 0),
	(9, 3, 'fruiti', 'pas mal', NULL, '2020-07-23 18:04:52', 1, 0, 0),
	(10, 5, 'fruiti', 'nul', NULL, '2020-08-25 11:38:48', 0, 0, 0),
	(11, 3, 'desnnidek', 'on va tester d\'ajouter', NULL, '2020-08-27 11:49:04', 0, 0, 0),
	(12, 3, 'desnnidek', 'on va tester d\'ajouter', NULL, '2020-08-27 11:52:24', 0, 0, 0),
	(13, 3, 'fruiti', 'test retrait value echo', NULL, '2020-08-27 16:19:05', 1, 0, 0),
	(14, 3, 'poo', 'test ajout 31/08/2020', NULL, '2020-08-31 11:15:29', 0, 0, 0),
	(15, 3, 'poo', 'test ajout 31/08/2020', NULL, '2020-08-31 11:17:06', 0, 0, 0),
	(16, 3, 'poo', 'test ajout 31/08/2020', NULL, '2020-08-31 11:17:11', 0, 0, 0),
	(17, 3, 'test', 'on va tester d\'ajouter', NULL, '2020-09-14 16:50:06', 0, 0, 0),
	(18, 3, 'test', 'test redirection', NULL, '2020-09-15 09:34:49', 0, 0, 0),
	(20, 3, 'test', 'test redirection', NULL, '2020-09-15 09:58:04', 0, 0, 0),
	(24, 3, 'test', 'test redirection 2', NULL, '2020-09-15 10:06:52', 0, 0, 0),
	(25, 3, 'test', 'test redirection 3', NULL, '2020-09-15 10:07:29', 0, 0, 0),
	(26, 3, 'test', 'test redirection 4', NULL, '2020-09-15 10:34:56', 0, 0, 0),
	(27, 3, 'test', 'test redirection 5', NULL, '2020-09-15 18:59:35', 0, 0, 0),
	(28, 3, 'test', 'test redirection encore', NULL, '2020-09-15 19:03:42', 0, 0, 0),
	(29, 3, 'test', 'test redirection encore', NULL, '2020-09-15 19:04:48', 0, 0, 0),
	(30, 3, 'test', 'test redirection encore', NULL, '2020-09-15 19:17:48', 0, 0, 0),
	(32, 3, 'test', 'test redirection encore', NULL, '2020-09-15 19:20:43', 0, 0, 0),
	(33, 3, 'test', 'redirection', NULL, '2020-09-18 11:00:35', 0, 0, 0),
	(34, 3, 'test', 'redirection', NULL, '2020-09-18 11:00:45', 0, 0, 0),
	(35, 3, 'test', 'var_dump', NULL, '2020-09-18 11:02:27', 0, 0, 0),
	(36, 3, 'test', 'header', NULL, '2020-09-18 13:24:01', 0, 0, 0),
	(37, 3, 'test', 'sans array', NULL, '2020-09-18 13:26:06', 0, 0, 0),
	(38, 3, 'test', 'signal', NULL, '2020-09-21 16:36:46', 1, 0, 0);
/*!40000 ALTER TABLE `commentaire` ENABLE KEYS */;

-- Listage de la structure de la table projet4. images
CREATE TABLE IF NOT EXISTS `images` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(500) NOT NULL,
  `id_chapitre` int(11) NOT NULL,
  PRIMARY KEY (`id_image`),
  KEY `id_chapitre` (`id_chapitre`),
  CONSTRAINT `FK_images_chapitre` FOREIGN KEY (`id_chapitre`) REFERENCES `chapitre` (`id_chapitre`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table projet4.images : ~0 rows (environ)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

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
