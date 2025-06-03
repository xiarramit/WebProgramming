<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

$conn = new mysqli("localhost", "root", "", "arami_db");

$id = (int)$_GET['id'];
$result = $conn->query("SELECT * FROM pesanan WHERE id=$id");
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Edit Pesanan</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <h2>Edit Pesanan</h2>
  <form action="update.php" method="POST" class="edit-form">
    <input type="hidden" name="id" value="<?= $data['id'] ?>" />

    <label>Nama:</label>
    <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required />

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required />

    <label>Alamat Pengiriman:</label>
    <textarea name="alamat" required><?= htmlspecialchars($data['alamat']) ?></textarea>

    <label>Produk:</label>
    <select name="produk" required>
      <option value="Flakers Full Size 175k" <?= $data['produk'] === 'Flakers Full Size 175k' ? 'selected' : '' ?>>Flakers Full Size 175k</option>
      <option value="Flakers Isi 6 75k" <?= $data['produk'] === 'Flakers Isi 6 75k' ? 'selected' : '' ?>>Flakers Isi 6 75k</option>
      <option value="Triffle Chocolate Fullsize 250k" <?= $data['produk'] === 'Triffle Chocolate Fullsize 250k' ? 'selected' : '' ?>>Triffle Chocolate Fullsize 250k</option>
    </select>

    <label>Jumlah:</label>
    <input type="number" name="jumlah" min="1" value="<?= (int)$data['jumlah'] ?>" required />

    <label>Catatan:</label>
    <textarea name="catatan"><?= htmlspecialchars($data['catatan']) ?></textarea>

    <label>Status:</label>
    <select name="status" required>
      <option value="Pending" <?= $data['status'] === 'Pending' ? 'selected' : '' ?>>Pending</option>
      <option value="Diproses" <?= $data['status'] === 'Diproses' ? 'selected' : '' ?>>Diproses</option>
      <option value="Selesai" <?= $data['status'] === 'Selesai' ? 'selected' : '' ?>>Selesai</option>
    </select>

    <button type="submit">Update Pesanan</button>
  </form>
</body>
</html>

<?php $conn->close(); ?>
