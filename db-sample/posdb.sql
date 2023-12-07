-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2021 at 03:13 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `namedisplay` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`id`, `username`, `namedisplay`, `password`) VALUES
(1, 'hohuuvinh', 'Ho Huu Vinh', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discount`
--

CREATE TABLE `tbl_discount` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_discount`
--

INSERT INTO `tbl_discount` (`id`, `name`, `number`) VALUES
(1, 'Sale', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fee`
--

CREATE TABLE `tbl_fee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_fee`
--

INSERT INTO `tbl_fee` (`id`, `name`, `number`) VALUES
(1, 'VAT', 10),
(2, 'SER', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `idproduct` int(11) DEFAULT NULL,
  `idtable` int(11) DEFAULT NULL,
  `quanlity` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `idproduct`, `idtable`, `quanlity`, `created_at`) VALUES
(309, 3, 9, 1, NULL),
(310, 4, 9, 1, NULL),
(311, 2, 9, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `content` mediumtext DEFAULT NULL,
  `idadmin` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `content`, `idadmin`, `created_at`) VALUES
(70, '\n					<thead>\n						<tr>\n							<th scope=\"col\">#</th>\n							<th scope=\"col\">Name</th>\n							<th scope=\"col\">Qty</th>\n							<th scope=\"col\">Price</th>\n						</tr>\n					</thead>\n					<tbody>\n						\n						<tr>\n							<th scope=\"row\">1</th>\n							<td>Hamburger</td>\n							<td>1</td>\n							<td>25$</td>\n							</tr><tr>\n							<th scope=\"row\">2</th>\n							<td>King Crab</td>\n							<td>1</td>\n							<td>29$</td>\n							</tr><tr>\n							<th scope=\"row\">3</th>\n							<td>Ballantine Finest</td>\n							<td>2</td>\n							<td>30$</td>\n							</tr>\n					</tbody>\n					<thead>\n						<tr>\n							<th scope=\"col\">Fee</th>\n							<th scope=\"col\">Sale</th>\n							<th scope=\"col\">Voucher</th>\n							<th scope=\"col\">Total</th>\n						</tr>\n					</thead>\n					<tbody>					\n						<tr>\n							<td id=\"fee\">30%</td>\n							<td id=\"sale\">20%</td>\n							<td id=\"voucher\">0</td>\n							<td id=\"total\">92$</td>\n						</tr>\n					</tbody>\n				', 1, '2021-03-07 08:30:12'),
(71, '\n					<thead>\n						<tr>\n							<th scope=\"col\">#</th>\n							<th scope=\"col\">Name</th>\n							<th scope=\"col\">Qty</th>\n							<th scope=\"col\">Price</th>\n						</tr>\n					</thead>\n					<tbody>\n						\n						<tr>\n							<th scope=\"row\">1</th>\n							<td>Hamburger</td>\n							<td>1</td>\n							<td>25$</td>\n							</tr><tr>\n							<th scope=\"row\">2</th>\n							<td>King Crab</td>\n							<td>1</td>\n							<td>29$</td>\n							</tr><tr>\n							<th scope=\"row\">3</th>\n							<td>Ballantine Finest</td>\n							<td>4</td>\n							<td>60$</td>\n							</tr>\n					</tbody>\n					<thead>\n						<tr>\n							<th scope=\"col\">Fee</th>\n							<th scope=\"col\">Sale</th>\n							<th scope=\"col\">Voucher</th>\n							<th scope=\"col\">Total</th>\n						</tr>\n					</thead>\n					<tbody>					\n						<tr>\n							<td id=\"fee\">30%</td>\n							<td id=\"sale\">20%</td>\n							<td id=\"voucher\">0$</td>\n							<td id=\"total\">125$</td>\n						</tr>\n					</tbody>\n				', 1, '2021-03-07 08:30:31'),
(72, '\n					<thead>\n						<tr>\n							<th scope=\"col\">#</th>\n							<th scope=\"col\">Name</th>\n							<th scope=\"col\">Qty</th>\n							<th scope=\"col\">Price</th>\n						</tr>\n					</thead>\n					<tbody>\n						\n						<tr>\n							<th scope=\"row\">1</th>\n							<td>Hamburger</td>\n							<td>1</td>\n							<td>25$</td>\n							</tr><tr>\n							<th scope=\"row\">2</th>\n							<td>King Crab</td>\n							<td>1</td>\n							<td>29$</td>\n							</tr><tr>\n							<th scope=\"row\">3</th>\n							<td>Ballantine Finest</td>\n							<td>3</td>\n							<td>45$</td>\n							</tr>\n					</tbody>\n					<thead>\n						<tr>\n							<th scope=\"col\">Fee</th>\n							<th scope=\"col\">Sale</th>\n							<th scope=\"col\">Voucher</th>\n							<th scope=\"col\">Total</th>\n						</tr>\n					</thead>\n					<tbody>					\n						<tr>\n							<td id=\"fee\">30%</td>\n							<td id=\"sale\">20%</td>\n							<td id=\"voucher\">0</td>\n							<td id=\"total\">108$</td>\n						</tr>\n					</tbody>\n				', 1, '2021-03-07 08:34:51'),
(73, '\n					<thead>\n						<tr>\n							<th scope=\"col\">#</th>\n							<th scope=\"col\">Name</th>\n							<th scope=\"col\">Qty</th>\n							<th scope=\"col\">Price</th>\n						</tr>\n					</thead>\n					<tbody>\n						\n						<tr>\n							<th scope=\"row\">1</th>\n							<td>Hamburger</td>\n							<td>1</td>\n							<td>25$</td>\n							</tr><tr>\n							<th scope=\"row\">2</th>\n							<td>King Crab</td>\n							<td>1</td>\n							<td>29$</td>\n							</tr><tr>\n							<th scope=\"row\">3</th>\n							<td>Ballantine Finest</td>\n							<td>3</td>\n							<td>45$</td>\n							</tr>\n					</tbody>\n					<thead>\n						<tr>\n							<th scope=\"col\">Fee</th>\n							<th scope=\"col\">Sale</th>\n							<th scope=\"col\">Voucher</th>\n							<th scope=\"col\">Total</th>\n						</tr>\n					</thead>\n					<tbody>					\n						<tr>\n							<td id=\"fee\">30%</td>\n							<td id=\"sale\">20%</td>\n							<td id=\"voucher\">0$</td>\n							<td id=\"total\">108$</td>\n						</tr>\n					</tbody>\n				', 1, '2021-03-07 08:35:07'),
(74, '\n					<thead>\n						<tr>\n							<th scope=\"col\">#</th>\n							<th scope=\"col\">Name</th>\n							<th scope=\"col\">Qty</th>\n							<th scope=\"col\">Price</th>\n						</tr>\n					</thead>\n					<tbody>\n						\n						<tr>\n							<th scope=\"row\">1</th>\n							<td>Hamburger</td>\n							<td>1</td>\n							<td>25$</td>\n							</tr><tr>\n							<th scope=\"row\">2</th>\n							<td>King Crab</td>\n							<td>1</td>\n							<td>29$</td>\n							</tr><tr>\n							<th scope=\"row\">3</th>\n							<td>Ballantine Finest</td>\n							<td>3</td>\n							<td>45$</td>\n							</tr>\n					</tbody>\n					<thead>\n						<tr>\n							<th scope=\"col\">Fee</th>\n							<th scope=\"col\">Sale</th>\n							<th scope=\"col\">Voucher</th>\n							<th scope=\"col\">Total</th>\n						</tr>\n					</thead>\n					<tbody>					\n						<tr>\n							<td id=\"fee\">30%</td>\n							<td id=\"sale\">20%</td>\n							<td id=\"voucher\">0</td>\n							<td id=\"total\">108$</td>\n						</tr>\n					</tbody>\n				', 1, '2021-03-07 08:37:18'),
(75, '\n					<thead>\n						<tr>\n							<th scope=\"col\">#</th>\n							<th scope=\"col\">Name</th>\n							<th scope=\"col\">Qty</th>\n							<th scope=\"col\">Price</th>\n						</tr>\n					</thead>\n					<tbody>\n						\n						<tr>\n							<th scope=\"row\">1</th>\n							<td>Hamburger</td>\n							<td>1</td>\n							<td>25$</td>\n							</tr><tr>\n							<th scope=\"row\">2</th>\n							<td>King Crab</td>\n							<td>1</td>\n							<td>29$</td>\n							</tr><tr>\n							<th scope=\"row\">3</th>\n							<td>Ballantine Finest</td>\n							<td>2</td>\n							<td>30$</td>\n							</tr>\n					</tbody>\n					<thead>\n						<tr>\n							<th scope=\"col\">Fee</th>\n							<th scope=\"col\">Sale</th>\n							<th scope=\"col\">Voucher</th>\n							<th scope=\"col\">Total</th>\n						</tr>\n					</thead>\n					<tbody>					\n						<tr>\n							<td id=\"fee\">30%</td>\n							<td id=\"sale\">20%</td>\n							<td id=\"voucher\">0</td>\n							<td id=\"total\">92$</td>\n						</tr>\n					</tbody>\n				', 1, '2021-03-07 08:38:07'),
(76, '\n					<thead>\n						<tr>\n							<th scope=\"col\">#</th>\n							<th scope=\"col\">Name</th>\n							<th scope=\"col\">Qty</th>\n							<th scope=\"col\">Price</th>\n						</tr>\n					</thead>\n					<tbody>\n						\n						<tr>\n							<th scope=\"row\">1</th>\n							<td>Hamburger</td>\n							<td>1</td>\n							<td>25$</td>\n							</tr><tr>\n							<th scope=\"row\">2</th>\n							<td>King Crab</td>\n							<td>1</td>\n							<td>29$</td>\n							</tr><tr>\n							<th scope=\"row\">3</th>\n							<td>Ballantine Finest</td>\n							<td>4</td>\n							<td>60$</td>\n							</tr>\n					</tbody>\n					<thead>\n						<tr>\n							<th scope=\"col\">Fee</th>\n							<th scope=\"col\">Sale</th>\n							<th scope=\"col\">Voucher</th>\n							<th scope=\"col\">Total</th>\n						</tr>\n					</thead>\n					<tbody>					\n						<tr>\n							<td id=\"fee\">30%</td>\n							<td id=\"sale\">20%</td>\n							<td id=\"voucher\">0</td>\n							<td id=\"total\">125$</td>\n						</tr>\n					</tbody>\n				', 1, '2021-03-07 08:38:21'),
(77, '\n					<thead>\n						<tr>\n							<th scope=\"col\">#</th>\n							<th scope=\"col\">Name</th>\n							<th scope=\"col\">Qty</th>\n							<th scope=\"col\">Price</th>\n						</tr>\n					</thead>\n					<tbody>\n						\n						<tr>\n							<th scope=\"row\">1</th>\n							<td>Hamburger</td>\n							<td>1</td>\n							<td>25$</td>\n							</tr><tr>\n							<th scope=\"row\">2</th>\n							<td>King Crab</td>\n							<td>3</td>\n							<td>87$</td>\n							</tr>\n					</tbody>\n					<thead>\n						<tr>\n							<th scope=\"col\">Fee</th>\n							<th scope=\"col\">Sale</th>\n							<th scope=\"col\">Voucher</th>\n							<th scope=\"col\">Total</th>\n						</tr>\n					</thead>\n					<tbody>					\n						<tr>\n							<td id=\"fee\">30%</td>\n							<td id=\"sale\">20%</td>\n							<td id=\"voucher\">0</td>\n							<td id=\"total\">123$</td>\n						</tr>\n					</tbody>\n				', 1, '2021-03-07 08:38:51'),
(78, '\n					<thead>\n						<tr>\n							<th scope=\"col\">#</th>\n							<th scope=\"col\">Name</th>\n							<th scope=\"col\">Qty</th>\n							<th scope=\"col\">Price</th>\n						</tr>\n					</thead>\n					<tbody>\n						\n						<tr>\n							<th scope=\"row\">1</th>\n							<td>Hamburger</td>\n							<td>1</td>\n							<td>25$</td>\n							</tr><tr>\n							<th scope=\"row\">2</th>\n							<td>King Crab</td>\n							<td>1</td>\n							<td>29$</td>\n							</tr><tr>\n							<th scope=\"row\">3</th>\n							<td>Ballantine Finest</td>\n							<td>3</td>\n							<td>45$</td>\n							</tr>\n					</tbody>\n					<thead>\n						<tr>\n							<th scope=\"col\">Fee</th>\n							<th scope=\"col\">Sale</th>\n							<th scope=\"col\">Voucher</th>\n							<th scope=\"col\">Total</th>\n						</tr>\n					</thead>\n					<tbody>					\n						<tr>\n							<td id=\"fee\">30%</td>\n							<td id=\"sale\">20%</td>\n							<td id=\"voucher\">0$</td>\n							<td id=\"total\">108$</td>\n						</tr>\n					</tbody>\n				', 1, '2021-03-07 08:51:18'),
(79, '\n					<thead>\n						<tr>\n							<th scope=\"col\">#</th>\n							<th scope=\"col\">Name</th>\n							<th scope=\"col\">Qty</th>\n							<th scope=\"col\">Price</th>\n						</tr>\n					</thead>\n					<tbody>\n						\n						<tr>\n							<th scope=\"row\">1</th>\n							<td>Hamburger</td>\n							<td>1</td>\n							<td>25$</td>\n							</tr><tr>\n							<th scope=\"row\">2</th>\n							<td>King Crab</td>\n							<td>1</td>\n							<td>29$</td>\n							</tr><tr>\n							<th scope=\"row\">3</th>\n							<td>Ballantine Finest</td>\n							<td>3</td>\n							<td>45$</td>\n							</tr>\n					</tbody>\n					<thead>\n						<tr>\n							<th scope=\"col\">Fee</th>\n							<th scope=\"col\">Sale</th>\n							<th scope=\"col\">Voucher</th>\n							<th scope=\"col\">Total</th>\n						</tr>\n					</thead>\n					<tbody>					\n						<tr>\n							<td id=\"fee\">30%</td>\n							<td id=\"sale\">20%</td>\n							<td id=\"voucher\">0</td>\n							<td id=\"total\">108$</td>\n						</tr>\n					</tbody>\n				', 1, '2021-03-08 09:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quanlity` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT 1,
  `active` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `price`, `image`, `quanlity`, `type`, `active`, `created_at`) VALUES
(1, 'King Crab', 29, '1.jpg', NULL, 1, 1, '2021-02-12 11:29:38'),
(2, 'Hot Dot', 10, '2.jpg', NULL, 1, 1, '2021-02-27 11:30:04'),
(5, 'Jack Daniel\'s No.7 Whiskey', 25, '4.jpg', NULL, 2, 1, '2021-02-27 16:36:14'),
(12, 'Ballantine Finest', 15, '021015amruou-ballantine-finest.jpg', NULL, 2, 1, '2021-03-03 09:51:16'),
(15, 'Hamburger', 25, '021320amthe-ultimate-hamburger.jpg', NULL, 1, 1, '2021-03-07 08:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_table`
--

CREATE TABLE `tbl_table` (
  `id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `customer` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_table`
--

INSERT INTO `tbl_table` (`id`, `number`, `type`, `customer`, `status`, `created_at`) VALUES
(1, 1, 1, 4, 1, '2021-02-27 17:01:29'),
(2, 2, 1, 4, 1, '2021-02-27 17:01:29'),
(3, 3, 1, 4, 1, '2021-02-19 17:01:56'),
(4, 4, 1, 4, 1, '0000-00-00 00:00:00'),
(5, 5, 1, 4, 1, '0000-00-00 00:00:00'),
(6, 6, 1, 4, 1, '0000-00-00 00:00:00'),
(7, 7, 1, 4, 1, '0000-00-00 00:00:00'),
(8, 8, 1, 4, 1, '0000-00-00 00:00:00'),
(10, 9, 1, 4, 1, '0000-00-00 00:00:00'),
(12, 12, 2, 10, 1, '0000-00-00 00:00:00'),
(13, 13, 2, 10, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theme`
--

CREATE TABLE `tbl_theme` (
  `id` int(11) NOT NULL,
  `color1` varchar(7) DEFAULT NULL,
  `color2` varchar(7) DEFAULT NULL,
  `color3` varchar(7) DEFAULT NULL,
  `color4` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_theme`
--

INSERT INTO `tbl_theme` (`id`, `color1`, `color2`, `color3`, `color4`) VALUES
(1, '#121421', '#1e202c', '#292b37', '#ffffff');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_voucher`
--

CREATE TABLE `tbl_voucher` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `number` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_voucher`
--

INSERT INTO `tbl_voucher` (`id`, `code`, `number`) VALUES
(1, 'HHVTECHNOLOGY', 10),
(6, 'HHV', 12),
(7, 'VVV', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fee`
--
ALTER TABLE `tbl_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_table`
--
ALTER TABLE `tbl_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_fee`
--
ALTER TABLE `tbl_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_table`
--
ALTER TABLE `tbl_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_voucher`
--
ALTER TABLE `tbl_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
