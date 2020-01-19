-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2020 at 01:11 PM
-- Server version: 5.7.20
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbhpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_stat` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_stat`) VALUES
(1, 'Gadgets', 'Inactive'),
(2, '    Cosmetics Product', 'Active'),
(3, 'School Supplies', 'Active'),
(4, '  Men\'s Fashion', 'Active'),
(5, 'Women\'s Fashion', 'Active'),
(6, 'Foods', 'Active'),
(7, 'Hygiene Necessities', 'Active'),
(9, 'Accessories', 'Active'),
(10, 'Kid\'s Fashion', 'Active'),
(11, 'Boards and Games', 'Active'),
(12, 'Luxury', 'Active'),
(13, 'Mga Ewan', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_contactNo` int(11) NOT NULL,
  `cus_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cus_id`, `cus_name`, `cus_contactNo`, `cus_address`) VALUES
(15, 'Chicken', 126546, 'Farm'),
(16, 'Marc Polo', 823095832, 'T-shirt'),
(17, 'Way lami', 4125, 'yaw imal'),
(18, 'Pasko Na', 2147483647, 'Heyo, Angono Rizal Exodus Ville Zipporah St.'),
(19, 'Jack n\' Jill', 42155324, 'HI-HO and HI-KO'),
(20, 'Christian', 12412421, 'kdslgklfdsj'),
(21, 'Cheerry', 2147483647, 'initao mis or');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_stat` enum('Active','Not Active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `category_id`, `item_name`, `item_description`, `price`, `item_image`, `item_stat`) VALUES
(1, 1, 'Cherry-Moaps', 'Sabon ni Cherry', 1, 'Capture.png', 'Active'),
(2, 1, 'TianBrushs', 'Toothbrush ni Christian', 10, 'noimage.jpg', 'Active'),
(3, 9, 'Bracelet', 'Kikay\'s Bracelet', 70, 'noimage.jpg', 'Active'),
(4, 2, 'Make-up', 'Personal Collection', 150, 'noimage.jpg', 'Active'),
(5, 1, 'Headphone', 'Phone Head set', 0, 'noimage.jpg', 'Not Active'),
(6, 3, 'Pencil', 'Mongol 2B 3.3mm point', 10, 'noimage.jpg', 'Active'),
(7, 9, 'Earrings', 'Gold Sapphire', 2000, 'noimage.jpg', 'Active'),
(8, 1, 'Speak-Cares', 'HD Sonic Waves', 0, 'noimage.jpg', 'Not Active'),
(9, 1, 'Speaker', 'HD Sonic Waves', 3000, 'noimage.jpg', 'Active'),
(10, 4, 'Polo-Shirt', 'Crocs', 500, 'noimage.jpg', 'Active'),
(11, 3, 'Ruler', 'Prince King', 10, 'noimage.jpg', 'Active'),
(12, 9, 'Ring', 'Diamond 22-carat', 50000, 'noimage.jpg', 'Active'),
(13, 2, 'Hey-Sunshine', 'fdsaf', 3213, 'noimage.jpg', 'Active'),
(14, 4, 'Sweat-Shirt', 'Red striped', 400, 'noimage.jpg', 'Active'),
(15, 2, 'Mark', 'fdsafsa', 321312, 'noimage.jpg', 'Active'),
(16, 1, 'Dickon', 'Camera 360', 50000, 'noimage.jpg', 'Active'),
(17, 0, 'Lipstick', 'Huawei', 200, 'noimage.jpg', 'Active'),
(18, 0, 'fdsf', 'ewqeq', 3312, 'noimage.jpg', 'Active'),
(19, 0, 'dsfsa', 'ddasfdsa', 3213, 'noimage.jpg', 'Active'),
(20, 0, 'fdsa-d', 'fdsaafdsa', 321312, 'noimage.jpg', 'Active'),
(21, 1, 'HEy', 'pssty', 2221, 'noimage.jpg', 'Active'),
(22, 1, 'hoi', 'ahoi mates!!', 12312, 'noimage.jpg', 'Active'),
(23, 1, 'uwi-na', 'uie ', 3312, 'noimage.jpg', 'Not Active'),
(24, 7, 'Soapie', 'Wata', 432, 'noimage.jpg', 'Active'),
(25, 1, 'Jingle', 'Bell', 100, 'noimage.jpg', 'Not Active'),
(26, 5, 'Crop-Top', 'Jeans Guro ni sya baii', 200, 'noimage.jpg', 'Active'),
(27, 1, 'micap', 'hey', 100, 'Capture.JPG', 'Active'),
(28, 6, 'Foofs', 'Doofs', 123, 'add account.JPG', 'Active'),
(29, 3, 'mark', 'ewan', 314, 'spos-banner.png', 'Active'),
(30, 13, 'Ewan-ko-din-sau', 'heyu ', 123, 'noimage.jpg', 'Active'),
(31, 4, 'hey', 'dasdasd', 3213, 'noimage.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `orderlists`
--

CREATE TABLE `orderlists` (
  `ol_id` int(11) NOT NULL,
  `ol_qty` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderlists`
--

INSERT INTO `orderlists` (`ol_id`, `ol_qty`, `item_id`, `order_id`) VALUES
(91, 5, 6, 1),
(93, 3, 1, 24),
(94, 1, 16, 24),
(95, 1, 12, 25),
(96, 55, 13, 26),
(97, 112, 21, 27),
(98, 111, 6, 28),
(99, 1, 6, 29),
(100, 1, 12, 29),
(102, 5, 6, 30),
(103, 6, 13, 30),
(104, 1, 12, 30),
(105, 2, 10, 30),
(106, 8, 3, 30),
(108, 2, 14, 30),
(109, 23, 30, 31),
(110, 5, 2, 36),
(111, 2, 3, 31),
(112, 3, 9, 31),
(113, 4, 6, 31),
(114, 2, 4, 32),
(115, 2, 13, 32),
(116, 4, 28, 32),
(117, 5, 2, 36),
(118, 5, 12, 33),
(119, 1, 14, 34),
(120, 1, 3, 35),
(121, 2, 4, 35),
(122, 5, 2, 36),
(123, 2, 3, 36),
(124, 3, 1, 36),
(125, 3, 1, 37),
(126, 4, 14, 37);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_method` enum('Cash','Lay Away') NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `customer_id`, `order_method`, `order_date`) VALUES
(24, 6, 15, 'Lay Away', '2017-12-20 13:26:03'),
(25, 6, 1, 'Cash', '2017-12-20 14:09:07'),
(26, 6, 16, 'Lay Away', '2017-12-20 14:12:41'),
(27, 7, 1, 'Cash', '2017-12-20 14:13:42'),
(28, 7, 17, 'Lay Away', '2017-12-20 14:14:25'),
(29, 6, 1, 'Cash', '2017-12-20 17:17:14'),
(30, 6, 1, 'Cash', '2017-12-29 18:59:13'),
(31, 6, 18, 'Lay Away', '2017-12-29 19:54:15'),
(32, 6, 19, 'Lay Away', '2017-12-29 19:55:01'),
(33, 6, 20, 'Lay Away', '2018-01-09 16:01:51'),
(34, 6, 1, 'Cash', '2018-01-09 16:02:27'),
(35, 6, 1, 'Cash', '2018-05-24 13:31:35'),
(36, 6, 21, 'Lay Away', '2018-09-04 08:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pay_id` int(11) NOT NULL,
  `pay_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_id` int(11) NOT NULL,
  `pay_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pay_id`, `pay_date`, `order_id`, `pay_amount`) VALUES
(16, '2017-12-20 13:26:03', 24, 40003),
(17, '2017-12-20 14:12:41', 26, 76715),
(18, '2017-12-20 14:14:25', 28, 1100),
(19, '2017-12-21 11:22:41', 28, 10),
(20, '2017-12-21 11:22:53', 26, 10000),
(21, '2017-12-21 11:46:50', 24, 10000),
(22, '2017-12-29 19:54:15', 31, 2019),
(23, '2017-12-29 19:55:01', 32, 2218),
(24, '2018-01-08 11:56:56', 26, 40000),
(25, '2018-01-08 11:56:58', 26, 40000),
(26, '2018-01-09 16:01:51', 33, 150020),
(27, '2018-09-04 08:09:45', 36, 100),
(28, '2018-09-04 08:13:08', 26, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_type` enum('Admin','Employee') NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `userName` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `user_fname` varchar(25) NOT NULL,
  `user_mname` varchar(15) NOT NULL,
  `user_lname` varchar(15) NOT NULL,
  `user_gender` enum('Male','Female') NOT NULL,
  `user_contactNo` varchar(11) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `accountStatus` enum('Active','Inactive') NOT NULL,
  `recentLoggedIn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `user_email`, `userName`, `password`, `user_fname`, `user_mname`, `user_lname`, `user_gender`, `user_contactNo`, `user_address`, `accountStatus`, `recentLoggedIn`) VALUES
(6, 'Admin', 'Makoy03@gmail.com', 'Admin', 'Admin', 'Admin', 'Concepcion', 'Lambino', 'Male', '09291494146', 'Navotas, Manila', 'Active', '2017-12-29 17:29:08'),
(7, 'Employee', 'mark_poring195@yahoo.com', 'ChrisMack03', '12345', 'Mark', 'Concepcion', 'Lambino', 'Male', '09354850726', 'Angono, Rizal', 'Active', '2017-12-20 15:40:25'),
(8, 'Employee', 'cherry_wong@gmail.com', 'Cherry111', 'cherry111', 'Employee', 'Batig', 'Nawong', 'Female', '09354850710', 'Initao, Misamis Oriental', 'Active', '2017-12-29 17:29:18'),
(9, 'Employee', 'fdsfds@gmail.com', 'fdsafsda', 'f279d3901fa96bd7926956379', 'e12e', '421rdsa', 'fds321', 'Female', '4325325', 'fedsfds', 'Inactive', '2017-12-20 15:53:08'),
(10, 'Employee', 'mark_christian@yahoo.com', 'markchristian', 'markchristian', 'Mark', 'Christian', 'Lambinoq', 'Male', '09353215412', 'Angono, Rizal', 'Inactive', '2017-12-20 15:40:31'),
(11, 'Employee', 'JoeDoin@gmail.com', 'JoeHeyJoe', '12345', 'Hey Joe', 'How ', 'You Doin\'', 'Male', '42643521', 'Dummy Pops', 'Active', '2017-12-20 15:40:48'),
(12, 'Employee', 'Dan3x@gmail.com', 'Danica03', 'danica03', 'Dan', 'Dan', 'Dan', 'Female', '1443253543', 'Iligan Ilig Gan', 'Active', '2017-12-20 15:40:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orderlists`
--
ALTER TABLE `orderlists`
  ADD PRIMARY KEY (`ol_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orderlists`
--
ALTER TABLE `orderlists`
  MODIFY `ol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
