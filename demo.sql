-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: 2016-03-30 05:34:03
=======
-- Generation Time: 2016-03-30 05:04:08
>>>>>>> 479432c57f96de1531cb61970bc72f9a8570cbb8
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论编号',
  `content` text NOT NULL COMMENT '评论内容',
  `time` int(11) DEFAULT NULL COMMENT '发表时间',
  `p_id` int(11) NOT NULL COMMENT '文章编号',
  `status` int(11) NOT NULL COMMENT '评论状态',
  `author` varchar(128) NOT NULL COMMENT '评论作者',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=34 ;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`id`, `content`, `time`, `p_id`, `status`, `author`) VALUES
(12, 'asddas', 1459138588, 22, 1, 'dasdas'),
(13, 'asdsdda', 1459156004, 22, 1, 'dsfwefwe'),
(17, 'ccccc', 1459231710, 22, 1, 'asdd'),
(18, 'ccccc', 1459231997, 22, 1, 'asdd'),
(19, 'xxxxxxxxxxxxxxxxxxx', 1459232011, 22, 1, 'sssssssssssss'),
(20, 'vvvvv', 1459232063, 21, 1, 'dfff'),
(21, 'sda', 1459232153, 20, 1, 'sdas'),
(22, 'csddd', 1459232160, 21, 1, 'csddsc'),
(23, 'sdcc', 1459232166, 22, 1, 'dcsc'),
(24, 'ccccc', 1459232191, 22, 1, 'sad'),
(25, 'cccc', 1459232225, 21, 1, 'ssdd'),
(26, 'cccc', 1459232232, 22, 1, 'sdfff'),
(27, '5678', 1459232241, 22, 1, '1234'),
(28, 'ccccc', 1459232249, 18, 1, 'sdadwd'),
(29, 'vvvvv', 1459232307, 21, 1, 'fgsdfs'),
(30, 'csdsc', 1459232347, 20, 1, 'sdfsdc'),
(31, 'ddqw', 1459232470, 20, 1, 'wdqd'),
(32, 'vvvffsd', 1459232746, 22, 1, 'asddas'),
(33, '11111111111111111', 1459232773, 20, 1, '111111111');

-- --------------------------------------------------------

--
-- 表的结构 `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(128) NOT NULL COMMENT '文章标题',
  `content` text NOT NULL COMMENT '文章内容',
  `tags` text COMMENT '文章标签',
  `create_time` int(11) DEFAULT NULL COMMENT '文章创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '文章更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文章' AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `tags`, `create_time`, `update_time`) VALUES
(12, 'asdad', 'sdaddaddvvvvvss', 'ffxx', 1458456981, 1458458326),
(13, 'sadd', 'ccdscs', 'cc', 1458458293, 1458458293),
(14, 'nananan', 'sdaff', 'vvvvv', 1458460251, 1458460251),
(15, 'nnwnwnn', ' v dfvd  ewf', 'scscwe', 1458460262, 1458460262),
(16, 'weww', 'dcssvsv', 'tttttttttttttttt', 1458460273, 1458460273),
(17, 'ttghhhtht', 'treeeedfvdvdfvd', 'vvvvvv', 1458460288, 1458460288),
(18, 'nnnn', 'ggggfffffffffffffffffffffff', 'ffr gtt', 1458460309, 1458460309),
(19, 'cccc', 'fffff', 'adx', 1458461022, 1458461022),
(20, 'xsasda', 'ccccc', 'xx dd qq', 1458464254, 1458464254),
(21, 'cccc', 'dwqd', 'cc,dd,ff aa', 1458464285, 1458464285),
(22, 'asad', '<p><strong>cccc</strong></p><p><strong>cccc</strong></p><p><strong><em>xxxxx</em></strong></p><pre class="brush:php;toolbar:false">&lt;?php\r\necho&nbsp;1111;\r\n?&gt;</pre><p><strong></strong><br/></p>', 'php', 1458729177, 1458729177);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) NOT NULL COMMENT '自动登录key',
  `password_hash` varchar(255) NOT NULL COMMENT '加密密码',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '重置密码token',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `role` smallint(6) NOT NULL DEFAULT '10' COMMENT '角色等级',
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT '状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(6, 'administrator', 'KouGJCG7anwqinsFZMnSv05hFi3TBuW6', '$2y$13$iT035rjb9IHTTfNECfZFa.q0nW2oymnH5umuFu2CBNHrHl9uvlqMu', NULL, '31344121@qq.com', 10, 10, 1458372476, 1458372476);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
