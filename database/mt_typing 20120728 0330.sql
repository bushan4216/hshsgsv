-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.8


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema db_mt_typing
--

CREATE DATABASE IF NOT EXISTS db_mt_typing;
USE db_mt_typing;

--
-- Definition of table `tbl_duration_time`
--

DROP TABLE IF EXISTS `tbl_duration_time`;
CREATE TABLE `tbl_duration_time` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `Duration_Time` time NOT NULL,
  `NoWords` int(11) NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_duration_time`
--

/*!40000 ALTER TABLE `tbl_duration_time` DISABLE KEYS */;
INSERT INTO `tbl_duration_time` (`time_id`,`Duration_Time`,`NoWords`,`DateAdded`) VALUES 
 (2,'00:59:00',30,'2011-09-23 01:41:16'),
 (3,'00:00:10',30,'2011-09-23 01:41:16'),
 (4,'00:01:00',30,'2011-09-23 01:41:16');
/*!40000 ALTER TABLE `tbl_duration_time` ENABLE KEYS */;


--
-- Definition of table `tbl_exam_records`
--

DROP TABLE IF EXISTS `tbl_exam_records`;
CREATE TABLE `tbl_exam_records` (
  `exam_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `trainee_id` varchar(255) NOT NULL,
  `exam_taken` longtext NOT NULL,
  `exam_type` longtext NOT NULL,
  `duration_time` time NOT NULL,
  `stop_time` time NOT NULL,
  `no_words` int(11) NOT NULL,
  `no_words_space` int(11) NOT NULL,
  `no_mistakes` int(11) NOT NULL,
  `wpm` int(11) NOT NULL,
  `words_type` longtext NOT NULL,
  `minutes_spend` double NOT NULL,
  `date_started` datetime NOT NULL,
  `date_stop` datetime NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_exam_records`
--

/*!40000 ALTER TABLE `tbl_exam_records` DISABLE KEYS */;
INSERT INTO `tbl_exam_records` (`exam_id`,`trainee_id`,`exam_taken`,`exam_type`,`duration_time`,`stop_time`,`no_words`,`no_words_space`,`no_mistakes`,`wpm`,`words_type`,`minutes_spend`,`date_started`,`date_stop`,`DateAdded`) VALUES 
 (0010,'4','asdas, asd, hjkhjk, asdss, asdasd, dfsdf, Add time values (intervals) to a date value, ass, Addtime','asdas, asd, hjkhjk, asdss, asdasd, dfsdf, Add time values (intervals) to a date value, ass, Addtime\r\ns','01:01:00','00:59:58',30,0,1,1712,'asdas, asd, hjkhjk, asdss, asdasd, dfsdf, Add time values (intervals) to a date value, ass, <span style=\'font-weight:bold;color:#DD0000;font-style:italic;\'>Addtime\r\ns</span>',0,'2011-09-23 05:35:48','2011-09-23 05:35:50','2011-09-23 05:35:50'),
 (0011,'4','dfsdf, ass, asdas, asd, asdasd, Addtime, hjkhjk, Add time values (intervals) to a date value, asdss','dfsdf, ass, asdas, asd, asdasd, Addtime, hjkhjk, Add time values (intervals) to a date value, asdssss','00:00:10','00:00:09',30,0,1,290,'dfsdf, ass, asdas, asd, asdasd, Addtime, hjkhjk, Add time values (intervals) to a date value, <span style=\'font-weight:bold;color:#DD0000;font-style:italic;\'>asdssss</span>',0,'2011-09-23 05:36:52','2011-09-23 05:36:54','2011-09-23 05:36:54'),
 (0012,'4','asdasd, asdss, Add time values (intervals) to a date value, asd, Addtime, asdas','asdasd, asdss, Add time values (intervals) to a date value, asd, Addtime, asdasasasdhashhjasdhasdhhdhasd asdasd \nasdadhashd asd asdgasd','00:59:00','00:58:52',30,0,1,12833,'asdasd, asdss, Add time values (intervals) to a date value, asd, Addtime, <span style=\'font-weight:bold;color:#DD0000;font-style:italic;\'>asdasasasdhashhjasdhasdhhdhasd&nbsp;asdasd&nbsp;\nasdadhashd&nbsp;asd&nbsp;asdgasd</span>',0,'2011-09-24 09:45:36','2011-09-24 09:45:45','2011-09-24 09:45:45'),
 (0014,'4','dfgdfgdfg\'sfsdf, Add time values (intervals) to a date value, Addtime, asd, asdasd, sasdasd\'asdasdasd, asdss, asdas','dfgdfgdfg\'sfsdf, Add time values (intervals) to a date value, Addtime, asd, asdasd, sasdasd\'asdasdasd, asdss, asdasasasdhahsdhjasdhjasdasdasdasdhjasdhjasdhjasd','00:59:00','00:58:54',30,0,1,17110,'dfgdfgdfg\'sfsdf, Add time values (intervals) to a date value, Addtime, asd, asdasd, sasdasd\'asdasdasd, asdss, <span style=\'font-weight:bold;color:#DD0000;font-style:italic;\'>asdasasasdhahsdhjasdhjasdasdasdasdhjasdhjasdhjasd</span>',0,'2011-09-24 11:41:54','2011-09-24 11:42:00','2011-09-24 11:42:00'),
 (0015,'4','asdasd, asd, sasdasd\'asdasdasd, dfgdfgdfg\'sfsdf, Add time values (intervals) to a date value, Addtime, asdas, asdss','asdasd, asd, sasdasd\'asdasdasd, dfgdfgdfg\'sfsdf, Add time values (intervals) to a date value, Addtime, asdas, asdss','00:59:00','00:58:58',30,0,0,53100,'asdasd, asd, sasdasd\'asdasdasd, dfgdfgdfg\'sfsdf, Add time values (intervals) to a date value, Addtime, asdas, asdss',0,'2011-09-24 11:46:24','2011-09-24 11:46:27','2011-09-24 11:46:27'),
 (0016,'4','Add time values (intervals) to a date value, asdasd, sasdasd\'asdasdasd, Addtime, asd, asdas, asdss, dfgdfgdfg\'sfsdf','Add time values (intervals) to a date value, asdasd, sasdasd\'asdasdasd, Addtime, asd, asdas, asdss, dfgdfgdfg\'sfsdfas','00:00:10','00:00:09',30,0,1,290,'Add time values (intervals) to a date value, asdasd, sasdasd\'asdasdasd, Addtime, asd, asdas, asdss, <span style=\'font-weight:bold;color:#DD0000;font-style:italic;\'>dfgdfgdfg\'sfsdfas</span>',0,'2011-09-24 11:47:20','2011-09-24 11:47:21','2011-09-24 11:47:21'),
 (0017,'4','asdasd, sasdasd\'asdasdasd, asd, asdas, Add time values (intervals) to a date value, Addtime, asdss, dfgdfgdfg\'sfsdf','','00:59:00','00:58:59',30,0,1,102660,'<span style=\'font-weight:bold;color:#DD0000;font-style:italic;\'></span>',0,'2011-09-24 11:53:10','2011-09-24 11:53:11','2011-09-24 11:53:11'),
 (0019,'4','asdasd, dfgdfgdfg\'sfsdf, asdas, Add time values (intervals) to a date value, asd, sasdasd\'asdasdasd, Addtime, asdss','','00:59:00','00:58:59',30,0,1,102660,'<span style=\'font-weight:bold;color:#DD0000;font-style:italic;\'></span>',0,'2011-09-24 11:54:25','2011-09-24 11:54:26','2011-09-24 11:54:26'),
 (0021,'4','asdasd, sasdasd\'asdasdasd, asdas, asdss, Addtime, dfgdfgdfg\'sfsdf, Add time values (intervals) to a date value, asd','asdasd, sasdasd\'asdasdasd, asdas, asdss, Addtime, dfgdfgdfg\'sfsdf, Add time values (intervals) to a date value, asdas','00:59:00','00:58:54',30,0,1,17110,'asdasd, sasdasd\'asdasdasd, asdas, asdss, Addtime, dfgdfgdfg\'sfsdf, Add time values (intervals) to a date value, <span style=\'font-weight:bold;color:#DD0000;font-style:italic;\'>asdas</span>',0,'2011-09-24 11:57:16','2011-09-24 11:57:22','2011-09-24 11:57:22'),
 (0022,'4','asdss, asd, asdas, Addtime, dfgdfgdfg\'sfsdf, asdasd, sasdasd\'asdasdasd, Add time values (intervals) to a date value','asdss, asd, asdas, Addtime, dfgdfgdfg\'sfsdf, asdasd, sasdasd\'asdasdasd, Add time values (intervals) to a date value.askajdas,asdjasjd,asdasdasd','00:59:00','00:58:52',30,0,1,12833,'asdss, asd, asdas, Addtime, dfgdfgdfg\'sfsdf, asdasd, sasdasd\'asdasdasd, <span style=\'font-weight:bold;color:#DD0000;font-style:italic;\'>Add&nbsp;time&nbsp;values&nbsp;(intervals)&nbsp;to&nbsp;a&nbsp;date&nbsp;value.askajdas,asdjasjd,asdasdasd</span>',0,'2011-09-24 12:02:20','2011-09-24 12:02:29','2011-09-24 12:02:29'),
 (0023,'4','dfgdfgdfg\'sfsdf, asdas, asdss, sasdasd\'asdasdasd, Addtime, asdasd, asd, Add time values (intervals) to a date value','dfgdfgdfg\'sfsdf, asdas, asdss, sasdasd\'asdasdasd, Addtime, asdasd, asd, Add time values (intervals) to a date valueasdajasjajkasd','00:59:00','00:58:55',30,0,1,20532,'dfgdfgdfg\'sfsdf, asdas, asdss, sasdasd\'asdasdasd, Addtime, asdasd, asd, <span style=\'font-weight:bold;color:#DD0000;font-style:italic;\'>Add&nbsp;time&nbsp;values&nbsp;(intervals)&nbsp;to&nbsp;a&nbsp;date&nbsp;valueasdajasjajkasd</span>',0,'2011-09-24 12:07:30','2011-09-24 12:07:36','2011-09-24 12:07:36'),
 (0024,'4','asdas, asdss, dfgdfgdfg\'sfsdf, sasdasd\'asdasdasd, Add time values (intervals) to a date value, Addtime, asdasd, asd','asdas, asdss, dfgdfgdfg\'sfsdf, sasdasd\'asdasdasd, Add time values (intervals) to a date value, Addtime, asdasd, asdssssssssss','00:59:00','00:58:53',30,0,1,14666,'asdas, asdss, dfgdfgdfg\'sfsdf, sasdasd\'asdasdasd, Add time values (intervals) to a date value, Addtime, asdasd, <span style=\'font-weight:bold;color:#DD0000;font-style:italic;\'>asdssssssssss</span>',0,'2011-09-24 12:21:42','2011-09-24 12:21:49','2011-09-24 12:21:50'),
 (0025,'4','dfgdfgdfg\'sfsdf, sasdasd\'asdasdasd, asd, asdss, asdasd\'asd\'a\'sdasd, asdas, Add time values (intervals) to a date value, Addtime, asdasd','dfgdfgdfg\'sfsdf, sasdasd\'asdasdasd, asd, asdss, asdasd\'asd\'a\'sdasd, asdas, Add time values (intervals) to a date value, Addtime, asdassdasafa','00:59:00','00:58:56',30,0,1,25665,'dfgdfgdfg\'sfsdf, sasdasd\'asdasdasd, asd, asdss, asdasd\'asd\'a\'sdasd, asdas, Add time values (intervals) to a date value, Addtime, <span style=\'font-weight:bold;color:#DD0000;font-style:italic;\'>asdassdasafa</span>',0,'2011-09-24 12:39:47','2011-09-24 12:39:51','2011-09-24 12:39:51'),
 (0026,'4','asdss, asdasd, asdasd\'asd\'a\'sdasd, Addtime, Add time values (intervals) to a date value, dfgdfgdfg\'sfsdf, sasdasd\'asdasdasd, asd, asdas','','00:59:00','00:58:59',30,0,1,102660,'<span style=\'font-weight:bold;color:#DD0000;font-style:italic;\'></span>',0,'2011-09-24 12:42:27','2011-09-24 12:42:28','2011-09-24 12:42:28'),
 (0027,'4','dfgdfgdfg\'sfsdf, Addtime, sasdasd\'asdasdasd, asdasd\'asd\'a\'sdasd, asdss, Add time values (intervals) to a date value, asdas, asdasd, asd','','00:59:00','00:58:57',30,0,1,34220,'<span style=\'font-weight:bold;color:#DD0000;font-style:italic;\'></span>',0,'2011-09-24 12:46:19','2011-09-24 12:46:22','2011-09-24 12:46:22'),
 (0028,'4','asdasd\'asd\'a\'sdasd, dfgdfgdfg\'sfsdf, sasdasd\'asdasdasd, asdss, asd, Addtime, asdas, asdasd, Add time values (intervals) to a date value','asdasd\'asd\'a\'sdasd, dfgdfgdfg\'sfsdf, sasdasd\'asdasdasd, asdss, asd, Addtime, asdas, asdasd, Add time values (intervals) to a date value','00:00:10','00:00:00',30,0,0,30,'asdasd\'asd\'a\'sdasd, dfgdfgdfg\'sfsdf, sasdasd\'asdasdasd, asdss, asd, Addtime, asdas, asdasd, Add time values (intervals) to a date value',0,'2011-09-24 13:18:51','2011-09-24 13:19:01','2011-09-24 13:19:02'),
 (0029,'4','asdasd, Add time values (intervals) to a date value, Addtime, sasdasd\'asdasdasd, dfgdfgdfg\'sfsdf, asdas, asdss, asd, asdasd\'asd\'a\'sdasd','asdasd, Add time values (intervals) to a date value, Addtime, sasdasd\'asdasdasd, asdasd,a dad asdhasd ashd asdhasda','00:00:10','00:00:00',30,0,1,179,'asdasd, Add time values (intervals) to a date value, Addtime, sasdasd\'asdasdasd, <span style=\'font-weight:bold;color:#DD0000;font-style:italic;\'>asdasd,a&nbsp;dad&nbsp;asdhasd&nbsp;ashd&nbsp;asdhasda</span>',0,'2011-09-24 13:41:59','2011-09-24 13:42:09','2011-09-24 13:42:09'),
 (0030,'4','asd, dfgdfgdfg\'sfsdf, asdss, sasdasd\'asdasdasd, Addtime, asdasd\'asd\'a\'sdasd, asdas, Add time values (intervals) to a date value, asdasd','asd, dfgdfgdfg\'sfsdf, asdss, sasdasd\'asdasdasd, Addtime, asdasd\'asd\'a\'sdasd, asdas, Add time values (intervals) to a date value, asdasd\r\n','00:59:00','00:58:58',30,0,1,900,'asd, dfgdfgdfg\'sfsdf, asdss, sasdasd\'asdasdasd, Addtime, asdasd\'asd\'a\'sdasd, asdas, Add time values (intervals) to a date value, <span style=\'font-weight:bold;color:#DD0000;font-style:italic;\'>asdasd\r\n</span>',0,'2011-09-24 13:42:40','2011-09-24 13:42:43','2011-09-24 13:42:43'),
 (0031,'4','','asdasdhadahdahdhjadahdjshasdhasdjahdhhjasdhasjdhasdad','00:59:00','00:58:55',30,53,1,6,'<b><i>asdasdhadahdahdhjadahdjshasdhasdjahdhhjasdhasjdhasdad</b></i>',0.1,'2012-07-28 03:27:39','2012-07-28 03:27:45','2012-07-28 03:27:45'),
 (0032,'4','','Add time','00:01:00','00:00:55',30,8,2,184,'<b><i>Add</b></i> <b><i>time</b></i>',0.1,'2012-07-28 03:28:35','2012-07-28 03:28:41','2012-07-28 03:28:41');
/*!40000 ALTER TABLE `tbl_exam_records` ENABLE KEYS */;


--
-- Definition of table `tbl_terminologies`
--

DROP TABLE IF EXISTS `tbl_terminologies`;
CREATE TABLE `tbl_terminologies` (
  `term_id` int(11) NOT NULL AUTO_INCREMENT,
  `Terminologies` text NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`term_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_terminologies`
--

/*!40000 ALTER TABLE `tbl_terminologies` DISABLE KEYS */;
INSERT INTO `tbl_terminologies` (`term_id`,`Terminologies`,`DateAdded`) VALUES 
 (1,'Add time values (intervals) to a date value','2011-09-23 02:24:50'),
 (4,'asdss','2011-09-23 02:25:17'),
 (5,'Addtime','2011-09-23 02:25:32'),
 (6,'asdasd','2011-09-23 02:26:57'),
 (7,'asd','2011-09-23 02:26:58'),
 (8,'asdas','2011-09-23 02:26:59'),
 (9,'sasdasd\'asdasdasd','2011-09-24 11:01:33'),
 (10,'dfgdfgdfg\'sfsdf','2011-09-24 11:22:21'),
 (11,'asdasd\'asd\'a\'sdasd','2011-09-24 12:24:31');
/*!40000 ALTER TABLE `tbl_terminologies` ENABLE KEYS */;


--
-- Definition of table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `user_txt` varchar(255) NOT NULL,
  `pass_txt` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `UserType` varchar(255) NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`user_id`,`FirstName`,`LastName`,`Username`,`Password`,`user_txt`,`pass_txt`,`Status`,`UserType`,`DateAdded`) VALUES 
 (1,'Jasper','Carpizo','a1ab71364c754f90912f19e96733f467','45966e5d5464137c42e767de82439898','jcarpizo','36841432','Activate','Administrator','2011-09-22 22:01:01'),
 (4,'Agent','Agent','b33aed8f3134996703dc39f9a7c95783','b33aed8f3134996703dc39f9a7c95783','agent','agent','Activate','Trainee','2011-09-22 05:37:28');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
