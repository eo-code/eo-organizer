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

  <div class="product mt-5">
    <form method="get" id="formDate" action="">
      <div class="container">
        <h2>Produk</h2>
        <div class="date w-100 d-flex mt-4 justify-content-between align-items-center">
          <input type="date" name="tanggal" id="date" class="form-control">
          <?php if (isset($_GET['category'])) { ?>
            <input type="hidden" name="category" value="<?= $_GET['category'] ?>">
          <?php } ?>
          <button type="submit"><i class="fa fa-search"></i></button>
        </div>
    </form>
    <div class="mt-4">
      <?php
      include('../../backend/koneksi.php');
      if (isset($_GET['tanggal'])) {
        if (isset($_GET['category'])) {
          $kategori = $_GET['category'];
          $data_produk = mysqli_query($koneksi, "SELECT DISTINCT produk.* FROM produk, booking  WHERE produk.id_kategori = '$kategori' AND (produk.id_produk NOT IN (SELECT Id_product FROM booking) OR NOT booking.tanggal = '$_GET[tanggal]') ");
        } else {
          $data_produk = mysqli_query($koneksi, "SELECT DISTINCT produk.* FROM produk, booking WHERE produk.id_produk NOT IN (SELECT Id_product FROM booking) OR NOT booking.tanggal = '$_GET[tanggal]' ");
        }
      } ?>


      <?php if (isset($_GET["tanggal"]) && !!$_GET["tanggal"]) {
        if (isset($_GET['category'])) {
          $category = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori='$_GET[category]'")) ?>
          <span class="mt-4">Menampilkan produk <b><?= $category['kategori'] ?></b> </span></div>
  <?php } else { ?>
    <span class="mt-4">Menampilkan <b>Semua Produk</b></span>
  </div>
<?php } ?>
<div class="wrap-product row pb-5">
  <?php
        while ($produk = mysqli_fetch_array($data_produk)) {
  ?>4
    <div class="col-md-3 col-6">
      <div class="card-product">
        <div class="wrap-img">
          <img src="../../../assets/images/<?= $produk['gambar'] ?>" alt="">
        </div>
        <form action="">
          <div class="info-product p-2 pt-3 pb-1 pr-4 d-flex flex-column justify-content-between">
            <input type="hidden" name="id" id="id" value="<?= $produk['id_produk'] ?>">
            <input type="hidden" name="email" id="email" value="coba@gmail.com">
            <h6 class="nameProduct"><?= $produk['nama_produk'] ?></h6>
            <p>Rp. <span class="price"><?= number_format($produk['harga'], 0, ",", ".") ?>,-</span></p>
          </div>
        </form>
        <div class="button-product d-flex justify-content-center align-items-center">
          <i class="fa fa-shopping-cart"></i>
        </div>
      </div>
    </div>
    <div class="popup-success d-flex justify-content-center align-items-center w-100">
    </div>
</div>


  <script>
    const date = new Date();
    const inputDate = document.querySelector('#date');
    const popupSuccess = document.querySelector('.popup-success');
    let elBox = `<div class="box d-flex flex-column justify-content-center align-items-center">
        <i class="fas fa-check-circle"></i>
        <h6 class="mt-3">Berhasil menambahkan ke keranjang</h6>
      </div>`;
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

          popupSuccess.style.zIndex = "2";
          popupSuccess.innerHTML = elBox;

          setTimeout(() => {
            popupSuccess.style.zIndex = "-2";          
            popupSuccess.innerHTML = '';
          }, 1200);
        } else {
          let strProducts = localStorage.getItem('dataCart', JSON.stringify(arrProduct));
          let arrProducts = JSON.parse(strProducts)
          arrProducts.push({idProduct: id, name: productName, price: priceProduct, emailUser: email});
          console.log(arrProducts)
          localStorage.setItem('dataCart', JSON.stringify(arrProducts));
          popupSuccess.style.zIndex = "2";
          popupSuccess.innerHTML = elBox;

          setTimeout(() => {
            popupSuccess.style.zIndex = "-2";          
            popupSuccess.innerHTML = '';
          }, 1200);
        }
        
      })
    })
  const datePick = document.querySelector("#date");
  datePick.addEventListener("input", () => {
    document.querySelector("#formDate").submit();

  })
</script>
3

</body>
</html>