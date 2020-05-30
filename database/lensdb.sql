-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2020 at 03:48 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lenstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Rayban'),
(2, 'Titan Eyeplus'),
(3, 'Freshlook');


-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(50) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Spectacles'),
(2, 'Contact Lens'),
(3, 'Sunglasses');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(50) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 2, 7, 1, '017789', 'Completed'),
(2, 2, 2, 1, '0747684', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(50) NOT NULL,
  `product_cat` int(50) NOT NULL,
  `product_brand` int(50) NOT NULL,
  `product_title` varchar(55) NOT NULL,
  `product_price` int(50) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 1, 2, 'Titan', 5000, 'Titan Dous 2 sgh ', 'spec1.jpg', 'spectacles titan'),
(2, 1, 3, 'Freshlook', 2500, 'FLook 5s', 'spec2.jpeg', 'spectacles freshlook'),
(3, 2, 2, 'Titan', 1200, 'Natural 1', 'nat1.jpg', 'lens titan'),
(4, 1, 3, 'Freshlook', 3200, 'Flook a ', 'spec4.jpg', 'spectacles freshlook'),
(5, 1, 2, 'Titan', 1000, 'Titan Dous 2', 'spec5.jpg', 'spectacles titan'),
(6, 3, 1, 'Rayban', 2600, '2020-look', 'sg1.jpg', 'sunglass rayban '),
(7, 3, 1, 'Rayban', 3000, '2020-look', 'sg2.jpg', 'sunglass rayban'),
(8, 1, 2, 'Titan', 4000, 'Titan Dous 2 s', 'spec6.jpg', 'spectacles titan'),
(9, 2, 3, 'Freshlook', 1200, 'Brown color', 'brown.jpg', 'freshlook  brown lens'),
(10, 2, 3, 'Freshlook', 1000, 'Blue color', 'blue.jpg', ' freshlook blue lens'),
(11, 2, 3, 'Freshlook', 1000, 'Green color', 'green.jpg', ' frshlook green lens'),
(12, 2, 3, 'Freshlook', 1500, 'Aqua ', 'aqua.jpg', ' freshlook aqua lens'),
(13, 1, 3, 'Freshlook', 3000, 'Flook d', 'spec3.jpg', ' freshlook spectacles'),
(14, 2, 2, 'Titan', 1400, 'Natural 2', 'nat2.jpg', ' lens titan'),
(15, 2, 2, 'Titan', 1500, 'Natural 3', 'nat3.jpg', 'lens titan'),
(16, 1, 1, 'Rayban', 3500, 'RB Red and Black ', 'spec6.jpg', 'rayban spectacles'),
(17, 1, 1, 'Rayban', 5000, 'RB 100', 'spec8.png', 'rayban spectacles'),
(19, 3, 1, 'Rayban', 3000, '2020-look', 'sg3.jpg', 'sunglass spectacles'),
(20, 3, 2, 'Titan', 4600, 'cool 1', 'sg5.jpg', ' sunglass titan'),
(21, 3, 2, 'Titan', 4800, 'cool 2', 'sg5.jpg', ' sunglass titan '),
(22, 3, 2, 'Titan', 4300, 'cool 3', 'sg6.jpg', ' sunglass titan '),
(23, 3, 2, 'Titan', 4900, 'cool 4', 'sg7.jpg', 'sunglass titan ');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'Saloni', 'Lohia', 'lohia16@gmail.com', 'salonilohia', '8389080183', ' Asansol', 'Wb'),
(2, 'Sohini', 'Das', 'das16sohini@gmail.com', 'sohinid16', '9038600912', 'Howrah', 'West Bengal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
--
--

-- --------------------------------------------------------

--
-- Table structure for table `compare_data`
--

CREATE TABLE `compare_data` (
  `id` int(50) NOT NULL,
  `product_title` varchar(55) NOT NULL,
  `product_price` int(50) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_categories` text NOT NULL,
  `product_ov` text NOT NULL
  
) ENGINE=InnoDB;
--
-- Dumping data for table `compare_data`
--

INSERT INTO `compare_data` (`id`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_categories`, `product_ov`) VALUES
(1, 'Titan', 5000, 'Titan Dous 2 sgh ', 'spec1.jpg', 'Spectacles' , 'Everyday spectacles '),
(2,'Freshlook', 2500, 'FLook 5s', 'spec2.jpeg', 'Spectacles' , 'Stylish spectacles'),
(3,'Titan', 1200, 'Natural 1', 'nat1.jpg', 'Lens ', 'Comfort everyday wear lens '),
(4,'Freshlook', 3200, 'Flook a ', 'spec4.jpg', 'Spectacles',  'Stylish spectacles'),
(5, 'Titan', 1000, 'Titan Dous 2', 'spec5.jpg', 'Spectacles', 'Everyday spectacles'),
(6,  'Rayban', 2600, '2020-look', 'sg1.jpg', 'Sunglass', 'winter style'),
(7, 'Rayban', 3000, '2020-look', 'sg2.jpg', 'Sunglass', 'summer style'),
(8, 'Titan', 4000, 'Titan Dous 2 s', 'spec6.jpg', 'Spectacles', 'Everyday spectacles'),
(9,'Freshlook', 1200, 'Brown color', 'brown.jpg', 'Lens' , 'Ocassional  lens'),
(10,  'Freshlook', 1000, 'Blue color', 'blue.jpg', 'Lens ',' Ocassional lens'),
(11, 'Freshlook', 1000, 'Green color', 'green.jpg','Lens ', 'Ocassional   lens'),
(12,  'Freshlook', 1500, 'Aqua ', 'aqua.jpg', 'Lens ', 'Ocassional   lens'),
(13,'Freshlook', 3000, 'Flook d', 'spec3.jpg', 'Spectacles', 'Stylish spectacles'),
(14,  'Titan', 1400, 'Natural 2', 'nat2.jpg', ' Lens', 'Comfort spectacles'),
(15, 'Titan', 1500, 'Natural 3', 'nat3.jpg', 'Lens', 'Comfort spectacles'),
(16,  'Rayban', 3500, 'RB Red and Black ', 'spec6.jpg', 'Spectacles', 'Easywear Spectacles'),
(17,  'Rayban', 5000, 'RB 100', 'spec8.png', 'Spectacles', 'Spring style'),
(19,  'Rayban', 3000, '2020-look', 'sg3.jpg','Sunglass', 'Celebrity look '),
(20,'Titan', 4600, 'cool 1', 'sg5.jpg', 'Sunglass','Celebrity look '),
(21,  'Titan', 4800, 'cool 2', 'sg5.jpg', 'Sunglass','Celebrity look '),
(22,  'Titan', 4300, 'cool 3', 'sg6.jpg','Sunglass', 'Celebrity look '),
(23, 'Titan', 4900, 'cool 4', 'sg7.jpg','Sunglass', 'Celebrity look ');

ALTER TABLE `compare_data`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `compare_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
