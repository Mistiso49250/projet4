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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Listage des données de la table projet4.chapitre : ~7 rows (environ)
/*!40000 ALTER TABLE `chapitre` DISABLE KEYS */;
REPLACE INTO `chapitre` (`id_chapitre`, `titre`, `numchapitre`, `extrait`, `contenu_chapitre`, `date_publication`, `image`, `publier`) VALUES
	(4, 'Chapitre 1 Anchorage, Alaska', 1, '<div>\r\n<div>Je souris amèrement tandis que j’examine le contenu du carton – brosse à dents, dentifrice, tenue de sport, une boîte de mouchoirs, un maxi flacon d’Advil.</div>\r\n</div>', '<div>\r\n<p>Je souris amèrement tandis que j’examine le contenu du carton  – brosse à dents, dentifrice, tenue de sport, une boîte de mouchoirs, un maxi flacon d’Advil, un sac de produits de beauté avec quatre tubes de rouge à lèvres entamés, de la laque, une brosse à cheveux et six paires de chaussures que je gardais autrefois sous mon bureau.</p>\r\n<p> </p>\r\n<div>\r\n<div>\r\n<p>C’est là que je remarque le coûteux engin de calcul. Le mois dernier, j’avais réussi à convaincre mon supérieur que j’allais en avoir besoin.</p>\r\n<p> </p>\r\n<div>\r\n<div>\r\n<p>De toute évidence, l’agent de sécurité chargé de nettoyer mon bureau de tous mes effets personnels pendant que je me faisais crûment virer de mon job avait dû penser qu’elle m’appartenait. Probablement à cause du nom « Calla Fletcher » marqué au feutre indélébile dessus, un avertissement à l’attention de mes collègues qui auraient eu l’idée de me la piquer.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '2020-01-14 11:04:19', 'chapitre1.jpg', 1),
	(5, 'Chapitre 2 Wren & Calla', 2, '<p>Un silence pesant s\'installe pendant plusieurs battements de cœur et les sourcils de papa se braquent vers le haut, lui dévorant la moitié du front. Jusqu\'à ce qu\'enfin...</p>\r\n<p> </p>', '<p>Papa s\'interrompt au moment où un Jonah raidi par le sommeil sort sous la véranda, portant la même tenue que la veille. Nous sommes trop loin pour voir la cicatrice qui lui barre le front. Mais nous sommes assez proches pour que je puisse voir son regard d\'acier au moment où il se tourne vers nous, ses bras musculeux croisés contre son torse. Il me fusille du regard.</p>\r\n<p>Un silence pesant s\'installe pendant plusieurs battements de cœur et les sourcils de papa se braquent vers le haut, lui dévorant la moitié du front. Jusqu\'à ce qu\'enfin...</p>\r\n<p>     - Calla ? Combien de temps es-tu restée chez lui après qu\'il s\'est endormi ?</p>\r\n<p>     - Je ne suis plus très sûre.</p>\r\n<p> </p>\r\n<p>Il parle d\'une voix douce mais ça me fait encore plus peur. Papa reprend :</p>\r\n<p>     - Et rappelle-moi ce que tu as fait pendant ce temps ? Travaillé sur le site, donné à manger à Bandit et puis... ah oui, tu as consulté sa bibliothèque. C\'est bien tout ?</p>\r\n<p> </p>\r\n<p>     - Yep, dis-je avec autant de conviction que possible.</p>\r\n<p>     - Je n\'oublie rien, alors ?</p>\r\n<p>     - Rien du tout, mais tu sais quoi ? On devrait y aller. Genre maintenant.</p>\r\n<p> </p>\r\n<p>J\'ose enfin décocher un regard en direction de papa et le découvre en train de se pincer les lèvres, réfrénant difficilement un éclat de rire.</p>\r\n<p>     - Oui, je crois que tu as raison.</p>\r\n<p> </p>\r\n<p>Le véhicule se met en branle et commence à remonter l\'allée en slalom pour éviter les plus gros nids de poules. Il règne dans le camion un silence de mort. Papa finit par le briser :</p>\r\n<p>     - Ses décontractants musculaires doivent être sacrément puissants.</p>\r\n<p>     - Très puissants.</p>\r\n<p> </p>\r\n<p>Il dévisage intensément mon profil jusqu\'à ce que je ne tiennent plus. Je tourne le visage vers lui et découvre qu\'il a les yeux qui brillent. Nous éclatons tous les deux de rire. Pour ma part, je ris de soulagement. Au moins, papa n\'a pas l\'air furieux contre moi. Lorsque nous atteignons la grande route, il est pris d\'une quinte de toux, causée par son hilarité.</p>\r\n<p>     - Oh, Calla... tu t\'es mise dans le pétrin !</p>\r\n<p>     - Il l\'a cherché !</p>\r\n<p>     - C\'est clair, mais Jonah aime avoir le dernier mot. Il ne va pas en rester là.</p>\r\n<p> </p>\r\n<p>Je croise obstinément les bras.</p>', '2020-01-14 11:07:00', 'chapitre2.jpg', 1),
	(6, 'Chapitre 3 Tulukaruq cela signifie "corneille"', 3, '<p>La coneille et sa femme l\'oie ...</p>', '<p>C\'est un conte : une corneiile tombe amoureuse d\'une oie ... ils passent l\'été ensemble et lorsque l\'oie doit partir pour migrer avant les premières chutes de neige, la corneille veut la suivre en direction du sud. Mais la migration lui couterait la vie.</p>\r\n<p>N\'ayant pas le choix, elle laisse l\'oie s\'en aller.</p>\r\n<p>     - Et pourquoi l\'oie ne reste-t-elle pas ?</p>\r\n<p>     - Parce que c\'est une oie et qu\'elle ne survivrait pas à l\'hiver.</p>', '2020-01-14 11:08:43', 'chapitre3.jpg', 1),
	(7, 'Chapitre 4 Calla & Jonah ', 4, '<p>Je vais pour le dépasser mais il me bloque d’une main en me prenant fermement par la taille. Puis, son autre main se pose de l’autre côté et il me pousse doucement en arrière jusqu’au mur. </p>', '<p>     – Jonah, s’il vous plaît, puis-je récupérer mes affai…</p>\r\n<p>     – Non.</p>\r\n<p> </p>\r\n<p>Il n’hésite pas et sa voix est dénuée de toute moquerie.</p>\r\n<p>     – Bien, dis-je avec courtoisie. Je me ferai donc un plaisir de retourner votre baraque jusqu’à ce que je les retrouve.</p>\r\n<p> </p>\r\n<p>Je profiterai qu’il aille travailler pour fouiller. Je vais pour le dépasser mais il me bloque d’une main en me prenant fermement par la taille. Puis, son autre main se pose de l’autre côté et il me pousse doucement en arrière jusqu’au mur. Une sensation de froid ma parcourt le dos.</p>\r\n<p> </p>\r\n<p>Incertaine de ce qui est en train de se passer, je place mes mains entre nous, contre son torse. Mon cerveau n’enregistre plus rien en dehors de la chaleur de son corps et de ses pectoraux. Puis, lorsque j’ose lever les yeux sur lui, je découvre combien son regard est sombre et intense. Tout devient clair. Il semble que mon attirance pour lui soit réciproque.</p>\r\n<p> </p>\r\n<p>Comment est-ce arrivé ? Les secondes s’égrainent, tandis que nous semblons nous jauger l’un l’autre en silence. Puis, Jonah se penche sur moi et ses lèvres glissent sur les miennes avec douceur. Ses lèvres ont un goût de menthe et du sucre brun des flocons d’avoine. Sa barbe fraîchement rasée picote d’une manière bizarrement intime.</p>\r\n<p> </p>\r\n<p>Je ne peux plus respirer. Il s’interrompt et m’effleure à nouveau les lèvres. Il me teste. Il veut savoir comment je vais réagir. Trop timide pour laisser mes mains s’aventurer plus avant sur cette armoire à glace, je susurre :</p>\r\n<p>     – Je croyais que vous n’aimiez pas les filles de mon espèce.</p>\r\n<p> </p>\r\n<p>Son étreinte relâche ma taille et une de ses mains s’aventure vers ma hanche tandis que l’autre remonte doucement le long de mon dos, entre mes omoplates, jusqu’à venir s’emparer de ma nuque. Ses doigts glissent dans mes cheveux et les tire tendrement pour faire basculer ma tête en arrière.</p>\r\n<p> </p>\r\n<p>– Il faut croire que j’avais tort, admet-il d’une voix si grave et virile qu’elle résonne jusqu’au creux de mon ventre.</p>\r\n<p> </p>\r\n<p>Soudain, sans plus hésiter, il m’embrasse.</p>', '2020-01-14 11:10:11', 'chapitre4.jpg', 1),
	(8, 'Chapitre 5  Bon vol, Barbie.', 5, '<p>J\'en reste bouche bée. On ne m\'avait encore jamais fait une remarque pareille. Mes seins sont tout juste dans la moyenne. Je m\'emporte .</p>', '<p>je tâche d\'ignorer deux adolescents d\'environ seize ans qui me matent en buvant leurs sodas. Je râle dans ma barbe :</p>\r\n<p>     - En tout cas, s\'il y a un truc que vous aimez plus que la météo par ici, c\'est dévisager les gens...</p>\r\n<p>     - Il faut les comprendre, ils n\'avaient encore jamais vu de Barbie en chair et en os.</p>\r\n<p> </p>\r\n<p>Je fronce les sourcils, outrée, Pardon ?</p>\r\n<p>     - Je ne suis pas une Barbie, d\'accord ?</p>\r\n<p>     - Vraiment ? fait-il, en me décochant un regard amusé. Faux cheveux, faux sourire, faux ongles...</p>\r\n<p> </p>\r\n<p>Puis, après un rapide coup d’œil en direction de ma poitrine, il ajoute :</p>\r\n<p>     - Y a-t-il quoi que ce soit d\'authentique chez vous ?</p>\r\n<p> </p>\r\n<p>J\'en reste bouche bée. On ne m\'avait encore jamais fait une remarque pareille. Mes seins sont tout juste dans la moyenne. Je m\'emporte :</p>\r\n<p>     - Ils sont vrai !</p>\r\n<p> </p>\r\n<p>Jonah prend l\'air détaché.</p>\r\n<p>     - Personnellement, je m\'en fiche totalement. Vous vouliez savoir pourquoi on vous dévisage ? Je vous réponds.</p>\r\n<p> </p>\r\n<p>Il ouvre son coffre et y fourre les courses. Je reste plantée là, sidérée. Dans le magasin, il avait été salué par au moins vingt-cinq personnes et toutes semblaient authentiquement heureuse de le voir. Bobby le trouve charmant. Agnès le qualifie de nounours. Et à en croire Ethel, il est du genre à marcher sur l\'eau. Serai-je tombée dans une sorte de dimension parallèle ? Un monde où tout le monde adore ce mec et où je suis la seule à le voir tel qu\'il est vraiment ?</p>', '2020-01-14 11:11:51', 'chapitre5.jpg', 1),
	(9, 'Prologue', 0, '<p>Wren dépose les deux valises à roulettes près de la poussette et tire une longue bouffée de cigarette.</p>', '<p>Wren dépose les deux valises à roulettes près de la poussette et tire une longue bouffée de la cigarette négligemment fichée au coin de ses lèvres. Il souffle la fumée dans l’air glacé.</p>\r\n<p>     – C’est tout ? demande-t-il.</p>\r\n<p>     – Il manque le sac de couches.</p>\r\n<p>Je hume l’odeur musquée de sa cigarette. J’ai toujours eu l’odeur du tabac en horreur. C’est toujours le cas, sauf quand c’est Wren qui fume.</p>\r\n<p>     – D’accord, je vais te le chercher, dit-il, lâchant sa cigarette dans la neige avant de l’écraser avec sa botte.</p>\r\n<p>Il joint ses mains calleuses, souffle dedans et file, épaules rentrées, vers le tarmac où le Cessna qui nous a déposés attend son heure de retour vers Bangor.</p>\r\n<p>Je le regarde s’éloigner, impassible, blottie dans la longue doudoune polaire qui me protège du vent glacial, m’accrochant farouchement à la rancœur qui me ronge depuis des mois. Si je lâche prise maintenant, je vais être submergée par la douleur, la déception et l’inévitable sentiment de perte qui m’habite et auquel je ne pourrais pas faire face.</p>', '2020-10-21 10:28:35', 'prologue.jpg', 1),
	(16, 'les', 7, 'ségrainent', 'secondes', '2020-10-25 17:22:15', NULL, 0);
/*!40000 ALTER TABLE `chapitre` ENABLE KEYS */;

-- Listage de la structure de la table projet4. commentaire
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `id_chapitre` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_commentaire` datetime DEFAULT CURRENT_TIMESTAMP,
  `signaler` tinyint(3) unsigned DEFAULT '0',
  `garder` tinyint(4) DEFAULT '0',
  `supprimer` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id_commentaire`),
  KEY `FK_commentaire_chapitre` (`id_chapitre`),
  CONSTRAINT `FK_commentaire_chapitre` FOREIGN KEY (`id_chapitre`) REFERENCES `chapitre` (`id_chapitre`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Listage des données de la table projet4.commentaire : ~1 rows (environ)
/*!40000 ALTER TABLE `commentaire` DISABLE KEYS */;
REPLACE INTO `commentaire` (`id_commentaire`, `id_chapitre`, `pseudo`, `contenu`, `date_commentaire`, `signaler`, `garder`, `supprimer`) VALUES
	(10, 5, 'fruiti', 'nul', '2020-08-25 11:38:48', 1, 0, 0),
	(14, 9, 'fruitisio', 'sympatoche', '2020-10-25 15:35:45', 0, 0, 0);
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
