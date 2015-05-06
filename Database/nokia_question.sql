# Host: hdm134137352.my3w.com  (Version: 5.1.48-log)
# Date: 2015-05-06 22:02:25
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "nokia_question"
#

DROP TABLE IF EXISTS `nokia_question`;
CREATE TABLE `nokia_question` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) DEFAULT NULL,
  `answer_a` varchar(255) DEFAULT NULL,
  `answer_b` varchar(255) DEFAULT NULL,
  `answer_c` varchar(255) DEFAULT NULL,
  `answer_d` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "nokia_question"
#

/*!40000 ALTER TABLE `nokia_question` DISABLE KEYS */;
INSERT INTO `nokia_question` VALUES (1,'Nokia birthday','100','110','120','130','A'),(2,'Wu Bo是谁？','工会主席','工会副主席','财务部长','环保部长','A'),(3,'马月是谁？','TMC主席','路人甲','路人乙','路人丙','A');
/*!40000 ALTER TABLE `nokia_question` ENABLE KEYS */;
