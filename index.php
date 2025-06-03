<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AramiSweets</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="<?= ($page === 'login') ? 'login-page' : '' ?>">
  <header>
    <h1>AramiSweets</h1>
    <nav>
      <a href="index.php">Home</a>
      <a href="order_form.php">Pesan</a>
      <a href="login.php">Login Admin</a>
    </nav>
  </header>
  <main>
    <?php
      session_start();
      $page = $_GET['page'] ?? 'home';
      if ($page === 'order') {
        include 'order_form.php';
      } elseif ($page === 'admin') {
        if (isset($_SESSION['login'])) {
          include 'admin_view.php';
        } else {
          echo "<p>Silakan login sebagai admin terlebih dahulu.</p>";
        }
      } elseif ($page === 'login') {
        include 'login.php';
      } else {
        echo '<section class="hero">
                <h2>Selamat datang di AramiSweets</h2>
                <p>Tempatnya kue manis dan lezat!</p>
                <a class="btn" href="order_form.php">Pesan Sekarang</a>
              </section>';

        echo '<section class="about">
                <h2>Anggota Kelompok</h2>
                <ul>
                  <li>Michelle Munayang - 230211060008</li>
                  <li>Haffissa Aszahrra Mastur - 230211060005</li>
                  <li>Evan Vick Mokale - 230211060028</li>
                </ul>
              </section>';

        echo '<section class="contact">
                <h2>Kontak Kami</h2>
                <p>Hubungi kami melalui Instagram @arami.sweets atau email aramisweets@gmail.com</p>
              </section>';
      }
    ?>
  </main>
</body>
</html>
