<?php
include('../../config/koneksi.php');
//file foto dari form tambah barang
$foto_awal = $_FILES['foto']['name'];
//ekstensi atau format foto (png,jpg,jpeg)
$x = explode('.', $foto_awal);
$ekstensi = strtolower(end($x));
$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
$awal = substr($foto_awal, 0, -4);
$foto = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
//file tmp
$file_tmp = $_FILES['foto']['tmp_name'];
//
$ukuran = $_FILES['foto']['size'];
if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 10044070) {
        move_uploaded_file($file_tmp, '../../../../assets/images/' . $foto);
        $query_tambah = mysqli_query($koneksi, "INSERT INTO gallery VALUES ('','$foto')");
        if ($query_tambah) {
            echo "<script>window.location.href = '../../../frontend/admin/gallery.php'</script>";
        } else {
            echo "<script>window.location.href = '../../../frontend/admin/gallery.php'</script>";
        }
    } else {
        echo "<script>alert('Ukuran File Tidak Boleh Lebih Dari 1 MB');window.location.href = '../../../frontend/admin/produk.php'</script>";
    }
} else {
    echo "<script>alert('Format foto Harus JPEG, JPG, atau PNG');window.location.href = '../../../frontend/admin/produk.php'</script>";
}
