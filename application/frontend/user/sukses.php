<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="../style/sukses.css">
  <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.css">
  <script src="https://kit.fontawesome.com/e6f4490556.js" crossorigin="anonymous"></script>
  <title>Document</title>
</head>
<body>


<div class="page-success" style="overflow: hidden;">
  <div class="wrap-success w-100 d-flex align-items-center justify-content-center">
    <div class="container d-flex">
      <div class="left w-50">
        <img src="../../../assets/img/flat-success.svg" alt="">
      </div>
      <div class="right w-50 h-100 pl-5 d-flex flex-column justify-content-center">
        <h1>Berhasil Pesan</h1>
        <p class="mt-4">
          dimohon untuk mendownload invoice sebagai
          bukti bahwa anda telah memesan jasa kami.
          Terima Kasih.
        </p>
        <div class="button mt-4">
          <a href="./home.php">    
            <button class="mr-2">Home <i class="fa fa-home pl-2"></i></button>
          </a>
          <button class="btn-download">Download <i class="fa fa-arrow-down pl-2"></i></button>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-md-12 p-5" id="invoice" style="">  
    <div class="wrap-invoice">
      <div class="header-invoice">
        <h3>Naya Arts & Craft</h3>
        <p>Spesialis Paper Flower</p>
      </div>
  
      <div class="info d-flex justify-content-between mt-5">
        <div class="bill d-flex flex-column">
          <h5>Bill To : </h5>
          <p>{nama orang}</p>
        </div>
        <div class="date d-flex flex-column">
          <h5>Date : </h5>
          <p>{Tanggal}</p>
        </div>
        <div class="invoice-number d-flex flex-column">
          <h5>Invoice Number :</h5>
          <p>{Nomor Invoice}</p>
        </div>
        <div class="total-price d-flex flex-column">
          <h5>Total Price : </h5>
          <p>{Total Harga}</p>
        </div>
      </div>
  
      <div class="detail-info mt-5" style="border-top: 5px solid #8675a9">
        <table class="table" style="color: #8675a9">
          <thead>
            <tr>
              <th scope="col">Nama Produk</th>
              <th scope="col">No Handphone</th>
              <th scope="col">Email</th>
              <th scope="col" class="text-right">Harga</th>
  
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>@mdo</td>
              <td>sadsa</td>
              <td>@mdo</td>    
              <td class="text-right">Otto</td>
            </tr>
            <tr>
              <td>asdsa</td>
              <td>@mdo</td>
              <td>@mdo</td>    
              <td class="text-right">Otto</td>
            </tr>
          </tbody>
        </table>
        <table class="table" style="color: #8675a9">
          <tbody>
            <tr>
              <td colspan=2 class="text-right font-weight-bold">Total Harga</td>
              <td colspan=2 class="text-right">{Total Harga}</td>
            </tr>
          </tbody>
        </table> 
      </div>
  
      <div class="ps mt-4 pt-5 text-center">
        <p>
          Silahkan datang ke Naya Arts & Craft yang beralamat di {Alamat}        
        </p>
        <p>Harap membawa bukti pembayaran ini pada tanggal
          {Tanggal} untuk proses lebih lanjut dan melakukan pembayaran</p>
        <p><span class="font-weight-bold">Sejumlah : </span> Rp. {Total Harga}</p>
      </div>
    </div>    
  </div>
</div>
  
  

<!-- <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.min.js"></script> -->
<script src="../../../assets/plugins/html2pdf/dist/html2pdf.bundle.min.js"></script>
<script>
  let invoice = document.querySelector('#invoice');

  function printPDF() {
      html2pdf(invoice);
  }

  let button = document.querySelector('.btn-download');

  button.addEventListener('click', () => {
    invoice.style.display = 'block';
    printPDF() 
  });
</script>


</body>
</html>