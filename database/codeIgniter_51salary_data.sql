-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2017 �?07 �?24 �?11:25
-- 服务器版本: 5.6.11
-- PHP 版本: 5.5.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `codeIgniter_51salary_data`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `site_about_us`
-- 

CREATE TABLE `site_about_us` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(200) NOT NULL COMMENT '标题',
  `content` mediumtext NOT NULL COMMENT '内容',
  `is_show` tinyint(1) NOT NULL COMMENT '审核显示',
  `sort_order` int(10) NOT NULL COMMENT '排序',
  `postdate` int(10) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `site_about_us`
-- 

INSERT INTO `site_about_us` VALUES (1, '关于我们', '<p style="vertical-align:baseline;">\n	<strong>薪酬调研网每年调研180个细分行业，接近260多个地区，数据库每年积累300万条数据，标准岗位2600多个。</strong>\n</p>\n<p style="vertical-align:baseline;">\n	<strong><br />\n</strong>\n</p>\n<p style="vertical-align:baseline;">\n	<strong>您可以在以下岗位中选择您需要的岗位薪酬数据，也可以将您公司的行业地区及</strong><strong>岗位职责提交给我们，我们来帮您匹配相应职位。</strong>\n</p>\n<p style="vertical-align:baseline;">\n	<strong><br />\n</strong>\n</p>\n<p style="vertical-align:baseline;">\n	<strong>更多内容欢迎咨询相关行业薪酬顾问。</strong>\n</p>\n<h2 style="font-size:12px;vertical-align:baseline;">\n	<p style="vertical-align:baseline;color:#333333;font-family:''Microsoft YaHei'', 微软雅黑, 宋体, ''\\9'';background:none 0% 0% repeat scroll #FFFFFF;">\n		<span style="font-size:16px;vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">部分调研职位展示：</span>\n	</p>\n	<div>\n		<br />\n	</div>\n</h2>', 1, 0, 1500888326);

-- --------------------------------------------------------

-- 
-- 表的结构 `site_log`
-- 

CREATE TABLE `site_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `web_name` char(40) CHARACTER SET gbk NOT NULL,
  `content` varchar(255) CHARACTER SET gbk DEFAULT NULL,
  `type` tinyint(4) DEFAULT '0',
  `postdate` int(10) DEFAULT NULL,
  `status` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `site_log`
-- 

INSERT INTO `site_log` VALUES (1, ' 登陆', 'IP:<span style=''color:#f00''>0.0.0.0</font>', 7, 1500888165, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `site_manager`
-- 

CREATE TABLE `site_manager` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` char(50) NOT NULL COMMENT '用户名',
  `password` char(50) NOT NULL COMMENT '密码',
  `role_id` tinyint(4) DEFAULT '0' COMMENT '所属角色',
  `truename` varchar(20) DEFAULT ' ' COMMENT '姓名',
  `email` varchar(100) DEFAULT ' ' COMMENT '邮箱',
  `phone` varchar(20) DEFAULT ' ' COMMENT '电话',
  `ip` char(200) DEFAULT '' COMMENT '最后登录IP',
  `salt` char(8) DEFAULT NULL,
  `postdate` int(10) NOT NULL,
  `login_time` int(10) NOT NULL COMMENT '最后登录时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `site_manager`
-- 

INSERT INTO `site_manager` VALUES (1, 'admin', '5c5ca2ca10bd5d843628909e166609fe', 1, ' ', '512644164@qq.com', ' ', '0.0.0.0', NULL, 0, 1500888165);
INSERT INTO `site_manager` VALUES (2, 'user', 'c30807e6587ade285ba7ade9f881b3d7', 3, ' ', '', ' ', '', NULL, 0, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `site_manager_role`
-- 

CREATE TABLE `site_manager_role` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(200) NOT NULL COMMENT '角色名称',
  `description` varchar(800) NOT NULL COMMENT '角色描述',
  `is_show` tinyint(1) NOT NULL COMMENT '状态',
  `role` varchar(800) NOT NULL COMMENT '权限设置',
  `sort_order` int(10) NOT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- 导出表中的数据 `site_manager_role`
-- 

INSERT INTO `site_manager_role` VALUES (1, '超级管理员', '超级管理员', 1, ',2,3,4,5,7,8,9,10,', 0);
INSERT INTO `site_manager_role` VALUES (2, '普通管理员', '普通管理员', 1, ',2,7,', 0);
INSERT INTO `site_manager_role` VALUES (3, '发布人员', '发布人员', 1, ',2,7,', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `site_manager_role_cate`
-- 

CREATE TABLE `site_manager_role_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(20) NOT NULL COMMENT '名称',
  `parent_id` int(10) DEFAULT '0' COMMENT '父类',
  `key` varchar(200) NOT NULL COMMENT '键值',
  `create_type` tinyint(2) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- 
-- 导出表中的数据 `site_manager_role_cate`
-- 

INSERT INTO `site_manager_role_cate` VALUES (1, '页面管理', 0, 'page_info', 1, 1);
INSERT INTO `site_manager_role_cate` VALUES (2, '查看', 1, 'page_info_list', 1, 1);
INSERT INTO `site_manager_role_cate` VALUES (3, '添加', 1, 'page_info_add', 1, 1);
INSERT INTO `site_manager_role_cate` VALUES (4, '编辑', 1, 'page_info_edit', 1, 1);
INSERT INTO `site_manager_role_cate` VALUES (5, '删除', 1, 'page_info_del', 1, 1);
INSERT INTO `site_manager_role_cate` VALUES (6, '关于我们', 0, 'about_us', 1, 1);
INSERT INTO `site_manager_role_cate` VALUES (7, '查看', 6, 'about_us_list', 1, 1);
INSERT INTO `site_manager_role_cate` VALUES (8, '添加', 6, 'about_us_add', 1, 1);
INSERT INTO `site_manager_role_cate` VALUES (9, '编辑', 6, 'about_us_edit', 1, 1);
INSERT INTO `site_manager_role_cate` VALUES (10, '删除', 6, 'about_us_del', 1, 1);

-- --------------------------------------------------------

-- 
-- 表的结构 `site_menu_admin`
-- 

CREATE TABLE `site_menu_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET gbk NOT NULL,
  `url` char(40) CHARACTER SET gbk NOT NULL,
  `image` varchar(64) CHARACTER SET gbk DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort_order` int(3) DEFAULT '0',
  `postdate` int(10) unsigned DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_status_zen` (`status`),
  KEY `idx_sort_order_zen` (`sort_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2033 ;

-- 
-- 导出表中的数据 `site_menu_admin`
-- 

INSERT INTO `site_menu_admin` VALUES (1355, '文章管理', 'article', NULL, 1354, 7950, 1423031608, 3);
INSERT INTO `site_menu_admin` VALUES (1111, '友情链接管理', 'friend_link', NULL, 1110, 8310, 1411380715, 3);
INSERT INTO `site_menu_admin` VALUES (1110, '友情链接管理', 'friend_link', NULL, 0, 8320, 1411380715, 2);
INSERT INTO `site_menu_admin` VALUES (385, '客户案例', 'cases', NULL, 384, 8940, 1392086769, 3);
INSERT INTO `site_menu_admin` VALUES (1139, '会员列表', 'member', NULL, 0, 8230, 1414744670, 2);
INSERT INTO `site_menu_admin` VALUES (1154, '数据管理', 'statistics', NULL, 1153, 8190, 1415793162, 3);
INSERT INTO `site_menu_admin` VALUES (399, 'HTML生成SQL', 'html_to_sql', NULL, 48, 0, 1394515157, 1);
INSERT INTO `site_menu_admin` VALUES (427, '页面样式选择', 'module_style_select', NULL, 48, 65, 1395115612, 1);
INSERT INTO `site_menu_admin` VALUES (426, '页面样式', 'module_style', NULL, 48, 70, 1395114457, 1);
INSERT INTO `site_menu_admin` VALUES (34, '其他', 'setting\r\n', NULL, 0, 9000, 1388583715, 1);
INSERT INTO `site_menu_admin` VALUES (35, '基本设置', 'setting\r\n', NULL, 34, 92, 1388583715, 1);
INSERT INTO `site_menu_admin` VALUES (36, '注册会员', 'member\r\n', NULL, 34, 93, 1388583715, 1);
INSERT INTO `site_menu_admin` VALUES (37, '首页管理', 'shouye\r\n', NULL, 34, 94, 1388583715, 1);
INSERT INTO `site_menu_admin` VALUES (38, '在线客服', 'online\r\n', NULL, 34, 95, 1388583715, 1);
INSERT INTO `site_menu_admin` VALUES (40, '广告管理', 'advertise\r\n', NULL, 34, 97, 1388583715, 1);
INSERT INTO `site_menu_admin` VALUES (41, '订购信息', 'order_info\r\n', NULL, 34, 98, 1388583715, 1);
INSERT INTO `site_menu_admin` VALUES (42, '查看日志', 'log\r\n', NULL, 34, 99, 1388583715, 1);
INSERT INTO `site_menu_admin` VALUES (43, '管理员管理', 'manager\r\n', NULL, 34, 100, 1388583715, 1);
INSERT INTO `site_menu_admin` VALUES (44, '菜单管理', 'menu_admin', NULL, 34, 101, 1388583715, 1);
INSERT INTO `site_menu_admin` VALUES (371, '单页面管理', 'page', NULL, 370, 8980, 1392039758, 3);
INSERT INTO `site_menu_admin` VALUES (151, '网页保存', 'url_fetch', NULL, 48, 21, 1390120908, 1);
INSERT INTO `site_menu_admin` VALUES (370, '单页面管理', 'page', NULL, 0, 8990, 1392039758, 2);
INSERT INTO `site_menu_admin` VALUES (513, '分类', 's3155a_cate_cate', NULL, 511, 991, 1396149836, 100);
INSERT INTO `site_menu_admin` VALUES (48, '模块管理', 'module', NULL, 0, 10320, 1388844724, 1);
INSERT INTO `site_menu_admin` VALUES (49, '模块管理', 'module', NULL, 48, 1020, 1388844734, 1);
INSERT INTO `site_menu_admin` VALUES (50, '模块添加', 'module_add', NULL, 48, 90, 1388844741, 1);
INSERT INTO `site_menu_admin` VALUES (51, '后台菜单管理', 'menu_admin', NULL, 48, 91, 1388844751, 1);
INSERT INTO `site_menu_admin` VALUES (739, '测试数据', 'module_data', NULL, 0, 8900, 1398317340, 2);
INSERT INTO `site_menu_admin` VALUES (740, '测试数据', 'module_data', NULL, 739, 8890, 1398317340, 3);
INSERT INTO `site_menu_admin` VALUES (782, '商品类型', 'shop_goods_category_goodscategory_goodst', NULL, 751, 982, 1398332988, 100);
INSERT INTO `site_menu_admin` VALUES (75, '模块类型', 'module_type', NULL, 48, 80, 1389062235, 1);
INSERT INTO `site_menu_admin` VALUES (1153, '数据管理', 'statistics', NULL, 0, 8200, 1415793162, 2);
INSERT INTO `site_menu_admin` VALUES (880, '模板管理', 'module_template', NULL, 48, 85, 1399098775, 1);
INSERT INTO `site_menu_admin` VALUES (1264, '用户管理', 'member_info', NULL, 0, 8140, 1417767916, 2);
INSERT INTO `site_menu_admin` VALUES (1265, '用户管理', 'member_info', NULL, 1264, 8130, 1417767916, 3);
INSERT INTO `site_menu_admin` VALUES (1012, 'svalue', 'reserve_svalue1_cate', NULL, 1010, 991, 1402458440, 100);
INSERT INTO `site_menu_admin` VALUES (989, '首页图片管理', 'slide_index', NULL, 0, 8480, 1401158309, 2);
INSERT INTO `site_menu_admin` VALUES (990, '首页图片管理', 'slide_index', NULL, 989, 8470, 1401158309, 3);
INSERT INTO `site_menu_admin` VALUES (1020, '留言板', 'guestbook', NULL, 0, 8440, 1402656990, 2);
INSERT INTO `site_menu_admin` VALUES (1021, '留言板', 'guestbook', NULL, 1020, 8430, 1402656990, 3);
INSERT INTO `site_menu_admin` VALUES (1149, '角色管理', 'manager_role', NULL, 1148, 8200, 1415183425, 3);
INSERT INTO `site_menu_admin` VALUES (1148, '角色管理', 'manager_role', NULL, 0, 8210, 1415183425, 2);
INSERT INTO `site_menu_admin` VALUES (1119, '操作日志', 'operation_log', NULL, 0, 8280, 1411463880, 2);
INSERT INTO `site_menu_admin` VALUES (1120, '操作日志', 'operation_log', NULL, 1119, 8270, 1411463880, 3);
INSERT INTO `site_menu_admin` VALUES (1121, '网站管理员', 'manager', NULL, 0, 8270, 1411465028, 2);
INSERT INTO `site_menu_admin` VALUES (1122, '网站管理员', 'manager', NULL, 1121, 8260, 1411465028, 3);
INSERT INTO `site_menu_admin` VALUES (1150, '所属角色', 'manager_role_cate', NULL, 1121, 991, 1415245631, 100);
INSERT INTO `site_menu_admin` VALUES (1328, 'Asset管理', 'Asset', NULL, 1327, 8040, 1420343429, 3);
INSERT INTO `site_menu_admin` VALUES (1327, 'Asset管理', 'Asset', NULL, 0, 8050, 1420343429, 2);
INSERT INTO `site_menu_admin` VALUES (1968, '文章分类管理', 'article_category_cate', NULL, 1354, 991, 1481189276, 100);
INSERT INTO `site_menu_admin` VALUES (1354, '文章管理', 'article', NULL, 0, 7960, 1423031608, 2);
INSERT INTO `site_menu_admin` VALUES (1112, '首页幻灯广告管理', 'slide', NULL, 0, 8310, 1411381481, 2);
INSERT INTO `site_menu_admin` VALUES (1113, '首页幻灯广告管理', 'slide', NULL, 1112, 8300, 1411381481, 3);
INSERT INTO `site_menu_admin` VALUES (1083, '帮助中心管理', 'help', NULL, 0, 8350, 1406786098, 2);
INSERT INTO `site_menu_admin` VALUES (1084, '帮助中心管理', 'help', NULL, 1083, 8340, 1406786098, 3);
INSERT INTO `site_menu_admin` VALUES (1263, '状态管理', 'project_status_cate', NULL, 1164, 982, 1417528664, 100);
INSERT INTO `site_menu_admin` VALUES (1272, '评论管理', 'comment', NULL, 0, 8130, 1417851765, 2);
INSERT INTO `site_menu_admin` VALUES (1140, '会员列表', 'member', NULL, 1139, 8220, 1414744670, 3);
INSERT INTO `site_menu_admin` VALUES (1141, '会员列表', 'member_3', NULL, 0, 8220, 1414745018, 2);
INSERT INTO `site_menu_admin` VALUES (1142, '会员列表', 'member_3', NULL, 1141, 8210, 1414745018, 3);
INSERT INTO `site_menu_admin` VALUES (1262, '类型管理', 'project_type_cate', NULL, 1164, 991, 1417528664, 100);
INSERT INTO `site_menu_admin` VALUES (1164, '项目管理', 'project', NULL, 0, 8190, 1416908973, 2);
INSERT INTO `site_menu_admin` VALUES (1165, '项目管理', 'project', NULL, 1164, 8180, 1416908973, 3);
INSERT INTO `site_menu_admin` VALUES (1562, '资源管理', 'resource', NULL, 1561, 7720, 1430620039, 3);
INSERT INTO `site_menu_admin` VALUES (1273, '评论管理', 'comment', NULL, 1272, 8120, 1417851765, 3);
INSERT INTO `site_menu_admin` VALUES (1285, '所属项目管理', 'member_info_project_cate', NULL, 1264, 982, 1418635754, 100);
INSERT INTO `site_menu_admin` VALUES (1284, '用户组管理', 'member_info_permission_cate', NULL, 1264, 991, 1418635754, 100);
INSERT INTO `site_menu_admin` VALUES (1175, '书桌管理', 'common2341', NULL, 0, 8150, 1417353536, 2);
INSERT INTO `site_menu_admin` VALUES (1176, '书桌管理', 'common2341', NULL, 1175, 8140, 1417353536, 3);
INSERT INTO `site_menu_admin` VALUES (1561, '资源管理', 'resource', NULL, 0, 7730, 1430620039, 2);
INSERT INTO `site_menu_admin` VALUES (1298, '类型管理', 'comment_type_cate', NULL, 1272, 991, 1419260675, 100);
INSERT INTO `site_menu_admin` VALUES (1275, '任务管理', 'task', NULL, 0, 8120, 1417944525, 2);
INSERT INTO `site_menu_admin` VALUES (1276, '任务管理', 'task', NULL, 1275, 8110, 1417944525, 3);
INSERT INTO `site_menu_admin` VALUES (1296, '状态管理', 'task_status_cate', NULL, 1275, 991, 1419255169, 100);
INSERT INTO `site_menu_admin` VALUES (1846, '网站设置', 'setting', NULL, 1845, 7430, 1442974748, 3);
INSERT INTO `site_menu_admin` VALUES (1337, '类型管理', 'asset_type_cate', NULL, 1327, 991, 1420527979, 100);
INSERT INTO `site_menu_admin` VALUES (1332, 'asset评论管理', 'comment_asset', NULL, 0, 8040, 1420524508, 2);
INSERT INTO `site_menu_admin` VALUES (1333, 'asset评论管理', 'comment_asset', NULL, 1332, 8030, 1420524508, 3);
INSERT INTO `site_menu_admin` VALUES (1335, '类型管理', 'comment_asset_type_cate', NULL, 1332, 991, 1420524560, 100);
INSERT INTO `site_menu_admin` VALUES (1343, '视频管理', 'common45', NULL, 1342, 8000, 1420735769, 3);
INSERT INTO `site_menu_admin` VALUES (1342, '视频管理', 'common45', NULL, 0, 8010, 1420735769, 2);
INSERT INTO `site_menu_admin` VALUES (1340, 'shot管理', 'shots', NULL, 0, 8020, 1420623014, 2);
INSERT INTO `site_menu_admin` VALUES (1341, 'shot管理', 'shots', NULL, 1340, 8010, 1420623014, 3);
INSERT INTO `site_menu_admin` VALUES (1344, 'shots评论管理', 'comment_shots', NULL, 0, 8000, 1420737311, 2);
INSERT INTO `site_menu_admin` VALUES (1345, 'shots评论管理', 'comment_shots', NULL, 1344, 7990, 1420737311, 3);
INSERT INTO `site_menu_admin` VALUES (1346, '类型管理', 'comment_shots_type_cate', NULL, 1344, 7981, 1420737311, 100);
INSERT INTO `site_menu_admin` VALUES (1845, '网站设置', 'setting', NULL, 0, 7440, 1442974748, 2);
INSERT INTO `site_menu_admin` VALUES (1311, 'task评论管理', 'comment_task', NULL, 0, 8060, 1419315235, 2);
INSERT INTO `site_menu_admin` VALUES (1312, 'task评论管理', 'comment_task', NULL, 1311, 8050, 1419315235, 3);
INSERT INTO `site_menu_admin` VALUES (1314, '类型管理', 'comment_task_type_cate', NULL, 1311, 991, 1419316567, 100);
INSERT INTO `site_menu_admin` VALUES (1592, '过滤css样式管理', 'common_css', NULL, 0, 7690, 1431326656, 2);
INSERT INTO `site_menu_admin` VALUES (1910, '统计管理', 'pocket_count', NULL, 1909, 7280, 1460456835, 3);
INSERT INTO `site_menu_admin` VALUES (1848, '手机设置', 'setting_phone', NULL, 1847, 7420, 1442975349, 3);
INSERT INTO `site_menu_admin` VALUES (1847, '手机设置', 'setting_phone', NULL, 0, 7430, 1442975349, 2);
INSERT INTO `site_menu_admin` VALUES (1351, '广告管理', 'advertisement', NULL, 0, 7970, 1422279926, 2);
INSERT INTO `site_menu_admin` VALUES (1352, '广告管理', 'advertisement', NULL, 1351, 7960, 1422279926, 3);
INSERT INTO `site_menu_admin` VALUES (1593, '过滤css样式管理', 'common_css', NULL, 1592, 7680, 1431326656, 3);
INSERT INTO `site_menu_admin` VALUES (1858, '招商银行分期付款管理', 'cmbchina', NULL, 1857, 7410, 1443580954, 3);
INSERT INTO `site_menu_admin` VALUES (1851, '分类管理', 'sale_brand_category_cate', NULL, 1808, 991, 1443432164, 100);
INSERT INTO `site_menu_admin` VALUES (1855, '分类管理', 'sale_category_cate', NULL, 1794, 991, 1443508422, 100);
INSERT INTO `site_menu_admin` VALUES (1856, '品牌管理', 'sale_brand_cate', NULL, 1794, 982, 1443508422, 100);
INSERT INTO `site_menu_admin` VALUES (1457, '图片列表管理', 'common3', NULL, 0, 7810, 1428663677, 2);
INSERT INTO `site_menu_admin` VALUES (1458, '图片列表管理', 'common3', NULL, 1457, 7800, 1428663677, 3);
INSERT INTO `site_menu_admin` VALUES (1509, '手机设置', 'setting_wap', NULL, 0, 7750, 1430213785, 2);
INSERT INTO `site_menu_admin` VALUES (1510, '手机设置', 'setting_wap', NULL, 1509, 7740, 1430213785, 3);
INSERT INTO `site_menu_admin` VALUES (1475, '文章列表管理', 'article1', NULL, 0, 7800, 1429091057, 2);
INSERT INTO `site_menu_admin` VALUES (1476, '文章列表管理', 'article1', NULL, 1475, 7790, 1429091057, 3);
INSERT INTO `site_menu_admin` VALUES (1489, '中奖设置管理', 'application_clarks', NULL, 0, 7790, 1429627081, 2);
INSERT INTO `site_menu_admin` VALUES (1490, '中奖设置管理', 'application_clarks', NULL, 1489, 7780, 1429627081, 3);
INSERT INTO `site_menu_admin` VALUES (1908, '调查管理', 'questionnaire', NULL, 1907, 7290, 1459156825, 3);
INSERT INTO `site_menu_admin` VALUES (1862, '九元包邮管理', 'sale_nine', NULL, 1861, 7400, 1444617369, 3);
INSERT INTO `site_menu_admin` VALUES (1591, '敏感词汇管理', 'danmu_sensitive', NULL, 1590, 7690, 1431081520, 3);
INSERT INTO `site_menu_admin` VALUES (1590, '敏感词汇管理', 'danmu_sensitive', NULL, 0, 7700, 1431081520, 2);
INSERT INTO `site_menu_admin` VALUES (1589, '页面管理', 'page_info', NULL, 1588, 7700, 1430734795, 3);
INSERT INTO `site_menu_admin` VALUES (1588, '页面管理', 'page_info', NULL, 0, 7710, 1430734795, 2);
INSERT INTO `site_menu_admin` VALUES (1437, 'media列表管理', 'media', NULL, 0, 7860, 1426564400, 2);
INSERT INTO `site_menu_admin` VALUES (1438, 'media列表管理', 'media', NULL, 1437, 7850, 1426564400, 3);
INSERT INTO `site_menu_admin` VALUES (1439, '选择管理', 'choose', NULL, 0, 7850, 1427270330, 2);
INSERT INTO `site_menu_admin` VALUES (1440, '选择管理', 'choose', NULL, 1439, 7840, 1427270330, 3);
INSERT INTO `site_menu_admin` VALUES (1441, '选择管理', 'choose_result', NULL, 0, 7840, 1427270446, 2);
INSERT INTO `site_menu_admin` VALUES (1442, '选择管理', 'choose_result', NULL, 1441, 7830, 1427270446, 3);
INSERT INTO `site_menu_admin` VALUES (1586, '图片列表管理', 'photo_list', NULL, 1585, 7710, 1430734564, 3);
INSERT INTO `site_menu_admin` VALUES (1585, '图片列表管理', 'photo_list', NULL, 0, 7720, 1430734564, 2);
INSERT INTO `site_menu_admin` VALUES (1584, '星级管理', 'resource_star_cate', NULL, 1561, 973, 1430662943, 100);
INSERT INTO `site_menu_admin` VALUES (1583, '标签管理', 'resource_tag_cate', NULL, 1561, 982, 1430662943, 100);
INSERT INTO `site_menu_admin` VALUES (1582, '行业管理', 'resource_hangye_cate', NULL, 1561, 991, 1430662943, 100);
INSERT INTO `site_menu_admin` VALUES (1594, '分类管理', 'photo_list_cate_cate', NULL, 1585, 991, 1432288273, 100);
INSERT INTO `site_menu_admin` VALUES (1595, '案例展示管理', 'demo', NULL, 0, 7680, 1432552322, 2);
INSERT INTO `site_menu_admin` VALUES (1596, '案例展示管理', 'demo', NULL, 1595, 7670, 1432552322, 3);
INSERT INTO `site_menu_admin` VALUES (1597, '分类管理', 'demo_cate_cate', NULL, 1595, 7661, 1432552322, 100);
INSERT INTO `site_menu_admin` VALUES (1598, 'common324管理', 'common324', NULL, 0, 7670, 1432609934, 2);
INSERT INTO `site_menu_admin` VALUES (1599, 'common324管理', 'common324', NULL, 1598, 7660, 1432609934, 3);
INSERT INTO `site_menu_admin` VALUES (1600, '帮助中心管理', 'help_center', NULL, 0, 7660, 1432610739, 2);
INSERT INTO `site_menu_admin` VALUES (1601, '帮助中心管理', 'help_center', NULL, 1600, 7650, 1432610739, 3);
INSERT INTO `site_menu_admin` VALUES (1602, '分类管理', 'help_center_cate_cate', NULL, 1600, 7641, 1432610739, 100);
INSERT INTO `site_menu_admin` VALUES (1603, '团队管理', 'about_team', NULL, 0, 7650, 1432720377, 2);
INSERT INTO `site_menu_admin` VALUES (1604, '团队管理', 'about_team', NULL, 1603, 7640, 1432720377, 3);
INSERT INTO `site_menu_admin` VALUES (1605, '分类管理', 'article1_cate_cate', NULL, 1475, 991, 1433397054, 100);
INSERT INTO `site_menu_admin` VALUES (1909, '统计管理', 'pocket_count', NULL, 0, 7290, 1460456834, 2);
INSERT INTO `site_menu_admin` VALUES (1907, '调查管理', 'questionnaire', NULL, 0, 7300, 1459156825, 2);
INSERT INTO `site_menu_admin` VALUES (1873, '二十元封顶管理', 'sale_twenty', NULL, 0, 7400, 1444626584, 2);
INSERT INTO `site_menu_admin` VALUES (1874, '二十元封顶管理', 'sale_twenty', NULL, 1873, 7390, 1444626584, 3);
INSERT INTO `site_menu_admin` VALUES (1875, '分类管理', 'sale_twenty_category_cate', NULL, 1873, 7381, 1444626584, 100);
INSERT INTO `site_menu_admin` VALUES (1876, '分类管理', 'sale_nine_category_cate', NULL, 1859, 991, 1444634052, 100);
INSERT INTO `site_menu_admin` VALUES (1877, '开班课程管理', 'activity_course', NULL, 0, 7390, 1449714960, 2);
INSERT INTO `site_menu_admin` VALUES (1878, '开班课程管理', 'activity_course', NULL, 1877, 7380, 1449714960, 3);
INSERT INTO `site_menu_admin` VALUES (1879, '报名信息管理', 'activity_info', NULL, 0, 7380, 1449724403, 2);
INSERT INTO `site_menu_admin` VALUES (1880, '报名信息管理', 'activity_info', NULL, 1879, 7370, 1449724403, 3);
INSERT INTO `site_menu_admin` VALUES (1905, 'questionnaire管理', 'CREATE TABLE m_questionnaire (\r\n  id int', NULL, 0, 7310, 1459156799, 2);
INSERT INTO `site_menu_admin` VALUES (1906, 'questionnaire管理', 'CREATE TABLE m_questionnaire (\r\n  id int', NULL, 1905, 7300, 1459156799, 3);
INSERT INTO `site_menu_admin` VALUES (1622, '图片列表管理', 'photo_list2', NULL, 0, 7560, 1438075713, 2);
INSERT INTO `site_menu_admin` VALUES (1623, '图片列表管理', 'photo_list2', NULL, 1622, 7550, 1438075713, 3);
INSERT INTO `site_menu_admin` VALUES (1639, '分类管理', 'photo_list2_cate_cate', NULL, 1622, 991, 1439804469, 100);
INSERT INTO `site_menu_admin` VALUES (1629, '核心业务大图管理', 'photo_list2_pic', NULL, 0, 7550, 1439281709, 2);
INSERT INTO `site_menu_admin` VALUES (1630, '核心业务大图管理', 'photo_list2_pic', NULL, 1629, 7540, 1439281709, 3);
INSERT INTO `site_menu_admin` VALUES (1632, '招聘管理', 'job', NULL, 0, 7540, 1439452436, 2);
INSERT INTO `site_menu_admin` VALUES (1633, '招聘管理', 'job', NULL, 1632, 7530, 1439452436, 3);
INSERT INTO `site_menu_admin` VALUES (1634, '产品分类管理', 'CREATE TABLE photo_category (\r\n  id int(', NULL, 0, 7530, 1439800830, 2);
INSERT INTO `site_menu_admin` VALUES (1635, '产品分类管理', 'CREATE TABLE photo_category (\r\n  id int(', NULL, 1634, 7520, 1439800830, 3);
INSERT INTO `site_menu_admin` VALUES (1636, '分类管理', 'photo_category', NULL, 0, 7520, 1439800867, 2);
INSERT INTO `site_menu_admin` VALUES (1637, '分类管理', 'photo_category', NULL, 1636, 7510, 1439800867, 3);
INSERT INTO `site_menu_admin` VALUES (1859, '九元包邮管理', 'sale_nine', NULL, 0, 7410, 1444617369, 2);
INSERT INTO `site_menu_admin` VALUES (1795, '特卖管理', 'sale', NULL, 1794, 7480, 1441377624, 3);
INSERT INTO `site_menu_admin` VALUES (1643, '文章管理', 'article34', NULL, 0, 7500, 1439886976, 2);
INSERT INTO `site_menu_admin` VALUES (1644, '文章管理', 'article34', NULL, 1643, 7490, 1439886976, 3);
INSERT INTO `site_menu_admin` VALUES (1774, '父类管理', 'photo_category_parent_cate', NULL, 1636, 991, 1441283636, 100);
INSERT INTO `site_menu_admin` VALUES (1861, '九元包邮管理', 'sale_nine', NULL, 0, 7410, 1444617369, 2);
INSERT INTO `site_menu_admin` VALUES (1794, '特卖管理', 'sale', NULL, 0, 7490, 1441377624, 2);
INSERT INTO `site_menu_admin` VALUES (1809, '品牌管理', 'sale_brand', NULL, 1808, 7470, 1441413254, 3);
INSERT INTO `site_menu_admin` VALUES (1808, '品牌管理', 'sale_brand', NULL, 0, 7480, 1441413254, 2);
INSERT INTO `site_menu_admin` VALUES (1857, '招商银行分期付款管理', 'cmbchina', NULL, 0, 7420, 1443580954, 2);
INSERT INTO `site_menu_admin` VALUES (1839, '分类3管理', 'article34_cate3_cate', NULL, 1643, 973, 1442453821, 100);
INSERT INTO `site_menu_admin` VALUES (1837, '文章分类管理', 'article34_category_cate', NULL, 1643, 991, 1442453821, 100);
INSERT INTO `site_menu_admin` VALUES (1838, '多分类2管理', 'article34_fenlei_cate', NULL, 1643, 982, 1442453821, 100);
INSERT INTO `site_menu_admin` VALUES (1828, '站点管理', 'sale_site', NULL, 0, 7470, 1441681757, 2);
INSERT INTO `site_menu_admin` VALUES (1829, '站点管理', 'sale_site', NULL, 1828, 7460, 1441681757, 3);
INSERT INTO `site_menu_admin` VALUES (1860, '九元包邮管理', 'sale_nine', NULL, 1859, 7400, 1444617369, 3);
INSERT INTO `site_menu_admin` VALUES (1842, '日志管理', 'CREATE TABLE log22 (\r\n  id int(11) NOT N', NULL, 0, 7450, 1442568090, 2);
INSERT INTO `site_menu_admin` VALUES (1843, '日志管理', 'CREATE TABLE log22 (\r\n  id int(11) NOT N', NULL, 1842, 7440, 1442568090, 3);
INSERT INTO `site_menu_admin` VALUES (1912, '首页大图文字设置', 'jzt_setting_index', NULL, 1911, 7270, 1461116527, 3);
INSERT INTO `site_menu_admin` VALUES (1911, '首页大图文字设置', 'jzt_setting_index', NULL, 0, 7280, 1461116527, 2);
INSERT INTO `site_menu_admin` VALUES (1890, '回答管理', 'question', NULL, 0, 7330, 1452758548, 2);
INSERT INTO `site_menu_admin` VALUES (1891, '回答管理', 'question', NULL, 1890, 7320, 1452758548, 3);
INSERT INTO `site_menu_admin` VALUES (1892, '用户管理', 'user_info', NULL, 0, 7320, 1452758807, 2);
INSERT INTO `site_menu_admin` VALUES (1893, '用户管理', 'user_info', NULL, 1892, 7310, 1452758807, 3);
INSERT INTO `site_menu_admin` VALUES (1918, '服务条目管理', 'jzt_service_item', NULL, 1917, 7240, 1461116836, 3);
INSERT INTO `site_menu_admin` VALUES (1913, '关于我们', 'jzt_about_us', NULL, 0, 7270, 1461116619, 2);
INSERT INTO `site_menu_admin` VALUES (1914, '关于我们', 'jzt_about_us', NULL, 1913, 7260, 1461116619, 3);
INSERT INTO `site_menu_admin` VALUES (1915, '服务管理', 'jzt_service', NULL, 0, 7260, 1461116785, 2);
INSERT INTO `site_menu_admin` VALUES (1916, '服务管理', 'jzt_service', NULL, 1915, 7250, 1461116785, 3);
INSERT INTO `site_menu_admin` VALUES (1917, '服务条目管理', 'jzt_service_item', NULL, 0, 7250, 1461116836, 2);
INSERT INTO `site_menu_admin` VALUES (1919, '案例管理', 'jzt_cases', NULL, 0, 7240, 1461116937, 2);
INSERT INTO `site_menu_admin` VALUES (1920, '案例管理', 'jzt_cases', NULL, 1919, 7230, 1461116937, 3);
INSERT INTO `site_menu_admin` VALUES (1922, '分类管理', 'jzt_cases_cate_cate', NULL, 1919, 991, 1461116966, 100);
INSERT INTO `site_menu_admin` VALUES (1923, '邀请码管理', 'pocket_invitation', NULL, 0, 7230, 1461123755, 2);
INSERT INTO `site_menu_admin` VALUES (1924, '邀请码管理', 'pocket_invitation', NULL, 1923, 7220, 1461123755, 3);
INSERT INTO `site_menu_admin` VALUES (1925, '部门管理', 'pocket_invitation_departmen_cate', NULL, 1923, 991, 1461123783, 100);
INSERT INTO `site_menu_admin` VALUES (1926, '标签管理', 'pocket_invitation_tag_cate', NULL, 1923, 982, 1461123783, 100);
INSERT INTO `site_menu_admin` VALUES (1927, '员工管理', 'pocket_staff', NULL, 0, 7220, 1461124215, 2);
INSERT INTO `site_menu_admin` VALUES (1928, '员工管理', 'pocket_staff', NULL, 1927, 7210, 1461124215, 3);
INSERT INTO `site_menu_admin` VALUES (1929, '等级管理', 'pocket_staff_rank_cate', NULL, 1927, 991, 1461124291, 100);
INSERT INTO `site_menu_admin` VALUES (1930, '标签管理', 'pocket_staff_tag_cate', NULL, 1927, 982, 1461124291, 100);
INSERT INTO `site_menu_admin` VALUES (1931, '部门管理', 'pocket_staff_department_cate', NULL, 1927, 973, 1461124291, 100);
INSERT INTO `site_menu_admin` VALUES (1932, '等级管理', 'pocket_rank', NULL, 0, 7210, 1461565091, 2);
INSERT INTO `site_menu_admin` VALUES (1933, '等级管理', 'pocket_rank', NULL, 1932, 7200, 1461565091, 3);
INSERT INTO `site_menu_admin` VALUES (1939, '标签管理', 'staff_invite_tag_cate', NULL, 1937, 7181, 1461574960, 100);
INSERT INTO `site_menu_admin` VALUES (1938, '邀请码管理', 'staff_invite', NULL, 1937, 7190, 1461574960, 3);
INSERT INTO `site_menu_admin` VALUES (1937, '邀请码管理', 'staff_invite', NULL, 0, 7200, 1461574960, 2);
INSERT INTO `site_menu_admin` VALUES (1940, '广告管理', 'CREATE TABLE m_pocket_ad (\r\n  id smallin', NULL, 0, 7190, 1462416953, 2);
INSERT INTO `site_menu_admin` VALUES (1941, '广告管理', 'CREATE TABLE m_pocket_ad (\r\n  id smallin', NULL, 1940, 7180, 1462416953, 3);
INSERT INTO `site_menu_admin` VALUES (1942, '广告管理', 'm_pocket_ad', NULL, 0, 7180, 1462417373, 2);
INSERT INTO `site_menu_admin` VALUES (1943, '广告管理', 'm_pocket_ad', NULL, 1942, 7170, 1462417373, 3);
INSERT INTO `site_menu_admin` VALUES (1955, '广告类型管理', 'm_pocket_ad_media_type_cate', NULL, 1942, 982, 1464766923, 100);
INSERT INTO `site_menu_admin` VALUES (1954, '广告位置管理', 'm_pocket_ad_position_cate', NULL, 1942, 991, 1464766923, 100);
INSERT INTO `site_menu_admin` VALUES (1946, '广告位置管理', 'm_pocket_ad_position', NULL, 0, 7170, 1462417565, 2);
INSERT INTO `site_menu_admin` VALUES (1947, '广告位置管理', 'm_pocket_ad_position', NULL, 1946, 7160, 1462417565, 3);
INSERT INTO `site_menu_admin` VALUES (1948, '页面管理', 'm_pocket_page', NULL, 0, 7160, 1462419555, 2);
INSERT INTO `site_menu_admin` VALUES (1949, '页面管理', 'm_pocket_page', NULL, 1948, 7150, 1462419555, 3);
INSERT INTO `site_menu_admin` VALUES (1951, '文章分类管理', 'm_pocket_page_article_cat_cate', NULL, 1948, 991, 1462419605, 100);
INSERT INTO `site_menu_admin` VALUES (1956, '信息管理', 'information', NULL, 0, 7150, 1466577240, 2);
INSERT INTO `site_menu_admin` VALUES (1957, '信息管理', 'information', NULL, 1956, 7140, 1466577241, 3);
INSERT INTO `site_menu_admin` VALUES (1958, '广告管理', 'information_ad', NULL, 0, 7140, 1467027216, 2);
INSERT INTO `site_menu_admin` VALUES (1959, '广告管理', 'information_ad', NULL, 1958, 7130, 1467027216, 3);
INSERT INTO `site_menu_admin` VALUES (1960, '信息管理', 'information2', NULL, 0, 7130, 1471341304, 2);
INSERT INTO `site_menu_admin` VALUES (1961, '信息管理', 'information2', NULL, 1960, 7120, 1471341304, 3);
INSERT INTO `site_menu_admin` VALUES (1962, '测试文章管理', 'common67', NULL, 0, 7120, 1477021519, 2);
INSERT INTO `site_menu_admin` VALUES (1963, '测试文章管理', 'common67', NULL, 1962, 7110, 1477021520, 3);
INSERT INTO `site_menu_admin` VALUES (1969, '关键词管理', 'article_tag_cate', NULL, 1354, 982, 1481189276, 100);
INSERT INTO `site_menu_admin` VALUES (1970, '关于我们管理', 'about_us', NULL, 0, 7110, 1481248484, 2);
INSERT INTO `site_menu_admin` VALUES (1971, '关于我们管理', 'about_us', NULL, 1970, 7100, 1481248484, 3);
INSERT INTO `site_menu_admin` VALUES (1972, '业务介绍管理', 'service2', NULL, 0, 7100, 1481251846, 2);
INSERT INTO `site_menu_admin` VALUES (1973, '业务介绍管理', 'service2', NULL, 1972, 7090, 1481251846, 3);
INSERT INTO `site_menu_admin` VALUES (1974, '图片管理', 'service2_pic', NULL, 0, 7090, 1481251908, 2);
INSERT INTO `site_menu_admin` VALUES (1975, '图片管理', 'service2_pic', NULL, 1974, 7080, 1481251908, 3);
INSERT INTO `site_menu_admin` VALUES (1976, '分类管理', 'service2_cate_cate', NULL, 1972, 991, 1481252245, 100);
INSERT INTO `site_menu_admin` VALUES (1977, '证书查询管理', 'certificate', NULL, 0, 7080, 1481252539, 2);
INSERT INTO `site_menu_admin` VALUES (1978, '证书查询管理', 'certificate', NULL, 1977, 7070, 1481252539, 3);
INSERT INTO `site_menu_admin` VALUES (2002, '分类管理', 'certificate_category_cate', NULL, 1977, 991, 1495446147, 100);
INSERT INTO `site_menu_admin` VALUES (1980, '微观图片管理', 'certificate_pic', NULL, 0, 7070, 1481252842, 2);
INSERT INTO `site_menu_admin` VALUES (1981, '微观图片管理', 'certificate_pic', NULL, 1980, 7060, 1481252842, 3);
INSERT INTO `site_menu_admin` VALUES (2001, '分类管理', 'certificate_pic_tag_cate', NULL, 1980, 991, 1495446130, 100);
INSERT INTO `site_menu_admin` VALUES (1983, '城市管理', 'city', NULL, 0, 7060, 1481264683, 2);
INSERT INTO `site_menu_admin` VALUES (1984, '城市管理', 'city', NULL, 1983, 7050, 1481264683, 3);
INSERT INTO `site_menu_admin` VALUES (1985, '首页图文管理', 'index_image_text', NULL, 0, 7050, 1481530412, 2);
INSERT INTO `site_menu_admin` VALUES (1986, '首页图文管理', 'index_image_text', NULL, 1985, 7040, 1481530412, 3);
INSERT INTO `site_menu_admin` VALUES (1987, '微观照片管理', 'certificate_pic2', NULL, 0, 7040, 1481532951, 2);
INSERT INTO `site_menu_admin` VALUES (1988, '微观照片管理', 'certificate_pic2', NULL, 1987, 7030, 1481532951, 3);
INSERT INTO `site_menu_admin` VALUES (1998, 'common98管理', 'common98', NULL, 0, 7000, 1495433682, 2);
INSERT INTO `site_menu_admin` VALUES (1990, '分类管理', 'category', NULL, 0, 7030, 1482826412, 2);
INSERT INTO `site_menu_admin` VALUES (1991, '分类管理', 'category', NULL, 1990, 7020, 1482826412, 3);
INSERT INTO `site_menu_admin` VALUES (1992, '分组管理', 'category_cate_cate', NULL, 1990, 991, 1482826504, 100);
INSERT INTO `site_menu_admin` VALUES (1993, '俱乐部管理', 'club_page', NULL, 0, 7020, 1488167601, 2);
INSERT INTO `site_menu_admin` VALUES (1994, '俱乐部管理', 'club_page', NULL, 1993, 7010, 1488167601, 3);
INSERT INTO `site_menu_admin` VALUES (1995, '职位申请管理', 'job_apply', NULL, 0, 7010, 1490411453, 2);
INSERT INTO `site_menu_admin` VALUES (1996, '职位申请管理', 'job_apply', NULL, 1995, 7000, 1490411453, 3);
INSERT INTO `site_menu_admin` VALUES (1999, 'common98管理', 'common98', NULL, 1998, 6990, 1495433682, 3);
INSERT INTO `site_menu_admin` VALUES (2003, 'common981管理', 'common981', NULL, 0, 6990, 1496649620, 2);
INSERT INTO `site_menu_admin` VALUES (2004, 'common981管理', 'common981', NULL, 2003, 6980, 1496649620, 3);
INSERT INTO `site_menu_admin` VALUES (2015, 'common123管理', 'common123', NULL, 0, 6980, 1496729425, 2);
INSERT INTO `site_menu_admin` VALUES (2016, 'common123管理', 'common123', NULL, 2015, 6970, 1496729425, 3);
INSERT INTO `site_menu_admin` VALUES (2017, 'dsdsfsdf管理', 'common34', NULL, 0, 6970, 1498386042, 2);
INSERT INTO `site_menu_admin` VALUES (2018, 'dsdsfsdf管理', 'common34', NULL, 2017, 6960, 1498386042, 3);
INSERT INTO `site_menu_admin` VALUES (2019, '申请管理', 'CREATE TABLE m_pocket_apply (\r\n  id int(', NULL, 0, 6960, 1500517647, 2);
INSERT INTO `site_menu_admin` VALUES (2020, '申请管理', 'CREATE TABLE m_pocket_apply (\r\n  id int(', NULL, 2019, 6950, 1500517647, 3);
INSERT INTO `site_menu_admin` VALUES (2028, '申请2管理', 'm_pocket_apply', NULL, 2027, 6940, 1500521242, 3);
INSERT INTO `site_menu_admin` VALUES (2027, '申请2管理', 'm_pocket_apply', NULL, 0, 6950, 1500521242, 2);
INSERT INTO `site_menu_admin` VALUES (2029, '大师傅管理', '-- \r\n-- 数据库: test_wm18_new2\r\n-- \r\n\r\n-- -', NULL, 0, 6940, 1500885032, 2);
INSERT INTO `site_menu_admin` VALUES (2030, '大师傅管理', '-- \r\n-- 数据库: test_wm18_new2\r\n-- \r\n\r\n-- -', NULL, 2029, 6930, 1500885032, 3);

-- --------------------------------------------------------

-- 
-- 表的结构 `site_microsite_slide`
-- 

CREATE TABLE `site_microsite_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `token` varchar(60) NOT NULL,
  `pid` int(10) NOT NULL,
  `title` varchar(200) NOT NULL COMMENT '幻灯片名称',
  `description` varchar(200) NOT NULL COMMENT '幻灯片描述',
  `sort_order` varchar(200) NOT NULL COMMENT '显示顺序',
  `pic` varchar(200) NOT NULL COMMENT '幻灯片封面',
  `is_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否显示',
  `type` varchar(200) NOT NULL COMMENT '类型',
  `article_id` int(10) NOT NULL DEFAULT '0',
  `url` varchar(200) NOT NULL COMMENT '外链地址',
  `tel` varchar(200) NOT NULL COMMENT '电话号码',
  `market_type` varchar(200) NOT NULL COMMENT '微商圈模块',
  `shop_type` varchar(200) NOT NULL COMMENT '微商城模块',
  `tg_type` varchar(200) NOT NULL COMMENT '微团购模块',
  `food_type` varchar(200) NOT NULL COMMENT '微餐饮模块',
  `estate_type` varchar(200) NOT NULL COMMENT '微房产模块',
  `car_type` varchar(200) NOT NULL COMMENT '微汽车模块',
  `business_func` varchar(200) NOT NULL COMMENT '业务类型',
  `act` varchar(200) NOT NULL COMMENT 'act',
  `activity_value` int(10) NOT NULL COMMENT 'activity_value',
  `place` varchar(200) NOT NULL COMMENT '经纬度',
  `lng` varchar(200) NOT NULL COMMENT '经度',
  `lat` varchar(200) NOT NULL COMMENT '纬度',
  `postdate` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- 导出表中的数据 `site_microsite_slide`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `site_page_info`
-- 

CREATE TABLE `site_page_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(200) NOT NULL COMMENT '标题',
  `url` char(40) NOT NULL COMMENT 'url',
  `info` longtext NOT NULL COMMENT '内容',
  `postdate` int(10) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `site_page_info`
-- 

INSERT INTO `site_page_info` VALUES (1, '行业薪酬调查报告', '', '<p style="vertical-align:baseline;color:#333333;font-family:Arial, ''Microsoft YaHei'', 微软雅黑, 宋体;background:none 0% 0% repeat scroll #FFFFFF;">\n	<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';line-height:25px;background:none 0% 0% repeat scroll transparent;">薪酬调研网专注人力资源数据调研，产品主要分为10个大类：地区薪酬调研报告、行业薪酬调研报告、人力资源部调研报告、人力资源配置报告、毕业生薪酬报告、薪酬增长率调研报告、补贴与福利调研报告、绩效年终奖专项调研报告、全国各地区薪酬差异指数报告等。</span><br />\n<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';line-height:25px;background:none 0% 0% repeat scroll transparent;">&nbsp;&nbsp;&nbsp;&nbsp;	近10年的数据积累，20个大行业，180多个细分行业，超过30000家企业，280多万条人力资源数据。报告以全地区、全行业通用版报告与指定地区、指定行业的定制版报告相结合的模式，满足企业市场数据需求，切实实现外部市场数据到企业落地应用的过渡，促进企业业务战略目标达成，从而实现业绩增长，成为企业简捷、高效和实用的人力资源战略工具。</span>\n</p>\n<div class="div_dotline" style="margin:20px 0px;padding:0px;border:0px none;vertical-align:baseline;color:#333333;font-family:宋体, Arial, Helvetica, sans-serif;background:none 0% 0% repeat scroll #FFFFFF;">\n</div>\n<h1 style="font-size:16px;vertical-align:baseline;color:#333333;font-family:黑体, 宋体;background:none 0% 0% repeat scroll #FFFFFF;">\n	<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">调研数据覆盖行业</span>\n</h1>\n<table class="product_table" style="margin:15px 0px 0px;padding:5px;border:1px solid #000000;font-size:12px;width:689px;color:#000000;font-family:宋体, Arial, Helvetica, sans-serif;background:none 0% 0% repeat scroll #FFFFFF;">\n	<tbody>\n		<tr>\n			<td class="product_data_td01" style="border:1px solid #000000;vertical-align:baseline;font-weight:bold;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">房地产</span>\n			</td>\n			<td class="product_data_td02" style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">地产开发(住宅地产、写字楼地产、工业地产、养老地产、旅游地产、园林地产、科技地产、产业园区地产) 商业地产（购物中心、百货） 物业管理（住宅物业、写字楼物业、产业园区物业）地产经纪（一手房经纪、二手房经纪）家装设计 建筑设计</span>\n			</td>\n		</tr>\n		<tr>\n			<td class="product_data_td01" style="border:1px solid #000000;vertical-align:baseline;font-weight:bold;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">高科技</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">软件及系统集成 互联网（门户网站、电子商务、浏览器、物联网、第三方支付） 游戏（客户端游戏、网页游戏、手机游戏） 移动互联网 硬件（计算机硬件、电子、液晶面板、光学仪器、光学测绘、机房空调、服务器）通信 航天科技 3S IC IT分销 测绘</span>\n			</td>\n		</tr>\n		<tr>\n			<td class="product_data_td01" style="border:1px solid #000000;vertical-align:baseline;font-weight:bold;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">医药</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">医药研发 医药生产 医药流通 医药连锁 医疗器械 医疗护理 生物工程 中药饮品 血液制品 酶制剂 体外诊</span>\n			</td>\n		</tr>\n		<tr>\n			<td class="product_data_td01" style="border:1px solid #000000;vertical-align:baseline;font-weight:bold;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">消费品</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">日用品 连锁加盟 饮料（乳品、酒水） 化妆品 服装 食品 鞋 皮具 奢侈品 家用电器 纸业 塑料制品 印刷礼品 保健品</span>\n			</td>\n		</tr>\n		<tr>\n			<td class="product_data_td01" style="border:1px solid #000000;vertical-align:baseline;font-weight:bold;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">金融</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">银行 基金（公募、私募） 保险 证券 担保 信托 期货 小额贷款 风险投资 大宗商品 保理 供应链金融 金融租赁</span>\n			</td>\n		</tr>\n		<tr>\n			<td class="product_data_td01" style="border:1px solid #000000;vertical-align:baseline;font-weight:bold;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">生产制造</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">机械加工 电气 仪器仪表 工程机械 通用零部件 塑料机械 电力设备 农业机械 船舶制造 电梯 压缩机 混凝土 五金 家具 模板 安防</span>\n			</td>\n		</tr>\n		<tr>\n			<td class="product_data_td01" style="border:1px solid #000000;vertical-align:baseline;font-weight:bold;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">能源化工</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">石油（石油化工、油田开采、油田服务） 新能源（光伏、风电、海洋能、生物质能） 电力（电力工程、电力设计） 精细化工 水务 环保 钢铁 煤炭 有色金属 水泥 橡胶 采掘冶炼 涂料 玻璃 陶瓷</span>\n			</td>\n		</tr>\n		<tr>\n			<td class="product_data_td01" style="border:1px solid #000000;vertical-align:baseline;font-weight:bold;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">汽车</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">汽车制造（乘用车、商用车、卡车、摩托车） 4S 店 汽车设计 汽车零配件（发动机、轮胎等） 汽车维修</span>\n			</td>\n		</tr>\n		<tr>\n			<td class="product_data_td01" style="border:1px solid #000000;vertical-align:baseline;font-weight:bold;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">建筑建材</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">建筑工程 建筑装潢 结构材料 装饰材料 油漆 墙纸 胶黏剂 特种建材</span>\n			</td>\n		</tr>\n		<tr>\n			<td class="product_data_td01" style="border:1px solid #000000;vertical-align:baseline;font-weight:bold;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">酒店商超</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">酒店管理（四星、五星、连锁）酒店建设 大型超市 便利店 家居建材中心 婚纱摄影 瑜伽会所</span>\n			</td>\n		</tr>\n		<tr>\n			<td class="product_data_td01" style="border:1px solid #000000;vertical-align:baseline;font-weight:bold;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">物流</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">运输仓储 搬运物流 储运设备 信息配送 航空运输 铁路运输 公路运输 轨道交通 水陆运输 物流信息化</span>\n			</td>\n		</tr>\n		<tr>\n			<td class="product_data_td01" style="border:1px solid #000000;vertical-align:baseline;font-weight:bold;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">专业服务</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">教育培训（外语培训、公务员考试、中小学教育辅导） 会计服务 律所 咨询 知识产权代理 科技服务 翻译</span>\n			</td>\n		</tr>\n		<tr>\n			<td class="product_data_td01" style="border:1px solid #000000;vertical-align:baseline;font-weight:bold;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">娱乐媒体</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">广告（综合广告、4A广告、网络广告） 公关 策划 会展 传媒 影视娱乐 电视购物 电影院线 KTV 高尔夫俱乐部</span>\n			</td>\n		</tr>\n		<tr>\n			<td class="product_data_td01" style="border:1px solid #000000;vertical-align:baseline;font-weight:bold;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">旅游</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">景区管理 旅行社 主题乐园 旅游投资</span>\n			</td>\n		</tr>\n		<tr>\n			<td class="product_data_td01" style="border:1px solid #000000;vertical-align:baseline;font-weight:bold;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">餐饮</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">餐饮连锁（火锅 中餐 西餐 快餐 面包甜点） 高档会所</span>\n			</td>\n		</tr>\n		<tr>\n			<td class="product_data_td01" style="border:1px solid #000000;vertical-align:baseline;font-weight:bold;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">贸易</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">出口贸易 进口贸易 农业贸易 钢材贸易</span>\n			</td>\n		</tr>\n	</tbody>\n</table>\n<div class="div_dotline" style="margin:20px 0px;padding:0px;border:0px none;vertical-align:baseline;color:#333333;font-family:宋体, Arial, Helvetica, sans-serif;background:none 0% 0% repeat scroll #FFFFFF;">\n</div>\n<h1 style="font-size:16px;vertical-align:baseline;color:#333333;font-family:黑体, 宋体;background:none 0% 0% repeat scroll #FFFFFF;">\n	<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">调研数据覆盖地域</span>\n</h1>\n<table class="product_table" style="margin:15px 0px 0px;padding:5px;border:1px solid #000000;font-size:12px;width:689px;color:#000000;font-family:宋体, Arial, Helvetica, sans-serif;background:none 0% 0% repeat scroll #FFFFFF;">\n	<tbody>\n		<tr>\n			<th style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">地区</span>\n			</th>\n			<th style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">省份</span>\n			</th>\n			<th style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">城市</span>\n			</th>\n		</tr>\n		<tr>\n			<td class="product_data_td11" style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">一类</span>\n			</td>\n			<td class="product_data_td12" style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">一线城市</span>\n			</td>\n			<td class="product_data_td13" style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">北京、上海、广州、深圳</span>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="4" style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">华北</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">天津市</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">天津</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">河北省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">石家庄、唐山、廊坊、保定、衡水、秦皇岛、邢台、鞍山</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">内蒙古自治区</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">呼和浩特、包头、呼伦贝尔</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">山西省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">太原、大同</span>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="6" style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">华东</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">江苏省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">苏南地区：南京、苏州（昆山）、无锡、常州</span>\n				<p style="vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n					<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">苏北地区：南通、连云港、淮安、盐城、扬州、镇江、泰州、徐州</span>\n				</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">浙江省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">杭州、宁波、温州、嘉兴、湖州、绍兴、金华、衢州、台州、丽水</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">福建省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">福州、厦门、泉州、漳州</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">安徽省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">合肥、芜湖、蚌埠、淮南、马鞍山、安庆</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">山东省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">济南、青岛、淄博、枣庄、东营、烟台、潍坊、威海、济宁、泰安、日照、临沂、德州、聊城、滨州</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">江西省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">南昌、景德镇、九江、新余、赣州</span>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="3" style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">华南</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">广东省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">东莞、珠海、惠州、湛江、中山、汕头、佛山、江门、茂名、肇庆、梅州、清远、揭阳</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">广西壮族自治区</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">南宁、柳州、桂林、北海、玉林</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">海南省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">海口、三亚</span>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="3" style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">华中</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">河南省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">郑州、开封、洛阳、新乡、安阳、许昌、濮阳、平顶山</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">湖北省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">武汉、襄阳、荆州、宜昌</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">湖南省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">长沙、株洲、湘潭、岳阳、衡阳、常德、郴州</span>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="4" style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">西南</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">重庆市</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">重庆</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">四川省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">成都、宜宾、绵阳、德阳</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">贵州省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">贵阳、六盘水、铜仁</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">云南省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">昆明及周边地区</span>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="3" style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">东北</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">黑龙江省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">哈尔滨</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">吉林省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">长春、吉林、四平、通化</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">辽宁省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">沈阳、大连、鞍山、本溪、抚顺、丹东、锦州、营口</span>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan="4" style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">西北</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">陕西省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">西安、宝鸡、榆林</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">甘肃省</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">兰州、天水</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">宁夏回族自治区</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">银川</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">新疆维吾尔自治区</span>\n			</td>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">乌鲁木齐、哈密、库尔勒、石河子、喀什</span>\n			</td>\n		</tr>\n		<tr>\n			<td style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">地区</span>\n			</td>\n			<td colspan="2" style="border:1px solid #000000;vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">\n				<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">环渤海地区</span><br />\n<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">各地开发区</span><br />\n<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">长江三角洲地区</span><br />\n<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">珠江三角洲地区</span><br />\n<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">京津塘地区</span><br />\n<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">环北部湾地区</span><br />\n<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">辽东半岛（沈大）地区</span><br />\n<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">山东半岛（济青）地区</span><br />\n<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">环杭州湾地区</span><br />\n<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">环太湖地区</span><br />\n<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">环武汉地区</span><br />\n<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">成渝地区</span><br />\n<span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;"><span style="vertical-align:baseline;background:none 0% 0% repeat scroll transparent;">长株潭地区</span><br />\n</span><br />\n			</td>\n		</tr>\n	</tbody>\n</table>\n<p style="vertical-align:baseline;color:#333333;font-family:''Microsoft YaHei'', 微软雅黑, 宋体, ''\\9'';background:none 0% 0% repeat scroll #FFFFFF;">\n	<br />\n</p>\n<p style="vertical-align:baseline;color:#333333;font-family:''Microsoft YaHei'', 微软雅黑, 宋体, ''\\9'';background:none 0% 0% repeat scroll #FFFFFF;">\n	<strong><span style="vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;"><br />\n</span></strong>\n</p>\n<p style="vertical-align:baseline;color:#333333;font-family:''Microsoft YaHei'', 微软雅黑, 宋体, ''\\9'';background:none 0% 0% repeat scroll #FFFFFF;">\n	<strong><span style="font-size:14px;vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">产品介绍：</span></strong>\n</p>\n<p style="vertical-align:baseline;color:#333333;font-family:''Microsoft YaHei'', 微软雅黑, 宋体, ''\\9'';background:none 0% 0% repeat scroll #FFFFFF;">\n	<span style="font-size:14px;vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">　　客户无需自己安装软件，直接在线登录使用薪酬查询分析系统功能，系统自动升级无需维护，数据即时更新，后台功能强大，操作简便快捷。</span>\n</p>\n<p style="vertical-align:baseline;color:#333333;font-family:''Microsoft YaHei'', 微软雅黑, 宋体, ''\\9'';background:none 0% 0% repeat scroll #FFFFFF;">\n	<span style="font-size:14px;vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">　　产品特点：</span>\n</p>\n<p style="vertical-align:baseline;color:#333333;font-family:''Microsoft YaHei'', 微软雅黑, 宋体, ''\\9'';background:none 0% 0% repeat scroll #FFFFFF;">\n	<span style="font-size:14px;vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">　　报告版本：Saas系统版+PDF版+Excel版+书面精装版;</span>\n</p>\n<p style="vertical-align:baseline;color:#333333;font-family:''Microsoft YaHei'', 微软雅黑, 宋体, ''\\9'';background:none 0% 0% repeat scroll #FFFFFF;">\n	<span style="font-size:14px;vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">　　</span><span style="font-size:14px;vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">数据即时更新</span><span style="font-size:14px;vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">;</span>\n</p>\n<p style="vertical-align:baseline;color:#333333;font-family:''Microsoft YaHei'', 微软雅黑, 宋体, ''\\9'';background:none 0% 0% repeat scroll #FFFFFF;">\n	<span style="font-size:14px;vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">　　</span><span style="font-size:14px;vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">操作简便快捷</span><span style="font-size:14px;vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">;</span>\n</p>\n<p style="vertical-align:baseline;color:#333333;font-family:''Microsoft YaHei'', 微软雅黑, 宋体, ''\\9'';background:none 0% 0% repeat scroll #FFFFFF;">\n	<span style="font-size:14px;vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">　　</span><span style="font-size:14px;vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">后台功能强大</span><span style="font-size:14px;vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">。</span>\n</p>\n<p style="vertical-align:baseline;color:#333333;font-family:''Microsoft YaHei'', 微软雅黑, 宋体, ''\\9'';background:none 0% 0% repeat scroll #FFFFFF;">\n	<span style="font-size:14px;vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">　　行业标准薪酬报告，即开即用。</span>\n</p>', 1500888254);
INSERT INTO `site_page_info` VALUES (2, '定制薪酬调查报告', '', '<span style="font-size:14px;vertical-align:baseline;color:#333333;line-height:normal;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll #FFFFFF;"><strong>您的员工是您最大的资产 — 为他们提供报酬是您的投资</strong></span><br />\n<br />\n<span style="font-size:14px;vertical-align:baseline;color:#333333;line-height:normal;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll #FFFFFF;">看一下您的资产负债表，您不会看到任何一行的项目中能反映您的员工的热情、敬业度或精力水平。但是这些不可见的因素对于员工的绩效具有关键作用。请运用适当的报酬战略使得这些因素保持可持续发展状态。</span><br />\n<br />\n<span style="font-size:14px;vertical-align:baseline;color:#333333;line-height:normal;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll #FFFFFF;"><strong>竞争对手、市场薪酬水平、薪酬策略、分析依据？</strong></span><br />\n<br />\n<span style="font-size:14px;vertical-align:baseline;color:#333333;line-height:normal;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll #FFFFFF;">业务目标由人员推动。但是，人员是由什么因素驱动的呢？</span><br />\n<span style="font-size:14px;vertical-align:baseline;color:#333333;line-height:normal;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll #FFFFFF;">&nbsp;</span><br />\n<span style="font-size:14px;vertical-align:baseline;color:#333333;line-height:normal;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll #FFFFFF;">工资，没错——但是也不止这一点。薪酬网理解何种元素驱动着员工，并将这一知识转化为成果——我们在这方面拥有多年的调研经验。您在任何其他地方都无法获得像我们的这样的数据。我们的基准数据库在评估以及创建有竞争力的薪酬组合方面，是业内最完整的。</span><br />\n<span style="font-size:14px;vertical-align:baseline;color:#333333;line-height:normal;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll #FFFFFF;">&nbsp;</span><br />\n<span style="font-size:14px;vertical-align:baseline;color:#333333;line-height:normal;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll #FFFFFF;">我们拥有自动化的薪酬分析系统和过硬的数据，以设计您的组织的员工报酬、薪酬外部竞争力、管理内部公平性，以及（最为重要的是）打造一个满意的、生产率更高的劳动力队伍。</span><br />\n<span style="font-size:14px;vertical-align:baseline;color:#333333;line-height:normal;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll #FFFFFF;">&nbsp;</span><br />\n<span style="font-size:14px;vertical-align:baseline;color:#333333;line-height:normal;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll #FFFFFF;"><strong>您对行业竞争对手薪酬水平了解多少？</strong></span><br />\n<span style="font-size:14px;vertical-align:baseline;color:#333333;line-height:normal;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll #FFFFFF;">有效的报酬战略设计意味着充分接受多样化的、跨多代人的劳动力队伍的需求。各种背景的员工在一起工作。这是一件奇妙的事情——也是一件需要比以往任何时候都更加微妙的报酬战略的事情。毕竟，“报酬”对于不同的人、在人们生活中的不同时期以及在世界的不同地区，意味着不同的事情。在这个选择的时代，您如何设计和实施员工价值主张的这一基石，是您可以运用的最有力的人才保留工具。</span><br />\n<span style="font-size:14px;vertical-align:baseline;color:#333333;line-height:normal;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll #FFFFFF;">&nbsp;</span><br />\n<span style="font-size:14px;vertical-align:baseline;color:#333333;line-height:normal;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll #FFFFFF;">正如每个人的职业生涯都是各不相同的，我们能够通过诸如以下解决方案使您的报酬结构运行更加容易，更加高效：在您的整个组织内以及全球进行岗位水平测量，制定帮助您的员工打造职业生涯的架构，为您的所有报酬决策提供指导的动态的职业生涯框架。</span><br />\n<br />\n<span style="font-size:14px;vertical-align:baseline;color:#333333;line-height:normal;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll #FFFFFF;"><strong>您需要一份为您企业定制的薪酬调查报告，详情请咨询相关行业顾问。</strong></span>', 1500888278);
INSERT INTO `site_page_info` VALUES (3, '岗位薪酬调查报告', '', '<p style="vertical-align:baseline;">\n	<strong>薪酬调研网每年调研180个细分行业，接近260多个地区，数据库每年积累300万条数据，标准岗位2600多个。</strong>\n</p>\n<p style="vertical-align:baseline;">\n	<strong><br />\n</strong>\n</p>\n<p style="vertical-align:baseline;">\n	<strong>您可以在以下岗位中选择您需要的岗位薪酬数据，也可以将您公司的行业地区及</strong><strong>岗位职责提交给我们，我们来帮您匹配相应职位。</strong>\n</p>\n<p style="vertical-align:baseline;">\n	<strong><br />\n</strong>\n</p>\n<p style="vertical-align:baseline;">\n	<strong>更多内容欢迎咨询相关行业薪酬顾问。</strong>\n</p>\n<h2 style="font-size:12px;vertical-align:baseline;">\n	<p style="vertical-align:baseline;color:#333333;font-family:''Microsoft YaHei'', 微软雅黑, 宋体, ''\\9'';background:none 0% 0% repeat scroll #FFFFFF;">\n		<span style="font-size:16px;vertical-align:baseline;font-family:''Microsoft YaHei'';background:none 0% 0% repeat scroll transparent;">部分调研职位展示：</span>\n	</p>\n	<div>\n		<br />\n	</div>\n</h2>', 1500888313);

-- --------------------------------------------------------

-- 
-- 表的结构 `site_sale_site_cate`
-- 

CREATE TABLE `site_sale_site_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(20) NOT NULL COMMENT '名称',
  `parent_id` int(10) DEFAULT '0' COMMENT '父类',
  `url` varchar(200) NOT NULL COMMENT 'seo_url',
  `pic` varchar(200) NOT NULL COMMENT '图片',
  `is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '审核',
  `sort_order` int(3) DEFAULT '0' COMMENT '排序',
  `postdate` int(10) unsigned DEFAULT '0' COMMENT '添加时间',
  `info` varchar(255) NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- 导出表中的数据 `site_sale_site_cate`
-- 


-- --------------------------------------------------------

-- 
-- 表的结构 `site_setting`
-- 

CREATE TABLE `site_setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(200) NOT NULL COMMENT '站点名称',
  `title` varchar(200) NOT NULL COMMENT '网站标题',
  `keyword` varchar(300) NOT NULL COMMENT '站点关键字',
  `description` varchar(500) NOT NULL COMMENT '站点描述',
  `pic` varchar(200) NOT NULL COMMENT '网站Logo',
  `address` varchar(200) NOT NULL COMMENT '地址',
  `code` mediumtext NOT NULL COMMENT '统计/客服代码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `site_setting`
-- 

INSERT INTO `site_setting` VALUES (1, '', '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- 表的结构 `site_setting_wap`
-- 

CREATE TABLE `site_setting_wap` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(200) NOT NULL COMMENT '网站名称',
  `keyword` varchar(300) NOT NULL COMMENT '站点关键字',
  `description` varchar(500) NOT NULL COMMENT '站点描述',
  `pic` varchar(200) NOT NULL COMMENT '网站Logo',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `site_setting_wap`
-- 

INSERT INTO `site_setting_wap` VALUES (1, 'Yesy111', 'Yesy111', 'Yesy111', '/codeIgniter_system2/resource/kindeditor-4.1.9/attached/image/20140423/20140423133002_92694.jpg');

-- --------------------------------------------------------

-- 
-- 表的结构 `site_slide_wap`
-- 

CREATE TABLE `site_slide_wap` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `title` varchar(200) NOT NULL COMMENT '标题',
  `pic` varchar(200) NOT NULL COMMENT '图片',
  `width` int(10) NOT NULL COMMENT '宽度',
  `height` int(10) NOT NULL COMMENT '高度',
  `url` char(40) NOT NULL COMMENT '链接地址',
  `info` tinytext NOT NULL COMMENT '备注',
  `sort_order` int(10) NOT NULL COMMENT '排序',
  `postdate` int(10) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

-- 
-- 导出表中的数据 `site_slide_wap`
-- 

INSERT INTO `site_slide_wap` VALUES (28, '20140603090406_62250', 'upload/advertise/20140603090406_62250.jpg', 680, 300, '', '', 0, 1423030483);
INSERT INTO `site_slide_wap` VALUES (29, '20140603090421_41489', 'upload/advertise/20140603090421_41489.jpg', 680, 300, '', '', 0, 1423030483);
INSERT INTO `site_slide_wap` VALUES (27, '20140603090435_72215', 'upload/advertise/20140603090435_72215.jpg', 680, 300, '', '', 0, 1422528346);
INSERT INTO `site_slide_wap` VALUES (30, 'asdf', '/codeIgniter_system2/resource/kindeditor-4.1.9/attached/image/20140423/20140423132731_18929.jpg', 233, 222, '', '', 0, 1423030842);
INSERT INTO `site_slide_wap` VALUES (31, 'a', '/codeIgniter_system2/resource/kindeditor-4.1.9/attached/image/20140603/20140603090406_62250.jpg', 0, 0, '', '', 0, 1423030856);
