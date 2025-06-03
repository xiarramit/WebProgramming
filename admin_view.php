<h2>Manajemen Pesanan</h2>
<a href="?page=order">Tambah Pesanan Baru</a>
<table>
  <thead>
    <tr>
      <th>Nama</th>
      <th>Email</th>
      <th>Alamat</th>
      <th>Produk</th>
      <th>Jumlah</th>
      <th>Catatan</th>
      <th>Status</th>
      <th>Tanggal Pemesanan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $conn = new mysqli("localhost", "root", "", "arami_db");

    // Jika kolom 'tanggal_pesan' sudah benar-benar ada, query ini akan bekerja
    $result = $conn->query("SELECT * FROM pesanan ORDER BY tanggal_pesan DESC");

    while($row = $result->fetch_assoc()) {
      echo "<tr>
        <td>{$row['nama']}</td>
        <td>{$row['email']}</td>
        <td>{$row['alamat']}</td>
        <td>{$row['produk']}</td>
        <td>{$row['jumlah']}</td>
        <td>{$row['catatan']}</td>
        <td>{$row['status']}</td>
        <td>{$row['tanggal_pesan']}</td>
        <td>
          <a href='edit.php?id={$row['id']}'>Edit</a> |
          <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Hapus?\")'>Hapus</a>
        </td>
      </tr>";
    }
    ?>
  </tbody>
</table>