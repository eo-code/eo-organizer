<?php
// Include file koneksi database
include "../../koneksi.php";

// Mengambil query parameter id pada url
$idBooking = $_GET["id"];

// Mengupdate status booking
$updateBooking = mysqli_query($koneksi, "UPDATE booking SET `Status` = 'SELESAI' WHERE id_booking = '$idBooking' ");

// Cek jika berhasil mengupdate
if($updateBooking){
    header("Location: ../../../frontend/admin/daftarBooking.php");
}

// Jika gagal
else{
    header("Location: ../../../frontend/admin/daftarBooking.php?pesan=gagal");
}

?>