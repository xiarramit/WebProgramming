<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

$id = (int)$_GET['id'];

$conn = new mysqli("localhost", "root", "", "arami_db");
$conn->query("DELETE FROM pesanan WHERE id=$id");
$conn->close();

header("Location: admin.php");
exit;
?>