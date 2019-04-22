-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2016 at 11:02 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dokimi`
--
CREATE DATABASE IF NOT EXISTS `dokimi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dokimi`;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
CREATE TABLE IF NOT EXISTS `attachments` (
  `ID` int(11) NOT NULL,
  `ID_p` int(11) NOT NULL,
  `titlos` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `siggrafeas` varchar(255) DEFAULT NULL,
  `imerominia` varchar(255) DEFAULT NULL,
  `perigrafi` text,
  `katigoria` varchar(255) DEFAULT NULL,
  `rating` int(255) DEFAULT '0',
  `views` int(255) DEFAULT '0',
  `rating_n` int(255) DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`ID`, `ID_p`, `titlos`, `pdf`, `siggrafeas`, `imerominia`, `perigrafi`, `katigoria`, `rating`, `views`, `rating_n`) VALUES
(0, 0, 'attachment1', 'localhost/Project/files/0/0/a.pdf', 'singrafeas1', '2016-06-19', 'Perigrafi1', 'Άλλο', 20, 13, 2),
(1, 0, 'attachment2', 'localhost/Project/files/0/0/a.pdf', 'singrafeas1', '2016-06-19', 'Perigrafi1', 'Επιστημονικό Άρθρο', 20, 9, 1),
(2, 0, 'attachment3', 'localhost/Project/files/0/0/a.pdf', 'singrafeas1', '2016-06-19', 'Perigrafi1', 'Δημόσια Αρχή', 20, 9, 2),
(3, 0, 'attachment4', 'localhost/Project/files/0/0/a.pdf', 'singrafeas1', '2016-06-19', 'Perigrafi1', 'Εταιρικό Έγγραφο', 20, 10, 1),
(4, 0, 'attachment5', 'localhost/Project/files/0/0/a.pdf', 'singrafeas1', '2016-06-19', 'Perigrafi1', 'Προσωπική Άποψη/blog', 40, 34, 2),
(5, 0, 'titlos_123123', 'www.pdf995.com/samples/pdf.pdf', 'singrafeas_1', '2016-06-08', 'awggawgawawga', 'Άλλο', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `ID` int(11) NOT NULL,
  `ID_a` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `text` text,
  `imerominia` text,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `ID_a`, `Username`, `text`, `imerominia`) VALUES
(0, 0, 'Manolis', 'kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1', '2016-6-5'),
(1, 0, 'Manolis', 'kimeno tou comment dokimi2kimeno tou comment dokimi2kimeno tou comment dokimi2kimeno tou comment dokimi2', '2016-6-5'),
(2, 0, 'Manolis', 'kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1kimeno tou comment dokimi1', '2016-6-5'),
(3, 0, 'Manolis', 'kimeno tou comment dokimi2kimeno tou comment dokimi2kimeno tou comment dokimi2kimeno tou comment dokimi2kimeno tou comment dokimi2kimeno tou comment dokimi2', '2016-6-5'),
(4, 0, 'Manolis', 'dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 dokimi123 123 132 ', '2016-10-10'),
(5, 4, 'Manolis', 'edw grafoume to comment tou attachment 5', '2016-06-08'),
(6, 4, 'Manolis', 'comment noumero 2 dokimazoume tin defteri sira', '2016-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `processes`
--

DROP TABLE IF EXISTS `processes`;
CREATE TABLE IF NOT EXISTS `processes` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `titlos` varchar(255) DEFAULT NULL,
  `perigrafi` text,
  `step1` varchar(255) DEFAULT NULL,
  `step1b` varchar(255) DEFAULT NULL,
  `step1e` varchar(255) DEFAULT NULL,
  `step2` varchar(255) DEFAULT NULL,
  `step2b` varchar(255) DEFAULT NULL,
  `step2e` varchar(255) DEFAULT NULL,
  `step3` varchar(255) DEFAULT NULL,
  `step3b` varchar(255) DEFAULT NULL,
  `step3e` varchar(255) DEFAULT NULL,
  `step4` varchar(255) DEFAULT NULL,
  `step4b` varchar(255) DEFAULT NULL,
  `step4e` varchar(255) DEFAULT NULL,
  `step5` varchar(255) DEFAULT NULL,
  `step5b` varchar(255) DEFAULT NULL,
  `step5e` varchar(255) DEFAULT NULL,
  `step6` varchar(255) DEFAULT NULL,
  `step6b` varchar(255) DEFAULT NULL,
  `step6e` varchar(255) DEFAULT NULL,
  `step7` varchar(255) DEFAULT NULL,
  `step7b` varchar(255) DEFAULT NULL,
  `step7e` varchar(255) DEFAULT NULL,
  `step8` varchar(255) DEFAULT NULL,
  `step8b` varchar(255) DEFAULT NULL,
  `step8e` varchar(255) DEFAULT NULL,
  `step9` varchar(255) DEFAULT NULL,
  `step9b` varchar(255) DEFAULT NULL,
  `step9e` varchar(255) DEFAULT NULL,
  `step10` varchar(255) DEFAULT NULL,
  `step10b` varchar(255) DEFAULT NULL,
  `step10e` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `processes`
--

INSERT INTO `processes` (`ID`, `User_ID`, `titlos`, `perigrafi`, `step1`, `step1b`, `step1e`, `step2`, `step2b`, `step2e`, `step3`, `step3b`, `step3e`, `step4`, `step4b`, `step4e`, `step5`, `step5b`, `step5e`, `step6`, `step6b`, `step6e`, `step7`, `step7b`, `step7e`, `step8`, `step8b`, `step8e`, `step9`, `step9b`, `step9e`, `step10`, `step10b`, `step10e`) VALUES
(0, 0, 'Process1', 'Description1 Description1 Description1 Description1 Description1 Description1 Description1 Description1 Description1 Description1 Description1 Description1 Description1 Description1 Description1 Description1 Description1 Description1 Description1 Description1 Description1 ', 'step1_1', '2016-06-13', '2016-06-14', 'step2_2', '2016-06-15', '2016-06-16', 'step3_3', '2016-06-19', '2016-06-21', 'step4_4', '2016-06-22', '2016-06-24', 'step5_5', '2016-06-28', '2016-06-30', 'step6_6', '2016-07-03', '2016-07-07', 'step7_7', '2016-07-08', '2016-07-09', 'step8_8', '2016-07-10', '2016-07-11', 'step9_9', '2016-07-13', '2016-07-15', 'step10_10', '2016-07-18', '2016-07-19'),
(1, 0, 'process dokimi', 'description process dikimi', 'step1_1_1_1', '2016-06-20', '2016-06-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0, 'test', 'test', 'step1_1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 0, NULL, NULL, NULL, '2016-06-24', '2016-06-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Onoma` varchar(255) DEFAULT NULL,
  `Eponimo` varchar(255) DEFAULT NULL,
  `Eksidikefsi` varchar(255) DEFAULT NULL,
  `Thesi` varchar(255) DEFAULT NULL,
  `Katigoria1` varchar(255) DEFAULT NULL,
  `Katigoria2` varchar(255) DEFAULT NULL,
  `Katigoria3` varchar(255) DEFAULT NULL,
  `Organismos` varchar(255) DEFAULT NULL,
  `Katigoria_o` varchar(255) DEFAULT NULL,
  `Filo` varchar(255) DEFAULT NULL,
  `Spoudes1` varchar(255) DEFAULT NULL,
  `Spoudes2` varchar(255) DEFAULT NULL,
  `Spoudes3` varchar(255) DEFAULT NULL,
  `Ksenes1` varchar(255) DEFAULT NULL,
  `ks1_s` varchar(2) DEFAULT NULL,
  `ks1_w` varchar(2) DEFAULT NULL,
  `Ksenes2` varchar(255) DEFAULT NULL,
  `ks2_s` varchar(2) DEFAULT NULL,
  `ks2_w` varchar(2) DEFAULT NULL,
  `Ksenes3` varchar(255) DEFAULT NULL,
  `ks3_s` varchar(2) DEFAULT NULL,
  `ks3_w` varchar(2) DEFAULT NULL,
  `Ethnikotita` varchar(255) DEFAULT NULL,
  `Poli` varchar(255) DEFAULT NULL,
  `activation` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `edit_info_1` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  UNIQUE KEY `username` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `email`, `Onoma`, `Eponimo`, `Eksidikefsi`, `Thesi`, `Katigoria1`, `Katigoria2`, `Katigoria3`, `Organismos`, `Katigoria_o`, `Filo`, `Spoudes1`, `Spoudes2`, `Spoudes3`, `Ksenes1`, `ks1_s`, `ks1_w`, `Ksenes2`, `ks2_s`, `ks2_w`, `Ksenes3`, `ks3_s`, `ks3_w`, `Ethnikotita`, `Poli`, `activation`, `status`, `edit_info_1`) VALUES
(0, 'Manolis', '098f6bcd4621d373cade4e832627b4f6', 'manolisandreopoulos@gmail.com', 'Manolis', 'Andreopoulos', 'Περιβάλλον', 'thesi_123', 'Διοικητική', 'Ακαδημαϊκή', 'Προϊστάμενος-Πρόεδρος', 'Organismos_manolis', 'Δημόσιος Τομέας', 'Άνδρας', 'ΑΕΙ', 'MASTER', 'PHD', '', '', '', '', '', '', '', '', '', 'Greece', '', '098f6bcd4621d373cade4e832627b4f6', 1, 1),
(1, 'Dokimi', '098f6bcd4621d373cade4e832627b4f6', 'test', 'Dokimi', 'Test', '', '', '', '', '', '', '', 'Άνδρας', '', '', '', 'agglika', '', '', 'germanika', '', '', '', '', '', 'USA', '', '098f6bcd4621d373cade4e832627b4f6', 1, 1),
(2, 'Dokimiasd', '098f6bcd4621d373cade4e832627b4f6', 'testagawgawgawg', 'Dokimiawfawfawf', 'Testawfwafaw', '', '', '', '', '', '', '', 'Άνδρας', '', '', '', 'agglika', '', '', 'germanika', '', '', '', '', '', 'USA', '', '098f6bcd4621d373cade4e832627b4f6', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
