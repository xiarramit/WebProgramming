<?php
session_start();
$conn = new mysqli("localhost", "root", "", "arami_db");

$username = $_POST['username'];
$password = md5($_POST['password']); // pakai md5 sesuai tabel admin

$result = $conn->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");

if ($result->num_rows > 0) {
  $_SESSION['login'] = true;
  $_SESSION['username'] = $username;
  header("Location: admin.php");
} else {
  echo "<script>alert('Login gagal!'); window.location='login.php';</script>";
}
?>