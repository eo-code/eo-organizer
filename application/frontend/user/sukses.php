<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="../style/sukses.css">
  <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../../../assets/icon/css/all.css">
  <title>Document</title>
</head>

<body>


  <div class="page-success" style="overflow: hidden;">
    <div class="wrap-success w-100 d-flex align-items-center justify-content-center">
      <div class="container d-flex">
        <div class="left w-50">
          <img src="../../../assets/images/flat-success.svg" alt="">
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

    <div class="col-md-12 p-5" id="invoice">
      <div class="wrap-invoice">
        <div class="header-invoice">
          <h3>Naya Arts & Craft</h3>
          <p>Spesialis Paper Flower</p>
        </div>

        <div class="info d-flex justify-content-between mt-5">
          <?php
          include('../../backend/config/koneksi.php');
          $data1 = mysqli_query($koneksi, "SELECT * FROM booking LEFT JOIN produk ON booking.id_product=produk.id_produk
          LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE booking.kode_booking='$_GET[kode]'");

          $data2 = mysqli_query($koneksi, "SELECT * FROM booking LEFT JOIN produk ON booking.id_product=produk.id_produk
LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE booking.kode_booking='$_GET[kode]'");
          $d = mysqli_fetch_assoc($data1);

          $totalHarga = 0;

          ?>
          <div class="bill d-flex flex-column">
            <h5>Bill To : </h5>
            <p><b><?= $d['nama_lengkap'] ?></b></p>
          </div>
          <div class="date d-flex flex-column">
            <h5>Date : </h5>
            <p><b><?= $d['tanggal'] ?></b></p>
          </div>
          <div class="invoice-number d-flex flex-column">
            <h5>Invoice Number :</h5>
            <p><b><?= $_GET['kode'] ?></b></p>
          </div>
          <div class="total-price d-flex flex-column">
            <h5>Total Price : </h5>
            <p id="totalHargaJudul"></p>
          </div>
        </div>

        <div class="detail-info mt-5" style="border-top: 5px solid #8675a9">
          <table class="table" style="color: #8675a9">
            <thead>
              <tr>
                <th scope="col">Nama Produk</th>
                <th scope="col">Kategori</th>
                <th scope="col">Catatan Pembeli</th>
                <th scope="col" class="text-right">Harga</th>

              </tr>
            </thead>
            <tbody>
              <?php while ($de = mysqli_fetch_array($data2)) {
                $totalHarga += (int)$de['total_harga'];
              ?>
                <tr>
                  <td><?= $de['nama_produk'] ?></td>
                  <td><?= $de['kategori'] ?></td>
                  <td><?= $de['catatan'] ?></td>
                  <td class="text-right">Rp. <?= number_format($de['harga'], 0, ",", ".") ?>,-</td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <table class="table" style="color: #8675a9">
            <tbody>
              <tr>
                <td colspan=2 class="text-right font-weight-bold">Total Harga</td>
                <td colspan=2 class="text-right" id="totalHarga">Rp. <?= number_format($totalHarga, 0, ",", ".") ?>,-</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="ps mt-4 pt-5 text-center">
          <p>
            Silahkan datang ke Naya Arts & Craft yang beralamat di <b>SP 1 Kabupaten Sorong</b>
          </p>
          <p>Harap membawa bukti pembayaran ini pada tanggal<b>
              <?= $de['tanggal'] ?></b> untuk proses lebih lanjut dan melakukan pembayaran</p>
          <p><span class="font-weight-bold">Sejumlah : </span> Rp. <?= number_format($totalHarga, 0, ",", ".")  ?>,-</p>
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


    const totalHarga = document.querySelector("#totalHarga").textContent;
    document.querySelector("#totalHargaJudul").innerHTML = `<b>${totalHarga}</b>`
  </script>

</body>

</html>