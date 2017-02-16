-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-02-01 17:42:51
-- 服务器版本： 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.1.1-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fdy`
--

-- --------------------------------------------------------

--
-- 表的结构 `college`
--

CREATE TABLE `college` (
  `id` int(11) NOT NULL,
  `college` text NOT NULL COMMENT '学院名',
  `staff` int(11) NOT NULL COMMENT '参与总人数',
  `score` int(11) NOT NULL COMMENT '最高得分',
  `exam_num` int(11) NOT NULL COMMENT '考试总次数',
  `remark` text NOT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学院分块';

--
-- 转存表中的数据 `college`
--

INSERT INTO `college` (`id`, `college`, `staff`, `score`, `exam_num`, `remark`) VALUES
(1, '物电院', 7, 97, 5, ''),
(2, '数统院', 6, 98, 1, ''),
(3, '外语院', 23, 98, 1, ''),
(4, '马克思学院', 14, 98, 1, ''),
(5, '文学院', 19, 98, 1, ''),
(6, '法学院', 15, 98, 1, ''),
(7, '机电院', 13, 98, 1, ''),
(8, '建艺院', 13, 98, 1, ''),
(9, '信息院', 6, 98, 1, ''),
(10, '能源院', 9, 98, 1, ''),
(11, '冶环院', 4, 98, 1, ''),
(12, '资生院', 1, 98, 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `Discussion`
--

CREATE TABLE `Discussion` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `anwser` text NOT NULL,
  `fenzhi` int(11) NOT NULL COMMENT '分值',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='论述题';

--
-- 转存表中的数据 `Discussion`
--

INSERT INTO `Discussion` (`id`, `topic`, `anwser`, `fenzhi`, `time`) VALUES
(1, '论述你是不是男的 ', '这特么有啥说的,绝交', 0, '2017-01-02 02:00:00'),
(2, '论述你是不是男的 ', '这特么有啥说的,绝交db', 0, '2017-01-02 02:00:00'),
(3, '论述你是不是男的 ', '这特么有啥说的,绝交bhg', 0, '2017-01-02 02:00:00'),
(4, '论述你是不是男的 bhg', '这特么有啥说的,绝交db', 0, '2017-01-02 02:00:00'),
(5, '论述你是不是男的 ', '这特么有啥说的,绝交', 0, '2017-01-02 02:00:00'),
(6, '论述你是不是男的 ', '这特么有啥说的,绝交db', 0, '2017-01-02 02:00:00'),
(7, '论述你是不是男的 ', '这特么有啥说的,绝交bhg', 0, '2017-01-02 02:00:00'),
(8, '论述你是不是男的 bhg', '这特么有啥说的,绝交db', 0, '2017-01-02 02:00:00'),
(9, '这是论述测试题目1', '这是论述测试答案1', 10, '2017-01-15 11:33:10'),
(10, '这是论述测试题目2', '这是论述测试答案2', 11, '2017-01-15 11:33:10'),
(11, '这是论述测试题目3', '这是论述测试答案3', 12, '2017-01-15 11:33:10'),
(12, '这是论述测试题目4', '这是论述测试答案4', 13, '2017-01-15 11:33:10'),
(13, '这是论述测试题目5', '这是论述测试答案5', 14, '2017-01-15 11:33:10'),
(14, '这是论述测试题目6', '这是论述测试答案6', 15, '2017-01-15 11:33:10'),
(15, '这是论述测试题目7', '这是论述测试答案7', 16, '2017-01-15 11:33:10'),
(16, '这是论述测试题目8', '这是论述测试答案8', 17, '2017-01-15 11:33:10'),
(17, '这是论述测试题目9', '这是论述测试答案9', 18, '2017-01-15 11:33:10'),
(18, '这是论述测试题目10', '这是论述测试答案10', 19, '2017-01-15 11:33:10'),
(19, '这是论述测试题目11', '这是论述测试答案11', 20, '2017-01-15 11:33:10'),
(20, '这是论述测试题目12', '这是论述测试答案12', 21, '2017-01-15 11:33:10'),
(21, '这是论述测试题目13', '这是论述测试答案13', 22, '2017-01-15 11:33:10'),
(22, '这是论述测试题目14', '这是论述测试答案14', 23, '2017-01-15 11:33:10'),
(23, '这是论述测试题目15', '这是论述测试答案15', 24, '2017-01-15 11:33:10'),
(24, '这是论述测试题目16', '这是论述测试答案16', 25, '2017-01-15 11:33:11'),
(25, '这是论述测试题目17', '这是论述测试答案17', 26, '2017-01-15 11:33:11'),
(26, '这是论述测试题目18', '这是论述测试答案18', 27, '2017-01-15 11:33:11'),
(27, '这是论述测试题目19', '这是论述测试答案19', 28, '2017-01-15 11:33:11'),
(28, '这是论述测试题目20', '这是论述测试答案20', 29, '2017-01-15 11:33:11'),
(29, '这是论述测试题目21', '这是论述测试答案21', 30, '2017-01-15 11:33:11'),
(30, '这是论述测试题目22', '这是论述测试答案22', 31, '2017-01-15 11:33:11'),
(31, '这是论述测试题目23', '这是论述测试答案23', 32, '2017-01-15 11:33:11'),
(32, '这是论述测试题目24', '这是论述测试答案24', 33, '2017-01-15 11:33:11'),
(33, '这是论述测试题目25', '这是论述测试答案25', 34, '2017-01-15 11:33:11'),
(34, '这是论述测试题目26', '这是论述测试答案26', 35, '2017-01-15 11:33:11'),
(35, '这是论述测试题目27', '这是论述测试答案27', 36, '2017-01-15 11:33:11'),
(36, '这是论述测试题目28', '这是论述测试答案28', 37, '2017-01-15 11:33:11'),
(37, '这是论述测试题目29', '这是论述测试答案29', 38, '2017-01-15 11:33:11'),
(38, '这是论述测试题目30', '这是论述测试答案30', 39, '2017-01-15 11:33:11'),
(39, '这是论述测试题目31', '这是论述测试答案31', 40, '2017-01-15 11:33:11'),
(40, '这是论述测试题目32', '这是论述测试答案32', 41, '2017-01-15 11:33:11'),
(41, '这是论述测试题目33', '这是论述测试答案33', 42, '2017-01-15 11:33:11');

-- --------------------------------------------------------

--
-- 表的结构 `examination`
--

CREATE TABLE `examination` (
  `id` int(11) NOT NULL,
  `yb_userid` int(11) NOT NULL,
  `yb_username` text NOT NULL,
  `name` text NOT NULL COMMENT '真实姓名',
  `college` text NOT NULL COMMENT '所属学院',
  `count` int(11) NOT NULL COMMENT '考试次数',
  `most_score` int(11) NOT NULL COMMENT '最高考试得分',
  `phone` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='考试记录';

--
-- 转存表中的数据 `examination`
--

INSERT INTO `examination` (`id`, `yb_userid`, `yb_username`, `name`, `college`, `count`, `most_score`, `phone`, `email`) VALUES
(1, 7041045, '测试账号1', '测试账号（这是真实姓名）', '物电院', 10, 89, '15675124543', 'huhaobin110@gmail.com'),
(2, 7041045, '测试账号2', '测试账号（这是真实姓名）', '物理院', 10, 98, '15675124543', 'huhaobin110@gmail.com'),
(3, 7041045, '测试账号3', '测试账号（这是真实姓名）', '物电院', 10, 82, '15675124543', 'huhaobin110@gmail.com'),
(4, 7041045, '测试账号4', '测试账号（这是真实姓名）', '物电院', 10, 81, '15675124543', 'huhaobin110@gmail.com'),
(5, 7041045, '测试账号5', '测试账号（这是真实姓名）', '物电院', 10, 97, '15675124543', 'huhaobin110@gmail.com'),
(6, 7041045, '测试账号6', '测试账号（这是真实姓名）', '物电院', 10, 92, '15675124543', 'huhaobin110@gmail.com'),
(7, 7041045, '测试账号7', '测试账号（这是真实姓名）', '物电院', 10, 64, '15675124543', 'huhaobin110@gmail.com'),
(8, 7041045, '测试账号8', '测试账号（这是真实姓名）', '物电院', 10, 86, '15675124543', 'huhaobin110@gmail.com'),
(9, 7041045, '测试账号9', '测试账号（这是真实姓名）', '信息院', 10, 98, '15675124543', 'huhaobin110@gmail.com');

-- --------------------------------------------------------

--
-- 表的结构 `ex_7041045`
--

CREATE TABLE `ex_7041045` (
  `id` int(9) NOT NULL,
  `detail` text NOT NULL COMMENT '作答细节',
  `score` int(5) UNSIGNED NOT NULL COMMENT '此次考试得分',
  `wrong` text NOT NULL COMMENT '错误题目',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `zanliu` text NOT NULL COMMENT '待用项',
  `remark` text NOT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ex_7041045`
--

INSERT INTO `ex_7041045` (`id`, `detail`, `score`, `wrong`, `time`, `zanliu`, `remark`) VALUES
(1, '{"myradio74":"B","myradio45":"A"}', 2, '{"Radio74":"B"}', '2017-01-16 04:46:39', '', ''),
(2, '{"mycheckbox25":["A","B","C"],"mycheckbox2":["B"]}', 6, 'null', '2017-01-16 04:58:42', '', ''),
(3, '{"mycheckbox25":["A","B","C"],"mycheckbox2":["B"]}', 6, 'null', '2017-01-16 04:59:28', '', ''),
(4, '{"mycheckbox48":["A","B","C"],"mycheckbox33":["E"]}', 4, '{"Multi33":["E"]}', '2017-01-16 05:01:25', '', ''),
(5, '{"myradio46":"A","myradio7":"A"}', 4, 'null', '2017-01-16 05:03:31', '', ''),
(6, '{"myradio60":"A","myradio30":"B"}', 0, '{"Radio60":"A","Radio30":"B"}', '2017-01-16 05:04:04', '', ''),
(7, '{"myradio36":"A","myradio74":"B","mycheckbox6":["A","B","C"],"mycheckbox37":["D"]}', 4, '{"Radio74":"B"}', '2017-01-16 05:19:18', '', ''),
(8, '{"myradio36":"A","myradio74":"B","mycheckbox6":["A","B","C"],"mycheckbox37":["D"]}', 4, '{"Radio74":"B"}', '2017-01-16 05:24:10', '', ''),
(9, '{"myradio36":"A","myradio74":"B","mycheckbox6":["A","B","C"],"mycheckbox37":["D"]}', 4, '{"Radio74":"B"}', '2017-01-16 05:30:25', '', ''),
(10, '{"myradio36":"A","myradio74":"B","mycheckbox6":["A","B","C"],"mycheckbox37":["D"]}', 4, '{"Radio74":"B"}', '2017-01-16 05:36:13', '', ''),
(11, '{"myradio36":"A","myradio74":"B","mycheckbox6":["A","B","C"],"mycheckbox37":["D"]}', 4, 'null', '2017-01-16 05:38:25', '', ''),
(12, '{"myradio36":"A","myradio74":"B","mycheckbox6":["A","B","C"],"mycheckbox37":["D"]}', 4, '{"Radio74":"B"}', '2017-01-16 09:40:28', '', ''),
(13, '{"myradio36":"A","myradio74":"B","mycheckbox6":["A","B","C"],"mycheckbox37":["D"]}', 4, '{"Radio74":"B"}', '2017-01-16 09:41:30', '', ''),
(14, '{"myradio36":"A","myradio74":"B","mycheckbox6":["A","B","C"],"mycheckbox37":["D"]}', 4, '{"Radio74":"B"}', '2017-01-16 10:27:56', '', ''),
(15, '{"myradio36":"A","myradio74":"B","mycheckbox6":["A","B","C"],"mycheckbox37":["D"]}', 4, '{"Radio74":"B"}', '2017-01-16 10:44:58', '', ''),
(16, '{"myradio36":"A","myradio74":"B","mycheckbox6":["A","B","C"],"mycheckbox37":["D"]}', 4, '{"Radio74":"B"}', '2017-01-16 10:46:49', '', ''),
(17, '{"myradio36":"A","myradio74":"B","mycheckbox6":["A","B","C"],"mycheckbox37":["D"]}', 2, '{"Radio74":"B"}', '2017-01-16 10:57:38', '', ''),
(18, '{"myradio18":"A","myradio45":"B","mycheckbox43":["A","B","C"],"mycheckbox10":["B"],"myTorF38":"0","myTorF3":"0"}', 2, '{"Radio45":"B"}', '2017-01-16 10:59:50', '', ''),
(19, '{"myradio18":"A","myradio45":"B","mycheckbox43":["A","B","C"],"mycheckbox10":["B"],"myTorF38":"0","myTorF3":"0"}', 2, '{"Radio45":"B"}', '2017-01-16 11:01:06', '', ''),
(20, '[]', 0, 'null', '2017-01-22 11:31:04', '', ''),
(21, '{"myradio24":"B","myradio23":"C","mycheckbox4":["B","D"],"myblank":"\\u4e0d\\u8981\\u592a\\u5927\\u65b9\\u6b22\\u8fce"}', 6, 'null', '2017-01-27 05:44:20', '', ''),
(22, '{"myradio17":"B","myradio21":"C","mycheckbox8":["B","C"],"myblank":""}', 4, '{"Radio17":"B"}', '2017-01-27 05:45:45', '', ''),
(23, '{"myradio26":"B","myradio20":"C","mycheckbox5":["B","C"],"mycheckbox7":["B","C"],"myblank":"\\u8fd8\\u6709\\u4ed6\\u7684\\u7528\\u6237"}', 4, '{"Radio26":"B","Multi5":["B","C"]}', '2017-01-27 05:46:22', '', ''),
(24, '{"myradio26":"B","myradio20":"C","mycheckbox5":["B","C"],"mycheckbox7":["B","C"],"myblank":"\\u8fd8\\u6709\\u4ed6\\u7684\\u7528\\u6237"}', 4, '{"Radio26":"B","Multi5":["B","C"]}', '2017-01-27 05:46:37', '', ''),
(25, '{"myradio26":"B","myradio20":"C","mycheckbox5":["B","C"],"mycheckbox7":["B","C"],"myblank":"\\u8fd8\\u6709\\u4ed6\\u7684\\u7528\\u6237"}', 4, '{"Radio26":"B","Multi5":["B","C"]}', '2017-01-27 05:46:40', '', ''),
(26, '{"myradio13":"D","myradio26":"B","mycheckbox6":["B","C"],"mycheckbox9":["A","C"],"myblank":"\\u540c\\u4e00\\u53e5\\u8bdd"}', 2, '{"Radio13":"D","Radio26":"B","Multi9":["A","C"]}', '2017-01-27 05:47:59', '', ''),
(27, '{"myradio15":"A","myradio6":"B","myradio26":"C","myradio8":"B","myradio23":"D","mycheckbox12":["B","C"],"mycheckbox2":["A","B","C"],"mycheckbox7":["B","C","D"],"mycheckbox15":["B","C","D"],"mycheckbox10":["A","B","C","D"],"myblank":"\\u6c34\\u7535\\u8d39"}', 8, '{"Radio15":"A","Radio6":"B","Radio26":"C","Radio8":"B","Radio23":"D","Multi15":["B","C","D"]}', '2017-01-27 05:56:50', '', ''),
(28, '{"myradio15":"A","myradio6":"B","myradio26":"C","myradio8":"B","myradio23":"D","mycheckbox12":["B","C"],"mycheckbox2":["A","B","C"],"mycheckbox7":["B","C","D"],"mycheckbox15":["B","C","D"],"mycheckbox10":["A","B","C","D"],"myblank":"\\u6c34\\u7535\\u8d39"}', 8, '{"Radio15":"A","Radio6":"B","Radio26":"C","Radio8":"B","Radio23":"D","Multi15":["B","C","D"]}', '2017-01-27 05:57:32', '', ''),
(29, '{"myradio19":"A","myradio1":"C","myradio22":"B","myradio21":"D","myradio24":"C","mycheckbox10":["B","C"],"mycheckbox5":["A","B"],"mycheckbox1":["B","C"],"mycheckbox8":["A","C"],"myblank":"vrtdg"}', 0, '{"Radio19":"A","Radio1":"C","Radio22":"B","Radio21":"D","Radio24":"C","Multi10":["B","C"],"Multi5":["A","B"],"Multi1":["B","C"],"Multi8":["A","C"]}', '2017-01-27 05:58:20', '', ''),
(30, '{"myradio21":"A","myradio26":"C","myradio15":"B","myradio1":"B","myradio19":"B","mycheckbox4":["A","B"],"mycheckbox16":["A","C"],"mycheckbox11":["A","B"],"mycheckbox5":["B","C"],"mycheckbox7":["B","C","D"],"myblank":"\\u4e2a\\u4eba\\u56fe\\u4e66\\u9986"}', 10, '{"Radio21":"A","Radio26":"C","Radio15":"B","Radio19":"B","Multi5":["B","C"]}', '2017-01-27 05:59:28', '', ''),
(31, '{"myradio14":"B","myradio24":"B","myradio16":"D","myradio21":"A","myradio22":"D","mycheckbox6":["A","B"],"mycheckbox8":["A","C"],"mycheckbox9":["A","B"],"mycheckbox13":["B","C"],"myblank":"\\u4e2a\\u4eba\\u56fe\\u4e66\\u9986"}', 8, '{"Radio14":"B","Radio21":"A","Multi8":["A","C"],"Multi9":["A","B"],"Multi13":["B","C"]}', '2017-01-27 06:00:00', '', ''),
(32, '{"myradio18":"B","myradio7":"B","myradio25":"D","myradio19":"B","myradio12":"D","mycheckbox14":["A","B"],"mycheckbox9":["A","B"],"mycheckbox17":["A","C"],"mycheckbox3":["A","B"],"mycheckbox6":["B","C"],"myblank":"\\u4e2a\\u4eba\\u56fe\\u4e66\\u9986"}', 12, '{"Radio25":"D","Radio19":"B","Radio12":"D","Multi9":["A","B"]}', '2017-01-27 06:00:34', '', ''),
(33, '{"myradio18":"B","myradio7":"B","myradio25":"D","myradio19":"B","myradio12":"D","mycheckbox14":["A","B"],"mycheckbox9":["A","B"],"mycheckbox17":["A","C"],"mycheckbox3":["A","B"],"mycheckbox6":["B","C"],"myblank":"\\u4e2a\\u4eba\\u56fe\\u4e66\\u9986"}', 12, '{"Radio25":"D","Radio19":"B","Radio12":"D","Multi9":["A","B"]}', '2017-01-27 06:00:42', '', ''),
(34, '{"myradio18":"B","myradio7":"B","myradio25":"D","myradio19":"B","myradio12":"D","mycheckbox14":["A","B"],"mycheckbox9":["A","B"],"mycheckbox17":["A","C"],"mycheckbox3":["A","B"],"mycheckbox6":["B","C"],"myblank":"\\u4e2a\\u4eba\\u56fe\\u4e66\\u9986"}', 12, '{"Radio25":"D","Radio19":"B","Radio12":"D","Multi9":["A","B"]}', '2017-01-27 06:00:47', '', ''),
(35, '{"myradio18":"B","myradio7":"B","myradio25":"D","myradio19":"B","myradio12":"D","mycheckbox14":["A","B"],"mycheckbox9":["A","B"],"mycheckbox17":["A","C"],"mycheckbox3":["A","B"],"mycheckbox6":["B","C"],"myblank":"\\u4e2a\\u4eba\\u56fe\\u4e66\\u9986"}', 12, '{"Radio25":"D","Radio19":"B","Radio12":"D","Multi9":["A","B"]}', '2017-01-27 06:13:17', '', ''),
(36, '{"myradio18":"B","myradio7":"B","myradio25":"D","myradio19":"B","myradio12":"D","mycheckbox14":["A","B"],"mycheckbox9":["A","B"],"mycheckbox17":["A","C"],"mycheckbox3":["A","B"],"mycheckbox6":["B","C"],"myblank":"\\u4e2a\\u4eba\\u56fe\\u4e66\\u9986"}', 12, '{"Radio25":"D","Radio19":"B","Radio12":"D","Multi9":["A","B"]}', '2017-01-27 06:13:23', '', ''),
(37, '{"myradio18":"B","myradio7":"B","myradio25":"D","myradio19":"B","myradio12":"D","mycheckbox14":["A","B"],"mycheckbox9":["A","B"],"mycheckbox17":["A","C"],"mycheckbox3":["A","B"],"mycheckbox6":["B","C"],"myblank":"\\u4e2a\\u4eba\\u56fe\\u4e66\\u9986"}', 12, '{"Radio25":"D","Radio19":"B","Radio12":"D","Multi9":["A","B"]}', '2017-01-27 06:13:25', '', ''),
(38, '{"myradio18":"B","myradio7":"B","myradio25":"D","myradio19":"B","myradio12":"D","mycheckbox14":["A","B"],"mycheckbox9":["A","B"],"mycheckbox17":["A","C"],"mycheckbox3":["A","B"],"mycheckbox6":["B","C"],"myblank":"\\u4e2a\\u4eba\\u56fe\\u4e66\\u9986"}', 12, '{"Radio25":"D","Radio19":"B","Radio12":"D","Multi9":["A","B"]}', '2017-01-27 06:13:37', '', ''),
(39, '{"myradio22":"B","myradio10":"A","myradio7":"C","myradio1":"B","myradio21":"D","mycheckbox6":["A","B","C","D"],"mycheckbox9":["A","B"],"mycheckbox1":["A","B"],"mycheckbox3":["B","C"],"myblank":""}', 8, '{"Radio22":"B","Radio10":"A","Radio7":"C","Radio21":"D","Multi9":["A","B"],"Multi1":["A","B"]}', '2017-01-27 06:15:41', '', ''),
(40, '{"myradio15":"B","myradio7":"A","myradio21":"B","myradio3":"B","myradio25":"A","mycheckbox11":["A","B","C"],"mycheckbox5":["A","B"],"mycheckbox7":["A","C"],"mycheckbox17":["A","B"],"myblank":""}', 4, '{"Radio15":"B","Radio7":"A","Radio21":"B","Radio3":"B","Radio25":"A","Multi11":["A","B","C"],"Multi5":["A","B"]}', '2017-01-27 06:16:04', '', ''),
(41, '{"myradio8":"B","myradio23":"C","myradio10":"A","myradio7":"C","myradio15":"A","mycheckbox14":["A","B"],"mycheckbox2":["A","B"],"mycheckbox11":["A","B"],"mycheckbox12":["A","B"],"mycheckbox7":["A","C"],"myblank":"hgtrye "}', 12, '{"Radio8":"B","Radio10":"A","Radio7":"C","Radio15":"A"}', '2017-01-27 06:20:44', '', ''),
(42, '{"myradio8":"B","myradio23":"C","myradio10":"A","myradio7":"C","myradio15":"A","mycheckbox14":["A","B"],"mycheckbox2":["A","B"],"mycheckbox11":["A","B"],"mycheckbox12":["A","B"],"mycheckbox7":["A","C"],"myblank":"hgtrye "}', 12, '{"Radio8":"B","Radio10":"A","Radio7":"C","Radio15":"A"}', '2017-01-27 06:21:31', '', ''),
(43, '{"myradio8":"B","myradio23":"C","myradio10":"A","myradio7":"C","myradio15":"A","mycheckbox14":["A","B"],"mycheckbox2":["A","B"],"mycheckbox11":["A","B"],"mycheckbox12":["A","B"],"mycheckbox7":["A","C"],"myblank":"hgtrye "}', 12, '{"Radio8":"B","Radio10":"A","Radio7":"C","Radio15":"A"}', '2017-01-27 06:27:59', '', ''),
(44, '{"myradio8":"B","myradio23":"C","myradio10":"A","myradio7":"C","myradio15":"A","mycheckbox14":["A","B"],"mycheckbox2":["A","B"],"mycheckbox11":["A","B"],"mycheckbox12":["A","B"],"mycheckbox7":["A","C"],"myblank":"hgtrye "}', 12, '{"Radio8":"B","Radio10":"A","Radio7":"C","Radio15":"A"}', '2017-01-27 06:28:30', '', ''),
(45, '{"myradio8":"B","myradio23":"C","myradio10":"A","myradio7":"C","myradio15":"A","mycheckbox14":["A","B"],"mycheckbox2":["A","B"],"mycheckbox11":["A","B"],"mycheckbox12":["A","B"],"mycheckbox7":["A","C"],"myblank":"hgtrye "}', 12, '{"Radio8":"B","Radio10":"A","Radio7":"C","Radio15":"A"}', '2017-01-27 06:29:53', '', ''),
(46, '{"myradio8":"B","myradio23":"C","myradio10":"A","myradio7":"C","myradio15":"A","mycheckbox14":["A","B"],"mycheckbox2":["A","B"],"mycheckbox11":["A","B"],"mycheckbox12":["A","B"],"mycheckbox7":["A","C"],"myblank":"hgtrye "}', 12, '{"Radio8":"B","Radio10":"A","Radio7":"C","Radio15":"A"}', '2017-01-27 06:30:10', '', ''),
(47, '{"myradio8":"B","myradio23":"C","myradio10":"A","myradio7":"C","myradio15":"A","mycheckbox14":["A","B"],"mycheckbox2":["A","B"],"mycheckbox11":["A","B"],"mycheckbox12":["A","B"],"mycheckbox7":["A","C"],"myblank":"hgtrye "}', 12, '{"Radio8":"B","Radio10":"A","Radio7":"C","Radio15":"A"}', '2017-01-27 06:31:06', '', ''),
(48, '{"myradio8":"B","myradio23":"C","myradio10":"A","myradio7":"C","myradio15":"A","mycheckbox14":["A","B"],"mycheckbox2":["A","B"],"mycheckbox11":["A","B"],"mycheckbox12":["A","B"],"mycheckbox7":["A","C"],"myblank":"hgtrye "}', 12, '{"Radio8":"B","Radio10":"A","Radio7":"C","Radio15":"A"}', '2017-01-27 06:31:27', '', ''),
(49, '{"myradio8":"B","myradio23":"C","myradio10":"A","myradio7":"C","myradio15":"A","mycheckbox14":["A","B"],"mycheckbox2":["A","B"],"mycheckbox11":["A","B"],"mycheckbox12":["A","B"],"mycheckbox7":["A","C"],"myblank":"hgtrye "}', 12, '{"Radio8":"B","Radio10":"A","Radio7":"C","Radio15":"A"}', '2017-01-27 06:32:35', '', ''),
(50, '{"myradio8":"B","myradio23":"C","myradio10":"A","myradio7":"C","myradio15":"A","mycheckbox14":["A","B"],"mycheckbox2":["A","B"],"mycheckbox11":["A","B"],"mycheckbox12":["A","B"],"mycheckbox7":["A","C"],"myblank":"hgtrye "}', 12, '{"Radio8":"B","Radio10":"A","Radio7":"C","Radio15":"A"}', '2017-01-27 06:32:52', '', ''),
(51, '{"myradio8":"B","myradio23":"C","myradio10":"A","myradio7":"C","myradio15":"A","mycheckbox14":["A","B"],"mycheckbox2":["A","B"],"mycheckbox11":["A","B"],"mycheckbox12":["A","B"],"mycheckbox7":["A","C"],"myblank":"hgtrye "}', 12, '{"Radio8":"B","Radio10":"A","Radio7":"C","Radio15":"A"}', '2017-01-27 06:33:29', '', ''),
(52, '{"myradio8":"B","myradio23":"C","myradio10":"A","myradio7":"C","myradio15":"A","mycheckbox14":["A","B"],"mycheckbox2":["A","B"],"mycheckbox11":["A","B"],"mycheckbox12":["A","B"],"mycheckbox7":["A","C"],"myblank":"hgtrye "}', 12, '{"Radio8":"B","Radio10":"A","Radio7":"C","Radio15":"A"}', '2017-01-27 06:33:39', '', ''),
(53, '{"myradio18":"B","myradio24":"B","myradio19":"A","myradio1":"B","myradio12":"B","mycheckbox2":["A","B"],"mycheckbox13":["B","C"],"mycheckbox8":["A","B","C"],"mycheckbox12":["A","B","C"],"mycheckbox16":["B","C","D"],"myblank":""}', 10, '{"Radio19":"A","Radio12":"B","Multi13":["B","C"],"Multi8":["A","B","C"],"Multi16":["B","C","D"]}', '2017-01-27 06:54:56', '', ''),
(54, '{"myradio16":"C","myradio9":"C","myradio6":"C","myradio1":"C","myradio18":"C","mycheckbox3":["B","C"],"mycheckbox12":["B","D"],"mycheckbox10":["B","C"],"mycheckbox1":["B","C"],"mycheckbox9":["B","D"],"myblank":""}', 8, '{"Radio16":"C","Radio9":"C","Radio1":"C","Radio18":"C","Multi10":["B","C"],"Multi1":["B","C"]}', '2017-02-01 09:23:02', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `kaoshi`
--

CREATE TABLE `kaoshi` (
  `id` int(11) NOT NULL COMMENT '考试序号',
  `topic` text NOT NULL COMMENT '考试标题',
  `RadioNum` int(11) NOT NULL COMMENT '单选题目数量',
  `MultiNum` int(11) NOT NULL COMMENT '多选题目数量',
  `TorFNum` int(11) NOT NULL COMMENT '判断题目数量',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '建立考试的时间',
  `remark` text NOT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='设置相应的考试';

--
-- 转存表中的数据 `kaoshi`
--

INSERT INTO `kaoshi` (`id`, `topic`, `RadioNum`, `MultiNum`, `TorFNum`, `time`, `remark`) VALUES
(1, '测试', 5, 5, 2, '2017-01-27 05:49:37', '');

-- --------------------------------------------------------

--
-- 表的结构 `Multiple`
--

CREATE TABLE `Multiple` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL COMMENT '题目',
  `option_A` text NOT NULL,
  `option_B` text NOT NULL,
  `option_C` text NOT NULL,
  `option_D` text NOT NULL,
  `option_E` text NOT NULL,
  `option_F` text NOT NULL,
  `option_G` text NOT NULL,
  `option_H` text NOT NULL,
  `fenzhi` int(11) NOT NULL COMMENT '分值',
  `more` int(11) NOT NULL COMMENT '多选题目答案多选的分值',
  `short` int(11) NOT NULL COMMENT '多选题目答案少选的分值',
  `anwser` text NOT NULL COMMENT '答案(大写)',
  `quoted_num` int(11) NOT NULL COMMENT '引用数',
  `wrong_num` int(11) NOT NULL COMMENT '错误数',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '题库上传时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='多选题库';

--
-- 转存表中的数据 `Multiple`
--

INSERT INTO `Multiple` (`id`, `topic`, `option_A`, `option_B`, `option_C`, `option_D`, `option_E`, `option_F`, `option_G`, `option_H`, `fenzhi`, `more`, `short`, `anwser`, `quoted_num`, `wrong_num`, `time`) VALUES
(1, '高等教育采用(  )教育形式。', '全日制', '学历', '非学历', '非全日制', '', '', '', '', 4, 0, 2, ' AD ', 0, 0, '2017-01-17 06:38:15'),
(2, '国家对高等学校的(  ) 实行优惠政策', '进口图书资料', '教学科研设备', '校办产业', '周边商店', '', '', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-17 06:38:15'),
(3, '高等教育法所称的高等学校是指 ( ) ', '大学和独立设置的学院', '高等专科学校', '高等职业学校', '成人高等学校', '', '', '', '', 4, 0, 2, 'ABCD', 0, 0, '2017-01-17 06:38:15'),
(4, '高等学校应当对教师、管理人员和教学辅助人员及其他专业技术人员的思想政治表现、职业道德、业务水平和工作实绩进行考核，考核结果作为( )的依据。', '聘任或解聘', '晋升', '奖励', '处分', '', '', '', '', 4, 0, 2, 'ABCD', 0, 0, '2017-01-17 06:38:15'),
(5, '因下列情形之一造成的学生伤害事故，学校应当依法承担相应的责任 ( )', '学校组织学生参加教育教学活动或者校外活动，未对学生进行相应的安全教育，并未在可预见的范围内采取必要的安全措施的', '学校知道教师或者其他工作人员患有不适宜担任教育教学工作的疾病，但已经采取必要措施的', '学生有特异体质或者特定疾病，不宜参加某种教育教学活动，学校知道或者应当知道，但未予以必要的注意的', '学生在校期间突发疾病或者受到伤害，学校发现，但未根据实际情况及时采取相应措施，导致不良后果加重的', '', '', '', '', 4, 0, 2, 'ACD', 0, 0, '2017-01-17 06:38:15'),
(6, '辅导员的考核应由 (  ) 共同参与。', '组织人事部门', '学生工作部门', '院（系）', '学生', '', '', '', '', 4, 0, 2, 'ABCD', 0, 0, '2017-01-17 06:38:15'),
(7, '努力拓展新形势下大学生思想政治教育的有效途径包括 (   ) 。', '深入开展社会实践', '大力建设校园文化。', '主动占领网络思想政治教育新阵地', '开展深入细致的思想政治工作和心理健康教育', '', '', '', '', 4, 0, 2, 'ABCD', 0, 0, '2017-01-17 06:38:15'),
(8, '开展班级文化建设可以从 (  ) 三个方面着手。', '公共关系', '氛围塑造', '活动创新', '人心凝聚', '', '', '', '', 4, 0, 2, 'BCD', 0, 0, '2017-01-17 06:38:15'),
(9, '辅导员在进行大学生开展公民道德教育的过程中应该坚持的原则是 (   )', '以学生为主', '以理服人', '以情感人', '以身作则', '', '', '', '', 4, 0, 2, 'BCD', 0, 0, '2017-01-17 06:38:15'),
(10, '辅导员进行诚信教育的方式可以有(   )。', '树立诚信教育典范', '凭借学生自我觉醒', '建立信用考评体系', '替学生承担责任', '', '', '', '', 4, 0, 2, 'AC', 0, 0, '2017-01-17 06:38:15'),
(11, '下列那些选项符合高校班级班委的择才标准(  ) ', '良好的专业成绩 ', '恰到好处的创新精神', '表里不一的行为方式', '团队精神、亲和力、感染力、领导力', '', '', '', '', 4, 0, 2, 'ABD', 0, 0, '2017-01-17 06:38:15'),
(12, '高校中在学习上有问题的学生一般可以分为哪几类 (   )', '学习态度有问题', '学习能力有问题 ', '学习方法有问题', '学习阻力问题', '', '', '', '', 4, 0, 2, 'ABCD', 0, 0, '2017-01-17 06:38:15'),
(13, '生活辅导是学校为了帮助学生形成健康的生活习惯，促进学生个人生活健康所实施的辅导，一般情况下包括 (   )。', '身体健康', '学习辅导', '人际关系', '心理健康', '', '', '', '', 4, 0, 2, 'ACD', 0, 0, '2017-01-17 06:38:15'),
(14, '辅导员在开展评奖评优工作是应坚持的总体原则是(   ) 。', '积极申报，鼓励先进', '公开原则', '政策倾斜原则', '公平公正原则', '', '', '', '', 4, 0, 2, 'ABD', 0, 0, '2017-01-17 06:38:15'),
(15, '辅导员在表扬学生时要注意的表扬技巧有 (   ) 。', '鼓励为主原则', '客观公正原则 ', '实施适度原则', '说服教育', '', '', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-17 06:38:15'),
(16, '国家近几年出台了一系列优惠政策鼓励高校毕业生积极参加社会主义新农村建设、城市社区建设和应征入伍。一般来讲，“基层”指的是 (   ) ', '广大农村和城市街道社区；', '县级以下党政机关、企事业单位；', '社会团体、非公有制组织和各类企业；', '自主创业、自谋职业以及艰苦行业和艰苦岗位', '', '', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-17 06:38:15'),
(17, '17.近年来，有关部门组织实施了多个引导高校毕业生到基层就业的专门项目，主要包括： (  )', '“大学生志愿服务西部计划”；', '“三支一扶”（支教、支农、支医和扶贫）计划；', '“农村义务教育阶段学校教师特设岗位计划”（简称“特岗教师计划”）；', '“选聘高校毕业生到村任职工作计划”（简称“大学生村官计划”）；', '“农村学校教育硕士师资培养计划”（简称“硕师计划”）；', '“普通高等学校应届毕业生应征入伍服义务兵役”计划', '', '', 4, 0, 2, 'ABCDEF', 0, 0, '2017-01-17 06:38:15');

-- --------------------------------------------------------

--
-- 表的结构 `radio`
--

CREATE TABLE `radio` (
  `Id` int(11) NOT NULL,
  `topic` text NOT NULL COMMENT '题目',
  `option_A` text NOT NULL COMMENT '选项A',
  `option_B` text NOT NULL COMMENT '选项B',
  `option_C` text NOT NULL COMMENT '选项C',
  `option_D` text NOT NULL COMMENT '选项D',
  `anwser` text NOT NULL,
  `fenzhi` int(11) NOT NULL COMMENT '分值',
  `quoted_num` int(11) NOT NULL COMMENT '被抽到的次数',
  `wrong_num` int(11) NOT NULL COMMENT '答错的次数',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '题库上传时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='单选题库';

--
-- 转存表中的数据 `radio`
--

INSERT INTO `radio` (`Id`, `topic`, `option_A`, `option_B`, `option_C`, `option_D`, `anwser`, `fenzhi`, `quoted_num`, `wrong_num`, `time`) VALUES
(1, '《普通高等学校学生管理规定》规定，学生应征参加中国人民解放军（含中国人民武装警察部队），学校应当保留其学籍 （  ）', '一年', '至退役后一年', '两年', '至退役后两年', 'B', 2, 0, 0, '2017-01-26 03:15:25'),
(2, '高等学校实行教师聘任制。高等学校的教师的聘任，应当遵循双方 ____ 原则，由高等学校校长与受聘教师签订聘任合同', '独立自主', '真诚守信', '平等自愿', '公平公正', 'C', 2, 0, 0, '2017-01-17 05:21:30'),
(3, '接受非学历高等教育的学生，成绩合格，由所在高等学校或者其他高等教育机构发给相应的 (__)。', '结业证书', '学习证明', '肄业证书', '毕业证书', 'A', 2, 0, 0, '2017-01-17 05:21:30'),
(4, '高等学校应当以(  )为中心，保证教育教学质量达到国家规定的标准。', '开展教育', '社会服务', '科学研究', '培养人才', 'D', 2, 0, 0, '2017-01-17 05:21:30'),
(5, '2012年3月6日，温家宝总理在政府工作报告中明确提出，2012年要确保全国财政性教育经费支出占国内生产总值（GDP） ____ 的目标。', '0.03', '0.04', '0.05', '0.06', 'B', 2, 0, 0, '2017-01-17 05:21:30'),
(6, '入学教育的重点是适应性教育。以下不属于入学教育主要内容的是 ____。', '爱校教育', '专业思想教育', '基本理论教育', '理想信念教育', 'C', 2, 0, 0, '2017-01-17 05:21:30'),
(7, '学生社团在校园文化建设中发挥着特殊的作用，更因其以学生为主体而在育人体系中占据重要位置。关于学生社团的主要作用以下描述正确的是____。', '① 有利于提高学生综合素质② 有利于繁荣校园文化③ 有利于规范学生日常行为', '① 有利于提高学生综合素质② 有利于繁荣校园文化④ 有利于社会主义政治文明建设', '② 有利于繁荣校园文化③ 有利于规范学生日常行为④ 有利于社会主义政治文明建设', '① 有利于提高学生综合素质 ② 有利于繁荣校园文化③ 有利于规范学生日常行为④ 有利于社会主义政治文明建设', 'B', 2, 0, 0, '2017-01-17 05:21:30'),
(8, '“关爱自然，爱护环境，珍惜资源”属于《高等学校学生行为准则》内容中的哪一条准则？ (__)', '热爱祖国，服务人民', '遵纪守法，弘扬正气', '明礼修身，团结友爱', '强健体魄，热爱生活', 'D', 2, 0, 0, '2017-01-17 05:21:30'),
(9, '关于建立健全一套科学完整、长期有效的学生紧急事件预警防控机制，下列说法不正确的是___。', '建立组织有力、运转高效、职责分明的组织机构，形成及时、快捷、通畅的信息网络', '树立“管了没用也要管”、“说了不听也要说”的观念，但对于防不胜防的突发紧急事件，属于工作之外无法把握的，故不必采取相应措施', '构建心理预警机制，制定紧急事件应急处理方案', '健全日常工作机制，保证信息采集渠道通畅，辅导员应保持全天候信息通畅。', 'B', 2, 0, 0, '2017-01-17 05:21:30'),
(10, '在实际工作中，辅导员不可能对某些理论问题有深入的研究，为解答学生的困惑，辅导员可以借助专家的力量来满足学生的需求。辅导员在此扮演的是____角色。', '解惑者', '管理者', '中介', '组织者', 'C', 2, 0, 0, '2017-01-17 05:21:30'),
(11, '从简单分类来讲，辅导员属于___教师。', '德育', '智育', '任课', '管理', 'A', 2, 0, 0, '2017-01-17 05:21:30'),
(12, '班级信息管理的主要途径有人脉系统、书面系统和网络系统，下列属于书面系统的是 ___ 。', '学生的思想汇报', '班会通知', 'E-mail通知', '电话通知', 'A', 2, 0, 0, '2017-01-17 05:21:30'),
(13, '新时期辅导员在工作中应坚持的工作理念是 ___。', '管理为主，教育为辅', '为学生服务理念', '教育为主，管理为辅', '学生自主发展', 'B', 2, 0, 0, '2017-01-17 05:21:30'),
(14, '高校素质教育中，思想道德素质是___。', '核心和关键', '基本条件', '方向和灵魂', '基础', 'C', 2, 0, 0, '2017-01-17 05:21:30'),
(15, '在高校班级班委队伍的组建中，下列哪项是以辅导员指定方式任命的班委的优点____？', '群众认可度较高', '班委之间的和谐度较高', '有利于竞争', '保证班委质量', 'D', 2, 0, 0, '2017-01-17 05:21:30'),
(16, '下列关于大学生职业生涯辅导的主要内容描述全面且正确的有____', '①认识自我③职业决策 ④提升求职技巧 ⑤了解就业政策', '①认识自我 ②认识职业环境④提升求职技巧 ⑤了解就业政策', '①认识自我 ②认识职业环境 ③职业决策⑤了解就业政策', '①认识自我 ②认识职业环境 ③职业决策 ④提升求职技巧 ⑤了解就业政策', 'D', 2, 0, 0, '2017-01-17 05:21:30'),
(17, '亲人死亡、失恋、学业失败等造成的心理危机，属于心理危机类型中的 ____', '发展性危机', '现实性危机', '存在性危机', '情境性危机', 'D', 2, 0, 0, '2017-01-17 05:21:30'),
(18, '2012年3月5日是学习雷锋纪念日多少周年？______', '48', '49', '50', '51', 'B', 2, 0, 0, '2017-01-17 05:21:30'),
(19, '国家鼓励毕业生到基层就业的优惠政策不包括______', '按照规定给予社会保险补贴和公益性岗位补贴；', '给予薪酬或生活补贴，同时按规定参加有关社会保险；', '按规定实施相应的学费补偿和国家助学贷款代偿；', '在研究生招录和事业单位选聘时实行笔试免试', 'D', 2, 0, 0, '2017-01-17 05:21:30'),
(20, '下面那个不属于选聘到村任职的一般程序？____下列关于心理咨询主要形式说法不正确的是____', '个体咨询是心理咨询最主要的形式，它在咨询者与求询者之间建立了一对一的关系。 ', '团体咨询多用于解决一般性的表层心理咨询问题，如恋爱问题、时间管理、人际交往问题。', '电话咨询能够有效降低咨询者的顾虑，具有保密性，能够深入彻底解决心理问题。', '书信咨询对那些不愿意或者不方便与咨询者面谈的求询者较为适用。', 'C', 2, 0, 0, '2017-01-17 05:21:30'),
(21, '国家鼓励高校毕业生应征入伍，下面哪一类毕业生属于这里的界定“高校毕业生”？_________', '往届毕业生；', '成人高等教育；', '民办普通高等学校；', '高等教育自学考试类学生', 'C', 2, 0, 0, '2017-01-17 05:21:30'),
(22, '下列选项中，哪一个不属于毕业生应征入伍服义务兵役享受哪些优惠政策?________', '优先报名应征、优先体检政审、优先审批定兵', '优先选拔使用', '补偿学费或代偿国家助学贷款', '优先推荐上高一层次学校', 'D', 2, 0, 0, '2017-01-17 05:21:30'),
(23, '人的生理和心理发展趋于成熟的关键时期是 ________ 。', '初中时期', '高中时期', '大学时期', '成年期', 'C', 2, 0, 0, '2017-01-17 05:21:30'),
(24, '21世纪成为人才的首要条件是 ______。', '身体健康', '心理健康', '社会适应良好', '人际关系良好', 'B', 2, 0, 0, '2017-01-17 05:21:30'),
(25, '大学作为一个特殊的群体,衡量大学生心理健康的首要为____', '情绪健康', '智力正常', '意志健全', '人格完整', 'B', 2, 0, 0, '2017-01-17 05:21:30'),
(26, '近年来，成为大学校园一大杀手的是_____。', '焦虑症', '疑病症', '恐怖症', '抑郁症', 'D', 2, 0, 0, '2017-01-17 05:21:30');

-- --------------------------------------------------------

--
-- 表的结构 `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `yb_userid` text NOT NULL,
  `yb_username` text NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员表';

--
-- 转存表中的数据 `setting`
--

INSERT INTO `setting` (`id`, `yb_userid`, `yb_username`, `priority`) VALUES
(1, '7041045', '胡皓斌', 0);

-- --------------------------------------------------------

--
-- 表的结构 `Short_answer`
--

CREATE TABLE `Short_answer` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `anwser` text NOT NULL,
  `fenzhi` int(11) NOT NULL COMMENT '分值',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='简答题';

--
-- 转存表中的数据 `Short_answer`
--

INSERT INTO `Short_answer` (`id`, `topic`, `anwser`, `fenzhi`, `time`) VALUES
(1, '这是一个优秀的人类', '恩,是的.很优秀', 0, '2017-01-01 16:28:00'),
(2, '这是一个优秀的人类', '恩,是的.很优秀', 0, '2017-01-01 16:28:00'),
(3, '这是一个优秀的人类', '恩,是的.很优秀', 0, '2017-01-01 16:28:00'),
(4, '这是一个优秀的人类', '恩,是的.很优秀', 0, '2017-01-01 16:28:00'),
(5, '这是一个优秀的人类', '恩,是的.很优秀', 0, '2017-01-01 16:28:00'),
(6, '这是一个优秀的人类', '恩,是的.很优秀', 0, '2017-01-01 16:28:00'),
(7, '这是一个优秀的人类', '恩,是的.很优秀', 0, '2017-01-01 16:28:00'),
(8, '这是一个优秀的人类', '恩,是的.很优秀', 0, '2017-01-01 16:28:00'),
(9, '这是简答测试题目1', '这是简答测试答案1', 20, '2017-01-15 11:25:08'),
(10, '这是简答测试题目2', '这是简答测试答案2', 20, '2017-01-15 11:25:08'),
(11, '这是简答测试题目3', '这是简答测试答案3', 20, '2017-01-15 11:25:08'),
(12, '这是简答测试题目4', '这是简答测试答案4', 20, '2017-01-15 11:25:08'),
(13, '这是简答测试题目5', '这是简答测试答案5', 20, '2017-01-15 11:25:08'),
(14, '这是简答测试题目6', '这是简答测试答案6', 20, '2017-01-15 11:25:08'),
(15, '这是简答测试题目7', '这是简答测试答案7', 20, '2017-01-15 11:25:08'),
(16, '这是简答测试题目8', '这是简答测试答案8', 20, '2017-01-15 11:25:08'),
(17, '这是简答测试题目9', '这是简答测试答案9', 20, '2017-01-15 11:25:08'),
(18, '这是简答测试题目10', '这是简答测试答案10', 20, '2017-01-15 11:25:08'),
(19, '这是简答测试题目11', '这是简答测试答案11', 20, '2017-01-15 11:25:08'),
(20, '这是简答测试题目12', '这是简答测试答案12', 20, '2017-01-15 11:25:08'),
(21, '这是简答测试题目13', '这是简答测试答案13', 20, '2017-01-15 11:25:09'),
(22, '这是简答测试题目14', '这是简答测试答案14', 20, '2017-01-15 11:25:09'),
(23, '这是简答测试题目15', '这是简答测试答案15', 20, '2017-01-15 11:25:09'),
(24, '这是简答测试题目16', '这是简答测试答案16', 20, '2017-01-15 11:25:09'),
(25, '这是简答测试题目17', '这是简答测试答案17', 20, '2017-01-15 11:25:09'),
(26, '这是简答测试题目18', '这是简答测试答案18', 20, '2017-01-15 11:25:09'),
(27, '这是简答测试题目19', '这是简答测试答案19', 20, '2017-01-15 11:25:09'),
(28, '这是简答测试题目20', '这是简答测试答案20', 20, '2017-01-15 11:25:09'),
(29, '这是简答测试题目21', '这是简答测试答案21', 20, '2017-01-15 11:25:09'),
(30, '这是简答测试题目22', '这是简答测试答案22', 20, '2017-01-15 11:25:09'),
(31, '这是简答测试题目23', '这是简答测试答案23', 20, '2017-01-15 11:25:09'),
(32, '这是简答测试题目24', '这是简答测试答案24', 20, '2017-01-15 11:25:09'),
(33, '这是简答测试题目25', '这是简答测试答案25', 20, '2017-01-15 11:25:09'),
(34, '这是简答测试题目26', '这是简答测试答案26', 20, '2017-01-15 11:25:09'),
(35, '这是简答测试题目27', '这是简答测试答案27', 20, '2017-01-15 11:25:09'),
(36, '这是简答测试题目28', '这是简答测试答案28', 20, '2017-01-15 11:25:09'),
(37, '这是简答测试题目29', '这是简答测试答案29', 20, '2017-01-15 11:25:09'),
(38, '这是简答测试题目30', '这是简答测试答案30', 20, '2017-01-15 11:25:09'),
(39, '这是简答测试题目31', '这是简答测试答案31', 20, '2017-01-15 11:25:09'),
(40, '这是简答测试题目32', '这是简答测试答案32', 20, '2017-01-15 11:25:09'),
(41, '这是简答测试题目33', '这是简答测试答案33', 20, '2017-01-15 11:25:09');

-- --------------------------------------------------------

--
-- 表的结构 `TorF`
--

CREATE TABLE `TorF` (
  `Id` int(11) NOT NULL,
  `topic` text NOT NULL COMMENT '题目',
  `anwser` text NOT NULL COMMENT '答案',
  `fenzhi` int(11) NOT NULL COMMENT '分值',
  `quoted_num` int(11) NOT NULL COMMENT '引用数',
  `wrong_num` int(11) NOT NULL COMMENT '错误数',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '题库上传时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='判断题';

--
-- 转存表中的数据 `TorF`
--

INSERT INTO `TorF` (`Id`, `topic`, `anwser`, `fenzhi`, `quoted_num`, `wrong_num`, `time`) VALUES
(1, '你爱学习吗', '0', 2, 0, 0, '2017-01-26 03:51:29'),
(2, '你爱学习吗', '0', 2, 0, 0, '2017-01-26 03:51:29'),
(3, '你爱学习吗', '0', 2, 0, 0, '2017-01-26 03:51:29'),
(4, '你爱学习吗', '1', 2, 0, 0, '2017-01-26 03:51:29'),
(5, '你爱学习吗', '0', 2, 0, 0, '2017-01-26 03:51:29'),
(6, '你爱学习吗', '0', 2, 0, 0, '2017-01-26 03:51:29'),
(7, '你爱学习吗', '0', 2, 0, 0, '2017-01-26 03:51:29'),
(8, '你爱学习吗', '0', 2, 0, 0, '2017-01-26 03:51:29'),
(9, '你是属猪吗13', '0', 2, 0, 0, '2017-01-26 03:51:29'),
(10, '你是属猪吗28', '0', 2, 0, 0, '2017-01-26 03:51:29'),
(11, '你是属猪吗29', '0', 2, 0, 0, '2017-01-26 03:51:29'),
(12, '你是属猪吗30', '0', 2, 0, 0, '2017-01-26 03:51:29'),
(13, '你是属猪吗31', '0', 2, 0, 0, '2017-01-26 03:51:29'),
(14, '你是属猪吗32', '0', 2, 0, 0, '2017-01-26 03:51:29'),
(15, '你是属猪吗33', '0', 2, 0, 0, '2017-01-26 03:51:29');

-- --------------------------------------------------------

--
-- 表的结构 `writing`
--

CREATE TABLE `writing` (
  `Id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `anwser` text NOT NULL,
  `fenzhi` int(11) NOT NULL COMMENT '分值',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='网文写作题';

--
-- 转存表中的数据 `writing`
--

INSERT INTO `writing` (`Id`, `topic`, `anwser`, `fenzhi`, `time`) VALUES
(1, '就学生组织写一片论述drtfygu', '哦', 0, '2017-01-01 16:00:38'),
(2, '这是写作测试题目1', '这是写作测试答案1', 40, '2017-01-15 12:02:39'),
(3, '这是写作测试题目2', '这是写作测试答案2', 40, '2017-01-15 12:02:39'),
(4, '这是写作测试题目3', '这是写作测试答案3', 40, '2017-01-15 12:02:39'),
(5, '这是写作测试题目4', '这是写作测试答案4', 40, '2017-01-15 12:02:39'),
(6, '这是写作测试题目5', '这是写作测试答案5', 40, '2017-01-15 12:02:39'),
(7, '这是写作测试题目6', '这是写作测试答案6', 40, '2017-01-15 12:02:39'),
(8, '这是写作测试题目7', '这是写作测试答案7', 40, '2017-01-15 12:02:39'),
(9, '这是写作测试题目8', '这是写作测试答案8', 40, '2017-01-15 12:02:39'),
(10, '这是写作测试题目9', '这是写作测试答案9', 40, '2017-01-15 12:02:39'),
(11, '这是写作测试题目10', '这是写作测试答案10', 40, '2017-01-15 12:02:39'),
(12, '这是写作测试题目11', '这是写作测试答案11', 40, '2017-01-15 12:02:39'),
(13, '这是写作测试题目12', '这是写作测试答案12', 40, '2017-01-15 12:02:39'),
(14, '这是写作测试题目13', '这是写作测试答案13', 40, '2017-01-15 12:02:40'),
(15, '这是写作测试题目14', '这是写作测试答案14', 40, '2017-01-15 12:02:40'),
(16, '这是写作测试题目15', '这是写作测试答案15', 40, '2017-01-15 12:02:40'),
(17, '这是写作测试题目16', '这是写作测试答案16', 40, '2017-01-15 12:02:40'),
(18, '这是写作测试题目17', '这是写作测试答案17', 40, '2017-01-15 12:02:40'),
(19, '这是写作测试题目18', '这是写作测试答案18', 40, '2017-01-15 12:02:40'),
(20, '这是写作测试题目19', '这是写作测试答案19', 40, '2017-01-15 12:02:40'),
(21, '这是写作测试题目20', '这是写作测试答案20', 40, '2017-01-15 12:02:40'),
(22, '这是写作测试题目21', '这是写作测试答案21', 40, '2017-01-15 12:02:40'),
(23, '这是写作测试题目22', '这是写作测试答案22', 40, '2017-01-15 12:02:40'),
(24, '这是写作测试题目23', '这是写作测试答案23', 40, '2017-01-15 12:02:40'),
(25, '这是写作测试题目24', '这是写作测试答案24', 40, '2017-01-15 12:02:40'),
(26, '这是写作测试题目25', '这是写作测试答案25', 40, '2017-01-15 12:02:40'),
(27, '这是写作测试题目26', '这是写作测试答案26', 40, '2017-01-15 12:02:40'),
(28, '这是写作测试题目27', '这是写作测试答案27', 40, '2017-01-15 12:02:40'),
(29, '这是写作测试题目28', '这是写作测试答案28', 40, '2017-01-15 12:02:40'),
(30, '这是写作测试题目29', '这是写作测试答案29', 40, '2017-01-15 12:02:40'),
(31, '这是写作测试题目30', '这是写作测试答案30', 40, '2017-01-15 12:02:40'),
(32, '这是写作测试题目31', '这是写作测试答案31', 40, '2017-01-15 12:02:40'),
(33, '这是写作测试题目32', '这是写作测试答案32', 40, '2017-01-15 12:02:40'),
(34, '这是写作测试题目33', '这是写作测试答案33', 40, '2017-01-15 12:02:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Discussion`
--
ALTER TABLE `Discussion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examination`
--
ALTER TABLE `examination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_7041045`
--
ALTER TABLE `ex_7041045`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kaoshi`
--
ALTER TABLE `kaoshi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Multiple`
--
ALTER TABLE `Multiple`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radio`
--
ALTER TABLE `radio`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Short_answer`
--
ALTER TABLE `Short_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TorF`
--
ALTER TABLE `TorF`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `writing`
--
ALTER TABLE `writing`
  ADD PRIMARY KEY (`Id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `college`
--
ALTER TABLE `college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `Discussion`
--
ALTER TABLE `Discussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- 使用表AUTO_INCREMENT `examination`
--
ALTER TABLE `examination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `ex_7041045`
--
ALTER TABLE `ex_7041045`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- 使用表AUTO_INCREMENT `kaoshi`
--
ALTER TABLE `kaoshi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '考试序号', AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `Multiple`
--
ALTER TABLE `Multiple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `radio`
--
ALTER TABLE `radio`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- 使用表AUTO_INCREMENT `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `Short_answer`
--
ALTER TABLE `Short_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- 使用表AUTO_INCREMENT `TorF`
--
ALTER TABLE `TorF`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用表AUTO_INCREMENT `writing`
--
ALTER TABLE `writing`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
