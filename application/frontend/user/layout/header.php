<header class="header d-flex">
  <div class="container d-flex justify-content-between align-items-center">
    <div class="logo"></div>
    <div class="menu">
      <a href="./home.php">Home</a>
      <a href="" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dekorasi<i class="fas fa-chevron-down pl-2"></i></a>
      <div class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton">
        <p>Dekorasi</p>
        <a class="dropdown-item" href="./produk.php<?php if (isset($_GET['tanggal'])) {
                                                      echo "?tanggal=$_GET[tanggal]";
                                                    } ?>">Semua Produk</a>
        <?php
        include('../../backend/config/koneksi.php');
        $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
        while ($a = mysqli_fetch_array($kategori)) {
        ?>
          <a class="dropdown-item" href="./produk.php?category=<?= $a['id_kategori'] ?><?php if (isset($_GET['tanggal'])) {
                                                                                          echo "&tanggal=$_GET[tanggal]";
                                                                                        } ?>"><?= $a['kategori'] ?></a>
        <?php } ?>
      </div>
      <a href="./tentang.php">Tentang</a>
      <a href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lainnya<i class="fas fa-chevron-down pl-2"></i></a>
      <div class="dropdown-menu p-3" aria-labelledby="dropdown1">
        <p>Semua</p>
        <a class="dropdown-item" href="./daftar_booking.php">Daftar Booking</a>
        <a class="dropdown-item" href="./galeri.php">Galeri</a>
        <a href="./home.php#kontak">Kontak</a>
      </div>
    </div>
  </div>
</header>
<script src="../../../assets/bootstrap/assets/js/vendor/popper.min.js"></script>
<script src="../../../assets/jquery/jquery.min.js"></script>
<script src="../../../assets/bootstrap/js/bootstrap.js"></script>
<script src="../../../assets/bootstrap/dist/js/bootstrap.bundle.min.js">
</script>