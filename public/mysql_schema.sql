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

Date: 2016-01-27 15:35:43
*/


-- ----------------------------
-- Table structure for `projects`
-- ----------------------------
DROP TABLE IF EXISTS "projects";
CREATE TABLE "projects" (
"id_project"  int NOT NULL ,
"numproject"  smallint NOT NULL ,
"material_brus"  varchar(2) NOT NULL ,
"material_brevno"  varchar(2) NOT NULL ,
"price"  bigint NULL ,
"image"  varchar(255) NULL ,
"floor"  smallint NOT NULL ,
"area"  float NULL ,
PRIMARY KEY (`id_project`)
)

;

-- ----------------------------
-- Records of projects
-- ----------------------------
BEGIN;
INSERT INTO `projects` VALUES ('1', '128', '0', '1', '2773924', '/images/128/2_2.jpg', '3', '295.84'), ('2', '124', '1', '1', '2738274', '/images/124/06.12.15-b-5-post.jpg', '2', '347.75'), ('3', '115', '1', '0', '985274', '/images/115/1 коньяк.JPG', '2', '206.91'), ('4', '121', '1', '0', '2150321', '/images/121/3d-1.jpg', '2', '235.17'), ('5', '94', '1', '0', '1465830', '/images/94/94_0.jpg', '2', '127.29'), ('6', '27', '0', '1', '1038756', '/images/27/03 темный 2 вариант.jpg', '1', '93.34'), ('7', '93', '0', '1', '1803630', '/images/93/0.jpg', '2', '148'), ('8', '122', '0', '1', '1381891', '/images/122/smirnova-b-2-front-post.jpg', '2', '169.15'), ('9', '112', '0', '1', '3773924', '/images/112/dragan-b.jpg', '3', '63'), ('10', '97', '1', '0', '2319908', '/images/97/дом п-97.jpg', '2', '254.8');
COMMIT;
