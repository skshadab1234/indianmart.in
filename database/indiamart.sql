-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 04:27 PM
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
-- Database: `indiamart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `email`, `photo`) VALUES
(1, 'SHADAB', 'shadab1', 'admin', 'admin@gmail.com', '1596790660_khan-shadab_1594910532.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `catgeory_name` varchar(255) NOT NULL,
  `category_img` varchar(255) NOT NULL,
  `category_status` int(1) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catgeory_name`, `category_img`, `category_status`, `added_on`) VALUES
(2, 'sasa1asasasa', '1596722875_assa_1594104908.jpg', 1, '2020-08-06 07:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `enquires`
--

CREATE TABLE `enquires` (
  `id` int(11) NOT NULL,
  `retail_id` int(20) NOT NULL,
  `wholesaler_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `requirement_msg` text NOT NULL,
  `daily_leads_per_day` int(30) NOT NULL,
  `status` int(1) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquires`
--

INSERT INTO `enquires` (`id`, `retail_id`, `wholesaler_id`, `product_id`, `requirement_msg`, `daily_leads_per_day`, `status`, `added_on`) VALUES
(2, 1, 3, 2, 'saasasfffasfsafsa', 121, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_catid` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prod_img` varchar(255) NOT NULL,
  `shipping_cost` int(11) NOT NULL,
  `product_measure` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `sub_catid`, `product_name`, `description`, `prod_img`, `shipping_cost`, `product_measure`, `status`, `added_by`, `added_on`) VALUES
(10, 2, 3, 'ALOOCHAT1', '                  	                  	                  	<p><br></p><table class=\"table table-bordered\"><tbody><tr><td>Shadab</td><td>Parveen</td><td>My Name Shadab</td></tr><tr><td>Shadab<br></td><td>Shadab<br></td><td>Shadab<br></td></tr></tbody></table><p><br></p>', '186109196_banner.jpg', 2001, '20kg1', 1, 'admin', '2020-08-07 12:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `old_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `attribute`, `price`, `old_price`, `qty`, `status`, `added_on`) VALUES
(5, 10, 'Half1', 20011, 100, 100, 1, '2020-08-07 12:02:53'),
(8, 11, 'Mychoice', 1200, 200, 20, 1, '2020-08-07 12:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `retailers`
--

CREATE TABLE `retailers` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `retailer_email` varchar(255) NOT NULL,
  `retailer_password` varchar(255) NOT NULL,
  `retailer_img` varchar(200) NOT NULL,
  `last_login` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailers`
--

INSERT INTO `retailers` (`id`, `shop_name`, `owner_name`, `retailer_email`, `retailer_password`, `retailer_img`, `last_login`, `status`, `added_on`) VALUES
(1, 'My store', 'asasasasasas', 'asasasa@gmail.com', '$2y$10$U8zLWtZ36MRxj/az516V7.5F0kdRXZ0.eIYSBg43hkdcaN5LmAlOO', '1596716700_khan-shadab_1594910437.jpg', 0, '1', '2020-08-06 04:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `subcategory_img` varchar(255) NOT NULL,
  `cat_id_of_subcat` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `subcategory_name`, `subcategory_img`, `cat_id_of_subcat`, `status`, `added_on`) VALUES
(3, 'Biryani', '1596775058_banner.jpg', 2, 1, '2020-08-07 10:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_details`
--

CREATE TABLE `subscription_details` (
  `id` int(11) NOT NULL,
  `enquires_name` varchar(255) NOT NULL,
  `no_of_enquires` varchar(255) NOT NULL,
  `plan_duration_date` varchar(255) NOT NULL,
  `plan_price_acc_date` varchar(255) NOT NULL,
  `subscription_plan_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription_details`
--

INSERT INTO `subscription_details` (`id`, `enquires_name`, `no_of_enquires`, `plan_duration_date`, `plan_price_acc_date`, `subscription_plan_id`, `status`, `added_on`) VALUES
(3, 'Enquires', '200', '30 days', '1000', 14, 0, '2020-08-07 06:29:56'),
(4, 'assa', '112', '91 days', '21212', 15, 1, '2020-08-07 06:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plan`
--

CREATE TABLE `subscription_plan` (
  `id` int(11) NOT NULL,
  `subscription_plan_name` varchar(255) NOT NULL,
  `plan_type` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription_plan`
--

INSERT INTO `subscription_plan` (`id`, `subscription_plan_name`, `plan_type`, `status`, `added_on`) VALUES
(13, 'popular', '', 1, '2020-08-07 06:27:46'),
(14, 'Silver', 'no', 1, '2020-08-07 06:29:56'),
(15, 'Diamond', 'yes', 1, '2020-08-07 06:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `wholeseller`
--

CREATE TABLE `wholeseller` (
  `id` int(11) NOT NULL,
  `seller_img` varchar(255) NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `seller_email` varchar(255) NOT NULL,
  `seller_password` varchar(255) NOT NULL,
  `seller_shop_name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wholeseller`
--

INSERT INTO `wholeseller` (`id`, `seller_img`, `seller_name`, `seller_email`, `seller_password`, `seller_shop_name`, `status`, `added_on`) VALUES
(3, '1596793348_preview.jpg', 'sasasasasa', 'asa12121@gmail.com', '$2y$10$WU2HTMKSf5auZZugOH9onOSupOJ6RwY6xl5XaUh6S2WBGKckMcFfy', 'assa', 1, '2020-08-06 06:35:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquires`
--
ALTER TABLE `enquires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailers`
--
ALTER TABLE `retailers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_details`
--
ALTER TABLE `subscription_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wholeseller`
--
ALTER TABLE `wholeseller`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enquires`
--
ALTER TABLE `enquires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `retailers`
--
ALTER TABLE `retailers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscription_details`
--
ALTER TABLE `subscription_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscription_plan`
--
ALTER TABLE `subscription_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wholeseller`
--
ALTER TABLE `wholeseller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
