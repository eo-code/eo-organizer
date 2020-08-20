<?php
include('../../config/koneksi.php');
$nama_produk = $_POST['namaProduk'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];
//file gambar dari form tambah barang
$gambar_awal = $_FILES['gambar']['name'];
//ekstensi atau format gambar (png,jpg,jpeg)
$x = explode('.', $gambar_awal);
$ekstensi = strtolower(end($x));
$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
$awal = substr($gambar_awal, 0, -4);
$gambar = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
//file tmp
$file_tmp = $_FILES['gambar']['tmp_name'];
//
$ukuran = $_FILES['gambar']['size'];
if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 10044070) {
        move_uploaded_file($file_tmp, '../../../../assets/images/' . $gambar);
        $query_tambah = mysqli_query($koneksi, "INSERT INTO produk VALUES ('','$nama_produk', '$gambar','$kategori','$harga','$deskripsi')");
        if ($query_tambah) {
            echo "<script>alert('Tambah Produk Sukses');window.location.href = '../../../frontend/admin/produk.php'</script>";
        } else {
            echo "<script>alert('Tambah Produk Gagal');window.location.href = '../../../frontend/admin/produk.php'</script>";
        }
    } else {
        echo "<script>alert('Ukuran File Tidak Boleh Lebih Dari 1 MB');window.location.href = '../../../frontend/admin/produk.php'</script>";
    }
} else {
    echo "<script>alert('Format Gambar Harus JPEG, JPG, atau PNG');window.location.href = '../../../frontend/admin/produk.php'</script>";
}
