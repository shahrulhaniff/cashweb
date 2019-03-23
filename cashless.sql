/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 5.7.17-log : Database - cashless
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cashless` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `cashless`;

/*Table structure for table `akaun_pengguna` */

DROP TABLE IF EXISTS `akaun_pengguna`;

CREATE TABLE `akaun_pengguna` (
  `ic_pengguna` varchar(12) NOT NULL,
  `kod_pengguna` varchar(10) NOT NULL,
  `pwd` varchar(40) NOT NULL,
  `status_aktif` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`ic_pengguna`,`kod_pengguna`),
  KEY `kod_pengguna` (`kod_pengguna`),
  CONSTRAINT `akaun_pengguna_ibfk_1` FOREIGN KEY (`kod_pengguna`) REFERENCES `kod_jenispengguna` (`kod_pengguna`),
  CONSTRAINT `akaun_pengguna_ibfk_2` FOREIGN KEY (`ic_pengguna`) REFERENCES `maklumat_pengguna` (`ic_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `akaun_pengguna` */

insert  into `akaun_pengguna`(`ic_pengguna`,`kod_pengguna`,`pwd`,`status_aktif`) values 
('921202045432','6','921202045432','yes'),
('921202045888','7','921202045888','yes'),
('921202048888','3','921202048888','yes'),
('941013115435','1','123','yes'),
('941013115435','3','123','yes'),
('941013115436','2','123','yes');

/*Table structure for table `kod_jenispengguna` */

DROP TABLE IF EXISTS `kod_jenispengguna`;

CREATE TABLE `kod_jenispengguna` (
  `kod_pengguna` varchar(12) NOT NULL,
  `jenis_pengguna` varchar(10) NOT NULL,
  `jabatan` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`kod_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `kod_jenispengguna` */

insert  into `kod_jenispengguna`(`kod_pengguna`,`jenis_pengguna`,`jabatan`) values 
('1','user',NULL),
('2','admin','Bendahari'),
('3','sub-admin','Masjid'),
('4','sub-admin','JPP'),
('5','sub-admin','FIK'),
('6','sub-admin','Bendahari'),
('7','sub-admin','Fakulti');

/*Table structure for table `kod_jenistransaksi` */

DROP TABLE IF EXISTS `kod_jenistransaksi`;

CREATE TABLE `kod_jenistransaksi` (
  `id_jenistransaksi` varchar(12) NOT NULL,
  `jenistransaksi` varchar(100) NOT NULL,
  `jabatan` varchar(40) NOT NULL,
  PRIMARY KEY (`id_jenistransaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `kod_jenistransaksi` */

insert  into `kod_jenistransaksi`(`id_jenistransaksi`,`jenistransaksi`,`jabatan`) values 
('DRM','Derma','MASJID'),
('FKL','Yuran','Fakulti'),
('FKLL','Yuran','s'),
('SB','Sebut Harga','aaaad'),
('TEST','testing','tesT'),
('YR','Yuran','Bendahari');

/*Table structure for table `kod_transaksi` */

DROP TABLE IF EXISTS `kod_transaksi`;

CREATE TABLE `kod_transaksi` (
  `id_kodtransaksi` int(10) NOT NULL AUTO_INCREMENT,
  `kod_pengguna` varchar(10) NOT NULL,
  `no_sb` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `tarikhbuka` date NOT NULL,
  `tarikhtutup` date NOT NULL,
  `jam` time NOT NULL,
  `harga` float(10,2) NOT NULL,
  `id_jenistransaksi` varchar(12) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `keyin_by` varchar(100) NOT NULL,
  `tarikh_keyin` datetime NOT NULL,
  `edit_by` varchar(100) DEFAULT NULL,
  `tarikh_edit` datetime DEFAULT NULL,
  PRIMARY KEY (`id_kodtransaksi`),
  KEY `kod_pengguna` (`kod_pengguna`),
  KEY `id_jenistransaksi` (`id_jenistransaksi`),
  CONSTRAINT `kod_transaksi_ibfk_1` FOREIGN KEY (`kod_pengguna`) REFERENCES `kod_jenispengguna` (`kod_pengguna`),
  CONSTRAINT `kod_transaksi_ibfk_2` FOREIGN KEY (`id_jenistransaksi`) REFERENCES `kod_jenistransaksi` (`id_jenistransaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `kod_transaksi` */

insert  into `kod_transaksi`(`id_kodtransaksi`,`kod_pengguna`,`no_sb`,`description`,`tarikhbuka`,`tarikhtutup`,`jam`,`harga`,`id_jenistransaksi`,`kelas`,`keyin_by`,`tarikh_keyin`,`edit_by`,`tarikh_edit`) values 
(1,'3','IDSB001','Contoh butiran sebut harga','2019-03-01','2019-03-30','00:00:00',17000.39,'SB','1','IC Pegawai keyin','2019-03-06 11:27:27',NULL,NULL),
(2,'3','PEMB(E)SH/66/2018','CADANGAN KERJA-KERJA PEMASANGAN FEEDER PILLAR UTAMA TERMASUK KABEL 3 FASA KE KANDANG KAMBING SERTA KERJA-KERJA BERKAITAN DI LADANG PASIR AKAR UNISZA BESUT, TEENGGANU DARUL IMAN','2019-03-01','2019-03-31','12:00:00',30.00,'SB','5','PENYELARAS','2019-03-01 13:00:00',NULL,NULL);

/*Table structure for table `maklumat_pengguna` */

DROP TABLE IF EXISTS `maklumat_pengguna`;

CREATE TABLE `maklumat_pengguna` (
  `ic_pengguna` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_telefon` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ic_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `maklumat_pengguna` */

insert  into `maklumat_pengguna`(`ic_pengguna`,`nama`,`email`,`no_telefon`) values 
('921202045432','Siti Aina Bin Che Mat','aina@a.a','0132345675'),
('921202045888','Kak We Husna','kakwe@a.a','0132345675'),
('921202048888','Kak We Husna Binti Samad','weq@a.a','0132345678'),
('941013115435','Shahrul Haniff','shahrul@gmail.com','0109668468'),
('941013115436','Bendahari UniSZA','bendahari@unisza.com','0109668468');

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL AUTO_INCREMENT,
  `ic_pengguna` varchar(12) NOT NULL,
  `id_kodtransaksi` int(10) NOT NULL,
  `id_jenistransaksi` varchar(10) NOT NULL,
  `tarikh` datetime NOT NULL,
  `jumlah` float(10,2) NOT NULL,
  `daripada` varchar(12) NOT NULL,
  `kepada` varchar(12) NOT NULL,
  `statustransaction` varchar(50) NOT NULL,
  `status_dokumen` varchar(50) NOT NULL,
  `doc_acceptby` varchar(50) NOT NULL,
  `doc_giveby` varchar(50) NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `ic_pengguna` (`ic_pengguna`),
  KEY `id_kodtransaksi` (`id_kodtransaksi`),
  KEY `id_jenistransaksi` (`id_jenistransaksi`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`ic_pengguna`) REFERENCES `akaun_pengguna` (`ic_pengguna`),
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_kodtransaksi`) REFERENCES `kod_transaksi` (`id_kodtransaksi`),
  CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_jenistransaksi`) REFERENCES `kod_jenistransaksi` (`id_jenistransaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `transaksi` */

insert  into `transaksi`(`id_transaksi`,`ic_pengguna`,`id_kodtransaksi`,`id_jenistransaksi`,`tarikh`,`jumlah`,`daripada`,`kepada`,`statustransaction`,`status_dokumen`,`doc_acceptby`,`doc_giveby`) values 
(1,'941013115436',2,'SB','2019-03-21 06:12:16',30.00,'941013115436','941013115435','KOD MIGS','YES','941013115435','941013115436');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
