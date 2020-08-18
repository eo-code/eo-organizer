<?php
// include file koneksi.php
include "../koneksi.php";

// Variable dari form user
$username = $_POST["username"];
$password = $_POST["password"];
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$no_hp = $_POST["no_hp"];
$email = $_POST["email"];

// validasi password dan email
$validEmail = preg_match("/^\S+@\S+\.\S+$/", $email);
$validPassword = strlen(trim($password));

// Check validasi
if($validEmail < 0 || $validPassword < 6 ){

    // Redirect ke halaman signup jika gagal
    echo "<script>window.location.href = '../../frontend/user/signup.php?pesan=gagalvaid' </script>";

}else {
    
    // process menyimpan data
    $simpan = mysqli_query($koneksi, "INSERT INTO member (username, `password`, nama, email, no_hp, alamat) VAlUES ('$username', '$password', '$nama', '$email', '$no_hp', '$alamat') ");

    if($simpan){
        // Redirect ke halaman login
         echo "<script>window.location.href = '../../frontend/user/login.php' </script>";
    }else {
        // Redirect ke halaman signup
        echo "<script>window.location.href = '../../frontend/user/signup.php?pesan=gagaladd' </script>";
    }

}



