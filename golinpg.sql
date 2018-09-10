-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2018 at 11:18 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `golinpg`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(5) NOT NULL,
  `client_slika` text COLLATE utf8_unicode_ci NOT NULL,
  `client_naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_slika`, `client_naslov`) VALUES
(1, 'client1.png', 'MCDONALD\'S:THESTRAW'),
(2, 'client2.png', 'MCDONALD\'S:FRORK'),
(3, 'client3.png', 'GUINNESS:MADE OF MORE'),
(4, 'client4.png', 'MAGNUM:MAGNUM X MOSCHINO 1234'),
(5, 'client5.png', 'GULDEN\'S:#DEFENDTHEDOG'),
(6, 'client6.png', 'TOBLERONE:THE TOBLERONE TAKE'),
(7, 'client2.png', 'Klijent1'),
(8, 'client5.png', 'Klijent 2'),
(9, 'client3.png', 'klijent3');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `off_id` int(5) NOT NULL,
  `off_ub` text COLLATE utf8_unicode_ci NOT NULL,
  `off_cnb` text COLLATE utf8_unicode_ci NOT NULL,
  `off_naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `off_oblast` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`off_id`, `off_ub`, `off_cnb`, `off_naslov`, `off_oblast`) VALUES
(1, 'podgorica.png', 'podgorica.png', 'Podgorica', 'EMEA'),
(2, 'belgrade.png', 'belgrade.png', 'Belgrade', 'EMEA'),
(3, 'brussels.png', 'brussels.png', 'Brussels', 'EMEA'),
(4, 'bucharest.png', 'bucharest.png', 'Bucharest', 'EMEA'),
(5, 'dubai.png', 'dubai.png', 'Dubai', 'EMEA'),
(6, 'hamburg.png', 'hamburg.png', 'Hamburg', 'EMEA'),
(8, 'istanbul.png', 'istanbul.png', 'Istanbul', 'EMEA'),
(9, 'london.png', 'london.png', 'London', 'EMEA'),
(10, 'madrid.png', 'madrid.png', 'Madrid', 'EMEA'),
(11, 'milano.png', 'milano.png', 'Milano', 'EMEA'),
(12, 'paris.png', 'paris.png', 'Paris', 'EMEA'),
(13, 'riga.png', 'riga.png', 'Riga', 'EMEA'),
(14, 'stockholm.png', 'stockholm.png', 'Stockholm', 'EMEA'),
(15, 'moscow.png', 'moscow.png', 'Moscow', 'ASIA'),
(18, 'bg2.png', 'bg2.png', 'Kancelarija1', 'AMERICAS');

-- --------------------------------------------------------

--
-- Table structure for table `sastanci`
--

CREATE TABLE `sastanci` (
  `ime_klijenta` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `firma` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefon` int(10) NOT NULL,
  `datum` date NOT NULL,
  `vrijeme` time NOT NULL,
  `sastanak_id` int(4) NOT NULL,
  `status_sastanka` varchar(111) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sastanci`
--

INSERT INTO `sastanci` (`ime_klijenta`, `firma`, `email`, `telefon`, `datum`, `vrijeme`, `sastanak_id`, `status_sastanka`) VALUES
('Teodora Bulatovic', 'Nezaposlena', 'teodorateabulatovic@gmail.com', 69579868, '2018-08-23', '11:00:00', 2, 'Odbijen'),
('Ivana BulatoviÄ‡', 'Nin', 'iva@na.com', 67676767, '2018-08-28', '08:00:00', 5, 'Odbijen'),
('asdasd', 'sadasd', 'sdasd@as.asd', 21332, '2018-08-31', '12:39:00', 6, 'Zakazan'),
('Milan MarkoviÄ‡', 'Nil', 'mi@lan.com', 234234234, '2018-08-28', '07:45:00', 7, 'Zakazan'),
('Jovan JovanoviÄ‡', 'Alin', 'jov@an.com', 1331123123, '2018-09-03', '12:00:00', 8, 'Zakazan'),
('Mirko ÄukiÄ‡', 'MArIn', 'mirko@dj.com', 12344321, '2018-09-12', '13:25:00', 9, 'Zakazan'),
('Svetozar KostiÄ‡', 'Klik', 'svet@zar.com', 445522, '2018-08-30', '15:30:00', 10, 'Zakazan');

-- --------------------------------------------------------

--
-- Table structure for table `tekstovi`
--

CREATE TABLE `tekstovi` (
  `text_id` int(5) NOT NULL,
  `text_naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_sadrzaj` text COLLATE utf8_unicode_ci NOT NULL,
  `text_slika` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tekstovi`
--

INSERT INTO `tekstovi` (`text_id`, `text_naslov`, `text_sadrzaj`, `text_slika`) VALUES
(1, 'AMPLITUDO AFFILIATE OF GOLIN', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Novi Text', ''),
(2, 'PR AND COMMUNICATION', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,\r\n        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\n        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n       Excepteur sint occaecat cupidatat non proident, sunt ip>n culpa qui officia deserunt mollit anim id est laborum.\r\n      Lorem ipsum dolor sit amet, consectetur adipiscing elit,\r\n           sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\n          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris\r\n           nisi ut aliquip ex ea commodo consequat\r\n\r\nProba novog teksta555', 'fotka2.png'),
(3, 'EVENT MANAGEMENT', '   Lorem ipsum dolor sit amet, consectetur adipiscing elit,\r\n            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\n            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n           Excepteur sint occaecat cupidatat non proident, sunt ip>n culpa qui officia deserunt mollit anim id est laborum.\r\n        </p>\r\n        <p>\r\n            Lorem ipsum dolor sit amet, consectetur adipiscing elit,\r\n            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. \r\n           Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris\r\n            nisi ut aliquip ex ea commodo consequat.\r\n        </p>\r\n        <p>\r\n            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n            Excepteur sint occaecat cupidatat non proident, sunt ip>n culpa qui officia deserunt mollit anim id est laborum.\r\n       ', 'fotka3.png'),
(4, 'EXPLORERS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.123456789', 'krug1.png'),
(5, 'CREATORS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'krug2.png'),
(6, 'CONNECTORS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'krug3.png'),
(7, 'CATALYSTS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'krug4.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(111) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(111) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_firstname` varchar(111) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_lastname` varchar(111) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`) VALUES
(1, 'Tea', 'tea123', 'Teodora', 'BulatoviÄ‡'),
(3, 'Ivana', 'iva123', 'Ivana', 'Bulatović');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`off_id`);

--
-- Indexes for table `sastanci`
--
ALTER TABLE `sastanci`
  ADD PRIMARY KEY (`sastanak_id`);

--
-- Indexes for table `tekstovi`
--
ALTER TABLE `tekstovi`
  ADD PRIMARY KEY (`text_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `off_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sastanci`
--
ALTER TABLE `sastanci`
  MODIFY `sastanak_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tekstovi`
--
ALTER TABLE `tekstovi`
  MODIFY `text_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
