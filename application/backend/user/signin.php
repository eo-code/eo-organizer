<?php
// Include file koneksi
include "../config/koneksi.php";

// Mengambil variable dari form signin
$email = $_POST["email"];
$password = $_POST["password"];

// Menghitung jumlah karakter password
$validPassword = strlen(trim($password));

// Validasi karakter password lebih dari 6 huruf
if ($validPassword <= 6) {
    echo "<script>window.location.href = '../../frontend/user/signup.php?kodeError=6' </script>";
}

// Mencari member berdasarkan akun
$checkEmail = mysqli_query($koneksi, "SELECT * FROM `member` where email = '$email' ");
if (mysqli_num_rows($checkEmail) === 0) {
    echo "<script>window.location.href = '../../frontend/user/signin.php?kodeError=0' </script>";
} else {
    // get data member 
    $resultMember = mysqli_fetch_assoc($checkEmail);

    // check jika password yang di input sesuai dengan yang ada di database
    $checkPassword = password_verify($password, $resultMember["password"]);

    if ($checkPassword) {
        setcookie("login", "sudah_login", time() + (3600 * 24), '/');
        setcookie("email", $email, time() + (3600 * 24), '/');
        header("Location:../../frontend/user/home.php");
    } else {
        echo "<script>window.location.href='../../frontend/user/signin.php?kodeError=0'</script>";
    }
}

// KodeError
// 0 = bad request
// 6= panjang password harus lebih dari 6 karakter
// 2 = email sudah terdaftar
// 