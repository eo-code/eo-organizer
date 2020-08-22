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
      </div>
      
    </div>
    <div class="popup-success d-flex justify-content-center align-items-center w-100">
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
    let wrapCart = document.querySelector('.wrap-card-keranjang');
    let dataCart = JSON.parse(localStorage.getItem('dataCart'));
    const popupSuccess = document.querySelector('.popup-success');
    let elCart = ``;
    let elBox = `<div class="box d-flex flex-column justify-content-center align-items-center">
        <i class="fas fa-check-circle"></i>
        <h6 class="mt-3">Berhasil menghapus produk dari keranjang</h6>
      </div>`;

    dataCart.forEach(dc => {
      elCart += `
      <div class="col-md-6 col-12" id="id${dc.idProduct.trim()}">
        <div class="card-keranjang w-100 d-flex justify-content-between">
          <div class="left d-flex justify-content-center align-items-center">
            <button class="btn-delete" data-id="${dc.idProduct}"><i class="fas fa-trash pr-2"></i> Hapus</button>
          </div>
          <div class="right d-flex flex-column justify-content-around pr-4">    
            <input type="hidden" name="id" value="${dc.idProduct}">
            <input type="hidden" name="email" value="${dc.email}">
            <h5>${dc.name}</h5>
            <p>1</p>
            <p>Rp. <span class="price">${dc.price}</span></p>
          </div>
        </div>
      </div>
      `;

      wrapCart.innerHTML = elCart
    })

    let price = document.querySelectorAll('.card-keranjang .price');
    let elPriceTotal = document.querySelector('.price-total');
    let priceInt = []
    const buttonDelete = document.querySelectorAll('.btn-delete');


    price.forEach(p => {
      priceInt.push(+p.textContent.split('.').join(''));
    })

    buttonDelete.forEach(bd => {
      bd.addEventListener('click', function(){
        let id = this.dataset.id;
        console.log(id)
        let hapusKeranjang = dataCart.filter(dc => dc.idProduct != id);

        console.log(hapusKeranjang);
    // // dataCart.forEach(dc => console.log(dc.idProduct))
        localStorage.setItem('dataCart', JSON.stringify(hapusKeranjang));

        // let cf = JSON.parse(localStorage.getItem('dataCart'));

        const deletingEl = document.querySelector(`#id${id}`);
        deletingEl.remove();



        let priceInt = []

        let price = document.querySelectorAll('.card-keranjang .price');

        price.forEach(p => {
          priceInt.push(+p.textContent.split('.').join(''));
        })

        const priceTotal = priceInt.reduce((acc, currentValue) =>  acc + currentValue, 0);

        elPriceTotal.textContent = priceTotal

        popupSuccess.style.zIndex = "2";
        popupSuccess.innerHTML = elBox;

        setTimeout(() => {
          popupSuccess.style.zIndex = "-2";          
          popupSuccess.innerHTML = '';
        }, 1200)


      })
    })

    const priceTotal = priceInt.reduce((acc, currentValue) =>  acc + currentValue, 0);

    elPriceTotal.textContent = priceTotal

  </script>
</body>
</html>