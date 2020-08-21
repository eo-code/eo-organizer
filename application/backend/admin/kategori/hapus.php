<?php
include '../../config/koneksi.php';
$id = $_GET['id'];

// cek di table produk ada id kategori 
$cekId = mysqli_query($koneksi, "SELECT DISTINCT id_kategori FROM produk ");

// mengambil jumlah baris cekid
$listId = mysqli_num_rows($cekId);



$delete_query = mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'");
if ($delete_query) {
    echo "<script>window.location.href = '../../../frontend/admin/kategori.php'</script>";
} else {
    echo "<script>window.location.href = '../../../frontend/admin/kategori.php'</script>";
}
