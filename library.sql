-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-05-10 12:47:14
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- 表的结构 `bookinfo`
--

CREATE TABLE IF NOT EXISTS `bookinfo` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `bid` int(10) NOT NULL,
  `bookname` varchar(64) NOT NULL,
  `kind` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `num` int(100) NOT NULL,
  `pubtime` date NOT NULL,
  `appoint` tinyint(1) NOT NULL,
  `appointer` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `bookinfo`
--

INSERT INTO `bookinfo` (`id`, `bid`, `bookname`, `kind`, `language`, `author`, `num`, `pubtime`, `appoint`, `appointer`) VALUES
(10, 2, '西游记', '四大名著', '中文', '吴承恩', 0, '1200-11-11', 0, ''),
(14, 123, '水浒传', '四大名著', '中文', '施耐庵', 4, '1644-01-01', 1, '2'),
(15, 111222, '一千零一夜', '童话', '丹麦', 'aaa', 3, '1063-01-01', 1, '2');

-- --------------------------------------------------------

--
-- 表的结构 `borrowinfo`
--

CREATE TABLE IF NOT EXISTS `borrowinfo` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `rid` int(30) NOT NULL,
  `bid` int(30) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `borrowtime` date NOT NULL,
  `returntime` date NOT NULL,
  `deadline` date NOT NULL,
  `mloop` tinyint(1) NOT NULL,
  `delay` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `borrowinfo`
--

INSERT INTO `borrowinfo` (`id`, `rid`, `bid`, `bname`, `borrowtime`, `returntime`, `deadline`, `mloop`, `delay`) VALUES
(29, 1, 1111, '三国演义', '2015-05-03', '2015-05-06', '2015-05-05', 1, 1),
(30, 1, 1111, '三国演义', '2015-05-05', '2015-05-06', '2015-05-08', 1, 0),
(31, 1, 1111, '三国演义', '2015-05-05', '2015-05-06', '2015-05-08', 1, 0),
(32, 1, 123, '水浒传', '2015-05-01', '2015-05-06', '2015-05-05', 1, 0),
(33, 1, 2, '西游记', '2015-05-06', '0000-00-00', '2015-05-09', 0, 0),
(34, 1, 123, '水浒传', '2015-05-06', '2015-05-06', '2015-05-09', 1, 0),
(35, 2, 2, '西游记', '2015-05-06', '2015-05-06', '2015-05-09', 1, 0),
(36, 1, 2, '西游记', '2015-05-06', '0000-00-00', '2015-05-09', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `recom`
--

CREATE TABLE IF NOT EXISTS `recom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(20) NOT NULL,
  `rec` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `phone` int(20) NOT NULL,
  `major` varchar(30) NOT NULL,
  `birth` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `root` tinyint(1) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `userinfo`
--

INSERT INTO `userinfo` (`userid`, `username`, `pwd`, `phone`, `major`, `birth`, `sex`, `root`) VALUES
(1, 'admin', '123456', 111, '计算机', '1998-01-01', '女', 1),
(2, 'super', '123456', 123, '123', '2015-04-03', '女', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
