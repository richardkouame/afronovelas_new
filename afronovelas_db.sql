-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de la table afronovelas. doctrine_migration_versions
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table afronovelas.doctrine_migration_versions : ~5 rows (environ)
DELETE FROM `doctrine_migration_versions`;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20210607163147', '2021-06-12 09:44:14', 146),
	('DoctrineMigrations\\Version20210616180539', '2021-06-16 18:05:57', 64),
	('DoctrineMigrations\\Version20210616180835', '2021-06-16 18:08:46', 130),
	('DoctrineMigrations\\Version20210617085806', '2021-06-17 08:58:29', 647),
	('DoctrineMigrations\\Version20210617090108', '2021-06-17 09:01:12', 155);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;

-- Listage de la structure de la table afronovelas. footer_banner
CREATE TABLE IF NOT EXISTS `footer_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table afronovelas.footer_banner : ~0 rows (environ)
DELETE FROM `footer_banner`;
/*!40000 ALTER TABLE `footer_banner` DISABLE KEYS */;
INSERT INTO `footer_banner` (`id`, `image`, `link`) VALUES
	(1, 'bottom-banner-60ca3078e8a72.jpg', 'https://play.google.com/store/apps/details?id=com.release.mynina');
/*!40000 ALTER TABLE `footer_banner` ENABLE KEYS */;

-- Listage de la structure de la table afronovelas. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table afronovelas.genre : ~8 rows (environ)
DELETE FROM `genre`;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`id`, `title`) VALUES
	(1, 'Amour'),
	(2, 'Passion'),
	(3, 'Drame'),
	(4, 'Aventure');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Listage de la structure de la table afronovelas. program
CREATE TABLE IF NOT EXISTS `program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `synopsis` longtext COLLATE utf8mb4_unicode_ci,
  `trailer_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `format` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_92ED7784A76ED395` (`user_id`),
  CONSTRAINT `FK_92ED7784A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table afronovelas.program : ~5 rows (environ)
DELETE FROM `program`;
/*!40000 ALTER TABLE `program` DISABLE KEYS */;
INSERT INTO `program` (`id`, `user_id`, `title`, `synopsis`, `trailer_link`, `image`, `format`, `created_at`, `updated_at`) VALUES
	(2, 1, 'Windeck', '<p>Un magazine éditorial, voilà un endroit où le glamour se mélange avec l’ambition la puissance et l’argent, celui où se déroule notre histoire, esat le magazine divo. Pour assouvir leurs ambitions, hommes et femmes sont prêts à tout, séduction, trahisons, complots… la très belle victoria, venue de mexico veut faire fortune à tout prix contrairement à sa sœur ana maria, honnête et travailleuse, photographe à divo.  Pour victoria, la vie n’est qu’un jeu d’intérêts. Elle aura ainsi pour cible, le fils du propriétaire de divo, kiluanji qui tombera vite sous son charme. Les choses ne seront pas pour autant faciles pour victoria, car kassia, la fille de l’opportuniste rose bettencourt conçoit également un plan pour séduire kiluanji. C’est ainsi que commence entre les deux filles une guerre sans merci. D’un autre côté, luena, la sœur de kiluanji, une femme de tête est déterminée à diriger l’entreprise de son père, d’où des disputes intempestives avec son frère en proie à tous les pièges.  Des lubies du père, xavier, un homme d’affaires prospère, arrogant et vantard, propriétaire de divo aux traquenards des prétendantes de son fils, kiluanji, “windeck” célèbre la couleur, l’essence, la vibration et la vitalité de la culture angolaise autour des sujets de société universels.</p>', 'https://vimeo.com/175692147/8e9ca9b59b', 'windeck-60c49d9d4a00b.jpg', '22x56', '2021-06-12 11:42:21', '2021-06-23 17:36:13'),
	(3, 1, 'JACOB\'S CROSS', '<p>JACOB S CROSS Jacob\'s Cross est une série qui force à un nouveau regard sur l\'Afrique. Loin des clichés misérabilistes ; nous est offerte la vision d\'une Afrique moderne et conquérante de laquelle émerge la création de grands empires financiers autochtones qui feront face à leurs concurrents occidentaux dans une course effrénée à la recherche de matières premières. Même si la trame principale porte sur le monde des affaires et la quête du pouvoir ; la série enseigne néanmoins que les grandes choses de ce monde (politique, guerre, création d\'empires financiers) tirent souvent leur origine d\'histoires individuelles ou familiales. </p>\r\n<p>L\'histoire se déroule en Afrique du Sud avec en toile de fond cette nouvelle classe émergente qui préside aux destinées du pays depuis la chute de l’apartheid... Voici donc l\'histoire d\'un homme qui a pour ambition de bâtir un empire financier aussi puissant que ce que l\'on trouve aux Etats-Unis, mais avec des capitaux exclusivement africains.</p>\r\n<p>Cet homme c\'est Jacob Makhubu, un brillant homme d\'affaires qui est sur le point d\'obtenir l\'un des plus gros contrats gouvernementaux portant sur la recherche d\'une nouvelle source d\'énergie. Jacob est séduisant et tout lui sourit dans la vie ; il est le fils d\'une célèbre chanteuse de jazz et d\'un héros défunt de la lutte anti-apartheid. Il a fait de brillantes études dans de grandes universités à Londres et aux Etats-Unis et vient tout juste de rentrer au pays... </p>\r\n<p>Jacob rencontre la chance de sa vie lorsqu\'un consortium nigérian lui offre le financement dont il a besoin à la seule condition qu\'il accepte d\'être le dirigeant du projet. Même si Jacob est séduit à la perspective de se trouver à la tête de l\'une des compagnies les plus puissantes et prestigieuses du continent ; il n\'en demeure pas moins qu\'il craint avant tout de perdre son indépendance. Ainsi, il accepte de se rendre à Lagos pour rencontrer le chef Abayomi fondateur de l\'empire du même nom. Mais au lieu de lui parler business, le patriarche Abayomi se présente à Jacob comme étant son vrai père et lui propose de devenir son héritier à la tête de l\'empire Abayomi... </p>\r\n<p>Mais Jacob n\'héritera pas seulement d\'un empire, il héritera également d\'un rêve et d\'une famille. En effet, le patriarche Abayomi est polygame, et possède donc de nombreux enfants. Toute cette fratrie a travaillé avec rigueur et acharnement pour réaliser le rêve du patriarche. </p>\r\n<p>Ces enfants considèrent Jacob comme un étranger, un opportuniste. Cette fronde sera menée par Bola Abayomi qui s\'est toujours considéré comme l\'héritier naturel de son père, celui à qui il lèguera la croix ; bijou mystique dont ce dernier hérita de ses aïeux et qui symbolise sa position de chef. Bola est un homme sans scrupules qui ne recule devant rien pour parvenir à ses fins ; il ira jusqu\'à commettre l\'impensable, l\'abominable... </p>\r\n<p>Mais Jacob a une alliée de taille dans cette famille, c\'est Folake Abayomi, la fille adorée du patriarche; qui, si elle n\'avait pas été une femme aurait naturellement hérité. </p>\r\n<p>Ce lourd héritage entraînera Jacob dans une quête épique où il aura à affronter aussi bien des membres de sa nouvelle famille que de puissants adversaires tapis dans l\'ombre. D\'un côté il y a toutes ces personnes qui sont liées par un passé commun de colonisation et par le désir manifeste de spolier l\'Afrique de ses richesses. Et en face il y a les vrais propriétaires, des gens honnêtes qui sont exploités et qui ne bénéficient aucunement de ces richesses. </p>\r\n<p>Il est question ici de rêves, de fortune, d\'héritage, d\'identité et de pouvoir. C\'est l\'histoire classique du riche et du pauvre où Jacob apprend ce que chacun de nous finira par découvrir un jour ; à savoir qu\'il faut accepter de faire des sacrifices si l\'on veut voir ses rêves se réaliser.</p>', NULL, 'jacobs-cross-60cb62a8b599d.jpg', '22x56', '2021-06-17 14:56:40', '2021-06-23 17:51:52'),
	(4, 1, 'Master & 3 Maids', '<p>3 femmes de ménage : Zinab, la cuisinière et femme de ménage, Suarez, le jardinier et DJ, le concierge, à la recherche d\'une vie meilleure, parviennent à se faire embaucher par un jeune couple de la haute société. par un jeune couple de la haute société mais ce qu\'ils ne savent pas c\'est que leurs problèmes ne sont pas encore terminés.</p>\r\n<p>En réalité, leurs nouveaux patrons, avec leurs airs de bourgeois, sont des gens avares et malhonnêtes qui s\'arrangent toujours pour que leur travail soit bien fait. avares et malhonnêtes qui s\'arrangent toujours pour se débarrasser des employés avant la fin du mois afin de ne pas avoir à payer leur salaire. salaires. Lorsque les ouvriers découvrent la vraie nature du couple ils décident de mettre leurs différences de côté et de s\'unir pour contrecarrer leurs leurs plans et de conserver leurs emplois et leurs salaires. </p>\r\n<p>Y parviendront-ils ? Car tous les personnages partagent un fort sens de l\'humour. Parce que tous les personnages partagent un fort sens de l\'humour, les 26 épisodes de cette comédie nous font rire jusqu\'à ce que nous connaissions la réponse.</p>', 'https://vimeo.com/555284898/d730d999dc', 'master-3-maids-60cb630b85484.jpg', '22x56', '2021-06-17 14:58:19', '2021-06-23 17:57:42'),
	(5, 1, 'Adams Apples', '<p>« Adams Apples » est une série de 10 épisodes qui racontent la vie de 4 jeunes femmes membres de la famille Adams. Au premier coup d’œil les Adams semblent des femmes exemplaires… mais la réalité est un peu différente. Dans ce premier épisode, la journée s’annonce pénible pour Kukua Adams qui vient d’apprendre la nomination de Denu son ex fiancé en qualité de Directeur General adjoint de l’agence de pub dans laquelle elle travaille. La tâche ne s’annonce pas facile pour la jeune femme qui tente d’oublier le passé surtout que Denu ne semble pas disposé à tourner la page de leur histoire chaotique. Pendant ce temps, Jennyfer doit gérer un admirateur plus jeune qu’elle.</p>', 'https://vimeo.com/555286011/c9bbd543d3', 'adams-apples-60cb633cb2210.jpg', '22x56', '2021-06-17 14:59:08', '2021-06-23 17:55:26'),
	(6, 1, 'La Belle Mère', '<p>Mama Agathe a deux fils : Alain et Franky. Riche cadre supérieur de l’administration publique, Alain est également le mari de Chantal, une femme que la mère d’Alain n’aime pas. Elle veut que son fils épouse une autre fille. Elle s’acharne alors sur Chantal et lui mène la vie dure afin d’arriver à ses fins. Quant à son deuxième fils Franky, il est follement amoureux de Kwedi, une handicapée physique. Mais sa mère s’oppose aussi à cette relation. Elle préfère Bakop, la fille d’une de ses meilleures amies. C’est donc une guerre permanente entre une mère égoïste qui veut tout imposer à ses enfants et ceux-ci qui veulent leur autodétermination. « La Belle-mère » est une série sur les injustices sociales. Injustices des belles-mères jalouses de leurs belles-filles, injustice des hommes sournois qui montrent un visage d’agneau alors qu’ils sont des loups.</p>', NULL, 'la-belle-mere-60cb6369b873f.jpg', '22x56', '2021-06-17 14:59:53', '2021-06-23 17:58:19');
/*!40000 ALTER TABLE `program` ENABLE KEYS */;

-- Listage de la structure de la table afronovelas. program_genre
CREATE TABLE IF NOT EXISTS `program_genre` (
  `program_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  PRIMARY KEY (`program_id`,`genre_id`),
  KEY `IDX_1D39400E3EB8070A` (`program_id`),
  KEY `IDX_1D39400E4296D31F` (`genre_id`),
  CONSTRAINT `FK_1D39400E3EB8070A` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_1D39400E4296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table afronovelas.program_genre : ~14 rows (environ)
DELETE FROM `program_genre`;
/*!40000 ALTER TABLE `program_genre` DISABLE KEYS */;
INSERT INTO `program_genre` (`program_id`, `genre_id`) VALUES
	(2, 1),
	(2, 2),
	(2, 3),
	(3, 1),
	(3, 2),
	(3, 3),
	(4, 1),
	(4, 2),
	(4, 3),
	(5, 1),
	(5, 2),
	(5, 3),
	(6, 1),
	(6, 2),
	(6, 3);
/*!40000 ALTER TABLE `program_genre` ENABLE KEYS */;

-- Listage de la structure de la table afronovelas. schedule
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `passage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bloc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5A3811FBA76ED395` (`user_id`),
  CONSTRAINT `FK_5A3811FBA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table afronovelas.schedule : ~22 rows (environ)
DELETE FROM `schedule`;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
INSERT INTO `schedule` (`id`, `user_id`, `title`, `status`, `passage`, `created_at`, `updated_at`, `bloc`) VALUES
	(2, 1, 'New Beginnings', 0, '06:00', '2021-06-17 10:49:40', '2021-06-17 10:49:40', 'bloc1'),
	(3, 1, 'New Beginnings', 0, '09:00', '2021-06-17 10:49:40', '2021-06-17 10:49:40', 'bloc2'),
	(4, 1, 'New Beginnings', 0, '12:00', '2021-06-17 10:49:40', '2021-06-17 10:49:40', 'bloc3'),
	(5, 1, 'New Beginnings', 1, '15:00', '2021-06-17 10:49:40', '2021-06-17 10:49:40', 'bloc4'),
	(6, 1, 'New Beginnings', 0, '18:00', '2021-06-17 10:49:40', '2021-06-17 10:49:40', 'bloc5'),
	(7, 1, 'New Beginnings', 0, '22:30', '2021-06-17 10:49:40', '2021-06-17 10:49:40', 'bloc6'),
	(8, 1, 'Femmes Autoritaires', 0, '06:50', '2021-06-17 11:38:41', '2021-06-17 11:38:41', 'bloc1'),
	(9, 1, 'Femmes Autoritaires', 0, '09:50', '2021-06-17 11:38:41', '2021-06-17 11:38:41', 'bloc2'),
	(10, 1, 'Femmes Autoritaires', 0, '12:50', '2021-06-17 11:38:41', '2021-06-17 11:38:41', 'bloc3'),
	(11, 1, 'Femmes Autoritaires', 1, '15:50', '2021-06-17 11:38:41', '2021-06-17 11:38:41', 'bloc4'),
	(12, 1, 'Femmes Autoritaires', 0, '18:50', '2021-06-17 11:38:41', '2021-06-17 11:38:41', 'bloc5'),
	(13, 1, 'Femmes Autoritaires', 0, '23:30', '2021-06-17 11:38:41', '2021-06-17 14:16:49', 'bloc6'),
	(14, 1, 'La Belle Mere ', 0, '07:40', '2021-06-17 12:19:24', '2021-06-17 12:19:24', 'bloc1'),
	(15, 1, 'La Belle Mere ', 0, '10:40', '2021-06-17 12:19:24', '2021-06-17 12:19:24', 'bloc2'),
	(16, 1, 'La Belle Mere ', 0, '13:40', '2021-06-17 12:19:24', '2021-06-17 12:19:24', 'bloc3'),
	(17, 1, 'La Belle Mere ', 1, '16:40', '2021-06-17 12:19:24', '2021-06-17 12:19:24', 'bloc4'),
	(18, 1, 'La Belle Mere ', 0, '19:40', '2021-06-17 12:19:24', '2021-06-17 12:19:24', 'bloc5'),
	(19, 1, 'La Belle Mere ', 0, '00:00', '2021-06-17 12:19:24', '2021-06-17 12:19:24', 'bloc6'),
	(20, 1, 'Master & Three Maid', 0, '08:30', '2021-06-17 12:20:38', '2021-06-17 12:20:38', 'bloc1'),
	(21, 1, 'Master & Three Maid', 0, '11:30', '2021-06-17 12:20:38', '2021-06-17 12:20:38', 'bloc2'),
	(22, 1, 'Master & Three Maid', 0, '14:30', '2021-06-17 12:20:38', '2021-06-17 12:20:38', 'bloc3'),
	(23, 1, 'Master & Three Maid', 1, '17:30', '2021-06-17 12:20:38', '2021-06-17 12:20:38', 'bloc4'),
	(24, 1, 'Master & Three Maid', 0, '20:30', '2021-06-17 12:20:38', '2021-06-17 12:20:38', 'bloc5'),
	(25, 1, 'Master & Three Maid', 0, '00:50', '2021-06-17 12:20:38', '2021-06-17 12:20:38', 'bloc6');
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;

-- Listage de la structure de la table afronovelas. serie
CREATE TABLE IF NOT EXISTS `serie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `synopsis` longtext COLLATE utf8mb4_unicode_ci,
  `trailer_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_AA3A9334A76ED395` (`user_id`),
  CONSTRAINT `FK_AA3A9334A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table afronovelas.serie : ~4 rows (environ)
DELETE FROM `serie`;
/*!40000 ALTER TABLE `serie` DISABLE KEYS */;
INSERT INTO `serie` (`id`, `user_id`, `title`, `synopsis`, `trailer_link`, `image`, `created_at`, `updated_at`) VALUES
	(2, 1, 'La belle mere', '<p>Mama Agathe a deux fils : Alain et Franky. Riche cadre supérieur de l’administration publique, Alain est également le mari de Chantal, une femme que la mère d’Alain n’aime pas. Elle veut que son fils épouse une autre fille. Elle s’acharne alors sur Chantal et lui mène la vie dure afin d’arriver à ses fins. Quant à son deuxième fils Franky, il est follement amoureux de Kwedi, une handicapée physique. Mais sa mère s’oppose aussi à cette relation. Elle préfère Bakop, la fille d’une de ses meilleures amies. C’est donc une guerre permanente entre une mère égoïste qui veut tout imposer à ses enfants et ceux-ci qui veulent leur autodétermination. « La Belle-mère » est une série sur les injustices sociales. Injustices des belles-mères jalouses de leurs belles-filles, injustice des hommes sournois qui montrent un visage d’agneau alors qu’ils sont des loups.</p>', 'https://vimeo.com/459337620/79e553cc9f', 'serie-2-60c484f8871f2.jpg', '2021-06-12 09:57:12', '2021-06-23 17:58:55'),
	(3, 1, 'Mariage a abidjan', '<p>Chima, chauffeur de taxi-moto à Lagos, n’arrive plus à joindre les deux bouts. Sa solution : partir à l’aventure à Abidjan, là où l’herbe est plus verte. Sur place Chima se fait passer pour le fils d’un riche homme d’affaires Nigérien, ce qui lui ouvre des portes et lui permet de côtoyer le gratin de la société. Mais dans ce monde de paillettes, on découvre des hommes et des femmes sans scrupules, dont le seul but est de s’enrichir quel que soit les moyens.</p>', 'https://vimeo.com/555285254/2fb0c00bc2', 'mariage-a-abidjan-60c4874c15368.jpg', '2021-06-12 10:07:08', '2021-06-23 17:59:40'),
	(4, 1, 'Master and 3 maids', '<p>3 femmes de ménage : Zinab, la cuisinière et femme de ménage, Suarez, le jardinier et DJ, le concierge, à la recherche d\'une vie meilleure, parviennent à se faire embaucher par un jeune couple de la haute société. par un jeune couple de la haute société mais ce qu\'ils ne savent pas c\'est que leurs problèmes ne sont pas encore terminés. En réalité, leurs nouveaux patrons, avec leurs airs de bourgeois, sont des gens avares et malhonnêtes qui s\'arrangent toujours pour que leur travail soit bien fait. avares et malhonnêtes qui s\'arrangent toujours pour se débarrasser des employés avant la fin du mois afin de ne pas avoir à payer leur salaire. salaires. Lorsque les ouvriers découvrent la vraie nature du couple ils décident de mettre leurs différences de côté et de s\'unir pour contrecarrer leurs leurs plans et de conserver leurs emplois et leurs salaires.  Y parviendront-ils ? Car tous les personnages partagent un fort sens de l\'humour. Parce que tous les personnages partagent un fort sens de l\'humour, les 26 épisodes de cette comédie nous font rire jusqu\'à ce que nous connaissions la réponse.</p>', 'https://vimeo.com/555284898/d730d999dc', 'master-and-3-maids-60c48b0b5af41.jpg', '2021-06-12 10:23:07', '2021-06-23 18:00:17'),
	(5, 1, 'Adam\'s Apples', '<p>« Adams Apples » est une série de 10 épisodes qui racontent la vie de 4 jeunes femmes membres de la famille Adams. Au premier coup d’œil les Adams semblent des femmes exemplaires… mais la réalité est un peu différente. Dans ce premier épisode, la journée s’annonce pénible pour Kukua Adams qui vient d’apprendre la nomination de Denu son ex fiancé en qualité de Directeur General adjoint de l’agence de pub dans laquelle elle travaille. La tâche ne s’annonce pas facile pour la jeune femme qui tente d’oublier le passé surtout que Denu ne semble pas disposé à tourner la page de leur histoire chaotique. Pendant ce temps, Jennyfer doit gérer un admirateur plus jeune qu’elle.</p>', 'https://vimeo.com/555286011/c9bbd543d3', 'adams-apples-60cb63e1dac0d.jpg', '2021-06-17 15:01:53', '2021-06-23 18:00:42');
/*!40000 ALTER TABLE `serie` ENABLE KEYS */;

-- Listage de la structure de la table afronovelas. slogan
CREATE TABLE IF NOT EXISTS `slogan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slogan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table afronovelas.slogan : ~0 rows (environ)
DELETE FROM `slogan`;
/*!40000 ALTER TABLE `slogan` DISABLE KEYS */;
INSERT INTO `slogan` (`id`, `slogan`) VALUES
	(1, 'LES MEILLEURES SERIES D\'AFRIQUE');
/*!40000 ALTER TABLE `slogan` ENABLE KEYS */;

-- Listage de la structure de la table afronovelas. social
CREATE TABLE IF NOT EXISTS `social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table afronovelas.social : ~4 rows (environ)
DELETE FROM `social`;
/*!40000 ALTER TABLE `social` DISABLE KEYS */;
INSERT INTO `social` (`id`, `title`, `link`) VALUES
	(1, 'Facebook', 'https://www.facebook.com/afronovelas'),
	(2, 'Youtube', 'https://www.youtube.com/afronovelas'),
	(3, 'TikTok', 'https://www.tiktok.com/afronovelas'),
	(4, 'Instagram', 'https://www.instagram.com/afronovelas');
/*!40000 ALTER TABLE `social` ENABLE KEYS */;

-- Listage de la structure de la table afronovelas. tv_chanel
CREATE TABLE IF NOT EXISTS `tv_chanel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table afronovelas.tv_chanel : ~4 rows (environ)
DELETE FROM `tv_chanel`;
/*!40000 ALTER TABLE `tv_chanel` DISABLE KEYS */;
INSERT INTO `tv_chanel` (`id`, `title`, `image`, `created_at`, `updated_at`, `link`) VALUES
	(1, 'Tv D\'orange', '2-60ca371b0a371.png', '2021-06-16 17:38:35', '2021-06-16 18:16:30', 'https://espacetv.orange.ci'),
	(2, 'New world', '1-60ca373004754.png', '2021-06-16 17:38:56', '2021-06-16 18:17:05', 'https://www.newworldtv.com'),
	(3, 'Telma', '3-60ca3744c3357.png', '2021-06-16 17:39:16', '2021-06-16 18:17:39', 'https://telma.com.mk'),
	(4, 'Groupe Togocom', '4-60ca375eb522b.png', '2021-06-16 17:39:42', '2021-06-16 18:18:04', 'https://togocom.tg');
/*!40000 ALTER TABLE `tv_chanel` ENABLE KEYS */;

-- Listage de la structure de la table afronovelas. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table afronovelas.user : ~0 rows (environ)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`, `created_at`, `updated_at`) VALUES
	(1, 'demo@example.com', '[]', '$2y$13$ab4Q9zi4ObMiUH.ilXFwf.ByCSCLa/DbogMrsjDiiCNoLMU9950Be', 'demo', 'demo', '2021-04-18 11:33:13', '2021-06-12 09:45:27');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
