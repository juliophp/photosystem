-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2016 at 07:35 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `text` text,
  `time_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `comm_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photo_id` (`photo_id`),
  KEY `user_id` (`user_id`),
  KEY `comm_user` (`comm_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `photo_id`, `text`, `time_created`, `comm_user`) VALUES
(5, 13, 161, 'Nice Pic', '2016-12-27 17:38:32', 13);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `img_title` varchar(100) DEFAULT NULL,
  `img_path` varchar(255) NOT NULL,
  `caption` text,
  `time_created` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `user_id`, `img_title`, `img_path`, `caption`, `time_created`) VALUES
(158, 7, 'New Pic', '../img/1482857064BicKayaks_Wallpapers.jpg', 'Lets see', '2016-12-27 18:44:24'),
(160, 7, 'Paddlling Together', '../img/1482858944kayaking_2-wallpaper-800x480.jpg', 'I didnt realise how far I was until i looked backed', '2016-12-27 19:15:44'),
(161, 13, 'Sunset In Arkansas.', '../img/1482859709aptw.jpg', 'It feels nice to race during the sunset.', '2016-12-27 19:28:29'),
(162, 12, 'Testing the Camera', '../img/148286075328079-kayaking-into-sunset-1920x1080-beach-wallpaper.jpg', 'The colour looks sharp on this camera', '2016-12-27 19:45:53'),
(163, 12, 'My Boat', '../img/1482861732BC10_Chesapeake-Bay-Kayak_s1024x768.jpg', 'Took time to capture my boat.', '2016-12-27 20:02:12'),
(164, 12, 'A visit to solomon island', '../img/1482861866Kayaking_in_Calm_Clear_Water_Kennedy_Island_Solomon_Islands.jpg', 'The water is so clear here', '2016-12-27 20:04:26'),
(165, 12, 'Kayaking in the river', '../img/1482862157kayak_in_the_river-wide.jpg', 'There is something about this river.', '2016-12-27 20:09:17'),
(166, 12, 'Around The Lake', '../img/1482862236kayaking-around-the-lake.jpg', 'The green pasture is a joy to see.', '2016-12-27 20:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `username` varchar(55) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `date_registered` date DEFAULT NULL,
  `bio` text,
  `photo` varchar(100) DEFAULT '../img/avatarthumb.jpg',
  `role` varchar(15) DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `sex`, `dob`, `date_registered`, `bio`, `photo`, `role`) VALUES
(7, 'Adeniran Ogunyemi', 'adeogun', 'adeogun@hotmail.com', 'adeogun', 0, '2016-11-09', '2016-11-08', 'NULL', '../img/avatarthumb.jpg', 'user'),
(8, 'Adeyemi', 'admin', 'admin@change.me', 'admin', NULL, NULL, '2016-11-12', NULL, 'img/avatarthumb.jpg', 'admin'),
(9, 'Nicolas Cage', 'nicocage', 'cage@nicolas.com', 'nicosia', 1, '1991-06-04', '2016-11-13', 'NULL', '../img/ogrresimgetir2.jpg', 'user'),
(11, 'maniraho', 'didier21', 'maniraho.didier2190@gmail.com', '123456', NULL, NULL, '2016-11-14', NULL, '../img/avatarthumb.jpg', 'admin'),
(12, 'Olivia Williams', 'olivia', 'olivia@phpproj.com', 'olivia', NULL, NULL, '2016-11-14', NULL, '../img/avatarthumb.jpg', 'user'),
(13, 'Jon', 'Aragon', 'youknownothing', '12345', NULL, NULL, '2016-11-28', NULL, '../img/avatarthumb.jpg', 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`photo_id`) REFERENCES `pictures` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`comm_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
