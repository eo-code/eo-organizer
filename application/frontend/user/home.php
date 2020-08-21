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
        <div class="col-md-4">
          <div class="card-product">
            <div class="img"></div>
            <h4 class="pl-4 pt-4">Nama Produk</h4>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-product">
            <div class="img"></div>
            <h4 class="pl-4 pt-4">Nama Produk</h4>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-product">
            <div class="img"></div>
            <h4 class="pl-4 pt-4">Nama Produk</h4>
          </div>
        </div>

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
    <div class="container">
      <h2>Kontak Kami</h2>
      <div class="content-contact d-flex justify-content-between mt-5">
        <div class="left mr-5">
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" placeholder="Enter Your Name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Telephone Number</label>
            <input type="email" class="form-control" placeholder="Enter Telephone Number">
          </div>
          <div class="form-group">
            <label for="">Your Message</label>
            <textarea class="form-control" name="message" id="" cols="30" rows="5"></textarea>
          </div>

          <button class="w-100 mt-2">Send Message</button>
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
