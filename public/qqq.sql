/*
Navicat PGSQL Data Transfer

Source Server         : PgSQL
Source Server Version : 90404
Source Host           : localhost:5432
Source Database       : visite
Source Schema         : public

Target Server Type    : MYSQL
Target Server Version : 50599
File Encoding         : 65001

Date: 2016-01-26 09:28:00
*/


-- ----------------------------
-- Table structure for `projects`
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
`id_project`  int NOT NULL ,
`numproject`  smallint NOT NULL ,
`material_brus`  varchar(5) NOT NULL ,
`material_brevno`  varchar(5) NOT NULL ,
`price`  bigint NULL ,
`image`  varchar(255) NULL ,
`floor`  smallint NOT NULL ,
PRIMARY KEY (`id_project`)
)

;

-- ----------------------------
-- Records of projects
-- ----------------------------
BEGIN;
INSERT INTO `projects` VALUES ('1', '128', 't', 'f', '2773924', '/images/128/2_2.jpg', '2'), ('2', '124', 't', 't', '2738274', '/images/124/06.12.15-b-5-post.jpg', '2'), ('3', '115', 't', 'f', '1585274', '/images/115/1 коньяк.JPG', '2'), ('4', '121', 'f', 'f', '2150321', '/images/121/3d-1.jpg', '2'), ('5', '94', 'f', 'f', '1465830', '/images/94/94_0.jpg', '2'), ('6', '27', 'f', 'f', '1038756', '/images/27/03 темный 2 вариант.jpg', '2'), ('7', '93', 'f', 'f', '1803630', '/images/93/0.jpg', '2'), ('8', '122', 'f', 'f', '1381891', '/images/122/smirnova-b-2-front-post.jpg', '2'), ('9', '112', 'f', 'f', '2773924', '/images/112/dragan-b.jpg', '1'), ('10', '97', 't', 'f', '2319908', '/images/97/дом п-97.jpg', '2');
COMMIT;
