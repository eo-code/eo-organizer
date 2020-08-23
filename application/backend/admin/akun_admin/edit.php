<?php
include('../../config/koneksi.php');
$cookie = $_GET['cookie'];
$username = $_POST['username'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$foto_sebelumnya = $_POST['picture_sebelumnya'];
//file foto dari form edit barang
$foto_awal = $_FILES['picture']['name'];
//ekstensi atau format foto (png,jpg,jpeg)
$x = explode('.', $foto_awal);
$ekstensi = strtolower(end($x));
$ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
$awal = substr($foto_awal, 0, -4);
$foto = $awal . '_' . round(microtime(true)) . '.' . $ekstensi;
//file tmp
$file_tmp = $_FILES['picture']['tmp_name'];
// ukuran foto
$ukuran = $_FILES['picture']['size'];
if ($username == $cookie) {
    if ($_POST['password'] == "") {
        if ($foto_awal == "") {
            $query_edit = mysqli_query($koneksi, "UPDATE admin SET username='$username',nama='$nama',email='$email'");
            if ($query_edit) {
                echo "<script>window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
            } else {
                echo "<script>window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
            }
        } else {
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 10044070) {
                    $a = '../../../../assets/images/' . $foto_sebelumnya;
                    $hapus_foto = unlink($a);
                    move_uploaded_file($file_tmp, '../../../../assets/images/' . $foto);
                    $query_edit = mysqli_query($koneksi, "UPDATE admin SET username='$username',nama='$nama',email='$email',foto='$foto'");
                    if ($query_edit) {
                        echo "<script>window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
                    } else {
                        echo "<script>window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
                    }
                } else {
                    echo "<script>alert('Ukuran Foto Tidak Boleh Lebih Dari 1 MB');window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
                }
            } else {
                echo "<script>alert('Format Foto Harus JPEG, JPG, atau PNG');window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
            }
        }
    } else {
        if ($foto_awal == "") {
            $query_edit = mysqli_query($koneksi, "UPDATE admin SET username='$username',nama='$nama',email='$email',password='$password'");
            if ($query_edit) {
                echo "<script>window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
            } else {
                echo "<script>window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
            }
        } else {
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 10044070) {
                    $a = '../../../../assets/images/' . $foto_sebelumnya;
                    $hapus_foto = unlink($a);
                    move_uploaded_file($file_tmp, '../../../../assets/images/' . $foto);
                    $query_edit = mysqli_query($koneksi, "UPDATE admin SET username='$username',nama='$nama',email='$email',password='$password',foto='$foto'");
                    if ($query_edit) {
                        echo "<script>window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
                    } else {
                        echo "<script>window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
                    }
                } else {
                    echo "<script>alert('Ukuran Foto Tidak Boleh Lebih Dari 1 MB');window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
                }
            } else {
                echo "<script>alert('Format Foto Harus JPEG, JPG, atau PNG');window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
            }
        }
    }
} else {
    if ($_POST['password'] == "") {
        if ($foto_awal == "") {
            $query_edit = mysqli_query($koneksi, "UPDATE admin SET username='$username',nama='$nama',email='$email'");
            if ($query_edit) {
                setcookie("username", "", time() - (3600 * 24), "/");
                echo "<script>alert('Sukses Melakukan Perubahan Silahkan Login Kembali');window.location.href = '../../../frontend/admin/login.php'</script>";
            } else {
                echo "<script>window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
            }
        } else {
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 10044070) {
                    $a = '../../../../assets/images/' . $foto_sebelumnya;
                    $hapus_foto = unlink($a);
                    move_uploaded_file($file_tmp, '../../../../assets/images/' . $foto);
                    $query_edit = mysqli_query($koneksi, "UPDATE admin SET username='$username',nama='$nama',email='$email',password='$password',foto='$foto'");
                    if ($query_edit) {
                        echo "<script>window.location.href = '../../../frontend/admin/login.php'</script>";
                    } else {
                        echo "<script>window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
                    }
                } else {
                    echo "<script>alert('Ukuran Foto Tidak Boleh Lebih Dari 1 MB');window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
                }
            } else {
                echo "<script>alert('Format Foto Harus JPEG, JPG, atau PNG 2');window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
            }
        }
    } else {
        $query_edit = mysqli_query($koneksi, "UPDATE admin SET username='$username',nama='$nama',email='$email',password='$password'");
        if ($query_edit) {
            setcookie("username", "", time() - (3600 * 24), "/");
            echo "<script>alert('Sukses Melakukan Perubahan Silahkan Login Kembali');window.location.href = '../../../frontend/admin/login.php'</script>";
        } else {
            echo "<script>window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
        }
        if ($foto_awal == "") {
            $query_edit = mysqli_query($koneksi, "UPDATE admin SET username='$username',nama='$nama',email='$email',password='$password'");
            if ($query_edit) {
                setcookie("username", "", time() - (3600 * 24), "/");
                echo "<script>alert('Sukses Melakukan Perubahan Silahkan Login Kembali');window.location.href = '../../../frontend/admin/login.php'</script>";
            } else {
                echo "<script>window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
            }
        } else {
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 10044070) {
                    $a = '../../../../assets/images/' . $foto_sebelumnya;
                    $hapus_foto = unlink($a);
                    move_uploaded_file($file_tmp, '../../../../assets/images/' . $foto);
                    $query_edit = mysqli_query($koneksi, "UPDATE admin SET username='$username',nama='$nama',email='$email',password='$password',foto='$foto'");
                    if ($query_edit) {
                        echo "<script>window.location.href = '../../../frontend/admin/login.php'</script>";
                    } else {
                        echo "<script>window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
                    }
                } else {
                    echo "<script>alert('Ukuran Foto Tidak Boleh Lebih Dari 1 MB');window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
                }
            } else {
                echo "<script>alert('Format Foto Harus JPEG, JPG, atau PNG 2');window.location.href = '../../../frontend/admin/akun_admin.php'</script>";
            }
        }
    }
}
