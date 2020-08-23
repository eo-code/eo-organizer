<?php
include('../../config/koneksi.php');
$id = $_GET['id'];
$foto_sebelumnya = $_POST['a'];
//file foto dari form edit barang
$foto_awal = $_FILES['foto']['name'];
//ekstensi atau format foto (png,jpg,jpeg)
$x = explode('.', $foto_awal);
$ekstensi = strtolower(end($x));
$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
$awal = substr($foto_awal, 0, -4);
$foto = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
//file tmp
$file_tmp = $_FILES['foto']['tmp_name'];
// ukuran foto
$ukuran = $_FILES['foto']['size'];
if ($foto_awal == "") {
    $query_edit = mysqli_query($koneksi, "UPDATE gallery SET foto='$foto' WHERE id_gallery='$id'");
    if ($query_edit) {
        echo "<script>window.location.href = '../../../frontend/admin/gallery.php'</script>";
    } else {
        echo "<script>window.location.href = '../../../frontend/admin/gallery.php'</script>";
    }
} else {
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 10044070) {
            $a = '../../../../assets/images/' . $foto_sebelumnya;
            $hapus_foto = unlink($a);
            move_uploaded_file($file_tmp, '../../../../assets/images/' . $foto);
            $query_edit = mysqli_query($koneksi, "UPDATE gallery SET foto='$foto' WHERE id_gallery='$id'");
            if ($query_edit) {
                echo "<script>window.location.href = '../../../frontend/admin/gallery.php'</script>";
            } else {
                echo "<script>window.location.href = '../../../frontend/admin/gallery.php'</script>";
            }
        } else {
            echo "<script>alert('Ukuran File Tidak Boleh Lebih Dari 1 MB');window.location.href = '../../../frontend/admin/gallery.php'</script>";
        }
    } else {
        echo "<script>alert('Format foto Harus JPEG, JPG, atau PNG');window.location.href = '../../../frontend/admin/gallery.php'</script>";
    }
}
