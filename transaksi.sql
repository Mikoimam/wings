-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2023 at 03:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transaksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `password`) VALUES
('smit', '_sm1t_ok');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_kode` varchar(18) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `price` decimal(6,0) NOT NULL,
  `currency` varchar(5) NOT NULL,
  `diccount` decimal(6,0) NOT NULL,
  `dimension` varchar(50) NOT NULL,
  `unit` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_kode`, `product_name`, `price`, `currency`, `diccount`, `dimension`, `unit`) VALUES
('GVB', 'Giv Biru', '11000', 'IDR', '0', '13 cm x 10 cm', '002'),
('SKLNL', 'SO Klin Liquid', '18000', 'IDR', '0', '13 cm x 10 cm', '003'),
('SKLNP', 'SO Klin Pewangi', '15000', 'IDR', '10', '13 cm x 10 cm', '001');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `document_code` varchar(3) NOT NULL,
  `document_number` varchar(10) NOT NULL,
  `product_code` varchar(18) NOT NULL,
  `price` decimal(6,0) NOT NULL,
  `quantity` int(6) NOT NULL,
  `unit` varchar(5) NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `currency` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`document_code`, `document_number`, `product_code`, `price`, `quantity`, `unit`, `subtotal`, `currency`) VALUES
('TRX', '001', 'GVB', '11000', 1, 'PCS', '11000', 'IDR'),
('TRX', '001', 'SKLNL', '18000', 2, 'PCS', '36000', 'IDR'),
('TRX', '001', 'SKLNP', '15000', 1, 'PCS', '15000', 'IDR'),
('TRX', '002', 'GVB', '11000', 3, 'PCS', '33000', 'IDR'),
('TRX', '002', 'SKLNL', '18000', 3, 'PCS', '54000', 'IDR'),
('TRX', '002', 'SKLNP', '15000', 8, 'PCS', '120000', 'IDR');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_header`
--

CREATE TABLE `transaction_header` (
  `document_code` varchar(3) NOT NULL,
  `document_number` varchar(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_header`
--

INSERT INTO `transaction_header` (`document_code`, `document_number`, `user`, `total`, `date`) VALUES
('TRX', '001', 'smit', '62000', '2023-03-18'),
('TRX', '002', 'smit', '207000', '2023-03-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_kode`);

--
-- Indexes for table `transaction_header`
--
ALTER TABLE `transaction_header`
  ADD PRIMARY KEY (`document_code`,`document_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
