<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/./style.css">
  <link rel="stylesheet" href="../style/./daftar_booking.css">
  <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.css">
  <script src="https://kit.fontawesome.com/e6f4490556.js" crossorigin="anonymous"></script>
  <title>Daftar Booking</title>
</head>
<body>
  <?php include './layout/header.php'?>
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
  <div class="hero-daftar-booking w-100">
    <div class="shape"></div>
    <div class="container d-flex align-items-center justify-content-center">
      <div class="title">
        <h1 class="text-center">Daftar Booking</h1>
      </div>
    </div>
  </div>

  <div class="daftar-booking">
    <div class="container">
      <div class="date w-100 d-flex mt-4 justify-content-between align-items-center">
        <input type="number" name="tanggal" id="date" maxlength="4" class="form-control"  onKeyPress="if(this.value.length==4) return false;">
        <button><i class="fa fa-search"></i></button>
      </div>

      <div class="table-data-booking mt-5">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID Booking</th>
              <th scope="col">ID Produk</th>
              <th scope="col">Nama</th>
              <th scope="col">Tanggal</th>
              <th scope="col">No Handphone</th>
              <th scope="col">Email</th>
              <th scope="col">Keterangan</th>
              <th scope="col">Total Harga</th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>@mdo</td>            
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>


</body>
</html>