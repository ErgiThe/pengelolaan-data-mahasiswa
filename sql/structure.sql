CREATE DATABASE `pengelolaan_data_mhs`;

USE `pengelolaan_data_mhs`;

CREATE TABLE `mahasiswa` (
  `nim` int NOT NULL PRIMARY KEY,
  `nama` varchar(32) NOT NULL,
  `kelas` varchar(5) DEFAULT NULL
);

CREATE TABLE `pengelola` (
  `id` int NOT NULL PRIMARY KEY,
  `nama` varchar(32) DEFAULT NULL,
  `password` varchar(255) NOT NULL
);

-- LOGIN DEFAULT:
-- id       = 10124146
-- password = admin123

INSERT INTO `pengelola` (`id`,`nama`,`password`) VALUES (10124146,"admin","$2y$10$oci803VfrZ8ofGDgSRt5Qe1rdGjU3o1xmm3ebyWg1YyMeSI7NeyMK");