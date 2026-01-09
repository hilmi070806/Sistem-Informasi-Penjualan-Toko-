-- ================================
-- DATABASE: db_penjualan
-- ================================

CREATE DATABASE IF NOT EXISTS db_penjualan;
USE db_penjualan;

-- ================================
-- TABEL PELANGGAN
-- ================================
CREATE TABLE pelanggan (
    id_pelanggan INT AUTO_INCREMENT PRIMARY KEY,
    nama_pelanggan VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    no_hp VARCHAR(15) NOT NULL
);

-- ================================
-- TABEL PRODUK
-- ================================
CREATE TABLE produk (
    id_produk INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100) NOT NULL,
    harga INT NOT NULL,
    stok INT NOT NULL
);

-- ================================
-- TABEL TRANSAKSI
-- ================================
CREATE TABLE transaksi (
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    id_pelanggan INT NOT NULL,
    tanggal DATE NOT NULL,
    CONSTRAINT fk_pelanggan
        FOREIGN KEY (id_pelanggan)
        REFERENCES pelanggan(id_pelanggan)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- ================================
-- TABEL DETAIL TRANSAKSI
-- ================================
CREATE TABLE detail_transaksi (
    id_detail INT AUTO_INCREMENT PRIMARY KEY,
    id_transaksi INT NOT NULL,
    id_produk INT NOT NULL,
    jumlah INT NOT NULL,
    subtotal INT NOT NULL,
    CONSTRAINT fk_transaksi
        FOREIGN KEY (id_transaksi)
        REFERENCES transaksi(id_transaksi)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT fk_produk
        FOREIGN KEY (id_produk)
        REFERENCES produk(id_produk)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- ================================
-- DATA CONTOH (OPSIONAL)
-- ================================

INSERT INTO pelanggan (nama_pelanggan, alamat, no_hp) VALUES
('Andi Saputra', 'Jakarta', '08123456789'),
('Budi Santoso', 'Bekasi', '08234567890');

INSERT INTO produk (nama_produk, harga, stok) VALUES
('Laptop', 7000000, 10),
('Mouse', 150000, 25),
('Keyboard', 300000, 15);

INSERT INTO transaksi (id_pelanggan, tanggal) VALUES
(1, CURDATE()),
(2, CURDATE());

INSERT INTO detail_transaksi (id_transaksi, id_produk, jumlah, subtotal) VALUES
(1, 1, 1, 7000000),
(1, 2, 2, 300000),
(2, 3, 1, 300000);
