-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3316
-- Generation Time: 04 Mar 2015 pada 05.18
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo_flexcodesdk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `demo_device`
--

CREATE TABLE IF NOT EXISTS `demo_device` (
  `device_name` varchar(50) NOT NULL,
  `sn` varchar(50) NOT NULL,
  `vc` varchar(50) NOT NULL,
  `ac` varchar(50) NOT NULL,
  `vkey` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `demo_device`
--

INSERT INTO `demo_device` (`device_name`, `sn`, `vc`, `ac`, `vkey`) VALUES
('Device 1', 'C700F002328', 'E44A32B335C4283', 'NWVBAFB710662F041883ANCK', 'F70753028EDAB72D526F2BE2C549E473'),
('Device 2', 'C700F001339', '7901D3C13E34109', 'VPFAAB943C33362467D451A0', 'AD090B9CB550CD9164F5844C369C3DB0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `demo_finger`
--

CREATE TABLE IF NOT EXISTS `demo_finger` (
  `user_id` int(11) unsigned NOT NULL,
  `finger_id` int(11) unsigned NOT NULL,
  `finger_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `demo_log`
--

CREATE TABLE IF NOT EXISTS `demo_log` (
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_name` varchar(50) NOT NULL,
  `data` text NOT NULL COMMENT 'sn+pc time'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `demo_user`
--

CREATE TABLE IF NOT EXISTS `demo_user` (
`user_id` int(11) unsigned NOT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demo_device`
--
ALTER TABLE `demo_device`
 ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `demo_finger`
--
ALTER TABLE `demo_finger`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `demo_log`
--
ALTER TABLE `demo_log`
 ADD PRIMARY KEY (`log_time`);

--
-- Indexes for table `demo_user`
--
ALTER TABLE `demo_user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demo_user`
--
ALTER TABLE `demo_user`
MODIFY `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
