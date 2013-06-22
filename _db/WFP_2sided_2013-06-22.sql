# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: WFP_2sided
# Generation Time: 2013-06-22 23:04:31 +0000
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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
	(47,'51bb79ac451bb',1371240876,NULL,'Spiderman','Peter Parker'),
	(48,'51bb79ac451bb',1371240876,NULL,'Superman','Clark Kent'),
	(49,'51bb79ac451bb',1371240876,NULL,'The Hulk','Brucebanner'),
	(50,'51bb79ac451bb',1371240876,NULL,'Wolverine','Logan'),
	(51,'51bb79ac451bb',1371240876,NULL,'5','1'),
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
	(106,'51c12d64eace1',1371625421,NULL,'Tammy','Swanson'),
	(108,'51c12d64eace1',1371625642,NULL,'Andy','Dwyer'),
	(109,'51c12d64eace1',1371625687,NULL,'Jerry','Gergich'),
	(110,'51c12d64eace1',1371626286,NULL,'Donna','Meagle'),
	(111,'51c12d64eace1',1371626371,NULL,'Mark','Brendanawicz'),
	(112,'51c12d64eace1',1371626405,NULL,'Jean-Ralphio','Saperstein'),
	(124,'51c22cee55e06',1371679982,NULL,'fjdsklj','lksjdf'),
	(125,'51c22cee55e06',1371679982,NULL,'dlfkj','kjdf'),
	(126,'51c22cee55e06',1371679982,NULL,'fdsfj','dfkj'),
	(127,'51c22cee55e06',1371679982,NULL,'fkljs','ljsdf'),
	(128,'51c22cee55e06',1371679982,NULL,'lsdkfj','lkdsjf'),
	(129,'51c12d64eace1',1371680093,NULL,'Tom','Haverford');

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
	('51bb79ac451bb',3,'Super hero real names',0,1371240876,NULL),
	('51bbc9319c394',11,'My First Deck',0,1371261233,NULL),
	('51be7817de3a9',4,'Sean\'s First Set',0,1371437079,NULL),
	('51bf8e46297cf',4,'New Deck',1,1371508294,NULL),
	('51c12d64eace1',3,'Pawnee Parks Staff',0,1371614564,NULL),
	('51c22cee55e06',4,'test',1,1371679982,NULL);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `status`, `created_at`, `updated_at`)
VALUES
	(1,3,6,1,NULL,NULL),
	(2,2,3,1,NULL,NULL),
	(3,3,1,1,NULL,NULL),
	(4,2,4,1,NULL,NULL),
	(5,3,4,1,NULL,NULL);

/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
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
	(1,3,8,'friend',0,1371245681,NULL),
	(2,3,11,'challenge',0,1371245681,NULL);

/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ratings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ratings`;

CREATE TABLE `ratings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `deck_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `deck_id` int(11) DEFAULT NULL,
  `tag_name` varchar(50) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



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
	(1,'georgeolsen','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','george@gmail.com',1371169234,'5a89269fbf76288e3305e3aba458c1068d42cc47',NULL,'1.png',NULL,NULL,1371147865,NULL,1,0),
	(2,'bradcerny','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','brad@gmail.com',1371670055,'54807d3914f55424aa831eb44d935660a60ff84a','Brad','2.png',NULL,NULL,1371147877,NULL,1,0),
	(3,'kmills006','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','miller.kristy06@gmail.com',1371874818,'cd4274cc1212f44cb85e5496e4aeda03825887b9','Kristy','3.png',NULL,NULL,1371147887,1371598313,1,0),
	(4,'seancasey','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','sean@gmail.com',1371705508,'be41b3e077c3d632bcf6eea32a0411f855d152ef',NULL,'4.jpg',NULL,NULL,1371147966,NULL,1,0),
	(5,'svalts','CtMhyTJsUffvusW4mpAsoAvapr+TxnknrQh1MmAoHZA=','simon@gmail.com',1371148363,'02d266db2aa686a29a9af0d683b85d3d5124cfcb',NULL,'1.png',NULL,NULL,1371147984,NULL,1,0),
	(6,'romain','CtMhyTJsUffvusW4mpAsoAvapr+TxnknrQh1MmAoHZA=','romain@gmail.com',1371148031,'086ef9ffc5ed446b5d5cb24d5f45fc6d727fdcde',NULL,'6.png',NULL,NULL,1371148031,NULL,1,0),
	(7,'cindytx1050','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','cindytx1050@gmail.com',1371148109,'8db91f966222e17b1a3fe20abf2677683231622f',NULL,'1.png',NULL,NULL,1371148109,NULL,1,0),
	(8,'catiem16','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','catiem16@gmail.com',1371148324,'be1ec444fd586bf89972d4a463f32e3ed39e7f24',NULL,'1.png',NULL,NULL,1371148324,NULL,1,0),
	(9,'kolby','CtMhyTJsUffvusW4mpAsoAvapr+TxnknrQh1MmAoHZA=','kolby@gmail.com',1371245559,'dd897552dc474fa649b46dd977ee7ab9aca7550c',NULL,'1.png',NULL,NULL,1371245559,NULL,1,0),
	(10,'chris','CtMhyTJsUffvusW4mpAsoAvapr+TxnknrQh1MmAoHZA=','chris@gmail.com',1371245682,'f53756adf5ca5c13ccec97014ae050da87fcaa0b',NULL,'1.png',NULL,NULL,1371245681,NULL,1,0),
	(11,'blazer123','+R7FGDNLCM7Yld6LguiCG+HvlRxjSmF53U8/IS4W8ao=','blazer123@gmail.com',1371505342,'10b2b26b45ccad89f7de090cef67c374aec96f6d',NULL,'1.png',NULL,NULL,1371260240,NULL,1,0);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
