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
  `extrait_chapitre` varchar(255) NOT NULL,
  `contenu_chapitre` text NOT NULL,
  `date_publication` datetime NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY (`id_chapitre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table projet4.chapitre : ~6 rows (environ)
/*!40000 ALTER TABLE `chapitre` DISABLE KEYS */;
REPLACE INTO `chapitre` (`id_chapitre`, `titre`, `extrait_chapitre`, `contenu_chapitre`, `date_publication`, `image`) VALUES
	(3, 'prologue', 'Wren dépose les deux valises à roulettes près de la poussette et tire une longue bouffée', 'Wren dépose les deux valises à roulettes près de la poussette et tire une longue bouffée\r\nde la cigarette négligemment fichée au coin de ses lèvres. Il souffle la fumée dans\r\nl’air glacé.\r\n\r\n– C’est tout ? demande-t-il.\r\n\r\n– Il manque le sac de couches.<br>\r\n\r\nJe hume l’odeur musquée de sa cigarette. J’ai toujours eu l’odeur du tabac en horreur.\r\n C’est toujours le cas, sauf quand c’est Wren qui fume.\r\n\r\n– D’accord, je vais te le chercher, dit-il, lâchant sa cigarette dans la neige avant de\r\nl’écraser avec sa botte.\r\n\r\nIl joint ses mains calleuses, souffle dedans et file, épaules rentrées, vers le tarmac\r\noù le Cessna qui nous a déposés attend son heure de retour vers Bangor.\r\n\r\nJe le regarde s’éloigner, impassible, blottie dans la longue doudoune polaire qui me\r\nprotège du vent glacial, m’accrochant farouchement à la rancœur qui me ronge depuis des\r\nmois. Si je lâche prise maintenant, je vais être submergée par la douleur, la déception\r\net l’inévitable sentiment de perte qui m’habite et auquel je ne pourrais pas faire face.', '2020-01-14 11:02:45', 'prologue.jpg'),
	(4, 'chapitre 1', 'Je souris amèrement tandis que j’examine le contenu du carton – brosse à dents,\r\ndentifrice, tenue de sport, une boîte de mouchoirs, un maxi flacon d’Advil\r\n', 'Je souris amèrement tandis que j’examine le contenu du carton – brosse à dents,\r\ndentifrice, tenue de sport, une boîte de mouchoirs, un maxi flacon d’Advil, un sac de\r\nproduits de beauté avec quatre tubes de rouge à lèvres entamés, de la laque, une brosse\r\nà cheveux et six paires de chaussures que je gardais autrefois sous mon bureau. \r\n\r\nC’est là que je remarque le coûteux engin de calcul. Le mois dernier, j’avais réussi à\r\nconvaincre mon supérieur que j’allais en avoir besoin.\r\n\r\nDe toute évidence, l’agent de sécurité chargé de nettoyer mon bureau de tous mes effets\r\npersonnels pendant que je me faisais crûment virer de mon job avait dû penser qu’elle\r\nm’appartenait. Probablement à cause du nom « Calla Fletcher » marqué au feutre\r\nindélébile dessus, un avertissement à l’attention de mes collègues qui auraient eu\r\nl’idée de me la piquer. ', '2020-01-14 11:04:19', 'chapitre1.jpg'),
	(5, 'chapitre 2', 'Le métro de Toronto est tellement calme et désert à cette heure de la journée que j’ai pu\r\nm’asseoir où je voulais.', 'Le métro de Toronto est tellement calme et désert à cette heure de la journée que j’ai pu\r\nm’asseoir où je voulais.\r\n\r\nJe peine à me rappeler de la dernière fois que j’ai eu ce luxe.\r\n\r\nPendant presque quatre ans, pour aller et revenir du travail, j’ai dû m’entasser dans des\r\nwagons bondés, asphyxiée par les odeurs corporelles et ballottée dans les incessantes et\r\ninfernales bousculades de l’heure de pointe. Mais cette fois-ci, le trajet pour rentrer\r\nchez moi est bien différent.', '2020-01-14 11:07:00', 'chapitre2.jpg'),
	(6, 'chapitre 3', 'Aujourd’hui, j’avais tout juste fini de savourer les dernières gouttes de mon latte', 'Aujourd’hui, j’avais tout juste fini de savourer les dernières gouttes de mon latte\r\nacheté chez Starbucks – taille venti – et sauvegardé mes derniers fichiers Excel \r\n\r\nlorsqu’un message est arrivé sur ma boîte mail, m’informant que le patron voulait que je\r\ndescende le voir dans la salle Algonquin au deuxième étage.\r\n\r\nSans trop y réfléchir, je m’étais emparée d’une banane et de mon carnet de notes avant de\r\ntraîner les pieds jusqu’à la petite salle de conférence.\r\n\r\nJe l’y ai retrouvé, accompagné de son supérieur et de Sonja Fuentes, des ressources\r\nhumaines. Cette dernière tenait entre ses mains enflées une épaisse enveloppe kraft\r\nmarquée à mon nom. Je me suis assise face à eux et les ai bêtement écoutés me déblatérer\r\nchacun leur tour un discours maintes fois répété : la banque avait récemment fait\r\ninstaller un nouveau système prenant en charge bon nombre de mes tâches d’analyste des\r\nrisques, et mon poste avait été de fait éliminé ', '2020-01-14 11:08:43', 'chapitre3.jpg'),
	(7, 'chapitre 4', 'J’étais une employée modèle et cette décision n’était en rien le reflet de mes capacités', 'J’étais une employée modèle et cette décision n’était en rien le reflet de mes capacités\r\nprofessionnelles.\r\n\r\nEvidemment, la société m’assurerait un important soutien financier durant cette période «\r\ntransitoire ».\r\nJe crois bien être la seule personne de toute l’histoire de l’humanité à avoir mangé une\r\nbanane entière pendant qu’on la licenciait. La « transition » s’appliquait à effet\r\nimmédiat.\r\n\r\nAutrement dit, pas la peine de retourner à mon bureau pour saluer mes collègues ou\r\nprendre mes affaires. J’allais être raccompagnée jusqu’au service de sécurité comme une\r\nvulgaire criminelle, on allait me remettre un carton contenant mes affaires et\r\nm’escorter vers le trottoir. Apparemment, c’est la procédure standard de la banque quand\r\non se sépare d’un employé.', '2020-01-14 11:10:11', 'chapitre4.jpg'),
	(8, 'chapitre 5', 'Je savais que cette machine finirait par être installée, que les postes d’analystes', 'Je savais que cette machine finirait par être installée, que les postes d’analystes\r\nseraient réduits et le travail redistribué.\r\n\r\nMais j’ai été assez stupide pour me croire indispensable et penser que je serais\r\népargnée.\r\n\r\nD’ailleurs, combien d’autres têtes étaient tombées, aujourd’hui ? Suis-je la seule à\r\navoir perdu la mienne ? Mon Dieu ! Et si j’étais la seule de l’équipe à avoir été virée ?\r\n\r\nLes larmes menacent et je cligne des yeux pour les chasser, mais quelques-unes\r\nparviennent à s’échapper. D’un geste rapide, je sors mouchoir et miroir de poche du\r\ncarton et entreprends de me tamponner délicatement les yeux pour ne pas ruiner mon\r\nmaquillage.', '2020-01-14 11:11:51', 'chapitre5.jpg');
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table projet4.commentaire : ~0 rows (environ)
/*!40000 ALTER TABLE `commentaire` DISABLE KEYS */;
/*!40000 ALTER TABLE `commentaire` ENABLE KEYS */;

-- Listage de la structure de la table projet4. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table projet4.user : ~1 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `name`, `password`) VALUES
	(2, 'jean Forteroche', 'Alaska');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
