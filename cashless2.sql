--
-- Database: cashless
--
/* * / DROP DATABASE cashless;
 CREATE DATABASE cashless; /* */
 USE id9050021_cashless;
-- USE cashless;

/* * / 
DROP TABLE transaksi; 
DROP TABLE kod_transaksi; 
DROP TABLE kod_jenistransaksi; 
DROP TABLE akaun_pengguna; 
DROP TABLE maklumat_pengguna; 
DROP TABLE kod_jenispengguna; 
DROP TABLE tracking; /* */
-- --------------------------------------------------------

--
-- Table structure for table user_account
--
CREATE TABLE kod_jenispengguna(
  kod_pengguna VARCHAR(12) NOT NULL,
  jenis_pengguna VARCHAR(10) NOT NULL,
  jabatan VARCHAR(40) NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (kod_pengguna)
);

CREATE TABLE maklumat_pengguna (
  ic_pengguna VARCHAR(12) NOT NULL,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(40) NOT NULL,
  no_telefon VARCHAR(20),
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (ic_pengguna)
);

CREATE TABLE akaun_pengguna (
  ic_pengguna VARCHAR(12) NOT NULL,
  kod_pengguna VARCHAR(10) NOT NULL,
  pwd VARCHAR(40) NOT NULL,
  status_aktif VARCHAR(5),
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (ic_pengguna,kod_pengguna),
  FOREIGN KEY (kod_pengguna) REFERENCES kod_jenispengguna (kod_pengguna),
  FOREIGN KEY (ic_pengguna) REFERENCES maklumat_pengguna (ic_pengguna)
);

--
-- Dumping data for table user_account
--

INSERT INTO kod_jenispengguna (kod_pengguna, jenis_pengguna, jabatan) VALUES
('1', 'user', NULL),
('2', 'admin', 'Bendahari'),
('3', 'sub-admin', 'JPP');

INSERT INTO maklumat_pengguna (ic_pengguna, nama, email,no_telefon) VALUES
('941013115434', 'Amir Fitri', 'amir@unisza.edu.my', '0109668469'),
('941013115435', 'Shahrul Haniff', 'shahrul@gmail.com', '0109668468'),
('941013112203', 'Ahmad', 'ahmad@gmail.com', '0179372203'),
('941013115436', 'Bendahari UniSZA', 'bendahari@unisza.edu.my', '0109668466');

INSERT INTO akaun_pengguna (ic_pengguna,kod_pengguna,pwd,status_aktif) VALUES
('941013115435', '1', '202cb962ac59075b964b07152d234b70','yes'),
('941013112203', '1', '202cb962ac59075b964b07152d234b70','yes'),
('941013115434', '3', '202cb962ac59075b964b07152d234b70','no'),
('941013115436', '2', '202cb962ac59075b964b07152d234b70','yes');

-- --------------------------------------------------------

--
-- Table structure for table transaksi
--

CREATE TABLE kod_jenistransaksi (
  id_jenistransaksi VARCHAR(16) NOT NULL,
  jenistransaksi VARCHAR(100) NOT NULL,
  jabatan VARCHAR(40) NOT NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_jenistransaksi)
  );

CREATE TABLE kod_transaksi (
  id_kodtransaksi INT(10) NOT NULL AUTO_INCREMENT,
  kod_pengguna VARCHAR(10) NOT NULL,
  no_sb VARCHAR(100) NOT NULL,
  description VARCHAR(300) NOT NULL,
  tarikhbuka DATE NOT NULL,
  tarikhtutup DATE NOT NULL,
  jam TIME NOT NULL,
  harga FLOAT(10,2) NOT NULL,
  id_jenistransaksi VARCHAR(16) NOT NULL,
  kelas VARCHAR(100) NOT NULL,
  keyin_by VARCHAR(100) NOT NULL,
  tarikh_keyin DATETIME NOT NULL,
  edit_by VARCHAR(100) NULL,
  tarikh_edit DATETIME NULL,
  dttaklimat DATETIME NULL,
  tempatlwtntapak VARCHAR(100) NULL,
  sulit VARCHAR(1) DEFAULT 'T', 
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_kodtransaksi),
  FOREIGN KEY (kod_pengguna) REFERENCES kod_jenispengguna (kod_pengguna),
  FOREIGN KEY (id_jenistransaksi) REFERENCES kod_jenistransaksi (id_jenistransaksi)
);



CREATE TABLE transaksi (
  id_transaksi INT(10) NOT NULL AUTO_INCREMENT,
  ic_pengguna VARCHAR(12) NOT NULL,
  id_kodtransaksi INT(10) NOT NULL,
  id_jenistransaksi VARCHAR(16) NOT NULL,
  tarikh DATETIME NOT NULL,
  jumlah FLOAT(10,2) NOT NULL,
  daripada VARCHAR(12) NOT NULL,
  kepada VARCHAR(12) NOT NULL,
  statustransaction VARCHAR(50) NOT NULL,
  norujukan VARCHAR(50) NULL,
  merchantid VARCHAR(50) NULL,
  jeniskad VARCHAR(50)  NULL,
  status_dokumen VARCHAR(50) NOT NULL,
  doc_acceptby VARCHAR(50) NULL,
  doc_acceptby_nama VARCHAR(50) DEFAULT NULL COMMENT 'nama orang yang ambil',
  doc_giveby VARCHAR(50) NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_transaksi),
  FOREIGN KEY (ic_pengguna) REFERENCES akaun_pengguna (ic_pengguna),
  FOREIGN KEY (id_kodtransaksi) REFERENCES kod_transaksi (id_kodtransaksi),
  FOREIGN KEY (id_jenistransaksi) REFERENCES kod_jenistransaksi (id_jenistransaksi)
);

--
-- Dumping data for table transaksi
--

-- INSERT INTO transaksi (jenis_transaksi, tarikh, jumlah, ic_pengguna, daripada, kepada) VALUES ('a2u', '2019-03-21 06:12:16', 17000.55, '941013115435', '941013115436', '941013115435');
INSERT INTO `kod_jenistransaksi` (`id_jenistransaksi`, `jenistransaksi`, `jabatan`) VALUES
('SB', 'Sebut Harga', 'JPP');

INSERT INTO `kod_transaksi` (`id_kodtransaksi`, `kod_pengguna`, `no_sb`, `description`, `tarikhbuka`, `tarikhtutup`, `jam`, `harga`, `id_jenistransaksi`, `kelas`, `tempatlwtntapak`, `keyin_by`, `tarikh_keyin`, `edit_by`, `tarikh_edit`) VALUES
(1, '3', 'IDSB001', 'Contoh butiran sebut harga', '2019-03-01', '2019-03-30', '00:00:00', 17000.39, 'SB',  'CIDB Gred G2 Kategori ME Pengkhususan M04', 'Bangunan JPP Universiti Sultan Zainal Abidin, Kampus Gong Badak, Kuala Nerus', 'IC Pegawai keyin', '2019-03-06 11:27:27', NULL, NULL),
(2, '3', 'PEMB(E)SH/66/2018', 'CADANGAN KERJA-KERJA PEMASANGAN FEEDER PILLAR UTAMA TERMASUK KABEL 3 FASA KE KANDANG KAMBING SERTA KERJA-KERJA BERKAITAN DI LADANG PASIR AKAR UNISZA BESUT, TEENGGANU DARUL IMAN', '2019-03-01', '2019-03-31', '12:00:00', 30.00, 'SB', 'CIDB Gred G2 Kategori ME Pengkhususan M04', 'Bangunan JPP Universiti Sultan Zainal Abidin, Kampus Gong Badak, Kuala Nerus', 'PENYELARAS', '2019-03-01 13:00:00', NULL, NULL);


INSERT INTO `transaksi` (`id_transaksi`, `ic_pengguna`, `id_kodtransaksi`, `id_jenistransaksi`, `tarikh`, `jumlah`, `daripada`, `kepada`, `statustransaction`, `norujukan`, `merchantid`, `jeniskad`, `status_dokumen`, `doc_acceptby`, `doc_acceptby_nama`, `doc_giveby`, `created_date`) VALUES
(2, '941013115435', 2, 'SB', '2019-04-23 12:48:15', 30.00, '941013115435', '941013115436', 'Approved', '2090001301', '10701100006', 'MC', 'NO', NULL, NULL, NULL, '2019-04-23 12:48:15'),
(3, '941013112203', 2, 'SB', '2019-04-23 12:54:16', 30.00, '941234111234', '941013115436', 'Approved', '2090001302', '10701100006', 'MC', 'NO', NULL, NULL, NULL, '2019-04-23 12:54:16');

CREATE TABLE site_visit (
  ic_pengguna VARCHAR(12) NOT NULL,
  id_kodtransaksi INT(10) NOT NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (ic_pengguna,id_kodtransaksi));

CREATE TABLE tracking (
  id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  id_jenistransaksi VARCHAR(16) NOT NULL,
  jabatan VARCHAR(40) NOT NULL,
  description VARCHAR(300) NULL,
  tarikhbuka DATE NOT NULL,
  tarikhtutup DATE NOT NULL,
  harga FLOAT(10,2) NOT NULL,
  tindakan VARCHAR(15) NULL,
  edit_by VARCHAR(100) NULL,
  created_date TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
  );