<?php
include "../../config/koneksi.php";


// $tanggal = date('Y-m-d');




try {
    $myData = json_decode($_POST["products"]);
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $kode_booking = bin2hex(random_bytes(6));
    $no_hp = $_POST["no_hp"];
    $alamat = $_POST["alamat"];
    $catatan = $_POST["catatan"];

    // Looping $myData->products
    // $dataArr = array();
    // foreach ($myData as $key) {

    //     $simpan = mysqli_query($koneksi, "INSERT INTO `booking` (`id_booking`, `kode_booking`, `tanggal`, `nama_lengkap`, `no_hp`, `email`, `alamat`, `id_product`, `catatan`, `total_harga`, `status`) VALUES (NULL, 'adasda`', '2020-08-19', 'asdas', '090909', 'asd@f.c', 'alasdad', 'asdad', 'asdad', '9898', 'Booked');");
    // }

    foreach ($myData as $item) { //foreach element in $arr
        $harga = str_replace(".", "", $item->price);
        $simpan = mysqli_query($koneksi, "INSERT INTO `booking` (`id_booking`, `kode_booking`, `tanggal`, `nama_lengkap`, `no_hp`, `email`, `alamat`, `id_product`, `catatan`, `total_harga`, `status`) VALUES (NULL, '$kode_booking', '$item->tanggal', '$nama', '$no_hp', '$email', '$alamat', '$item->idProduct', '$catatan', '$harga', 'Booked');");
    }

    // Masukkin data 

    // ay_map(function ($pro) {
    //     $i = 1;
    // }, $myData);arr

    echo json_encode(array("kode_booking" => $kode_booking));
} catch (\Throwable $th) {
    echo json_encode(array("message" => "Gagal Menambahkan Keranjang $th"));
}

// array_map(function () {
// }, $myData->products);
