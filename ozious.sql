-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2015 at 06:58 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ozious`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

CREATE TABLE IF NOT EXISTS `access_level` (
  `idaccess_level` int(11) NOT NULL,
  `description` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `idlocation` int(11) NOT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `location_city` varchar(255) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `altitude` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`idlocation`, `location_name`, `location_city`, `longitude`, `latitude`, `altitude`) VALUES
(1, 'CSE', 'Katubedda', '1', '2', 3),
(2, 'ENTC', 'Katubedda', '1', '2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `idmanufacturer` int(11) NOT NULL,
  `manufacturer_name` varchar(255) DEFAULT NULL,
  `address_number` varchar(45) DEFAULT NULL,
  `address_street` varchar(45) DEFAULT NULL,
  `address_city` varchar(45) DEFAULT NULL,
  `address_country` varchar(45) DEFAULT NULL,
  `contact_number` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reading`
--

CREATE TABLE IF NOT EXISTS `reading` (
  `idreading` int(11) NOT NULL,
  `sensor_idsensor` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `value` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE IF NOT EXISTS `sensor` (
  `idsensor` int(11) NOT NULL,
  `sensor_board_id` int(11) NOT NULL,
  `manufactured_date` date DEFAULT NULL,
  `sensor_type` int(11) NOT NULL,
  `sensor_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sensor_board`
--

CREATE TABLE IF NOT EXISTS `sensor_board` (
  `idsensor_board` int(11) NOT NULL,
  `no_of_sensors` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sensor_status`
--

CREATE TABLE IF NOT EXISTS `sensor_status` (
  `idsensor_status` int(11) NOT NULL,
  `status_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sensor_type`
--

CREATE TABLE IF NOT EXISTS `sensor_type` (
  `idsensor_type` int(11) NOT NULL,
  `type_name` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `idsession` int(11) NOT NULL,
  `in_time` timestamp NULL DEFAULT NULL,
  `out_time` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `device` varchar(45) DEFAULT NULL,
  `browser` varchar(45) DEFAULT NULL,
  `user_login_iduser_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `initials` varchar(50) DEFAULT NULL,
  `nic` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `iduser_login` int(11) NOT NULL,
  `user_iduser` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `access_level_idaccess_level` int(11) NOT NULL,
  `user_type_iduser_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `iduser_type` int(11) NOT NULL,
  `description` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_level`
--
ALTER TABLE `access_level`
  ADD PRIMARY KEY (`idaccess_level`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`idlocation`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`idmanufacturer`);

--
-- Indexes for table `reading`
--
ALTER TABLE `reading`
  ADD PRIMARY KEY (`idreading`), ADD KEY `fk_reading_sensor1_idx` (`sensor_idsensor`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`idsensor`), ADD KEY `fk_sensor_sensor_board1_idx` (`sensor_board_id`), ADD KEY `fk_sensor_sensor_type1_idx` (`sensor_type`), ADD KEY `fk_sensor_sensor_status1_idx` (`sensor_status`);

--
-- Indexes for table `sensor_board`
--
ALTER TABLE `sensor_board`
  ADD PRIMARY KEY (`idsensor_board`), ADD KEY `fk_sensor_board_manufacturer1_idx` (`manufacturer_id`), ADD KEY `fk_sensor_board_location1_idx` (`location_id`);

--
-- Indexes for table `sensor_status`
--
ALTER TABLE `sensor_status`
  ADD PRIMARY KEY (`idsensor_status`);

--
-- Indexes for table `sensor_type`
--
ALTER TABLE `sensor_type`
  ADD PRIMARY KEY (`idsensor_type`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`idsession`), ADD KEY `fk_session_user_login1_idx` (`user_login_iduser_login`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`iduser_login`), ADD KEY `fk_user_login_user1_idx` (`user_iduser`), ADD KEY `fk_user_login_access_level1_idx` (`access_level_idaccess_level`), ADD KEY `fk_user_login_user_type1_idx` (`user_type_iduser_type`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`iduser_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `idlocation` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `idmanufacturer` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reading`
--
ALTER TABLE `reading`
  MODIFY `idreading` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `idsensor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sensor_board`
--
ALTER TABLE `sensor_board`
  MODIFY `idsensor_board` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sensor_status`
--
ALTER TABLE `sensor_status`
  MODIFY `idsensor_status` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sensor_type`
--
ALTER TABLE `sensor_type`
  MODIFY `idsensor_type` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `idsession` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `iduser_login` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `iduser_type` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reading`
--
ALTER TABLE `reading`
ADD CONSTRAINT `fk_reading_sensor1` FOREIGN KEY (`sensor_idsensor`) REFERENCES `ems-cs3042`.`sensor` (`idsensor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sensor`
--
ALTER TABLE `sensor`
ADD CONSTRAINT `fk_sensor_sensor_board1` FOREIGN KEY (`sensor_board_id`) REFERENCES `ems-cs3042`.`sensor_board` (`idsensor_board`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_sensor_sensor_status1` FOREIGN KEY (`sensor_status`) REFERENCES `ems-cs3042`.`sensor_status` (`idsensor_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_sensor_sensor_type1` FOREIGN KEY (`sensor_type`) REFERENCES `ems-cs3042`.`sensor_type` (`idsensor_type`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sensor_board`
--
ALTER TABLE `sensor_board`
ADD CONSTRAINT `fk_sensor_board_location1` FOREIGN KEY (`location_id`) REFERENCES `ems-cs3042`.`location` (`idlocation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_sensor_board_manufacturer1` FOREIGN KEY (`manufacturer_id`) REFERENCES `ems-cs3042`.`manufacturer` (`idmanufacturer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
ADD CONSTRAINT `fk_session_user_login1` FOREIGN KEY (`user_login_iduser_login`) REFERENCES `ems-cs3042`.`user_login` (`iduser_login`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
ADD CONSTRAINT `fk_user_login_access_level1` FOREIGN KEY (`access_level_idaccess_level`) REFERENCES `ems-cs3042`.`access_level` (`idaccess_level`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_user_login_user1` FOREIGN KEY (`user_iduser`) REFERENCES `ems-cs3042`.`user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_user_login_user_type1` FOREIGN KEY (`user_type_iduser_type`) REFERENCES `ems-cs3042`.`user_type` (`iduser_type`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
