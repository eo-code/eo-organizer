<?php

include "../../backend/config/koneksi.php";

if (isset($_COOKIE["email"]) && $_COOKIE["login"] == "sudah_login") {

  // Get prodouk limit 3
  $galeri = mysqli_query($koneksi, "SELECT * FROM galeri ORDER BY RAND() LIMIT 3 ");
} else {
  // Redirect halaman login
  header("Location: ./signin.php");
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../style/./style.css">
  <link rel="stylesheet" href="../style/./galeri.css">
  <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../../../assets/icon/css/all.css">
  <title>Galeri</title>
</head>

<body>
  <?php include './layout/header.php'; ?>
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
  <div class="galeri mt-5 w-100">
    <div class="container">
      <h1>Galeri</h4>

        <div class="row">
          <?php
          $data_gallery = mysqli_query($koneksi, "SELECT * FROM gallery");
          while ($a = mysqli_fetch_array($data_gallery)) {
          ?>
            <div class="column">
              <img src="../../../assets/images/<?= $a['foto'] ?>" alt="">
            </div>
          <?php } ?>
        </div>
    </div>
  </div>


  <footer class="footer mt-5 w-100 d-flex justify-content-center align-items-center">
    Copyright &copy; 2020
  </footer>
</body>

</html>