-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: antrian
-- ------------------------------------------------------
-- Server version	5.5.31-0+wheezy1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `antrian`
--

DROP TABLE IF EXISTS `antrian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `antrian` (
  `id_antrian` int(50) NOT NULL,
  `nomor_antrian` int(50) NOT NULL,
  PRIMARY KEY (`id_antrian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `antrian`
--

LOCK TABLES `antrian` WRITE;
/*!40000 ALTER TABLE `antrian` DISABLE KEYS */;
INSERT INTO `antrian` VALUES (1,2);
/*!40000 ALTER TABLE `antrian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id_history` int(50) NOT NULL AUTO_INCREMENT,
  `ktp` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nomor_antrian` int(50) NOT NULL,
  `immortal` int(50) NOT NULL,
  `jenis_besuk` varchar(200) NOT NULL,
  `foto_diri` varchar(200) NOT NULL,
  `pengikut_nama` varchar(200) NOT NULL,
  `pengikut_ktp` varchar(200) NOT NULL,
  `pengikut_foto_diri` varchar(200) NOT NULL,
  `pengikut_foto_ktp` varchar(200) NOT NULL,
  `nama_alias` varchar(200) NOT NULL,
  `ktp_alias` varchar(200) NOT NULL,
  `qrcode` varchar(200) NOT NULL,
  `surat_besukan` varchar(200) NOT NULL,
  `nama_dibesuk` varchar(200) NOT NULL,
  `waktu` varchar(200) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tanggal_lahir` varchar(200) NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `foto_ktp` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `verifikasi` varchar(200) NOT NULL,
  PRIMARY KEY (`id_history`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (6,'4545435453','ari','laki-laki','tarakan','ari','ari',1,0,'besuk_tahanan','3f00fd501b1a9fe0165178252734a0bb.jpg','hai','45343543242','6d2df934730cfc98e81c1c990693fe34.jpg','8e342860daab3a65b50b07be2d5f2e7d.jpg','ari','4545435453','ari.png','f914eb8650f853a11c4f75a946d44d5b.jpg','hai bin hai','2018-04-27 03:54:54','','','','','',''),(8,'4545435453','ari','laki-laki','tarakan','ari','ari',1,0,'besuk_tahanan','3f00fd501b1a9fe0165178252734a0bb.jpg','anjing','524254254254','9c1fb50246e02fe7934885045693024c.jpg','f512d9d67a1a3e302b58ba41dd3b3c6b.jpg','ari','4545435453','ari.png','7fbcd555f2bcb55cc1b6a60f9da532dc.jpg','hai bin kucing','2018-04-28 00:40:51','','','','','',''),(10,'4545435453','ari','laki-laki','tarakan','ari','ari',1,0,'besuk_tahanan','3f00fd501b1a9fe0165178252734a0bb.jpg','hantu','245452425','d32485d2aa26ed2a06412e2dea79d0f4.jpg','7f26c81836178b55357961e6d2fe038f.jpg','ari','4545435453','ari.png','718d0216e6c563a40633de17488dc7c5.jpg','kucing bin anjing','2018-04-28 01:02:30','','','','','',''),(12,'4545435453','ari','laki-laki','tarakan','ari','ari',1,0,'besuk_tahanan','3f00fd501b1a9fe0165178252734a0bb.jpg','hewan','247545433','b37dd8238e0eeea9211005b44ca9587f.jpg','c8211ad3238a3459091330c7c6b95589.jpg','ari','4545435453','ari.png','ab100948b0067ecfc14672d35823f511.jpg','han bin han','2018-04-28 01:07:24','','','','','',''),(15,'4646843384','kucing','laki-laki','kota','kucing','kucing',1,0,'besuk_tahanan','58766833d9ca15f552dfffb4370b321f.jpg','halo','43514534534','be273ab1e9157ccfe8eab491af92c012.jpg','cf6cdf90de3c55ded24bc698343f1eae.jpg','kucing','4646843384','kucing.png','7961abeab2309c09a9960214f686b13b.jpg','hai bin halo','2018-04-28 23:53:38','kota','2010-09-12','jualan','','menikah',''),(19,'3151351385185531','hantu','perempuan','hantu','hantu','hantu',1,0,'besuk_napi','b3cd5d69057276fb05aa493da0f83617.jpg','hantu','3545345343','8ffe8c62be28958db4411c1a5e47359e.jpg','4c9283c3cc16c54fc0f2d4cc19f9b7ba.jpg','hantu','3151351385185531','hantu.png','','hantu bin hantu','2018-04-28 23:58:50','hantu','1111-11-11','hantu','ded7c50287a8ef60a9c9d31c07ef1ed0.jpg','tidak menikah',''),(23,'3151351385185531','hantu','perempuan','hantu','hantu','hantu',1,0,'besuk_tahanan','b3cd5d69057276fb05aa493da0f83617.jpg','kjljlk','24454538','10796392ed5d8ee2138aaf4035dfc263.jpg','88ab163127686181c5cd4b2566edcb22.jpg','hantu','3151351385185531','hantu.png','7a6d50e6ec302748f55a41b5c0e88c82.jpg','lakjslkfjklsj','2018-04-29 00:06:40','hantu','1111-11-11','hantu','ded7c50287a8ef60a9c9d31c07ef1ed0.jpg','tidak menikah',''),(27,'3151351385185531','hantu','perempuan','hantu','hantu','hantu',1,0,'besuk_napi','b3cd5d69057276fb05aa493da0f83617.jpg','lkjlkjkljkljkl','4534534354','342cc9f63b9410f5b01c5093f7d8f1ca.jpg','a6c5290fc4049967c8c66328c41e9662.jpg','hantu','3151351385185531','hantu.png','','kajlkfjlaksjfl;kj','2018-04-29 00:07:53','hantu','1111-11-11','hantu','ded7c50287a8ef60a9c9d31c07ef1ed0.jpg','tidak menikah',''),(29,'4545435453','ari','laki-laki','tarakan','ari','ari',1,0,'besuk_tahanan','3f00fd501b1a9fe0165178252734a0bb.jpg','kucing','3453435453453453','54cd49d9083ab68a25de224a8f301a1b.jpg','c80ee526a7ac536afd5b4b7708fc1f8d.jpg','ari','4545435453','ari.png','d1f62743536c35e5d23e1ab0abb36508.jpg','kucing bin kucing','2018-05-05 17:35:21','','','','','',''),(33,'4545435453','ari','laki-laki','tarakan','ari','ari',1,0,'besuk_tahanan','3f00fd501b1a9fe0165178252734a0bb.jpg','kucing','35453435444','039aa27af7ff96a3eb4cb6aff3923efc.jpg','02ff43924251316b4546efbf5e5b2136.jpg','ari','4545435453','ari.png','175143f14602f0001074d31fcad651f9.jpg','kucing bin kucing','2018-05-06 00:34:41','','','','','',''),(37,'4545435453','ari','laki-laki','tarakan','ari','ari',1,0,'besuk_tahanan','3f00fd501b1a9fe0165178252734a0bb.jpg','kucing','4545345345','9fe15a7e9cc0deb999b6401099dd554f.jpg','6d160e83f9c538144876196e416bd931.jpg','ari','4545435453','ari.png','104b7bdf55dccd21d999d728278fb1e6.jpg','kucing bin kucing','2018-05-05 16:46:54','','','','','',''),(41,'4545435453','ari','laki-laki','tarakan','ari','ari',1,0,'besuk_tahanan','3f00fd501b1a9fe0165178252734a0bb.jpg','kucing','4131531351','38e4e1b4d9ace0804ef6a28f8dddd968.jpg','6caccaaa9d99ed5a9c37790c19e52f71.jpg','ari','4545435453','ari.png','248c582a0ee786daabd7a37c5e0d04c0.jpg','kucing bin kucing','2018-05-05 16:55:47','','','','','','tidak'),(43,'4545435453','ari','laki-laki','tarakan','ari','ari',1,0,'besuk_tahanan','3f00fd501b1a9fe0165178252734a0bb.jpg','kucing','224254534534','0993313f684976a26f59f95646f06db0.jpg','f75dda8f763ce2c11c619a4f6ba8c283.jpg','ari','4545435453','ari.png','cdddcc584778cdda36b1c99371183cb7.jpg','kucing bin kucing','2018-05-05 16:57:21','','','','','','tidak'),(47,'4545435453','ari','laki-laki','tarakan','ari','ari',4,0,'besuk_tahanan','3f00fd501b1a9fe0165178252734a0bb.jpg','kucing','43435435','d2e2e4acd3eb302ef9844e4575459dc9.jpg','dea92a361a37b8392523189844493630.jpg','ari','4545435453','ari_antrian.png','bd453ad578df9cc9017d9c8fdfe3fd18.jpg','kucing bin kucing','2018-05-06 10:01:26','','','','','','iya');
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(50) NOT NULL AUTO_INCREMENT,
  `ktp` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nomor_antrian` int(50) NOT NULL,
  `immortal` int(50) NOT NULL,
  `jenis_besuk` varchar(200) NOT NULL,
  `foto_diri` varchar(200) NOT NULL,
  `pengikut_nama` varchar(200) NOT NULL,
  `pengikut_ktp` varchar(200) NOT NULL,
  `pengikut_foto_diri` varchar(200) NOT NULL,
  `pengikut_foto_ktp` varchar(200) NOT NULL,
  `nama_alias` varchar(200) NOT NULL,
  `ktp_alias` varchar(200) NOT NULL,
  `qrcode` varchar(200) NOT NULL,
  `surat_besukan` varchar(200) NOT NULL,
  `nama_dibesuk` varchar(200) NOT NULL,
  `waktu` varchar(200) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tanggal_lahir` varchar(200) NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `foto_ktp` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `verifikasi` varchar(200) NOT NULL,
  `verifikasi_reload` varchar(200) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (18,'123456','Admin','laki-laki','LINE Webtoon','admin','admin',0,0,'','','','','','','','','','','','','','','','','','',''),(44,'4545435453','ari','laki-laki','tarakan','ari','ari',1,0,'besuk_tahanan','3f00fd501b1a9fe0165178252734a0bb.jpg','kucing','3547534354354354','c9859808ec43c1347d02686b57f52d09.jpg','3d220c33748ad396baa717fe652bd88e.jpg','ari','4545435453','ari_antrian.png','49609bd34895e0b288469c2450b6dbd3.jpg','kucing bin kucing','2018-06-28 17:32:27','','','','','','iya',''),(45,'4646843384','kucing','laki-laki','kota','kucing','kucing',0,0,'','58766833d9ca15f552dfffb4370b321f.jpg','','','','','','','','','','','kota','2010-09-12','jualan','','menikah','',''),(46,'3151351385185531','hantu','perempuan','hantu','hantu','hantu',0,0,'','b3cd5d69057276fb05aa493da0f83617.jpg','','','','','','','','','','','hantu','1111-11-11','hantu','ded7c50287a8ef60a9c9d31c07ef1ed0.jpg','tidak menikah','','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-28 17:36:06
