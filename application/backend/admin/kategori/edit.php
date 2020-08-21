<?php
include '../../config/koneksi.php';
$id = $_GET['id'];
$kategori = $_POST['kategori'];
$query_tambah = mysqli_query($koneksi, "UPDATE kategori SET kategori='$kategori' WHERE id_kategori='$id'");
if ($query_tambah) {
    echo "<script>window.location.href = '../../../frontend/admin/kategori.php'</script>";
} else {
    echo "<script>window.location.href = '../../../frontend/admin/kategori.php'</script>";
}
