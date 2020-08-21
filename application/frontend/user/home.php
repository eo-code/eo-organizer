<?php

function url()
{
  if (isset($_SERVER['HTTPS'])) {
    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
  } else {
    $protocol = 'http';
  }
  return $protocol . "://" . $_SERVER['HTTP_HOST'];
}

include "../../backend/koneksi.php";

if (isset($_COOKIE["email"]) && $_COOKIE["login"] == "sudah_login") {

  // Get prodouk limit 3
  $produk = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY RAND() LIMIT 3 ");
} else {
  // Redirect halaman login
  header("Location: ./signin.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/./style.css">
  <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.css">
  <script src="https://kit.fontawesome.com/e6f4490556.js" crossorigin="anonymous"></script>
  <title>Home</title>

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
    <a href="./signout.php">
      <div class="circle d-flex justify-content-center align-items-center">
        <i class="fas fa-sign-out-alt"></i>
      </div>
      <div class="name d-flex justify-content-center align-items-center">Sign Out</div>
    </a>
  </div>

  <div class="hero">
    <div class="shape-blur"></div>
    <div class="container">
      <h1>Paper Flower Backdrop</h1>
      <h2>Decoration</h2>
    </div>
  </div>

  <div class="mini-produk mt-5">
    <div class="container">
      <h2>Produk Kami</h2>

      <div class="wrap-card row mt-5">

        <?php
        while ($listProduk = mysqli_fetch_array($produk)) :
        ?>

          <div class="col-md-4">
            <div class="card-product d-flex flex-column justify-content-center">
              <div class="img d-flex justify-content-center"><img src="../../../assets/images/<?= $listProduk['gambar'] ?>" alt="">
              </div>
              <h4 class="pt-4 text-center"><?= $listProduk["nama_produk"]; ?></h4>
            </div>
          </div>

        <?php endwhile; ?>

        <div class="btn-more w-100 d-flex justify-content-center mt-5">
          <a href="./produk.php" class="text-center">
            <button>Lihat Selengkapnya <i class="fas fa-arrow-right pl-3"></i></button>
          </a>
        </div>

      </div>
    </div>
  </div>

  <div class="contact mt-5 w-100">
    <div class="shape"></div>
    <div class="container" id="kontak">
      <h2>Kontak Kami</h2>
      <form action="../../backend/user/pengirimEmail.php" method="post">
        <div class="content-contact d-flex justify-content-between mt-5">
          <div class="left mr-5">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" name="nama" placeholder="Enter Your Name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Telephone Number</label>
              <input type="tel" name="no_hp" class="form-control" placeholder="Enter Telephone Number">
            </div>
            <div class="form-group">
              <label for="">Your Message</label>
              <textarea class="form-control" name="message" id="" cols="30" rows="5"></textarea>
            </div>

            <button class="w-100 mt-2" type="submit">Send Message</button>
      </form>
    </div>
    <div class="right p-4">
      <h4>Contact Details</h4>
      <div class="wrap-info mt-4 d-flex flex-column">
        <div class="info d-flex align-items-center">
          <div class="circle d-flex align-items-center justify-content-center">
            <i class="fas fa-user"></i>
          </div>
          <div class="name d-flex align-items-center">
            <p class="pl-4 pt-2">Naya</p>
          </div>
        </div>
        <div class="info d-flex align-items-center">
          <div class="circle d-flex align-items-center justify-content-center">
            <i class="fas fa-map-marked-alt"></i>
          </div>
          <div class="name d-flex align-items-center">
            <p class="pl-4 pt-2">Sp 1 Kabupaten Sorong</p>
          </div>
        </div>
        <div class="info d-flex align-items-center">
          <div class="circle d-flex align-items-center justify-content-center">
            <i class="fas fa-envelope"></i>
          </div>
          <div class="name d-flex align-items-center">
            <p class="pl-4 pt-2">nayapaperflower@gmail.com</p>
          </div>
        </div>

        <div class="info d-flex align-items-center">
          <div class="circle d-flex align-items-center justify-content-center">
            <i class="fas fa-phone-alt"></i>
          </div>
          <div class="name d-flex align-items-center">
            <p class="pl-4 pt-2">082238224545</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>

  <footer class="footer mt-5 w-100 d-flex justify-content-center align-items-center">
    Copyright &copy; 2020
  </footer>

</body>

</html>