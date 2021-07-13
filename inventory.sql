-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 02:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `measure_id` int(11) NOT NULL,
  `selling_price` decimal(10,0) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `req_quantity` int(11) NOT NULL,
  `final_price` decimal(10,0) NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`cart_id`, `user_id`, `customer_name`, `prod_id`, `measure_id`, `selling_price`, `sup_id`, `req_quantity`, `final_price`, `cart_status`) VALUES
(4, 2, 'Chinueze Olu', 1, 2, '1000', 6, 5, '5000', 2),
(5, 1, 'Ebuka Jiffye', 2, 2, '25000', 7, 5, '125000', 1),
(6, 1, 'Tom', 5, 2, '400', 7, 5, '2000', 1),
(7, 2, 'Tom', 3, 6, '3500', 8, 10, '35000', 2),
(8, 1, 'Ifeoma Chibuike', 7, 3, '700', 11, 5, '3500', 1),
(9, 3, 'Happy', 1, 2, '1000', 6, 4, '4000', 1),
(10, 3, 'Happy', 4, 2, '55000', 9, 2, '110000', 1),
(11, 3, 'Emma', 2, 2, '25000', 7, 3, '75000', 1),
(12, 3, 'Emma', 1, 2, '1000', 6, 2, '2000', 1),
(13, 3, 'Happy', 2, 2, '25000', 7, 2, '50000', 1),
(14, 3, 'Chuks', 3, 6, '3500', 8, 5, '17500', 1),
(15, 3, 'Ebube', 6, 2, '25000', 10, 2, '50000', 1),
(16, 3, 'Chidera', 3, 6, '3500', 8, 5, '17500', 1),
(17, 3, 'Edikan', 1, 2, '1000', 6, 5, '5000', 1),
(18, 3, 'Unyime', 6, 2, '25000', 10, 1, '25000', 1),
(19, 3, 'Essien Uyo', 2, 2, '25000', 7, 5, '125000', 1),
(20, 3, 'Susan', 4, 2, '55000', 9, 2, '110000', 1),
(21, 3, 'Michael', 3, 6, '3500', 8, 4, '14000', 1),
(22, 3, 'Andrew', 3, 6, '3500', 8, 2, '7000', 1),
(23, 3, 'Etiusung', 1, 2, '1000', 6, 2, '2000', 1),
(24, 3, 'Amos Okon', 7, 3, '700', 11, 2, '1400', 1),
(25, 3, 'Chinaza', 1, 2, '1000', 6, 2, '2000', 1),
(26, 3, 'Israel', 1, 2, '1000', 6, 5, '5000', 1),
(27, 3, 'Gladys', 1, 2, '1000', 6, 2, '2000', 1),
(28, 3, 'Samson', 4, 2, '55000', 9, 1, '55000', 1),
(29, 3, 'Emma', 2, 2, '25000', 7, 2, '50000', 1),
(30, 3, 'Abubakar', 1, 2, '1000', 6, 3, '3000', 1),
(31, 3, 'Essien Uyo', 1, 2, '1000', 6, 2, '2000', 1),
(32, 3, 'Essien Uyo', 1, 2, '1000', 6, 1, '1000', 1),
(33, 3, 'Essien Uyo', 1, 2, '1000', 6, 1, '1000', 1),
(34, 3, 'Abubakar', 1, 2, '1000', 6, 1, '1000', 1),
(35, 3, 'Bassey Etop', 1, 2, '1000', 6, 2, '2000', 1),
(36, 3, 'Abubakar', 1, 2, '1000', 6, 1, '1000', 1),
(37, 3, 'Bassey Etop', 3, 6, '3500', 8, 2, '7000', 1),
(38, 3, 'Bassey Etop', 3, 6, '3500', 8, 1, '3500', 1),
(39, 3, 'Abubakar', 1, 2, '1000', 6, 2, '2000', 1),
(40, 3, 'Bassey Etop', 2, 2, '25000', 7, 1, '25000', 1),
(41, 3, 'Emma', 5, 2, '400', 7, 4, '1600', 1),
(42, 3, 'Bassey Etop', 1, 2, '1000', 6, 2, '2000', 1),
(43, 3, 'Emma', 2, 2, '25000', 7, 1, '25000', 1),
(44, 3, 'Essien Uyo', 1, 2, '1000', 6, 2, '2000', 1),
(45, 3, 'Obi Lagos', 1, 2, '1000', 6, 2, '2000', 1),
(46, 3, 'Emma', 5, 2, '400', 7, 4, '1600', 1),
(47, 3, 'Bassey Etop', 6, 2, '25000', 10, 1, '25000', 1),
(48, 3, 'Abubakar', 1, 2, '1000', 6, 2, '2000', 1),
(49, 3, 'Andrew', 2, 2, '25000', 7, 1, '25000', 1),
(50, 3, 'Abubakar', 3, 6, '3500', 8, 5, '17500', 1),
(51, 3, 'Essien Uyo', 2, 2, '25000', 7, 1, '25000', 1),
(52, 3, 'Chukwuemeka', 7, 3, '700', 11, 2, '1400', 1),
(53, 3, 'Tombrown', 4, 2, '55000', 9, 1, '55000', 1),
(54, 1, 'Emma', 2, 2, '25000', 7, 2, '50000', 1),
(56, 1, 'Essien Uyo', 5, 2, '400', 7, 2, '800', 1);

-- --------------------------------------------------------

--
-- Table structure for table `measurement`
--

CREATE TABLE `measurement` (
  `measure_id` int(11) NOT NULL,
  `measure_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `measurement`
--

INSERT INTO `measurement` (`measure_id`, `measure_name`) VALUES
(1, 'Meter'),
(2, 'Pieces'),
(3, 'Gram'),
(4, 'Kilogram'),
(5, 'Litre'),
(6, 'Bag'),
(7, 'Pack');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `measure_id` int(11) NOT NULL,
  `original_price` decimal(10,0) NOT NULL,
  `profit` decimal(10,0) NOT NULL,
  `selling_price` decimal(10,0) NOT NULL,
  `sup_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `quantity`, `measure_id`, `original_price`, `profit`, `selling_price`, `sup_id`) VALUES
(1, 'HP Mouse', '452', 2, '700', '300', '1000', 6),
(2, 'Cisco Router', '177', 2, '20000', '5000', '25000', 7),
(3, 'Dangote Cement', '166', 6, '3000', '500', '3500', 8),
(4, 'Samsung Television', '44', 2, '50000', '5000', '55000', 9),
(5, 'Eva Soap', '35', 2, '300', '100', '400', 7),
(6, 'Techno Phone', '16', 2, '20000', '5000', '25000', 10),
(7, 'Cat Fish', '16', 3, '500', '200', '700', 11);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` int(11) NOT NULL,
  `sup_name` varchar(50) NOT NULL,
  `sup_comp` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`, `sup_comp`, `phone`, `address`) VALUES
(6, 'Idris Ahmed', 'UAC Foods', '08124309210', 'Ogbunabali, Garrison'),
(7, 'Ekong Etim', 'Asus Technologies', '08132098328', '326 Adetokunbo road Ikeja Lagos'),
(8, 'Israel Zerock', 'Zerock Construction Compsny', '09034128732', '54 Rd Road, Rumuodara, PH'),
(9, 'Aniekeme Bassey', 'TechMobile', '08023981209', '23 Nwangiba road, Uyo'),
(10, 'Nathaniel Okon', 'Nathan Technologies', '08032439843', '234 Idumota , Ikeja Lagos'),
(11, 'Paul Marcus', 'Pauzmar Ventures', '08039120934', '79 Ada George road, Agip. Port Harcourt'),
(12, 'Chima', 'Chimex Integrated Services', '09032903298', '84 Aba Road, Port harcourt'),
(13, 'Israel', 'Zerock Construction Compsny', '09034128732', '54 Rd Road, Rumuodara, PH');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `measure_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `status` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `user_id`, `customer_name`, `prod_id`, `quantity`, `measure_id`, `price`, `sup_id`, `status`) VALUES
(1, 3, 'Bassey Etop', 6, 1, 2, '25000', 10, 1),
(2, 1, 'Andrew', 2, 1, 2, '25000', 7, 1),
(4, 1, 'Abubakar', 3, 5, 6, '3500', 8, 1),
(5, 1, 'Essien Uyo', 2, 1, 2, '25000', 7, 1),
(6, 1, 'Chukwuemeka', 7, 2, 3, '700', 11, 1),
(7, 1, 'Tombrown', 4, 1, 2, '55000', 9, 1),
(8, 2, 'Emma', 2, 2, 2, '25000', 7, 1),
(9, 1, 'Essien Uyo', 5, 2, 2, '400', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`, `phone`) VALUES
(1, 'Godwin', 'Tombrown', 'godwintombrown@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '090342100921'),
(2, 'Daniel', 'Okere', 'dan@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '08124309210'),
(3, 'Joy', 'Tombrown', 'joytombrown6@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '08143298320');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `measurement`
--
ALTER TABLE `measurement`
  ADD PRIMARY KEY (`measure_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `measurement`
--
ALTER TABLE `measurement`
  MODIFY `measure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
