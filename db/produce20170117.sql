/*
SQLyog Community v12.3.3 (64 bit)
MySQL - 10.1.19-MariaDB : Database - produce
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`produce` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `produce`;

/*Table structure for table `adm_event` */

DROP TABLE IF EXISTS `adm_event`;

CREATE TABLE `adm_event` (
  `eventID` int(6) unsigned NOT NULL,
  `moduleID` int(5) unsigned NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `command` enum('LISTAR','ADMINISTRAR','LOGIN','PASSWORD','BLOQUEO','LOGOFF') NOT NULL,
  `regEvent` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`eventID`),
  KEY `FK_adm_event_module` (`moduleID`),
  CONSTRAINT `FK_adm_event_module` FOREIGN KEY (`moduleID`) REFERENCES `adm_module` (`moduleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `adm_event` */

insert  into `adm_event`(`eventID`,`moduleID`,`eventName`,`command`,`regEvent`) values 
(1,1,'Login: Ingresar al Sistema','LOGIN',1),
(2,1,'Login: No forzar a actualizar contraseña','PASSWORD',1),
(3,1,'Login: No permitir bloqueo de usuario','BLOQUEO',1),
(4,1,'Logoff: Cerrar sessión','LOGOFF',1),
(5,2,'Administradores: Listar','LISTAR',0),
(6,2,'Administradores: Administrar','ADMINISTRAR',1),
(7,3,'Perfiles: Listar','LISTAR',0),
(8,3,'Perfiles: Administrar','ADMINISTRAR',1),
(9,4,'Registro de Eventos: Listar','LISTAR',0),
(10,4,'Registro de Eventos: Administrar','ADMINISTRAR',0),
(11,5,'Idiomas: Listar','LISTAR',0),
(12,5,'Idiomas: Administrar','ADMINISTRAR',1),
(13,6,'Minisites: Listar','LISTAR',0),
(14,6,'Minisites: Administrar','ADMINISTRAR',1),
(15,7,'Términos por Idioma: Listar','LISTAR',0),
(16,7,'Términos por Idioma: Administrar','ADMINISTRAR',1),
(17,8,'Galerías y Media: Listar','LISTAR',0),
(18,8,'Galerías y Media: Administrar','ADMINISTRAR',1),
(19,10,'Usuarios de la Web: Listar','LISTAR',0),
(20,10,'Usuarios de la Web: Administrar','ADMINISTRAR',1),
(21,11,'Configuración: Listar','LISTAR',0),
(22,11,'Configuración: Administrar','ADMINISTRAR',1),
(25,18,'Formularios de registro: Listar','LISTAR',0),
(26,18,'Formularios de registro: Administrar','ADMINISTRAR',1),
(27,19,'Notificaciones: Listar','LISTAR',0),
(28,19,'Notificaciones: Administrar','ADMINISTRAR',1),
(32,21,'Asunto de Contacto: Listar','LISTAR',0),
(33,21,'Asunto de Contacto: Administrar','ADMINISTRAR',1),
(34,22,'Areas de Interés: Listar','LISTAR',0),
(35,22,'Areas de Interés: Administrar','ADMINISTRAR',1),
(50,30,'Página Principal: Listar','LISTAR',0),
(51,30,'Página Principal: Administrar','ADMINISTRAR',1),
(52,31,'Herramientas: Listar','LISTAR',0),
(53,31,'Herramientas: Administrar','ADMINISTRAR',1),
(54,32,'Pié de Página: Listar','LISTAR',0),
(55,32,'Pié de Página: Administrar','ADMINISTRAR',1),
(56,33,'Reportes: Listar','LISTAR',0),
(57,33,'Reportes: Administrar','ADMINISTRAR',1),
(58,34,'CHI: Listar','LISTAR',0),
(59,34,'CHI: Administrar','ADMINISTRAR',1),
(60,35,'Facturacion: Listar','LISTAR',0),
(61,35,'Facturacion: Administrar','ADMINISTRAR',1);

/*Table structure for table `adm_log` */

DROP TABLE IF EXISTS `adm_log`;

CREATE TABLE `adm_log` (
  `logDate` datetime NOT NULL,
  `eventID` int(6) unsigned NOT NULL,
  `userID` int(6) unsigned NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `object` text,
  PRIMARY KEY (`eventID`,`logDate`,`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `adm_log` */

insert  into `adm_log`(`logDate`,`eventID`,`userID`,`comment`,`object`) values 
('2015-12-01 11:58:20',1,1,'El usuario ingres&oacute; al sistema',''),
('2015-12-01 12:46:49',1,1,'El usuario ingres&oacute; al sistema',''),
('2015-12-15 10:22:14',1,1,'El usuario ingres&oacute; al sistema',''),
('2015-12-15 14:59:32',1,1,'El usuario ingres&oacute; al sistema',''),
('2015-12-15 15:04:10',1,1,'El usuario ingres&oacute; al sistema',''),
('2015-12-15 15:13:13',1,1,'El usuario ingres&oacute; al sistema',''),
('2015-12-16 09:11:05',1,1,'El usuario ingres&oacute; al sistema',''),
('2015-12-16 11:21:25',1,1,'El usuario ingres&oacute; al sistema',''),
('2015-12-16 11:28:43',1,1,'El usuario ingres&oacute; al sistema',''),
('2015-12-17 10:27:09',1,1,'El usuario ingres&oacute; al sistema',''),
('2015-12-17 16:14:46',1,1,'El usuario ingres&oacute; al sistema',''),
('2016-01-05 11:01:43',1,1,'El usuario ingres&oacute; al sistema',''),
('2016-01-06 09:41:07',1,1,'El usuario ingres&oacute; al sistema',''),
('2016-01-11 11:36:35',1,1,'El usuario ingres&oacute; al sistema',''),
('2016-01-12 09:20:20',1,1,'El usuario ingres&oacute; al sistema',''),
('2016-01-12 10:54:41',1,1,'El usuario ingres&oacute; al sistema',''),
('2016-01-12 12:26:21',1,1,'El usuario ingres&oacute; al sistema',''),
('2016-01-12 14:16:10',1,1,'El usuario ingres&oacute; al sistema',''),
('2016-01-13 09:18:56',1,1,'El usuario ingres&oacute; al sistema',''),
('2016-01-13 09:31:05',1,1,'El usuario ingres&oacute; al sistema',''),
('2016-01-19 09:46:09',1,1,'El usuario ingres&oacute; al sistema',''),
('2016-01-20 17:14:49',1,1,'El usuario ingres&oacute; al sistema',''),
('2016-01-21 10:59:20',1,1,'El usuario ingres&oacute; al sistema',''),
('2016-01-22 10:25:07',1,1,'El usuario ingres&oacute; al sistema',''),
('2016-01-25 10:22:47',1,1,'El usuario ingres&oacute; al sistema',''),
('2017-01-16 09:44:53',1,1,'El usuario ingres&oacute; al sistema',''),
('2017-01-16 10:25:45',1,1,'El usuario ingres&oacute; al sistema',''),
('2017-01-16 10:51:31',1,1,'El usuario ingres&oacute; al sistema',''),
('2017-01-16 11:13:19',1,1,'El usuario ingres&oacute; al sistema',''),
('2017-01-16 11:21:50',1,1,'El usuario ingres&oacute; al sistema',''),
('2017-01-16 11:24:04',1,1,'El usuario ingres&oacute; al sistema',''),
('2017-01-16 11:47:55',1,1,'El usuario ingres&oacute; al sistema',''),
('2017-01-16 14:59:02',1,1,'El usuario ingres&oacute; al sistema',''),
('2017-01-16 15:23:50',1,1,'El usuario ingres&oacute; al sistema',''),
('2017-01-16 16:18:01',1,1,'El usuario ingres&oacute; al sistema',''),
('2017-01-17 10:07:36',1,1,'El usuario ingres&oacute; al sistema',''),
('2017-01-17 11:24:41',1,1,'El usuario ingres&oacute; al sistema',''),
('2015-12-15 11:50:24',6,1,'El usuario insert&oacute; el registro','O:8:\"eAdmUser\":13:{s:6:\"userID\";i:2;s:8:\"userName\";s:6:\"martin\";s:8:\"password\";s:6:\"asixon\";s:9:\"firstName\";s:7:\"Martín\";s:8:\"lastName\";s:8:\"Bailetti\";s:5:\"email\";s:24:\"martinbailetti@gmail.com\";s:9:\"profileID\";s:1:\"1\";s:5:\"state\";s:1:\"1\";s:11:\"profileName\";N;s:9:\"isDefault\";N;s:10:\"lUserEvent\";N;s:8:\"userMenu\";N;s:10:\"userModule\";N;}'),
('2015-12-15 11:51:09',6,1,'El usuario insert&oacute; el registro','O:8:\"eAdmUser\":13:{s:6:\"userID\";i:3;s:8:\"userName\";s:6:\"chorri\";s:8:\"password\";s:6:\"asixon\";s:9:\"firstName\";s:7:\"Roberto\";s:8:\"lastName\";s:6:\"Flores\";s:5:\"email\";s:18:\"chorri@hotmail.com\";s:9:\"profileID\";s:1:\"1\";s:5:\"state\";s:1:\"0\";s:11:\"profileName\";N;s:9:\"isDefault\";N;s:10:\"lUserEvent\";N;s:8:\"userMenu\";N;s:10:\"userModule\";N;}'),
('2016-01-06 12:21:20',6,1,'El usuario actualiz&oacute; el registro','O:8:\"eAdmUser\":13:{s:6:\"userID\";s:1:\"2\";s:8:\"userName\";s:6:\"martin\";s:8:\"password\";s:6:\"asixon\";s:9:\"firstName\";s:7:\"Martín\";s:8:\"lastName\";s:8:\"Bailetti\";s:5:\"email\";s:24:\"martinbailetti@gmail.com\";s:9:\"profileID\";s:1:\"1\";s:5:\"state\";s:1:\"1\";s:11:\"profileName\";N;s:9:\"isDefault\";N;s:10:\"lUserEvent\";N;s:8:\"userMenu\";N;s:10:\"userModule\";N;}'),
('2017-01-16 10:57:37',6,1,'El usuario elimin&oacute; el registro','O:8:\"eAdmUser\":13:{s:6:\"userID\";s:1:\"2\";s:8:\"userName\";s:0:\"\";s:8:\"password\";s:0:\"\";s:9:\"firstName\";s:0:\"\";s:8:\"lastName\";s:0:\"\";s:5:\"email\";s:0:\"\";s:9:\"profileID\";i:0;s:5:\"state\";i:0;s:11:\"profileName\";N;s:9:\"isDefault\";N;s:10:\"lUserEvent\";N;s:8:\"userMenu\";N;s:10:\"userModule\";N;}'),
('2017-01-16 10:57:40',6,1,'El usuario elimin&oacute; el registro','O:8:\"eAdmUser\":13:{s:6:\"userID\";s:1:\"3\";s:8:\"userName\";s:0:\"\";s:8:\"password\";s:0:\"\";s:9:\"firstName\";s:0:\"\";s:8:\"lastName\";s:0:\"\";s:5:\"email\";s:0:\"\";s:9:\"profileID\";i:0;s:5:\"state\";i:0;s:11:\"profileName\";N;s:9:\"isDefault\";N;s:10:\"lUserEvent\";N;s:8:\"userMenu\";N;s:10:\"userModule\";N;}'),
('2017-01-16 10:57:54',6,1,'El usuario actualiz&oacute; el registro','O:8:\"eAdmUser\":13:{s:6:\"userID\";s:1:\"1\";s:8:\"userName\";s:5:\"admin\";s:8:\"password\";s:5:\"admin\";s:9:\"firstName\";s:9:\"Webmaster\";s:8:\"lastName\";s:0:\"\";s:5:\"email\";s:37:\"Junior.Huallullo@pe.bureauveritas.com\";s:9:\"profileID\";s:1:\"1\";s:5:\"state\";s:1:\"1\";s:11:\"profileName\";N;s:9:\"isDefault\";N;s:10:\"lUserEvent\";N;s:8:\"userMenu\";N;s:10:\"userModule\";N;}'),
('2016-01-06 12:21:37',8,1,'El usuario actualiz&oacute; el registro','O:11:\"eAdmProfile\":4:{s:9:\"profileID\";s:1:\"3\";s:11:\"profileName\";s:12:\"Solo lectura\";s:9:\"isDefault\";b:0;s:6:\"events\";a:6:{i:0;s:2:\"50\";i:1;s:2:\"51\";i:2;s:2:\"52\";i:3;s:2:\"53\";i:4;s:2:\"54\";i:5;s:2:\"55\";}}'),
('2016-01-12 12:19:59',20,1,'El usuario insert&oacute; el registro','O:8:\"eCrmUser\":7:{s:6:\"userID\";i:1;s:8:\"userName\";s:14:\"martinbailetti\";s:8:\"password\";s:7:\"clallal\";s:9:\"firstName\";s:7:\"Martín\";s:8:\"lastName\";s:4:\"Bbbb\";s:5:\"email\";s:15:\"maama@jfjfj.com\";s:5:\"state\";s:1:\"1\";}'),
('2016-01-12 11:15:19',28,1,'El usuario insert&oacute; el registro','O:14:\"eCrmFormNotify\":8:{s:6:\"formID\";s:1:\"1\";s:6:\"userID\";s:1:\"2\";s:10:\"recipients\";s:0:\"\";s:9:\"contactID\";s:1:\"1\";s:6:\"active\";b:1;s:9:\"firstName\";N;s:8:\"lastName\";N;s:5:\"email\";N;}'),
('2015-12-01 12:41:41',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:4;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"3\";s:8:\"subTitle\";s:4:\"tres\";s:9:\"subTitle2\";N;s:11:\"description\";N;s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";a:1:{s:6:\"imagen\";s:1:\"1\";}s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2015-12-18 11:37:27',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"1\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:20:\"Animación principal\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:36:\"pagina-principal/animacion-principal\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:0:\"\";}s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:12:\"registerDate\";s:19:\"2015-05-20 11:27:45\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:0:\"\";s:8:\"schemaID\";s:1:\"1\";s:11:\"contentName\";s:20:\"Animación principal\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"14\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-12 16:57:04',51,1,'','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"3\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"2\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/2\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:71:\"<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"\"/></root>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2015-07-16 10:51:58\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"2\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-12 16:57:09',51,1,'','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"2\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"1\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/1\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:71:\"<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"\"/></root>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2015-07-16 10:51:55\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"1\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-13 09:40:29',51,1,'','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"3\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"2\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/2\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:71:\"<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"\"/></root>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2015-07-16 10:51:58\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"2\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-13 09:40:32',51,1,'','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"2\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"1\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/1\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:71:\"<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"\"/></root>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2015-07-16 10:51:55\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"1\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-13 09:40:34',51,1,'','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"3\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"2\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/2\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:71:\"<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"\"/></root>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2015-07-16 10:51:58\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"2\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-13 09:40:36',51,1,'','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"2\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"1\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/1\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:71:\"<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"\"/></root>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2015-07-16 10:51:55\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"1\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-13 09:40:39',51,1,'','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"3\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"2\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/2\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:71:\"<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"\"/></root>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2015-07-16 10:51:58\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"2\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-13 09:52:15',51,1,'','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"3\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"2\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/2\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:71:\"<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"\"/></root>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2015-07-16 10:51:58\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"2\";s:8:\"position\";s:1:\"0\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-13 12:40:27',51,1,'','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"0\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";N;s:8:\"subTitle\";N;s:9:\"subTitle2\";N;s:11:\"description\";N;s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";N;s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";N;s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-13 12:40:37',51,1,'','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"0\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";N;s:8:\"subTitle\";N;s:9:\"subTitle2\";N;s:11:\"description\";N;s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";N;s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";N;s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-19 16:04:20',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"1\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:20:\"Animación principal\";s:8:\"subTitle\";s:6:\"asdasd\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:36:\"pagina-principal/animacion-principal\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:36:\"userfiles/ckfinder/images/anibal.jpg\";}s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:12:\"registerDate\";s:19:\"2015-12-18 11:37:26\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:0:\"\";s:8:\"schemaID\";s:1:\"1\";s:11:\"contentName\";s:20:\"Animación principal\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"14\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-19 17:04:35',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"1\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:20:\"Animación principal\";s:8:\"subTitle\";s:6:\"asdasd\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:36:\"pagina-principal/animacion-principal\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:36:\"userfiles/ckfinder/images/anibal.jpg\";}s:7:\"metaTag\";a:3:{s:5:\"title\";s:9:\"title xxx\";s:11:\"description\";s:14:\"description xx\";s:8:\"keywords\";s:11:\"keyword xxx\";}s:12:\"registerDate\";s:19:\"2016-01-19 16:04:20\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:0:\"\";s:8:\"schemaID\";s:1:\"1\";s:11:\"contentName\";s:20:\"Animación principal\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"14\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-19 17:04:50',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"1\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:20:\"Animación principal\";s:8:\"subTitle\";s:6:\"asdasd\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:36:\"pagina-principal/animacion-principal\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:36:\"userfiles/ckfinder/images/anibal.jpg\";}s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:12:\"registerDate\";s:19:\"2016-01-19 17:04:35\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:0:\"\";s:8:\"schemaID\";s:1:\"1\";s:11:\"contentName\";s:20:\"Animación principal\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"14\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-19 17:31:33',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"1\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:20:\"Animación principal\";s:8:\"subTitle\";s:6:\"asdasd\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:36:\"pagina-principal/animacion-principal\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:36:\"userfiles/ckfinder/images/anibal.jpg\";}s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:12:\"registerDate\";s:19:\"2016-01-19 17:04:50\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:0:\"\";s:8:\"schemaID\";s:1:\"1\";s:11:\"contentName\";s:20:\"Animación principal\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"14\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-20 17:43:09',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"1\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:20:\"Animación principal\";s:8:\"subTitle\";s:6:\"asdasd\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:36:\"pagina-principal/animacion-principal\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:43:\"userfiles/cms/home/foto/images/kangaroo.jpg\";}s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:12:\"registerDate\";s:19:\"2016-01-19 17:31:33\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:0:\"\";s:8:\"schemaID\";s:1:\"1\";s:11:\"contentName\";s:20:\"Animación principal\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"14\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-22 17:24:11',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"4\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"3\";s:8:\"subTitle\";s:4:\"tres\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/3\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:31:\"cms/home/foto/php_developer.jpg\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2015-12-01 12:41:41\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"3\";s:8:\"position\";s:1:\"3\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-22 17:24:19',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"3\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"2\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/2\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:31:\"cms/home/foto/php_developer.jpg\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2015-07-16 10:51:58\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"2\";s:8:\"position\";s:1:\"0\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-22 17:26:10',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"2\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"1\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/1\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:24:\"cms/home/foto/banner.jpg\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2015-07-16 10:51:55\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"1\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-22 18:58:19',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"3\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"2\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"1\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/2\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:31:\"cms/home/foto/php_developer.jpg\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2016-01-22 17:24:19\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"2\";s:8:\"position\";s:1:\"0\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-22 18:58:25',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"3\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"2\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/2\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:31:\"cms/home/foto/php_developer.jpg\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2016-01-22 18:58:18\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"2\";s:8:\"position\";s:1:\"0\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-25 10:24:06',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"1\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:20:\"Animación principal\";s:8:\"subTitle\";s:6:\"asdasd\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:36:\"pagina-principal/animacion-principal\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:23:\"cms/home/foto/bored.jpg\";}s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:12:\"registerDate\";s:19:\"2016-01-20 17:43:09\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:0:\"\";s:8:\"schemaID\";s:1:\"1\";s:11:\"contentName\";s:20:\"Animación principal\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"14\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-25 10:25:05',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"3\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"2\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/2\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:23:\"cms/home/foto/bored.jpg\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2016-01-22 18:58:25\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"2\";s:8:\"position\";s:1:\"0\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-25 12:12:56',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"1\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:20:\"Animación principal\";s:8:\"subTitle\";s:6:\"asdasd\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:36:\"pagina-principal/animacion-principal\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:23:\"cms/home/foto/bored.jpg\";}s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:12:\"registerDate\";s:19:\"2016-01-25 10:24:06\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:0:\"\";s:8:\"schemaID\";s:1:\"1\";s:11:\"contentName\";s:20:\"Animación principal\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"14\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-25 14:41:52',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsSectionLang\":16:{s:9:\"sectionID\";s:1:\"1\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:17:\"Página Principal\";s:8:\"subTitle\";s:0:\"\";s:11:\"description\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:5:\"media\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:11:\"showContent\";s:1:\"0\";s:9:\"staticURL\";s:16:\"pagina-principal\";s:6:\"active\";i:0;s:15:\"parentSectionID\";N;s:11:\"sectionName\";s:17:\"Página Principal\";s:8:\"position\";s:1:\"1\";s:10:\"isEditable\";i:0;}'),
('2017-01-16 16:18:53',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"1\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:14:\"Bienvenidos a \";s:8:\"subTitle\";s:6:\"asdasd\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:6:\"Prueba\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:36:\"pagina-principal/animacion-principal\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:23:\"cms/home/foto/bored.jpg\";}s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:12:\"registerDate\";s:19:\"2016-01-25 12:12:56\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:0:\"\";s:8:\"schemaID\";s:1:\"1\";s:11:\"contentName\";s:20:\"Animación principal\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"14\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-16 17:55:06',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"1\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:20:\"Bienvenidos a gerson\";s:8:\"subTitle\";s:6:\"asdasd\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:6:\"Prueba\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:36:\"pagina-principal/animacion-principal\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:23:\"cms/home/foto/bored.jpg\";}s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:12:\"registerDate\";s:19:\"2017-01-16 16:18:53\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"1\";s:11:\"contentName\";s:14:\"Bienvenidos a \";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"14\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 10:36:59',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"1\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:14:\"Bienvenidos a \";s:8:\"subTitle\";s:8:\"Produce!\";s:9:\"subTitle2\";s:10:\"Conócenos\";s:11:\"description\";s:6:\"Prueba\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:36:\"pagina-principal/animacion-principal\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:10:\"puerto.jpg\";}s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:12:\"registerDate\";s:19:\"2017-01-16 17:55:06\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:0:\"\";s:8:\"schemaID\";s:1:\"1\";s:11:\"contentName\";s:20:\"Bienvenidos a gerson\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"14\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 11:16:07',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsSectionLang\":16:{s:9:\"sectionID\";s:1:\"1\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:17:\"Página Principal\";s:8:\"subTitle\";s:0:\"\";s:11:\"description\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:5:\"media\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:11:\"showContent\";s:1:\"0\";s:9:\"staticURL\";s:16:\"pagina-principal\";s:6:\"active\";i:0;s:15:\"parentSectionID\";N;s:11:\"sectionName\";s:17:\"Página Principal\";s:8:\"position\";s:1:\"1\";s:10:\"isEditable\";i:0;}'),
('2017-01-17 11:47:34',51,1,'El usuario elimin&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"4\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"3\";s:8:\"subTitle\";s:4:\"tres\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/3\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:96:\"<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"cms/home/foto/php_developer.jpg\"/></root>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2016-01-22 17:24:11\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"3\";s:8:\"position\";s:1:\"3\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 11:47:36',51,1,'El usuario elimin&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"2\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"1\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/1\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:89:\"<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"cms/home/foto/banner.jpg\"/></root>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2016-01-22 17:26:10\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"1\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 11:47:38',51,1,'El usuario elimin&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"3\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:1:\"2\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:1:\"1\";s:9:\"staticURL\";s:38:\"pagina-principal/animacion-principal/2\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:88:\"<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"cms/home/foto/bored.jpg\"/></root>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2016-01-25 10:25:05\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:1:\"2\";s:8:\"position\";s:1:\"0\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"13\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 12:21:29',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:6;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:9:\"Servicios\";s:8:\"subTitle\";N;s:9:\"subTitle2\";N;s:11:\"description\";s:48:\"<h3>Lorem ipsum dolor sit amet consectetur.</h3>\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";N;s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 12:48:05',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"6\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:9:\"Servicios\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:39:\"Lorem ipsum dolor sit amet consectetur.\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:46:\"pagina-principal/animacion-principal/servicios\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:12:\"registerDate\";s:19:\"2017-01-17 12:21:29\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"2\";s:11:\"contentName\";s:9:\"Servicios\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"18\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 13:12:19',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:7;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:10:\"E-Commerce\";s:8:\"subTitle\";N;s:9:\"subTitle2\";N;s:11:\"description\";s:132:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";N;s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"6\";s:8:\"schemaID\";s:1:\"7\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 13:12:35',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:8;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:6:\"Prueba\";s:8:\"subTitle\";N;s:9:\"subTitle2\";N;s:11:\"description\";s:132:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";N;s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"6\";s:8:\"schemaID\";s:1:\"7\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 13:12:44',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:9;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:6:\"Prueba\";s:8:\"subTitle\";N;s:9:\"subTitle2\";N;s:11:\"description\";s:132:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";N;s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"6\";s:8:\"schemaID\";s:1:\"7\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 13:18:56',51,1,'El usuario elimin&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"9\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:6:\"Prueba\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:132:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:56:\"pagina-principal/animacion-principal/servicios/prueba(9)\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 13:12:44\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:1:\"6\";s:8:\"schemaID\";s:1:\"7\";s:11:\"contentName\";s:6:\"Prueba\";s:8:\"position\";s:1:\"3\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:1:\"1\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 13:19:27',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:9;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:6:\"Prueba\";s:8:\"subTitle\";N;s:9:\"subTitle2\";N;s:11:\"description\";s:6:\"asdasd\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";N;s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"6\";s:8:\"schemaID\";s:1:\"7\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 13:29:00',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:10;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:9:\"PORTFOLIO\";s:8:\"subTitle\";N;s:9:\"subTitle2\";N;s:11:\"description\";s:46:\"<p>Lorem ipsum dolor sit amet consectetur.</p>\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";N;s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"3\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 13:32:00',51,1,'','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"0\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";N;s:8:\"subTitle\";N;s:9:\"subTitle2\";N;s:11:\"description\";N;s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";N;s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";N;s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 13:39:12',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:2:\"10\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:9:\"Productos\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:46:\"<p>Lorem ipsum dolor sit amet consectetur.</p>\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:46:\"pagina-principal/animacion-principal/portfolio\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:12:\"registerDate\";s:19:\"2017-01-17 13:29:00\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"3\";s:11:\"contentName\";s:9:\"PORTFOLIO\";s:8:\"position\";s:1:\"0\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"19\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 16:22:06',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"7\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:10:\"E-Commerce\";s:8:\"subTitle\";s:6:\"fa-bug\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:132:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:57:\"pagina-principal/animacion-principal/servicios/e-commerce\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 13:12:19\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"6\";s:8:\"schemaID\";s:1:\"7\";s:11:\"contentName\";s:10:\"E-Commerce\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"23\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 16:22:49',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"8\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:6:\"Prueba\";s:8:\"subTitle\";s:8:\"fa-truck\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:132:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:53:\"pagina-principal/animacion-principal/servicios/prueba\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 13:12:35\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"6\";s:8:\"schemaID\";s:1:\"7\";s:11:\"contentName\";s:6:\"Prueba\";s:8:\"position\";s:1:\"2\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"23\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 16:22:54',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"9\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:6:\"Prueba\";s:8:\"subTitle\";s:5:\"fa-fb\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:6:\"asdasd\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:56:\"pagina-principal/animacion-principal/servicios/prueba(9)\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 13:19:27\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"6\";s:8:\"schemaID\";s:1:\"7\";s:11:\"contentName\";s:6:\"Prueba\";s:8:\"position\";s:1:\"3\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"23\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 16:23:12',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"9\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:6:\"Prueba\";s:8:\"subTitle\";s:11:\"fa-facebook\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:6:\"asdasd\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:56:\"pagina-principal/animacion-principal/servicios/prueba(9)\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 16:22:54\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"6\";s:8:\"schemaID\";s:1:\"7\";s:11:\"contentName\";s:6:\"Prueba\";s:8:\"position\";s:1:\"3\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"23\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 16:29:58',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:11;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:11:\"Round Icons\";s:8:\"subTitle\";s:14:\"Graphic Design\";s:9:\"subTitle2\";N;s:11:\"description\";s:753:\"<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p><p><strong>Want these icons in this portfolio item sample?</strong>You can download 60 of them for free, courtesy of&nbsp;<a href=\"https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc\">RoundIcons.com</a>, or you can purchase the 1500 icon set&nbsp;<a href=\"https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc\">here</a>.</p><ul><li>Date: July 2014</li><li>&nbsp;</li><li>Client: Round Icons</li><li>&nbsp;</li><li>Category: Graphic Design</li></ul>\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";a:2:{s:6:\"imagen\";s:11:\"cuadro1.png\";s:7:\"imagen2\";s:13:\"cuadro_g1.png\";}s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"10\";s:8:\"schemaID\";s:1:\"8\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 16:35:01',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:2:\"11\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:11:\"Round Icons\";s:8:\"subTitle\";s:14:\"Graphic Design\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:743:\"<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p><p><strong>Want these icons in this portfolio item sample?</strong>You can download 60 of them for free, courtesy of&nbsp;<a href=\"https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc\">RoundIcons.com</a>, or you can purchase the 1500 icon set&nbsp;<a href=\"https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc\">here</a>.</p><ul class=\"list-inline\"><li>Date: July 2014</li><li>Client: Round Icons</li><li>Category: Graphic Design</li></ul>\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:58:\"pagina-principal/animacion-principal/portfolio/round-icons\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:2:{s:6:\"imagen\";s:11:\"cuadro1.png\";s:7:\"imagen2\";s:13:\"cuadro_g1.png\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 16:29:58\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"10\";s:8:\"schemaID\";s:1:\"8\";s:11:\"contentName\";s:11:\"Round Icons\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"24\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 16:36:01',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:2:\"11\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:11:\"Round Icons\";s:8:\"subTitle\";s:14:\"Graphic Design\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:743:\"<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p><p><strong>Want these icons in this portfolio item sample?</strong>You can download 60 of them for free, courtesy of&nbsp;<a href=\"https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc\">RoundIcons.com</a>, or you can purchase the 1500 icon set&nbsp;<a href=\"https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc\">here</a>.</p><ul class=\"list-inline\"><li>Date: July 2014</li><li>Client: Round Icons</li><li>Category: Graphic Design</li></ul>\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:58:\"pagina-principal/animacion-principal/portfolio/round-icons\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:2:{s:6:\"imagen\";s:11:\"cuadro1.png\";s:7:\"imagen2\";s:8:\"bote.jpg\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 16:35:01\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"10\";s:8:\"schemaID\";s:1:\"8\";s:11:\"contentName\";s:11:\"Round Icons\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"24\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 16:58:03',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:2:\"11\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:11:\"Round Icons\";s:8:\"subTitle\";s:14:\"Graphic Design\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:743:\"<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p><p><strong>Want these icons in this portfolio item sample?</strong>You can download 60 of them for free, courtesy of&nbsp;<a href=\"https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc\">RoundIcons.com</a>, or you can purchase the 1500 icon set&nbsp;<a href=\"https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc\">here</a>.</p><ul class=\"list-inline\"><li>Date: July 2014</li><li>Client: Round Icons</li><li>Category: Graphic Design</li></ul>\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:58:\"pagina-principal/animacion-principal/portfolio/round-icons\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:2:{s:6:\"imagen\";s:8:\"fish.jpg\";s:7:\"imagen2\";s:8:\"bote.jpg\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 16:36:01\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"10\";s:8:\"schemaID\";s:1:\"8\";s:11:\"contentName\";s:11:\"Round Icons\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"24\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 16:59:23',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:12;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:5:\"Tolva\";s:8:\"subTitle\";s:25:\"Registro de Emabarcación\";s:9:\"subTitle2\";N;s:11:\"description\";s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";a:2:{s:6:\"imagen\";s:8:\"mar3.jpg\";s:7:\"imagen2\";s:8:\"mar6.jpg\";}s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"10\";s:8:\"schemaID\";s:1:\"8\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 16:59:42',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:13;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:5:\"Chata\";s:8:\"subTitle\";s:19:\"Registro de Plantas\";s:9:\"subTitle2\";N;s:11:\"description\";s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";a:2:{s:6:\"imagen\";s:8:\"mar4.jpg\";s:7:\"imagen2\";s:8:\"mar8.jpg\";}s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"10\";s:8:\"schemaID\";s:1:\"8\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 17:07:31',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:2:\"11\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:11:\"Round Icons\";s:8:\"subTitle\";s:14:\"Graphic Design\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:743:\"<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p><p><strong>Want these icons in this portfolio item sample?</strong>You can download 60 of them for free, courtesy of&nbsp;<a href=\"https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc\">RoundIcons.com</a>, or you can purchase the 1500 icon set&nbsp;<a href=\"https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc\">here</a>.</p><ul class=\"list-inline\"><li>Date: July 2014</li><li>Client: Round Icons</li><li>Category: Graphic Design</li></ul>\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:58:\"pagina-principal/animacion-principal/portfolio/round-icons\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:2:{s:6:\"imagen\";s:8:\"fish.jpg\";s:7:\"imagen2\";s:8:\"bote.jpg\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 16:58:03\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"10\";s:8:\"schemaID\";s:1:\"8\";s:11:\"contentName\";s:11:\"Round Icons\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"24\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 17:07:37',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:2:\"12\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:5:\"Tolva\";s:8:\"subTitle\";s:25:\"Registro de Emabarcación\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:52:\"pagina-principal/animacion-principal/portfolio/tolva\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:2:{s:6:\"imagen\";s:8:\"mar3.jpg\";s:7:\"imagen2\";s:8:\"mar6.jpg\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 16:59:22\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"10\";s:8:\"schemaID\";s:1:\"8\";s:11:\"contentName\";s:5:\"Tolva\";s:8:\"position\";s:1:\"2\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"24\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 17:07:41',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:2:\"13\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:5:\"Chata\";s:8:\"subTitle\";s:19:\"Registro de Plantas\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:52:\"pagina-principal/animacion-principal/portfolio/chata\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:2:{s:6:\"imagen\";s:8:\"mar4.jpg\";s:7:\"imagen2\";s:8:\"mar8.jpg\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 16:59:42\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"10\";s:8:\"schemaID\";s:1:\"8\";s:11:\"contentName\";s:5:\"Chata\";s:8:\"position\";s:1:\"3\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"24\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 17:27:57',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:14;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:12:\"Historia CHI\";s:8:\"subTitle\";N;s:9:\"subTitle2\";N;s:11:\"description\";s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";N;s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";s:1:\"4\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 17:29:57',51,1,'','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"0\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";N;s:8:\"subTitle\";N;s:9:\"subTitle2\";N;s:11:\"description\";N;s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";N;s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:1:\"1\";s:8:\"schemaID\";N;s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 17:30:38',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"7\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:10:\"E-Commerce\";s:8:\"subTitle\";s:6:\"fa-bug\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:132:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:57:\"pagina-principal/animacion-principal/servicios/e-commerce\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 16:22:06\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:1:\"6\";s:8:\"schemaID\";s:1:\"7\";s:11:\"contentName\";s:10:\"E-Commerce\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"23\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 17:55:57',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:15;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:21:\"Our Humble Beginnings\";s:8:\"subTitle\";s:9:\"2009-2011\";s:9:\"subTitle2\";N;s:11:\"description\";s:214:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";a:1:{s:6:\"imagen\";s:8:\"mar8.jpg\";}s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"9\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 17:56:27',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:2:\"15\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:21:\"Our Humble Beginnings\";s:8:\"subTitle\";s:9:\"2009-2011\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:214:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:71:\"pagina-principal/animacion-principal/historia-chi/our-humble-beginnings\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:8:\"fish.jpg\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 17:55:57\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"9\";s:11:\"contentName\";s:21:\"Our Humble Beginnings\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:1:\"2\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 18:01:22',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:2:\"15\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:21:\"Our Humble Beginnings\";s:8:\"subTitle\";s:9:\"2009-2011\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:214:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:71:\"pagina-principal/animacion-principal/historia-chi/our-humble-beginnings\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:16:\"embarcacion2.jpg\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 17:56:27\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"9\";s:11:\"contentName\";s:21:\"Our Humble Beginnings\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:1:\"2\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 18:02:38',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:2:\"15\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:21:\"Our Humble Beginnings\";s:8:\"subTitle\";s:9:\"2009-2011\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:214:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:71:\"pagina-principal/animacion-principal/historia-chi/our-humble-beginnings\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:16:\"embarcacion2.jpg\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 18:01:22\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"9\";s:11:\"contentName\";s:21:\"Our Humble Beginnings\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:1:\"2\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 18:05:01',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:2:\"15\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:21:\"Our Humble Beginnings\";s:8:\"subTitle\";s:9:\"2009-2011\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:214:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:71:\"pagina-principal/animacion-principal/historia-chi/our-humble-beginnings\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:16:\"embarcacion2.jpg\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 18:02:37\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"9\";s:11:\"contentName\";s:21:\"Our Humble Beginnings\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:1:\"2\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 18:10:04',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:16;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:17:\"An Agency is Born\";s:8:\"subTitle\";s:10:\"MARCH 2011\";s:9:\"subTitle2\";N;s:11:\"description\";s:215:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";a:1:{s:6:\"imagen\";s:15:\"embarcacion.jpg\";}s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"9\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 18:10:27',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:17;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:26:\"Transition to Full Service\";s:8:\"subTitle\";s:13:\"DECEMBER 2012\";s:9:\"subTitle2\";N;s:11:\"description\";s:215:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";a:1:{s:6:\"imagen\";s:17:\"pesca_marina2.jpg\";}s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"9\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 18:10:46',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:18;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:19:\"Phase Two Expansion\";s:8:\"subTitle\";s:9:\"JULY 2014\";s:9:\"subTitle2\";N;s:11:\"description\";s:215:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";a:1:{s:6:\"imagen\";s:16:\"pesca_marina.jpg\";}s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"9\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 18:13:06',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:19;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:6:\"prueba\";s:8:\"subTitle\";s:3:\"asd\";s:9:\"subTitle2\";N;s:11:\"description\";s:3:\"asd\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";a:1:{s:6:\"imagen\";s:15:\"embarcacion.jpg\";}s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"9\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 18:16:07',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:20;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:4:\"aasd\";s:8:\"subTitle\";s:3:\"asd\";s:9:\"subTitle2\";N;s:11:\"description\";s:3:\"asd\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";a:1:{s:6:\"imagen\";s:16:\"embarcacion2.jpg\";}s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"9\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 18:16:22',51,1,'El usuario elimin&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:2:\"20\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:4:\"aasd\";s:8:\"subTitle\";s:3:\"asd\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:3:\"asd\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:54:\"pagina-principal/animacion-principal/historia-chi/aasd\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:81:\"<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"embarcacion2.jpg\"/></root>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 18:16:07\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"9\";s:11:\"contentName\";s:4:\"aasd\";s:8:\"position\";s:1:\"6\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:1:\"2\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 18:16:25',51,1,'El usuario elimin&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:2:\"19\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:6:\"prueba\";s:8:\"subTitle\";s:3:\"asd\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:3:\"asd\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:56:\"pagina-principal/animacion-principal/historia-chi/prueba\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:80:\"<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"embarcacion.jpg\"/></root>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 18:13:06\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"9\";s:11:\"contentName\";s:6:\"prueba\";s:8:\"position\";s:1:\"5\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:1:\"2\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 18:16:31',51,1,'El usuario elimin&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:2:\"18\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:19:\"Phase Two Expansion\";s:8:\"subTitle\";s:9:\"JULY 2014\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:215:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:69:\"pagina-principal/animacion-principal/historia-chi/phase-two-expansion\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:81:\"<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"pesca_marina.jpg\"/></root>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 18:10:46\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"9\";s:11:\"contentName\";s:19:\"Phase Two Expansion\";s:8:\"position\";s:1:\"4\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:1:\"2\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 18:17:02',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:18;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:19:\"Phase Two Expansion\";s:8:\"subTitle\";s:9:\"JULY 2014\";s:9:\"subTitle2\";N;s:11:\"description\";s:215:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";a:1:{s:6:\"imagen\";s:16:\"pesca_marina.jpg\";}s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"9\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 18:17:54',51,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:19;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:19:\"Primera Embarcacion\";s:8:\"subTitle\";s:4:\"2017\";s:9:\"subTitle2\";N;s:11:\"description\";s:215:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";a:1:{s:6:\"imagen\";s:16:\"embarcacion2.jpg\";}s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"9\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 18:18:18',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:2:\"19\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:19:\"Primera Embarcacion\";s:8:\"subTitle\";s:4:\"2017\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:69:\"pagina-principal/animacion-principal/historia-chi/primera-embarcacion\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";a:1:{s:6:\"imagen\";s:16:\"embarcacion2.jpg\";}s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2017-01-17 18:17:54\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"9\";s:11:\"contentName\";s:19:\"Primera Embarcacion\";s:8:\"position\";s:1:\"5\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:1:\"2\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2017-01-17 18:19:15',51,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:2:\"14\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:8:\"Historia\";s:8:\"subTitle\";s:0:\"\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:49:\"pagina-principal/animacion-principal/historia-chi\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:7:\"metaTag\";a:3:{s:5:\"title\";s:0:\"\";s:11:\"description\";s:0:\"\";s:8:\"keywords\";s:0:\"\";}s:12:\"registerDate\";s:19:\"2017-01-17 17:27:57\";s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:2:\"14\";s:8:\"schemaID\";s:1:\"4\";s:11:\"contentName\";s:12:\"Historia CHI\";s:8:\"position\";s:1:\"2\";s:9:\"sectionID\";s:1:\"1\";s:10:\"templateID\";s:2:\"20\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-25 11:20:33',53,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:6;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:7:\"Upss...\";s:8:\"subTitle\";s:52:\"Lo sentimos, ha ocurrido un error en la aplicación.\";s:9:\"subTitle2\";N;s:11:\"description\";s:1018:\"Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;<span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span>\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";N;s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:0:\"\";s:8:\"schemaID\";s:2:\"98\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"2\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-25 11:20:40',53,1,'El usuario elimin&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"6\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:7:\"Upss...\";s:8:\"subTitle\";s:52:\"Lo sentimos, ha ocurrido un error en la aplicación.\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:1018:\"Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;<span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span>\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:19:\"herramientas/upss--\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2016-01-25 11:20:33\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:0:\"\";s:8:\"schemaID\";s:2:\"98\";s:11:\"contentName\";s:7:\"Upss...\";s:8:\"position\";s:1:\"2\";s:9:\"sectionID\";s:1:\"2\";s:10:\"templateID\";s:2:\"98\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-25 11:20:57',53,1,'El usuario actualiz&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"5\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:7:\"Upss...\";s:8:\"subTitle\";s:9:\"asadasdas\";s:9:\"subTitle2\";N;s:11:\"description\";s:0:\"\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";N;s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:0:\"\";s:8:\"schemaID\";s:2:\"98\";s:11:\"contentName\";s:7:\"Upss...\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"2\";s:10:\"templateID\";s:2:\"98\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-25 11:21:00',53,1,'El usuario elimin&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";s:1:\"5\";s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:7:\"Upss...\";s:8:\"subTitle\";s:9:\"asadasdas\";s:9:\"subTitle2\";s:0:\"\";s:11:\"description\";s:0:\"\";s:12:\"description2\";s:0:\"\";s:12:\"description3\";s:0:\"\";s:7:\"resumen\";s:0:\"\";s:4:\"date\";s:19:\"0000-00-00 00:00:00\";s:8:\"linkType\";s:1:\"0\";s:13:\"linkContentID\";s:1:\"0\";s:7:\"linkURL\";s:0:\"\";s:10:\"linkTarget\";s:0:\"\";s:9:\"staticURL\";s:19:\"herramientas/upss--\";s:9:\"parameter\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:5:\"media\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:7:\"metaTag\";s:30:\"<?xml version=\"1.0\"?>\n<root/>\n\";s:12:\"registerDate\";s:19:\"2016-01-25 11:20:57\";s:10:\"showInHome\";i:0;s:6:\"active\";i:0;s:15:\"parentContentID\";s:0:\"\";s:8:\"schemaID\";s:2:\"98\";s:11:\"contentName\";s:7:\"Upss...\";s:8:\"position\";s:1:\"1\";s:9:\"sectionID\";s:1:\"2\";s:10:\"templateID\";s:2:\"98\";s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}'),
('2016-01-25 11:35:34',53,1,'El usuario insert&oacute; el registro','O:15:\"eCmsContentLang\":30:{s:9:\"contentID\";i:5;s:6:\"langID\";s:1:\"1\";s:5:\"title\";s:7:\"Upss...\";s:8:\"subTitle\";s:53:\"Lo sentimos, ha ocurrido un error en la aplicación. \";s:9:\"subTitle2\";N;s:11:\"description\";s:424:\"<span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span>\";s:12:\"description2\";N;s:12:\"description3\";N;s:7:\"resumen\";N;s:4:\"date\";N;s:8:\"linkType\";N;s:13:\"linkContentID\";N;s:7:\"linkURL\";N;s:10:\"linkTarget\";N;s:9:\"staticURL\";N;s:9:\"parameter\";N;s:5:\"media\";N;s:7:\"metaTag\";N;s:12:\"registerDate\";N;s:10:\"showInHome\";i:0;s:6:\"active\";s:1:\"1\";s:15:\"parentContentID\";s:0:\"\";s:8:\"schemaID\";s:2:\"98\";s:11:\"contentName\";N;s:8:\"position\";N;s:9:\"sectionID\";s:1:\"2\";s:10:\"templateID\";N;s:6:\"isPage\";N;s:11:\"childSchema\";N;s:16:\"childContentLang\";N;}');

/*Table structure for table `adm_menu` */

DROP TABLE IF EXISTS `adm_menu`;

CREATE TABLE `adm_menu` (
  `menuID` smallint(4) unsigned NOT NULL DEFAULT '0',
  `parentMenuID` smallint(4) unsigned DEFAULT NULL,
  `menuName` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `position` smallint(4) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `menuIcon` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`menuID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `adm_menu` */

insert  into `adm_menu`(`menuID`,`parentMenuID`,`menuName`,`position`,`active`,`menuIcon`) values 
(0,NULL,'Inicio',0,0,NULL),
(1,0,'Configuración',1,1,'fa-gear'),
(2,0,'Información general',2,1,'fa-info-circle'),
(3,0,'Website Principal',3,1,'fa-sitemap'),
(4,0,'Versión Móvil',4,1,'fa-mobile'),
(8,1,'Administrador',1,1,'fa-dashboard'),
(9,1,'Website',2,1,'fa-sitemap'),
(10,1,'Logs',3,0,'fa-info-circle'),
(14,2,'Parámetros de Sistema',1,1,'fa-cogs'),
(17,2,'Formularios',2,1,'fa-list-alt'),
(18,3,'Contenido Web',1,1,'fa-edit');

/*Table structure for table `adm_module` */

DROP TABLE IF EXISTS `adm_module`;

CREATE TABLE `adm_module` (
  `moduleID` int(5) unsigned NOT NULL DEFAULT '0',
  `menuID` smallint(4) unsigned NOT NULL DEFAULT '0',
  `moduleName` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `alias` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `moduleForm` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `moduleParams` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `position` int(5) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `moduleIcon` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`moduleID`),
  KEY `fK_adm_module` (`menuID`),
  CONSTRAINT `fK_adm_module` FOREIGN KEY (`menuID`) REFERENCES `adm_menu` (`menuID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `adm_module` */

insert  into `adm_module`(`moduleID`,`menuID`,`moduleName`,`alias`,`moduleForm`,`moduleParams`,`position`,`active`,`moduleIcon`) values 
(0,0,'Inicio','Index','index',NULL,0,1,'fa-home'),
(1,1,'Acceso al Sistema','Acceso al Sistema','login',NULL,0,1,NULL),
(2,8,'Usuarios de Sistema','Usuarios de Sistema','admuser',NULL,1,1,'fa-user'),
(3,8,'Perfiles','Perfiles','profile',NULL,2,1,'fa-male'),
(4,8,'Registro de Eventos','Eventos','log',NULL,3,1,'fa-book'),
(5,9,'Idiomas','Idiomas','lang',NULL,2,1,'fa-flag'),
(6,9,'Minisites','Minisites','minisite',NULL,3,0,NULL),
(7,9,'Términos por Idioma','Términos por Idioma','termino',NULL,4,1,'fa-list'),
(8,9,'Galerías y Media','Galerías y Media','media',NULL,5,0,NULL),
(10,9,'Usuarios de la Web','Usuarios de la Web','webuser',NULL,1,1,'fa-users'),
(11,9,'Configuración','Parámetros de Configuración','config',NULL,6,1,'fa-cog'),
(18,17,'Mensajes recibidos','Mensajes recibidos','register',NULL,1,1,'fa-inbox'),
(19,17,'Cuentas de correo','Cuentas de correo','notify',NULL,2,1,'fa-at'),
(21,14,'Asuntos de Contacto','Asuntos de Contacto','parameter','groupID=1',1,1,'fa-envelope-square'),
(22,14,'Areas de Interés','Areas de Interés','parameter','groupID=2',2,1,'fa-bullseye'),
(30,18,'Página Principal','Página Principal','cms','sectionID=1',1,1,NULL),
(31,18,'Herramientas','Herramientas','cms','sectionID=2',9,0,NULL),
(32,18,'Pié de Página','Pié de Página','cms','sectionID=3',10,1,NULL),
(33,18,'Reportes','Reportes','cms','sectionID=6',11,1,'fa-file'),
(34,18,'CHI','CHI','cms','sectionID=5',12,1,'fa-ship'),
(35,18,'Facturacion','Facturacion','cms','sectionID=7',13,1,'fa-money');

/*Table structure for table `adm_profile` */

DROP TABLE IF EXISTS `adm_profile`;

CREATE TABLE `adm_profile` (
  `profileID` int(6) unsigned NOT NULL DEFAULT '0',
  `profileName` varchar(255) NOT NULL,
  `isDefault` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`profileID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `adm_profile` */

insert  into `adm_profile`(`profileID`,`profileName`,`isDefault`) values 
(1,'Administrador Master',1),
(3,'Solo lectura',0);

/*Table structure for table `adm_profile_event` */

DROP TABLE IF EXISTS `adm_profile_event`;

CREATE TABLE `adm_profile_event` (
  `profileID` int(6) unsigned NOT NULL DEFAULT '0',
  `eventID` int(6) unsigned NOT NULL,
  PRIMARY KEY (`profileID`,`eventID`),
  KEY `FK_adm_profile_event_event` (`eventID`),
  CONSTRAINT `FK_adm_profile_event_event` FOREIGN KEY (`eventID`) REFERENCES `adm_event` (`eventID`),
  CONSTRAINT `FK_adm_profile_events_profile` FOREIGN KEY (`profileID`) REFERENCES `adm_profile` (`profileID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `adm_profile_event` */

insert  into `adm_profile_event`(`profileID`,`eventID`) values 
(1,1),
(3,50),
(3,51),
(3,52),
(3,53),
(3,54),
(3,55);

/*Table structure for table `adm_user` */

DROP TABLE IF EXISTS `adm_user`;

CREATE TABLE `adm_user` (
  `userID` int(6) unsigned NOT NULL,
  `userName` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(30) NOT NULL DEFAULT '',
  `firstName` varchar(255) NOT NULL DEFAULT '',
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profileID` int(6) unsigned NOT NULL DEFAULT '0',
  `state` tinyint(1) unsigned DEFAULT '0',
  `isDefault` bit(1) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `iDX_Login` (`userName`),
  KEY `fK_adm_user_profile` (`profileID`),
  CONSTRAINT `FK_adm_user_profile` FOREIGN KEY (`profileID`) REFERENCES `adm_profile` (`profileID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `adm_user` */

insert  into `adm_user`(`userID`,`userName`,`password`,`firstName`,`lastName`,`email`,`profileID`,`state`,`isDefault`) values 
(1,'admin','admin','Webmaster','','Junior.Huallullo@pe.bureauveritas.com',1,1,'');

/*Table structure for table `cms_content` */

DROP TABLE IF EXISTS `cms_content`;

CREATE TABLE `cms_content` (
  `contentID` int(6) unsigned NOT NULL,
  `parentContentID` int(6) unsigned DEFAULT NULL,
  `schemaID` mediumint(5) unsigned NOT NULL,
  `contentName` varchar(255) NOT NULL,
  `position` int(6) NOT NULL,
  PRIMARY KEY (`contentID`),
  KEY `fK_cms_content` (`parentContentID`),
  KEY `fK_cms_content_eschema` (`schemaID`),
  CONSTRAINT `FK_cms_content` FOREIGN KEY (`parentContentID`) REFERENCES `cms_content` (`contentID`),
  CONSTRAINT `FK_cms_content_schema` FOREIGN KEY (`schemaID`) REFERENCES `cms_schema` (`schemaID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cms_content` */

insert  into `cms_content`(`contentID`,`parentContentID`,`schemaID`,`contentName`,`position`) values 
(1,NULL,1,'Bienvenidos a ',1),
(5,NULL,98,'Upss...',1),
(6,1,2,'Servicios',0),
(7,6,7,'E-Commerce',1),
(8,6,7,'Prueba',2),
(9,6,7,'Prueba',3),
(10,1,3,'Productos',1),
(11,10,8,'Round Icons',1),
(12,10,8,'Tolva',2),
(13,10,8,'Chata',3),
(14,1,4,'Historia',2),
(15,14,9,'Our Humble Beginnings',1),
(16,14,9,'An Agency is Born',2),
(17,14,9,'Transition to Full Service',3),
(18,14,9,'Phase Two Expansion',4),
(19,14,9,'Primera Embarcacion',5);

/*Table structure for table `cms_content_lang` */

DROP TABLE IF EXISTS `cms_content_lang`;

CREATE TABLE `cms_content_lang` (
  `contentID` int(6) unsigned NOT NULL,
  `langID` tinyint(3) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `subTitle` varchar(255) DEFAULT NULL,
  `subTitle2` varchar(255) DEFAULT NULL,
  `description` text,
  `description2` text,
  `description3` text,
  `resumen` text,
  `date` datetime DEFAULT NULL,
  `linkType` tinyint(1) DEFAULT NULL,
  `linkContentID` int(6) DEFAULT NULL,
  `linkURL` varchar(255) DEFAULT NULL,
  `linkTarget` varchar(1000) DEFAULT NULL,
  `staticURL` varchar(2000) DEFAULT NULL,
  `media` text,
  `parameter` text,
  `metaTag` text,
  `registerDate` datetime NOT NULL,
  `showInHome` tinyint(1) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`contentID`,`langID`),
  UNIQUE KEY `IDX_staticURL` (`staticURL`(767)),
  KEY `fK_cms_content_lang` (`langID`),
  CONSTRAINT `FK_cms_content_lang` FOREIGN KEY (`contentID`) REFERENCES `cms_content` (`contentID`),
  CONSTRAINT `FK_cms_content_lang_lang` FOREIGN KEY (`langID`) REFERENCES `cms_lang` (`langID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cms_content_lang` */

insert  into `cms_content_lang`(`contentID`,`langID`,`title`,`subTitle`,`subTitle2`,`description`,`description2`,`description3`,`resumen`,`date`,`linkType`,`linkContentID`,`linkURL`,`linkTarget`,`staticURL`,`media`,`parameter`,`metaTag`,`registerDate`,`showInHome`,`active`) values 
(1,1,'Bienvenidos a ','Produce!','Conócenos','Prueba','','','','0000-00-00 00:00:00',0,0,'','','pagina-principal/animacion-principal','<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"puerto.jpg\"/></root>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root><item key=\"title\" value=\"\"/><item key=\"description\" value=\"\"/><item key=\"keywords\" value=\"\"/></root>\n','2017-01-17 10:36:59',0,1),
(5,1,'Upss...','Lo sentimos, ha ocurrido un error en la aplicación. ','','<span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span><span style=\"line-height: 20.8px;\">Lo sentimos, ha ocurrido un error en la aplicaci&oacute;n.&nbsp;</span>','','','','0000-00-00 00:00:00',0,0,'','','herramientas/upss--','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','2016-01-25 11:35:34',0,1),
(6,1,'Servicios','','','Lorem ipsum dolor sit amet consectetur.','','','','0000-00-00 00:00:00',0,0,'','','pagina-principal/animacion-principal/servicios','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root><item key=\"title\" value=\"\"/><item key=\"description\" value=\"\"/><item key=\"keywords\" value=\"\"/></root>\n','2017-01-17 12:48:05',0,1),
(7,1,'E-Commerce','fa-bug','','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.','','','','0000-00-00 00:00:00',0,0,'','','pagina-principal/animacion-principal/servicios/e-commerce','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','2017-01-17 17:30:38',0,1),
(8,1,'Prueba','fa-truck','','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.','','','','0000-00-00 00:00:00',0,0,'','','pagina-principal/animacion-principal/servicios/prueba','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','2017-01-17 16:22:49',0,1),
(9,1,'Prueba','fa-facebook','','asdasd','','','','0000-00-00 00:00:00',0,0,'','','pagina-principal/animacion-principal/servicios/prueba(9)','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','2017-01-17 16:23:12',0,1),
(10,1,'Productos','','','<p>Lorem ipsum dolor sit amet consectetur.</p>','','','','0000-00-00 00:00:00',0,0,'','','pagina-principal/animacion-principal/portfolio','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root><item key=\"title\" value=\"\"/><item key=\"description\" value=\"\"/><item key=\"keywords\" value=\"\"/></root>\n','2017-01-17 13:39:12',0,1),
(11,1,'Round Icons','Graphic Design','','<p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p><p><strong>Want these icons in this portfolio item sample?</strong>You can download 60 of them for free, courtesy of&nbsp;<a href=\"https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc\">RoundIcons.com</a>, or you can purchase the 1500 icon set&nbsp;<a href=\"https://getdpd.com/cart/hoplink/18076?referrer=bvbo4kax5k8ogc\">here</a>.</p><ul class=\"list-inline\"><li>Date: July 2014</li><li>Client: Round Icons</li><li>Category: Graphic Design</li></ul>','','','','0000-00-00 00:00:00',0,0,'','','pagina-principal/animacion-principal/portfolio/round-icons','<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"fish.jpg\"/><item key=\"imagen2\" value=\"bote.jpg\"/></root>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','2017-01-17 17:07:31',0,1),
(12,1,'Tolva','Registro de Emabarcación','','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','','','','0000-00-00 00:00:00',0,0,'','','pagina-principal/animacion-principal/portfolio/tolva','<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"mar3.jpg\"/><item key=\"imagen2\" value=\"mar6.jpg\"/></root>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','2017-01-17 17:07:37',0,1),
(13,1,'Chata','Registro de Plantas','','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','','','','0000-00-00 00:00:00',0,0,'','','pagina-principal/animacion-principal/portfolio/chata','<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"mar4.jpg\"/><item key=\"imagen2\" value=\"mar8.jpg\"/></root>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','2017-01-17 17:07:41',0,1),
(14,1,'Historia','','','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.','','','','0000-00-00 00:00:00',0,0,'','','pagina-principal/animacion-principal/historia-chi','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root><item key=\"title\" value=\"\"/><item key=\"description\" value=\"\"/><item key=\"keywords\" value=\"\"/></root>\n','2017-01-17 18:19:15',0,1),
(15,1,'Our Humble Beginnings','2009-2011','','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur','','','','0000-00-00 00:00:00',0,0,'','','pagina-principal/animacion-principal/historia-chi/our-humble-beginnings','<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"embarcacion2.jpg\"/></root>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','2017-01-17 18:05:01',0,1),
(16,1,'An Agency is Born','MARCH 2011','','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!','','','','0000-00-00 00:00:00',0,0,'','','pagina-principal/animacion-principal/historia-chi/an-agency-is-born','<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"embarcacion.jpg\"/></root>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','2017-01-17 18:10:03',0,1),
(17,1,'Transition to Full Service','DECEMBER 2012','','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!','','','','0000-00-00 00:00:00',0,0,'','','pagina-principal/animacion-principal/historia-chi/transition-to-full-service','<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"pesca_marina2.jpg\"/></root>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','2017-01-17 18:10:27',0,1),
(18,1,'Phase Two Expansion','JULY 2014','','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!','','','','0000-00-00 00:00:00',0,0,'','','pagina-principal/animacion-principal/historia-chi/phase-two-expansion','<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"pesca_marina.jpg\"/></root>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','2017-01-17 18:17:02',0,1),
(19,1,'Primera Embarcacion','2017','','','','','','0000-00-00 00:00:00',0,0,'','','pagina-principal/animacion-principal/historia-chi/primera-embarcacion','<?xml version=\"1.0\"?>\n<root><item key=\"imagen\" value=\"embarcacion2.jpg\"/></root>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','2017-01-17 18:18:18',0,1);

/*Table structure for table `cms_lang` */

DROP TABLE IF EXISTS `cms_lang`;

CREATE TABLE `cms_lang` (
  `langID` tinyint(3) unsigned NOT NULL,
  `langCode` varchar(5) NOT NULL,
  `langName` varchar(50) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `isDefault` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`langID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cms_lang` */

insert  into `cms_lang`(`langID`,`langCode`,`langName`,`alias`,`isDefault`,`active`) values 
(1,'ES','Español','Español',1,1),
(2,'EN','English','Inglés',0,0);

/*Table structure for table `cms_media` */

DROP TABLE IF EXISTS `cms_media`;

CREATE TABLE `cms_media` (
  `mediaID` bigint(8) unsigned NOT NULL,
  `groupID` tinyint(3) unsigned NOT NULL,
  `mediaName` varchar(255) NOT NULL,
  `mediaType` varchar(15) NOT NULL,
  `registerDate` datetime NOT NULL,
  PRIMARY KEY (`mediaID`),
  KEY `FK_cms_media_group` (`groupID`),
  CONSTRAINT `FK_cms_media_group` FOREIGN KEY (`groupID`) REFERENCES `cms_media_group` (`groupID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cms_media` */

insert  into `cms_media`(`mediaID`,`groupID`,`mediaName`,`mediaType`,`registerDate`) values 
(1,12,'yogurt_chips2.jpg','image','2015-12-01 12:41:30');

/*Table structure for table `cms_media_group` */

DROP TABLE IF EXISTS `cms_media_group`;

CREATE TABLE `cms_media_group` (
  `groupID` tinyint(3) unsigned NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `typeID` tinyint(3) unsigned DEFAULT NULL,
  `basePath` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`groupID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cms_media_group` */

insert  into `cms_media_group`(`groupID`,`groupName`,`alias`,`typeID`,`basePath`,`active`) values 
(1,'Página: imagen','pagina_imagen',1,'cms/pagina/imagen/',1),
(2,'Página: video','pagina_video',3,'cms/pagina/video/',1),
(3,'Página: documento','pagina_documento',2,'cms/pagina/documento/',1),
(4,'Seccion: imagen','seccion_imagen',1,'cms/seccion/imagen/',1),
(5,'Seccion: mapa','seccion_mapa',1,'cms/seccion/mapa/',1),
(6,'Seccion: icono','seccion_icono',1,'cms/seccion/icono/',1),
(7,'Galería: imagen','galeria_imagen',1,'cms/galeria/imagen/',1),
(8,'Galería: ícono','galeria_icono',1,'cms/galeria/icono/',1),
(9,'Término: Imagenes de Texto','termino_imagen',1,'cms/termino/imagen/',1),
(10,'Widget: imagen','widget_imagen',1,'cms/widget/imagen/',1),
(11,'Widget: ícono','widget_icono',1,'cms/widget/icono/',1),
(12,'Animación Principal: foto','animacion_home',1,'cms/home/foto/',1),
(13,'Acceso: ícono','acceso_icono',1,'cms/acceso/icono/',1),
(14,'Redes Sociales: ícono','redes_icono',1,'cms/redes/icono/',1),
(15,'Oficina: imagen','oficina_imagen',1,'cms/oficina/imagen/',1),
(16,'Noticias: imagen','noticia_imagen',1,'cms/noticia/imagen/',1);

/*Table structure for table `cms_media_lang` */

DROP TABLE IF EXISTS `cms_media_lang`;

CREATE TABLE `cms_media_lang` (
  `mediaID` bigint(8) NOT NULL DEFAULT '0',
  `langID` tinyint(3) NOT NULL DEFAULT '0',
  `title` varchar(255) DEFAULT NULL,
  `alt` varchar(500) DEFAULT NULL,
  `description` mediumtext,
  PRIMARY KEY (`mediaID`,`langID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cms_media_lang` */

/*Table structure for table `cms_media_type` */

DROP TABLE IF EXISTS `cms_media_type`;

CREATE TABLE `cms_media_type` (
  `typeID` tinyint(3) unsigned NOT NULL,
  `typeName` varchar(255) NOT NULL,
  `allowed` varchar(255) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`typeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cms_media_type` */

insert  into `cms_media_type`(`typeID`,`typeName`,`allowed`,`active`) values 
(1,'Imagen','jpg,jpeg,gif,png',1),
(2,'Documento','pdf,doc,docx,xls,xlsx,ppt,pptx',1),
(3,'Video','mov,avi,mpg,mpeg,mp4,wmv',1),
(4,'Audio','mp3,aif,wav',1);

/*Table structure for table `cms_parameter` */

DROP TABLE IF EXISTS `cms_parameter`;

CREATE TABLE `cms_parameter` (
  `parameterID` int(5) unsigned NOT NULL DEFAULT '0',
  `groupID` tinyint(3) unsigned DEFAULT NULL,
  `alias` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `position` int(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`parameterID`),
  KEY `fK_parameter` (`groupID`),
  CONSTRAINT `cms_parameter_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `cms_parameter_group` (`groupID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `cms_parameter` */

insert  into `cms_parameter`(`parameterID`,`groupID`,`alias`,`position`) values 
(1,1,'Consultas',1);

/*Table structure for table `cms_parameter_group` */

DROP TABLE IF EXISTS `cms_parameter_group`;

CREATE TABLE `cms_parameter_group` (
  `groupID` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `groupName` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`groupID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `cms_parameter_group` */

insert  into `cms_parameter_group`(`groupID`,`groupName`,`active`) values 
(1,'Asuntos de Contacto',1),
(2,'Áreas de Interés',1);

/*Table structure for table `cms_parameter_lang` */

DROP TABLE IF EXISTS `cms_parameter_lang`;

CREATE TABLE `cms_parameter_lang` (
  `parameterID` int(5) unsigned NOT NULL,
  `langID` tinyint(3) unsigned NOT NULL,
  `parameterName` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `description` text CHARACTER SET latin1,
  `attribute` text COLLATE latin1_general_ci,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`parameterID`,`langID`),
  KEY `parameterID` (`parameterID`,`langID`),
  CONSTRAINT `cms_parameter_lang_ibfk_1` FOREIGN KEY (`parameterID`) REFERENCES `cms_parameter` (`parameterID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `cms_parameter_lang` */

insert  into `cms_parameter_lang`(`parameterID`,`langID`,`parameterName`,`description`,`attribute`,`active`) values 
(1,1,'Consultas','','<?xml version=\"1.0\"?>\n<root/>\n',1);

/*Table structure for table `cms_schema` */

DROP TABLE IF EXISTS `cms_schema`;

CREATE TABLE `cms_schema` (
  `schemaID` mediumint(5) unsigned NOT NULL,
  `parentSchemaID` mediumint(5) unsigned DEFAULT NULL,
  `sectionID` smallint(4) unsigned NOT NULL,
  `templateID` smallint(4) unsigned NOT NULL,
  `iterations` mediumint(5) DEFAULT NULL,
  `position` smallint(4) NOT NULL,
  `publication` tinyint(1) DEFAULT NULL,
  `isPage` tinyint(1) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`schemaID`),
  KEY `fK_cms_esquema` (`parentSchemaID`),
  KEY `fK_cms_esquema_seccionweb` (`sectionID`),
  KEY `fK_cms_esquema_plantilla` (`templateID`),
  CONSTRAINT `FK_cms_schema` FOREIGN KEY (`parentSchemaID`) REFERENCES `cms_schema` (`schemaID`),
  CONSTRAINT `FK_cms_schema_section` FOREIGN KEY (`sectionID`) REFERENCES `cms_section` (`sectionID`),
  CONSTRAINT `FK_cms_schema_template` FOREIGN KEY (`templateID`) REFERENCES `cms_template` (`templateID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cms_schema` */

insert  into `cms_schema`(`schemaID`,`parentSchemaID`,`sectionID`,`templateID`,`iterations`,`position`,`publication`,`isPage`,`alias`,`comments`,`active`) values 
(1,NULL,1,14,1,1,NULL,1,NULL,NULL,1),
(2,1,1,18,NULL,1,NULL,1,NULL,NULL,1),
(3,1,1,19,NULL,2,NULL,1,NULL,NULL,1),
(4,1,1,20,NULL,3,NULL,1,NULL,NULL,1),
(5,1,1,21,NULL,4,NULL,1,NULL,NULL,1),
(6,1,1,22,NULL,5,NULL,1,NULL,NULL,1),
(7,2,1,23,4,1,NULL,0,NULL,NULL,1),
(8,3,1,24,NULL,1,NULL,0,NULL,NULL,1),
(9,4,1,2,NULL,1,NULL,0,NULL,NULL,1),
(98,NULL,2,98,1,9,NULL,0,NULL,NULL,1),
(99,98,2,99,NULL,1,NULL,0,NULL,NULL,1);

/*Table structure for table `cms_section` */

DROP TABLE IF EXISTS `cms_section`;

CREATE TABLE `cms_section` (
  `sectionID` smallint(4) unsigned NOT NULL,
  `parentSectionID` smallint(4) unsigned DEFAULT NULL,
  `sectionName` varchar(255) NOT NULL,
  `position` smallint(4) DEFAULT NULL,
  `isEditable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`sectionID`),
  KEY `fK_cms_section` (`parentSectionID`),
  CONSTRAINT `fK_cms_section` FOREIGN KEY (`parentSectionID`) REFERENCES `cms_section` (`sectionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cms_section` */

insert  into `cms_section`(`sectionID`,`parentSectionID`,`sectionName`,`position`,`isEditable`) values 
(1,NULL,'Página Principal',1,0),
(2,NULL,'Herramientas',2,0),
(3,NULL,'Pie de pagina',3,0),
(4,NULL,'Secciones principales',4,0),
(5,4,'CHI',1,0),
(6,4,'Reportes',2,0),
(7,4,'Facturación',3,0);

/*Table structure for table `cms_section_lang` */

DROP TABLE IF EXISTS `cms_section_lang`;

CREATE TABLE `cms_section_lang` (
  `sectionID` smallint(4) unsigned NOT NULL,
  `langID` tinyint(3) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `subTitle` varchar(255) DEFAULT NULL,
  `description` text,
  `resumen` text,
  `media` text,
  `parameter` text,
  `metaTag` text,
  `showContent` tinyint(1) DEFAULT NULL,
  `staticURL` varchar(2000) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`sectionID`,`langID`),
  KEY `fK_cms_sectiondetail_lang` (`langID`),
  CONSTRAINT `FK_cms_section_lang` FOREIGN KEY (`sectionID`) REFERENCES `cms_section` (`sectionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cms_section_lang` */

insert  into `cms_section_lang`(`sectionID`,`langID`,`title`,`subTitle`,`description`,`resumen`,`media`,`parameter`,`metaTag`,`showContent`,`staticURL`,`active`) values 
(1,1,'Página Principal','','','','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root><item key=\"title\" value=\"\"/><item key=\"description\" value=\"\"/><item key=\"keywords\" value=\"\"/></root>\n',0,'pagina-principal',0),
(2,1,'Herramientas','','','','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root><item key=\"title\" value=\"\"/><item key=\"description\" value=\"\"/><item key=\"keywords\" value=\"\"/></root>\n',0,'herramientas',1),
(3,1,'Pié de Página','','','','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root/>\n','<?xml version=\"1.0\"?>\n<root><item key=\"title\" value=\"\"/><item key=\"description\" value=\"\"/><item key=\"keywords\" value=\"\"/></root>\n',0,'pie-de-pagina',1);

/*Table structure for table `cms_template` */

DROP TABLE IF EXISTS `cms_template`;

CREATE TABLE `cms_template` (
  `templateID` smallint(4) unsigned NOT NULL,
  `alias` varchar(255) NOT NULL,
  `templateName` varchar(255) NOT NULL,
  `imgIcon` varchar(100) DEFAULT NULL,
  `admSource` varchar(50) DEFAULT NULL,
  `webSource` varchar(50) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`templateID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cms_template` */

insert  into `cms_template`(`templateID`,`alias`,`templateName`,`imgIcon`,`admSource`,`webSource`,`comments`,`active`) values 
(0,'','',NULL,NULL,NULL,NULL,0),
(1,'Parrafo','Parrafo',NULL,'parrafo','pagina',NULL,1),
(2,'Página','Página',NULL,'pagina','pagina',NULL,1),
(3,'Sub nivel','Contenedor',NULL,'contenedor','contenedor',NULL,1),
(4,'Página de Enlace','Enlace (link)',NULL,'enlace','pagina',NULL,1),
(5,'Foto','Testimonios: Item',NULL,'foto','pagina',NULL,1),
(6,'Animación o video','Animación o video',NULL,'animacion','pagina',NULL,1),
(7,'Documento','Documento',NULL,'documento','pagina',NULL,1),
(8,'Acceso directo','Acceso directo',NULL,'acceso','acceso',NULL,1),
(9,'Noticia','Noticia',NULL,'noticia','noticia',NULL,1),
(10,'Widget','Widget',NULL,'widget','widget',NULL,1),
(11,'Widget contenedor','Widget contenedor',NULL,'widget_enlace','widget_enlace',NULL,1),
(12,'Widget texto','Widget texto',NULL,'widget_texto','widget_texto',NULL,1),
(13,'Imagen de animación','Imagen de animación',NULL,'imagen_animacion','pagina',NULL,1),
(14,'Animación principal','Animación principal',NULL,'pagina_animacion','pagina',NULL,1),
(15,'Bloque de accesos','Bloque de accesos',NULL,'contenedor','bloque_acceso',NULL,1),
(16,'Bloque de widgets','Bloque de widgets',NULL,'contenedor','bloque_widget',NULL,1),
(17,'Bloque de noticias','Bloque de noticias',NULL,'contenedor','bloque_noticia',NULL,1),
(18,'Bloque de Servicios','Bloque de Servicios',NULL,'parrafo','bloque_servicio',NULL,1),
(19,'Bloque de Productos','Bloque de Productos',NULL,'parrafo','bloque_productos',NULL,1),
(20,'Bloque de Temporal','Bloque de Temporal',NULL,'parrafo','bloque_temporal',NULL,1),
(21,'Bloque de Equipos','Bloque de Equipos',NULL,'parrafo','bloque_equipo',NULL,1),
(22,'Bloque de Clientes','Bloque de Clientes',NULL,'parrafo','bloque_cliente',NULL,1),
(23,'Detalle de Servicios','Detalle de Servicios',NULL,'detalle_servicio','pagina',NULL,1),
(24,'Detalle de Productos','Detalle de Productos',NULL,'detalle_productos','pagina',NULL,1),
(98,'Página de Error','Página de Error',NULL,'pagina_error','pagina_error',NULL,1),
(99,'Error','Error',NULL,'error','error',NULL,1);

/*Table structure for table `cms_termino` */

DROP TABLE IF EXISTS `cms_termino`;

CREATE TABLE `cms_termino` (
  `terminoID` int(5) unsigned NOT NULL DEFAULT '0',
  `groupID` tinyint(3) unsigned DEFAULT NULL,
  `alias` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `varName` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `inputType` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`terminoID`),
  UNIQUE KEY `IDX_varName` (`varName`),
  KEY `fK_parameter` (`groupID`),
  CONSTRAINT `FK_cms_termino` FOREIGN KEY (`groupID`) REFERENCES `cms_termino_group` (`groupID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `cms_termino` */

insert  into `cms_termino`(`terminoID`,`groupID`,`alias`,`varName`,`inputType`) values 
(5,0,'Ver más (Home Page)','vermas',1),
(7,0,'Regresar','regresar',1),
(8,0,'Lista de opciones: Seleccione','seleccione',1),
(9,0,'Buscar','buscar',1),
(10,0,'Mapa del sitio','mapa_titulo',1),
(11,0,'Descargar PDF','descargar_pdf',1),
(15,1,'Nombre','nombre',1),
(16,1,'Apellido','apellido',1),
(17,1,'Email','email',1),
(18,1,'Enviar','enviar',1),
(19,1,'Limpiar','limpiar',1),
(20,1,'Escriba su nombre','nombre_ingresar',1),
(21,1,'Escriba su apellido','apellido_ingresar',1),
(22,1,'Escriba su email','email_ingresar',1),
(23,1,'Validación de formularios: Campo Requerido','campo_requerido',1),
(24,1,'Validación de formularios: Email no válido','email_novalido',1),
(25,1,'Validación de formularios: Ingrese sólo número','solo_numeros',1),
(26,1,'Resultados de la búsqueda: No se hallaron coincidencias','no_coincidencias',1),
(27,1,'Gracias por registrarse','gracias_registro',1),
(28,1,'Su información se ha enviado con éxito.','envio_exitoso',2),
(29,1,'Ocurrio un error al enviar los datos','error_envio',2),
(30,1,'Si no logra descargar el documento en 10 segundos, haga','sino_descarga',2),
(31,1,'click aquí','click_aqui',1);

/*Table structure for table `cms_termino_group` */

DROP TABLE IF EXISTS `cms_termino_group`;

CREATE TABLE `cms_termino_group` (
  `groupID` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `groupName` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`groupID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `cms_termino_group` */

insert  into `cms_termino_group`(`groupID`,`groupName`,`active`) values 
(0,'Etiquetas generales',1),
(1,'Formularios',1);

/*Table structure for table `cms_termino_lang` */

DROP TABLE IF EXISTS `cms_termino_lang`;

CREATE TABLE `cms_termino_lang` (
  `terminoID` int(5) unsigned NOT NULL,
  `langID` tinyint(3) unsigned NOT NULL,
  `terminoName` varchar(2000) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`terminoID`,`langID`),
  KEY `parameterID` (`terminoID`,`langID`),
  CONSTRAINT `FK_cms_termino_termino_lang` FOREIGN KEY (`terminoID`) REFERENCES `cms_termino` (`terminoID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `cms_termino_lang` */

insert  into `cms_termino_lang`(`terminoID`,`langID`,`terminoName`) values 
(9,1,'Buscar'),
(27,1,'Gracias por registrarse'),
(28,1,'Su información se ha enviado con éxito, muy pronto estaremos en contacto con usted.'),
(29,1,'Ocurrio un error al enviar los datos'),
(31,1,'click aquí');

/*Table structure for table `config` */

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config` (
  `configID` int(5) unsigned NOT NULL DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  `inputType` varchar(10) DEFAULT NULL,
  `varName` varchar(50) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL DEFAULT '',
  `editable` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`configID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `config` */

insert  into `config`(`configID`,`description`,`inputType`,`varName`,`value`,`editable`) values 
(1,'Nombre del Website','string','SITE_NAME','CMS Produce',1),
(2,'Dirección','text','SITE_ADDRESS','',0),
(3,'Ciudad','string','SITE_CITY','',0),
(4,'Teléfono','string','SITE_PHONE','',0),
(5,'Webmaster','string','ADMIN_NAME','Webmaster',1),
(6,'Correo Postmaster','email','ADMIN_MAIL','Junior.Huallullo@pe.bureauveritas.com',1),
(7,'Usar Url Estáticas','bool','STATIC_URL','1',1),
(8,'Modo de Depuración','bool','DEBUG_MODE','1',1);

/*Table structure for table `crm_form` */

DROP TABLE IF EXISTS `crm_form`;

CREATE TABLE `crm_form` (
  `formID` int(7) unsigned NOT NULL,
  `formName` varchar(255) NOT NULL,
  `contactGroupID` tinyint(3) unsigned DEFAULT NULL,
  `registerDate` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`formID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `crm_form` */

insert  into `crm_form`(`formID`,`formName`,`contactGroupID`,`registerDate`,`active`) values 
(1,'Contactenos',1,'2012-07-13 00:00:00',1);

/*Table structure for table `crm_form_field` */

DROP TABLE IF EXISTS `crm_form_field`;

CREATE TABLE `crm_form_field` (
  `fieldID` int(7) unsigned NOT NULL,
  `fieldName` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `fieldType` tinyint(1) NOT NULL,
  `options` text,
  `active` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`fieldID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `crm_form_field` */

/*Table structure for table `crm_form_notify` */

DROP TABLE IF EXISTS `crm_form_notify`;

CREATE TABLE `crm_form_notify` (
  `formID` smallint(6) unsigned NOT NULL,
  `userID` int(6) unsigned NOT NULL,
  `contactID` int(5) unsigned NOT NULL COMMENT 'from cms_parameter (parameterID)',
  `recipients` varchar(1000) DEFAULT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`formID`,`userID`,`contactID`),
  KEY `FK_crm_form_notify_user` (`userID`),
  CONSTRAINT `FK_crm_form_notify_user` FOREIGN KEY (`userID`) REFERENCES `adm_user` (`userID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `crm_form_notify` */

/*Table structure for table `crm_register_field` */

DROP TABLE IF EXISTS `crm_register_field`;

CREATE TABLE `crm_register_field` (
  `registerID` bigint(15) unsigned NOT NULL,
  `fieldID` int(7) unsigned NOT NULL,
  `value` varchar(255) NOT NULL,
  `textValue` text,
  PRIMARY KEY (`registerID`,`fieldID`),
  KEY `FK_crm_regiser_field` (`fieldID`),
  CONSTRAINT `FK_crm_regiser_field` FOREIGN KEY (`fieldID`) REFERENCES `crm_form_field` (`fieldID`),
  CONSTRAINT `FK_crm_register_field` FOREIGN KEY (`registerID`) REFERENCES `crm_register_form` (`registerID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `crm_register_field` */

/*Table structure for table `crm_register_form` */

DROP TABLE IF EXISTS `crm_register_form`;

CREATE TABLE `crm_register_form` (
  `registerID` bigint(15) unsigned NOT NULL,
  `formID` int(7) unsigned NOT NULL,
  `registerCode` varchar(50) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `countryID` smallint(3) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactID` int(5) unsigned DEFAULT NULL COMMENT 'asuntoID',
  `comment` text COMMENT 'comentario',
  `state` tinyint(1) NOT NULL,
  `registerDate` datetime DEFAULT NULL,
  `reviewDate` datetime DEFAULT NULL,
  PRIMARY KEY (`registerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `crm_register_form` */

/*Table structure for table `crm_ubigeo` */

DROP TABLE IF EXISTS `crm_ubigeo`;

CREATE TABLE `crm_ubigeo` (
  `cod_dpto` char(2) NOT NULL,
  `cod_prov` char(2) NOT NULL,
  `cod_dist` char(2) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cod_dpto`,`cod_prov`,`cod_dist`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `crm_ubigeo` */

insert  into `crm_ubigeo`(`cod_dpto`,`cod_prov`,`cod_dist`,`nombre`) values 
('01','00','00','AMAZONAS'),
('01','01','00','CHACHAPOYAS'),
('01','01','01','CHACHAPOYAS'),
('01','01','02','ASUNCION'),
('01','01','03','BALSAS'),
('01','01','04','CHETO'),
('01','01','05','CHILIQUIN'),
('01','01','06','CHUQUIBAMBA'),
('01','01','07','GRANADA'),
('01','01','08','HUANCAS'),
('01','01','09','LA JALCA'),
('01','01','10','LEIMEBAMBA'),
('01','01','11','LEVANTO'),
('01','01','12','MAGDALENA'),
('01','01','13','MARISCAL CASTILLA'),
('01','01','14','MOLINOPAMPA'),
('01','01','15','MONTEVIDEO'),
('01','01','16','OLLEROS'),
('01','01','17','QUINJALCA'),
('01','01','18','SAN FRANCISCO DE DAGUAS'),
('01','01','19','SAN ISIDRO DE MAINO'),
('01','01','20','SOLOCO'),
('01','01','21','SONCHE'),
('01','02','00','BAGUA'),
('01','02','01','BAGUA'),
('01','02','02','ARAMANGO'),
('01','02','03','COPALLIN'),
('01','02','04','EL PARCO'),
('01','02','05','IMAZA'),
('01','02','06','LA PECA'),
('01','03','00','BONGARA'),
('01','03','01','JUMBILLA'),
('01','03','02','CHISQUILLA'),
('01','03','03','CHURUJA'),
('01','03','04','COROSHA'),
('01','03','05','CUISPES'),
('01','03','06','FLORIDA'),
('01','03','07','JAZAN'),
('01','03','08','RECTA'),
('01','03','09','SAN CARLOS'),
('01','03','10','SHIPASBAMBA'),
('01','03','11','VALERA'),
('01','03','12','YAMBRASBAMBA'),
('01','04','00','CONDORCANQUI'),
('01','04','01','NIEVA'),
('01','04','02','EL CENEPA'),
('01','04','03','RIO SANTIAGO'),
('01','05','00','LUYA'),
('01','05','01','LAMUD'),
('01','05','02','CAMPORREDONDO'),
('01','05','03','COCABAMBA'),
('01','05','04','COLCAMAR'),
('01','05','05','CONILA'),
('01','05','06','INGUILPATA'),
('01','05','07','LONGUITA'),
('01','05','08','LONYA CHICO'),
('01','05','09','LUYA'),
('01','05','10','LUYA VIEJO'),
('01','05','11','MARIA'),
('01','05','12','OCALLI'),
('01','05','13','OCUMAL'),
('01','05','14','PISUQUIA'),
('01','05','15','PROVIDENCIA'),
('01','05','16','SAN CRISTOBAL'),
('01','05','17','SAN FRANCISCO DEL YESO'),
('01','05','18','SAN JERONIMO'),
('01','05','19','SAN JUAN DE LOPECANCHA'),
('01','05','20','SANTA CATALINA'),
('01','05','21','SANTO TOMAS'),
('01','05','22','TINGO'),
('01','05','23','TRITA'),
('01','06','00','RODRIGUEZ DE MENDOZA'),
('01','06','01','SAN NICOLAS'),
('01','06','02','CHIRIMOTO'),
('01','06','03','COCHAMAL'),
('01','06','04','HUAMBO'),
('01','06','05','LIMABAMBA'),
('01','06','06','LONGAR'),
('01','06','07','MARISCAL BENAVIDES'),
('01','06','08','MILPUC'),
('01','06','09','OMIA'),
('01','06','10','SANTA ROSA'),
('01','06','11','TOTORA'),
('01','06','12','VISTA ALEGRE'),
('01','07','00','UTCUBAMBA'),
('01','07','01','BAGUA GRANDE'),
('01','07','02','CAJARURO'),
('01','07','03','CUMBA'),
('01','07','04','EL MILAGRO'),
('01','07','05','JAMALCA'),
('01','07','06','LONYA GRANDE'),
('01','07','07','YAMON'),
('02','00','00','ANCASH'),
('02','01','00','HUARAZ'),
('02','01','01','HUARAZ'),
('02','01','02','COCHABAMBA'),
('02','01','03','COLCABAMBA'),
('02','01','04','HUANCHAY'),
('02','01','05','INDEPENDENCIA'),
('02','01','06','JANGAS'),
('02','01','07','LA LIBERTAD'),
('02','01','08','OLLEROS'),
('02','01','09','PAMPAS'),
('02','01','10','PARIACOTO'),
('02','01','11','PIRA'),
('02','01','12','TARICA'),
('02','02','00','AIJA'),
('02','02','01','AIJA'),
('02','02','02','CORIS'),
('02','02','03','HUACLLAN'),
('02','02','04','LA MERCED'),
('02','02','05','SUCCHA'),
('02','03','00','ANTONIO RAYMONDI'),
('02','03','01','LLAMELLIN'),
('02','03','02','ACZO'),
('02','03','03','CHACCHO'),
('02','03','04','CHINGAS'),
('02','03','05','MIRGAS'),
('02','03','06','SAN JUAN DE RONTOY'),
('02','04','00','ASUNCION'),
('02','04','01','CHACAS'),
('02','04','02','ACOCHACA'),
('02','05','00','BOLOGNESI'),
('02','05','01','CHIQUIAN'),
('02','05','02','ABELARDO PARDO LEZAMETA'),
('02','05','03','ANTONIO RAYMONDI'),
('02','05','04','AQUIA'),
('02','05','05','CAJACAY'),
('02','05','06','CANIS'),
('02','05','07','COLQUIOC'),
('02','05','08','HUALLANCA'),
('02','05','09','HUASTA'),
('02','05','10','HUAYLLACAYAN'),
('02','05','11','LA PRIMAVERA'),
('02','05','12','MANGAS'),
('02','05','13','PACLLON'),
('02','05','14','SAN MIGUEL DE CORPANQUI'),
('02','05','15','TICLLOS'),
('02','06','00','CARHUAZ'),
('02','06','01','CARHUAZ'),
('02','06','02','ACOPAMPA'),
('02','06','03','AMASHCA'),
('02','06','04','ANTA'),
('02','06','05','ATAQUERO'),
('02','06','06','MARCARA'),
('02','06','07','PARIAHUANCA'),
('02','06','08','SAN MIGUEL DE ACO'),
('02','06','09','SHILLA'),
('02','06','10','TINCO'),
('02','06','11','YUNGAR'),
('02','07','00','CARLOS FERMIN FITZCARRALD'),
('02','07','01','SAN LUIS'),
('02','07','02','SAN NICOLAS'),
('02','07','03','YAUYA'),
('02','08','00','CASMA'),
('02','08','01','CASMA'),
('02','08','02','BUENA VISTA ALTA'),
('02','08','03','COMANDANTE NOEL'),
('02','08','04','YAUTAN'),
('02','09','00','CORONGO'),
('02','09','01','CORONGO'),
('02','09','02','ACO'),
('02','09','03','BAMBAS'),
('02','09','04','CUSCA'),
('02','09','05','LA PAMPA'),
('02','09','06','YANAC'),
('02','09','07','YUPAN'),
('02','10','00','HUARI'),
('02','10','01','HUARI'),
('02','10','02','ANRA'),
('02','10','03','CAJAY'),
('02','10','04','CHAVIN DE HUANTAR'),
('02','10','05','HUACACHI'),
('02','10','06','HUACCHIS'),
('02','10','07','HUACHIS'),
('02','10','08','HUANTAR'),
('02','10','09','MASIN'),
('02','10','10','PAUCAS'),
('02','10','11','PONTO'),
('02','10','12','RAHUAPAMPA'),
('02','10','13','RAPAYAN'),
('02','10','14','SAN MARCOS'),
('02','10','15','SAN PEDRO DE CHANA'),
('02','10','16','UCO'),
('02','11','00','HUARMEY'),
('02','11','01','HUARMEY'),
('02','11','02','COCHAPETI'),
('02','11','03','CULEBRAS'),
('02','11','04','HUAYAN'),
('02','11','05','MALVAS'),
('02','12','00','HUAYLAS'),
('02','12','01','CARAZ'),
('02','12','02','HUALLANCA'),
('02','12','03','HUATA'),
('02','12','04','HUAYLAS'),
('02','12','05','MATO'),
('02','12','06','PAMPAROMAS'),
('02','12','07','PUEBLO LIBRE'),
('02','12','08','SANTA CRUZ'),
('02','12','09','SANTO TORIBIO'),
('02','12','10','YURACMARCA'),
('02','13','00','MARISCAL LUZURIAGA'),
('02','13','01','PISCOBAMBA'),
('02','13','02','CASCA'),
('02','13','03','ELEAZAR GUZMAN BARRON'),
('02','13','04','FIDEL OLIVAS ESCUDERO'),
('02','13','05','LLAMA'),
('02','13','06','LLUMPA'),
('02','13','07','LUCMA'),
('02','13','08','MUSGA'),
('02','14','00','OCROS'),
('02','14','01','OCROS'),
('02','14','02','ACAS'),
('02','14','03','CAJAMARQUILLA'),
('02','14','04','CARHUAPAMPA'),
('02','14','05','COCHAS'),
('02','14','06','CONGAS'),
('02','14','07','LLIPA'),
('02','14','08','SAN CRISTOBAL DE RAJAN'),
('02','14','09','SAN PEDRO'),
('02','14','10','SANTIAGO DE CHILCAS'),
('02','15','00','PALLASCA'),
('02','15','01','CABANA'),
('02','15','02','BOLOGNESI'),
('02','15','03','CONCHUCOS'),
('02','15','04','HUACASCHUQUE'),
('02','15','05','HUANDOVAL'),
('02','15','06','LACABAMBA'),
('02','15','07','LLAPO'),
('02','15','08','PALLASCA'),
('02','15','09','PAMPAS'),
('02','15','10','SANTA ROSA'),
('02','15','11','TAUCA'),
('02','16','00','POMABAMBA'),
('02','16','01','POMABAMBA'),
('02','16','02','HUAYLLAN'),
('02','16','03','PAROBAMBA'),
('02','16','04','QUINUABAMBA'),
('02','17','00','RECUAY'),
('02','17','01','RECUAY'),
('02','17','02','CATAC'),
('02','17','03','COTAPARACO'),
('02','17','04','HUAYLLAPAMPA'),
('02','17','05','LLACLLIN'),
('02','17','06','MARCA'),
('02','17','07','PAMPAS CHICO'),
('02','17','08','PARARIN'),
('02','17','09','TAPACOCHA'),
('02','17','10','TICAPAMPA'),
('02','18','00','SANTA'),
('02','18','01','CHIMBOTE'),
('02','18','02','CACERES DEL PERU'),
('02','18','03','COISHCO'),
('02','18','04','MACATE'),
('02','18','05','MORO'),
('02','18','06','NEPEÑA'),
('02','18','07','SAMANCO'),
('02','18','08','SANTA'),
('02','18','09','NUEVO CHIMBOTE'),
('02','19','00','SIHUAS'),
('02','19','01','SIHUAS'),
('02','19','02','ACOBAMBA'),
('02','19','03','ALFONSO UGARTE'),
('02','19','04','CASHAPAMPA'),
('02','19','05','CHINGALPO'),
('02','19','06','HUAYLLABAMBA'),
('02','19','07','QUICHES'),
('02','19','08','RAGASH'),
('02','19','09','SAN JUAN'),
('02','19','10','SICSIBAMBA'),
('02','20','00','YUNGAY'),
('02','20','01','YUNGAY'),
('02','20','02','CASCAPARA'),
('02','20','03','MANCOS'),
('02','20','04','MATACOTO'),
('02','20','05','QUILLO'),
('02','20','06','RANRAHIRCA'),
('02','20','07','SHUPLUY'),
('02','20','08','YANAMA'),
('03','00','00','APURIMAC'),
('03','01','00','ABANCAY'),
('03','01','01','ABANCAY'),
('03','01','02','CHACOCHE'),
('03','01','03','CIRCA'),
('03','01','04','CURAHUASI'),
('03','01','05','HUANIPACA'),
('03','01','06','LAMBRAMA'),
('03','01','07','PICHIRHUA'),
('03','01','08','SAN PEDRO DE CACHORA'),
('03','01','09','TAMBURCO'),
('03','02','00','ANDAHUAYLAS'),
('03','02','01','ANDAHUAYLAS'),
('03','02','02','ANDARAPA'),
('03','02','03','CHIARA'),
('03','02','04','HUANCARAMA'),
('03','02','05','HUANCARAY'),
('03','02','06','HUAYANA'),
('03','02','07','KISHUARA'),
('03','02','08','PACOBAMBA'),
('03','02','09','PACUCHA'),
('03','02','10','PAMPACHIRI'),
('03','02','11','POMACOCHA'),
('03','02','12','SAN ANTONIO DE CACHI'),
('03','02','13','SAN JERONIMO'),
('03','02','14','SAN MIGUEL DE CHACCRAMPA'),
('03','02','15','SANTA MARIA DE CHICMO'),
('03','02','16','TALAVERA'),
('03','02','17','TUMAY HUARACA'),
('03','02','18','TURPO'),
('03','02','19','KAQUIABAMBA'),
('03','03','00','ANTABAMBA'),
('03','03','01','ANTABAMBA'),
('03','03','02','EL ORO'),
('03','03','03','HUAQUIRCA'),
('03','03','04','JUAN ESPINOZA MEDRANO'),
('03','03','05','OROPESA'),
('03','03','06','PACHACONAS'),
('03','03','07','SABAINO'),
('03','04','00','AYMARAES'),
('03','04','01','CHALHUANCA'),
('03','04','02','CAPAYA'),
('03','04','03','CARAYBAMBA'),
('03','04','04','CHAPIMARCA'),
('03','04','05','COLCABAMBA'),
('03','04','06','COTARUSE'),
('03','04','07','HUAYLLO'),
('03','04','08','JUSTO APU SAHUARAURA'),
('03','04','09','LUCRE'),
('03','04','10','POCOHUANCA'),
('03','04','11','SAN JUAN DE CHACÑA'),
('03','04','12','SAÑAYCA'),
('03','04','13','SORAYA'),
('03','04','14','TAPAIRIHUA'),
('03','04','15','TINTAY'),
('03','04','16','TORAYA'),
('03','04','17','YANACA'),
('03','05','00','COTABAMBAS'),
('03','05','01','TAMBOBAMBA'),
('03','05','02','COTABAMBAS'),
('03','05','03','COYLLURQUI'),
('03','05','04','HAQUIRA'),
('03','05','05','MARA'),
('03','05','06','CHALLHUAHUACHO'),
('03','06','00','CHINCHEROS'),
('03','06','01','CHINCHEROS'),
('03','06','02','ANCO_HUALLO'),
('03','06','03','COCHARCAS'),
('03','06','04','HUACCANA'),
('03','06','05','OCOBAMBA'),
('03','06','06','ONGOY'),
('03','06','07','URANMARCA'),
('03','06','08','RANRACANCHA'),
('03','07','00','GRAU'),
('03','07','01','CHUQUIBAMBILLA'),
('03','07','02','CURPAHUASI'),
('03','07','03','GAMARRA'),
('03','07','04','HUAYLLATI'),
('03','07','05','MAMARA'),
('03','07','06','MICAELA BASTIDAS'),
('03','07','07','PATAYPAMPA'),
('03','07','08','PROGRESO'),
('03','07','09','SAN ANTONIO'),
('03','07','10','SANTA ROSA'),
('03','07','11','TURPAY'),
('03','07','12','VILCABAMBA'),
('03','07','13','VIRUNDO'),
('03','07','14','CURASCO'),
('04','00','00','AREQUIPA'),
('04','01','00','AREQUIPA'),
('04','01','01','AREQUIPA'),
('04','01','02','ALTO SELVA ALEGRE'),
('04','01','03','CAYMA'),
('04','01','04','CERRO COLORADO'),
('04','01','05','CHARACATO'),
('04','01','06','CHIGUATA'),
('04','01','07','JACOBO HUNTER'),
('04','01','08','LA JOYA'),
('04','01','09','MARIANO MELGAR'),
('04','01','10','MIRAFLORES'),
('04','01','11','MOLLEBAYA'),
('04','01','12','PAUCARPATA'),
('04','01','13','POCSI'),
('04','01','14','POLOBAYA'),
('04','01','15','QUEQUEÑA'),
('04','01','16','SABANDIA'),
('04','01','17','SACHACA'),
('04','01','18','SAN JUAN DE SIGUAS'),
('04','01','19','SAN JUAN DE TARUCANI'),
('04','01','20','SANTA ISABEL DE SIGUAS'),
('04','01','21','SANTA RITA DE SIGUAS'),
('04','01','22','SOCABAYA'),
('04','01','23','TIABAYA'),
('04','01','24','UCHUMAYO'),
('04','01','25','VITOR'),
('04','01','26','YANAHUARA'),
('04','01','27','YARABAMBA'),
('04','01','28','YURA'),
('04','01','29','JOSE LUIS BUSTAMANTE Y RIVERO'),
('04','02','00','CAMANA'),
('04','02','01','CAMANA'),
('04','02','02','JOSE MARIA QUIMPER'),
('04','02','03','MARIANO NICOLAS VALCARCEL'),
('04','02','04','MARISCAL CACERES'),
('04','02','05','NICOLAS DE PIEROLA'),
('04','02','06','OCOÑA'),
('04','02','07','QUILCA'),
('04','02','08','SAMUEL PASTOR'),
('04','03','00','CARAVELI'),
('04','03','01','CARAVELI'),
('04','03','02','ACARI'),
('04','03','03','ATICO'),
('04','03','04','ATIQUIPA'),
('04','03','05','BELLA UNION'),
('04','03','06','CAHUACHO'),
('04','03','07','CHALA'),
('04','03','08','CHAPARRA'),
('04','03','09','HUANUHUANU'),
('04','03','10','JAQUI'),
('04','03','11','LOMAS'),
('04','03','12','QUICACHA'),
('04','03','13','YAUCA'),
('04','04','00','CASTILLA'),
('04','04','01','APLAO'),
('04','04','02','ANDAGUA'),
('04','04','03','AYO'),
('04','04','04','CHACHAS'),
('04','04','05','CHILCAYMARCA'),
('04','04','06','CHOCO'),
('04','04','07','HUANCARQUI'),
('04','04','08','MACHAGUAY'),
('04','04','09','ORCOPAMPA'),
('04','04','10','PAMPACOLCA'),
('04','04','11','TIPAN'),
('04','04','12','UÑON'),
('04','04','13','URACA'),
('04','04','14','VIRACO'),
('04','05','00','CAYLLOMA'),
('04','05','01','CHIVAY'),
('04','05','02','ACHOMA'),
('04','05','03','CABANACONDE'),
('04','05','04','CALLALLI'),
('04','05','05','CAYLLOMA'),
('04','05','06','COPORAQUE'),
('04','05','07','HUAMBO'),
('04','05','08','HUANCA'),
('04','05','09','ICHUPAMPA'),
('04','05','10','LARI'),
('04','05','11','LLUTA'),
('04','05','12','MACA'),
('04','05','13','MADRIGAL'),
('04','05','14','SAN ANTONIO DE CHUCA'),
('04','05','15','SIBAYO'),
('04','05','16','TAPAY'),
('04','05','17','TISCO'),
('04','05','18','TUTI'),
('04','05','19','YANQUE'),
('04','05','20','MAJES'),
('04','06','00','CONDESUYOS'),
('04','06','01','CHUQUIBAMBA'),
('04','06','02','ANDARAY'),
('04','06','03','CAYARANI'),
('04','06','04','CHICHAS'),
('04','06','05','IRAY'),
('04','06','06','RIO GRANDE'),
('04','06','07','SALAMANCA'),
('04','06','08','YANAQUIHUA'),
('04','07','00','ISLAY'),
('04','07','01','MOLLENDO'),
('04','07','02','COCACHACRA'),
('04','07','03','DEAN VALDIVIA'),
('04','07','04','ISLAY'),
('04','07','05','MEJIA'),
('04','07','06','PUNTA DE BOMBON'),
('04','08','00','LA UNION'),
('04','08','01','COTAHUASI'),
('04','08','02','ALCA'),
('04','08','03','CHARCANA'),
('04','08','04','HUAYNACOTAS'),
('04','08','05','PAMPAMARCA'),
('04','08','06','PUYCA'),
('04','08','07','QUECHUALLA'),
('04','08','08','SAYLA'),
('04','08','09','TAURIA'),
('04','08','10','TOMEPAMPA'),
('04','08','11','TORO'),
('05','00','00','AYACUCHO'),
('05','01','00','HUAMANGA'),
('05','01','01','AYACUCHO'),
('05','01','02','ACOCRO'),
('05','01','03','ACOS VINCHOS'),
('05','01','04','CARMEN ALTO'),
('05','01','05','CHIARA'),
('05','01','06','OCROS'),
('05','01','07','PACAYCASA'),
('05','01','08','QUINUA'),
('05','01','09','SAN JOSE DE TICLLAS'),
('05','01','10','SAN JUAN BAUTISTA'),
('05','01','11','SANTIAGO DE PISCHA'),
('05','01','12','SOCOS'),
('05','01','13','TAMBILLO'),
('05','01','14','VINCHOS'),
('05','01','15','JESUS NAZARENO'),
('05','02','00','CANGALLO'),
('05','02','01','CANGALLO'),
('05','02','02','CHUSCHI'),
('05','02','03','LOS MOROCHUCOS'),
('05','02','04','MARIA PARADO DE BELLIDO'),
('05','02','05','PARAS'),
('05','02','06','TOTOS'),
('05','03','00','HUANCA SANCOS'),
('05','03','01','SANCOS'),
('05','03','02','CARAPO'),
('05','03','03','SACSAMARCA'),
('05','03','04','SANTIAGO DE LUCANAMARCA'),
('05','04','00','HUANTA'),
('05','04','01','HUANTA'),
('05','04','02','AYAHUANCO'),
('05','04','03','HUAMANGUILLA'),
('05','04','04','IGUAIN'),
('05','04','05','LURICOCHA'),
('05','04','06','SANTILLANA'),
('05','04','07','SIVIA'),
('05','04','08','LLOCHEGUA'),
('05','05','00','LA MAR'),
('05','05','01','SAN MIGUEL'),
('05','05','02','ANCO'),
('05','05','03','AYNA'),
('05','05','04','CHILCAS'),
('05','05','05','CHUNGUI'),
('05','05','06','LUIS CARRANZA'),
('05','05','07','SANTA ROSA'),
('05','05','08','TAMBO'),
('05','05','09','SAMUGARI'),
('05','06','00','LUCANAS'),
('05','06','01','PUQUIO'),
('05','06','02','AUCARA'),
('05','06','03','CABANA'),
('05','06','04','CARMEN SALCEDO'),
('05','06','05','CHAVIÑA'),
('05','06','06','CHIPAO'),
('05','06','07','HUAC-HUAS'),
('05','06','08','LARAMATE'),
('05','06','09','LEONCIO PRADO'),
('05','06','10','LLAUTA'),
('05','06','11','LUCANAS'),
('05','06','12','OCAÑA'),
('05','06','13','OTOCA'),
('05','06','14','SAISA'),
('05','06','15','SAN CRISTOBAL'),
('05','06','16','SAN JUAN'),
('05','06','17','SAN PEDRO'),
('05','06','18','SAN PEDRO DE PALCO'),
('05','06','19','SANCOS'),
('05','06','20','SANTA ANA DE HUAYCAHUACHO'),
('05','06','21','SANTA LUCIA'),
('05','07','00','PARINACOCHAS'),
('05','07','01','CORACORA'),
('05','07','02','CHUMPI'),
('05','07','03','CORONEL CASTAÑEDA'),
('05','07','04','PACAPAUSA'),
('05','07','05','PULLO'),
('05','07','06','PUYUSCA'),
('05','07','07','SAN FRANCISCO DE RAVACAYCO'),
('05','07','08','UPAHUACHO'),
('05','08','00','PAUCAR DEL SARA SARA'),
('05','08','01','PAUSA'),
('05','08','02','COLTA'),
('05','08','03','CORCULLA'),
('05','08','04','LAMPA'),
('05','08','05','MARCABAMBA'),
('05','08','06','OYOLO'),
('05','08','07','PARARCA'),
('05','08','08','SAN JAVIER DE ALPABAMBA'),
('05','08','09','SAN JOSE DE USHUA'),
('05','08','10','SARA SARA'),
('05','09','00','SUCRE'),
('05','09','01','QUEROBAMBA'),
('05','09','02','BELEN'),
('05','09','03','CHALCOS'),
('05','09','04','CHILCAYOC'),
('05','09','05','HUACAÑA'),
('05','09','06','MORCOLLA'),
('05','09','07','PAICO'),
('05','09','08','SAN PEDRO DE LARCAY'),
('05','09','09','SAN SALVADOR DE QUIJE'),
('05','09','10','SANTIAGO DE PAUCARAY'),
('05','09','11','SORAS'),
('05','10','00','VICTOR FAJARDO'),
('05','10','01','HUANCAPI'),
('05','10','02','ALCAMENCA'),
('05','10','03','APONGO'),
('05','10','04','ASQUIPATA'),
('05','10','05','CANARIA'),
('05','10','06','CAYARA'),
('05','10','07','COLCA'),
('05','10','08','HUAMANQUIQUIA'),
('05','10','09','HUANCARAYLLA'),
('05','10','10','HUAYA'),
('05','10','11','SARHUA'),
('05','10','12','VILCANCHOS'),
('05','11','00','VILCAS HUAMAN'),
('05','11','01','VILCAS HUAMAN'),
('05','11','02','ACCOMARCA'),
('05','11','03','CARHUANCA'),
('05','11','04','CONCEPCION'),
('05','11','05','HUAMBALPA'),
('05','11','06','INDEPENDENCIA'),
('05','11','07','SAURAMA'),
('05','11','08','VISCHONGO'),
('06','00','00','CAJAMARCA'),
('06','01','00','CAJAMARCA'),
('06','01','01','CAJAMARCA'),
('06','01','02','ASUNCION'),
('06','01','03','CHETILLA'),
('06','01','04','COSPAN'),
('06','01','05','ENCAÑADA'),
('06','01','06','JESUS'),
('06','01','07','LLACANORA'),
('06','01','08','LOS BAÑOS DEL INCA'),
('06','01','09','MAGDALENA'),
('06','01','10','MATARA'),
('06','01','11','NAMORA'),
('06','01','12','SAN JUAN'),
('06','02','00','CAJABAMBA'),
('06','02','01','CAJABAMBA'),
('06','02','02','CACHACHI'),
('06','02','03','CONDEBAMBA'),
('06','02','04','SITACOCHA'),
('06','03','00','CELENDIN'),
('06','03','01','CELENDIN'),
('06','03','02','CHUMUCH'),
('06','03','03','CORTEGANA'),
('06','03','04','HUASMIN'),
('06','03','05','JORGE CHAVEZ'),
('06','03','06','JOSE GALVEZ'),
('06','03','07','MIGUEL IGLESIAS'),
('06','03','08','OXAMARCA'),
('06','03','09','SOROCHUCO'),
('06','03','10','SUCRE'),
('06','03','11','UTCO'),
('06','03','12','LA LIBERTAD DE PALLAN'),
('06','04','00','CHOTA'),
('06','04','01','CHOTA'),
('06','04','02','ANGUIA'),
('06','04','03','CHADIN'),
('06','04','04','CHIGUIRIP'),
('06','04','05','CHIMBAN'),
('06','04','06','CHOROPAMPA'),
('06','04','07','COCHABAMBA'),
('06','04','08','CONCHAN'),
('06','04','09','HUAMBOS'),
('06','04','10','LAJAS'),
('06','04','11','LLAMA'),
('06','04','12','MIRACOSTA'),
('06','04','13','PACCHA'),
('06','04','14','PION'),
('06','04','15','QUEROCOTO'),
('06','04','16','SAN JUAN DE LICUPIS'),
('06','04','17','TACABAMBA'),
('06','04','18','TOCMOCHE'),
('06','04','19','CHALAMARCA'),
('06','05','00','CONTUMAZA'),
('06','05','01','CONTUMAZA'),
('06','05','02','CHILETE'),
('06','05','03','CUPISNIQUE'),
('06','05','04','GUZMANGO'),
('06','05','05','SAN BENITO'),
('06','05','06','SANTA CRUZ DE TOLED'),
('06','05','07','TANTARICA'),
('06','05','08','YONAN'),
('06','06','00','CUTERVO'),
('06','06','01','CUTERVO'),
('06','06','02','CALLAYUC'),
('06','06','03','CHOROS'),
('06','06','04','CUJILLO'),
('06','06','05','LA RAMADA'),
('06','06','06','PIMPINGOS'),
('06','06','07','QUEROCOTILLO'),
('06','06','08','SAN ANDRES DE CUTERVO'),
('06','06','09','SAN JUAN DE CUTERVO'),
('06','06','10','SAN LUIS DE LUCMA'),
('06','06','11','SANTA CRUZ'),
('06','06','12','SANTO DOMINGO DE LA CAPILLA'),
('06','06','13','SANTO TOMAS'),
('06','06','14','SOCOTA'),
('06','06','15','TORIBIO CASANOVA'),
('06','07','00','HUALGAYOC'),
('06','07','01','BAMBAMARCA'),
('06','07','02','CHUGUR'),
('06','07','03','HUALGAYOC'),
('06','08','00','JAEN'),
('06','08','01','JAEN'),
('06','08','02','BELLAVISTA'),
('06','08','03','CHONTALI'),
('06','08','04','COLASAY'),
('06','08','05','HUABAL'),
('06','08','06','LAS PIRIAS'),
('06','08','07','POMAHUACA'),
('06','08','08','PUCARA'),
('06','08','09','SALLIQUE'),
('06','08','10','SAN FELIPE'),
('06','08','11','SAN JOSE DEL ALTO'),
('06','08','12','SANTA ROSA'),
('06','09','00','SAN IGNACIO'),
('06','09','01','SAN IGNACIO'),
('06','09','02','CHIRINOS'),
('06','09','03','HUARANGO'),
('06','09','04','LA COIPA'),
('06','09','05','NAMBALLE'),
('06','09','06','SAN JOSE DE LOURDES'),
('06','09','07','TABACONAS'),
('06','10','00','SAN MARCOS'),
('06','10','01','PEDRO GALVEZ'),
('06','10','02','CHANCAY'),
('06','10','03','EDUARDO VILLANUEVA'),
('06','10','04','GREGORIO PITA'),
('06','10','05','ICHOCAN'),
('06','10','06','JOSE MANUEL QUIROZ'),
('06','10','07','JOSE SABOGAL'),
('06','11','00','SAN MIGUEL'),
('06','11','01','SAN MIGUEL'),
('06','11','02','BOLIVAR'),
('06','11','03','CALQUIS'),
('06','11','04','CATILLUC'),
('06','11','05','EL PRADO'),
('06','11','06','LA FLORIDA'),
('06','11','07','LLAPA'),
('06','11','08','NANCHOC'),
('06','11','09','NIEPOS'),
('06','11','10','SAN GREGORIO'),
('06','11','11','SAN SILVESTRE DE COCHAN'),
('06','11','12','TONGOD'),
('06','11','13','UNION AGUA BLANCA'),
('06','12','00','SAN PABLO'),
('06','12','01','SAN PABLO'),
('06','12','02','SAN BERNARDINO'),
('06','12','03','SAN LUIS'),
('06','12','04','TUMBADEN'),
('06','13','00','SANTA CRUZ'),
('06','13','01','SANTA CRUZ'),
('06','13','02','ANDABAMBA'),
('06','13','03','CATACHE'),
('06','13','04','CHANCAYBAÑOS'),
('06','13','05','LA ESPERANZA'),
('06','13','06','NINABAMBA'),
('06','13','07','PULAN'),
('06','13','08','SAUCEPAMPA'),
('06','13','09','SEXI'),
('06','13','10','UTICYACU'),
('06','13','11','YAUYUCAN'),
('07','00','00','CALLAO'),
('07','01','00','CALLAO'),
('07','01','01','CALLAO'),
('07','01','02','BELLAVISTA'),
('07','01','03','CARMEN DE LA LEGUA REYNOSO'),
('07','01','04','LA PERLA'),
('07','01','05','LA PUNTA'),
('07','01','06','VENTANILLA'),
('08','00','00','CUSCO'),
('08','01','00','CUSCO'),
('08','01','01','CUSCO'),
('08','01','02','CCORCA'),
('08','01','03','POROY'),
('08','01','04','SAN JERONIMO'),
('08','01','05','SAN SEBASTIAN'),
('08','01','06','SANTIAGO'),
('08','01','07','SAYLLA'),
('08','01','08','WANCHAQ'),
('08','02','00','ACOMAYO'),
('08','02','01','ACOMAYO'),
('08','02','02','ACOPIA'),
('08','02','03','ACOS'),
('08','02','04','MOSOC LLACTA'),
('08','02','05','POMACANCHI'),
('08','02','06','RONDOCAN'),
('08','02','07','SANGARARA'),
('08','03','00','ANTA'),
('08','03','01','ANTA'),
('08','03','02','ANCAHUASI'),
('08','03','03','CACHIMAYO'),
('08','03','04','CHINCHAYPUJIO'),
('08','03','05','HUAROCONDO'),
('08','03','06','LIMATAMBO'),
('08','03','07','MOLLEPATA'),
('08','03','08','PUCYURA'),
('08','03','09','ZURITE'),
('08','04','00','CALCA'),
('08','04','01','CALCA'),
('08','04','02','COYA'),
('08','04','03','LAMAY'),
('08','04','04','LARES'),
('08','04','05','PISAC'),
('08','04','06','SAN SALVADOR'),
('08','04','07','TARAY'),
('08','04','08','YANATILE'),
('08','05','00','CANAS'),
('08','05','01','YANAOCA'),
('08','05','02','CHECCA'),
('08','05','03','KUNTURKANKI'),
('08','05','04','LANGUI'),
('08','05','05','LAYO'),
('08','05','06','PAMPAMARCA'),
('08','05','07','QUEHUE'),
('08','05','08','TUPAC AMARU'),
('08','06','00','CANCHIS'),
('08','06','01','SICUANI'),
('08','06','02','CHECACUPE'),
('08','06','03','COMBAPATA'),
('08','06','04','MARANGANI'),
('08','06','05','PITUMARCA'),
('08','06','06','SAN PABLO'),
('08','06','07','SAN PEDRO'),
('08','06','08','TINTA'),
('08','07','00','CHUMBIVILCAS'),
('08','07','01','SANTO TOMAS'),
('08','07','02','CAPACMARCA'),
('08','07','03','CHAMACA'),
('08','07','04','COLQUEMARCA'),
('08','07','05','LIVITACA'),
('08','07','06','LLUSCO'),
('08','07','07','QUIÑOTA'),
('08','07','08','VELILLE'),
('08','08','00','ESPINAR'),
('08','08','01','ESPINAR'),
('08','08','02','CONDOROMA'),
('08','08','03','COPORAQUE'),
('08','08','04','OCORURO'),
('08','08','05','PALLPATA'),
('08','08','06','PICHIGUA'),
('08','08','07','SUYCKUTAMBO'),
('08','08','08','ALTO PICHIGUA'),
('08','09','00','LA CONVENCION'),
('08','09','01','SANTA ANA'),
('08','09','02','ECHARATE'),
('08','09','03','HUAYOPATA'),
('08','09','04','MARANURA'),
('08','09','05','OCOBAMBA'),
('08','09','06','QUELLOUNO'),
('08','09','07','KIMBIRI'),
('08','09','08','SANTA TERESA'),
('08','09','09','VILCABAMBA'),
('08','09','10','PICHARI'),
('08','10','00','PARURO'),
('08','10','01','PARURO'),
('08','10','02','ACCHA'),
('08','10','03','CCAPI'),
('08','10','04','COLCHA'),
('08','10','05','HUANOQUITE'),
('08','10','06','OMACHA'),
('08','10','07','PACCARITAMBO'),
('08','10','08','PILLPINTO'),
('08','10','09','YAURISQUE'),
('08','11','00','PAUCARTAMBO'),
('08','11','01','PAUCARTAMBO'),
('08','11','02','CAICAY'),
('08','11','03','CHALLABAMBA'),
('08','11','04','COLQUEPATA'),
('08','11','05','HUANCARANI'),
('08','11','06','KOSÑIPATA'),
('08','12','00','QUISPICANCHI'),
('08','12','01','URCOS'),
('08','12','02','ANDAHUAYLILLAS'),
('08','12','03','CAMANTI'),
('08','12','04','CCARHUAYO'),
('08','12','05','CCATCA'),
('08','12','06','CUSIPATA'),
('08','12','07','HUARO'),
('08','12','08','LUCRE'),
('08','12','09','MARCAPATA'),
('08','12','10','OCONGATE'),
('08','12','11','OROPESA'),
('08','12','12','QUIQUIJANA'),
('08','13','00','URUBAMBA'),
('08','13','01','URUBAMBA'),
('08','13','02','CHINCHERO'),
('08','13','03','HUAYLLABAMBA'),
('08','13','04','MACHUPICCHU'),
('08','13','05','MARAS'),
('08','13','06','OLLANTAYTAMBO'),
('08','13','07','YUCAY'),
('09','00','00','HUANCAVELICA'),
('09','01','00','HUANCAVELICA'),
('09','01','01','HUANCAVELICA'),
('09','01','02','ACOBAMBILLA'),
('09','01','03','ACORIA'),
('09','01','04','CONAYCA'),
('09','01','05','CUENCA'),
('09','01','06','HUACHOCOLPA'),
('09','01','07','HUAYLLAHUARA'),
('09','01','08','IZCUCHACA'),
('09','01','09','LARIA'),
('09','01','10','MANTA'),
('09','01','11','MARISCAL CACERES'),
('09','01','12','MOYA'),
('09','01','13','NUEVO OCCORO'),
('09','01','14','PALCA'),
('09','01','15','PILCHACA'),
('09','01','16','VILCA'),
('09','01','17','YAULI'),
('09','01','18','ASCENSION'),
('09','01','19','HUANDO'),
('09','02','00','ACOBAMBA'),
('09','02','01','ACOBAMBA'),
('09','02','02','ANDABAMBA'),
('09','02','03','ANTA'),
('09','02','04','CAJA'),
('09','02','05','MARCAS'),
('09','02','06','PAUCARA'),
('09','02','07','POMACOCHA'),
('09','02','08','ROSARIO'),
('09','03','00','ANGARAES'),
('09','03','01','LIRCAY'),
('09','03','02','ANCHONGA'),
('09','03','03','CALLANMARCA'),
('09','03','04','CCOCHACCASA'),
('09','03','05','CHINCHO'),
('09','03','06','CONGALLA'),
('09','03','07','HUANCA-HUANCA'),
('09','03','08','HUAYLLAY GRANDE'),
('09','03','09','JULCAMARCA'),
('09','03','10','SAN ANTONIO DE ANTAPARCO'),
('09','03','11','SANTO TOMAS DE PATA'),
('09','03','12','SECCLLA'),
('09','04','00','CASTROVIRREYNA'),
('09','04','01','CASTROVIRREYNA'),
('09','04','02','ARMA'),
('09','04','03','AURAHUA'),
('09','04','04','CAPILLAS'),
('09','04','05','CHUPAMARCA'),
('09','04','06','COCAS'),
('09','04','07','HUACHOS'),
('09','04','08','HUAMATAMBO'),
('09','04','09','MOLLEPAMPA'),
('09','04','10','SAN JUAN'),
('09','04','11','SANTA ANA'),
('09','04','12','TANTARA'),
('09','04','13','TICRAPO'),
('09','05','00','CHURCAMPA'),
('09','05','01','CHURCAMPA'),
('09','05','02','ANCO'),
('09','05','03','CHINCHIHUASI'),
('09','05','04','EL CARMEN'),
('09','05','05','LA MERCED'),
('09','05','06','LOCROJA'),
('09','05','07','PAUCARBAMBA'),
('09','05','08','SAN MIGUEL DE MAYOCC'),
('09','05','09','SAN PEDRO DE CORIS'),
('09','05','10','PACHAMARCA'),
('09','05','11','COSME'),
('09','06','00','HUAYTARA'),
('09','06','01','HUAYTARA'),
('09','06','02','AYAVI'),
('09','06','03','CORDOVA'),
('09','06','04','HUAYACUNDO ARMA'),
('09','06','05','LARAMARCA'),
('09','06','06','OCOYO'),
('09','06','07','PILPICHACA'),
('09','06','08','QUERCO'),
('09','06','09','QUITO-ARMA'),
('09','06','10','SAN ANTONIO DE CUSICANCHA'),
('09','06','11','SAN FRANCISCO DE SANGAYAICO'),
('09','06','12','SAN ISIDRO'),
('09','06','13','SANTIAGO DE CHOCORVOS'),
('09','06','14','SANTIAGO DE QUIRAHUARA'),
('09','06','15','SANTO DOMINGO DE CAPILLAS'),
('09','06','16','TAMBO'),
('09','07','00','TAYACAJA'),
('09','07','01','PAMPAS'),
('09','07','02','ACOSTAMBO'),
('09','07','03','ACRAQUIA'),
('09','07','04','AHUAYCHA'),
('09','07','05','COLCABAMBA'),
('09','07','06','DANIEL HERNANDEZ'),
('09','07','07','HUACHOCOLPA'),
('09','07','09','HUARIBAMBA'),
('09','07','10','ÑAHUIMPUQUIO'),
('09','07','11','PAZOS'),
('09','07','13','QUISHUAR'),
('09','07','14','SALCABAMBA'),
('09','07','15','SALCAHUASI'),
('09','07','16','SAN MARCOS DE ROCCHAC'),
('09','07','17','SURCUBAMBA'),
('09','07','18','TINTAY PUNCU'),
('10','00','00','HUANUCO'),
('10','01','00','HUANUCO'),
('10','01','01','HUANUCO'),
('10','01','02','AMARILIS'),
('10','01','03','CHINCHAO'),
('10','01','04','CHURUBAMBA'),
('10','01','05','MARGOS'),
('10','01','06','QUISQUI (KICHKI)'),
('10','01','07','SAN FRANCISCO DE CAYRAN'),
('10','01','08','SAN PEDRO DE CHAULAN'),
('10','01','09','SANTA MARIA DEL VALLE'),
('10','01','10','YARUMAYO'),
('10','01','11','PILLCO MARCA'),
('10','01','12','YACUS'),
('10','02','00','AMBO'),
('10','02','01','AMBO'),
('10','02','02','CAYNA'),
('10','02','03','COLPAS'),
('10','02','04','CONCHAMARCA'),
('10','02','05','HUACAR'),
('10','02','06','SAN FRANCISCO'),
('10','02','07','SAN RAFAEL'),
('10','02','08','TOMAY KICHWA'),
('10','03','00','DOS DE MAYO'),
('10','03','01','LA UNION'),
('10','03','07','CHUQUIS'),
('10','03','11','MARIAS'),
('10','03','13','PACHAS'),
('10','03','16','QUIVILLA'),
('10','03','17','RIPAN'),
('10','03','21','SHUNQUI'),
('10','03','22','SILLAPATA'),
('10','03','23','YANAS'),
('10','04','00','HUACAYBAMBA'),
('10','04','01','HUACAYBAMBA'),
('10','04','02','CANCHABAMBA'),
('10','04','03','COCHABAMBA'),
('10','04','04','PINRA'),
('10','05','00','HUAMALIES'),
('10','05','01','LLATA'),
('10','05','02','ARANCAY'),
('10','05','03','CHAVIN DE PARIARCA'),
('10','05','04','JACAS GRANDE'),
('10','05','05','JIRCAN'),
('10','05','06','MIRAFLORES'),
('10','05','07','MONZON'),
('10','05','08','PUNCHAO'),
('10','05','09','PUÑOS'),
('10','05','10','SINGA'),
('10','05','11','TANTAMAYO'),
('10','06','00','LEONCIO PRADO'),
('10','06','01','RUPA-RUPA'),
('10','06','02','DANIEL ALOMIA ROBLES'),
('10','06','03','HERMILIO VALDIZAN'),
('10','06','04','JOSE CRESPO Y CASTILLO'),
('10','06','05','LUYANDO'),
('10','06','06','MARIANO DAMASO BERAUN'),
('10','07','00','MARAÑON'),
('10','07','01','HUACRACHUCO'),
('10','07','02','CHOLON'),
('10','07','03','SAN BUENAVENTURA'),
('10','08','00','PACHITEA'),
('10','08','01','PANAO'),
('10','08','02','CHAGLLA'),
('10','08','03','MOLINO'),
('10','08','04','UMARI'),
('10','09','00','PUERTO INCA'),
('10','09','01','PUERTO INCA'),
('10','09','02','CODO DEL POZUZO'),
('10','09','03','HONORIA'),
('10','09','04','TOURNAVISTA'),
('10','09','05','YUYAPICHIS'),
('10','10','00','LAURICOCHA'),
('10','10','01','JESUS'),
('10','10','02','BAÑOS'),
('10','10','03','JIVIA'),
('10','10','04','QUEROPALCA'),
('10','10','05','RONDOS'),
('10','10','06','SAN FRANCISCO DE ASIS'),
('10','10','07','SAN MIGUEL DE CAURI'),
('10','11','00','YAROWILCA'),
('10','11','01','CHAVINILLO'),
('10','11','02','CAHUAC'),
('10','11','03','CHACABAMBA'),
('10','11','04','APARICIO POMARES'),
('10','11','05','JACAS CHICO'),
('10','11','06','OBAS'),
('10','11','07','PAMPAMARCA'),
('10','11','08','CHORAS'),
('11','00','00','ICA'),
('11','01','00','ICA'),
('11','01','01','ICA'),
('11','01','02','LA TINGUIÑA'),
('11','01','03','LOS AQUIJES'),
('11','01','04','OCUCAJE'),
('11','01','05','PACHACUTEC'),
('11','01','06','PARCONA'),
('11','01','07','PUEBLO NUEVO'),
('11','01','08','SALAS'),
('11','01','09','SAN JOSE DE LOS MOLINOS'),
('11','01','10','SAN JUAN BAUTISTA'),
('11','01','11','SANTIAGO'),
('11','01','12','SUBTANJALLA'),
('11','01','13','TATE'),
('11','01','14','YAUCA DEL ROSARIO'),
('11','02','00','CHINCHA'),
('11','02','01','CHINCHA ALTA'),
('11','02','02','ALTO LARAN'),
('11','02','03','CHAVIN'),
('11','02','04','CHINCHA BAJA'),
('11','02','05','EL CARMEN'),
('11','02','06','GROCIO PRADO'),
('11','02','07','PUEBLO NUEVO'),
('11','02','08','SAN JUAN DE YANAC'),
('11','02','09','SAN PEDRO DE HUACARPANA'),
('11','02','10','SUNAMPE'),
('11','02','11','TAMBO DE MORA'),
('11','03','00','NAZCA'),
('11','03','01','NAZCA'),
('11','03','02','CHANGUILLO'),
('11','03','03','EL INGENIO'),
('11','03','04','MARCONA'),
('11','03','05','VISTA ALEGRE'),
('11','04','00','PALPA'),
('11','04','01','PALPA'),
('11','04','02','LLIPATA'),
('11','04','03','RIO GRANDE'),
('11','04','04','SANTA CRUZ'),
('11','04','05','TIBILLO'),
('11','05','00','PISCO'),
('11','05','01','PISCO'),
('11','05','02','HUANCANO'),
('11','05','03','HUMAY'),
('11','05','04','INDEPENDENCIA'),
('11','05','05','PARACAS'),
('11','05','06','SAN ANDRES'),
('11','05','07','SAN CLEMENTE'),
('11','05','08','TUPAC AMARU INCA'),
('12','00','00','JUNIN'),
('12','01','00','HUANCAYO'),
('12','01','01','HUANCAYO'),
('12','01','04','CARHUACALLANGA'),
('12','01','05','CHACAPAMPA'),
('12','01','06','CHICCHE'),
('12','01','07','CHILCA'),
('12','01','08','CHONGOS ALTO'),
('12','01','11','CHUPURO'),
('12','01','12','COLCA'),
('12','01','13','CULLHUAS'),
('12','01','14','EL TAMBO'),
('12','01','16','HUACRAPUQUIO'),
('12','01','17','HUALHUAS'),
('12','01','19','HUANCAN'),
('12','01','20','HUASICANCHA'),
('12','01','21','HUAYUCACHI'),
('12','01','22','INGENIO'),
('12','01','24','PARIAHUANCA'),
('12','01','25','PILCOMAYO'),
('12','01','26','PUCARA'),
('12','01','27','QUICHUAY'),
('12','01','28','QUILCAS'),
('12','01','29','SAN AGUSTIN'),
('12','01','30','SAN JERONIMO DE TUNAN'),
('12','01','32','SAÑO'),
('12','01','33','SAPALLANGA'),
('12','01','34','SICAYA'),
('12','01','35','SANTO DOMINGO DE ACOBAMBA'),
('12','01','36','VIQUES'),
('12','02','00','CONCEPCION'),
('12','02','01','CONCEPCION'),
('12','02','02','ACO'),
('12','02','03','ANDAMARCA'),
('12','02','04','CHAMBARA'),
('12','02','05','COCHAS'),
('12','02','06','COMAS'),
('12','02','07','HEROINAS TOLEDO'),
('12','02','08','MANZANARES'),
('12','02','09','MARISCAL CASTILLA'),
('12','02','10','MATAHUASI'),
('12','02','11','MITO'),
('12','02','12','NUEVE DE JULIO'),
('12','02','13','ORCOTUNA'),
('12','02','14','SAN JOSE DE QUERO'),
('12','02','15','SANTA ROSA DE OCOPA'),
('12','03','00','CHANCHAMAYO'),
('12','03','01','CHANCHAMAYO'),
('12','03','02','PERENE'),
('12','03','03','PICHANAQUI'),
('12','03','04','SAN LUIS DE SHUARO'),
('12','03','05','SAN RAMON'),
('12','03','06','VITOC'),
('12','04','00','JAUJA'),
('12','04','01','JAUJA'),
('12','04','02','ACOLLA'),
('12','04','03','APATA'),
('12','04','04','ATAURA'),
('12','04','05','CANCHAYLLO'),
('12','04','06','CURICACA'),
('12','04','07','EL MANTARO'),
('12','04','08','HUAMALI'),
('12','04','09','HUARIPAMPA'),
('12','04','10','HUERTAS'),
('12','04','11','JANJAILLO'),
('12','04','12','JULCAN'),
('12','04','13','LEONOR ORDOÑEZ'),
('12','04','14','LLOCLLAPAMPA'),
('12','04','15','MARCO'),
('12','04','16','MASMA'),
('12','04','17','MASMA CHICCHE'),
('12','04','18','MOLINOS'),
('12','04','19','MONOBAMBA'),
('12','04','20','MUQUI'),
('12','04','21','MUQUIYAUYO'),
('12','04','22','PACA'),
('12','04','23','PACCHA'),
('12','04','24','PANCAN'),
('12','04','25','PARCO'),
('12','04','26','POMACANCHA'),
('12','04','27','RICRAN'),
('12','04','28','SAN LORENZO'),
('12','04','29','SAN PEDRO DE CHUNAN'),
('12','04','30','SAUSA'),
('12','04','31','SINCOS'),
('12','04','32','TUNAN MARCA'),
('12','04','33','YAULI'),
('12','04','34','YAUYOS'),
('12','05','00','JUNIN'),
('12','05','01','JUNIN'),
('12','05','02','CARHUAMAYO'),
('12','05','03','ONDORES'),
('12','05','04','ULCUMAYO'),
('12','06','00','SATIPO'),
('12','06','01','SATIPO'),
('12','06','02','COVIRIALI'),
('12','06','03','LLAYLLA'),
('12','06','05','PAMPA HERMOSA'),
('12','06','07','RIO NEGRO'),
('12','06','08','RIO TAMBO'),
('12','06','99','MAZAMARI - PANGOA'),
('12','07','00','TARMA'),
('12','07','01','TARMA'),
('12','07','02','ACOBAMBA'),
('12','07','03','HUARICOLCA'),
('12','07','04','HUASAHUASI'),
('12','07','05','LA UNION'),
('12','07','06','PALCA'),
('12','07','07','PALCAMAYO'),
('12','07','08','SAN PEDRO DE CAJAS'),
('12','07','09','TAPO'),
('12','08','00','YAULI'),
('12','08','01','LA OROYA'),
('12','08','02','CHACAPALPA'),
('12','08','03','HUAY-HUAY'),
('12','08','04','MARCAPOMACOCHA'),
('12','08','05','MOROCOCHA'),
('12','08','06','PACCHA'),
('12','08','07','SANTA BARBARA DE CARHUACAYAN'),
('12','08','08','SANTA ROSA DE SACCO'),
('12','08','09','SUITUCANCHA'),
('12','08','10','YAULI'),
('12','09','00','CHUPACA'),
('12','09','01','CHUPACA'),
('12','09','02','AHUAC'),
('12','09','03','CHONGOS BAJO'),
('12','09','04','HUACHAC'),
('12','09','05','HUAMANCACA CHICO'),
('12','09','06','SAN JUAN DE ISCOS'),
('12','09','07','SAN JUAN DE JARPA'),
('12','09','08','TRES DE DICIEMBRE'),
('12','09','09','YANACANCHA'),
('13','00','00','LA LIBERTAD'),
('13','01','00','TRUJILLO'),
('13','01','01','TRUJILLO'),
('13','01','02','EL PORVENIR'),
('13','01','03','FLORENCIA DE MORA'),
('13','01','04','HUANCHACO'),
('13','01','05','LA ESPERANZA'),
('13','01','06','LAREDO'),
('13','01','07','MOCHE'),
('13','01','08','POROTO'),
('13','01','09','SALAVERRY'),
('13','01','10','SIMBAL'),
('13','01','11','VICTOR LARCO HERRERA'),
('13','02','00','ASCOPE'),
('13','02','01','ASCOPE'),
('13','02','02','CHICAMA'),
('13','02','03','CHOCOPE'),
('13','02','04','MAGDALENA DE CAO'),
('13','02','05','PAIJAN'),
('13','02','06','RAZURI'),
('13','02','07','SANTIAGO DE CAO'),
('13','02','08','CASA GRANDE'),
('13','03','00','BOLIVAR'),
('13','03','01','BOLIVAR'),
('13','03','02','BAMBAMARCA'),
('13','03','03','CONDORMARCA'),
('13','03','04','LONGOTEA'),
('13','03','05','UCHUMARCA'),
('13','03','06','UCUNCHA'),
('13','04','00','CHEPEN'),
('13','04','01','CHEPEN'),
('13','04','02','PACANGA'),
('13','04','03','PUEBLO NUEVO'),
('13','05','00','JULCAN'),
('13','05','01','JULCAN'),
('13','05','02','CALAMARCA'),
('13','05','03','CARABAMBA'),
('13','05','04','HUASO'),
('13','06','00','OTUZCO'),
('13','06','01','OTUZCO'),
('13','06','02','AGALLPAMPA'),
('13','06','04','CHARAT'),
('13','06','05','HUARANCHAL'),
('13','06','06','LA CUESTA'),
('13','06','08','MACHE'),
('13','06','10','PARANDAY'),
('13','06','11','SALPO'),
('13','06','13','SINSICAP'),
('13','06','14','USQUIL'),
('13','07','00','PACASMAYO'),
('13','07','01','SAN PEDRO DE LLOC'),
('13','07','02','GUADALUPE'),
('13','07','03','JEQUETEPEQUE'),
('13','07','04','PACASMAYO'),
('13','07','05','SAN JOSE'),
('13','08','00','PATAZ'),
('13','08','01','TAYABAMBA'),
('13','08','02','BULDIBUYO'),
('13','08','03','CHILLIA'),
('13','08','04','HUANCASPATA'),
('13','08','05','HUAYLILLAS'),
('13','08','06','HUAYO'),
('13','08','07','ONGON'),
('13','08','08','PARCOY'),
('13','08','09','PATAZ'),
('13','08','10','PIAS'),
('13','08','11','SANTIAGO DE CHALLAS'),
('13','08','12','TAURIJA'),
('13','08','13','URPAY'),
('13','09','00','SANCHEZ CARRION'),
('13','09','01','HUAMACHUCO'),
('13','09','02','CHUGAY'),
('13','09','03','COCHORCO'),
('13','09','04','CURGOS'),
('13','09','05','MARCABAL'),
('13','09','06','SANAGORAN'),
('13','09','07','SARIN'),
('13','09','08','SARTIMBAMBA'),
('13','10','00','SANTIAGO DE CHUCO'),
('13','10','01','SANTIAGO DE CHUCO'),
('13','10','02','ANGASMARCA'),
('13','10','03','CACHICADAN'),
('13','10','04','MOLLEBAMBA'),
('13','10','05','MOLLEPATA'),
('13','10','06','QUIRUVILCA'),
('13','10','07','SANTA CRUZ DE CHUCA'),
('13','10','08','SITABAMBA'),
('13','11','00','GRAN CHIMU'),
('13','11','01','CASCAS'),
('13','11','02','LUCMA'),
('13','11','03','MARMOT'),
('13','11','04','SAYAPULLO'),
('13','12','00','VIRU'),
('13','12','01','VIRU'),
('13','12','02','CHAO'),
('13','12','03','GUADALUPITO'),
('14','00','00','LAMBAYEQUE'),
('14','01','00','CHICLAYO'),
('14','01','01','CHICLAYO'),
('14','01','02','CHONGOYAPE'),
('14','01','03','ETEN'),
('14','01','04','ETEN PUERTO'),
('14','01','05','JOSE LEONARDO ORTIZ'),
('14','01','06','LA VICTORIA'),
('14','01','07','LAGUNAS'),
('14','01','08','MONSEFU'),
('14','01','09','NUEVA ARICA'),
('14','01','10','OYOTUN'),
('14','01','11','PICSI'),
('14','01','12','PIMENTEL'),
('14','01','13','REQUE'),
('14','01','14','SANTA ROSA'),
('14','01','15','SAÑA'),
('14','01','16','CAYALTI'),
('14','01','17','PATAPO'),
('14','01','18','POMALCA'),
('14','01','19','PUCALA'),
('14','01','20','TUMAN'),
('14','02','00','FERREÑAFE'),
('14','02','01','FERREÑAFE'),
('14','02','02','CAÑARIS'),
('14','02','03','INCAHUASI'),
('14','02','04','MANUEL ANTONIO MESONES MURO'),
('14','02','05','PITIPO'),
('14','02','06','PUEBLO NUEVO'),
('14','03','00','LAMBAYEQUE'),
('14','03','01','LAMBAYEQUE'),
('14','03','02','CHOCHOPE'),
('14','03','03','ILLIMO'),
('14','03','04','JAYANCA'),
('14','03','05','MOCHUMI'),
('14','03','06','MORROPE'),
('14','03','07','MOTUPE'),
('14','03','08','OLMOS'),
('14','03','09','PACORA'),
('14','03','10','SALAS'),
('14','03','11','SAN JOSE'),
('14','03','12','TUCUME'),
('15','00','00','LIMA'),
('15','01','00','LIMA'),
('15','01','01','LIMA'),
('15','01','02','ANCON'),
('15','01','03','ATE'),
('15','01','04','BARRANCO'),
('15','01','05','BREÑA'),
('15','01','06','CARABAYLLO'),
('15','01','07','CHACLACAYO'),
('15','01','08','CHORRILLOS'),
('15','01','09','CIENEGUILLA'),
('15','01','10','COMAS'),
('15','01','11','EL AGUSTINO'),
('15','01','12','INDEPENDENCIA'),
('15','01','13','JESUS MARIA'),
('15','01','14','LA MOLINA'),
('15','01','15','LA VICTORIA'),
('15','01','16','LINCE'),
('15','01','17','LOS OLIVOS'),
('15','01','18','LURIGANCHO'),
('15','01','19','LURIN'),
('15','01','20','MAGDALENA DEL MAR'),
('15','01','21','PUEBLO LIBRE'),
('15','01','22','MIRAFLORES'),
('15','01','23','PACHACAMAC'),
('15','01','24','PUCUSANA'),
('15','01','25','PUENTE PIEDRA'),
('15','01','26','PUNTA HERMOSA'),
('15','01','27','PUNTA NEGRA'),
('15','01','28','RIMAC'),
('15','01','29','SAN BARTOLO'),
('15','01','30','SAN BORJA'),
('15','01','31','SAN ISIDRO'),
('15','01','32','SAN JUAN DE LURIGANCHO'),
('15','01','33','SAN JUAN DE MIRAFLORES'),
('15','01','34','SAN LUIS'),
('15','01','35','SAN MARTIN DE PORRES'),
('15','01','36','SAN MIGUEL'),
('15','01','37','SANTA ANITA'),
('15','01','38','SANTA MARIA DEL MAR'),
('15','01','39','SANTA ROSA'),
('15','01','40','SANTIAGO DE SURCO'),
('15','01','41','SURQUILLO'),
('15','01','42','VILLA EL SALVADOR'),
('15','01','43','VILLA MARIA DEL TRIUNFO'),
('15','02','00','BARRANCA'),
('15','02','01','BARRANCA'),
('15','02','02','PARAMONGA'),
('15','02','03','PATIVILCA'),
('15','02','04','SUPE'),
('15','02','05','SUPE PUERTO'),
('15','03','00','CAJATAMBO'),
('15','03','01','CAJATAMBO'),
('15','03','02','COPA'),
('15','03','03','GORGOR'),
('15','03','04','HUANCAPON'),
('15','03','05','MANAS'),
('15','04','00','CANTA'),
('15','04','01','CANTA'),
('15','04','02','ARAHUAY'),
('15','04','03','HUAMANTANGA'),
('15','04','04','HUAROS'),
('15','04','05','LACHAQUI'),
('15','04','06','SAN BUENAVENTURA'),
('15','04','07','SANTA ROSA DE QUIVES'),
('15','05','00','CAÑETE'),
('15','05','01','SAN VICENTE DE CAÑETE'),
('15','05','02','ASIA'),
('15','05','03','CALANGO'),
('15','05','04','CERRO AZUL'),
('15','05','05','CHILCA'),
('15','05','06','COAYLLO'),
('15','05','07','IMPERIAL'),
('15','05','08','LUNAHUANA'),
('15','05','09','MALA'),
('15','05','10','NUEVO IMPERIAL'),
('15','05','11','PACARAN'),
('15','05','12','QUILMANA'),
('15','05','13','SAN ANTONIO'),
('15','05','14','SAN LUIS'),
('15','05','15','SANTA CRUZ DE FLORES'),
('15','05','16','ZUÑIGA'),
('15','06','00','HUARAL'),
('15','06','01','HUARAL'),
('15','06','02','ATAVILLOS ALTO'),
('15','06','03','ATAVILLOS BAJO'),
('15','06','04','AUCALLAMA'),
('15','06','05','CHANCAY'),
('15','06','06','IHUARI'),
('15','06','07','LAMPIAN'),
('15','06','08','PACARAOS'),
('15','06','09','SAN MIGUEL DE ACOS'),
('15','06','10','SANTA CRUZ DE ANDAMARCA'),
('15','06','11','SUMBILCA'),
('15','06','12','VEINTISIETE DE NOVIEMBRE'),
('15','07','00','HUAROCHIRI'),
('15','07','01','MATUCANA'),
('15','07','02','ANTIOQUIA'),
('15','07','03','CALLAHUANCA'),
('15','07','04','CARAMPOMA'),
('15','07','05','CHICLA'),
('15','07','06','CUENCA'),
('15','07','07','HUACHUPAMPA'),
('15','07','08','HUANZA'),
('15','07','09','HUAROCHIRI'),
('15','07','10','LAHUAYTAMBO'),
('15','07','11','LANGA'),
('15','07','12','LARAOS'),
('15','07','13','MARIATANA'),
('15','07','14','RICARDO PALMA'),
('15','07','15','SAN ANDRES DE TUPICOCHA'),
('15','07','16','SAN ANTONIO'),
('15','07','17','SAN BARTOLOME'),
('15','07','18','SAN DAMIAN'),
('15','07','19','SAN JUAN DE IRIS'),
('15','07','20','SAN JUAN DE TANTARANCHE'),
('15','07','21','SAN LORENZO DE QUINTI'),
('15','07','22','SAN MATEO'),
('15','07','23','SAN MATEO DE OTAO'),
('15','07','24','SAN PEDRO DE CASTA'),
('15','07','25','SAN PEDRO DE HUANCAYRE'),
('15','07','26','SANGALLAYA'),
('15','07','27','SANTA CRUZ DE COCACHACRA'),
('15','07','28','SANTA EULALIA'),
('15','07','29','SANTIAGO DE ANCHUCAYA'),
('15','07','30','SANTIAGO DE TUNA'),
('15','07','31','SANTO DOMINGO DE LOS OLLEROS'),
('15','07','32','SURCO'),
('15','08','00','HUAURA'),
('15','08','01','HUACHO'),
('15','08','02','AMBAR'),
('15','08','03','CALETA DE CARQUIN'),
('15','08','04','CHECRAS'),
('15','08','05','HUALMAY'),
('15','08','06','HUAURA'),
('15','08','07','LEONCIO PRADO'),
('15','08','08','PACCHO'),
('15','08','09','SANTA LEONOR'),
('15','08','10','SANTA MARIA'),
('15','08','11','SAYAN'),
('15','08','12','VEGUETA'),
('15','09','00','OYON'),
('15','09','01','OYON'),
('15','09','02','ANDAJES'),
('15','09','03','CAUJUL'),
('15','09','04','COCHAMARCA'),
('15','09','05','NAVAN'),
('15','09','06','PACHANGARA'),
('15','10','00','YAUYOS'),
('15','10','01','YAUYOS'),
('15','10','02','ALIS'),
('15','10','03','ALLAUCA'),
('15','10','04','AYAVIRI'),
('15','10','05','AZANGARO'),
('15','10','06','CACRA'),
('15','10','07','CARANIA'),
('15','10','08','CATAHUASI'),
('15','10','09','CHOCOS'),
('15','10','10','COCHAS'),
('15','10','11','COLONIA'),
('15','10','12','HONGOS'),
('15','10','13','HUAMPARA'),
('15','10','14','HUANCAYA'),
('15','10','15','HUANGASCAR'),
('15','10','16','HUANTAN'),
('15','10','17','HUAÑEC'),
('15','10','18','LARAOS'),
('15','10','19','LINCHA'),
('15','10','20','MADEAN'),
('15','10','21','MIRAFLORES'),
('15','10','22','OMAS'),
('15','10','23','PUTINZA'),
('15','10','24','QUINCHES'),
('15','10','25','QUINOCAY'),
('15','10','26','SAN JOAQUIN'),
('15','10','27','SAN PEDRO DE PILAS'),
('15','10','28','TANTA'),
('15','10','29','TAURIPAMPA'),
('15','10','30','TOMAS'),
('15','10','31','TUPE'),
('15','10','32','VIÑAC'),
('15','10','33','VITIS'),
('16','00','00','LORETO'),
('16','01','00','MAYNAS'),
('16','01','01','IQUITOS'),
('16','01','02','ALTO NANAY'),
('16','01','03','FERNANDO LORES'),
('16','01','04','INDIANA'),
('16','01','05','LAS AMAZONAS'),
('16','01','06','MAZAN'),
('16','01','07','NAPO'),
('16','01','08','PUNCHANA'),
('16','01','09','PUTUMAYO'),
('16','01','10','TORRES CAUSANA'),
('16','01','12','BELEN'),
('16','01','13','SAN JUAN BAUTISTA'),
('16','01','14','TENIENTE MANUEL CLAVERO'),
('16','02','00','ALTO AMAZONAS'),
('16','02','01','YURIMAGUAS'),
('16','02','02','BALSAPUERTO'),
('16','02','05','JEBEROS'),
('16','02','06','LAGUNAS'),
('16','02','10','SANTA CRUZ'),
('16','02','11','TENIENTE CESAR LOPEZ ROJAS'),
('16','03','00','LORETO'),
('16','03','01','NAUTA'),
('16','03','02','PARINARI'),
('16','03','03','TIGRE'),
('16','03','04','TROMPETEROS'),
('16','03','05','URARINAS'),
('16','04','00','MARISCAL RAMON CASTILLA'),
('16','04','01','RAMON CASTILLA'),
('16','04','02','PEBAS'),
('16','04','03','YAVARI'),
('16','04','04','SAN PABLO'),
('16','05','00','REQUENA'),
('16','05','01','REQUENA'),
('16','05','02','ALTO TAPICHE'),
('16','05','03','CAPELO'),
('16','05','04','EMILIO SAN MARTIN'),
('16','05','05','MAQUIA'),
('16','05','06','PUINAHUA'),
('16','05','07','SAQUENA'),
('16','05','08','SOPLIN'),
('16','05','09','TAPICHE'),
('16','05','10','JENARO HERRERA'),
('16','05','11','YAQUERANA'),
('16','06','00','UCAYALI'),
('16','06','01','CONTAMANA'),
('16','06','02','INAHUAYA'),
('16','06','03','PADRE MARQUEZ'),
('16','06','04','PAMPA HERMOSA'),
('16','06','05','SARAYACU'),
('16','06','06','VARGAS GUERRA'),
('16','07','00','DATEM DEL MARAÑON'),
('16','07','01','BARRANCA'),
('16','07','02','CAHUAPANAS'),
('16','07','03','MANSERICHE'),
('16','07','04','MORONA'),
('16','07','05','PASTAZA'),
('16','07','06','ANDOAS'),
('17','00','00','MADRE DE DIOS'),
('17','01','00','TAMBOPATA'),
('17','01','01','TAMBOPATA'),
('17','01','02','INAMBARI'),
('17','01','03','LAS PIEDRAS'),
('17','01','04','LABERINTO'),
('17','02','00','MANU'),
('17','02','01','MANU'),
('17','02','02','FITZCARRALD'),
('17','02','03','MADRE DE DIOS'),
('17','02','04','HUEPETUHE'),
('17','03','00','TAHUAMANU'),
('17','03','01','IÑAPARI'),
('17','03','02','IBERIA'),
('17','03','03','TAHUAMANU'),
('18','00','00','MOQUEGUA'),
('18','01','00','MARISCAL NIETO'),
('18','01','01','MOQUEGUA'),
('18','01','02','CARUMAS'),
('18','01','03','CUCHUMBAYA'),
('18','01','04','SAMEGUA'),
('18','01','05','SAN CRISTOBAL'),
('18','01','06','TORATA'),
('18','02','00','GENERAL SANCHEZ CERRO'),
('18','02','01','OMATE'),
('18','02','02','CHOJATA'),
('18','02','03','COALAQUE'),
('18','02','04','ICHUÑA'),
('18','02','05','LA CAPILLA'),
('18','02','06','LLOQUE'),
('18','02','07','MATALAQUE'),
('18','02','08','PUQUINA'),
('18','02','09','QUINISTAQUILLAS'),
('18','02','10','UBINAS'),
('18','02','11','YUNGA'),
('18','03','00','ILO'),
('18','03','01','ILO'),
('18','03','02','EL ALGARROBAL'),
('18','03','03','PACOCHA'),
('19','00','00','PASCO'),
('19','01','00','PASCO'),
('19','01','01','CHAUPIMARCA'),
('19','01','02','HUACHON'),
('19','01','03','HUARIACA'),
('19','01','04','HUAYLLAY'),
('19','01','05','NINACACA'),
('19','01','06','PALLANCHACRA'),
('19','01','07','PAUCARTAMBO'),
('19','01','08','SAN FRANCISCO DE ASIS DE YARUSYACAN'),
('19','01','09','SIMON BOLIVAR'),
('19','01','10','TICLACAYAN'),
('19','01','11','TINYAHUARCO'),
('19','01','12','VICCO'),
('19','01','13','YANACANCHA'),
('19','02','00','DANIEL ALCIDES CARRION'),
('19','02','01','YANAHUANCA'),
('19','02','02','CHACAYAN'),
('19','02','03','GOYLLARISQUIZGA'),
('19','02','04','PAUCAR'),
('19','02','05','SAN PEDRO DE PILLAO'),
('19','02','06','SANTA ANA DE TUSI'),
('19','02','07','TAPUC'),
('19','02','08','VILCABAMBA'),
('19','03','00','OXAPAMPA'),
('19','03','01','OXAPAMPA'),
('19','03','02','CHONTABAMBA'),
('19','03','03','HUANCABAMBA'),
('19','03','04','PALCAZU'),
('19','03','05','POZUZO'),
('19','03','06','PUERTO BERMUDEZ'),
('19','03','07','VILLA RICA'),
('19','03','08','CONSTITUCION'),
('20','00','00','PIURA'),
('20','01','00','PIURA'),
('20','01','01','PIURA'),
('20','01','04','CASTILLA'),
('20','01','05','CATACAOS'),
('20','01','07','CURA MORI'),
('20','01','08','EL TALLAN'),
('20','01','09','LA ARENA'),
('20','01','10','LA UNION'),
('20','01','11','LAS LOMAS'),
('20','01','14','TAMBO GRANDE'),
('20','02','00','AYABACA'),
('20','02','01','AYABACA'),
('20','02','02','FRIAS'),
('20','02','03','JILILI'),
('20','02','04','LAGUNAS'),
('20','02','05','MONTERO'),
('20','02','06','PACAIPAMPA'),
('20','02','07','PAIMAS'),
('20','02','08','SAPILLICA'),
('20','02','09','SICCHEZ'),
('20','02','10','SUYO'),
('20','03','00','HUANCABAMBA'),
('20','03','01','HUANCABAMBA'),
('20','03','02','CANCHAQUE'),
('20','03','03','EL CARMEN DE LA FRONTERA'),
('20','03','04','HUARMACA'),
('20','03','05','LALAQUIZ'),
('20','03','06','SAN MIGUEL DE EL FAIQUE'),
('20','03','07','SONDOR'),
('20','03','08','SONDORILLO'),
('20','04','00','MORROPON'),
('20','04','01','CHULUCANAS'),
('20','04','02','BUENOS AIRES'),
('20','04','03','CHALACO'),
('20','04','04','LA MATANZA'),
('20','04','05','MORROPON'),
('20','04','06','SALITRAL'),
('20','04','07','SAN JUAN DE BIGOTE'),
('20','04','08','SANTA CATALINA DE MOSSA'),
('20','04','09','SANTO DOMINGO'),
('20','04','10','YAMANGO'),
('20','05','00','PAITA'),
('20','05','01','PAITA'),
('20','05','02','AMOTAPE'),
('20','05','03','ARENAL'),
('20','05','04','COLAN'),
('20','05','05','LA HUACA'),
('20','05','06','TAMARINDO'),
('20','05','07','VICHAYAL'),
('20','06','00','SULLANA'),
('20','06','01','SULLANA'),
('20','06','02','BELLAVISTA'),
('20','06','03','IGNACIO ESCUDERO'),
('20','06','04','LANCONES'),
('20','06','05','MARCAVELICA'),
('20','06','06','MIGUEL CHECA'),
('20','06','07','QUERECOTILLO'),
('20','06','08','SALITRAL'),
('20','07','00','TALARA'),
('20','07','01','PARIÑAS'),
('20','07','02','EL ALTO'),
('20','07','03','LA BREA'),
('20','07','04','LOBITOS'),
('20','07','05','LOS ORGANOS'),
('20','07','06','MANCORA'),
('20','08','00','SECHURA'),
('20','08','01','SECHURA'),
('20','08','02','BELLAVISTA DE LA UNION'),
('20','08','03','BERNAL'),
('20','08','04','CRISTO NOS VALGA'),
('20','08','05','VICE'),
('20','08','06','RINCONADA LLICUAR'),
('21','00','00','PUNO'),
('21','01','00','PUNO'),
('21','01','01','PUNO'),
('21','01','02','ACORA'),
('21','01','03','AMANTANI'),
('21','01','04','ATUNCOLLA'),
('21','01','05','CAPACHICA'),
('21','01','06','CHUCUITO'),
('21','01','07','COATA'),
('21','01','08','HUATA'),
('21','01','09','MAÑAZO'),
('21','01','10','PAUCARCOLLA'),
('21','01','11','PICHACANI'),
('21','01','12','PLATERIA'),
('21','01','13','SAN ANTONIO'),
('21','01','14','TIQUILLACA'),
('21','01','15','VILQUE'),
('21','02','00','AZANGARO'),
('21','02','01','AZANGARO'),
('21','02','02','ACHAYA'),
('21','02','03','ARAPA'),
('21','02','04','ASILLO'),
('21','02','05','CAMINACA'),
('21','02','06','CHUPA'),
('21','02','07','JOSE DOMINGO CHOQUEHUANCA'),
('21','02','08','MUÑANI'),
('21','02','09','POTONI'),
('21','02','10','SAMAN'),
('21','02','11','SAN ANTON'),
('21','02','12','SAN JOSE'),
('21','02','13','SAN JUAN DE SALINAS'),
('21','02','14','SANTIAGO DE PUPUJA'),
('21','02','15','TIRAPATA'),
('21','03','00','CARABAYA'),
('21','03','01','MACUSANI'),
('21','03','02','AJOYANI'),
('21','03','03','AYAPATA'),
('21','03','04','COASA'),
('21','03','05','CORANI'),
('21','03','06','CRUCERO'),
('21','03','07','ITUATA'),
('21','03','08','OLLACHEA'),
('21','03','09','SAN GABAN'),
('21','03','10','USICAYOS'),
('21','04','00','CHUCUITO'),
('21','04','01','JULI'),
('21','04','02','DESAGUADERO'),
('21','04','03','HUACULLANI'),
('21','04','04','KELLUYO'),
('21','04','05','PISACOMA'),
('21','04','06','POMATA'),
('21','04','07','ZEPITA'),
('21','05','00','EL COLLAO'),
('21','05','01','ILAVE'),
('21','05','02','CAPAZO'),
('21','05','03','PILCUYO'),
('21','05','04','SANTA ROSA'),
('21','05','05','CONDURIRI'),
('21','06','00','HUANCANE'),
('21','06','01','HUANCANE'),
('21','06','02','COJATA'),
('21','06','03','HUATASANI'),
('21','06','04','INCHUPALLA'),
('21','06','05','PUSI'),
('21','06','06','ROSASPATA'),
('21','06','07','TARACO'),
('21','06','08','VILQUE CHICO'),
('21','07','00','LAMPA'),
('21','07','01','LAMPA'),
('21','07','02','CABANILLA'),
('21','07','03','CALAPUJA'),
('21','07','04','NICASIO'),
('21','07','05','OCUVIRI'),
('21','07','06','PALCA'),
('21','07','07','PARATIA'),
('21','07','08','PUCARA'),
('21','07','09','SANTA LUCIA'),
('21','07','10','VILAVILA'),
('21','08','00','MELGAR'),
('21','08','01','AYAVIRI'),
('21','08','02','ANTAUTA'),
('21','08','03','CUPI'),
('21','08','04','LLALLI'),
('21','08','05','MACARI'),
('21','08','06','NUÑOA'),
('21','08','07','ORURILLO'),
('21','08','08','SANTA ROSA'),
('21','08','09','UMACHIRI'),
('21','09','00','MOHO'),
('21','09','01','MOHO'),
('21','09','02','CONIMA'),
('21','09','03','HUAYRAPATA'),
('21','09','04','TILALI'),
('21','10','00','SAN ANTONIO DE PUTINA'),
('21','10','01','PUTINA'),
('21','10','02','ANANEA'),
('21','10','03','PEDRO VILCA APAZA'),
('21','10','04','QUILCAPUNCU'),
('21','10','05','SINA'),
('21','11','00','SAN ROMAN'),
('21','11','01','JULIACA'),
('21','11','02','CABANA'),
('21','11','03','CABANILLAS'),
('21','11','04','CARACOTO'),
('21','12','00','SANDIA'),
('21','12','01','SANDIA'),
('21','12','02','CUYOCUYO'),
('21','12','03','LIMBANI'),
('21','12','04','PATAMBUCO'),
('21','12','05','PHARA'),
('21','12','06','QUIACA'),
('21','12','07','SAN JUAN DEL ORO'),
('21','12','08','YANAHUAYA'),
('21','12','09','ALTO INAMBARI'),
('21','12','10','SAN PEDRO DE PUTINA PUNCO'),
('21','13','00','YUNGUYO'),
('21','13','01','YUNGUYO'),
('21','13','02','ANAPIA'),
('21','13','03','COPANI'),
('21','13','04','CUTURAPI'),
('21','13','05','OLLARAYA'),
('21','13','06','TINICACHI'),
('21','13','07','UNICACHI'),
('22','00','00','SAN MARTIN'),
('22','01','00','MOYOBAMBA'),
('22','01','01','MOYOBAMBA'),
('22','01','02','CALZADA'),
('22','01','03','HABANA'),
('22','01','04','JEPELACIO'),
('22','01','05','SORITOR'),
('22','01','06','YANTALO'),
('22','02','00','BELLAVISTA'),
('22','02','01','BELLAVISTA'),
('22','02','02','ALTO BIAVO'),
('22','02','03','BAJO BIAVO'),
('22','02','04','HUALLAGA'),
('22','02','05','SAN PABLO'),
('22','02','06','SAN RAFAEL'),
('22','03','00','EL DORADO'),
('22','03','01','SAN JOSE DE SISA'),
('22','03','02','AGUA BLANCA'),
('22','03','03','SAN MARTIN'),
('22','03','04','SANTA ROSA'),
('22','03','05','SHATOJA'),
('22','04','00','HUALLAGA'),
('22','04','01','SAPOSOA'),
('22','04','02','ALTO SAPOSOA'),
('22','04','03','EL ESLABON'),
('22','04','04','PISCOYACU'),
('22','04','05','SACANCHE'),
('22','04','06','TINGO DE SAPOSOA'),
('22','05','00','LAMAS'),
('22','05','01','LAMAS'),
('22','05','02','ALONSO DE ALVARADO'),
('22','05','03','BARRANQUITA'),
('22','05','04','CAYNARACHI'),
('22','05','05','CUÑUMBUQUI'),
('22','05','06','PINTO RECODO'),
('22','05','07','RUMISAPA'),
('22','05','08','SAN ROQUE DE CUMBAZA'),
('22','05','09','SHANAO'),
('22','05','10','TABALOSOS'),
('22','05','11','ZAPATERO'),
('22','06','00','MARISCAL CACERES'),
('22','06','01','JUANJUI'),
('22','06','02','CAMPANILLA'),
('22','06','03','HUICUNGO'),
('22','06','04','PACHIZA'),
('22','06','05','PAJARILLO'),
('22','07','00','PICOTA'),
('22','07','01','PICOTA'),
('22','07','02','BUENOS AIRES'),
('22','07','03','CASPISAPA'),
('22','07','04','PILLUANA'),
('22','07','05','PUCACACA'),
('22','07','06','SAN CRISTOBAL'),
('22','07','07','SAN HILARION'),
('22','07','08','SHAMBOYACU'),
('22','07','09','TINGO DE PONASA'),
('22','07','10','TRES UNIDOS'),
('22','08','00','RIOJA'),
('22','08','01','RIOJA'),
('22','08','02','AWAJUN'),
('22','08','03','ELIAS SOPLIN VARGAS'),
('22','08','04','NUEVA CAJAMARCA'),
('22','08','05','PARDO MIGUEL'),
('22','08','06','POSIC'),
('22','08','07','SAN FERNANDO'),
('22','08','08','YORONGOS'),
('22','08','09','YURACYACU'),
('22','09','00','SAN MARTIN'),
('22','09','01','TARAPOTO'),
('22','09','02','ALBERTO LEVEAU'),
('22','09','03','CACATACHI'),
('22','09','04','CHAZUTA'),
('22','09','05','CHIPURANA'),
('22','09','06','EL PORVENIR'),
('22','09','07','HUIMBAYOC'),
('22','09','08','JUAN GUERRA'),
('22','09','09','LA BANDA DE SHILCAYO'),
('22','09','10','MORALES'),
('22','09','11','PAPAPLAYA'),
('22','09','12','SAN ANTONIO'),
('22','09','13','SAUCE'),
('22','09','14','SHAPAJA'),
('22','10','00','TOCACHE'),
('22','10','01','TOCACHE'),
('22','10','02','NUEVO PROGRESO'),
('22','10','03','POLVORA'),
('22','10','04','SHUNTE'),
('22','10','05','UCHIZA'),
('23','00','00','TACNA'),
('23','01','00','TACNA'),
('23','01','01','TACNA'),
('23','01','02','ALTO DE LA ALIANZA'),
('23','01','03','CALANA'),
('23','01','04','CIUDAD NUEVA'),
('23','01','05','INCLAN'),
('23','01','06','PACHIA'),
('23','01','07','PALCA'),
('23','01','08','POCOLLAY'),
('23','01','09','SAMA'),
('23','01','10','CORONEL GREGORIO ALBARRACIN LANCHIPA'),
('23','02','00','CANDARAVE'),
('23','02','01','CANDARAVE'),
('23','02','02','CAIRANI'),
('23','02','03','CAMILACA'),
('23','02','04','CURIBAYA'),
('23','02','05','HUANUARA'),
('23','02','06','QUILAHUANI'),
('23','03','00','JORGE BASADRE'),
('23','03','01','LOCUMBA'),
('23','03','02','ILABAYA'),
('23','03','03','ITE'),
('23','04','00','TARATA'),
('23','04','01','TARATA'),
('23','04','02','HEROES ALBARRACIN'),
('23','04','03','ESTIQUE'),
('23','04','04','ESTIQUE-PAMPA'),
('23','04','05','SITAJARA'),
('23','04','06','SUSAPAYA'),
('23','04','07','TARUCACHI'),
('23','04','08','TICACO'),
('24','00','00','TUMBES'),
('24','01','00','TUMBES'),
('24','01','01','TUMBES'),
('24','01','02','CORRALES'),
('24','01','03','LA CRUZ'),
('24','01','04','PAMPAS DE HOSPITAL'),
('24','01','05','SAN JACINTO'),
('24','01','06','SAN JUAN DE LA VIRGEN'),
('24','02','00','CONTRALMIRANTE VILLAR'),
('24','02','01','ZORRITOS'),
('24','02','02','CASITAS'),
('24','02','03','CANOAS DE PUNTA SAL'),
('24','03','00','ZARUMILLA'),
('24','03','01','ZARUMILLA'),
('24','03','02','AGUAS VERDES'),
('24','03','03','MATAPALO'),
('24','03','04','PAPAYAL'),
('25','00','00','UCAYALI'),
('25','01','00','CORONEL PORTILLO'),
('25','01','01','CALLERIA'),
('25','01','02','CAMPOVERDE'),
('25','01','03','IPARIA'),
('25','01','04','MASISEA'),
('25','01','05','YARINACOCHA'),
('25','01','06','NUEVA REQUENA'),
('25','01','07','MANANTAY'),
('25','02','00','ATALAYA'),
('25','02','01','RAYMONDI'),
('25','02','02','SEPAHUA'),
('25','02','03','TAHUANIA'),
('25','02','04','YURUA'),
('25','03','00','PADRE ABAD'),
('25','03','01','PADRE ABAD'),
('25','03','02','IRAZOLA'),
('25','03','03','CURIMANA'),
('25','04','00','PURUS'),
('25','04','01','PURUS');

/*Table structure for table `crm_user` */

DROP TABLE IF EXISTS `crm_user`;

CREATE TABLE `crm_user` (
  `userID` int(6) unsigned NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `state` tinyint(1) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `IDX_userName` (`userName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `crm_user` */

insert  into `crm_user`(`userID`,`userName`,`password`,`firstName`,`lastName`,`email`,`state`) values 
(1,'martinbailetti','clallal','Martín','Bbbb','maama@jfjfj.com',1);

/*Table structure for table `ubg_city` */

DROP TABLE IF EXISTS `ubg_city`;

CREATE TABLE `ubg_city` (
  `cityID` int(6) unsigned NOT NULL,
  `countryID` smallint(4) unsigned NOT NULL,
  `cityName` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`cityID`),
  KEY `countryID` (`countryID`),
  CONSTRAINT `ubg_city_ibfk_1` FOREIGN KEY (`countryID`) REFERENCES `ubg_country` (`countryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ubg_city` */

insert  into `ubg_city`(`cityID`,`countryID`,`cityName`,`active`) values 
(1,1,'CHACHAPOYAS',1),
(2,1,'BAGUA',1),
(3,1,'BONGARA',1),
(4,1,'CONDORCANQUI',1),
(5,1,'LUYA',1),
(6,1,'RODRIGUEZ DE MENDOZA',1),
(7,1,'UTCUBAMBA',1),
(8,2,'HUARAZ',1),
(9,2,'AIJA',1),
(10,2,'ANTONIO RAYMONDI',1),
(11,2,'ASUNCION',1),
(12,2,'BOLOGNESI',1),
(13,2,'CARHUAZ',1),
(14,2,'CARLOS FERMIN FITZCARRALD',1),
(15,2,'CASMA',1),
(16,2,'CORONGO',1),
(17,2,'HUARI',1),
(18,2,'HUARMEY',1),
(19,2,'HUAYLAS',1),
(20,2,'MARISCAL LUZURIAGA',1),
(21,2,'OCROS',1),
(22,2,'PALLASCA',1),
(23,2,'POMABAMBA',1),
(24,2,'RECUAY',1),
(25,2,'SANTA',1),
(26,2,'SIHUAS',1),
(27,2,'YUNGAY',1),
(28,3,'ABANCAY',1),
(29,3,'ANDAHUAYLAS',1),
(30,3,'ANTABAMBA',1),
(31,3,'AYMARAES',1),
(32,3,'COTABAMBAS',1),
(33,3,'CHINCHEROS',1),
(34,3,'GRAU',1),
(35,4,'AREQUIPA',1),
(36,4,'CAMANA',1),
(37,4,'CARAVELI',1),
(38,4,'CASTILLA',1),
(39,4,'CAYLLOMA',1),
(40,4,'CONDESUYOS',1),
(41,4,'ISLAY',1),
(42,4,'LA UNION',1),
(43,5,'HUAMANGA',1),
(44,5,'CANGALLO',1),
(45,5,'HUANCA SANCOS',1),
(46,5,'HUANTA',1),
(47,5,'LA MAR',1),
(48,5,'LUCANAS',1),
(49,5,'PARINACOCHAS',1),
(50,5,'PAUCAR DEL SARA SARA',1),
(51,5,'SUCRE',1),
(52,5,'VICTOR FAJARDO',1),
(53,5,'VILCAS HUAMAN',1),
(54,6,'CAJAMARCA',1),
(55,6,'CAJABAMBA',1),
(56,6,'CELENDIN',1),
(57,6,'CHOTA',1),
(58,6,'CONTUMAZA',1),
(59,6,'CUTERVO',1),
(60,6,'HUALGAYOC',1),
(61,6,'JAEN',1),
(62,6,'SAN IGNACIO',1),
(63,6,'SAN MARCOS',1),
(64,6,'SAN MIGUEL',1),
(65,6,'SAN PABLO',1),
(66,6,'SANTA CRUZ',1),
(67,7,'CALLAO',1),
(68,8,'CUSCO',1),
(69,8,'ACOMAYO',1),
(70,8,'ANTA',1),
(71,8,'CALCA',1),
(72,8,'CANAS',1),
(73,8,'CANCHIS',1),
(74,8,'CHUMBIVILCAS',1),
(75,8,'ESPINAR',1),
(76,8,'LA CONVENCION',1),
(77,8,'PARURO',1),
(78,8,'PAUCARTAMBO',1),
(79,8,'QUISPICANCHI',1),
(80,8,'URUBAMBA',1),
(81,9,'HUANCAVELICA',1),
(82,9,'ACOBAMBA',1),
(83,9,'ANGARAES',1),
(84,9,'CASTROVIRREYNA',1),
(85,9,'CHURCAMPA',1),
(86,9,'HUAYTARA',1),
(87,9,'TAYACAJA',1),
(88,10,'HUANUCO',1),
(89,10,'AMBO',1),
(90,10,'DOS DE MAYO',1),
(91,10,'HUACAYBAMBA',1),
(92,10,'HUAMALIES',1),
(93,10,'LEONCIO PRADO',1),
(94,10,'MARAÑON',1),
(95,10,'PACHITEA',1),
(96,10,'PUERTO INCA',1),
(97,10,'LAURICOCHA',1),
(98,10,'YAROWILCA',1),
(99,11,'ICA',1),
(100,11,'CHINCHA',1),
(101,11,'NAZCA',1),
(102,11,'PALPA',1),
(103,11,'PISCO',1),
(104,12,'HUANCAYO',1),
(105,12,'CONCEPCION',1),
(106,12,'CHANCHAMAYO',1),
(107,12,'JAUJA',1),
(108,12,'JUNIN',1),
(109,12,'SATIPO',1),
(110,12,'TARMA',1),
(111,12,'YAULI',1),
(112,12,'CHUPACA',1),
(113,13,'TRUJILLO',1),
(114,13,'ASCOPE',1),
(115,13,'BOLIVAR',1),
(116,13,'CHEPEN',1),
(117,13,'JULCAN',1),
(118,13,'OTUZCO',1),
(119,13,'PACASMAYO',1),
(120,13,'PATAZ',1),
(121,13,'SANCHEZ CARRION',1),
(122,13,'SANTIAGO DE CHUCO',1),
(123,13,'GRAN CHIMU',1),
(124,13,'VIRU',1),
(125,14,'CHICLAYO',1),
(126,14,'FERREÑAFE',1),
(127,14,'LAMBAYEQUE',1),
(128,15,'LIMA',1),
(129,15,'BARRANCA',1),
(130,15,'CAJATAMBO',1),
(131,15,'CANTA',1),
(132,15,'CAÑETE',1),
(133,15,'HUARAL',1),
(134,15,'HUAROCHIRI',1),
(135,15,'HUAURA',1),
(136,15,'OYON',1),
(137,15,'YAUYOS',1),
(138,16,'MAYNAS',1),
(139,16,'ALTO AMAZONAS',1),
(140,16,'LORETO',1),
(141,16,'MARISCAL RAMON CASTILLA',1),
(142,16,'REQUENA',1),
(143,16,'UCAYALI',1),
(144,16,'DATEM DEL MARAÑON',1),
(145,17,'TAMBOPATA',1),
(146,17,'MANU',1),
(147,17,'TAHUAMANU',1),
(148,18,'MARISCAL NIETO',1),
(149,18,'GENERAL SANCHEZ CERRO',1),
(150,18,'ILO',1),
(151,19,'PASCO',1),
(152,19,'DANIEL ALCIDES CARRION',1),
(153,19,'OXAPAMPA',1),
(154,20,'PIURA',1),
(155,20,'AYABACA',1),
(156,20,'HUANCABAMBA',1),
(157,20,'MORROPON',1),
(158,20,'PAITA',1),
(159,20,'SULLANA',1),
(160,20,'TALARA',1),
(161,20,'SECHURA',1),
(162,21,'PUNO',1),
(163,21,'AZANGARO',1),
(164,21,'CARABAYA',1),
(165,21,'CHUCUITO',1),
(166,21,'EL COLLAO',1),
(167,21,'HUANCANE',1),
(168,21,'LAMPA',1),
(169,21,'MELGAR',1),
(170,21,'MOHO',1),
(171,21,'SAN ANTONIO DE PUTINA',1),
(172,21,'SAN ROMAN',1),
(173,21,'SANDIA',1),
(174,21,'YUNGUYO',1),
(175,22,'MOYOBAMBA',1),
(176,22,'BELLAVISTA',1),
(177,22,'EL DORADO',1),
(178,22,'HUALLAGA',1),
(179,22,'LAMAS',1),
(180,22,'MARISCAL CACERES',1),
(181,22,'PICOTA',1),
(182,22,'RIOJA',1),
(183,22,'SAN MARTIN',1),
(184,22,'TOCACHE',1),
(185,23,'TACNA',1),
(186,23,'CANDARAVE',1),
(187,23,'JORGE BASADRE',1),
(188,23,'TARATA',1),
(189,24,'TUMBES',1),
(190,24,'CONTRALMIRANTE VILLAR',1),
(191,24,'ZARUMILLA',1),
(192,25,'CORONEL PORTILLO',1),
(193,25,'ATALAYA',1),
(194,25,'PADRE ABAD',1),
(195,25,'PURUS',1);

/*Table structure for table `ubg_country` */

DROP TABLE IF EXISTS `ubg_country`;

CREATE TABLE `ubg_country` (
  `countryID` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `countryName` varchar(80) NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`countryID`,`countryCode`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=latin1;

/*Data for the table `ubg_country` */

insert  into `ubg_country`(`countryID`,`countryCode`,`countryName`,`active`) values 
(1,'AD','Andorra',1),
(2,'AE','Emiratos Árabes Unidos',1),
(3,'AF','Afganistán',1),
(4,'AG','Antigua y Barbuda',1),
(5,'AI','Anguila',1),
(6,'AL','Albania',1),
(7,'AM','Armenia',1),
(8,'AN','Antillas Neerlandesas',1),
(9,'AO','Angola',1),
(10,'AQ','Antártida',1),
(11,'AR','Argentina',1),
(12,'AS','Samoa Americana',1),
(13,'AT','Austria',1),
(14,'AU','Australia',1),
(15,'AW','Aruba',1),
(16,'AX','Islas Áland',1),
(17,'AZ','Azerbaiyán',1),
(18,'BA','Bosnia y Herzegovina',1),
(19,'BB','Barbados',1),
(20,'BD','Bangladesh',1),
(21,'BE','Bélgica',1),
(22,'BF','Burkina Faso',1),
(23,'BG','Bulgaria',1),
(24,'BH','Bahréin',1),
(25,'BI','Burundi',1),
(26,'BJ','Benin',1),
(27,'BL','San Bartolomé',1),
(28,'BM','Bermudas',1),
(29,'BN','Brunéi',1),
(30,'BO','Bolivia',1),
(31,'BR','Brasil',1),
(32,'BS','Bahamas',1),
(33,'BT','Bhután',1),
(34,'BV','Isla Bouvet',1),
(35,'BW','Botsuana',1),
(36,'BY','Belarús',1),
(37,'BZ','Belice',1),
(38,'CA','Canadá',1),
(39,'CC','Islas Cocos',1),
(40,'CF','República Centro-Africana',1),
(41,'CG','Congo',1),
(42,'CH','Suiza',1),
(43,'CI','Costa de Marfil',1),
(44,'CK','Islas Cook',1),
(45,'CL','Chile',1),
(46,'CM','Camerún',1),
(47,'CN','China',1),
(48,'CO','Colombia',1),
(49,'CR','Costa Rica',1),
(50,'CU','Cuba',1),
(51,'CV','Cabo Verde',1),
(52,'CX','Islas Christmas',1),
(53,'CY','Chipre',1),
(54,'CZ','República Checa',1),
(55,'DE','Alemania',1),
(56,'DJ','Yibuti',1),
(57,'DK','Dinamarca',1),
(58,'DM','Domínica',1),
(59,'DO','República Dominicana',1),
(60,'DZ','Argel',1),
(61,'EC','Ecuador',1),
(62,'EE','Estonia',1),
(63,'EG','Egipto',1),
(64,'EH','Sahara Occidental',1),
(65,'ER','Eritrea',1),
(66,'ES','España',1),
(67,'ET','Etiopía',1),
(68,'FI','Finlandia',1),
(69,'FJ','Fiji',1),
(70,'FK','Islas Malvinas',1),
(71,'FM','Micronesia',1),
(72,'FO','Islas Faroe',1),
(73,'FR','Francia',1),
(74,'GA','Gabón',1),
(75,'GB','Reino Unido',1),
(76,'GD','Granada',1),
(77,'GE','Georgia',1),
(78,'GF','Guayana Francesa',1),
(79,'GG','Guernsey',1),
(80,'GH','Ghana',1),
(81,'GI','Gibraltar',1),
(82,'GL','Groenlandia',1),
(83,'GM','Gambia',1),
(84,'GN','Guinea',1),
(85,'GP','Guadalupe',1),
(86,'GQ','Guinea Ecuatorial',1),
(87,'GR','Grecia',1),
(88,'GS','Georgia del Sur e Islas Sandwich del Sur',1),
(89,'GT','Guatemala',1),
(90,'GU','Guam',1),
(91,'GW','Guinea-Bissau',1),
(92,'GY','Guayana',1),
(93,'HK','Hong Kong',1),
(94,'HM','Islas Heard y McDonald',1),
(95,'HN','Honduras',1),
(96,'HR','Croacia',1),
(97,'HT','Haití',1),
(98,'HU','Hungría',1),
(99,'ID','Indonesia',1),
(100,'IE','Irlanda',1),
(101,'IL','Israel',1),
(102,'IM','Isla de Man',1),
(103,'IN','India',1),
(104,'IO','Territorio Británico del Océano Índico',1),
(105,'IQ','Irak',1),
(106,'IR','Irán',1),
(107,'IS','Islandia',1),
(108,'IT','Italia',1),
(109,'JE','Jersey',1),
(110,'JM','Jamaica',1),
(111,'JO','Jordania',1),
(112,'JP','Japón',1),
(113,'KE','Kenia',1),
(114,'KG','Kirguistán',1),
(115,'KH','Camboya',1),
(116,'KI','Kiribati',1),
(117,'KM','Comoros',1),
(118,'KN','San Cristóbal y Nieves',1),
(119,'KP','Corea del Norte',1),
(120,'KR','Corea del Sur',1),
(121,'KW','Kuwait',1),
(122,'KY','Islas Caimán',1),
(123,'KZ','Kazajstán',1),
(124,'LA','Laos',1),
(125,'LB','Líbano',1),
(126,'LC','Santa Lucía',1),
(127,'LI','Liechtenstein',1),
(128,'LK','Sri Lanka',1),
(129,'LR','Liberia',1),
(130,'LS','Lesotho',1),
(131,'LT','Lituania',1),
(132,'LU','Luxemburgo',1),
(133,'LV','Letonia',1),
(134,'LY','Libia',1),
(135,'MA','Marruecos',1),
(136,'MC','Mónaco',1),
(137,'MD','Moldova',1),
(138,'ME','Montenegro',1),
(139,'MG','Madagascar',1),
(140,'MH','Islas Marshall',1),
(141,'MK','Macedonia',1),
(142,'ML','Mali',1),
(143,'MM','Myanmar',1),
(144,'MN','Mongolia',1),
(145,'MO','Macao',1),
(146,'MQ','Martinica',1),
(147,'MR','Mauritania',1),
(148,'MS','Montserrat',1),
(149,'MT','Malta',1),
(150,'MU','Mauricio',1),
(151,'MV','Maldivas',1),
(152,'MW','Malawi',1),
(153,'MX','México',1),
(154,'MY','Malasia',1),
(155,'MZ','Mozambique',1),
(156,'NA','Namibia',1),
(157,'NC','Nueva Caledonia',1),
(158,'NE','Níger',1),
(159,'NF','Islas Norkfolk',1),
(160,'NG','Nigeria',1),
(161,'NI','Nicaragua',1),
(162,'NL','Países Bajos',1),
(163,'NO','Noruega',1),
(164,'NP','Nepal',1),
(165,'NR','Nauru',1),
(166,'NU','Niue',1),
(167,'NZ','Nueva Zelanda',1),
(168,'OM','Omán',1),
(169,'PA','Panamá',1),
(170,'PE','Perú',1),
(171,'PF','Polinesia Francesa',1),
(172,'PG','Papúa Nueva Guinea',1),
(173,'PH','Filipinas',1),
(174,'PK','Pakistán',1),
(175,'PL','Polonia',1),
(176,'PM','San Pedro y Miquelón',1),
(177,'PN','Islas Pitcairn',1),
(178,'PR','Puerto Rico',1),
(179,'PS','Palestina',1),
(180,'PT','Portugal',1),
(181,'PW','Islas Palaos',1),
(182,'PY','Paraguay',1),
(183,'QA','Qatar',1),
(184,'RE','Reunión',1),
(185,'RO','Rumanía',1),
(186,'RS','Serbia y Montenegro',1),
(187,'RU','Rusia',1),
(188,'RW','Ruanda',1),
(189,'SA','Arabia Saudita',1),
(190,'SB','Islas Solomón',1),
(191,'SC','Seychelles',1),
(192,'SD','Sudán',1),
(193,'SE','Suecia',1),
(194,'SG','Singapur',1),
(195,'SH','Santa Elena',1),
(196,'SI','Eslovenia',1),
(197,'SJ','Islas Svalbard y Jan Mayen',1),
(198,'SK','Eslovaquia',1),
(199,'SL','Sierra Leona',1),
(200,'SM','San Marino',1),
(201,'SN','Senegal',1),
(202,'SO','Somalia',1),
(203,'SR','Surinam',1),
(204,'ST','Santo Tomé y Príncipe',1),
(205,'SV','El Salvador',1),
(206,'SY','Siria',1),
(207,'SZ','Suazilandia',1),
(208,'TC','Islas Turcas y Caicos',1),
(209,'TD','Chad',1),
(210,'TF','Territorios Australes Franceses',1),
(211,'TG','Togo',1),
(212,'TH','Tailandia',1),
(213,'TH','Tanzania',1),
(214,'TJ','Tayikistán',1),
(215,'TK','Tokelau',1),
(216,'TL','Timor-Leste',1),
(217,'TM','Turkmenistán',1),
(218,'TN','Túnez',1),
(219,'TO','Tonga',1),
(220,'TR','Turquía',1),
(221,'TT','Trinidad y Tobago',1),
(222,'TV','Tuvalu',1),
(223,'TW','Taiwán',1),
(224,'UA','Ucrania',1),
(225,'UG','Uganda',1),
(226,'US','Estados Unidos de América',1),
(227,'UY','Uruguay',1),
(228,'UZ','Uzbekistán',1),
(229,'VA','Ciudad del Vaticano',1),
(230,'VC','San Vicente y las Granadinas',1),
(231,'VE','Venezuela',1),
(232,'VG','Islas Vírgenes Británicas',1),
(233,'VI','Islas Vírgenes de los Estados Unidos de América',1),
(234,'VN','Vietnam',1),
(235,'VU','Vanuatu',1),
(236,'WF','Wallis y Futuna',1),
(237,'WS','Samoa',1),
(238,'YE','Yemen',1),
(239,'YT','Mayotte',1),
(240,'ZA','Sudáfrica',1);

/*Table structure for table `ubg_district` */

DROP TABLE IF EXISTS `ubg_district`;

CREATE TABLE `ubg_district` (
  `districtID` bigint(8) unsigned NOT NULL,
  `cityID` int(6) unsigned NOT NULL,
  `districtName` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`districtID`),
  KEY `cityID` (`cityID`),
  CONSTRAINT `ubg_district_ibfk_1` FOREIGN KEY (`cityID`) REFERENCES `ubg_city` (`cityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ubg_district` */

insert  into `ubg_district`(`districtID`,`cityID`,`districtName`,`active`) values 
(1,1,'CHACHAPOYAS',1),
(2,1,'ASUNCION',1),
(3,1,'BALSAS',1),
(4,1,'CHETO',1),
(5,1,'CHILIQUIN',1),
(6,1,'CHUQUIBAMBA',1),
(7,1,'GRANADA',1),
(8,1,'HUANCAS',1),
(9,1,'LA JALCA',1),
(10,1,'LEIMEBAMBA',1),
(11,1,'LEVANTO',1),
(12,1,'MAGDALENA',1),
(13,1,'MARISCAL CASTILLA',1),
(14,1,'MOLINOPAMPA',1),
(15,1,'MONTEVIDEO',1),
(16,1,'OLLEROS',1),
(17,1,'QUINJALCA',1),
(18,1,'SAN FRANCISCO DE DAGUAS',1),
(19,1,'SAN ISIDRO DE MAINO',1),
(20,1,'SOLOCO',1),
(21,1,'SONCHE',1),
(22,2,'BAGUA',1),
(23,2,'ARAMANGO',1),
(24,2,'COPALLIN',1),
(25,2,'EL PARCO',1),
(26,2,'IMAZA',1),
(27,2,'LA PECA',1),
(28,3,'JUMBILLA',1),
(29,3,'CHISQUILLA',1),
(30,3,'CHURUJA',1),
(31,3,'COROSHA',1),
(32,3,'CUISPES',1),
(33,3,'FLORIDA',1),
(34,3,'JAZAN',1),
(35,3,'RECTA',1),
(36,3,'SAN CARLOS',1),
(37,3,'SHIPASBAMBA',1),
(38,3,'VALERA',1),
(39,3,'YAMBRASBAMBA',1),
(40,4,'NIEVA',1),
(41,4,'EL CENEPA',1),
(42,4,'RIO SANTIAGO',1),
(43,5,'LAMUD',1),
(44,5,'CAMPORREDONDO',1),
(45,5,'COCABAMBA',1),
(46,5,'COLCAMAR',1),
(47,5,'CONILA',1),
(48,5,'INGUILPATA',1),
(49,5,'LONGUITA',1),
(50,5,'LONYA CHICO',1),
(51,5,'LUYA',1),
(52,5,'LUYA VIEJO',1),
(53,5,'MARIA',1),
(54,5,'OCALLI',1),
(55,5,'OCUMAL',1),
(56,5,'PISUQUIA',1),
(57,5,'PROVIDENCIA',1),
(58,5,'SAN CRISTOBAL',1),
(59,5,'SAN FRANCISCO DEL YESO',1),
(60,5,'SAN JERONIMO',1),
(61,5,'SAN JUAN DE LOPECANCHA',1),
(62,5,'SANTA CATALINA',1),
(63,5,'SANTO TOMAS',1),
(64,5,'TINGO',1),
(65,5,'TRITA',1),
(66,6,'SAN NICOLAS',1),
(67,6,'CHIRIMOTO',1),
(68,6,'COCHAMAL',1),
(69,6,'HUAMBO',1),
(70,6,'LIMABAMBA',1),
(71,6,'LONGAR',1),
(72,6,'MARISCAL BENAVIDES',1),
(73,6,'MILPUC',1),
(74,6,'OMIA',1),
(75,6,'SANTA ROSA',1),
(76,6,'TOTORA',1),
(77,6,'VISTA ALEGRE',1),
(78,7,'BAGUA GRANDE',1),
(79,7,'CAJARURO',1),
(80,7,'CUMBA',1),
(81,7,'EL MILAGRO',1),
(82,7,'JAMALCA',1),
(83,7,'LONYA GRANDE',1),
(84,7,'YAMON',1),
(85,8,'HUARAZ',1),
(86,8,'COCHABAMBA',1),
(87,8,'COLCABAMBA',1),
(88,8,'HUANCHAY',1),
(89,8,'INDEPENDENCIA',1),
(90,8,'JANGAS',1),
(91,8,'LA LIBERTAD',1),
(92,8,'OLLEROS',1),
(93,8,'PAMPAS',1),
(94,8,'PARIACOTO',1),
(95,8,'PIRA',1),
(96,8,'TARICA',1),
(97,9,'AIJA',1),
(98,9,'CORIS',1),
(99,9,'HUACLLAN',1),
(100,9,'LA MERCED',1),
(101,9,'SUCCHA',1),
(102,9,'LLAMELLIN',1),
(103,10,'ACZO',1),
(104,10,'CHACCHO',1),
(105,10,'CHINGAS',1),
(106,10,'MIRGAS',1),
(107,10,'SAN JUAN DE RONTOY',1),
(108,11,'CHACAS',1),
(109,11,'ACOCHACA',1),
(110,12,'CHIQUIAN',1),
(111,12,'ABELARDO PARDO LEZAMETA',1),
(112,12,'ANTONIO RAYMONDI',1),
(113,12,'AQUIA',1),
(114,12,'CAJACAY',1),
(115,12,'CANIS',1),
(116,12,'COLQUIOC',1),
(117,12,'HUALLANCA',1),
(118,12,'HUASTA',1),
(119,12,'HUAYLLACAYAN',1),
(120,12,'LA PRIMAVERA',1),
(121,12,'MANGAS',1),
(122,12,'PACLLON',1),
(123,12,'SAN MIGUEL DE CORPANQUI',1),
(124,12,'TICLLOS',1),
(125,13,'CARHUAZ',1),
(126,13,'ACOPAMPA',1),
(127,13,'AMASHCA',1),
(128,13,'ANTA',1),
(129,13,'ATAQUERO',1),
(130,13,'MARCARA',1),
(131,13,'PARIAHUANCA',1),
(132,13,'SAN MIGUEL DE ACO',1),
(133,13,'SHILLA',1),
(134,13,'TINCO',1),
(135,13,'YUNGAR',1),
(136,14,'SAN LUIS',1),
(137,14,'SAN NICOLAS',1),
(138,14,'YAUYA',1),
(139,15,'CASMA',1),
(140,15,'BUENA VISTA ALTA',1),
(141,15,'COMANDANTE NOEL',1),
(142,15,'YAUTAN',1),
(143,16,'CORONGO',1),
(144,16,'ACO',1),
(145,16,'BAMBAS',1),
(146,16,'CUSCA',1),
(147,16,'LA PAMPA',1),
(148,16,'YANAC',1),
(149,16,'YUPAN',1),
(150,17,'HUARI',1),
(151,17,'ANRA',1),
(152,17,'CAJAY',1),
(153,17,'CHAVIN DE HUANTAR',1),
(154,17,'HUACACHI',1),
(155,17,'HUACCHIS',1),
(156,17,'HUACHIS',1),
(157,17,'HUANTAR',1),
(158,17,'MASIN',1),
(159,17,'PAUCAS',1),
(160,17,'PONTO',1),
(161,17,'RAHUAPAMPA',1),
(162,17,'RAPAYAN',1),
(163,17,'SAN MARCOS',1),
(164,17,'SAN PEDRO DE CHANA',1),
(165,17,'UCO',1),
(166,18,'HUARMEY',1),
(167,18,'COCHAPETI',1),
(168,18,'CULEBRAS',1),
(169,18,'HUAYAN',1),
(170,18,'MALVAS',1),
(171,19,'CARAZ',1),
(172,19,'HUALLANCA',1),
(173,19,'HUATA',1),
(174,19,'HUAYLAS',1),
(175,19,'MATO',1),
(176,19,'PAMPAROMAS',1),
(177,19,'PUEBLO LIBRE',1),
(178,19,'SANTA CRUZ',1),
(179,19,'SANTO TORIBIO',1),
(180,19,'YURACMARCA',1),
(181,20,'PISCOBAMBA',1),
(182,20,'CASCA',1),
(183,20,'ELEAZAR GUZMAN BARRON',1),
(184,20,'FIDEL OLIVAS ESCUDERO',1),
(185,20,'LLAMA',1),
(186,20,'LLUMPA',1),
(187,20,'LUCMA',1),
(188,20,'MUSGA',1),
(189,21,'OCROS',1),
(190,21,'ACAS',1),
(191,21,'CAJAMARQUILLA',1),
(192,21,'CARHUAPAMPA',1),
(193,21,'COCHAS',1),
(194,21,'CONGAS',1),
(195,21,'LLIPA',1),
(196,21,'SAN CRISTOBAL DE RAJAN',1),
(197,21,'SAN PEDRO',1),
(198,21,'SANTIAGO DE CHILCAS',1),
(199,22,'CABANA',1),
(200,22,'BOLOGNESI',1),
(201,22,'CONCHUCOS',1),
(202,22,'HUACASCHUQUE',1),
(203,22,'HUANDOVAL',1),
(204,22,'LACABAMBA',1),
(205,22,'LLAPO',1),
(206,22,'PALLASCA',1),
(207,22,'PAMPAS',1),
(208,22,'SANTA ROSA',1),
(209,22,'TAUCA',1),
(210,23,'POMABAMBA',1),
(211,23,'HUAYLLAN',1),
(212,23,'PAROBAMBA',1),
(213,23,'QUINUABAMBA',1),
(214,24,'RECUAY',1),
(215,24,'CATAC',1),
(216,24,'COTAPARACO',1),
(217,24,'HUAYLLAPAMPA',1),
(218,24,'LLACLLIN',1),
(219,24,'MARCA',1),
(220,24,'PAMPAS CHICO',1),
(221,24,'PARARIN',1),
(222,24,'TAPACOCHA',1),
(223,24,'TICAPAMPA',1),
(224,25,'CHIMBOTE',1),
(225,25,'CACERES DEL PERU',1),
(226,25,'COISHCO',1),
(227,25,'MACATE',1),
(228,25,'MORO',1),
(229,25,'NEPEÑA',1),
(230,25,'SAMANCO',1),
(231,25,'SANTA',1),
(232,25,'NUEVO CHIMBOTE',1),
(233,26,'SIHUAS',1),
(234,26,'ACOBAMBA',1),
(235,26,'ALFONSO UGARTE',1),
(236,26,'CASHAPAMPA',1),
(237,26,'CHINGALPO',1),
(238,26,'HUAYLLABAMBA',1),
(239,26,'QUICHES',1),
(240,26,'RAGASH',1),
(241,26,'SAN JUAN',1),
(242,26,'SICSIBAMBA',1),
(243,27,'YUNGAY',1),
(244,27,'CASCAPARA',1),
(245,27,'MANCOS',1),
(246,27,'MATACOTO',1),
(247,27,'QUILLO',1),
(248,27,'RANRAHIRCA',1),
(249,27,'SHUPLUY',1),
(250,27,'YANAMA',1),
(251,28,'ABANCAY',1),
(252,29,'CHACOCHE',1),
(253,29,'CIRCA',1),
(254,29,'CURAHUASI',1),
(255,29,'HUANIPACA',1),
(256,29,'LAMBRAMA',1),
(257,29,'PICHIRHUA',1),
(258,29,'SAN PEDRO DE CACHORA',1),
(259,29,'TAMBURCO',1),
(260,30,'ANDAHUAYLAS',1),
(261,30,'ANDARAPA',1),
(262,30,'CHIARA',1),
(263,30,'HUANCARAMA',1),
(264,30,'HUANCARAY',1),
(265,30,'HUAYANA',1),
(266,30,'KISHUARA',1),
(267,30,'PACOBAMBA',1),
(268,30,'PACUCHA',1),
(269,30,'PAMPACHIRI',1),
(270,30,'POMACOCHA',1),
(271,30,'SAN ANTONIO DE CACHI',1),
(272,30,'SAN JERONIMO',1),
(273,30,'SAN MIGUEL DE CHACCRAMPA',1),
(274,30,'SANTA MARIA DE CHICMO',1),
(275,30,'TALAVERA',1),
(276,30,'TUMAY HUARACA',1),
(277,30,'TURPO',1),
(278,30,'KAQUIABAMBA',1),
(279,31,'ANTABAMBA',1),
(280,31,'EL ORO',1),
(281,31,'HUAQUIRCA',1),
(282,31,'JUAN ESPINOZA MEDRANO',1),
(283,31,'OROPESA',1),
(284,31,'PACHACONAS',1),
(285,31,'SABAINO',1),
(286,32,'CHALHUANCA',1),
(287,32,'CAPAYA',1),
(288,32,'CARAYBAMBA',1),
(289,32,'CHAPIMARCA',1),
(290,32,'COLCABAMBA',1),
(291,32,'COTARUSE',1),
(292,32,'HUAYLLO',1),
(293,32,'JUSTO APU SAHUARAURA',1),
(294,32,'LUCRE',1),
(295,32,'POCOHUANCA',1),
(296,32,'SAN JUAN DE CHACÑA',1),
(297,32,'SAÑAYCA',1),
(298,32,'SORAYA',1),
(299,32,'TAPAIRIHUA',1),
(300,32,'TINTAY',1),
(301,32,'TORAYA',1),
(302,32,'YANACA',1),
(303,33,'TAMBOBAMBA',1),
(304,33,'COTABAMBAS',1),
(305,33,'COYLLURQUI',1),
(306,33,'HAQUIRA',1),
(307,33,'MARA',1),
(308,33,'CHALLHUAHUACHO',1),
(309,34,'CHINCHEROS',1),
(310,34,'ANCO_HUALLO',1),
(311,34,'COCHARCAS',1),
(312,34,'HUACCANA',1),
(313,34,'OCOBAMBA',1),
(314,34,'ONGOY',1),
(315,34,'URANMARCA',1),
(316,34,'RANRACANCHA',1),
(317,35,'CHUQUIBAMBILLA',1),
(318,35,'CURPAHUASI',1),
(319,35,'GAMARRA',1),
(320,35,'HUAYLLATI',1),
(321,35,'MAMARA',1),
(322,35,'MICAELA BASTIDAS',1),
(323,35,'PATAYPAMPA',1),
(324,35,'PROGRESO',1),
(325,35,'SAN ANTONIO',1),
(326,35,'SANTA ROSA',1),
(327,35,'TURPAY',1),
(328,35,'VILCABAMBA',1),
(329,35,'VIRUNDO',1),
(330,35,'CURASCO',1),
(331,36,'AREQUIPA',1),
(332,36,'ALTO SELVA ALEGRE',1),
(333,36,'CAYMA',1),
(334,36,'CERRO COLORADO',1),
(335,36,'CHARACATO',1),
(336,36,'CHIGUATA',1),
(337,36,'JACOBO HUNTER',1),
(338,36,'LA JOYA',1),
(339,36,'MARIANO MELGAR',1),
(340,36,'MIRAFLORES',1),
(341,36,'MOLLEBAYA',1),
(342,36,'PAUCARPATA',1),
(343,36,'POCSI',1),
(344,36,'POLOBAYA',1),
(345,36,'QUEQUEÑA',1),
(346,36,'SABANDIA',1),
(347,36,'SACHACA',1),
(348,36,'SAN JUAN DE SIGUAS',1),
(349,36,'SAN JUAN DE TARUCANI',1),
(350,36,'SANTA ISABEL DE SIGUAS',1),
(351,36,'SANTA RITA DE SIGUAS',1),
(352,36,'SOCABAYA',1),
(353,36,'TIABAYA',1),
(354,36,'UCHUMAYO',1),
(355,36,'VITOR',1),
(356,36,'YANAHUARA',1),
(357,36,'YARABAMBA',1),
(358,36,'YURA',1),
(359,36,'JOSE LUIS BUSTAMANTE Y RIVERO',1),
(360,37,'CAMANA',1),
(361,37,'JOSE MARIA QUIMPER',1),
(362,37,'MARIANO NICOLAS VALCARCEL',1),
(363,37,'MARISCAL CACERES',1),
(364,37,'NICOLAS DE PIEROLA',1),
(365,37,'OCOÑA',1),
(366,37,'QUILCA',1),
(367,37,'SAMUEL PASTOR',1),
(368,38,'CARAVELI',1),
(369,38,'ACARI',1),
(370,38,'ATICO',1),
(371,38,'ATIQUIPA',1),
(372,38,'BELLA UNION',1),
(373,38,'CAHUACHO',1),
(374,38,'CHALA',1),
(375,38,'CHAPARRA',1),
(376,38,'HUANUHUANU',1),
(377,38,'JAQUI',1),
(378,38,'LOMAS',1),
(379,38,'QUICACHA',1),
(380,38,'YAUCA',1),
(381,39,'APLAO',1),
(382,39,'ANDAGUA',1),
(383,39,'AYO',1),
(384,39,'CHACHAS',1),
(385,39,'CHILCAYMARCA',1),
(386,39,'CHOCO',1),
(387,39,'HUANCARQUI',1),
(388,39,'MACHAGUAY',1),
(389,39,'ORCOPAMPA',1),
(390,39,'PAMPACOLCA',1),
(391,39,'TIPAN',1),
(392,39,'UÑON',1),
(393,39,'URACA',1),
(394,39,'VIRACO',1),
(395,40,'CHIVAY',1),
(396,40,'ACHOMA',1),
(397,40,'CABANACONDE',1),
(398,40,'CALLALLI',1),
(399,40,'CAYLLOMA',1),
(400,40,'COPORAQUE',1),
(401,40,'HUAMBO',1),
(402,40,'HUANCA',1),
(403,40,'ICHUPAMPA',1),
(404,40,'LARI',1),
(405,40,'LLUTA',1),
(406,40,'MACA',1),
(407,40,'MADRIGAL',1),
(408,40,'SAN ANTONIO DE CHUCA',1),
(409,40,'SIBAYO',1),
(410,40,'TAPAY',1),
(411,40,'TISCO',1),
(412,40,'TUTI',1),
(413,40,'YANQUE',1),
(414,40,'MAJES',1),
(415,41,'CHUQUIBAMBA',1),
(416,41,'ANDARAY',1),
(417,41,'CAYARANI',1),
(418,41,'CHICHAS',1),
(419,41,'IRAY',1),
(420,41,'RIO GRANDE',1),
(421,41,'SALAMANCA',1),
(422,41,'YANAQUIHUA',1),
(423,42,'MOLLENDO',1),
(424,42,'COCACHACRA',1),
(425,42,'DEAN VALDIVIA',1),
(426,42,'ISLAY',1),
(427,42,'MEJIA',1),
(428,42,'PUNTA DE BOMBON',1),
(429,43,'COTAHUASI',1),
(430,43,'ALCA',1),
(431,43,'CHARCANA',1),
(432,43,'HUAYNACOTAS',1),
(433,43,'PAMPAMARCA',1),
(434,43,'PUYCA',1),
(435,43,'QUECHUALLA',1),
(436,43,'SAYLA',1),
(437,43,'TAURIA',1),
(438,43,'TOMEPAMPA',1),
(439,43,'TORO',1),
(440,44,'AYACUCHO',1),
(441,44,'ACOCRO',1),
(442,44,'ACOS VINCHOS',1),
(443,44,'CARMEN ALTO',1),
(444,44,'CHIARA',1),
(445,44,'OCROS',1),
(446,44,'PACAYCASA',1),
(447,44,'QUINUA',1),
(448,44,'SAN JOSE DE TICLLAS',1),
(449,44,'SAN JUAN BAUTISTA',1),
(450,44,'SANTIAGO DE PISCHA',1),
(451,44,'SOCOS',1),
(452,44,'TAMBILLO',1),
(453,44,'VINCHOS',1),
(454,44,'JESUS NAZARENO',1),
(455,45,'CANGALLO',1),
(456,45,'CHUSCHI',1),
(457,45,'LOS MOROCHUCOS',1),
(458,45,'MARIA PARADO DE BELLIDO',1),
(459,45,'PARAS',1),
(460,45,'TOTOS',1),
(461,46,'SANCOS',1),
(462,46,'CARAPO',1),
(463,46,'SACSAMARCA',1),
(464,46,'SANTIAGO DE LUCANAMARCA',1),
(465,47,'HUANTA',1),
(466,47,'AYAHUANCO',1),
(467,47,'HUAMANGUILLA',1),
(468,47,'IGUAIN',1),
(469,47,'LURICOCHA',1),
(470,47,'SANTILLANA',1),
(471,47,'SIVIA',1),
(472,47,'LLOCHEGUA',1),
(473,48,'SAN MIGUEL',1),
(474,48,'ANCO',1),
(475,48,'AYNA',1),
(476,48,'CHILCAS',1),
(477,48,'CHUNGUI',1),
(478,48,'LUIS CARRANZA',1),
(479,48,'SANTA ROSA',1),
(480,48,'TAMBO',1),
(481,48,'SAMUGARI',1),
(482,49,'PUQUIO',1),
(483,49,'AUCARA',1),
(484,49,'CABANA',1),
(485,49,'CARMEN SALCEDO',1),
(486,49,'CHAVIÑA',1),
(487,49,'CHIPAO',1),
(488,49,'HUAC-HUAS',1),
(489,49,'LARAMATE',1),
(490,49,'LEONCIO PRADO',1),
(491,49,'LLAUTA',1),
(492,49,'LUCANAS',1),
(493,49,'OCAÑA',1),
(494,49,'OTOCA',1),
(495,49,'SAISA',1),
(496,49,'SAN CRISTOBAL',1),
(497,49,'SAN JUAN',1),
(498,49,'SAN PEDRO',1),
(499,49,'SAN PEDRO DE PALCO',1),
(500,49,'SANCOS',1),
(501,49,'SANTA ANA DE HUAYCAHUACHO',1),
(502,49,'SANTA LUCIA',1),
(503,50,'CORACORA',1),
(504,50,'CHUMPI',1),
(505,50,'CORONEL CASTAÑEDA',1),
(506,50,'PACAPAUSA',1),
(507,50,'PULLO',1),
(508,50,'PUYUSCA',1),
(509,50,'SAN FRANCISCO DE RAVACAYCO',1),
(510,50,'UPAHUACHO',1),
(511,50,'PAUSA',1),
(512,50,'COLTA',1),
(513,50,'CORCULLA',1),
(514,50,'LAMPA',1),
(515,50,'MARCABAMBA',1),
(516,50,'OYOLO',1),
(517,50,'PARARCA',1),
(518,50,'SAN JAVIER DE ALPABAMBA',1),
(519,50,'SAN JOSE DE USHUA',1),
(520,50,'SARA SARA',1),
(521,51,'QUEROBAMBA',1),
(522,51,'BELEN',1),
(523,51,'CHALCOS',1),
(524,51,'CHILCAYOC',1),
(525,51,'HUACAÑA',1),
(526,51,'MORCOLLA',1),
(527,51,'PAICO',1),
(528,51,'SAN PEDRO DE LARCAY',1),
(529,51,'SAN SALVADOR DE QUIJE',1),
(530,51,'SANTIAGO DE PAUCARAY',1),
(531,51,'SORAS',1),
(532,52,'HUANCAPI',1),
(533,52,'ALCAMENCA',1),
(534,52,'APONGO',1),
(535,52,'ASQUIPATA',1),
(536,52,'CANARIA',1),
(537,52,'CAYARA',1),
(538,52,'COLCA',1),
(539,52,'HUAMANQUIQUIA',1),
(540,52,'HUANCARAYLLA',1),
(541,52,'HUAYA',1),
(542,52,'SARHUA',1),
(543,52,'VILCANCHOS',1),
(544,53,'VILCAS HUAMAN',1),
(545,53,'ACCOMARCA',1),
(546,53,'CARHUANCA',1),
(547,53,'CONCEPCION',1),
(548,53,'HUAMBALPA',1),
(549,53,'INDEPENDENCIA',1),
(550,53,'SAURAMA',1),
(551,53,'VISCHONGO',1),
(552,54,'CAJAMARCA',1),
(553,54,'ASUNCION',1),
(554,54,'CHETILLA',1),
(555,54,'COSPAN',1),
(556,54,'ENCAÑADA',1),
(557,54,'JESUS',1),
(558,54,'LLACANORA',1),
(559,54,'LOS BAÑOS DEL INCA',1),
(560,54,'MAGDALENA',1),
(561,54,'MATARA',1),
(562,54,'NAMORA',1),
(563,54,'SAN JUAN',1),
(564,55,'CAJABAMBA',1),
(565,55,'CACHACHI',1),
(566,55,'CONDEBAMBA',1),
(567,55,'SITACOCHA',1),
(568,56,'CELENDIN',1),
(569,56,'CHUMUCH',1),
(570,56,'CORTEGANA',1),
(571,56,'HUASMIN',1),
(572,56,'JORGE CHAVEZ',1),
(573,56,'JOSE GALVEZ',1),
(574,56,'MIGUEL IGLESIAS',1),
(575,56,'OXAMARCA',1),
(576,56,'SOROCHUCO',1),
(577,56,'SUCRE',1),
(578,56,'UTCO',1),
(579,56,'LA LIBERTAD DE PALLAN',1),
(580,57,'CHOTA',1),
(581,57,'ANGUIA',1),
(582,57,'CHADIN',1),
(583,57,'CHIGUIRIP',1),
(584,57,'CHIMBAN',1),
(585,57,'CHOROPAMPA',1),
(586,57,'COCHABAMBA',1),
(587,57,'CONCHAN',1),
(588,57,'HUAMBOS',1),
(589,57,'LAJAS',1),
(590,57,'LLAMA',1),
(591,57,'MIRACOSTA',1),
(592,57,'PACCHA',1),
(593,57,'PION',1),
(594,57,'QUEROCOTO',1),
(595,57,'SAN JUAN DE LICUPIS',1),
(596,57,'TACABAMBA',1),
(597,57,'TOCMOCHE',1),
(598,57,'CHALAMARCA',1),
(599,58,'CONTUMAZA',1),
(600,58,'CHILETE',1),
(601,58,'CUPISNIQUE',1),
(602,58,'GUZMANGO',1),
(603,58,'SAN BENITO',1),
(604,58,'SANTA CRUZ DE TOLED',1),
(605,58,'TANTARICA',1),
(606,58,'YONAN',1),
(607,59,'CUTERVO',1),
(608,59,'CALLAYUC',1),
(609,59,'CHOROS',1),
(610,59,'CUJILLO',1),
(611,59,'LA RAMADA',1),
(612,59,'PIMPINGOS',1),
(613,59,'QUEROCOTILLO',1),
(614,59,'SAN ANDRES DE CUTERVO',1),
(615,59,'SAN JUAN DE CUTERVO',1),
(616,59,'SAN LUIS DE LUCMA',1),
(617,59,'SANTA CRUZ',1),
(618,59,'SANTO DOMINGO DE LA CAPILLA',1),
(619,59,'SANTO TOMAS',1),
(620,59,'SOCOTA',1),
(621,59,'TORIBIO CASANOVA',1),
(622,60,'BAMBAMARCA',1),
(623,60,'CHUGUR',1),
(624,60,'HUALGAYOC',1),
(625,61,'JAEN',1),
(626,61,'BELLAVISTA',1),
(627,61,'CHONTALI',1),
(628,61,'COLASAY',1),
(629,61,'HUABAL',1),
(630,61,'LAS PIRIAS',1),
(631,61,'POMAHUACA',1),
(632,61,'PUCARA',1),
(633,61,'SALLIQUE',1),
(634,61,'SAN FELIPE',1),
(635,61,'SAN JOSE DEL ALTO',1),
(636,61,'SANTA ROSA',1),
(637,62,'SAN IGNACIO',1),
(638,62,'CHIRINOS',1),
(639,62,'HUARANGO',1),
(640,62,'LA COIPA',1),
(641,62,'NAMBALLE',1),
(642,62,'SAN JOSE DE LOURDES',1),
(643,62,'TABACONAS',1),
(644,63,'PEDRO GALVEZ',1),
(645,63,'CHANCAY',1),
(646,63,'EDUARDO VILLANUEVA',1),
(647,63,'GREGORIO PITA',1),
(648,63,'ICHOCAN',1),
(649,63,'JOSE MANUEL QUIROZ',1),
(650,63,'JOSE SABOGAL',1),
(651,64,'SAN MIGUEL',1),
(652,64,'BOLIVAR',1),
(653,64,'CALQUIS',1),
(654,64,'CATILLUC',1),
(655,64,'EL PRADO',1),
(656,64,'LA FLORIDA',1),
(657,64,'LLAPA',1),
(658,64,'NANCHOC',1),
(659,64,'NIEPOS',1),
(660,64,'SAN GREGORIO',1),
(661,64,'SAN SILVESTRE DE COCHAN',1),
(662,64,'TONGOD',1),
(663,64,'UNION AGUA BLANCA',1),
(664,65,'SAN PABLO',1),
(665,65,'SAN BERNARDINO',1),
(666,65,'SAN LUIS',1),
(667,65,'TUMBADEN',1),
(668,66,'SANTA CRUZ',1),
(669,66,'ANDABAMBA',1),
(670,66,'CATACHE',1),
(671,66,'CHANCAYBAÑOS',1),
(672,66,'LA ESPERANZA',1),
(673,66,'NINABAMBA',1),
(674,66,'PULAN',1),
(675,66,'SAUCEPAMPA',1),
(676,66,'SEXI',1),
(677,66,'UTICYACU',1),
(678,66,'YAUYUCAN',1),
(679,67,'CALLAO',1),
(680,67,'BELLAVISTA',1),
(681,67,'CARMEN DE LA LEGUA REYNOSO',1),
(682,67,'LA PERLA',1),
(683,67,'LA PUNTA',1),
(684,67,'VENTANILLA',1),
(685,68,'CUSCO',1),
(686,68,'CCORCA',1),
(687,68,'POROY',1),
(688,68,'SAN JERONIMO',1),
(689,68,'SAN SEBASTIAN',1),
(690,68,'SANTIAGO',1),
(691,68,'SAYLLA',1),
(692,68,'WANCHAQ',1),
(693,69,'ACOMAYO',1),
(694,69,'ACOPIA',1),
(695,69,'ACOS',1),
(696,69,'MOSOC LLACTA',1),
(697,69,'POMACANCHI',1),
(698,69,'RONDOCAN',1),
(699,69,'SANGARARA',1),
(700,70,'ANTA',1),
(701,70,'ANCAHUASI',1),
(702,70,'CACHIMAYO',1),
(703,70,'CHINCHAYPUJIO',1),
(704,70,'HUAROCONDO',1),
(705,70,'LIMATAMBO',1),
(706,70,'MOLLEPATA',1),
(707,70,'PUCYURA',1),
(708,70,'ZURITE',1),
(709,71,'CALCA',1),
(710,71,'COYA',1),
(711,71,'LAMAY',1),
(712,71,'LARES',1),
(713,71,'PISAC',1),
(714,71,'SAN SALVADOR',1),
(715,71,'TARAY',1),
(716,71,'YANATILE',1),
(717,72,'YANAOCA',1),
(718,72,'CHECCA',1),
(719,72,'KUNTURKANKI',1),
(720,72,'LANGUI',1),
(721,72,'LAYO',1),
(722,72,'PAMPAMARCA',1),
(723,72,'QUEHUE',1),
(724,72,'TUPAC AMARU',1),
(725,73,'SICUANI',1),
(726,73,'CHECACUPE',1),
(727,73,'COMBAPATA',1),
(728,73,'MARANGANI',1),
(729,73,'PITUMARCA',1),
(730,73,'SAN PABLO',1),
(731,73,'SAN PEDRO',1),
(732,73,'TINTA',1),
(733,74,'SANTO TOMAS',1),
(734,74,'CAPACMARCA',1),
(735,74,'CHAMACA',1),
(736,74,'COLQUEMARCA',1),
(737,74,'LIVITACA',1),
(738,74,'LLUSCO',1),
(739,74,'QUIÑOTA',1),
(740,74,'VELILLE',1),
(741,75,'ESPINAR',1),
(742,75,'CONDOROMA',1),
(743,75,'COPORAQUE',1),
(744,75,'OCORURO',1),
(745,75,'PALLPATA',1),
(746,75,'PICHIGUA',1),
(747,75,'SUYCKUTAMBO',1),
(748,75,'ALTO PICHIGUA',1),
(749,76,'SANTA ANA',1),
(750,76,'ECHARATE',1),
(751,76,'HUAYOPATA',1),
(752,76,'MARANURA',1),
(753,76,'OCOBAMBA',1),
(754,76,'QUELLOUNO',1),
(755,76,'KIMBIRI',1),
(756,76,'SANTA TERESA',1),
(757,76,'VILCABAMBA',1),
(758,76,'PICHARI',1),
(759,77,'PARURO',1),
(760,77,'ACCHA',1),
(761,77,'CCAPI',1),
(762,77,'COLCHA',1),
(763,77,'HUANOQUITE',1),
(764,77,'OMACHA',1),
(765,77,'PACCARITAMBO',1),
(766,77,'PILLPINTO',1),
(767,77,'YAURISQUE',1),
(768,78,'PAUCARTAMBO',1),
(769,78,'CAICAY',1),
(770,78,'CHALLABAMBA',1),
(771,78,'COLQUEPATA',1),
(772,78,'HUANCARANI',1),
(773,78,'KOSÑIPATA',1),
(774,79,'URCOS',1),
(775,79,'ANDAHUAYLILLAS',1),
(776,79,'CAMANTI',1),
(777,79,'CCARHUAYO',1),
(778,79,'CCATCA',1),
(779,79,'CUSIPATA',1),
(780,79,'HUARO',1),
(781,79,'LUCRE',1),
(782,79,'MARCAPATA',1),
(783,79,'OCONGATE',1),
(784,79,'OROPESA',1),
(785,79,'QUIQUIJANA',1),
(786,80,'URUBAMBA',1),
(787,80,'CHINCHERO',1),
(788,80,'HUAYLLABAMBA',1),
(789,80,'MACHUPICCHU',1),
(790,80,'MARAS',1),
(791,80,'OLLANTAYTAMBO',1),
(792,80,'YUCAY',1),
(793,81,'HUANCAVELICA',1),
(794,81,'ACOBAMBILLA',1),
(795,81,'ACORIA',1),
(796,81,'CONAYCA',1),
(797,81,'CUENCA',1),
(798,81,'HUACHOCOLPA',1),
(799,81,'HUAYLLAHUARA',1),
(800,81,'IZCUCHACA',1),
(801,81,'LARIA',1),
(802,81,'MANTA',1),
(803,81,'MARISCAL CACERES',1),
(804,81,'MOYA',1),
(805,81,'NUEVO OCCORO',1),
(806,81,'PALCA',1),
(807,81,'PILCHACA',1),
(808,81,'VILCA',1),
(809,81,'YAULI',1),
(810,81,'ASCENSION',1),
(811,81,'HUANDO',1),
(812,82,'ACOBAMBA',1),
(813,82,'ANDABAMBA',1),
(814,82,'ANTA',1),
(815,82,'CAJA',1),
(816,82,'MARCAS',1),
(817,82,'PAUCARA',1),
(818,82,'POMACOCHA',1),
(819,82,'ROSARIO',1),
(820,83,'LIRCAY',1),
(821,83,'ANCHONGA',1),
(822,83,'CALLANMARCA',1),
(823,83,'CCOCHACCASA',1),
(824,83,'CHINCHO',1),
(825,83,'CONGALLA',1),
(826,83,'HUANCA-HUANCA',1),
(827,83,'HUAYLLAY GRANDE',1),
(828,83,'JULCAMARCA',1),
(829,83,'SAN ANTONIO DE ANTAPARCO',1),
(830,83,'SANTO TOMAS DE PATA',1),
(831,83,'SECCLLA',1),
(832,84,'CASTROVIRREYNA',1),
(833,84,'ARMA',1),
(834,84,'AURAHUA',1),
(835,84,'CAPILLAS',1),
(836,84,'CHUPAMARCA',1),
(837,84,'COCAS',1),
(838,84,'HUACHOS',1),
(839,84,'HUAMATAMBO',1),
(840,84,'MOLLEPAMPA',1),
(841,84,'SAN JUAN',1),
(842,84,'SANTA ANA',1),
(843,84,'TANTARA',1),
(844,84,'TICRAPO',1),
(845,85,'CHURCAMPA',1),
(846,85,'ANCO',1),
(847,85,'CHINCHIHUASI',1),
(848,85,'EL CARMEN',1),
(849,85,'LA MERCED',1),
(850,85,'LOCROJA',1),
(851,85,'PAUCARBAMBA',1),
(852,85,'SAN MIGUEL DE MAYOCC',1),
(853,85,'SAN PEDRO DE CORIS',1),
(854,85,'PACHAMARCA',1),
(855,85,'COSME',1),
(856,86,'HUAYTARA',1),
(857,86,'AYAVI',1),
(858,86,'CORDOVA',1),
(859,86,'HUAYACUNDO ARMA',1),
(860,86,'LARAMARCA',1),
(861,86,'OCOYO',1),
(862,86,'PILPICHACA',1),
(863,86,'QUERCO',1),
(864,86,'QUITO-ARMA',1),
(865,86,'SAN ANTONIO DE CUSICANCHA',1),
(866,86,'SAN FRANCISCO DE SANGAYAICO',1),
(867,86,'SAN ISIDRO',1),
(868,86,'SANTIAGO DE CHOCORVOS',1),
(869,86,'SANTIAGO DE QUIRAHUARA',1),
(870,86,'SANTO DOMINGO DE CAPILLAS',1),
(871,86,'TAMBO',1),
(872,87,'PAMPAS',1),
(873,87,'ACOSTAMBO',1),
(874,87,'ACRAQUIA',1),
(875,87,'AHUAYCHA',1),
(876,87,'COLCABAMBA',1),
(877,87,'DANIEL HERNANDEZ',1),
(878,87,'HUACHOCOLPA',1),
(879,87,'HUARIBAMBA',1),
(880,87,'ÑAHUIMPUQUIO',1),
(881,87,'PAZOS',1),
(882,87,'QUISHUAR',1),
(883,87,'SALCABAMBA',1),
(884,87,'SALCAHUASI',1),
(885,87,'SAN MARCOS DE ROCCHAC',1),
(886,87,'SURCUBAMBA',1),
(887,87,'TINTAY PUNCU',1),
(888,88,'HUANUCO',1),
(889,88,'AMARILIS',1),
(890,88,'CHINCHAO',1),
(891,88,'CHURUBAMBA',1),
(892,88,'MARGOS',1),
(893,88,'QUISQUI (KICHKI)',1),
(894,88,'SAN FRANCISCO DE CAYRAN',1),
(895,88,'SAN PEDRO DE CHAULAN',1),
(896,88,'SANTA MARIA DEL VALLE',1),
(897,88,'YARUMAYO',1),
(898,88,'PILLCO MARCA',1),
(899,88,'YACUS',1),
(900,89,'AMBO',1),
(901,89,'CAYNA',1),
(902,89,'COLPAS',1),
(903,89,'CONCHAMARCA',1),
(904,89,'HUACAR',1),
(905,89,'SAN FRANCISCO',1),
(906,89,'SAN RAFAEL',1),
(907,89,'TOMAY KICHWA',1),
(908,90,'LA UNION',1),
(909,90,'CHUQUIS',1),
(910,90,'MARIAS',1),
(911,90,'PACHAS',1),
(912,90,'QUIVILLA',1),
(913,90,'RIPAN',1),
(914,90,'SHUNQUI',1),
(915,90,'SILLAPATA',1),
(916,90,'YANAS',1),
(917,91,'HUACAYBAMBA',1),
(918,91,'CANCHABAMBA',1),
(919,91,'COCHABAMBA',1),
(920,91,'PINRA',1),
(921,92,'LLATA',1),
(922,92,'ARANCAY',1),
(923,92,'CHAVIN DE PARIARCA',1),
(924,92,'JACAS GRANDE',1),
(925,92,'JIRCAN',1),
(926,92,'MIRAFLORES',1),
(927,92,'MONZON',1),
(928,92,'PUNCHAO',1),
(929,92,'PUÑOS',1),
(930,92,'SINGA',1),
(931,92,'TANTAMAYO',1),
(932,93,'RUPA-RUPA',1),
(933,93,'DANIEL ALOMIA ROBLES',1),
(934,93,'HERMILIO VALDIZAN',1),
(935,93,'JOSE CRESPO Y CASTILLO',1),
(936,93,'LUYANDO',1),
(937,93,'MARIANO DAMASO BERAUN',1),
(938,94,'HUACRACHUCO',1),
(939,94,'CHOLON',1),
(940,94,'SAN BUENAVENTURA',1),
(941,95,'PANAO',1),
(942,95,'CHAGLLA',1),
(943,95,'MOLINO',1),
(944,95,'UMARI',1),
(945,96,'PUERTO INCA',1),
(946,96,'CODO DEL POZUZO',1),
(947,96,'HONORIA',1),
(948,96,'TOURNAVISTA',1),
(949,96,'YUYAPICHIS',1),
(950,10,'JESUS',1),
(951,10,'BAÑOS',1),
(952,10,'JIVIA',1),
(953,97,'QUEROPALCA',1),
(954,97,'RONDOS',1),
(955,97,'SAN FRANCISCO DE ASIS',1),
(956,97,'SAN MIGUEL DE CAURI',1),
(957,98,'CHAVINILLO',1),
(958,98,'CAHUAC',1),
(959,98,'CHACABAMBA',1),
(960,98,'APARICIO POMARES',1),
(961,98,'JACAS CHICO',1),
(962,98,'OBAS',1),
(963,98,'PAMPAMARCA',1),
(964,98,'CHORAS',1),
(965,99,'ICA',1),
(966,99,'LA TINGUIÑA',1),
(967,99,'LOS AQUIJES',1),
(968,99,'OCUCAJE',1),
(969,99,'PACHACUTEC',1),
(970,99,'PARCONA',1),
(971,99,'PUEBLO NUEVO',1),
(972,99,'SALAS',1),
(973,99,'SAN JOSE DE LOS MOLINOS',1),
(974,99,'SAN JUAN BAUTISTA',1),
(975,99,'SANTIAGO',1),
(976,99,'SUBTANJALLA',1),
(977,99,'TATE',1),
(978,99,'YAUCA DEL ROSARIO',1),
(979,100,'CHINCHA ALTA',1),
(980,100,'ALTO LARAN',1),
(981,100,'CHAVIN',1),
(982,100,'CHINCHA BAJA',1),
(983,100,'EL CARMEN',1),
(984,100,'GROCIO PRADO',1),
(985,100,'PUEBLO NUEVO',1),
(986,100,'SAN JUAN DE YANAC',1),
(987,100,'SAN PEDRO DE HUACARPANA',1),
(988,100,'SUNAMPE',1),
(989,100,'TAMBO DE MORA',1),
(990,101,'NAZCA',1),
(991,101,'CHANGUILLO',1),
(992,101,'EL INGENIO',1),
(993,101,'MARCONA',1),
(994,101,'VISTA ALEGRE',1),
(995,102,'PALPA',1),
(996,102,'LLIPATA',1),
(997,102,'RIO GRANDE',1),
(998,102,'SANTA CRUZ',1),
(999,102,'TIBILLO',1),
(1000,103,'PISCO',1),
(1001,103,'HUANCANO',1),
(1002,103,'HUMAY',1),
(1003,103,'INDEPENDENCIA',1),
(1004,103,'PARACAS',1),
(1005,103,'SAN ANDRES',1),
(1006,103,'SAN CLEMENTE',1),
(1007,103,'TUPAC AMARU INCA',1),
(1008,104,'HUANCAYO',1),
(1009,104,'CARHUACALLANGA',1),
(1010,104,'CHACAPAMPA',1),
(1011,104,'CHICCHE',1),
(1012,104,'CHILCA',1),
(1013,104,'CHONGOS ALTO',1),
(1014,104,'CHUPURO',1),
(1015,104,'COLCA',1),
(1016,104,'CULLHUAS',1),
(1017,104,'EL TAMBO',1),
(1018,104,'HUACRAPUQUIO',1),
(1019,104,'HUALHUAS',1),
(1020,104,'HUANCAN',1),
(1021,104,'HUASICANCHA',1),
(1022,104,'HUAYUCACHI',1),
(1023,104,'INGENIO',1),
(1024,104,'PARIAHUANCA',1),
(1025,104,'PILCOMAYO',1),
(1026,104,'PUCARA',1),
(1027,104,'QUICHUAY',1),
(1028,104,'QUILCAS',1),
(1029,104,'SAN AGUSTIN',1),
(1030,104,'SAN JERONIMO DE TUNAN',1),
(1031,104,'SAÑO',1),
(1032,104,'SAPALLANGA',1),
(1033,104,'SICAYA',1),
(1034,104,'SANTO DOMINGO DE ACOBAMBA',1),
(1035,104,'VIQUES',1),
(1036,105,'CONCEPCION',1),
(1037,105,'ACO',1),
(1038,105,'ANDAMARCA',1),
(1039,105,'CHAMBARA',1),
(1040,105,'COCHAS',1),
(1041,105,'COMAS',1),
(1042,105,'HEROINAS TOLEDO',1),
(1043,105,'MANZANARES',1),
(1044,105,'MARISCAL CASTILLA',1),
(1045,105,'MATAHUASI',1),
(1046,105,'MITO',1),
(1047,105,'NUEVE DE JULIO',1),
(1048,105,'ORCOTUNA',1),
(1049,105,'SAN JOSE DE QUERO',1),
(1050,105,'SANTA ROSA DE OCOPA',1),
(1051,106,'CHANCHAMAYO',1),
(1052,106,'PERENE',1),
(1053,106,'PICHANAQUI',1),
(1054,106,'SAN LUIS DE SHUARO',1),
(1055,106,'SAN RAMON',1),
(1056,106,'VITOC',1),
(1057,107,'JAUJA',1),
(1058,107,'ACOLLA',1),
(1059,107,'APATA',1),
(1060,107,'ATAURA',1),
(1061,107,'CANCHAYLLO',1),
(1062,107,'CURICACA',1),
(1063,107,'EL MANTARO',1),
(1064,107,'HUAMALI',1),
(1065,107,'HUARIPAMPA',1),
(1066,107,'HUERTAS',1),
(1067,107,'JANJAILLO',1),
(1068,107,'JULCAN',1),
(1069,107,'LEONOR ORDOÑEZ',1),
(1070,107,'LLOCLLAPAMPA',1),
(1071,107,'MARCO',1),
(1072,107,'MASMA',1),
(1073,107,'MASMA CHICCHE',1),
(1074,107,'MOLINOS',1),
(1075,107,'MONOBAMBA',1),
(1076,107,'MUQUI',1),
(1077,107,'MUQUIYAUYO',1),
(1078,107,'PACA',1),
(1079,107,'PACCHA',1),
(1080,107,'PANCAN',1),
(1081,107,'PARCO',1),
(1082,107,'POMACANCHA',1),
(1083,107,'RICRAN',1),
(1084,107,'SAN LORENZO',1),
(1085,107,'SAN PEDRO DE CHUNAN',1),
(1086,107,'SAUSA',1),
(1087,107,'SINCOS',1),
(1088,107,'TUNAN MARCA',1),
(1089,107,'YAULI',1),
(1090,107,'YAUYOS',1),
(1091,108,'JUNIN',1),
(1092,108,'CARHUAMAYO',1),
(1093,108,'ONDORES',1),
(1094,108,'ULCUMAYO',1),
(1095,109,'SATIPO',1),
(1096,109,'COVIRIALI',1),
(1097,109,'LLAYLLA',1),
(1098,109,'PAMPA HERMOSA',1),
(1099,109,'RIO NEGRO',1),
(1100,109,'RIO TAMBO',1),
(1101,109,'MAZAMARI - PANGOA',1),
(1102,110,'TARMA',1),
(1103,110,'ACOBAMBA',1),
(1104,110,'HUARICOLCA',1),
(1105,110,'HUASAHUASI',1),
(1106,110,'LA UNION',1),
(1107,110,'PALCA',1),
(1108,110,'PALCAMAYO',1),
(1109,110,'SAN PEDRO DE CAJAS',1),
(1110,110,'TAPO',1),
(1111,111,'LA OROYA',1),
(1112,111,'CHACAPALPA',1),
(1113,111,'HUAY-HUAY',1),
(1114,111,'MARCAPOMACOCHA',1),
(1115,111,'MOROCOCHA',1),
(1116,111,'PACCHA',1),
(1117,111,'SANTA BARBARA DE CARHUACAYAN',1),
(1118,111,'SANTA ROSA DE SACCO',1),
(1119,111,'SUITUCANCHA',1),
(1120,111,'YAULI',1),
(1121,112,'CHUPACA',1),
(1122,112,'AHUAC',1),
(1123,112,'CHONGOS BAJO',1),
(1124,112,'HUACHAC',1),
(1125,112,'HUAMANCACA CHICO',1),
(1126,112,'SAN JUAN DE ISCOS',1),
(1127,112,'SAN JUAN DE JARPA',1),
(1128,112,'TRES DE DICIEMBRE',1),
(1129,112,'YANACANCHA',1),
(1130,113,'TRUJILLO',1),
(1131,113,'EL PORVENIR',1),
(1132,113,'FLORENCIA DE MORA',1),
(1133,113,'HUANCHACO',1),
(1134,113,'LA ESPERANZA',1),
(1135,113,'LAREDO',1),
(1136,113,'MOCHE',1),
(1137,113,'POROTO',1),
(1138,113,'SALAVERRY',1),
(1139,113,'SIMBAL',1),
(1140,113,'VICTOR LARCO HERRERA',1),
(1141,114,'ASCOPE',1),
(1142,114,'CHICAMA',1),
(1143,114,'CHOCOPE',1),
(1144,114,'MAGDALENA DE CAO',1),
(1145,114,'PAIJAN',1),
(1146,114,'RAZURI',1),
(1147,114,'SANTIAGO DE CAO',1),
(1148,114,'CASA GRANDE',1),
(1149,115,'BOLIVAR',1),
(1150,115,'BAMBAMARCA',1),
(1151,115,'CONDORMARCA',1),
(1152,115,'LONGOTEA',1),
(1153,115,'UCHUMARCA',1),
(1154,115,'UCUNCHA',1),
(1155,116,'CHEPEN',1),
(1156,116,'PACANGA',1),
(1157,116,'PUEBLO NUEVO',1),
(1158,117,'JULCAN',1),
(1159,117,'CALAMARCA',1),
(1160,117,'CARABAMBA',1),
(1161,117,'HUASO',1),
(1162,118,'OTUZCO',1),
(1163,118,'AGALLPAMPA',1),
(1164,118,'CHARAT',1),
(1165,118,'HUARANCHAL',1),
(1166,118,'LA CUESTA',1),
(1167,118,'MACHE',1),
(1168,118,'PARANDAY',1),
(1169,118,'SALPO',1),
(1170,118,'SINSICAP',1),
(1171,118,'USQUIL',1),
(1172,119,'SAN PEDRO DE LLOC',1),
(1173,119,'GUADALUPE',1),
(1174,119,'JEQUETEPEQUE',1),
(1175,119,'PACASMAYO',1),
(1176,119,'SAN JOSE',1),
(1177,120,'TAYABAMBA',1),
(1178,120,'BULDIBUYO',1),
(1179,120,'CHILLIA',1),
(1180,120,'HUANCASPATA',1),
(1181,120,'HUAYLILLAS',1),
(1182,120,'HUAYO',1),
(1183,120,'ONGON',1),
(1184,120,'PARCOY',1),
(1185,120,'PATAZ',1),
(1186,120,'PIAS',1),
(1187,120,'SANTIAGO DE CHALLAS',1),
(1188,120,'TAURIJA',1),
(1189,120,'URPAY',1),
(1190,121,'HUAMACHUCO',1),
(1191,121,'CHUGAY',1),
(1192,121,'COCHORCO',1),
(1193,121,'CURGOS',1),
(1194,121,'MARCABAL',1),
(1195,121,'SANAGORAN',1),
(1196,121,'SARIN',1),
(1197,121,'SARTIMBAMBA',1),
(1198,122,'SANTIAGO DE CHUCO',1),
(1199,122,'ANGASMARCA',1),
(1200,122,'CACHICADAN',1),
(1201,122,'MOLLEBAMBA',1),
(1202,122,'MOLLEPATA',1),
(1203,122,'QUIRUVILCA',1),
(1204,122,'SANTA CRUZ DE CHUCA',1),
(1205,122,'SITABAMBA',1),
(1206,123,'CASCAS',1),
(1207,123,'LUCMA',1),
(1208,123,'MARMOT',1),
(1209,123,'SAYAPULLO',1),
(1210,124,'VIRU',1),
(1211,124,'CHAO',1),
(1212,124,'GUADALUPITO',1),
(1213,125,'CHICLAYO',1),
(1214,125,'CHONGOYAPE',1),
(1215,125,'ETEN',1),
(1216,125,'ETEN PUERTO',1),
(1217,125,'JOSE LEONARDO ORTIZ',1),
(1218,125,'LA VICTORIA',1),
(1219,125,'LAGUNAS',1),
(1220,125,'MONSEFU',1),
(1221,125,'NUEVA ARICA',1),
(1222,125,'OYOTUN',1),
(1223,125,'PICSI',1),
(1224,125,'PIMENTEL',1),
(1225,125,'REQUE',1),
(1226,125,'SANTA ROSA',1),
(1227,125,'SAÑA',1),
(1228,125,'CAYALTI',1),
(1229,125,'PATAPO',1),
(1230,125,'POMALCA',1),
(1231,125,'PUCALA',1),
(1232,125,'TUMAN',1),
(1233,126,'FERREÑAFE',1),
(1234,126,'CAÑARIS',1),
(1235,126,'INCAHUASI',1),
(1236,126,'MANUEL ANTONIO MESONES MURO',1),
(1237,126,'PITIPO',1),
(1238,126,'PUEBLO NUEVO',1),
(1239,127,'LAMBAYEQUE',1),
(1240,127,'CHOCHOPE',1),
(1241,127,'ILLIMO',1),
(1242,127,'JAYANCA',1),
(1243,127,'MOCHUMI',1),
(1244,127,'MORROPE',1),
(1245,127,'MOTUPE',1),
(1246,127,'OLMOS',1),
(1247,127,'PACORA',1),
(1248,127,'SALAS',1),
(1249,127,'SAN JOSE',1),
(1250,127,'TUCUME',1),
(1251,128,'LIMA',1),
(1252,128,'ANCON',1),
(1253,128,'ATE',1),
(1254,128,'BARRANCO',1),
(1255,128,'BREÑA',1),
(1256,128,'CARABAYLLO',1),
(1257,128,'CHACLACAYO',1),
(1258,128,'CHORRILLOS',1),
(1259,128,'CIENEGUILLA',1),
(1260,128,'COMAS',1),
(1261,128,'EL AGUSTINO',1),
(1262,128,'INDEPENDENCIA',1),
(1263,128,'JESUS MARIA',1),
(1264,128,'LA MOLINA',1),
(1265,128,'LA VICTORIA',1),
(1266,128,'LINCE',1),
(1267,128,'LOS OLIVOS',1),
(1268,128,'LURIGANCHO',1),
(1269,128,'LURIN',1),
(1270,128,'MAGDALENA DEL MAR',1),
(1271,128,'PUEBLO LIBRE',1),
(1272,128,'MIRAFLORES',1),
(1273,128,'PACHACAMAC',1),
(1274,128,'PUCUSANA',1),
(1275,128,'PUENTE PIEDRA',1),
(1276,128,'PUNTA HERMOSA',1),
(1277,128,'PUNTA NEGRA',1),
(1278,128,'RIMAC',1),
(1279,128,'SAN BARTOLO',1),
(1280,128,'SAN BORJA',1),
(1281,128,'SAN ISIDRO',1),
(1282,128,'SAN JUAN DE LURIGANCHO',1),
(1283,128,'SAN JUAN DE MIRAFLORES',1),
(1284,128,'SAN LUIS',1),
(1285,128,'SAN MARTIN DE PORRES',1),
(1286,128,'SAN MIGUEL',1),
(1287,128,'SANTA ANITA',1),
(1288,128,'SANTA MARIA DEL MAR',1),
(1289,128,'SANTA ROSA',1),
(1290,128,'SANTIAGO DE SURCO',1),
(1291,128,'SURQUILLO',1),
(1292,128,'VILLA EL SALVADOR',1),
(1293,128,'VILLA MARIA DEL TRIUNFO',1),
(1294,129,'BARRANCA',1),
(1295,129,'PARAMONGA',1),
(1296,129,'PATIVILCA',1),
(1297,129,'SUPE',1),
(1298,129,'SUPE PUERTO',1),
(1299,130,'CAJATAMBO',1),
(1300,130,'COPA',1),
(1301,130,'GORGOR',1),
(1302,130,'HUANCAPON',1),
(1303,130,'MANAS',1),
(1304,131,'CANTA',1),
(1305,131,'ARAHUAY',1),
(1306,131,'HUAMANTANGA',1),
(1307,131,'HUAROS',1),
(1308,131,'LACHAQUI',1),
(1309,131,'SAN BUENAVENTURA',1),
(1310,131,'SANTA ROSA DE QUIVES',1),
(1311,132,'SAN VICENTE DE CAÑETE',1),
(1312,132,'ASIA',1),
(1313,132,'CALANGO',1),
(1314,132,'CERRO AZUL',1),
(1315,132,'CHILCA',1),
(1316,132,'COAYLLO',1),
(1317,132,'IMPERIAL',1),
(1318,132,'LUNAHUANA',1),
(1319,132,'MALA',1),
(1320,132,'NUEVO IMPERIAL',1),
(1321,132,'PACARAN',1),
(1322,132,'QUILMANA',1),
(1323,132,'SAN ANTONIO',1),
(1324,132,'SAN LUIS',1),
(1325,132,'SANTA CRUZ DE FLORES',1),
(1326,132,'ZUÑIGA',1),
(1327,133,'HUARAL',1),
(1328,133,'ATAVILLOS ALTO',1),
(1329,133,'ATAVILLOS BAJO',1),
(1330,133,'AUCALLAMA',1),
(1331,133,'CHANCAY',1),
(1332,133,'IHUARI',1),
(1333,133,'LAMPIAN',1),
(1334,133,'PACARAOS',1),
(1335,133,'SAN MIGUEL DE ACOS',1),
(1336,133,'SANTA CRUZ DE ANDAMARCA',1),
(1337,133,'SUMBILCA',1),
(1338,133,'VEINTISIETE DE NOVIEMBRE',1),
(1339,134,'MATUCANA',1),
(1340,134,'ANTIOQUIA',1),
(1341,134,'CALLAHUANCA',1),
(1342,134,'CARAMPOMA',1),
(1343,134,'CHICLA',1),
(1344,134,'CUENCA',1),
(1345,134,'HUACHUPAMPA',1),
(1346,134,'HUANZA',1),
(1347,134,'HUAROCHIRI',1),
(1348,134,'LAHUAYTAMBO',1),
(1349,134,'LANGA',1),
(1350,134,'LARAOS',1),
(1351,134,'MARIATANA',1),
(1352,134,'RICARDO PALMA',1),
(1353,134,'SAN ANDRES DE TUPICOCHA',1),
(1354,134,'SAN ANTONIO',1),
(1355,134,'SAN BARTOLOME',1),
(1356,134,'SAN DAMIAN',1),
(1357,134,'SAN JUAN DE IRIS',1),
(1358,134,'SAN JUAN DE TANTARANCHE',1),
(1359,134,'SAN LORENZO DE QUINTI',1),
(1360,134,'SAN MATEO',1),
(1361,134,'SAN MATEO DE OTAO',1),
(1362,134,'SAN PEDRO DE CASTA',1),
(1363,134,'SAN PEDRO DE HUANCAYRE',1),
(1364,134,'SANGALLAYA',1),
(1365,134,'SANTA CRUZ DE COCACHACRA',1),
(1366,134,'SANTA EULALIA',1),
(1367,134,'SANTIAGO DE ANCHUCAYA',1),
(1368,134,'SANTIAGO DE TUNA',1),
(1369,134,'SANTO DOMINGO DE LOS OLLEROS',1),
(1370,134,'SURCO',1),
(1371,135,'HUACHO',1),
(1372,135,'AMBAR',1),
(1373,135,'CALETA DE CARQUIN',1),
(1374,135,'CHECRAS',1),
(1375,135,'HUALMAY',1),
(1376,135,'HUAURA',1),
(1377,135,'LEONCIO PRADO',1),
(1378,135,'PACCHO',1),
(1379,135,'SANTA LEONOR',1),
(1380,135,'SANTA MARIA',1),
(1381,135,'SAYAN',1),
(1382,135,'VEGUETA',1),
(1383,136,'OYON',1),
(1384,136,'ANDAJES',1),
(1385,136,'CAUJUL',1),
(1386,136,'COCHAMARCA',1),
(1387,136,'NAVAN',1),
(1388,136,'PACHANGARA',1),
(1389,137,'YAUYOS',1),
(1390,137,'ALIS',1),
(1391,137,'ALLAUCA',1),
(1392,137,'AYAVIRI',1),
(1393,137,'AZANGARO',1),
(1394,137,'CACRA',1),
(1395,137,'CARANIA',1),
(1396,137,'CATAHUASI',1),
(1397,137,'CHOCOS',1),
(1398,137,'COCHAS',1),
(1399,137,'COLONIA',1),
(1400,137,'HONGOS',1),
(1401,137,'HUAMPARA',1),
(1402,137,'HUANCAYA',1),
(1403,137,'HUANGASCAR',1),
(1404,137,'HUANTAN',1),
(1405,137,'HUAÑEC',1),
(1406,137,'LARAOS',1),
(1407,137,'LINCHA',1),
(1408,137,'MADEAN',1),
(1409,137,'MIRAFLORES',1),
(1410,137,'OMAS',1),
(1411,137,'PUTINZA',1),
(1412,137,'QUINCHES',1),
(1413,137,'QUINOCAY',1),
(1414,137,'SAN JOAQUIN',1),
(1415,137,'SAN PEDRO DE PILAS',1),
(1416,137,'TANTA',1),
(1417,137,'TAURIPAMPA',1),
(1418,137,'TOMAS',1),
(1419,137,'TUPE',1),
(1420,137,'VIÑAC',1),
(1421,137,'VITIS',1),
(1422,138,'IQUITOS',1),
(1423,138,'ALTO NANAY',1),
(1424,138,'FERNANDO LORES',1),
(1425,138,'INDIANA',1),
(1426,138,'LAS AMAZONAS',1),
(1427,138,'MAZAN',1),
(1428,138,'NAPO',1),
(1429,138,'PUNCHANA',1),
(1430,138,'PUTUMAYO',1),
(1431,138,'TORRES CAUSANA',1),
(1432,138,'BELEN',1),
(1433,138,'SAN JUAN BAUTISTA',1),
(1434,138,'TENIENTE MANUEL CLAVERO',1),
(1435,139,'YURIMAGUAS',1),
(1436,139,'BALSAPUERTO',1),
(1437,139,'JEBEROS',1),
(1438,139,'LAGUNAS',1),
(1439,139,'SANTA CRUZ',1),
(1440,139,'TENIENTE CESAR LOPEZ ROJAS',1),
(1441,140,'NAUTA',1),
(1442,140,'PARINARI',1),
(1443,140,'TIGRE',1),
(1444,140,'TROMPETEROS',1),
(1445,140,'URARINAS',1),
(1446,141,'RAMON CASTILLA',1),
(1447,141,'PEBAS',1),
(1448,141,'YAVARI',1),
(1449,141,'SAN PABLO',1),
(1450,142,'REQUENA',1),
(1451,142,'ALTO TAPICHE',1),
(1452,142,'CAPELO',1),
(1453,142,'EMILIO SAN MARTIN',1),
(1454,142,'MAQUIA',1),
(1455,142,'PUINAHUA',1),
(1456,142,'SAQUENA',1),
(1457,142,'SOPLIN',1),
(1458,142,'TAPICHE',1),
(1459,142,'JENARO HERRERA',1),
(1460,142,'YAQUERANA',1),
(1461,143,'CONTAMANA',1),
(1462,143,'INAHUAYA',1),
(1463,143,'PADRE MARQUEZ',1),
(1464,143,'PAMPA HERMOSA',1),
(1465,143,'SARAYACU',1),
(1466,143,'VARGAS GUERRA',1),
(1467,144,'BARRANCA',1),
(1468,144,'CAHUAPANAS',1),
(1469,144,'MANSERICHE',1),
(1470,144,'MORONA',1),
(1471,144,'PASTAZA',1),
(1472,144,'ANDOAS',1),
(1473,145,'TAMBOPATA',1),
(1474,145,'INAMBARI',1),
(1475,145,'LAS PIEDRAS',1),
(1476,145,'LABERINTO',1),
(1477,146,'MANU',1),
(1478,146,'FITZCARRALD',1),
(1479,146,'MADRE DE DIOS',1),
(1480,146,'HUEPETUHE',1),
(1481,147,'IÑAPARI',1),
(1482,147,'IBERIA',1),
(1483,147,'TAHUAMANU',1),
(1484,148,'MOQUEGUA',1),
(1485,148,'CARUMAS',1),
(1486,148,'CUCHUMBAYA',1),
(1487,148,'SAMEGUA',1),
(1488,148,'SAN CRISTOBAL',1),
(1489,148,'TORATA',1),
(1490,149,'OMATE',1),
(1491,149,'CHOJATA',1),
(1492,149,'COALAQUE',1),
(1493,149,'ICHUÑA',1),
(1494,149,'LA CAPILLA',1),
(1495,149,'LLOQUE',1),
(1496,149,'MATALAQUE',1),
(1497,149,'PUQUINA',1),
(1498,149,'QUINISTAQUILLAS',1),
(1499,149,'UBINAS',1),
(1500,149,'YUNGA',1),
(1501,150,'ILO',1),
(1502,150,'EL ALGARROBAL',1),
(1503,150,'PACOCHA',1),
(1504,151,'CHAUPIMARCA',1),
(1505,151,'HUACHON',1),
(1506,151,'HUARIACA',1),
(1507,151,'HUAYLLAY',1),
(1508,151,'NINACACA',1),
(1509,151,'PALLANCHACRA',1),
(1510,151,'PAUCARTAMBO',1),
(1511,151,'SAN FRANCISCO DE ASIS DE YARUSYACAN',1),
(1512,151,'SIMON BOLIVAR',1),
(1513,151,'TICLACAYAN',1),
(1514,151,'TINYAHUARCO',1),
(1515,151,'VICCO',1),
(1516,151,'YANACANCHA',1),
(1517,152,'YANAHUANCA',1),
(1518,152,'CHACAYAN',1),
(1519,152,'GOYLLARISQUIZGA',1),
(1520,152,'PAUCAR',1),
(1521,152,'SAN PEDRO DE PILLAO',1),
(1522,152,'SANTA ANA DE TUSI',1),
(1523,152,'TAPUC',1),
(1524,152,'VILCABAMBA',1),
(1525,153,'OXAPAMPA',1),
(1526,153,'CHONTABAMBA',1),
(1527,153,'HUANCABAMBA',1),
(1528,153,'PALCAZU',1),
(1529,153,'POZUZO',1),
(1530,153,'PUERTO BERMUDEZ',1),
(1531,153,'VILLA RICA',1),
(1532,153,'CONSTITUCION',1),
(1533,154,'PIURA',1),
(1534,154,'CASTILLA',1),
(1535,154,'CATACAOS',1),
(1536,154,'CURA MORI',1),
(1537,154,'EL TALLAN',1),
(1538,154,'LA ARENA',1),
(1539,154,'LA UNION',1),
(1540,154,'LAS LOMAS',1),
(1541,154,'TAMBO GRANDE',1),
(1542,155,'AYABACA',1),
(1543,155,'FRIAS',1),
(1544,155,'JILILI',1),
(1545,155,'LAGUNAS',1),
(1546,155,'MONTERO',1),
(1547,155,'PACAIPAMPA',1),
(1548,155,'PAIMAS',1),
(1549,155,'SAPILLICA',1),
(1550,155,'SICCHEZ',1),
(1551,155,'SUYO',1),
(1552,156,'HUANCABAMBA',1),
(1553,156,'CANCHAQUE',1),
(1554,156,'EL CARMEN DE LA FRONTERA',1),
(1555,156,'HUARMACA',1),
(1556,156,'LALAQUIZ',1),
(1557,156,'SAN MIGUEL DE EL FAIQUE',1),
(1558,156,'SONDOR',1),
(1559,156,'SONDORILLO',1),
(1560,157,'CHULUCANAS',1),
(1561,157,'BUENOS AIRES',1),
(1562,157,'CHALACO',1),
(1563,157,'LA MATANZA',1),
(1564,157,'MORROPON',1),
(1565,157,'SALITRAL',1),
(1566,157,'SAN JUAN DE BIGOTE',1),
(1567,157,'SANTA CATALINA DE MOSSA',1),
(1568,157,'SANTO DOMINGO',1),
(1569,157,'YAMANGO',1),
(1570,158,'PAITA',1),
(1571,158,'AMOTAPE',1),
(1572,158,'ARENAL',1),
(1573,158,'COLAN',1),
(1574,158,'LA HUACA',1),
(1575,158,'TAMARINDO',1),
(1576,158,'VICHAYAL',1),
(1577,159,'SULLANA',1),
(1578,159,'BELLAVISTA',1),
(1579,159,'IGNACIO ESCUDERO',1),
(1580,159,'LANCONES',1),
(1581,159,'MARCAVELICA',1),
(1582,159,'MIGUEL CHECA',1),
(1583,159,'QUERECOTILLO',1),
(1584,159,'SALITRAL',1),
(1585,160,'PARIÑAS',1),
(1586,160,'EL ALTO',1),
(1587,160,'LA BREA',1),
(1588,160,'LOBITOS',1),
(1589,160,'LOS ORGANOS',1),
(1590,160,'MANCORA',1),
(1591,161,'SECHURA',1),
(1592,161,'BELLAVISTA DE LA UNION',1),
(1593,161,'BERNAL',1),
(1594,161,'CRISTO NOS VALGA',1),
(1595,161,'VICE',1),
(1596,161,'RINCONADA LLICUAR',1),
(1597,162,'PUNO',1),
(1598,162,'ACORA',1),
(1599,162,'AMANTANI',1),
(1600,162,'ATUNCOLLA',1),
(1601,162,'CAPACHICA',1),
(1602,162,'CHUCUITO',1),
(1603,162,'COATA',1),
(1604,162,'HUATA',1),
(1605,162,'MAÑAZO',1),
(1606,162,'PAUCARCOLLA',1),
(1607,162,'PICHACANI',1),
(1608,162,'PLATERIA',1),
(1609,162,'SAN ANTONIO',1),
(1610,162,'TIQUILLACA',1),
(1611,162,'VILQUE',1),
(1612,163,'AZANGARO',1),
(1613,163,'ACHAYA',1),
(1614,163,'ARAPA',1),
(1615,163,'ASILLO',1),
(1616,163,'CAMINACA',1),
(1617,163,'CHUPA',1),
(1618,163,'JOSE DOMINGO CHOQUEHUANCA',1),
(1619,163,'MUÑANI',1),
(1620,163,'POTONI',1),
(1621,163,'SAMAN',1),
(1622,163,'SAN ANTON',1),
(1623,163,'SAN JOSE',1),
(1624,163,'SAN JUAN DE SALINAS',1),
(1625,163,'SANTIAGO DE PUPUJA',1),
(1626,163,'TIRAPATA',1),
(1627,164,'MACUSANI',1),
(1628,164,'AJOYANI',1),
(1629,164,'AYAPATA',1),
(1630,164,'COASA',1),
(1631,164,'CORANI',1),
(1632,164,'CRUCERO',1),
(1633,164,'ITUATA',1),
(1634,164,'OLLACHEA',1),
(1635,164,'SAN GABAN',1),
(1636,164,'USICAYOS',1),
(1637,165,'JULI',1),
(1638,165,'DESAGUADERO',1),
(1639,165,'HUACULLANI',1),
(1640,165,'KELLUYO',1),
(1641,165,'PISACOMA',1),
(1642,165,'POMATA',1),
(1643,165,'ZEPITA',1),
(1644,166,'ILAVE',1),
(1645,166,'CAPAZO',1),
(1646,166,'PILCUYO',1),
(1647,166,'SANTA ROSA',1),
(1648,166,'CONDURIRI',1),
(1649,167,'HUANCANE',1),
(1650,167,'COJATA',1),
(1651,167,'HUATASANI',1),
(1652,167,'INCHUPALLA',1),
(1653,167,'PUSI',1),
(1654,167,'ROSASPATA',1),
(1655,167,'TARACO',1),
(1656,167,'VILQUE CHICO',1),
(1657,168,'LAMPA',1),
(1658,168,'CABANILLA',1),
(1659,168,'CALAPUJA',1),
(1660,168,'NICASIO',1),
(1661,168,'OCUVIRI',1),
(1662,168,'PALCA',1),
(1663,168,'PARATIA',1),
(1664,168,'PUCARA',1),
(1665,168,'SANTA LUCIA',1),
(1666,168,'VILAVILA',1),
(1667,169,'AYAVIRI',1),
(1668,169,'ANTAUTA',1),
(1669,169,'CUPI',1),
(1670,169,'LLALLI',1),
(1671,169,'MACARI',1),
(1672,169,'NUÑOA',1),
(1673,169,'ORURILLO',1),
(1674,169,'SANTA ROSA',1),
(1675,169,'UMACHIRI',1),
(1676,170,'MOHO',1),
(1677,170,'CONIMA',1),
(1678,170,'HUAYRAPATA',1),
(1679,170,'TILALI',1),
(1680,171,'PUTINA',1),
(1681,171,'ANANEA',1),
(1682,171,'PEDRO VILCA APAZA',1),
(1683,171,'QUILCAPUNCU',1),
(1684,171,'SINA',1),
(1685,172,'JULIACA',1),
(1686,172,'CABANA',1),
(1687,172,'CABANILLAS',1),
(1688,172,'CARACOTO',1),
(1689,173,'SANDIA',1),
(1690,173,'CUYOCUYO',1),
(1691,173,'LIMBANI',1),
(1692,173,'PATAMBUCO',1),
(1693,173,'PHARA',1),
(1694,173,'QUIACA',1),
(1695,173,'SAN JUAN DEL ORO',1),
(1696,173,'YANAHUAYA',1),
(1697,173,'ALTO INAMBARI',1),
(1698,173,'SAN PEDRO DE PUTINA PUNCO',1),
(1699,174,'YUNGUYO',1),
(1700,174,'ANAPIA',1),
(1701,174,'COPANI',1),
(1702,174,'CUTURAPI',1),
(1703,174,'OLLARAYA',1),
(1704,174,'TINICACHI',1),
(1705,174,'UNICACHI',1),
(1706,175,'MOYOBAMBA',1),
(1707,175,'CALZADA',1),
(1708,175,'HABANA',1),
(1709,175,'JEPELACIO',1),
(1710,175,'SORITOR',1),
(1711,175,'YANTALO',1),
(1712,176,'BELLAVISTA',1),
(1713,176,'ALTO BIAVO',1),
(1714,176,'BAJO BIAVO',1),
(1715,176,'HUALLAGA',1),
(1716,176,'SAN PABLO',1),
(1717,176,'SAN RAFAEL',1),
(1718,177,'SAN JOSE DE SISA',1),
(1719,177,'AGUA BLANCA',1),
(1720,177,'SAN MARTIN',1),
(1721,177,'SANTA ROSA',1),
(1722,177,'SHATOJA',1),
(1723,178,'SAPOSOA',1),
(1724,178,'ALTO SAPOSOA',1),
(1725,178,'EL ESLABON',1),
(1726,178,'PISCOYACU',1),
(1727,178,'SACANCHE',1),
(1728,178,'TINGO DE SAPOSOA',1),
(1729,179,'LAMAS',1),
(1730,179,'ALONSO DE ALVARADO',1),
(1731,179,'BARRANQUITA',1),
(1732,179,'CAYNARACHI',1),
(1733,179,'CUÑUMBUQUI',1),
(1734,179,'PINTO RECODO',1),
(1735,179,'RUMISAPA',1),
(1736,179,'SAN ROQUE DE CUMBAZA',1),
(1737,179,'SHANAO',1),
(1738,179,'TABALOSOS',1),
(1739,179,'ZAPATERO',1),
(1740,180,'JUANJUI',1),
(1741,180,'CAMPANILLA',1),
(1742,180,'HUICUNGO',1),
(1743,180,'PACHIZA',1),
(1744,180,'PAJARILLO',1),
(1745,181,'PICOTA',1),
(1746,181,'BUENOS AIRES',1),
(1747,181,'CASPISAPA',1),
(1748,181,'PILLUANA',1),
(1749,181,'PUCACACA',1),
(1750,181,'SAN CRISTOBAL',1),
(1751,181,'SAN HILARION',1),
(1752,181,'SHAMBOYACU',1),
(1753,181,'TINGO DE PONASA',1),
(1754,181,'TRES UNIDOS',1),
(1755,182,'RIOJA',1),
(1756,182,'AWAJUN',1),
(1757,182,'ELIAS SOPLIN VARGAS',1),
(1758,182,'NUEVA CAJAMARCA',1),
(1759,182,'PARDO MIGUEL',1),
(1760,182,'POSIC',1),
(1761,182,'SAN FERNANDO',1),
(1762,182,'YORONGOS',1),
(1763,182,'YURACYACU',1),
(1764,183,'TARAPOTO',1),
(1765,183,'ALBERTO LEVEAU',1),
(1766,183,'CACATACHI',1),
(1767,183,'CHAZUTA',1),
(1768,183,'CHIPURANA',1),
(1769,183,'EL PORVENIR',1),
(1770,183,'HUIMBAYOC',1),
(1771,183,'JUAN GUERRA',1),
(1772,183,'LA BANDA DE SHILCAYO',1),
(1773,183,'MORALES',1),
(1774,183,'PAPAPLAYA',1),
(1775,183,'SAN ANTONIO',1),
(1776,183,'SAUCE',1),
(1777,183,'SHAPAJA',1),
(1778,184,'TOCACHE',1),
(1779,184,'NUEVO PROGRESO',1),
(1780,184,'POLVORA',1),
(1781,184,'SHUNTE',1),
(1782,184,'UCHIZA',1),
(1783,185,'TACNA',1),
(1784,185,'ALTO DE LA ALIANZA',1),
(1785,185,'CALANA',1),
(1786,185,'CIUDAD NUEVA',1),
(1787,185,'INCLAN',1),
(1788,185,'PACHIA',1),
(1789,185,'PALCA',1),
(1790,185,'POCOLLAY',1),
(1791,185,'SAMA',1),
(1792,185,'CORONEL GREGORIO ALBARRACIN LANCHIPA',1),
(1793,186,'CANDARAVE',1),
(1794,186,'CAIRANI',1),
(1795,186,'CAMILACA',1),
(1796,186,'CURIBAYA',1),
(1797,186,'HUANUARA',1),
(1798,186,'QUILAHUANI',1),
(1799,187,'LOCUMBA',1),
(1800,187,'ILABAYA',1),
(1801,187,'ITE',1),
(1802,188,'TARATA',1),
(1803,188,'HEROES ALBARRACIN',1),
(1804,188,'ESTIQUE',1),
(1805,188,'ESTIQUE-PAMPA',1),
(1806,188,'SITAJARA',1),
(1807,188,'SUSAPAYA',1),
(1808,188,'TARUCACHI',1),
(1809,188,'TICACO',1),
(1810,189,'TUMBES',1),
(1811,189,'CORRALES',1),
(1812,189,'LA CRUZ',1),
(1813,189,'PAMPAS DE HOSPITAL',1),
(1814,189,'SAN JACINTO',1),
(1815,189,'SAN JUAN DE LA VIRGEN',1),
(1816,190,'ZORRITOS',1),
(1817,190,'CASITAS',1),
(1818,190,'CANOAS DE PUNTA SAL',1),
(1819,191,'ZARUMILLA',1),
(1820,191,'AGUAS VERDES',1),
(1821,191,'MATAPALO',1),
(1822,191,'PAPAYAL',1),
(1823,192,'CALLERIA',1),
(1824,192,'CAMPOVERDE',1),
(1825,192,'IPARIA',1),
(1826,192,'MASISEA',1),
(1827,192,'YARINACOCHA',1),
(1828,192,'NUEVA REQUENA',1),
(1829,192,'MANANTAY',1),
(1830,193,'RAYMONDI',1),
(1831,193,'SEPAHUA',1),
(1832,193,'TAHUANIA',1),
(1833,193,'YURUA',1),
(1834,194,'PADRE ABAD',1),
(1835,194,'IRAZOLA',1),
(1836,194,'CURIMANA',1),
(1837,195,'PURUS',1);

/*Table structure for table `ubg_state` */

DROP TABLE IF EXISTS `ubg_state`;

CREATE TABLE `ubg_state` (
  `stateID` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,
  `countryID` smallint(4) unsigned NOT NULL,
  `stateName` char(40) NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`stateID`),
  KEY `countryID` (`countryID`),
  CONSTRAINT `ubg_state_ibfk_1` FOREIGN KEY (`countryID`) REFERENCES `ubg_country` (`countryID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `ubg_state` */

insert  into `ubg_state`(`stateID`,`countryID`,`stateName`,`active`) values 
(1,170,'AMAZONAS',1),
(2,170,'ANCASH',1),
(3,170,'APURIMAC',1),
(4,170,'AREQUIPA',1),
(5,170,'AYACUCHO',1),
(6,170,'CAJAMARCA',1),
(7,170,'CALLAO',1),
(8,170,'CUSCO',1),
(9,170,'HUANCAVELICA',1),
(10,170,'HUANUCO',1),
(11,170,'ICA',1),
(12,170,'JUNIN',1),
(13,170,'LA LIBERTAD',1),
(14,170,'LAMBAYEQUE',1),
(15,170,'LIMA',1),
(16,170,'LORETO',1),
(17,170,'MADRE DE DIOS',1),
(18,170,'MOQUEGUA',1),
(19,170,'PASCO',1),
(20,170,'PIURA',1),
(21,170,'PUNO',1),
(22,170,'SAN MARTIN',1),
(23,170,'TACNA',1),
(24,170,'TUMBES',1),
(25,170,'UCAYALI',1);

/* Trigger structure for table `cms_content_lang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tgcms_content_lang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tgcms_content_lang` BEFORE UPDATE ON `cms_content_lang` FOR EACH ROW BEGIN
    
	DECLARE _count INT;
	
	SELECT COUNT(*) INTO _count FROM cms_section_lang
	WHERE staticURL= NEW.staticURL;
	IF (_count>0) THEN
		CALL raise_error('Ya existe una ruta estatica con es mismo nombre');
	END IF;
	SELECT COUNT(*) INTO _count FROM cms_content_lang
	WHERE staticURL= NEW.staticURL AND contentID<>NEW.contentID;
	IF (_count>0) THEN
		CALL raise_error('Ya existe una ruta estatica con es mismo nombre');
	END IF;
	
    END */$$


DELIMITER ;

/* Trigger structure for table `cms_section_lang` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tgcms_section_lang` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tgcms_section_lang` BEFORE UPDATE ON `cms_section_lang` FOR EACH ROW BEGIN
    
	DECLARE _count INT;
	
	SELECT COUNT(*) INTO _count FROM cms_section_lang
	WHERE staticURL= NEW.staticURL AND sectionID<>NEW.sectionID;
	IF (_count>0) THEN
		CALL raise_error('Ya existe una ruta estatica con es mismo nombre');
	END IF;
	
    END */$$


DELIMITER ;

/* Function  structure for function  `fcms_childContentLang` */

/*!50003 DROP FUNCTION IF EXISTS `fcms_childContentLang` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `fcms_childContentLang`(_contentID INT(6), _langID TINYINT(3)) RETURNS int(6)
BEGIN
	DECLARE cntChild INT(6);
	SELECT COUNT(*) INTO cntChild
	FROM cms_content_lang aS clan
		INNER JOIN cms_content AS cont
		ON cont.contentID=clan.contentID
	WHERE cont.parentContentID=_contentID AND clan.langID=_langID;
	RETURN cntChild;
    END */$$
DELIMITER ;

/* Function  structure for function  `fcms_childSchema` */

/*!50003 DROP FUNCTION IF EXISTS `fcms_childSchema` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `fcms_childSchema`(_schemaID MEDIUMINT) RETURNS int(6)
BEGIN
	DECLARE cntChild INT(6);
	SELECT COUNT(*) INTO cntChild
	FROM cms_schema
	WHERE parentSchemaID=_schemaID;
	RETURN cntChild;
    END */$$
DELIMITER ;

/* Function  structure for function  `fcms_getStaticUrl` */

/*!50003 DROP FUNCTION IF EXISTS `fcms_getStaticUrl` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `fcms_getStaticUrl`(_contentID INT(10), _langID TINYINT(3), _title VARCHAR(255)) RETURNS varchar(1200) CHARSET latin1
BEGIN
	-- Declare the return variable here
	DECLARE _staticURL VARCHAR(1200) DEFAULT '';
	
	DECLARE _sectionID TINYINT(3) DEFAULT 0;
	DECLARE _parentContentID INT(10) DEFAULT 0;
	
	
	SELECT 
		sq.sectionID, IFNULL(c.parentContentID, 0)
		INTO _sectionID, _parentContentID
	FROM
		cms_content AS c
	INNER JOIN cms_schema AS sq
		ON sq.schemaID=c.schemaID
	WHERE c.contentID =_contentID;
	-- Add the T-SQL statements to compute the return value here
	
	SET _staticURL = REPLACE(_title, '/', '|');
	
	IF _parentContentID>0 THEN
		SELECT CONCAT(IFNULL(staticURL, ''), '/', _staticURL) INTO _staticURL
		FROM cms_content_lang AS cl
		INNER JOIN cms_content AS c
			ON cl.contentID=c.contentID
		WHERE cl.contentID =_parentContentID AND cl.langID = _langID;
	ELSE
		SELECT CONCAT(IFNULL(staticURL, ''), '/', _staticURL) INTO _staticURL
		FROM cms_section_lang AS sl
		INNER JOIN cms_section AS s
			ON sl.sectionID=s.sectionID
		WHERE sl.sectionID =_sectionID AND sl.langID = _langID;
	END IF;
	
	SET _staticURL=fcms_parseUrlName(_staticURL);
	SELECT CONCAT(_staticURL, '(' , _contentID, ')') INTO _staticURL FROM cms_content_lang WHERE staticURL=_staticURL;
	
	-- Return the result of the function
	RETURN _staticURL;
    END */$$
DELIMITER ;

/* Function  structure for function  `fcms_parseUrlName` */

/*!50003 DROP FUNCTION IF EXISTS `fcms_parseUrlName` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `fcms_parseUrlName`(_url VARCHAR(500)) RETURNS varchar(1000) CHARSET latin1
BEGIN
	DECLARE newUrl VARCHAR(500);
	SET newUrl = _url;
	SET newUrl = REPLACE(newUrl, '&', 'y');
	SET newUrl = REPLACE(newUrl, ' ', '-');
	SET newUrl = REPLACE(newUrl, '"', '');
	SET newUrl = REPLACE(newUrl, '”', '');
	SET newUrl = REPLACE(newUrl, '“', '');
	SET newUrl = REPLACE(newUrl, '`', '');
	SET newUrl = REPLACE(newUrl, "'", '');
	SET newUrl = REPLACE(newUrl, '’', '');
	SET newUrl = REPLACE(newUrl, ':', '-');
	SET newUrl = REPLACE(newUrl, '.', '-');
	SET newUrl = REPLACE(newUrl, '(', '-');
	SET newUrl = REPLACE(newUrl, ')', '-');
	SET newUrl = REPLACE(newUrl, ',', '-');
	SET newUrl = REPLACE(newUrl, '_', '-');
	SET newUrl = REPLACE(newUrl, '+', '-');
	SET newUrl = REPLACE(newUrl, '__', '-');
	SET newUrl = REPLACE(newUrl, '%', '');
	SET newUrl = REPLACE(newUrl, '--', '-'); 
	SET newUrl = LOWER(newUrl);
	SET newUrl = REPLACE(newUrl, 'á', 'a');
	SET newUrl = REPLACE(newUrl, 'é', 'e');
	SET newUrl = REPLACE(newUrl, 'í', 'i');
	SET newUrl = REPLACE(newUrl, 'ó', 'o');
	SET newUrl = REPLACE(newUrl, 'ú', 'u');
	SET newUrl = REPLACE(newUrl, 'Á', 'a');
	SET newUrl = REPLACE(newUrl, 'É', 'e');
	SET newUrl = REPLACE(newUrl, 'Í', 'i');
	SET newUrl = REPLACE(newUrl, 'Ó', 'o');
	SET newUrl = REPLACE(newUrl, 'Ú', 'u');
	SET newUrl = REPLACE(newUrl, 'ñ', 'n');
	SET newUrl = REPLACE(newUrl, 'Ñ', 'n');
	SET newUrl = REPLACE(newUrl, '¿', '');
	SET newUrl = REPLACE(newUrl, '?', '');
	SET newUrl = REPLACE(newUrl, '<', '');
	SET newUrl = REPLACE(newUrl, '>', '');
	SET newUrl = REPLACE(newUrl, '>', '');
	SET newUrl = REPLACE(newUrl, '…', '');
	SET newUrl = REPLACE(newUrl, '“', '');
	SET newUrl = REPLACE(newUrl, '”', '');
	-- Return the result of the function
	RETURN newUrl;
    END */$$
DELIMITER ;

/* Function  structure for function  `fcms_pathContent` */

/*!50003 DROP FUNCTION IF EXISTS `fcms_pathContent` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `fcms_pathContent`(_contentID INT, _langID MEDIUMINT) RETURNS varchar(2000) CHARSET latin1
BEGIN
	DECLARE contentPath VARCHAR(2000);
	DECLARE contentIDFind INT(6);
	SET contentPath   ='';
	SET contentIDFind =_contentID;
	
	WHILE (contentIDFind>0) DO
		SELECT IFNULL(cont.parentContentID,0), CONCAT(' / ', IFNULL(clan.title, cont.contentName), contentPath) INTO contentIDFind, contentPath
		FROM cms_content AS cont
		LEFT JOIN cms_content_lang AS clan
			ON cont.contentID=clan.contentID AND
			clan.langID	=_langID
		WHERE 
			cont.contentID	=contentIDFind;
	END WHILE;
	RETURN contentPath;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `cms_contentlang_insert` */

/*!50003 DROP PROCEDURE IF EXISTS  `cms_contentlang_insert` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `cms_contentlang_insert`(
	p_contentID INT(6), 
	p_langID TINYINT(3), 
	p_title VARCHAR(255), 
	p_subTitle VARCHAR(255), 
	p_subTitle2 VARCHAR(255), 
	p_description TEXT, 
	p_description2 TEXT, 
	p_description3 TEXT, 
	p_resumen TEXT, p_date DATETIME, 
	p_linkType TINYINT(1), 
	p_linkContentID INT(6), 
	p_linkURL VARCHAR(1000), 
	p_linkTarget VARCHAR(255), 
	p_staticURL VARCHAR(255), 
	p_media TEXT, 
	p_parameter TEXT, 
	p_metaTag TEXT, 
	p_showInHome TINYINT(1), 
	p_active TINYINT(1))
BEGIN
	/*Insert data to table*/
	INSERT INTO cms_content_lang(contentID, langID, title, subTitle, subTitle2, description, description2, description3, resumen, `date`, linkType, linkContentID, linkURL, linkTarget, staticURL, media, parameter, metaTag, registerDate, showInHome, active)
	VALUES(p_contentID, p_langID, p_title, p_subTitle, p_subTitle2, p_description, p_description2, p_description3, p_resumen, p_date, p_linkType, p_linkContentID, p_linkURL, p_linkTarget, fcms_getStaticUrl(p_contentID, p_langID, title), p_media, p_parameter, p_metaTag, NOW(), p_showInHome, p_active);
	SELECT p_contentID;
END */$$
DELIMITER ;

/* Procedure structure for procedure `cms_contentlang_update` */

/*!50003 DROP PROCEDURE IF EXISTS  `cms_contentlang_update` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `cms_contentlang_update`(
p_contentID INT(6), 
p_langID TINYINT(3), 
p_title VARCHAR(255), 
p_subTitle VARCHAR(255), 
p_subTitle2 VARCHAR(255), 
p_description TEXT, 
p_description2 TEXT, 
p_description3 TEXT, 
p_resumen TEXT, 
p_date DATETIME, 
p_linkType TINYINT(1), 
p_linkContentID INT(6), 
p_linkURL VARCHAR(1000), 
p_linkTarget VARCHAR(255), 
p_staticURL VARCHAR(2000), 
p_media TEXT, 
p_parameter TEXT, 
p_metaTag TEXT, 
p_showInHome TINYINT(1), 
p_active TINYINT(1))
BEGIN
	
	
	/*Update data to table*/
	UPDATE cms_content_lang SET 
		title		=p_title,
		subTitle	=p_subTitle,
		subTitle2	=p_subTitle2,
		description 	=p_description,
		description2	=p_description2,
		description3	=p_description3,
		resumen		=p_resumen,
		`date`		=p_date,
		linkType	=p_linkType,
		linkContentID	=p_linkContentID,
		linkURL		=p_linkURL,
		linkTarget	=p_linkTarget,
		staticURL	=p_staticURL,
		registerDate	=NOW(),
		media		=p_media,
		parameter	=p_parameter, 
		metaTag		=p_metaTag,
		showInHome	=p_showInHome,
		active		=p_active
	WHERE 
		contentID	=p_contentID AND
		langID		=p_langID;
	
	IF (p_langID=1) THEN
		UPDATE cms_content SET 
			contentName	=p_title
		WHERE 
			contentID	=p_contentID;
	END IF;
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `raise_error` */

/*!50003 DROP PROCEDURE IF EXISTS  `raise_error` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `raise_error`(message VARCHAR(255))
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
	SET @NEW=message;
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
