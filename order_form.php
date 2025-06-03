<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Pesan AramiSweets</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <header>
    <h1>Pesan AramiSweets</h1>
    <nav>
      <a href="index.php">Home</a>
      <a href="order_form.php">Pesan</a>
      <a href="login.php">Login Admin</a>
    </nav>
  </header>

  <main>
    <form action="order_process.php" method="POST" class="order-form">
      <label>Nama:</label>
      <input type="text" name="nama" placeholder="Nama Anda" required />

      <label>Email:</label>
      <input type="email" name="email" placeholder="Email Anda" required />

      <label>Alamat Pengiriman:</label>
      <textarea name="alamat" placeholder="Alamat lengkap pengiriman" required></textarea>

      <label>Produk:</label>
      <select name="produk" required>
        <option value="">-- Pilih Produk --</option>
        <option value="Flakers Full Size 175k">Flakers Full Size 175k</option>
        <option value="Flakers Isi 6 75k">Flakers Isi 6 75k</option>
        <option value="Triffle Chocolate Fullsize 250k">Triffle Chocolate Fullsize 250k</option>
      </select>

      <label>Jumlah:</label>
      <input type="number" name="jumlah" placeholder="Jumlah" min="1" required />

      <label>Catatan (Opsional):</label>
      <textarea name="catatan" placeholder="Catatan tambahan..."></textarea>

      <button type="submit">Pesan Sekarang</button>
    </form>
  </main>
</body>
</html>