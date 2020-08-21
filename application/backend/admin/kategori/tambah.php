<?php
include '../../config/koneksi.php';
$kategori = $_POST['kategori'];
$query_tambah = mysqli_query($koneksi, "INSERT INTO kategori VALUES ('','$kategori')");
if ($query_tambah) {
    echo "<script>window.location.href = '../../../frontend/admin/kategori.php'</script>";
} else {
    echo "<script>window.location.href = '../../../frontend/admin/kategori.php'</script>";
}
