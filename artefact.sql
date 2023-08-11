-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2016 at 04:13 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_dvd_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_movies`
--

CREATE TABLE IF NOT EXISTS `tbl_movies` (
  `movie_id` int(10) NOT NULL AUTO_INCREMENT,
  `movie_title` varchar(100) NOT NULL,
  `movie_year` varchar(4) DEFAULT NULL,
  `movie_genere` varchar(10) DEFAULT NULL,
  `movie_rating` varchar(10) DEFAULT NULL,
  `movie_type` varchar(10) DEFAULT NULL,
  `movie_cover` varchar(255) DEFAULT NULL,
  `movie_detail` varchar(255) DEFAULT NULL,
  `movie_value` varchar(10) NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_movies`
--

INSERT INTO `tbl_movies` (`movie_id`, `movie_title`, `movie_year`, `movie_genere`, `movie_rating`, `movie_type`, `movie_cover`, `movie_detail`, `movie_value`) VALUES
(1, 'X-Men: Apocalypse (2016)', '2016', 'action', '7.4', 'bray', 'http://ia.media-imdb.com/images/M/MV5BMjU1ODM1MzYxN15BMl5BanBnXkFtZTgwOTA4NDE2ODE@._V1_SY1000_CR0,0,676,1000_AL_.jpg', 'http://www.imdb.com/title/tt3385516/?ref_=tt_rec_tt', '100'),
(2, 'Deadpool (2016)', '2016', 'action', '8.1', 'bray', 'http://ia.media-imdb.com/images/M/MV5BMjQyODg5Njc4N15BMl5BanBnXkFtZTgwMzExMjE3NzE@._V1_SY1000_SX686_AL_.jpg', 'http://www.imdb.com/title/tt1431045/?ref_=tt_rec_tt', '100'),
(3, 'Captain America: Civil War (2016)', '2016', 'action', '8.2', 'bray', 'http://ia.media-imdb.com/images/M/MV5BMjQ0MTgyNjAxMV5BMl5BanBnXkFtZTgwNjUzMDkyODE@._V1_SY1000_CR0,0,674,1000_AL_.jpg', 'http://www.imdb.com/title/tt3498820/?ref_=tt_rec_tt', '100'),
(4, 'Teenage Mutant Ninja Turtles: Out of the Shadows (2016)', '2016', 'action', '6.3', 'cd', 'http://ia.media-imdb.com/images/M/MV5BMjM4NDQ0NTYyMV5BMl5BanBnXkFtZTgwNTIxMjY3ODE@._V1_SY1000_CR0,0,640,1000_AL_.jpg', 'http://www.imdb.com/title/tt3949660/?ref_=shtt_ov_tt', '80'),
(5, 'The Legend of Tarzan (2016)', '2016', 'adventure', '6.8', 'dvd', 'http://ia.media-imdb.com/images/M/MV5BMzY3OTI0OTcyMF5BMl5BanBnXkFtZTgwNjkxNTAwOTE@._V1_SY1000_CR0,0,674,1000_AL_.jpg', 'http://www.imdb.com/title/tt0918940/?ref_=tt_rec_tt', '80'),
(6, 'The Secret Life of Pets (2016)', '2016', 'animation', '6.8', 'bray', 'http://www.imdb.com/title/tt2709768/?ref_=inth_ov_tt', 'http://www.imdb.com/title/tt2709768/?ref_=inth_ov_tt', '80'),
(7, 'Finding Dory (2016)', '2016', 'animation', '7.9', 'bray', 'http://www.imdb.com/title/tt2277860/?ref_=inth_ov_tt', 'http://ia.media-imdb.com/images/M/MV5BNzg4MjM2NDQ4MV5BMl5BanBnXkFtZTgwMzk3MTgyODE@._V1_SY1000_CR0,0,674,1000_AL_.jpg', '100'),
(8, 'Dinosaurs Alive (2007)', '2007', 'adventure', '5.7', 'cd', 'http://www.imdb.com/title/tt1018886/', 'http://ia.media-imdb.com/images/M/MV5BMTYyMjAzOTI0OF5BMl5BanBnXkFtZTcwMTIzMjE5Mg@@._V1_.jpg', '50'),
(15, 'vfdv', 'vdfd', 'adventure', 'vdfvd', 'bray', 'dvfvd', 'vdf', 'vfdvfd'),
(16, 'brt', 'brt', 'action', 'brtb', 'dvd', 'rtb', 'brt', 'brtb'),
(17, 'revrv', 'ver', 'adventure', 'verv', 'dvd', 'evr', 'evr', 'ver'),
(18, 'revrv', 'ver', 'adventure', 'verv', 'dvd', 'evr', 'evr', 'ver');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_user_detail` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_add` varchar(100) NOT NULL,
  `user_tp` varchar(15) NOT NULL,
  `user_nic` varchar(10) NOT NULL,
  `user_balance` varchar(4) DEFAULT NULL,
  `user_movie_count` int(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tbl_user_detail`
--

INSERT INTO `tbl_user_detail` (`user_id`, `user_name`, `password`, `first_name`, `last_name`, `user_email`, `user_add`, `user_tp`, `user_nic`, `user_balance`, `user_movie_count`) VALUES
(1, 'lahiru', '123', 'Lahiru', 'Dissanayaka', 'lahirudiz@live.com', 'Maharagama', '94715755927', '921800908V', '500', NULL),
(2, 'rashmi', '123', 'Rashmi', 'Fernando', 'rashfernandez@gmail.com', 'Jaela', '09471111111', '941111111V', '500', NULL),
(39, 'lahiru123', '123', 'Lahiru', 'Dissanayaka', 'lahiru@email.com', 'Colombo', '0715755927', '921800908V', '500', NULL),
(37, 'seneth', '123', 'Seneth', 'De Silva', 'sdlh@dgf.com', 'Colombo', '0770000000', '971111111V', '500', NULL);
