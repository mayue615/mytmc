# Host: hdm134137352.my3w.com  (Version: 5.1.48-log)
# Date: 2015-05-08 08:47:46
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
  `answer` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "nokia_answer"
#

/*!40000 ALTER TABLE `nokia_answer` DISABLE KEYS */;
INSERT INTO `nokia_answer` VALUES (2,'oxVbIjqfVIWepTpdT1ZGvH59yLUI','1','1','A'),(3,'oxVbIjqfVIWepTpdT1ZGvH59yLUI','3','1','A'),(4,'oxVbIjqfVIWepTpdT1ZGvH59yLUI','1','1','A'),(5,'oxVbIjqfVIWepTpdT1ZGvH59yLUI','4','0','A'),(6,'oxVbIjqfVIWepTpdT1ZGvH59yLUI','4','1','D'),(7,'oxVbIjqfVIWepTpdT1ZGvH59yLUI','1','1','A'),(8,'oxVbIjqfVIWepTpdT1ZGvH59yLUI','4','1','D'),(9,'oxVbIjqfVIWepTpdT1ZGvH59yLUI','3','1','A'),(10,'oxVbIjqfVIWepTpdT1ZGvH59yLUI','2','1','A'),(11,'oxVbIjqfVIWepTpdT1ZGvH59yLUI','3','1','A'),(12,'oxVbIjqfVIWepTpdT1ZGvH59yLUI','3','1','A'),(13,'oxVbIjqfVIWepTpdT1ZGvH59yLUI','3','1','A');
/*!40000 ALTER TABLE `nokia_answer` ENABLE KEYS */;
