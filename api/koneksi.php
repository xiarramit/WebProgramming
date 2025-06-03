<?php
$host = "localhost";
$port = 3307; // Ubah sesuai dengan port MySQL Anda
$username = "root";
$password = "";
$database = "nama_database";

// Koneksi ke MySQL tanpa memilih database dulu
$koneksi = new mysqli($host, $username, $password, "", $port);
if ($koneksi->connect_error) {
    die(json_encode(["status" => "error", "message" => "Koneksi gagal: " . $koneksi->connect_error]));
}

// Buat database jika belum ada
$koneksi->query("CREATE DATABASE IF NOT EXISTS `$database`");

// Pilih database
$koneksi->select_db($database);

// Buat tabel users jika belum ada
$createTableSQL = "
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nama VARCHAR(100) NOT NULL
    )
";
if (!$koneksi->query($createTableSQL)) {
    die(json_encode(["status" => "error", "message" => "Gagal membuat tabel: " . $koneksi->error]));
}
?>