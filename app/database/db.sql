DROP DATABASE IF EXISTS skripsipajak;
CREATE DATABASE IF NOT EXISTS skripsipajak;

USE skripsipajak;

CREATE TABLE admin (
    id_admin INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nama_admin VARCHAR(50),
    username_admin VARCHAR(50),
    password_admin VARCHAR(32)
);

INSERT INTO admin VALUES
(NULL, 'Administrator', 'admin', MD5('admin'));

CREATE TABLE penduduk (
    nik_penduduk VARCHAR(16) PRIMARY KEY NOT NULL,
    nama_penduduk VARCHAR(50),
    alamat_penduduk VARCHAR(200),
    status_wajib_pajak_penduduk BOOLEAN
);

INSERT INTO penduduk VALUES
('1234567890123451', 'Penduduk 1', 'Jl. Alamat', 0),
('1234567890123452', 'Penduduk 2', 'Jl. Alamat', 0),
('1234567890123453', 'Penduduk 3', 'Jl. Alamat', 0),
('1234567890123454', 'Penduduk 4', 'Jl. Alamat', 0),
('1234567890123455', 'Penduduk 5', 'Jl. Alamat', 0),

('1234567890123456', 'Penduduk 6', 'Jl. Alamat', 0),
('1234567890123457', 'Penduduk 7', 'Jl. Alamat', 0),
('1234567890123458', 'Penduduk 8', 'Jl. Alamat', 0),
('1234567890123459', 'Penduduk 9', 'Jl. Alamat', 0),
('1234567890123450', 'Penduduk 10', 'Jl. Alamat', 0);

CREATE TABLE wilayah (
    id_wilayah INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nama_wilayah VARCHAR(50),
    pajak_bumi INT,
    pajak_bangunan INT,
    tahun INT
);

INSERT INTO wilayah VALUES 
(NULL, 'Wilayah 1', 200000, 200000, 2019),
(NULL, 'Wilayah 2', 200000, 200000, 2019),
(NULL, 'Wilayah 3', 200000, 200000, 2019),
(NULL, 'Wilayah 4', 200000, 200000, 2019);

CREATE TABLE keterangan_blok (
    id_keterangan_blok INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nama_keterangan_blok VARCHAR(200)    
);

INSERT INTO keterangan_blok VALUES
(NULL, 'Suyud (Kronggahan)'),
(NULL, 'Widia (Robahan / Sanggrahan)'),
(NULL, 'Suratmin (Porong)'),
(NULL, 'Suyana (Mejayan)'),
(NULL, 'Dodik (Sumber Soko)');

CREATE TABLE blok (
    id_blok INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    no_blok VARCHAR(50),
    id_keterangan_blok INT,
    FOREIGN KEY (id_keterangan_blok) REFERENCES keterangan_blok(id_keterangan_blok)
);

INSERT INTO blok VALUES 
(NULL, '1',1),
(NULL, '2',1),
(NULL, '3',1),
(NULL, '4',1),
(NULL, '5',3),
(NULL, '6',3),
(NULL, '7',1),
(NULL, '8',2),
(NULL, '9',3),
(NULL, '10',2),
(NULL, '11',2),
(NULL, '12',4),
(NULL, '13',5),
(NULL, '14',5),
(NULL, '15',5),
(NULL, '16',4);

CREATE TABLE kasun (
    id_kasun INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nama_kasun VARCHAR(50),
    alamat_kasun VARCHAR(200),
    id_wilayah INT,
    FOREIGN KEY (id_wilayah) REFERENCES wilayah(id_wilayah)
);

INSERT INTO kasun VALUES
(NULL, 'Kasun 1', 'Jl. Alamat Kasun', 1),
(NULL, 'Kasun 2', 'Jl. Alamat Kasun', 2),
(NULL, 'Kasun 3', 'Jl. Alamat Kasun', 3),
(NULL, 'Kasun 4', 'Jl. Alamat Kasun', 4);

CREATE TABLE pajak (
    nop_pajak VARCHAR(100) NOT NULL PRIMARY KEY,
    nik_penduduk VARCHAR(16),
    id_blok INT,    
    jatuh_tempo DATE,
    tahun_pajak INT,
    total_pajak INT,    
    id_kasun_penarik_pajak INT,
    objek_pajak VARCHAR(1000),
    FOREIGN KEY (nik_penduduk) REFERENCES penduduk(nik_penduduk),
    FOREIGN KEY (id_kasun_penarik_pajak) REFERENCES kasun(id_kasun),
    FOREIGN KEY (id_blok) REFERENCES blok(id_blok)
);

CREATE TABLE transaksi (
    id_transaksi INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    tgl_transaksi DATE,
    total_transaksi INT,
    catatan_transaksi VARCHAR(50),    
    nop_pajak VARCHAR(100),
    FOREIGN KEY (nop_pajak) REFERENCES pajak(nop_pajak)
);