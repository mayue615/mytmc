# Host: hdm134137352.my3w.com  (Version: 5.1.48-log)
# Date: 2015-05-08 08:48:14
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "nokia_user"
#

DROP TABLE IF EXISTS `nokia_user`;
CREATE TABLE `nokia_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

#
# Data for table "nokia_user"
#

/*!40000 ALTER TABLE `nokia_user` DISABLE KEYS */;
INSERT INTO `nokia_user` VALUES (1,'oxVbIjqfVIWepTpdT1ZGvH59yLUI',8);
/*!40000 ALTER TABLE `nokia_user` ENABLE KEYS */;
