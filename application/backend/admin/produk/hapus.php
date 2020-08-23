<?php
include('../../config/koneksi.php');
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT gambar FROM produk WHERE id_produk='$id'"));
$a = '../../../../assets/images/' . $data['gambar'];
$hapus_gambar = unlink($a);
if ($hapus_gambar) {
    $delete_query = mysqli_query($koneksi, "DELETE FROM produk WHERE id_produk='$id'");
    if ($delete_query) {
        echo "<script>window.location.href = '../../../frontend/admin/produk.php'</script>";
    } else {
        echo "<script>window.location.href = '../../../frontend/admin/produk.php'</script>";
    }
} else {
    echo "<script>window.location.href = '../../../frontend/admin/produk.php'</script>";
}
