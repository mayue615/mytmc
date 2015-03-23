# Host: localhost  (Version: 5.5.38)
# Date: 2015-03-21 13:50:17
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "agenda"
#

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE `agenda` (
  `Id` int(11) DEFAULT NULL,
  `tpl_name` text,
  `prepare` int(11) DEFAULT NULL,
  `SAA` int(11) DEFAULT NULL,
  `toastmaster_intro` int(11) DEFAULT NULL,
  `jokemaster` int(11) DEFAULT NULL,
  `ge_intro` int(11) DEFAULT NULL,
  `timer_intro` int(11) DEFAULT NULL,
  `grammarian_intro` int(11) DEFAULT NULL,
  `aha_intro` int(11) DEFAULT NULL,
  `speaker` int(11) DEFAULT NULL,
  `speaker_qa` int(11) DEFAULT NULL,
  `table` int(11) DEFAULT NULL,
  `table2` int(11) DEFAULT NULL,
  `sharing` int(11) DEFAULT NULL,
  `break` int(11) DEFAULT NULL,
  `sum_qa` int(11) DEFAULT NULL,
  `evaluator` int(11) DEFAULT NULL,
  `timer_report` int(11) DEFAULT NULL,
  `grammarian_report` int(11) DEFAULT NULL,
  `aha_report` int(11) DEFAULT NULL,
  `ge_report` int(11) DEFAULT NULL,
  `toastmaster_end` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "agenda"
#

/*!40000 ALTER TABLE `agenda` DISABLE KEYS */;
INSERT INTO `agenda` VALUES (1,'Nokia Metalk',10,0,3,7,3,1,2,1,7,2,20,20,0,0,0,3,2,2,2,3,3),(2,'Hangzhou Metalk',10,3,3,0,3,1,2,1,7,0,20,20,12,10,5,3,2,2,2,3,3),(3,'Westlake',10,3,3,7,3,1,2,1,7,0,20,20,10,0,0,3,2,2,2,3,3),(4,'Null',10,3,3,7,3,1,2,1,7,0,20,20,10,0,0,3,2,2,2,3,3);
/*!40000 ALTER TABLE `agenda` ENABLE KEYS */;

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
  `like` int(11) DEFAULT '0',
  `dislike` int(11) DEFAULT '0',
  UNIQUE KEY `Id` (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "article"
#

/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (1,'分享','1','deec','my article',NULL,NULL);
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
  `create_time` date DEFAULT NULL,
  `default_time` varchar(255) DEFAULT NULL,
  `default_room` varchar(255) DEFAULT NULL,
  `first_num` int(11) DEFAULT NULL,
  `president` int(11) DEFAULT NULL,
  `vpe` int(11) DEFAULT NULL,
  `vpm` int(11) DEFAULT NULL,
  `vppr` int(11) DEFAULT NULL,
  `saa` int(11) DEFAULT NULL,
  `treasurer` int(11) DEFAULT NULL,
  `secretary` int(11) DEFAULT NULL,
  `president_a` varchar(255) DEFAULT NULL,
  `vpe_a` varchar(255) DEFAULT NULL,
  `vpm_a` varchar(255) DEFAULT NULL,
  `vppr_a` varchar(255) DEFAULT NULL,
  `saa_a` varchar(255) DEFAULT NULL,
  `treasurer_a` varchar(255) DEFAULT NULL,
  `secretary_a` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "club"
#

/*!40000 ALTER TABLE `club` DISABLE KEYS */;
INSERT INTO `club` VALUES (1,'Nokia Metalk','China','Hangzhou','Binjiang','Xincheng Roud 567#','2010-12-25','12:00','8F-xiaoxue',251,3,1,1,1,1,1,2,'aa','bb','cc','dd','ee','ff','gg'),(2,'Hangzhou Metalk',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "club_meeting"
#

/*!40000 ALTER TABLE `club_meeting` DISABLE KEYS */;
INSERT INTO `club_meeting` VALUES (1,'1','1'),(2,'1','2'),(3,'1','4'),(4,'1','5'),(5,'2','5'),(6,'1','6'),(7,'2','6');
/*!40000 ALTER TABLE `club_meeting` ENABLE KEYS */;

#
# Structure for table "club_user"
#

DROP TABLE IF EXISTS `club_user`;
CREATE TABLE `club_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `club_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` tinyint(3) DEFAULT '1',
  PRIMARY KEY (`Id`),
  KEY `club_id` (`club_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=354 DEFAULT CHARSET=utf8;

#
# Data for table "club_user"
#

/*!40000 ALTER TABLE `club_user` DISABLE KEYS */;
INSERT INTO `club_user` VALUES (1,1,1,1),(2,1,2,1),(3,1,3,1),(4,1,4,1),(5,1,5,1),(6,1,6,1),(7,1,7,1),(8,1,8,1),(9,1,9,1),(10,1,10,1),(11,1,11,1),(12,1,12,1),(13,1,13,1),(14,1,14,1),(15,1,15,1),(16,1,16,1),(17,1,17,1),(18,1,18,1),(19,1,19,1),(20,1,20,1),(21,1,21,1),(22,1,22,1),(23,1,23,1),(24,1,24,1),(25,1,25,1),(26,1,26,1),(27,1,27,1),(28,1,28,1),(29,2,29,1),(30,2,30,1),(31,3,31,1),(32,3,32,1),(33,3,33,1),(34,3,34,1),(35,3,35,1),(36,3,36,1),(37,3,37,1),(38,3,38,1),(39,3,39,1),(40,3,40,1),(41,3,41,1),(42,3,42,1),(43,3,43,1),(44,3,44,1),(45,3,45,1),(46,3,46,1),(47,3,47,1),(48,3,48,1),(49,3,49,1),(50,3,50,1),(51,3,51,1),(52,3,52,1),(53,3,53,1),(54,3,54,1),(55,3,55,1),(56,3,56,1),(57,3,57,1),(58,3,58,1),(59,3,59,1),(60,3,60,1),(61,3,61,1),(62,3,62,1),(63,3,63,1),(64,3,64,1),(65,3,65,1),(66,3,66,1),(67,3,67,1),(68,3,68,1),(69,3,69,1),(70,3,70,1),(71,3,71,1),(72,3,72,1),(73,3,73,1),(74,3,74,1),(75,3,75,1),(76,3,76,1),(77,3,77,1),(78,3,78,1),(79,3,79,1),(80,3,80,1),(81,4,81,1),(82,4,82,1),(83,4,83,1),(84,4,84,1),(85,4,85,1),(86,4,86,1),(87,4,87,1),(88,4,88,1),(89,4,89,1),(90,4,90,1),(91,4,91,1),(92,11,92,1),(93,12,93,1),(94,13,94,1),(95,14,95,1),(96,14,96,1),(97,12,97,1),(98,14,98,1),(99,12,99,1),(100,12,100,1),(101,12,101,1),(102,3,102,1),(103,3,103,1),(104,3,104,1),(105,3,105,1),(106,14,106,1),(107,14,107,1),(108,14,108,1),(109,14,109,1),(110,14,110,1),(111,14,111,1),(112,14,112,1),(113,14,113,1),(114,14,114,1),(115,14,115,1),(116,14,116,1),(117,14,117,1),(118,14,118,1),(119,14,119,1),(120,14,120,1),(121,14,121,1),(122,14,122,1),(123,14,123,1),(124,14,124,1),(125,14,125,1),(126,14,126,1),(127,14,127,1),(128,14,128,1),(129,14,129,1),(130,14,130,1),(131,14,131,1),(132,14,132,1),(133,3,133,1),(134,1,134,1),(135,1,135,1),(136,1,136,1),(137,1,137,1),(138,1,138,1),(139,1,139,1),(140,1,140,1),(141,3,141,1),(142,3,142,1),(143,3,143,1),(144,3,144,1),(145,1,145,1),(146,3,146,1),(147,3,147,1),(148,3,148,1),(149,3,149,1),(150,3,150,1),(151,3,151,1),(152,3,152,1),(153,2,153,1),(154,2,154,1),(155,3,155,1),(156,3,156,1),(157,3,157,1),(158,3,158,1),(159,1,159,1),(160,3,160,1),(161,2,161,1),(162,2,162,1),(163,2,163,1),(164,2,164,1),(165,2,165,1),(166,2,166,1),(167,2,167,1),(168,2,168,1),(169,2,169,1),(170,2,170,1),(171,2,171,1),(172,2,172,1),(173,2,173,1),(174,2,174,1),(175,2,175,1),(176,2,176,1),(177,2,177,1),(178,2,178,1),(179,2,179,1),(180,2,180,1),(181,2,181,1),(182,2,182,1),(183,2,183,1),(184,2,184,1),(185,2,185,1),(186,2,186,1),(187,2,187,1),(188,2,188,1),(189,2,189,1),(190,2,190,1),(191,2,191,1),(192,2,192,1),(193,2,193,1),(194,2,194,1),(195,2,195,1),(196,2,196,1),(197,2,197,1),(198,2,198,1),(199,2,199,1),(200,2,200,1),(201,2,201,1),(202,2,202,1),(203,2,203,1),(204,2,204,1),(205,2,205,1),(206,2,206,1),(207,3,207,1),(208,1,208,1),(209,1,209,1),(210,2,210,1),(211,14,211,1),(212,14,212,1),(213,14,213,1),(214,14,214,1),(215,14,215,1),(216,14,216,1),(217,16,217,1),(218,17,218,1),(219,18,219,1),(220,19,220,1),(221,15,221,1),(222,20,222,1),(223,21,223,1),(224,22,224,1),(225,23,225,1),(226,24,226,1),(227,25,227,1),(228,20,228,1),(229,20,229,1),(230,20,230,1),(231,20,231,1),(232,20,232,1),(233,20,233,1),(234,20,234,1),(235,16,235,1),(236,16,236,1),(237,16,237,1),(238,16,238,1),(239,16,239,1),(240,16,240,1),(241,16,241,1),(242,16,242,1),(243,16,243,1),(244,17,244,1),(245,17,245,1),(246,17,246,1),(247,17,247,1),(248,17,248,1),(249,17,249,1),(250,18,250,1),(251,18,251,1),(252,18,252,1),(253,18,253,1),(254,18,254,1),(255,18,255,1),(256,18,256,1),(257,18,257,1),(258,18,258,1),(259,18,259,1),(260,18,260,1),(261,18,261,1),(262,19,262,1),(263,19,263,1),(264,19,264,1),(265,19,265,1),(266,19,266,1),(267,19,267,1),(268,19,268,1),(269,22,269,1),(270,22,270,1),(271,22,271,1),(272,22,272,1),(273,22,273,1),(274,22,274,1),(275,22,275,1),(276,23,276,1),(277,23,277,1),(278,23,278,1),(279,23,279,1),(280,23,280,1),(281,23,281,1),(282,23,282,1),(283,24,283,1),(284,24,284,1),(285,24,285,1),(286,24,286,1),(287,24,287,1),(288,24,288,1),(289,24,289,1),(290,25,290,1),(291,25,291,1),(292,25,292,1),(293,25,293,1),(294,25,294,1),(295,25,295,1),(296,21,296,1),(297,13,297,1),(298,13,298,1),(299,13,299,1),(300,13,300,1),(301,13,301,1),(302,13,302,1),(303,12,303,1),(304,12,304,1),(305,12,305,1),(306,3,306,1),(307,26,307,1),(308,27,308,1),(309,28,309,1),(310,14,310,1),(311,14,311,1),(312,14,312,1),(313,14,313,1),(314,14,314,1),(315,14,315,1),(316,14,316,1),(317,14,317,1),(318,14,318,1),(319,14,319,1),(320,14,320,1),(321,3,321,1),(322,17,322,1),(323,4,323,1),(324,28,324,1),(325,28,325,1),(326,28,326,1),(327,28,327,1),(328,28,328,1),(329,28,329,1),(330,28,330,1),(331,28,331,1),(332,28,332,1),(333,28,333,1),(334,28,334,1),(335,28,335,1),(336,28,336,1),(337,18,337,1),(338,18,338,1),(339,1,339,1),(340,2,340,1),(341,3,341,1),(342,2,342,1),(343,2,343,1),(344,1,344,1),(345,2,345,1),(346,2,346,1),(347,2,347,1),(348,3,348,1),(349,1,349,1),(350,3,350,1),(351,1,351,1),(352,2,352,1),(353,2,353,1);
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
# Structure for table "guestcheckin"
#

DROP TABLE IF EXISTS `guestcheckin`;
CREATE TABLE `guestcheckin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) DEFAULT NULL,
  `chinese_name` varchar(255) DEFAULT NULL,
  `english_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `introducer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "guestcheckin"
#

/*!40000 ALTER TABLE `guestcheckin` DISABLE KEYS */;
INSERT INTO `guestcheckin` VALUES (1,5,'oo','ll','09','yue.4.ma@nsn.com','jj'),(2,5,'ii','uu','uuu','hh@qq.com','yy'),(3,4,'ww','qq','qq','ww@qq.cn','aa'),(4,5,'aa','ee','yy','yue.4.ma@nsn.com','ff');
/*!40000 ALTER TABLE `guestcheckin` ENABLE KEYS */;

#
# Structure for table "meeting"
#

DROP TABLE IF EXISTS `meeting`;
CREATE TABLE `meeting` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `lock_flag` tinyint(3) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `m_date` date DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `toast_id` int(11) DEFAULT NULL,
  `ge_id` int(11) DEFAULT NULL,
  `aha_id` varchar(255) DEFAULT NULL,
  `timer_id` varchar(255) DEFAULT NULL,
  `gramm_id` int(11) DEFAULT NULL,
  `joke_id` int(11) DEFAULT NULL,
  `table1_id` int(11) DEFAULT NULL,
  `table1_ev_id` int(11) DEFAULT NULL,
  `table2_id` int(11) DEFAULT NULL,
  `table2_ev_id` int(11) DEFAULT NULL,
  `sharing` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "meeting"
#

/*!40000 ALTER TABLE `meeting` DISABLE KEYS */;
INSERT INTO `meeting` VALUES (1,251,1,'Holiday','Chinese',1,'no','恩恩12','2015-02-18','12:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'前期1'),(2,252,1,'Holiday','English',1,NULL,NULL,'2015-02-23','12:00',1,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,NULL,NULL,'Common','English',NULL,'ddd','ee','2016-01-01','12:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,255,1,'Common','English',NULL,'sw','qq','2016-01-02','12:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,253,1,'Union','English',NULL,'方法','问问2','2015-05-08','13:00',NULL,NULL,'1',NULL,1,NULL,1,1,1,1,'狗狗'),(6,254,1,'Union','English',NULL,'','','2015-05-10','12:00',NULL,1,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `meeting` ENABLE KEYS */;

#
# Structure for table "meeting_language"
#

DROP TABLE IF EXISTS `meeting_language`;
CREATE TABLE `meeting_language` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "meeting_language"
#

/*!40000 ALTER TABLE `meeting_language` DISABLE KEYS */;
INSERT INTO `meeting_language` VALUES (1,'English'),(2,'Chinese');
/*!40000 ALTER TABLE `meeting_language` ENABLE KEYS */;

#
# Structure for table "meeting_type"
#

DROP TABLE IF EXISTS `meeting_type`;
CREATE TABLE `meeting_type` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "meeting_type"
#

/*!40000 ALTER TABLE `meeting_type` DISABLE KEYS */;
INSERT INTO `meeting_type` VALUES (1,'Common'),(2,'Union'),(3,'Holiday'),(4,'Contest');
/*!40000 ALTER TABLE `meeting_type` ENABLE KEYS */;

#
# Structure for table "nokia_tel"
#

DROP TABLE IF EXISTS `nokia_tel`;
CREATE TABLE `nokia_tel` (
  `Id` int(11) DEFAULT NULL,
  `name` text,
  `tel` float DEFAULT NULL,
  `team` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "nokia_tel"
#

/*!40000 ALTER TABLE `nokia_tel` DISABLE KEYS */;
INSERT INTO `nokia_tel` VALUES (1,'Chen Loong',13575700000,'rock'),(2,'Han Frank',18605900000,'rock'),(3,'Ma Yue',18626900000,'rock'),(4,'Huang Chuntao',15158100000,'rock'),(5,'Jiang Tao',13255700000,'rock'),(6,'Lei Bo',15268200000,'rock'),(7,'Li Yan',15906800000,'rock'),(8,'Liang Na',13003700000,'rock'),(9,'Wang Haifeng',15868500000,'rock'),(10,'Wang Min',15658000000,'rock'),(11,'Wu Xi',15068900000,'rock'),(12,'Yao Wenfa',15267100000,'rock'),(13,'Zou Chenlin',18958100000,'rock'),(14,'Zhu Linping',13067800000,'rock'),(15,'Ji Ziying',13758200000,'palm'),(16,'Jiang Zhilong',15858100000,'palm'),(17,'Wu Hecheng',15868100000,'palm'),(18,'Ye Geoffrey',15988900000,'palm'),(19,'Zeng Liang',15858200000,'palm'),(20,'Zhang Baohui',18358200000,'palm'),(21,'Zhang Xing',15068100000,'palm'),(22,'Geng Liying',13735400000,'xforce'),(23,'Guo Jianjun',13336100000,'xforce'),(24,'Jiang Liyun',13958000000,'xforce'),(25,'Liu Fengping',13336100000,'xforce'),(26,'Liu Yahong',15336600000,'xforce'),(27,'Shen Anmin',13777400000,'xforce'),(28,'Shi Ritchie',15858200000,'xforce'),(29,'Zhang Ke',18605800000,'xforce'),(30,'Zhong Sherry',18858300000,'xforce'),(31,'Zhong Xu',13567100000,'xforce');
/*!40000 ALTER TABLE `nokia_tel` ENABLE KEYS */;

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
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Data for table "speech"
#

/*!40000 ALTER TABLE `speech` DISABLE KEYS */;
INSERT INTO `speech` VALUES (1,'CC1','Ice break','4','6',NULL),(2,'CC2','Organize your speech','5','7',NULL),(10,'CC10',NULL,'8','10',NULL);
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
# Structure for table "test"
#

DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `test` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

#
# Data for table "test"
#

/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (1,'come into ajax'),(2,'come into ajax'),(3,'come into ajax'),(4,'come into ajax'),(5,'come into ajax'),(6,'come into ajax'),(7,'come into ajax'),(8,'come into ajax'),(9,'come into ajax'),(10,'come into ajax'),(11,'come into ajax'),(12,'come into ajax'),(13,'come into ajax'),(14,'come into ajax2'),(15,'come into ajax2'),(16,'come into ajax2'),(17,'come into ajax2'),(18,''),(19,'1'),(20,'2'),(21,'2'),(22,'3');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;

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
  `last_login` datetime DEFAULT NULL,
  `login_times` int(11) DEFAULT '0',
  `is_exist` varchar(255) DEFAULT 'yes',
  `register_date` date DEFAULT NULL,
  `speech_level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','Nsn123','admin',NULL,'','18626881650','admin',NULL,'2015-03-20 13:18:10',339,'yes',NULL,''),(2,'guanxiaobing','123456','Guan Xiaobing',NULL,'','0','tmc_member',NULL,'2014-12-08 13:27:00',1,'yes',NULL,''),(3,'chenjin','123456','Emily',NULL,'jin_emily.chen@nsn.com','13857189521','tmc_member',NULL,'2015-03-12 11:06:24',79,'yes',NULL,'CC9'),(4,'zhangcuicui','123456','Zhang Connie',NULL,'cuicui.zhang@nsn.com','15957180470','tmc_member',NULL,'2015-03-19 12:11:21',21,'yes',NULL,''),(5,'mayue','123456','Ma Yue',NULL,'yue.4.ma@nsn.com','18626881650','tmc_member',NULL,'2015-03-12 10:24:54',239,'yes',NULL,'AC4'),(6,'baomin','123456','Bao Min',NULL,'min.bao@nsn.com','13757102492','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(7,'caixiaolan','123456','Cai Xiaolan',NULL,'xiaolan.cai@nsn.com','18658150525','tmc_member',NULL,'2014-12-15 15:53:00',3,'yes',NULL,''),(8,'fupeijun','123456','Fu Peijun',NULL,'peijun.fu@nsn.com','13656715086','tmc_member',NULL,'2015-01-23 09:34:22',20,'yes',NULL,''),(9,'lijun','123456','Li Jun',NULL,'jun-hanson.li@nsn.com','18626881863','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(10,'liyanzhao','123456','Li YanZhao',NULL,'yanzhao.li@nsn.com','13588210769','tmc_member',NULL,'2014-10-13 07:59:00',1,'yes',NULL,''),(11,'anneliu','123456','Anne',NULL,'anne.liu@nsn.com','13735810881','tmc_member',NULL,'2015-03-19 11:52:24',122,'yes',NULL,''),(12,'liumingben','123456','Liu Mingben',NULL,'mingben.liu@nsn.com','13805786734','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(13,'louxiaoming','123456','Lou Xiaoming',NULL,'xiaoming.lou@nsn.com','18626881131','tmc_member',NULL,'2015-03-19 11:02:03',41,'yes',NULL,''),(14,'nixian','123456','Peter Ni',NULL,'xian.ni@nsn.com','13588132592','tmc_member',NULL,'2015-03-19 12:00:07',26,'yes',NULL,''),(15,'wanggang','123456','Wang Gang',NULL,'gang-layner.wang@nsn.com','13857198689','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(16,'wangjunhua','123456','Wang Junhua',NULL,'junhua.h.wang@nsn.com','18626889386','tmc_member',NULL,'2015-03-02 15:22:20',27,'yes',NULL,''),(17,'wuchaoqi','123456','Wu Chocky',NULL,'chocky.wu@nsn.com','15267127761','tmc_member',NULL,'2014-11-10 04:41:00',1,'yes',NULL,''),(18,'wuyuyue','123456','Wu Yuyue',NULL,'yuyue.wu@nsn.com','18626880873','tmc_member',NULL,'2015-03-18 11:11:50',20,'yes',NULL,''),(19,'xiaguohui','123456','Xia Kevin',NULL,'kevin.xia@nsn.com','13336053757','tmc_member',NULL,'2014-12-23 09:58:00',1,'yes',NULL,''),(20,'yingweiyi','123456','Ying Weiyi',NULL,'weiyi.ying@nsn.com','13819454593','tmc_member',NULL,'2015-01-29 13:50:51',1,'yes',NULL,''),(21,'zhangjianfei','123456','Zhang Jianfei',NULL,'jianfei.zhang@nsn.com','18868167399','tmc_member',NULL,'2014-12-09 10:17:00',8,'yes',NULL,''),(22,'zhenghui','123456','Zheng Hui',NULL,'hui.2.zheng@nsn.com','18626881310','tmc_member',NULL,'2014-12-29 10:11:00',9,'yes',NULL,''),(23,'zhouyunfei','123456','Zhou Terry',NULL,'terry.zhou@nsn.com','13958151269','tmc_member',NULL,'2014-09-15 07:14:00',1,'yes',NULL,''),(24,'wuwindy','123456','Wu Windy',NULL,'windy.wu@nsn.com','18606500635','tmc_member',NULL,'2014-09-18 02:39:00',1,'yes',NULL,''),(25,'guest','123456','Li Chen',NULL,'',NULL,'tmc_member',NULL,'2014-12-18 12:37:00',6,'yes',NULL,''),(26,'zengtian','123456','Jack Zeng',NULL,'jack.zeng@nsn.com','18626889769','tmc_member',NULL,'2015-03-11 13:06:52',59,'yes',NULL,''),(27,'tianpengju','123456','Tian Pengju',NULL,'pengju.tian@nsn.com','13967177823','tmc_member',NULL,'2014-11-20 05:24:00',13,'yes',NULL,''),(28,'Christian','fml212@tmc','Christian Hong',NULL,'christian.hong@nsn.com','13738042153','tmc_member',NULL,'2015-03-12 10:26:46',78,'yes',NULL,''),(29,'admin','HZMETALK0908','admin',NULL,'lilyflazer@163.com','15157171453','admin',NULL,'2015-03-18 16:00:43',78,'yes',NULL,''),(30,'xielingjun','123456','Xie Linkin',NULL,'',NULL,'tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(31,'mayue','123456','Ma Yue',NULL,'yue.4.ma@nsn.com','18626881650','tmc_member',NULL,'2015-03-03 17:35:47',22,'yes',NULL,'CC9'),(32,'houyan','123456','Hellen Hou',NULL,'houyan_2000@163.com','15372060777','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'AC4'),(33,'liumingxia','123456','Vivian Liu',NULL,'515198698@qq.com','15382339366','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'NA'),(34,'songluming','123456','Alex Song',NULL,'songluming83p@gmail.com','13355816833','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'AC16'),(35,'liliangde','123456','Warren',NULL,'13306517997@189.cn','13306517997','tmc_member',NULL,'2014-12-15 17:54:00',6,'yes',NULL,'A3'),(36,'jinlin','123456','Lynn Jin',NULL,'slytheri@gmail.com','13456781100','tmc_member',NULL,'2014-10-15 14:06:00',2,'yes',NULL,'A4'),(37,'wuhao','123456','Kevin Wu',NULL,'gx_wuhao@yeah.net','13989812107','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'A2'),(38,'wangyoufu','123456','King Wang',NULL,' wyf199947@163.com','13588899615','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'A2'),(39,'kexueyan','123456','Joyce Ke',NULL,' joyceke@qq.com','13967195069','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'A1'),(40,'yangpeilei','123456','Radium Yang',NULL,'297125953@qq.com','13777429591','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'A10'),(41,'zhaijia','3.141592654','Jia',NULL,'zhai.jia@qq.com','13575741443','tmc_member',NULL,'2014-09-17 04:24:00',1,'yes',NULL,'A14'),(42,'linannan','123456','Lynette Li',NULL,'453494133@qq.com','15824489176','tmc_member',NULL,'2015-03-18 22:56:46',14,'yes',NULL,'CC9'),(43,'lujunping','123456','Junping Lu',NULL,' 372013350@qq.com','13486187871','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'CC10'),(44,'zhangweiting','123456','Jamily Zhang',NULL,'jamilyzhang@163.com','15988842246','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'CC5'),(45,'linan','123456','Alex Lin',NULL,'234372327@qq.com','13685773549','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'A3'),(46,'heyun','123456','Susie He',NULL,'85762892@qq.com','15088699940','tmc_member',NULL,'2014-09-03 03:00:00',1,'yes',NULL,'CC7'),(47,'wangjun','123456','Tivy Wang',NULL,'350309372@qq.com','15336505812','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'CC8'),(48,'yaobaozhu','123456','Yao Ben',NULL,'bayao@cisco.com','18668187929','tmc_member',NULL,'2014-09-15 01:46:00',1,'yes',NULL,'A2'),(49,'loushuaiying','123456','Nasica',NULL,'412855349@qq.com','13867456077','tmc_member',NULL,'2014-11-24 07:19:00',3,'yes',NULL,'CC9'),(50,'wangdehua','123456','Edward Wang',NULL,'wangdeha@qq.com','18658124588','tmc_member',NULL,'2014-09-17 06:08:00',2,'yes',NULL,'CC8'),(51,'shenying','123456','Kico Shen',NULL,'sese317@126.com','18668062320','tmc_member',NULL,'2014-10-29 11:45:00',4,'yes',NULL,'CC10'),(52,'yingyadong','123456','Alex-English',NULL,'AlexEnglish84@gmail.com','15968191387','tmc_member',NULL,'2014-12-16 01:10:00',7,'yes',NULL,'NA'),(53,'zhoujinying','123456','Apple Zhou',NULL,'zhoujyoo@163.com ','13588016805','tmc_member',NULL,'2015-01-14 22:41:54',6,'yes',NULL,'A3'),(54,'yuyanli','123456','Emma Yu',NULL,'736315591@qq.com','13806500124','tmc_member',NULL,'2014-12-17 12:35:00',1,'yes',NULL,'CC5'),(55,'xufeng','123456','Fong Xu',NULL,'479470382@qq.com','13958017362','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'CC4'),(56,'qianshijie','123456','Jojo Qian',NULL,'qianshijieqsj@163.com','13777870660','tmc_member',NULL,'2014-09-18 12:45:00',1,'yes',NULL,'A1'),(57,'liuchunjie','123456','Bill Liu',NULL,'1329989141@qq.com','13588316271','tmc_member',NULL,'2015-03-01 22:35:22',35,'yes',NULL,'A20'),(58,'wuxiaoning','123456','Simon Wu',NULL,'18239427@qq.com','13757131228','tmc_member',NULL,'2015-01-12 19:37:13',1,'yes',NULL,'A7'),(59,'liaoke','123456','Emily Liao',NULL,'Liaoke198917@163.com','13738029454','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'CC10'),(60,'lixiang','123456','Jessica Li',NULL,'260005718@qq.com','13675826578','tmc_member',NULL,'2014-12-15 20:22:00',4,'yes',NULL,'CC9'),(61,'zhaiyingying','yy821029','Elaine',NULL,'elainezhai@163.com','13588103680','tmc_member',NULL,'2014-09-19 07:19:00',1,'yes',NULL,'CC10'),(62,'yejuan','123456','Jane Ye',NULL,'806786861@qq.com','15988851206','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'CC3'),(63,'zhangxinxin','123456','Molly zhang',NULL,'49612723@qq.com','13606819460','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'NA'),(64,'lvyifeng','gjdlyf46','Leon lv',NULL,'yifenglv@126.com','18157122270','tmc_member',NULL,'2014-12-13 17:20:00',4,'yes',NULL,'CC9'),(65,'liqingpo','123456','Elise Lee',NULL,'qingpoli223@yahoo.com','18858161223','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'CC4'),(66,'sunnan','123456','Amy Sun',NULL,'sunnan54@163.com','18806523265','tmc_member',NULL,'2014-09-17 05:12:00',1,'yes',NULL,'CC5'),(67,'zhengjisen','123456','Jason',NULL,'31661879@qq.com','13185039588','tmc_member',NULL,'2015-03-07 11:44:30',78,'yes',NULL,'AC4'),(68,'tonglin','123456','Angela Tong',NULL,'19537851@qq.com','13588452749','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'NA'),(69,'chenbingbing','782726','Alice',NULL,'29986076@qq.com','15869013813','tmc_member',NULL,'2014-11-03 04:03:00',6,'yes',NULL,'CC3'),(70,'wangningjie','123456','Laura Wang',NULL,'yoko_1230@msn.com','18268839098','tmc_member',NULL,'2014-12-17 18:40:00',29,'yes',NULL,'CC6'),(71,'wangquan','123456','Chandler Wang',NULL,'Wangquan8681@outlook.com','15957155753','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'CC3'),(72,'huawei','123456','Javier Alonso',NULL,'fjcalonso@hotmail.com','13738126219','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'CC2'),(73,'shuhaihua','123456','Grace Shu',NULL,'yxshh@hotmail.com','18668013881','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'CC2'),(74,'yingxiaozheng','123456','Ivy ying',NULL,'yxz990728300@qq.com','18758858595','tmc_member',NULL,'2015-03-04 10:05:46',7,'yes',NULL,'CC3'),(75,'tanying','123456','Ada',NULL,'383122357@qq.com','13251014210','tmc_member',NULL,'2015-01-14 14:58:20',5,'yes',NULL,'CC7'),(76,'wangjian','123456','Kenneth Wang',NULL,'4235285@qq.com','13588820677','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,'NA'),(77,'liqingyang','123456','Treeson',NULL,'359889610@qq.com','15067145673','tmc_member',NULL,'2015-01-11 10:21:25',7,'yes',NULL,'CC10'),(78,'dengqinmin','123456','Gordon',NULL,'dqm2009@qq.com','18668105712','tmc_member',NULL,'2015-02-02 13:54:47',15,'yes',NULL,'CC5'),(79,'hulingxiu','123456','Laury Hu',NULL,'38502626@qq.com','18868706080','tmc_member',NULL,'2015-01-04 14:40:00',16,'yes',NULL,'CC3'),(80,'admin','123456','admin',NULL,'31661879@qq.com','13185039588','admin',NULL,'2015-03-19 20:00:34',347,'yes',NULL,''),(81,'admin','123456','admin',NULL,'',NULL,'admin',NULL,'2015-01-10 16:32:16',10,'yes',NULL,''),(82,'jinshuhui','123456','Jin Shuhui',NULL,'550426747@qq.com','15168218733','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(83,'hongyiming','123456','Hong Yiming',NULL,'28506839@qq.com','13858130104','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(84,'jiangxiaotan','123456','Jiang Xiaotan',NULL,'1559972002@qq.com','15068128414','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(85,'budan','123456','Bu Dan',NULL,'952911914@qq.com','15168286653','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(86,'xulu','123456','Xu Lu',NULL,'292279346@qq.com','15757101067','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(87,'lilingna','123456','Li Lingna',NULL,'515867467@qq.com','13735818032','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(88,'wangyuqian','123456','Wang Yuqian',NULL,'1611701631@qq.com','15168263421','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(89,'linkeshi','123456','Lin Keshi',NULL,'huhioyi@qq.com','15757100816','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(90,'liujialing','123456','Liu Jiangling',NULL,'1940867604@qq.com','15757101253','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(91,'panke','123456','Pan Ke',NULL,'1256573673@qq.com','15168233061','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(92,'admin','123456','admin',NULL,'',NULL,'admin',NULL,'2015-01-09 10:55:46',11,'yes',NULL,''),(93,'admin','123456','admin',NULL,'',NULL,'admin',NULL,'2015-01-08 01:01:11',15,'yes',NULL,''),(94,'admin','123456','admin',NULL,'',NULL,'admin',NULL,'2015-01-07 22:43:54',7,'yes',NULL,''),(95,'admin','123456','admin',NULL,'',NULL,'admin',NULL,'2015-01-11 11:11:08',35,'yes',NULL,''),(96,'mayue','123456','',NULL,'yue.4.ma@nsn.com','18626881650','tmc_member',NULL,'2014-09-02 07:06:00',1,'yes',NULL,''),(97,'tangjinru','yymada','Cassie Tang',NULL,'741535804@qq.com','13707197954','tmc_member',NULL,'2014-09-05 05:46:00',2,'yes',NULL,''),(98,'Larry Kwok','123456','',NULL,'859925545@qq.com','18768574908','tmc_member',NULL,'2014-09-17 13:57:00',1,'yes',NULL,''),(99,'yangchaoran','123456','Chaoran Yang',NULL,'throneyangcr@163.com','18696108626','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(100,'liuxinran','123456','Lvy Liu',NULL,'284752162@qq.com','15623014052','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(101,'hening','123456','Harry Ning',NULL,'harryminister@hotmail.com','13871123095','tmc_member',NULL,'2014-09-05 06:22:00',2,'yes',NULL,''),(102,'xiaoa','123456','Xiao A',NULL,'n@none.com','123456','tmc_member',NULL,'2014-09-08 05:13:00',2,'yes',NULL,''),(103,'xiaob','123456','Xiao B',NULL,'e@e.com','123456','tmc_member',NULL,'2014-09-13 06:25:00',2,'yes',NULL,''),(104,'wulin','123456','',NULL,'xiaofinnfinn@gmail.com','12345678','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(105,'huanglei','123456','Livpreet',NULL,'1523709555@qq.com','13575731203','tmc_member',NULL,'2015-03-02 13:02:45',11,'yes',NULL,'CC1'),(106,'Adam Xu','123456','',NULL,'adam.xu@nottingham.edu.cn','13957879478','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(107,'Vanessa Yang','123456','',NULL,'veryyang126@163.com','15867571167','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(108,'Jessica Jin','123456','',NULL,'jieyuhualj@126.com','0','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(109,'Lillian Liu','123456','',NULL,'303519921@qq.com','15267850358','tmc_member',NULL,'2014-09-17 14:05:00',1,'yes',NULL,''),(110,'Terry Jiang','123456','',NULL,'','13806679698','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(111,'Wade Wu','123456','Wade Wu',NULL,'wudz@qq.co','15957487733','tmc_member',NULL,'2015-01-09 22:28:32',2,'yes',NULL,''),(112,'James Xiang','123456','',NULL,'19256836@qq.com','13456175340','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(113,'Carol Wei','123456','',NULL,'','15867579408','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(114,'Kaka Kong','123456','',NULL,'1161515712@qq.com','15267836469','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(115,'Q','123456','',NULL,'20695129@qq.com','18006656066','tmc_member',NULL,'2014-09-19 13:10:00',1,'yes',NULL,''),(116,'Cheng xiao lu','123456','',NULL,'573858507@qq.com','13675772529','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(117,'Lily Yang','123456','',NULL,'lily.yang@akzonobel.com','13586641967','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(118,'Liu Jun','123456','',NULL,'lyj1214@hotmail.com','13564742561','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(119,'Dong yue Zhang','123456','',NULL,'dyzhang2@hotmail.com','18868656776','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(120,'Liu Fang','123456','',NULL,'15888025240@139.com','15888025240','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(121,'Peter Cheng','123456','',NULL,'838097694@qq.com','13616596365','tmc_member',NULL,'2014-09-17 14:12:00',2,'yes',NULL,''),(122,'Nina Yao','123456','',NULL,'nina.yao@163.co?€?m','18768563788','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(123,'Johnson Chuang','123456','',NULL,'nbcn@163.com','0','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(124,'Owen Li','123456','',NULL,'tomorain@126.com','13958210296','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(125,'Charline Huang','123456','',NULL,'huanglq315@163.co?€?m','13736003630','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(126,'Daisy Zhang','123456','',NULL,'zjxw.lin@qq.com','13957865594','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(127,'Ramon Thomas','123456','',NULL,'r@netucation.co.za','15257493943','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(128,'Beily Wang','123456','',NULL,'beilywang@126.com','13486098800','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(129,'Qian Feng','123456','',NULL,'bluestrum@126.com','13957892056','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(130,'Eddie G?€?ao','123456','',NULL,'eddiejinghai@gmail.com','18657408111','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(131,'Shane Yuan','123456','',NULL,'424490624@qq.com','0','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(132,'Eleanor Hu','123456','',NULL,'eleanorhu@163.co?€?m','18067362255','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(133,'July Yang','123456','',NULL,'feifeiyoung1@hotmail.com','18657288611','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(134,'huangchuan','123456','',NULL,'chuan.huang@nsn.com','18626880795','tmc_member',NULL,'2014-12-11 12:59:00',3,'yes',NULL,''),(135,'jiangyanjun','123456','Jiang Yanjun',NULL,'yanjun.jiang@nsn.com','15858178418','tmc_member',NULL,'2015-02-02 10:12:13',1,'yes',NULL,''),(136,'wuxi','123456','Wu Xi',NULL,'xi.wu@nsn.com','15068876678','tmc_member',NULL,'2015-03-02 17:56:33',35,'yes',NULL,'CC1'),(137,'huangrui','leon8147654','Leon',NULL,'rui.1.huang@nsn.com','18106521978','tmc_member',NULL,'2015-03-12 20:20:44',35,'yes',NULL,''),(138,'liulanfei','123456','Liu Lanfei',NULL,'lanfei.liu@nsn.com','18626889915','tmc_member',NULL,'2015-03-16 15:18:18',9,'yes',NULL,''),(139,'Carsten','123456','',NULL,'123@163.com','13234459880','tmc_member',NULL,'2014-12-03 22:11:00',1,'yes',NULL,''),(140,'superadmin','123456','Mary Ma',NULL,'','0','superadmin',NULL,'2015-01-16 23:40:54',38,'yes',NULL,''),(141,'chengxiaoyi','123456','Cici Cheng ',NULL,'-','13646873566','tmc_member',NULL,'2014-12-12 09:51:00',8,'yes',NULL,''),(142,'wuxiaolin','123456','Richard Wu',NULL,'kartwu@qq.com','13588005825','tmc_member',NULL,'2015-01-05 08:26:00',2,'yes',NULL,''),(143,'wangzhufang','123456','Vanessar Wang',NULL,'925996193@qq.com','18668187562','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(144,'fanhongxia','123456','fancy',NULL,'1@12.vom','1','tmc_member',NULL,'2015-03-20 10:19:58',9,'yes',NULL,''),(145,'lichen','123456','Li Chen',NULL,'xxx@163.com','123456789','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(146,'shichunlei','123456','xiao p',NULL,'314074297@qq.com','15258863177','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(147,'luoying','123456','lucy',NULL,'1@.com','1','tmc_member',NULL,'2014-12-18 17:29:00',1,'yes',NULL,''),(148,'luoxin','123456','Lucy',NULL,'9282587@qq.com','13588068277','tmc_member',NULL,'2015-01-07 16:44:00',4,'yes',NULL,''),(149,'wangying','123456','Wang ying',NULL,'244515337@qq.com','15267452805','tmc_member',NULL,'2014-12-19 21:51:00',1,'yes',NULL,''),(150,'Ludan','123456','Shen Ludan',NULL,'ludan_shen@hotmail.com','18329121168','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(151,'Cecilia','123456','Cecilia',NULL,'cecilia.ledesma01@gmail.com','18667000523','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(152,'zengzhaoping','123456','Sabrina',NULL,'sabrinasai@163.com','15968816722','tmc_member',NULL,'2015-03-12 18:28:15',2,'yes',NULL,''),(153,'yangwuyuan','5811835','Yang Wuyuan',NULL,'wuyuan35@qq.com','18658141592','tmc_member',NULL,'2015-03-19 09:57:20',129,'yes',NULL,'CC4'),(154,'mayue','123456','Ma Yue',NULL,'yue.4.ma@nsn.com','18626881650','tmc_member',NULL,'2015-02-11 09:01:49',7,'yes',NULL,''),(155,'linweijie','123456','vergil',NULL,'linvergil@163.com','13588042968','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(156,'linzhi','123456','Lilian',NULL,'390837677@qq.com','13868011155','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(157,'pingzi','88989785','pingzi',NULL,'2696730692@qq.com','15858172479','tmc_member',NULL,'2015-02-21 16:44:50',9,'yes',NULL,''),(158,'liuyihui','123456','Milk',NULL,'646328687@qq.com','13588494589','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(159,'shiling','123456','Shi Ling',NULL,'ling.shi@nsn.com','13757169571','tmc_member',NULL,'2015-01-08 09:40:42',11,'yes',NULL,''),(160,'zhangafang','123456','Annie',NULL,' 344561493@qq.com','18758119338','tmc_member',NULL,'2015-03-02 17:08:16',7,'yes',NULL,''),(161,'Lily Wang','wyj491123','Lily Wang',NULL,'lilyflazer@163.com','15157171453','tmc_member',NULL,'2015-03-09 16:39:52',13,'yes',NULL,'AC1'),(162,'Kenneth','123456','Kenneth Wang',NULL,'kennethwang@hotmail.co.uk','13588820677','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(163,'Simon Wu','123456','Simon Wu',NULL,'iwxn@sohu.com','13757131228','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(164,'Kenneth Wang','123456','Kenneth Wang',NULL,'kennethwang@hotmail.co.uk','13588820677','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(165,'Sarah Li','123456','Sarah Li',NULL,'sarah3473@gmail.com','13115713203','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(166,'Bobby Bai','123456','Bobby Bai',NULL,'bobbybai@126.com','18058731261','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(167,'Lingjun Xie','123456','Lingjun Xie',NULL,'xie.lingjun@qq.com','18667102558','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(168,'Jeffrey Shi','123456','Jeffrey Shi',NULL,'jeffrey.shi@nsn.com','13777575664','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(169,'Dora Luo','123456','Dora Luo',NULL,'dora.luo@nsn.com','13456963868','tmc_member',NULL,'2015-01-21 09:50:36',2,'yes',NULL,''),(170,'Chanel Sheng','123456','Chanel Sheng',NULL,'shengjiawen123@qq.com','15888864238','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(171,'Polo Zhang','123456','Polo Zhang',NULL,'dophlet@163.com','15397106563','tmc_member',NULL,'2015-02-01 09:02:52',6,'yes',NULL,''),(172,'Jocelyn Yao','123456','Jocelyn Yao',NULL,'330177020@qq.com','15251694722','tmc_member',NULL,'2015-01-04 14:41:00',2,'yes',NULL,''),(173,'Shuhui Liu','123456','Shuhui Liu',NULL,'214917649@qq.com','18658858807','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(174,'Chanel Sheng','123456','Chanel Sheng',NULL,'shengjiawen123@qq.com','13758187473','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(175,'Xiu Ping Hong','123456','Xiu Ping Hong',NULL,'769444680@qq.com','18967195597','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(176,'Wenming Nie','123456','Wenming Nie',NULL,'wenmingnie@gmail.com','18721111741','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(177,'Jian Yong Wang','123456','Jian Yong Wang',NULL,'742682498@qq.com','18757156063','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(178,'Li Hong Liu','123456','Li Hong Liu',NULL,'hongliliu1987@126.com','15088690683','tmc_member',NULL,'2015-03-18 17:33:57',6,'yes',NULL,''),(179,'Guoxin Zeng','123456','Guoxin Zeng',NULL,'jetkoide@126.com','13777678115','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(180,'AJ Hu','123456','AJ Hu',NULL,'82846495@qq.com','15068838012','tmc_member',NULL,'2015-02-04 17:33:02',1,'yes',NULL,''),(181,'Lu Yu','891002','Lu Yu',NULL,'356924570@qq.com','18368126712','tmc_member',NULL,'2014-12-29 15:04:00',2,'yes',NULL,''),(182,'Polo Zhang','123456','Polo Zhang',NULL,'dophlet@163.com','13819195124','tmc_member',NULL,'2015-02-01 09:02:52',6,'yes',NULL,''),(183,'Fiona Sun','123456','Fiona Sun',NULL,'fionasun421@gmail.com','18668439808','tmc_member',NULL,'2015-01-20 12:32:05',1,'yes',NULL,''),(184,'Bruce Liu','123456','Bruce Liu',NULL,'liucong2004@163.com','18658183633','tmc_member',NULL,'2015-03-18 14:54:36',16,'yes',NULL,''),(185,'Archie Yin','123456','Archie Yin',NULL,'861868541@qq.com','15168254268','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(186,'Vic Li','123456','Vic Li',NULL,'li_xin1@dahuatech.com','18957131397','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(187,'Vivian Hu','123456','Vivian Hu',NULL,'67530279@qq.com','13858126727','tmc_member',NULL,'2015-02-11 12:52:48',3,'yes',NULL,''),(188,'Sara Lu','123456','Sara Lu',NULL,'1036253640@qq.com','15158175504','tmc_member',NULL,'2015-02-13 22:45:09',6,'yes',NULL,''),(189,'Jason Yang','123456','Jason Yang',NULL,'597139581@qq.com','18858286562','tmc_member',NULL,'2015-01-27 23:17:36',2,'yes',NULL,''),(190,'Elva Li','123456','Elva Li',NULL,'ikran1017@gmail.com','18610175667','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(191,'Yao Li','123456','Yao Li',NULL,'eric.stone99@gmail.com','18601280187','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(192,'Sissy Zhang','123456','Sissy Zhang',NULL,'26343490@qq.com','18601142699','tmc_member',NULL,'2015-01-21 16:42:39',4,'yes',NULL,''),(193,'Treeson Li','123456','Treeson Li',NULL,'liqingyang125@126.com','15067145673','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(194,'Kristy Zhong','123456','Kristy Zhong',NULL,'1271216665@qq.com','13666658195','tmc_member',NULL,'2015-01-09 13:34:05',4,'yes',NULL,''),(195,'Linda Ren','123456','Linda Ren',NULL,'18958013161@qq.com','18958013161','tmc_member',NULL,'2015-01-31 08:46:13',1,'yes',NULL,''),(196,'Shanshan Xu','123456','Shanshan Xu',NULL,'50540842@qq.com','13958091526','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(197,'Qing Yang','123456','Qing Yang',NULL,'okyangqing@163.com','13706710463','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(198,'Daisy Gao','123456','Daisy Gao',NULL,'19584370@qq.com','15990155476','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(199,'Juan Yang','123456','Juan Yang',NULL,'mrdmrddld@163.com','15657137331','tmc_member',NULL,'2015-02-13 16:32:43',5,'yes',NULL,''),(200,'Pirate Shi','123456','Pirate Shi',NULL,'314074297@qq.com','15258863177','tmc_member',NULL,'2015-01-06 15:06:00',3,'yes',NULL,''),(201,'Emily Xue','123456','Emily Xue',NULL,'chunzi666288@163.com','18657427397','tmc_member',NULL,'2015-03-20 14:05:58',12,'yes',NULL,'CC1'),(202,'Shawn Qiu','123456','Shawn Qiu',NULL,'631834475@qq.com','13732205209','tmc_member',NULL,'2015-03-04 16:30:23',9,'yes',NULL,''),(203,'Sam Zhang','123456','Sam Zhang',NULL,'zhangshanshan@geely.com','18667030601','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(204,'Jennifer Zhan','metalk','Jennifer Zhan',NULL,'604515129@qq.com','15057180823','tmc_member',NULL,'2015-02-13 15:24:23',19,'yes',NULL,''),(205,'Yuan Li','123456','Yuan Li',NULL,'1219398899@qq.com','18858581219','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(206,'Tony Tong','Lx#Bt2R','Tony Tong',NULL,'278794500@qq.com','18072996869','tmc_member',NULL,'2015-01-04 14:09:00',1,'yes',NULL,''),(207,'xuzeqian','123456','Gary Xu',NULL,'411395886@qq.com','13282812511','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(208,'yaowenfa','123456','Yao Wenfa',NULL,'wenfa.yao@nsn.com','18626881650','tmc_guest',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(209,'feijiankang','123456','Fei Jiankang',NULL,'yue.4.ma@nsn.com','18626881650','tmc_guest',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(210,'Oscar Jin','king17209','Oscar Jin',NULL,'isunkey@163.com','13906511720','tmc_member',NULL,'2015-02-02 21:28:03',10,'yes',NULL,'cc1'),(211,'Niki','123456','Niki',NULL,'440262024@qq.com','13454702976','tmc_member',NULL,'2015-01-19 10:17:53',8,'yes',NULL,''),(212,'Paul','123456','Paul',NULL,'xfn2008@yeah.net','86138574968','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(213,'Kellen','123456','Kellen',NULL,'Kellen.xiao@gmail.com','13065670110','tmc_member',NULL,'2015-01-19 11:25:12',3,'yes',NULL,''),(214,'Li lei','123456','Li lei',NULL,'llei@nimte.ac.cn','18268682042','tmc_member',NULL,'2015-01-11 11:04:42',1,'yes',NULL,''),(215,'Mandy','123456','Mandy',NULL,'772134361@qq.com','8615990000000','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(216,'Jin Congwu','123456','Jin Congwu',NULL,'695601621@qq.com','8613780000000','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(217,'admin','123456','admin',NULL,'',NULL,'admin',NULL,'2015-01-07 22:08:26',2,'yes',NULL,''),(218,'admin','123456','admin',NULL,'',NULL,'admin',NULL,'2015-02-08 21:02:51',5,'yes',NULL,''),(219,'admin','123456','admin',NULL,'',NULL,'admin',NULL,'2015-01-11 11:17:34',8,'yes',NULL,''),(220,'admin','123456','admin',NULL,'',NULL,'admin',NULL,'2015-01-08 01:01:40',3,'yes',NULL,''),(221,'admin','','',NULL,'',NULL,'admin',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(222,'admin','123456','admin',NULL,'',NULL,'admin',NULL,'2015-01-08 10:55:40',4,'yes',NULL,''),(223,'admin','123456','admin',NULL,'',NULL,'admin',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(224,'admin','123456','admin',NULL,'',NULL,'admin',NULL,'2015-01-07 22:36:44',1,'yes',NULL,''),(225,'admin','123456','admin',NULL,'',NULL,'admin',NULL,'2015-01-07 22:39:07',1,'yes',NULL,''),(226,'admin','123456','admin',NULL,'',NULL,'admin',NULL,'2015-01-07 22:41:05',1,'yes',NULL,''),(227,'admin','123456','admin',NULL,'',NULL,'admin',NULL,'2015-01-07 23:13:23',1,'yes',NULL,''),(228,'zhengwei','123456','Wayne',NULL,'1379006165@qq.com','13857762770','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(229,'hefei','123456','Emily',NULL,'191253658@qq.com','13666650718','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(230,'lankai','123456','Homer',NULL,'413403259@qq.com','15158135375','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(231,'shichunlei','123456','Pirate',NULL,'314074297@qq.com','15258863177','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(232,'shenxueming','123456','Allan',NULL,'1204238376@qq.com','18658155463','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(233,'chenshan','123456','Lemon',NULL,'33089315@qq.com','15858277367','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(234,'zhaijing','123456','Grace',NULL,'362962949@qq.com','15957191217','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(235,'wangyan','123456','Rain',NULL,'yan.wang3@otis.com','13605701233','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(236,'louchengjing','123456','Vic Lou',NULL,'Chengjing.Lou@otis.com','15858269950','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(237,'wanglei','123456','Sylvia Wang',NULL,'lei.Wang@otis.com','13777495464','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(238,'maoxing','123456','Alex Mao',NULL,'Xing.mao@otis.com','15068187823','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(239,'yufang','123456','Fang Yu',NULL,'Fang.yu@otis.com','13777828655','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(240,'huhongfei','123456','Emily Hu',NULL,'Hongfei.hu@otis.com','13588752425','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(241,'yanglijuan','123456','Cindy Yang',NULL,'Cindy.Yang@otis.com','13116780867','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(242,'xvzhijing','123456','James Xu',NULL,'Zhijiang.Xu@otis.com','13857197079','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(243,'zhengbin','123456','John Zheng',NULL,'bin.zheng@otis.com','15336555606','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(244,'wangli','123456','Lisa',NULL,'wl@zju.edu.cn','13857151116','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(245,'wujing','123456','Julia',NULL,'Jingwu_79@126.com','13735806301','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(246,'jinjiajia','123456','Jiajia',NULL,'1074633930@qq.com','15068881117','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(247,'wuyuwei','123456','Gene',NULL,'swyw@sina.com','15988187595','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(248,'wanggengyu','123456','Lulu',NULL,'yellhope@163.com','18858156905','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(249,'luxiangang','123456','Ender',NULL,'287979084@qq.com','18069867735','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(250,'fanye','123456','Celia',NULL,'celiafan04@gmail.com','13656814237','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(251,'chenjie','123456','Echo',NULL,'JChen5@statestreet.com','13456896838','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(252,'jiangyanjun','123456','Jill',NULL,'Pinkjyj@163.com','15858178418','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(253,'huangsuiwen','123456','Sween',NULL,'sween1130@163.com','18581840767','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(254,'chenxianpeng','123456','Carl',NULL,'chencc98@163.com','18969110630','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(255,'yelijuan','123456','Julian',NULL,'muruochenye@163.com','15088670469','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(256,'wuyuhan','123456','Michelle',NULL,'wumechelle@163.com','13968107776','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(257,'fangyuan','123456','Jane',NULL,'1065643119@qq.com','13185058105','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(258,'qinxiaoxia','123456','Sharon',NULL,'475933567@qq.com','15858227378','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(259,'sunchengshuai','123456','Rachel',NULL,'CSun2@StateStreet.com','15158157792','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(260,'yexvmiao','123456','Julie',NULL,'mlover99@126.com','15067106345','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(261,'chenlifei','123456','Casy',NULL,'lifeichen@statestreet.com','15905818652','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(262,'chuyihang','123456','Ricky',NULL,'389687709@qq.com','13868341386','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(263,'panyu','123456','Iris',NULL,'panyu1986@126.com','15355773689','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(264,'jinjiani','123456','Alicia',NULL,'935515093@qq.com','15381582818','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(265,'linxuehong','123456','Emma',NULL,'435601469@qq.com','13757715615','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(266,'zhangqunyan','123456','Chrissy',NULL,'61724321@qq.com','13676589656','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(267,'chenxile','123456','Zoey',NULL,'366137929@qq.com','18957766977','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(268,'xvchichi','123456','Alice',NULL,'279192787@qq.com','13615772679','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(269,'wangxunlan','123456','Shirley',NULL,'wang_xun_lan@126.com','13957359613','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(270,'wangrui','123456','Wang, Rui',NULL,'warui@kean.edu','18312912941','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(271,'loujianquan','123456','Lou, Jinquan',NULL,'562636863@qq.com','18258029812','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(272,'lushenyan','123456','Lu, Shenyan',NULL,'yayi@kean.edu',NULL,'tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(273,'fengying','123456','Fegn, Ying',NULL,'fengyi@kean.edu','15957383888','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(274,'zhangbingjie','123456','Zhang, Bingjie',NULL,'zhangbi@kean.edu','18367817712','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(275,'wengwenxia','123456','Weng, Wenxia',NULL,'wengw@kean.edu','18367919661','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(276,'pengfen','123456','Penny Peng',NULL,'163penny@163.com','18672310611','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(277,'wangkun','123456','Kevin Wang',NULL,'376525045@qq.com','13697337738','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(278,'wangmingfu','123456','Mingfu Wang',NULL,'1139081479@qq.com','13926931052','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(279,'xiaoming','123456','Armstrong Xiao',NULL,'xiaomingxyz@gmail.com','15926424155','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(280,'qianxiulin','123456','Kathy Qian',NULL,'924465507@qq.com','18627032747','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(281,'chenli','123456','Rebecca Chen',NULL,'1241765407@qq.com','15171499178','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(282,'hudakuan','123456','Mr.Hu',NULL,'hudk@coscon.com','13007131696','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(283,'hushuying','123456','Maggie Hu',NULL,'767124@fedex.com','15972113707','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(284,'wangmengchen','123456','Mela Wang',NULL,'940286@fedex.com','15972130047','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(285,'yulu','123456','Lucky Yu',NULL,'809418@fedex.com','13476298611','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(286,'hujiahong','123456','Vivian Hu',NULL,'808448@fedex.com','15972217386','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(287,'zhousuyun','123456','Jodie Zhou',NULL,'814132@fedex.com','15002712873','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(288,'fuyaoyao','123456','Flora Fu',NULL,'620362@fedex.com','13419633962','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(289,'zhuyi','123456','Vivian Zhu',NULL,'620360@fedex.com','13995688765','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(290,'pengyuanyuan','123456','Echo Peng',NULL,'741960453@qq.com','18670790757','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(291,'zhangmingyu','123456','Coco Zhang',NULL,'cocozmy@163.com','13054193854','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(292,'chenli','123456','Julia Chan',NULL,'805515918@qq.com','15243699028','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(293,'wangjun','123456','Kim Wang',NULL,'546535356@qq.com','15116284621','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(294,'zhangling','123456','Sue Zhang',NULL,'21016506@qq.com','15084970330','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(295,'litian','123456','Tian',NULL,'ijay1988@qq.com','18508409596','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(296,'yezhou','123456','Night',NULL,'185161123@qq.com','18968931691','tmc_member',NULL,'0000-00-00 00:00:00',0,'yes',NULL,''),(297,'wangzeyuan','123456','Eric Wang',NULL,'626469631@qq.com','18627158261','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(298,'daianqi','123456','Emma',NULL,'2503271949@qq.com','13163317075','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(299,'liuyu','123456','Jade Liu',NULL,'151694246@qq.com','15172536642','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(300,'xiongtao','123456','Tina Xiong',NULL,'50790650@qq.com','15871457177','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(301,'zengzhidong','123456','Andrew Zeng',NULL,'zengzhidong@hotmail.com','13018022363','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(302,'liyuanyuan','123456','Jane Li',NULL,'827842513@qq.com','15271934673','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(303,'xiezhi',NULL,'Lako Xie',NULL,NULL,NULL,'tmc_member',NULL,NULL,0,'yes',NULL,NULL),(304,'wanxue',NULL,'Cora Wan',NULL,NULL,NULL,'tmc_member',NULL,NULL,0,'yes',NULL,NULL),(305,'hangyating',NULL,'Anita',NULL,NULL,NULL,'tmc_member',NULL,NULL,0,'yes',NULL,NULL),(306,'baibing','123456','bobby',NULL,'568993689@qq.com','18058731261','tmc_guest',NULL,NULL,0,'yes',NULL,NULL),(307,'admin','123456','admin',NULL,NULL,NULL,'admin',NULL,NULL,0,'yes',NULL,NULL),(308,'admin','123456','admin',NULL,NULL,NULL,'admin',NULL,NULL,0,'yes',NULL,NULL),(309,'admin','123456','admin',NULL,NULL,NULL,'admin',NULL,'2015-01-10 17:37:11',1,'yes',NULL,NULL),(310,'CindyZhang','123456','Cindy Zhang',NULL,'2329045679@qq,com','15867467257','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(311,'VickWang','123456','Vick Wang',NULL,'176758973@qq.com','13858289467','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(312,'Yang Fei Fei','123456','Yang Fei Fei',NULL,'Feifeiyoung1@hotmail.com','18657288611','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(313,'BK Gao','123456','BK Gao',NULL,'nightwatchgao@yeah.net','13586513208','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(314,'Force Lee','123456','Force Lee',NULL,'forcel@tccichina.com','13736175457','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(315,'Vivian Tu','123456','Vivian Tu',NULL,'371992061@qq.com','15825576216','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(316,'Margareth Xia','123456','Margareth Xia',NULL,'Margareth.Xia@akzonobel.com','13967890997','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(317,'Wolf Yu','123456','Wolf Yu',NULL,'xyu.epfl@gmail.com','15867190912','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(318,'Mingxia Yan','123456','Mingxia Yan',NULL,'429685791@qq.com','15557023909','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(319,'Laughing Kang ','123456','Laughing Kang ',NULL,'kangyq.snec@sinopec.com','13646626073','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(320,'Shelly Xue','123456','Shelly Xue',NULL,'517127849@qq.com','13989391208','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(321,'linchunrong','123456','Iris Lin',NULL,'1234@123.123','13738167021','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(322,'Jay','123456','jay',NULL,'jay.ji.jaroen@gmail.com','18858147154','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(323,'yangzhen','123456','Yang Zhen',NULL,'yzhen0843@sina.com','13588211279','tmc_member',NULL,'2015-01-12 12:04:08',2,'yes',NULL,NULL),(324,'Ma Tian','123456','Ma Tian',NULL,'mtian9998.cool@163.com','13336071916','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(325,'Ann Zhao','123456','Ann Zhao',NULL,'1','1','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(326,'James He','123456','James He',NULL,'2','2','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(327,'Veronica Sun','123456','Veronica Sun',NULL,'3','3','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(328,'Cai Jinshun','123456','Cai Jinshun',NULL,'4','4','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(329,'Candy Fan','123456','Candy Fan',NULL,'5','5','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(330,'Zhu Kan','123456','Zhu Kan',NULL,'6','6','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(331,'Cissy Yang','123456','Cissy Yang',NULL,'7','7','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(332,'Leona Long','123456','Leona Long',NULL,'8','8','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(333,'Shang Xing','123456','Shang Xing',NULL,'9','9','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(334,'He Ming','123456','He Ming',NULL,'10','10','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(335,'Du Lin','123456','Du Lin',NULL,'11','11','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(336,'Wang Yuankai','123456','Wang Yuankai',NULL,'12','12','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(337,'wangq','123456','front',NULL,'1','1','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(338,'Dangh','123456','Linda',NULL,'1','1','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(339,'fulisha','123456','Ma Fulisha',NULL,'fulishama@sina.com','18521507110','tmc_member',NULL,'2015-01-12 18:50:46',2,'yes',NULL,NULL),(340,'Gavin','123456','Gavin',NULL,'gjm031@hotmail.co.uk','13735472226','tmc_guest',NULL,NULL,0,'yes',NULL,NULL),(341,'liqianyi','123456','Cherie',NULL,'382759552@qq.com','13735815114','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(342,'William Bian','123456','William Bian',NULL,'631015448@qq.com','15967103660','tmc_guest',NULL,NULL,0,'yes',NULL,NULL),(343,'Allen Chen','123456','Allen Chen',NULL,'cr330326@126.com','15857178511','tmc_guest',NULL,'2015-01-22 10:51:02',1,'yes',NULL,NULL),(344,'ligang','123456','Li Gang',NULL,'gang.11.li@nsn.com','18688998359','tmc_guest',NULL,NULL,0,'yes',NULL,NULL),(345,'Fiona Lu','123456','Fiona Lu',NULL,'lqf001@163.com','15988826901','tmc_guest',NULL,NULL,0,'yes',NULL,NULL),(346,'Nancy Jiang','123456','Nancy Jiang',NULL,'497486702@qq.com','13819107283','tmc_guest',NULL,NULL,0,'yes',NULL,NULL),(347,'Feng Shi','123456','Feng Shi',NULL,'1@1','18668488236','tmc_guest',NULL,NULL,0,'yes',NULL,NULL),(348,'houting','123456','xiao hou ',NULL,'1003293604@qq.com','15967142956','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(349,'liucong','123456','Liu Cong',NULL,'conliu@nsn.com','18658183633','tmc_guest',NULL,NULL,0,'yes',NULL,NULL),(350,'fangjianming','123456','Fang Jianming',NULL,'273131285@qq.com','13355782150','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(351,'feijiangkan','123456','Kim',NULL,'jiankang.fei@nsn.com','13357120167','tmc_guest',NULL,NULL,0,'yes',NULL,NULL),(352,'Longhu Xue','123456','Longhu Xue',NULL,'371690509@qq.com','18042415326','tmc_member',NULL,NULL,0,'yes',NULL,NULL),(353,'Lizzy Gan','123456','Lizzy Gan',NULL,'49274295@qq.com','13600549917','tmc_guest',NULL,NULL,0,'yes',NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

#
# Structure for table "usercheckin"
#

DROP TABLE IF EXISTS `usercheckin`;
CREATE TABLE `usercheckin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `m_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "usercheckin"
#

/*!40000 ALTER TABLE `usercheckin` DISABLE KEYS */;
INSERT INTO `usercheckin` VALUES (9,'1','5');
/*!40000 ALTER TABLE `usercheckin` ENABLE KEYS */;

#
# Structure for table "userspeech"
#

DROP TABLE IF EXISTS `userspeech`;
CREATE TABLE `userspeech` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) DEFAULT NULL,
  `spk_id` int(11) DEFAULT NULL,
  `ev_id` int(11) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `speech_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `like` int(11) DEFAULT NULL,
  `dislike` int(11) DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  `lastmodifytime` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

#
# Data for table "userspeech"
#

/*!40000 ALTER TABLE `userspeech` DISABLE KEYS */;
INSERT INTO `userspeech` VALUES (72,1,1,1,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL),(73,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(74,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(75,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(76,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(77,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(78,1,1,1,'2',NULL,NULL,'re2','&lt;p&gt;qqqq&lt;/p&gt;&lt;p&gt;loo&lt;/p&gt;&lt;p&gt;&lt;img width=&quot;530&quot; height=&quot;340&quot; src=&quot;http://api.map.baidu.com/staticimage?center=116.404,39.915&amp;zoom=10&amp;width=530&amp;height=340&amp;markers=116.404,39.915&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;',NULL,NULL,NULL,NULL),(79,1,1,1,'2',NULL,NULL,'eeee','&lt;p&gt;\t\t\t&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 14px; line-height: 115%; font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;;&quot;&gt;Before the speech, I would like to ask you a question. Who has ever been a coach? Please raise your hand. (Pause) I believe nobody doubt that the coach is very important in the game. But why? Today I would like to share my experience of being a coach a few weeks ago with you. &lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 14px; line-height: 115%; font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;;&quot;&gt;That was the final game. I can still remember it very well. &lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 14px; line-height: 115%; font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;;&quot;&gt;From the very beginning, I have sent our 3 all-star players to the court, A, B and C. their rivals are 1,2,3 respectively. A is very good at jump shot, but he is slow to warm up. B is a strong guy who can take the rebound, but score can’t count on him.&amp;nbsp; C is our point guard who can assist the teammate effectively, but his defense is weak. I was full of confidence for these squads. However, it turns out to be very failed. #3 moved very fast and was very skilled at fade-away shot. C was beaten very hard and can do nothing but watching. &amp;nbsp;In no time, we have been beaten for 10 to 0. What a mess! I realized the root cause is that we were not familiar with their players. Like #3, obviously, we need someone faster than him to defend. Accordingly, I called a substitution D for C. D is very quick although he looks small. As expected, he succeeded to steal #3 a few times. Finally, we hold the ground at last. &amp;nbsp;&lt;span style=&quot;font-size: 13px; line-height: 115%; font-family: &amp;#39;times new roman&amp;#39;; background-color: yellow;&quot;&gt;This showed me that the coach must know every player’s specialty very well&lt;/span&gt;, not only yourself, but also your enemies. Only you put each one in the right position, they can do the great contribution for the entire team.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 14px; line-height: 115%; font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;;&quot;&gt;The game was moving on. Although we successfully contained the opponent, but our scorer, A was not in state. A few shots were blocked by the hoop. This was totally out of my expectation. I have noticed that A’s defender pushed him very closely. This interfered &amp;nbsp;him a lot. Only release him from this pressure, his shot would come back. So I called a timeout,&amp;nbsp; rearranged the strategy. exchanged A and B ‘s defender.&amp;nbsp; It worked immediately. What a surprise! A’s field goal percentage became better. &lt;span style=&quot;font-size: 13px; line-height: 115%; font-family: &amp;#39;times new roman&amp;#39;; background-color: yellow;&quot;&gt;So I realized that a good coach must have the ability of improvise.&lt;/span&gt; In other words, he need to make the quick response for the emergency situations on the field.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 14px; line-height: 115%; font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;;&quot;&gt;Then the game came to the last minutes. The rivals made adjustments after a timeout. They sent three-point shooter in the court. They almost put all eggs in one basket. &amp;nbsp;We ‘re so uncomfortable by this unreasonable play.&amp;nbsp; With the gap was getting smaller, I was some anxious. Even more annoying me is that our player seemed frustrated and depressed. I have called the last timeout. This moment, any strategy is no longer useful, I need to pull up the morale of whole team. So I roared to them. “what’s up, man? What are you thinking up there? Do you want to let those bastards take our victory?&amp;nbsp; We can’t lose the game in the final just like this.&amp;nbsp; So get up there and kick their ass. Remember you’re the best. You can do it. come on, gogogo”.&amp;nbsp; Maybe they were inspired by my words, we finally sticked to the end and won the champion. So happy and so excited, I felt all my efforts were worth it. &lt;span style=&quot;font-size: 13px; line-height: 115%; font-family: &amp;#39;times new roman&amp;#39;; background-color: yellow;&quot;&gt;You see a good coach should be a good table topic speaker.&lt;/span&gt; He can inspire player at critical moment.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-size: 14px; line-height: 115%; font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;;&quot;&gt;All in all, to be a good coach, you must be familiar with everyone’s specialty, can make a quick response for the accident and a good table topic speaker. None of these is easy, it require long term practice. Actually, it is also the requirement for a good team leader. So do you want to be a great leader in your team?&amp;nbsp; Try to be a good coach first. Thanks.&amp;nbsp;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;\t\t&lt;/p&gt;',NULL,NULL,NULL,NULL),(80,1,1,2,'1',NULL,NULL,'啊啊','&lt;ol class=&quot;custom_num list-paddingleft-1&quot;&gt;&lt;li class=&quot;list-num-1-1 list-num-paddingleft-1&quot;&gt;&lt;p&gt;&lt;strong&gt;&lt;span style=&quot;font-size: 14px; line-height: 115%; font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;;&quot;&gt;Before&amp;nbsp;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;/li&gt;&lt;li class=&quot;list-num-1-2 list-num-paddingleft-1&quot;&gt;&lt;p&gt;&lt;strong&gt;&lt;span style=&quot;font-size: 14px; line-height: 115%; font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;;&quot;&gt;the speech,&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;/li&gt;&lt;li class=&quot;list-num-1-3 list-num-paddingleft-1&quot;&gt;&lt;p&gt;&lt;strong&gt;&lt;span style=&quot;font-size: 14px; line-height: 115%; font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;;&quot;&gt;I would like to ask you a question. Who has ever been a coach? Please raise your hand. (Pause) I believe nobody doubt that the coach is very important in the game. But why? Today I would like to share my experience of being a coach a few weeks ago with you.&lt;/span&gt;&lt;/strong&gt;&lt;span style=&quot;font-size: 14px; line-height: 115%; font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;;&quot;&gt; &lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p style=&quot;display:none;&quot; data-background=&quot;background-repeat:no-repeat; background-position:center center; background-color:#FFC000;&quot;&gt;&lt;br/&gt;&lt;/p&gt;',NULL,NULL,NULL,'2015-03-12 17:12:01'),(81,2,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(82,5,1,1,'2',NULL,NULL,'前期',NULL,NULL,NULL,NULL,NULL),(83,5,1,1,'1',NULL,NULL,'22',NULL,NULL,NULL,NULL,NULL),(84,5,1,1,'10',NULL,NULL,'33',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `userspeech` ENABLE KEYS */;

#
# Structure for table "vote"
#

DROP TABLE IF EXISTS `vote`;
CREATE TABLE `vote` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` varchar(255) DEFAULT NULL,
  `best_table` int(11) DEFAULT NULL,
  `best_speech` int(11) DEFAULT NULL,
  `best_role` int(11) DEFAULT NULL,
  `best_ev` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "vote"
#

/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;
