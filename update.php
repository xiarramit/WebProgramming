<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

$conn = new mysqli("localhost", "root", "", "arami_db");

$id = (int)$_POST['id'];
$nama = $conn->real_escape_string($_POST['nama']);
$email = $conn->real_escape_string($_POST['email']);
$alamat = $conn->real_escape_string($_POST['alamat']);
$produk = $conn->real_escape_string($_POST['produk']);
$jumlah = (int)$_POST['jumlah'];
$catatan = $conn->real_escape_string($_POST['catatan'] ?? '');
$status = $conn->real_escape_string($_POST['status']);

$sql = "UPDATE pesanan SET 
        nama='$nama',
        email='$email',
        alamat='$alamat',
        produk='$produk',
        jumlah=$jumlah,
        catatan='$catatan',
        status='$status'
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  header("Location: admin.php");
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>