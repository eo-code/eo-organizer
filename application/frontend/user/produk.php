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
              <input type="hidden" name="id" id="id" value="2">
              <input type="hidden" name="email" id="email" value="coba@gmail.com">
              <h6 class="nameProduct">Nama Produk Awok awok awok awok awok awok</h6>
              <p>Rp. <span class="price">200.000</span></p>
            </div>
            <div class="button-product d-flex justify-content-center align-items-center">
              <i class="fa fa-shopping-cart"></i>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6">          
          <div class="card-product">
            <div class="wrap-img">
              <img src="../../../assets/img/hero-bg.png" alt="">
            </div>  
            <div class="info-product p-2 pt-3 pb-1 pr-4 d-flex flex-column justify-content-between">
              <input type="hidden" name="id" id="idProduct" value="3">
              <input type="hidden" name="email" id="email" value="coba@gmail.com">
              <h6 class="nameProduct">Nama Produk Coba</h6>
              <p>Rp. <span class="price">200.000</span></p>
            </div>
            <div class="button-product d-flex justify-content-center align-items-center">
              <i class="fa fa-shopping-cart"></i>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6">          
          <div class="card-product">
            <div class="wrap-img">
              <img src="../../../assets/img/hero-bg.png" alt="">
            </div>  
            <div class="info-product p-2 pt-3 pb-1 pr-4 d-flex flex-column justify-content-between">
              <input type="hidden" name="id" id="idProduct" value="4">
              <input type="hidden" name="email" id="email" value="coba@gmail.com">
              <h6 class="nameProduct">Nama Produk Pernikahan</h6>
              <p>Rp. <span class="price">200.000</span></p>
            </div>
            <div class="button-product d-flex justify-content-center align-items-center">
              <i class="fa fa-shopping-cart"></i>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-6">          
          <div class="card-product">
            <div class="wrap-img">
              <img src="../../../assets/img/hero-bg.png" alt="">
            </div>  
            <div class="info-product p-2 pt-3 pb-1 pr-4 d-flex flex-column justify-content-between">
              <input type="hidden" name="id" id="idProduct" value="5">
              <input type="hidden" name="email" id="email" value="coba@gmail.com">
              <h6 class="nameProduct">Nama Produk Dekorasi</h6>
              <p>Rp. <span class="price">200.000</span></p>
            </div>
            <div class="button-product d-flex justify-content-center align-items-center">
              <i class="fa fa-shopping-cart"></i>
            </div>
          </div>
        </div>
        
        
      </div>
    </div>
  </div>

  <script>
    const date = new Date();
    const inputDate = document.querySelector('#date');
    let buttonProduct = document.querySelectorAll('.button-product');

    let yearNow = date.getFullYear();
    let monthNow = date.getMonth() < 10 ? '0' +( date.getMonth() + 1) : date.getMonth() + 1;
    let dateNow = date.getDate();

    let fullDateNow = yearNow + '-' + monthNow + '-' + dateNow

    inputDate.setAttribute('min', fullDateNow);

    buttonProduct.forEach(btn => {
      btn.addEventListener('click', function(e){
        
        let id = '';
        let email = '';
        let productName = '';
        let priceProduct = '';

        if(e.target.className === 'button-product d-flex justify-content-center align-items-center'){
          id = e.target.parentElement.children[1].children[0].value;
          email = e.target.parentElement.children[1].children[1].value;
          productName = e.target.parentElement.children[1].children[2].textContent;
          priceProduct = e.target.parentElement.children[1].children[3].children[0].textContent;
        } else {
          id = e.target.parentElement.parentElement.children[1].children[0].value;
          email = e.target.parentElement.parentElement.children[1].children[1].value;
          productName = e.target.parentElement.parentElement.children[1].children[2].textContent;
          priceProduct = e.target.parentElement.parentElement.children[1].children[3].children[0].textContent;
        }

        let arrProduct = [{idProduct: id, name: productName, price: priceProduct, emailUser: email}]
        if(localStorage.getItem('dataCart') == undefined){
          localStorage.setItem('dataCart', JSON.stringify(arrProduct));
        } else {
          let strProducts = localStorage.getItem('dataCart', JSON.stringify(arrProduct));
          let arrProducts = JSON.parse(strProducts)
          arrProducts.push({idProduct: id, name: productName, price: priceProduct, emailUser: email});
          console.log(arrProducts)
          localStorage.setItem('dataCart', JSON.stringify(arrProducts));
        }
        
      })
    })
    
  </script>
</body>
</html>