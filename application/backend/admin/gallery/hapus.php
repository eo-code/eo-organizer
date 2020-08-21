<?php
include('../../config/koneksi.php');
$id = $_GET['id'];
$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT foto FROM gallery WHERE id_gallery='$id'"));
$a = '../../../../assets/images/' . $data['foto'];
$hapus_foto = unlink($a);
if ($hapus_foto) {
    $delete_query = mysqli_query($koneksi, "DELETE FROM gallery WHERE id_gallery='$id'");
    if ($delete_query) {
        echo "<script>window.location.href = '../../../frontend/admin/gallery.php'</script>";
    } else {
        echo "<script>window.location.href = '../../../frontend/admin/gallery.php'</script>";
    }
} else {
    echo "<script>window.location.href = '../../../frontend/admin/gallery.php'</script>";
}
