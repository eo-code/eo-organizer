<?php

// Delete cookie login
$cookieLogin = setcookie("login", "sudah_login", time() + (3600 * 24), '/' );
$cookieEmail = setcookie("email", $email, time() + (3600 * 24), '/' );

if($cookieLogin && $cookieEmail ){
    header("Location:../../frontend/user/signin.php");
}
else{
    header("Location: ../../frontend/user/home.php");
}
?>