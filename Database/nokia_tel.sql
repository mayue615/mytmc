# Host: hdm134137352.my3w.com  (Version: 5.1.48-log)
# Date: 2015-05-04 23:45:16
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

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
/*!40000 ALTER TABLE `nokia_tel` ENABLE KEYS */;
