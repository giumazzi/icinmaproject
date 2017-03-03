-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Host: db590970370.db.1and1.com
-- Generation Time: Mar 03, 2017 at 02:46 PM
-- Server version: 5.5.54-0+deb7u2-log
-- PHP Version: 5.4.45-0+deb7u7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db590970370`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `BOOKING_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) DEFAULT NULL,
  `FILM_ID` int(11) DEFAULT NULL,
  `BOOKING_SESSION` varchar(25) DEFAULT NULL,
  `BOOKING_DATE` date DEFAULT NULL,
  `BOOKING_SEAT` varchar(6) DEFAULT NULL,
  `BOOKING_PRICE` int(11) NOT NULL,
  `BOOKING_NUM` int(11) NOT NULL,
  PRIMARY KEY (`BOOKING_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=162 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BOOKING_ID`, `USER_ID`, `FILM_ID`, `BOOKING_SESSION`, `BOOKING_DATE`, `BOOKING_SEAT`, `BOOKING_PRICE`, `BOOKING_NUM`) VALUES
(99, 8, 34, '12:00', '2016-01-11', '4_6', 20, 2),
(100, 8, 34, '12:00', '2016-01-11', '4_7', 20, 2),
(101, 8, 34, '16:00', '2016-01-11', '4_7', 20, 2),
(102, 8, 34, '16:00', '2016-01-11', '4_8', 20, 2),
(103, 8, 35, '12:00', '2016-01-11', '1_2', 20, 2),
(104, 8, 35, '12:00', '2016-01-11', '1_1', 20, 2),
(105, 8, 34, '12:00', '2016-01-11', '5_5', 20, 2),
(106, 8, 34, '12:00', '2016-01-11', '5_6', 20, 2),
(107, 8, 34, '12:00', '2016-01-11', '5_5', 20, 2),
(108, 8, 34, '12:00', '2016-01-11', '5_6', 20, 2),
(113, 8, 34, '20:00', '2016-01-11', '3_5', 20, 2),
(114, 8, 34, '20:00', '2016-01-11', '3_6', 20, 2),
(115, 8, 34, '20:00', '2016-01-14', '2_4', 30, 3),
(117, 8, 34, '20:00', '2016-01-14', '2_6', 30, 3),
(118, 8, 34, '20:00', '2016-01-14', '2_4', 30, 3),
(119, 8, 34, '20:00', '2016-01-14', '2_5', 30, 3),
(120, 8, 34, '20:00', '2016-01-14', '2_6', 30, 3),
(121, 8, 34, '12:00', '2016-01-11', '5_8', 20, 2),
(122, 8, 34, '12:00', '2016-01-11', '5_9', 20, 2),
(123, 8, 34, '12:00', '2016-01-11', '5_8', 20, 2),
(124, 8, 34, '12:00', '2016-01-11', '5_9', 20, 2),
(125, 8, 34, '12:00', '2016-01-11', '5_8', 20, 2),
(126, 8, 34, '12:00', '2016-01-11', '5_9', 20, 2),
(127, 8, 34, '12:00', '2016-01-11', '5_8', 20, 2),
(128, 8, 34, '12:00', '2016-01-11', '5_9', 20, 2),
(129, 8, 34, '12:00', '2016-01-11', '5_8', 20, 2),
(130, 8, 34, '12:00', '2016-01-11', '5_9', 20, 2),
(132, 8, 37, '12:00', '2016-01-11', '5_8', 40, 4),
(133, 8, 37, '12:00', '2016-01-11', '5_9', 40, 4),
(134, 8, 37, '12:00', '2016-01-11', '5_7', 40, 4),
(135, 8, 37, '12:00', '2016-01-11', '5_6', 40, 4),
(136, 8, 37, '12:00', '2016-01-11', '5_8', 40, 4),
(137, 8, 37, '12:00', '2016-01-11', '5_9', 40, 4),
(138, 8, 37, '12:00', '2016-01-11', '5_7', 40, 4),
(139, 8, 34, '16:00', '2016-01-12', '4_6', 30, 3),
(140, 8, 34, '16:00', '2016-01-12', '4_7', 30, 3),
(141, 8, 34, '16:00', '2016-01-12', '4_8', 30, 3),
(142, 4, 36, '12:00', '2016-01-11', '5_6', 20, 2),
(143, 4, 36, '12:00', '2016-01-11', '5_7', 20, 2),
(144, 8, 34, '12:00', '2016-01-11', '1_10', 20, 2),
(145, 8, 34, '12:00', '2016-01-11', '1_9', 20, 2),
(146, 8, 34, '12:00', '2016-01-11', '3_4', 20, 2),
(147, 8, 34, '12:00', '2016-01-11', '3_5', 20, 2),
(148, 8, 34, '12:00', '2016-01-11', '1_3', 30, 3),
(149, 8, 34, '12:00', '2016-01-11', '1_4', 30, 3),
(150, 8, 34, '12:00', '2016-01-11', '1_5', 30, 3),
(151, 8, 34, '12:00', '2016-01-11', '2_7', 20, 2),
(152, 8, 34, '12:00', '2016-01-11', '2_8', 20, 2),
(153, 8, 34, '12:00', '2016-01-11', '3_8', 30, 3),
(154, 8, 34, '12:00', '2016-01-11', '3_9', 30, 3),
(155, 8, 34, '12:00', '2016-01-11', '3_10', 30, 3),
(156, 4, 34, '16:00', '2016-01-12', '3_7', 10, 1),
(157, 4, 34, '12:00', '2016-01-11', '3_3', 20, 2),
(158, 4, 34, '12:00', '2016-01-11', '3_2', 20, 2),
(159, 13, 34, '16:00', '2016-01-13', '4_7', 30, 3),
(160, 13, 34, '16:00', '2016-01-13', '4_8', 30, 3),
(161, 13, 34, '16:00', '2016-01-13', '4_9', 30, 3);

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `FILM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FILM_TITLE` varchar(50) DEFAULT NULL,
  `FILM_DESCRIPTION` varchar(500) DEFAULT NULL,
  `FILM_DIRECTOR` varchar(100) DEFAULT NULL,
  `FILM_CAST` varchar(100) DEFAULT NULL,
  `FILM_PREMIERE` date DEFAULT NULL,
  `FILM_DURATION` time DEFAULT NULL,
  `FILM_AGE` varchar(11) NOT NULL,
  `FILM_TRAILER` varchar(100) NOT NULL,
  `FILM_SLIDER` varchar(60) NOT NULL,
  `FILM_700x300` varchar(40) NOT NULL,
  `FILM_750x500` varchar(40) NOT NULL,
  `FILM_750x501` varchar(40) NOT NULL,
  `FILM_750x502` varchar(40) NOT NULL,
  PRIMARY KEY (`FILM_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`FILM_ID`, `FILM_TITLE`, `FILM_DESCRIPTION`, `FILM_DIRECTOR`, `FILM_CAST`, `FILM_PREMIERE`, `FILM_DURATION`, `FILM_AGE`, `FILM_TRAILER`, `FILM_SLIDER`, `FILM_700x300`, `FILM_750x500`, `FILM_750x501`, `FILM_750x502`) VALUES
(34, 'Star Wars: A new hope', 'Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a wookiee and two droids to save the universe from the Empire world-destroying battle-station, while also attempting to rescue Princess Leia from the evil Darth Vader.', 'George Lucas', 'Mark Hamill, Harrison Ford, Carrie Fisher', '2015-10-06', '01:20:00', '12A', 'https://www.youtube.com/embed/1g3_CFmnU7k', '/starwars.jpg', '/starwars.jpg', '/starwars1.jpg', '/starwars2.jpg', '/starwars3.jpg'),
(35, 'The Dark Knight', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, the caped crusader must come to terms with one of the greatest psychological tests of his ability to fight injustice.', 'Christopher Nolan', 'Christian Bale, Heath Ledger, Aaron Eckhart', '2015-10-06', '01:52:00', '18', 'https://www.youtube.com/embed/yrJL5JxEYIw', '/darknight.jpg', '/darknight.jpg', '/darknight1.jpg', '/darknight2.jpg', '/darknight3.jpg'),
(36, 'The Good, the Bad and the Ugly', 'A bounty hunting scam joins two men in an uneasy alliance against a third in a race to find a fortune in gold buried in a remote cemetery.', 'Sergio Leone', 'Clint Eastwood, Eli Wallach, Lee Van Cleef', '2015-10-06', '01:48:00', '18', 'https://www.youtube.com/embed/JdkSuurdbDA', '/wildwest.jpg', '/wildwest.jpg', '/wildwest1.jpg', '/wildwest2.jpg', '/wildwest3.jpg'),
(37, 'The Matrix', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', 'Andy and Lana Wachowski', 'Keanu Reeves, Laurence Fishburne, Carrie-Anne', '2015-10-06', '01:36:00', '15', 'https://www.youtube.com/embed/m8e-FF8MsqU', '/matrix.jpg', '/matrix.jpg', '/matrix1.jpg', '/matrix2.jpg', '/matrix3.jpg'),
(38, 'The Lion King', 'Lion cub and future king Simba searches for his identity. His eagerness to please others and penchant for testing his boundaries sometimes gets him into trouble.', 'Roger Allers, Rob Minkoff', 'Matthew Broderick, Jeremy Irons, James Earl Jones', '2015-10-06', '01:10:00', 'U', 'https://www.youtube.com/embed/4sj1MT05lAA', '/thelionking.jpg', '/thelionking.jpg', '/thelionking1.jpg', '/thelionking2.jpg', '/thelionking3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_LASTNAME` varchar(15) DEFAULT NULL,
  `USER_FIRTSNAME` varchar(15) DEFAULT NULL,
  `USER_PHONE` varchar(15) DEFAULT NULL,
  `USER_ADDRESS` varchar(15) DEFAULT NULL,
  `USER_POSTCODE` varchar(15) DEFAULT NULL,
  `USER_DOB` date DEFAULT NULL,
  `USER_EMAIL` varchar(35) DEFAULT NULL,
  `USER_PASSWORD` varchar(44) DEFAULT NULL,
  `USER_ROLE` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USER_LASTNAME`, `USER_FIRTSNAME`, `USER_PHONE`, `USER_ADDRESS`, `USER_POSTCODE`, `USER_DOB`, `USER_EMAIL`, `USER_PASSWORD`, `USER_ROLE`) VALUES
(3, 'Mullin', 'George', '0141-563-2847', 'Fontain Park', 'EH2 3cZ', '2008-06-25', 'mullin-george@gmail.com', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Junior'),
(4, 'Admin', '', '', '', '', '1993-12-17', 'admin-icinema@gmail.com', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Admin'),
(8, 'Vazquez Camacho', 'Adrian', '07774001976', 'Lothian Rd 163/', 'EH3 9AA', '1988-02-27', 'adrian.vcch@gmail.com', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Adult'),
(11, 'Cortes', 'Joan', '07845071110', 'Lothian Rd 163/', 'EH3 9AA', '2009-02-10', 'joancortesgomez@gmail.com', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Staff'),
(12, 'Enrique', 'Jose', '56565446846', 'Lothian Rd 163/', 'EH3 9AA', '2005-11-23', 'junior@gmail.com', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Junior'),
(13, 'Vazq', 'Adrian', '13121', 'a234', 'asidis', '1989-03-02', 'adrian.vcch@gmail.con', 'fd1b738879badebc85aa5f30ebfa5de9', 'Adult');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
