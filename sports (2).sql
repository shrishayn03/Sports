-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2017 at 01:20 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sports`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `pno` int(100) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `quantity`, `total`, `pno`) VALUES
(43, 6, 12, 59988, 1),
(45, 6, 12, 9588, 9),
(47, 11, 51, 254949, 1),
(48, 11, 50, 14950, 3),
(49, 11, 49, 48951, 6);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `gno` int(10) NOT NULL AUTO_INCREMENT,
  `gnm` varchar(100) NOT NULL,
  PRIMARY KEY (`gno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`gno`, `gnm`) VALUES
(1, 'Cricket'),
(2, 'Football'),
(3, 'Volleyball'),
(4, 'Hockey'),
(5, 'Basketball');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `cust_id` int(10) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_mobileno` varchar(15) NOT NULL,
  `cust_addr` varchar(1000) NOT NULL,
  `mode` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `c` int(10) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`cust_id`, `cust_name`, `cust_email`, `cust_mobileno`, `cust_addr`, `mode`, `user_id`, `c`) VALUES
(32, 'Rohit Sharma', 'rohit@gmail.com', '9845342384', 'mumbai ', 'Credit Card', 6, 1),
(33, 'Rohit Sharma', 'rohit@gmail.com', '9845342384', 'mumbai ', 'Net Banking', 6, 1),
(34, 'Rohit Sharma', 'rohit@gmail.com', '9845342384', 'mumbai ', 'Net Banking', 6, 1),
(35, 'Rohit Sharma', 'rohit@gmail.com', '9845342384', 'mumbai ', 'Cash on Delivery', 6, 1),
(36, 'Rohit Sharma', 'rohit@gmail.com', '9845342384', 'mumbai ', 'Cash on Delivery', 6, 1),
(37, 'Rohit Sharma', 'rohit@gmail.com', '9845342384', 'mumbai ', 'Credit Card', 6, 1),
(38, 'Rohit Sharma', 'rohit@gmail.com', '9845342384', 'mumbai ', 'Credit Card', 6, 1),
(39, 'Rohit Sharma', 'rohit@gmail.com', '9845342384', 'mumbai ', 'Net Banking', 6, 1),
(40, 'Rohit Sharma', 'rohit@gmail.com', '9845342384', 'mumbai ', 'Credit Card', 6, 1),
(41, 'Rohit Sharma', 'rohit@gmail.com', '9845342384', 'mumbai ', 'Cash on Delivery', 6, 1),
(42, 'Rohit Sharma', 'rohit@gmail.com', '9845342384', 'mumbai ', 'Credit Card', 6, 1),
(43, 'Rohit Sharma', 'rohit@gmail.com', '9845342384', 'mumbai ', 'Net Banking', 6, 1),
(44, 'Rohit Sharma', 'rohit@gmail.com', '9845342384', 'mumbai ', 'Cash on Delivery', 6, 1),
(45, 'Rohit Sharma', 'rohit@gmail.com', '9845342384', 'mumbai ', 'Credit Card', 6, 1),
(46, 'Rohit Sharma', 'rohit@gmail.com', '9845342384', 'mumbai ', 'Credit Card', 6, 1),
(47, 'Rohit Sharma', 'rohit@gmail.com', '9845342384', 'mumbai ', 'Cash on Delivery', 6, 0),
(48, 'Rohit Sharma', 'rohit@gmail.com', '7574664989', 'mumbai ', 'Credit Card', 6, 0),
(49, 'Rohit Sharma', 'rohit@gmail.com', '7574664989', 'mumbai ', 'Cash on Delivery', 6, 0),
(50, 'kavita shinde', 'kavita@waghmare.com', '7773773844', 'vishrant wadi pune maharshtra', 'Cash on Delivery', 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `cust_id` int(10) NOT NULL,
  `pno` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `order_quantity` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `order_date` date NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`item_id`, `cust_id`, `pno`, `user_id`, `order_quantity`, `total`, `order_date`) VALUES
(52, 32, 8, 6, 15, 5985, '2017-04-18'),
(53, 33, 4, 6, 14, 2786, '2017-04-18'),
(54, 34, 1, 6, 12, 59988, '2017-04-18'),
(55, 34, 2, 6, 8, 6392, '2017-04-18'),
(56, 35, 8, 6, 15, 5985, '2017-04-19'),
(57, 36, 4, 6, 50, 9950, '2017-04-19'),
(58, 37, 4, 6, 16, 3184, '2017-04-19'),
(59, 38, 3, 6, 20, 5980, '2017-04-19'),
(60, 39, 4, 6, 20, 3980, '2017-04-19'),
(61, 40, 9, 6, 9, 7191, '2017-04-22'),
(62, 41, 1, 6, 12, 59988, '2017-04-25'),
(63, 41, 2, 6, 9, 7191, '2017-04-25'),
(64, 42, 3, 6, 13, 3887, '2017-04-25'),
(65, 43, 2, 6, 17, 13583, '2017-04-25'),
(66, 44, 4, 6, 1, 199, '2017-04-25'),
(67, 45, 1, 6, 15, 74985, '2017-04-25'),
(68, 46, 1, 6, 11, 54989, '2017-04-25'),
(69, 47, 2, 6, 19, 15181, '2017-04-25'),
(70, 48, 4, 6, 10, 1990, '2017-04-28'),
(71, 49, 1, 6, 12, 59988, '2017-04-28'),
(72, 49, 2, 6, 10, 7990, '2017-04-28'),
(73, 49, 9, 6, 12, 9588, '2017-04-28'),
(74, 50, 1, 11, 51, 254949, '2017-04-28'),
(75, 50, 3, 11, 50, 14950, '2017-04-28'),
(76, 50, 6, 11, 49, 48951, '2017-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(100) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(100) NOT NULL,
  `post_date` date NOT NULL,
  `post_author` varchar(100) NOT NULL,
  `post_image` varchar(100) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_view` int(10) NOT NULL,
  `user_id` int(100) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_date`, `post_author`, `post_image`, `post_content`, `post_view`, `user_id`) VALUES
(1, 'cricket game', '2017-04-15', 'Vinit Ghure', 'images.jpg', 'This is to tell u what is cricket.Cricket is a national sport which is played between two teams of eleven players each who score runs (points) by running between two sets of three small, wooden posts called wickets. Each of the wickets is at one end of a rectangle of flattened grass called the pitch.', 1, 1),
(2, 'The Football', '2017-04-15', 'shrishay Naik', 'download.jpg', 'In its place, two general types of football evolved: "kicking" games and "running" (or "carrying") games. A hybrid of the two, known as the "Boston game", was played by a group known as the Oneida Football Club. ... In 1867, Princeton used rules based on those of the English Football Association.', 1, 1),
(4, 'cricket my life', '2017-04-17', 'SACHINE ten', 'download (2).jpg', 'Cricket is a national sport which is played between two teams of eleven players each who score runs (points) by running between two sets of three small, wooden posts called wickets. Each of the wickets is at one end of a rectangle of flattened grass called the pitch.', 1, 6),
(5, 'Football', '2017-04-15', 'Messi', 'bg-body.jpg', 'late 14c., "a foot race, an ancient measure of length," from Latin stadium "a measure of length, a race course" (commonly one-eighth of a Roman mile; translated in early English Bibles by furlong), from Greek stadion "a measure of length, a running track," especially the track at Olympia, which was one stadium in ', 1, 1),
(6, 'football world', '2017-04-15', 'shree', 'field_sunset_final_0.jpg', 'this is something new about football', 1, 1),
(7, 'cricket fan', '2017-04-28', 'sachine', 'images.jpg', 'something that no one will know about fan', 0, 10),
(8, 'football world', '2017-04-28', 'messi', 'download.jpg', 'About Football', 0, 6),
(9, 'cricket game', '2017-04-28', 'Rohit', 'images.jpg', 'something', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pno` int(20) NOT NULL AUTO_INCREMENT,
  `pname` varchar(100) NOT NULL,
  `pprice` int(100) NOT NULL,
  `pdetail` varchar(1000) NOT NULL,
  `pquantity` int(100) NOT NULL,
  `pimg1` varchar(100) NOT NULL,
  `pimg2` varchar(100) NOT NULL,
  `gno` int(10) NOT NULL,
  PRIMARY KEY (`pno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pno`, `pname`, `pprice`, `pdetail`, `pquantity`, `pimg1`, `pimg2`, `gno`) VALUES
(1, 'Willow Cricket Bat', 4999, 'Gray Nicolls GN+ Powerbow English Willow Cricket Bat, Short Handle,\nGray Nicolls,\nEdge tape on blade, medium weight around 2lb 12oz,\nComes with cover.', 1863, 'bat2.jpg', 'bat1.jpg', 1),
(2, 'MRF Cricket Bat', 799, 'MRF Street Fighter Poplar Willlow Cricket Bat, Short Handle.\nMade of popular willow.\nLight weight for soft tennis ball play only.\nPacking: 1 No.\nSize: short handle.', 1905, 'bat3.jpg', 'bat4.jpg', 1),
(3, 'Cosco Cricket Ball,(6)(Yellow)', 299, 'Cosco Light Weight Cricket Ball, Pack of 6 (Yellow)\nFine and superior quality\nBeing lightweight, this cosco cricket ball is easy and comfortable to hold in your hands while playing\nDesigned in a bright fluorescent yellow color, this cricket ball can be easily identified and spotted on any surface.\nBox contents: 6 balls\n', 17, 'ball1.jpg', 'ball2.jpg', 1),
(4, 'Leather Cricket Ball White', 199, 'Material: Leather\r\nColour: White\r\nPackage Quantity: 1 Cricket Ball\r\n', 19, 'ball4.jpg', 'ball3.jpg', 1),
(6, 'Nivia StreetFootball', 999, 'Offering optimum response and feel\r\nRubber outer shell\r\nEnsures good performance\r\nRubber moulded football\r\nThe ball is meant for very light play and not for playing on rough ground', 1951, 'football1.jpg', 'football2.jpg', 2),
(8, 'Junior Goalie Gloves', 399, 'adidas Performance Ace Junior Goalie Gloves', 970, 'gloves.jpg', 'g.jpg', 2),
(9, 'MRF Cricket Bat', 799, 'This is the bat everyone wants', 1129, 'bat4 (2).jpg', 'bat5.jpg', 1),
(10, 'Baset Ball', 100, 'The basket ball', 0, 'basket1.jpg', 'basket2.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `p` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `mobile_no`, `address`, `email`, `password`, `p`) VALUES
(1, 'Vinit Ghure', '7507631429', 'Alandi pune', 'ghurevinit@gmail.com', 'iuh86', 1),
(2, 'Shrishay Naik', '9964484630', 'Alandi pune', 'shrishayn03@gmail.com', 'shri13', 1),
(4, 'Ganu Kadam', '9864537454', 'Varze Pune', 'ganu@gmail.com', 'ganu123', 0),
(5, 'Vinit Ghure', '9856435645', 'sawantawadi', 'vs@gmail.com', '12345', 0),
(6, 'Rohit Sharma', '7574664989', 'mumbai ', 'rohit@gmail.com', 'rohit', 0),
(8, 'vaibhav chavan', '9967565654', 'dighi', 'vaibhav@gmail.com', 'aaa', 0),
(9, 'Pravin Repe', '7276586645', 'dighi', 'pravc@gmail.com', '1234', 0),
(10, 'Sachine Ten', '9843445768', 'Mumbai ', 'sachine10@gmail.com', 'sachine', 0),
(11, 'kavita shinde', '7773773844', 'vishrant wadi pune maharshtra', 'kavita@waghmare.com', 'wagh', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
