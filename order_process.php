<?php
$conn = new mysqli("localhost", "root", "", "arami_db");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$nama = $conn->real_escape_string($_POST['nama']);
$email = $conn->real_escape_string($_POST['email']);
$alamat = $conn->real_escape_string($_POST['alamat']);
$produk = $conn->real_escape_string($_POST['produk']);
$jumlah = (int)$_POST['jumlah'];
$catatan = $conn->real_escape_string($_POST['catatan'] ?? '');

$sql = "INSERT INTO pesanan (nama, email, alamat, produk, jumlah, catatan, status, tanggal)
        VALUES ('$nama', '$email', '$alamat', '$produk', $jumlah, '$catatan', 'Pending', NOW())";

if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Pesanan berhasil dikirim!'); window.location='index.php';</script>";
} else {
  echo "Error: " . $conn->error;
}
$conn->close();
?>