<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/./style.css">
  <link rel="stylesheet" href="../style/./daftar_booking.css">
  <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../../../assets/icon/css/all.css">
  <script src=""></script>
  <title>Daftar Booking</title>
</head>

<body>
  <?php include './layout/header.php' ?>
  <div class="btn-fix1">
    <a href="./keranjang.php">
      <div class="circle d-flex justify-content-center align-items-center">
        <i class="fas fa-shopping-cart"></i>
      </div>
      <div class="name d-flex justify-content-center align-items-center">Keranjang</div>
    </a>
  </div>
  <div class="btn-fix2">
    <a href="../../backend/user/logout.php">
      <div class="circle d-flex justify-content-center align-items-center">
        <i class="fas fa-sign-out-alt"></i>
      </div>
      <div class="name d-flex justify-content-center align-items-center">Sign Out</div>
    </a>
  </div>
  <div class="hero-daftar-booking w-100">
    <div class="shape"></div>
    <div class="container d-flex align-items-center justify-content-center">
      <div class="title">
        <h1 class="text-center">Daftar Booking</h1>
      </div>
    </div>
  </div>
  <form action="" method="get">
    <div class="daftar-booking">
      <div class="container">
        <div class="date w-100 d-flex mt-4 justify-content-between align-items-center">
          <input type="number" placeholder="Masukkan Tahun    Contoh : 2017" name="tahun" id="date" maxlength="4" class="form-control" onKeyPress="if(this.value.length==4) return false;">
          <button type="submit"><i class="fa fa-search"></i></button>
        </div>
  </form>

  <div class="table-data-booking mt-5">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Kode Booking</th>
          <th scope="col">Nama</th>
          <th scope="col">Tanggal</th>
          <th scope="col">No Handphone</th>
          <th scope="col">Email</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Produk</th>

        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_GET['tahun']) && !!$_GET["tahun"]) {
          $no = 1;
          $data = mysqli_query($koneksi, "SELECT * FROM booking LEFT JOIN produk ON booking.id_product=produk.id_produk WHERE tanggal LIKE '$_GET[tahun]%'");
          while ($booking = mysqli_fetch_array($data)) {
        ?>
            <tr>
              <th scope="row">
                <?= $no++ ?>
              </th>
              <td><?= $booking['kode_booking'] ?></td>
              <td><?= $booking['nama_lengkap'] ?></td>
              <td><?= $booking['tanggal'] ?></td>
              <td><?= $booking['no_hp'] ?></td>
              <td><?= $booking['email'] ?></td>
              <td><?= $booking['catatan'] ?></td>
              <td><?= $booking['nama_produk'] ?></td>
            </tr>
          <?php }
        } else { ?>
          <tr>
            <td colspan="8" style="text-align: center;"><span>Silahkan Masukkan tahun terlebih dahulu</span></td>
          </tr>
        <?php  } ?>
      </tbody>
    </table>
  </div>
  </div>
  </div>


</body>

</html>