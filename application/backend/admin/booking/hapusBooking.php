<?php

// Include file koneksi database
include "../../config/koneksi.php";

// Mengambil id booking dari query parameter
$idBooking = $_GET["id"];

// Mencari data booking berdasarkan id
$res = mysqli_query($koneksi, "SELECT * FROM booking WHERE id_booking = '$idBooking' ");
$booking = mysqli_fetch_assoc($res);

// cek jika status booking sudah selesai
if ($booking["status"] == "Finish") {

    // Hapus dari database
    $hapusBooking = mysqli_query($koneksi, "DELETE FROM booking WHERE id_booking ='$idBooking'");

    if ($hapusBooking) {
        header("Location: ../../../frontend/admin/daftarBooking.php");
    } else {
        header("Location: ../../../frontend/admin/daftarBooking.php?pesan=gagal");
    }
} else {
    header("Location: ../../../frontend/admin/daftarBooking.php?pesan=access_diblokir");
}
