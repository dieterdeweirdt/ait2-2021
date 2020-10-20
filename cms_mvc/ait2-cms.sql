# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.29)
# Database: ait2-cms
# Generation Time: 2020-09-29 07:04:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `page_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(256) DEFAULT NULL,
  `name` varchar(100) DEFAULT '',
  `title` varchar(256) DEFAULT NULL,
  `content` text,
  `sort_order` int(11) DEFAULT NULL,
  `template` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `pages` (`page_id`, `slug`, `name`, `title`, `content`, `sort_order`, `template`)
VALUES
	(1,'home','Home','Welkom op de website van Graduaat Programmeren','<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur quae hic ipsa aut quisquam dolorem quidem, placeat, sunt dolore minima molestias magni asperiores officiis ut, reprehenderit similique error! Maiores, consequuntur.</p>\n<p>Nemo quod dignissimos illum rem excepturi enim sapiente et tenetur, similique a dolores qui itaque dolor repudiandae magnam corporis fuga! Repudiandae totam vitae ea eaque veniam voluptatem quibusdam, odit optio.</p>\n<p>Rem fuga illum hic debitis perspiciatis! Culpa modi ex autem in nostrum placeat consequatur explicabo suscipit ipsum dolorum neque voluptatibus, pariatur dolorem reiciendis numquam labore deleniti temporibus adipisci vel quos?</p>\n<p>Non possimus pariatur recusandae veritatis sequi minus dolorum, corrupti, suscipit impedit, commodi atque id. Dolore, a! Sapiente, architecto deleniti quibusdam repellendus, debitis dolorum hic maiores perspiciatis nulla aut vitae sed!</p>\n',1,'home'),
	(2,'contact','Contact','Contacteer ons','<p>Repudiandae voluptate sunt unde necessitatibus aut at ipsam molestiae labore porro cum, molestias eum quae eveniet, odit esse! Veritatis, eveniet incidunt? Itaque doloremque velit fuga repudiandae inventore placeat similique perspiciatis!</p>\n',5,'page'),
	(3,'overzicht-lessen','Lessen','Hoe ziet het lessenpakket er uit ?','<p>Corrupti, nobis facilis omnis eligendi quia veritatis possimus deserunt rem sit optio, nihil vel nisi et vero. Nemo facere sunt dolorem quibusdam debitis, consequatur, ad exercitationem harum, hic impedit iusto?</p>\n<p>Iste ipsum, aut molestias similique aliquam obcaecati expedita. Quibusdam optio provident saepe accusantium, voluptas enim molestiae error possimus sit incidunt repellat inventore, illum, ipsum et illo molestias consequatur consectetur soluta.</p>\n<p>Ab odit officiis quia aperiam sunt suscipit rerum amet error qui facilis ipsam distinctio consequuntur unde incidunt, vitae harum dolore pariatur itaque corporis consectetur quasi blanditiis nihil aspernatur. Architecto, deserunt?</p>\n',2,'page'),
	(4,'campus','De campus','Onze campus','<p>Tempora, rem. Distinctio tempore asperiores nostrum quam sunt corporis maxime voluptatem quae ullam officiis ab repudiandae unde nam et accusamus, praesentium modi magnam necessitatibus culpa perferendis nisi. Sit, eum ratione.</p>\n<p>Qui in at nesciunt, sapiente nihil similique. Earum omnis saepe dolorum, dolorem culpa amet perferendis debitis atque minus odit vitae velit sint est. Dolore sunt mollitia, molestias magnam delectus impedit?</p>\n<p>Explicabo, ad architecto? Esse, dolores, sapiente inventore praesentium molestiae distinctio doloremque laboriosam ea exercitationem vel, eligendi aspernatur iste quae deserunt recusandae quo enim ipsa error molestias nisi ad libero repellendus!</p>\n',3,'page'),
	(5,'werken-van-studenten','Werken van studenten','Bekijk de werken van onze studenten',NULL,4,'projects');




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
