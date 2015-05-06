# Host: hdm134137352.my3w.com  (Version: 5.1.48-log)
# Date: 2015-05-06 22:02:38
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "nokia_answer"
#

DROP TABLE IF EXISTS `nokia_answer`;
CREATE TABLE `nokia_answer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `q_id` varchar(255) DEFAULT NULL,
  `is_answer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "nokia_answer"
#

/*!40000 ALTER TABLE `nokia_answer` DISABLE KEYS */;
/*!40000 ALTER TABLE `nokia_answer` ENABLE KEYS */;
