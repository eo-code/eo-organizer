<?php
// Include file koneksi database
include '../../backend/config/koneksi.php';
$username = $_COOKIE['username'];
if (!isset($username)) {
  header('location:login.php');
}
// Mengambil daftar booking yang masih on Process
$daftarBooking = mysqli_query($koneksi, "SELECT * FROM booking LEFT JOIN produk ON booking.id_product=produk.id_produk
LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE booking.status = 'Booked' ");

// Mengambil daftar booking yang sudah selesai
$daftarBookingSelesai = mysqli_query($koneksi, "SELECT * FROM booking LEFT JOIN produk ON booking.id_product=produk.id_produk
LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE booking.status = 'Finish' ");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Booking</title>
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
            Daftar Booking
          </div>
          <div class="ui attached segment">
            <table class="ui very basic table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No HP</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Keterangan</th>
                  <th>Total Harga</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;

                // Melooping daftar booking
                while ($booking = mysqli_fetch_array($daftarBooking)) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $booking['nama_lengkap']; ?></td>
                    <td><?= $booking['email']; ?></td>
                    <td><?= $booking['no_hp']; ?></td>
                    <td><?= $booking['nama_produk']; ?></td>
                    <td><?= $booking['kategori']; ?></td>
                    <td><?= $booking['catatan']; ?></td>
                    <td><?= $booking['total_harga']; ?></td>
                    <td><?= $booking['status']; ?></td>
                    <td>
                      <a href="../../backend/admin/booking/selesaikanBooking.php?id=<?= $booking['id_booking']; ?>">
                        <button class="ui blue tiny button">Selesai</button>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="main ui fluid container mt-20">
          <div class="ui center aligned header">
            Booking Terselesaikan
          </div>
          <div class="ui attached segment">
            <table class="ui very basic table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No HP</th>
                  <th>Nama Produk</th>
                  <th>Kategori</th>
                  <th>Keterangan</th>
                  <th>Total Harga</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;

                // Melooping daftar booking
                while ($bookingSelesai = mysqli_fetch_array($daftarBookingSelesai)) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $bookingSelesai['nama_lengkap']; ?></td>
                    <td><?= $bookingSelesai['email']; ?></td>
                    <td><?= $bookingSelesai['no_hp']; ?></td>
                    <td><?= $bookingSelesai['nama_produk']; ?></td>
                    <td><?= $bookingSelesai['kategori']; ?></td>
                    <td><?= $bookingSelesai['catatan']; ?></td>
                    <td><?= $bookingSelesai['total_harga']; ?></td>
                    <td><?= $bookingSelesai['status']; ?></td>
                    <td>
                      <?php if (mysqli_num_rows($daftarBookingSelesai) == 1) { ?>
                        <div class="ui red tiny button mt-20 button btn-warning" tabindex="0">Hapus</div>
                      <?php } else { ?>
                        <a href="../../backend/admin/booking/hapusBooking.php?id=<?= $bookingSelesai['id_booking']; ?>">
                          <button class="ui blue tiny button">Hapus</button>
                        </a>
                      <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="ui small modal warning">
      <div class="header" style="text-align: center; color:red;">Perhatian!!!</div>
      <div class="content">
        <div class="ui form">
          <div class="field" style="text-align: center;">
            <h3>Booking tidak dapat di hapus</h3>
          </div>
        </div>
      </div>
    </div>
    <!-- Booking Yang Selesai -->
    <!-- Booking Yang Selesai -->

    <script src="../../../assets/jquery/jquery.min.js"></script>
    <script src="../../../assets/semantic/semantic.min.js"></script>
    <script>
      $('.ui.sidebar').sidebar({
          context: $('.bottom.segment')
        })
        .sidebar('attach events', '.menu .item');
      $('.btn-warning').on('click', function() {
        $('.ui.modal.small.warning')
          .modal("show");
      })
      $('.ui.accordion')
        .accordion();
    </script>
</body>

</html>