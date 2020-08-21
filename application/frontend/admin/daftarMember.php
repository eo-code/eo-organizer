<?php
// Include file koneksi database
include '../../backend/config/koneksi.php';
$username = $_COOKIE['username'];
if (!isset($username)) {
  header('location:login.php');
}
// Mengambil daftar member
$daftarMember = mysqli_query($koneksi, "SELECT * FROM member");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Member</title>
  <link rel="stylesheet" href="../../../assets/semantic/semantic.min.css">
  <link rel="stylesheet" href="../../../assets/semantic/style.css">
</head>

<body>

  <div class="ui top attached demo menu">
    <a class="item">
      <i class="sidebar icon"></i> Menu
    </a>

  </div>
  <div class="ui bottom attached segment">
    <div class="ui inverted labeled icon left inline vertical demo sidebar menu">
      <a href="daftarMember.php" class="item">
        <i class="address card icon"></i> Member
      </a>
      <a href="daftarBooking.php" class="item">
        <i class="book icon"></i> Booking
      </a>
      <a href="produk.php" class="item">
        <i class="shopping cart icon"></i> Product
      </a>
      <a href="kategori.php" class="item">
        <i class="th large icon"></i> Kategori
      </a>
      <a href="gallery.php" class="item">
        <i class="image icon"></i> Gallery
      </a>
      <a href="akun_admin.php" class="item">
        <i class="user circle icon"></i> Account
      </a>
      <a href="../../backend/admin/akun_admin/logout.php" class="item">
        <i class="sign out icon"></i> Logout
      </a>
    </div>
    <div class="pusher">
      <div class="ui basic segment">
        <div class="main ui fluid container mt-20">
          <div class="ui center aligned header">
            Daftar Member
          </div>
          <div class="ui attached segment">
            <table class="ui very basic table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No HP</th>
                  <th>Alamat</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;

                // Melooping daftar booking
                while ($member = mysqli_fetch_array($daftarMember)) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $member['nama']; ?></td>
                    <td><?= $member['email']; ?></td>
                    <td><?= $member['no_hp']; ?></td>
                    <td><?= $member['alamat']; ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <script src="../../../assets/jquery/jquery.min.js"></script>
    <script src="../../../assets/semantic/semantic.min.js"></script>
    <script>
      $('.ui.sidebar').sidebar({
          context: $('.bottom.segment')
        })
        .sidebar('attach events', '.menu .item');

      $('.ui.accordion')
        .accordion();
    </script>
</body>

</html>