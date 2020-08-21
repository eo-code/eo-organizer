<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include '../../backend/config/koneksi.php';
    $tanggalBooking = $_GET["q"];
    $date = date('-m-d');
    // $tanggalBooking .= $date ;

    $cek = mysqli_query($koneksi, "SELECT * FROM booking LEFT JOIN produk ON booking.id_product = produk.id_produk LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE  booking.tanggal_booking NOT LIKE '$tanggalBooking%' ");
    // $cek1 = mysqli_query($koneksi, "SELECT * FROM booking LEFT JOIN produk ON booking.id_product = produk.id_produk LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE `tanggal_booking` BETWEEN '$tanggalBooking-01-01' AND '$tanggalBooking-12-31' ");
    // var_dump(mysqli_fetch_array($cek));
    var_dump(mysqli_fetch_array($cek));
    // var_dump($tanggalBooking);

    ?>

</body>

</html>