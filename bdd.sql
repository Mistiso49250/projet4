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
CREATE DATABASE IF NOT EXISTS `projet4` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `projet4`;

-- Listage de la structure de la table projet4. chapitre
CREATE TABLE IF NOT EXISTS `chapitre` (
  `id_chapitre` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `numchapitre` int(11) NOT NULL,
  `extrait` text NOT NULL,
  `contenu_chapitre` text NOT NULL,
  `date_publication` datetime NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `publier` int(3) NOT NULL,
  PRIMARY KEY (`id_chapitre`),
  UNIQUE KEY `numchapitre` (`numchapitre`),
  KEY `titre` (`titre`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Listage des données de la table projet4.chapitre : ~6 rows (environ)
/*!40000 ALTER TABLE `chapitre` DISABLE KEYS */;
REPLACE INTO `chapitre` (`id_chapitre`, `titre`, `numchapitre`, `extrait`, `contenu_chapitre`, `date_publication`, `image`, `publier`) VALUES
	(4, 'Chapitre 1 Anchorage, Alaska', 1, '<div>\r\n<div>Je souris amèrement tandis que j’examine le contenu du carton – brosse à dents, dentifrice, tenue de sport, une boîte de mouchoirs, un maxi flacon d’Advil.</div>\r\n</div>', '<div>\r\n<p>Je souris amèrement tandis que j’examine le contenu du carton  – brosse à dents, dentifrice, tenue de sport, une boîte de mouchoirs, un maxi flacon d’Advil, un sac de produits de beauté avec quatre tubes de rouge à lèvres entamés, de la laque, une brosse à cheveux et six paires de chaussures que je gardais autrefois sous mon bureau.</p>\r\n<p> </p>\r\n<div>\r\n<div>\r\n<p>C’est là que je remarque le coûteux engin de calcul. Le mois dernier, j’avais réussi à convaincre mon supérieur que j’allais en avoir besoin.</p>\r\n<p> </p>\r\n<div>\r\n<div>\r\n<p>De toute évidence, l’agent de sécurité chargé de nettoyer mon bureau de tous mes effets personnels pendant que je me faisais crûment virer de mon job avait dû penser qu’elle m’appartenait. Probablement à cause du nom « Calla Fletcher » marqué au feutre indélébile dessus, un avertissement à l’attention de mes collègues qui auraient eu l’idée de me la piquer.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '2020-01-14 11:04:19', 'chapitre1.jpg', 1),
	(5, 'Chapitre 2 Wren & Calla', 2, 'Le métro de Toronto est tellement calme et désert à cette heure de la journée que j’ai pu', '', '2020-01-14 11:07:00', 'chapitre2.jpg', 1),
	(6, 'Chapitre 3 Tulukaruq signifie "corneille"', 3, 'Aujourd’hui, j’avais tout juste fini de savourer les dernières gouttes de mon latte', '', '2020-01-14 11:08:43', 'chapitre3.jpg', 1),
	(7, 'Chapitre 4', 4, 'J’étais une employée modèle et cette décision n’était en rien le reflet de mes capacités', '', '2020-01-14 11:10:11', 'chapitre4.jpg', 1),
	(8, 'Chapitre 5', 5, 'Je savais que cette machine finirait par être installée, que les postes d’analystes', '', '2020-01-14 11:11:51', 'chapitre5.jpg', 1),
	(9, 'Prologue', 0, 'Wren dépose les deux valises à roulettes près de la poussette et tire une longue bouffée de cigarette.', 'Wren dépose les deux valises à roulettes près de la poussette et tire une longue bouffée de la cigarette négligemment fichée au coin de ses lèvres. \r\nIl souffle la fumée dans l’air glacé.\r\n\r\n     – C’est tout ? demande-t-il.\r\n     – Il manque le sac de couches.\r\n\r\nJe hume l’odeur musquée de sa cigarette. J’ai toujours eu l’odeur du tabac en horreur.\r\nC’est toujours le cas, sauf quand c’est Wren qui fume.\r\n\r\n     – D’accord, je vais te le chercher, dit-il, lâchant sa cigarette dans la neige avant de l’écraser avec sa botte.\r\n\r\nIl joint ses mains calleuses, souffle dedans et file, épaules rentrées, vers le tarmac où le Cessna qui nous a déposés attend son heure de retour vers Bangor.\r\n\r\nJe le regarde s’éloigner, impassible, blottie dans la longue doudoune polaire qui me protège du vent glacial, m’accrochant farouchement à la rancœur qui me ronge depuis des\r\nmois. Si je lâche prise maintenant, je vais être submergée par la douleur, la déception et l’inévitable sentiment de perte qui m’habite et auquel je ne pourrais pas faire face.', '2020-10-21 10:28:35', 'prologue.jpg', 1);
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

-- Listage des données de la table projet4.commentaire : ~1 rows (environ)
/*!40000 ALTER TABLE `commentaire` DISABLE KEYS */;
REPLACE INTO `commentaire` (`id_commentaire`, `id_chapitre`, `pseudo`, `contenu`, `titre_chapitre`, `date_commentaire`, `signaler`, `garder`, `supprimer`) VALUES
	(10, 5, 'fruiti', 'nul', NULL, '2020-08-25 11:38:48', 0, 0, 0);
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
