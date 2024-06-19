-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 05:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `status` enum('valid','invalid','belum dikonfirmasi','') DEFAULT 'belum dikonfirmasi',
  `thumnail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `title`, `content`, `user_id`, `status`, `thumnail`) VALUES
(2, 'Info Pvp', 'Seseorang melakukan pvp dan target dia adalah mencapai bounty 30m', '2', 'valid', 'blox.jpeg'),
(3, 'info Cpvp', 'Seseorang telah terbungkam dikarenakan dia telah terbatai dengan skor 7 : 1 dan padahal sebelum pertandingan dia berkata \"saya akan membantainya denagn skor 10 : 0\" akan tetapi malah di yang terbantai dan sekarang dia tidak berani mentaunting orang lagi', '3', 'valid', 'cpvp.jpg'),
(4, 'info levi cuy', 'levi akan di mulai dalam 15 segera berkumpul di tiki outpus dari sekarang jika tidak kamu akan di tinggal kan untuk melakukan hunting leviatan', '3', 'valid', 'levi.jpeg'),
(6, 'Fakta Nether', 'Tahukah kamu jika kalian membuat 2 portal nether dengan jarak 160 block maka portal tersebut akan terhubung dan jika portal nether berdekatan maka kita akan berada di portal yang sama', '2', 'valid', 'portal.jpg'),
(7, 'Info Xbox 360', 'Xbox 360 yang pada saat pengembangan dikenal dengan nama Xenon atau Xbox 2, adalah penerus konsol permainan video Xbox milik Microsoft. Microsoft secara resmi memperkenalkannya di MTV pada 12 Mei 2005', '3', 'valid', 'xbox.jpeg'),
(9, 'U.F.O di game red dead redemption 2', 'Di sekitar area â€œHeartland Overflow, New Hanoverâ€ kamu bisa menemukan kubuk di samping danau yang di dalamnya bersisi mayat-mayat yang sudah menjadi tulang. Untuk melihat UFO kamu harus membaca sebuah Note yang ada di dalam kubuk itu, kembali ke tempat ini pada pukul 02.00 pagi, lalu masuk ke dalamnya dan kamu dapat melihatnya.', '3', 'valid', 'ufo.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `isi` tinytext DEFAULT NULL,
  `info_id` int(11) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `isi`, `info_id`, `user_id`) VALUES
(1, 'ok', 4, '2'),
(2, 'WOW!!!! Info itu sangat bermanfaat', 6, '3'),
(3, 'Tayangi ma di tiki outpost kita gas leviatan buah portal ku pake', 4, '2'),
(20, 'Real ki tawwa', 9, '2'),
(21, 'Infokan spek nya bang ðŸ˜˜', 7, '2'),
(22, 'haaah ada ufo ðŸ˜±', 9, '2'),
(30, 'cocoki tawwa na ', 9, '2'),
(46, 'wayau', 9, '2'),
(47, 'wayauðŸ˜±ðŸ˜±', 9, '3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(11) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `role` enum('admin','users') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `role`) VALUES
('1', 'ahmadanugrahsatya@gmail.com', 'bakso', 'makanbakso', 'admin'),
('2', 'ahmadanugrahsatya@gmail.com', 'coto', 'makancoto', 'users'),
('3', 'dauddaud@gmail.com', 'Akiro', 'muhdaud12', 'users'),
('4', 'ahmadanugrahsatya@gmail.com', 'Angga0235f', 'satesatesate', 'users');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_1` (`user_id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`),
  ADD KEY `fk_info` (`info_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_info` FOREIGN KEY (`info_id`) REFERENCES `info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
