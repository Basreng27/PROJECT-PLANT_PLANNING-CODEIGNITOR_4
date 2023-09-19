/*
 Navicat Premium Data Transfer

 Source Server         : LOCAL MySQL
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : penjadwalan_tanaman

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 17/09/2023 08:52:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, 'Administrator', 'admin', '7b7bc2512ee1fedcd76bdc68926d4f7b');

-- ----------------------------
-- Table structure for artikels
-- ----------------------------
DROP TABLE IF EXISTS `artikels`;
CREATE TABLE `artikels`  (
  `id_artikel` int NOT NULL AUTO_INCREMENT,
  `isi_artikel` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_tanaman` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_artikel`) USING BTREE,
  INDEX `id_tanaman`(`id_tanaman` ASC) USING BTREE,
  CONSTRAINT `artikels_ibfk_1` FOREIGN KEY (`id_tanaman`) REFERENCES `tanamans` (`id_tanaman`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of artikels
-- ----------------------------
INSERT INTO `artikels` VALUES (3, '<p class=\"MsoNormal\" style=\"text-indent:36.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">Tomat merupakan tumbuhan yang pertama kali ditemukan di Amerika Selatan, nasih berkerabat dengan terung, kentang dan paprika.Tomat termasuk buah karena strukturnya mempunyai daging dan&nbsp;&nbsp;biji yang aman apabila tertelan. Namun&nbsp;&nbsp;hingga kini masih banyak yang menganggap tomat sebagai sayuran, karena salah satu fungsinya sebagai penyedap dalam masakan.</span><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-indent:36.0000pt;\"><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">Tomat merupakan buah yang memilki warna merah menarik serta kaya akan kandungan vitamin seperti vitamin C. Maka tidak salah kalau tomat sangat bermanfaat menjaga sistem imun tubuh. Tiap 100 gram tomat mengandung kalori 20 kal, protein 1 gram, lemak 0,3 gram, karbohidrat 4,2 gram, kalsium 5 miligram, karoten (vitamin A) 1500 SI, thiamin (vitamin B) 60 mikrogram, asam Askorbat (vitamin C) 40 miligram, fosfor 27 miligram, zat besi 0,5 miligram, potassium 360 miligram</span><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\"><o:p></o:p></span></p>', 3);
INSERT INTO `artikels` VALUES (4, '<p class=\"MsoNormal\"><b><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 11pt;\">Seledri</span></b><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">&nbsp;(</span><i><span style=\"font-family: &quot;Times New Roman&quot;; font-size: 11pt;\">Apium graveolens</span></i><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/L.\" title=\"L.\"><u><span class=\"15\" style=\"font-family: &quot;Times New Roman&quot;;\">L.</span></u></a><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">) adalah&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Sayuran\" title=\"Sayuran\"><u><span class=\"15\" style=\"font-family: &quot;Times New Roman&quot;;\">sayuran</span></u></a><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Daun\" title=\"Daun\"><u><span class=\"15\" style=\"font-family: &quot;Times New Roman&quot;;\">daun</span></u></a><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">&nbsp;dan&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Tumbuhan_obat\" title=\"Tumbuhan obat\"><u><span class=\"15\" style=\"font-family: &quot;Times New Roman&quot;;\">tumbuhan obat</span></u></a><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">&nbsp;yang biasa digunakan sebagai bumbu masakan. Beberapa negara termasuk Jepang, Cina dan Korea mempergunakan bagian tangkai daun sebagai bahan makanan. Di Indonesia tumbuhan ini diperkenalkan oleh penjajah&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Belanda\" title=\"Belanda\"><u><span class=\"15\" style=\"font-family: &quot;Times New Roman&quot;;\">Belanda</span></u></a><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">&nbsp;dan digunakan daunnya untuk menyedapkan&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Sup\" title=\"Sup\"><u><span class=\"15\" style=\"font-family: &quot;Times New Roman&quot;;\">sup</span></u></a><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">&nbsp;atau sebagai&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Lalap\" title=\"Lalap\"><u><span class=\"15\" style=\"font-family: &quot;Times New Roman&quot;;\">lalap</span></u></a><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">. Penggunaan seledri paling lengkap adalah di&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Eropa\" title=\"Eropa\"><u><span class=\"15\" style=\"font-family: &quot;Times New Roman&quot;;\">Eropa</span></u></a><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">: daun, tangkai daun,&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Buah\" title=\"Buah\"><u><span class=\"15\" style=\"font-family: &quot;Times New Roman&quot;;\">buah</span></u></a><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">, dan&nbsp;</span><a href=\"https://id.wikipedia.org/wiki/Umbi\" title=\"Umbi\"><u><span class=\"15\" style=\"font-family: &quot;Times New Roman&quot;;\">umbinya</span></u></a><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">&nbsp;semua dimanfaatkan.</span></p>', 4);
INSERT INTO `artikels` VALUES (5, '<p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">Bayam adalah sejenis sayuran daun yang mengandung vitamin A, B dan C dan zat-zat galian seperti kalsium dan besi. Budidaya bayam efektif dilakukan hingga ketinggian 1000 meter dari permukaan laut. Di Indonesia terdapat dua jenis tanaman bayam (Amaranthus Spp.) yang biasa dibudidayakan para petani.</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\"><br>Pertama, jenis tanaman bayam cabut yang terdiri dari bayam hujau dan bayam merah. Cirinya, lebar daun relatif kecil, untuk jenis bayam hijau warnanya hijau terang agak keputih-putihan, untuk bayam merah warnanya merah hati cenderung gelap. Jenis kedua, bayam yang berdaun lebar atau bayam raja. Warna daunnya hijau tua cenderung keabu-abuan, tumbuh berdiri tegak. Cara panennya bisa dicabut atau dipotong.</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\"><br>Secara metode, budidaya bayam organik mempunyai perlakuan sama dengan budidaya non-organik, perbedaannya pada pemberian jenis pupuk. Sedangkan untuk pengendalian hama, petani biasa menanganinya dengan memperbaiki kesehatan tanaman seperti pemberian pupuk, pengairan dan menjaga kebersihan kebun.</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">&nbsp;</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">Budidaya bayam lebih efektif dilakukan tanpa tahapan persemaian terlebih dahulu. Hal yang perlu diperhatikan adalah tanaman bayam memerlukan cahaya matahari penuh. Suhu ideal berkisar antara 16-20oC, dengan kelembaban udara antara yang sedang. Namun bayam bisa beradaptasi pada suhu panas seperti di Jakarta sepanjang kelembabannya tinggi. Pada musim hujan bayam tidak begitu baik tumbuhnya, daun bayam mudah rusak terkena hujan yang terus-menerus.<br>Berikut ini langkah-langkah melakukan budidaya bayam organik, untuk jenis bayam cabut baik yang berdaun hijau maupun merah.</p>', 5);
INSERT INTO `artikels` VALUES (6, '<p>sad</p>', 7);

-- ----------------------------
-- Table structure for budidayas
-- ----------------------------
DROP TABLE IF EXISTS `budidayas`;
CREATE TABLE `budidayas`  (
  `id_budidaya` int NOT NULL AUTO_INCREMENT,
  `isi_budidaya` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_tanaman` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_budidaya`) USING BTREE,
  INDEX `id_tanaman`(`id_tanaman` ASC) USING BTREE,
  CONSTRAINT `budidayas_ibfk_1` FOREIGN KEY (`id_tanaman`) REFERENCES `tanamans` (`id_tanaman`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of budidayas
-- ----------------------------
INSERT INTO `budidayas` VALUES (2, '<p class=\"MsoNormal\"><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">Pemilihan </span><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">benih,pengolahan tanah,pemupukan,penyemaian,pemangkasan,pemeliharan tanaman,penyulaman,pemasangan ajir,penyemprotan,panen</span><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\"><o:p></o:p></span></p>', 3);
INSERT INTO `budidayas` VALUES (3, '<p class=\"MsoNormal\"><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">pengolahan lahan,penyemaian,pemupukan,penanaman,pemeliharaan tanaman,pengendalian hama,panen,pascapanen</span><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\"><o:p></o:p></span></p><p class=\"MsoNormal\"><b><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nmso-ansi-font-weight:bold;font-size:11.0000pt;\">Saran/info</span></b><b><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nmso-ansi-font-weight:bold;font-size:11.0000pt;\"><o:p></o:p></span></b></p><p class=\"MsoNormal\"><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nfont-size:11.0000pt;\">Pupuk tanah sebelum di tanamin benih menggunakan pupuk Urea+organik, dan setelah tumbuh tunas pakai mpk mutiara</span><b><span style=\"mso-spacerun:\'yes\';font-family:\'Times New Roman\';mso-fareast-font-family:Calibri;\r\nmso-ansi-font-weight:bold;font-size:11.0000pt;\"><o:p></o:p></span></b></p>', 4);
INSERT INTO `budidayas` VALUES (4, NULL, NULL);
INSERT INTO `budidayas` VALUES (5, NULL, NULL);
INSERT INTO `budidayas` VALUES (6, NULL, NULL);
INSERT INTO `budidayas` VALUES (7, '<p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">Penyiapan benih bayam</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\"><br>Benih untuk budidaya bayam disiapkan melalui perbanyakan biji. Benih diambiul dari tanaman bayam yang dipelihara hingga tua berumur sekitar 3 bulan. Apabila tanaman masih muda sudah diambil bijinya, daya simpan benih tidak lama dan tingkat perkecambahan rendah. Benih bayam yang baik bisa disimpan hingga umur satu tahun.<br>Benih bayam tidak memerlukan masa dorman. Jadi, benih yang baru dipanen sebenarnya sudah siap untuk langsung ditanam. Kebutuhan benih untuk budidaya bayam adalah 5-10 kg per hektar, sangat tergantung pada keterampilan menebar.</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">&nbsp;</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\"><strong>PENGOLAHAN&nbsp;</strong><strong>TANAH</strong></p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">Bayam sesuai ditanam berbagai jenis tanah terutama tanah gembur liat ringan dan tanah liat berpasir. Tanah yang kaya dengan bahan organik, mempunyai saluran yang baik dan mempunyai kemasaman tanah di antar 5.5 – 6.5</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">&nbsp;</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">Pertama-tama haluskan tanah dan buat bedengan. Lebar bedangan satu meter dan tinggi 20-30 cm sedangkan panjangnya mengikuti kondisi lahan. Jarak antar bedengan 30 cm. Sebaiknya bedengan membujur dari timur-barat untuk mendapatkan pencahayaan yang maksimal.</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\"><br>Budidaya bayam sensitif dengan keasaman tanah. Apabila derajat keasaman tanah rendah pH kurang dari enam sebaiknya netralkan dengan kapur atau dolomit sebanyak 2-3 ton per hektar. Apabila pH lebih dari 7 netralkan dengan belerang. Tebarkan pupuk kandang, paling baik kotoran ayam, sebanyak 10 ton per hektar lalu diamkan selama 2-3 hari. Kotoran ayam merupakan pupuk kandang yang sangat kaya dengan nitrogen yang sangat dibutuhkan tanaman bayam dan jenis sayuran daun lainnya.</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">&nbsp;</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\"><strong>PERLAKUAN BENIH</strong></p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\"><br>Benih untuk budidaya bayam disiapkan melalui perbanyakan biji. Benih diambil dari tanaman bayam yang dipelihara hingga tua berumur sekitar 3 bulan. Apabila tanaman masih muda sudah diambil bijinya, daya simpan benih tidak lama dan tingkat perkecambahan rendah. Benih bayam yang baik bisa disimpan hingga umur satu tahun.<br>Benih bayam tidak memerlukan masa dorman. Jadi, benih yang baru dipanen sebenarnya sudah siap untuk langsung ditanam. Kebutuhan benih untuk budidaya bayam adalah 5-10 kg per hektar, sangat tergantung pada keterampilan menebar.</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">&nbsp;</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">&nbsp;</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\"><strong>PENANAMAN</strong></p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">Menyediakan bedengan</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">Pupuk dan gemburkan tanah sebelum menyediakan bedengan. Ukuran bedengan ialah 120 cm lebar, 20-30 cm tinggi dan panjang 760 cm. Jarak antara bedengan ialah 46 cm. Buat tiga alur kecil memanjang di permukaan bedengan.</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">&nbsp;</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">Bayam ditanam dengan menggunakan biji benih. karena biji benih bayam berkeadaan halus, gaulkan biji benih dengan pasir sebelum disemai. Kemudian taburkan sama rata ke dalam alur-alur di atas bedengan.Selepas 2-3 hari benih akan berkecambah. Jarakkan mengikut ukuran yaitu 8-10cm antara pokok dan 2-3 cm antara barisan. Sebanyak 6-7 kg biji benih diperlukan untuk 1 hektar. Bayam boleh juga disemai di dalam tapak semaian sebelum di ubah ke bedengan. Sebelum menyemai, gaulkan biji benih dengan racun ulat. Lebih kurang 12 hari selepas menyemai, siram anak benih dengan larutan urea sebanyak 4 gm dalam seliter air.</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">&nbsp;</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">&nbsp;</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\"><strong>PEMELIHARAAN</strong></p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\"><strong>Pemupukan</strong></p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">Pupuk organik seperti tahi ayam boleh digunakan sebagai pupuk dasar. Pupuk ini digaul kedalam batas. Lebih kurang 5 ton meter &nbsp;pupuk ini diperlukan untuk sehektar.&nbsp; Pupuk-pupuk ini ditabur di antara lorong-lorong pokok.</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">Perawatan yang paling penting dalam budidaya bayam adalah pengaturan air, terutama saat awal benih ditebar. Lakukan penyiraman dua kali sehari saat musim kemarau. Jaga selalu kelembaban tanah hingga bayam berkecambah.</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\"><br>Menginjak usia tanaman dua minggu, apabila daun terlihat menguning, berikan pemupukan tambahan. Pemupukan tambahan bisa menggunakan kompos atau kotoran ayam yang telah matang. Atur pemupukan sehemat mungkin untuk menjaga budidaya bayam tetap ekonomis.</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">&nbsp;</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\"><strong>Menyiram</strong></p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">Bayam memerlukan air yang banyak untuk pertembuhannya. Dalam musim panas siram 2 kali sehari. Sungkupan Sungkupan diletakkan di atas bedenganselepas manabur benih atau mengubah. Gunakan pelepah kelapa atau rumput-rumput kering sebagai bahan sungkupan. Sungkupan dapat mempertahankan kehilangan air, pertumbuhan rumput rampai serta memperbaiki struktur serta kesuburan tanah.</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">&nbsp;</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\"><strong>Penyiangan</strong></p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">Setelah bayam bayam berkecambah, siangi gulma atau rumput yang tumbuh bersama kecambah bayam. Gulma akan berebut nutrisi dengan tanaman bayam. Berikut beberapa hama dan penyakit yang kerap menyerang budidaya bayam, yaitu ulat daun, kutu daun, tungau, busuk basah dan karat putih. Penanganannya adalah dengan menjaga kesehatan tanaman dengan penyiraman teratur. Jika sudah meleati ambang ekonomis yakni dengan penggunaan pestisida hayati, untuk pencegahan lakukan budidaya tanaman sehat, mencegah timbulnya jamur dan mempertinggi kekebalan tanaman</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">&nbsp;</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\"><strong>PEMANENAN</strong></p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\">Budidaya bayam bisa dipanen mulai 20 hari setelah tanam atau tinggi tanaman sekitar 20 cm. Dengan pencabutan rata-rata panen yang dihasilkan dalam satu hektar adalah 20 ton. Sedangkan pada budidaya bayam potong biasanya dipanen pada umur 1-1,5 bulan dengan interval pemerikan seminggu sekali.</p><p style=\"color: rgb(0, 0, 0); font-family: helvetica, arial; font-size: 18px; text-align: justify;\"><br>Setelah dipanen cuci dan sortir tanaman. Sebelum dikirim, bayam diikat dengan bilah bambu, setiap 50 ikatan digambungkan dalam satu gabung. Simpan hasil panen budidaya bayam ditempat teduh karena bayam termasuk tanaman yang cepat layu.</p>', 5);
INSERT INTO `budidayas` VALUES (8, '<p>dsfsdf</p>', 7);

-- ----------------------------
-- Table structure for mari_tanam
-- ----------------------------
DROP TABLE IF EXISTS `mari_tanam`;
CREATE TABLE `mari_tanam`  (
  `id_mari_tanam` int NOT NULL AUTO_INCREMENT,
  `dari_tanggal` date NULL DEFAULT NULL,
  `perkiraan_panen` date NULL DEFAULT NULL,
  `id_tanaman` int NULL DEFAULT NULL,
  `id_user` int NULL DEFAULT NULL,
  `bibit` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_mari_tanam`) USING BTREE,
  INDEX `id_tanaman`(`id_tanaman` ASC) USING BTREE,
  INDEX `id_user`(`id_user` ASC) USING BTREE,
  CONSTRAINT `mari_tanam_ibfk_1` FOREIGN KEY (`id_tanaman`) REFERENCES `tanamans` (`id_tanaman`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mari_tanam_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of mari_tanam
-- ----------------------------
INSERT INTO `mari_tanam` VALUES (3, '2023-01-23', '2023-02-20', 4, 2, NULL);
INSERT INTO `mari_tanam` VALUES (4, '2022-01-23', '2023-02-20', 4, 2, NULL);
INSERT INTO `mari_tanam` VALUES (5, '2023-01-23', '2023-05-23', 3, 2, NULL);
INSERT INTO `mari_tanam` VALUES (6, '2023-01-23', '2023-05-23', 3, 2, NULL);
INSERT INTO `mari_tanam` VALUES (7, '2023-01-28', '2023-04-28', 5, 3, NULL);
INSERT INTO `mari_tanam` VALUES (8, '2023-01-28', '2023-02-02', 7, 3, NULL);
INSERT INTO `mari_tanam` VALUES (9, '2023-01-28', '2023-04-28', 5, 2, NULL);
INSERT INTO `mari_tanam` VALUES (10, '2023-08-16', '2023-12-14', 3, 2, NULL);
INSERT INTO `mari_tanam` VALUES (11, '2023-08-17', '2023-12-15', 3, 2, NULL);
INSERT INTO `mari_tanam` VALUES (12, '2023-08-19', '2023-12-17', 3, 2, 3343);
INSERT INTO `mari_tanam` VALUES (13, '2023-08-25', '2023-08-30', 7, 2, 44);

-- ----------------------------
-- Table structure for pupuks
-- ----------------------------
DROP TABLE IF EXISTS `pupuks`;
CREATE TABLE `pupuks`  (
  `id_pupuk` int NOT NULL AUTO_INCREMENT,
  `pupuk_ke` int NULL DEFAULT NULL,
  `waktu_pupuk` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_tanaman` int NULL DEFAULT NULL,
  `lama_pupuk` int NULL DEFAULT NULL,
  `status_pupuk` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_pupuk`) USING BTREE,
  INDEX `id_tanaman`(`id_tanaman` ASC) USING BTREE,
  CONSTRAINT `pupuks_ibfk_1` FOREIGN KEY (`id_tanaman`) REFERENCES `tanamans` (`id_tanaman`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pupuks
-- ----------------------------
INSERT INTO `pupuks` VALUES (1, 1, 'Hari', 3, 10, 1);
INSERT INTO `pupuks` VALUES (2, 2, 'Hari', 3, 20, 1);
INSERT INTO `pupuks` VALUES (4, 6, 'Minggu', 3, 30, NULL);
INSERT INTO `pupuks` VALUES (5, 5, 'Hari', 3, 40, 2);
INSERT INTO `pupuks` VALUES (6, 1, 'Hari', 5, 5, 1);
INSERT INTO `pupuks` VALUES (7, 3, 'Hari', 5, 15, 1);
INSERT INTO `pupuks` VALUES (8, 1, 'Hari', 7, 2, 1);
INSERT INTO `pupuks` VALUES (9, 7, NULL, 3, NULL, NULL);

-- ----------------------------
-- Table structure for semprot
-- ----------------------------
DROP TABLE IF EXISTS `semprot`;
CREATE TABLE `semprot`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `semprot_ke` int NULL DEFAULT NULL,
  `waktu` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `id_tanaman` int NULL DEFAULT NULL,
  `lama` int NULL DEFAULT NULL,
  `status` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id_tanaman`(`id_tanaman` ASC) USING BTREE,
  CONSTRAINT `semprot_ibfk_1` FOREIGN KEY (`id_tanaman`) REFERENCES `tanamans` (`id_tanaman`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of semprot
-- ----------------------------
INSERT INTO `semprot` VALUES (3, 1, 'Hari', 3, 12, 1);
INSERT INTO `semprot` VALUES (4, 2, 'Hari', 3, 12, 2);

-- ----------------------------
-- Table structure for tanamans
-- ----------------------------
DROP TABLE IF EXISTS `tanamans`;
CREATE TABLE `tanamans`  (
  `id_tanaman` int NOT NULL AUTO_INCREMENT,
  `nama_tanaman` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image_tanaman` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lama` int NULL DEFAULT NULL,
  `waktu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `musim` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dari_bulan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sampai_bulan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_tanaman`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tanamans
-- ----------------------------
INSERT INTO `tanamans` VALUES (3, 'Tomat', '1673663785_e9794e7f1c1e24590937.jpg', 4, 'Bulan', 'Semua', 'Masa tanam 4 bulan ,untuk 10x panen. pemupukan sebelum tumbuh tomat 2x. Biasanya di tanam di bulan Agustus/september dan cocok di segala cuaca', 'Februari', 'Mei');
INSERT INTO `tanamans` VALUES (4, 'Seledri', '1673663957_ff5346e29d2fdeb50af0.jpg', 4, 'Minggu', 'Semua', 'Masa tanam 4 bulan, waktu pemupukan tiap 2-3x biasanya ditanam cocok di tanam di bulan Desember dan cocok di cuaca apapun.', 'Agustus', 'September');
INSERT INTO `tanamans` VALUES (5, 'Bayam', '1674866344_f85133de3aef1ddea5cd.jpg', 3, 'Bulan', 'Semua', 'Benih untuk budidaya bayam disiapkan melalui perbanyakan biji. Benih diambiul dari tanaman bayam yang dipelihara hingga tua berumur sekitar 3 bulan. Apabila tanaman masih muda sudah diambil bijinya, daya simpan benih tidak lama dan tingkat perkecambahan r', NULL, NULL);
INSERT INTO `tanamans` VALUES (7, 'bonteng merah', '1674870918_97e6bd015ad5c6514012.jpg', 5, 'Hari', 'Semua Musim', 'jhg', 'September', 'Oktober');
INSERT INTO `tanamans` VALUES (8, 'TEst', '1692236036_ac1eda200030878668a5.jpg', 123, 'Hari', 'Semua Musim', 'asd', NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Administrator', 'admin', '7b7bc2512ee1fedcd76bdc68926d4f7b');
INSERT INTO `users` VALUES (2, 'User 1', 'user', 'ee11cbb19052e40b07aac0ca060c23ee');
INSERT INTO `users` VALUES (3, 'Testing', 'testing', 'ae2b1fca515949e5d54fb22b8ed95575');

SET FOREIGN_KEY_CHECKS = 1;
