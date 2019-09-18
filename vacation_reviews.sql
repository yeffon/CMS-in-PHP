-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Sep 18, 2019 at 05:28 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vacation_reviews`
--

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userFK` int(11) NOT NULL,
  `images` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `user` (`userFK`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LName` varchar(50) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `PW` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `LName`, `FName`, `Email`, `PW`) VALUES
(1, 'Barrett', 'Steph', 'stephon@php.com', 'saa123123'),
(2, 'Larkin-Gero', 'Brian', 'barrets@alfredstate.edu', 'saa'),
(4, 'Gon', 'Ben', 'ben@gon.com', 'dca32501668843b2b295d04e8db0a3ce67a5bac7d6815ba7ea649953c0755226750ab5cc0f9042aad5f10feea1009b0c4e778a1ff0c2b6fb5ca1db62ff95f9a7'),
(6, 'Larkin-Gero', 'Brian', 'exdsxt@gmail.co', '3621f87f15dc3954728b14f441cbc32de57bb4f23aceeab4163ebf3a069933148909837b6e3edc4fbfde9a9a3ad32e139a664f8e5ed9160f5f49753490672fda'),
(7, 'Tables', 'Bob', 'bob@tables.com', 'bd21f705a4f32e747b86322971ff259c7295f3337fc8d62e0fceb94d35fa10ce4792e514fb4c6fae3b28b20cbbb74538746fc104f2ab0ef17ea8d1870484b926'),
(8, 'Peace', 'War', 'war@peace.com', '$2y$10$f5gxw1ZyhOxE1W15s/PTh.RoP8t.jmJychhcapREDQvtYS4VyutEO'),
(9, 'Williams', 'Billy', 'billy@williams.com', '$2y$10$I8/1K5iLdAq2KRvrjF67VuT8oH0SZrmgb2IhSprCAzKtWEdJgV.C.'),
(10, 'DeGraff', 'Allison', 'ally@degraff.com', '$2y$10$317eH1ymr1kIIl/NNOibR.UsBqnAiHaQ.uc3F.54Z.hAdu7DnooPa'),
(11, 'Homemaker', 'Susie', 'sdancer464@gmail.com', '$2y$10$P6gAROqHvSx/cCH.V16fwOwDAT2p7kSqbrB7uAEsvFxReVb.3Z75m'),
(14, 'enke', 'evan', 'evan@evan.com', '$2y$10$GABTy5cFeCf5QaApOR9U0ef4amgPsc0fw/wtzFBoDsxZ/nETHAEs6'),
(15, 'Moshier', 'Allison', 'moshieal@alfredstate.edu', '$2y$10$iEkt6zoZafShNspTdPIovePVprLMWS7JwIqDQAF1NdJQhLxIRgdAe'),
(16, 'Mamba', 'Go', 'mamba@go.com', '$2y$10$D9gg144MIWJYtTMuq9IcfOjg8GpU2qd2bfc3KMe.9elv04p7qMZBC'),
(17, 'enke', 'evan', 'evan@evan.com', '$2y$10$kfo7s39IRsyFN3TTUqrEZuMzgiDCWUvQT2tl8iwDVfXixuro9LdnC');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`userFK`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
