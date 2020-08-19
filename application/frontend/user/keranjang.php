<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/./style.css">
  <link rel="stylesheet" href="../style/./keranjang.css">
  <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.css">
  <script src="https://kit.fontawesome.com/e6f4490556.js" crossorigin="anonymous"></script>
  <title>Keranjang</title>
</head>
<body>
  
  <?php include './layout/header.php'; ?>

  <div class="keranjang mt-5">
    <div class="container">
      <h2>Keranjang</h2>

      <div class="wrap-card-keranjang row mt-5">
        <div class="col-md-6 col-12">
          <div class="card-keranjang w-100 d-flex justify-content-between">
            <div class="left">
              <div class="wrap-img"></div>
            </div>
            <div class="right d-flex flex-column justify-content-around">
              <h2>Nama Produk</h2>
              <p>1</p>
              <p>Rp. 200.000 </p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-12">
          <div class="card-keranjang w-100 d-flex justify-content-between">
            <div class="left">
              <div class="wrap-img"></div>
            </div>
            <div class="right d-flex flex-column justify-content-around">
              <h2>Nama Produk</h2>
              <p>1</p>
              <p>Rp. 200.000 </p>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>

  <div class="bottom w-100">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="left pt-2">
        <h6>Total Harga</h6>
        <h6>Rp. 200.000</h6>
      </div>
      <div class="right">
        <button>Pesan</button>
      </div>
    </div>
  </div>
</body>
</html>