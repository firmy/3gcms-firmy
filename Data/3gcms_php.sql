-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 03 月 04 日 01:58
-- 服务器版本: 5.1.59-community
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `3gcms_php`
--

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_access`
--

CREATE TABLE IF NOT EXISTS `3gcms_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `module` varchar(50) DEFAULT NULL,
  `pid` int(11) NOT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_ad`
--

CREATE TABLE IF NOT EXISTS `3gcms_ad` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `content` text,
  `description` text,
  `addtime` varchar(32) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `3gcms_ad`
--

INSERT INTO `3gcms_ad` (`id`, `title`, `content`, `description`, `addtime`, `status`, `type`) VALUES
(28, '顶部banner1000*205PX', '<a href="http://www.3gcms.cn"><img src="/Public/Uploads/ad/banner.png"/></a>', '', '2013-03-01 17:11:33', 1, 0),
(29, '首页中右广告', '<img src="/Public/Uploads/ad/1361775546.gif"/>', '', '2013-02-25 14:59:10', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_admin`
--

CREATE TABLE IF NOT EXISTS `3gcms_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lastlogintime` int(10) NOT NULL,
  `lastloginip` varchar(20) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `3gcms_admin`
--

INSERT INTO `3gcms_admin` (`id`, `username`, `password`, `lastlogintime`, `lastloginip`, `status`) VALUES
(1, 'admin', '74b69670034a38e84a0b2b67b5f1c4cd', 1362123561, '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_article`
--

CREATE TABLE IF NOT EXISTS `3gcms_article` (
  `aid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) DEFAULT NULL,
  `titlecolor` varchar(80) DEFAULT NULL,
  `author` char(20) DEFAULT NULL,
  `keywords` char(40) DEFAULT NULL,
  `description` mediumtext,
  `note` mediumtext,
  `linkurl` char(100) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '0',
  `copyfrom` varchar(100) DEFAULT NULL,
  `addtime` varchar(32) DEFAULT NULL,
  `islink` tinyint(1) unsigned DEFAULT '0',
  `isflash` tinyint(1) DEFAULT '0',
  `istop` tinyint(1) unsigned DEFAULT '0',
  `isimg` tinyint(1) unsigned DEFAULT '0',
  `imgurl` varchar(255) DEFAULT NULL,
  `ishot` tinyint(1) unsigned DEFAULT '0',
  `pagenum` int(8) unsigned DEFAULT '0',
  `hits` mediumint(9) DEFAULT '1',
  `content` longtext,
  `typeid` smallint(5) unsigned DEFAULT NULL,
  `voteid` int(10) unsigned DEFAULT '0',
  `price` varchar(5000) DEFAULT NULL,
  `color` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- 转存表中的数据 `3gcms_article`
--

INSERT INTO `3gcms_article` (`aid`, `title`, `titlecolor`, `author`, `keywords`, `description`, `note`, `linkurl`, `status`, `copyfrom`, `addtime`, `islink`, `isflash`, `istop`, `isimg`, `imgurl`, `ishot`, `pagenum`, `hits`, `content`, `typeid`, `voteid`, `price`, `color`) VALUES
(55, '亿瑞达企业概况', NULL, '未知', '', '', '...', NULL, 1, '', '2013-02-20 14:10:21', 0, 0, 0, 0, NULL, 0, NULL, 16, '<span style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">企业概况写在这里fdsfdsffdfdf</span>', 15, NULL, NULL, NULL),
(56, '企业文化', NULL, '未知', '', '', '', NULL, 1, '', '2013-02-20 15:18:15', 0, 0, 0, 0, NULL, 0, 0, 7, '<span style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">企业文化写这里</span>', 16, 0, NULL, NULL),
(57, '企业荣誉', NULL, '未知', '', '', '企业荣誉放这里', NULL, 1, '', '2013-02-20 15:18:38', 0, 0, 0, 0, NULL, 0, 0, 6, '企业荣誉放这里', 17, 0, NULL, NULL),
(58, '信息时代不用手机,活得很糟糕?', NULL, '不详', '', '', '“我', NULL, 1, '网络', '2013-02-20 15:19:04', 0, 0, 0, 0, NULL, 0, 0, 8, '<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">“我没有智能手机。我甚至一部手机也没有。”</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">Roz Warren 是一名 57 岁的大叔，在图书馆工作，在给《纽约时报》的撰稿中，他从一个非手机用户的角度，描述了自手机出现后，身边的人荒诞的行为。当然，这些行为在你我看来也许再正常不过。 没有手机给 Roz 的生活带来不少方便。比如当他跟朋友约好下午 1 点在星巴克见面，朋友在 12：50 没办法打电话告诉他：“我得迟一点，大概 20 分钟。”这迫使朋友不得不准时出现。而如果朋友无法准时，Roz 也能预料到。</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">然而在有手机的人那里，约会是另一种情形。首先，“1 点星巴克见”并不意味着真的是 1 点，甚至也不是在星巴克。当你出现在星巴克附近时，你就开始跟对方电话： ——我下地铁了。 ——我在停车。 ——我现在从 XX 路口走下来。 ——你在路的哪边？ ——我看到你了。右边，我在挥手。 ——我也看到了。</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">Roz 把这形象地称为“Smartphone Tango（智能手机探戈）”。没有手机，他自然无法参与其中，自私地剥夺了朋友的乐趣。他可不想获得这种手机乐趣。在他看来，人们过于追求手机所带来的兴奋，而这些“症状”被他称为“cellgasms（cell+orgasm）”——这就不只是 Smartphone Tango，而是任何与智能手机互动所带来的兴奋，人们已经对手机上瘾了。</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">有一天 Roz 与朋友 Deb 去纽约。结果在地铁上，Deb 发现自己的 iPhone 落在家里，那个下午，她无数次提到自己没有带电话，时不时拍下口袋，仿佛她身体丢失的某部分会突然出现。基于手机的一切乐趣——搜索、更新状态、发信息——都丢失了。她只能毫无联系地待在那一刻那个地方，就像很多年前她没有智能手机一样。 Roz 自认过时，要联系他，可以打固话，如果他不在家，你可以留言。在这 57 年里，他认为没有什么事情如此重要，需要立刻联系上，无法等到他回到家。特别当他儿子已经长大，他不需要被叫到学校校医室，而他的图书馆工作更需要保持安静。</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">如果有紧急灾难呢？没有手机如何求助？Roz 觉得这个问题很可笑，难道带着一部手机就是为了以防万一？手机真的能在紧要关头救你一命？Roz 认为带着手机更多时候只是在最后一刻跟亲友道别。而他不打算这样做，如果那一刻真的来临，他希望尖叫着、怒吼着，绝望地试图跟上帝讨价还价，如原始人般。 何伟在《寻路中国》一开始就讲到他在中国的“神奇”经历：当他在公路上开着车，农民们在路上晒谷子，特别欢迎他将车轮碾过去。我看了觉得一点都不新奇，但接下来何伟一句话就点醒了我：这同时违反了交通安全和食品安全的法律。 如果你问我为什么要在一个科技网站介绍一个非手机用户的观点，我只能说我们时不时需要换个角度看问题。好不容易放假回到家中，你仍低着头玩手机，可能有时你会后悔，觉得是不是该陪陪爸妈说说话，但实在躲不开手机的诱惑。这难道不反常？甚至我们的情感也寄托在手机上：多少女生因为男朋友没有及时回复自己短信，没有经常打电话，积怨已久，某天突然在电话那端提出分手。</p>', 19, 0, NULL, NULL),
(59, '通过手机网络发展潜在客户', NULL, '不详', '', '', '年轻...', NULL, 1, '网络', '2013-02-20 15:33:55', 0, 0, 0, 0, NULL, 0, NULL, 22, '<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">年轻有为的程序员 Luke Thomas 不仅喜欢写程序，还十分上心与发展客户 / 用户的技巧。用他自己的话说，“让一个项目从企划成为现实真是太美妙了”。</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">他认为，一个创业计划在上路的时候是最为艰难的，因为一切都还只是一片空白。对于如何通过网络渠道发展潜在客户，Luke 在博客中分享了自己的秘诀。 利用搜索引擎 Luke 推荐的是 Google 关键字工具（Google Adwords Keyword Tool）。假设有一位创业者想办一家车险公司，创业者在宣传中既可以说自己经营的是“汽车保险（car insurance）”，也可以说自己经营的是“车辆保险（auto insurance）”。</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">Google 关键字工具提供的信息会显示，人们搜索“汽车保险（car insurance）”的次数比“车辆保险（auto insurance）”要多，所以选择前者更符合消费者的兴趣。 这种做法的理论依据是“使用消费者的惯用语言”。除了利用搜索引擎外，Luke 还推荐了阅读相关书籍、阅读业内博客、逛行业论坛、逛行业相关社交群组、与业内人士聚会等办法。</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">鉴于国内的情况，Google 能帮上忙的地方可能不多，百度似乎没有提供类似于 Google 关键字工具的服务，但有一个“百度指数搜索”。通过这个工具我们可以获知，对 36 氪感兴趣的网友主要分布在北京、上海、广州、杭州，以男性居多（81.64%），他们多数是 IT 从业者，大部分人的年龄在 30 至 39 岁之间。 如何应用国内搜索引擎提供的数据服务帮助自己发展潜在客户 / 用户呢？大家可以摸索摸索。 利用社交网络的公共主页 Luke 认为，Facebook 等社交网络的兴起极大地简化了市场调研的过程。他举例，一个创业者准备入驻自主学习（Homeschool）行业，社交网络的公共主页就是他最好的市场信息来源。关注自主学习在 Facebook 上的粉丝页，可以看到这个组群里有超过 20000 人。他们最热议的话题是，应该选用哪一本教材。怎样，有灵感了吗？ Luke 表示，这些公共主页的价值不仅如此，你可以给群组内的成员发信息，与他们进一步沟通。你还可以一个一个地点开这些组内成员的个人主页，看看他们的兴趣所在，说不定会有惊人的发现。</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">利用微博名人 Luke 建议创业者们去搜索一下自己行业内的 Twitter 名人，比如那个准备入驻自主学习行业的创业者就可以在 Twitter 上搜索 Homeschool，看看哪些名字在圈子里面是最有价值的。新浪微博也有搜索的功能，我们通过标签搜索“创业”，可以看到李开复、薛蛮子等人。 找到名人了然后呢，直接给他们发信息让对方 @你吗？当然不是。Luke 建议大家还是脚踏实地，一步一步来，先在小圈子内培养自己的名声，做出一定成果后再去联系他们。当你的名字出现在这些大咖的页面上，这就是很好的推广。 学会发信息找到若干潜在客户 / 用户后，如何经营和他们的关系，从他们身上获取可贵的市场信息呢？发一封电邮不乏为真诚且恰当的做法。邮件内容要简单，没有任何的导向性，这样获取的信息才不会有失偏颇。比如：在 XXX 领域，如果你有能力，你最愿意优化 ____？</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">假设你要上线一个网站，你可以直接发去两个网站入口，询问对方更加偏好哪一种。面对大量的采访信息，你可能需要借助于一些数据分析软件来帮助分析结论。 对于如何问问题，这里面有一些讲究。使用选择题会使答案受限于几个你预设的框架，而开放性问题容易答非所问。Luke 表示，自己曾向潜在客户咨询某领域的优化建议，结果对方回复他，该被优化的是 Safari 浏览器，这显然不是他要的结果。福特汽车创始人、让汽车普及的 Henry Ford 有名言：“如果我当时问大众需要什么，大家只会告诉我，他们要跑得更快的马儿。” 推己及人不论你采取哪种方法，请记住推己及人。与潜在客户交洽时把自己放在对方的位置上，让他们感到舒服。</p>', 19, NULL, NULL, NULL),
(60, '招小工1.21发布', NULL, '不详', '', '', '新增...', NULL, 1, '网络', '2013-02-20 15:34:28', 0, 0, 0, 0, NULL, 1, NULL, 20, '<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">新增： 1、入口页面UI美化 2、手机客户端访问识别。 3、非手机客户端访问用到某些功能时，提示安装客户端 修正： 1、入口页布局 2、个人中心页布局 3、图片云上传机制优化。</p>', 20, NULL, NULL, NULL),
(72, '测试测试哈哈哈', NULL, '不详', '', '', 'dfdfsfdfdfdfdfdff\r\n\r\n\r\n	中文测试\r\n\r\n\r\n	\r\n\r\n\r\n	牛人\r\n\r\n\r\n	dfdfdsf...', NULL, 1, '网络', '2013-02-27 14:32:57', 0, 0, 0, 0, NULL, 0, NULL, 2, '<p>\r\n	dfdfsfdfdfdfdfdff\r\n</p>\r\n<p>\r\n	中文测试\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	牛人\r\n</p>\r\n<p>\r\n	dfdfdsf\r\n</p>', 19, NULL, NULL, NULL),
(61, '找小工手机客户端1.2发布', NULL, '不详', '', '', '新增...', NULL, 1, '网络', '2013-02-20 15:34:59', 0, 0, 0, 0, NULL, 0, NULL, 29, '<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">新增功能： 1、工人头像设置 2、工人工具箱拍照，施工现场拍照，相册管理，相册图片百度云存储（访问速度更快）。 3、分享客户端软件：短信分享、二维码分享、邮件分享 4、脱机收藏，收藏工人联系信息，脱机时查看 5、入口页面菜单调整 修正： 1、修正列表页下拉刷新加载数据的BUG 2、修正版本升级时检测出错 3、修正客户端登录检测</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;"></p>', 20, NULL, NULL, NULL),
(62, '公司公告内测1', NULL, '未知', '', '', '', NULL, 1, '', '2013-02-20 15:35:50', 0, 0, 0, 0, NULL, 0, 0, 8, '<span style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1 公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1 公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1 公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1公司公告内测1</span>', 21, 0, NULL, NULL),
(63, '3gCMS内测中', NULL, '未知', '', '', '', NULL, 1, '', '2013-02-20 15:36:17', 0, 0, 0, 0, NULL, 0, 0, 7, '<span style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">3gCMS内测中，在使用的过程中，可能会遇到一些问题，我们会在后续的版本解决。 如果有你建议，请到我们团队的博客中留言。 关注我们的博客:http://blog.zhaoxiaogong.com</span>', 21, 0, NULL, NULL),
(64, '3gcms源码下载', NULL, '未知', '', '型号: 价格：免费 颜色:', '', NULL, 1, '', '2013-02-20 15:38:45', 0, 0, 0, 1, '/Public/Uploads/thumb/thumb_1361345900.gif', 0, 0, 5, '<div align="center"><img src="/Public/Uploads/thumb/thumb_1361345900.gif" /></div>\r\n<div align="center"><br />\r\n</div>\r\n<div align="center"><span style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;text-align:start;background-color:#f9f9f9;">3gcms源码下载</span></div>\r\n<br />', 23, 0, NULL, NULL),
(65, '安卓客户端开发', NULL, '未知', '', '型号: 价格：面议 颜色:', '', NULL, 1, '', '2013-02-20 15:40:11', 0, 0, 0, 1, '/Public/Uploads/thumb/thumb_1361345991.png', 0, 0, 5, '<div align="center"><img src="/Public/Uploads/thumb/thumb_1361345991.png" /></div>\r\n<div align="center"><br />\r\n</div>\r\n<span style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">Android手机应用客户端开发和定制针对手机服务端的开发。</span>', 23, 0, NULL, NULL),
(66, '移动客户端网站开发', NULL, '未知', '', '型号: 价格：面议 颜色:', '移动', NULL, 1, '', '2013-02-20 15:42:28', 0, 0, 0, 1, '/Public/Uploads/thumb/thumb_1361346126.png', 0, 0, 8, '<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">移动客户端网站开发。</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">为客户提供基于移动设备（包括：手机，IPAD等）网站开发服务。</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;">设计开发适配于移动设备的网站。</p>\r\n<p style="color:#333333;font-family:Helvetica, Arial, sans-serif;font-size:medium;line-height:normal;background-color:#f9f9f9;"><br />\r\n<div align="center"><img src="/Public/Uploads/thumb/thumb_1361346126.png" /></div>\r\n</p>', 24, 0, NULL, NULL),
(67, '招聘UI设计师', NULL, '未知', '', '待遇面议名额:1', '...', NULL, 1, '', '2013-02-20 15:45:09', 0, 0, 0, 0, NULL, 0, NULL, 6, '<h3 class="ui-li-heading" style="font-size:16px;margin:0.6em 0px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;color:#333333;font-family:Helvetica, Arial, sans-serif;line-height:normal;"><span style="font-size:12px;font-weight:normal;">熟练使用图形处理相关工具。</span></h3>\r\n<p class="ui-li-desc" style="margin-top:-0.5em;margin-bottom:0.6em;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;color:#333333;font-family:Helvetica, Arial, sans-serif;line-height:normal;">对互联网产品的交互设计有着较深的理解。</p>\r\n<p class="ui-li-desc" style="margin-top:-0.5em;margin-bottom:0.6em;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;color:#333333;font-family:Helvetica, Arial, sans-serif;line-height:normal;">移动互联网开发经验者优先。</p>', 25, NULL, NULL, NULL),
(73, 'dfdfsf', NULL, '不详', '', '', 'dfdfdsfdff\r\n\r\n\r\n	sdfdsffdfdfdf\r\n\r\n\r\n	sdffdfd...', NULL, 1, '网络', '2013-02-27 14:56:27', 0, 0, 0, 0, NULL, 0, NULL, 1, '<p>\r\n	dfdfdsfdff\r\n</p>\r\n<p>\r\n	sdfdsffdfdfdf\r\n</p>\r\n<p>\r\n	<span style="font-size:12px;line-height:1.5;">sdffdfd</span>\r\n</p>\r\n<p>\r\n	dfsdfdsfdsfdsfdffdfdfdf\r\n</p>', 19, NULL, NULL, NULL),
(68, '招聘PHP开发人员', NULL, '未知', '', '待遇4K-6k名额:2', '...', NULL, 1, '', '2013-02-20 15:46:25', 0, 0, 0, 0, NULL, 0, NULL, 5, '<h3 class="ui-li-heading" style="font-size:16px;margin:0.6em 0px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;color:#333333;font-family:Helvetica, Arial, sans-serif;line-height:normal;"><span style="font-size:12px;font-weight:normal;">精通PHP +mysql开发，至少熟练掌握一个框架！有项目开发经验</span></h3>', 25, NULL, NULL, NULL),
(69, '找小工手机应用', NULL, '未知', '找小工', '型号: 价格：面议 颜色:', 'hehehehefdfdfdfdfdff...', NULL, 1, '', '2013-02-25 10:55:22', 0, 0, 0, 1, '/Public/Uploads/thumb/thumb_1361760876.gif', 1, NULL, 6, '<div align="center"><img src="/Public/Uploads/thumb/thumb_1361760876.gif" /></div>\r\nhehehehefdfdfdfdfdff', 23, NULL, NULL, NULL),
(70, 'PHP项目开发', NULL, '未知', '', '型号: 价格：面议 颜色:', 'hehehe fdfdfdfdff', NULL, 1, '', '2013-02-25 10:56:26', 0, 0, 0, 1, '/Public/Uploads/thumb/thumb_1361760979.gif', 0, 0, 22, '<div align="center"><img src="/Public/Uploads/thumb/thumb_1361760979.gif" /></div>\r\nhehehe fdfdfdfdff', 23, 0, NULL, NULL),
(71, '网站项目开发', NULL, '未知', '', '型号: 价格：面议 颜色:', '网站项目开发...', NULL, 1, '', '2013-03-01 16:52:30', 0, 0, 0, 1, '/Public/Uploads/thumb/thumb_1361761012.gif', 0, NULL, 13, '<div align=\\"\\\\&quot;center\\\\&quot;\\">\r\n	网站项目开发\r\n</div>', 23, NULL, '3000以上', '红色,黄色');

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_config`
--

CREATE TABLE IF NOT EXISTS `3gcms_config` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `updown` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `sitetitle` text,
  `sitetitle2` text,
  `sitedescription` text,
  `siteurl` text,
  `sitetpl` varchar(32) NOT NULL DEFAULT 'default',
  `sitekeywords` text NOT NULL,
  `sitetcp` text NOT NULL,
  `sitelang` tinyint(1) NOT NULL DEFAULT '0',
  `watermark` tinyint(1) NOT NULL DEFAULT '0',
  `watermarkimg` text NOT NULL,
  `sitelx` text NOT NULL,
  `indexrec` tinyint(2) unsigned NOT NULL,
  `indexhot` tinyint(2) unsigned NOT NULL,
  `flashmode` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `noticeid` int(5) unsigned NOT NULL,
  `noticenum` tinyint(2) unsigned NOT NULL,
  `rollnum` tinyint(2) unsigned NOT NULL,
  `isping` tinyint(1) unsigned NOT NULL,
  `sitelogo` text NOT NULL,
  `iszy` tinyint(1) unsigned NOT NULL,
  `pingoff` tinyint(1) unsigned NOT NULL,
  `postovertime` tinyint(2) unsigned NOT NULL DEFAULT '15',
  `bookoff` tinyint(1) unsigned NOT NULL,
  `mood` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ishits` tinyint(1) unsigned NOT NULL,
  `iscopyfrom` tinyint(1) unsigned NOT NULL,
  `isauthor` tinyint(1) unsigned NOT NULL,
  `indexvote` tinyint(2) unsigned NOT NULL,
  `xgwz` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ishomeimg` int(11) unsigned NOT NULL,
  `mouseimg` tinyint(1) unsigned NOT NULL,
  `artlistnum` int(2) unsigned NOT NULL,
  `artlisthot` tinyint(2) unsigned NOT NULL,
  `artlistrec` tinyint(2) unsigned NOT NULL,
  `articlehot` tinyint(2) unsigned NOT NULL,
  `articlerec` tinyint(2) unsigned NOT NULL,
  `urlmode` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `suffix` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `indexlink` tinyint(1) NOT NULL DEFAULT '1',
  `indexpic` tinyint(1) NOT NULL DEFAULT '1',
  `indexpicnum` tinyint(2) NOT NULL DEFAULT '4',
  `indexpicscroll` tinyint(1) NOT NULL DEFAULT '0',
  `indexnoticetitle` varchar(32) NOT NULL,
  `indexrectitle` varchar(32) NOT NULL,
  `indexhottitle` varchar(32) NOT NULL,
  `indexlinktitle` varchar(32) NOT NULL,
  `indexlinkimg` tinyint(1) NOT NULL DEFAULT '0',
  `indexdiylink` tinyint(1) NOT NULL DEFAULT '1',
  `listrectitle` varchar(32) NOT NULL,
  `listhottitle` varchar(32) NOT NULL,
  `listshowmode` tinyint(1) NOT NULL DEFAULT '0',
  `artrectitle` varchar(32) NOT NULL,
  `arthottitle` varchar(32) NOT NULL,
  `indexvotetitle` varchar(32) NOT NULL,
  `indexpictitle` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `3gcms_config`
--

INSERT INTO `3gcms_config` (`id`, `updown`, `sitetitle`, `sitetitle2`, `sitedescription`, `siteurl`, `sitetpl`, `sitekeywords`, `sitetcp`, `sitelang`, `watermark`, `watermarkimg`, `sitelx`, `indexrec`, `indexhot`, `flashmode`, `noticeid`, `noticenum`, `rollnum`, `isping`, `sitelogo`, `iszy`, `pingoff`, `postovertime`, `bookoff`, `mood`, `ishits`, `iscopyfrom`, `isauthor`, `indexvote`, `xgwz`, `ishomeimg`, `mouseimg`, `artlistnum`, `artlisthot`, `artlistrec`, `articlehot`, `articlerec`, `urlmode`, `suffix`, `indexlink`, `indexpic`, `indexpicnum`, `indexpicscroll`, `indexnoticetitle`, `indexrectitle`, `indexhottitle`, `indexlinktitle`, `indexlinkimg`, `indexdiylink`, `listrectitle`, `listhottitle`, `listshowmode`, `artrectitle`, `arthottitle`, `indexvotetitle`, `indexpictitle`) VALUES
(1, 1, '亿瑞达科技', '亿瑞达', '亿瑞达科技', 'http://localhost:99', 'default', '亿瑞达科技', '移ICP备123456', 0, 0, 'logo.png', '站长QQ:279197963', 5, 8, 1, 5, 5, 1, 0, 'logo.png', 1, 1, 15, 1, 1, 1, 1, 1, 1, 1, 5, 1, 15, 10, 5, 10, 5, 2, 0, 1, 1, 4, 0, '站内公告', '推荐文章', '热点排行', '友情链接', 1, 1, '推荐文章', '热点排行', 1, '推荐文章', '热点排行', '热门投票', '推荐图文');

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_extend_fieldes`
--

CREATE TABLE IF NOT EXISTS `3gcms_extend_fieldes` (
  `field_id` int(11) NOT NULL AUTO_INCREMENT,
  `show_text` varchar(80) CHARACTER SET utf8 DEFAULT NULL,
  `field_name` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `field_type` int(11) DEFAULT NULL COMMENT '0:单行文本1:多行文本2:编辑器3:下拉列表4:radio 5:多选列表6:多选按钮7:文件上传',
  `set_option` varchar(5000) CHARACTER SET utf8 DEFAULT NULL COMMENT '显示文本|值,显示文本|值',
  `default_option` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `orders` int(11) DEFAULT '255' COMMENT '排序',
  `css` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'css样式控制',
  PRIMARY KEY (`field_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `3gcms_extend_fieldes`
--

INSERT INTO `3gcms_extend_fieldes` (`field_id`, `show_text`, `field_name`, `field_type`, `set_option`, `default_option`, `orders`, `css`) VALUES
(2, '产品价格', 'price', 0, NULL, '', 1, ''),
(3, '产品颜色', 'color', 5, '红色,绿色,蓝色,黄色', '红色,蓝色,黄色', 2, '');

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_extend_show`
--

CREATE TABLE IF NOT EXISTS `3gcms_extend_show` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeid` int(11) DEFAULT NULL COMMENT '栏目ID',
  `field_id` int(11) DEFAULT NULL COMMENT '扩展字段ID',
  `is_show` int(11) DEFAULT '0' COMMENT '0:不显示1：显示',
  `orders` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `3gcms_extend_show`
--

INSERT INTO `3gcms_extend_show` (`id`, `typeid`, `field_id`, `is_show`, `orders`) VALUES
(8, 23, 2, 1, 1),
(9, 23, 3, 1, 2),
(10, 24, 2, 0, 1),
(11, 24, 3, 0, 2);

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_flash`
--

CREATE TABLE IF NOT EXISTS `3gcms_flash` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `rank` mediumint(5) unsigned NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_guestbook`
--

CREATE TABLE IF NOT EXISTS `3gcms_guestbook` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(32) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` text NOT NULL,
  `addtime` varchar(20) NOT NULL,
  `recontent` text NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `tel` varchar(20) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `3gcms_guestbook`
--

INSERT INTO `3gcms_guestbook` (`id`, `author`, `title`, `content`, `addtime`, `recontent`, `status`, `tel`, `ip`) VALUES
(1, '游客', NULL, '我是第一个留言的', '2011-11-09 16:26:45', '', 1, NULL, NULL),
(2, '游客', NULL, '不错啊', '2011-11-09 16:39:23', '', 1, NULL, NULL),
(3, '游客', NULL, '很好的cms', '2011-11-09 16:39:58', '', 1, NULL, NULL),
(4, '游客', NULL, '再整个论坛吧', '2011-11-09 16:40:31', '', 1, NULL, NULL),
(5, '游客', NULL, '还行,在看看', '2011-11-09 16:42:07', '', 1, NULL, NULL),
(6, '游客', NULL, 'no!so good!', '2011-11-09 16:46:02', '', 1, NULL, NULL),
(7, '游客', NULL, '输入代码搞破坏:&lt;div&gt;&lt;/html&gt;', '2011-11-09 16:46:37', '', 1, NULL, NULL),
(8, '游客', NULL, '威尼斯的泪,无人太绝对', '2011-11-09 16:47:17', '', 1, NULL, NULL),
(9, '游客', NULL, '马上要分页了哦', '2011-11-09 16:47:42', '', 1, NULL, NULL),
(10, '游客', NULL, '哈哈分页了', '2011-11-09 16:47:57', '有木有分页', 1, NULL, NULL),
(11, '游客', NULL, 'ajax分页,无刷新', '2011-11-09 16:48:26', '你牛啊', 1, NULL, NULL),
(12, '游客', NULL, 'fdsfdfdsffd', '2013-02-25 12:09:41', '', 1, NULL, NULL),
(13, '游客', NULL, '追影来测试留言', '2013-02-25 14:37:17', '', 1, NULL, NULL),
(14, '游客', '追影测试留言', '能不能改进哈留言', '2013-02-25 14:39:38', '', 1, '13438493226', '127.0.0.1'),
(15, '追影', '', '测试测试留言', '2013-02-27 11:17:50', '', 1, 'undefined', '127.0.0.1'),
(16, '杨梅', '', '我爱伟大祝国', '2013-02-27 11:21:26', '', 1, 'undefined', '192.168.1.104'),
(17, 'zhuiying', '', 'ceshiceshi', '2013-03-04 09:38:45', '', 1, 'undefined', '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_key`
--

CREATE TABLE IF NOT EXISTS `3gcms_key` (
  `id` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `rank` tinyint(2) unsigned NOT NULL,
  `num` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `3gcms_key`
--

INSERT INTO `3gcms_key` (`id`, `title`, `url`, `rank`, `num`) VALUES
(2, '百度', 'http://www.baidu.com', 1, 5),
(3, '搜狐', 'http://www.sohu.com', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_label`
--

CREATE TABLE IF NOT EXISTS `3gcms_label` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL,
  `content` text NOT NULL,
  `addtime` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `3gcms_label`
--

INSERT INTO `3gcms_label` (`id`, `title`, `content`, `addtime`, `status`) VALUES
(1, '网站统计', '<!-- 这里是统计代码1-->', '2011-12-24 10:34:27', 1),
(2, '首页自定义导航', '<li><a href="http://www.3gcms.cn"><span>3GCMS官网</span></a></li><LI class="menu_line2"></LI>', '2013-02-25 16:54:29', 1),
(3, '头部迷你导航左侧', '<a onclick=this.style.behavior="url(#default#homepage)";this.setHomePage("http://"+window.location.host+"__WEB__");><font color="black">设为首页</font></a>|<a onClick="window.external.AddFavorite(location.href,document.title)"><font color="black">加入收藏</font></a>|<a id="StranLink">繁体中文</a>', '2011-11-27 10:33:07', 1),
(4, '头部迷你导航右侧', '<script language="javascript" src="__WEB__/Web/Tpl/default/js/date.js"></script>', '2011-12-13 18:55:06', 1),
(5, '全局页面右侧分享', '<!-- JiaThis Button BEGIN -->\r\n<script type="text/javascript" src="http://v2.jiathis.com/code_mini/jiathis_r.js?move=0&amp;btn=r5.gif" charset="utf-8"></script>\r\n<!-- JiaThis Button END -->', '2011-11-27 12:34:26', 0),
(6, '文章页中分享代码', '<script src="__WEB__/Public/Web/js/wz.js"></script>', '2011-11-27 12:38:14', 1),
(7, '文章页上方收藏分享', '  <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt" target="_blank"><img src="http://v2.jiathis.com/code_mini/images/btn/v1/jiathis5.gif" border="0"/></a>\r\n<script type="text/javascript" src="http://v2.jiathis.com/code_mini/jia.js" charset="utf-8"></script>', '2013-02-28 15:06:17', 1);

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_link`
--

CREATE TABLE IF NOT EXISTS `3gcms_link` (
  `id` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `url` varchar(80) NOT NULL,
  `logo` text NOT NULL,
  `islogo` tinyint(1) unsigned NOT NULL,
  `rank` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `3gcms_link`
--

INSERT INTO `3gcms_link` (`id`, `title`, `url`, `logo`, `islogo`, `rank`, `status`) VALUES
(5, '腾讯', 'http://www.qq.com', '/Public/Uploads/link/1361776737.png', 1, 2, 1),
(4, '百度', 'http://www.baidu.com', '/Public/Uploads/link/1361775704.gif', 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_mood`
--

CREATE TABLE IF NOT EXISTS `3gcms_mood` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `mood1` mediumint(8) unsigned DEFAULT '0',
  `mood2` mediumint(8) unsigned DEFAULT '0',
  `mood3` mediumint(8) unsigned DEFAULT '0',
  `mood4` mediumint(8) unsigned DEFAULT '0',
  `mood5` mediumint(8) unsigned DEFAULT '0',
  `mood6` mediumint(8) unsigned DEFAULT '0',
  `mood7` mediumint(8) unsigned DEFAULT '0',
  `mood8` mediumint(8) unsigned DEFAULT '0',
  `aid` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- 转存表中的数据 `3gcms_mood`
--

INSERT INTO `3gcms_mood` (`id`, `mood1`, `mood2`, `mood3`, `mood4`, `mood5`, `mood6`, `mood7`, `mood8`, `aid`) VALUES
(1, 5, 0, 1, 0, 2, 0, 0, 0, 42),
(2, 0, 0, 0, 1, 2, 0, 0, 0, 47),
(3, 0, 0, 0, 1, 2, 0, 0, 0, 55),
(4, 0, 0, 0, 0, 1, 1, 0, 0, 10),
(5, 0, 0, 0, 0, 2, 0, 0, 0, 36),
(6, 0, 0, 1, 1, 2, 1, 1, 0, 53),
(7, 0, 0, 0, 0, 1, 0, 0, 0, 16),
(8, 0, 0, 0, 0, 0, 1, 0, 0, 17),
(9, 0, 0, 0, 0, 0, 1, 0, 0, 20),
(10, 0, 0, 0, 0, 0, 0, 0, 0, 52),
(11, 0, 0, 0, 0, 1, 0, 0, 0, 40),
(12, 0, 0, 0, 1, 1, 0, 0, 0, 22),
(13, 0, 0, 0, 0, 0, 0, 0, 0, 34),
(14, 0, 0, 0, 1, 0, 0, 0, 0, 29),
(15, 0, 0, 0, 0, 0, 0, 0, 0, 35),
(16, 0, 0, 0, 0, 0, 0, 0, 0, 5),
(17, 0, 0, 0, 0, 0, 0, 0, 0, 44),
(18, 0, 0, 0, 0, 0, 0, 0, 0, 21),
(19, 0, 0, 0, 1, 0, 0, 0, 0, 48),
(20, 0, 0, 0, 0, 0, 0, 0, 0, 59),
(21, 0, 0, 0, 0, 0, 0, 0, 0, 61),
(22, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(31, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 0, 0, 0, 0, 0, 0, 0, 0, 39),
(25, 0, 0, 0, 0, 0, 0, 0, 0, 63),
(26, 0, 0, 0, 0, 0, 0, 0, 0, 64),
(27, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 0, 0, 0, 0, 0, 0, 0, 0, 65),
(32, 0, 0, 0, 0, 0, 0, 0, 0, 46),
(33, 0, 0, 0, 1, 0, 0, 0, 0, 38),
(34, 0, 0, 0, 0, 0, 0, 0, 0, 19),
(35, 0, 0, 0, 0, 0, 0, 0, 0, 54),
(36, 0, 0, 0, 0, 0, 0, 0, 0, 27),
(37, 0, 0, 0, 0, 0, 0, 0, 0, 25),
(38, 0, 0, 0, 0, 0, 0, 0, 0, 28),
(39, 0, 0, 0, 1, 0, 0, 0, 0, 45),
(40, 0, 0, 0, 0, 0, 0, 0, 0, 51),
(41, 0, 0, 0, 0, 0, 0, 0, 0, 58),
(42, 0, 0, 0, 0, 0, 0, 0, 0, 68),
(43, 0, 0, 0, 0, 0, 0, 0, 0, 71),
(44, 0, 0, 0, 0, 0, 0, 0, 0, 56);

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_node`
--

CREATE TABLE IF NOT EXISTS `3gcms_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `title` varchar(100) NOT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_pl`
--

CREATE TABLE IF NOT EXISTS `3gcms_pl` (
  `id` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `aid` mediumint(5) unsigned NOT NULL,
  `author` varchar(40) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `ptime` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `recontent` text,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `3gcms_pl`
--

INSERT INTO `3gcms_pl` (`id`, `aid`, `author`, `ip`, `ptime`, `content`, `recontent`, `status`) VALUES
(1, 53, '小马', '127.0.0.1', '2011-10-31 19:05:43', '生活就是如此的悲哀', NULL, 1),
(2, 53, '小马', '127.0.0.1', '2011-10-31 19:06:01', '即便是上市以后，短暂的辉煌过后，婚恋网站如何做到收支平衡依然是最大的问题。寻找新的利润点。    ', NULL, 1),
(7, 22, 'niubi', '127.0.0.1', '2011-11-09 07:13:10', 'niubi', NULL, 1),
(8, 55, '大笔u', '127.0.0.1', '2011-11-09 15:34:49', '呵呵呵', NULL, 1),
(9, 53, 'ss', '127.0.0.1', '2011-11-09 15:38:14', 'niubi', NULL, 1),
(15, 38, '就阿萨德交换空间', '127.0.0.1', '2011-11-12 19:09:37', '不诉苦的说法', NULL, 1);

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_role`
--

CREATE TABLE IF NOT EXISTS `3gcms_role` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `3gcms_role`
--

INSERT INTO `3gcms_role` (`id`, `name`, `pid`, `status`, `remark`) VALUES
(1, 'super', NULL, 1, '超级管理员'),
(2, 'admin', NULL, 1, '受限管理员');

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_role_admin`
--

CREATE TABLE IF NOT EXISTS `3gcms_role_admin` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `3gcms_role_admin`
--

INSERT INTO `3gcms_role_admin` (`role_id`, `user_id`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_type`
--

CREATE TABLE IF NOT EXISTS `3gcms_type` (
  `typeid` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `typename` varchar(20) NOT NULL,
  `keywords` char(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `ismenu` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `isindex` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `indexnum` tinyint(2) unsigned NOT NULL,
  `islink` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `url` char(255) NOT NULL,
  `isuser` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `target` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `readme` varchar(255) NOT NULL,
  `drank` mediumint(5) unsigned NOT NULL,
  `irank` mediumint(5) NOT NULL,
  `fid` mediumint(5) unsigned NOT NULL,
  `path` varchar(128) NOT NULL,
  `show_fields` varchar(120) DEFAULT NULL,
  `list_path` varchar(250) DEFAULT 'list/list_default.html',
  `page_path` varchar(255) DEFAULT 'page/page_default.html',
  PRIMARY KEY (`typeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `3gcms_type`
--

INSERT INTO `3gcms_type` (`typeid`, `typename`, `keywords`, `description`, `ismenu`, `isindex`, `indexnum`, `islink`, `url`, `isuser`, `target`, `readme`, `drank`, `irank`, `fid`, `path`, `show_fields`, `list_path`, `page_path`) VALUES
(14, '关于我们', '', '', 1, 1, 10, 0, '', 1, 1, '', 10, 10, 0, '0', NULL, 'list/list_default.html', 'page/page_default.html'),
(15, '企业概况', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 14, '0-14', '1|0|0|0|0|0|0|0|0|0|1|1|0|0|0|0', 'list/list_default.html', 'page/page_default.html'),
(16, '企业文化', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 14, '0-14', '1|0|0|0|0|0|0|0|0|0|1|1|0|0|0|0', 'list/list_default.html', 'page/page_default.html'),
(17, '企业荣誉', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 14, '0-14', '1|0|0|0|0|0|0|0|0|0|1|1|0|0|0|0', 'list/list_default.html', 'page/page_default.html'),
(18, '新闻中心', '', '', 1, 1, 10, 0, '', 1, 1, '', 10, 10, 0, '0', NULL, 'list/list_default.html', 'page/page_default.html'),
(19, '行业新闻', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 18, '0-18', '1|0|0|1|1|1|0|0|0|0|1|1|1|1|0|0', 'list/list_default.html', 'page/page_default.html'),
(20, '公司新闻', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 18, '0-18', '1|0|0|1|1|1|0|0|0|0|1|1|1|1|0|0', 'list/list_default.html', 'page/page_default.html'),
(21, '公司公告', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 18, '0-18', '1|0|0|0|0|0|0|0|0|0|1|1|1|0|0|0', 'list/list_default.html', 'page/page_default.html'),
(22, '产品展示', '', '', 1, 1, 10, 0, '', 1, 1, '', 10, 10, 0, '0', NULL, 'list/list_product.html', 'page/page_product.html'),
(23, '移动互联网开发', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 22, '0-22', '1|1|1|0|0|1|0|0|1|0|0|1|0|1|0|0', 'list/list_product.html', 'page/page_product.html'),
(24, 'JAVA软件开发', '', '', 0, 1, 10, 0, '', 1, 1, '', 10, 10, 22, '0-22', '1|1|1|0|0|1|0|0|1|0|0|1|0|1|0|0', 'list/list_product.html', 'page/page_product.html'),
(25, '招聘信息', '', '', 1, 1, 10, 0, '', 1, 1, '', 10, 10, 0, '0', '1|0|1|0|0|0|0|0|0|0|1|1|1|1|0|0', 'list/list_zhaoping.html', 'page/page_default.html'),
(26, '在线留言', '', '', 1, 1, 10, 1, 'index.php?s=guestbook', 1, 1, '', 10, 10, 0, '0', NULL, 'list/list_default.html', 'page/page_default.html');

-- --------------------------------------------------------

--
-- 表的结构 `3gcms_vote`
--

CREATE TABLE IF NOT EXISTS `3gcms_vote` (
  `id` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL,
  `vote` text NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `stype` tinyint(1) unsigned NOT NULL,
  `starttime` varchar(32) NOT NULL,
  `overtime` varchar(32) NOT NULL,
  `rank` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
