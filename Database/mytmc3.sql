# Host: localhost  (Version: 5.5.38)
# Date: 2015-02-17 22:22:10
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "article"
#

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `Id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) NOT NULL DEFAULT '',
  `body` mediumtext,
  `title` text,
  UNIQUE KEY `Id` (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "article"
#

/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (0,'分享','1','deec','my article');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

#
# Structure for table "authority"
#

DROP TABLE IF EXISTS `authority`;
CREATE TABLE `authority` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "authority"
#

/*!40000 ALTER TABLE `authority` DISABLE KEYS */;
INSERT INTO `authority` VALUES (1,'admin'),(2,'superadmin'),(3,'member');
/*!40000 ALTER TABLE `authority` ENABLE KEYS */;

#
# Structure for table "club"
#

DROP TABLE IF EXISTS `club`;
CREATE TABLE `club` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `club_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `prisident` varchar(255) DEFAULT NULL,
  `vpe` varchar(255) DEFAULT NULL,
  `vpm` varchar(255) DEFAULT NULL,
  `vppr` varchar(255) DEFAULT NULL,
  `saa` varchar(255) DEFAULT NULL,
  `teasurer` varchar(255) DEFAULT NULL,
  `secretary` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "club"
#

/*!40000 ALTER TABLE `club` DISABLE KEYS */;
INSERT INTO `club` VALUES (1,'Nokia Metalk','China','Hangzhou','Binjiang','Xincheng Roud 567#',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Hangzhou Metalk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `club` ENABLE KEYS */;

#
# Structure for table "club_meeting"
#

DROP TABLE IF EXISTS `club_meeting`;
CREATE TABLE `club_meeting` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `club_id` varchar(255) DEFAULT NULL,
  `m_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `club_id` (`club_id`),
  KEY `m_id` (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "club_meeting"
#

/*!40000 ALTER TABLE `club_meeting` DISABLE KEYS */;
INSERT INTO `club_meeting` VALUES (1,'1','1'),(2,'1','2');
/*!40000 ALTER TABLE `club_meeting` ENABLE KEYS */;

#
# Structure for table "club_user"
#

DROP TABLE IF EXISTS `club_user`;
CREATE TABLE `club_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `club_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `club_id` (`club_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "club_user"
#

/*!40000 ALTER TABLE `club_user` DISABLE KEYS */;
INSERT INTO `club_user` VALUES (1,1,1),(2,1,2),(3,1,3),(4,2,1);
/*!40000 ALTER TABLE `club_user` ENABLE KEYS */;

#
# Structure for table "evaluation"
#

DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE `evaluation` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `speech_id` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `speech_id` (`speech_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "evaluation"
#

/*!40000 ALTER TABLE `evaluation` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluation` ENABLE KEYS */;

#
# Structure for table "guest_checkin"
#

DROP TABLE IF EXISTS `guest_checkin`;
CREATE TABLE `guest_checkin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `chinese_name` varchar(255) DEFAULT NULL,
  `english_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `introducer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "guest_checkin"
#

/*!40000 ALTER TABLE `guest_checkin` DISABLE KEYS */;
/*!40000 ALTER TABLE `guest_checkin` ENABLE KEYS */;

#
# Structure for table "meeting"
#

DROP TABLE IF EXISTS `meeting`;
CREATE TABLE `meeting` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `lock_flag` tinyint(3) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `toast_id` varchar(255) DEFAULT NULL,
  `general_id` int(11) DEFAULT NULL,
  `aha_id` varchar(255) DEFAULT NULL,
  `timer_id` varchar(255) DEFAULT NULL,
  `grammar_id` varchar(255) DEFAULT NULL,
  `jokemaster_id` varchar(255) DEFAULT NULL,
  `table1_id` varchar(255) DEFAULT NULL,
  `table2_id` varchar(255) DEFAULT NULL,
  `table_ev1_id` varchar(255) DEFAULT NULL,
  `table_ev2_id` varchar(255) DEFAULT NULL,
  `sharing` varchar(255) DEFAULT NULL,
  `spk1_id` varchar(255) DEFAULT NULL,
  `spk1_speech_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "meeting"
#

/*!40000 ALTER TABLE `meeting` DISABLE KEYS */;
INSERT INTO `meeting` VALUES (1,'1','union',NULL,NULL,NULL,'2015-2-18',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `meeting` ENABLE KEYS */;

#
# Structure for table "speech"
#

DROP TABLE IF EXISTS `speech`;
CREATE TABLE `speech` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `min_time` varchar(255) DEFAULT NULL,
  `max_time` varchar(255) DEFAULT NULL,
  `objectives` varchar(255) DEFAULT NULL,
  `like` varchar(255) DEFAULT NULL,
  `dislike` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "speech"
#

/*!40000 ALTER TABLE `speech` DISABLE KEYS */;
/*!40000 ALTER TABLE `speech` ENABLE KEYS */;

#
# Structure for table "speech_evaluation"
#

DROP TABLE IF EXISTS `speech_evaluation`;
CREATE TABLE `speech_evaluation` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `speech_level` varchar(255) DEFAULT NULL,
  `title` text,
  `body` text,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "speech_evaluation"
#

/*!40000 ALTER TABLE `speech_evaluation` DISABLE KEYS */;
/*!40000 ALTER TABLE `speech_evaluation` ENABLE KEYS */;

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `english_name` varchar(255) DEFAULT NULL,
  `chinese_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `authority` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'mayue','123456','Mary','马月','mayue615@qq.com','18626881650','admin','1987-06-15'),(2,'mayue2','123456','Mary2','马月2','mayue615@qq.com','18626881650','admin','1987-06-15'),(3,'mayue3','123456','Mary2','马月2','mayue615@qq.com','18626881650','admin','1987-06-15');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

#
# Structure for table "user_checkin"
#

DROP TABLE IF EXISTS `user_checkin`;
CREATE TABLE `user_checkin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `m_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "user_checkin"
#

/*!40000 ALTER TABLE `user_checkin` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_checkin` ENABLE KEYS */;

#
# Structure for table "user_speech"
#

DROP TABLE IF EXISTS `user_speech`;
CREATE TABLE `user_speech` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `body` mediumtext,
  `m_id` varchar(255) DEFAULT NULL,
  `title` text,
  PRIMARY KEY (`Id`),
  KEY `user_id` (`user_id`),
  KEY `m_id` (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "user_speech"
#

/*!40000 ALTER TABLE `user_speech` DISABLE KEYS */;
INSERT INTO `user_speech` VALUES (1,'1','CC4','i have a dream',NULL,'my dream'),(2,'1','CC5','dddd',NULL,'dddd');
/*!40000 ALTER TABLE `user_speech` ENABLE KEYS */;
