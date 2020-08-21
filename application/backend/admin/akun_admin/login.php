<?php
include('../../config/koneksi.php');
$username = $_POST['username'];
$password = $_POST["password"];

// Menghitung jumlah karakter password
$validPassword = strlen(trim($password));

// Validasi karakter password lebih dari 6 huruf

// Mencari admin berdasarkan akun
$checkUsername = mysqli_query($koneksi, "SELECT * FROM admin where username = '$username' ");
if (mysqli_num_rows($checkUsername) == 0) {
    echo "<script>window.location.href = '../../../frontend/admin/login.php?kodeError=1' </script>";
} else {
    // get data admin 
    $resultAdmin = mysqli_fetch_assoc($checkUsername);

    // check jika password yang di input sesuai dengan yang ada di database
    $checkPassword = password_verify($password, $resultAdmin["password"]);

    if ($checkPassword) {
        setcookie("username", $username, time() + (3600 * 24), '/');
        header("Location:../../../frontend/admin/produk.php");
    } else {
        echo "<script>window.location.href='../../../frontend/admin/login.php?kodeError=2'</script>";
    }
}

    // KodeError
    // 0 = username tidak terdaftar 
    // 2 = password salah
    // 
;
