<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/./style.css">
  <link rel="stylesheet" href="../style/./produk.css">
  <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.css">
  <script src="https://kit.fontawesome.com/e6f4490556.js" crossorigin="anonymous"></script>
  <title>Produk</title>
</head>
<body>
  
  <?php include './layout/header.php'; ?>

  <div class="product mt-5">
    <div class="container">
      <h2>Produk</h2>
      <div class="date w-100 d-flex mt-4 justify-content-between align-items-center">
        <input type="date" name="tanggal" id="date" class="form-control">
        <button><i class="fa fa-search"></i></button>
      </div>

      <div class="wrap-product row mt-4 pb-5">        
        <div class="col-md-3 col-6">
          <div class="card-product">
            <div class="wrap-img">
              <img src="../../../assets/img/hero-bg.png" alt="">
            </div>  
            <div class="info-product p-2 pt-3 pb-1 pr-4 d-flex flex-column justify-content-between">
              <h6>Nama Produk Awok awok awok awok awok awok</h6>
              <p>Rp. 200.000</p>
            </div>
            <div class="button-product d-flex justify-content-center align-items-center">
              <button>
                <i class="fa fa-shopping-cart"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="card-product">
            <div class="wrap-img"></div>  
            <div class="info-product p-2 pt-3 pb-1 pr-4 d-flex flex-column justify-content-between">
              <h6>Nama Produk Awok</h6>
              <p>Rp. 200.000</p>
            </div>
            <div class="button-product d-flex justify-content-center align-items-center">
              <button>
                <i class="fa fa-shopping-cart"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="card-product">
            <div class="wrap-img"></div>  
            <div class="info-product p-2 pt-3 pb-1 pr-4 d-flex flex-column justify-content-between">
              <h6>Nama Produk Awok</h6>
              <p>Rp. 200.000</p>
            </div>
            <div class="button-product d-flex justify-content-center align-items-center">
              <button>
                <i class="fa fa-shopping-cart"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="card-product">
            <div class="wrap-img"></div>  
            <div class="info-product p-2 pt-3 pb-1 pr-4 d-flex flex-column justify-content-between">
              <h6>Nama Produk Awok</h6>
              <p>Rp. 200.000</p>
            </div>
            <div class="button-product d-flex justify-content-center align-items-center">
              <button>
                <i class="fa fa-shopping-cart"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="card-product">
            <div class="wrap-img"></div>  
            <div class="info-product p-2 pt-3 pb-1 pr-4 d-flex flex-column justify-content-between">
              <h6>Nama Produk Awok</h6>
              <p>Rp. 200.000</p>
            </div>
            <div class="button-product d-flex justify-content-center align-items-center">
              <button>
                <i class="fa fa-shopping-cart"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="card-product">
            <div class="wrap-img"></div>  
            <div class="info-product p-2 pt-3 pb-1 pr-4 d-flex flex-column justify-content-between">
              <h6>Nama Produk Awok</h6>
              <p>Rp. 200.000</p>
            </div>
            <div class="button-product d-flex justify-content-center align-items-center">
              <button>
                <i class="fa fa-shopping-cart"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="card-product">
            <div class="wrap-img"></div>  
            <div class="info-product p-2 pt-3 pb-1 pr-4 d-flex flex-column justify-content-between">
              <h6>Nama Produk Awok</h6>
              <p>Rp. 200.000</p>
            </div>
            <div class="button-product d-flex justify-content-center align-items-center">
              <button>
                <i class="fa fa-shopping-cart"></i>
              </button>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>

  <script>
    const date = new Date();
    const inputDate = document.querySelector('#date');

    let yearNow = date.getFullYear();
    let monthNow = date.getMonth() < 10 ? '0' +( date.getMonth() + 1) : date.getMonth() + 1;
    let dateNow = date.getDate();

    let fullDateNow = yearNow + '-' + monthNow + '-' + dateNow

    inputDate.setAttribute('min', fullDateNow);
  </script>
</body>
</html>