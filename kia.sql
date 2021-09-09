-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 02, 2021 at 11:43 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miistore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brd_id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brd_id`, `brand`, `logo`) VALUES
(16, 'Royal Canin', 'Royal-Canin-Logo.svg.png'),
(17, 'Topsong', 'ezgif.com-gif-maker.png');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `category`) VALUES
(13, 'Kucing'),
(14, 'Burung');

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `counter_id` int(11) NOT NULL,
  `counter_ip` varchar(50) NOT NULL,
  `counter_date` date NOT NULL,
  `counter_time` time NOT NULL,
  `counter_visit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`counter_id`, `counter_ip`, `counter_date`, `counter_time`, `counter_visit`) VALUES
(1, '::1', '2021-09-01', '22:25:30', 1),
(2, '::1', '2021-09-02', '08:50:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` varchar(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `scat_id` int(11) NOT NULL,
  `brd_id` int(11) NOT NULL,
  `bgimg` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `price` varchar(11) NOT NULL,
  `discount` varchar(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `available` varchar(10) NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `cat_id`, `scat_id`, `brd_id`, `bgimg`, `image`, `detail`, `price`, `discount`, `stock`, `available`, `creation_date`) VALUES
('0002', 'Topsong Kicau', 14, 29, 17, '0902image.jpg', 'image.jpg', 'tes', '100000', '2', 10, 'Ada', '2021-09-02'),
('0003', 'Royal Canin', 13, 28, 16, '0902O4V3HGC.jpg', 'O4V3HGC.jpg', 'tes', '100000', '5', 10, 'Ada', '2021-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` varchar(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(80) NOT NULL,
  `state` varchar(60) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `phone` varchar(18) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `fullname`, `gender`, `address`, `city`, `state`, `zip_code`, `phone`, `email`, `password`, `reg_date`) VALUES
('0001', 'Aplora Sanerati', 'Perempuan', 'Perum Karanglo', 'Malang', 'Jawa Timur', '65112', '+6282345678910', 'iamaplora@gmail.com', '849f6a6ce05b17d5e5351044f1378f47', '2017-10-11'),
('0002', 'Jett Jett', 'Laki-laki', 'Jl.Cipayung', 'Depok', 'Jawa barat', '123', '+62123', 'tes@gmail.com', '4297f44b13955235245b2497399d7a93', '2021-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(11) NOT NULL,
  `customer_id` varchar(11) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `cardbank_type` varchar(12) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `payment_status` varchar(11) NOT NULL,
  `totals` varchar(11) NOT NULL,
  `creation_date` date NOT NULL,
  `creation_time` time NOT NULL DEFAULT '00:00:00',
  `order_status` varchar(11) NOT NULL,
  `order_valid_date` date NOT NULL,
  `order_valid_time` time NOT NULL DEFAULT '00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `owner_name`, `cardbank_type`, `card_number`, `payment_status`, `totals`, `creation_date`, `creation_time`, `order_status`, `order_valid_date`, `order_valid_time`) VALUES
('0006', '0002', 'raf', 'Bank BCA', '123', 'PAID', '90000', '2021-09-02', '12:07:41', 'SENT', '2021-09-02', '13:16:04'),
('0007', '0002', 'raf', 'Bank BCA', '123', 'PAID', '90000', '2021-09-02', '12:17:03', 'PENDING', '2021-09-02', '12:17:03'),
('0008', '0002', 'raf', 'Bank BCA', '123', 'PAID', '57000', '2021-09-02', '12:37:54', 'PENDING', '2021-09-02', '12:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `detail_id` int(11) NOT NULL,
  `order_id` varchar(11) NOT NULL,
  `bgimg` varchar(100) NOT NULL,
  `item_code` varchar(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `disc` int(3) NOT NULL,
  `price` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`detail_id`, `order_id`, `bgimg`, `item_code`, `item_name`, `qty`, `disc`, `price`) VALUES
(1, '0005', '090260672025e3df9487295e5424a47e8154.jpg', '0002', 'Topsong', 1, 5, '30000'),
(2, '0006', '0902O4V3HGC.jpg', '0001', 'Royal Canin', 1, 10, '100000'),
(3, '0007', '0902O4V3HGC.jpg', '0001', 'Royal Canin', 1, 10, '100000'),
(4, '0008', '090260672025e3df9487295e5424a47e8154.jpg', '0002', 'Topsong', 2, 5, '30000');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `scat_id` int(11) NOT NULL,
  `subcategory` varchar(50) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`scat_id`, `subcategory`, `cat_id`) VALUES
(28, 'Persia', 13),
(29, 'Love Bird', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) CHARACTER SET latin1 NOT NULL,
  `user` varchar(30) CHARACTER SET latin1 NOT NULL,
  `pass` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `user`, `pass`) VALUES
(1, 'Ananda Tri Putra', 'admin', '0192023a7bbd73250516f069df18b500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brd_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`counter_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`scat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `counter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `scat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
