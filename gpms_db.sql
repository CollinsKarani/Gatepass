-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2015 at 09:55 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `oneapple_gpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `gpms_admin`
--

CREATE TABLE IF NOT EXISTS `gpms_admin` (
  `variable` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gpms_admin`
--

INSERT INTO `gpms_admin` (`variable`, `data`) VALUES
('reg_key', '12-580-323');

-- --------------------------------------------------------

--
-- Table structure for table `gpms_cat`
--

CREATE TABLE IF NOT EXISTS `gpms_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gpms_cat`
--


-- --------------------------------------------------------

--
-- Table structure for table `gpms_company`
--

CREATE TABLE IF NOT EXISTS `gpms_company` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `reg_no` varchar(100) DEFAULT NULL,
  `address` text,
  `city` varchar(100) DEFAULT NULL,
  `zipcode` varchar(100) DEFAULT NULL,
  `ntn` varchar(100) DEFAULT NULL,
  `ph_no` varchar(100) DEFAULT NULL,
  `fax_no` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `add_info` text,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gpms_company`
--

INSERT INTO `gpms_company` (`member_id`, `user_id`, `company`, `reg_no`, `address`, `city`, `zipcode`, `ntn`, `ph_no`, `fax_no`, `website`, `state`, `country`, `add_info`) VALUES
(1, 'oneApple_1', 'GPMS', NULL, 'Korangi Landhi..', 'Karachi', NULL, NULL, NULL, NULL, NULL, 'Sindh', 'Pakistan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gpms_depart`
--

CREATE TABLE IF NOT EXISTS `gpms_depart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gpms_depart`
--

INSERT INTO `gpms_depart` (`id`, `name`, `user_id`) VALUES
(1, 'admin', 'oneApple_1');

-- --------------------------------------------------------

--
-- Table structure for table `gpms_gp_no`
--

CREATE TABLE IF NOT EXISTS `gpms_gp_no` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gp_no` varchar(56) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gpms_gp_no`
--


-- --------------------------------------------------------

--
-- Table structure for table `gpms_in_non_main`
--

CREATE TABLE IF NOT EXISTS `gpms_in_non_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ms` varchar(100) NOT NULL,
  `vehicle` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `depart` varchar(100) NOT NULL,
  `gpno` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `approved` varchar(100) NOT NULL,
  `log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(128) NOT NULL,
  `address` text,
  `po_no` varchar(255) DEFAULT NULL,
  `return_date` varchar(256) DEFAULT NULL,
  `check` int(1) NOT NULL,
  `user_name` varchar(128) DEFAULT NULL,
  `file` varchar(128) DEFAULT NULL,
  `file_1` varchar(128) DEFAULT NULL,
  `file_2` varchar(128) DEFAULT NULL,
  `file_3` varchar(128) DEFAULT NULL,
  `file_4` varchar(128) DEFAULT NULL,
  `file_5` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gpno` (`gpno`),
  UNIQUE KEY `gpno_2` (`gpno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gpms_in_non_main`
--


-- --------------------------------------------------------

--
-- Table structure for table `gpms_in_non_sub`
--

CREATE TABLE IF NOT EXISTS `gpms_in_non_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gpno` varchar(100) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `ret_date` varchar(16) DEFAULT NULL COMMENT 'Not InUse',
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gpms_in_non_sub`
--


-- --------------------------------------------------------

--
-- Table structure for table `gpms_in_ret_main`
--

CREATE TABLE IF NOT EXISTS `gpms_in_ret_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ms` varchar(100) NOT NULL,
  `vehicle` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `depart` varchar(100) NOT NULL,
  `gpno` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `approved` varchar(100) NOT NULL,
  `return_date` date NOT NULL,
  `log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(128) NOT NULL,
  `address` text,
  `po_no` varchar(255) DEFAULT NULL,
  `check` int(1) NOT NULL,
  `user_name` varchar(128) DEFAULT NULL,
  `file` varchar(128) DEFAULT NULL,
  `file_1` varchar(128) DEFAULT NULL,
  `file_2` varchar(128) DEFAULT NULL,
  `file_3` varchar(128) DEFAULT NULL,
  `file_4` varchar(128) DEFAULT NULL,
  `file_5` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gpno` (`gpno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gpms_in_ret_main`
--


-- --------------------------------------------------------

--
-- Table structure for table `gpms_in_ret_sub`
--

CREATE TABLE IF NOT EXISTS `gpms_in_ret_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gpno` varchar(100) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `ret_date` varchar(255) DEFAULT 'No',
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gpms_in_ret_sub`
--


-- --------------------------------------------------------

--
-- Table structure for table `gpms_location`
--

CREATE TABLE IF NOT EXISTS `gpms_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `gpms_location`
--

INSERT INTO `gpms_location` (`id`, `name`, `prefix`) VALUES
(10, 'Karachi', 'KHI'),
(11, 'Islamabad', 'ISB');

-- --------------------------------------------------------

--
-- Table structure for table `gpms_members`
--

CREATE TABLE IF NOT EXISTS `gpms_members` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `login` varchar(100) NOT NULL DEFAULT '',
  `passwd` varchar(32) NOT NULL DEFAULT '',
  `type` varchar(36) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `key` varchar(128) DEFAULT NULL,
  `status` varchar(128) NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `gpms_members`
--

INSERT INTO `gpms_members` (`member_id`, `firstname`, `lastname`, `login`, `passwd`, `type`, `location`, `key`, `status`) VALUES
(21, 'Ayaz', 'Haider', 'admin', 'admin', '1', 'admin', 'oneApple_1', 'varified');

-- --------------------------------------------------------

--
-- Table structure for table `gpms_ow_gp_ret`
--

CREATE TABLE IF NOT EXISTS `gpms_ow_gp_ret` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ms` varchar(100) NOT NULL,
  `vehicle` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `depart` varchar(100) NOT NULL,
  `gpno` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `approved` varchar(100) NOT NULL,
  `return_date` date NOT NULL,
  `sno1` varchar(255) DEFAULT NULL,
  `item1` varchar(255) DEFAULT NULL,
  `unit1` varchar(255) DEFAULT NULL,
  `qty1` varchar(255) DEFAULT NULL,
  `price1` varchar(255) DEFAULT NULL,
  `remarks1` varchar(255) DEFAULT NULL,
  `sno2` varchar(255) DEFAULT NULL,
  `item2` varchar(255) DEFAULT NULL,
  `unit2` varchar(255) DEFAULT NULL,
  `qty2` varchar(255) DEFAULT NULL,
  `price2` varchar(255) DEFAULT NULL,
  `remarks2` varchar(255) DEFAULT NULL,
  `sno3` varchar(255) DEFAULT NULL,
  `item3` varchar(255) DEFAULT NULL,
  `unit3` varchar(255) DEFAULT NULL,
  `qty3` varchar(255) DEFAULT NULL,
  `price3` varchar(255) DEFAULT NULL,
  `remarks3` varchar(255) DEFAULT NULL,
  `sno4` varchar(255) DEFAULT NULL,
  `item4` varchar(255) DEFAULT NULL,
  `unit4` varchar(255) DEFAULT NULL,
  `qty4` varchar(255) DEFAULT NULL,
  `price4` varchar(255) DEFAULT NULL,
  `remarks4` varchar(255) DEFAULT NULL,
  `sno5` varchar(255) DEFAULT NULL,
  `item5` varchar(255) DEFAULT NULL,
  `unit5` varchar(255) DEFAULT NULL,
  `qty5` varchar(255) DEFAULT NULL,
  `price5` varchar(255) DEFAULT NULL,
  `remarks5` varchar(255) DEFAULT NULL,
  `sno6` varchar(255) DEFAULT NULL,
  `item6` varchar(255) DEFAULT NULL,
  `unit6` varchar(255) DEFAULT NULL,
  `qty6` varchar(255) DEFAULT NULL,
  `price6` varchar(255) DEFAULT NULL,
  `remarks6` varchar(255) DEFAULT NULL,
  `sno7` varchar(255) DEFAULT NULL,
  `item7` varchar(255) DEFAULT NULL,
  `unit7` varchar(255) DEFAULT NULL,
  `qty7` varchar(255) DEFAULT NULL,
  `price7` varchar(255) DEFAULT NULL,
  `remarks7` varchar(255) DEFAULT NULL,
  `sno8` varchar(255) DEFAULT NULL,
  `item8` varchar(255) DEFAULT NULL,
  `unit8` varchar(255) DEFAULT NULL,
  `qty8` varchar(255) DEFAULT NULL,
  `price8` varchar(255) DEFAULT NULL,
  `remarks8` varchar(255) DEFAULT NULL,
  `sno9` varchar(255) DEFAULT NULL,
  `item9` varchar(255) DEFAULT NULL,
  `unit9` varchar(255) DEFAULT NULL,
  `qty9` varchar(255) DEFAULT NULL,
  `price9` varchar(255) DEFAULT NULL,
  `remarks9` varchar(255) DEFAULT NULL,
  `sno0` varchar(255) DEFAULT NULL,
  `item0` varchar(255) DEFAULT NULL,
  `unit0` varchar(255) DEFAULT NULL,
  `qty0` varchar(255) DEFAULT NULL,
  `price0` varchar(255) DEFAULT NULL,
  `remarks0` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gpno` (`gpno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gpms_ow_gp_ret`
--


-- --------------------------------------------------------

--
-- Table structure for table `gpms_ow_non_main`
--

CREATE TABLE IF NOT EXISTS `gpms_ow_non_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ms` varchar(100) NOT NULL,
  `vehicle` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `depart` varchar(100) NOT NULL,
  `gpno` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `approved` varchar(100) NOT NULL,
  `log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(128) NOT NULL,
  `address` text,
  `po_no` varchar(255) DEFAULT NULL,
  `return_date` varchar(256) DEFAULT NULL,
  `check` int(1) NOT NULL,
  `user_name` varchar(128) DEFAULT NULL,
  `file` varchar(128) DEFAULT NULL,
  `file_1` varchar(128) DEFAULT NULL,
  `file_2` varchar(128) DEFAULT NULL,
  `file_3` varchar(128) DEFAULT NULL,
  `file_4` varchar(128) DEFAULT NULL,
  `file_5` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gpno` (`gpno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gpms_ow_non_main`
--


-- --------------------------------------------------------

--
-- Table structure for table `gpms_ow_non_sub`
--

CREATE TABLE IF NOT EXISTS `gpms_ow_non_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gpno` varchar(100) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `ret_date` varchar(16) DEFAULT NULL COMMENT 'Not InUse',
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gpms_ow_non_sub`
--


-- --------------------------------------------------------

--
-- Table structure for table `gpms_ow_ret_main`
--

CREATE TABLE IF NOT EXISTS `gpms_ow_ret_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ms` varchar(100) NOT NULL,
  `vehicle` varchar(100) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time DEFAULT NULL,
  `depart` varchar(100) NOT NULL,
  `gpno` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `approved` varchar(100) NOT NULL,
  `return_date` date NOT NULL,
  `log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(128) NOT NULL,
  `address` text,
  `po_no` varchar(255) DEFAULT NULL,
  `check` int(1) NOT NULL,
  `user_name` varchar(128) DEFAULT NULL,
  `file` varchar(128) DEFAULT NULL,
  `file_1` varchar(128) DEFAULT NULL,
  `file_2` varchar(128) DEFAULT NULL,
  `file_3` varchar(128) DEFAULT NULL,
  `file_4` varchar(128) DEFAULT NULL,
  `file_5` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gpno` (`gpno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gpms_ow_ret_main`
--


-- --------------------------------------------------------

--
-- Table structure for table `gpms_ow_ret_sub`
--

CREATE TABLE IF NOT EXISTS `gpms_ow_ret_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gpno` varchar(100) NOT NULL,
  `item` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `ret_date` varchar(255) DEFAULT 'No',
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gpms_ow_ret_sub`
--


-- --------------------------------------------------------

--
-- Table structure for table `gpms_product`
--

CREATE TABLE IF NOT EXISTS `gpms_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `cat` varchar(128) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gpms_product`
--


-- --------------------------------------------------------

--
-- Table structure for table `gpms_reg`
--

CREATE TABLE IF NOT EXISTS `gpms_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gpms_reg`
--

INSERT INTO `gpms_reg` (`id`, `key`, `value`, `user_id`) VALUES
(1, 'clock', '18000', '0'),
(2, 'clock', '-3600', '1442349747_HCdMv573212'),
(4, 'clock', '0', 'oneApple_1');

-- --------------------------------------------------------

--
-- Table structure for table `gpms_unit`
--

CREATE TABLE IF NOT EXISTS `gpms_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gpms_unit`
--

INSERT INTO `gpms_unit` (`id`, `name`, `user_id`) VALUES
(1, 'KG', 'oneApple_1');

-- --------------------------------------------------------

--
-- Table structure for table `gpms_user_company`
--

CREATE TABLE IF NOT EXISTS `gpms_user_company` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `reg_no` varchar(100) DEFAULT NULL,
  `address` text,
  `city` varchar(100) DEFAULT NULL,
  `zipcode` varchar(100) DEFAULT NULL,
  `ntn` varchar(100) DEFAULT NULL,
  `ph_no` varchar(100) DEFAULT NULL,
  `fax_no` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `add_info` text,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gpms_user_company`
--

INSERT INTO `gpms_user_company` (`member_id`, `user_id`, `company`, `reg_no`, `address`, `city`, `zipcode`, `ntn`, `ph_no`, `fax_no`, `website`, `state`, `country`, `add_info`) VALUES
(2, '1407139299_BnJYP624436', 'LiveBMS', '', '', '', '', '', '0343-3091454', '', 'livebms.com', 'Sindh', 'Pakistan', ''),
(3, '1407139442_QIkuK327887', 'LiveBMS', '', '', '', '', '', '0343-3091454', '', 'livebms.com', 'Sindh', 'Pakistan', ''),
(4, 'oneApple_1', 'khan co', '', 'ggg', 'ggg', 'gg', '', '0999999', '', 'ggg', 'ggg', 'ggg', '');

-- --------------------------------------------------------

--
-- Table structure for table `gpms_v`
--

CREATE TABLE IF NOT EXISTS `gpms_v` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_id` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `gpms_v`
--

