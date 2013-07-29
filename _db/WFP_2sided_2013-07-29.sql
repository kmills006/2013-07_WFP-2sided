# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: WFP_2sided
# Generation Time: 2013-07-29 21:52:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cards
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cards`;

CREATE TABLE `cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deck_id` varchar(30) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `term` text,
  `definition` text,
  PRIMARY KEY (`id`),
  KEY `deck_id` (`deck_id`),
  CONSTRAINT `cards_ibfk_1` FOREIGN KEY (`deck_id`) REFERENCES `decks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cards` WRITE;
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;

INSERT INTO `cards` (`id`, `deck_id`, `created_at`, `updated_at`, `term`, `definition`)
VALUES
	(30,'51bb64917d629',1371235473,NULL,'Bobby Flay','Boy Meets Grill'),
	(31,'51bb64917d629',1371235473,NULL,'Ina Garder','Barefoot Contessa'),
	(32,'51bb64917d629',1371235473,NULL,'Guy Fieri','Diners, Drive In and Dives'),
	(33,'51bb64917d629',1371235473,NULL,'Giada de Laurentiis','Everyday Italian'),
	(34,'51bb64917d629',1371235473,NULL,'Rachel Ray','30 Minute Meals'),
	(74,'51bbc9319c394',1371261233,NULL,'Hey','Hey'),
	(75,'51bbc9319c394',1371261233,NULL,'One','One'),
	(76,'51bbc9319c394',1371261233,NULL,'Army','United'),
	(77,'51bbc9319c394',1371261233,NULL,'One','Leader'),
	(78,'51bbc9319c394',1371261233,NULL,'5','1'),
	(82,'51be7817de3a9',1371437079,NULL,'Term','Definition'),
	(83,'51be7817de3a9',1371437080,NULL,'Term','Definition'),
	(84,'51be7817de3a9',1371437080,NULL,'Term','Definition'),
	(85,'51be7817de3a9',1371437080,NULL,'Term','Definition'),
	(86,'51be7817de3a9',1371437080,NULL,'Term','Definition'),
	(87,'51be7817de3a9',1371437080,NULL,'5','1'),
	(88,'51bf8e46297cf',1371508294,NULL,'term 1','defin'),
	(89,'51bf8e46297cf',1371508294,NULL,'5','1'),
	(101,'51c12d64eace1',1371614565,NULL,'Ron','Swanson'),
	(102,'51c12d64eace1',1371614565,NULL,'Ben','Wyatt'),
	(103,'51c12d64eace1',1371614565,NULL,'Leslie','Knope'),
	(104,'51c12d64eace1',1371614565,NULL,'April','Ludgate'),
	(105,'51c12d64eace1',1371614565,NULL,'Ann','Perkins'),
	(108,'51c12d64eace1',1371625642,NULL,'Andy','Dwyer'),
	(109,'51c12d64eace1',1371625687,NULL,'Jerry','Gergich, Gergich, Gergich, Gergich, Gergich, Gergich, Gergich, Gergich, Gergich, Gergich, Gergich, '),
	(110,'51c12d64eace1',1371626286,NULL,'Donna','Meagle'),
	(111,'51c12d64eace1',1371626371,NULL,'Mark','Brendanawicz'),
	(112,'51c12d64eace1',1371626405,NULL,'Jean-Ralphio','Saperstein'),
	(124,'51c22cee55e06',1371679982,NULL,'fjdsklj','lksjdf'),
	(125,'51c22cee55e06',1371679982,NULL,'dlfkj','kjdf'),
	(126,'51c22cee55e06',1371679982,NULL,'fdsfj','dfkj'),
	(127,'51c22cee55e06',1371679982,NULL,'fkljs','ljsdf'),
	(128,'51c22cee55e06',1371679982,NULL,'lsdkfj','lkdsjf'),
	(129,'51c12d64eace1',1371680093,NULL,'Tom','Haverford'),
	(130,'51c89ba39aeea',1372101539,NULL,'Banana','Grams'),
	(131,'51c89ba39aeea',1372101539,NULL,'Banana','Grams'),
	(135,'51db6887a764a',1373333640,NULL,'Term','Def'),
	(136,'51db6887a764a',1373333640,NULL,'Term','Def'),
	(137,'51db6887a764a',1373333640,NULL,'Term','Def'),
	(138,'51db6887a764a',1373333640,NULL,'Term','Def'),
	(139,'51db6887a764a',1373333640,NULL,'Term','Def');

/*!40000 ALTER TABLE `cards` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table decks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `decks`;

CREATE TABLE `decks` (
  `id` varchar(30) NOT NULL DEFAULT '',
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `privacy` int(1) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `decks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `decks` WRITE;
/*!40000 ALTER TABLE `decks` DISABLE KEYS */;

INSERT INTO `decks` (`id`, `user_id`, `title`, `privacy`, `created_at`, `updated_at`)
VALUES
	('51bb64917d629',3,'Cooking 101',1,1371235473,NULL),
	('51bbc9319c394',11,'My First Deck',0,1371261233,NULL),
	('51be7817de3a9',4,'Sean\'s First Set',0,1371437079,NULL),
	('51bf8e46297cf',4,'New Deck',1,1371508294,NULL),
	('51c12d64eace1',3,'Pawnee Parks Staff',0,1371614564,NULL),
	('51c22cee55e06',4,'test',1,1371679982,NULL),
	('51c89ba39aeea',4,'Testing Tags',0,1372101539,NULL),
	('51db6887a764a',16,'New Deck',0,1373333639,NULL);

/*!40000 ALTER TABLE `decks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table friends
# ------------------------------------------------------------

DROP TABLE IF EXISTS `friends`;

CREATE TABLE `friends` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `friend_id` (`friend_id`),
  CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `status`, `created_at`, `updated_at`)
VALUES
	(34,5,3,1,1374184164,NULL),
	(35,3,1,1,1374184573,NULL),
	(36,3,9,1,1374548226,NULL);

/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table levels
# ------------------------------------------------------------

DROP TABLE IF EXISTS `levels`;

CREATE TABLE `levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(1) DEFAULT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `required_score` int(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;

INSERT INTO `levels` (`id`, `level`, `display_name`, `required_score`, `created_at`, `updated_at`)
VALUES
	(1,1,'Newbie',0,1375135401,NULL),
	(2,2,'New Around Here',50,1375135401,NULL),
	(3,3,'Name',100,1375135401,NULL),
	(4,4,'Name',200,1375135401,NULL),
	(5,5,'Name',450,1375135401,NULL),
	(6,6,'Name',700,1375135401,NULL),
	(7,7,'Name',1000,1375135401,NULL),
	(8,8,'Master',2000,1375135401,NULL);

/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table likes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `deck_id` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deck_id` (`deck_id`),
  CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`deck_id`) REFERENCES `decks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;

INSERT INTO `likes` (`id`, `deck_id`, `user_id`, `rating`, `created_at`, `updated_at`)
VALUES
	(7,'51bb64917d629',16,1,1373921846,NULL),
	(55,'51c12d64eace1',19,1,1374019099,NULL),
	(110,'51bb64917d629',2,1,1374170545,NULL),
	(111,'51bb64917d629',8,1,1923883838,NULL),
	(112,'51bbc9319c394',3,1,1374269459,NULL),
	(113,'51bf8e46297cf',3,1,1374594900,NULL);

/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table notifications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `friend_id` (`friend_id`),
  CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;

INSERT INTO `notifications` (`id`, `user_id`, `friend_id`, `message`, `status`, `created_at`, `updated_at`)
VALUES
	(32,3,7,'friend',0,1373516125,NULL),
	(55,5,11,'friend',0,1373516125,NULL),
	(58,4,11,'friend',0,1273512125,NULL),
	(60,11,7,'friend',0,1273512125,NULL),
	(73,9,5,'friend',0,1374184337,NULL),
	(74,5,1,'friend',0,1374184451,NULL),
	(75,2,3,'friend',0,1239483832,NULL);

/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table resources
# ------------------------------------------------------------

DROP TABLE IF EXISTS `resources`;

CREATE TABLE `resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `deck_id` varchar(50) DEFAULT NULL,
  `card_id` int(11) DEFAULT NULL,
  `resource` varchar(100) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `deck_id` (`deck_id`),
  KEY `card_id` (`card_id`),
  CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `resources_ibfk_2` FOREIGN KEY (`deck_id`) REFERENCES `decks` (`id`),
  CONSTRAINT `resources_ibfk_3` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `resources` WRITE;
/*!40000 ALTER TABLE `resources` DISABLE KEYS */;

INSERT INTO `resources` (`id`, `user_id`, `deck_id`, `card_id`, `resource`, `created_at`, `updated_at`)
VALUES
	(84,3,'51c12d64eace1',129,'practice',1374705727,NULL),
	(89,3,'51c12d64eace1',104,'practice',1374708099,NULL),
	(90,3,'51c12d64eace1',109,'practice',1374708201,NULL),
	(98,3,'51c12d64eace1',102,'master',1374776847,NULL),
	(99,3,'51c12d64eace1',104,'practice',1374789409,NULL),
	(105,3,'51c12d64eace1',110,'practice',1374877695,NULL),
	(106,3,'51c12d64eace1',110,'practice',1374877696,NULL),
	(107,3,'51c12d64eace1',110,'practice',1374877699,NULL);

/*!40000 ALTER TABLE `resources` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table scores
# ------------------------------------------------------------

DROP TABLE IF EXISTS `scores`;

CREATE TABLE `scores` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `deck_id` varchar(50) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `total_correct` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `deck_id` (`deck_id`),
  CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `scores_ibfk_2` FOREIGN KEY (`deck_id`) REFERENCES `decks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `scores` WRITE;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;

INSERT INTO `scores` (`id`, `user_id`, `deck_id`, `score`, `total_correct`, `created_at`, `updated_at`)
VALUES
	(5,3,'51c12d64eace1',0,0,1374291066,NULL),
	(6,3,'51c12d64eace1',67,8,1374291117,NULL),
	(7,3,'51c12d64eace1',0,0,1374291196,NULL),
	(8,3,'51c12d64eace1',0,0,1374293717,NULL),
	(9,3,'51c12d64eace1',0,0,1374293769,NULL),
	(10,3,'51c12d64eace1',0,0,1374295863,NULL),
	(11,3,'51c12d64eace1',0,0,1374295949,NULL),
	(12,3,'51c12d64eace1',25,3,1374296295,NULL),
	(13,3,'51c12d64eace1',100,11,1374612833,NULL),
	(14,3,'51c12d64eace1',9,1,1374814056,NULL),
	(15,3,'51c12d64eace1',0,0,1374814127,NULL),
	(16,3,'51c12d64eace1',0,0,1374814314,NULL),
	(17,3,'51c12d64eace1',9,1,1374814454,NULL),
	(18,3,'51c12d64eace1',64,7,1374821650,NULL),
	(19,3,'51c12d64eace1',27,3,1374859371,NULL),
	(20,3,'51c12d64eace1',18,2,1374879754,NULL),
	(21,3,'51c12d64eace1',0,0,1374953744,NULL),
	(22,3,'51c12d64eace1',0,0,1374953744,NULL),
	(23,3,'51c12d64eace1',0,0,1374953744,NULL),
	(24,3,'51c12d64eace1',0,0,1374953744,NULL),
	(25,3,'51c12d64eace1',0,0,1374953744,NULL),
	(26,3,'51c12d64eace1',0,0,1374953744,NULL),
	(27,NULL,'51c12d64eace1',0,0,1375125254,NULL),
	(28,NULL,'51c12d64eace1',27,3,1375125983,NULL),
	(29,NULL,'51c12d64eace1',36,4,1375126099,NULL),
	(30,NULL,'51c12d64eace1',45,5,1375126125,NULL);

/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table study_points
# ------------------------------------------------------------

DROP TABLE IF EXISTS `study_points`;

CREATE TABLE `study_points` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `user_id` int(13) DEFAULT NULL,
  `total_points` int(13) DEFAULT NULL,
  `created_at` int(13) DEFAULT NULL,
  `updated_at` int(13) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `study_points_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `study_points` WRITE;
/*!40000 ALTER TABLE `study_points` DISABLE KEYS */;

INSERT INTO `study_points` (`id`, `user_id`, `total_points`, `created_at`, `updated_at`)
VALUES
	(1,3,163,18384728,NULL);

/*!40000 ALTER TABLE `study_points` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `deck_id` varchar(50) DEFAULT NULL,
  `tag_name` varchar(50) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deck_id` (`deck_id`),
  CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`deck_id`) REFERENCES `decks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;

INSERT INTO `tags` (`id`, `deck_id`, `tag_name`, `created_at`, `updated_at`)
VALUES
	(2,'51c22cee55e06','bannanana',NULL,NULL),
	(3,'51c89ba39aeea','History',1372101539,NULL),
	(4,'51c89ba39aeea',' Game Shows',1372101539,NULL),
	(5,'51c89ba39aeea',' Testing',1372101539,NULL),
	(10,'51db6887a764a','History',1373333640,NULL),
	(11,'51db6887a764a',' Bananas',1373333640,NULL),
	(12,'51db6887a764a',' Family Guy',1373333640,NULL),
	(16,'51c12d64eace1','pawnee',1823737373,NULL),
	(17,'51c12d64eace1','parks and rec',1134747833,NULL),
	(18,'51c12d64eace1','NBC',2147483647,NULL),
	(19,'51c12d64eace1','prime time tv',2147483647,NULL);

/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `last_login` int(11) DEFAULT NULL,
  `login_hash` varchar(50) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `profile_image` varchar(20) DEFAULT NULL,
  `facebook_id` varchar(30) DEFAULT NULL,
  `twitter_id` varchar(30) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `group` int(1) DEFAULT NULL,
  `profile_fields` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `last_login`, `login_hash`, `name`, `profile_image`, `facebook_id`, `twitter_id`, `created_at`, `updated_at`, `group`, `profile_fields`)
VALUES
	(1,'georgeolsen','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','george@gmail.com',1374184458,'79ad2b34cedf0ea464f5fb1dbc18884161875769',NULL,'1.png',NULL,NULL,1371147865,NULL,1,0),
	(2,'bradcerny','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','brad@gmail.com',1373950434,'71e4e087cb0bdb6527debb2d467a08c3f0137728','Brad','2.png',NULL,NULL,1371147877,NULL,1,0),
	(3,'kmills006','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','miller.kristy06@gmail.edu',1375127297,'c3fdb56a32495d83bffd9a388b9c62bdeee8c744','Kristy','3.png','100001345779176dfsdf',NULL,1371147887,1371598313,1,0),
	(4,'seancasey','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','sean@gmail.com',1372096324,'edbb07c259a3ffac60d9af10826eeb0f2aa2785a','Sean','4.jpg',NULL,NULL,1371147966,NULL,1,0),
	(5,'svalts','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','simon@gmail.com',1374184357,'97279eec9c46fe92fa11df00322bd1dc1162afc5','Simon','1.png',NULL,NULL,1371147984,NULL,1,0),
	(6,'romain','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','romain@gmail.com',1371148031,'086ef9ffc5ed446b5d5cb24d5f45fc6d727fdcde',NULL,'6.png',NULL,NULL,1371148031,NULL,1,0),
	(7,'cindytx1050','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','cindytx1050@gmail.com',1373511183,'c723d3b90485227959d5b0d37dbd2296ac071e2c',NULL,'1.png',NULL,NULL,1371148109,NULL,1,0),
	(8,'catiem16','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','catiem16@gmail.com',1371148324,'be1ec444fd586bf89972d4a463f32e3ed39e7f24',NULL,'1.png',NULL,NULL,1371148324,NULL,1,0),
	(9,'kolby','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','kolby@gmail.com',1374552491,'f6b8dd35cec3a535421d391fa3eb6d280bd930c7',NULL,'1.png',NULL,NULL,1371245559,NULL,1,0),
	(10,'chris','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','chris@gmail.com',1373523459,'8a0ed96ff08375a8ee6de9d1d12500232319c188',NULL,'1.png',NULL,NULL,1371245681,NULL,1,0),
	(11,'blazer123','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','blazer123@gmail.com',1373577873,'dbe983f3468820474395bafae7736e511057d2a6',NULL,'1.png',NULL,NULL,1371260240,NULL,1,0),
	(12,'kmills00061','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','miller.kristy06@gmail.nan',1372015119,'b25bb89f5e637bc1b426a872640f5b73c762cf95',NULL,NULL,NULL,NULL,1372015119,NULL,1,0),
	(15,'bananagrams','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','banana@gmail.com',1372202831,'2e625377e01e4cc4a2347d9cfc18877cb679ffc3',NULL,NULL,NULL,NULL,1372202831,NULL,1,0),
	(16,'banananana','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','miller.kristy06@gmail.com',1372390421,'3a45cd60f29130cb2d3979e4f558dad6e8353615','Vince',NULL,'100001345779176',NULL,1372390421,NULL,1,0),
	(17,'surferdie141','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','surferdie141@hotmail.com',1373677168,'70357339759e4e3765ec00fefc4f4b15450191ef','Angel',NULL,NULL,NULL,1373677168,NULL,1,0),
	(18,'dfdsfdsfsdf','KGZv1JDg6WUcUUxIMrGviBdJtjvisXTtJhOOhK+5yDo=','dfdsf@gmail.com',1374018478,'b11237c2709e67ea65f071ff2c7668193d106d2c',NULL,NULL,NULL,NULL,1374018477,NULL,1,0),
	(19,'new_user','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','new_user@gmail.com',1374019079,'2a77f08884149a6df24c03740b6ac5c2b764ea48',NULL,NULL,NULL,NULL,1374019079,NULL,1,0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
