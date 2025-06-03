<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

$conn = new mysqli("localhost", "root", "", "arami_db");
$result = $conn->query("SELECT * FROM pesanan ORDER BY tanggal_pesan DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin AramiSweets</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <header>
    <h1>Manajemen Pesanan - AramiSweets</h1>
    <nav>
      <a href="index.php">Home</a>
      <a href="gallery.php">Galeri</a>
      <a href="order_form.php">Pesan</a>
      <a href="logout.php" class="logout-btn">Logout</a>
    </nav>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <th>Nama</th>
          <th>Email</th>
          <th>Alamat Pengiriman</th>
          <th>Produk</th>
          <th>Jumlah</th>
          <th>Catatan</th>
          <th>Status</th>
          <th>Tanggal Pemesanan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
          <tr>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['alamat'])) ?></td>
            <td><?= htmlspecialchars($row['produk']) ?></td>
            <td><?= (int)$row['jumlah'] ?></td>
            <td><?= htmlspecialchars($row['catatan']) ?></td>
            <td><?= htmlspecialchars($row['status']) ?></td>
            <td><?= $row['tanggal_pesan'] ?></td>
            <td>
              <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
              <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus pesanan?')">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </main>
</body>
</html>

<?php $conn->close(); ?><?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

$conn = new mysqli("localhost", "root", "", "arami_db");
$result = $conn->query("SELECT * FROM pesanan ORDER BY tanggal_pesan DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin AramiSweets</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <header>
    <h1>Manajemen Pesanan - AramiSweets</h1>
    <nav>
      <a href="index.php">Home</a>
      <a href="gallery.php">Galeri</a>
      <a href="order_form.php">Pesan</a>
      <a href="logout.php" class="logout-btn">Logout</a>
    </nav>
  </header>
  <main>
    <table>
      <thead>
        <tr>
          <th>Nama</th>
          <th>Email</th>
          <th>Alamat Pengiriman</th>
          <th>Produk</th>
          <th>Jumlah</th>
          <th>Catatan</th>
          <th>Status</th>
          <th>Tanggal Pemesanan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
          <tr>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= nl2br(htmlspecialchars($row['alamat'])) ?></td>
            <td><?= htmlspecialchars($row['produk']) ?></td>
            <td><?= (int)$row['jumlah'] ?></td>
            <td><?= htmlspecialchars($row['catatan']) ?></td>
            <td><?= htmlspecialchars($row['status']) ?></td>
            <td><?= $row['tanggal_pesan'] ?></td>
            <td>
              <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
              <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus pesanan?')">Hapus</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </main>
</body>
</html>

<?php $conn->close(); ?>
