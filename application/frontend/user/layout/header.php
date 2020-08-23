<header class="header d-flex">
  <div class="container d-flex justify-content-between align-items-center">
    <div class="logo mt-2">
      <h4>Naya's Art & Crafts</h4>
      <p>Specialis Paper Flower</p>
    </div>
    <div class="menu d-flex">
      <a href="./home.php">Home</a>
      <div class="dropdown">
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
      </div>
      <a href="./tentang.php">Tentang</a>
      <div class="dropdown">
        <a href="" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lainnya<i class="fas fa-chevron-down pl-2"></i></a>
        <div class="dropdown-menu p-3" aria-labelledby="dropdown1">
          <p>Semua</p>
          <a class="dropdown-item" href="./daftar_booking.php">Daftar Booking</a>
          <a class="dropdown-item" href="./galeri.php">Galeri</a>
          <a class="dropdown-item" href="./home.php#kontak">Kontak</a>
        </div>
      </div>
    </div>
  </div>
</header>
<script src="../../../assets/bootstrap/assets/js/vendor/popper.min.js"></script>
<script src="../../../assets/jquery/jquery.min.js"></script>
<script src="../../../assets/bootstrap/js/bootstrap.js"></script>
<script src="../../../assets/bootstrap/dist/js/bootstrap.bundle.min.js">
</script>