-- Buat database 
CREATE DATABASE IF NOT EXISTS arami_db;
USE arami_db;

-- Buat tabel admin
CREATE TABLE IF NOT EXISTS admin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL
);

-- Tambahkan admin default
INSERT INTO admin (username, password)
VALUES ('admin', MD5('admin123'));

-- Buat tabel pesanan (dengan semua kolom yang diperlukan)
CREATE TABLE IF NOT EXISTS pesanan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  alamat TEXT NOT NULL,
  produk VARCHAR(100) NOT NULL,
  jumlah INT NOT NULL,
  catatan TEXT,
  status VARCHAR(20) NOT NULL DEFAULT 'Pending',
  tanggal DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  tanggal_pesan DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);