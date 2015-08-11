-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: baixiu
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blog_category`
--

DROP TABLE IF EXISTS `blog_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `introduction` varchar(150) NOT NULL,
  `time` int(11) NOT NULL,
  `click` int(11) NOT NULL DEFAULT '0',
  `reply` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='博文列表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_category`
--

/*!40000 ALTER TABLE `blog_category` DISABLE KEYS */;
INSERT INTO `blog_category` VALUES (1,'静夜思','床前明月光，疑是地上霜',1442002939,43,0),(2,'草','离离原上草，一岁一枯荣',1442002933,7,0),(3,'登鹳雀楼','白日依山尽',1442023832,7,0),(4,'春晓','春眠不觉晓',1442023832,4,0),(5,'寻隐者不遇','松下问童子',1442023832,4,0),(6,'九月九日忆山东兄弟','独在异乡为异客',1442023832,3,0),(7,'早发白帝城','朝辞白帝彩云间',1442022912,4,0),(8,'早发白帝城11','朝辞白帝彩云间11',1442022912,3,0),(9,'早发白帝城22','朝辞白帝彩云间22',1442022912,4,0),(10,'早发白帝城33','朝辞白帝彩云间33',1442022912,4,0),(11,'早发白帝城44','朝辞白帝彩云间44',1442022912,8,0),(12,'早发白帝城55','朝辞白帝彩云间55',1442022912,6,0),(13,'早发白帝城66','朝辞白帝彩云间66',1442022912,6,0);
/*!40000 ALTER TABLE `blog_category` ENABLE KEYS */;

--
-- Table structure for table `blog_code`
--

DROP TABLE IF EXISTS `blog_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `code` varchar(35) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='邮箱激活码';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_code`
--

/*!40000 ALTER TABLE `blog_code` DISABLE KEYS */;
INSERT INTO `blog_code` VALUES (6,13,'c023eef17da3b038cb79ad58194f87ef',1438092956),(7,14,'481c08fc0ec70ba38f62a32e694a1dd3',1438952478),(8,15,'481c08fc0ec70ba38f62a32e694a1dd3',1438952672),(9,16,'481c08fc0ec70ba38f62a32e694a1dd3',1438952823),(10,17,'481c08fc0ec70ba38f62a32e694a1dd3',1438953208),(11,18,'481c08fc0ec70ba38f62a32e694a1dd3',1438953464);
/*!40000 ALTER TABLE `blog_code` ENABLE KEYS */;

--
-- Table structure for table `blog_detail`
--

DROP TABLE IF EXISTS `blog_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='博文详情';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_detail`
--

/*!40000 ALTER TABLE `blog_detail` DISABLE KEYS */;
INSERT INTO `blog_detail` VALUES (1,1,'床前明月光，疑是地上霜。  举头望明月，  低头思故乡。'),(2,2,'离离原上草，一岁一枯荣。野火烧不尽，春风吹又生。'),(3,3,'白日依山尽，黄河入海流。欲穷千里目，更上一层楼。'),(4,4,'春眠不觉晓，处处闻啼鸟。夜来风雨声，花落知多少。'),(5,5,'松下问童子，言师采药去。只在此山中，云深不知处。'),(6,6,'独在异乡为异客，每逢佳节倍思亲。遥知兄弟登高处，遍插茱萸少一人。'),(7,7,'朝辞白帝彩云间，千里江陵一日还。两岸猿声啼不住，轻舟已过万重山。'),(8,8,'独在异乡为异客，每逢佳节倍思亲。遥知兄弟登高处，遍插茱萸少一人888888888888888。'),(9,9,'朝辞白帝彩云间，千里江陵一日还。两岸猿声啼不住，轻舟已过万重山。99999999999999'),(10,10,'独在异乡为异客，每逢佳节倍思亲。遥知兄弟登高处，遍插茱萸少一人10000000000000。'),(11,11,'朝辞白帝彩云间，千里江陵一日还。两岸猿声啼不住，轻舟已过万重山。111111111111111'),(12,12,'独在异乡为异客，每逢佳节倍思亲。遥知兄弟登高处，遍插茱萸少一人1222220000000000000。'),(13,13,'朝辞白帝彩云间，千里江陵一日还。两岸猿声啼不住，轻舟已过万重山。13333333333333');
/*!40000 ALTER TABLE `blog_detail` ENABLE KEYS */;

--
-- Table structure for table `blog_reply`
--

DROP TABLE IF EXISTS `blog_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `content` text,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='博文评论';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_reply`
--

/*!40000 ALTER TABLE `blog_reply` DISABLE KEYS */;
INSERT INTO `blog_reply` VALUES (1,1,'果真是好湿啊',1442022912),(2,1,'楼上to be going done',1442022521);
/*!40000 ALTER TABLE `blog_reply` ENABLE KEYS */;

--
-- Table structure for table `blog_session`
--

DROP TABLE IF EXISTS `blog_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_session` (
  `sessionid` char(32) NOT NULL,
  `data` text,
  `expire` int(11) NOT NULL,
  PRIMARY KEY (`sessionid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='保存会话';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_session`
--

/*!40000 ALTER TABLE `blog_session` DISABLE KEYS */;
INSERT INTO `blog_session` VALUES ('fr9mhv494gapm2c6b244jkrel1','token|s:32:\"67389902755ca00b97b8ec5.95427806\";verify|s:32:\"a6fe4f5ce680c5aef531d97153a8391b\";',1439303257);
/*!40000 ALTER TABLE `blog_session` ENABLE KEYS */;

--
-- Table structure for table `blog_user`
--

DROP TABLE IF EXISTS `blog_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '小白',
  `password` varchar(65) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `rank` int(11) NOT NULL DEFAULT '0',
  `face` varchar(255) NOT NULL DEFAULT 'http://localhost/baixiu/file/face/default.gif',
  `isverify` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='用户';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_user`
--

/*!40000 ALTER TABLE `blog_user` DISABLE KEYS */;
INSERT INTO `blog_user` VALUES (18,'&quot;张三&quot;','58a720a336c3f381df888c256d388ae1','baixiume@sina.com',NULL,13,0,'http://localhost/baixiu/file/face/1438954035_weibo_1.jpg',1),(13,'qiangqiang','c023eef17da3b038cb79ad58194f87ef','1614304122@qq.com',NULL,13,0,'http://localhost/baixiu/file/face/1438954186_weibo_1.jpg',1);
/*!40000 ALTER TABLE `blog_user` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-11 22:09:28
