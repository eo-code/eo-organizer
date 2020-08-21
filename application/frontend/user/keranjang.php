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
              <p>Rp. <span class="price">200.000</span></p>
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
              <p>Rp. <span class="price">200.000</span></p>
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
              <p>Rp. <span class="price">200.000</span></p>
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
        <h6>Rp. <span class="price-total">200.00</span></h6>
      </div>
      <div class="right">
        <button data-toggle="modal" data-target="#dataDiri">Checkout</button>
      </div>
    </div>
  </div>

  <div class="modal fade" id="dataDiri" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Data Diri</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="username">
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="email">
          </div>
          <div class="form-group">
            <label for="">No Hp</label>
            <input type="number" class="form-control" name="number" id="number">
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <textarea class="form-control" name="alamat" id="" cols="30" rows="5"></textarea>
          </div>

          <div class="form-group">
            <label for="">Catatan</label>
            <textarea class="form-control" name="catatan" id="" cols="30" rows="5"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" style="border: none; background-color: #FFFFFF; color: #8675a9;box-shadow: 0 0 4px 1px rgba(134, 117, 169, 0.4);" data-dismiss="modal">Close</button>
          <button type="button" style="border: none;background-color: #8675a9;color: #ffffff;" class="btn btn-primary">Pesan</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    let price = document.querySelectorAll('.card-keranjang .price');
    let elPriceTotal = document.querySelector('.price-total')
    let priceInt = []
    let wrapCart = document.querySelector('.wrap-card-keranjang');
    

    price.forEach(p => {
      priceInt.push(+p.textContent.split('.').join(''));
    })

    const priceTotal = priceInt.reduce((acc, currentValue) =>  acc + currentValue, 0);

    elPriceTotal.textContent = priceTotal
    
    let dataCart = JSON.parse(localStorage.getItem('dataCart'));

    dataCart.forEach(dc => {

    })
  </script>
</body>
</html>