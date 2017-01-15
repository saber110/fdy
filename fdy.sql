-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-01-15 12:25:53
-- 服务器版本： 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.1.0-5+deb.sury.org~xenial+1

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
  `average` int(11) NOT NULL COMMENT '平均得分',
  `exam_num` int(11) NOT NULL COMMENT '考试总次数',
  `remark` text NOT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学院分块';

--
-- 转存表中的数据 `college`
--

INSERT INTO `college` (`id`, `college`, `staff`, `score`, `average`, `exam_num`, `remark`) VALUES
(1, '物理院', 1, 98, 98, 1, ''),
(2, '物理院', 1, 98, 98, 1, ''),
(3, '物理院', 1, 98, 98, 1, ''),
(4, '物理院', 1, 98, 98, 1, '');

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
(1, '论述你是不是男的 ', '这特么有啥说的,绝交', '2017-01-02 02:00:00'),
(2, '论述你是不是男的 ', '这特么有啥说的,绝交db', '2017-01-02 02:00:00'),
(3, '论述你是不是男的 ', '这特么有啥说的,绝交bhg', '2017-01-02 02:00:00'),
(4, '论述你是不是男的 bhg', '这特么有啥说的,绝交db', '2017-01-02 02:00:00'),
(5, '论述你是不是男的 ', '这特么有啥说的,绝交', '2017-01-02 02:00:00'),
(6, '论述你是不是男的 ', '这特么有啥说的,绝交db', '2017-01-02 02:00:00'),
(7, '论述你是不是男的 ', '这特么有啥说的,绝交bhg', '2017-01-02 02:00:00'),
(8, '论述你是不是男的 bhg', '这特么有啥说的,绝交db', '2017-01-02 02:00:00');

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
  `last_score` int(11) NOT NULL COMMENT '最新考试得分',
  `phone` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='考试记录';

--
-- 转存表中的数据 `examination`
--

INSERT INTO `examination` (`id`, `yb_userid`, `yb_username`, `name`, `college`, `count`, `last_score`, `phone`, `email`) VALUES
(1, 7041045, '胡皓斌', '胡皓斌', '物电院', 10, 98, '15675123342', 'huhaobin110@gmail.com'),
(2, 7041045, '胡皓斌', '胡皓斌', '物电院', 11, 67, '15675123342', 'huhaobin110@gmail.com'),
(3, 7041045, '胡皓斌', '胡皓斌', '物电院', 13, 94, '15675123342', 'huhaobin110@gmail.com'),
(4, 7041045, '胡皓斌', '胡皓斌', '物电院', 15, 93, '15675123342', 'huhaobin110@gmail.com'),
(5, 7041045, '胡皓斌', '胡皓斌', '物电院', 17, 91, '15675123342', 'huhaobin110@gmail.com'),
(6, 7041045, '胡皓斌', '胡皓斌', '物电院', 14, 28, '15675123342', 'huhaobin110@gmail.com'),
(7, 7041045, '胡皓斌', '胡皓斌', '物电院', 15, 68, '15675123342', 'huhaobin110@gmail.com'),
(8, 7041045, '胡皓斌', '胡皓斌', '物电院', 12, 78, '15675123342', 'huhaobin110@gmail.com');

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
(1, '测试', 0, 0, 3, '2017-01-15 04:03:41', '');

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
(1, '不通过发挥一般', '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-15 01:28:05'),
(2, '发热发任务', '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-15 01:28:05'),
(3, '成人反而', '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-15 01:28:05'),
(4, '肺热rgftg6', '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-15 01:28:05'),
(5, '否认它果然他也会', '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-15 01:28:05'),
(6, '更讨厌仁和堂', '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 4, 0, 2, 'AB', 0, 0, '2017-01-15 03:28:52'),
(7, 'ferwg64', '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-15 01:28:05'),
(8, 'frtew', '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-15 01:28:05'),
(9, 'f惹我发给我', '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-15 01:28:05'),
(10, '非惹我g', '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-15 01:28:05'),
(11, ' 烦而无法w', '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-15 01:28:05'),
(12, '反而为各位', '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-15 01:28:05'),
(13, '股份二哥', '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-15 01:28:05'),
(14, '个问题', '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-15 01:28:05'),
(15, '围观围观', '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-15 01:28:05'),
(16, '哥哥我', '老实说,你是不是喜欢某某', '关你鸟事', '就是不告诉你', '凭什么要告诉你', '我又不认识你', '你是谁啊', '', '', 4, 0, 2, 'ABC', 0, 0, '2017-01-15 01:28:05');

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
  `fenzhi` int(11) NOT NULL COMMENT '分值',
  `quoted_num` int(11) NOT NULL COMMENT '被抽到的次数',
  `wrong_num` int(11) NOT NULL COMMENT '答错的次数',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '题库上传时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='单选题库';

--
-- 转存表中的数据 `radio`
--

INSERT INTO `radio` (`id`, `topic`, `option_A`, `option_B`, `option_C`, `option_D`, `anwser`, `fenzhi`, `quoted_num`, `wrong_num`, `time`) VALUES
(1, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', 2, 0, 0, '2017-01-14 13:16:56'),
(2, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', 2, 1, 0, '2017-01-14 13:16:56'),
(3, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', 2, 0, 0, '2017-01-14 13:16:56'),
(4, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', 2, 1, 0, '2017-01-14 13:16:56'),
(5, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', 2, 0, 0, '2017-01-14 13:16:56'),
(6, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', 2, 1, 0, '2017-01-14 13:16:56'),
(7, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', 2, 0, 0, '2017-01-14 13:16:56'),
(8, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', 2, 1, 0, '2017-01-14 13:16:56'),
(9, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', 2, 0, 0, '2017-01-14 13:16:56'),
(10, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', 2, 1, 0, '2017-01-14 13:16:56'),
(11, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', 2, 0, 0, '2017-01-14 13:16:56'),
(12, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', 2, 1, 0, '2017-01-14 13:16:56'),
(13, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', 2, 0, 0, '2017-01-14 13:16:56'),
(14, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', 2, 1, 0, '2017-01-14 13:16:56'),
(15, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', 2, 0, 0, '2017-01-14 13:16:56'),
(16, '这是一条神奇的天路哎', '保研', '工作', '打麻将', '喝酒', 'A', 2, 1, 0, '2017-01-14 13:16:56');

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
(1, '这是一个优秀的人类', '恩,是的.很优秀', '2017-01-01 16:28:00'),
(2, '这是一个优秀的人类', '恩,是的.很优秀', '2017-01-01 16:28:00'),
(3, '这是一个优秀的人类', '恩,是的.很优秀', '2017-01-01 16:28:00'),
(4, '这是一个优秀的人类', '恩,是的.很优秀', '2017-01-01 16:28:00'),
(5, '这是一个优秀的人类', '恩,是的.很优秀', '2017-01-01 16:28:00'),
(6, '这是一个优秀的人类', '恩,是的.很优秀', '2017-01-01 16:28:00'),
(7, '这是一个优秀的人类', '恩,是的.很优秀', '2017-01-01 16:28:00'),
(8, '这是一个优秀的人类', '恩,是的.很优秀', '2017-01-01 16:28:00');

-- --------------------------------------------------------

--
-- 表的结构 `TorF`
--

CREATE TABLE `TorF` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL COMMENT '题目',
  `fenzhi` int(11) NOT NULL COMMENT '分值',
  `anwser` tinyint(1) NOT NULL COMMENT '答案(1为正确)',
  `quoted_num` int(11) NOT NULL COMMENT '引用数',
  `wrong_num` int(11) NOT NULL COMMENT '错误数',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '题库上传时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='判断题';

--
-- 转存表中的数据 `TorF`
--

INSERT INTO `TorF` (`id`, `topic`, `fenzhi`, `anwser`, `quoted_num`, `wrong_num`, `time`) VALUES
(1, '你爱学习吗', 2, 1, 0, 0, '2017-01-15 03:57:19'),
(2, '你爱学习吗', 2, 0, 0, 0, '2017-01-14 13:59:35'),
(3, '你爱学习吗', 2, 0, 0, 0, '2017-01-14 13:59:35'),
(4, '你爱学习吗', 2, 0, 0, 0, '2017-01-14 13:59:35'),
(5, '你爱学习吗', 2, 0, 0, 0, '2017-01-14 13:59:35'),
(6, '你爱学习吗', 2, 0, 0, 0, '2017-01-14 13:59:35'),
(7, '你爱学习吗', 2, 0, 0, 0, '2017-01-14 13:59:35'),
(8, '你爱学习吗', 2, 0, 0, 0, '2017-01-14 13:59:35');

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
(1, '就学生组织写一片论述', '哦', '2017-01-01 16:00:38'),
(2, '就学生组织写一片论述drtfygu', '哦', '2017-01-01 16:00:38');

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
-- Indexes for table `TorF`
--
ALTER TABLE `TorF`
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
-- 使用表AUTO_INCREMENT `college`
--
ALTER TABLE `college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `Discussion`
--
ALTER TABLE `Discussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `examination`
--
ALTER TABLE `examination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `kaoshi`
--
ALTER TABLE `kaoshi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '考试序号', AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `Multiple`
--
ALTER TABLE `Multiple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- 使用表AUTO_INCREMENT `radio`
--
ALTER TABLE `radio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- 使用表AUTO_INCREMENT `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `Short_answer`
--
ALTER TABLE `Short_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `TorF`
--
ALTER TABLE `TorF`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `writing`
--
ALTER TABLE `writing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
