<?php
include('../../config/koneksi.php');
$id = $_GET['id'];
$nama_produk = $_POST['namaProduk'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];
$gambar_sebelumnya = $_POST['a'];
//file gambar dari form edit barang
$gambar = $_FILES['gambar']['name'];
//ekstensi atau format gambar (png,jpg,jpeg)
$x = explode('.', $gambar);
$ekstensi = strtolower(end($x));
$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
//file tmp
$file_tmp = $_FILES['gambar']['tmp_name'];
// ukuran gambar
$ukuran = $_FILES['gambar']['size'];
if ($gambar == "") {
    $query_tambah = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama_produk',harga='$harga',id_kategori='$kategori',deskripsi='$deskripsi'");
    if ($query_tambah) {
        echo "<script>alert('Tambah Produk Sukses');window.location.href = '../../../frontend/admin/halamanAdmin.php'</script>";
    } else {
        echo "<script>alert('Tambah Produk Gagal');window.location.href = '../../../frontend/admin/halamanAdmin.php'</script>";
    }
} else {
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 10044070) {
            $a = '../../../../assets/images/' . $gambar_sebelumnya;
            $hapus_gambar = unlink($a);
            move_uploaded_file($file_tmp, '../../../../assets/images/' . $gambar);
            $query_tambah = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama_produk',harga='$harga',id_kategori='$kategori',deskripsi='$deskripsi',gambar='$gambar'");
            if ($query_tambah) {
                echo "<script>alert('Tambah Produk Sukses');window.location.href = '../../../frontend/admin/halamanAdmin.php'</script>";
            } else {
                echo "<script>alert('Tambah Produk Gagal');window.location.href = '../../../frontend/admin/halamanAdmin.php'</script>";
            }
        } else {
            echo "<script>alert('Ukuran File Tidak Boleh Lebih Dari 1 MB');window.location.href = '../../../frontend/admin/halamanAdmin.php'</script>";
        }
    } else {
        echo "<script>alert('Format Gambar Harus JPEG, JPG, atau PNG');window.location.href = '../../../frontend/admin/halamanAdmin.php'</script>";
    }
}
