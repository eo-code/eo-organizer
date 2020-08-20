<?php
// Include file koneksi database
include '../../backend/config/koneksi.php';

// Mengambil daftar booking yang masih on Process
$daftarBooking = mysqli_query($koneksi, "SELECT * FROM booking LEFT JOIN produk ON booking.id_product=produk.id_produk WHERE booking.Status = 'Book' ");

// Mengambil daftar booking yang sudah selesai
$daftarBookingSelesai = mysqli_query($koneksi, "SELECT * FROM booking LEFT JOIN produk ON booking.id_product=produk.id_produk WHERE booking.Status = 'SELESAI' ");
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
      <a href="halamanAdmin.php" class="item">
        <i class="box icon"></i> Product
      </a>
      <a href="halamanAdmin.php?p=invoice" class="item">
        <i class="payment icon"></i> Kategori
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
                  <th>Paket Utama</th>
                  <th>Paket Tambahan</th>
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
                    <td><?= $booking['nama_produk']; ?></td>
                    <td><?= $booking['keterangan']; ?></td>
                    <td><?= $booking['total_harga']; ?></td>
                    <td><?= $booking['Status']; ?></td>
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
                  <th>Paket Utama</th>
                  <th>Paket Tambahan</th>
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
                    <td><?= $bookingSelesai['nama_produk']; ?></td>
                    <td><?= $bookingSelesai['keterangan']; ?></td>
                    <td><?= $bookingSelesai['total_harga']; ?></td>
                    <td><?= $bookingSelesai['Status']; ?></td>
                    <td>
                      <a href="../../backend/admin/booking/hapusBooking.php?id=<?= $bookingSelesai['id_booking']; ?>">
                        <button class="ui blue tiny button">Hapus</button>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
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

      $('.ui.accordion')
        .accordion();
    </script>
</body>

</html>