-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 02:18 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sericulture`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '9999',
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ordered` int(11) DEFAULT '0',
  `cost` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `quantity`, `ordered`, `cost`) VALUES
(58, 16, 11, 2, 1, 20),
(59, 16, 9, 2, 1, 200),
(63, 16, 7, 2, 1, 40),
(64, 16, 16, 1, 1, 100),
(65, 16, 7, 3, 1, 40),
(66, 16, 14, 2, 1, 200),
(67, 16, 7, 1, 1, 40),
(68, 9999, 16, 1, 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cname` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cname`) VALUES
(1, 'Worms/Eggs'),
(2, 'Plants'),
(3, 'Stands/Raring Bed'),
(4, 'Nets/Mesh'),
(5, 'Pestisides');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `upload-date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `cat_id`, `user_id`, `pname`, `description`, `price`, `photo`, `upload-date`, `Quantity`) VALUES
(7, 1, 14, 'Egg type 1  mulbery', 'This is nice eggs', 40, 'img/egg1.jpg', '2019-12-02 09:59:54', 87),
(8, 1, 14, 'Egg type 2 Magu', 'This is also nice eggs ', 50, 'img/egg2.jpg', '2019-12-02 10:00:27', 100),
(9, 2, 14, 'Red mulberry', 'Bears red fruit', 100, 'img/plant 1.jpg', '2019-12-02 10:00:54', 6),
(10, 2, 14, 'White mulberry', 'Bears white fruit', 115, 'img/plant 2.jpg', '2019-12-02 10:01:36', 25),
(11, 4, 15, 'net type 1 ', 'flexible net', 10, 'img/net 1.jpg', '2019-12-02 10:03:07', 986),
(12, 4, 15, 'net type 2', 'hard mesh', 20, 'img/net 2.jpg', '2019-12-02 10:03:36', 2000),
(14, 3, 15, 'White bed', 'Bed for worms', 100, 'img/bed1.jpg', '2019-12-02 10:05:25', 18),
(15, 3, 15, 'Brown bed', 'For plants and eggs', 50, 'img/bed 2.jpg', '2019-12-02 10:05:54', 15),
(16, 5, 15, 'pesticide 1', 'organic and strong', 100, 'img/pesticide 1.jpg', '2019-12-02 10:06:24', 7),
(17, 5, 15, 'pesticide 2 ', 'Nice pesticide', 20, 'img/pesticide 2.jpg', '2019-12-02 10:06:52', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(18) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `gender` char(8) NOT NULL,
  `phone` int(13) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `type` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `village_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `Name`, `gender`, `phone`, `status`, `type`, `creation_date`, `village_id`) VALUES
(1, 'admin@seri.com', 'admin', 'Shivakumar', 'male', 12354, 1, 1, '2019-11-12 18:30:00', 23),
(14, 'd@g.com', 'd123', 'dist1', 'male', 2147483647, 1, 2, '2019-12-02 09:51:03', 1),
(15, 'd2@g.com', 'd123', 'Dist 2', 'male', 2147483647, 1, 2, '2019-12-02 10:02:24', 1),
(16, 'c@g.com', 'c123', 'Rahul', 'male', 1231231231, 1, 3, '2019-12-02 10:07:36', 14);

-- --------------------------------------------------------

--
-- Table structure for table `village`
--

CREATE TABLE `village` (
  `v_id` int(11) NOT NULL,
  `v_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `village`
--

INSERT INTO `village` (`v_id`, `v_name`) VALUES
(1, 'Bagalkot'),
(2, 'Bengaluru Urban'),
(3, 'Bengaluru Rural'),
(4, 'Belagavi'),
(5, 'Ballari'),
(6, 'Bidar'),
(7, 'Vijayapur'),
(8, 'Chamarajanagar'),
(9, 'Chikballapur'),
(10, 'Chikkamagaluru'),
(11, 'Chitradurga'),
(12, 'Dakshina Kannada'),
(13, 'Davanagere'),
(14, 'Dharwad'),
(15, 'Gadag'),
(16, 'Kalaburagi'),
(17, 'Hassan'),
(18, 'Haveri'),
(19, 'Kodagu'),
(20, 'Kolar'),
(21, 'Koppal'),
(22, 'Mandya'),
(23, 'Mysuru'),
(24, 'Raichur'),
(25, 'Ramanagara'),
(26, 'Shivamogga'),
(27, 'Tumakuru'),
(28, 'Udupi'),
(29, 'Uttara Kannada'),
(30, 'Yadgir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `village`
--
ALTER TABLE `village`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
