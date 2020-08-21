<?php
include "../../config/koneksi.php";


$kode_booking = bin2hex(random_bytes(6));
$tanggal = date('Y-m-d');

$myData = json_decode($_POST["products"]);
// $person = json_decode($_POST["person"]);

// try {

//     // Looping $myData->products
//     $dataArr = array();
//     foreach ($myData->products as $product) {
//         $nama = mysqli_real_escape_string($koneksi, [$product]['name']);
//         $nama = mysqli_real_escape_string($koneksi, [$product]['name']);
//         $email = mysqli_real_escape_string($koneksi, [$product]['emailUser']);
//         $dataArr[] = "('$kode_booking','$tanggal','')";
//     }

//     // Masukkin data 

// } catch (\Throwable $th) {
// }

// array_map(function () {
// }, $myData->products);

echo json_encode(array("person" => $myData));
