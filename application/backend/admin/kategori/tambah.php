<?php
include '../../config/koneksi.php';
$kategori = $_POST['kategori'];
$query_tambah = mysqli_query($koneksi, "INSERT INTO kategori VALUES ('','$kategori')");
if ($query_tambah) {
    echo "<script>alert('Tambah Kategori Sukses');window.location.href = '../../../frontend/admin/kategori.php'</script>";
} else {
    echo "<script>alert('Tambah Kategori Gagal');window.location.href = '../../../frontend/admin/kategori.php'</script>";
}
