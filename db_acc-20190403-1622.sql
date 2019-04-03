-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 03, 2019 at 11:21 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_acc`
--

-- --------------------------------------------------------

--
-- Table structure for table `t0001_kelompokakun`
--

CREATE TABLE `t0001_kelompokakun` (
  `ID` tinyint(3) UNSIGNED NOT NULL,
  `NamaAkun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t0002_subklasakun`
--

CREATE TABLE `t0002_subklasakun` (
  `Kode` tinyint(3) UNSIGNED NOT NULL,
  `Kelompok` tinyint(3) UNSIGNED NOT NULL,
  `Nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t0003_akun`
--

CREATE TABLE `t0003_akun` (
  `Kode` varchar(6) NOT NULL,
  `NamaAkun` varchar(40) NOT NULL,
  `SubKlasifikasi` tinyint(3) UNSIGNED NOT NULL,
  `Saldo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t0004_jurnal`
--

CREATE TABLE `t0004_jurnal` (
  `ID` varchar(10) NOT NULL,
  `Tipe` tinyint(3) UNSIGNED NOT NULL,
  `Tanggal` date NOT NULL,
  `Deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t0005_jurnaldetail`
--

CREATE TABLE `t0005_jurnaldetail` (
  `ID` int(10) NOT NULL,
  `JurnalID` varchar(10) NOT NULL,
  `Item` varchar(30) NOT NULL,
  `AkunID` varchar(6) NOT NULL,
  `DebitKredit` tinyint(1) NOT NULL,
  `Nilai` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t0006_tipejurnal`
--

CREATE TABLE `t0006_tipejurnal` (
  `ID` tinyint(3) UNSIGNED NOT NULL,
  `Nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t9900_periode`
--

CREATE TABLE `t9900_periode` (
  `id` int(11) NOT NULL,
  `Awal` date NOT NULL,
  `Akhir` date NOT NULL,
  `Aktif` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t9900_periode`
--

INSERT INTO `t9900_periode` (`id`, `Awal`, `Akhir`, `Aktif`) VALUES
(1, '2019-04-01', '2020-03-31', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `t9901_perusahaan`
--

CREATE TABLE `t9901_perusahaan` (
  `id` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `NoTelepon` varchar(25) NOT NULL,
  `NoHandphone` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t9901_perusahaan`
--

INSERT INTO `t9901_perusahaan` (`id`, `Nama`, `Alamat`, `Email`, `NoTelepon`, `NoHandphone`) VALUES
(1, 'SALINA LINTAS JAYA, CV.', 'Jl. Ikan Mungsing 8 No. 6 Surabaya', 'info@salinalintas.com', '+62313503589', '+628113422516');

-- --------------------------------------------------------

--
-- Table structure for table `t9996_employees`
--

CREATE TABLE `t9996_employees` (
  `EmployeeID` int(11) NOT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `FirstName` varchar(10) DEFAULT NULL,
  `Title` varchar(30) DEFAULT NULL,
  `TitleOfCourtesy` varchar(25) DEFAULT NULL,
  `BirthDate` datetime DEFAULT NULL,
  `HireDate` datetime DEFAULT NULL,
  `Address` varchar(60) DEFAULT NULL,
  `City` varchar(15) DEFAULT NULL,
  `Region` varchar(15) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL,
  `Country` varchar(15) DEFAULT NULL,
  `HomePhone` varchar(24) DEFAULT NULL,
  `Extension` varchar(4) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Notes` longtext,
  `ReportsTo` int(11) DEFAULT NULL,
  `Password` varchar(50) NOT NULL DEFAULT '',
  `UserLevel` int(11) DEFAULT NULL,
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Activated` enum('Y','N') NOT NULL DEFAULT 'N',
  `Profile` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t9996_employees`
--

INSERT INTO `t9996_employees` (`EmployeeID`, `LastName`, `FirstName`, `Title`, `TitleOfCourtesy`, `BirthDate`, `HireDate`, `Address`, `City`, `Region`, `PostalCode`, `Country`, `HomePhone`, `Extension`, `Email`, `Photo`, `Notes`, `ReportsTo`, `Password`, `UserLevel`, `Username`, `Activated`, `Profile`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', -1, 'admin', 'Y', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t9997_userlevels`
--

CREATE TABLE `t9997_userlevels` (
  `userlevelid` int(11) NOT NULL,
  `userlevelname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t9997_userlevels`
--

INSERT INTO `t9997_userlevels` (`userlevelid`, `userlevelname`) VALUES
(-2, 'Anonymous'),
(-1, 'Administrator'),
(0, 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `t9998_userlevelpermissions`
--

CREATE TABLE `t9998_userlevelpermissions` (
  `userlevelid` int(11) NOT NULL,
  `tablename` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t9998_userlevelpermissions`
--

INSERT INTO `t9998_userlevelpermissions` (`userlevelid`, `tablename`, `permission`) VALUES
(-2, '{0152ED89-224F-42DD-8ED6-B3D980785F93}cf01_home.php', 8),
(-2, '{0152ED89-224F-42DD-8ED6-B3D980785F93}t9996_employees', 0),
(-2, '{0152ED89-224F-42DD-8ED6-B3D980785F93}t9997_userlevels', 0),
(-2, '{0152ED89-224F-42DD-8ED6-B3D980785F93}t9998_userlevelpermissions', 0),
(-2, '{0152ED89-224F-42DD-8ED6-B3D980785F93}t9999_audittrail', 0),
(-2, '{6613487D-0C2B-4713-BB28-0834C50E675B}cf01_home.php', 0),
(-2, '{6613487D-0C2B-4713-BB28-0834C50E675B}t9996_employees', 0),
(-2, '{6613487D-0C2B-4713-BB28-0834C50E675B}t9997_userlevels', 0),
(-2, '{6613487D-0C2B-4713-BB28-0834C50E675B}t9998_userlevelpermissions', 0),
(-2, '{6613487D-0C2B-4713-BB28-0834C50E675B}t9999_audittrail', 0),
(0, '{6613487D-0C2B-4713-BB28-0834C50E675B}cf01_home.php', 0),
(0, '{6613487D-0C2B-4713-BB28-0834C50E675B}t9996_employees', 0),
(0, '{6613487D-0C2B-4713-BB28-0834C50E675B}t9997_userlevels', 0),
(0, '{6613487D-0C2B-4713-BB28-0834C50E675B}t9998_userlevelpermissions', 0),
(0, '{6613487D-0C2B-4713-BB28-0834C50E675B}t9999_audittrail', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t9999_audittrail`
--

CREATE TABLE `t9999_audittrail` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `script` varchar(80) DEFAULT NULL,
  `user` varchar(80) DEFAULT NULL,
  `action` varchar(80) DEFAULT NULL,
  `table` varchar(80) DEFAULT NULL,
  `field` varchar(80) DEFAULT NULL,
  `keyvalue` longtext,
  `oldvalue` longtext,
  `newvalue` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t9999_audittrail`
--

INSERT INTO `t9999_audittrail` (`id`, `datetime`, `script`, `user`, `action`, `table`, `field`, `keyvalue`, `oldvalue`, `newvalue`) VALUES
(1, '2019-04-01 11:34:39', '/acc/login.php', 'admin', 'login', '::1', '', '', '', ''),
(2, '2019-04-01 12:11:47', '/acc/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(3, '2019-04-01 12:12:01', '/acc/login.php', 'admin', 'login', '::1', '', '', '', ''),
(4, '2019-04-01 12:12:42', '/acc/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(5, '2019-04-01 12:14:03', '/acc/login.php', 'admin', 'login', '::1', '', '', '', ''),
(6, '2019-04-01 12:14:32', '/acc/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(7, '2019-04-01 12:15:51', '/acc/login.php', 'admin', 'login', '::1', '', '', '', ''),
(8, '2019-04-01 12:17:14', '/acc/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(9, '2019-04-01 12:17:19', '/acc/login.php', 'admin', 'login', '::1', '', '', '', ''),
(10, '2019-04-01 12:17:23', '/acc/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(11, '2019-04-01 12:20:14', '/acc/login.php', 'admin', 'login', '::1', '', '', '', ''),
(12, '2019-04-01 13:32:36', '/acc/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(13, '2019-04-01 13:33:35', '/acc/login.php', 'admin', 'login', '::1', '', '', '', ''),
(14, '2019-04-01 14:49:47', '/acc/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(15, '2019-04-01 15:06:00', '/acc/login.php', 'admin', 'login', '::1', '', '', '', ''),
(16, '2019-04-01 18:51:14', '/acc/t9900_periodeadd.php', '1', 'A', 't9900_periode', 'Awal', '1', '', '2019-04-01'),
(17, '2019-04-01 18:51:14', '/acc/t9900_periodeadd.php', '1', 'A', 't9900_periode', 'Akhir', '1', '', '2020-03-31'),
(18, '2019-04-01 18:51:14', '/acc/t9900_periodeadd.php', '1', 'A', 't9900_periode', 'Aktif', '1', '', 'Y'),
(19, '2019-04-01 18:51:14', '/acc/t9900_periodeadd.php', '1', 'A', 't9900_periode', 'id', '1', '', '1'),
(20, '2019-04-01 18:57:03', '/acc/t9901_perusahaanadd.php', '1', 'A', 't9901_perusahaan', 'Nama', '1', '', 'SALINA LINTAS JAYA, CV.'),
(21, '2019-04-01 18:57:03', '/acc/t9901_perusahaanadd.php', '1', 'A', 't9901_perusahaan', 'Alamat', '1', '', 'Jl. Ikan Mungsing 8 No. 6 Surabaya'),
(22, '2019-04-01 18:57:03', '/acc/t9901_perusahaanadd.php', '1', 'A', 't9901_perusahaan', 'Email', '1', '', 'info@salinalintas.com'),
(23, '2019-04-01 18:57:03', '/acc/t9901_perusahaanadd.php', '1', 'A', 't9901_perusahaan', 'NoTelepon', '1', '', '+62313503589'),
(24, '2019-04-01 18:57:03', '/acc/t9901_perusahaanadd.php', '1', 'A', 't9901_perusahaan', 'NoHandphone', '1', '', '+628113422516'),
(25, '2019-04-01 18:57:03', '/acc/t9901_perusahaanadd.php', '1', 'A', 't9901_perusahaan', 'id', '1', '', '1'),
(26, '2019-04-01 19:08:18', '/acc/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(27, '2019-04-03 14:27:51', '/acc/login.php', 'admin', 'login', '::1', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t0001_kelompokakun`
--
ALTER TABLE `t0001_kelompokakun`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t0002_subklasakun`
--
ALTER TABLE `t0002_subklasakun`
  ADD PRIMARY KEY (`Kode`);

--
-- Indexes for table `t0003_akun`
--
ALTER TABLE `t0003_akun`
  ADD PRIMARY KEY (`Kode`);

--
-- Indexes for table `t0004_jurnal`
--
ALTER TABLE `t0004_jurnal`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t0005_jurnaldetail`
--
ALTER TABLE `t0005_jurnaldetail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t0006_tipejurnal`
--
ALTER TABLE `t0006_tipejurnal`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t9900_periode`
--
ALTER TABLE `t9900_periode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t9901_perusahaan`
--
ALTER TABLE `t9901_perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t9996_employees`
--
ALTER TABLE `t9996_employees`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `t9997_userlevels`
--
ALTER TABLE `t9997_userlevels`
  ADD PRIMARY KEY (`userlevelid`);

--
-- Indexes for table `t9998_userlevelpermissions`
--
ALTER TABLE `t9998_userlevelpermissions`
  ADD PRIMARY KEY (`userlevelid`,`tablename`);

--
-- Indexes for table `t9999_audittrail`
--
ALTER TABLE `t9999_audittrail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t0005_jurnaldetail`
--
ALTER TABLE `t0005_jurnaldetail`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t0006_tipejurnal`
--
ALTER TABLE `t0006_tipejurnal`
  MODIFY `ID` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t9900_periode`
--
ALTER TABLE `t9900_periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t9901_perusahaan`
--
ALTER TABLE `t9901_perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t9996_employees`
--
ALTER TABLE `t9996_employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t9999_audittrail`
--
ALTER TABLE `t9999_audittrail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
