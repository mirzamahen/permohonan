/*
SQLyog Professional v13.1.1 (32 bit)
MySQL - 10.4.32-MariaDB : Database - permohonan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`permohonan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `permohonan`;

/*Table structure for table `magang` */

DROP TABLE IF EXISTS `magang`;

CREATE TABLE `magang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat_domisili` text NOT NULL,
  `universitas` varchar(255) NOT NULL,
  `ktp_path` varchar(255) NOT NULL,
  `ktm_path` varchar(255) NOT NULL,
  `pdf_path` varchar(255) NOT NULL,
  `proposal_path` varchar(255) NOT NULL,
  `tracking_number` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `magang` */

insert  into `magang`(`id`,`nama`,`nik`,`no_hp`,`email`,`alamat_domisili`,`universitas`,`ktp_path`,`ktm_path`,`pdf_path`,`proposal_path`,`tracking_number`,`status`,`created_at`) values 
(8,'zaza','34523111111','2342353534534','khaizuranmalvin09@gmail.com','vdxvdsbdsbds','UTY','../uploads/ktp/ktp_668cbba229a158.56518514.pdf','../uploads/ktm/ktm_668cbba2294a91.89361934.pdf','../uploads/surat/surat_668cbba22975a8.64957764.pdf','../uploads/proposal/proposal_668cbba2290834.67455547.pdf','MAGANG17204991061125','Selesai','2024-07-09 11:25:06');

/*Table structure for table `penelitian` */

DROP TABLE IF EXISTS `penelitian`;

CREATE TABLE `penelitian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat_domisili` text NOT NULL,
  `universitas` varchar(255) NOT NULL,
  `ktp_path` varchar(255) NOT NULL,
  `ktm_path` varchar(255) NOT NULL,
  `pdf_path` varchar(255) NOT NULL,
  `proposal_path` varchar(255) NOT NULL,
  `tracking_number` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `penelitian` */

insert  into `penelitian`(`id`,`nama`,`nik`,`no_hp`,`email`,`alamat_domisili`,`universitas`,`ktp_path`,`ktm_path`,`pdf_path`,`proposal_path`,`tracking_number`,`status`,`created_at`) values 
(3,'Muhammad Mirza Mahendra','342352525235','35235235235','mirza.mahendra97@gmail.com','cs, cdksnjhdbshjbhjbjh','UTY','../uploads/ktp/ktp_668c9cbbd2e363.22455531.pdf','../uploads/ktm/ktm_668c9cbbd293e1.54437616.pdf','../uploads/surat/surat_668c9cbbd2bd94.48288511.pdf','../uploads/proposal/proposal_668c9cbbd23ef1.37563334.pdf','PENELITIAN17204911952438','Sedang Diproses','2024-07-09 09:13:15');

/*Table structure for table `rohaniwan` */

DROP TABLE IF EXISTS `rohaniwan`;

CREATE TABLE `rohaniwan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `status_penjemputan` varchar(255) NOT NULL,
  `rohaniwan_path` varchar(255) NOT NULL,
  `tracking_number` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `rohaniwan` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `role` enum('operator','administrator') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`nama`,`nip`,`role`) values 
(1,'mirza','mirza','Muhammad Mirza Mahendra, S.Kom','199706142024211021','administrator'),
(3,'fani','123','Fani Enda Purwita , A.Md','199704022023212022','operator');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
