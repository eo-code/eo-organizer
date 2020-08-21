<?php
$logout = setcookie("username", "", time() - (3600 * 24), "/");
if ($logout) {
    echo "<script>alert('logout Sukses');window.location.href='../../../frontend/admin/login.php?'</script>";
} else {
    echo "<script>alert('logout Gagal');window.location.href='../../../frontend/admin/produk.php?'</script>";
}
