/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2021-03-26 17:49:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_admin
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin`;
CREATE TABLE `blog_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `pass` char(32) DEFAULT NULL,
  `salt` char(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of blog_admin
-- ----------------------------
INSERT INTO `blog_admin` VALUES ('1', 'cuznv', 'edae1dbe1a6919da0a0e296bebcb7c99', '666666', '2021-03-19 17:24:26', null);

-- ----------------------------
-- Table structure for blog_article
-- ----------------------------
DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE `blog_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `desc` varchar(100) DEFAULT NULL COMMENT '文章描述',
  `keywords` varchar(100) DEFAULT NULL COMMENT '标签',
  `img_url` varchar(200) DEFAULT NULL COMMENT '文章缩略图',
  `content` text,
  `views` int(11) DEFAULT '0' COMMENT '文章浏览量',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_article
-- ----------------------------
INSERT INTO `blog_article` VALUES ('1', '2', '空白文章', 'ADDD', '空白文章测试', null, null, '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;文章内容\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '0', null, '2021-03-25 01:55:54');
INSERT INTO `blog_article` VALUES ('2', '2', '文章2', 'ADD', '文章2，文章2', null, '/uploads/2021-03-24/1616577621.jpg', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;文章内容\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '0', '2021-03-24 09:20:38', '2021-03-24 09:20:38');
INSERT INTO `blog_article` VALUES ('3', '2', '文章3', 'AEX', '杂项，git', '测试文章3', '/uploads/2021-03-24/1616577820.jpg', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;文章内容\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"/uploads/article/20210324/1616577837.jpg\" title=\"1616577837.jpg\" alt=\"II.jpg\"/></p>', '0', '2021-03-24 09:24:05', '2021-03-24 09:24:05');
INSERT INTO `blog_article` VALUES ('6', '3', '自建KMS', '我', '用手机tty自建服务器', 'KMS，自建', '/uploads/2021-03-24/1616579075.jpg', '<p>想要了解怎么用手机自建KMS服务器吗？快随小编一起来了解吧~</p><p>啊，其实就是这样的，你学会了吗？</p>', '28', '2021-03-24 09:46:00', '2021-03-26 03:01:28');

-- ----------------------------
-- Table structure for blog_cate
-- ----------------------------
DROP TABLE IF EXISTS `blog_cate`;
CREATE TABLE `blog_cate` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `desc` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='分类栏目表';

-- ----------------------------
-- Records of blog_cate
-- ----------------------------
INSERT INTO `blog_cate` VALUES ('1', 'PHP', 'php介绍', '2021-03-24 10:26:46', null);
INSERT INTO `blog_cate` VALUES ('2', '杂项', '杂七杂八', '2021-03-24 10:27:00', null);
INSERT INTO `blog_cate` VALUES ('3', 'LINUX', '---LINUX---', '2021-03-24 10:27:30', null);

-- ----------------------------
-- Table structure for blog_comments
-- ----------------------------
DROP TABLE IF EXISTS `blog_comments`;
CREATE TABLE `blog_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL COMMENT '用户名',
  `art_id` int(11) NOT NULL COMMENT '文章id',
  `comment` varchar(150) DEFAULT NULL COMMENT '评论内容',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_comments
-- ----------------------------

-- ----------------------------
-- Table structure for blog_image
-- ----------------------------
DROP TABLE IF EXISTS `blog_image`;
CREATE TABLE `blog_image` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `src` varchar(100) DEFAULT NULL COMMENT '图片地址',
  `desc` varchar(100) DEFAULT NULL,
  `sort` tinyint(4) DEFAULT '0' COMMENT '顺序，越大越靠前',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='轮播图表';

-- ----------------------------
-- Records of blog_image
-- ----------------------------
INSERT INTO `blog_image` VALUES ('3', 'asfasdasfasf', 'http://www.baidu.com', '/uploads/2021-03-22/1616394830.jpg', 'dsafasfdasfadsfadsf', '44', null, null);
INSERT INTO `blog_image` VALUES ('4', '产品', 'http://customerewms.yto.net.cn/CommonOrderModeBPlusServlet.action', '/uploads/2021-03-25/1616653963.jpg', 'dasfasdfasdfdasf', '99', null, '2021-03-25 06:33:27');

-- ----------------------------
-- Table structure for blog_system
-- ----------------------------
DROP TABLE IF EXISTS `blog_system`;
CREATE TABLE `blog_system` (
  `id` tinyint(4) NOT NULL,
  `title` varchar(100) DEFAULT NULL COMMENT '网站标题',
  `url` varchar(100) DEFAULT NULL COMMENT '网站域名',
  `keywords` varchar(100) DEFAULT NULL COMMENT '关键词',
  `desc` text COMMENT '网站描述',
  `author` varchar(100) DEFAULT NULL COMMENT '作者',
  `footer` varchar(100) DEFAULT NULL COMMENT '网站底部',
  `img` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='网站设置';

-- ----------------------------
-- Records of blog_system
-- ----------------------------
INSERT INTO `blog_system` VALUES ('1', 'laravel博客', 'myblog.com', '博客，laravel', '本人学识渊博、经验丰富，代码风骚、效率恐怖。精通c/c++的拼写、掌握php的英文全称，精通Linux的各个版本号名称，熟练使用各种框架，深山苦练20余年，一天只睡4小时，电话通知出bug后秒登vpn，千里之外定位问题，瞬息之间修复上线。', 'cuz', '谁会看底部啊？？', '');

-- ----------------------------
-- Table structure for blog_user
-- ----------------------------
DROP TABLE IF EXISTS `blog_user`;
CREATE TABLE `blog_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` char(32) NOT NULL,
  `salt` char(6) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_user
-- ----------------------------
INSERT INTO `blog_user` VALUES ('1', '蔡徐坤', '48df7fb5d5160e269c7c0aec26dc15ab', 'CR1tJG', '2021-03-25 03:48:29', '2021-03-25 03:48:29');
INSERT INTO `blog_user` VALUES ('2', 'zzz', '2787d144698bc3f72af39afab968939e', '2Rdzlv', '2021-03-25 04:54:43', '2021-03-25 04:54:43');
