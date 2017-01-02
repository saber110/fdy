-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-01-02 21:43:00
-- 服务器版本： 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.14-2+deb.sury.org~xenial+1

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
-- 表的结构 `Discussion`
--

CREATE TABLE `Discussion` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `answer` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='论述题';

--
-- 转存表中的数据 `Discussion`
--

INSERT INTO `Discussion` (`id`, `topic`, `answer`, `time`) VALUES
(1, '论述你是不是男的 ', '这特么有啥说的,绝交', '2017-01-02 02:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `examination`
--

CREATE TABLE `examination` (
  `id` int(11) NOT NULL,
  `yb_userid` int(11) NOT NULL,
  `yb_username` text NOT NULL,
  `name` text NOT NULL,
  `college` text NOT NULL COMMENT '所属学院',
  `count` int(11) NOT NULL COMMENT '考试次数',
  `last_score` int(11) NOT NULL COMMENT '最新考试得分',
  `phone` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='考试记录';

--
-- 转存表中的数据 `examination`
--

INSERT INTO `examination` (`id`, `yb_userid`, `yb_username`, `name`, `college`, `count`, `last_score`, `phone`, `email`) VALUES
(1, 7041045, '胡皓斌', '胡皓斌', '物电院', 10, 98, '15675123342', 'huhaobin110@gmail.com');

-- --------------------------------------------------------

--
-- 表的结构 `Multiple`
--

CREATE TABLE `Multiple` (
  `id` int(11) NOT NULL,
  `option_A` text NOT NULL,
  `option_B` text NOT NULL,
  `option_C` text NOT NULL,
  `option_D` text NOT NULL,
  `option_E` text NOT NULL,
  `option_F` text NOT NULL,
  `option_G` text NOT NULL,
  `option_H` text NOT NULL,
  `anwser` text NOT NULL COMMENT '答案(大写)',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '题库上传时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='多选题库';

--
-- 转存表中的数据 `Multiple`
--

INSERT INTO `Multiple` (`id`, `option_A`, `option_B`, `option_C`, `option_D`, `option_E`, `option_F`, `option_G`, `option_H`, `anwser`, `time`) VALUES
(1, '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 'ABC', '2017-01-02 12:21:28');

-- --------------------------------------------------------

--
-- 表的结构 `radio`
--

CREATE TABLE `radio` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL COMMENT '题目',
  `option_A` text NOT NULL COMMENT '选项A',
  `option_B` text NOT NULL COMMENT '选项B',
  `option_C` text NOT NULL COMMENT '选项C',
  `option_D` text NOT NULL COMMENT '选项D',
  `anwser` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '题库上传时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='单选题库';

--
-- 转存表中的数据 `radio`
--

INSERT INTO `radio` (`id`, `topic`, `option_A`, `option_B`, `option_C`, `option_D`, `anwser`, `time`) VALUES
(1, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', '2017-01-02 12:18:25');

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
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='简答题';

--
-- 转存表中的数据 `Short_answer`
--

INSERT INTO `Short_answer` (`id`, `topic`, `anwser`, `time`) VALUES
(1, '这是一个优秀的人类', '恩,是的.很优秀', '2017-01-01 16:28:00');

-- --------------------------------------------------------

--
-- 表的结构 `T/F`
--

CREATE TABLE `T/F` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL COMMENT '题目',
  `answer` tinyint(1) NOT NULL COMMENT '答案',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '题库上传时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='判断题';

--
-- 转存表中的数据 `T/F`
--

INSERT INTO `T/F` (`id`, `topic`, `answer`, `time`) VALUES
(1, '你爱学习吗', 0, '2017-01-01 19:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `writing`
--

CREATE TABLE `writing` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `answer` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='网文写作题';

--
-- 转存表中的数据 `writing`
--

INSERT INTO `writing` (`id`, `topic`, `answer`, `time`) VALUES
(1, '就学生组织写一片论述', '哦', '2017-01-01 16:00:38');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `Multiple`
--
ALTER TABLE `Multiple`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radio`
--
ALTER TABLE `radio`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `T/F`
--
ALTER TABLE `T/F`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writing`
--
ALTER TABLE `writing`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `Discussion`
--
ALTER TABLE `Discussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `examination`
--
ALTER TABLE `examination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `Multiple`
--
ALTER TABLE `Multiple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `radio`
--
ALTER TABLE `radio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `Short_answer`
--
ALTER TABLE `Short_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `T/F`
--
ALTER TABLE `T/F`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `writing`
--
ALTER TABLE `writing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
