-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 �?06 �?26 �?03:22
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `laradmin`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL DEFAULT '10',
  `updated_at` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_email_unique` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'jiaheqianli@sina.com', '$2y$10$K6eOKI57KKIivwODXb2uM.YJsTbAaZbg78R3k7R3UDti19A14KmQS', 'UUjdYMkckkedyQQBS217lKVJYcuvogeKvlQ64o9PxW8jhX7TpQyP4qDo1OAi', 1528298485, 1528298485),
(2, 'Mr. Connor Upton I', 'lavern.daniel@example.net', '$2y$10$0pdVf4/4UETkDuJaP/.dne1GfchCSwqyyQjijFaPUeSwoe5jULGyK', 'GWlM9vG2wh', 10, 10),
(3, 'Prof. Camille Hills III', 'zbeahan@example.org', '$2y$10$0pdVf4/4UETkDuJaP/.dne1GfchCSwqyyQjijFaPUeSwoe5jULGyK', '2BkeWPzQ88', 10, 10);

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `catid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `childs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dirname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`catid`, `parentid`, `type`, `childs`, `catname`, `dirname`, `created_at`, `updated_at`) VALUES
(1, 0, 'cate', '8', '栏目1', 'lanmu1', 1529849767, 1529934181),
(8, 1, 'cate', NULL, '栏目1-1', 'lanmu1-1', 1529934478, 1529934478),
(11, 0, 'cate', '12', '栏目2', 'lanmu2', 1529934517, 1529934517),
(12, 11, 'page', NULL, '栏目2-1', 'lanmu2-1', 1529934531, 1529934531);

-- --------------------------------------------------------

--
-- 表的结构 `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(20) CHARACTER SET utf8 NOT NULL,
  `catid` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `content`
--

INSERT INTO `content` (`id`, `author`, `catid`, `type`, `title`, `description`, `content`, `created_at`, `updated_at`) VALUES
(2, 'admin', 1, 'cate', 'dd', 'ddd', '的点点滴滴', 1529851189, 1529851189),
(6, 'admin', 4, 'page', 'admintest-1', '三生三世', '三生三世', 1529916044, 1529916044),
(7, 'admin', 1, 'cate', 'test11111', 'test111111111', 'sssssssssss', 1529934208, 1529934208);

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2018_05_30_044051_create_site_info_table', 1),
('2018_06_02_024938_create_admin_table', 2),
('2018_06_03_071346_create_managers_table', 3),
('2018_06_15_081223_create_category_table', 4),
('2018_06_24_135034_create_content_table', 5);

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `site_info`
--

CREATE TABLE IF NOT EXISTS `site_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `site_info`
--

INSERT INTO `site_info` (`id`, `site_name`, `site_url`, `site_title`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(1, '测试站点', 'www.laradmin.com', '测试站点', '关键字1,关键字2,关键字3', '这里是描述信息', 1527658675, 1529932427);

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
