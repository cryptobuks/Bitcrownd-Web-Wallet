-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 03-Jul-2017 às 14:04
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bit_data`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') DEFAULT 'N',
  `tokenCode` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `PIN_Code` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userName`, `userEmail`, `userPass`, `userStatus`, `tokenCode`, `created_at`, `updated_at`, `FirstName`, `LastName`, `PIN_Code`) VALUES
(8, 'aaa1', 'miyiyawija@getapet.net', '39dc4f1ee693e5adabddd872247e451f', 'Y', 'dasdsadsadsadsa', NULL, NULL, NULL, NULL, '1122'),
(10, 'dsadsa', 'dsadsa@dsaasds.com', 'a32aca527067997d6ef393c4b3b07339', 'N', '315b14bb328a8395609129b520c67e8c', NULL, NULL, NULL, NULL, ''),
(11, 'sdasa', 'sdadsads@dsadsa.com', 'c91c03ea6c46a86cbc019be3d71d0a1a', 'N', '1f9fc2f8426dcf70f8977021f4bd1645', NULL, NULL, NULL, NULL, ''),
(5932, 'dffff', 'fffg@ggggg.hhh', '$2y$10$iAUsEaK3wHq0gf3XRzow1OMW.yHP19UROUhYm/lFjBd38xfzlJ6Wa', 'N', NULL, '2017-06-03 09:43:30', NULL, NULL, NULL, ''),
(5933, 'jsjsjjs', 'sjsjjs@snsjns.com', '$2y$10$n4y1pIm/aFGASPJc6947k.F6ArKF.taVKNGiAvRnj4QsRThpJr7jW', 'Y', NULL, '2017-06-04 05:27:55', NULL, NULL, NULL, ''),
(5934, 'aaaa', '12345@q.com', '$2y$10$VuyPkoKHPxZEaHa0KIeA0.MY.qZUnCeZtEd99xVvFNBAFer00gxlq', 'Y', NULL, '2017-06-04 05:28:57', NULL, NULL, NULL, '1234'),
(5935, 'dsads', 'daniel.alexandre11@hotmail.com', 'c30abe899a5c469ebec1d30ac6bb1bbe', 'Y', NULL, NULL, NULL, NULL, NULL, ''),
(5936, 'dsadsa', 'danidsad@das.com', 'ae97a3162c8302f195dd6f25ee1f68e7', 'N', NULL, NULL, NULL, NULL, NULL, ''),
(5937, 'dsa', 'dsaasd@dsa.com', 'debce2337baf2a6a21c441670f57c303', 'N', '29aaf51571ce994ac01a5754a6d6683d', NULL, NULL, NULL, NULL, '1321'),
(5939, 'dsa', 'aaa111@gmail.com', 'eabd8ce9404507aa8c22714d3f5eada9', 'Y', '663c3fba00b552e5da6452c8851a8004', NULL, NULL, NULL, NULL, 'aaa111'),
(5940, 'saSAs', 'asa@amail.club', '218d66e93f5e290289b072259e14716b', 'N', '479d35d3b7013cbbce07fbca1a4e5668', NULL, NULL, NULL, NULL, '111'),
(5941, 'fuxov@getapet.net', 'fuxov@getapet.net', '4f5dfce6c0817f0d03bc4ecf0a160032', 'N', '95450ae086a88831eb3855147d8eea39', NULL, NULL, NULL, NULL, 'fuxov@getapet.net'),
(5942, 'aaaa', 'aaaa@ucylu.com', '74b87337454200d4d33f80c4663dc5e5', 'N', '4e585dc9ba897b0481b22d3cd83bd46d', NULL, NULL, NULL, NULL, 'aaaa'),
(5947, 'dsadsa', 'dsadsads@gmail.com', 'bb01be07b6f06b56d486593e2bdd253d', 'N', 'a91b941e6d22e48a89dd2942690c973e', NULL, NULL, NULL, NULL, '1324'),
(5948, 'dsadsa', 'adsadsa@gmail.com', 'c30abe899a5c469ebec1d30ac6bb1bbe', 'N', 'ee7508733f97c99be007764c735b9409', NULL, NULL, NULL, NULL, '1324'),
(5951, 'dsads', 'dteixeira132@gmail.com', 'ac0c651937a1b53b90a69eeec9863125', 'N', '731257e55473d7c2ae9ad247dd744e2d', NULL, NULL, NULL, NULL, '1324');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5952;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
